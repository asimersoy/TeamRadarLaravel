import { t } from './locale';
import Pusher from 'pusher-js';

function messageId() {
    const bytes=crypto.getRandomValues(new Uint8Array(16));
    bytes[6]=(bytes[6]&15)|64; bytes[8]=(bytes[8]&63)|128;
    const hex=[...bytes].map(byte=>byte.toString(16).padStart(2,'0')).join('');
    return `${hex.slice(0,8)}-${hex.slice(8,12)}-${hex.slice(12,16)}-${hex.slice(16,20)}-${hex.slice(20)}`;
}

function startChat(root) {
    if (root.dataset.chatStarted) return;
    root.dataset.chatStarted="true";
    const session = root.dataset.chatRoom;
    const endpoint = `/rooms/${session}/messages`;
    const list = root.querySelector('.messages'), form = root.querySelector('form'), input = root.querySelector('textarea');
    const sendButton = form.querySelector('button[type="submit"]');
    const status = root.querySelector('[data-send-status]'), connection = root.querySelector('[data-connection]'), older = root.querySelector('[data-older]');
    let pending = null, olderCursor = null, busy = false, initialized = false;
    const messages = new Map();
    function display() {
        list.replaceChildren();
        if (!messages.size) { const empty = document.createElement('li'); empty.textContent = t("No messages yet. Say hello to your team."); list.append(empty); }
        for (const message of [...messages.values()].sort((a,b)=>a.id-b.id)) {
            const item = document.createElement('li'), label = document.createElement('strong'), body = document.createElement('p');
            label.textContent = message.handle; item.append(label);
            for (const part of message.body.split(/(https?:\/\/[^\s<>]+)/g)) {
                if (/^https?:\/\//.test(part)) { const link = document.createElement('a'); link.textContent = part; link.href = part; link.target = '_blank'; link.rel = 'noopener noreferrer'; body.append(link); }
                else body.append(document.createTextNode(part));
            }
            item.append(body); list.append(item);
        }
    }
    async function refresh(before = null) {
        try {
            const response = await fetch(endpoint+(before?`?before=${before}`:''), {headers:{Accept:'application/json'}});
            if ([401,403,419].includes(response.status)) { messages.clear(); display(); form.hidden=true; connection.textContent=t("Room access unavailable. Sign in again or return to your dashboard."); return; }
            if (!response.ok) throw new Error();
            const data = await response.json();
            data.messages.forEach(m=>messages.set(m.id,m));
            if (before || !initialized) olderCursor = data.older_cursor;
            initialized = true;
            older.hidden = !olderCursor; form.hidden = !data.can_post; display();
        } catch { connection.textContent=t("Connection interrupted · retrying with polling"); }
    }
    input.addEventListener('keydown', event=>{
        // Enter confirms IME composition; Shift+Enter keeps normal multiline editing.
        if(event.key!=='Enter' || event.shiftKey || event.ctrlKey || event.altKey || event.metaKey || event.isComposing || event.keyCode===229)return;
        event.preventDefault();
        if(!event.repeat && !busy && !form.hidden)form.requestSubmit();
    });
    form.addEventListener('submit', async event=>{
        event.preventDefault(); if(busy || form.hidden)return;
        if(!pending && !input.value.trim()){status.textContent=t("Type a message first.");return;}
        pending ??= {client_message_id:messageId(),body:input.value};
        busy=true; sendButton.disabled=true; input.readOnly=true; status.textContent=t("Sending…");
        try {
            const response=await fetch(endpoint,{method:'POST',headers:{'Content-Type':'application/json',Accept:'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content},body:JSON.stringify(pending)});
            if(!response.ok) { const data=await response.json(); if(response.status===422)pending=null; throw new Error(response.status===422?Object.values(data.errors??{}).flat().join(' '):t("Message could not be sent. Check your connection and room access.")); }
            pending=null;input.value='';status.textContent=t("Sent");await refresh();
        }catch(error){status.textContent=t('Failed — :message Submit again to retry the same message.', {message:error.message});}
        finally{busy=false;sendButton.disabled=false;input.readOnly=false;}
    });
    older.addEventListener('click',()=>refresh(olderCursor));
    // Never hold message bodies in socket payloads. Reauthorize every HTTP fetch.
    const pusher=new Pusher(root.dataset.reverbKey,{wsHost:root.dataset.reverbHost,wsPort:Number(root.dataset.reverbPort),wssPort:Number(root.dataset.reverbPort),forceTLS:location.protocol==='https:',enabledTransports:['ws','wss'],disableStats:true,cluster:'local',channelAuthorization:{endpoint:'/broadcasting/auth',transport:'ajax',headers:{'X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content}}});
    pusher.connection.bind('connected',()=>{connection.textContent=t("Live updates connected · polling backup active");refresh();});
    pusher.connection.bind('disconnected',()=>{connection.textContent=t("Live updates disconnected · polling backup active");});
    for (const state of ['unavailable','connecting','failed']) pusher.connection.bind(state,()=>{connection.textContent=t("Live updates unavailable · polling backup active");});
    pusher.subscribe(`private-room.${session}`).bind('room.changed',()=>refresh());
    refresh();const timer=setInterval(()=>refresh(),5000);
    const stop=()=>{
        clearInterval(timer);pusher.disconnect();delete root.dataset.chatStarted;
        window.removeEventListener('pagehide',stop);
        document.removeEventListener('livewire:navigating',stop);
    };
    window.addEventListener('pagehide',stop,{once:true});
    document.addEventListener('livewire:navigating',stop,{once:true});
}
const startChats=()=>document.querySelectorAll('[data-chat-room]').forEach(startChat);
document.addEventListener('DOMContentLoaded',startChats);
document.addEventListener('livewire:navigated',startChats);

// Associate server validation with controls; focus a changed summary, not every poll.
function setupValidation(){
    let previous = '';
    const associate = ()=>{
        const summary=document.querySelector('[data-error-fields]');
        const signature=summary?.textContent ?? '';
        document.querySelectorAll('[aria-describedby="validation-errors"]').forEach(el=>{el.removeAttribute('aria-describedby');el.removeAttribute('aria-invalid');});
        if(summary){
            const fields=JSON.parse(summary.dataset.errorFields);
            document.querySelectorAll('input,select,textarea').forEach(el=>{
                const name=el.name || el.getAttribute('wire:model');
                if(fields.includes(name)){el.setAttribute('aria-describedby','validation-errors');el.setAttribute('aria-invalid','true');}
            });
            if(signature!==previous)summary.focus();
        }
        previous=signature;
    };
    associate(); const observer=new MutationObserver(associate);
    observer.observe(document.querySelector('main')??document.body,{childList:true,characterData:true,attributes:true,attributeFilter:['data-error-fields'],subtree:true});
    document.addEventListener('livewire:navigating',()=>observer.disconnect(),{once:true});
}
document.addEventListener('livewire:navigated',setupValidation);

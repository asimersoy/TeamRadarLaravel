import Pusher from 'pusher-js';

function messageId() {
    const bytes=crypto.getRandomValues(new Uint8Array(16));
    bytes[6]=(bytes[6]&15)|64; bytes[8]=(bytes[8]&63)|128;
    const hex=[...bytes].map(byte=>byte.toString(16).padStart(2,'0')).join('');
    return `${hex.slice(0,8)}-${hex.slice(8,12)}-${hex.slice(12,16)}-${hex.slice(16,20)}-${hex.slice(20)}`;
}

function startChat(root) {
    const session = root.dataset.chatRoom;
    const endpoint = `/rooms/${session}/messages`;
    const list = root.querySelector('.messages'), form = root.querySelector('form'), input = root.querySelector('textarea');
    const status = root.querySelector('[data-send-status]'), connection = root.querySelector('[data-connection]'), older = root.querySelector('[data-older]');
    let pending = null, olderCursor = null, busy = false;
    const messages = new Map();
    function display() {
        list.replaceChildren();
        if (!messages.size) { const empty = document.createElement('li'); empty.textContent = 'No messages yet. Say hello to your team.'; list.append(empty); }
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
            if ([401,403,419].includes(response.status)) { messages.clear(); display(); form.hidden=true; connection.textContent='Room access unavailable. Sign in again or return to your dashboard.'; return; }
            if (!response.ok) throw new Error();
            const data = await response.json();
            data.messages.forEach(m=>messages.set(m.id,m));
            if (before || !olderCursor) olderCursor = data.older_cursor;
            older.hidden = !olderCursor; form.hidden = !data.can_post; display();
        } catch { connection.textContent='Connection interrupted · retrying with polling'; }
    }
    form.addEventListener('submit', async event=>{
        event.preventDefault(); if(busy)return;
        pending ??= {client_message_id:messageId(),body:input.value};
        busy=true; status.textContent='Sending…';
        try {
            const response=await fetch(endpoint,{method:'POST',headers:{'Content-Type':'application/json',Accept:'application/json','X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content},body:JSON.stringify(pending)});
            if(!response.ok) { const data=await response.json(); if(response.status===422)pending=null; throw new Error(response.status===422?Object.values(data.errors??{}).flat().join(' '):'Message could not be sent. Check your connection and room access.'); }
            pending=null;input.value='';status.textContent='Sent';await refresh();
        }catch(error){status.textContent=`Failed — ${error.message} Submit again to retry the same message.`;}
        finally{busy=false;}
    });
    older.addEventListener('click',()=>refresh(olderCursor));
    // Never hold message bodies in socket payloads. Reauthorize every HTTP fetch.
    const pusher=new Pusher(root.dataset.reverbKey,{wsHost:root.dataset.reverbHost,wsPort:Number(root.dataset.reverbPort),wssPort:Number(root.dataset.reverbPort),forceTLS:location.protocol==='https:',enabledTransports:['ws','wss'],disableStats:true,cluster:'local',channelAuthorization:{endpoint:'/broadcasting/auth',transport:'ajax',headers:{'X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content}}});
    pusher.connection.bind('connected',()=>{connection.textContent='Live updates connected · polling backup active';refresh();});
    pusher.connection.bind('disconnected',()=>{connection.textContent='Live updates disconnected · polling backup active';});
    pusher.subscribe(`private-room.${session}`).bind('room.changed',()=>refresh());
    refresh();const timer=setInterval(()=>refresh(),5000);
    window.addEventListener('pagehide',()=>{clearInterval(timer);pusher.disconnect();},{once:true});
}
document.addEventListener('DOMContentLoaded',()=>document.querySelectorAll('[data-chat-room]').forEach(startChat));

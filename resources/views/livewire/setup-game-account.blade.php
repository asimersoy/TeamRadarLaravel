<div class="max-w-md mx-auto mt-20">
    <div class="panel rounded-xl shadow-card p-8">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold mb-2">Setup {{ $gameName }} Profile</h1>
            <p class="text-ink-300">Link your game account to start queuing.</p>
        </div>

        <form wire:submit="save" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-ink-300 mb-2">Riot ID (Name#TAG)</label>
                <input type="text" wire:model="username"
                       class="w-full bg-bg-800 border border-white/10 rounded-lg px-4 py-3 text-ink-100 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 outline-none transition"
                       placeholder="Player#1234">
                @error('username') <span class="text-danger-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-300 mb-2">Current Rank</label>
                <select wire:model="rank"
                        class="w-full bg-bg-800 border border-white/10 rounded-lg px-4 py-3 text-ink-100 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 outline-none transition">
                    <option value="">Select Rank</option>
                    @foreach(\App\Models\GameAccount::VALORANT_RANKS as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                @error('rank') <span class="text-danger-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full py-3 rounded bg-brand-500 text-bg-900 font-bold hover:bg-brand-600 transition">
                Link Account
            </button>
        </form>
    </div>
</div>

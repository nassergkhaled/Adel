<div class="">
    <div class="flex justify-center my-5">
        <nav class="w-auto flex items-center p-4">
            <div class="flex items-center">
                <a wire:click="changeTab('invoices')" 
                    class="tab {{ $Tab == 'invoices' ? '  text-adel-Dark-active font-bold border-b-4 border-adel-Dark-active' : 'text-adel-Dark  border-b-2 border-adel-Dark' }} cursor-pointer  text-xl px-2 py-2 pb-8 transition-all duration-200 ease-in-out">
                    الفواتير
                </a>
                <a wire:click="changeTab('requestedFunds')"
                    class="tab {{ $Tab == 'requestedFunds' ? '  text-adel-Dark-active font-bold border-b-4 border-adel-Dark-active' : 'text-adel-Dark border-b-2 border-adel-Dark' }} cursor-pointer text-xl  px-2 py-2 pb-8 transition-all duration-200 ease-in-out">
                    الأموال المطلوبة
                </a>
                <a wire:click="changeTab('expenses')"
                    class="tab {{ $Tab == 'expenses' ? ' text-adel-Dark-active font-bold border-b-4 border-adel-Dark-active' : 'text-adel-Dark  border-b-2 border-adel-Dark' }} cursor-pointer text-xl  px-2 py-2 pb-8 transition-all duration-200 ease-in-out">
                    نفقات
                </a>
            </div>
        </nav>
    </div>

    <div class="w-full text-3xl my-5 text-center" wire:loading>
        <span class="loading loading-dots loading-lg text-adel-Normal"></span>
    </div>

    <div class="" wire:loading.remove>
        @if ($Tab === 'invoices')
            {{-- @livewire('invoices', ['data' => $data, 'expenses' => $expenses, 'funds' => $funds], key('{{ \Carbon\Carbon::now()->format('s.u') }}')) --}}
            <livewire:invoices key="{{ \Carbon\Carbon::now()->format('s.u') }}" :data="$data" :expenses="$expenses" :funds="$funds" />
        @elseif($Tab === 'requestedFunds')
            {{-- @livewire('requestedFunds', ['data' => $data], key('{{ \Carbon\Carbon::now()->format('s.u') }}')) --}}
            <livewire:requestedFunds key="{{ \Carbon\Carbon::now()->format('s.u') }}" :data="$data" />
        @elseif($Tab === 'expenses')
            {{-- @livewire('expenses', ['data' => $data], key("{{ \Carbon\Carbon::now()->format('s.u') }}")) --}}
            <livewire:expenses key="{{ \Carbon\Carbon::now()->format('s.u') }}" :data="$data" />
        @endif
    </div>
</div>

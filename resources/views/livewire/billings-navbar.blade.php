<div class="">
    <div class="flex justify-center my-5">
        <nav class="w-auto flex items-center p-4">
            <div  class="flex items-center">
                <a wire:click="changeTab('invoices')"
                    class="tab {{ $Tab == 'invoices' ? '  text-adel-Dark-active font-bold border-b-4 border-adel-Dark-active' : 'text-adel-Dark  border-b-2 border-adel-Dark'   }} cursor-pointer  text-xl px-2 py-2 pb-8">
                    الفواتير
                </a>
                <a wire:click="changeTab('requestedFunds')"
                    class="tab {{ $Tab == 'requestedFunds' ? '  text-adel-Dark-active font-bold border-b-4 border-adel-Dark-active' : 'text-adel-Dark border-b-2 border-adel-Dark' }} cursor-pointer text-xl  px-2 py-2 pb-8">
                    الأموال المطلوبة
                </a>
                <a wire:click="changeTab('expenses')"
                    class="tab {{ $Tab == 'expenses' ? ' text-adel-Dark-active font-bold border-b-4 border-adel-Dark-active' : 'text-adel-Dark  border-b-2 border-adel-Dark' }} cursor-pointer text-xl  px-2 py-2 pb-8">
                    نفقات
                </a>
            </div>
        </nav>
    </div>


    <div class="">
        @if ($Tab === 'invoices')
            @livewire('invoices')
        @elseif($Tab === 'requestedFunds')
            @livewire('requestedFunds')
        @elseif($Tab === 'expenses')
            @livewire('expenses')
        @endif
    </div>
</div>

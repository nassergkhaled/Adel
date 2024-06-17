<div class="">
    <div class="flex justify-center items-center my-5">
        <nav class="bg-gray-100 border-2 border-dashed border-adel-Dark rounded-lg p-4 shadow-md w-full md:w-1/2 lg:w-1/3 flex justify-around items-center">
            <div class="flex flex-col md:flex-row md:gap-3 w-full justify-between items-center">
                <a wire:click="changeTab('invoices')"
                    class="{{ $Tab == 'invoices' ? 'bg-adel-Dark-hover text-white' : 'text-gray-700' }} cursor-pointer text-center px-2 py-2 hover:bg-adel-Dark-hover hover:text-white rounded-md">الفواتير</a>
                <a wire:click="changeTab('requestedFunds')"
                    class="{{ $Tab == 'requestedFunds' ? 'bg-adel-Dark-hover text-white' : 'text-gray-700' }} cursor-pointer text-center px-2 py-2 text-gray-700 hover:bg-adel-Dark-hover hover:text-white rounded-md">الأموال
                    المطلوبة</a>
                <a wire:click="changeTab('expenses')"
                    class="{{ $Tab == 'expenses' ? 'bg-adel-Dark-hover text-white' : 'text-gray-700' }} cursor-pointer text-center px-2 py-2 text-gray-700 hover:bg-adel-Dark-hover hover:text-white rounded-md">نفقات</a>
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


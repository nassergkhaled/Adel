<style>
    .modal-box {
        width: 91.666667%;
        max-width: 40rem
            /* 512px */
        ;
    }

    .modal {
        /* align-items: center; */
        margin-left: auto;
        margin-right: auto;

    }
</style>
<dialog id="ocr_scan" class="modal modal-middle sm:modal-middle" style="width:90%;">
    <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
        <form method="dialog">
            <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
        </form>
        <h3 class="font-bold text-2xl text-center">{{ __('ماسح الملفات') }}</h3>
        <div class="my-5">
            <hr>
        </div>
        @livewire('ocrScan')
    </div>
</dialog>

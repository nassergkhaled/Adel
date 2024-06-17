@props(['case', 'session'])
@php
    if ($session) {
        $session_id = $session->id;
    } else {
        $session_id = null;
    }
@endphp
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
<dialog id="addWitness" class="modal modal-middle sm:modal-middle" style="width:90%;">
    <div class="modal-box text-black bg-white text-lg" style="width: 90%;">
        <form method="dialog">
            <button type="submit" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-[1.37rem]">✕</button>
        </form>
        <h3 class="font-bold text-2xl text-center">{{ __('إضافة شاهد') }}</h3>
        <div class="my-5">
            <hr>
        </div>

        @if (session()->has('ValError') && session()->get('ValError') == 'Verify the entered data!')
            @livewire('addWitnessById', ['case' => $case, 'valError' => true, 'sessionId' => $session_id])
        @else
            @livewire('addWitnessById', ['case' => $case, 'valError' => false, 'sessionId' => $session_id])
        @endif
    </div>
</dialog>

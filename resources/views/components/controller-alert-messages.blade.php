@props(['session'])
<div class="flex">
    <div class="w-[15%]">
    </div>
    <div class="mt-5 w-[85%] pe-8">
        @if ($session->has('msg'))
            <div class="w-[85%] flex justify-center">
                <div role="alert" id="alert_message"
                    class="alert alert-success w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ __($session->get('msg')) }}</span>
                </div>
            </div>
        @elseif ($session->has('ValError'))
            <div class="w-[85%] flex justify-center">
                <div role="alert" id="alert_message"
                    class="alert alert-warning w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>{{ __($session->get('ValError')) }}</span>
                </div>
            </div>
        @elseif ($session->has('errMsg'))
            <div class="w-[85%] flex justify-center">
                <div role="alert" id="alert_message"
                    class="alert alert-error w-[20%] mx-auto text-center shadow-lg transition ease-in-out duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ __($session->get('errMsg')) }}</span>
                </div>
            </div>
        @endif
    </div>
</div>

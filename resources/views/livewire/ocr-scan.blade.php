<div class="flex flex-col w-full">
    <form wire:submit.prevent="Go" method="post" class="flex justify-between mb-2" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="language" value="eng">
        <div class="flex flex-col w-full gap-y-2">
            <div class="border-2 border-dashed border-adel-Dark rounded-lg p-4 w-full flex justify-between">
                <label class="">
                    <span
                        class="flex my-auto bg-[#BF9874] text-white px-4 py-1 rounded-lg text-sm hover:bg-adel-Light-hover hover:text-adel-Dark hover:border-adel-Dark border border-transparent transition-all ease-in-out duration-150">
                        اضغط لإرفاق ملف
                    </span>
                    <input type="file" onchange="loadFile(event)" wire:model.defer="image" id="file_input"
                        accept="image/*"
                        class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 hidden file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-adel-Normal file:text-white hover:file:bg-adel-Dark-hover file:transition file:ease-in-out file:duration-100" />
                </label>
                <input id="file-name" wire:model="imageName"
                    class="text-sm text-slate-900 flex items-center justify-center border border-transparent" disabled
                    value="لم يتم اختيار ملف">
                <span></span>
                <span></span>
                <span></span>
                <button type="button" id="clearButton" hidden class="" onclick="clearFile(this)">
                    <i
                        class="fa-solid fa-eraser rounded-full hover:bg-black hover:bg-opacity-5 p-1 text-adel-Dark hover:text-adel-Normal-hover transition-all duration-100 ease-in-out"></i>
                </button>

                @error('file')
                    <p class="text-sm text-red-500">* {{ __($message) }}</p>
                @enderror
            </div>
            <div class="w-full flex justify-between">
                <div class="flex gap-x-5">
                    <div class="">
                        <label for="ara">عربي </label>
                        <input type="radio" name="lang" id="ara" wire:model.defer="language" value="ara"
                            class="text-adel-Normal ring-transparent focus:ring-adel-Light-hover transition-all duration-100 ease-in-out">
                    </div>
                    <div class="">
                        <label for="eng">انجليزي </label>
                        <input type="radio" name="lang" wire:model.defer="language" id="eng" value="eng"
                            class="text-adel-Normal ring-transparent focus:ring-adel-Light-hover transition-all duration-100 ease-in-out">
                    </div>
                </div>
                <div class="">
                    <button type="button" wire:click="resetAll" onclick="clearname()"
                        class="border border-adel-Normal rounded-full size-10 text-adel-Normal bg-adel-Light-hover hover:bg-transparent transition-all duration-100 ease-in-out"><i
                            class="fa-solid fa-xmark"></i></button>
                    <button type="submit"
                        class="border border-adel-Normal rounded-full px-10 py-1 text-adel-Normal bg-adel-Light-hover hover:bg-transparent transition-all duration-100 ease-in-out">مسح</button>
                </div>
            </div>
        </div>
    </form>
    <div class="w-full text-3xl my-5 text-center" wire:loading>
        <span class="loading loading-dots loading-lg text-adel-Normal"></span>
    </div>
    <div class="w-full" wire:loading.remove>
        <textarea class="w-full rounded-xl" disabled wire:model.defer="ocrResult" cols="30" rows="10"
            dir="{{ $this->language == 'ara' ? 'rtl' : 'ltr' }}" wire:target="quantity">{{ $ocrResult }}</textarea>
    </div>
</div>

<script>
    var loadFile = function(event) {
        var input = event.target;
        var file = input.files[0];
        var fileNameElement = document.getElementById('file-name');
        fileNameElement.value = file.name;
        // document.getElementById('clearButton').hidden = false;
    };

    function clearname()
    {
        document.getElementById('file_input').value = '';
        document.getElementById('file-name').value = "لم يتم اختيار ملف";
    }
</script>

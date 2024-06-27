<?php

namespace App\Livewire;

use App\Http\Controllers\OCRController;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class OcrScan extends Component
{
    use WithFileUploads;

    public $image;
    public $ocrResult = "اختر ملف لمسحه ...";
    public $language = 'ara';
    public $imageName = "لم يتم اختيار ملف";

    public function Go()
    {
        $this->validate([
            'image' => 'required|image|max:10240', // 10MB Max
        ]);

        $ocr = new OCRController();
        $this->ocrResult = $ocr->wireParseImage([
            'language' => $this->language,
            'image' => $this->image->getRealPath(),
            'filename' => $this->image->getClientOriginalName(),
        ]);
        // $this->reset('image');
    }
    public function resetAll()
    {
        $this->image = "";
        $this->ocrResult = "اختر ملف لمسحه ...";
        $this->language = 'ara';
        $this->imageName = "لم يتم اختيار ملف";
    }

    public function render()
    {
        return view('livewire.ocr-scan');
    }
}

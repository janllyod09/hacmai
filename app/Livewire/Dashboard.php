<?php
namespace App\Livewire;

use Livewire\Component;
use App\Services\PdfTemplateService;
use Illuminate\Support\Facades\File;

class Dashboard extends Component
{
    public $first_name, $middle_name, $last_name, $blk, $lot, $position, $street = [];
    public $qualifications = []; // Ensure this is an array

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'last_name' => 'required|string|max:255',
        'blk' => 'required|string|max:255',
        'lot' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'qualifications' => 'required|array|min:1',
    ];

    public function generatePdf()
    {
        $this->validate();

        // Ensure temp directory exists
        $tempDir = storage_path('app/temp');
        if (!File::exists($tempDir)) {
            File::makeDirectory($tempDir, 0755, true);
        }

        // Path to your PDF template
        $templatePath = storage_path('app/templates/Certificate-of-Candidacy-2022-to-2023.pdf');
       
        // Prepare output path
        $outputPath = storage_path('app/temp/filled_form.pdf');
       
        // Prepare data
        $data = [
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'blk' => $this->blk,
            'lot' => $this->lot,
            'street' => $this->street,
            'position' => $this->position,
            'qualifications' => $this->qualifications,
        ];
       
        // Use PDF template service
        $pdfTemplateService = new PdfTemplateService();
        $filledPdfPath = $pdfTemplateService->fillPdfTemplate($templatePath, $outputPath, $data);
       
        // Return the PDF for download
        return response()->download($filledPdfPath, 'Certificate-of-Candidacy-2022-to-2023.pdf')->deleteFileAfterSend(true);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
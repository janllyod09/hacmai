<?php

namespace App\Services;

use setasign\Fpdi\Fpdi;

class PdfTemplateService
{
    public function fillPdfTemplate($templatePath, $outputPath, $data)
    {
        // Ensure qualifications is always an array
        $data['qualifications'] = is_array($data['qualifications']) ? $data['qualifications'] : [];

        // Create a new PDF instance
        $pdf = new Fpdi();
        
        // Add the template page
        $pdf->setSourceFile($templatePath);
        $templatePage = $pdf->importPage(1);
        
        // Create a new page with the same size as the template
        $pdf->AddPage();
        $pdf->useTemplate($templatePage);
        
        // Set font and margins
        $leftMargin = 25;
        $rightMargin = 25;
        $pageWidth = 210; // A4 width in mm
        $availableWidth = $pageWidth - $leftMargin - $rightMargin;

        $pdf->SetFont('Arial', 'B', 24); // Bold, larger font for the title
        $title = "CERTIFICATE OF CANDIDACY";
        $titleWidth = $pdf->GetStringWidth($title); // Get the width of the title text
        $pdf->SetXY(($pageWidth - $titleWidth) / 2, 30); // Centered horizontally, 10mm from the top
        $pdf->Cell($titleWidth, 10, $title, 0, 1, 'C'); // Print the title
        
        // Set starting position for introductory text
        $pdf->SetXY($leftMargin, 45);        

        // Fill in the introductory statement with full name and address
        $fullName = "{$data['last_name']}, {$data['first_name']} {$data['middle_name']}";
        $address = implode(', ', [
            is_array($data['blk']) ? implode(' ', $data['blk']) : $data['blk'],
            is_array($data['lot']) ? implode(' ', $data['lot']) : $data['lot'],
            is_array($data['street']) ? implode(' ', $data['street']) : $data['street'],
        ]);
        
        // Introductory text
        $introText = "I, {$data['last_name']}, {$data['first_name']} {$data['middle_name']} of legal age and a resident of {$data['blk']} {$data['lot']} {$data['street']} Courtyard of Maia Alta Dalig 2, Antipolo City Rizal is filing my candidacy to run on the below position (Choose only the most desired and suitable position):";

        // Use MultiCell with justified alignment
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell($availableWidth, 6, $introText, 0, 'J');
        
        // Render positions with checkboxes
        $positions = [
            'President',
            'Vice President',
            'Secretary',
            'Treasurer',
            'Auditor',
            'Board of Director (1 of 3 Slots)'
        ];

        $yPosition = $pdf->GetY() + 5; // Starting Y-coordinate for positions
        $indent = 35;
        foreach ($positions as $position) {
            $pdf->SetXY($indent, $yPosition);
            $checked = ($data['position'] === $position) ? '[ / ]' : '[   ]';
            $pdf->Cell(0, 5, "$checked $position", 0, 1);
            $yPosition += 5; // Move down for the next position
        }
        
        // Add the qualifications section header with justified text
        $pdf->SetXY($leftMargin, $yPosition + 5);
        $pdf->MultiCell($availableWidth, 6, "I hereby confirm that I am qualified to the position in compliance and defined by the Constitution and By Law (Please check all applicable qualifications):", 0, 'J');

        $qualifications = [
            'Must be of legal age',
            'Must be in good standing',
            'Must be an actual resident of Courtyard of Maia Alta for at least six (6) months as certified by the association secretary',
            'Has not been convicted by final judgement of an offense involving moral turpitude',
            'Legitimate Spouse of a member may be a candidate in lieu of the member - in accordance with the provisions of Rule 9 of Implementing Rules and Regulations of Magna Carta for Homeowners and Homeowners Associations'
        ];
        
        $extraMargin = 10; // Extra margin on the right side for qualifications
        $availableWidthForQualifications = $availableWidth - $extraMargin;
        
        $yPosition += 20; // Move down a bit after the section header
        $indent = 35;
        
        foreach ($qualifications as $qualification) {
            $pdf->SetXY($indent, $yPosition);
            
            // Check if the qualification is selected
            $checked = in_array($qualification, $data['qualifications']) ? '[ / ]' : '[   ]';
            
            // Render the checkbox and qualification
            $pdf->MultiCell($availableWidthForQualifications, 6, "$checked $qualification", 0, 'J');
            
            // Adjust Y position for the next item
            $yPosition = $pdf->GetY() + 2; // Add a small buffer
        }
        
        // Candidate's signature section
        $indent = 25; // Left alignment same as positions
        $pdf->SetXY($indent, $yPosition + 5);
        $pdf->Cell(0, 6, "{$data['first_name']} {$data['middle_name']} {$data['last_name']}", 0, 1, 'L');

        $pdf->SetXY($indent, $pdf->GetY());
        $pdf->Cell(0, 6, 'Candidates Signature Over Printed Name', 0, 1, 'L');

        $pdf->SetXY($indent, $pdf->GetY());
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(0, 6, '(to be signed during personal filing / candidate presentation)', 0, 1, 'L');

        // Output the filled PDF
        $pdf->Output('F', $outputPath);

        return $outputPath;
    }
}

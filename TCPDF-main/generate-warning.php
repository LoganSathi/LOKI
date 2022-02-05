<?php

require_once('tcpdf.php');

function generate_pdf_cons($student_id, $student_name, $parent, $warning_id)
{

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Dummy Warning Letter');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');



    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    // Set some content to print
    $html = <<<EOD
<h4>[School Name][Logo]</h4><br>
<i></i><br><br>
Mr/Mrs./Ms $parent,<br>
<p>This letter serves to provide an official warning to <b>$student_name</b> for his/her
unfavourable attendance records.</p>
<p>This is to inform you that the aforementioned student was absent for <b>3 consecutive
days</b>. If the student’s attendance in the upcoming days does not improve, you will have
to meet the principle regarding the student’s absenteeism.</p>
<p> We remind you that the college regulations state that if a student is absent for
3 consecutive days or 10 total days per year irrespective of any reason, it will be
considered as violation of school attendance policy. Please be guided accordingly.</p>
<br><br>
Sincerely,<br><br><br>
[Principal Name]<br>
Principal of [School Name]
EOD;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $PDF_name =  $warning_id . '.pdf';
    $pdf->Output(__DIR__ . '/generated-warning/' . $PDF_name, 'F');

    //============================================================+
    // END OF FILE
    //============================================================+// create new PDF document

}

function generate_pdf_total($student_id, $student_name, $parent, $warning_id)
{

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Dummy Warning Letter');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');



    // set header and footer fonts
    $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);

    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    // Set some content to print
    $html = <<<EOD
<h4>[School Name][Logo]</h4><br>
<i></i><br><br>
Mr/Mrs./Ms $parent,<br>
<p>This letter serves to provide an official warning to <b>$student_name</b> for his/her
unfavourable attendance records.</p>
<p>This is to inform you that the aforementioned student was absent for <b>10 total days for this year</b>. If the student’s attendance in the upcoming days does not improve, you will have
to meet the principle regarding the student’s absenteeism.</p>
<p> We remind you that the college regulations state that if a student is absent for
3 consecutive days or 10 total days per year irrespective of any reason, it will be
considered as violation of school attendance policy. Please be guided accordingly.</p>
<br><br>
Sincerely,<br><br><br>
[Principal Name]<br>
Principal of [School Name]
EOD;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $PDF_name =  $warning_id . '.pdf';
    $pdf->Output(__DIR__ . '/generated-warning/' . $PDF_name, 'F');

    //============================================================+
    // END OF FILE
    //============================================================+// create new PDF document

}

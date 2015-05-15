<?php
App::import('Vendor','xtcpdf');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetFont('dejavusans', '',7, '', true);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();
$html = "</pre><h1>Your Search String:- <u>{ $serachtext } </u></h1><pre>";
foreach($data as $val){
    $html.= "FILE PATH:-  <strong><i>".$val['dir']."</i></strong>  LINE NUMBER:-<strong>[".$val['lineno']."]</strong></strong><br>";
}
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->lastPage();
echo $pdf->Output(APP . 'files/pdf' . DS . "$filename".".pdf", 'F');

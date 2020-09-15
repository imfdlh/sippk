<?php
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = base_url('assets/img/custom/logo-pusri.jpg');
        $this->Image($image_file, 10, 10, 40, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 20, 'Tiket', 0, '', 'R', 0, '', '', true);
        $this->SetFont('helvetica', '', 20);
        $this->Cell(0, 40, 'Permintaan Perbaikan', 0, '', 'R', 0, '', '', true);
        $this->Cell(0, 60, 'Perangkat Komputer', 0, '', 'R', 0, '', '', true);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetX(80);
        $this->SetY(-22);
        // Set font
        $this->SetFont('helvetica', 'B', 10);
        // Page number
        $this->Cell(0, 0, 'Sistem Informasi Permintaan Perbaikan Perangkat Komputer', 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->SetFont('helvetica', 'I', 10);
        $this->SetY(-14);
        $this->Cell(0, 0, '© 2018 Copyright: PT Pupuk Sriwidjaja Palembang', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PT Pupuk Sriwidjaja Palembang');
$pdf->SetTitle($title);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 18);
$pdf->SetMargins(5, 28, 10, true);
// add a page
$pdf->AddPage('L', 'A4');

$border1 = array(
	'B' => array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Cell(287, 30, '', $border1, 1, 'C', 0, '', 0, false, 'T', 'C');


$border2 = array(
	'B' => array('width' => 0.1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Cell(285, 122, '', $border2, 1, 'C', 0, '', 0, false, 'T', 'C');

$pdf->SetMargins(22, 10, 10, true);

foreach($formulir as $row)
{
	$pdf->SetY(90);
	$pdf->Cell(0, 0, 'No. Badge : '.$row->no_badgepelapor, 0, false, 'L', 0, '', 0, false, 'T', 'M');
	$pdf->SetY(100);
	$pdf->Cell(0, 0, 'Pelapor : '.$row->nama_pelapor, 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $pdf->SetY(118);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 0, 'No. Inventaris: '.$row->no_inventaris, 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $pdf->SetY(124);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 0, $row->nama_jenisperangkat.' | '.$row->nama_merk, 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $pdf->SetY(137);
    $pdf->SetFont('helvetica', 'I', 11);
    $pdf->Cell(0, 0, date('d/m/Y', strtotime($row->waktu_permintaanmasuk)) .' - '. date('H:i:s', strtotime($row->waktu_permintaanmasuk)), 0, false, 'L', 0, '', 0, false, 'T', 'M');
}
// CUSTOM PADDING

// set color for background
$pdf->SetFillColor(49, 175, 222);
$pdf->SetTextColor(255, 255, 255);

// set font
$pdf->SetFont('helvetica', 'B', 22);

// set cell padding
$pdf->setCellPaddings(15, 15, 15, 15);

$tiket = $this->uri->segment(3);

$txt = $tiket;

$border3 = array(
	'T' => array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(45, 157, 199)),
	'R' => array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(45, 157, 199)),
	'B' => array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(45, 157, 199)),
	'L' => array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(45, 157, 199)));

$pdf->MultiCell(90, 5, 'No. Tiket : '.$txt, $border3, 'C', 1, 0, 185, 90, true);

$pdf->lastPage();
//Close and output PDF document

$filename = 'Tiket_'.$tiket.'.pdf';
$string = $pdf->Output($filename, 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
<?php
$user = $this->session->userdata('username');
$email = $this->session->userdata('email');
$sql = $this->db->select('*')->from('tbl_applicant_bio')->where('user_name',$user)->get();
$query = $sql->row();
$name = $query->fname.' '. $query->mname.' '. $query->lname;
$h_address = $query->haddress;
$c_address = $query->caddress;
$skill_info =	$_POST['skill'];
$accomplishment_info =	$_POST['accomplishment'];
$education_info =	$_POST['education'];
$seminar_info =	$_POST['seminars'];
$workxp_info =	$_POST['workxp'];
//============================================================+
// File name   : example_003.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 003 for TCPDF class
//               Custom Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Custom Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		// $image_file = 'C:\xampp\htdocs\ojt\assets\img\logo\ustp.jpg';
		// $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// // Set font
		// $this->SetFont('helvetica', 'B', 20);
		// // Title
		//$this->Cell(0, 15, 'Resume', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('USTP');
$pdf->SetTitle('Resume');
$pdf->SetSubject('Resume Creation');
$pdf->SetKeywords('Resume');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// // set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// // set default monospaced font
// $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// // set margins
// $pdf->SetMargins(10,15,15);
// $pdf->SetHeaderMargin(0);
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
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$skill = '<ul>';

$i = 0;
foreach ($skill_info as $qual) {
	$skill.='<br><li>'.$skill_info[$i]->skill.'</li>';
	$i++;
}
$skill.='</ul>';
////////////////////////////////////////////

$accomplishment = '<ul>';

$i = 0;
foreach ($accomplishment_info as $qual) {
	$accomplishment.='<br><li>'.$accomplishment_info[$i]->accomplishment;
	$accomplishment.='<br><label>Affiliation: </label>'.$accomplishment_info[$i]->affiliation.'</li>';
	$i++;
}
$accomplishment.='</ul>';
///////////////////////////////////////////

$workxp = '<ul>';

$i = 0;
foreach ($workxp_info as $qual) {
	$workxp.='<br><li><label>Position: </label>'.$workxp_info[$i]->position;
	$workxp.='<br><label>Company: </label>'.$workxp_info[$i]->company;
	$workxp.='<br><label>Date Started: </label>'.$workxp_info[$i]->date_start;
	$workxp.='<br><label>Date Ended: </label>'.$workxp_info[$i]->date_end.'</li>';
	$i++;
}
$workxp.='</ul>';

/////////////////////////////////////////

$education = '<ul>';

$i = 0;
foreach ($education_info as $qual) {
	$education.='<br><li><label>Level: </label>'.$education_info[$i]->level;
	$education.='<br><label>School: </label>'.$education_info[$i]->school;
	$education.='<br><label>Date Started: </label>'.$education_info[$i]->start;
	$education.='<br><label>Date Graduated: </label>'.$education_info[$i]->graduated.'</li>';
	$i++;
}
$education.='</ul>';

///////////////////////////////////////

$seminar = '<ul>';

$i = 0;
foreach ($seminar_info as $qual) {
	$seminar.='<br><li><label>Seminar Name: </label>'.$seminar_info[$i]->seminar;
	$seminar.='<br><label>Date Conducted: </label>'.$seminar_info[$i]->seminar_date;
	$seminar.='<br><label>Conducted by: </label>'.$seminar_info[$i]->conductedby;
	$i++;
}
$seminar.='</ul>';

// Set some content to print
$html = '<style>
    body {
        padding: 5px;
        font-family: Monospace;
        font-size: .8em;
    }

    hr {
        font-weight: bold;
    }

    /* p {
        width: 50%;
    } */

    span {
        float: right;
        ;
    }
</style>

<body>
    <div style="text-align: center">
        <p style="text-align:center;">University of Science and Technology of Southern Philippines</p>

        <p style="text-align:center;">Alubijid | Cagayan de Oro | Claveria | Jasaan | Oroquieta | Panaon</p>

        <p style="text-align:center;">C.M. Recto Ave., Lapasan,Cagayan de Oro City,Philippines,9000</p>

    </div>
    <div>

        <div style="width:50%;margin-right:0px;text-align:center;">
            <img style="width:200px;height:200px;" src="C:/xampp/htdocs/ojt/assets/img/profile_pics/'.$user.'_pic.png">
		</div>
		<div>
                <p>Name: '.$name.'</p>
                <p>Home Address: '.$h_address.'</p>
                <p>Current Address: '.$c_address.'</p>
                <p>Email Address: '.$email.'</p>
        </div>
    </div>
    <div style="display: block">
        <hr>
        <h2>Skills/Qualifications:</h2> '.$skill.'
        <h2>Accomplishments:</h2> '.$accomplishment.'
        <h2>Work Experience:</h2> '.$workxp.'
        <h2>Educational Background:</h2> '.$education.'
        <h2>Seminars Attended:</h2> '.$seminar.'
    </div>
</body>';


// print a block of text using Write()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Resume.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

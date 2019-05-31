<?php
$year=$_POST["Year"];
$mes=$_POST["Mes"];
$m = '';
switch ($mes) {
	case 1:
		$m='Enero';
		break;
	case 2:
		$m='Febrero';
		break;
		case 3:
		$m='Marzo';
		break;
		case 4:
		$m='Abril';
		break;
		case 5:
		$m='Mayo';
		break;
		case 6:
		$m='Junio';
		break;
		case 7:
		$m='Julio';
		break;
		case 8:
		$m='Agosto';
		break;
		case 9:
		$m='Septiembre';
		break;
		case 10:
		$m='Octubre';
		break;
		case 11:
		$m='Noviembre';
		break;
		case 12:
		$m='Diciembre';
		break;
	default:
		# code...
		break;
}
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
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
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
include ("../../conexion.php");
function fetch_data($year,$mes)
{
	$output = '';  
	include ("../../conexion.php");
					// Colors, line width and bold font
					//My sql
					$result = mysqli_query($conexion,"SELECT d.CodDonacion,d.FecDonacion,d.Monto,d.Estado,per.Nombre,per.Apellido,p.Pais,per.Correo FROM Donaciones as d inner join Usuarios 
					on d.CodDonador=Usuarios.CodUsuario inner join Personas as per on Usuarios.CodPersona = per.CodPersona inner join Paises as p on p.CodPais=per.CodPais WHERE YEAR(d.FecDonacion)=$year
					AND MONTH(d.FecDonacion)=$mes AND d.Estado='A' order by CodDonacion ASC");
	$total_amt = 0;
	while($row = mysqli_fetch_array($result)) { 
	$output .= '<tr>  
														<td style="border-bottom:1px thin #666"; align="center">'.$row["CodDonacion"].'</td>  
														<td style="border-bottom:1px thin #666"; align="center">'.$row["FecDonacion"].'</td>  
														<td style="border-bottom:1px thin #666"; align="center">'.$row["Nombre"].' '.$row["Apellido"].'</td>  
														<td style="border-bottom:1px thin #666"; align="center">'.$row["Correo"].'</td>   
														<td style="border-bottom:1px thin #666"; align="center">'.$row["Pais"].'</td>    
														<td style="border-bottom:1px thin #666"; align="center">$'.$row["Monto"].'</td> 
											 </tr>  
														';  
														$total_amt += $row['Monto']; 
				} 
	$output .= '<tr><td colspan="7" style="border-top:1px thin #666";></td></tr><tr><td colspan="5" align="left"><strong>Total</strong></td><td align="center">$'.number_format($total_amt,2).'</td></tr>';
      return $output;
}
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('TADESA');
$pdf->SetTitle('Reporte Mensual');
$pdf->SetSubject('Reporte del mes');
$pdf->SetKeywords('TCPDF, PDF, reporte, test, guide');

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
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
// Set some content to print
$html = <<<EOD
<h1>Talleres Deportivos de El Salvador <a href="http://esservicios.net/tadesa/" style="text-decoration:none;background-color:#CC0000;color:black;"><span style="color:black;">TA</span><span style="color:white;">DE</span><span style="color:black;">SA</span></a></h1>
<i>Reporte del Mes $m del Año $year</i>
<br>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$content = ''; 

      $content .= '  

      <table border="1"><tr><td width="100%">
      <table border="0">
           <tr bgcolor="#796799" style="color:#FFF;">' ;
					 $pdf->SetFont('dejavusans', '', 10, '', true); 

        $content .= '  
                <th width="10%" align="center">Codigo</th>  
                <th width="15%" align="center">Fecha</th>   
                <th width="35%" align="center">Nombre</th> 
								<th width="15%" align="center">Correo</th>  
								<th width="15%" align="center">Pais</th>   
								<th width="10%" align="center">Monto</th> 
           </tr>  
      '; 
			$pdf->SetFont('dejavusans', '', 10, '', true);
      $content .= fetch_data($year,$mes);  
      $content .= '</table></td></tr></table>';  
$pdf->writeHTML($content);  

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('reporte_mensual.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

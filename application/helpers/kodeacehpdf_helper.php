<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('kodeacehpdf')){

	function kodeacehpdf($konten,$filename,$kertas,$posisi=false){
			 ob_start();
		    //include($konten);
		    $content = ob_get_clean();

		    // convert in PDF
		     require_once(APPPATH.'helpers/pdf/html2pdf.class.php');
		    try
		    {
		    	if($posisi==false){
		        	$html2pdf = new HTML2PDF('P', $kertas, 'fr');
		  		  }else{
		  		  	$html2pdf = new HTML2PDF('L', $kertas, 'fr');
		  		  }
		//      $html2pdf->setModeDebug();
		        $html2pdf->setDefaultFont('Arial');
		        $html2pdf->writeHTML($konten);
		        $html2pdf->Output($filename);
		    }
		    catch(HTML2PDF_exception $e) {
		        echo $e;
		        exit;
		    }

	}
}
?>
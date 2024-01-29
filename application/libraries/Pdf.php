<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__ . '/dompdf/autoload.inc.php');
//require_once 'vendor/autoload.php';

use Dompdf\Dompdf as Dompdf;
class Pdf
{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='Portrait'){
       // $dompdf = new Dompdf\DOMPDF();
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $options->set('isRemoteEnabled', true);
        $dompdf->setOptions($options);
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        
        
        $dompdf->render();
        
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }
}
?>
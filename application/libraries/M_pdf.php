<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class m_pdf {
    
    function m_pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
    function load($param=NULL)
    {
        
       // APPPATH.'/third_party/mpdf/mpdf.php';
       
       //print_r(APPPATH.'libraries/mpdf/mpdf.php');exit;
        include_once  APPPATH.'libraries/mpdf/mpdf.php';
         print_r(APPPATH.'libraries/mpdf/mpdf.php');exit;
        if ($params == NULL)
        {
            $param = '"en-GB-x","A4","","",10,10,10,10,6,3';           
        }
        return new mPDF();
    }
}
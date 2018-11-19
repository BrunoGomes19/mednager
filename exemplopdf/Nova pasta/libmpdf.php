<?php 

class M_pdf 
{ 
    function __construct()
    { 
        include_once APPPATH.'vendor\autoload.php'; 
    } 
    function pdf()
    { 
        $CI = & get_instance(); 
        log_message('Debug', 'mPDF class is loaded.'); 
    } 
    function load($param=[])
    { 
        return new \Mpdf\Mpdf($param); 
    } 
}
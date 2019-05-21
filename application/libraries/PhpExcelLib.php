<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /* 
     *  ======================================= 
     *  Author     : Muhammad Surya Ikhsanudin 
     *  License    : Protected 
     *  Email      : mutofiyah@gmail.com 
     *   
     *  Dilarang merubah, mengganti dan mendistribusikan 
     *  ulang tanpa sepengetahuan Author 
     *  ======================================= 
     */  
    require_once dirname(__FILE__) . '/PHPExcel/PHPExcel.php';
    class PhpExcelLib extends PHPExcel { 
        public function __construct() { 
            parent::__construct(); 
        } 
    }
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{

    private $empresa, $idEmpresa, $tituloReporte, $texto1, $texto2 , $texto3, $formato;
    function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false)
    {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }






public function ColoredTable($header,$data,$w) {
        // Colors, line width and bold font
        $this->SetFillColor(204, 204, 204);
        $this->SetTextColor(0);
        $this->SetDrawColor(238,238,238);
        $this->SetLineWidth(0);
        $this->SetFont('', 'B');
        // Header
        
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 5, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
          $this->SetFillColor(238, 238, 238);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
        	for($i = 0; $i < $num_headers; ++$i) {
            	//$this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
                $this->Cell($w[$i], 5, $row[$i], 'BT', 0, 'L', $fill);
        	}	

			/*
    		$this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);*/        	
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }    



    public function ColoredTableAlign($header,$data,$w, $a) {
            // Colors, line width and bold font
            $this->SetFillColor(204, 204, 204);
            $this->SetTextColor(0);
            $this->SetDrawColor(238,238,238);
            $this->SetLineWidth(0);
            $this->SetFont('', 'B');
            // Header        
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 5, $header[$i], 1, 0, $a[$i], 1);
            }
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(238, 238, 238);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = 0;
            foreach($data as $row) {
                for($i = 0; $i < $num_headers; ++$i) {
                    //$this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
                    $this->Cell($w[$i], 6, $row[$i], 'BT', 0, $a[$i], $fill);
                }           
                $this->Ln();
                $fill=!$fill;
            }
            $this->Cell(array_sum($w), 0, '', 'T');
    
    }    



    public function ColoredTableAlignAndTotals($header,$data,$totales,$w, $a) {
            // Colors, line width and bold font
            $this->SetFillColor(204, 204, 204);
            $this->SetTextColor(0);
            $this->SetDrawColor(0,0,0);
            $this->SetLineWidth(0);
            $this->SetFont('', 'B');
            // Header        
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 5, $header[$i], 'BT', 0, $a[$i], 1);
            }
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(238, 238, 238);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = 0;
            foreach($data as $row) {
                for($i = 0; $i < $num_headers; ++$i) {
                    //$this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
                    $this->Cell($w[$i], 5, $row[$i], 'BT', 0, $a[$i], $fill);
                }           
                $this->Ln();
               // $fill=!$fill;
            }


            $this->SetFillColor(204, 204, 204);
            $this->SetTextColor(0);
            $this->SetDrawColor(0, 0, 0);
            $this->SetLineWidth(0);
            $this->SetFont('', 'B');

            $num_headers = count($totales);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 5, $totales[$i], 'BT', 0, $a[$i], 1);
            }
          //  $this->Ln();

    }    


    public function ColoredTableAlignAndTotals2($header,$data,$totales,$w, $a) {
            // Colors, line width and bold font
            $this->SetFillColor(204, 204, 204);
            $this->SetTextColor(0);
            $this->SetDrawColor(238,238,238);
            $this->SetLineWidth(0);
            $this->SetFont('', 'B');
            // Header        
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 7, $header[$i], 1, 0, $a[$i], 1);
            }
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(238, 238, 238);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = 0;
            foreach($data as $row) {
                for($i = 0; $i < $num_headers; ++$i) {
                    //$this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
                    $this->Cell($w[$i], 4, $row[$i], 'BT', 0, $a[$i], $fill);
                }           
                $this->Ln();
                $fill=!$fill;
            }


             $this->SetFillColor(204, 204, 204);
            $this->SetTextColor(0);
            $this->SetDrawColor(204, 204, 204);
            $this->SetLineWidth(0);
            $this->SetFont('', 'B');

            $num_headers = count($totales);
            for($i = 0; $i < $num_headers; ++$i) {
                $this->Cell($w[$i], 7, $totales[$i], 1, 0, $a[$i], 1);
            }
          //  $this->Ln();

    }        



    public function valoresHeader($empresa, $idEmpresa, $tituloReporte, $texto1, $texto2 , $texto3, $formato){
            $this->empresa=$empresa;
            $this->idEmpresa=$idEmpresa;
            $this->tituloReporte=$tituloReporte;
            $this->texto1=$texto1;
            $this->texto2=$texto2;
            $this->texto3=$texto3;
            $this->formato=$formato; 

            $this->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $this->SetMargins(10, 30, 10);
            $this->SetFooterMargin(PDF_MARGIN_FOOTER); 
            $this->SetHeaderMargin(PDF_MARGIN_HEADER);            
            $this->setImageScale(PDF_IMAGE_SCALE_RATIO);
            $this->setFontSubsetting(true);    
                       
    }

        public function Header() {
                $this->SetFont('helvetica', '',7, '', true); 
      switch ($this->CurOrientation) {
    case 'L':

          $tbl = '
                <table cellspacing="0" cellpadding="1" border="0.5" style="width:100%;padding:2px;"  >
                    <tr>
                        <td  rowspan="3" style="width:100px;" align="center" ><img style=" text-align:center; vertical-align:middle;" width="100" src="/First_Sobusa/uploads/FotosClientes/'. $this->idEmpresa .'.jpg" alt="test alt attribute" /></td>
                        <td  colspan="2"  style="font-size:40px; height: 25px; width: 80%"><b align="center">'. $this->empresa .'</b></td>      
                        <td  rowspan="3" style="font-size:40px; height: 25px; width: 100px; text-align: center"><b align="center">'. $this->formato.'</b></td>        
                    </tr>
                    <tr>
                       <td style="font-size:30px;vertical-align:middle;width:50%"> '.$this->tituloReporte.'</td>
                       <td style="font-size:30px;width:30% "> '. $this->texto2.' </td>                   
                    </tr>
                    <tr>
                       <td style="font-size:30px;"> '. $this->texto1.'</td>
                       <td style="font-size:30px"> '. $this->texto3.' </td>                
                    </tr>
                </table>';

        break;
    
    case 'P': 

                $tbl = '
                <table cellspacing="0" cellpadding="1" border="0.5" style="width:90%;padding:2px;"  >
                    <tr>
                        <td  rowspan="3" style="width:100px;" align="center" ><img style=" text-align:center; vertical-align:middle;" width="100" src="/First_Sobusa/uploads/FotosClientes/'. $this->idEmpresa .'.jpg" alt="test alt attribute" /></td>
                        <td  colspan="2"  style="font-size:40px; height: 25px; width: 80%"><b align="center">'. $this->empresa .'</b></td>      
                        <td  rowspan="3" style="font-size:40px; height: 25px; width: 100px; text-align: center"><b align="center">'. $this->formato.'</b></td>        
                    </tr>
                    <tr>
                       <td style="font-size:30px;vertical-align:middle;width:50%"> '.$this->tituloReporte.'</td>
                       <td style="font-size:30px;width:30% "> '. $this->texto2.' </td>                   
                    </tr>
                    <tr>
                       <td style="font-size:30px;"> '. $this->texto1.'</td>
                       <td style="font-size:30px"> '. $this->texto3.' </td>                
                    </tr>
                </table>';
              
                        break;
    default:




        break;
}



                $this->writeHTML($tbl, true, false, false, false, '');    
    }


    public function Footer() {
        
        $this->SetY(-15);
        
        $this->SetFont('helvetica', 'B', 6);        
        $this->Cell(0, 10,  $this->empresa .'-'.$this->tituloReporte, 'T', false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R', 0, '', 0, false, 'T', 'M');
    }



}
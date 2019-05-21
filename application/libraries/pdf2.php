<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class pdf2 extends TCPDF
{



    public function ColoredTableAlignAndTotals($header,$data,$w, $a) {
            // Colors, line width and bold font
            $this->SetFillColor(204, 204, 204);
            $this->SetTextColor(0);
            $this->SetDrawColor(0,0,0);
            $this->SetLineWidth(0);
            $this->SetFont('', 'B');
            // Header        
            $num_headers = count($header);
            for($i = 0; $i < $num_headers; ++$i) {
                  if ($i==3) {
                    $q=$w[3]+$w[4]+$w[5]+$w[6]+$w[7];
                    $i=$i+4;
                    $this->Cell($q, 5, $header[$i], 1, 0, $a[$i], 1);
                  }else if ($i==11) {
                    $qq=$w[11]+$w[12]+$w[13]+$w[14]+$w[15];
                    $i=$i+4;
                    $this->Cell($qq, 5, $header[$i], 1, 0, $a[$i], 1);
                  }else{
                     $this->Cell($w[$i], 5, $header[$i], 1, 0, $a[$i], 1);
                }
            }
            $this->Ln();
            // Color and font restoration
            $this->SetFillColor(238, 238, 238);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = 0;
            $qwe=0;
            $j=0;
            foreach($data as $row) {
                for($i = 0; $i < $num_headers; ++$i) {
                    //$this->Cell($w[$i], 6, $row[$i], 'LR', 0, 'L', $fill);
                    $j=$j+1;
                    $qwe=$j % 4;
                    if ($qwe==0) {
                          $this->Cell($w[$i], 4, $row[$i], 1, 0, $a[$i], $fill);
                    }else{
                          $this->Cell($w[$i], 4, $row[$i], 1, 0, $a[$i], $fill);
                    }
                }

                $this->Ln();
               // $fill=!$fill;
            }


            $this->SetFillColor(204, 204, 204);
            $this->SetTextColor(0);
            $this->SetDrawColor(0, 0, 0);
            $this->SetLineWidth(0);
            $this->SetFont('', 'B');


          //  $this->Ln();

    }    


   



    public function valoresHeader($empresa, $idEmpresa, $tituloReporte, $texto1, $texto2 , $texto3, $formato, $fech, $rut){
            $this->empresa=$empresa;
            $this->idEmpresa=$idEmpresa;
            $this->tituloReporte=$tituloReporte;
            $this->texto1=$texto1;
            $this->texto2=$texto2;
            $this->texto3=$texto3;
            $this->formato=$formato; 
            $this->fech=$fech; 
            $this->rut=$rut; 

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

          $tbl = '<table cellspacing="0" cellpadding="1" border="0.5" style="width:100%;padding:2px;"  >
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
                <table cellspacing="0" cellpadding="1" border="0.5" style="width:99%;padding:2px;"  >
                                <tr>
                                  <th colspan="5" style="font-size:40px; height: 30px; text-align: center">RUTA '. $this->rut.'</th>
                                </tr>
                                <tr>
                                  <td style="font-size:40px; height: 20px; text-align: center" colspan="3" rowspan="2">PLANILLA DESPACHO</td>
                                  <td style="font-size:40px; height: 20px;">NOMBRE1</td>
                                  <td style="font-size:40px; height: 20px;"></td>
                                </tr>
                                <tr>
                                  <td style="font-size:40px; height: 15px;">NOMBRE2</td>
                                  <td style="font-size:40px; height: 15px;"></td>
                                </tr>
                                <tr>
                                  <td style="font-size:40px; height: 15px; text-align: center">FECHA</td>
                                  <td style="font-size:40px; height: 15px; ">'. $this->fech.'</td>
                                  <td style="font-size:40px; height: 15px; ">RUTA '. $this->rut.'</td>
                                  <td style="font-size:40px; height: 15px; ">NOMBRE3</td>
                                  <td style="font-size:40px; height: 15px; "></td>
                                </tr>

                </table>';
              
                        break;
    default:




        break;
}



                $this->writeHTML($tbl, true, false, false, false, '');    
    }





}
?>
<?php
class Input_surat_masuk_pdf extends Fpdf_gen
{
	
    
   function Header()
	{
              
                $this->Image(base_url().'upload/logokabokidinkes.jpg', 10, 20,30,30,'jpeg');
                
                $this->Ln(6);
                //$this->setFont('Arial','',18);
                $this->setFontSize(18);
                $this->setFillColor(255,255,255);
                $this->cell(30,10,'',0,0,'C',0); 
                $this->cell(165,10,'PEMERINTAH KABUPATEN OGAN KOMERING ILIR',0,1,'C',1); 
                //$this->setFont('Arial','',33);
                $this->setFontSize(33);
                $this->cell(30,12,'',0,0,'C',0); 
                $this->cell(165,12,'DINAS KESEHATAN',0,1,'C',1); 
                $this->cell(30,6,'',0,0,'C',0);
                 //$this->setFont('Arial','',12);
                $this->setFontSize(12);
                $this->cell(165,6,'Jl. Letnan Mukhtar Saleh No. 085 Kayuagung 30611 Telp. /Fax : 0711-3221300',0,1,'C',1); 
                $this->cell(30,6,'',0,0,'C',0);
                // $this->setFont('Times','',11);
                $this->setFontSize(11);
                $this->cell(165,6,'Website : www.dinkes.kaboki.go.id Email : dinkesoki@yahoo.co.id',0,1,'C',1); 
                
                $this->Ln(4);
               
                
                //$this->setFont('Arial','',12);
                $this->setFontSize(12);
                
                $this->cell(40,10,'LEMBAR DISPOSISI SARAN',0,1,'L',0);
                $this->Ln(2); 
                
                //$this->setFont('Arial','',10);
                $this->setFontSize(10);
                $this->setFillColor(230,230,200);
                
                
                
    
        }
 
	function Content($data, $data2, $data3)
	{
         
            //$this->setFont('Arial','',10);
            $this->setFontSize(10);
            $this->setFillColor(255,255,255);
           
                    $this->SetX(15);
                $this->SetFillColor(128, 128, 128);
                $this->Cell(60,10, 'Indeks : ' .$data->indek_berkas, 1, 0, 'L', 0);
                $this->Cell(125,10, 'Kode : ' .$data->kode, 1, 1, 'L', 0);

                 $this->SetX(15);
                $this->Cell(60,10, 'Nomor Surat : ' .$data->no_surat, 1, 0, 'L', 0);
                $this->Cell(125,10, 'Tanggal Penyelesaian : '.indonesian_date($data->tgl_surat), 1, 1, 'L', 0);

                 $this->SetX(15);
                 $this->Cell(185,10, 'Asal Surat : ' .$data->dari, 1, 1, 'L', 0);

                 $this->SetX(15);
                 $this->Cell(185,10, 'Perihal / Isi Ringkas : ', 'LR', 1, 'L', 0);
                 
            
                 $this->SetX(15);
                 $this->MultiCell(185,5, $data->isi_ringkas, 0, 'J', false);
                 
                 $this->SetXY(15,93);
                 $this->Cell(185,30, '', 'LR', 1, 'L', 0);
                 
                 
                 $this->SetX(15);
                $this->Cell(60,10, 'Nomor Agenda: '.$data->no_agenda, 1, 0, 'L', 0);
                $this->Cell(60,10, 'Tanggal : '.indonesian_date($data->tgl_diterima), 1, 0, 'L', 0);
                $this->Cell(65,10, 'Lampiran : '.$data->file, 1, 1, 'L', 0);


                

               
                  $n=1;
                  $n2=1;
                
                  // mengambil dari data dari controller jika data
                  // kosong maka hanya menampilkan cell
                  if (!empty($data3)) {
		
                   $this->SetX(15);
               
			//echo "<li><b><i>".$d3->isi_disposisi."</i></b>. Batas : ".indonesian_date($d3->batas_waktu).", Sifat: ".$d3->sifat." </li>";
		
                $this->Cell(60,10, 'Diteruskan kepada :', 'LR', 0, 'L', 0);
                $this->Cell(125,10, 'INSTRUKSI / INFORMASI :', 'LR', 1, 'L', 0);
                    
                    
                    
                    foreach ($data3 as $d3){
                   $row =  $n++. '.   '. $d3->kpd_yth;
                    $row2 =  $n2++. '.   '. $d3->isi_disposisi . ', Batas : '.indonesian_date($d3->batas_waktu).', Sifat: '.$d3->sifat;
                 
                      $this->SetX(15);
                    $this->MultiCell(60,5, $row,  0, 'L', false);
                    $this->SetX(75);
                    //$this->MultiCell(125,5, $d3->isi_disposisi . ', Batas : '.$d3->batas_waktu.', Sifat: '.$d3->sifat, 0, 'J', false);
                    $this->MultiCell(115,5, $row2, 0, 'L', false);
                }
                $this->SetXY(15,143);
                $this->Cell(60,100, '', 'LRB', 0, 'L', 0);
                $this->SetXY(75,143);
                $this->Cell(125,100, '', 'LRB', 0, 'L', 0);
                //}
                
            }
            else{
               $this->SetX(15);
                $this->Cell(60,10, 'Diteruskan kepada :', 'LR', 0, 'L', 0);
                $this->Cell(125,10, 'INSTRUKSI / INFORMASI :', 'LR', 1, 'L', 0);

                 $this->SetX(15);

                $this->Cell(60,100, '-', 'LRB', 0, 'L', 0);
                $this->Cell(125,100, '-', 'LRB', 1, 'L', 0); 
                
        }
            // tampilkan data di bawah cell
            $this->SetXY(15,228);
                $this->setFont('','BU',11);
                
                $this->Cell(25,40, 'PERHATIAN ', 0, 0, 'L', 0);
                $this->setFont('','',10);
                //$this->setFontSize(10);
                $this->Cell(125,40, ': Lembar ini mejadi satu kesatuan dengan surat terlampir dan jangan dipisahkan.', 0, 0, 'L', 0);
        
        
                }
	
        
       
        
        function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('','I',9);
                
                $this->Cell(0,10,'Copyright Dinkes Kabupaten OKI ' . date('Y'),0,0,'L');
		//nomor halaman
		//$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}



$options1 = $data4->ukuran_kertas;
     
       if ($options1 == 'Legal')
    {

    $pdf = new Input_surat_masuk_pdf('P','mm', array(216, 330));
    }
    else {
         $pdf = new Input_surat_masuk_pdf();
    }
$pdf->SetFont($data4->jenis_font); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data, $data2, $data3);
$pdf->Output();


?>
<?php
class Cetak_surat_masuk_pdf extends Fpdf_gen
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
                
                $this->cell(40,10,'SURAT MASUK',0,1,'L',0);
                $this->Ln(2); 
                
                
                //$this->setFont('Arial','',10);
                $this->setFontSize(10);
                $this->setFillColor(230,230,200);
                
               
                $posisi_x = $this->GetX();
                $this->Cell(20,10, 'Nomor', 'TLR', 0, 'C', 1);
                $this->Cell(20,10, 'Nomor', 'TL', 1, 'C', 1);

                $this->Cell(20,10, '', 'LB', 0, 'C',1);
                $this->Cell(20,10, 'Agenda', 'LB', 1, 'C',1);



                $this->SetXY(50,66);  
                $this->Cell(42,20, 'A l a m a t  P e n g i r i m', 1, 0, 'C', 1);

                $posisi_x = $this->GetX();

                $this->Cell(70,10, 'D A R I  S U R A T  M A S U K', 1, 1, 'C', 1);
                $posisi_y2 = $this->GetY();
                $this->SetX($posisi_x);
                $this->Cell(24,10, 'Tanggal', 1, 0, 'C', 1);
                $this->Cell(18,10, 'Nomor', 1, 0, 'C', 1);
                $this->Cell(28,10, 'P E R I H A L', 1, 0, 'C', 1);

                $posisi_x2 = $this->GetX();

                $this->SetXY(162,66);;    
                //$pdf->SetY(100);
                $this->Cell(40,10, 'Keterangan', 'TLR', 0, 'C', 1);
                $this->Cell(0,10, '', 'TLR', 1, 'C', 1);
                $this->SetXY(162,76); 
                $this->Cell(40,10, '', 'LB', 0, 'C',1);
                $this->Cell(0,10, '', 'LBR', 1, 'C',1);
   
   
   
	
                
        }
 
	function Content($data)
	{
         /*   $ya = 46;
            $rw = 6;
            $no = 1;
                foreach ($data as $key) {
                        $this->setFont('Arial','',10);
                        $this->setFillColor(255,255,255);
                        $this->SetX(10);
                        $this->MultiCell(10,10,$no,1,'J',false);
                        $this->SetX(20);
                        $this->MultiCell(30,10,$key->kode,1,'J',false);
                        $this->SetX(50);
                        $this->MultiCell(70,10,$key->nama,1,'J',false);
                        $this->SetX(120);
                        $this->MultiCell(85,10,$key->uraian,1,'J',true);
                       // $ya = $ya + $rw;
                        $no++;
                }            
                */
            //$this->setFont('Arial','',10);
            $this->setFontSize(10);
            $this->setFillColor(255,255,255);
            $this->SetWidths(array(20,20,42,24,18,28,40));
            $n=0;
            foreach($data as $r)
            {
                $n++;
                $this->Row(array(($n), $r->no_agenda, $r->dari, indonesian_date($r->tgl_surat), $r->no_surat, $r->isi_ringkas, $r->keterangan));
                
            }
	}
	
        
       
        
        function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		//$this->SetFont('Arial','I',9);
                $this->SetFont('','I',9);
                $this->Cell(0,10,'Copyright Dinkes Kabupaten OKI ' . date('Y'),0,0,'L');
		//nomor halaman
		//$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$options1 = $data2->ukuran_kertas;
     
       if ($options1 == 'Legal')
    {

    $pdf = new Cetak_surat_masuk_pdf('P','mm', array(216, 330));
    }
    else {
         $pdf = new Cetak_surat_masuk_pdf();
    } 
        


   
    

$pdf->SetFont($data2->jenis_font);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output();


?>
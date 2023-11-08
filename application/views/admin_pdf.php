<?php
class Admin_pdf extends Fpdf_gen
{
	
    
   function Header()
	{
              
                $this->Image(base_url().'upload/logokabokidinkes.jpg', 10, 20,30,30,'jpeg');
                
                $this->Ln(6);
                $this->setFont('Times','',18);
                $this->setFillColor(255,255,255);
                $this->cell(30,10,'',0,0,'C',0); 
                $this->cell(165,10,'PEMERINTAH KABUPATEN OGAN KOMERING ILIR',0,1,'C',1); 
                $this->setFont('Times','',33);
                $this->cell(30,12,'',0,0,'C',0); 
                $this->cell(165,12,'DINAS KESEHATAN',0,1,'C',1); 
                $this->cell(30,6,'',0,0,'C',0);
                 $this->setFont('Times','',12);
                $this->cell(165,6,'Jl. Letnan Mukhtar Saleh No. 085 Kayuagung 30611 Telp. /Fax : 0711-3221300',0,1,'C',1); 
                $this->cell(30,6,'',0,0,'C',0);
                 $this->setFont('Times','',11);
                $this->cell(165,6,'Website : www.dinkes.kaboki.go.id Email : dinkesoki@yahoo.co.id',0,1,'C',1); 
                
                $this->Ln(4);
               
                
                $this->setFont('Arial','',12);
                
                $this->cell(40,10,'DAFTAR ADMINISTRATOR',0,1,'L',0);
                $this->Ln(2);
                $this->setFont('Arial','',10);
                $this->setFillColor(230,230,200);
                
                $posisi_x = $this->GetX();
                $this->Cell(20,10, 'No', 1, 0, 'C', 1);
              

                $this->Cell(45,10, 'Nama', 1, 0, 'C',1);
                



                
                $this->Cell(45,10, 'Nip', 1, 0, 'C', 1);

                $posisi_x = $this->GetX();

                
                $posisi_y2 = $this->GetY();
                $this->SetX($posisi_x);
           
                
                $this->Cell(35,10, 'Username', 1, 0, 'C',1);
                $this->Cell(35,10, 'Level Admin', 1, 1, 'C',1);
   
   
   
	
                
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
            $this->setFont('Arial','',10);
            $this->setFillColor(255,255,255);
            $this->SetWidths(array(20,45,45,35,35));
            $n=0;
            foreach($data as $r)
            {
                $n++;
                $this->Row(array(($n), $r->nama, $r->nip, $r->username, $r->level));
                
            }
	}
	
        
       
        
        function Footer()
	{
		//atur posisi 1.5 cm dari bawah
		$this->SetY(-15);
		//buat garis horizontal
		$this->Line(10,$this->GetY(),210,$this->GetY());
		//Arial italic 9
		$this->SetFont('Arial','I',9);
                $this->Cell(0,10,'Copyright Dinkes Kabupaten OKI ' . date('Y'),0,0,'L');
		//nomor halaman
		$this->Cell(0,10,'Halaman '.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

$pdf = new Admin_pdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data);
$pdf->Output();


?>
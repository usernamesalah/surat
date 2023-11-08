<?php
class Klasifikasi_surat_pdf extends Fpdf_gen
{

        public $options1;
        var $options2;
       
  
    
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
                
                $this->cell(40,10,'KLASIFIKASI SURAT',0,1,'L',0);
                $this->Ln(2); 
                
                
    
                //$this->setFont('Times','',10);
                $this->setFontSize(10);
                $this->setFillColor(230,230,200);
                $this->cell(10,6,'No.',1,0,'C',1);
                $this->cell(30,6,'Kode',1,0,'C',1);
                $this->cell(70,6,'Nama',1,0,'C',1);
                $this->cell(85,6,'Uraian',1,1,'C',1);
                
	}
 
	function Content($data,$data2)
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
            $this->SetWidths(array(10,30,70,85));
            $n=0;
            
            foreach($data as $r)
            {
                $n++;
                $this->Row(array(($n), $r->kode, $r->nama, $r->uraian));
                
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
		$this->Cell(0,10,'Halaman'.$this->PageNo().' dari {nb}',0,0,'R');
	}
}

//if ($data->ukuran_kertas = 'Legal'){
  //  $ukuran_kertas == "'P','mm', array(216, 330)";
//}else
//{
 //   $ukuran_kertas == "A4";
//}

 /*if($data2->num_rows() > 0){
      foreach($data2->result() as $d){
        if(isset($d->ukuran_kertas)) $options1 = $d->ukuran_kertas;;
     
       if ($options1 == 'Legal')
    {

    $pdf = new Klasifikasi_surat_pdf('P','mm', array(216, 330));
    }
 else {
         $pdf = new Klasifikasi_surat_pdf('P','mm', array(216, 330));
} 
        
        
      }
    
 }
*/

$options1 = $data2->ukuran_kertas;
     
       if ($options1 == 'Legal')
    {

    $pdf = new Klasifikasi_surat_pdf('P','mm', array(216, 330));
    }
 else {
         $pdf = new Klasifikasi_surat_pdf();
} 
        


   
    

$pdf->SetFont($data2->jenis_font);


$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($data,$data2);
$pdf->Output();


?>
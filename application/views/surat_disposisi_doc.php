<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Surat_disposisi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Surat</th>
		<th>Kpd Yth</th>
		<th>Isi Disposisi</th>
		<th>Sifat</th>
		<th>Batas Waktu</th>
		<th>Catatan</th>
		
            </tr><?php
            foreach ($surat_disposisi_data as $surat_disposisi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $surat_disposisi->id_surat ?></td>
		      <td><?php echo $surat_disposisi->kpd_yth ?></td>
		      <td><?php echo $surat_disposisi->isi_disposisi ?></td>
		      <td><?php echo $surat_disposisi->sifat ?></td>
		      <td><?php echo $surat_disposisi->batas_waktu ?></td>
		      <td><?php echo $surat_disposisi->catatan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
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
        <h2>Input_surat_keluar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode</th>
		<th>No Agenda</th>
		<th>Isi Ringkas</th>
		<th>Tujuan</th>
		<th>No Surat</th>
		<th>Tgl Surat</th>
		<th>Tgl Catat</th>
		<th>Keterangan</th>
		<th>File</th>
		<th>Pengolah</th>
		
            </tr><?php
            foreach ($input_surat_keluar_data as $input_surat_keluar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $input_surat_keluar->kode ?></td>
		      <td><?php echo $input_surat_keluar->no_agenda ?></td>
		      <td><?php echo $input_surat_keluar->isi_ringkas ?></td>
		      <td><?php echo $input_surat_keluar->tujuan ?></td>
		      <td><?php echo $input_surat_keluar->no_surat ?></td>
		      <td><?php echo $input_surat_keluar->tgl_surat ?></td>
		      <td><?php echo $input_surat_keluar->tgl_catat ?></td>
		      <td><?php echo $input_surat_keluar->keterangan ?></td>
		      <td><?php echo $input_surat_keluar->file ?></td>
		      <td><?php echo $input_surat_keluar->pengolah ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
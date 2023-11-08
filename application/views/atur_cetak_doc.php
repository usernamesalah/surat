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
        <h2>Atur_cetak List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis Font</th>
		<th>Ukuran Kertas</th>
		
            </tr><?php
            foreach ($atur_cetak_data as $atur_cetak)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $atur_cetak->jenis_font ?></td>
		      <td><?php echo $atur_cetak->ukuran_kertas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
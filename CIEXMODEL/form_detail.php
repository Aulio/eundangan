<?php echo $this->session->flashdata('message'); ?>
<html>  
	<head>
		<title>Laporan Pengawasan</title>  
	</head>
		<!-- Kalau ada datanya, maka kita akan tampilkan dalam table -->
		<h1>Detail Laporan Pengawasan</h1>
			<table border="1">
				<thead>
					Cari Berdasarkan Nomor Kandang : <br>
					<input type="text" name="search" required> 
					<input type="submit" value="seacrh"><br><br>	
						<tr>
						<th>Tanggal Masuk. </th>
						<th>Populasi</th>
						<th>Stok Pakan</th>
						<th>Bobot DOC (Kg)</th>
						<th>Mortalitas (Ekor)</th>
						<th>Morbilitas (Ekor)</th>
						<th>Populasi Akhir (Ekor)</th>
						<th>Bobot Panen(Kg)</th>

					</tr>
				</thead>
					<tbody>

						<?php if (!isset($laporan)): ?> 
							Tidak Ada Data
						<?php else: ?>
							<?php echo $this->session->flashdata('message'); ?>
							<?php foreach ($laporan as $row): ?>
								<tr>
									<td><?php echo $row->tgl_masuk; ?></td> 
									<td><?php echo $row->populasi_awal; ?></td> <!-- karena berbentuk objek, maka kita menggunakan panah (->) untuk menunjuk field yang ada di database -->
									<td><?php echo $row->pakan_stok; ?></td>
									<td><?php echo $row->bobot_doc; ?></td>  
									<td><?php echo $row->mortalitas; ?></td>  
									<td><?php echo $row->morbilitas; ?></td>  
									<td><?php echo $row->populasi_akhir; ?></td>  
									<td><?php echo $row->bobot; ?></td>  
									
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
				</tbody>
			</table>
</html>
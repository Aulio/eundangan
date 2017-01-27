<html>  
	<head>
		<title>Laporan Pengawasan</title>  
	</head>
		<!-- Kalau ada datanya, maka kita akan tampilkan dalam table -->
		<h1>Laporan Pengawasan</h1>
			<table border="1">
				<thead>
					<tr>
						<th>Tanggal Masuk. </th>
						<th>Populasi</th>
						<th>Stok Pakan</th>
						<th>Bobot DOC (Kg)</th>
						<th>Lihat Detail</th>
						<th>Kelola</th>
					</tr>
				</thead>
					<tbody>

						<?php if (!isset($list_laporan)): ?> 
							Tidak Ada Data
						<?php else: ?>
							<?php echo $this->session->flashdata('message'); ?>
							<?php foreach ($list_laporan as $row): ?>
								<tr>

									<td><?php echo $row->tgl_masuk; ?></td> 
									<td><?php echo $row->populasi_awal; ?></td> <!-- karena berbentuk objek, maka kita menggunakan panah (->) untuk menunjuk field yang ada di database -->
									<td><?php echo $row->pakan_stok; ?></td>
									<td><?php echo $row->bobot_doc; ?></td>  
									
									<td>
										<a href="<?php echo base_url() ?>laporan/detail/<?php echo $row->id ?>">Detail</a></td>
									<td>
										<!-- Akan melakukan update atau delete sesuai dengan id yang diberikan ke controller -->
										<a href="<?php echo base_url() ?>laporan/update/<?php echo $row->id ?>">Update</a>
										|
										<a href="<?php echo base_url() ?>laporan/delete/<?php echo $row->id ?>">Delete</a></td>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
				</tbody>
			</table>
</html>
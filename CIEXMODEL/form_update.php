<?php echo $this->session->flashdata('message'); ?>
<?php echo validation_errors(); ?>
<form method="post" action="<?php echo base_url('laporan/update/' . $laporan->id); ?>">
	<br>
	<center>Update Data</center>
	<!-- Tanggal Masuk :<br>
	<input type="datetime"  name="tanggal_masuk" required> <br> -->
	Populasi Awal :<br>
	<input type="number" min=0 name="populasi_awal" value="<?php echo $laporan->populasi_awal; ?>" required> <br>
	Stok Pakan :<br>
	<input type="number" min=0 name="pakan_stok" value="<?php echo $laporan->pakan_stok; ?>" required><br>
	Bobot DOC :<br>
	<input type="float" name="bobot_doc" value="<?php echo $laporan->bobot_doc; ?>" required> <br><br>
	<input type="submit" value="Save"> 
</form>
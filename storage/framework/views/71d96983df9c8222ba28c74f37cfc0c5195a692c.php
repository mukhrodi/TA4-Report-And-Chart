<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Transaction Report</h4>

	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Tanggal Tranaksi</th>
				<th>Jumlah</th>
				<th>Bayar</th>
				<th>status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1 ?>
			<?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<tr>
				<td><?php echo e($i++); ?></td>
				<td><?php echo e(DB::table('produk')->where('kd_produk',$p->kd_produk)->first()->nama_produk); ?></td>
				<td><?php echo e($p->tgl_transaksi); ?></td>
				<td><?php echo e($p->jumlah); ?></td>
				<td><?php echo e($p->bayar); ?></td>
				<td><?php echo e($p->status); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>

</body>
</html>
<?php /**PATH /home/kigamekun/Downloads/CRUD Data Barang (1)/CRUD Data Barang/resources/views/transaksi_pdf.blade.php ENDPATH**/ ?>
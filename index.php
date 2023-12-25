<?php
include 'koneksi.php';

$query = "SELECT * FROM tb_courses;";
$sql = mysqli_query($conn, $query);
$no = 0;

session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

	<script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script defer src="js/script.js"></script>

	<title>CRUD Kursus & Materi</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm rounded">
		<div class="container container-fluid">
			<a class="navbar-brand" href="#"> <i class="fa-solid fa-code"></i> CRUD</a>
		</div>
	</nav>
	<div class="container">
		<div class="container text-center">
			<h2 class="mt-4">Daftar Kursus</h2>
			<hr class="my-4" style="border-width: 2px;">
		</div>
		<a href="kelola.php" type="button" class="btn btn-primary mb-3">
			<i class="fa fa-plus"></i>
			Tambah Data
		</a>
		<?php
		if(isset($_SESSION['hasil'])):
			$split = explode(",", $_SESSION['hasil']);
			?>
			<div class="alert alert-<?php echo $split[1];?> alert-dismissible fade show" role="alert">
				<strong><?php echo $split[0];?></strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			<?php
			session_destroy();
		endif;
		?>
		<div class="table-responsive mb-5">
			<table id="dt" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th>Judul</th>
						<th>Deskripsi</th>
						<th>Durasi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($result = mysqli_fetch_assoc($sql)){
						?>
						<tr>
							<td><center>
								<?php echo ++$no; ?>
							</center></td>
							<td>
								<?php echo $result['title']; ?>
							</td>
							<td>
								<?php echo $result['description']; ?>
							</td>
							<td>
								<?php echo $result['duration']; ?>
							</td>
							<td>
								<a href="materi.php?id_course=<?php echo $result['id_course']; ?>" type="button" class="btn btn-info btn-sm text-white">
									<i class="fa fa-eye"></i> View
								</a>
								<a href="kelola.php?ubah=<?php echo $result['id_course']; ?>" type="button" class="btn btn-success btn-sm">
									<i class="fa fa-pencil"></i> Edit
								</a>
								<a href="proses.php?hapus=<?php echo $result['id_course']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus kursus tersebut?')">
									<i class="fa fa-trash"></i> Delete
								</a>
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<footer>
		<p>&copy; Copyright Muhammad Hafiz - CRUD</p>
    </footer>
</body>
</html>

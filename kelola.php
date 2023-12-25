<!DOCTYPE html>

<?php
include 'koneksi.php';

$id_course = '';
$title = '';
$description = '';
$duration = '';

if(isset($_GET['ubah'])){
	$id_course = $_GET['ubah'];

	$query = "SELECT * FROM tb_courses WHERE id_course = '$id_course';";
	$sql = mysqli_query($conn, $query);

	$result = mysqli_fetch_assoc($sql);

	$title = $result['title'];
	$description = $result['description'];
	$duration = $result['duration'];
}
?>

<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<title>CRUD Kursus & Materi</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card my-4">
                    <div class="card-body">
						<div class="container text-center">
							<h2 class="my-4 mb-4">Tambah Data Kursus</h2>
						</div>
						<form method="POST" action="proses.php" enctype="multipart/form-data">
							<input type="hidden" value="<?php echo $id_course; ?>" name="id_course">
							<div class="mb-3 row">
								<label for="title" class="col-sm-2 col-form-label">
									Judul
								</label>
								<div class="col-sm-10">
									<input required type="text" name="title" class="form-control" id="title" placeholder="Masukkan judul kursus" value="<?php echo $title; ?>">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="description" class="col-sm-2 col-form-label">
									Deskripsi
								</label>
								<div class="col-sm-10">
									<input required type="text" name="description" class="form-control" id="description" placeholder="Masukkan deskripsi kursus" value="<?php echo $description; ?>">
								</div>
							</div>
							<div class="mb-3 row">
								<label for="duration" class="col-sm-2 col-form-label">
									Durasi
								</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" id="duration" name="duration" placeholder="Masukkan durasi kursus" value="<?php echo $duration; ?>">
								</div>
							</div>

							<div class="mb-3 row mt-4">
								<div class="col text-end">
									<a href="index.php" type="button" class="btn btn-danger">
										<i class="fa fa-reply" aria-hidden="true"></i> Batal
									</a>

									<?php if (isset($_GET['ubah'])) { ?>
										<button type="submit" name="aksi" value="edit" class="btn btn-primary">
										<i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan
										</button>
									<?php } else { ?>
										<button type="submit" name="aksi" value="add" class="btn btn-primary">
										<i class="fa fa-floppy-o" aria-hidden="true"></i> Tambahkan
										</button>
									<?php } ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

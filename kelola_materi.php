<!DOCTYPE html>

<?php
include 'koneksi.php';

$id_material = '';
$title_material = '';
$description_material = '';
$embed_link = '';

if (isset($_GET['ubah_material'])) {
    $id_material = $_GET['ubah_material'];

    $query_material = "SELECT * FROM tb_materials WHERE id_material = '$id_material';";
    $sql_material = mysqli_query($conn, $query_material);

    $material = mysqli_fetch_assoc($sql_material);

    $title_material = $material['title_material'];
    $description_material = $material['description_material'];
    $embed_link = $material['embed_link'];
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
							<h2 class="my-4 mb-4">Tambah Data Materi</h2>
						</div>
                        <form method="POST" action="proses_materi.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $id_material; ?>" name="id_material">
                            <input type="hidden" value="<?php echo $_GET['id_course']; ?>" name="id_course">
                            <div class="mb-3 row">
                                <label for="title_material" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="title_material" class="form-control" id="title_material" placeholder="Masukkan judul materi" value="<?php echo $title_material; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="description_material" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="description_material" class="form-control" id="description_material" placeholder="Masukkan deskripsi materi" value="<?php echo $description_material; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="embed_link" class="col-sm-2 col-form-label">Embed Link</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="embed_link" class="form-control" id="embed_link" placeholder="Masukkan link embed video" value="<?php echo $embed_link; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row mt-4">
                                <div class="col text-end">
                                    <a href="materi.php?id_course=<?php echo $_GET['id_course']; ?>" type="button" class="btn btn-danger">
                                        <i class="fa fa-reply" aria-hidden="true"></i> Batal
                                    </a>
                                    <?php if (isset($_GET['ubah_material'])) { ?>
                                        <button type="submit" name="aksi_material" value="edit_material" class="btn btn-primary">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan Perubahan
                                        </button>
                                    <?php } else { ?>
                                        <button type="submit" name="aksi_material" value="add_material" class="btn btn-primary">
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

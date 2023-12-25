<?php
include 'koneksi.php';

$id_course = $_GET['id_course'];
$query = "SELECT * FROM tb_courses WHERE id_course = '$id_course';";
$sql_course = mysqli_query($conn, $query);
$course = mysqli_fetch_assoc($sql_course);

$query_material = "SELECT * FROM tb_materials WHERE id_course = '$id_course';";
$sql_material = mysqli_query($conn, $query_material);

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
    <div class="container mt-4">
        <h2 class="mb-2"><?php echo $course['title']; ?></h2>
        <p><?php echo $course['description']; ?></p>
        <p><i class="fa-solid fa-clock"></i>  <?php echo $course['duration']; ?></p>
        <a href="index.php" type="button" class="btn btn-danger mb-3">
            <i class="fa fa-reply" aria-hidden="true"></i> Kembali
        </a>
        <a href="kelola_materi.php?id_course=<?php echo $id_course; ?>" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i> Tambah Materi
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
        <table id="dt_material" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Materi</th>
                    <th>Deskripsi Materi</th>
                    <th>Link Embed</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no_material = 0;
                while ($material = mysqli_fetch_assoc($sql_material)) {
                    ?>
                    <tr>
                        <td><?php echo ++$no_material; ?></td>
                        <td><?php echo $material['title_material']; ?></td>
                        <td><?php echo $material['description_material']; ?></td>
                        <td><?php echo $material['embed_link']; ?></td>
                        <td>
                            <a href="kelola_materi.php?ubah_material=<?php echo $material['id_material']; ?>&id_course=<?php echo $_GET['id_course']; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i> Edit
                            </a>
                            <a href="proses_materi.php?hapus_material=<?php echo $material['id_material']; ?>&id_course=<?php echo $_GET['id_course']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus materi tersebut?')">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>&copy; Copyright Muhammad Hafiz - Dicoding</p>
    </footer>
</body>
</html>

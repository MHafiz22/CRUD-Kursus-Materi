<?php
	include 'fungsi.php';
	session_start();

	if ($_POST['aksi_material'] == "add_material") {
    $berhasil = tambah_material($_POST);

        if ($berhasil) {
            $_SESSION['hasil'] = "Materi berhasil ditambahkan,success";
            header("location: materi.php?id_course=" . $_POST['id_course']);
        } else {
            echo $berhasil;
        }
        } elseif ($_POST['aksi_material'] == "edit_material") {
            $berhasil = ubah_material($_POST);

            if ($berhasil) {
                $_SESSION['hasil'] = "Materi berhasil diperbarui,success";
                header("location: materi.php?id_course=" . $_POST['id_course']);
            } else {
                echo $berhasil;
            }
        }

    if ($_GET['hapus_material']) {
    $berhasil = hapus_material($_GET);

        if ($berhasil) {
            $_SESSION['hasil'] = "Materi berhasil dihapus,success";
            header("location: materi.php?id_course=" . $_GET['id_course']);
        } else {
            echo $berhasil;
        }
    }
?>
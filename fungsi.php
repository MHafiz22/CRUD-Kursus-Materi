<?php
include 'koneksi.php';

function tambah_data($data)
{
    $title = $data['title'];
    $description = $data['description'];
    $duration = $data['duration'];

    $query = "INSERT INTO tb_courses VALUES(null, '$title', '$description', '$duration')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id_course = $data['id_course'];
    $title = $data['title'];
    $description = $data['description'];
    $duration = $data['duration'];

    $query = "UPDATE tb_courses SET title='$title', description='$description', duration='$duration' WHERE id_course='$id_course';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_course = $data['hapus'];

    $query = "DELETE FROM tb_courses WHERE id_course = '$id_course';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function tambah_material($data)
{
    $id_course = $data['id_course'];
    $title_material = $data['title_material'];
    $description_material = $data['description_material'];
    $embed_link = $data['embed_link'];

    $query = "INSERT INTO tb_materials VALUES(null, '$id_course', '$title_material', '$description_material', '$embed_link')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_material($data)
{
    $id_material = $data['id_material'];
    $title_material = $data['title_material'];
    $description_material = $data['description_material'];
    $embed_link = $data['embed_link'];

    $query = "UPDATE tb_materials SET title_material='$title_material', description_material='$description_material', embed_link='$embed_link' WHERE id_material='$id_material';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_material($data)
{
    $id_material = $data['hapus_material'];

    $query = "DELETE FROM tb_materials WHERE id_material = '$id_material';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}
?>

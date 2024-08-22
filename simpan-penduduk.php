<?php
include ('../../config/koneksi.php');

if (isset($_POST['submit'])) {
    $nik = mysqli_real_escape_string($connect, $_POST['fnik']);
    $nama = mysqli_real_escape_string($connect, $_POST['fnama']);
    $tempat_lahir = mysqli_real_escape_string($connect, $_POST['ftempat_lahir']);
    $tgl_lahir = mysqli_real_escape_string($connect, $_POST['ftgl_lahir']);
    $jenis_kelamin = mysqli_real_escape_string($connect, $_POST['fjenis_kelamin']);
    $agama = mysqli_real_escape_string($connect, $_POST['fagama']);
    $jalan = mysqli_real_escape_string($connect, $_POST['fjalan']);
    $dusun = mysqli_real_escape_string($connect, $_POST['fdusun']);
    $rt = mysqli_real_escape_string($connect, $_POST['frt']);
    $rw = mysqli_real_escape_string($connect, $_POST['frw']);
    $desa = mysqli_real_escape_string($connect, $_POST['fdesa']);
    $kecamatan = mysqli_real_escape_string($connect, $_POST['fkecamatan']);
    $kota = "Kabupaten " . mysqli_real_escape_string($connect, $_POST['fkota']);
    $no_kk = mysqli_real_escape_string($connect, $_POST['fno_kk']);
    $pend_kk = mysqli_real_escape_string($connect, $_POST['fpend_kk']);
    $pend_terakhir = mysqli_real_escape_string($connect, $_POST['fpend_terakhir']);
    $pend_ditempuh = mysqli_real_escape_string($connect, $_POST['fpend_ditempuh']);
    $pekerjaan = mysqli_real_escape_string($connect, $_POST['fpekerjaan']);
    $status_perkawinan = mysqli_real_escape_string($connect, $_POST['fstatus_perkawinan']);
    $status_dlm_keluarga = mysqli_real_escape_string($connect, $_POST['fstatus_dlm_keluarga']);
    $kewarganegaraan = mysqli_real_escape_string($connect, $_POST['fkewarganegaraan']);
    $nama_ayah = mysqli_real_escape_string($connect, $_POST['fnama_ayah']);
    $nama_ibu = mysqli_real_escape_string($connect, $_POST['fnama_ibu']);

    $qCekPenduduk = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik='$nik'");
    $row = mysqli_num_rows($qCekPenduduk);

    if ($row > 0) {
        header('Location: index.php?pesan=gagal-menambah');
        exit(); // Menambahkan exit untuk memastikan script berhenti setelah redirect
    } else {
        $qTambahPenduduk = "INSERT INTO penduduk (nik, nama, tempat_lahir, tgl_lahir, jenis_kelamin, agama, jalan, dusun, rt, rw, desa, kecamatan, kota, no_kk, pend_kk, pend_terakhir, pend_ditempuh, pekerjaan, status_perkawinan, status_dlm_keluarga, kewarganegaraan, nama_ayah, nama_ibu) VALUES ('$nik', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$jalan', '$dusun', '$rt', '$rw', '$desa', '$kecamatan', '$kota', '$no_kk', '$pend_kk', '$pend_terakhir', '$pend_ditempuh', '$pekerjaan', '$status_perkawinan', '$status_dlm_keluarga', '$kewarganegaraan', '$nama_ayah', '$nama_ibu')";
        $tambahPenduduk = mysqli_query($connect, $qTambahPenduduk);
        if ($tambahPenduduk) {
            header('Location: index.php');
            exit(); // Menambahkan exit untuk memastikan script berhenti setelah redirect
        } else {
            // Penanganan error jika query gagal
            echo "Error: " . mysqli_error($connect);
        }
    }
}
?>

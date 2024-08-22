<?php
include ('../../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $nik = mysqli_real_escape_string($connect, $_POST['nik']);
    $tempat_lahir = mysqli_real_escape_string($connect, $_POST['tempat_lahir']);
    $tgl_lahir = mysqli_real_escape_string($connect, $_POST['tgl_lahir']);
    $jenis_kelamin = mysqli_real_escape_string($connect, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($connect, $_POST['agama']);
    $jalan = mysqli_real_escape_string($connect, $_POST['jalan']);
    $dusun = mysqli_real_escape_string($connect, $_POST['dusun']);
    $rt = mysqli_real_escape_string($connect, $_POST['rt']);
    $rw = mysqli_real_escape_string($connect, $_POST['rw']);
    $desa = mysqli_real_escape_string($connect, $_POST['desa']);
    $kecamatan = mysqli_real_escape_string($connect, $_POST['kecamatan']);
    $kota = mysqli_real_escape_string($connect, $_POST['kota']);
    $no_kk = mysqli_real_escape_string($connect, $_POST['no_kk']);
    $pend_kk = mysqli_real_escape_string($connect, $_POST['pend_kk']);
    $pend_terakhir = mysqli_real_escape_string($connect, $_POST['pend_terakhir']);
    $pend_ditempuh = mysqli_real_escape_string($connect, $_POST['pend_ditempuh']);
    $pekerjaan = mysqli_real_escape_string($connect, $_POST['pekerjaan']);
    $status_perkawinan = mysqli_real_escape_string($connect, $_POST['status_perkawinan']);
    $status_dlm_keluarga = mysqli_real_escape_string($connect, $_POST['status_dlm_keluarga']);
    $kewarganegaraan = mysqli_real_escape_string($connect, $_POST['kewarganegaraan']);
    $nama_ayah = mysqli_real_escape_string($connect, $_POST['nama_ayah']);
    $nama_ibu = mysqli_real_escape_string($connect, $_POST['nama_ibu']);

    // Validasi input
    if (empty($nama) || empty($nik) || empty($tempat_lahir) || empty($tgl_lahir) || empty($jenis_kelamin) || empty($agama) || empty($jalan) || empty($dusun) || empty($rt) || empty($rw) || empty($desa) || empty($kecamatan) || empty($kota) || empty($no_kk) || empty($pend_kk) || empty($pend_terakhir) || empty($pend_ditempuh) || empty($pekerjaan) || empty($status_perkawinan) || empty($status_dlm_keluarga) || empty($kewarganegaraan) || empty($nama_ayah) || empty($nama_ibu)) {
        die('Semua kolom wajib diisi!');
    }

    // Query untuk menambahkan data
    $sql = "INSERT INTO penduduk (nama, nik, tempat_lahir, tgl_lahir, jenis_kelamin, agama, jalan, dusun, rt, rw, desa, kecamatan, kota, no_kk, pend_kk, pend_terakhir, pend_ditempuh, pekerjaan, status_perkawinan, status_dlm_keluarga, kewarganegaraan, nama_ayah, nama_ibu) VALUES ('$nama', '$nik', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama', '$jalan', '$dusun', '$rt', '$rw', '$desa', '$kecamatan', '$kota', '$no_kk', '$pend_kk', '$pend_terakhir', '$pend_ditempuh', '$pekerjaan', '$status_perkawinan', '$status_dlm_keluarga', '$kewarganegaraan', '$nama_ayah', '$nama_ibu')";
    $result = mysqli_query($connect, $sql);

    // Tangani hasil query
    if (!$result) {
        die('Error: ' . mysqli_error($connect));
    } else {
        echo '<p>Data penduduk berhasil ditambahkan!</p>';
        // Atau redirect
        header('Location: halaman_berhasil.php');
        exit();
    }
}
?>
<?php 
  include ('../part/akses.php'); // Mengimpor file akses.php yang kemungkinan berisi logika untuk memeriksa otentikasi atau izin pengguna.
  include ('../part/header.php'); // Mengimpor file header.php untuk menampilkan bagian header situs web.
  include ('../../config/koneksi.php'); // Mengimpor file koneksi.php yang berisi pengaturan koneksi ke database.
  
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          } else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li class="active">
        <a href="../penduduk/">
          <i class="fa fa-users"></i><span>&nbsp;Data Penduduk</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fas fa-envelope-open-text"></i> <span>&nbsp;&nbsp;Surat</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="../surat/permintaan_surat/">
              <i class="fa fa-circle-notch"></i> Permintaan Surat
            </a>
          </li>
          <li>
            <a href="../surat/surat_selesai/"><i class="fa fa-circle-notch"></i> Surat Selesai
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Data Penduduk</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <form method="post" enctype="multipart/form-data" action="import-penduduk.php">
          <div class="col-md-3">
            <input name="datapenduduk" type="file" required="required">
          </div>
          <div>
            <input name="upload" type="submit" class="btn btn-primary" value="Import .XLS">
          </div>
        </form><br>
      </div>
      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-user-plus"></i> Tambah Data Penduduk</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <form class="form-horizontal" method="post" action="simpan-penduduk.php">
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">NIK</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnik" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="NIK" required>
                        <script>
                          function hanyaAngka(evt){
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                            return true;
                          }
                        </script>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" placeholder="Nama" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Tempat Lahir</label>
                      <div class="col-sm-8">
                        <input type="text" name="ftempat_lahir" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Lahir" required>                   
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Tanggal Lahir</label>
                      <div class="col-sm-8">
                        <input type="date" name="ftgl_lahir" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Jenis Kelamin</label>
                      <div class="col-sm-8">
                        <select name="fjenis_kelamin" class="form-control" required>
                          <option value="">-- Jenis Kelamin --</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Agama</label>
                      <div class="col-sm-8">
                        <input type="text" name="fagama" class="form-control" style="text-transform: capitalize;" placeholder="Agama" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Jalan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fjalan" class="form-control" style="text-transform: capitalize;" placeholder="Jalan" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Dusun</label>
                      <div class="col-sm-8">
                        <select name="fdusun" class="form-control" style="text-transform: capitalize;" required>
                          <option value="">-- Dusun --</option>
                          <option value="Dusun 1">Dusun 1</option>
                          <option value="Dusun 2">Dusun 2</option>
                          <option value="Dusun 3">Dusun 3</option>
                          <?php
                            $qTampilDusun = "SELECT * FROM dusun";
                            $tampilDusun = mysqli_query($connect, $qTampilDusun);
                            while($rows = mysqli_fetch_assoc($tampilDusun)){
                          ?>
                          <option value="<?php echo $rows['nama_dusun']; ?>"><?php echo $rows['nama_dusun']; ?></option>
                          <?php 
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">RT</label>
                      <div class="col-sm-8">
                        <select name="frt" class="form-control" required>
                          <option value="">-- RT --</option>
                          <option value="001">001</option>
                          <option value="002">002</option>
                          <option value="003">003</option>
                          <option value="004">004</option>
                          <option value="005">005</option>
                          <option value="006">006</option>
                          <option value="007">007</option>
                          <option value="008">008</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">RW</label>
                      <div class="col-sm-8">
                        <select name="frw" class="form-control" required>
                          <option value="">-- RW --</option>
                          <option value="001">001</option>
                          <option value="002">002</option>
                          <option value="003">003</option>
                          <option value="004">004</option>
                          <option value="005">005</option>
                          <option value="006">006</option>
                          <option value="007">007</option>
                          <option value="008">008</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Pekerjaan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fpekerjaan" class="form-control" style="text-transform: capitalize;" placeholder="Pekerjaan" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status Pernikahan</label>
                      <div class="col-sm-8">
                        <select name="fstatus_pernikahan" class="form-control" required>
                          <option value="">-- Status Pernikahan --</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                          <option value="Sudah Menikah">Sudah Menikah</option>
                          <option value="Duda">Duda</option>
                          <option value="Janda">Janda</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kewarganegaraan</label>
                      <div class="col-sm-8">
                        <select name="fkewarganegaraan" class="form-control" required>
                          <option value="">-- Kewarganegaraan --</option>
                          <option value="WNI">WNI</option>
                          <option value="WNA">WNA</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Pendidikan</label>
                      <div class="col-sm-8">
                        <select name="fpendidikan" class="form-control" required>
                          <option value="">-- Pendidikan --</option>
                          <option value="Tidak Sekolah">Tidak Sekolah</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="D1">D1</option>
                          <option value="D2">D2</option>
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Golongan Darah</label>
                      <div class="col-sm-8">
                        <select name="fgol_darah" class="form-control" required>
                          <option value="">-- Golongan Darah --</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status Tinggal</label>
                      <div class="col-sm-8">
                        <select name="fstatus_tinggal" class="form-control" required>
                          <option value="">-- Status Tinggal --</option>
                          <option value="Tetap">Tetap</option>
                          <option value="Kontrak">Kontrak</option>
                          <option value="Kos">Kos</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status Ekonomi</label>
                      <div class="col-sm-8">
                        <select name="fstatus_ekonomi" class="form-control" required>
                          <option value="">-- Status Ekonomi --</option>
                          <option value="Sangat Mampu">Sangat Mampu</option>
                          <option value="Mampu">Mampu</option>
                          <option value="Cukup Mampu">Cukup Mampu</option>
                          <option value="Kurang Mampu">Kurang Mampu</option>
                          <option value="Tidak Mampu">Tidak Mampu</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kategori Penduduk</label>
                      <div class="col-sm-8">
                        <select name="fkategori" class="form-control" required>
                          <option value="">-- Kategori Penduduk --</option>
                          <option value="Warga Setempat">Warga Setempat</option>
                          <option value="Pendatang">Pendatang</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Disabilitas</label>
                      <div class="col-sm-8">
                        <select name="fdisabilitas" class="form-control" required>
                          <option value="">-- Disabilitas --</option>
                          <option value="Tidak Ada">Tidak Ada</option>
                          <option value="Ada">Ada</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kepala Keluarga</label>
                      <div class="col-sm-8">
                        <select name="fkk" class="form-control" required>
                          <option value="">-- Kepala Keluarga --</option>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">No KK</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnokk" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="No KK" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">No Telepon</label>
                      <div class="col-sm-8">
                        <input type="text" name="fno_telp" maxlength="15" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="No Telepon" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Foto</label>
                      <div class="col-sm-8">
                        <input name="foto" type="file" required="required">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-8">
                        <button name="fsimpan" type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

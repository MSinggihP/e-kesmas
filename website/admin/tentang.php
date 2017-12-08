<?php   
    if(!defined("INDEX")) die("---");
    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
    $tambah = false;

    $tentang = $mysqli->query("SELECT * from profil where id=1");
    $dataTentang = $tentang->fetch_array();
    $data_tentang = substr($dataTentang['isi'], 0,350);

    $visi = $mysqli->query("SELECT * from profil where id=2");
    $dataVisi = $visi->fetch_array();
    $data_visi = substr($dataVisi['isi'], 0,230);

    $misi = $mysqli->query("SELECT * from profil where id=3");
    $dataMisi = $misi->fetch_array();
    $data_misi = substr($dataMisi['isi'], 0,230);

    $tagline = $mysqli->query("SELECT * from profil where id=4");
    $dataTagline = $tagline->fetch_array();
    $data_tagline = substr($dataTagline['isi'], 0,230);
 ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tentang Desa
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?tampil=beranda">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-desktop"></i> Tentang
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Main jumbotron for a primary marketing message or call to action -->
                <div class="jumbotron col-lg-12">
                    <h1><?php echo $dataTentang['judul']; ?></h1>
                    <p style="text-align: justify;"><?php echo "$data_tentang"."...."; ?></p>
                    <p><a href="?tampil=lihat-tentang&id=<?php echo $dataTentang['id']; ?>" class="btn btn-primary btn-lg" role="button">Lihat Selengkapnya &raquo;</a>
                    </p>
                </div>


                <div class="page-header">
                    <h1>Tagline Desa</h1>
                </div>
                <div class="jumbotron col-lg-12">
                    <h1><?php echo $dataTagline['judul']; ?></h1>
                    <p style="text-align: justify;"><?php echo "$data_tagline"."...."; ?></p>
                    <p><a href="?tampil=lihat-tentang&id=<?php echo $dataTagline['id']; ?>" class="btn btn-primary btn-lg" role="button">Lihat Selengkapnya &raquo;</a>
                    </p>
                </div>


                <div class="page-header">
                    <h1>Visi dan Misi</h1>
                </div>
                <div class="jumbotron col-lg-6">
                    <h1><?php echo $dataVisi['judul']; ?></h1>
                    <p><?php echo "$data_visi"."..."; ?></p>
                    <p><a href="?tampil=lihat-tentang&id=<?php echo $dataVisi['id']; ?>" class="btn btn-primary btn-lg" role="button">Lihat Selengkapnya &raquo;</a>
                    </p>
                </div>
                <div class="jumbotron col-lg-6">
                    <h1><?php echo $dataMisi['judul']; ?></h1>
                    <p><?php echo "$data_misi"."..."; ?></p>
                    <p><a href="?tampil=lihat-tentang&id=<?php echo $dataMisi['id']; ?>" class="btn btn-primary btn-lg" role="button">Lihat Selengkapnya &raquo;</a>
                    </p>
                </div>
                <div class="page-header">
                    <h1>Struktur Organisasi</h1>
                </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-6">
                         <p><a href="?tampil=tambah-struktur" class="btn btn-primary btn-md" role="button">Tambah</a>
                         </p>
                    </div>
                    <div class="col-lg-6">
                            <form method="post" action="">
                                <div class="form-group input-group">
                                <input name="input_cari" placeholder="Cari disini .." type="text" class="form-control">
                                <span class="input-group-btn"><input class="btn btn-default" name="cari" value="Cari" type="submit"><i class="fa fa-search"></i></span>
                            </div>
                            </form>
                            
                    </div>
                </div>
                <?php
                                   $input_cari = @$_POST['input_cari']; 
                                   $cari = @$_POST['cari']; 
                                    if($cari){
                                        if($input_cari!=""){
                                            echo "Pencarian : "."$input_cari";
                                        }else{
                                            echo "Pencarian : All";
                                        }
                                         
                                    }
                                ?>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Struktur Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Urut</th>
                                                <th>Aksi</th>
                                            </tr>
                                        
    <?php 

   // jika tombol cari di klik
   $no=1;
   if($cari) {
        // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
                $sql =$mysqli->query("SELECT * FROM struktur where
                nama like '%$input_cari%'
                ORDER BY urut ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM struktur  ORDER BY urut ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM struktur  ORDER BY urut ASC")or die($mysqli->error);
        }
    $cek = $sql->num_rows;
     // jika data kurang dari 1
   if($cek < 1) {
    ?>
     <tr> <!--muncul peringata bahwa data tidak di temukan-->
      <td colspan="12" align="center" style="padding:12px;"> Data Tidak Ditemukan</td>
     </tr>
    <?php
   } else {
        
        while($data=$sql->fetch_array()){
    ?>
                                            
                                            <tr><td><?php echo $no; ?></td>
                                                <td><?php echo $data['nama']; ?></td>
                                                <td><?php echo $data['jabatan']; ?></td>
                                                <td><?php echo $data['urut']; ?></td>
                                                <td>

             <a style="background-color: green;border-color: green; " href="?tampil=lihat-struktur&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> Lihat </a>
            <a style="background-color: #f84552 " href="?tampil=hapus-struktur&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"> Hapus </a>
                                                </td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }} ?>
                                    </table>
                                    <div style="padding-bottom: 200px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
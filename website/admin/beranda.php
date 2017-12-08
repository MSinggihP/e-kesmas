<?php 
    if(!defined("INDEX")) die("---");
    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
    $cek_posts    = $mysqli->query("SELECT COUNT(id) as jumlah FROM artikel");
    $data_posts   = $cek_posts->fetch_array();
    $cek_komen  = $mysqli->query("SELECT COUNT(id_komentar) as jumlah FROM Komentar");
    $data_komen   = $cek_komen->fetch_array();
    $cek_view = $mysqli->query("SELECT SUM(Viewers) as jumlah FROM Viewers");
    $data_view   = $cek_view->fetch_array();


    //$jumlah = $cek->num_rows;
 ?>       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Admin Web</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Hi! <?php echo $data['nama'] ?> </strong> Selamat Datang, di halaman administrator
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $data_komen['jumlah']; ?></div>
                                        <div>Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?tampil=comment">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $data_posts['jumlah']; ?></div>
                                        <div>Posts!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?tampil=posts">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $data_view['jumlah']; ?></div>
                                        <div>Viewers!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="?tampil=viewers">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Komentar Terbaru</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                           <tr>
                                                <th>Tanggal</th>
                                                <th>Nama</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php    
                                        $no=0;
$sql =$mysqli->query("SELECT * FROM Komentar ORDER BY tanggal DESC")or die($mysqli->error);                           
                                        while($data4=$sql->fetch_array())
                                            {
                                            if($no <=5){
                                            
                                            ?>  
                                            <tr>
                                                <td><?php echo $data4['tanggal']; ?></td>
                                                <td><?php echo $data4['user']; ?></td>
                                                <td>

             <a style="background-color: green;border-color: green; " href="?tampil=lihat-komentar&id=<?php echo $data4['id_komentar']; ?>" class="btn btn-danger btn-sm" class="btn btn-danger btn-sm"> Lihat </a>
                                                </td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }}?>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="?tampil=comment">View All <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Artikel Terbaru</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                           <tr>
                                                <th>Tanggal</th>
                                                <th>Judul</th>
                                                <th>Viewer</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php    
                                        $no=0;
$sql =$mysqli->query("SELECT * FROM artikel ORDER BY waktu DESC")or die($mysqli->error);                           
                                        while($data3=$sql->fetch_array())
                                            {
                                            if($no <=5){
                                            
                                            ?>  
                                            <tr>
                                                <td><?php echo $data3['waktu']; ?></td>
                                                <td><?php echo $data3['nama']; ?></td>
                                                <td><?php echo $data3['viewer']; ?></td>
                                                <td>

             <a style="background-color: green;border-color: green; " href="?tampil=lihat-artikel&id=<?php echo $data3['id']; ?>" class="btn btn-danger btn-sm" class="btn btn-danger btn-sm"> Lihat </a>
                                                </td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }}?>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="?tampil=posts">View All <i class="fa fa-arrow-circle-right"></i></a>
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
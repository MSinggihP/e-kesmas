<?php 

    $cek_posts    = $mysqli->query("SELECT COUNT(id) as jumlah FROM artikel");
    $data_posts   = $cek_posts->fetch_array();
    $cek_komen  = $mysqli->query("SELECT COUNT(id_komentar) as jumlah FROM komentar");
    $data_komen   = $cek_komen->fetch_array();
    $cek_view = $mysqli->query("SELECT SUM(Viewers) as jumlah FROM viewers");
    $data_view   = $cek_view->fetch_array();


    //$jumlah = $cek->num_rows;
 ?>       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Viewers <small>Web</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i>Viewers
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Berdasarkan Tanggal</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                           <tr>
                                                <th>Tanggal</th>
                                                <th>Viewers</th>
                                            </tr>
                                        </thead>
                                        <?php    
                                        $no=0;
$sql =$mysqli->query("SELECT * FROM viewers ORDER BY tanggal DESC")or die($mysqli->error);                           
                                        while($data4=$sql->fetch_array())
                                            {
                                            
                                            ?>  
                                            <tr>
                                                <td><?php echo $data4['tanggal']; ?></td>
                                                <td><?php echo $data4['viewers']; ?></td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Berdasarkan Terbanyak</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                           <tr>
                                                <th>Tanggal</th>
                                                <th>Viewers</th>
                                            </tr>
                                        </thead>
                                        <?php    
                                        $no=0;
$sql =$mysqli->query("SELECT * FROM viewers ORDER BY viewers DESC")or die($mysqli->error);                           
                                        while($data4=$sql->fetch_array())
                                            {
                                            
                                            ?>  
                                            <tr>
                                                <td><?php echo $data4['tanggal']; ?></td>
                                                <td><?php echo $data4['viewers']; ?></td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }?>
                                    </table>
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
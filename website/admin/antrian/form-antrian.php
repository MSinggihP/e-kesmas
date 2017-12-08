<?php 
    if(!defined("INDEX")) die("---");
    $cek    = $mysqli->query("SELECT * from users where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();

    //$jumlah = $cek->num_rows;
 ?>       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Antrian <small>Pasien</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-8 col-md-8">
                        <div class="panel panel">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <div class="huge"><h1 style="font-size: 80px;text-align: center">Status Antrian <br>0</h1></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <a href="">
                            <div class="panel panel-blue" style="background-color: blue;color:white">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <div class="huge"><h1 style="text-align: center">Ambil Antrian</h1></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <!-- /.row -->

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
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user"></i> Data Antrian Pasien</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>No Antrian</th>

                                            </tr>
                                        
    <?php 

   // jika tombol cari di klik

   $no=1;
   if($cari) {
        // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
                $sql =$mysqli->query("SELECT * FROM antrian where puskesmas_id='$_SESSION[puskesmas]'
                ORDER BY no_antrian ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM antrian WHERE l puskesmas_id='$_SESSION[puskesmas]'
                ORDER BY no_antrian ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM antrian WHERE  puskesmas_id='$_SESSION[puskesmas]'
                ORDER BY no_antrian ASC")or die($mysqli->error);
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
             $sql_antrian =$mysqli->query("SELECT * FROM users WHERE  id='$data[user_id]'
               limit 1 ")or die($mysqli->error);
             $data_antrian=$sql_antrian->fetch_array();
    ?>
                                            
                                            <tr><td><?php echo $no; ?></td>
                                                <td><?php echo $data_antrian['nama']; ?></td>
                                                <td><?php echo $data['no_antrian']; ?></td>
                                            </tr>
                                           <?php 
                                           $no++;
                                           }} ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
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

                <div style="padding-bottom: 200px"></div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
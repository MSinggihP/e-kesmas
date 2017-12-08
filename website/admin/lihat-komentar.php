<?php   
    
    $post = $mysqli->query("SELECT * from komentar AS k LEFT JOIN artikel AS A ON k.id_artikel=A.id where id_komentar='$_GET[id]'");
    $lihat   = $post->fetch_array();

    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
 ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lihat Komentar
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?tampil=index">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-edit"></i>  <a href="?tampil=comment">Komentar</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Lihat
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
     <form method="post" enctype="multipart/form-data" class="form-horizontal" action="?tampil=edit-post&id=<?php echo $lihat['id']; ?>">
        
    <table class="table table-bordered table-responsive">
    
    <tr>
        <td><label class="control-label">Tanggal</label></td>
        <td> <?php echo $lihat['tanggal']; ?></td>
    </tr>
    
    <tr>
        <td><label class="control-label">User</label></td>
        <td style="text-align: justify;"> <?php echo $lihat['user']; ?></td>
    </tr>

    <tr>
        <td><label class="control-label">Email</label></td>
        <td style="text-align: justify;"> <?php echo $lihat['email']; ?></td>
    </tr>

    <tr>
        <td><label class="control-label">Artikel</label></td>
        <td style="text-align: justify;"> <?php echo $lihat['nama']; ?></td>
    </tr>

        <tr>
        <td><label class="control-label">Isi</label></td>
        <td style="text-align: justify;"> <?php echo $lihat['isi']; ?></td>
    </tr>
    
    </table>
    <br>    
                            <br>    
                            <br> 
                            <br>    
                            <br>    
                            <br>
                            <br>    
                            <br>    
                            <br> 
    
</form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
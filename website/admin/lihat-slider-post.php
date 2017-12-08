<?php   
    
    $post = $mysqli->query("SELECT * from slider where id='$_GET[id]'");
    $lihat   = $post->fetch_array();

    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
    $tambah = true;
 ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Lihat Slider
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?tampil=index">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-edit"></i>  <a href="?tampil=slider">Slider</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Lihat
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if($tambah){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Berhasil! </strong> Artikel sudah diedit.
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-10">
     <form method="post" enctype="multipart/form-data" class="form-horizontal" action="?tampil=edit-slider&id=<?php echo $lihat['id']; ?>">
        
    <table class="table table-bordered table-responsive">
    
    <tr>
        <td><label class="control-label">Nama</label></td>
        <td> <?php echo $lihat['nama']; ?></td>
    </tr>
    <tr>
        <td><label class="control-label">Gambar</label></td>
        <td><img src="img/<?php echo $lihat['gambar']; ?>" width="500px"/></td>
    </tr>
    
    <tr>
        <td><label class="control-label">Deskripsi</label></td>
        <td style="text-align: justify;"> <?php echo $lihat['isi']; ?></td>
    </tr>
    </tr>
        <tr>
        <td><label class="control-label">Isi</label></td>
        <td style="text-align: justify;"> <?php echo $lihat['detail']; ?></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-edit"></span> Edit
        </button>
        </td>
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
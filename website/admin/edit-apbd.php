<?php   
    if(!defined("INDEX")) die("---");
    $post = $mysqli->query("SELECT * from apbd where id='$_GET[id]' AND type='$_GET[type]'");
    $lihat   = $post->fetch_array();

    $cek    = $mysqli->query("SELECT * from admin where username='$_SESSION[username]' and password='$_SESSION[password]'");
    $data   = $cek->fetch_array();
    $tambah = false;
    if(isset($_POST['btnsave']))
    {   date_default_timezone_set("Asia/Jakarta");
          $dateTime = date('Ymdhis');
          $judul =  $_POST['judul'];
          $isi = $_POST['isi'];

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if(empty($judul)){
            $errMSG = "Judul kosong";
        }
        else
        {
            $upload_dir = 'img/'; // upload directory
    
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
        
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        
            // rename uploading image
            $userpic = rand(1000,1000000).".".$imgExt;
                
            // allow valid image file formats
            if(in_array($imgExt, $valid_extensions)){           
                // Check file size '5MB'
                if($imgSize < 5000000)              {
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else{
                    //$errMSG = "Sorry, your file is too large.";
                }
            }
            else{
                //$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
                $userpic = $lihat['gambar'];       
            }
        }

        if(!isset($errMSG))
        {
        $mysqli->query("UPDATE apbd set
                judul = '$_POST[judul]',
                gambar = '$userpic',
                isi = '$_POST[isi]'
            where id='$_GET[id]' ") or die($mysqli->error);
        $tambah = true;
        echo"<meta http-equiv='refresh' content='1; url=?tampil=apbd-update&id=$lihat[id]&type=$lihat[type]'>";
    }
    }
 ?>
<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Rencana Pembangunan
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="?tampil=index">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-edit"></i>  <a href="?tampil=apbd-posts&type=<?php echo $_GET['type']; ?>">APBD</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Edit
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if($tambah){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> Data sedang diedit. <strong>Silakan Tunggu... </strong>
                        </div>
                    </div>
                </div>
                <?php } ?>
                    <?php
    if(isset($errMSG)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
    }
    else if(isset($successMSG)){
        ?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
    }
    ?>  
                <div class="row">
                    <div class="col-lg-10">
     <form method="post" enctype="multipart/form-data" class="form-horizontal">
        
    <table class="table table-bordered table-responsive">
    
    <tr>
        <td><label class="control-label">Judul</label></td>
        <td> <input value="<?php echo $lihat['judul']; ?>" class="form-control" type="text" name="judul" placeholder="Judul" /></td>
    </tr>

        <tr>
        <td><label class="control-label">Gambar</label></td>
        <td><img src="img/<?php echo $lihat['gambar']; ?>" width="500px"/><input class="input-group" type="file" name="user_image" accept="image/*"/></td>
    </tr>
    
    <tr>
        <td><label class="control-label">Isi</label></td>
        <td><textarea  value="" name="isi" class="form-control" rows="3"><?php echo $lihat['isi']; ?></textarea></td>
    </tr>
    
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Save
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
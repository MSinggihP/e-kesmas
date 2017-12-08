<section id="main-slider">
        <div class="owl-carousel">
            <?php    
             $no=0;
            $sql =$mysqli->query("SELECT * FROM artikel ORDER BY id DESC")or die($mysqli->error);                           
             while($dataSlider=$sql->fetch_array()){
                $data_slider = substr($dataSlider['isi'], 0,250);
                ?>  
            <div class=" item" style="background-image: url(admin/img/<?php echo $dataSlider['gambar'];?>);">
                <div class="slider-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div style="color:black;padding: 20px;background-color: rgba(192,192,192,0.8)" class="carousel-content">
                                     <h2 style="color: black"><?php echo $dataSlider['nama']; ?></h2>
                                     <p style=""><em>Tanggal : <?php echo $dataSlider['waktu']; ?></em> <b>Dilihat : <?php echo $dataSlider['viewer']; ?></b></p>
                                    <p><?php echo $data_slider; ?></p>
                                    <?php 
                                        if($data_slider!=null && $dataSlider['nama']!=null){?>
                                            <a class="btn btn-primary btn-lg" href="?tampil=detail-artikel&id=<?php echo $dataSlider['id']; ?>">Baca Selengkapnya</a> 
                                   <?php } ?>    
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
            <?php } ?>
        </div><!--/.owl-carousel-->
    </section><!--/#main-slider-->
      <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Berita Gontarbaru</h2>
                
            </div>
            <div class="text-left">

                 <form method="post" action="">

                     <div class="form-group input-group">
                      <input name="input_cari" placeholder="Cari berita disini..." type="text" class="form-control">
                      <span class="input-group-btn"><input  class="btn btn-primary" name="cari" value="Cari" type="submit"><i class="fa fa-search"></i></span>

                      </div>
                 </form>        

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
      <div class="container">                                       
    <?php 

   // jika tombol cari di klik
   $no=1;
   if($cari) {
        // jika kotak pencarian tidak sama dengan kosong
            if($input_cari != "") {
                $sql =$mysqli->query("SELECT * FROM artikel where 
                nama like '%$input_cari%' OR 
                waktu like '%$input_cari%'
                ORDER BY nama ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM artikel ORDER BY nama ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM artikel ORDER BY waktu DESC")or die($mysqli->error);
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
            $data_terbaru = substr($data['isi'], 0,120);  
    ?>          <div class="col-sm-6">
      <div style="padding-bottom: 200px" class="embed-responsive embed-responsive-16by9 col-sm-6">
                        <img width="280px" class="img-responsive" src="admin/img/<?php echo $data['gambar']; ?>" alt="">
                    </div>
                    <div class="col-sm-6">
                        <h4><?php echo $data['nama']; ?></h4>
                        <p style=""><em><?php echo $data['waktu']; ?></em> <b>Dilihat : <?php echo $data['viewer']; ?></b></p>
                      <p style="text-align: justify;"><?php echo $data_terbaru."..."; ?>
                    <a class="" href="?tampil=detail-artikel&id=<?php echo $dataTerbaru['id']; ?>">Lihat Selengkapnya >></a>
                    </p>  
                    </div>
    </div>
                
            <br>
                                                    
                                                   <?php 
                                                   $no++;

                                                   }} ?>
            </div>
                <!-- /.row -->
            </div>
        </div><!--/.container-->
    </section><!--/#portfolio-->

      <section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">POTENSI SUMBER DAYA MANUSIA</h2>
                
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
                $sql =$mysqli->query("SELECT * FROM potensi where type='sdm' AND
                judul like '%$input_cari%' OR 
                isi like '%$input_cari%'
                ORDER BY judul ASC")or die($mysqli->error);
                } 
            else{
                    $sql =$mysqli->query("SELECT * FROM potensi where type='sdm' ORDER BY judul ASC")or die($mysqli->error);
            }
        }
        else{
            $sql =$mysqli->query("SELECT * FROM potensi where type='sdm' ORDER BY judul DESC")or die($mysqli->error);
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
            $data_terbaru = substr($data['isi'], 0,450);  
    ?>
                <div class="row">
                <div class="col-sm-5 wow fadeInLeft">
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <img width="500px" class="img-responsive" src="admin/img/<?php echo $data['gambar']; ?>" alt="">">
                    </div>
                </div>

                <div class="col-sm-7 wow fadeInRight">
                    <h3 class="column-title"><?php echo $data['judul']; ?></h3>
                    </p>
                    <p style="text-align: justify;"><?php echo $data_terbaru."..."; ?> <a class="" href="?tampil=detail-potensi&id=<?php echo $data['id']; ?>">Lihat Selengkapnya >></a></p>

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
<div class="col-xs-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Information</h3>
            <?php
            if(isset($_POST['aksi'])){
                $title = mysqli_real_escape_string($link,$_POST['title']);
                $slogan = mysqli_real_escape_string($link,$_POST['slogan']);
                $about = mysqli_real_escape_string($link,$_POST['about']);
                $pt_name = mysqli_real_escape_string($link,$_POST['pt_name']);
                $pt_address = mysqli_real_escape_string($link,$_POST['pt_address']);
                $whatsapp = mysqli_real_escape_string($link,$_POST['whatsapp']);
                $email = mysqli_real_escape_string($link,$_POST['email']);
                $maps = mysqli_real_escape_string($link,$_POST['maps']);
                $link->query("UPDATE info set title='$title',slogan='$slogan',about='$about',pt_name='$pt_name',pt_address='$pt_address',whatsapp='$whatsapp',email='$email',maps='$maps' where id=1");
            ?>
            <div class="callout callout-info">
                <h4>Sukses!</h4>
                Data berhasil diubah<br />
             </div>
             <?php } ?>
             <?php 
$data = $link->query("SELECT * from info where id=1")->fetch_assoc();
?>
             </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Nama" value="<?= $data['title'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slogan</label>
                  <input type="text" name="slogan" class="form-control" id="exampleInputEmail1" placeholder="Slogan" value="<?= $data['slogan'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">About</label>
                <textarea class="textarea" placeholder="Tentang perusahaan" name="about" 
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $data['about'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Perusahaan</label>
                  <input type="text" name="pt_name" class="form-control" id="exampleInputEmail1" placeholder="Nama Perusahaan" value="<?= $data['pt_name'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat Perusahaan</label>
                  <input type="text" name="pt_address" class="form-control" id="exampleInputEmail1" placeholder="Alamat Perusahaan" value="<?= $data['pt_address'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Whatsapp</label>
                  <input type="text" name="whatsapp" class="form-control" id="exampleInputEmail1" placeholder="Whatsapp" value="<?= $data['whatsapp'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="<?= $data['email'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Tempat</label>
                  <input type="text" name="maps" class="form-control" id="exampleInputEmail1" placeholder="Nama tempat di Google Maps" value="<?= $data['maps'] ?>">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="aksi">Ubah</button>
              </div>
            </form>
          </div>
  
</form>
</div>
 </div>      
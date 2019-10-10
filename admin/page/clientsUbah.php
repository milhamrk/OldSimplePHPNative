<div class="col-xs-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit clients</h3>
            <?php
            if(empty($_GET['id'])){
                header("Location: ./index.php?p=clients");
            }
            $id = $_GET['id'];
            if(isset($_POST['aksi'])){
                $a = mysqli_real_escape_string($link,$_POST['a']);
                $b = mysqli_real_escape_string($link,$_POST['b']);
                if($_FILES['c']['error'] > 0){
                    $link->query("UPDATE clients set title='$a',link='$b' where id_client='$id'");
                } else if(isset($_FILES['c'])){
                    $c = date('sYdhmi').$_FILES['c']['name'];
                    move_uploaded_file($_FILES['c']['tmp_name'],"../images/clients/".$c);
                    $link->query("UPDATE clients set title='$a',link='$b',pict='$c' where id_client='$id'");
                }
            ?>
            <div class="callout callout-info">
                <h4>Sukses!</h4>
                Data berhasil diubah<br />
             </div>
             <?php } ?>
             <?php 
              $data = $link->query("SELECT * from clients where id_client='$id'")->fetch_assoc();
             ?>
             </div>
            <form role="form" method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="a" class="form-control" id="exampleInputEmail1" placeholder="Title" value="<?= $data['title'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" name="b" class="form-control" id="exampleInputEmail1" placeholder="Link" value="<?= $data['link'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Photo</label>
                  <input type="file" name="c" class="form-control" id="exampleInputEmail1" required>
                  * Kosongin jika tidak ingin mengubah foto
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
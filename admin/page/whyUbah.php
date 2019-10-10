<div class="col-xs-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Why</h3>
            <?php
            if(empty($_GET['id'])){
                header("Location: ./index.php?p=why");
            }
            $id = $_GET['id'];
            if(isset($_POST['aksi'])){
                $a = mysqli_real_escape_string($link,$_POST['a']);
                $b = mysqli_real_escape_string($link,$_POST['b']);
                if($_FILES['d']['error'] > 0 && $_FILES['c']['error'] > 0){
                    $link->query("UPDATE why set title='$a',description='$b' where id_why='$id'");
                } else if($_FILES['c']['error'] < 1 && $_FILES['d']['error'] < 0){
                    $c = date('sYdhmi').$_FILES['c']['name'];
                    $d = date('sYdhmi').$_FILES['d']['name'];
                    move_uploaded_file($_FILES['c']['tmp_name'],"../images/why/".$c);
                    move_uploaded_file($_FILES['d']['tmp_name'],"../images/why/".$d);
                    $link->query("UPDATE why set title='$a',description='$b',pict='$c',pict_hover='$d' where id_why='$id'");
                }
                else if($_FILES['c']['error'] < 0){
                    $c = date('sYdhmi').$_FILES['c']['name'];
                    move_uploaded_file($_FILES['c']['tmp_name'],"../images/why/".$c);
                    $link->query("UPDATE why set title='$a',description='$b',pict='$c' where id_why='$id'");
                }
                else if($_FILES['c']['error'] < 1 && $_FILES['d']['error'] < 0){
                    $d = date('sYdhmi').$_FILES['d']['name'];
                    move_uploaded_file($_FILES['d']['tmp_name'],"../images/why/".$d);
                    $link->query("UPDATE why set title='$a',description='$b',pict_hover='$d' where id_why='$id'");
                }
            ?>
            <div class="callout callout-info">
                <h4>Sukses!</h4>
                Data berhasil diubah<br />
             </div>
             <?php } ?>
             <?php 
              $data = $link->query("SELECT * from why where id_why='$id'")->fetch_assoc();
             ?>
             </div>
            <form role="form" method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="a" class="form-control" id="exampleInputEmail1" placeholder="Title" value="<?= $data['title'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                  <textarea type="text" name="b" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi" required><?= $data['description'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Photo</label>
                  <input type="file" name="c" class="form-control" id="exampleInputEmail1">
                  * Kosongkan apabila tidak ingin mengubah gambar
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Photo Hover</label>
                  <input type="file" name="d" class="form-control" id="exampleInputEmail1">
                  * Kosongkan apabila tidak ingin mengubah gambar hover
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
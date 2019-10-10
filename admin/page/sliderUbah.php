<div class="col-xs-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Slider</h3>
            <?php
            if(empty($_GET['id'])){
                header("Location: ./index.php?p=slider");
            }
            $id = $_GET['id'];
            if(isset($_POST['aksi'])){
                $a = mysqli_real_escape_string($link,$_POST['a']);
                $b = mysqli_real_escape_string($link,$_POST['b']);
                $c = mysqli_real_escape_string($link,$_POST['c']);
                if($_FILES['d']['error'] > 0){
                    $link->query("UPDATE slider set title='$a',description='$b',color='$c' where id_slider='$id'");
                } else if(isset($_FILES['d'])){
                    $d = date('sYdhmi').$_FILES['d']['name'];
                    move_uploaded_file($_FILES['d']['tmp_name'],"../images/sliders/".$d);
                    $link->query("UPDATE slider set title='$a',description='$b',picture='$d',color='$c' where id_slider='$id'");
                }
            ?>
            <div class="callout callout-info">
                <h4>Sukses!</h4>
                Data berhasil diubah<br />
             </div>
             <?php } ?>
             <?php 
              $data = $link->query("SELECT * from slider where id_slider='$id'")->fetch_assoc();
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
                  <input type="file" name="d" class="form-control" id="exampleInputEmail1">
                  * Kosongkan jika tidak mengubah foto
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Text Color</label>
                  <select name="c" class="form-control">
                    <option <?= ($data['color']==0) ? 'selected' : '' ?> value="0">Black</option>
                    <option <?= ($data['color']==1) ? 'selected' : '' ?> value="1">White</option>
                  </select>
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
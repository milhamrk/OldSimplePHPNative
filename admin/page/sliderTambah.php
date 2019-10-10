<div class="col-xs-12">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Slider</h3>
            <?php
            if(isset($_POST['aksi'])){
                $a = mysqli_real_escape_string($link,$_POST['a']);
                $b = mysqli_real_escape_string($link,$_POST['b']);
                $c = mysqli_real_escape_string($link,$_POST['c']);
                $d = date('sYdhmi').$_FILES['d']['name'];
                move_uploaded_file($_FILES['d']['tmp_name'],"../images/sliders/".$d);
                $link->query("INSERT INTO slider(title,description,picture,color) VALUES('$a','$b','$d','$c')");
            ?>
            <div class="callout callout-info">
                <h4>Sukses!</h4>
                Data berhasil ditambah<br />
             </div>
             <meta http-equiv="refresh" content="1; ./index.php?p=slider">
             <?php } ?>
             </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="a" class="form-control" id="exampleInputEmail1" placeholder="Title" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                  <textarea type="text" name="b" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Photo</label>
                  <input type="file" name="d" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Text Color</label>
                  <select name="c">
                    <option value="0">Black</option>
                    <option value="1">White</option>
                  </select>
                </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="aksi">Tambah</button>
              </div>
            </form>
          </div>
  
</form>
</div>
 </div>      
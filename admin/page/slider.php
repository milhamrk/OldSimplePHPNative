<div class="col-xs-12">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Slider</h3>
            </div>
            <?php if(isset($_GET['id'])){
                $id = $_GET['id'];
                $d = $link->query("DELETE FROM slider where id_slider=$id");
            ?>
            <div class="callout callout-danger">
                <h4>Sukses!</h4>
                Data berhasil dihapus<br />
             </div>
            <?php } ?>
            <div class="box-body">
                <a href="index.php?p=sliderTambah" class="btn btn-primary btn-flat">Tambah</a>
         <table id='example1' class='table table-bordered table-striped'>
		<thead>
				<tr>
					<th width='10%'>No</th>
					<th>Judul</th>
					<th>Aksi</th>
				<tr>
		</thead>
		<tbody>
		    <?php
		    $no = 1;
		    $d = $link->query("SELECT * FROM slider order by id_slider asc");
		    while($data = $d->fetch_assoc()){ ?>
		        <tr>
					<td><?= $no++ ?></td>
					<td><?= $data['title'] ?></td>
					<td>
						<a class='btn btn-warning' href='index.php?p=sliderUbah&id=<?= $data['id_slider'] ?>'>Ubah</a>
						<a class='btn btn-danger' onclick="return confirm('Are you sure want to remove this?')" href='index.php?p=slider&id=<?= $data['id_slider'] ?>'>Hapus</a>
					</td>
				</tr>
			<?php } ?>
				</tbody></table>
 </div></div></div>
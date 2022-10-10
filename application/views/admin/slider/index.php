<div class="container-fluid">
    <h4 class="text-center">DATA SLIDER</h4>
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Tambah slider</button>

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Gambar</th>
			<th colspan="2">Aksi</th>
		</tr>
     
		<?php 
			$no=1;
			foreach($barang as $brg) :
		 ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><img src="<?= base_url('uploads/slider/').$brg->gambar ?>" class="img-fluid" width="100"></td>
			<!-- <td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td> -->
			<td><?php echo anchor('admin/slider/hapus/'.$brg->id,'<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
		</tr>
		<?php endforeach ?>
	</table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Input</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('admin/slider/tambah_aksi') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Gambar</label><br>
                <input type="file" name="gambar" class="form-control">
            </div>
        
        <div class="modal-footer">
	        <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
	</form>
      </div>
    </div>
  </div>
</div>
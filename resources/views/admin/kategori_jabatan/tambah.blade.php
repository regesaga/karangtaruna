<button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah Baru
</button>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Tambah data?</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
    
<form action="{{ url('admin/kategori_jabatan/tambah') }}" method="post" accept-charset="utf-8">
@csrf
<div class="form-group row">
	<label class="col-md-3 text-right">Nama Kategori</label>
	<div class="col-md-9">
		<input type="text" name="nama_kategori_jabatan" class="form-control" placeholder="Nama kategori jabatan" value="" required>
		@if ($errors->has('nama_kategori_jabatan'))
	      	<span class="text-danger">{{ $errors->first('nama_kategori_jabatan') }}</span>
	    @endif  
	</div>
</div>



<div class="form-group row">
	<label class="col-md-3 text-right"></label>
	<div class="col-md-9">
<div class="btn-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
</div>
</div>
</div>
<div class="clearfix"></div>

</form>

</div>
</div>
</div>
</div>

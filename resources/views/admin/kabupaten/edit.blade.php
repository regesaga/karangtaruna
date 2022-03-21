<p class="text-right">
	<a href="{{ asset('admin/karangtaruna') }}" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>
<?php
// Validasi error

// Error upload
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

// Form open
?>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/karangtaruna/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}
<input type="hidden" name="id_karangtaruna" value="{{ $karangtaruna->id_karangtaruna }}">


<div class="row form-group">
<label class="col-md-3 text-right">Kategori Tingkat karangtaruna </label>
<div class="col-md-9">
<select name="tingkat" class="form-control select2">
  <option value="Kabupaten" >Kabupaten</option>
  <option value="Kecamatan" >Kecamatan</option>
  <option value="Desa" >Desa</option>
  <option value="Kelurahan" >Kelurahan</option>

</select>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Nama karangtaruna <span class="text-danger">*</span></label>
<div class="col-md-9">
<input type="text" name="nama_karangtaruna" class="form-control" placeholder="Nama karangtaruna" value="{{ $karangtaruna->nama_karangtaruna }}" required>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Kecamatan</label>
<div class="col-md-9">
<input type="text" name="kecamatan" class="form-control" placeholder="kecamatan (Position)" value="{{ $karangtaruna->kecamatan }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Desa</label>
<div class="col-md-9">
<input type="text" name="desa" class="form-control" placeholder="desa Terakhir" value="{{ $karangtaruna->desa }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Lokasi Sekertariat</label>
<div class="col-md-9">
<input type="text" name="lokasi" class="form-control" placeholder="lokasi" value="{{ $karangtaruna->lokasi }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Sk Pengukuhan</label>
<div class="col-md-5">
<input type="text" name="sk" class="form-control" placeholder="No Sk" value="{{ $karangtaruna->sk }}">
</div>
<div class="col-md-4">
<input type="text" name="ttd" class="form-control" placeholder="yang Mengukuhkan" value="{{ $karangtaruna->ttd }}">
<small class="text-success">Yang Mengukuhkan</small>
</div>
</div>



<div class="row form-group">
<label class="col-md-3 text-right">Upload gambar/Foto</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" placeholder="Upload gambar">
<small>Gambar saat ini:
<br><?php if($karangtaruna->gambar!="") { ?>
<img src="{{ asset('assets/upload/karangtaruna/thumbs/'.$karangtaruna->gambar) }}" class="img img-thumbnail" width="80">
<?php } ?>
</small>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Deskripsi Lengkap</label>
<div class="col-md-9">
<textarea name="isi" class="form-control" id="kontenku" placeholder="Visi / Misi">{{ $karangtaruna->isi }}</textarea>
</div>
</div>


<div class="row form-group">
<label class="col-md-3 text-right"></label>
<div class="col-md-9">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<input type="reset" name="reset" class="btn btn-info " value="Reset">
</div>
</div>
</div>
</form>
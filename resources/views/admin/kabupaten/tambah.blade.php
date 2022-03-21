<p class="text-right">
  <a href="{{ asset('admin/karangtaruna') }}" 
  class="btn btn-success btn-sm"><i class="fa fa-backward"></i> Kembali</a>
</p>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ asset('admin/karangtaruna/tambah_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
{{ csrf_field() }}



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
<label class="col-md-3 text-right">Nama Karangtaruna <span class="text-danger">*</span></label>
<div class="col-md-9">
<input type="text" name="nama_karangtaruna" class="form-control" placeholder="Nama karangtaruna" value="{{ old('nama_karangtaruna') }}" required>
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Kecamatan</label>
<div class="col-md-9">
<input type="text" name="kecamatan" class="form-control" placeholder="kecamatan (Position)" value="{{ old('kecamatan') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Desa</label>
<div class="col-md-9">
<input type="text" name="desa" class="form-control" placeholder="Desa" value="{{ old('desa') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Lokasi Sekertariat</label>
<div class="col-md-9">
<input type="text" name="lokasi" class="form-control" placeholder="Lokasi Sekertariat" value="{{ old('lokasi') }}">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">SK Pengukuhan</label>
<div class="col-md-5">
<input type="text" name="sk" class="form-control" placeholder="Nomor Sk Pengukuhan" value="{{ old('sk') }}">
</div>
<div class="col-md-4">
<input type="text" name="ttd" class="form-control" placeholder="yang mengukuhkan" value="{{ old('ttd') }}">
<small class="text-success">Yang Mengukuhkan</small>
</div>
</div>



<div class="row form-group">
<label class="col-md-3 text-right">Upload gambar/Foto</label>
<div class="col-md-9">
<input type="file" name="gambar" class="form-control" required="required" placeholder="Upload gambar">
</div>
</div>

<div class="row form-group">
<label class="col-md-3 text-right">Deskripsi Lengkap</label>
<div class="col-md-9">
<textarea name="isi" class="form-control" id="kontenku" placeholder="Visi/Misi">{{ old('isi') }}</textarea>
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
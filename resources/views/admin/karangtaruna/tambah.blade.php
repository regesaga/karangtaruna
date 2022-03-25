<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

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
  <label class="col-md-3 text-right">Kabupaten</label>
  <div class="col-md-9">
    <select class="form-control select2" name="kabupaten" id="kabupaten" placeholder="---Pilih Kabupaten---">
      @foreach ($kabupaten as $r_kab)
          <option  value="{{$r_kab->kab_kode}}">{{$r_kab->kab_nama}}</option>
      @endforeach
    </select>
  </div>
  </div>



  <div class="row form-group">
    <label class="col-md-3 text-right">Kecamatan</label>
    <div class="col-md-9">
      <select class="form-control select2" name="kecamatan" id="kecamatan">
        <option selected>---Pilih Kecamatan---</option>
      </select>
    </div>
    </div>

   

    <div class="row form-group">
      <label class="col-md-3 text-right">Desa</label>
      <div class="col-md-9">
        <select class="form-control select2" name="desa" id="desa">
          <option selected>---Pilih Desa---</option>
        </select>
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
  <label class="col-md-3 text-right">Periode</label>
  <div class="col-md-9">
  <input type="text" name="periode" class="form-control" placeholder="Periode" value="{{ old('periode') }}">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{url('wilayah.js')}}"></script>
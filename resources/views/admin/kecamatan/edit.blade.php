<p class="text-right">
	<a href="{{ asset('admin/kecamatan') }}" class="btn btn-success btn-sm">
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

<form action="{{ asset('admin/kecamatan/edit_proses') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
  {{method_field('post')}}
  @csrf
<input type="hidden" name="kec_kode" value="{{ $kecamatan->kec_kode }}">

<div class="row">
  <div class="col-sm-6">
    <!-- text input -->
    <div class="form-group">
      <label>Kecamatan</label>
      <input name="kec_nama" value="{{$kecamatan->kec_nama}}" class="form-control" placeholder="Kecamatan" readonly>
      <div class="text-danger">
      </div>
    </div>
    <div class="form-group">
      <label>Kode Kabupaten</label>
      <input name="kec_kab" value="{{$kecamatan->kec_kab}}" class="form-control" placeholder="Kode Kecamaatan" readonly >
      <div class="text-danger">
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label>Warna</label>
      <div id="cp1" data-color="primary">
        
        <input type="text" class="form-control" name="warna"  style="width:auto"/> <br>
      </div>
      <script>
        $(function () {
          $('#cp1').colorpicker({
            inline: true,
            container: true,
            extensions: [
              {
                name: 'swatches', // extension name to load
                options: { // extension options
                  colors: {
                    'black': '#000000',
                    'gray': '#888888',
                    'white': '#ffffff',
                    'red': 'red',
                    'default': '#777777',
                    'primary': '#337ab7',
                    'success': '#5cb85c',
                    'info': '#5bc0de',
                    'warning': '#f0ad4e',
                    'danger': '#d9534f'
                  },
                  namesAsValues: false
                }
              }
            ]
          });
        });
      </script>
    </div>
    <div class="text-danger">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <!-- textarea -->
    <div class="form-group">
      <label>GeoJson</label>
      <textarea name="geojson" class="form-control" rows="5" placeholder="GeoJSON">{{$kecamatan->geojson}}"</textarea>
      <div class="text-danger">
      </div>
    </div>
  </div>
</div>

<div class="form-group row">
  <label class="col-md-3 text-right"></label>
  <div class="col-md-9">
<div class="btn-group">
<input type="submit" name="submit" class="btn btn-success " value="Simpan Data">
<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
<div class="clearfix"></div>
</form>
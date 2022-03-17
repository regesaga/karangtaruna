<p class="text-right">
	<a href="{{ asset('admin/karangtaruna/edit/'.$karangtaruna->id_karangtaruna) }}" class="btn btn-warning btn-sm">
		<i class="fa fa-edit"></i> Edit
	</a>
	<a href="{{ asset('admin/karangtaruna') }}" class="btn btn-success btn-sm">
		<i class="fa fa-backward"></i> Kembali
	</a>
</p>
<hr>

<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
			<img src="{{ asset('assets/upload/karangtaruna/thumbs/'.$karangtaruna->gambar) }}" class="profile-user-img img-fluid img-circle" width="100">
        </div>

        <h3 class="profile-username text-center">{{ $karangtaruna->nama_karangtaruna }}</h3>

        <p class="text-muted text-center">{{ $karangtaruna->tingkat }}</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>{{ $karangtaruna->lokasi }}</b>
          </li>
          <li class="list-group-item">
            <b>{{ $karangtaruna->kecamatan }}</b>
          </li>
          <li class="list-group-item">
            <b>{{ $karangtaruna->periode }}</b>
          </li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <div class="col-md-9">
    	<div class="card card-primary">
    	<div class="card-header">
                <h3 class="card-title">About Me: {{ $karangtaruna->nama_karangtaruna }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<th width="25%">Nama Organisasi</th>
    				<th>{{ $karangtaruna->nama_karangtaruna }}</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>Tingkat</td>
    				<td>{{ $karangtaruna->tingkat }}</td>
    			</tr>
    			<tr>
    				<td>Kecamatan</td>
    				<td>{{ $karangtaruna->kecamatan }}</td>
    			</tr>
    			<tr>
    				<td>Desa</td>
    				<td>{{ $karangtaruna->desa }}</td>
    			</tr>
    			<tr>
    				<td>SK Pengukuhan</td>
    				<td>{{ $karangtaruna->sk }}</td>
    			</tr>
    			<tr>
    				<td>Yang Mengukuhkan</td>
    				<td>{{ $karangtaruna->ttd }}</td>
    			</tr>
    			<tr>
    				<td>Periode</td>
    				<td>{{ $karangtaruna->periode }}</td>
    			</tr>
    			
    			<tr>
    				<td>Deskripsi lengkap</td>
    				<td>{{ $karangtaruna->isi }}</td>
    			</tr>
    		</tbody>
    	</table>
</div>
</div>
</div>
    </div>
</div>
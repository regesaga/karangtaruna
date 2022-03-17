<p>
@include('admin/kategori_jabatan/tambah')
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="25%">NAMA JABATAN</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_jabatan as $kategori_jabatan) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_jabatan->nama_kategori_jabatan ?></td>
    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_jabatan->id_kategori_jabatan ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_jabatan/delete/'.$kategori_jabatan->id_kategori_jabatan) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_jabatan/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
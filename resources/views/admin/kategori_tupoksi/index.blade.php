<p>
@include('admin/kategori_tupoksi/tambah')
</p>

<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="25%">NAMA TUPOKSI</th>
    <th width="25%">KETERANGAN</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($kategori_tupoksi as $kategori_tupoksi) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $kategori_tupoksi->nama_kategori_tupoksi ?></td>
    <td><?php echo $kategori_tupoksi->keterangan ?></td>

    <td>
      <div class="btn-group">
      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori_tupoksi->id_kategori_tupoksi ?>">
    <i class="fa fa-edit"></i> Edit
</button>
      <a href="{{ asset('admin/kategori_tupoksi/delete/'.$kategori_tupoksi->id_kategori_tupoksi) }}" class="btn btn-danger btn-sm delete-link"><i class="fas fa-trash-alt"></i> Hapus</a>
      </div>
      @include('admin/kategori_tupoksi/edit')
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
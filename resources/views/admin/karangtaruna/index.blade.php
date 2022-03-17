
<div class="row">

  <div class="col-md-6">
    <form action="{{ asset('admin/karangtaruna/cari') }}" method="get" accept-charset="utf-8">
    <br>
    <div class="input-group">                  
      <input type="text" name="keywords" class="form-control" placeholder="Ketik kata kunci pencarian karangtaruna...." value="<?php if(isset($_GET['keywords'])) { echo strip_tags($_GET['keywords']); } ?>" required>
      <span class="input-group-btn btn-flat">
        <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
        <a href="{{ asset('admin/karangtaruna/tambah') }}" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru</a>
      </span>
    </div>
    </form>
  </div>
  <div class="col-md-6 text-left">
   
  </div>
</div>

<div class="clearfix"><hr></div>
<form action="{{ asset('admin/karangtaruna/proses') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}
<div class="row">
  

  <div class="col-md-8">
    <div class="btn-group">
      

         <?php if(isset($pagin)) { echo $pagin; } ?>

        </div>
      </div>
    </div>
    <div class="clearfix"><hr></div>
    <div class="table-responsive mailbox-messages">
      <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr class="bg-info">
            <th width="5%" class="text-center">
              <div class="mailbox-controls">
                <!-- Check all button -->
               <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
            </div>
            </th>
            <th width="5%">GAMBAR</th>
            <th width="20%">NAMA KARANGTARUNA</th>
            <th width="15%">TINGKAT</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $i=1; foreach($karangtaruna as $karangtaruna) { ?>

            <tr class="odd gradeX">
              <td class="text-center">
                <div class="icheck-primary">
                  <input type="checkbox" name="id_karangtaruna[]" value="<?php echo $karangtaruna->id_karangtaruna ?>" id="check<?php echo $i ?>">
                  <label for="check<?php echo $i ?>"></label>
                </div>
              </td>

              <td><img src="{{ asset('assets/upload/karangtaruna/thumbs/'.$karangtaruna->gambar) }}" class="img img-thumbnail img-fluid" width="80"></td>
              <td><?php echo $karangtaruna->nama_karangtaruna ?>
                <small>
                  <br><?php echo $karangtaruna->tingkat ?>
                  <br><?php echo $karangtaruna->desa ?>
                  <br><?php echo $karangtaruna->lokasi ?>
                  <br><?php echo $karangtaruna->periode ?>
                </small>
              </td>
              <td><?php echo $karangtaruna->tingkat ?></td>
              <td><div class="btn-group">
                  <a href="{{ asset('admin/karangtaruna/detail/'.$karangtaruna->id_karangtaruna) }}" 
                    class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                  <a href="{{ asset('admin/karangtaruna/edit/'.$karangtaruna->id_karangtaruna) }}" 
                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="{{ asset('admin/karangtaruna/delete/'.$karangtaruna->id_karangtaruna) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
                  </div>
                </td>
              </tr>
                    <?php $i++; } ?>
            </tbody>
          </table>
      </div>

      </form>

      <div class="clearfix"><hr></div>
      <div class="pull-right"><?php if(isset($pagin)) { echo $pagin; } ?></div>

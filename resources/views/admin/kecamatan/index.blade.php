<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<div id="map" style="width: 100%; height:500px;"></div>
    <script>

      var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              id: 'mapbox/streets-v11'
      });
  
      var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              id: 'mapbox/satellite-v9'
      });
  
  
      var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      });
  
      var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                  '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                  'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              id: 'mapbox/dark-v10'
      });
  
      var kecamatan = L.layerGroup();
      var map = L.map('map', {
          center: [-6.976872144489619, 108.48690413939111],
          zoom: 9,
          layers: [peta2,kecamatan]
      });
  
  
      var baseMaps = {
          "Grayscale": peta1,
          "Satellite": peta2,
          "Streets": peta3,
          "Dark": peta4,
  
      };
  
      var overlayMaps = {
           "kecamatan": kecamatan,
       };
  
      L.control.layers(baseMaps,overlayMaps).addTo(map);
      @foreach ($kecamatan as $data)
        L.geoJSON(<?= $data->geojson ?>).addTo(kecamatan).bindPopup("{{ $data->kec_nama}}");
    @endforeach
  </script>
<form action="{{ asset('admin/kecamatan/edit') }}" method="post" accept-charset="utf-8">
  {{method_field('post')}}
    @csrf


    <div class="clearfix"><hr></div>
    <div class="table-responsive mailbox-messages">
      <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr class="bg-info">
            <th>KODE KECAMATAN</th>
            <th width="20%">NAMA KECAMATAN</th>
            <th width="15%">KODE PROV</th>
            <th width="15%">WARNA</th>
            <th width="15%">geoJSON</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          
          <?php foreach($kecamatan as $kecamatan) { ?>

            <tr class="odd gradeX">
              <td><?php echo $kecamatan->kec_kode ?></td>
              <td><?php echo $kecamatan->kec_nama ?></td>
              <td><?php echo $kecamatan->kec_kab ?></td>
              <td style="background-color: {{$kecamatan-> warna}}" ></td>
              <td><?php echo $kecamatan->geojson ?></td>
              <td><div class="btn-group">
                  <a href="{{ asset('admin/kecamatan/edit/'.$kecamatan->kec_kode) }}" 
                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    
                  </div>
                </td>
              </tr>
                    <?php  } ?>
            </tbody>
          </table>
      </div>
      
      </form>

      <div class="clearfix"><hr></div>
      <div class="pull-right"><?php if(isset($pagin)) { echo $pagin; } ?></div>
      </div>
     

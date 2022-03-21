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
  
      var kabupaten = L.layerGroup();
      var map = L.map('map', {
          center: [-6.976872144489619, 108.48690413939111],
          zoom: 9,
          layers: [peta2,kabupaten]
      });
  
  
      var baseMaps = {
          "Grayscale": peta1,
          "Satellite": peta2,
          "Streets": peta3,
          "Dark": peta4,
  
      };
  
      var overlayMaps = {
           "kabupaten": kabupaten,
       };
  
      L.control.layers(baseMaps,overlayMaps).addTo(map);
      @foreach ($tbl_kabupaten as $data)
        L.geoJSON(<?= $data->geojson ?>).addTo(kabupaten).bindPopup("{{ $data->kab_nama}}");
    @endforeach
  </script>
    </form>

<div class="clearfix"><hr></div>
<form action="{{ asset('admin/kabupaten/proses') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}
 
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
            <th width="20%">NAMA KABUPATEN</th>
            <th width="15%">KODE PROV</th>
            <th width="15%">WARNA</th>
            <th width="100%">GEOJSON</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          
          <?php foreach($tbl_kabupaten as $tbl_kabupaten) { ?>

            <tr class="odd gradeX">
              <td><?php echo $tbl_kabupaten->kab_kode ?></td>
              <td><?php echo $tbl_kabupaten->kab_nama ?></td>
              <td><?php echo $tbl_kabupaten->kab_prov ?></td>
              <td style="background-color: {{$tbl_kabupaten-> warna}}" ></td>
              <td><?php echo $tbl_kabupaten->geojson ?></td>
              <td><div class="btn-group">
                  <a href="{{ asset('admin/kabupaten/edit/'.$tbl_kabupaten->kab_kode) }}" 
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

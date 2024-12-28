<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <a href="<?= base_url('master/location'); ?>" class="btn btn-secondary btn-icon-split mb-4">
            <span class="icon text-white">
              <i class="fas fa-chevron-left"></i>
            </span>
            <span class="text">Kembali</span>
          </a>


          <div class="row">
            <div class="col-lg-5">
              <div class="card">
                <h5 class="card-header">Data Induk Lokasi</h5>
                <div class="card-body">
                  <h5 class="card-title">Edit Lokasi</h5>
                  <p class="card-text">Form untuk mengubah lokasi</p>
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="l_name" class="col-form-label-lg">Nama Lokasi</label>
                      <input type="text" class="form-control form-control-lg" name="l_name" value="<?php echo $l_old['name'] ?>" id="l_name">
                      <?= form_error('l_name', '<small class="text-danger">', '</small>') ?>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-4">
                        <input type="text" name="latitude" class="form-control" value="<?php echo $l_old['latitude'] ?>" placeholder="latitude . . ." required="">
                      </div>
                      <div class="col-md-4">
                        <input type="text" name="longitude" class="form-control" value="<?php echo $l_old['longitude'] ?>" placeholder="longitude . . ." required="">
                      </div>
                      <div class="col-md-4">
                        <input type="number" name="range" class="form-control" value="<?php echo $l_old['range'] ?>" placeholder="Range (m) . . ." required="">
                        <small>Satuan meter</small>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-icon-split mt-4 float-right">
                      <span class="icon text-white">
                        <i class="fas fa-plus-circle"></i>
                      </span>
                      <span class="text">Perbarui System</span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div id="map" style="height: 400px"></div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

<script>
  $(function() {
    var map = L.map('map').setView([<?php echo $l_old['latitude'] ?? '-6.402648405963884' ?>, <?php echo $l_old['latitude'] ?? '106.61139476433961' ?>], 19);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Request user's current position
    map.locate({ setView: true, maxZoom: 19 });

    // Handle location found
    function onLocationFound(e) {

        let marker = L.marker([<?php echo $l_old['latitude'] ?? '-6.402648405963884' ?>, <?php echo $l_old['longitude'] ?? '106.61139476433961' ?>],  { draggable: true }).addTo(map)
            .bindPopup("Geser marker untuk menyesuaikan")
            .openPopup();

        // Listen for dragend event to update the location when the marker is dropped
        marker.on('dragend', function(event) {
            var newLatLng = event.target.getLatLng();
            // You can handle the updated position here, e.g., log it to the console or update a form field
            // console.log("New position: " + newLatLng.lat + ", " + newLatLng.lng);
            $('input[name="latitude"]').val(newLatLng.lat);
            $('input[name="longitude"]').val(newLatLng.lng);
        });
    }

    // Handle location error
    function onLocationError(e) {
        alert(e.message);
    }

    // Listen for location found and error events
    map.on('locationfound', onLocationFound);
    map.on('locationerror', onLocationError);
});

</script>
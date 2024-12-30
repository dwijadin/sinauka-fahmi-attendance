<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
       
       <!-- Begin Page Content -->
       <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
         </div>

         <!-- Content Row -->
         <div class="row">

           <div class="col">
             <div class="row">

               <!-- Area Chart -->
               <div class="col-xl-12 col-lg-7">
                 <div class="card shadow mb-4" style="min-height: 543px">
                   <!-- Card Header - Dropdown -->
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Isi Kehadiran Anda!</h6>
                   </div>
                   <!-- Card Body -->
                   <div class="card-body">
                     <?php if ($weekends == true) : ?>
                       <h1 class="text-center my-3">TERIMA KASIH UNTUK MINGGU INI!</h1>
                       <h5 class="card-title text-center mb-4 px-4">Selamat Beristirahat Minggu <b>Ini</b></h5>
                       <b>
                         <p class="text-center text-primary pt-3">Sampai jumpa di hari Senin!</p>
                       </b>
                       <div class="row">
                         <button disabled class="btn btn-danger btn-circle mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                           <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                         </button>
                       </div>
                     <?php else : ?>
                       <?php if ($in == false) : ?>
                         <?= form_open_multipart('attendance') ?>
                         <div class="row mb-3">
                           <div class="col-lg-5">
                             <label for="work_shift" class="col-form-label">Shift kerja</label>
                             <input class="form-control" type="text" placeholder="<?= $account['shift']; ?>" value="<?= $account['shift']; ?>" name="work_shift" readonly>
                           </div>
                           <div class="col-lg-5 offset-lg-1">
                             <label for="location" class="col-form-label">Check In Lokasi</label>
                             <select class="form-control" name="location" id="location">
                              <option value="">-- --</option>
                               <?php foreach ($location as $lct) : ?>
                                 <option value="<?= $lct['id'] ?>" data-name="<?php echo $lct['name'] ?>" data-range="<?php echo $lct['range'] ?>" data-latlng="<?php echo ($lct['latitude'] ? ($lct['latitude'].','.$lct['longitude']) : '') ?>"><?= $lct['id']; ?> = <?= $lct['name'] ?></option>
                               <?php endforeach; ?>
                             </select>
                           </div>
                         </div>
                         <div class="row mb-3">
                           <div class="col-lg-5 text-center">
                             <div class="row col">
                               <label for="image" class="col-form-label float-left">Unggah Gambar Anda</label>
                             </div>
                             <img id="output" style="max-height: 252px;" class="img-thumbnail rounded mb-2" src="<?= base_url('images/attendance/default.png') ?>">
                             <input type="file" class="d-block" id=image name="image" accept="image/*" onchange="loadFile(event)">
                             <script>
                               var loadFile = function(event) {
                                 var output = document.getElementById('output');
                                 output.src = URL.createObjectURL(event.target.files[0]);
                                 output.onload = function() {
                                   URL.revokeObjectURL(output.src) // free memory
                                 }
                               };
                             </script>
                           </div>

                           <div class="col-lg-5 offset-lg-1">
                            <div id="map" style="height: 290px"></div>  
                            <input type="hidden" name="latlng">
                           </div>
                           
                           <div class="col-lg-5 offset-lg-1 text-center" style="display: none">
                             <label for="notes" class="float-left">Catatan</label>
                             <textarea maxlength="120" class="form-control mb-4" name="notes" id="notes" rows="3" style="resize: none;"></textarea>
                             <hr>
                             <button type="submit" class="btn btn-info btn-circle" style="font-size: 20px; width: 100px; height: 100px">
                               <i class="fas fa-fw fa-sign-in-alt fa-2x"></i>
                             </button>
                             <b>
                               <p class="text-center text-primary pt-3">Turn It!</p>
                             </b>
                             <hr>
                           </div>
                         </div>


                         <hr>
                         <div class="row" id="access-btn">
                          <div class="col-lg-5 offset-lg-5">
                            <button type="submit" class="btn btn-info btn-circle" style="font-size: 20px; width: 100px; height: 100px">
                              <i class="fas fa-fw fa-sign-in-alt fa-2x"></i>
                            </button>
                            <h3>Turn It !</h3>
                          </div>
                         </div>
                         <?= form_close() ?>
                       <?php else : ?>
                         <h3 class="text-center my-3">TERIMA KASIH UNTUK HARI INI</h3>
                         <h6 class="card-title text-center mb-4 px-4">Dunia bisnis kurang bertahan pada keterampilan kepemimpinan dan lebih pada komitmen dan dedikasi karyawan yang bersemangat seperti Anda.<br>Terima kasih atas kerja keras Anda.</h6>
                         <?php if ($disable == false) : ?>
                           <b>
                             <p class="text-center text-primary pt-3">Check Out!</p>
                           </b>
                           <div class="row">
                             <!-- <a href="<?= base_url('attendance/checkout') ?>" onclick="return confirm('Check out now? Make sure you are done with you work!')" class="btn btn-danger btn-circle mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                               <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                             </a> -->
                             <a  data-toggle="modal" data-target="#checkout" href="javascript:void(0)" class="btn btn-danger btn-circle mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                               <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                             </a>

                             <!-- Modal -->
                             <div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel"
                               aria-hidden="true">
                               <div class="modal-dialog">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Check Out</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                   </div>
                                   <form action="<?php echo base_url('attendance/checkout') ?>" method="post" id="form-checkout">
                                   <div class="modal-body">
                                     <div class="form-group">
                                        <label for="">Laporan yang sudah dikerjakan</label>
                                        <div>
                                          <input type="text" name="link" class="form-control" value="" data-role="tagsinput" placeholder="Masukkan dalam bentuk link . . ." />
                                        </div>
                                     </div>
                                   </div>
                                   <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                     <button type="submit" class="btn btn-primary">Simpan Laporan</button>
                                   </div>
                                   </form>
                                 </div>
                               </div>
                             </div>
                           <?php else : ?>
                             <b>
                               <p class="text-center text-primary pt-3">Sampai jumpa besok!</p>
                             </b>
                             <div class="row">
                               <button disabled class="btn btn-danger btn-circle mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                                 <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                               </button>
                             <?php endif; ?>
                             </div>
                           <?php endif; ?>
                         <?php endif; ?>
                           </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- End  -->
         </div>
         <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->

       <!-- Toast Container (Positioned at the Top Right) -->
      <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <div id="distanceToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="color: #fff">
          <div class="toast-body">
            <!-- The result will be displayed here -->
          </div>
        </div>
      </div>



 <!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

<?php if ($in == false) : ?>
<script>
  $(function() {

      // Initialize the map and set default coordinates (you can adjust this initially)
      var map = L.map('map').setView([51.505, -0.09], 13);

      // Add the tile layer (OpenStreetMap)
      L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      }).addTo(map);

      // Use Geolocation to get current position
      if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function(position) {
          // Get current latitude and longitude
          var currentLatitude = position.coords.latitude;
          var currentLongitude = position.coords.longitude;

          console.log( currentLatitude, currentLongitude );

          // Set the map view to the current position
          map.setView([currentLatitude, currentLongitude], 17);

          // Add a marker at the current position
          L.marker([currentLatitude, currentLongitude]).addTo(map)
            .bindPopup("Posisi kamu terkini")
            .openPopup();
        }, function(error) {
          console.error("Error getting location: ", error);
        });
      } else {
        console.error("Geolocation is not supported by this browser.");
      }


    var officeMarker, officeCircle, lineBetween;

    // change position 
    $('select[name="location"]').change(function() {
      
      let selectedOption = $(this).find('option:selected');
      let latlng = selectedOption.data('latlng');
      let range = selectedOption.data('range');
      let name = selectedOption.data('name');


      if (latlng && latlng.length > 0) {
        // Split the selected latlng into latitude and longitude
        const [latitude, longitude] = latlng.split(',');

        // Remove the previous marker if it exists
        if (officeMarker) {
          officeMarker.remove();  // This will remove the previous marker from the map
          // officeCircle.remove();  // This will remove the previous marker from the map
          lineBetween.remove();  // This will remove the previous marker from the map
        }

        // Add a circle around the marker
        // officeCircle = L.circle([latitude, longitude], {
        //   color: 'blue',          // Circle border color
        //   fillColor: 'blue',      // Circle fill color
        //   fillOpacity: 0.1,       // Circle fill opacity
        //   radius: range            // Radius of the circle (in meters)
        // }).addTo(map);

        // Define a custom icon for the office marker
        var officeIcon = L.icon({
          iconUrl: 'https://cdn-icons-png.flaticon.com/256/6017/6017722.png',  // URL to your custom PNG image
          iconSize: [40, 40],  // Size of the icon (width, height)
          iconAnchor: [20, 40], // Anchor point of the icon (position on the marker)
          popupAnchor: [0, -40]  // Offset of the popup (relative to the icon)
        });

        officeMarker = L.marker([latitude, longitude], {icon: officeIcon}).addTo(map)
            .bindPopup("Posisi kantor " + name)
            .openPopup();

        

        // Get current position using Geolocation API
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            // Current position
            const currentLatitude = position.coords.latitude;
            const currentLongitude = position.coords.longitude;

            let str = `${currentLatitude},${currentLongitude}`;
            $('input[name="latlng"]').val( str );

            // Convert latitude and longitude to Cartesian coordinates (approximation)
            const x1 = latitude;
            const y1 = longitude;
            const x2 = currentLatitude;
            const y2 = currentLongitude;

            // Euclidean distance formula (in degrees)
            const distance = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2));

            // Optionally, multiply by a constant (e.g., 111320) to convert to meters
            // Approximation of meters per degree of latitude/longitude
            const distanceInMeters = distance * 111320; 

            // Decide toast color based on distance
            let toastColor = 'bg-danger'; // Default color is red (danger)
            let msg = "Anda absen diluar area batas yang ditentukan";
            $('#access-btn').hide();
            if (distanceInMeters <= range) {
              toastColor = 'bg-success'; // Change to green (success) if distance is <= 10 meters
              // let pos = $(this).val();
              msg = `Halo selamat datang di ${name} <br> Silahkan melakukan absen dibawah ini <hr><small>Anda berada di jangkauan area kantor yang telah ditentukan</small>`;
              $('#access-btn').hide().fadeIn();


              // Draw a line between the office and current position
              lineBetween = L.polyline([
                [currentLatitude, currentLongitude], // Current position
                [latitude, longitude]               // Office position
              ], { color: 'red', weight: 3 }).addTo(map);

              // Optionally, fit the map to show the entire line
              map.fitBounds(lineBetween.getBounds());
            }
            // Update the toast body content with the result
            $('#distanceToast .toast-body').html(msg);

            // Apply the color to the toast
            $('#distanceToast').removeClass('bg-success bg-danger').addClass(toastColor);

            // Show the toast
            $('#distanceToast').toast({ delay: 50000 }).toast('show'); // 50 seconds auto-dismiss


          }, function(error) {
            console.error("Error getting location: ", error);
          });
        } else {
          console.error("Geolocation is not supported by this browser.");
        }
      } else {
        $('#access-btn').hide().fadeIn();
        if ( name === undefined ) {
          $('#access-btn').hide();
        }
      }
    });
  });
</script>

<?php endif; ?>

<script>
  $(function() {
    $('#form-checkout').submit(function( e ) {
      e.preventDefault();
      
      let nilai = $('input[name="link"]').val();
      if ( nilai.length > 0 ) {
        
        // split arr 
        let divideArr = nilai.split(',');
        if ( divideArr.length < 5 ) {

          if (confirm(`Tugas yang anda masukkan kurang dari 5 poin, apakah anda yakin ingin mengirim hasil pengerjaan anda`) ) {

            this.submit();
          }
          
        } else {

          this.submit();
        }
      }
    });
  });
</script>
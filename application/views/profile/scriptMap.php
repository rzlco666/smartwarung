<script>
    function formatNumber (angka) {
        var rupiah = '';
        var angkarev = angka.toString().split('').reverse().join('');
        for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
        return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
    };

    function initMap() {
        var myLatlng = {lat: <?php echo $warung['lat'] ?>, lng: <?php echo $warung['lng'] ?>};
        document.getElementById('address').innerHTML = "<?php echo $warung['address'] ?>";
        <?php if($this->session->userdata('role')==1 and $this->session->userdata('username')==$warung['username']): ?>
            document.getElementById('status').innerHTML = "<?php echo $warung['status'] ?>";
            <?php if($warung['status']=='Sudah diverifikasi'): ?>
            document.getElementById('status').classList.add("bg-info");
            document.getElementById('status').classList.add("text-white");
            <?php elseif($warung['status']=='Belum diverifikasi'): ?>
            document.getElementById('status').classList.add("bg-warning");
            document.getElementById('status').classList.add("text-dark");
            <?php elseif($warung['status']=='Verifikasi tidak disetujui'): ?>
            document.getElementById('status').classList.add("bg-danger");
            document.getElementById('status').classList.add("text-white");
            <?php endif; ?>
        <?php endif; ?>

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatlng
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Click to zoom'
        });

        map.addListener('center_changed', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        marker.addListener('click', function() {
          map.setZoom(8);
          map.setCenter(marker.getPosition());
        });
      };

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnAQMVvRRzgVVF5DKMkQqjWRr-R70vsXg&callback=initMap"></script>
</body>
</html>

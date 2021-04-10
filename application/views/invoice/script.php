
<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    center: {lat: -6.974028, lng: 107.6305287},
    zoom: 13
  });

  new AutocompleteDirectionsHandler(map);
}

/**
 * @constructor
 */
function AutocompleteDirectionsHandler(map) {
  this.map = map;
  this.originPlaceId = null;
  this.destinationPlaceId = null;
  this.travelMode = 'DRIVING';
  this.directionsService = new google.maps.DirectionsService;
  this.directionsRenderer = new google.maps.DirectionsRenderer;
  this.directionsRenderer.setMap(map);

  var originInput = document.getElementById('origin-input');
  // console.log(originInput);
  var destinationInput = document.getElementById('destination-input');
  // console.log(destinationInput);
  var modeSelector = document.getElementById('mode-selector');

  var originAutocomplete = new google.maps.places.Autocomplete(originInput);
  // Specify just the place data fields that you need.
  originAutocomplete.setFields(['place_id']);
  console.log(originAutocomplete);

  var destinationAutocomplete =
      new google.maps.places.Autocomplete(destinationInput);
  // Specify just the place data fields that you need.
  destinationAutocomplete.setFields(['place_id']);

  // this.setupClickListener('changemode-walking', 'WALKING');
  // this.setupClickListener('changemode-transit', 'TRANSIT');
  // this.setupClickListener('changemode-driving', 'DRIVING');

  this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
  this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

  // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
  // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
  //     destinationInput);
  // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
}

// Sets a listener on a radio button to change the filter type on Places
// Autocomplete.
AutocompleteDirectionsHandler.prototype.setupClickListener = function(
    id, mode) {
  var radioButton = document.getElementById(id);
  var me = this;

  // radioButton.addEventListener('click', function() {
  //   me.travelMode = mode;
  //   me.route();
  // });
};

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(
    autocomplete, mode) {
  var me = this;
  autocomplete.bindTo('bounds', this.map);

  autocomplete.addListener('place_changed', function() {
    var place = autocomplete.getPlace();

    if (!place.place_id) {
      window.alert('Please select an option from the dropdown list.');
      return;
    }
    if (mode === 'ORIG') {
      me.originPlaceId = place.place_id;
    } else {
      me.destinationPlaceId = place.place_id;
      me.originPlaceId = document.getElementById('origin-place_id').value;
      document.getElementById('destination-place_id').value = me.destinationPlaceId;
    }
    me.route();
  });
};

AutocompleteDirectionsHandler.prototype.route = function() {
  if (!this.originPlaceId || !this.destinationPlaceId) {
    return;
  }
  var me = this;

  // console.log(this.originPlaceId);

  this.directionsService.route(
      {
        origin: {'placeId': this.originPlaceId},
        destination: {'placeId': this.destinationPlaceId},
        travelMode: this.travelMode,
        avoidHighways: false,
        avoidTolls: true
      },
      function(response, status) {
        if (status === 'OK') {
          var total = 0;
          var myroute = response.routes[0]
          me.directionsRenderer.setDirections(response);

          // jarak
          for(var i=0; i<myroute.legs.length; i++){
            total += myroute.legs[i].distance.value;
          }

          // convert ke km
          var newDistance = (total/1000);
          document.getElementById('distance').value   = newDistance.toFixed(1).replace(",", ".");

          // tarif
          var tarif = 2500;
          var deliveryFee = ((total/1000).toFixed(1)*tarif).toFixed(0);
          document.getElementById('ongkir').innerHTML = formatNumber(deliveryFee);
          document.getElementById('delivery_fee').value = deliveryFee;

          var billing    = document.getElementById('billing').value; //total belanja belum ongkir
          var finalTotal = parseInt(billing) + parseInt(deliveryFee);
          document.getElementById('total').innerHTML  = formatNumber(finalTotal);
          document.getElementById('total_price').value = finalTotal;

        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
};

function formatNumber (angka) {
  var rupiah = '';
  var angkarev = angka.toString().split('').reverse().join('');
  for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
  return 'Rp '+rupiah.split('',rupiah.length-1).reverse().join('');
}

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0IiE8DDVHIZJYCT1jmcaJpXtjP6Dftvg&libraries=places&callback=initMap"></script>
</body>
</html>
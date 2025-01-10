<!DOCTYPE html>
<html>
<head>
  <title>Google Places API Location Dropdown</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbmZuuwW5NdIcBre11P1Gck7-_bN_-bas&libraries=places"></script>
</head>
<body>

  <label for="location" class="form-label fw-bold">Location</label>
  <input type="text" id="location-input" class="form-control mb-3" placeholder="Enter location">
  <select class="form-select mb-3" id="location-select"></select>

  <script>
    function initAutocomplete() {
      const input = document.getElementById('location-input');
      const select = document.getElementById('location-select');

      const autocomplete = new google.maps.places.Autocomplete(input, { types: ['(cities)'] });

      autocomplete.addListener('place_changed', () => {
        const place = autocomplete.getPlace();

        // Clear existing options
        select.innerHTML = '';

        // Add the selected place to the dropdown
        const option = document.createElement('option');
        option.value = place.formatted_address;
        option.text = place.formatted_address;
        select.appendChild(option);
      });
    }

    initAutocomplete();
  </script>

</body>
</html>
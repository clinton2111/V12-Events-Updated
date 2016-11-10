/*!  - v - 2016-11-10 */(function() {
  var marker;

  marker = null;

  $('#ajaxUpdatePassword').on('click', function() {
    var _token, new_password, password_confirmation;
    event.preventDefault();
    new_password = document.getElementById("new_password").value;
    password_confirmation = document.getElementById("password_confirmation").value;
    _token = document.getElementById("_token").value;
    if (new_password !== password_confirmation) {
      return toastr.error('Please type the same password.');
    } else {
      return $.ajax({
        method: 'POST',
        url: URL,
        data: {
          new_password: new_password,
          password_confirmation: password_confirmation,
          _token: _token
        }
      }).done(function(data) {
        if (data['status'] === 200) {
          toastr.success(data['message']);
          document.getElementById("new_password").value = '';
          return document.getElementById("password_confirmation").value = '';
        } else {
          return toastr.error(data['message']);
        }
      });
    }
  });

  $('#ajaxUpdateAddress').on('click', function() {
    var _token, building, city, country, street;
    event.preventDefault();
    building = document.getElementById("building").value;
    street = document.getElementById("street").value;
    city = document.getElementById("city").value;
    country = document.getElementById("country").value;
    _token = document.getElementById("_token").value;
    return $.ajax({
      method: 'Post',
      url: URL,
      data: {
        _token: _token,
        building: building,
        street: street,
        city: city,
        country: country
      }
    }).done(function(data) {
      if (data['status'] === 200) {
        return toastr.success(data['message']);
      } else {
        return toastr.error(data['message']);
      }
    });
  });

  window.initMap = function() {
    var latlong, map;
    latlong = {
      lat: 25.1972,
      lng: 55.2744
    };
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: latlong
    });
    marker = new google.maps.Marker({
      position: latlong,
      draggable: true
    });
    google.maps.event.addListener(marker, 'dragend', function() {
      return $('#ajaxUpdateMapLocation').removeClass('disabled');
    });
    return marker.setMap(map);
  };

  $('#ajaxUpdateMapLocation').on('click', function() {
    var _token, lat, long;
    event.preventDefault();
    lat = marker.getPosition().lat();
    long = marker.getPosition().lng();
    _token = document.getElementById("_token_map").value;
    console.log(lat);
    console.log(long);
    return $.ajax({
      method: 'Post',
      url: URL_MAP,
      data: {
        _token: _token,
        lat: lat.toString(),
        long: long.toString()
      }
    }).done(function(data) {
      if (data['status'] === 200) {
        return toastr.success(data['message']);
      } else {
        return toastr.error(data['message']);
      }
    });
  });

}).call(this);

(function() {
  $(document).ready(function() {
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    return $('select').material_select();
  });

}).call(this);

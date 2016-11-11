/*!  - v - 2016-11-11 */(function() {
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

  $('#ajaxUpdateMapLocation').on('click', function() {
    var _token;
    event.preventDefault();
    _token = document.getElementById("_token_map").value;
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

  $('#ajaxUpdateMapStyle').on('click', function() {
    var _token, style;
    event.preventDefault();
    style = document.getElementById("mapStyles").value;
    _token = document.getElementById("mapStylesToken").value;
    return $.ajax({
      method: 'Post',
      url: URL_MAP_STYLE,
      data: {
        _token: _token,
        style: style.toString()
      }
    }).done(function(data) {
      if (data['status'] === 200) {
        toastr.success(data['message']);
        return $('#mapStyleModal').modal('close');
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
    $('select').material_select();
    return $('.modal').modal();
  });

}).call(this);

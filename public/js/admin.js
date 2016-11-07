/*!  - v - 2016-11-07 */(function() {
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
    var building, city, country, street;
    event.preventDefault();
    building = document.getElementById("building").value;
    street = document.getElementById("street").value;
    city = document.getElementById("city").value;
    country = document.getElementById("country").value;
    return console.log(URL);
  });

}).call(this);

(function() {
  $(document).ready(function() {
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
    return $('select').material_select();
  });

}).call(this);

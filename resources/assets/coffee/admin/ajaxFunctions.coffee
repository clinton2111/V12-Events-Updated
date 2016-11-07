$ '#ajaxUpdatePassword'
.on 'click', ->
  event.preventDefault();
  new_password = document.getElementById("new_password").value;
  password_confirmation = document.getElementById("password_confirmation").value;
  _token = document.getElementById("_token").value;
  if new_password != password_confirmation then toastr.error('Please type the same password.')
  else
    $.ajax
      method: 'POST',
      url: URL,
      data: {
        new_password: new_password,
        password_confirmation: password_confirmation,
        _token: _token
      }
    .done (data)->
      if data['status'] == 200
        toastr.success(data['message'])
        document.getElementById("new_password").value = ''
        document.getElementById("password_confirmation").value = ''
      else
        toastr.error(data['message'])

$ '#ajaxUpdateAddress'
.on 'click', ->
  event.preventDefault();
  building = document.getElementById("building").value;
  street = document.getElementById("street").value;
  city = document.getElementById("city").value;
  country = document.getElementById("country").value;
  console.log URL;


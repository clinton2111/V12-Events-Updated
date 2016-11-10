marker = null;
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
  _token = document.getElementById("_token").value;
  $.ajax
    method: 'Post'
    url: URL
    data:
      _token: _token
      building: building
      street: street
      city: city
      country: country
  .done (data)->
    if data['status'] == 200
      toastr.success(data['message'])
    else
      toastr.error(data['message'])


window.initMap = ->
  latlong = {lat: 25.1972, lng: 55.2744};
  map = new (google.maps.Map)(document.getElementById('map'),
    zoom: 15,
    center: latlong
  )

  marker = new google.maps.Marker
    position: latlong,
    draggable: true

  google.maps.event.addListener marker, 'dragend', ->
    $('#ajaxUpdateMapLocation').removeClass('disabled')

  marker.setMap(map)


$ '#ajaxUpdateMapLocation'
.on 'click', ->
  event.preventDefault();
  lat = marker.getPosition().lat();
  long = marker.getPosition().lng()
  _token = document.getElementById("_token_map").value;
  console.log lat
  console.log long
  $.ajax
    method: 'Post'
    url: URL_MAP
    data:
      _token: _token
      lat: lat.toString()
      long: long.toString()
  .done (data)->
    if data['status'] == 200
      toastr.success(data['message'])
    else
      toastr.error(data['message'])
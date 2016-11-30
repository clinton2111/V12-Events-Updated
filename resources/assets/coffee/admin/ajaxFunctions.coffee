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

$ '#ajaxUpdateMapLocation'
.on 'click', ->
  event.preventDefault();
  _token = document.getElementById("_token_map").value;
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


$ '#ajaxUpdateMapStyle'
.on 'click', ->
  event.preventDefault();
  style = document.getElementById("mapStyles").value
  _token = document.getElementById("mapStylesToken").value;
  $.ajax
    method: 'Post'
    url: URL_MAP_STYLE
    data:
      _token: _token
      style: style.toString()
  .done (data)->
    if data['status'] == 200
      toastr.success(data['message'])
      map.setOptions({
        styles: JSON.parse(style)
      })
      $('#mapStyleModal').modal('close');
    else
      toastr.error(data['message'])

$ '#ajaxUpdateSocialLinks'
.on 'click', ->
  event.preventDefault();
  _facebook = if document.getElementById("facebook_link").value then document.getElementById("facebook_link").value else null
  _twitter = if document.getElementById("twitter_link").value then document.getElementById("twitter_link").value else null
  _gplus = if document.getElementById("gplus_link").value then document.getElementById("gplus_link").value else null
  _instagram = if document.getElementById("instagram_link").value then document.getElementById("instagram_link").value else null
  _youtube = if document.getElementById("youtube_link").value then document.getElementById("youtube_link").value else null
  _linkedin = if document.getElementById("linkedin_link").value then document.getElementById("linkedin_link").value else null
  _vimeo = if document.getElementById("vimeo_link").value then document.getElementById("vimeo_link").value else null
  _snapchat = if document.getElementById("snapchat_link").value then document.getElementById("snapchat_link").value else null
  _token = document.getElementById("_token_social").value;
  $.ajax
    method: 'Post'
    url: URL_SOCIAL
    data:
      _token: _token
      facebook:_facebook
      twitter:_twitter
      gplus:_gplus
      instagram:_instagram
      youtube:_youtube
      linkedin:_linkedin
      vimeo:_vimeo
      snapchat:_snapchat
  .done (data)->
    if data['status'] == 200
      toastr.success(data['message'])
    else
      toastr.error(data['message'])
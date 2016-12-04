(function() {
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
        map.setOptions({
          styles: JSON.parse(style)
        });
        return $('#mapStyleModal').modal('close');
      } else {
        return toastr.error(data['message']);
      }
    });
  });

  $('#ajaxUpdateSocialLinks').on('click', function() {
    var _facebook, _gplus, _instagram, _linkedin, _snapchat, _token, _twitter, _vimeo, _youtube;
    event.preventDefault();
    _facebook = document.getElementById("facebook_link").value ? document.getElementById("facebook_link").value : null;
    _twitter = document.getElementById("twitter_link").value ? document.getElementById("twitter_link").value : null;
    _gplus = document.getElementById("gplus_link").value ? document.getElementById("gplus_link").value : null;
    _instagram = document.getElementById("instagram_link").value ? document.getElementById("instagram_link").value : null;
    _youtube = document.getElementById("youtube_link").value ? document.getElementById("youtube_link").value : null;
    _linkedin = document.getElementById("linkedin_link").value ? document.getElementById("linkedin_link").value : null;
    _vimeo = document.getElementById("vimeo_link").value ? document.getElementById("vimeo_link").value : null;
    _snapchat = document.getElementById("snapchat_link").value ? document.getElementById("snapchat_link").value : null;
    _token = document.getElementById("_token_social").value;
    return $.ajax({
      method: 'Post',
      url: URL_CONTACT,
      data: {
        _token: _token,
        facebook: _facebook,
        twitter: _twitter,
        gplus: _gplus,
        instagram: _instagram,
        youtube: _youtube,
        linkedin: _linkedin,
        vimeo: _vimeo,
        snapchat: _snapchat,
        category: 'social'
      }
    }).done(function(data) {
      if (data['status'] === 200) {
        return toastr.success(data['message']);
      } else {
        return toastr.error(data['message']);
      }
    });
  });

  $('#ajaxUpdateContactDetails').on('click', function() {
    var _email, _phone, _skype, _token, _whatsapp;
    event.preventDefault();
    _phone = document.getElementById("phone_contact_detail").value ? document.getElementById("phone_contact_detail").value : null;
    _email = document.getElementById("email_contact_detail").value ? document.getElementById("email_contact_detail").value : null;
    _skype = document.getElementById("skype_contact_detail").value ? document.getElementById("skype_contact_detail").value : null;
    _whatsapp = document.getElementById("whatsapp_contact_detail").value ? document.getElementById("whatsapp_contact_detail").value : null;
    _token = document.getElementById("_token_contact").value;
    return $.ajax({
      method: 'Post',
      url: URL_CONTACT,
      data: {
        _token: _token,
        phone: _phone,
        email: _email,
        skype: _skype,
        whatsapp: _whatsapp,
        category: 'contact'
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

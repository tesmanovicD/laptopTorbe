$(document).ready( function() {
  brendNiz = [];
  // brendoviNiz = asusNiz.concat(acerNiz,lenovoNiz,toshibaNiz);

  function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
      var sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] == sParam) {
        return sParameterName[1];
      } else {
        return "asus";
      }
    }
  }

  var brend = GetURLParameter('brend');

  $('.test').html(brend);

  if (brend) {
    if (brend === "asus") {
      brendNiz = asusNiz;
    } else if (brend === "acer") {
      brendNiz = acerNiz;
    } else if (brend === "lenovo") {
      brendNiz = lenovoNiz;
    } else if (brend === "toshiba") {
      brendNiz = toshibaNiz;
    }else if (brend === "dell") {
      brendNiz = dellNiz;
    }else if (brend === "hp") {
      brendNiz = hpNiz;
    }else if (brend === "targus") {
      brendNiz = targusNiz;
    }
    else {
      brendNiz =asusNiz;
    }
  } else {
    brendNiz = asusNiz;
  }

  $.each(brendNiz, function (index, value) {
    if (value.opis.length > 29) value.opis = value.opis.substring(0,20)+"...";
      let brend = "<div class='card col-md-3'><img src='"+value.slika+"' alt='Card image1' class='card-img-top'><div class='card-block'><h4 class='card-title'>"+value.naziv+"</h4><p class='card-text'>"+value.opis+"</p></div><div class='card-footer'><p class='card-text'>Cena: "+value.cena+" RSD</p></div><a href='"+value.link+"' class='button'><span>Pogledaj proizvod</span></a></div>"
  $('.main-right').append(brend);
  });

});

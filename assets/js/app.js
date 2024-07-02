/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$("#input-dim-1a").fileinput({
//    uploadUrl: "/file-upload-batch/2",
//    allowedFileExtensions: ["jpg", "png", "gif"],
//    minImageWidth: 50,
//    minImageHeight: 50
//});

function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
      }
    };
    xmlhttp.open("GET", "ambil/?id=" + str, true);
    xmlhttp.send();
  }
}

(function ($) {
  $.QueryString = (function (a) {
    if (a == "") return {};
    var b = {};
    for (var i = 0; i < a.length; ++i) {
      var p = a[i].split("=");
      if (p.length != 2) continue;
      b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
    }
    return b;
  })(window.location.search.substr(1).split("&"));
})(jQuery);

var d = new Date(Date(2024, 7, 2, 16, 13, 35));
var weekday = new Array(7);
var weekday = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
var weekday_en = new Array(7);
var weekday_en = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday",
];
var monthname = new Array(12);
var monthname = [
  "",
  "Januari",
  "Februari",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "Juli",
  "Agustus",
  "September",
  "Oktober",
  "November",
  "Desember",
];
var monthname_en = new Array(12);
var monthname_en = [
  "",
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];
var dayname = weekday[2];
var day = 02;
var month = monthname[07];
var year = 2024;
if ("idn" == "en") {
  var dayname = weekday_en[2];
  var month = monthname_en[07];
}
setInterval(function () {
  d.setSeconds(d.getSeconds() + 1);
  $("#clocktime").text(
    dayname +
      ", " +
      day +
      " " +
      month +
      " " +
      year +
      ", " +
      d.getHours() +
      ":" +
      d.getMinutes() +
      ":" +
      d.getSeconds()
  );
}, 1000);

function getData(dropdown) {
  var value = dropdown.options[dropdown.selectedIndex].value;
  if (document.getElementById("dariTGL").style.display == "inline") {
  }
  document.getElementById("dariTGL").style.display = "none";
  document.getElementById("sampaiTGL").style.display = "none";
  if (value == "4") {
    document.getElementById("dariTGL").style.display = "inline";
    document.getElementById("sampaiTGL").style.display = "inline";
  }
}

function tampilBooking() {
  $.ajax({
    type: "POST",
    cache: false,
    url: "booking?action=showBookingDetail",
    success: function (response) {
      $("#modalBooking").modal("show");
      $("#BookingShow").html(response);
    },
  });
}

function tampilUsulan() {
  $.ajax({
    type: "POST",
    cache: false,
    url: "usulan-koleksi?action=showUsulan",
    success: function (response) {
      $("#modalUsulan").modal("show");
      $("#UsulanShow").html(response);
    },
  });
}

function tampilLogin() {
  $.ajax({
    type: "POST",
    cache: false,
    url: "site/login",
    success: function (response) {
      $("#modalLogin").modal("show");
      $("#LoginShow").html(response);
    },
  });
}

function cancelBooking(id) {
  $.ajax({
    type: "POST",
    cache: false,
    url: "booking?action=cancelBooking&colID=" + id,
    success: function (response) {
      $("#modalBooking").modal("hide");
      $("#alert").html(response);
    },
  });
}

function loginAnggota() {
  $.ajax({
    type: "POST",
    cache: false,
    url: "site/loginanggota",
    data: $("#login-anggota").serialize(),
    success: function (response) {
      console.log(response);
      if (response) {
        $("#error-login-opac-123-321").html(response);
      }
    },
  });
}

var MaxInputs = 50;
var Dynamic = $("#Dynamic");
var i = $("#Dynamic div").size() + 1;

$("#AddInpElem").click(function () {
  if (i <= MaxInputs) {
    $(
      '<div> <div class="row">  <div class="col-sm-1"></div>  <div class="col-sm-1"><div class="form-group"><select name="danAtau[]" class="form-control"><option value="and">dan</option>  <option value="or">atau</option>   <option value="selain">selain</option>      </select></div></div><div class="col-sm-3"><div class="form-group">  <input name="katakunci[]"  type="text" class="form-control login-field"  /></div></div><div class="col-sm-2"><div class="form-group"> <select name="jenis[]" class="form-control"><option>di dalam</option><option >di awal</option><option >di akhir</option> </select></div></div><div class="col-sm-3"><div class="form-group"><select   name="tag[]" class="form-control"> <option value="Judul">Judul</option> <option value="Pengarang">Pengarang</option> <option value="Penerbitan">Penerbitan</option> <option value="Edisi">Edisi</option> <option value="Deskripsi Fisik">Deskripsi Fisik</option> <option value="Jenis Konten">Jenis Konten</option> <option value="Jenis Media">Jenis Media</option> <option value="Media Carrier">Media Carrier</option> <option value="Subyek">Subyek</option> <option value="ISBN">ISBN</option> <option value="ISSN">ISSN</option> <option value="ISMN">ISMN</option> <option value="Nomor Panggil">ISBN</option> <option value="Sembarang Ruas">Sembarang Ruas </option>       </select> </div></div><a href="javascript:void(0)" class="RemInpElem"><span class="glyphicon glyphicon-minus-sign"></span></a> &nbsp; </div> </div>'
    ).appendTo(Dynamic);
    i++;
  }
  return false;
});

$("body").on("click", ".RemInpElem", function () {
  if (i > 2) {
    $(this).parent("div").remove();
    i--;
  }
  return false;
});

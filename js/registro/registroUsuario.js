$("#btnRegistro").click(function (e) {
  if (
    validarCorreo() == true &&
    validarClave() == true &&
    validarNombres() == true &&
    validarApellidos() == true &&
    validarEspectro() == true &&
    validarCertificado() == true && 
    validarRut() == true
  ) {
    $("#formRegistroUsuario").submit();
  } else {
    e.preventDefault();
  }
});

$("#correo").keypress(function (e) {
  $("#errorCorreo").html(
    "<span class='text-primary'>Formato de correo: correo@correo.com</span>"
  );
});
$("#clave").keypress(function (e) {
  $("#errorClave").html(
    "<span class='text-primary'>La contraseña debe tener entre 8 y 12 caracteres</span>"
  );
});

$("#rut").keyup(function (e) {
  if (Fn.validaRut($("#rut").val())) {
    $("#rut").css("border-color", "green");
    $("#rut").css("border-width", "2px");
    $("#errorRut").html("<span class='text-success'>Rut valido</span>");
  } else {
    $("#errorRut").html("<span class='text-danger'>Rut no valido</span>");
  }
});

function validarCorreo() {
  const reg = /^[^@]+@[^@]+.[a-zA-Z]{2,}$/;
  if (reg.test($("#correo").val()) || $("#correo").val() != "") {
    $("#correo").css("border-color", "green");
    $("#correo").css("border-width", "2px");
    $("#errorCorreo").html("<span class='text-success'>Correo valido</span>");
    return true;
  } else {
    $("#correo").css("border-color", "red");
    $("#correo").css("border-width", "2px");
    $("#errorCorreo").html("<span class='text-danger'>Correo no valido</span>");
    return false;
  }
}

function validarClave() {
  if ($("#clave").val().length >= 8 && $("#clave").val().length <= 12) {
    $("#clave").css("border-color", "green");
    $("#clave").css("border-width", "2px");
    $("#errorClave").html("<span class='text-success'>Clave valida</span>");
    return true;
  } else {
    $("#clave").css("border-color", "red");
    $("#clave").css("border-width", "2px");
    $("#errorClave").html(
      "<span class='text-danger'>La clave debe tener entre 8 a 12 caracteres</span>"
    );
    return false;
  }
}

function validarRut() {
  if (Fn.validaRut($("#rut").val())) {
    $("#rut").css("border-color", "green");
    $("#rut").css("border-width", "2px");
    $("#errorRut").html("<span class='text-success'>Rut valido</span>");
    return true;
  } else {
    $("#rut").css("border-color", "red");
    $("#rut").css("border-width", "2px");
    $("#errorRut").html("<span class='text-danger'>Rut no valido</span>");
    return false;
  }
}

function validarNombres() {
  if (
    $("#nombres").val().length >= 3 &&
    $("#nombres").val().length <= 50 &&
    $("#nombres").val() != ""
  ) {
    $("#nombres").css("border-color", "green");
    $("#nombres").css("border-width", "2px");
    $("#errorNombres").html(
      "<span class='text-success'>Nombres validos</span>"
    );
    return true;
  } else {
    $("#nombres").css("border-color", "red");
    $("#nombres").css("border-width", "2px");
    $("#errorNombres").html(
      "<span class='text-danger'>Nombres no validos</span>"
    );
    return false;
  }
}

function validarApellidos() {
  if (
    $("#apellidos").val().length >= 3 &&
    $("#apellidos").val().length <= 50 &&
    $("#apellidos").val() != ""
  ) {
    $("#apellidos").css("border-color", "green");
    $("#apellidos").css("border-width", "2px");
    $("#errorApellidos").html(
      "<span class='text-success'>Apellidos validos</span>"
    );
    return true;
  } else {
    $("#apellidos").css("border-color", "red");
    $("#apellidos").css("border-width", "2px");
    $("#errorApellidos").html(
      "<span class='text-danger'>Apellidos no validos</span>"
    );
    return false;
  }
}

function validarEspectro() {
  if ($("#espectro").val() != "") {
    $("#espectro").css("border-color", "green");
    $("#espectro").css("border-width", "2px");
    $("#errorEspectro").html(
      "<span class='text-success'>Espectro valido</span>"
    );
    return true;
  } else {
    $("#espectro").css("border-color", "red");
    $("#espectro").css("border-width", "2px");
    $("#errorEspectro").html(
      "<span class='text-danger'>Espectro no valido</span>"
    );
    return false;
  }
}

function validarCertificado() {
  if ($("#certificado").val() != "") {
    $("#certificado").css("border-color", "green");
    $("#certificado").css("border-width", "2px");
    $("#errorCertificado").html(
      "<span class='text-success'>Certificado valido</span>"
    );
    return true;
  } else {
    $("#certificado").css("border-color", "red");
    $("#certificado").css("border-width", "2px");
    $("#errorCertificado").html(
      "<span class='text-danger'>Certificado no valido</span>"
    );
    return false;
  }
}

var Fn = {
  // Valida el rut con su cadena completa "XXXXXXXX-X"
  validaRut: function (rutCompleto) {
    rutCompleto = rutCompleto.replace("‐", "-");
    if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto)) return false;
    var tmp = rutCompleto.split("-");
    var digv = tmp[1];
    var rut = tmp[0];
    if (digv == "K") digv = "k";

    return Fn.dv(rut) == digv;
  },
  dv: function (T) {
    var M = 0,
      S = 1;
    for (; T; T = Math.floor(T / 10)) S = (S + (T % 10) * (9 - (M++ % 6))) % 11;
    return S ? S - 1 : "k";
  },
};

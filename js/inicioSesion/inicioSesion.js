$("#btnIniciarSesion").click(function (e) {
  if (validarCorreo() == true && validarClave() == true) {
    $("#formInicioSesion").submit();
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
    $("#errorClave").html("<span class='text-danger'>Clave no valida</span>");
    return false;
  }
}

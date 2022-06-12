$("#nivelEstudio").select2();
$(function () {
  if ($("#nivelEstudio").val() > 3) {
    $(".pais").prop("hidden", false);
    $("#pais").select2();
    $(".institucion").prop("hidden", false);
    $(".sede").prop("hidden", false);
    $("#sede").select2();
    $(".carrera").prop("hidden", false);
    $(".mencion").prop("hidden", false);
    $(".modalidad").prop("hidden", false);
    $(".situacion").prop("hidden", false);
    $(".fechaInicio").prop("hidden", false);
    $(".fechaTermino").prop("hidden", false);
  } else {
    $(".pais").prop("hidden", false);
    $("#pais").select2();
    $(".institucion").prop("hidden", false);
    $(".sede").prop("hidden", true);
    $(".carrera").prop("hidden", true);
    $(".mencion").prop("hidden", true);
    $(".modalidad").prop("hidden", true);
    $(".situacion").prop("hidden", true);
    $(".fechaInicio").prop("hidden", true);
    $(".fechaTermino").prop("hidden", false);
  }

  $("#nivelEstudio").change(function () {
    let formacionAcademica = $("#nivelEstudio").val();
    if (formacionAcademica == "opcionInicial") {
      $(".pais").prop("hidden", true);
      $(".institucion").prop("hidden", true);
      $(".sede").prop("hidden", true);
      $(".carrera").prop("hidden", true);
      $(".mencion").prop("hidden", true);
      $(".modalidad").prop("hidden", true);
      $(".situacion").prop("hidden", true);
      $(".fechaInicio").prop("hidden", true);
      $(".fechaTermino").prop("hidden", true);
    } else if (
      formacionAcademica == "1" ||
      formacionAcademica == "2" ||
      formacionAcademica == "3"
    ) {
      $(".pais").prop("hidden", false);
      $("#pais").select2();
      $(".institucion").prop("hidden", false);
      $(".sede").prop("hidden", true);
      $(".carrera").prop("hidden", true);
      $(".mencion").prop("hidden", true);
      $(".modalidad").prop("hidden", true);
      $(".situacion").prop("hidden", true);
      $(".fechaInicio").prop("hidden", true);
      $(".fechaTermino").prop("hidden", false);
    } else {
      $(".pais").prop("hidden", false);
      $("#pais").select2();
      $(".institucion").prop("hidden", false);
      $(".sede").prop("hidden", false);
      $("#sede").select2();
      $(".carrera").prop("hidden", false);
      $(".mencion").prop("hidden", false);
      $(".modalidad").prop("hidden", false);
      $(".situacion").prop("hidden", false);
      $(".fechaInicio").prop("hidden", false);
      $(".fechaTermino").prop("hidden", false);
    }
  });
});

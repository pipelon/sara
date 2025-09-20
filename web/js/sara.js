jQuery("document").ready(function () {
  jQuery(document).on("click", ".open-info", function (e) {
    e.preventDefault();
    var title = $(this).data("title");
    var description = $(this).data("description");
    $("#infoModalTitle").text(title);
    $("#infoModalDescription").html(description); // usa .text() si quieres evitar HTML
    $("#infoModal").modal("show");
  });

  // deshabilitar todos los checks al inicio
  jQuery("input[type=checkbox].custom-control-input:not(:checked)").prop(
    "disabled",
    true
  );

  // Cuando el usuario toca el slider por primera vez
  jQuery(document).on("input change", ".custom-range", function () {
    var $slider = jQuery(this);
    var key = $slider.data("input"); // ej: geometria_figura
    var val = $slider.val();

    // Llenar el hidden correspondiente
    jQuery("#" + key).val(val);

    // Habilitar su checkbox
    var chkId = "chk-" + key.replace(/_/g, "-");
    jQuery("#" + chkId).prop("disabled", false);
  });

  // Restaurar estado al cargar (por ejemplo, después de un POST fallido)
  jQuery("input[type=hidden][data-range]").each(function () {
    var $hidden = jQuery(this);
    var sliderId = $hidden.data("range"); // ej: range-geometria-figura
    var val = $hidden.val();
    if (val !== "") {
      jQuery("#" + sliderId).val(val); // mover el slider a ese valor
      var key = $hidden.attr("id");
      var chkId = "chk-" + key.replace(/_/g, "-");
      jQuery("#" + chkId).prop("disabled", false);
    }
  });

  // Restaurar una busqueda previa
  jQuery("#prevSearch").on("change", function () {
    var id = $(this).val();
    if (!id) return;

    jQuery.get(
      "../site/load-history",
      { id: id },
      function (data) {
        if (data.success) {
          // nombre yegua
          jQuery("#sarasearch-form-nombre_yegua").val(data.form.nombre_yegua);
          jQuery("#sarasearch-form-gait_id").val(data.form.gait_id);

          // sliders (variables)
          for (var key in data.variables) {
            var val = data.variables[key];
            var $slider = $("#customRange-" + key);
            if ($slider.length) {
              $slider.val(val).trigger("input"); // mover slider
            }
          }

          // checkboxes
          jQuery("input[type=checkbox]").prop("checked", false);
          data.chk.forEach(function (chk) {
            if (chk) {
              jQuery("#" + chk)
                .prop("checked", true)
                .prop("disabled", false);
            }
          });
        }
      },
      "json"
    );
  });
});

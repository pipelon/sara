
jQuery("document").ready(function () {
    $(document).on('click', '.open-info', function (e) {
        e.preventDefault();
        var title = $(this).data('title');
        var description = $(this).data('description');
        $('#infoModalTitle').text(title);
        $('#infoModalDescription').html(description); // usa .text() si quieres evitar HTML
        $('#infoModal').modal('show');
    });

    //document.querySelectorAll('input[type=range]').forEach(r => r.value = "1");
    // PILAS REVISAR COMO LOGRAR QUE EL RANGE SE QUEDE EN LA MITAD Y SIN VALOR
});

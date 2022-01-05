function sendAjax(idForm) {
    let valImput = {};
    
    // Capturando los name de los imput para enviarlos al controlador
    $('#' + idForm + ' label').each(function (index, value) {
        let label = $(this).attr('for');
        valImput[label] = $('#' + label).val();
    });
    
    $.ajax({
        type: 'POST',
        url: $('#' + idForm).attr('action'),
        data: {
            data: valImput,
            _token: window.laravel.token
        },
        success: function (response) {
            console.log(response);
            outAjax(response);
        }
    });
}
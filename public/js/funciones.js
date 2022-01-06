'use strict'

const sendAjax = (idForm) => {
    let valImput = {};
    
    // Capturando los name de los imput para enviarlos al controlador
    $('#' + idForm + ' label').each(function (index, value) {
        let label = $(this).attr('for');
        valImput[label] = $('#' + label).val();
    });
    
    $.ajax({
        type: 'POST',
        url: $('#' + idForm).attr('action'),
        headers: {apiKeyLaika: 'asdf92rsdf'},
        data: {
            data: valImput,
            _token: window.laravel.token
        },
        success: function (response) {
            outAjax(response);
            crearRegistroEnTabla(response.data, idForm);
        }
    });
}

const outAjax = (obj) => {
    // Salida el alert generico
    if (obj.alert) {
        alertGenerico(obj);
    }

    // Limpiar el formulario cuando guarda los datos
    if (obj.limpForm) {
        limpiarForm(obj.limpForm);
    }
}

const alertGenerico = (obj) => {
    // Alert generico
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    });

    Toast.fire({
        icon: obj.icon,
        title: obj.title
    })
}

const limpiarForm = (idForm) => {
    // Resetear todo el formulario
    $('#'+ idForm)[0].reset();
    $('.btn-actualizar').attr('disabled', true);
    $('.btn-guardar').attr('disabled', false);
}

const crearRegistroEnTabla = (data, idForm) => {
    $('.table-' + idForm + ' tbody').append(addRow(data));
}

const addRow = (data) => {
    let fila = `<tr id="pets-${data.id}">
                    <td>
                        <i onclick="deleteRow( ${data.id}, 'pets' )" style="cursor: pointer" class="far fa-trash-alt ml-2"></i>
                        <i onclick="showRow( ${data.id}, 'pets')" style="cursor: pointer" class="far fa-eye ml-2"></i>
                    </td>
                    <td> ${data.id} </td>
                    <td> ${data.name} </td>
                    <td> ${data.age} </td>
                    <td> ${data.pet_type} </td>
                    <td> ${data.race} </td>
                    <td> ${data.description} </td>
                </tr>`;

    return fila;
}

const deleteRow = (id, idForm) => {

    bootbox.confirm({
        message: 'Esta seguro que desea eliminar este registro?',
        buttons: {
            confirm: {
                label: 'Sí',
                className: 'btn-danger'
            },
            cancel: {
                label: 'No',
                className: 'btn-info'
            }
        },
        callback:function(res){

            if (res) {
                $.ajax({
                    type: "POST",
                    url: window.laravel.url+'/'+idForm+'/'+id,
                    headers: {apiKeyLaika: 'asdf92rsdf'},
                    data: {
                        _token: window.laravel.token,
                        _method: 'DELETE'
                    },
                    success: function (result) {
                        outAjax(result);
                        $(`#${idForm}-${id}`).remove();
                    }
                });
            }
        }
    });
}

const showRow = (id, idForm) => {
    $.ajax({
        type: "GET",
        url: window.laravel.url+'/'+idForm+'/'+id,
        headers: {apiKeyLaika: 'asdf92rsdf'},
        success: function (response) {
            
            limpiarForm(idForm);
            $('.btn-guardar').attr('disabled', true);
            $('.btn-actualizar').attr('disabled', false);
            $.each(response.data, function (index, value) { 
                if (index == 'pet_type_id') {
                    $(`#${idForm} #pet_type_id option:eq(${value})`).prop('selected', true);
                } else {
                    $(`#${idForm} #${index}`).val(value);
                }
            });
        }
    });
}

const updateRow = (idForm) => {
    let valImput = {};
    let id = $(`#${idForm} #id`).val();
    
    // Capturando los name de los imput para enviarlos al controlador
    $('#' + idForm + ' label').each(function (index, value) {
        let label = $(this).attr('for');
        valImput[label] = $('#' + label).val();
    });
    console.log(valImput);
    $.ajax({
        type: 'POST',
        url: window.laravel.url+'/'+idForm+'/'+id,
        headers: {apiKeyLaika: 'asdf92rsdf'},
        data: {
            data: valImput,
            _token: window.laravel.token,
            _method: 'PUT'
        },
        success: function (response) {
            outAjax(response);
            $(`#${idForm}-${id}`).remove();
            crearRegistroEnTabla(response.data, idForm);
        }
    });
}

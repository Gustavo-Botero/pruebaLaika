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
    console.log(data);
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
            console.log(res);
            if (res) {
                $.ajax({
                    type: "POST",
                    url: window.laravel.url+'/'+idForm+'/'+id,
                    data: {
                        _token: window.laravel.token,
                        _method: 'DELETE'
                    },
                    success: function (result) {
                        console.log(result);
                        outAjax(result);
                        $(`#${idForm}-${id}`).remove();
                    }
                });
            }
        }
    });
}

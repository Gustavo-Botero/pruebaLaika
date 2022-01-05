@extends('layouts.plantilla')
@section('pets', 'active')

@section('title', 'Registrar una mascota')

@section('content')
    <div class="col-12">
        <form action=" {{route('pets.store')}} " method="POST" id="pets">
            @csrf
            <fieldset>
                <div class="card-body row">
                    <input type="hidden" id="id">
                    <div class="form-group col-6">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre de la mascota">
                    </div>
    
                    <div class="form-group col-6">
                        <label for="age">Edad:</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Ingrese la edad de la mascota en meses">
                    </div>
    
                    <div class="form-group col-6">
                        <label for="pet_type_id">Tipo de mascota:</label>
                        <select class="form-control" name="pet_type_id" id="pet_type_id">
                            <option value="">--Seleccione--</option>
                            @foreach ($petType as $row)
                                <option value=" {{$row->id}} "> {{$row->name}} </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="form-group col-6">
                        <label for="race">Raza:</label>
                        <input type="text" class="form-control" name="race" id="race" placeholder="Ingrese la raza de su mascota">
                    </div>
    
                    <div class="form-group col-12">
                        <label for="description">Descripción:</label>
                        <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
                    </div>
    
                </div>
            </fieldset>
        </form>
        <fieldset>
            <div class="card-footer row text-center">
                <div class="col-12">
                    <button onclick="sendAjax('pets')" class="btn btn-success btn-guardar">Guardar</button>
                    <button onclick="updateRow('pets')" class="btn btn-primary btn-actualizar" disabled>Actualizar</button>
                    <button onclick="limpiarForm('pets')" class="btn btn-secondary">Limpiar</button>
                </div>
            </div> 
        </fieldset>

        <fieldset>
            <div class="col-12 card-body">
                <table class="table table-bordered table-hover table-pets text-center">
                    <thead>
                        <tr class="columns">
                            <th>Acción</th>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Edad</th>
                            <th>Tipo de  mascota</th>
                            <th>Raza</th>
                            <th>Descripción</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach ($pets as $row)
                            <tr id="pets-{{$row->id}}">
                                <td>
                                    <i onclick="deleteRow( {{$row->id}}, 'pets' )" style="cursor: pointer" class="far fa-trash-alt ml-2"></i>
                                    <i onclick="showRow({{$row->id}}, 'pets')" style="cursor: pointer" class="far fa-eye ml-2"></i>
                                </td>
                                <td> {{$row->id}} </td>
                                <td> {{$row->name}} </td>
                                <td> {{$row->age}} </td>
                                <td> {{$row->pet_type->name}} </td>
                                <td> {{$row->race}} </td>
                                <td> {{$row->description}} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
@endsection
    
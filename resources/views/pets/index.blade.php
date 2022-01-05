@extends('layouts.plantilla')
@section('pets', 'active')

@section('title', 'Registrar una mascota')

@section('content')
    <div class="col-12">
        <form action="">
            <fieldset>
                <div class="card-body row">

                    <div class="form-group col-6">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre de la mascota">
                    </div>
    
                    <div class="form-group col-6">
                        <label for="age">Edad:</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Ingrese la edad de la mascota">
                    </div>
    
                    <div class="form-group col-6">
                        <label for="pet_tipe">Tipo de mascota:</label>
                        <select class="form-control" name="pet_tipe" id="pet_tipe">
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
                        <label for="description">Dirección:</label>
                        <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
                    </div>
    
                </div>
            </fieldset>
        </form>
        <fieldset>
            <div class="card-footer row text-center">
                <div class="col-12">
                    <button class="btn btn-success btn-guardar">Guardar</button>
                    <button class="btn btn-primary btn-actualizar" disabled>Actualizar</button>
                    <button class="btn btn-secondary">Limpiar</button>
                </div>
            </div> 
        </fieldset>
    </div>
@endsection
    
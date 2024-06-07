@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registrar Nueva Iglesia</h1>
        <form action="{{ route('churches.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" name="city" id="city" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="state">Estado</label>
                <input type="text" name="state" id="state" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="zipcode">Código Postal</label>
                <input type="text" name="zipcode" id="zipcode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="country">País</label>
                <input type="text" name="country" id="country" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen (URL)</label>
                <input type="text" name="image" id="image" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="status">Estado</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Establecida">Establecida</option>
                    <option value="Mision">Misiones</option>
                    <option value="En Proceso de Reforma">En Proceso de Reforma</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Iglesia</button>
        </form>
    </div>
@endsection

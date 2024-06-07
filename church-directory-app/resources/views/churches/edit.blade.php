@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Iglesia</h1>
        <form action="{{ route('churches.update', $church->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $church->name }}" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ $church->address }}" required>
            </div>
            <div class="form-group">
                <label for="city">Ciudad</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ $church->city }}" required>
            </div>
            <div class="form-group">
                <label for="state">Estado</label>
                <input type="text" name="state" id="state" class="form-control" value="{{ $church->state }}" required>
            </div>
            <div class="form-group">
                <label for="zipcode">Código Postal</label>
                <input type="text" name="zipcode" id="zipcode" class="form-control" value="{{ $church->zipcode }}" required>
            </div>
            <div class="form-group">
                <label for="country">País</label>
                <input type="text" name="country" id="country" class="form-control" value="{{ $church->country }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $church->phone }}">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $church->email }}">
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $church->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Imagen (URL)</label>
                <input type="text" name="image" id="image" class="form-control" value="{{ $church->image }}">
            </div>
            
            <div class="form-group">
                <label for="status">Estado</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Established" {{ $church->status == 'Established' ? 'selected' : '' }}>Establecida</option>
                    <option value="Missions" {{ $church->status == 'Missions' ? 'selected' : '' }}>Misiones</option>
                    <option value="In Process of Reform" {{ $church->status == 'In Process of Reform' ? 'selected' : '' }}>En Proceso de Reforma</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar Iglesia</button>
        </form>
    </div>
@endsection

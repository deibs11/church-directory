@extends('layouts.app')

@section('content')
    @if($status)
    <div class="alert alert-success">
        {{$status}}
    </div>
    @endif
    <div class="container">
        <h1>Lista de Iglesias</h1>
        <a href="{{ route('churches.create') }}" class="btn btn-primary mb-3">Registrar Iglesia</a>

        <h2>Establecidas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($churches->where('status', 'Establecida') as $church)
                <tr>
                    <td>{{ $church->id }}</td>
                    <td>{{ $church->name }}</td>
                    <td>{{ $church->address }}</td>
                    <td>{{ $church->city }}</td>
                    <td>{{ $church->state }}</td>
                    <td>
                        <a href="{{ route('churches.edit', $church->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('churches.destroy', $church->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Misiones</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($churches->where('status', 'Mision') as $church)
                <tr>
                    <td>{{ $church->id }}</td>
                    <td>{{ $church->name }}</td>
                    <td>{{ $church->address }}</td>
                    <td>{{ $church->city }}</td>
                    <td>{{ $church->state }}</td>
                    <td>
                        <a href="{{ route('churches.edit', $church->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('churches.destroy', $church->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>En Proceso de Reforma</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($churches->where('status', 'En Proceso de Reforma') as $church)
                <tr>
                    <td>{{ $church->id }}</td>
                    <td>{{ $church->name }}</td>
                    <td>{{ $church->address }}</td>
                    <td>{{ $church->city }}</td>
                    <td>{{ $church->state }}</td>
                    <td>
                        <a href="{{ route('churches.edit', $church->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('churches.destroy', $church->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

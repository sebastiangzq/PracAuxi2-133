@extends('layouts.app')

@section('template_title')
    Sucursals
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <a href="{{ route('sucursals.create') }}" class="btn btn-primary">
                        Crear nueva sucursal
                    </a>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table" border="3">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 60px;"></th>
                                    <th>Ciudad</th>
                                    <th>Dirección física</th>
                                    <th>Teléfono de Contacto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sucursals as $sucursal)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $sucursal->ciudad }}</td>
                                        <td>{{ $sucursal->direccion_fisica }}</td>
                                        <td>{{ $sucursal->telefono_contacto }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Acciones">
                                                <a href="{{ route('sucursals.edit', $sucursal->id) }}" class="btn btn-primary">Editar</a>
                                                <form action="{{ route('sucursals.destroy', $sucursal->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta sucursal?')">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">No hay sucursales registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white border-0">
                    {!! $sucursals->withQueryString()->links() !!}
                </div>
        </div>
    </div>
@endsection

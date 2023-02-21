@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de Doctores</div>

                <div class="card-body">

                    <a href="{{ route('doctors.create') }}" class="btn btn-primary mt-3 mb-3">Nuevo Doctor</a>

                    <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Telefono
                                </th>
                                <th>
                                    Hospital
                                </th>
                                <th>
                                    Especialidades
                                </th>
                                <th>
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>
                                    {{ $doctor->id }}
                                </td>
                                <td>
                                    {{ $doctor->name}}
                                </td>
                                <td>
                                    {{ $doctor->email}}
                                </td>
                                <td>
                                    {{ $doctor->phone}}
                                </td>
                                <td>
                                    {{ $doctor->hospital->name}}
                                </td>
                                <td>
                                    @foreach ($doctor->specialtiesAbroad as $specialty)
                                    <li>{{ $specialty->name }} ({{ $specialty->doctor_specialty->created_at }})</li>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-danger">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de Usuarios</div>

                <div class="card-body">
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
                                    Telefono 1
                                </th>
                                <th>
                                    Telefono 2
                                </th>
                                <th>
                                    Direccion 1
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name}}
                                </td>
                                <td>
                                    {{ $user->email}}
                                </td>
                                <td>
                                    {{ $user->profile->phone_number1}}
                                </td>
                                <td>
                                    {{ $user->profile->phone_number2}}
                                </td>
                                <td>
                                    {{ $user->profile->address1}}
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

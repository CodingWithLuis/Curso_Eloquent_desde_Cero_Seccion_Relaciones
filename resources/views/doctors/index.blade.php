@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                                    Telefono
                                </th>
                                <th>
                                    Hospital
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

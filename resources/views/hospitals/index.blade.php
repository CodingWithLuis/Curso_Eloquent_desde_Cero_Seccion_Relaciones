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
                                    Hospital
                                </th>
                                <th>
                                    Ultimo Doctor Registrado
                                </th>
                                <th>
                                    Primer Doctor Registrado
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hospitals as $hospital)
                            <tr>
                                <td>
                                    {{ $hospital->id }}
                                </td>
                                <td>
                                    {{ $hospital->name}}
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $hospital->latestDoctor->name }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-primary">{{ $hospital->oldestDoctor->name }}</span>
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Has Many Polymorphic') }}</div>

                <div class="card-body">
                    <h2>Listado de Usuarios</h2>
                    @foreach ($users as $user)
                    <strong>Usuario: </strong> {{$user->name}}
                    <strong>Documentos:</strong>

                    @foreach ($user->documents as $document)
                    {{ $document->filename }}
                    @endforeach
                    <br><br>
                    @endforeach
                    <hr>

                    <h2>Listado de Hospitales</h2>
                    @foreach ($hospitals as $hospital)
                    <strong> Hospital: </strong> {{ $hospital->name }}
                    <strong>Documentos:</strong>

                    @foreach ($hospital->documents as $document)
                    {{ $document->filename }}
                    @endforeach
                    <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

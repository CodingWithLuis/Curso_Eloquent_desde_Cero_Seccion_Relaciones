@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Has one Polymorphic') }}</div>

                <div class="card-body">

                    <h2>Listado de Perfiles</h2>
                    @foreach ($profiles as $profile)
                    <strong>Usuario: </strong> {{$profile->user->name}}
                    <strong>Foto: </strong> <img src="{{ $profile->image->url }}" alt="" width="50" height="50" />
                    <br><br>
                    @endforeach
                    <hr>

                    <h2>Listado de Paises</h2>
                    @foreach ($countries as $country)
                    <strong> Country: </strong> {{ $country->name }}
                    <img src="{{ $country->image->url }}" alt="" width="50" height="50" />
                    <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

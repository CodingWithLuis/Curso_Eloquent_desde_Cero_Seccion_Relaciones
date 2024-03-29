@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nuevo Doctor</div>

                <div class="card-body">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('doctors.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="phone" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                            <div class="text-danger">
                                {{ $errors->first('phone') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="hospital_id" class="form-label">Hospital</label>
                            <select class="form-select" name="hospital_id" id="hospital">
                                <option value="" selected>Seleccione un hospital</option>
                                @foreach ($hospitals as $id => $name)
                                <option value="{{ $id }}" {{  (old('hospital_id') == $id) ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('hospital_id'))
                            <div class="text-danger">
                                {{ $errors->first('hospital_id') }}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="specialties">Especialidades</label>
                            <select name="specialties[]" id="specialties" class="form-control specialities" multiple="multiple">
                                @foreach($specialties as $id => $specialty)
                                <option value="{{ $id }}" {{ (in_array($id, old('specialties', [])) || isset($doctor) && $doctor->specialties->contains($id)) ? 'selected' : '' }}>
                                    {{ $specialty }}
                                </option>
                                @endforeach
                            </select>
                            @if($errors->has('specialties'))
                            <div class="text-danger">
                                {{ $errors->first('specialties') }}
                            </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#hospital').select2()
        $('#specialties').select2()
    })
</script>
@endpush

@extends('layouts.topbar')



@section('content')

    <script>
        Swal.fire({
            title: "Atencion",
            icon: "info",
            text: "Estimado servidor, completar los datos faltantes"

        })
    </script>



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" >Actualizar Datos   - <span></span>  <p>Lider: <span></span></p></div>

                    <div class="card-body">
                        <form method="POST" action="{{route('reporte.update', ['reporte' => $grupo->id])}}" id="ReportesForm">
                            @csrf
                            @method('PUT')
                            {{--                                Nombre del Lider--}}
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre de Lider de Grupo</label>

                                <div class="col-md-6">
                                    <input id="lider" type="text" class="form-control @error('lider') is-invalid @enderror" name="lider" value="{{$grupo->lider == null ? old('lider') : $grupo->lider  }}" {{$grupo->lider == null ? "": "readonly"}} required autocomplete="lider" autofocus>

                                    @error('lider')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Correo Electronico--}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$grupo->email == null ? old('email') : $grupo->email  }}" {{$grupo->email == null ? "": "readonly"}} required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Telefono--}}
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$grupo->telefono == null ? old('telefono') : $grupo->telefono  }}" {{$grupo->telefono == null ? "": "readonly"}} required autocomplete="telefono" autofocus>

                                    @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>




                            {{--                                Departamento--}}
                            <div class="form-group row">
                                <label for="departamento" class="col-md-4 col-form-label text-md-right">Departamento</label>

                                <div class="col-md-6">
                                    <input id="departamento" type="text" class="form-control @error('departamento') is-invalid @enderror" name="departamento" value="{{$grupo->departamento == null ? old('departamento') : $grupo->departamento  }}" {{$grupo->departamento == null ? "": "readonly"}} required autocomplete="departamento" >

                                    @error('departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Municipio--}}
                            <div class="form-group row">
                                <label for="municipio" class="col-md-4 col-form-label text-md-right">Municipio</label>

                                <div class="col-md-6">
                                    <input id="municipio" type="text" class="form-control @error('municipio') is-invalid @enderror" name="municipio" value="{{$grupo->municipio == null ? old('municipio') : $grupo->municipio  }}" {{$grupo->municipio == null ? "": "readonly"}} required autocomplete="municipio" >

                                    @error('municipio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Direccion--}}
                            <div class="form-group row">
                                <label for="direccion" class="col-md-4 col-form-label text-md-right">Colonia o Residencia</label>

                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control @error('municipio') is-invalid @enderror" name="direccion" value="{{$grupo->direccion == null ? old('direccion') : $grupo->direccion  }}" {{$grupo->direccion == null ? "": "readonly"}} required autocomplete="direccion" >

                                    @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{$grupo->id}}">
                            <input type="hidden" name="codigo_grupo" value="{{$grupo->codigo_grupo}}">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-block btn-primary " id="submitReporte">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

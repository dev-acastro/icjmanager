@extends('layouts.topbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if($message == 'success')

                <script>


                    swal ( "Exito" ,  "Reporte Guardado con Exito" ,  "success" )

                </script>

                @endif

                @if($message == 'error')
                        <script>
                            swal ( "Error" ,  "Grupo No Encontrado, por favor ingresar el codigo correctamente" ,  "error" )

                        </script>
                @endif



                <div class="card">
                    <div class="card-header text-center" >Reporte de Grupo </div>

                    <div class="card-body">
                        <form method="POST" action="{{route('reporteLogin')}}" id="ReservasForm">
                            @csrf
                            <div class="mb-8 text-center"><p>Ingresa el Codigo de tu Grupo Familiar</p></div>

                            {{--                                Codigo de Grupo--}}
                            <div class="form-group row">
                                <label for="grupo" class="col-md-4 col-form-label text-md-right">Codigo de Grupo</label>

                                <div class="col-md-6">
                                    <input id="grupo" type="text" class="form-control @error('grupo') is-invalid @enderror" name="grupo" value="{{ old('grupo') }}" required autocomplete="grupo" autofocus>

                                    @error('grupo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-block btn-primary " id="submitReporte">
                                        Buscar
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

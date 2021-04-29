@extends('layouts.topbar')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


               {{-- @if($message == 'entregado')

                    <script>
                        Swal.fire( "Denegado" ,  "El reporte de esta semana ya se ha entregado" ,  "warning" )
                    </script>

                @endif

                @if($message == 'success')

                    <script>


                        Swal.fire( "Exito" ,  "Reporte Guardado con Exito" ,  "success" )

                    </script>

                @endif

                @if($message == 'error')
                    <script>
                        Swal.fire( "Error" ,  "Grupo No Encontrado, por favor ingresar el codigo correctamente" ,  "error" )

                    </script>
                @endif
--}}


                <div class="card">
                    <div class="card-header text-center" >Buscar Reporte Por Fechas  </div>

                    <div class="card-body">
                        <form method="GET" action="{{route('reporteSemanal')}}" id="selectDate">
                            @csrf
                            <div class="mb-8 text-center"><p>Ingresar el Rango de Fechas a Reportar</p></div>

                            {{--                                Fecha Inicial--}}
                            <div class="form-group row">
                                <label for="start" class="col-md-4 col-form-label text-md-right">Fecha de Inicio</label>

                                <div class="col-md-6">
                                    <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" required  autofocus>

                                    @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            {{--                                Fecha Final--}}
                            <div class="form-group row">
                                <label for="end" class="col-md-4 col-form-label text-md-right">Fecha Final</label>

                                <div class="col-md-6">
                                    <input id="end" type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" required  autofocus>

                                    @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Buscar por Codigo--}}
                            <div class="form-group row">
                                <label for="codigo" class="col-md-4 col-form-label text-md-right">Buscar por Codigo</label>

                                <div class="col-md-6">
                                    <input id="codigo" type="input" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required  autofocus>

                                    @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Categoria--}}
                            <div class="form-group row">


                                <div class="form-check col-md-4">
                                    <input id="grupo" type="radio" class="form-check-input @error('cat') is-invalid @enderror" name="cat" value="grupo{{ old('grupo') }}" required  autofocus>

                                    @error('cat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="cat" class="form-check-label ">Por Grupo</label>
                                </div>


                                <div class="form-check col-md-2">
                                    <input id="sector" type="radio" class="form-check-input @error('cat') is-invalid @enderror" name="cat" value="sector{{ old('sector') }}" required  autofocus>

                                    @error('cat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="cat" class="form-check-label "> Por Sector</label>

                                </div>




                                <div class="form-check col-md-2">
                                    <input id="grupo" type="radio" class="form-check-input @error('cat') is-invalid @enderror" name="cat" value="grupo{{ old('grupo') }}" required  autofocus>

                                    @error('cat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="cat" class="form-check-label ">Por Codigo</label>
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

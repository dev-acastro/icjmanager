@extends('layouts.topbar')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header text-center" >Codigo de Grupo  - <span>{{$grupo->codigo_grupo}}</span>  <p>Lider: <span>{{$grupo->lider}}</span></p> <p>Lider de Sector: {{$grupo->sector->supervisor}}</p></div>

                    <div class="card-body">
                        <form method="POST" action="{{route('reporte.store')}}" id="ReportesForm">
                            @csrf


                            {{--                                Fecha de Reporte--}}
                            <div class="form-group row">
                                <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha a Reportar</label>

                                <div class="col-md-6">
                                    <input id="fecha" onkeydown="return false"  min="{{$monday}}" max="{{$sunday}}" type="date" class="form-control @error('asistencia_adultos') is-invalid @enderror" name="fecha" value="{{ old('asistencia_adultos') }}" required autocomplete="asistencia_adultos" autofocus>

                                    @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            {{--                                Asistencia Niños--}}
                            <div class="form-group row">
                                <label for="niños" class="col-md-4 col-form-label text-md-right">Asistencia Niños</label>

                                <div class="col-md-6">
                                    <input id="niños" type="number" class="form-control @error('niños') is-invalid @enderror" name="niños" value="{{ old('niños') }}" required autocomplete="niños" autofocus>

                                    @error('niños')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Asistencia Adultos--}}
                            <div class="form-group row">
                                <label for="adultos" class="col-md-4 col-form-label text-md-right">Asistencia Adultos</label>

                                <div class="col-md-6">
                                    <input id="adultos" type="number" class="form-control @error('adultos') is-invalid @enderror" name="adultos" value="{{ old('adultos') }}" required autocomplete="adultos" autofocus>

                                    @error('adultos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            {{--                                Invitados Inconversos--}}
                            <div class="form-group row">
                                <label for="inconversos" class="col-md-4 col-form-label text-md-right">Invitados Inconversos</label>

                                <div class="col-md-6">
                                    <input id="inconversos" type="number" class="form-control @error('inconversos') is-invalid @enderror" name="inconversos" value="{{ old('inconversos') }}" required autocomplete="inconversos">

                                    @error('inconversos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Conversiones--}}
                            <div class="form-group row">
                                <label for="conversiones" class="col-md-4 col-form-label text-md-right">Conversiones</label>

                                <div class="col-md-6">
                                    <input id="conversiones" type="number" class="form-control @error('conversiones') is-invalid @enderror" name="conversiones" value="{{ old('conversiones') }}" required autocomplete="conversiones">

                                    @error('conversiones')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Integrados a CCDL--}}
                            <div class="form-group row">
                                <label for="ccdl" class="col-md-4 col-form-label text-md-right">Integrados  a CCDL</label>

                                <div class="col-md-6">
                                    <input id="ccdl" type="number" class="form-control @error('ccdl') is-invalid @enderror" name="ccdl" value="{{ old('ccdl') }}" required autocomplete="ccdl">

                                    @error('ccdl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Integrados a IBBAJ--}}
                            <div class="form-group row">
                                <label for="ibbaj" class="col-md-4 col-form-label text-md-right">Integrados  a IBBAJ</label>

                                <div class="col-md-6">
                                    <input id="ibbaj" type="number" class="form-control @error('ibbaj') is-invalid @enderror" name="ibbaj" value="{{ old('ibbaj') }}" required autocomplete="ibbaj">

                                    @error('ibbaj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                                Asistencia Domingos--}}
                            <div class="form-group row">
                                <label for="asistencia_domingos" class="col-md-4 col-form-label text-md-right">¿Cuantos Asistieron a Culto Presencial este Domingo?</label>

                                <div class="col-md-6">
                                    <input id="asistencia_domingos" type="number" class="form-control @error('asistencia_domingos') is-invalid @enderror" name="asistencia_domingos" value="{{ old('asistencia_domingos') }}" required autocomplete="asistencia_domingos">

                                    @error('asistencia_domingos')
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
                                        Enviar
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

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Saldos</h1>
@stop

@section('content')
<p>Bienvenido a la sección saldos</p>
<div class="card">
    <form method="GET" action="{{ route('admin.saldos.index') }}">
        <div class="btn-group">
            <button type="submit" class="btn btn-default">Seleccionar año</button>
            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
            </button>

            <div class="dropdown-menu">
                @foreach(array_keys($saldos) as $año)
                <button type="submit" class="dropdown-item" name="year" value="{{ $año }}">{{ $año }}</button>
                @endforeach


            </div>
        </div>
    </form>
    @if(!empty($filteredSaldos))


    <div class="card-header card-primary">
        <h3 class="card-title">Saldos {{ $selectedYear }}</h3>
    </div>

    <div class="card-body">

        <div class="row">
            @foreach ($filteredSaldos as $saldo )
            <div class="col-md-4">
                <div class="card card-{{ $saldo['resultado'] < 0 ? 'danger' : 'success' }}" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <h3 class="card-title">Subvención {{ $saldo['subvencion'] }}</h3>

                        <div class="card-tools">

                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title ">Resultado año 2018</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>${{ number_format($saldo['resultado'], 0, ',', '.') }}</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">% de Ingresos utilizados en Personal</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>{{$saldo['porcentaje_personal']}} %</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="alert alert-{{ $saldo['resultado'] < 0 ? 'danger' : 'success' }} alert-dismissible">
                            <h5><i class="icon fas fa-{{ $saldo['resultado'] < 0 ? 'exclamation-triangle ' : 'check' }}"></i> {{ $saldo['resultado'] < 0 ? 'IMPORTANTE!' : 'Bien' }}</h5>
                            {{ $saldo['mensaje'] }}
                        </div>

                    </div>
                </div>
            </div>



            @endforeach
        </div>

    </div>


    @else
    <p>Seleccione un año para visualizar los datos.</p>
    @endif


</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>

</script>
@stop
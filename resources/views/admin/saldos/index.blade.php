@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Saldos</h1>
@stop

@section('content')
<p>Bienvenido a la sección saldos</p>
<div class="card">
    <div class="card-header card-primary">
        <h3 class="card-title">Saldos</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!--SUBVENCION NORMAL-->
            <div class="col-md-4">
                <div class="card card-success" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <h3 class="card-title">Subvencion Normal</h3>

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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Resultado año 2018</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>$ 31.408.936</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">% de Ingresos utilizados en Personal</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>85,6%</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="alert alert-success alert-dismissible">
                            <h5><i class="icon fas fa-check"></i> Bien!</h5>
                            Establecimientos con saldos para comprar
                        </div>


                    </div>
                </div>
            </div>


            <!--SUBVENCION PIE-->
            <div class="col-md-4">
                <div class="card card-success" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <h3 class="card-title">Subvencion PIE</h3>

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
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Resultado año 2018</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>$ -15.991.892</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">% de Ingresos utilizados en Personal</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>118,13%</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="alert alert-warning alert-dismissible">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> IMPORTANTE!</h5>
                            Los gastos en remuneraciones PIE NO pueden ser mayores a sus ingresos
                        </div>


                    </div>
                </div>
            </div>

            <!--SUBVENCION SEP-->
            <div class="col-md-4">
                <div class="card card-success" style="transition: 0.15s; height: inherit; width: inherit;">
                    <div class="card-header">
                        <h3 class="card-title">Subvención SEP</h3>

                        <div class="card-tools">
 
                            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Resultado año 2018</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>$ -5.702.625</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">% de Ingresos utilizados en Personal</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                <h3>68,83%</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="alert alert-warning alert-dismissible">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> IMPORTANTE!</h5>
                            Los gastos en remuneraciones SEP NO pueden exceder el 50% de sus ingresos
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@stop
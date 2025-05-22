@extends('adminlte::page')

@section('title', 'Saldos')

@section('content_header')
<h1>Saldos</h1>
@stop

@section('content')
<p>Bienvenido a la sección saldos</p>
<div class="card">
    <div class="row d-flex justify-content-between align-items-center">
        <div class="col-sm-12 col-md-10">
            <div class="dt-buttons btn-group flex-wrap">
                <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button">
                    <span>CSV</span>
                </button>
                <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button">
                    <span>Excel</span>
                </button>
                <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button">
                    <span>PDF</span>
                </button>
                <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button">
                    <span>Print</span>
                </button>
            </div>

        </div>
        <div class="col-sm-12 col-md-2 ml-auto">
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
        </div>
    </div>

    @if(!empty($filteredSaldos))


    <div class="card-header card-primary">
        <h3 class="card-title">Saldos {{ $selectedYear }}</h3>
    </div>

    <div class="card-body">

        <div class="row">
            @foreach ($filteredSaldos as $saldo )
            <div class="col-md-4">
                <div class="card card-{{ $saldo['resultado'] < 0 ? 'danger' : 'success' }} cards_info" style="transition: 0.15s; height: inherit; width: inherit;">
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
                    <div class="card-body card-body-data" style="display: block;">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title ">Resultado año {{ $selectedYear }}</h3>
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        function exportData(format) {
            let data = [];
            let headers = ["Subvencion", "Resultado", "% Personal", "Mensaje", "Año"];
            let añoSeleccionado = document.querySelector(".card-title") ? document.querySelector(".card-title").textContent.match(/\d{4}/)[0] : "";

            // 🟢 Iteramos sobre cada tarjeta identificada con `.cards_info`
            document.querySelectorAll(".cards_info").forEach((card) => {
                let subvencion = card.querySelector(".card-title") ? card.querySelector(".card-title").textContent.replace("Subvención ", "").trim() : "";

                // ✅ Obtener el resultado desde `.card-body-data`
                let resultadoElement = card.querySelector(".card-body-data .card:nth-of-type(1) .card-body h3");
                let resultado = resultadoElement ? resultadoElement.textContent.replace(/[$,.]/g, "").trim() : "0";

                // ✅ Obtener el porcentaje de personal desde `.card-body-data`
                let porcentajeElement = card.querySelector(".card-body-data .card:nth-of-type(2) .card-body h3");
                let porcentaje_personal = porcentajeElement ? porcentajeElement.textContent.replace("%", "").trim() : "0";

                let mensaje = card.querySelector(".alert") ? `"${card.querySelector(".alert").textContent.trim()}"` : "";

                data.push([subvencion, resultado, porcentaje_personal, mensaje, añoSeleccionado]);
            });

            if (format === "csv") {
                let csvContent = "\ufeff" + [headers.join(","), ...data.map(row => row.join(","))].join("\n");
                let blob = new Blob([csvContent], {
                    type: "text/csv;charset=utf-8;"
                });
                let link = document.createElement("a");
                link.setAttribute("href", URL.createObjectURL(blob));
                link.setAttribute("download", "saldos.csv");
                document.body.appendChild(link);
                link.click();
            }
        }

        // Asignar evento a los botones de exportación
        document.querySelector(".buttons-csv").addEventListener("click", function() {
            exportData("csv");
        });
    });
</script>


@stop
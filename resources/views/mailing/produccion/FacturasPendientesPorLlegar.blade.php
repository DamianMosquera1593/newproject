<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>{{$Asunto}}</title>
    <style>
        .ContentPanelCorreo{
        }
        body{
            background-color:#f8f8f8;
        }
        .CenterText{
            text-align:center;
        }
        .BodyInf{
            background-color:white;
            width:100%;
        }
        .Concepto{
            background-color:#f8f8f8;
            font-weight: bold;
            padding:5px;
            border: 1px solid #d0d0d0;
            width:15%;
        }
        .DetalleConcepto{
            padding:5px;
            width:15%;
        }
        .BodyInf{
        }
        .Separador{
            width:5px;
        }
        .Cabecera{
            width:100%;
        }
        .h3{
            font-family: Arial;
        }
        
        .tableNew th{
            color: #417EC1;
            font-weight: bold;
            text-align:center;
            padding:5px;
            font-size:10px;
            padding-bottom: 5px;
        }
        .tableNew td{
            background-color:#F1F2F2;
            color:black;
            border:1px solid #B7C5CE;
            border-spacing: 1px;
            padding:5px;
            font-size:10px;
            border-radius:0.3em;
            font-weight: bold;
        }
        
        .CardReport {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 100%;
            background-color: #1B4075;
            min-width: 150px;
            color:white;
            text-align:center;
            border-radius:0.2em;
            padding:5px;
        }

        .CardReport h5{
            font-weight: bold;
        }

        .CardReport:hover {
          box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        .CardReport .container {
          padding: 2px 16px;
        }
        .container {
          width:100%;
        }
    </style>
</head>
<body>
    <div class = 'ContentPanelCorreo' style="font-family:'Arial'">
        <table style="width:100%!important;height:100%;background-color:#005661;">
            <tr>
                <td class = 'CenterText'>
                    <img src ='http://process.grupotesta.com.co:8989/PProcess3/public/images/process_black.png' height = '50px'/>
                </td>
            </tr>
        </table>
        <br>
        <div class = 'BodyInf'>
            <h3>{{$Asunto}}</h3>
            
            <hr>
            <table class = 'Cabecera'>
                <tr>
                    <td class = 'Concepto' style = 'width:100%;text-align:center;'>FACTURAS PENDIENTES POR LLEGAR</td>
                </tr>
            </table>
            <p>A continuación, se relacionan las facturas que a la fecha se encuentran pendientes por llegar.</p>
            
            <table width ='100%'>
                <tr>
                    <td class = 'CenterText' style = 'padding:5px;'>
                        <div class = 'CardReport CenterText'>
                            <h5 >No. Facturas Pendientes</h5>
                            <div class = ''>{{$NumFacturas}}</div>
                        </div>
                    </td>
                    <td class = 'CenterText' style = 'padding:5px;'>
                        <div class = 'CardReport '>
                            <h5 >Subtotal</h5>
                            <div class = ''>
                                $ @php echo number_format($Subtotal);@endphp
                            </div>
                        </div>
                    </td>
                    <td class = 'CenterText' style = 'padding:5px;'>
                        <div class = 'CardReport CenterText'>
                            <h5 >Impuestos</h5>
                            <div class = ''>
                                $ @php echo number_format($TotalImpuestosG);@endphp
                            </div>
                        </div>
                    </td>
                    <td class = 'CenterText' style = 'padding:5px;'>
                        <div class = 'CardReport CenterText'>
                            <h5 >Total</h5>
                            <div class = ''>
                                $ @php echo number_format($Total);@endphp
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <hr>
            <table class = 'tableNew' style = 'width:100%;'>
                <tr>
                    <th>No.</th>
                    <th>OT</th>
                    <th># Presupuesto</th>
                    <th>Referencia Presupuesto</th>
                    <th>Unidad Negocio</th>
                    <th>Cliente</th>
                    <th>Ejecutivo</th>
                    <th># OC</th>
                    <th>Forma de Pago</th>
                    <th>Fecha Generación</th>
                    <th>Fecha Radicación</th>
                    <th>Generado Por</th>
                    <th>Días Pts Radicación</th>
                    <th>Descargar</th>
                </tr>
                @foreach($Data as $e)
                <tr>
                    <td class = 'CenterText'>{{$e->Num}}</td>
                    <td class = 'CenterText'>{{$e->CodigoOT}}</td>
                    <td class = 'CenterText'>{{$e->NumPpto}}</td>
                    <td>{{$e->ReferenciaPpto}}</td>
                    <td>{{$e->Unidad}}</td>
                    <td >{{$e->Cliente}}</td>
                    <td>{{$e->Ejecutivo}}</td>
                    <td class = 'CenterText'>{{$e->NumOc}}</td>
                    <td >{{$e->FormaPago}}</td>
                    <td >{{$e->FechaCrea}}</td>
                    <td >{{$e->FechaRadicacion}}</td>
                    <td>{{$e->CreadorOC}}</td>
                    @if( $e->Dif >= 0 )
                        <td class = 'CenterText' style = 'color:red;font-weight: bold;'>{{$e->Dif}}</td>
                    @else
                        <td class = 'CenterText' style = 'color:green;font-weight: bold;'>{{$e->Dif}}</td>
                    @endif
                    <td class = 'CenterText'>
                        <a href='http://process.grupotesta.com.co:8989/PProcess3/public/13889e416790c50f0410449d8b5eaf3c43/{{$e->Hash}}' target ='_blank' >
                            <img src ='http://process.grupotesta.com.co:8989/PProcess3/public/images/descargar.png' height = '40px'/>
                        </a>
                    </td>
                </tr>
                
                @endforeach
                
            </table>
        </div>
    </div>
</body>
</html>

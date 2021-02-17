<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Reporte Realizado con Exito</title>
</head>


<body>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<div  style="text-align: center;
                                    display: flex;
                                    justify-content: center;
                                    padding: 0" >


    <div style="background-color: white;
                                            margin: 20px auto;
                                            padding: 30px 10px;
                                            border-bottom: #1b4b72 1px solid;">

        <div style="background-color: /*#1b4b72*/white; padding: 30px; margin-bottom: 50px; border-bottom: #1b4b72 solid 4px">
            <img src="https://i.ibb.co/zN9Khyp/Ministerio-grupos-familiares-logo.png"  height="300px" alt="Grupos Familiares" border="0">
        </div>






        <h2>{{$grupo->lider}} ha realizado su reporte</h2>


        <h3>Detalles del Reporte:</h3>
        <table style="text-align: left; margin: 20px auto: font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;">
            <tr>
                <th>lider de Sector: </th>
                <td>{{$grupo->sector->supervisor}}</td>
            </tr>
            <tr>
                <th>lider de Grupo: </th>
                <td>{{$grupo->lider}}</td>
            </tr>

            <tr>
                <th>Fecha de Reporte: </th>
                <td>{{date('Y-m-d', strtotime($reporte->fecha))}}</td>
            </tr>

            <tr>
                <th>Asistencia Niños: </th>
                <td>{{$reporte->asistencia_niños}}</td>
            </tr>


            <tr>
                <th>Asistencia Adultos: </th>
                <td>{{$reporte->asistencia_adultos}}</td>
            </tr>

            <tr>
                <th>Invitados Inconversos: </th>
                <td>{{$reporte->invitados_inconversos}}</td>
            </tr>
            <tr>
                <th>Conversiones: </th>
                <td>{{$reporte->conversiones}}</td>
            </tr>

            <tr>
                <th>Integrados a CCDL: </th>
                <td>{{$reporte->integrados_ccdl}}</td>
            </tr>
            <tr>
                <th>Integrados a Ibbaj: </th>
                <td>{{$reporte->integrados_biblico}}</td>
            </tr>

        </table>


    </div>


</div>
</body>
</html>


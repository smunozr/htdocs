<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="lib/lib.js"></script>

</head>
<body>
    <div id="menu">
        <ul>
            <li onclick="cargaGui('Ui/Login.html',document.getElementById('central'))">LOGIN</li>
            <li onclick="cargaGui('Ui/logout.html',document.getElementById('central'))">LOGOUT</li>
            <li onclick="alert('select')">SELECT</li>
            <li onclick="alert('insert')">INSERT</li>
            <li onclick="alert('delete')">DELETE</li>
        </ul>
    </div>
    <div id="central">

    </div>
</body>
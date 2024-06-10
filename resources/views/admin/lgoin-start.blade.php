<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: rgb(168, 13, 13);
        }

        .h1 {
            font-size: 50px;
        }

        .card {
            width: 1000px;
            padding: 100px 0;
            margin: 0 auto;
            background-color: burlywood;
        }

        .btn {
            margin: 100px 0 0 0;
            font-weight: bold;
            font-size: 40px;
            padding: 30px;
            background-color: rgb(116, 44, 16);
            border: 0;
            color: white;
        }
    </style>
</head>

<body>

    <div class="card my-5">
        <h1 class="text-center">Clinical Management System</h1>
        <h1 class="text-center">Login As:</h1>
        <div class="d-flex justify-content-around ">
            <a href="{{route('')}}" class="btn btn-light">Admin</a>
            <a herf="{{route('')}}" class="btn btn-light">Doctor</a>
            <a herf="{{route('')}}" class="btn btn-light">Patient</a>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            
        }

        .sidebar h2 {
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.5em;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .sidebar a:hover {
            background-color: orange;
            transform: scale(1.05);
        }

        .main {
            flex: 1;
            padding: 20px;
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            color: black;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #e1e1e1;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }

            .main {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="{{ url('/') }}">
            <i class="fas fa-home"></i> Accueil
        </a>
        <a href="{{ url('/listeemploye') }}">
            <i class="fas fa-users"></i> Employés
        </a>
        <a href="{{ url('/listeFiche_de_paie') }}">
            <i class="fas fa-dollar-sign"></i> Rémunérations
        </a>
        <a href="{{ url('/listeFiche_de_courrrier') }}">
            <i class="fas fa-envelope"></i> Courriers
        </a>
    </div>

    <div class="main">
        <div class="col-md-9 pt-4">
            @if(Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if(Session::has('echoue'))
                <div class="alert alert-danger">{{ Session::get('echoue') }}</div>
            @endif
            @if(Session::has('warning'))
                <div class="alert alert-danger">{{ Session::get('warning') }}</div>
            @endif
            @if(Session::has('info'))
                <div class="alert alert-danger">{{ Session::get('info') }}</div>
            @endif
        </div>

        @yield('content')         
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dt').DataTable();
        });
    </script>
</body>

</html>
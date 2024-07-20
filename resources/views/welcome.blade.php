<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO APLICATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .navbar-custom {
            background-color: #2015ea;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom .navbar-brand {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-custom .navbar-brand:hover {
            color: #c0dbea;
        }

        .navbar-custom .nav-link {
            color: #ffffff;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            color: #c0dbea;
        }

        .navbar-custom .btn-logout {
            color: #ffffff;
            border: 2px solid #ffffff;
            background: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-weight: 600;
        }

        .navbar-custom .btn-logout:hover {
            background-color: #ffffff;
            color: #2015ea;
        }

        .navbar-custom .btn-logout:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-secondary">
    <div class="container-fluid">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TODO Application</a>
                <div class="d-flex">
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-logout">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    @livewire('todoo')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>@yield('title', 'Pets Laravel Api')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">Laravel API</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/uploadImage')}}">Upload Image</a>                
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/addNewPet')}}">Add new pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/updatePet')}}">Update pet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/findPetsByStatus')}}">Find pet by status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/findPetById')}}">Find pet by Id</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/updatePetWithFormData')}}">Update Pet With Form Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/deletePet')}}">Delete Pet</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row g-3 align-items-center">
        @yield('content')
        
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
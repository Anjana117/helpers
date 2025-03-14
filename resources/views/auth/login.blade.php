<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card {
            background-color: #a3a19b;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); 
            border-radius: 10px; 
        }
    </style>
</head>

<body>
   
    <div class="container mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card mt-3 p-3">
                        <h2 class="mb-4 text-center">Log In </h2>
                        <form action="{{ route('loginMatch') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a href="/register" class="text-decoration-none fs-6" style="color: black">Not Already have a account?</a>
                          

                        </form>
                        @if ($errors->any())
                            <div class="card-footer text-body-secondary">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors - all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>

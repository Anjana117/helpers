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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-3 p-4 shadow-lg"> <!-- Added Bootstrap shadow-lg class -->
                    <h2 class="mb-4 text-center">Register</h2>
                    <form action="/register/store" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                         <a href="/login" class="text-decoration-none fs-6" style="color: black">Already have a account?</a>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">{{ session('success') }}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

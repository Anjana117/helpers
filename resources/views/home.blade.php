<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
        width: 100vw;
        height: 100vh;
        margin: 0;
        padding: 0;
      }
      .bg-image {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center; 
        align-items: center; 
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://dreams-technology.com/public/images/library.png');
        background-position: center;
        background-size: cover;
      }
      h2{
        font-size: 70px;
        color: white;
        text-align: center
      }

    </style>
    
</head>
<body>
{{-- @include('elements.header') --}}
<div class="bg-image" >
    <div class="container">
        <div class="row">
            <div class="col">
               <h2> Welcome<br> To <br> Liberary<br> <a href="/register" class="btn btn-primary p-3 ms-auto fs-5 fw-bold">Get Started</a></h2>
              
            </div>
        </div>
    </div>
</div>

</body>
</html>

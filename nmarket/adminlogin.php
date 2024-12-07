<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>

body{
    background-image: url(resources/1.png);
    background-size: cover;
}


.logindiv{
    background-color: white;
    border-radius: 20px;
}

    </style>
</head>

<body>

    <div class="col-12" style="font-family: sans-serif;">
        <div class="container-fluid">

            <div class="col-12 col-lg-5 logindiv p-5 m-lg-5 mt-5">
                <div class="col-12">
                    <h2>Admin Login</h2>
                </div>

                <div class="col-12 mt-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter Your Email" id="email">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Your Password" id="pwd">
                    </div>
                </div>
                
                <div class="col-12 d-grid">
                    <button class="btn btn-primary" onclick="adminlogin()">Login Now</button>
                </div>
               
            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php 
      session_start();
      include "connection.php";
    ?>

    <div class="col-12">
        <div class="container-fluid">
            <div class="row p-3 bg-black">
                <div class="col-12 col-lg-4 text-center">
                    <button class="btn btn-outline-danger">Hi <?php echo $_SESSION["a"]["name"];?> | Logout</button>
                </div>
                <div class="col-12 col-lg-4 text-center mt-3 mt-lg-0">
                    <img src="resources/logo-no-background.png" width="150px" />
                </div>
                <div class="col-12 col-lg-4 text-center mt-3 mt-lg-0">
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle text-warning" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border: 1px solid gold;">
                            Menu
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="adminpanel.php">Admin Panel</a></li>
                            <li><a class="dropdown-item" href="addproduct.php">Add Products</a></li>
                            <li><a class="dropdown-item" href="updateProduct.php">Update Products</a></li>
                            <li><a class="dropdown-item" href="manageorders.php">Manage Orders</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
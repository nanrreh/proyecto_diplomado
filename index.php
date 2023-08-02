<!DOCTYPE html>
<html>
<head>
    <title>Boticampo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>

<main class="main_login">
    <div class="container text-center position-relative full_w">
        <div class="row align-items-center">
            <div class="col col_farmer">
                <img src="img/farmer.png" alt="" class="l_farmer farmer">
            </div>
            <div class="col col_form">
                <div class="box_login">
                    <img src="img/logo.png" alt="" class="logo">
                    <form action="views/home.php" class="form_login">
                        <input type="text" placeholder="Correo">
                        <input type="password" placeholder="Contraseña">
                        <input type="submit" value="Entrar" class="btn_login">
                    </form>
                </div>
            </div>
            <div class="col col_farmer">
                <img src="img/farmer.png" alt="" class="r_farmer farmer">
            </div>
        </div>
    </div>
</main>



</body>
</html>
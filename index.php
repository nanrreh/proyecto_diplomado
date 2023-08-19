<!DOCTYPE html>
<html>
<head>
    <title>Boticampo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <script src="./js/login.js"></script>
</head>
<body>

<main class="main_login" id="main_login">
    <div class="container text-center position-relative full_w">
        <div class="row align-items-center container_login">
            <div class="col col_farmer">
                <img src="img/farmer.png" alt="" class="l_farmer farmer">
            </div>
            <div class="col col_form">
                <div class="box_login">
                    <img src="img/logo.png" alt="" class="logo">
                    <form action="" class="form_login">
                        <input type="text" placeholder="Correo" name="username" id="txt_username">
                        <input type="password" placeholder="Contraseña" name="password" id="txt_password">
                        <div class="row">
                            <div class="col">
                                <input type="button" value="Login" class="btn_login">
                            </div>
                            <div class="col">
                                <input type="button" value="Invitado" class="btn_login invitado">
                            </div>
                        </div>
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

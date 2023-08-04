<!DOCTYPE html>
<html>
<head>
    <title>Boticampo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/menu.css">
    <link rel="stylesheet" type="text/css" href="../styles/footer.css">
    <link rel="stylesheet" type="text/css" href="../styles/home.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.2/chart.min.js" integrity="sha512-csUso5vWY3PpIJkxLWFbPI7KkjXFhKXpUaAUp1ZLyNhxVWdQacEPH9e7Iw6Rco4es1uQNnlxdCCFkSnJ/f1ZzA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg main_navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/logo.png" alt="" class="menu_logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                    <a class="nav-link" href="valvulas.php">Valvúlas</a>
                    <a class="nav-link" href="empleados.php">Recolectores</a>
                    <a class="nav-link" href="#">Recolección</a>
                    <a class="nav-link" href="#">roles</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="main_home">
    <div class="container text-center container_columns">
        <h1 class="main_title text-center">Resumen</h1>
        <div class="row">
            <div class="col">
                <h2 class="subtitle text-center">Promedios bajos</h2>
                <ul class="list-group">
                    <li class="list-group-item">Pablo Perez: 14kg</li>
                    <li class="list-group-item">Maria Rojas: 13kg</li>
                    <li class="list-group-item">Angelica Cortes: 13kg</li>
                    <li class="list-group-item">Luis Rodriguez: 9kg</li>
                    <li class="list-group-item">Daniel Perez: 8kg</li>
                    <li class="list-group-item">Juliana Diaz: 7kg</li>
                    <li class="list-group-item">Juliana Diaz: 7kg</li>
                    <li class="list-group-item">Juliana Diaz: 7kg</li>
                </ul>
            </div>
            <div class="col position-relative">
                <h2 class="subtitle text-center">Los mejores promedios</h2>
                <div class="podio_raiting">
                    <div class="card silver">
                        <img src="../img/silver.png" alt="" class="medal">
                        <p class="name text-center">Maria Garcia</p>
                        <p class="peso text-center">28px</p>
                        <div class="base"></div>
                    </div>
                    <div class="card gold">
                        <img src="../img/gold.png" alt="" class="medal">
                        <p class="name text-center">Maria Garcia</p>
                        <p class="peso text-center">28px</p>
                        <div class="base"></div>

                    </div>
                    <div class="card bronze">
                        <img src="../img/bronze.png" alt="" class="medal">
                        <p class="name text-center">Maria Garcia</p>
                        <p class="peso text-center">28px</p>
                        <div class="base"></div>

                    </div>
                </div>
            </div>
            <div class="col col_farmer">
                <h2 class="subtitle text-center">Recolección mensual</h2>

            </div>
        </div>
    </div>
</main>

<footer class="main_footer">
    <div class="container footer_container">
        <div class="row align-items-center">
            <b><p class="class="text-center">Nuestras redes sociales</p></b>

            <div class="container_img">
                <a href="https://www.facebook.com/" target="_blank">
                    <img src="../img/fb.png" alt="">
                </a>
                <a href="https://www.instagram.com/" target="_blank">
                    <img src="../img/ig.png" alt="">
                </a>
                <a href="https://web.whatsapp.com/" target="_blank">
                    <img src="../img/ws.png" alt="">
                </a>
            </div>

            <div class="container_text row align-items-center">
                <p>hsecobla@ibero.edu.co</p>
                <p>lrojash2@ibero.edu.co</p>
                <p>Irodri32@ibero.edu.co</p>

                <b><p>Boticampo © 2023. Todos los derechos reservados</p></b>
            </div>
        </div>
    </div>
</footer>



</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Boticampo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../styles/menu.css">
    <link rel="stylesheet" type="text/css" href="../styles/main.css">
    <link rel="stylesheet" type="text/css" href="../styles/footer.css">
    <link rel="stylesheet" type="text/css" href="../styles/home.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.2/chart.min.js" integrity="sha512-csUso5vWY3PpIJkxLWFbPI7KkjXFhKXpUaAUp1ZLyNhxVWdQacEPH9e7Iw6Rco4es1uQNnlxdCCFkSnJ/f1ZzA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Porcentaje cosecha"
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: [
                        {y: 30, label: "Junio"},
                        {y: 30, label: "Agosto"},
                        {y: 40, label: "Julio"},
                    ]
                }]
            });
            chart.render();

        }
    </script>
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
                    <a class="nav-link" href="valvulas.php">Válvulas</a>
                    <a class="nav-link" href="empleados.php">Recolectores</a>
                    <a class="nav-link" href="recoleccion.php">Recolección</a>
                    <a class="nav-link" href="roles.php">Roles</a>
                    <a class="nav-link btn_logout" href="/index.php"><img src="../img/logout.png"></a>
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
                    <li class="list-group-item">Pablo Pérez: 7 kg</li>
                    <li class="list-group-item">Maria Rojas: 8 kg</li>
                    <li class="list-group-item">Angélica Cortes: 9 kg</li>
                    <li class="list-group-item">Luis Rodríguez: 11 kg</li>
                    <li class="list-group-item">Daniel Pérez: 13 kg</li>
                    <li class="list-group-item">Juliana Díaz: 15 kg</li>
                    <li class="list-group-item">Juliana Díaz: 16 kg</li>
                    <li class="list-group-item">Juliana Díaz: 18 kg</li>
                </ul>
            </div>
            <div class="col position-relative">
                <h2 class="subtitle text-center">Los mejores promedios</h2>
                <div class="podio_raiting">
                    <div class="card silver">
                        <img src="../img/silver.png" alt="" class="medal">
                        <p class="name text-center">Maria Garcia</p>
                        <p class="peso text-center">26 kg</p>
                        <div class="base"></div>
                    </div>
                    <div class="card gold">
                        <img src="../img/gold.png" alt="" class="medal">
                        <p class="name text-center">Juan Gómez</p>
                        <p class="peso text-center">30 Kg</p>
                        <div class="base"></div>

                    </div>
                    <div class="card bronze">
                        <img src="../img/bronze.png" alt="" class="medal">
                        <p class="name text-center">Luisa Ramírez</p>
                        <p class="peso text-center">22 Kg</p>
                        <div class="base"></div>

                    </div>
                </div>
            </div>
            <div class="col col_farmer">
                <h2 class="subtitle text-center">Recolección mensual</h2>
                <div>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
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
                <p>irodri32@ibero.edu.co</p>

                <b><p>Boticampo © 2023. Todos los derechos reservados</p></b>
            </div>
        </div>
    </div>
</footer>



</body>
</html>

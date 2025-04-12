<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Biblioteca</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#">Pagina Principal</a>
                </li>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ingrese Nuevo libro
                </button>
            </ul>
        </div>
    </div>
</nav>
<br>
<main class="container-fluid">
    <h1>Libros</h1>
    <div class="col-12 col-md-6 col-lg-4">
    <?php
    $archivo = fopen('archivos/libros.txt', 'r');

    if ($archivo) {
        while (($linea = fgets($archivo)) !== false) {
            $datos_libros = explode(',', trim($linea));
            $autor = $datos_libros[0];
            $titulo = $datos_libros[1];
            $anio = $datos_libros[2];
            echo <<<END
                
                    <div class="card">
                      <div class="card-header">
                        $titulo
                      </div>
                      <div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p> $autor </p>
                          <p> $anio</p>
                        </blockquote>
                      </div>
                    </div>
            END;
        }
        fclose($archivo);
    }
    ?>
    </div>
    <br>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ingrese el Nuevo Libro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="guardarLibro.php" method="POST">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo Libro</label>
                            <input type="text" class="form-control" id="titulo" name="tituloLibro" required>
                        </div>
                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autorLibro" required>
                        </div>
                        <div class="mb-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="text" class="form-control" id="anio" name="anioLibro" required>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No Guardar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</main>


<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-dark">
    <p class="col-md-4 mb-0 text-white"> Belter Emanue Vásquez Flores 202460515</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
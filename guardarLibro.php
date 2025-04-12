<?php
class libro {
    public function generarDocumento($datos) {
        if ( !file_exists('archivos') ) {
            mkdir('archivos');
        }

        $archivo = fopen('archivos/libros.txt', 'a');
        $string = $datos['autor'] . ", " . $datos['titulo'] . ", " . $datos['anio'];
        fwrite ( $archivo, $string."\n" );
        fclose($archivo);
    }
}
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $autor = $_POST['autorLibro'];
    $libro = $_POST['tituloLibro'];
    $anio = $_POST['anioLibro'];

    $datos_libro = array(
        'autor' => $autor,
        'titulo' => $libro,
        'anio' => $anio
    );

    $objeto_libro = new libro();
    $objeto_libro->generarDocumento($datos_libro);
    echo header('Location: index.php');
}
<?php
session_start();

// Si el usuario no está logeado lo enviamos al index
if (!$_SESSION['usuario']) {
    header("Location:index.php");
}

// Aumentamos la estadística
include("admin/funciones.php");
aumentarCompletados();

// Definimos la variable $resultado
$resultado = '';

// Determinamos el resultado en función del puntaje
if ($_SESSION['score'] >= 70) {
    $resultado = '🏆'; // Emoji de copa para puntajes altos
} else {
    $resultado = '👎'; // Emoji de dislike para puntajes bajos
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="estilo.css">
    <title>QUIZ GAME</title>
</head>
<body>

    <div class="container-final" id="container-final">
        <div class="info">
            <h2>RESULTADO FINAL</h2>
            <div class="estadistica">
                <div class="acierto">
                    <span class="correctas numero"><?php echo $_SESSION['correctas'] ?></span>
                    CORRECTAS
                </div>
                <div class="acierto">
                    <span class="incorrectas numero"><?php echo $_SESSION['incorrectas'] ?></span>
                    INCORRECTAS
                </div>
            </div>
            <div class="score">
                <div class="box">
                    <div class="chart">
                        <?php echo $resultado; ?> <!-- Mostramos la copa o el dislike -->
                    </div>
                    <h2>RESULTADO</h2>
                </div>
            </div>

            <a href="index.php">Ir al Menú</a>

        </div>
    </div>
    <script src="juego.js"></script>
</body>
</html>

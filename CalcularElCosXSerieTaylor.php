<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cos x en php</title>
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>
    <?php
    function calcular_coseno($x, $n)
    {
        $coseno = 1;
        $termino_anterior = 1;
        for ($i = 1; $i <= $n; $i++) {
            $termino_actual = -$termino_anterior * $x * $x / ((2 * $i - 1) * 2 * $i);
            $coseno += $termino_actual;
            $termino_anterior = $termino_actual;
        }
        return $coseno;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $x = $_POST['x'];
        $n = $_POST['n'];
        $coseno = calcular_coseno($x, $n);
        echo "<div class='container'><h1>Calculadora de coseno</h1><div id='resultado'>El coseno de $x es $coseno</div></div>";
    }
    ?>

    <div class="container">
        <h1>Calculadora de coseno</h1>
        <form method="post" action="">
            <label for="x">Ingrese un número:</label>
            <input type="number" id="x" name="x" step="any" required>
            <label for="n">Ingrese el número de términos a utilizar:</label>
            <input type="number" id="n" name="n" min="1" required>
            <input type="submit" value="Calcular">
        </form>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e en php</title>
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>

    <?php
    function calcular_e($n)
    {
        $e = 1;
        $factorial = 1;
        for ($i = 1; $i <= $n; $i++) {
            $factorial *= $i;
            $e += 1 / $factorial;
        }
        return $e;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = $_POST['n'];
        $e = calcular_e($n);
        echo "<div class='container'><h1>Calculadora de número e</h1><div id='resultado'>El número e con $n términos es $e</div></div>";
    }
    ?>

    <div class="container">
        <h1>Calculadora de número e</h1>
        <form method="post" action="">
            <label for="n">Ingrese el número de términos a utilizar:</label>
            <input type="number" id="n" name="n" min="1" required>
            <input type="submit" value="Calcular">
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorial en php</title>
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>
    <?php
    function factorial($num)
    {
        $result = 1;
        for ($i = 1; $i <= $num; $i++) {
            $result *= $i;
        }
        return $result;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = $_POST['numero'];
        $factorial = factorial($numero);
        echo "<div id='resultado'>El factorial de $numero es $factorial</div>";
    }
    ?>

    <form method="post" action="">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero" required>
        <br>
        <input type="submit" value="Calcular factorial">
    </form>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades estadisticas en php</title>
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>


    <form method="post">
        <label for="n">Número de edades(1-20):</label>
        <input type="number" name="n" id="n" min="1" max="20" required>
        <div id="edades">
            <!-- Aquí se agregan los campos para las edades -->
        </div>

    </form>
    <?php
    function calcular_estadisticas($edades)
    {
        // Calcular promedio
        $promedio = array_sum($edades) / count($edades);

        // Calcular media
        sort($edades);
        $num_edades = count($edades);
        $media = $num_edades % 2 == 0 ? ($edades[$num_edades / 2 - 1] + $edades[$num_edades / 2]) / 2 : $edades[floor($num_edades / 2)];

        // Calcular moda
        $frecuencias = array_count_values($edades);
        $moda = array_search(max($frecuencias), $frecuencias);

        // Calcular mayor y menor
        $mayor = max($edades);
        $menor = min($edades);

        // Devolver resultados
        return array(
            'promedio' => $promedio,
            'media' => $media,
            'moda' => $moda,
            'mayor' => $mayor,
            'menor' => $menor
        );
    }

    $edades = array();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = $_POST['n'];
        for ($i = 0; $i < $n; $i++) {
            $edad = $_POST["edad_$i"];
            if (!empty($edad)) {
                $edades[] = $edad;
            }
        }

        if (count($edades) > 0) {
            // Calcular estadísticas
            $estadisticas = calcular_estadisticas($edades);

            // Mostrar resultados
            echo '<h1>Resultados</h1>';
            echo '<div id="resultado">';
            echo '<table id="tabla-resultados">';
            echo '<tr><th>Promedio</th><td>' . round($estadisticas['promedio'], 2) . '</td></tr>';
            echo '<tr><th>Media</th><td>' . $estadisticas['media'] . '</td></tr>';
            echo '<tr><th>Moda</th><td>' . $estadisticas['moda'] . '</td></tr>';
            echo '<tr><th>Mayor</th><td>' . $estadisticas['mayor'] . '</td></tr>';
            echo '<tr><th>Menor</th><td>' . $estadisticas['menor'] . '</td></tr>';
            echo '</table>';
            echo '</div>';
        }
    }

    ?>

    <script>
        // Agregar campos para las edades
        const nInput = document.getElementById('n');
        const edadesDiv = document.getElementById('edades');

        nInput.addEventListener('input', function () {
            const n = parseInt(nInput.value);
            let html = '';
            if (n === 0 || isNaN(n) || n < 0 || n > 20) {
                edadesDiv.innerHTML = 'Llena el campo con valores validos, el rango de edades a calcular son de 1 a 20, por temas de rendimiento.';
                return
            }
            for (let i = 0; i < n; i++) {
                html += '<label for="edad_' + i + '">Edad ' + (i + 1) + ':</label>';
                html += '<input type="number" name = "edad_' + i + '" id = "edad_' + i + '" required > ';
            }
            edadesDiv.innerHTML = html;
            edadesDiv.innerHTML += '<input type="submit" value="Calcular">';
        });
    </script>
</body>

</html>
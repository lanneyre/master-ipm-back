<h2>Statistiques</h2>

<?php
$resultats = json_decode(file_get_contents("resultats.json"));
$nbResult = [];
for ($i = 0; $i <= 10; $i++) {
    # code...
    $nbResult[$i] = 0;
}
$scores = [];

foreach ($resultats as $key => $value) {
    # code...
    $score = round($value->score / $value->total * 10);
    $nbResult[$value->score]++;
    $scores[] = $score;
    //echo "$value->score / $value->total<br>";
}

$moyenne = array_sum($scores) / count($scores);

function calculateMedian($array)
{
    if (empty($array)) {
        return null;
    } else {
        sort($array);
        $length = count($array);
        $middle_index = floor(($length - 1) / 2);
        if ($length % 2) {
            return $array[$middle_index];
        } else {
            $low = $array[$middle_index];
            $high = $array[$middle_index + 1];
            return ($low + $high) / 2;
        }
    }
}

function generateColorGradient($startColor, $midColor, $endColor, $steps)
{
    // Convert hex colors to RGB
    $startRGB = hexToRgb($startColor);
    $midRGB = hexToRgb($midColor);
    $endRGB = hexToRgb($endColor);

    $colors = [];

    // Calculate the first half of the gradient (start to mid)
    for ($i = 0; $i < $steps / 2; $i++) {
        $ratio = $i / ($steps / 2);
        $colors[] = interpolateColor($startRGB, $midRGB, $ratio);
    }

    // Calculate the second half of the gradient (mid to end)
    for ($i = 0; $i <= $steps / 2; $i++) {
        $ratio = $i / ($steps / 2);
        $colors[] = interpolateColor($midRGB, $endRGB, $ratio);
    }

    return $colors;
}

function hexToRgb($hex)
{
    $hex = ltrim($hex, '#');
    $length = strlen($hex);

    if ($length == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else if ($length == 6) {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }

    return ['r' => $r, 'g' => $g, 'b' => $b];
}

function interpolateColor($color1, $color2, $ratio)
{
    $r = $color1['r'] * (1 - $ratio) + $color2['r'] * $ratio;
    $g = $color1['g'] * (1 - $ratio) + $color2['g'] * $ratio;
    $b = $color1['b'] * (1 - $ratio) + $color2['b'] * $ratio;

    return rgbToHex(['r' => round($r), 'g' => round($g), 'b' => round($b)]);
}

function rgbToHex($rgb)
{
    $hex = "#";
    $hex .= str_pad(dechex($rgb['r']), 2, '0', STR_PAD_LEFT);
    $hex .= str_pad(dechex($rgb['g']), 2, '0', STR_PAD_LEFT);
    $hex .= str_pad(dechex($rgb['b']), 2, '0', STR_PAD_LEFT);

    return $hex;
}


// Example usage
$startColor = '#a51d2d'; // Red
$midColor = '#e7a800'; // Orange
$endColor = '#26a269'; // Green
$steps = count($nbResult); // Number of colors to generate

$gradientColors = generateColorGradient($startColor, $midColor, $endColor, $steps);

$mediane = calculateMedian($scores);

// var_dump($moyenne);
// var_dump($mediane);

?>

<div class="row">
    <div class="6u">
        <canvas id="ChartResultats"></canvas>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('ChartResultats');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php echo ("'" . implode("', '", array_keys($nbResult)) . "'"); ?>],
                    datasets: [{
                        label: 'Répartition des scores au test',
                        data: [<?php echo ("" . implode(", ", $nbResult) . ""); ?>],
                        borderWidth: 1,
                        backgroundColor: [
                            <?php echo ("'" . implode("', '", $gradientColors) . "'"); ?>
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1 // Définir le pas de l'axe Y ici
                            }
                        }
                    }
                }
            });
        </script>
    </div>
    <div class="6u">
        <h3>Moyenne des résultats : <small><?php echo number_format($moyenne, 2); ?></small></h3>
        <h3>Mediane des résultats : <small><?php echo number_format($mediane, 2); ?></small></h3>
    </div>
</div>
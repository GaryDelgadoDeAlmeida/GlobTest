<?php
/**
 * @param array entry
 * @return array result
 */
function foo(array $tabEntry) {
    $result = [];

    sort($tabEntry);
    while(!empty($tabEntry)) {
        $first = array_shift($tabEntry);

        foreach($tabEntry as $key => $entry) {
            if(
                ($first[0] <= $entry[0] && $entry[0] <= $first[1]) ||
                ($first[0] <= $entry[1] && $entry[1] <= $first[1])
            ) {
                $first[0] = $entry[0] <= $first[0] ? $entry[0] : $first[0];
                $first[1] = $entry[1] >= $first[1] ? $entry[1] : $first[1];

                unset($tabEntry[$key]);
            }
        }

        $result[] = $first;
    }

    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GlobTest</title>
    <link rel="stylesheet" href="./style.css" />
</head>
<body>
    <div>
        <h2>GlobTest</h2>
        
        <div class="quest-1">
            <h3>Question 1</h3>
            <p>
                On a un tableau d'intervalle. On prend le premier élément et on va comparer les intervalles des autres éléments 
                du tableau d'entrée. Si l'un des intervalles est compris dans le premier élément, alors si l'intervalle minimum
                est inférieur à l'intervalle minimum du premier élément, celui-ci deviendra le minimum du premier élément. Si 
                l'intervalle maximum est supérieur à l'intervalle maximum du premier élément, celui-ci deviendra le maximum du 
                premier élément. Une fois terminé, on prend les éléments qui n'entraient pas dans l'intervalle du premier et ont 
                reproduit le même schéma que précédemment jusqu'à qu'il n'y est plus d'intervalle à traiter.
            </p>
        </div>
        
        <div class="quest-2">
            <h3>Question 2</h3>
            <table>
                <thead>
                    <tr>
                        <th>Entrée</th>
                        <th>Sortie</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>[[0, 3], [6, 10]]</code></td>
                        <td><code><?= json_encode(foo([[0, 3], [6, 10]])) ?></code></td>
                    </tr>
                    <tr>
                        <td><code>[[0, 5], [3, 10]]</code></td>
                        <td><code><?= json_encode(foo([[0, 5], [3, 10]])) ?></code></td>
                    </tr>
                    <tr>
                        <td><code>[[0, 5], [2, 4]]</code></td>
                        <td><code><?= json_encode(foo([[0, 5], [2, 4]])) ?></code></td>
                    </tr>
                    <tr>
                        <td><code>[[7, 8], [3, 6], [2, 4]]</code></td>
                        <td><code><?= json_encode(foo([[7, 8], [3, 6], [2, 4]])) ?></code></td>
                    </tr>
                    <tr>
                        <td><code>[[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]</code></td>
                        <td><code><?= json_encode(foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]])) ?></code></td>
                    </tr>
                    <tr>
                        <td><code>[[0, 1], [3, 10], [4, 11], [1, 3], [11, 20]]</code></td>
                        <td><code><?= json_encode(foo([[0, 1], [3, 10], [4, 11], [1, 3], [11, 20]])) ?></code></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="quest-3">
            <h3>Question 3</h3>
            <p>J'ai passé 4h à réaliser cette exercice.</p>
        </div>

        <a href="https://github.com/armel/GlobTest" target="_blank">Enoncé de l'exercice</a>
    </div>
</body>
</html>
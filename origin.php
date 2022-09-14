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
                $first[0] = $entry[0] < $first[0] ? $entry[0] : $first[0];
                $first[1] = $entry[1] > $first[1] ? $entry[1] : $first[1];

                unset($tabEntry[$key]);
            }
        }

        $result[] = $first;
    }

    return $result;
}

function pm($log, bool $exist = false) {
    echo "<pre>";
    print_r($log);
    echo "</pre>";
    $exist ?? exit();
}


// Expect [[0, 3], [6, 10]]
$test1 = [[0, 3], [6, 10]];
// foo([[0, 3], [6, 10]]);

// Expect : [[0, 10]]
$test2 = [[0, 5], [3, 10]];
// foo([[0, 5], [3, 10]]);

// EXpect : [[0, 5]]
$test3 = [[0, 5], [2, 4]];
// foo([[0, 5], [2, 4]]);

// Expect : [[2, 6], [7, 8]]
$test4 = [[7, 8], [3, 6], [2, 4]];
// foo([[7, 8], [3, 6], [2, 4]]);

// Expect : [[1, 10], [15, 20]]
$test5 = [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]];
// foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]);

pm([
    "start" => [
        json_encode($test1),
        json_encode($test2),
        json_encode($test3),
        json_encode($test4),
        json_encode($test5),
    ],
    "end" => [
        json_encode(foo($test1)),
        json_encode(foo($test2)),
        json_encode(foo($test3)),
        json_encode(foo($test4)),
        json_encode(foo($test5)),
    ],
]);
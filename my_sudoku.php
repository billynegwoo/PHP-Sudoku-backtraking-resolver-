<?php
function fill_grid($grid)
{
    fill_cell($grid, 0, 0);
}

;

function get_next_coords($y, $x)
{
    if ($x === 8 && $y < 8) {
        $y = $y + 1;
        $x = 0;
    } else {
        $x = $x + 1;
    }
    return [$x, $y];
}

;

function fill_cell($grid, $y, $x)
{
    if ($grid[$x][$y] > 0) {
        $next = get_next_coords($y, $x);
        fill_cell($grid, $next[1], $next[0]);
    } else {
        for ($i = 1; $i < 10; $i++) {
            if (check_horizontal($grid, $x, $i) && check_vertical($grid, $y, $i) && check_square($grid, $y, $x, $i)) {
                $grid[$x][$y] = $i;
                if ($x * $y == 64) {
                    draw($grid);
                    return true;
                }
                $next = get_next_coords($y, $x);
                if ($next == false) draw($grid);
                if (fill_cell($grid, $next[1], $next[0])) return true;
            }
        }
        $grid[$x][$y] = 0;
        return false;
    }
}

function check_horizontal($grid, $y, $value)
{
    for ($x = 0; $x < 9; $x++) {
        if ($grid[$y][$x] == $value) return false;
    }
    return true;
}

;

function check_vertical($grid, $x, $value)
{
    for ($y = 0; $y < 9; $y++) {
        if ($grid[$y][$x] == $value) return false;
    }
    return true;

}

;


function check_square($grid, $y, $x, $value)
{
    $_x = $x - ($x % 3);
    $_y = $y - ($y % 3);
    for ($x = $_x; $x < $_x + 3; $x++) {
        for ($y = $_y; $y < $_y + 3; $y++) {
            if ($grid[$x][$y] == $value) return false;
        }
    }
    return true;
}

;


function draw($grid)
{
    echo "\n";
    foreach ($grid as $line) {
        echo "|";
        foreach ($line as $case) {
            echo $case . "|";
        }
        echo "\n";
    }
    echo "\n";
}

;

$grid1 = array(
    array(1, 0, 0, 0, 0, 7, 0, 9, 0),
    array(0, 3, 0, 0, 2, 0, 0, 0, 8),
    array(0, 0, 9, 6, 0, 0, 5, 0, 0),
    array(0, 0, 5, 3, 0, 0, 9, 0, 0),
    array(0, 1, 0, 0, 8, 0, 0, 0, 2),
    array(6, 0, 0, 0, 0, 4, 0, 0, 0),
    array(3, 0, 0, 0, 0, 0, 0, 1, 0),
    array(0, 4, 0, 0, 0, 0, 0, 0, 7),
    array(0, 0, 7, 0, 0, 0, 3, 0, 0),
);

$grid3 = array(
    array(8, 0, 0, 0, 0, 0, 0, 0, 0),
    array(0, 0, 3, 6, 0, 0, 0, 0, 0),
    array(0, 7, 0, 0, 9, 0, 2, 0, 0),
    array(0, 5, 0, 0, 0, 7, 0, 0, 0),
    array(0, 0, 0, 0, 4, 5, 7, 0, 0),
    array(0, 0, 0, 1, 0, 0, 0, 3, 0),
    array(0, 0, 1, 0, 0, 0, 0, 6, 8),
    array(0, 0, 8, 5, 0, 0, 0, 1, 0),
    array(0, 9, 0, 0, 0, 0, 4, 0, 0),
);
$grid = array(
    array(0, 0, 4, 0, 0, 6, 0, 0, 7),
    array(0, 0, 0, 1, 0, 0, 2, 0, 5),
    array(1, 0, 9, 5, 0, 7, 4, 0, 8),
    array(4, 0, 0, 0, 0, 0, 0, 2, 0),
    array(0, 0, 2, 0, 6, 0, 0, 9, 3),
    array(9, 0, 0, 2, 0, 3, 0, 0, 6),
    array(0, 8, 1, 0, 0, 0, 0, 5, 0),
    array(7, 0, 5, 3, 0, 2, 0, 0, 4),
    array(6, 0, 0, 9, 0, 0, 1, 0, 0),
);
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$time_start = microtime_float();
fill_grid($grid3);
$time_end = microtime_float();
$time = $time_end - $time_start;

echo $time;


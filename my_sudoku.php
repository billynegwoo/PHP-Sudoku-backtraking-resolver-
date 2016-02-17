<?php
function fill_grid($grid){

};

function fill_cell($grid, $y, $x){

};

function check_horizontal($grid, $y, $value){

};

function check_vertical($grid, $x, $value){

};

function check_square($grid, $y, $x, $value){

};


function draw($grid){
    foreach($grid as $line){
        echo "|";
        foreach($line as $case ){
            echo $case . "|";
        }
        echo "\n";
    }
};

$grid = array(
    array(0, 0, 4),
    array(0, 0, 0),
    array(1, 0, 9)
);

for($i = 1 ; $i< 10; $i++ ){

}


<?php
$array = [[241, 121, 361, 501], 5, 6, 10, [103, 204, [305, 725, 666]]];
function MaxArray($array){
    // Array de numeros a ser ordenados 
    $numbers = [];
    // utilizo o wall recursivo passando a variavel $numbers por referência 
    array_walk_recursive($array,function($item) use(&$numbers){
        $numbers[] = $item;
    });
    // utilizando o metodo max para retornar o maior numero
    return max($numbers);
}
echo MaxArray($array);

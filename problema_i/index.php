<?php
$array = [[241, 121, 361, 501], 5, 6, 10, [103, 204, [305, 725, 666]]];
// Array de numeros a ser ordenados 
$max;
// utilizo o wall recursivo passando a variavel $numbers por referência 
array_walk_recursive($array,function($numero) use(&$max){
	$max = ($numero > $max)? $numero : $max;
});
// utilizando o metodo max para retornar o maior numero
echo $max;;

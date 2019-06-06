<?php
$url = "https://blog.agilize.com.br/lucro-presumido/embutindo-os-impostos-no-valor-da-nota/";
$HTMLContent = file_get_contents($url);
// como tem duas tabelas na tela vou obtar pelo item exclusivo que é a class da div que ela é filha
preg_match("/<div class=\"post-excerpt(.*)>(.*)<\/div>/siU", $HTMLContent, $divClassMatch);
// Agora já posso pegar a tabela no resultado, onde ela é a única
preg_match("/<table (.*)>(.*)<\/table>/siU", current($divClassMatch), $TableMatch);
$table = current($TableMatch);
// Se for só pra mostrar a tabela, até a linha abaixo resolve
echo $table;




 
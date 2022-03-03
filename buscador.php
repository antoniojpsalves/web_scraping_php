<?php

libxml_use_internal_errors(true);

$debug = isset($_GET['debug']) ? true : false;
$conteudo = file_get_contents('https://dias.dev/');

$documento = new DOMDocument();

$documento->loadHTML($conteudo);


$xPath = new DOMXPath($documento);
$domNodeList = $xPath->query('.//h2[@itemprop="headline"]');

foreach($domNodeList as $element) {
    echo $element->textContent . "<br>";
}


if($debug) {
    echo "<pre>";
    echo "<h4>Conteúdo: </h4>";
    echo "<br>";
    print_r($conteudo);
    echo "<br>";
    echo "<h4>Documento: </h4>";
    echo "<br>";
    print_r($documento);
    echo "<br>";
    echo "<h4>DomNodeList: </h4>";
    echo "<br>";
    print_r($domNodeList);
    echo "<br>";
    echo "</pre>";
}


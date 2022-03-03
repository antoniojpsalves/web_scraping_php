<?php

//Ocultando os warnings.
libxml_use_internal_errors(true);

//Variável usada para debug
$debug = isset($_GET['debug']) ? true : false;

/**
 * Primeiro passo a fazer é realizar uma requisição http para a página, e obtendo o body como resposta
 */
$conteudo = file_get_contents('https://dias.dev/');


/**
 * Utilizando o dom para manipular o objeto recebido
 */
$documento = new DOMDocument();
$documento->loadHTML($conteudo);


/**
 * Percorrendo elementos xml ou html usando 'xpath'
 * Isso retorna uma dom node list com os elementos
 */
$xPath = new DOMXPath($documento);
$domNodeList = $xPath->query('.//h2[@itemprop="headline"]');


/**
 * Percorrendo o elemento e obtendo o texto.
 */
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


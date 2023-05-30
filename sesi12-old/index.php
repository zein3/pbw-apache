<?php

require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$reqMethod = ucfirst($_SERVER["REQUEST_METHOD"]);

$idx = array_search("index.php", $uri);
$controllerClass = ucfirst($uri[$idx + 1]) . "Controller";
$controllerFile = PROJECT_ROOT_PATH . "/Controller/" . $controllerClass . ".php";

if (!file_exists($controllerFile)) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

require $controllerFile;

$objFeedController = new $controllerClass();
$strMethodName = $uri[$idx + 2] . $reqMethod;

if (!method_exists($objFeedController, $strMethodName)) {
    header("HTTP/1.1 405 Method Not Allowed");
    exit();
}

$pathParams = array();
for ($p = $idx + 3; $p < count($uri); $p += 2) {
    if (isset($uri[$p]) && $uri[$p] == "") continue;
    if (!isset($uri[$p]) || !isset($uri[$p + 1]) || (isset($uri[$p+1]) && $uri[$p+1] == "")) {
        header("HTTP/1.1 400 Bad Request");
        echo "Parameters of endpoint must be in key/value pair. For example: index.php/key1/value1/key2/value2";
        exit();
    }

    $pathParams[$uri[$p]] = $uri[$p + 1];
}

$payload = file_get_contents('php://input');
try {
    $payload = json_decode($payload, true);
} catch (\Exception $err) {}

$objFeedController->{$strMethodName}($pathParams, $payload);

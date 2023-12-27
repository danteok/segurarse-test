<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../bootstrap.php';
require __DIR__ . '/../classes/GestorEmpleados.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);


function getJsonRequested(){
    return json_decode(file_get_contents('php://input'),true);
}

/**
 * endpoint para listar empleados
 * 
 * curl --location  'http://segurarse.example.com:8090/listar-empleados' --header 'Content-Type: application/json'
 */
$app->get('/listar-empleados', function (Request $request, Response $response, $args) {
    // se podría optimizar con paginado
    $empleados = GestorEmpleados::listar();
    $response->getBody()->write(json_encode($empleados));
    return $response;
});


/**
 * Agrega un empleado
 * 
 * curl --location --request POST 'http://segurarse.example.com:8090/agregar-empleado' --header 'Content-Type: application/json' --data '{"nombre":"pedro", "apellido":"perez","fecha_ingreso":"2023-12-10","puesto_trabajo":"vendedor","salario":"250000"}'
 */
$app->post('/agregar-empleado',function (Request $request, Response $response, $args) {
    $jsonData =  getJsonRequested();

    $result = GestorEmpleados::agregar($jsonData);
    
    $response->getBody()->write(json_encode($result));
    return $response;
});


/**
 * Asigna un salario a un empleado
 * 
 * curl --location --request POST 'http://segurarse.example.com:8090/asignar-salario-empleado' --header 'Content-Type: application/json' --data '{"empleado_id":"1", "fecha_periodo":"2023-12","salario":"250000"}'
 */
$app->post('/asignar-salario-empleado',function (Request $request, Response $response, $args) {
    $jsonData =  getJsonRequested();

    $result = GestorEmpleados::asignarSalario($jsonData);
    
    $response->getBody()->write(json_encode($result));
    return $response;
});


$app->get('/obtener-salario-promedio', function (Request $request, Response $response, $args) {
    $response->getBody()->write("como andas chango!");
    return $response;
});


$app->get('/incrementar-salarios', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->get('/visualizar-salario-todos-empleados', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->run();
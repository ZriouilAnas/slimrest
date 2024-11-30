<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use dao\Connexion;
use dao\ProduitDao;
require __DIR__ . '/../vendor/autoload.php';


$app = AppFactory::create();
$app->get('/api/products', function (Request $request, Response $response, $args) {
    $connexion = new Connexion();
    $dao = new ProduitDao();
    
    
    $data = $dao->findAll();
    $body = json_encode($data);
    $response->getBody()->write($body);

return $response;
});

$app->get('/api/{id:[0-9]+}', function (Request $request, Response $response, $args) {

    $connexion = new Connexion();
    $dao = new ProduitDao();
    
    
    $data = $dao->findById($args['id']);
    $body = json_encode($data);
    $response->getBody()->write($body);

return $response;
});



$app->run();
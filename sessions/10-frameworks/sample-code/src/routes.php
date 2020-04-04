<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\{
    TicketsController, 
    NewTicketController, 
    AddTicketController, 
    FindTicketController
};

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    $response = $this->view->render($response, "home.phtml");
    return $response;
});

$app->get('/tickets', TicketsController::class);

$app->get('/ticket/new', NewTicketController::class);

$app->post('/ticket/new', AddTicketController::class);

$app->get('/ticket/{id}', FindTicketController::class)->setName('ticket-detail');
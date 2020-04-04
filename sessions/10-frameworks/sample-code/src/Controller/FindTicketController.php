<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;
use App\Model\TicketMapper;

class FindTicketController
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response, array $args) {
        $ticket_id = (int)$args['id'];
        $ticket = $this->getTicketById($ticket_id);

        $response = $this->container->view->render($response, "ticketdetail.phtml", ["ticket" => $ticket]);
        return $response;
    }

    private function getTicketById($ticket_id) {
        $mapper = new TicketMapper($this->container->db);
        return $mapper->getTicketById($ticket_id);
    }
}
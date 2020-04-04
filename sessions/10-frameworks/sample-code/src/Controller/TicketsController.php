<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;
use App\Model\TicketMapper;

class TicketsController
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response, array $args) {
        $this->container->logger->addInfo("Ticket list");
        $tickets = $this->getTickets();

        $response = $this->container->view->render($response, "tickets.phtml", ["tickets" => $tickets, "router" => $this->container->router]);
        return $response;
    }

    private function getTickets() {
        $mapper = new TicketMapper($this->container->db);
        return $mapper->getTickets();
    }
}
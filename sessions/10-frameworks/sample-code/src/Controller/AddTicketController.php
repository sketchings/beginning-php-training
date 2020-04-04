<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;
use App\Model\TicketEntity;
use App\Model\TicketMapper;
use App\Model\ComponentMapper;

class AddTicketController
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response, array $args) {
        $this->saveTicket($request->getParsedBody());

        $response = $response->withRedirect("/tickets");
        return $response;
    }

    private function saveTicket($data) {
        $ticket_data = $this->getTicketData($data);

        $ticket = new TicketEntity($ticket_data);
        $ticket_mapper = new TicketMapper($this->container->db);
        $ticket_mapper->save($ticket);
    }

    private function getTicketData($data) {
        $ticket_data['title'] = filter_var($data['title'], FILTER_SANITIZE_STRING);
        $ticket_data['description'] = filter_var($data['description'], FILTER_SANITIZE_STRING);

        // work out the component
        $component_id = (int)$data['component'];
        $component_mapper = new ComponentMapper($this->container->db);
        $component = $component_mapper->getComponentById($component_id);
        $ticket_data['component'] = $component->getName();
        return $ticket_data;
    }
}
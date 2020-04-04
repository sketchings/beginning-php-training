<?php
namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Container\ContainerInterface;
use App\Model\ComponentMapper;

class NewTicketController
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function __invoke(Request $request, Response $response, array $args) {
        $components = $this->getComponents();
        $response = $this->container->view->render($response, "ticketadd.phtml", ["components" => $components]);
        return $response;
    }

    private function getComponents() {
        $component_mapper = new ComponentMapper($this->container->db);
        return $component_mapper->getComponents();
    }
}
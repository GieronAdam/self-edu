<?php
namespace Raspberry\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Response;
use Raspberry\Model\RaspberryExternalExpander as Expander;

class RaspberryExternalController extends AbstractActionController
{

    public function externalrequestAction()
    {
        $response = new Response();
        $expander = new Expander();

        return $response->setContent(json_encode($expander->getRequest()));
    }
}
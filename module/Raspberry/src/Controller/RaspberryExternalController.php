<?php
namespace Raspberry\Controller;

use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Raspberry\Model\RaspberryExternalExpander as Expander;

class RaspberryExternalController extends AbstractActionController
{


    /**
     * @return \Zend\Stdlib\Message
     */
    public function externalrequestAction()
    {
        $expander = new Expander();
        $data = $this->getRequest()->getPost();
        $result = $expander->setRequest($data['data']);

        return $result;
    }

    /**
     * @return \Zend\Stdlib\Message
     */
    public function reciveExternalAction()
    {
        $data = $this->getRequest()->getPost();
        $response = new Response();
        $expander = new Expander();
        $expander->reciveRequest($data);

        return $response->setContent(json_encode($expander->reciveRequest($data)));
    }

}
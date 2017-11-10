<?php

namespace Raspberry\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Process\Process as Process;
use Raspberry\Model\RaspberryExpander;


class RaspberryController extends AbstractActionController
{
    /**
     * @var ViewModel
     */
    public $view ;
    /**
     * @var
     */
    public $data;

    /**
     * RaspberryController constructor.
     */
    function __construct()
    {
        return $this->view = new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        $this->view->setTemplate('raspberry/index/raspberry.phtml');
        return $this->view;
    }

    /**
     * @return mixed
     */
    public function requestAction()
    {
        $request = $this->getRequest();
        $this->data = $request->getPost();
        $response = $this->getResponse();
        $expander = new RaspberryExpander();
        $expander->_getRequest($this->data['data']);
        $res = $expander->_getresult();
        return $response->setContent(($res));

    }



}

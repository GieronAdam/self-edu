<?php
namespace Raspberry\Model;

use Raspberry\Interfaces\IRaspberryExternalExpander;
use Raspberry\Traits\CommandPreparerTrait;
use Zend\Http\Client;
use Zend\Http\Response;
use Process\Process;


class RaspberryExternalExpander implements IRaspberryExternalExpander
{
    use CommandPreparerTrait;

    /**
     * @var Response
     */
    public $response;
    /**
     * @var array
     */
    public $conf;
    /**
     * @var
     */
    public $process;
    /**
     * @var string
     */
    public $i2cset = 'i2cset -y 1 ';

    /**
     * RaspberryExternalExpander constructor.
     */
    public function __construct()
    {
        $this->conf = array(
            'adapter'      => 'Zend\Http\Client\Adapter\Socket',
            'ssltransport' => 'tls'
        );
        $this->response = new Response();
    }

    /**
     * @param $param
     * @return \Zend\Stdlib\Message
     */
    public function setRequest($param)
    {
        $internalResponse = new Response();
        $client = new Client('http://agieron.ayz.pl/raspberry/reciveexternal', $this->conf);
        $client->setMethod('POST');
        $client->setParameterPost(['pin'=>$param[0]]);
        $result = $client->send()->getBody();
        $result = json_decode($result);
        return $internalResponse->setContent(json_encode($result));
    }

    /**
     * @param $param
     * @return array|string
     */
    public function reciveRequest($param)
    {
        $relay = $this->_prepRelayCommand($param,$this->i2cset);
//        $relayProcess = $this->processRunner(new Process($relay));
        return $relay;
    }

}
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

    public $response;
    public $conf;
    public $process;

    function __construct()
    {
        $this->conf = array(
            'adapter'      => 'Zend\Http\Client\Adapter\Socket',
            'ssltransport' => 'tls'
        );
        $this->response = new Response();
    }

    public function setRequest($param)
    {
        $internalResponse = new Response();
        $client = new Client('http://agieron.ayz.pl/raspberry/reciveexternal', $this->conf);
        $client->setMethod('POST');
        $client->setParameterPost(['pin'=>$param[0]]);
        $response = $client->send()->getBody();
        $response = json_decode($response);
        return $internalResponse->setContent(json_encode($response->pin));
    }

    public function reciveRequest($param)
    {
        $relay = $this->_prepRelayCommand($param[0]);
        $audio = $this->_prepareAudioCommand($param[1]);
        $relayProcess = $this->processRunner(new Process($relay));
        $audioProcess = $this->processRunner(new Process($audio));

        return $this->response->setContent($relayProcess.'  '.$audioProcess);
    }

}
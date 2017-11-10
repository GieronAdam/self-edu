<?php
namespace Raspberry\Model;

use Raspberry\Interfaces\IRaspberryExpander;
use Process\Process as Process;
use Zend\Log\Logger as Logger;
use Raspberry\Traits;
use Zend\Http\Client;



class RaspberryExpander implements IRaspberryExpander
{
    use Traits\CommandPreparerTrait;

    public $data;
    public $audioFile;
    public $pin;
    public $logger;
    public $status;

    public function _getRequest($data)
    {

        $this->logger = new Logger();
        $this->logger->addWriter('stream', null, array('stream' => 'php://output'));
        $this->logger->log(Logger::INFO, $this->pin);

       return $this->_setData($data);
    }

    /**
     * @return array
     */
    public function _setData($data)
    {
        $this->data = $data;
        $this->pin = $this->_prepRelayCommand(['pin' => $this->data[0]]);
        $this->audioFile = $this->_prepareAudioCommand($this->data[1]);
        return $this->data;
    }

    /**
     * @return string
     */
    public function _setAudioStatus()
    {
        return $this->status = $this->data[2];
    }

    public function _getAudioStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function _getresult()
    {
//        $result = $this->processRunner(new Process($this->audioFile));

        if ($this->_getAudioStatus() == 'status0'){
//            $this->processRunner(new Process('pkill mpg123'));
        } else {
//            $this->processRunner(new Process('pkill mpg123'));
        }
//        $this->processRunner(new Process());
//        $this->processRunner(new Process($this->audioFile));

        return ($this->pin);
    }

}
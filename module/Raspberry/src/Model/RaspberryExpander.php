<?php
namespace Raspberry\Model;

use Raspberry\Interfaces\IRaspberryExpander;
use Process\Process as Process;
use Process\ProcessBuilder;
use Zend\Log;
use Zend\Log\Logger as Logger;


class RaspberryExpander implements IRaspberryExpander
{
    public $str;
    public $data;
    public $temp = array();
    public $pin;
    public $logger;
    public $audioFile;
    public $status;

    public function _getRequest($data)
    {
        $this->logger = new Logger();
        $this->logger->addWriter('stream', null, array('stream' => 'php://output'));
        $this->logger->log(Logger::INFO, $this->pin);

       return $this->_setData($data);
    }

    /**
     * @return string
     */
    public function _prepRelayCommand()
    {
        $this->pin = explode(" ",$this->data[0]);
        $this->pin[2] = dechex(bindec($this->pin[2]));
        $this->pin[2] = str_pad($this->pin[2], 2, '0', STR_PAD_LEFT);
        $this->pin[2] = '0x'.$this->pin[2];
        $this->pin = implode(' ',$this->pin);
        $this->pin = 'i2cset -y 1 '.$this->pin;
        return $this->_prepareAudio();
    }

    public function _prepareAudio()
    {
        return $this->audioFile = 'mpg123 '.$this->data[1];
    }
    public function _setData($data)
    {
        $this->data = $data;
        $this->_prepRelayCommand();
        return $this->data;
    }


    public function _getresult()
    {



        return json_encode($this->pin.'      '.$this->audioFile);
    }

}
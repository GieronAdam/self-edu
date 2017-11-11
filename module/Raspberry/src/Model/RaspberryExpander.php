<?php
namespace Raspberry\Model;

use Raspberry\Interfaces\IRaspberryExpander;
use Process\Process as Process;
use Zend\Log\Logger as Logger;
use Raspberry\Traits;
use Zend\Http\Client;


/**
 * Class RaspberryExpander
 * @package Raspberry\Model
 */
class RaspberryExpander implements IRaspberryExpander
{
    use Traits\CommandPreparerTrait;

    /**
     * @var
     */
    public $data;
    /**
     * @var
     */
    public $audioFile;
    /**
     * @var
     */
    public $pin;
    /**
     * @var
     */
    public $logger;
    /**
     * @var
     */
    public $status;
    /**
     * @var int
     */
    public $ajaxArray = 2;
    /**
     * @var array
     */
    private $commands = array(
        'i2c'=>'i2cset -y 1 ',
        'audio'=>'mpg123 public/media/'
    );

    /**
     * @param $data
     */
    public function _getRequest($data)
    {

        $this->logger = new Logger();
        $this->logger->addWriter('stream', null, array('stream' => 'php://output'));
        $this->logger->log(Logger::INFO, $this->pin);
        $this->_setData($data);
    }

    /**
     * @param $data
     */
    public function _setData($data)
    {
        $this->data = $data;
        if($this->_dataCounter($this->data,$this->ajaxArray)){
            $this->pin = $this->_prepRelayCommand(['pin' => $this->data[0]],$this->_prepPrefix($this->commands,'i2c'));
            $this->audioFile = $this->_prepareAudioCommand($this->data[1],$this->_prepPrefix($this->commands,'audio'));
        } else {

            $this->audioFile = $this->_prepareAudioCommand($this->data[0],$this->_prepPrefix($this->commands,'audio'));
        }
        $this->_setAudioStatus();
    }

    /**
     * @return mixed
     */
    public function _setAudioStatus()
    {
        return $this->status = end($this->data);
    }

    /**
     * @return mixed
     */
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

            return $this->audioFile .'  ' . $this->_getAudioStatus() . '   ' . $this->pin;
        } else {
//            $this->processRunner(new Process('pkill mpg123'));
            return $this->audioFile .'  ' . $this->_getAudioStatus() . '   ' . $this->pin;
        }
//        $this->processRunner(new Process());
//        $this->processRunner(new Process($this->audioFile));
    }

}
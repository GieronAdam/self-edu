<?php

namespace Raspberry\Traits;
use Process\Process;

trait CommandPreparerTrait {

    /*
     * @params string
     * @return string
     */

    public function _prepRelayCommand($param, $prefix)
    {
        $pin = explode(" ", $param['pin']);
        $pin[2] = dechex(bindec($pin[2]));
        $pin[2] = str_pad($pin[2], 2, '0', STR_PAD_LEFT);
        $pin[2] = '0x' . $pin[2];
        $pin = implode(' ', $pin);
        $pin = $prefix . $pin;

        return $pin;
    }

    /**
     * @params string
     * @return string
     */
    public function _prepareAudioCommand($param,$prefix)
    {
        return $prefix.$param;
    }
    /*
     * @params array
     * @params int (counter)
     * @return bool
     */
    public function _dataCounter($array,$param)
    {
        if(count($array) > $param)
        {
            return true;
        }

        return false;
    }

    /*
     * @params array
     * @params string / int
     * @return array element
     */
    public function _prepPrefix($param,$name)
    {
        return $param[$name];
    }

    /*
     * @params Process object
     * @return string
     */
    public function processRunner(Process $process)
    {
        $process->mustRun();

        return $this->result = $process->getOutput();
    }

}

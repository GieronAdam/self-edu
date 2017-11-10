<?php

namespace Raspberry\Traits;
use Process\Process;

trait CommandPreparerTrait {

    /**
     * @param $param
     * @param $prefix
     * @return array|string
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

    /**
     * @param $array
     * @param $param
     * @return bool
     */
    public function _dataCounter($array, $param)
    {
        if(count($array) > $param)
        {
            return true;
        }

        return false;
    }

    /**
     * @param $param
     * @param $name
     * @return mixed
     */
    public function _prepPrefix($param, $name)
    {
        return $param[$name];
    }

    /**
     * @param Process $process
     * @return string
     */
    public function processRunner(Process $process)
    {
        $process->mustRun();

        return $this->result = $process->getOutput();
    }

}

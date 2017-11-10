<?php

namespace Raspberry\Traits;
use Process\Process;

trait CommandPreparerTrait {

    /*
     * @param string
     * return string
     */

    public function _prepRelayCommand($param)
    {
        $pin = explode(" ",$param);
        $pin[2] = dechex(bindec($pin[2]));
        $pin[2] = str_pad($pin[2], 2, '0', STR_PAD_LEFT);
        $pin[2] = '0x'.$pin[2];
        $pin = implode(' ',$pin);
        $pin = 'i2cset -y 1 '.$pin;
        return $pin;
    }

    /**
     * @param string
     * @return string
     */
    public function _prepareAudioCommand($param)
    {
        return 'mpg123 public/media/' .$param;
    }

    public function processRunner(Process $process)
    {
        $process->mustRun();
        return $this->result = $process->getOutput();
    }



}
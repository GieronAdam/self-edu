<?php

namespace Raspberry\Interfaces;

Interface IRaspberryExpander
{
    public function _getRequest($param);

    public function _setData($param);

    public function _setAudioStatus();

    public function _getAudioStatus();

    public function _getresult();

}
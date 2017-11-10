<?php

namespace Raspberry\Interfaces;

Interface IRaspberryExternalExpander
{
    /**
     * @param $param
     * @return mixed
     */
    public function setRequest($param);

    /**
     * @param $param
     * @return mixed
     */
    public function reciveRequest($param);

}
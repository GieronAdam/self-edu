<?php
Namespace Raspberry\Model;

use Zend\Form\Form as Form;

//$ docker run -e MYSQL_HOSTNAME=<db-ip> -e MYSQL_PORT=3306 -e MYSQL_USERNAME=<username> -e MYSQL_PASSWORD=<password> -e MYSQL_DBNAME=zend php-zendserver

class RaspberryForm extends Form
{
    public function __construct()
    {
        parent::__construct('submits');

    }

}
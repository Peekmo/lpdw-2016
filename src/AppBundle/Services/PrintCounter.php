<?php

namespace AppBundle\Services;

class PrintCounter
{
    private $number;

    private $logger;

    public function __construct($logger, $initialNumber)
    {
        $this->number = $initialNumber;
        $this->logger = $logger;
    }

    public function increase()
    {
        $this->logger->log(100, 'je suis entré dans increase');
        $this->number++;
    }

    public function getNumber()
    {
        return $this->number;
    }
}

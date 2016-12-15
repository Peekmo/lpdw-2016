<?php

namespace AppBundle\Services;

use Symfony\Bridge\Monolog\Logger;

/**
 * Service permettant d'afficher un compteur
 */
class PrintCounter
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @param Logger $logger
     * @param int    $initialNumber
     */
    public function __construct($logger, $initialNumber)
    {
        $this->number = $initialNumber;
        $this->logger = $logger;
    }

    /**
     * Augmente la valeur du compteur de 1
     */
    public function increase()
    {
        $this->logger->log(100, 'je suis entré dans increase');
        $this->number++;
    }

    public function setLogger($logger) {
      $this->logger = $logger;
    }

    /**
     * Retourne la valeur du compteur
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }
}

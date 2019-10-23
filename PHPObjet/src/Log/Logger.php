<?php

namespace Orsys\Log;

use Orsys\Writer\WriterInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;


class Logger implements LoggerInterface
{
    use LoggerTrait;
    
    protected $writer;
    
    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function log($level, $message, array $context = array()): void
    {
        $date = date('h:i:s d/m/Y');
        $message = "[$level] - $date - $message\n";
        $this->writer->write($message);
    }
}

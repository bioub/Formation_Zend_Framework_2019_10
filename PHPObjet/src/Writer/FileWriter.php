<?php

namespace Orsys\Writer;

class FileWriter implements WriterInterface
{
    protected $handle;

    public function __construct($path)
    {
        $this->handle = fopen($path, 'a');
    }
    
    public function write($msg)
    {
        fwrite($this->handle, $msg);
    }
    
    public function __destruct()
    {
        fclose($this->handle);
    }
}

<?php

namespace App\Logger;

class Logger implements LoggerInterface
{
    protected $logPath;

    public function __construct(string $logPath)
    {
        $this->logPath = $logPath;
    }

    public function log(string $message, string $type = 'error')
    {
        $fileLog =  $this->logPath . date('Y-m-d H:i:s');

        $message = $this->formatLog($message, $type);

        error_log($message, 3, $fileLog);
    }

    protected function formatLog($message, $type) : string
    {
        $type = 'Level: ' . strtoupper($type) . '. ';
        $message = $type . $message;

        return $message;
    }
}
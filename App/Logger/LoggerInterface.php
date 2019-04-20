<?php


namespace App\Logger;


interface LoggerInterface
{
    public function __construct(string $logPath);

    public function log(string $type, string $message);

}
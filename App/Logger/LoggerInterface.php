<?php


namespace App\Logger;


interface LoggerInterface
{
    public static function log($type, $message, $logPath);
}
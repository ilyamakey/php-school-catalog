<?php


namespace App\Logger;


class Logger implements LoggerInterface
{
    public static function log($type, $message, $logPath)
    {
        $fileName = date('Y-m-d H:i:s');
        $toFile = $logPath . $fileName;
        $message = self::formatLog($message, $type);

        error_log($message, 3, $toFile);

    }

    private static function formatLog($message, $type)
    {
        $type = 'Level: ' . strtoupper($type) . '. ';
        $message = $type . $message;

        return $message;

    }
}
<?php
namespace Infomodus\Dhllabel\Model\Src\Exception;

class DHLConnectionException extends \Exception
{
    /**
     * @param string $message
     */
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }
}

<?php

namespace FastElephant\EventHandler\Exception;

class EventHandlerException extends \RuntimeException
{
    public function __construct($code, $message, $previousException = NULL)
    {
        parent::__construct($message, $code, $previousException);
    }

    public function __toString()
    {
        return "Code: " . $this->getCode() . " Message: " . $this->getMessage();
    }
}



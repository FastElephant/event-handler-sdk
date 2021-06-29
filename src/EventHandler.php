<?php

namespace FastElephant\EventHandler;

use FastElephant\EventHandler\Config\Rule;
use FastElephant\EventHandler\Event\Handler;
use FastElephant\EventHandler\Exception\BusinessException;
use FastElephant\EventHandler\Exception\EventHandlerException;
use FastElephant\EventHandler\Exception\GrpcRequestException;
use FastElephant\EventHandler\Exception\UnknownException;
use Throwable;

class EventHandler
{
    /**
     * @var string
     */
    public $host = '';

    /**
     * @var int
     */
    public $businessId = 0;

    /**
     * 事件类型
     * @var int
     */
    public $eventId = 0;

    /**
     * EventHandler constructor.
     * @param $eventId
     */
    public function __construct($eventId = 0)
    {
        try {
            $this->host = config('event-handler.host');
            $this->businessId = intval(config('event-handler.business_id'));
        } catch (Throwable $e) {
            $this->host = '127.0.0.1:8284';
            $this->businessId = 100;
        }
        $this->eventId = intval($eventId);
    }

    /**
     * 规则实例
     * @return Rule
     */
    public function rule()
    {
        return new Rule($this);
    }

    /**
     * 事件实例
     * @return Handler
     */
    public function event()
    {
        return new Handler($this);
    }

    /**
     * @param $recv
     * @param $status
     * @param EventHandlerException|null $exception
     */
    public function checkResponse($recv, $status, EventHandlerException $exception = NULL)
    {
        if ($status->code != 0) {
            throw new GrpcRequestException($status->code, $status->details);
        }
        if ($recv->getError() == NULL) {
            return;
        }

        $code = $recv->getError()->getCode() ?? 0;
        $message = $recv->getError()->getMessage() ?? 'Internal Server Error.';

        if ($code == 0) {
            throw new UnknownException(500, $message);
        }

        if ($exception != NULL) {
            throw new $exception($code, $message);
        }

        throw new BusinessException($code, $message);
    }
}

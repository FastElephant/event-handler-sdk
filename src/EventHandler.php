<?php

namespace FastElephant\EventHandler;

use FastElephant\EventHandler\Config\Rule;
use FastElephant\EventHandler\Exception\BusinessException;
use FastElephant\EventHandler\Exception\EventHandlerException;
use FastElephant\EventHandler\Exception\GrpcRequestException;
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
     * 开放id
     * @var string
     */
    public $openId = '';

    /**
     * EventHandler constructor.
     * @param $eventId
     * @param string $openId
     */
    public function __construct($eventId, $openId = '')
    {
        try {
            $this->host = config('event-handler.host');
            $this->businessId = intval(config('event-handler.business_id'));
        } catch (Throwable $e) {
            $this->host = '127.0.0.1:9503';
            $this->businessId = 200000;
        }
        $this->eventId = intval($eventId);
        $this->openId = strval($openId);
    }

    /**
     * 获取配置规则实例
     * @return Rule
     */
    public function rule()
    {
        return new Rule($this);
    }

    /**
     *
     * @param $param
     */
    public function event($param)
    {
        if ($param === NULL) {
            throw new Exception\InvalidArgumentException(400, 'param不能为空');
        }
        if (is_array($param)) {
            $param = json_encode($param, JSON_UNESCAPED_UNICODE);
        }
        if (is_int($param)) {
            $param = strval($param);
        }
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

        if ($exception != NULL) {
            throw new $exception($recv->getError()->getCode(), $recv->getError()->getMessage());
        }

        throw new BusinessException($recv->getError()->getCode(), $recv->getError()->getMessage());
    }
}

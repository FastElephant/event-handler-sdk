<?php
/**
 * Date: 2021/6/25
 * Describe:
 */

namespace FastElephant\EventHandler\Event;

use Exception;
use FastElephant\EventHandler\EventHandler;
use FastElephant\EventHandler\Exception\GrpcRequestException;
use FastElephant\EventHandler\Exception\InvalidArgumentException;
use Grpc\ChannelCredentials;
use Grpc\Common\BaseRequest;
use Grpc\Event\DispatchRequest;
use Grpc\Event\HandlerClient;

class Handler
{
    /**
     * @var EventHandler
     */
    protected $eventHandler;

    /**
     * @var HandlerClient
     */
    protected $client;

    /**
     * Handler constructor.
     * @param EventHandler $eventHandler
     */
    public function __construct(EventHandler $eventHandler)
    {
        $this->eventHandler = $eventHandler;
        $this->client = new HandlerClient($this->eventHandler->host, ['credentials' => ChannelCredentials::createInsecure(), 'timeout' => 100]);
    }

    /**
     * 分发事件
     * @param $param
     */
    public function dispatch($param)
    {
        if ($param === NULL) {
            throw new InvalidArgumentException(400, 'param不能为空');
        }
        if (is_array($param)) {
            $param = json_encode($param, JSON_UNESCAPED_UNICODE);
        }
        if (is_int($param)) {
            $param = strval($param);
        }

        $baseRequest = new BaseRequest();
        $baseRequest->setEventId($this->eventHandler->eventId);
        $baseRequest->setBusinessId($this->eventHandler->businessId);

        $request = new DispatchRequest();
        $request->setBase($baseRequest);
        $request->setParam($param);

        try {
            list($recv, $status) = $this->client->dispatch($request)->wait();
        } catch (Exception $e) {
            throw new GrpcRequestException($e->getCode(), $e->getMessage());
        } finally {
            $this->client->close();
        }

        $this->eventHandler->checkResponse($recv, $status);
    }
}

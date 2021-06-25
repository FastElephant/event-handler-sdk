<?php
/**
 * Date: 2021/6/25
 * Describe:
 */

namespace FastElephant\EventHandler\Config;

use Exception;
use FastElephant\EventHandler\EventHandler;
use FastElephant\EventHandler\Exception\GrpcRequestException;
use Grpc\ChannelCredentials;
use Grpc\Common\BaseRequest;
use Grpc\Config\RuleClient;
use Grpc\Config\RuleDetail;

class Rule
{
    /**
     * @var EventHandler
     */
    protected $eventHandler;

    /**
     * @var RuleClient
     */
    protected $client;

    /**
     * Rule constructor.
     * @param EventHandler $eventHandler
     */
    public function __construct(EventHandler $eventHandler)
    {
        $this->eventHandler = $eventHandler;
        $this->client = new RuleClient($this->eventHandler->host, ['credentials' => ChannelCredentials::createInsecure()]);
    }

    /**
     * 获取规则详情
     * @return RuleDetail
     */
    public function detail()
    {
        $request = new BaseRequest();
        $request->setEventId($this->eventHandler->eventId);
        $request->setBusinessId($this->eventHandler->businessId);
        $request->setOpenId($this->eventHandler->openId);
        try {
            list($recv, $status) = $this->client->detail($request)->wait();
        } catch (Exception $e) {
            throw new GrpcRequestException($e->getCode(), $e->getMessage());
        }

        $this->eventHandler->checkResponse($recv, $status);
        return $recv->getDetail();
    }
}

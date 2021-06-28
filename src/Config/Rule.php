<?php
/**
 * Date: 2021/6/25
 * Describe:
 */

namespace FastElephant\EventHandler\Config;

use Exception;
use FastElephant\EventHandler\EventHandler;
use FastElephant\EventHandler\Exception\GrpcRequestException;
use FastElephant\EventHandler\Exception\InvalidArgumentException;
use Grpc\ChannelCredentials;
use Grpc\Common\BaseRequest;
use Grpc\Config\RuleClient;
use Grpc\Config\RuleDetail;
use Grpc\Config\RuleSaveRequest;

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

    /**
     * 保存规则
     * @param int $isOn
     * @param $value
     */
    public function save(int $isOn, $value)
    {
        if ($value === NULL) {
            throw new InvalidArgumentException(400, 'value不能为空');
        }
        if (is_array($value)) {
            $value = json_encode($value, JSON_UNESCAPED_UNICODE);
        }
        if (is_int($value)) {
            $value = strval($value);
        }

        $base = new BaseRequest();
        $base->setEventId($this->eventHandler->eventId);
        $base->setBusinessId($this->eventHandler->businessId);
        $base->setOpenId($this->eventHandler->openId);

        $detail = new RuleDetail();
        $detail->setIsOn($isOn);
        $detail->setValue($value);

        $request = new RuleSaveRequest();
        $request->setBase($base);
        $request->setDetail($detail);

        try {
            list($recv, $status) = $this->client->save($request)->wait();
        } catch (Exception $e) {
            throw new GrpcRequestException($e->getCode(), $e->getMessage());
        }

        $this->eventHandler->checkResponse($recv, $status);
    }
}

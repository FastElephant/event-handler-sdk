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
        $this->client = new RuleClient($this->eventHandler->host, ['credentials' => ChannelCredentials::createInsecure(), 'timeout' => 8000]);
    }

    /**
     * 获取规则详情
     * @param string $openId
     * @return array
     */
    public function detail(string $openId)
    {
        $request = new BaseRequest();
        $request->setEventId($this->eventHandler->eventId);
        $request->setBusinessId($this->eventHandler->businessId);
        $request->setOpenId($openId);
        try {
            list($recv, $status) = $this->client->detail($request)->wait();
        } catch (Exception $e) {
            throw new GrpcRequestException($e->getCode(), $e->getMessage());
        } finally {
            $this->client->close();
        }

        $this->eventHandler->checkResponse($recv, $status);

        $detail = $recv->getDetail();

        return [
            'is_on' => $detail->getIsOn(),
            'value' => $this->formatDetailValue($detail->getValue(), $detail->getValueFormat()),
        ];
    }

    /**
     * 保存规则
     * @param string $openId
     * @param int $isOn
     * @param $value
     */
    public function save(string $openId, int $isOn, $value)
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
        $base->setOpenId($openId);

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
        } finally {
            $this->client->close();
        }

        $this->eventHandler->checkResponse($recv, $status);
    }

    /**
     * @param $value
     * @param $format
     * @return mixed
     */
    private function formatDetailValue($value, $format)
    {
        if ($format == 'json') return json_decode($value, true);
        return $format == 'int' ? intval($value) : strval($value);
    }
}

<?php
/**
 * Date: 2021/8/2
 * Describe:
 */

namespace FastElephant\EventHandler\User;


use FastElephant\EventHandler\EventHandler;
use FastElephant\EventHandler\Exception\GrpcRequestException;
use Grpc\ChannelCredentials;
use Grpc\User\MerchantClient;
use Grpc\User\QueryBindRequest;

class Merchant
{
    /**
     * @var EventHandler
     */
    protected $eventHandler;

    /**
     * @var MerchantClient
     */
    protected $client;

    /**
     * Merchant constructor.
     * @param EventHandler $eventHandler
     */
    public function __construct(EventHandler $eventHandler)
    {
        $this->eventHandler = $eventHandler;
        $this->client = new MerchantClient($this->eventHandler->host, ['credentials' => ChannelCredentials::createInsecure(), 'timeout' => 8000]);
    }

    /**
     * @param string $phone
     * @return mixed
     */
    public function queryBind(string $phone)
    {
        $request = new QueryBindRequest();
        $request->setPhone($phone);
        try {
            list($recv, $status) = $this->client->queryBind($request)->wait();
        } catch (\Exception $e) {
            throw new GrpcRequestException($e->getCode(), $e->getMessage());
        } finally {
            $this->client->close();
        }

        $this->eventHandler->checkResponse($recv, $status);

        return json_decode($recv->getData(), true);
    }
}

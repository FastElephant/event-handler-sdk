<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc\User;

/**
 */
class MerchantClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Grpc\User\QueryBindRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function queryBind(\Grpc\User\QueryBindRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc.user.Merchant/queryBind',
        $argument,
        ['\Grpc\User\QueryBindResponse', 'decode'],
        $metadata, $options);
    }

}

<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc\Config;

/**
 */
class RuleClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Grpc\Config\RuleDetailRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function detail(\Grpc\Config\RuleDetailRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc.config.Rule/detail',
        $argument,
        ['\Grpc\Config\RuleDetailResponse', 'decode'],
        $metadata, $options);
    }

}

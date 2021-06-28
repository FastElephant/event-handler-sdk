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
     * @param \Grpc\Common\BaseRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function detail(\Grpc\Common\BaseRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc.config.Rule/detail',
        $argument,
        ['\Grpc\Config\RuleDetailResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Grpc\Config\RuleSaveRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function save(\Grpc\Config\RuleSaveRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc.config.Rule/save',
        $argument,
        ['\Grpc\Config\RuleSaveResponse', 'decode'],
        $metadata, $options);
    }

}

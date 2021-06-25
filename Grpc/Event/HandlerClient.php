<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc\Event;

/**
 */
class HandlerClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Grpc\Event\DispatchRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function dispatch(\Grpc\Event\DispatchRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/grpc.event.Handler/dispatch',
        $argument,
        ['\Grpc\Event\DispatchResponse', 'decode'],
        $metadata, $options);
    }

}

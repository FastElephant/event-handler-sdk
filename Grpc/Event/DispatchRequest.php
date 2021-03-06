<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: event.proto

namespace Grpc\Event;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>grpc.event.DispatchRequest</code>
 */
class DispatchRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.grpc.common.BaseRequest base = 1;</code>
     */
    protected $base = null;
    /**
     * Generated from protobuf field <code>string param = 2;</code>
     */
    protected $param = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Grpc\Common\BaseRequest $base
     *     @type string $param
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Event::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.grpc.common.BaseRequest base = 1;</code>
     * @return \Grpc\Common\BaseRequest
     */
    public function getBase()
    {
        return isset($this->base) ? $this->base : null;
    }

    public function hasBase()
    {
        return isset($this->base);
    }

    public function clearBase()
    {
        unset($this->base);
    }

    /**
     * Generated from protobuf field <code>.grpc.common.BaseRequest base = 1;</code>
     * @param \Grpc\Common\BaseRequest $var
     * @return $this
     */
    public function setBase($var)
    {
        GPBUtil::checkMessage($var, \Grpc\Common\BaseRequest::class);
        $this->base = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string param = 2;</code>
     * @return string
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * Generated from protobuf field <code>string param = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setParam($var)
    {
        GPBUtil::checkString($var, True);
        $this->param = $var;

        return $this;
    }

}


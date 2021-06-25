<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: event.proto

namespace Grpc\Event;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>grpc.event.DispatchResponse</code>
 */
class DispatchResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.grpc.common.Error error = 1;</code>
     */
    protected $error = null;
    /**
     * Generated from protobuf field <code>string msg_id = 2;</code>
     */
    protected $msg_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Grpc\Common\Error $error
     *     @type string $msg_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Event::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.grpc.common.Error error = 1;</code>
     * @return \Grpc\Common\Error
     */
    public function getError()
    {
        return isset($this->error) ? $this->error : null;
    }

    public function hasError()
    {
        return isset($this->error);
    }

    public function clearError()
    {
        unset($this->error);
    }

    /**
     * Generated from protobuf field <code>.grpc.common.Error error = 1;</code>
     * @param \Grpc\Common\Error $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \Grpc\Common\Error::class);
        $this->error = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string msg_id = 2;</code>
     * @return string
     */
    public function getMsgId()
    {
        return $this->msg_id;
    }

    /**
     * Generated from protobuf field <code>string msg_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setMsgId($var)
    {
        GPBUtil::checkString($var, True);
        $this->msg_id = $var;

        return $this;
    }

}

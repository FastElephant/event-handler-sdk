<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: merchant.proto

namespace Grpc\User;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>grpc.user.QueryBindResponse</code>
 */
class QueryBindResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.grpc.common.Error error = 1;</code>
     */
    protected $error = null;
    /**
     * Generated from protobuf field <code>string data = 2;</code>
     */
    protected $data = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Grpc\Common\Error $error
     *     @type string $data
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Merchant::initOnce();
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
     * Generated from protobuf field <code>string data = 2;</code>
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Generated from protobuf field <code>string data = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setData($var)
    {
        GPBUtil::checkString($var, True);
        $this->data = $var;

        return $this;
    }

}

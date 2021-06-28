<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rule.proto

namespace Grpc\Config;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>grpc.config.RuleSaveResponse</code>
 */
class RuleSaveResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.grpc.common.Error error = 1;</code>
     */
    protected $error = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Grpc\Common\Error $error
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rule::initOnce();
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

}


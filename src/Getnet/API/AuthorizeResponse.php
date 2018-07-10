<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 20:29
 */

namespace Getnet\API;


/**
 * Class AuthorizeResponse
 * @package Getnet\API
 */
class AuthorizeResponse extends BaseResponse
{
    /**
     * @var
     */
    protected $delayed;
    /**
     * @var
     */
    protected $authorization_code;
    /**
     * @var
     */
    protected $authorized_at;
    /**
     * @var
     */
    protected $reason_code;
    /**
     * @var
     */
    protected $reason_message;
    /**
     * @var
     */
    protected $acquirer;
    /**
     * @var
     */
    protected $soft_descriptor;
    /**
     * @var
     */
    protected $brand;
    /**
     * @var
     */
    protected $terminal_nsu;
    /**
     * @var
     */
    protected $acquirer_transaction_id;

    /**
     * @return mixed
     */
    public function getDelayed()
    {
        return $this->delayed;
    }

    /**
     * @param mixed $delayed
     * @return AuthorizeResponse
     */
    public function setDelayed($delayed)
    {
        $this->delayed = $delayed;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorization_code;
    }

    /**
     * @param mixed $authorization_code
     * @return AuthorizeResponse
     */
    public function setAuthorizationCode($authorization_code)
    {
        $this->authorization_code = $authorization_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizedAt()
    {
        return $this->authorized_at;
    }

    /**
     * @param mixed $authorized_at
     * @return AuthorizeResponse
     */
    public function setAuthorizedAt($authorized_at)
    {
        $this->authorized_at = $authorized_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reason_code;
    }

    /**
     * @param mixed $reason_code
     * @return AuthorizeResponse
     */
    public function setReasonCode($reason_code)
    {
        $this->reason_code = $reason_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReasonMessage()
    {
        return $this->reason_message;
    }

    /**
     * @param mixed $reason_message
     * @return AuthorizeResponse
     */
    public function setReasonMessage($reason_message)
    {
        $this->reason_message = $reason_message;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcquirer()
    {
        return $this->acquirer;
    }

    /**
     * @param mixed $acquirer
     * @return AuthorizeResponse
     */
    public function setAcquirer($acquirer)
    {
        $this->acquirer = $acquirer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSoftDescriptor()
    {
        return $this->soft_descriptor;
    }

    /**
     * @param mixed $soft_descriptor
     * @return AuthorizeResponse
     */
    public function setSoftDescriptor($soft_descriptor)
    {
        $this->soft_descriptor = $soft_descriptor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     * @return AuthorizeResponse
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTerminalNsu()
    {
        return $this->terminal_nsu;
    }

    /**
     * @param mixed $terminal_nsu
     * @return AuthorizeResponse
     */
    public function setTerminalNsu($terminal_nsu)
    {
        $this->terminal_nsu = $terminal_nsu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAcquirerTransactionId()
    {
        return $this->acquirer_transaction_id;
    }

    /**
     * @param mixed $acquirer_transaction_id
     * @return AuthorizeResponse
     */
    public function setAcquirerTransactionId($acquirer_transaction_id)
    {
        $this->acquirer_transaction_id = $acquirer_transaction_id;

        return $this;
    }

}



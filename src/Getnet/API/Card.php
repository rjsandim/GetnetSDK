<?php
namespace Getnet\API;
    /**
     * Created by PhpStorm.
     * User: brunopaz
     * Date: 09/07/2018
     * Time: 01:46
     */

/**
 * Class Card
 * @package Getnet\API
 */
class Card implements \JsonSerializable
{
    /**
     * @var
     */
    private $brand;
    /**
     * @var
     */
    private $cardholder_name;
    /**
     * @var
     */
    private $expiration_month;
    /**
     * @var
     */
    private $expiration_year;
    /**
     * @var
     */
    private $number_token;
    /**
     * @var
     */
    private $security_code;


    /**
     * Card constructor.
     * @param Token $card
     */
    public function __construct(Token $card)
    {
        $this->setNumberToken($card);
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->security_code;
    }

    /**
     * @param mixed $security_code
     * @return Card
     */
    public function setSecurityCode($security_code)
    {
        $this->security_code = $security_code;

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
     * @return Card
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardholderName()
    {
        return $this->cardholder_name;
    }

    /**
     * @param mixed $cardholder_name
     * @return Card
     */
    public function setCardholderName($cardholder_name)
    {
        $this->cardholder_name = $cardholder_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth()
    {
        return $this->expiration_month;
    }

    /**
     * @param mixed $expiration_month
     * @return Card
     */
    public function setExpirationMonth($expiration_month)
    {
        $this->expiration_month = $expiration_month;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear()
    {
        return $this->expiration_year;
    }

    /**
     * @param mixed $expiration_year
     * @return Card
     */
    public function setExpirationYear($expiration_year)
    {
        $this->expiration_year = $expiration_year;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberToken()
    {
        return $this->number_token;
    }


    /**
     * @param Token $token
     * @return $this
     */
    public function setNumberToken(Token $token)
    {
        $this->number_token = $token->getNumberToken();

        return $this;
    }


}
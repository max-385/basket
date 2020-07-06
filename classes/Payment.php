<?php


namespace classes;


class Payment
{
    public $paymentMethod;
    public $cardType;
    public $cardOwner;
    public $cardNum;
    public $cardExpiry;
    public $cardCVV;

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param mixed $cardType
     */
    public function setCardType($cardType)
    {
        $this->cardType = $cardType;
    }

    /**
     * @return mixed
     */
    public function getCardOwner()
    {
        return $this->cardOwner;
    }

    /**
     * @param mixed $cardOwner
     */
    public function setCardOwner($cardOwner)
    {
        $this->cardOwner = $cardOwner;
    }

    /**
     * @return mixed
     */
    public function getCardNum()
    {
        return $this->cardNum;
    }

    /**
     * @param mixed $cardNum
     */
    public function setCardNum($cardNum)
    {
        $this->cardNum = $cardNum;
    }

    /**
     * @return mixed
     */
    public function getCardExpiry()
    {
        return $this->cardExpiry;
    }

    /**
     * @param mixed $cardExpiry
     */
    public function setCardExpiry($cardExpiry)
    {
        $this->cardExpiry = $cardExpiry;
    }

    /**
     * @return mixed
     */
    public function getCardCVV()
    {
        return $this->cardCVV;
    }

    /**
     * @param mixed $cardCVV
     */
    public function setCardCVV($cardCVV)
    {
        $this->cardCVV = $cardCVV;
    }

}
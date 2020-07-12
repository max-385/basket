<?php


namespace classes;


class Payment
{
    private $paymentMethod;
    private $cardType;
    private $cardOwner;
    private $cardNum;
    private $cardExpiry;
    private $cardCVV;
    private $paid = false;

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
    public function getCardNum(): int
    {
        return $this->cardNum;
    }

    /**
     * @param mixed $cardNum
     */
    public function setCardNum(int $cardNum)
    {
        $this->cardNum = $cardNum;
    }

    /**
     * @return mixed
     */
    public function getCardExpiry(): int
    {
        return $this->cardExpiry;
    }

    /**
     * @param mixed $cardExpiry
     */
    public function setCardExpiry(int $cardExpiry)
    {
        $this->cardExpiry = $cardExpiry;
    }

    /**
     * @return mixed
     */
    public function getCardCVV(): int
    {
        return $this->cardCVV;
    }

    /**
     * @param mixed $cardCVV
     */
    public function setCardCVV(int $cardCVV)
    {
        $this->cardCVV = $cardCVV;
    }

    /**
     * @return bool
     */
    public function isPaid(): bool
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     */
    public function setPaid(bool $paid)
    {
        $this->paid = $paid;
    }


}
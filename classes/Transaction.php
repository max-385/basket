<?php


namespace classes;


class Transaction
{
    private $basket;
    private $payment;
    private $contacts;

    public function __construct(Basket $basket, Payment $payment, $contacts)
    {
        $this->setBasket($basket);
        $this->setPayment($payment);
        $this->setContacts($contacts);
    }

    /**
     * @return mixed
     */
    public function getBasket()
    {
        return $this->basket;
    }

    /**
     * @param mixed $basket
     */
    public function setBasket($basket)
    {
        $this->basket = $basket;
    }

    /**
     * @return mixed
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param mixed $payment
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

}
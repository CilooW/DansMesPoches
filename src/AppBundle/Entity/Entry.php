<?php

namespace AppBundle\Entity;

/**
 * Entry
 */
class Entry
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var bool
     */
    private $isFixed;

    /**
     * @var bool
     */
    private $isSpending;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Entry
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Entry
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set isFixed
     *
     * @param boolean $isFixed
     *
     * @return Entry
     */
    public function setIsFixed($isFixed)
    {
        $this->isFixed = $isFixed;

        return $this;
    }

    /**
     * Get isFixed
     *
     * @return bool
     */
    public function isFixed()
    {
        return $this->isFixed;
    }

    /**
     * Set isEntry
     *
     * @param boolean $isEntry
     *
     * @return Entry
     */
    public function setIsSpending($isSpending)
    {
        $this->isFixed = $isSpending;

        return $this;
    }

    /**
     * Get isFixed
     *
     * @return bool
     */
    public function isSpending()
    {
        return $this->isSpending;
    }
    /**
     * @var \AppBundle\Entity\User
     */
    private $user;


    /**
     * Get isFixed
     *
     * @return boolean
     */
    public function getIsFixed()
    {
        return $this->isFixed;
    }

    /**
     * Get isSpending
     *
     * @return boolean
     */
    public function getIsSpending()
    {
        return $this->isSpending;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Entry
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

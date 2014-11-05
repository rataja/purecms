<?php

namespace Rataja\Purecms\Utils;

class Counter
{

    private $counter;

    /**
     * 
     * @param int Default value is zero
     */
    public function __construct($initValue = 0)
    {
	$this->set($initValue);
    }

    /**
     * Set counter to initial value. If initial value is not set, default is zero
     * @param int default value is zero
     */
    public function set($initValue = 0)
    {
	$this->counter = intval($initValue);
    }

    /**
     * @return Actual value of the counter
     */
    public function getCounter()
    {
	return $this->counter;
    }

    /**
     * Set counter + 1
     */
    public function increment()
    {
	$this->counter++;
    }

    /**
     * Set counter - 1
     */
    public function decrement()
    {
	$this->counter--;
    }

    /**
     * Check if counter is even
     * @return boolean
     */
    public function isEven()
    {
	return $this->counter % 2 == 0 ? true : false;
    }

    /**
     * Check if counter is odd
     * @return boolean
     */
    public function isOdd()
    {
	return $this->counter % 2 != 0 ? true : false;
    }

}

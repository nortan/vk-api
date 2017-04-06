<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 13:52
 */

namespace ZxCoder\Methods\Stat\Objects;

use ZxCoder\JsonSerializable;
use ZxCoder\RawArrayInterface;
use ZxCoder\RawArrayObjectTrait;

class StatPeriod implements \JsonSerializable, RawArrayInterface
{
    use JsonSerializable;
    use RawArrayObjectTrait;

    /** @var  string */
    private $day;
    /** @var  int */
    private $views;
    /** @var  int */
    private $visitors;
    /** @var  int Total reach */
    private $reach;
    /** @var  int Subscribers reach */
    private $reach_subscribers;
    /** @var  int Number of users subscribed */
    private $subscribed;
    /** @var  int Number of users unsubscribed */
    private $unsubscribed;
    /** @var  array */
    private $sex;
    /** @var  array */
    private $age;
    /** @var  array */
    private $sex_age;
    /** @var  array */
    private $cities;
    /** @var  array */
    private $countries;

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @return int
     */
    public function getVisitors()
    {
        return $this->visitors;
    }

    /**
     * @return int
     */
    public function getReach()
    {
        return $this->reach;
    }

    /**
     * @return int
     */
    public function getReachSubscribers()
    {
        return $this->reach_subscribers;
    }

    /**
     * @return int
     */
    public function getSubscribed()
    {
        return $this->subscribed;
    }

    /**
     * @return int
     */
    public function getUnsubscribed()
    {
        return $this->unsubscribed;
    }

    /**
     * @return array
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return array
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return array
     */
    public function getSexAge()
    {
        return $this->sex_age;
    }

    /**
     * @return array
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @return array
     */
    public function getCountries()
    {
        return $this->countries;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 13:52
 */

namespace ZxCoder\Methods\Stats\Response;

use VK\VKException;
use ZxCoder\Methods\Stats\Object\StatPeriod;
use ZxCoder\RawArrayInterface;

class GetResponse implements \JsonSerializable, RawArrayInterface
{
    /** @var  StatPeriod[] */
    private $statPeriods = [];

    public function jsonSerialize()
    {
        return $this->statPeriods;
    }

    /**
     * Response constructor.
     * @param array $statPeriods
     */
    public function __construct(array $statPeriods = [])
    {
        $this->statPeriods = $statPeriods;
    }

    public static function fromRawArray(array $raw)
    {
        $result = [];

        foreach ($raw['response'] as $item) {
            $result[] = StatPeriod::fromRawArray($item);
        }

        return new self($result);
    }

    /**
     * @return StatPeriod[]
     */
    public function getStatPeriods()
    {
        return $this->statPeriods;
    }
}
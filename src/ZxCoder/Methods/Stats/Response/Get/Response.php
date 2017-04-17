<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 13:52
 */

namespace ZxCoder\Methods\Stats\Response\Get;

use VK\VKException;
use ZxCoder\Methods\Stats\Object\StatPeriod;
use ZxCoder\RawArrayInterface;

class Response implements \JsonSerializable, RawArrayInterface
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
        if (isset($raw['error'])) {
            throw new VKException('API ERROR: ' . $raw['error']['error_msg']);
        } else if (!isset($raw['response'])) {
            throw new VKException('Wrong response');
        }

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
<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 13:52
 */

namespace ZxCoder\Methods\Stat\Responses\Get;

use VK\VKException;
use ZxCoder\Methods\Stat\Objects\StatPeriod;
use ZxCoder\RawArrayInterface;

class Response implements \JsonSerializable, RawArrayInterface
{
    /** @var  StatPeriod[] */
    private $statPeriods = [];

    public function jsonSerialize()
    {
        return $this->statPeriods;
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

        return $result;
    }

    /**
     * @return StatPeriod[]
     */
    public function getStatPeriods()
    {
        return $this->statPeriods;
    }
}
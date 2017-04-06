<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 11:36
 */

namespace ZxCoder;

use VK\VK;

abstract class Method
{
    /**
     * @var VK $vk
     */
    private $vk;

    public function __construct(VK $vk)
    {
        $this->vk = $vk;
    }

    /**
     * @return VK
     */
    public function getVk()
    {
        return $this->vk;
    }

    /**
     * @param VK $vk
     */
    public function setVk($vk)
    {
        $this->vk = $vk;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 11:36
 */

namespace ZxCoder;

use VK\VK;
use VK\VKException;

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
    public function setVk(VK $vk)
    {
        $this->vk = $vk;
    }

    /**
     * @param array $response
     *
     * @throws VKException
     */
    public function checkResponse(array $response)
    {
        if (isset($response['error'])) {
            throw new VKException('API ERROR: ' . $response['error']['error_msg']);
        } else if (!isset($response['response'])) {
            throw new VKException('Wrong response');
        }
    }
}
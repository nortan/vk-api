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
    const VERSION = '5.52';
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
			VKException::create($response, 'API ERROR: ' . $response['error']['error_msg']);
        } else if (!isset($response['response'])) {
			VKException::create($response, 'Wrong response');
        }
    }

    public function api($method, array $parameters)
    {
        $parameters['v'] = self::VERSION;
        return $this->getVk()->api($method, $parameters);
    }
}
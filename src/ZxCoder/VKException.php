<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 20.04.17
 * Time: 14:29
 */

namespace ZxCoder;

class VKException extends VK\VKException
{
	private $_rawResponse;

	public static function create($response, $message = '', $code = 0, \Exception $previous = null)
	{
		throw new self($response, $message, $code, $previous);
	}

	public function __construct($response, $message = '', $code = 0, \Exception $previous = null)
	{
		$this->_rawResponse = $response;
		parent::__construct($message, $code, $previous);
	}

	public function getRawResponse()
	{
		return $this->_rawResponse;
	}
}
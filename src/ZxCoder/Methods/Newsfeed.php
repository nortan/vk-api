<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 17.04.17
 * Time: 14:23
 */

namespace ZxCoder\Methods;

use VK\VKException;
use ZxCoder\Method;
use ZxCoder\Methods\Newsfeed\Filter\GetFilter;

class Newsfeed extends Method
{
	public function get(
		GetFilter $filter,
		\DateTime $startTime,
		\DateTime $endTime,
		$startFrom,
		array $sourceIds = [],
		$maxPhotos = 0,
		array $fields = [],
		$count = 100,
		$return_banned = true)
	{
		$data = [
			'filters'       => $filter->getFilterValue(),
			'return_banned' => (int)$return_banned,
			'start_time'    => $startTime->format('U'),
			'end_time'      => $endTime->format('U'),
			'max_photos'    => $maxPhotos,
			'source_ids'    => implode(',', $sourceIds),
			'count'         => (int)$count,
			'fields'        => implode(',', $fields),
		];

		if ($startFrom) {
			$data['from'] = $startFrom;
		}

		$response =  $this->getVk()
			->api('newsfeed.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
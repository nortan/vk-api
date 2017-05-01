<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zx-coder
 * Date: 18.04.17
 * Time: 1:00
 * To change this template use File | Settings | File Templates.
 */

namespace ZxCoder\Methods;

use ZxCoder\Method;

class Groups extends Method
{
	public function get(
		$count,
		$offset,
		array $fields = [],
		array $filter = [],
		$userId = null,
		$extended = 1
	)
	{
		$data = [
			'count'    => $count,
			'offset'   => $offset,
			'extended' => $extended
		];

		if ($userId) {
			$data['user_id'] = $userId;
		}

		if ($fields) {
			$data['fields'] = implode(',' , $fields);
		}

		if ($filter) {
			$data['filter'] = implode(',', $filter);
		}

		$response =  $this
			->api('groups.get', $data);

		$this->checkResponse($response);

		return $response;
	}

	public function getById(
		$groupId,
		array $groupIds = [],
		array $fields = []
	)
	{
		$data = [];

		if ($groupId) {
			$data['group_id'] = (int)$groupId;
		}

		if ($groupIds) {
			$data['group_ids'] = implode(',', $groupIds);
		}

		if ($fields) {
			$data['fields'] = implode(',', $fields);
		}

		$response =  $this
			->api('groups.getById', $data);

		$this->checkResponse($response);

		return $response;

	}
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zx-coder
 * Date: 18.04.17
 * Time: 0:59
 * To change this template use File | Settings | File Templates.
 */

namespace ZxCoder\Methods;

use ZxCoder\Method;

class Photos extends Method
{
	public function get(
		$count,
		$offset,
		$ownerId = null,
		$albumId = null,
		$photoIds = [],
		$rev = 0,
		$extended = 1
	)
	{
		$data = [
			'count'    => (int)$count,
			'offset'   => (int)$offset,
			'rev'      => (int)$rev,
			'extended' => (int)$extended,
		];
		
		if ($ownerId) {
			$data['owner_id'] = (int)$ownerId;
		}
		
		if ($albumId) {
			$data['album_id'] = $albumId;
		}
		
		if ($photoIds) {
			$data['photo_ids'] = implode(',', $photoIds);
		}
		
		$response =  $this
			->api('photos.get', $data);
		
		$this->checkResponse($response);
		
		return $response;
	}

	public function getAlbums(
		$count,
		$offset,
		$ownerId = null,
		$albumIds = []
	)
	{
		$data = [
			'count'    => (int)$count,
			'offset'   => (int)$offset,
		];

		if ($ownerId) {
			$data['owner_id'] = (int)$ownerId;
		}

		if ($albumIds) {
			$data['album_id'] = implode(',', $albumIds);
		}

		$response =  $this
			->api('photos.getAlbums', $data);

		$this->checkResponse($response);

		return $response;
	}
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zx-coder
 * Date: 18.04.17
 * Time: 0:57
 * To change this template use File | Settings | File Templates.
 */

namespace ZxCoder\Methods;

use ZxCoder\Method;

class Video extends Method
{
    public function get(
        $count,
        $offset,
        $ownerId = null,
        $albumId = null,
        array $videos = [],
        $extended = 1
    )
    {
        $data = [
            'owner_id' => $ownerId,
            'count'    => $count,
            'offset'   => $offset,
            'extended' => $extended
        ];

        if ($albumId) {
            $data['album_id'] = $albumId;
        }

        if ($ownerId) {
            $data['owner_id'] = $ownerId;
        }

        if ($videos) {
            $data['videos'] = implode(',', $videos);
        }

        $response =  $this
            ->api('video.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
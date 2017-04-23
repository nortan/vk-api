<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zx-coder
 * Date: 18.04.17
 * Time: 0:58
 * To change this template use File | Settings | File Templates.
 */

namespace ZxCoder\Methods;

use ZxCoder\Method;

class Docs extends Method
{
    CONST TYPE_NOTHING = 0;
    CONST TYPE_TXT     = 1;
    CONST TYPE_ARCH    = 2;
    CONST TYPE_GIF     = 3;
    CONST TYPE_IMAGE   = 4;
    CONST TYPE_AUDIO   = 5;
    CONST TYPE_VIDEO   = 6;
    CONST TYPE_BOOKS   = 7;
    CONST TYPE_UNKNOWN = 8;

    public function get(
        $count,
        $offset,
        $ownerId = null,
        $type = self::TYPE_NOTHING
    )
    {
        $data = [
            'count'    => (int)$count,
            'offset'   => (int)$offset,
            'type'     => (int)$type
        ];

        if ($ownerId) {
            $data['owner_id'] = (int)$ownerId;
        }

        $response =  $this->getVk()
            ->api('docs.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
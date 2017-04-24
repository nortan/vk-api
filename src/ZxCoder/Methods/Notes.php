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

class Notes extends Method
{
    CONST SORT_DATE_DESC = 0;
    CONST SORT_DATE_ASC  = 1;

    public function get(
        $count,
        $offset,
        $userId = null,
        array $noteIds = [],
        $sort = self::SORT_DATE_DESC
    )
    {
        $data = [
            'count'    => (int)$count,
            'offset'   => (int)$offset,
            'sort'     => (int)$sort
        ];

        if ($userId) {
            $data['user_id'] = (int)$userId;
        }

        if ($noteIds) {
            $data['note_ids'] = implode(',', $noteIds);
        }

        $response =  $this
            ->api('notes.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
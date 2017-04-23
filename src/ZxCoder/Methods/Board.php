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

class Board extends Method
{
    public function getComments(
        $groupId,
        $topicId,
        $startCommentId,
        $count,
        $offset,
        $extended = 1,
        $sort = 'asc',
        $needLikes = 1
    )
    {
        $data = [
            'group_id'         => (int)$groupId,
            'topic_id'         => (int)$topicId,
            'start_comment_id' => (int)$startCommentId,
            'count'            => (int)$count,
            'offset'           => (int)$offset,
            'sort'             => $sort,
            'need_likes'       => (int)$needLikes,
            'extended'         => (int)$extended,
        ];

        $response =  $this->getVk()
            ->api('board.getComments', $data);

        $this->checkResponse($response);

        return $response;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 17.04.17
 * Time: 14:24
 */

namespace ZxCoder\Methods;

use ZxCoder\Method;

class Wall extends Method
{
    public function get(
        $count,
        $offset,
        $filter = null,
        $ownerId = null,
        $domain = null,
        array $fields = [],
        $extended = 1
    )
    {
        $data = [
            'count'    => (int)$count,
            'offset'   => (int)$offset,
            'extended' => (int)$extended
        ];

        if ($filter) {
            $data['filter'] = $filter;
        }

        if ($ownerId) {
            $data['owner_id'] = (int)$ownerId;
        }

        if ($domain) {
            $data['domain'] = $domain;
        }

        if ($fields) {
            $data['fields'] = implode(',', $fields);
        }

        $response =  $this
            ->api('wall.get', $data);

        $this->checkResponse($response);

        return $response;
    }

    public function getComments(
        $ownerId,
        $postId,
        $startCommentId,
        $count,
        $offset,
        $fields = [],
        $previewLength = 0,
        $extended = 1,
        $sort = 'asc',
        $needLikes = 1
    )
    {
        $data = [
            'owner_id'         => (int)$ownerId,
            'post_id'          => (int)$postId,
            'start_comment_id' => (int)$startCommentId,
            'count'            => (int)$count,
            'offset'           => (int)$offset,
            'sort'             => $sort,
            'preview_length'   => (int)$previewLength,
            'need_likes'       => (int)$needLikes,
            'extended'         => (int)$extended,
        ];

        if ($fields) {
            $data['fields'] = implode(',', $fields);
        }

        $response =  $this
            ->api('wall.getComments', $data);

        $this->checkResponse($response);

        return $response;
    }
}
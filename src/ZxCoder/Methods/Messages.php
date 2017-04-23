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

class Messages extends Method
{
    public function get(
        $out,
        $count,
        $offset,
        $timeOffset,
        $filters,
        $previewLength,
        $lastMessageId
    )
    {
        $data = [
            'out'             => (int)$out,
            'count'           => (int)$count,
            'offset'          => (int)$offset,
            'time_offset'     => (int)$timeOffset,
            'preview_length'  => (int)$previewLength,
            'last_message_id' => (int)$lastMessageId,
        ];

        if ($filters) {
            $data['filters'] = $filters;
        }

        $response =  $this->getVk()
            ->api('messages.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
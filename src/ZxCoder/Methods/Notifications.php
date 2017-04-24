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

class Notifications extends Method
{
    public function get(
        $count,
        $startFrom,
        array $filters = [],
        \DateTime $startTime = null,
        \DateTime $endTime   = null
    )
    {
        $data = [
            'count'      => $count,
            'start_from' => $startFrom,
        ];

        if ($filters) {
            $data['filters'] = implode(',', $filters);
        }

        if ($startTime) {
            $data['start_time'] =  $startTime->format('U');
        }

        if ($endTime) {
            $data['end_time'] = $endTime->format('U');
        }

        $response =  $this
            ->api('notifications.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
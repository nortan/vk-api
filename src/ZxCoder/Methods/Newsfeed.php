<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 17.04.17
 * Time: 14:23
 */

namespace ZxCoder\Methods;

use ZxCoder\Method;
use ZxCoder\Methods\Newsfeed\Filter\GetFilter;

class Newsfeed extends Method
{
    public function get(
        GetFilter $filter,
        \DateTime $startTime,
        \DateTime $endTime,
        $maxPhotos,
        $startFrom,
        $sourceIds,
        $fields,
        $count = 100,
        $return_banned = true)
    {
        $response =  $this->getVk()
            ->api('newsfeed.get',
                [
                    'filters'       => $filter->getFilterValue(),
                    'return_banned' => (int) $return_banned,
                    'start_time'    => $startTime->format('U'),
                    'end_time'      => $endTime->format('U'),
                    'max_photos'    => $maxPhotos,
                    'source_ids',
                    'start_from'    => (int)$startFrom,
                    'count'         => (int)$count,
                    'fields'        => []
                ]
            );

        return Response::fromRawArray($response);
    }
}
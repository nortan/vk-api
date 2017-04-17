<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 17.04.17
 * Time: 14:23
 */

namespace ZxCoder\Methods;

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
                    'filters',
                    'return_banned' = ,
                    'start_time',
                    'end_time',
                    'max_photos',
                    'source_ids',
                    'start_from',
                    'count',
                    'fields' = []
                ]
            );

        return Response::fromRawArray($response);
    }
}
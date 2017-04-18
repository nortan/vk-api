<?php

/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 11:39
 */

namespace ZxCoder\Methods;

use ZxCoder\Method;

use ZxCoder\Methods\Stats\Response\GetResponse;
use ZxCoder\Methods\Stats\Response\GetPostReachResponse;

class Stats extends Method
{
    /**
     * Returns statistics of a community or an application.
     *
     * @param \DateTime $dateFrom - Latest date of statistics to return.
     * @param \DateTime $dateTo   - End date of statistics to return.
     * @param integer   $groupId  - Community ID
     *
     * @return GetResponse
     */
    public function get(\DateTime $dateFrom, \DateTime $dateTo, $groupId)
    {
        $response =  $this->getVk()
            ->api('stats.get',
                [
                    'group_id'  => (int)$groupId,
                    'date_from' => $dateFrom->format('Y-m-d'),
                    'date_to'   => $dateTo->format('Y-m-d'),
                ]
            );

        return GetResponse::fromRawArray($response);
    }

    public function trackVisitor()
    {
        throw new \Exception('Method not realized');
    }

    public function getPostReach($postId, $ownerId = -1)
    {
        $response =  $this->getVk()
            ->api('stats.getPostReach',
                [
                    'owner_id' => (int)$ownerId,
                    'post_id'  => (int)$postId,
                ]
            );

        return GetPostReachResponse::fromRawArray($response);
    }
}
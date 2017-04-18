<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zx-coder
 * Date: 18.04.17
 * Time: 1:35
 * To change this template use File | Settings | File Templates.
 */

namespace ZxCoder\Methods\Stats\Response;

use ZxCoder\JsonSerializable;
use ZxCoder\RawArrayInterface;
use ZxCoder\RawArrayObjectTrait;

class GetPostReachResponse implements \JsonSerializable, RawArrayInterface
{
    use JsonSerializable;
    use RawArrayObjectTrait;

    /** @var integer охват подписчиков  */
    private $reach_subscribers;
    /** @var integer суммарный охват */
    private $reach_total;
    /** @var integer	рекламный охват (если запись продвигалась с помощью таргетированной рекламы) */
    private $reach_ads;
    /** @var integer	виральный охват (если запись продвигалась с помощью таргетированной рекламы) */
    private $reach_viral;
    /** @var integer	переходы по ссылке. */
    private $links;
    /** @var integer	переходы в сообщество */
    private $to_group;
    /** @var integer	вступления в сообщество. */
    private $join_group;
    /** @var integer	количество жалоб на запись. */
    private $report;
    /** @var integer	количество скрывших запись. */
    private $hide;
    /** @var integer	количество отписавшихся участников. */
    private $unsubscribe;

    /**
     * @return int
     */
    public function getHide()
    {
        return $this->hide;
    }

    /**
     * @return int
     */
    public function getJoinGroup()
    {
        return $this->join_group;
    }

    /**
     * @return int
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @return int
     */
    public function getReachAds()
    {
        return $this->reach_ads;
    }

    /**
     * @return int
     */
    public function getReachSubscribers()
    {
        return $this->reach_subscribers;
    }

    /**
     * @return int
     */
    public function getReachTotal()
    {
        return $this->reach_total;
    }

    /**
     * @return int
     */
    public function getReachViral()
    {
        return $this->reach_viral;
    }

    /**
     * @return int
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @return int
     */
    public function getToGroup()
    {
        return $this->to_group;
    }

    /**
     * @return int
     */
    public function getUnsubscribe()
    {
        return $this->unsubscribe;
    }
}
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

class Pages extends Method
{
    public function get(
        $ownerId,
        $pageId,
        $title,
        $sitePreview = 1,
        $global = 1,
        $needSource = 0,
        $needHtml = 1
    )
    {
        $data = [
            'owner_id'     => (int)$ownerId,
            'page_id'      => (int)$pageId,
            'global'       => (int)$global,
            'site_preview' => (int)$sitePreview,
            'title'        => $title,
            'need_source'  => (int)$needSource,
            'need_html'    => (int)$needHtml,
        ];

        $response =  $this
            ->api('pages.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
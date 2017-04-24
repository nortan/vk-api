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

class Users extends Method
{
    public function get(
        array $fields = [],
        array $userIds = [],
        $nameCase = 'nom'
    )
    {
        $data = [
            'name_case' => $nameCase,
        ];

        if ($fields) {
           $data['fields'] = implode(',', $fields);
        }

        if ($userIds) {
            $data['user_ids'] = implode(',', $userIds);
        }

        $response =  $this
            ->api('users.get', $data);

        $this->checkResponse($response);

        return $response;
    }
}
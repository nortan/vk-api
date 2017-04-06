<?php
/**
 * Created by PhpStorm.
 * User: zx-coder
 * Date: 05.04.17
 * Time: 14:03
 */

include __DIR__ . '/vendor/autoload.php';

$token    = '525d7b665547740ecb0c73d53b8e5b2a7a455de779bac1057b3babc574b32b71783ff06c4c6edfb36f319';
$app_id   = '5967395';
$api_secret = 'Uofb7jn73RxYrOlpWrTp';
$group_id = '79554366';

$vk = new \VK\VK($app_id, $api_secret, $token);
$stat = new \ZxCoder\Methods\Stat\Stat($vk);
$res = $stat->get(new DateTime('2015-12-01'), new DateTime('2015-12-03'), $group_id);

var_dump($res, json_encode($res));
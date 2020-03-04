<?php
/**
* ��������ת����
*
*/

define('IS_INC', TRUE);
#define('DEBUG', TRUE);
require dirname(__FILE__) . '/common/common.inc.php';
//Ĭ�ϵ���תURL
$redirectUrl = SITE_URL;

$key = array_key_exists('key', $_REQUEST)?$_REQUEST['key']:'';
if ($key)
{
    //
    $info = AdHelper::getAdInfo($key);
    if ($info)
    {
        $adId = $info['ad_id'];
        $REQUEST_URI = $_SERVER['REQUEST_URI'];
        if (trim($info['ad_redirect_url']))
        {
            $redirectUrl = trim($info['ad_redirect_url']);
        }
        AdHelper::addLog($adId, $key, $REQUEST_URI);
    }
}

header('Location: ' . $redirectUrl);
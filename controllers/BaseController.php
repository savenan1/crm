<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/5
 * Time: 20:45
 */

namespace app\controllers;


use yii\web\Controller;
use yii\data\Pagination;
use Yii;

class BaseController extends Controller
{

    const pageSize=20;


    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function getData($params = null){
        return Yii::$app->request->get($params);
    }

    public function postData($params = null){
        return Yii::$app->request->post($params);
    }

    /**
     * 返回分页控件
     * @param int $totalCount
     * @return \yii\data\Pagination
     */
    public function getPagination($totalCount,$pageSize = 20){
        return new Pagination(['totalCount' => $totalCount,'pageSize' => $pageSize,'pageSizeParam' => false]);
    }

    public function renderJSON($code,$msg,$data=''){
        $res = [
            'ret'=>$code,
            'msg'=>$msg,
            'data'=>$data
        ];
        return json_encode($res);
    }

    /**
     * 获取http 参数并将其编码
     */
    public static function param($name, $convert = true){
        $param =  isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : null);
        if ($convert) {
            if (is_array($param)) {
                foreach ($param as $k => $p) {
                    $param[$k] = htmlspecialchars(trim($p), ENT_QUOTES);
                }
            } else {
                $param = htmlspecialchars(trim($param), ENT_QUOTES);
            }
            return $param;
        } else {
            return $param;
        }
    }
}
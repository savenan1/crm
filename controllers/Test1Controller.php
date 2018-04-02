<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/11/14
 * Time: 17:31
 */

namespace app\controllers;


use yii\web\Controller;

class Test1Controller extends Controller
{
    public function actionTest(){
        var_dump(123);
        return;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/4
 * Time: 21:54
 */

namespace app\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}
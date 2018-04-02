<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/15
 * Time: 15:55
 */

namespace app\controllers;


class WeiboController extends BaseController
{
    public function actionApplyWeibo(){
        return $this->render('addWeibo',[

        ]);
    }
}
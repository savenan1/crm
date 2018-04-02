<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/5
 * Time: 20:31
 */

namespace app\controllers;


use app\models\Brand;
use yii\web\Controller;

class BrandController extends BaseController
{

    public function actionBrandList(){
        $page = intval(self::param("page"));
        $query=Brand::find()->select('*');
        $offset = ($page-1) * self::pageSize;
        $data = $query->offset($offset)->limit(self::pageSize)->asArray()->all();
        $totalCount = $query->count();
        return $this->render('brandList',[
            'data'=>$data,
            "pages" => $this->getPagination($totalCount)
        ]);
    }

}
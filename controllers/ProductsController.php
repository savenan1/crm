<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/4
 * Time: 22:28
 */

namespace app\controllers;


use app\models\Brand;
use app\models\ProductPhoto;
use app\models\Products;
use yii\web\Controller;

class ProductsController extends BaseController
{
    private $productList=[
        'FstrProductName'=>'商品名称',
        'FstrDetails'=>'商品详情',
        'FstrDescription'=>'商品描述',
        'FuiBuyPrice'=>'出售价格',
        'FuiRentPrice'=>'出租价格',
        'FuiProductStatus'=>'商品状态',
        'FuiNum'=>'商品总数',
        'CreateTime'=>'创建时间',
        'FstrVideoUrl'=>'视频',
        'FuiCanRent'=>'能否出租',
        'FuiAtLeastDays'=>'几天起租',
        'BrandName'=>'品牌名称',
    ];

    private $productStatus=[
        '待审核','审核通过','交易中','已支付','交易完成'
    ];

    public function actionProduct(){
        $page = intval(self::param("page"));
        $params = $this->getData();
        $query=Products::find()->select('products.*,b.Brand_name as BrandName')
            ->innerJoin('brand b','products.FuiBrandId=b.Id')
            ->where(['>','products.FuiId',0]);
        if($params){
            if($params['productName']){
                $query->andFilterWhere(['like','products.FstrProductName',$params['productName']]);
            }
            if($params['canRent']){
                $query->andWhere(['products.FuiCanRent' => $params['canRent']]);
            }
            if($params['brandId']){
                $query->andWhere(['b.Id' => $params['brandId']]);
            }
        }
        $offset = ($page-1) * self::pageSize;
        $data = $query->offset($offset)->limit(self::pageSize)->asArray()->all();
        $totalCount = $query->count();

        $brand = Brand::find()->select('*')
            ->asArray()->all();
        return $this->render('productList',[
            'data' => $data,
            'brand' => $brand,
            "pages" => $this->getPagination($totalCount)
        ]);
    }

    public function actionProductDetail(){
        $productId=\Yii::$app->request->get('productId');
        if(!is_numeric($productId)){
            return $this->renderJSON(-1003,'非法参数');
        }
        $product=Products::find()
            ->select('*,from_unixtime(FuiCreateTime) as CreateTime,b.Brand_name as BrandName')
            ->innerJoin('brand b','products.FuiBrandId=b.Id')
            ->where(['FuiId'=>$productId])->asArray()->one();
        $productPhoto=ProductPhoto::find()->select('*')
            ->where(['FuiProductId'=>$productId])->asArray()->all();
        return $this->render('productDetail',[
            'product'=>$product,
            'photo'=>$productPhoto,
            'list'=>$this->productList,
            'status'=>$this->productStatus
        ]);
    }

    public function actionAddProduct(){
        $brand = Brand::find()->select('*')
            ->asArray()->all();
        return $this->render('addProduct',[
            'brand' => $brand
        ]);
    }

    public function actionAuditProduct(){
        \Yii::$app->getResponse()->format='json';
        $productId=\Yii::$app->request->post('productId');
        if(!is_numeric($productId)){
            return $this->renderJSON(-1003,'非法参数');
        }
        $product=Products::findOne(['FuiId'=>$productId]);
        $product->FuiProductStatus=1;
        if($product->save()){
            return $this->renderJSON(0,'审核成功');
        }
        return $this->renderJSON(-1002,'审核失败');
    }

}
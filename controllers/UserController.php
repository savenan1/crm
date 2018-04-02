<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/10/3
 * Time: 16:33
 */

namespace app\controllers;


use app\models\UserInfo;

class UserController extends BaseController
{
    public function actionUserList(){
        $page = intval(self::param("page"));
        $params = $this->getData();
        $query=UserInfo::find()->select('*')
            ->where(['>','FuiId',0]);
        if($params){
            if($params['mobile']){
                $query->andWhere(['FstrUserName' => $params['mobile']]);
            }
            if($params['accountName']){
                $query->andWhere(['FstrAccountName' => $params['accountName']]);
            }
        }
        $offset = ($page-1) * self::pageSize;
        $data = $query->offset($offset)->limit(self::pageSize)->asArray()->all();
        $totalCount = $query->count();

        return $this->render('userList',[
            'data' => $data,
            "pages" => $this->getPagination($totalCount)
        ]);
    }

    public function actionUserDetail(){
        $uid = $this->getData('uid');
        if(!$uid || !is_numeric($uid)){
            return $this->renderJSON(-1003,'invalid input');
        }
        $userInfo = UserInfo::find()
            ->select('*,from_unixtime(FuiCreateTime) as CreateTime')
            ->where(['FuiId'=>$uid])->asArray()->one();
        return $this->render('userDetail',[
            'userInfo'=>$userInfo
        ]);
    }
}
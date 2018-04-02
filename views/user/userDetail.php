<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/4
 * Time: 22:29
 */
$this->title='User Detail';
use yii\widgets\LinkPager;
?>
<div>
    <div class="form-group">
        <label class="col-md-3 control-label">手机号：</label>
        <label class="col-md-10 control-label"><?=$userInfo['FstrUserName']?></label>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">邮箱：</label>
        <label class="col-md-10 control-label"><?=$userInfo['FstrEmail']?></label>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">用户类型：</label>
        <label class="col-md-10 control-label"><?=$userInfo['FuiType']?'普通用户':'超级管理员'?></label>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">创建时间：</label>
        <label class="col-md-10 control-label"><?=$userInfo['CreateTime']?></label>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">用户姓名：</label>
        <label class="col-md-10 control-label"><?=$userInfo['FstrAccountName']?></label>
    </div><div class="form-group">
        <label class="col-md-3 control-label">身份证号：</label>
        <label class="col-md-10 control-label"><?=$userInfo['FstrIdentityCard']?></label>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">信用等级：</label>
        <label class="col-md-10 control-label"><?=$userInfo['FuiCreditLevel']?></label>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">用户昵称：</label>
        <label class="col-md-10 control-label"><?=$userInfo['FstrUserNickname']?></label>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">用户头像：</label>
        <div class="col-md-8">
            <img class="img-rounded" src="<?=$userInfo['FstrUserIcon']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">用户签名：</label>
        <label class="col-md-8 control-label"><?=$userInfo['FstrUserSignature']?></label>
    </div>
</div>
<?php
////注册js文件
//$this->registerJsFile("/js/products/userList.js?v=201707221509",[]);
//?>
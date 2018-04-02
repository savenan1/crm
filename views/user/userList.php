<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/4
 * Time: 22:29
 */
$this->title='User Info';
use yii\widgets\LinkPager;
?>
<form action="product" method="get" autocomplete="off">
    <div class="form-group">
        <label class="col-md-1 control-label">手机号：</label>
        <div class="col-md-2">
            <input class="form-control" placeholder="手机号" type="text" name="mobile">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-1 control-label">姓名：</label>
        <div class="col-md-2">
            <input class="form-control" placeholder="姓名" type="text" name="accountName">
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="查询">
    </div>
</form>
<hr>
<?php if($pages->totalCount==0){?>
    <p class="alert alert-success">暂无数据</p>
<?php } else{?>
    <table class="table table-hover" id="eventListener">
        <thead>
        <tr>
            <th>手机号</th>
            <th>邮箱</th>
            <th>用户类型</th>
            <th>用户姓名</th>
            <th>身份证号</th>
            <th>信用等级</th>
            <th>用户名</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $v){?>
            <tr>
                <td><?=$v['FstrUserName']?></td>
                <td><?=$v['FstrEmail']?></td>
                <td><?=$v['FuiType'] == 0?'超级管理员':'普通用户' ?></td>
                <td><?=$v['FstrAccountName']?></td>
                <td><?=$v['FstrIdentityCard']?></td>
                <td><?=$v['FuiCreditLevel']?></td>
                <td><?=$v['FstrUserNickname']?></td>
                <td>
                    <a href="user-detail?uid=<?=$v['FuiId']?>" target="_blank" class="btn btn-primary">查看</a>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
    <div class="row" style="margin-top:10px;">
        <div class="col-md-2">共 <strong><?=$pages->totalCount?></strong> 条记录</div>
        <div class="col-md-10 text-align-right">
            <?= LinkPager::widget([
                'pagination' => $pages,
                'nextPageLabel' => '下一页',
                'prevPageLabel' => '上一页',
            ]); ?>
        </div>
    </div>
<?php }?>

<?php
//注册js文件
//$depend_js = [
//    "app\assets\Select2Asset",
//];
$this->registerJsFile("/js/user/userList.js?v=201707221509");
?>
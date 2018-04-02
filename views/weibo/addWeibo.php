<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/12
 * Time: 21:59
 */
$this->title='Apply Weibo';
use yii\widgets\LinkPager;
?>
    <form class="form-horizontal" action="http://112.74.189.161/weibo/apply-weibo" enctype="multipart/form-data" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">UserId</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="FuiUserId" id="FuiUserId" placeholder="UserId">
            </div>
        </div>
        <div class="form-group">
            <label for="FstrContent" class="col-sm-2 control-label">微博内容</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="FstrContent" id="FstrContent" placeholder="微博内容"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div id="photo">
                    <div class="form-control photo">
                        <input type="file" name="file">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="发布" style="margin-top: 10px;" class="btn btn-default">
            </div>
        </div>
    </form>
    <button class="btn btn-primary" style="float:right;margin-top: 10px;margin-bottom: 100px" id="addPhoto">添加</button>
<?php
//注册js文件
$this->registerJsFile("/js/products/addProduct.js?v=201707221509",[]);
?>
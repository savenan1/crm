<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/12
 * Time: 21:59
 */
$this->title='Add Product';
use yii\widgets\LinkPager;
?>
<form action="http://112.74.189.161/products/add-product" enctype="multipart/form-data" method="post">
    <table class="table">
        <tr>
            <td>
                <label for="">商品名称</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FstrProductName">
            </td>
            <td>
                <label for="">商品详情</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FstrDetails">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">商品描述</label>
            </td>
            <td colspan="3">
                <textarea name="FstrDescription" class="form-control" cols="90" rows="3"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">出售价格</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FuiBuyPrice">
            </td>
            <td>
                <label for="">出租价格</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FuiRentPrice">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">卖家ID</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FuiUserId">
            </td>
            <td>
                <label for="">商品总数</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FuiNum">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">是否能租</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FuiCanRent">
            </td>
            <td>
                <label for="">几天起租</label>
            </td>
            <td>
                <input type="text" class="form-control" name="FuiAtLeastDays">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">品牌名称</label>
            </td>
            <td>
                <select name="FuiBrandId" id="FuiBrandId" class="form-control">
                <?php foreach ($brand as $v){?>
                    <option value="<?=$v['Id']?>"><?=$v['Brand_name']?></option>
                <?php }?>
                </select>
            </td>
        </tr>
    </table>
    <div id="photo">
        <div class="form-control photo">
            <input type="file" name="file">
        </div>
    </div>
    <input type="submit" value="上传" style="margin-top: 10px;" class="btn btn-success">
</form>
    <button class="btn btn-primary" style="float:right;margin-top: 10px;margin-bottom: 100px" id="addPhoto">添加</button>
<?php
//注册js文件
//注册js文件
$depend_js = [
    "app\assets\Select2Asset",
];
$this->registerJsFile("/js/products/addProduct.js?v=201707221509",["depends"=>$depend_js]);
?>
<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/4
 * Time: 22:29
 */
$this->title='Products';
use yii\widgets\LinkPager;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Products</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <form action="product" method="get" autocomplete="off">
                <div class="col-xs-3">
                    <input class="form-control" placeholder="商品名称" type="text" name="productName">
                </div>
                <div class="col-xs-3">
                    <select class="form-control" name="canRent">
                        <option value="">---能否出租---</option>
                        <option value="1">能</option>
                        <option value="0">不能</option>
                    </select>
                </div>
                <div class="col-xs-3">
                    <select name="brandId" id="brandId" class="form-control">
                        <option value="">---品牌---</option>
                        <?php foreach ($brand as $v){?>
                            <option value="<?=$v['Id']?>"><?=$v['Brand_name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="查询">
                    <a href="add-product" target="_blank" class="btn btn-info">新增</a>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>
<?php if($pages->totalCount==0){?>
    <div class="callout callout-info">暂无数据</div>
<?php } else{?>
    <div class="box box-body">
        <div class="dataTables_wrapper form-inline dt-bootstrap">
        <table class="table table-bordered table-hover dataTable" id="eventListener">
            <thead>
            <tr>
                <th>商品名称</th>
                <th>商品价格(卖)</th>
                <th>商品价格(租)</th>
                <th>商品总数</th>
                <th>能否出租</th>
                <th>是否在售</th>
                <th>品牌</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $v){?>
                <tr>
                    <td><?=$v['FstrProductName']?></td>
                    <td><?=$v['FuiBuyPrice']?></td>
                    <td><?=$v['FuiRentPrice']?></td>
                    <td><?=$v['FuiNum']?></td>
                    <td><?=$v['FuiCanRent']? '能':'否'?></td>
                    <td><?=$v['FuiSale']? '是':'否'?></td>
                    <td><?=$v['BrandName']?></td>
                    <td>
                        <a href="product-detail?productId=<?=$v['FuiId']?>" target="_blank" class="btn btn-flat btn-primary">查看</a>
                        <?php if($v['FuiProductStatus']==0){?>
                            <a href="javascript:void(0)" class="btn btn-flat btn-success event" action="audit" productId="<?=$v['FuiId']?>">审核通过</a>
                        <?php }?>
                        <?php if($v['FuiProductStatus']==1&&$v['FuiStatus']==0){?>
                            <a href="javascript:void(0)" class="btn btn-flat btn-danger event" action="hot" productId="<?=$v['FuiId']?>">添加为最热</a>
                            <a href="javascript:void(0)" class="btn btn-flat btn-app event" action="new" productId="<?=$v['FuiId']?>">添加为最新</a>
                        <?php }?>
                    </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
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
$depend_js = [
    "app\assets\Select2Asset",
];
$this->registerJsFile("/js/products/productList.js?v=201707221509",["depends" => $depend_js]);
?>
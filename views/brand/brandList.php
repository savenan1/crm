<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/5
 * Time: 20:32
 */
$this->title='Brand';
use yii\widgets\LinkPager;
?>
<table class="table">
    <thead>
    <tr>
        <th>品牌主键</th>
        <th>品牌名称</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $v){?>
        <tr>
            <td><?=$v['Id']?></td>
            <td><?=$v['Brand_name']?></td>
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

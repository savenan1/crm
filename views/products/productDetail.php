<?php
/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/9/4
 * Time: 22:29
 */
$this->title='Product Detail';
use yii\widgets\LinkPager;
?>
<table class="table table-hover">
    <?php foreach ($list as $k=>$v) {?>
        <tr>
            <td><?=$v?></td>
            <?php if($k=='FuiProductStatus'){?>
                <td><?=$status[$product[$k]]?></td>
            <?php } elseif($k=='FuiCanRent'){?>
                <td><?=$v? '能':'否'?></td>
            <?php }else{?>
                <td><?=$product[$k]?></td>
            <?php }?>
        </tr>
    <?php }?>
</table>
<h2>Pictures</h2>
<?php foreach ($photo as $v) {?>
    <div>
        <img class="img-rounded" src="<?=$v['FstrPhotoUrl']?>" alt="">
    </div>
    <br>
<?php }?>
<?php
//注册js文件
$this->registerJsFile("/js/products/productList.js?v=201707221509",[]);
?>
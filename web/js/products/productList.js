var productList={
    bindEvent:function () {
        var self=this;
        $('#eventListener').on('click','.event',function (e) {
            var elem=$(e.target);
            var action=elem.attr('action');
            var productId=elem.attr('productId')
            switch (action){
                case 'audit':
                    if(confirm('确认审核成功?')){
                        self.audit(productId);
                    }
                    break;
                case 'hot':
                    self.addToNewOrHot();
                    break;
                default:
                    break;
            }
        });

        $('#brandId').select2({minimumResultsForSearch: true});
    },
    audit:function (productId) {
        $.ajax('audit-product',{
            type:'post',
            dateType:'json',
            data:{
                productId:productId
            },
            success:function (res) {
                if(res.ret==0){
                    alert('审核成功');
                }
                else{
                    alert('审核失败');
                }
            },
            error:function () {
                alert('发生了未知的错误');
            }
        });
    },
    addToNewOrHot:function(pid,type){

    },
    init:function () {
        this.bindEvent();
    }
};

$(function () {
    productList.init();
})

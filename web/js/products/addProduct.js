/**
 * Created by zhangzenan on 2017/9/12.
 */
var AddProduct=function () {
    var self=this;
    this.count=0;
    this.bindEvent=function () {
        $('#addPhoto').on('click',function () {
            self.count++;
            $('.photo').last().after('<div class="form-control photo">'+
                '<input type="file" name="file'+self.count+'">'+
                '</div>');
        });

        $('#FuiBrandId').select2({minimumResultsForSearch: true});
    };
    this.init=function () {
        this.bindEvent();
    };
};

$(function () {
    var addProduct=new AddProduct();
    addProduct.init();
});
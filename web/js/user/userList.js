/**
 * Created by zhangzenan on 2017/10/3.
 */
var UserList=function () {
    var self=this;
    this.bindEvent=function () {

    };
    this.init=function () {
        this.bindEvent();
    };
};

$(function () {
    var userList=new UserList();
    userList.init();
});
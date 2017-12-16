<?php
//专门处理后台路由文件

//Route::get('/abc',function (){
//    return 'hdphp';
//});

//Route::prefix('admin')->group(function(){
//    Route::get('/abc',function(){
//        return 'hdcms';
//    });
//    Route::get('/index','Admin\Entry@index');
//});
Route::namespace('Admin')->prefix('admin')->group(function (){
    //在路由组里面来定义路由
    //后台登录模板路由
   Route::get('/login','Entry@loginForm');
//    处理后台登录路由
   Route::post('/login','Entry@login');
    //后台首页路由
    Route::get('/index','Entry@index');
    //后台退出登录路由
    Route::get('/loginout','Entry@loginout');
});
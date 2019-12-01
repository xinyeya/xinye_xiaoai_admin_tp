<?php
/**
 * Created by PhpStorm.
 * User: xinyeya
 * Date: 2019/12/1
 * Time: 15:22
 */

use \think\facade\Route;

Route::group('admin', function () {
    Route::get('userinfo', '@admin/user/userinfo')->name('admin/user/userinfo');
})->allowCrossDomain();
<?php
/**
 * Created by PhpStorm.
 * User: xinyeya
 * Date: 2019/12/1
 * Time: 15:22
 */

use \think\facade\Route;

Route::group('admin', function () {
    Route::get('userlist', '@admin/user/userlist')->name('admin/user/userlist');
    Route::get('userinfo', '@admin/user/userinfo')->name('admin/user/userinfo');
    Route::post('edit_userinfo', '@admin/user/editUserInfo')->name('admin/user/edit_userinfo');
//  Route::resource('money', '@admin/money');
    Route::get('money', '@admin/money/index')->name('admin/money/index');
    Route::post('money', '@admin/money/save')->name('admin/money/save');
    Route::delete('money', '@admin/money/delete')->name('admin/money/delete');
})->allowCrossDomain();
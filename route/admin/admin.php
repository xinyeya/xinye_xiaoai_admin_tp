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
    Route::group('money', function () {
        Route::get('/', '@admin/money/index')->name('admin/money/index');
        Route::post('/', '@admin/money/save')->name('admin/money/save');
        Route::get('read', '@admin/money/read')->name('admin/money/read');
        Route::put('/', '@admin/money/update')->name('admin/money/update');
        Route::delete('/', '@admin/money/delete')->name('admin/money/delete');
        Route::get('search', '@admin/money/search')->name('admin/money/search');
    });
})->allowCrossDomain();
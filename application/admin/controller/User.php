<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class User extends Controller
{
    public function userinfo (Request $request) {
        $page = $request->get('page');
        $listRows = $request->get('pageSize');
        $res = Db::name('users')->page($page,$listRows)->select();
        $count = Db::name('users')->count();
        return json(['list' => $res, 'count' => $count]);
    }
}

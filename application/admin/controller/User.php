<?php

namespace app\admin\controller;

use app\admin\model\Users;
use think\Controller;
use think\Db;
use think\Request;

class User extends Controller
{
    /*
     * 获取全部用户
     */
    public function userlist (Request $request) {
        $page = $request->get('page');
        $listRows = $request->get('pageSize');
        $res = Db::name('users')->page($page,$listRows)->select();
        $count = Db::name('users')->count();
        return json(['list' => $res, 'count' => $count]);
    }

    /*
     * 获取单个用户所有信息
     */
    public function userinfo (Request $request) {
        $id = $request->get('id');
        $users = new Users();
        $list = $users->getInfo($id);
        return json($list);
    }

    /*
     * 修改单个的用户信息
     */
    public function editUserInfo (Request $request) {
        $id = $request->get('id');
        $list = $request->post();
        $users = new Users();
        $data = $users->editUserInfo($id, $list);
        if ($data==1) {
            $data = '修改个人信息成功';
        }else{
            $data = '修改个人信息失败';
        }
        return json($data);
    }
}

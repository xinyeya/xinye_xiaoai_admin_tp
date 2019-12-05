<?php

namespace app\admin\controller;

use app\admin\model\Moneys;
use think\Controller;
use think\Db;
use think\Request;

class Money extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index(Request $request)
    {
        $page = $request->get('page');
        $pageSize = $request->get('pageSize');
        $money = new Moneys();
        $data = $money->getUserList($page, $pageSize);
        return json($data);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $username = $request->post('username');
        $income = $request->post('income');
        $expend = $request->post('expend');
        $incomeType = $request->post('incomeType');
        $accountCash = $request->post('accountCash');
        $remark = $request->post('remark');
        $data = ['username' => $username, 'income' => $income, 'expend' => $expend, 'incomeType' => $incomeType, 'accountCash' => $accountCash, 'investTime' => date('Y-m-d h:i:s', time()), 'remark' => $remark];
        $money = new Moneys();
        $res = $money->addUserList($data);
        if (!$res){
            return json(['msg' => '添加失败']);
        }
        return json($res);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function read(Request $request)
    {
        $id = $request->get('id');
        $money = new Moneys();
        $userInfo = $money->readUserList($id);
        return json($userInfo);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
        $username = $request->put('username');
        $income = $request->put('income');
        $expend = $request->put('expend');
        $incomeType = $request->put('incomeType');
        $accountCash = $request->put('accountCash');
        $remark = $request->put('remark');
        $money = new Moneys();
        $data = ['username' => $username, 'income' => $income, 'expend' => $expend, 'incomeType' => $incomeType, 'accountCash' => $accountCash, '$remark' => $remark];
        $res = $money->editUserList($id, $data);
        if (!$res) {
            return json(['msg' => '修改失败']);
        }
        return $res;
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete(Request $request)
    {
        $id = $request->delete('id');
        $money = new Moneys();
        $res = $money->delUserList($id);
        return json($res);
    }
}

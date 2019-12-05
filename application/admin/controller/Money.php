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
        $list = Db::name('money_water')->page($page, $pageSize)->order('id','desc')->select();
        $count = Db::name('money_water')->count();
        return json(['data' => $list, 'count' => $count]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
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
        $data = ['username' => $username, 'income' => $income, 'expend' => $expend, 'incomeType' => $incomeType, 'accountCash' => $accountCash, 'investTime' => date('Y-m-d h:i:s', time())];
        $money = new Moneys();
        $res = $money->addUserList($data);
        if (!$res){
            return json(['msg' => '添加失败']);
        }
        return json($res);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}

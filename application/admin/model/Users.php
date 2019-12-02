<?php

namespace app\admin\model;

use think\Model;

class Users extends Model
{
    // 设置当前模型对应的完整数据表名称
    protected $table = 'xa_user_info';

    /**
     * 获取单个用户信息
     * @param $id int类型，查询个人信息
     * @return array|null|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getInfo($id) {
        $res = Users::where('id', $id)->find();
        return $res;
    }

    public function editUserInfo ($id, $list) {
        $res = Users::where('id', $id)->update($list);
        return $res;
    }
}

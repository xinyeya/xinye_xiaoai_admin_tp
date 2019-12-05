<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class Moneys extends Model
{
    use SoftDelete;
    protected $table = 'xa_money_water';
    protected $deleteTime = 'deleteTime';

    /**
     * 获取分页所有数据
     * @param $page
     * @param $pageSize
     * @return array|bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getUserList ($page, $pageSize) {
        $list = Moneys::page($page, $pageSize)->order('id', 'desc')->select();
        $count = Moneys::count();
        if (!$list) {
            return false;
        }
        if (!$count) {
            return false;
        }
        return ['data' => $list, 'count' => $count];
    }

    /**
     * 添加数据
     * @param $data
     * @return bool
     */
    public function addUserList ($data) {
        $money = new Moneys();
        $ref = $money->save($data);
        return $ref;
    }

    /**
     * 删除数据
     * @param $id
     * @return bool
     */
    public function delUserList ($id) {
        $ref = Moneys::destroy($id);
        return $ref;
    }

    /**
     * 查询要修改的数据
     * @param $id
     * @return bool|mixed
     */
    public function readUserList ($id) {
        $userInfo = Moneys::get($id);
        if (!$userInfo) {
            return false;
        }
        return $userInfo;
    }

    public function editUserList ($id, $data) {
        $money = new Moneys();
        $res = $money->save($data, ['id' => $id]);
        if (!$res) {
            return false;
        }
        return $res;
    }
}

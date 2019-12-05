<?php

namespace app\admin\model;

use think\Model;
use think\model\concern\SoftDelete;

class Moneys extends Model
{
    use SoftDelete;
    protected $table = 'xa_money_water';
    protected $deleteTime = 'deleteTime';

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

    public function addUserList ($data) {
        $money = new Moneys();
        $ref = $money->save($data);
        return $ref;
    }

    public function delUserList ($id) {
        $ref = Moneys::destroy($id);
        return $ref;
    }
}

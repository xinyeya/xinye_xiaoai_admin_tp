<?php

namespace app\admin\model;

use think\Model;

class Moneys extends Model
{
    protected $table = 'xa_money_water';

    public function addUserList ($data) {
        $money = new Moneys();
        $ref = $money->save($data);
        return $ref;
    }
}

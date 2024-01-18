<?php

namespace App;

class Purchase
{

    private $model;
    public function __construct($config)
    {
        $this->model = new PDODb($config);
    }
    public function findAllByUser($userId)
    {
        return $this->model->rawQuery("select * from table_Order where user_id = " . $userId);
    }
    public function findByStatus($statusId)
    {
        return $this->model->rawQuery("select * from table_order where status_id = " . $statusId);
    }
    public function findByUser($userId)
    {
        return $this->model->rawQuery("select * from table_Order where user_id = " . $userId);
    }
    public function insert($data)
    {
        $this->model->insert("order", $data);
    }
    public function update()
    {
    }
}

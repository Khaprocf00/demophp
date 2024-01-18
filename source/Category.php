<?php

namespace App;

class Category
{
    private $model;
    public $arrCategory = array();
    public function __construct($config)
    {
        $this->model = new PDODb($config);
    }
    public function findPathCategory($code)
    {
        $this->model->where('code', $code);
        $result = $this->model->get("category");
        if (count($result) != 0) {
            return $result[0];
        } else {
            return null;
        }
    }
    public function findAll()
    {
        $result = $this->model->rawQuery("select * from table_category");
        return $result;
    }
    public function getNameById($id)
    {
        $this->model->where('id', $id);
        $result = $this->model->getOne("category");
        return $result['name'];
    }
    public function findById($id)
    {
        $this->model->where('id', $id);
        $result = $this->model->getOne('category');
        return $result;
    }
    public function findCategory($category)
    {
        $result = $this->findById($category);
        if ($result != false) {
            if ($result['parent_id'] == 0) {
                array_push($this->arrCategory, $result['id']);
            } else {
                array_push($this->arrCategory, $result['id']);
                $this->findCategory($result['parent_id']);
            }
        }
        return $this->arrCategory;
    }
}
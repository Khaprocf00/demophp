<?php

namespace App;

class Brand
{
    private $model;
    public function __construct($config)
    {
        $this->model = new PDODb($config);
    }
    public function getAll()
    {
        return $this->model->rawQuery("select * from table_brand");
    }
    public function create($brands, $productId)
    {
        $this->model->where('product_id', $productId);
        $this->model->delete('product_brand');
        foreach ($brands as $brand) {
            $data = [
                'brand_id' => $brand,
                'product_id' => $productId,
            ];

            $this->model->insert('product_brand', $data);
        }
    }
    public function update($brands, $productId)
    {
        foreach ($brands as $brand) {
            $data = [
                'brand_id' => $brand,
                'product_id' => $productId,
            ];

            $this->model->where('brand_id', $brand)->where('product_id', $productId);
            $check = $this->model->getOne('product_brand');
            if ($check == false)
                $this->model->insert('product_brand', $data);
        }
    }
    public function checkBrand($brand, $productId)
    {
        $this->model->where('brand_id', $brand)->where('product_id', $productId);
        $result = $this->model->getOne('product_brand');
        if ($result != false) {
            return true;
        }
        return false;
    }
}

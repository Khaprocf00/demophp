<?php

namespace App;

class Product
{
    private $model;
    private $table = "product";
    public $page = 1;
    public $totalPage = 1;
    public $productDeatail;
    public function __construct($config)
    {
        $this->model = new PDODb($config);
    }
    public function show()
    {
        $this->model->orderBy('id');
        $this->model->setPageLimit(8);
        if (isset($_GET['page'])) {
            $this->page = $_GET['page'];
        }
        $result = $this->model->paginate($this->table, $this->page);
        $this->totalPage = $this->model->totalPages;

        return  $result;
    }
    public function insert($data)
    {
        $data['code'] = $this->setCode($data['name']);
        $result = $this->model->insert("product", $data);
        return $result;
    }
    public function update($productId, $data)
    {

        $data['code'] = $this->setCode($data['name']);
        $this->model->where('id', $productId);
        $result = $this->model->update("product", $data);
        return  $result;
    }
    public function setCode($name)
    {
        $k = new Functions();
        $code = $k->vn_to_str($name);
        return  $code;
    }
    public function showProductDetail()
    {
        if (isset($_GET['slug'])) {
            $code = $_GET['slug'];
            $this->model->where('code', $code);
            $result = $this->model->get("product");

            if (count($result) != 0) {
                return $result[0];
            } else {
                return null;
            }
        }
    }
    public function findPathProduct($code)
    {
        $this->model->where('code', $code);
        $result = $this->model->get("product");
        if (count($result) != 0) {
            return $result[0];
        } else {
            return null;
        }
    }
    public function showOfCategory($category)
    {
        $this->model->where('category_id', $category);
        return $this->model->get("product", 10);
    }


    public function insertImageDetail()
    {
        $products = $this->model->rawQuery("select * from table_product");
        foreach ($products as $product) {
            for ($i = 1; $i <= 3; $i++) {
                $data = [
                    "product_id" => $product['id'],
                    "image_path" => "Rectangle 8377 (" . $i . ").png"
                ];
                $this->model->insert("image_detail", $data);
            }
        }
    }
    public function productImageOfProduct($productId)
    {
        $this->model->where("product_id", $productId);
        return $this->model->get("image_detail");
    }
    public function showProductOfCategory($code)
    {

        if (isset($_GET['page'])) {
            $this->page = $_GET['page'];
        }
        $this->model->where('code', $code);
        $category = $this->model->getOne('category');
        $this->model->setPageLimit(8);

        if ($category) {
            $this->model->where("category_id", $category['id']);
            $result = $this->model->paginate("product", $this->page);
            $this->totalPage = $this->model->totalPages;
            return  $result;
        } else {
            return null;
        }
    }
    public function getNameCategory($code)
    {
        $this->model->where("code", $code);
        $category =  $this->model->getOne("category");
        if ($category) {
            return $category['name'];
        }
        return $code;
    }
    public function insertProductDetail($product, $colors)
    {
        foreach ($product as $item) {
            foreach ($colors as $color) {
                $data = [
                    "product_id" => $item['id'],
                    "color_id" => $color['id'],
                    "qty" => 100
                ];
                $this->model->insert("product_detail", $data);
            }
        }
    }
    public function updateQty($products)
    {
        foreach ($products as $product) {
            $qty = 0;
            $this->model->where('product_id', $product['id']);
            $productDetail = $this->model->get("product_detail");
            foreach ($productDetail as $item) {
                $qty += $item['qty'];
            }
            $data = [
                "qty" => $qty
            ];
            $this->model->where("id", $product['id']);
            $this->model->update("product", $data);
        }
    }
    public function findAll()
    {
        return $this->model->rawQuery("select* from table_product");
    }
    public function findById($id)
    {
        return $this->model->rawQueryOne("select* from table_product where id = " . $id);
    }
    public function checkFileType($data)
    {
        foreach ($data as $item) {
        }
    }
}

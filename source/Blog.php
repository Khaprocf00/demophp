<?php

namespace App;

class Blog
{
    private $model;
    public $page = 1;
    public $totalPage = 1;
    private $table = "blog";
    public function __construct($config)
    {
        $this->model = new PDODb($config);
    }

    public function show()
    {
        $this->model->setPageLimit(5);
        if (isset($_GET['page'])) {
            $this->page = $_GET['page'];
        }
        $result = $this->model->paginate($this->table, $this->page);
        $this->totalPage = $this->model->totalPages;
        return  $result;
    }
    public function insert()
    {
        for ($i = 30; $i < 60; $i++) {
            $data = [
                "title" => "TOP 5 các loại bình cắm hoa trang trí phòng khách đẹp nhất 2023" . $i,
                "content" => "Trong năm 2023, sự đa dạng và sáng tạo trong lĩnh vực trang trí nội thất ngày càng phát triển, đặc biệt là trong việc chọn lựa bình cắm hoa trang trí. Dưới đây là top 5 các loại bình cắm hoa đẹp đang thu hút sự chú ý trong năm này, mang đến cho không gian sống của bạn vẻ đẹp và phong cách độc đáo.",
                "image_path" => "Rectangle 8498.png",
                "product_id" => $i
            ];
            $this->model->insert($this->table, $data);
        }
    }
    public function updateBlog()
    {
        $k = new Functions();
        $result = $this->model->rawQuery("select * from table_blog");
        foreach ($result as $item) {
            $str = $k->vn_to_str($item['title']);
            $data = [
                'code' => $str
            ];
            $this->model->where("id", $item['id']);
            $this->model->update($this->table, $data);
        }
    }
    public function showBlogDetail()
    {
        if (isset($_GET['slug'])) {
            $code = $_GET['slug'];
            $this->model->where('code', $code);
            $result = $this->model->get($this->table);

            if (count($result) != 0) {
                return $result[0];
            } else {
                return null;
            }
        }
    }
    public function showBlogNew()
    {
        $this->model->orderBy("id");
        $result = $this->model->get($this->table, 5);
        return $result;
    }
    public function findPathBlog($code)
    {
        $this->model->where('code', $code);
        $result = $this->model->get("blog");
        if (count($result) != 0) {
            return $result[0];
        } else {
            return null;
        }
    }
}

<?php
function showBlogNew($arr)
{
    $str = "";
    if (is_array($arr)) {
        foreach ($arr as $item) {
            $str .= '<a href="' . $item['code'] . '" class="content">' . $item['title'] . '</a>';
        }
    }
    return $str;
}
function showBlog($arr)
{
    $str = "";
    if (is_array($arr)) {
        foreach ($arr as $item) {
            $str .= '<a href="' . $item['code'] . '">
            <div class="blog-item d-flex flex-md-row flex-column">
                <div class="image col-12 col-md-5 position-relative mx-auto">
                    <img src="assets/images/png/' . $item['image_path'] . '" alt="">
                    <div class="date center position-absolute flex-column">
                        <div class="day">' . date('d', strtotime($item['created_on'])) . '</div>
                        <div class="month">Th' . date('m', strtotime($item['created_on'])) . '</div>
                    </div>
                </div>
                <div
                    class="content col-12 col-md-7 d-flex flex-column justify-content-center align-items-center">
                    <h5 class="title text-center position-relative">' . $item['title'] . '
                    </h5>

                    <div class="description text-center"> ' . $item['content'] . '</div>
                </div>
            </div>
        </a>';
        }
    }
    return $str;
}
function showFeedback($arr)
{
    $str = "";
    if (is_array($arr)) {
        foreach ($arr as $item) {
            $str .= '<div class="content">
            <a href="" class="name-user">Kha Nguyễn</a>
            <span>trong bài viết</span>
            <a href="' . $item['code'] . '" class="name-blog">' . $item['title'] . '</a>
        </div>';
        }
    }
    return $str;
}

function showBlogRelate($arr)
{
    $str = "";
    if (is_array($arr)) {
        foreach ($arr as $item) {
            $str .= '<div class="col-lg-6 col-12 blog-item">
            <a href="' . $item["code"] . '">
                <div class="blog-item d-flex flex-lg-row flex-column">
                    <div class="image col-12 col-lg-5 position-relative">
                        <img src="assets/images/png/' . $item["image_path"] . '" alt="">
                        <div class="date center position-absolute flex-column">
                            <div class="day">' . date('d', strtotime($item['created_on'])) . '</div>
                            <div class="month">Th' . date('m', strtotime($item['created_on'])) . '</div>
                        </div>
                    </div>
                    <div
                        class="content col-12 col-lg-7 mt-lg-0 mt-2 d-flex flex-column justify-content-center align-items-center">
                        <h5 class="title text-center position-relative">' . $item["title"] . '
                        </h5>

                        <div class="description text-center split split-2">' . $item["content"] . '</div>
                    </div>
                </div>
            </a>
        </div>';
        }
    }
    return $str;
}

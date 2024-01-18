<?php

$db->where('parent_id', 0);
$categorys = $db->get('category');
$alert = '';
$message = [];


if (isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $productDetail = $product->findById($productId);
    if ($productDetail != false) {
        $cate = $category->findCategory($productDetail['category_id']);
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $alias = $_POST['alias'];
            $brandr =  isset($_POST['brandr']) ? $_POST['brandr'] : [];
            $sku = $_POST['sku'];
            $title_sale = $_POST['title_sale'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $content = $_POST['content'];
            $formSelect1 = $_POST['formselect'];
            $formSelect2 = $_POST['form-select-2'];
            $formSelect3 = $_POST['form-select-3'];
            $short_description = $_POST['short_description'];
            $tskt = $_POST['tskt'];

            if ($_POST['checkImage'] == "") {
            } else {
                if ($_FILES['image_path']['name'] == "") {
                    $image_path = $productDetail['image_path'];
                } else {
                    $image_path = $_FILES['image_path']['name'];
                    $filetype = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));
                    if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg" && $filetype != "webp" && $filetype != "gif" && $filetype != "svg") {
                        $alert =  "Lưu ý: Chỉ chọn file .jpg, .png, .jpeg .webp, .gif ,.svg";
                    } else {
                        move_uploaded_file($_FILES['image_path']['tmp_name'], "uploads/" . $image_path);
                    }
                }
                if ($formSelect3 != -1) {
                    $categoryId = $formSelect3;
                } else  if ($formSelect2 != -1) {
                    $categoryId = $formSelect2;
                } else  if ($formSelect1 != -1) {
                    $categoryId = $formSelect1;
                }
                $price = str_replace("$", "", $price);
                $price = str_replace(",", "", $price);
                $discount = str_replace("$", "", $discount);
                $discount = str_replace(",", "", $discount);

                $data = [
                    'image_path' => $image_path,
                    'name' => $name,
                    'price' => $price,
                    'discount' => $discount,
                    'content' => $content,
                    'short_description' => $short_description,
                    'sku' => $sku,
                    'title_sale' => $title_sale,
                    'code' => $alias
                ];
                $data['category_id'] = isset($categoryId) ?  $categoryId : null;
                $update = $product->update($productId, $data);
                $brand->create($brandr, $productId);
                $productDetail = $product->findById($productId);
                $cate = isset($categoryId) == null ? [] : $category->findCategory($productDetail['category_id']);
                // var_dump($_FILES['imageDetail']['name'][0]);
                // die();
                if ($_FILES['imageDetail']['name'][0] != "") {
                    $count = 0;
                    if (!is_dir('uploads/' . $productDetail['id'] . '/')) {
                        mkdir('uploads/' . $productDetail['id'] . '/');
                    }
                    foreach ($_FILES['imageDetail']['name'] as $item) {
                        $image_detail_path = $item;
                        $filetype = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                        if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg" && $filetype != "webp" && $filetype != "gif" && $filetype != "svg") {
                            $alert =  "Lưu ý: Chỉ chọn file .jpg, .png, .jpeg .webp, .gif ,.svg";
                        } else {
                            move_uploaded_file($_FILES['imageDetail']['tmp_name'][$count], "uploads/" . $productDetail['id'] . '/' . $image_detail_path);
                        }
                        $count++;
                    }
                } else {
                    if (!is_dir('uploads/' . $productDetail['id'] . '/')) {
                        rmdir('uploads/' . $productDetail['id']);
                    }
                }

                if ($update) {
                    $message['message'] = "Chỉnh sửa thành công";
                    $message['alert'] = "success";
                } else {
                    $message['message'] = "Chỉnh sửa thất bại";
                    $message['alert'] = "danger";
                }
            }
        }
    } else {
        include "../templates/404_tpl.php";
        die();
    }
} else {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $alias = $_POST['alias'];
        $brandr = $_POST['brandr'];
        $sku = $_POST['sku'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $content = $_POST['content'];
        $title_sale = $_POST['title_sale'];
        $formSelect1 = $_POST['formselect'];
        $formSelect2 = $_POST['form-select-2'];
        $formSelect3 = $_POST['form-select-3'];
        $short_description = $_POST['short_description'];
        $tskt = $_POST['tskt'];
        $image_path = $_FILES['image_path']['name'];
        $filetype = strtolower(pathinfo($image_path, PATHINFO_EXTENSION));

        if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
            $alert =  "Lưu ý: Chỉ chọn file .jpg, .png, .jpeg ";
        } else {
            move_uploaded_file($_FILES['image_path']['tmp_name'], "uploads/" . $image_path);
            if ($formSelect3 != -1) {
                $categoryId = $formSelect3;
            } else  if ($formSelect2 != -1) {
                $categoryId = $formSelect2;
            } else  if ($formSelect1 != -1) {
                $categoryId = $formSelect1;
            }
            $price = str_replace("$", "", $price);
            $price = str_replace(",", "", $price);
            $discount = str_replace("$", "", $discount);
            $discount = str_replace(",", "", $discount);

            $data = [
                'image_path' => $image_path,
                'name' => $name,
                'price' => $price,
                'discount' => $discount,
                'content' => $content,
                'category_id' => $categoryId,
                'short_description' => $short_description,
                'sku' => $sku,
                'code' => $alias,
                'title_sale' => $title_sale,
            ];
            $insert = $product->insert($data);
            $brand->create($brandr, $insert);
            header('Location: edit/' . $insert);
            if ($insert) {
                $message['message'] = "Thêm thành công";
                $message['alert'] = "success";
            } else {
                $message['message'] = "Tên sản phẩm này đã có rồi";
                $message['alert'] = "danger";
            }
        }
    }
}
?>
<?php
include_once "templates/layout/header.php";
include "templates/layout/sidebar.php";
?>
<link rel="stylesheet" href="admin/assets/table/css/style.css">

<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script src="admin/assets/cpanel/ckfinder/ckfinder.js"></script>
<div class="container tm-mt-big tm-mb-big my-5" style="max-width: 100%;">
    <div class="row">
        <div class="col-xl-2 col-lg-3 p-0"></div>
        <div class=" col-lg-10 col-md-12 col-sm-12 mx-auto p-0">
            <div class="col-12 tm-bg-primary-dark tm-block tm-block-h-auto ">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block"><?php if (isset($productDetail) && $productDetail != false) echo "Update ";
                                                                    else echo "Add " ?> Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <?php
                    if (isset($message['message'])) {
                    ?>
                        <div class="mx-3 alert alert-<?= $message['alert'] ?>"><?= $message['message'] ?></div>
                    <?php
                    }
                    ?>
                    <form action="" id="dropzoneFrom" class="col-12 row dropzone" method="POST" class="tm-edit-product-form" enctype="multipart/form-data">
                        <div class="col-xl-8 col-lg-8 col-md-12">

                            <div class="form-group mb-3">
                                <label for="name">Tiêu đề
                                </label>
                                <input id="name" name="name" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['name'] ?>" type="text" class="form-control validate" />
                                <div class="form-message"></div>
                            </div>
                            <div class="form-group mb-3 alias">
                                <label for="alias">Đường dẫn
                                </label>
                                <input id="alias" style="padding-left: 190px;" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['code'] ?>" name="alias" type="text" class="form-control validate" />
                                <div class="alias-main">http://localhost/demophp/</div>
                                <div class="form-message"></div>

                            </div>


                            <div class="form-group mb-3">
                                <label for="short_description">Mô tả ngắn sản phẩm</label>
                                <textarea id="short_description" name="short_description" class="form-control validate" rows="5"><?php if (isset($productDetail) && $productDetail != false) echo $productDetail['short_description'] ?></textarea>
                                <div class="form-message"></div>

                            </div>
                            <div class="form-group mb-3">
                                <label for="content">Nội dung cản phẩm</label>
                                <textarea id="content" name="content" class="form-control validate" rows="2"><?php if (isset($productDetail) && $productDetail != false) echo $productDetail['content'] ?></textarea>
                                <div class="form-message"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tskt">Thông số kĩ thuật</label>
                                <textarea id="tskt" name="tskt" class="form-control validate" rows="5"><?php if (isset($productDetail) && $productDetail != false) echo $productDetail['content'] ?></textarea>
                                <div class="form-message"></div>
                            </div>
                            <input type="hidden" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['image_path'] ?>" id="checkImage" name="checkImage">

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12">
                            <div class="form-group mb-3">
                                <label>Danh mục cấp 1</label>
                                <select id="form-select-1" name="formselect" class="form-control select2" style="width: 100%;">
                                    <option value="-1">---- Chọn danh mục cấp 1 ----</option>
                                    <?php
                                    foreach ($categorys as $category) {
                                    ?>
                                        <option <?php
                                                if (isset($productDetail) && $productDetail != false)
                                                    if (in_array($category['id'], $cate))
                                                        echo "selected"; ?> value="<?= $category['id'] ?>">
                                            <?= $category['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="form-message"></div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Danh mục cấp 2</label>
                                <select name="form-select-2" id="form-select-2" class="form-control select3" style="width: 100%;">
                                    <option value="-1">---- Chọn danh mục cấp 2 ----</option>

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Danh mục cấp 3</label>
                                <select id="form-select-3" name="form-select-3" class="form-control select4" style="width: 100%;">
                                    <option value="-1">---- Chọn danh mục cấp 3 ----</option>

                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Chọn thương hiệu</label>
                                <div class="row">
                                    <?php
                                    $brands = $brand->getAll();
                                    foreach ($brands as $item) {
                                    ?>
                                        <label for="<?= $item['alias'] ?>" class="col-4 d-flex brand p-2">
                                            <input <?php if (isset($productDetail) && $productDetail != false) {
                                                        if ($brand->checkBrand($item['id'], $productDetail['id'])) {
                                                            echo "checked";
                                                        }
                                                    } ?> type="checkbox" name="brandr[]" id="<?= $item['alias'] ?>" value="<?= $item['id'] ?>"><img style="width: 100px;" src="assets/images/png/<?= $item['image_path'] ?>" alt="">
                                        </label>

                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 p-0 col-md-12 mx-auto mb-4">
                                <div class="col-xl-12 p-0 col-lg-12 col-md-12">
                                    <label for="image">Ảnh đại diện</label>
                                    <input <?php if (!isset($productDetail)) echo 'required' ?> name="image_path" type="file" id="image" accept="image/png, image/jpeg,image/svg" />
                                    <img width="300px" class="mt-2" src="<?php if (isset($productDetail) && $productDetail != false) echo 'admin/uploads/' . $productDetail['image_path'] ?>" id="thumbnail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Ảnh chi tiết</label>
                                <input id="imageDetail" type="file" name="imageDetail[]" multiple value="Chọn ảnh chi tiết">
                                <div id="showImageDetail" class=""></div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="title_sale">Tiêu đề sale
                                </label>
                                <input id="title_sale" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['title_sale'] ?>" name="title_sale" type="text" class="form-control validate" />
                                <div class="form-message"></div>

                            </div>
                            <div class="form-group mb-3">
                                <label for="sku">Mã sản phẩm
                                </label>
                                <input id="sku" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['sku'] ?>" name="sku" type="text" class="form-control validate" />
                                <div class="form-message"></div>

                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="price">Giá sản phẩm
                                    </label>
                                    <input id="price" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['price'] ?>" name="price" type="text" placeholder="0đ-10000000đ" class="form-control validate" data-large-mode="true" />
                                    <div class="form-message"></div>

                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="discount">Giảm giá
                                    </label>
                                    <input id="discount" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['discount'] ?>" name="discount" type="text" class="form-control validate" />
                                    <div class="form-message"></div>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                    <?php if (isset($productDetail) && $productDetail != false) echo "Update ";
                                    else echo "Add " ?>Product
                                    Now</button>
                            </div>
                            <input type="hidden" value="<?php if (isset($productDetail) && $productDetail != false) echo $productDetail['image_path'] ?>" id="checkImage" name="checkImage">
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <?php
    include 'templates/layout/footer.php';
    ?>
    <script src="assets/js/validatorsss.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Validator({
                form: '#form_action_product',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#name', 'Vui lòng nhập tên sản phẩm'),
                    Validator.isRequired('#sku', 'Vui lòng mã sản phẩm'),
                    Validator.isRequired('#price', 'Vui lòng nhập giá'),
                    Validator.isRequired('#content', 'Vui lòng nhập nội dung'),
                    Validator.isRequired('#short_description', 'Vui lòng nhập mô tả ngắn'),
                    Validator.isRequired('#tskt', 'Vui lòng nhập tên đăng nhập'),
                    Validator.isRequired('#discount', 'Vui lòng nhập tên đăng nhập'),
                ],
                onSubmit: "Submit"
            });
        });
    </script>
    <script src="admin/assets/js/product.js"></script>
    <script src="admin/assets/js/vietnamestones.js"></script>

    <script>
        let formattedPrice = new Intl.NumberFormat("en-US", {
            style: 'currency',
            currency: 'USD'
        }).format($('#price').val());
        $('#price').val(formattedPrice);
        $('#price').on('change', function() {
            $price = $('#price').val();
            $price = $price.replaceAll('$', '');
            $price = $price.replaceAll(',', '');
            let formattedPrice = new Intl.NumberFormat("en-US", {
                style: 'currency',
                currency: 'USD'
            }).format($price);
            $('#price').val(formattedPrice);
        })
        let formattedDiscount = new Intl.NumberFormat("en-US", {
            style: 'currency',
            currency: 'USD'
        }).format($('#discount').val());
        $('#discount').val(formattedDiscount);
        $('#discount').on('change', function() {
            $discount = $('#discount').val();
            $discount = $discount.replaceAll('$', '');
            $discount = $discount.replaceAll(',', '');
            let formattedDiscount = new Intl.NumberFormat("en-US", {
                style: 'currency',
                currency: 'USD'
            }).format($discount);
            $('#discount').val(formattedDiscount);
        })

        $(document).ready(function() {
            var productDetailId = <?= isset($productDetail['id']) ? $productDetail['id'] : 'null'; ?>;
            $('.select2').select2()
            $('.select3').select2()
            $('.select4').select2()
            $('#image').change(function() {
                showProductThumbnail(this);
                $('#checkImage').val($('#thumbnail').attr('src'));
            });
            $('#imageDetail').change(function() {
                $("#showImageDetail").html("");
                var files = $("#imageDetail")[0].files;
                for (var i = 0; i < files.length; i++) {
                    printFile(files[i]);
                }
            });

            function printFile(file) {
                const reader = new FileReader();
                reader.onload = (evt) => {
                    $('#showImageDetail').append('<img width="100px" class="m-2" src="' + evt.target.result +
                        '" alt="" />')
                };
                reader.readAsDataURL(file);
            }

            if ($('#form-select-1').val() != -1) {
                $.ajax({
                    type: "GET",
                    url: "admin/ajax/select1.php",
                    data: {
                        form_select_1: $('#form-select-1').val(),
                        productDetailId: <?= isset($productDetail['id']) ? $productDetail['id'] : 'null'; ?>,
                    },
                    success: function(data) {
                        $('#form-select-2').html(data);
                        $('#form-select-3').html(
                            "<option value='-1'>---- Chọn danh mục cấp 3 ----</option>");
                    },

                });
            }
            $('#form-select-1').change(function() {
                $.ajax({
                    type: "GET",
                    url: "admin/ajax/select1.php",

                    data: "form_select_1=" + $('#form-select-1').val(),
                    success: function(data) {
                        $('#form-select-2').html(data);
                        $('#form-select-3').html(
                            "<option value='-1'>---- Chọn danh mục cấp 3 ----</option>");
                    },

                });
            });

            $('#form-select-2').change(function() {
                $.ajax({
                    type: "GET",
                    url: "admin/ajax/select2.php",
                    data: "form_select_2=" + $('#form-select-2').val(),
                    success: function(data) {
                        $('#form-select-3').html(data);
                    },

                });
            });
        })

        $('#name').on('input', function(event) {
            var val = removeVietnameseTones($('#name').val());
            $('#alias').val(val);
        })
    </script>
    <script src="admin/assets/js/build-ckeditor.js"></script>
    <style>
        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }

        .form-group.invalid .input {
            border-color: #f33a58;
        }

        .form-group.invalid .form-message {
            color: #f33a58;
        }

        [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active {
            background: #000;
        }
    </style>
<?php
include_once "templates/layout/header.php";
include_once "templates/layout/sidebar.php";

$products = $product->show();
?>
<link rel="stylesheet" href="admin/assets/table/fonts/icomoon/style.css">

<link rel="stylesheet" href="admin/assets/table/css/owl.carousels.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="admin/assets/table/css/bootstrap.min.css">
<link rel="stylesheet" href="admin/assets/table/css/styles.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <div class="float-right mx-5"><button class="btn btn-danger" onclick="deleteChose()"><i
                    class="fa-solid fa-trash"></i>
                Delete</button>
        </div>
        <div class="table-responsive">

            <table class="table custom-table">
                <thead>
                    <tr>
                        <th scope="col">
                            <label class="control control--checkbox">
                                <input type="checkbox" class="js-check-all" />
                                <div class="control__indicator"></div>
                            </label>
                        </th>
                        <th scope="col">#Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $item) {

                    ?>
                    <tr>
                        <th scope="row">
                            <label class="control control--checkbox">
                                <input type="checkbox" value="<?= $item['id'] ?>" />
                                <div class="control__indicator"></div>
                            </label>
                        </th>
                        <td>
                            <?= $item['id'] ?>
                        </td>
                        <td>
                            <img height="40px" src="admin/uploads/<?= $item['image_path'] ?>" alt="">

                        </td>
                        <td>
                            <?= $item['name'] ?>
                            <small class="d-block"><?= $item['short_description'] ?></small>
                        </td>
                        <td><?= $item['category_id']==null?'Chưa có danh mục' : $category->getNameById($item['category_id']) ?>
                        </td>
                        <td>
                            <a href="admin/product/edit/<?= $item['id'] ?>"><button class="btn btn-primary"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Edit</button></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <ul id="pagination"></ul>
        </div>
    </div>
    <!-- /.content-header -->



    <?php
    include_once 'templates/layout/footer.php';
    ?>
    <script src="assets/js/jquery.twbsPagination.min.js"></script>
    <script src="assets/js/jquery.twbsPagination.js"></script>

    <script>
    $(function() {
        var currentPage = <?php echo $product->page; ?>;
        var totalPage = <?php echo $product->totalPage ?>;
        window.pagObj = $("#pagination").twbsPagination({
            totalPages: totalPage,
            visiblePages: 3,
            startPage: currentPage,
            onPageClick: function(event, page) {
                if (currentPage != page) {
                    let url = "http://localhost/demophp/admin/<?php echo $_GET["slug"] ?>&page=" +
                        page
                    $(location).prop("href", url)
                }
            }
        });
    });


    function deleteChose() {
        swal({
            title: "Xác nhận xóa",
            text: "Bạn có chắc chắn muốn xóa hay không",
            icon: "warning",
            buttons: {
                cancel: "Hk nha",
                confirm: "Lụm"
            },
            showCancelButton: true,
            confirmButtonText: "Lụm",
            cancelButtonText: "Hk nha",
        }).then(function(isConfirm) {
            if (isConfirm) {
                var ids = $('input:checkbox:checked').map(function() {
                    return $(this).val();
                }).get();
                if (ids.length != 0) {
                    swal({
                        text: "Đã xóa thành công",
                        icon: "success",
                    }).then(function() {
                        deleteNew(ids);
                    })
                } else {
                    swal({
                        text: "You not choose brand closed",
                        icon: "warning",
                    }).then(function() {
                        // window.location.href = "/brand?message=error_system";
                    })
                }
            }
        });
    }

    function deleteNew(data) {
        $.ajax({
            url: 'admin/ajax/deleteProduct.php',
            type: 'POST',
            data: {
                ids: data
            },
            success: function(result) {
                window.location.href = "admin/product";

            },
            error: function(error) {
                window.location.href = "/brand?page=1&limit=4&message=error_system";
            }
        });
    }
    </script>


    <style>
    /* .table tbody th,
        .table tbody td {
            padding: 30px 10px;
            text-align: center;
        }

        .table thead th {
            padding: 30px;
            text-align: center;

        }

        .ftco-section {
            padding-top: 50px;
        }

        .table tbody td .close span {
            font-size: 20px;
            color: var(--main-color);
        } */
    </style>
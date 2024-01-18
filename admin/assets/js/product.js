

function showProductThumbnail(fileInput) {
    file = fileInput.files[0];
    reader = new FileReader();
    reader.onload = function (e) {
        $('#thumbnail').attr('src', e.target.result);
    };
    reader.readAsDataURL(file);
}
$('#price').on('input', function () {
    $price = $('#price').val();
    $price = $price.replaceAll('$', '');
    $price = $price.replaceAll(',', '');
    if ($price > 10000000) {
        $('#price').val(10000000);
    } else if ($price < 0) {
        $('#price').val(0);
    }
})
$('#discount').on('input', function () {
    $discount = $('#discount').val();
    $discount = $discount.replaceAll('$', '');
    $discount = $discount.replaceAll(',', '');
    if ($discount > 10000000) {
        $('#discount').val(10000000);
    } else if ($discount < 0) {
        $('#discount').val(0);
    }
})


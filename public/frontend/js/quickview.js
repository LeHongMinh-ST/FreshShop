$(document).ready(function () {
    $(".quickviewProduct").click(function (event) {
        event.preventDefault();
        let id = $(this).attr("data-product");
        $.ajax({
            url: '/ajax/quickProduct/' + id,
            type: "get",
            dataType: "",
            data: {},
            success: function (result) {
                result = JSON.parse(result);
                var price_sell = Intl.NumberFormat('de-DE', {
                    style: 'currency',
                    currency: 'VND'
                }).format(result.price_sell);

                if (result.sale != null) {
                    var a = Intl.NumberFormat('de-DE', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(result.sale.price_sale);
                }
                $(".product_id").val(id);
                $("#quickImage").attr('src', 'http://127.0.0.1:8000/storage/images/product/avatar/' + result.avatar);
                $(".product-info h1").text(result.name);
                if (result.sale != null) {
                    $(".special-price span").html("<strike>" + price_sell + "</strike> " + a + "<span class='badge badge-dange' style='background-color: red'>Sale</span>")
                } else {
                    $(".special-price span").text(price_sell);
                }
                $(".see-all").attr('href', 'Product/detail/' + result.slug);
                $(".single_add_to_cart_button").attr('product_id', id);
                $("#productModal").modal("show");
            }
        });
    });

    $(".single_add_to_cart_button").click(function (event) {
        event.preventDefault();
        let id = $(this).attr('product_id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/Cart/create",
            type: "post",
            dateType: "",
            data: {
                'id': id,
                '_token': $('input[name=_token]').val(),
                'qty': $('input[name=qty]').val(),
            },
            success: function (result) {
                $(".number_cart").text(result);
                $(".alert-create").text('Thêm thành công');
            }
        });
    });
});


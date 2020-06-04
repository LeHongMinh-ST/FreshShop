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
                console.log(result);
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
                $('#french-hens').attr('max', result.remain);
                if (result.remain == 0 && result.status == 2) {
                    $(".single_add_to_cart_button").attr('disabled', true);
                }
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
            url: "/Cart/createAjax",
            type: "post",
            dateType: "",
            data: {
                'id': id,
                '_token': $('input[name=_token]').val(),
                'qty': $('input[name=qty]').val(),
            },
            success: function (result) {
                $("#productModal").modal("hide");
                Swal.fire({
                    icon: 'success',
                    title: 'Thông báo',
                    text: 'Thêm thành công sản phẩm vào giỏ hàng',
                    footer: '<a href="/Cart">Xem giỏ hàng</a>'
                })
            }
        });
    });

    if ($(".success").length) {
        let message = $(".success").text();
        Swal.fire({
            icon: 'success',
            title: 'Thông báo',
            text: message,
            footer: '<a href="/Cart">Xem giỏ hàng</a>'
        })
    } else if ($(".rate-success").length) {
        let message = $(".rate-success").text();
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    }

    if ($(".cart-success").length) {
        let message = $(".cart-success").text();
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    }


    $(".list_star .fa").click(function () {
        let count = $(this).attr('data_key');
        $(".list_star .fa").removeClass('rate_active');
        $(".list_star .fa").css('color', 'black');
        $(".rate").val(0);
        $.each($(".list_star .fa"), function (key, value) {
            if (key + 1 <= count) {
                $(this).addClass('rate_active');
                $(this).css('color', 'orange');
            }
        });

        $(".rate").val($(".list_star .rate_active").length);
        if ($(".rate").val() > 0) {
            $('.btn-rate').attr('disabled', false);
        }
    });


});


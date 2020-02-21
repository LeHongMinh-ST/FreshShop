$(document).ready(function () {
    $('.import').click(function (event) {
        event.preventDefault();
        let clicked = $(this);
        let id = $(this).attr('data-product');
        $("#exampleModalCenter").modal("show");
        $(".import_success").click(() => {
            let qty = $(".qty").val();

            $.ajax({
                url: '/admin/Import/store',
                type: "post",
                dataType: "",
                data: {
                    'id': id,
                    '_token': $('input[name=_token]').val(),
                    'qty': $('input[name=qty]').val(),
                },
                success: function (result) {
                    if (result == 1)
                    {
                        $(clicked).addClass("imported");
                        $("#exampleModalCenter").modal('hide');
                        $(".imported").remove();
                    }

                    $("#row_"+ id + " .badge-warning").addClass("badge-info");
                    $("#row_"+ id + " .badge-warning").text("Đã thêm vào đơn nhập");
                    $("#row_"+ id + " .badge-warning").removeClass("badge-warning");
                    $(".btn-import").css('display','block');

                }
            });
        });
    })
});

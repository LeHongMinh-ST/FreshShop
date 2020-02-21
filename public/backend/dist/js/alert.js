$(document).ready(function(){
    if($(".success").length){
        let message = $(".success").text();
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 3000
        })
    }

    if($(".error").length){
        let message = $(".error").text();
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: message,
            showConfirmButton: false,
            timer: 3000
        })
    }

//===Cảnh báo của sản phẩm====
    //Gỡ sản phẩm
    $(".delete-form").click(function(event){
        event.preventDefault();
        Swal.fire({
            title: 'Bạn có chắc chắn muốn gỡ?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Gỡ !'
        }).then((result) => {
            if(result.value){
                $(this).submit();
            }
        })
    });

    //Xóa tất cả
    $(".deleteAll-form").click(function(event){
        event.preventDefault();
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa tất cả?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa !'
        }).then((result) => {
            if(result.value){
                $(this).submit();
            }
        })
    });

    //Xóa cứng 1 sản phẩm
    $(".focus-delete").click(function(event){
        event.preventDefault();
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa !'
        }).then((result) => {
            if(result.value){
                $(this).submit();
            }
        })
    });

    //Khôi phục sản phẩm
    $(".restore").click(function(event){
        event.preventDefault();
        Swal.fire({
            title: 'Bạn có muốn khổi phục sản phẩm?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Khôi phục !'
        }).then((result) => {
            if(result.value){
                $(this).submit();
            }
        })
    });

    $(".restoreAll").click(function(event){
        event.preventDefault();
        Swal.fire({
            title: 'Bạn có muốn khổi phục tất cả sản phẩm?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Khôi phục !'
        }).then((result) => {
            if(result.value){
                $(this).submit();
            }
        })
    });
});

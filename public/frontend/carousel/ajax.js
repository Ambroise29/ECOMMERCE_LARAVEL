$(document).ready(function() {
    $('.addto-cat').click(function(e) {
        e.preventDefault();
        var id_prod = $(this).closest('.data_product').find('.id_prod').val();
        var qts = $('.input-qts').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "post",
            url: "/addto-cat",
            data: {
                'id_prod': id_prod,
                'qts': qts,

            },
            success: function(response) {
                swal(response.status)

            }
        });
    });

    $('.addto-souhait').click(function(e) {
        e.preventDefault();
        var id_prod = $(this).closest('.data_product').find('.id_prod').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "post",
            url: "/addto-souhait",
            data: {
                'id_prod': id_prod,

            },
            success: function(response) {
                swal(response.status)

            }
        });
    });

    $('.decremente-btn').click(function(e) {
        e.preventDefault();
        var value_incre = $(this).closest('.data-qts').find('.input-qts').val();
        value = parseInt(value_incre, 10);
        if (value > 1) {
            value--;
            $(this).closest('.data-qts').find('.input-qts').val(value);
        }
    });


    $('.incremente-btn').click(function(e) {
        e.preventDefault();
        var value_incre = $(this).closest('.data-qts').find('.input-qts').val();
        value = parseInt(value_incre, 10);
        if (value < 10) {
            value++;
            $(this).closest('.data-qts').find('.input-qts').val(value);
        }
    });

    $('.modifier-qts').click(function(e) {
        e.preventDefault();
        var id_prod = $(this).closest('.data-qts').find('.id_prod').val();
        var qts = $(this).closest('.data-qts').find('.input-qts').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "post",
            url: "/update-tocat",
            data: {
                'id_prod': id_prod,
                'qts': qts,

            },
            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");

            }
        });
    });


    $('.delete-btn').click(function(e) {
        e.preventDefault();
        var id_prod = $(this).closest('.data-qts').find('.id_prod').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "post",
            url: "/deleteto-cat",
            data: {
                'id_prod': id_prod,


            },
            success: function(response) {
                window.location.reload();
                swal("", response.status, "success");

            }
        });
    })

});
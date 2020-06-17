/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

/**
 * Require your custom js files
 */

// require('./my-javascript-file');
// require('./subfolder/my-javascript-file');

/**
 * Custom javascript can also be included below
 */

$('document').ready(function () {

    // Add product to basket by id
    $('.btn-add-to-basket').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('product-id');
        $.ajax({
            url: 'ajax/addToBasket.php',
            type: 'post',
            data: 'id=' + id,
            success: function () {
                $("#test-basket").load(" #test-basket");
            }
        })
    })


    //Remove all products from basket
    $('.btn-clear-basket').on('click', function () {
            if (confirm('Are you sure you want to delete all products from basket?')) {
                $.ajax({
                    url: 'ajax/clearBasket.php',
                    success: function () {
                        $("#test-basket").load(" #test-basket");
                    }
                })
            }
        }
    )


});



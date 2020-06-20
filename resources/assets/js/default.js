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
        let qty = $(this).closest('div.card-footer').find('.product-qty').val();
        $.ajax({
            url: 'ajax/addToBasket.php',
            type: 'post',
            data: {
                id: id,
                quantity: qty
            },
            success: function () {
                $("#test-basket").load(" #test-basket");
            }
        })
    });

    // Quantity validation (allowable range from 1 to 99 pcs)
    $('.product-qty').each(function (key, object) {
        $(object).change(function () {
            let value = $(object).val();
            if (value <= 0) {
                $(object).val(1);
            } else if (value > 99) {
                $(object).val(99)
            }
        });
    });

    // Remove all products from basket
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



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
            url: 'ajax/basketActions.php',
            type: 'post',
            data: {
                id: id,
                quantity: qty,
                action: 'add'
            },
            success: function () {
                setTimeout(function () { //Basket icon shake animation, after product is added to basket
                    $('#basket-popover').addClass('shake');
                    setTimeout(function () {
                        $('#basket-popover').removeClass('shake');
                    }, 500);
                }, 100);
                $('#basket-popover').popover('hide');
                $("#popover-content-wrap").load(location.href + " #popover-content-wrap", "");
                $(".total_price").load(location.href + " .total_price", "");
            }
        })


    });


// Remove all products from basket
    $('body').on('click', '#btn-clear-all', function (e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete all products from basket?')) {
            $.ajax({
                url: 'ajax/basketActions.php',
                type: 'post',
                data: 'action=clear',
                success: function () {
                    $('#basket-popover').popover('hide');
                    $("#popover-content-wrap").load(location.href + " #popover-content-wrap", "");
                    $(".total_price").load(location.href + " .total_price", "");
                }
            })
        }
    });


// Remove from basket single product
    $('body').on('click', '.btn-remove-product', function (event) {
        event.preventDefault();
        let id = this.id;
        $.ajax({
            url: 'ajax/basketActions.php',
            type: 'post',
            data: {
                id: id,
                action: 'del'
            },
            success: function () {
                $('#basket-popover').popover('hide');
                $("#popover-content-wrap").load(location.href + " #popover-content-wrap", "");
                $(".total_price").load(location.href + " .total_price", "");
            }
        })
    });


    // Quantity validation (allowable range from 1 to 99 pcs)
    $('.product-qty').each(function (key, object) {
        $(object).change(function () {
            let value = $(object).val();
            if (value <= 0) {
                alert('invalid value (allowed from 1 to 99)');
                $(object).val(1);
            } else if (value > 99) {
                alert('invalid value (allowed from 1 to 99)');
                $(object).val(99)
            }
        });
    });

// Basket popover content
    $('#basket-popover').popover({
        html: true,
        placement: 'auto',
        container: 'body',
        content: function () {
            return $('#popover-content-wrap').html()
        }
    });

// Hide popover when clicking outside
    $('body').on('click', function (e) {
        $('[data-toggle="popover"]').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });


// Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            let forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            let validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();


});



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

import {auto} from "@popperjs/core";

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
            $('#basket-popover').popover('hide');
            $("#popover-content-wrap").load(location.href+" #popover-content-wrap","");
            $(".total_price").load(location.href+" .total_price","");
            }
        })
    });


// Remove all products from basket
    $('body').on('click', '#btn-clear-all', function(e) {
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
        let id = event.target.id;
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
                $(".total_price").load(location.href+" .total_price","");
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




});



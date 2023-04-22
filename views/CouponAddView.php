<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- <head> -->
    <title>My Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .error,
        .required {
            color: red;
        }
    </style>
</head>

<body>

    <form action="" method="post" id="createACouponForm" name="createACouponForm">
        <div>
            <!--  id, code, discount, validity start, validity end  -->
            <div class="form-group">
                <label>code</label>
                <input type="text" name="coupon_code" id="coupon_code" value="" class="form-control" placeholder="code">
            </div>
            <div class="form-group">
                <label>discount</label>
                <input type="text" name="coupon_discount" id="coupon_discount" value="" class="form-control" placeholder="discount">
            </div>
            <div class="form-group">
                <label>validity start</label>
                <input type="text" name="coupon_validity_start" id="coupon_validity_start" value="" class="form-control" placeholder="coupon_validity_start">
            </div>
            <div class="form-group">
                <label>validity end</label>
                <input type="text" name="coupon_validity_end" id="coupon_validity_end" value="" class="form-control" placeholder="coupon_validity_end">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="<?php echo base_url() . 'index.php/CouponController/list' ?>">view all coupons</a>
        </div>
    </form>

    <script>
        $('document').ready(function() {
            $('#createACouponForm').validate({
                ignore: [],
                rules: {
                    coupon_code: {
                        required: true,
                    },
                    coupon_discount: {
                        required: true,
                    },
                    coupon_validity_start: {
                        required: true,
                    },
                    coupon_validity_end: {
                        required: true,
                    },
                },
                messages: {
                    coupon_code: {
                        required: "Coupon Code is required.",
                    },
                    coupon_discount: {
                        required: "Coupon discount is required.",
                    },
                    coupon_validity_start: {
                        required: "Start date is required.",
                    },
                    coupon_validity_end: {
                        required: "End date is required.",
                    },
                },
                errorPlacement: function(error, element) {
                    if (element.hasClass('content')) {
                        error.insertAfter(element.closest('div.form-group').find('.content-error'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {

                    //values ko liya form se 
                    var coupon_code = $('#coupon_code').val();
                    var coupon_discount = $('#coupon_discount').val();
                    var coupon_validity_start = $('#coupon_validity_start').val();
                    var coupon_validity_end = $('#coupon_validity_end').val();
                    // console.log(coupon_code);

                    //post kiye
                    $.post('<?php echo base_url(); ?>' + 'index.php/CouponController/insert', {

                            coupon_code: coupon_code,
                            coupon_discount: coupon_discount,
                            coupon_validity_start: coupon_validity_start,
                            coupon_validity_end: coupon_validity_end,

                        }),
                        //woh insertdata
                        function(response) {
                            $("html, body").animate({
                                scrollTop: 0
                            }, "slow");
                            $('#headerMsg').empty();
                            if (response.status == 200) {
                                var message = response.message;

                                $('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                                $("#headerMsg").fadeTo(2000, 500).slideUp(500, function() {
                                    $('#headerMsg').remove();
                                    window.location.href = APP_URL + 'admin/coupon/coupon_view';
                                });

                            } else if (response.status == 201) {
                                $('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                                $("#headerMsg").fadeTo(2000, 500).slideUp(500, function() {
                                    $('#headerMsg').empty();
                                });
                            }

                        }


                }

            });
        })
    </script>
</body>
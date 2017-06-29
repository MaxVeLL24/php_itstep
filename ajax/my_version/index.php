<?php
require_once 'autoloader.php';
require_once 'product.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <!-- Button trigger modal -->

    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        Sign Up
    </button>
    <div class="cart-wraper" style="display: inline-block">
        <button type="button" class="btn btn-primary btn-cart" data-toggle="modal">
            <span class="glyphicon glyphicon-shopping-cart"></span>
        </button>
        <div class="cart">
            <div class="row cart-product">
                <div class="col-md-3">
                    <img src="img/1.jpg" alt="">
                </div>
                <div class="col-md-4">
                    Title
                </div>
                <div class="col-md-3">
                    price
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-remove"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form id="register" class="modal-content" action="login.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Sign up fo free</h4>
                </div>
                <div class="modal-body">
                    <div class="form-wrapper">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1">@</span>
                                    <input type="email" class="form-control" name="login" placeholder="Enter your email"
                                           aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><span
                                                class="glyphicon glyphicon-ok-sign"></span></span>
                                    <input type="password" class="form-control" name="password"
                                           placeholder="Enter your password"
                                           aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon3"><span
                                                class="glyphicon glyphicon-ok-sign"></span></span>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name"
                                           aria-describedby="sizing-addon2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon4"><span
                                                class="glyphicon glyphicon-ok-sign"></span></span>
                                    <input type="text" class="form-control" name="age" placeholder="Enter your age"
                                           aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <h1>Products</h1>
    <hr>
    <?php
    $products = product::getAllProducts();

    ?>
    <div class="row">
        <?php
        foreach ($products as $product):
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="img/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                    <div class="caption">
                        <h3><?= $product['name'] ?></h3>
                        <p>
                    <span class="price">
                        Price: <?= $product['price'] ?>
                    </span>
                        </p>
                        <p class="description">
                            <?= $product['description'] ?>
                        </p>
                        <p><a href="#" class="btn btn-primary add-to-cart" role="button">Buy</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script>
        function SignUp() {
            $("input[type=email]").onkeyup();
            jQuery.ajax({
                url: "validate.php",
                data: 'email=' + $(this).val(),
                type: "POST",
                success: function (data) {
                    $("#sizing-addon1").style = "background:green";
                },
                error: function () {
                }
            });
        }
        $(document).ready(function () {
            $('btn-cart').click(function (e) {
                var cart = $(this).parent().find('.cart');
                if (cart.hasClass('open')){
                    cart.removeClass('open');
                    cart.hide();
                }

            })
        }
    </script>

</body>
</html>
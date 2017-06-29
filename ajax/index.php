<?php
require_once 'Product.php';
require_once 'autoloader.php';
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
    <div class="cart-wrapper">
        <button type="button" class="btn btn-default btn-cart" aria-label="Left Align">
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
        </button>
        <?php
            $productsInCart = Product::getProductsFromCart();
        ?>
        <div class="cart">
            <?php
            if($productsInCart):
                foreach ($productsInCart as $item):
            ?>
            <div class="row product">
                <div class="col-md-3">
                    <img src="/imgs/<?=$item['img']?>" alt="<?=$item['name']?>">
                </div>
                <div class="col-md-4">
                    <?=$item['name']?>
                </div>
                <div class="col-md-3">
                    <?=$item['price']?>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-default" data-id="<?= $item['id'] ?>" aria-label="Left Align">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <?php
                endforeach;
                endif;
            ?>

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
                                    <span class="input-group-addon" id="sizing-addon2">@</span>
                                    <input type="email" class="form-control" placeholder="Enter your email" name="login"
                                           aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon " id="sizing-addon2"><span
                                                class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                                    <input type="password" class="form-control" placeholder="Enter your password"
                                           name="password" aria-describedby="sizing-addon2">
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><span
                                                class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                                    <input type="text" class="form-control" placeholder="Enter your name" name="name"
                                           aria-describedby="sizing-addon2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon2"><span
                                                class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                                    <input type="text" class="form-control" placeholder="Enter your age" name="age"
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
    $products = Product::getAllProducts();
    ?>

    <div class="row">
        <?php
        foreach ($products as $product):
            ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="imgs/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                    <div class="caption">
                        <h3 class="product-title"><?= $product['name'] ?></h3>
                        <p>
                            <span class="product-price"><?= $product['price'] ?>$</span></p>
                        <p>
                        <p class="product-description"><?= $product['description'] ?></p>

                        <a href="#" class="btn btn-primary add-to-cart" data-id="<?= $product['id'] ?>" role="button">Buy</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        $(document).ready(function () {

            var time;
            $('input[name=login]').keyup(function (e) {
                clearTimeout(time);
                var login = $(this).val();
                time = setTimeout(function () {
                    validateLogin(login);
                }, 2000);
            });

            function validateLogin(login) {
                $.ajax({
                    url: "validate.php",
                    type: "post",
                    data: {'login': login},
                    success: function (response) {
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }


                });
            }

            $('.btn-cart').click(function (e) {
                var cart = $(this).parent().find('.cart');
                if(cart.hasClass('open')){
                    cart.removeClass('open');
                    cart.hide();
                } else {
                    cart.addClass('open');
                    cart.show();
                }
            });

            $('.add-to-cart').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                addToCart(id);
            });

            function addToCart(id) {
                $.ajax({
                    url: "cart.php",
                    type: "post",
                    data: {'id': id},
                    beforeSend: function (e) {
                        
                    },
                    success: function (response) {
                        var product = JSON.parse(response);
                        var item = '<div class="row product">'+
                            '<div class="col-md-3">' +
                            '<img src="/imgs/'+ product.img +'" alt="' + product.name + '">' +
                            '</div>' +
                            '<div class="col-md-4">' +
                            product.name +
                            '</div>' +
                            '<div class="col-md-3">' +
                            product.price +
                            '</div>' +
                            '<div class="col-md-2">' +
                            '<button type="button" class="btn btn-default" data-id="'+ product.id +'" aria-label="Left Align">' +
                            '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' +
                            '</button>' +
                            '</div>' +
                            '</div>';
                        $('.cart').append(item);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }


                });
            }
        });
    </script>

</div>
</body>
</html>
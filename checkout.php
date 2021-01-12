<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/style.css" />
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="assets/images/logo.png" alt="" width="150px">
            <h1 class="d-none d-sm-block">Shopping</h1>
            <div>
                <a href="index.php" class="btn btn-outline-primary button"><i
                        class="fas fa-shopping-cart cart-icon"></i>Home</a>
            </div>
        </div>
        <div class="d-block d-sm-none" style="padding: 0px 0px 15px 15px;color:rgb(133,133,134)">
            <h1>Shopping</h1>
        </div>
    </div>
    <div class="container">
        <form action="payment.php" method="post" id="checkout_form">
            <div class="row">
                <div class="col-lg-7">
                    <h3>Billing details</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <label for="first-name" class="fw-500">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" />
                        </div>
                        <div class="col-md-6">
                            <label for="last-name" class="fw-500">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" />
                        </div>
                    </div>
                    <div>
                        <label for="company_name" class="fw-500">company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" />
                    </div>
                    <div>
                        <label for="country" class="fw-500">Country/Region</label>
                        <select name="country" id="country" class="form-control">
                            <option value="">Select Country</option>
                            <option value="india">India</option>
                        </select>
                    </div>
                    <div>
                        <label for="address" class="fw-500">Street Address</label>
                        <input type="text" id="address1" class="form-control" name="address1"
                            placeholder="House No and Street Name" />
                        <input type="text" id="address2" class="form-control" name="address2"
                            placeholder="Apartment, suite, unit, etc. (optional)" />
                    </div>
                    <!-- city -->
                    <div>
                        <label for="address" class="fw-500">Town/City</label>
                        <input type="text" id="city" class="form-control" name="city" />
                    </div>
                    <!-- STATE -->
                    <div>
                        <label for="state" class="fw-500">State</label>
                        <input type="text" id="state" class="form-control" name="state" />
                    </div>
                    <!-- Postcode -->
                    <div>
                        <label for="postcode" class="fw-500">Postcode/Zip</label>
                        <input type="text" id="postcode" class="form-control" name="postcode" />
                    </div>
                    <!-- phone -->
                    <div>
                        <label for="phone" class="fw-500">Phone</label>
                        <input type="text" id="phone" class="form-control" name="phone" />
                    </div>
                    <!-- email -->
                    <div>
                        <label for="email" class="fw-500">Email Address</label>
                        <input type="email" id="email" class="form-control" name="email"
                            placeholder="example@gamil.com" />
                    </div>
                    <div class="checkbox">
                        <label style="font-size: 24px; font-weight: 500;margin-top:40px"><input type="checkbox"
                                id="check" name="check" style="height: 17px;width: 17px;margin-right: 15px;">Ship to a
                            Same address?</label>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-6">
                            <label for="shipping_first-name" class="fw-500">First Name</label>
                            <input type="text" id="shipping_first_name" class="form-control"
                                name="shipping_first_name" />
                        </div>
                        <div class="col-md-6">
                            <label for="shipping_last-name" class="fw-500">Last Name</label>
                            <input type="text" class="form-control" id="shipping_last_name" name="shipping_last_name" />
                        </div>
                    </div>
                    <div>
                        <label for="shipping_company_name" class="fw-500">company Name</label>
                        <input type="text" class="form-control" id="shipping_company_name"
                            name="shipping_company_name" />
                    </div>
                    <div>
                        <label for="shipping_country" class="fw-500">Country/Region</label>
                        <select name="shipping_country" id="shipping_country" class="form-control">
                        <option value="">Select Country</option>
                        <option value="india">India</option>
                        </select>
                    </div>
                    <div>
                        <label for="shipping_address" class="fw-500">Street Address</label>
                        <input type="text" id="shipping_address1" class="form-control" name="shipping_address1" placeholder="House No and Street Name" />
                        <input type="text" id="shipping_address2" class="form-control" name="shipping_address2" placeholder="Apartment, suite, unit, etc. (optional)" />
                    </div>
                    
                    <!-- city -->
                    <div>
                        <label for="shipping_city" class="fw-500">Town/City</label>
                        <input type="text" id="shipping_city" class="form-control" name="shipping_city" />
                    </div>
                    <!-- STATE -->
                    <div>
                        <label for="shipping_state" class="fw-500">State</label>
                        <input type="text" id="shipping_state" class="form-control" name="shipping_state" />
                    </div>
                    <!-- Postcode -->
                    <div>
                        <label for="shipping_postcode" class="fw-500">Postcode/Zip</label>
                        <input type="text" id="shipping_postcode" class="form-control" name="shipping_postcode" />
                    </div>
                    <!-- phone -->
                    <div>
                        <label for="shipping_phone" class="fw-500">Phone</label>
                        <input type="text" id="shipping_phone" class="form-control" name="shipping_phone" />
                    </div>
                    <!-- email -->
                    <div>
                        <label for="shipping_email" class="fw-500">Email Address</label>
                        <input type="email" id="shipping_email" class="form-control" name="shipping_email"
                            placeholder="example@gamil.com" />
                    </div>
                    
				</div>
                <div class="col-lg-4 orderheader">
                    <h4>Your Order</h4>
                    <table class="table">
                        <thead>
                            <th>Product</th>
                            <th class="t-right">Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                            $items = $_SESSION['cart']['item_name'];
                            $item = $_SESSION['cart'];
                            $subTotalofAllitemintoQty = 0;
                            $totalwithtax = 0;
                            for ($i=0 ; $i < count($items); $i++) {
                                $totalPriceintoQty = $item['item_price'][$i]*$item['item_qty'][$i];
                                $subTotalofAllitemintoQty += $totalPriceintoQty;
                                $tax = $subTotalofAllitemintoQty*5/100;
                                $mainpaymentAmmount = round($subTotalofAllitemintoQty+$tax+100);
                            ?>
                            <tr>
                                <td><?php echo $item['item_name'][$i]." * Qty(".$item['item_qty'][$i].")"; ?></td>
                                <td class="t-right">₹ <?php echo $totalPriceintoQty; ?></td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <th>SubTotal</th>
                                <th class="t-right">₹ <?php echo $subTotalofAllitemintoQty ?></th>
                            </tr>
                            <tr>
                                <th>Tax(5%)</th>
                                <th class="t-right">₹ <?php echo $tax; ?></th>
                            </tr>
                            <tr>
                                <th>Shipping Charge</th>
                                <th class="t-right">₹ 100</th>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th class="t-right">₹ <?php echo $mainpaymentAmmount; ?></th>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="payment_price" value="<?php echo $mainpaymentAmmount; ?>">
                    <!-- button for submit -->
                    <button type="submit" class="btn btn-primary"
                        style="margin: 30px 0px;padding: 8px 25px;width:100%">Process to Pay</button>
                </div>
            </div>
        </form>
    </div>
    <div class="footer text-center">
        <p class="mb-0">@copyright-2022</p>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
$(document).ready(function() {

    $("#check").on('change', function() {
        if (this.checked) {
            console.log('true');
            $("#shipping_first_name").val($('#first_name').val());
            $("#shipping_last_name").val($('#last_name').val());
            $("#shipping_company_name").val($('#company_name').val());
            $("#shipping_country").val($('#country').val());
            $("#shipping_address1").val($('#address1').val());
            $("#shipping_address2").val($('#address2').val());
            $("#shipping_city").val($('#city').val());
            $("#shipping_state").val($('#state').val());
            $("#shipping_postcode").val($('#postcode').val());
            $("#shipping_phone").val($('#phone').val());
            $("#shipping_email").val($('#email').val());
        } else {
            $("#shipping_first_name").val('');
            $("#shipping_last_name").val('');
            $("#shipping_company_name").val('');
            $("#shipping_country").val('');
            $("#shipping_address1").val('');
            $("#shipping_address2").val('');
            $("#shipping_city").val('');
            $("#shipping_state").val('');
            $("#shipping_postcode").val('');
            $("#shipping_phone").val('');
            $("#shipping_email").val('');
        }
    });
});
</script>



<script src="assets/jquery.validate.min.js"></script>

<script language="javascript">
$(document).ready(function() {

    $("#checkout_form").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            company_name: "required",
            country: "required",

            address1: {
                required: true,
                minlength: 10
            },

            city: "required",
            state: "required",
            postcode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            },
            phone: {
                required: true,
                digits: true
            },
            email: {
                required: true,
                email: true
            },
            shipping_first_name: "required",
            shipping_last_name: "required",
            shipping_company_name: "required",
            shipping_country: "required",

            shipping_address1: {
                required: true,
                minlength: 10
            },

            shipping_city: "required",
            shipping_state: "required",
            shipping_postcode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            },
            shipping_phone: {
                required: true,
                digits: true
            },
            shipping_email: {
                required: true,
                email: true
            },
        },
        messages: {

            first_name: "Please specify your First name.",
            last_name: "Please specify your Last name.",
            company_name: "Please specify your Company name.",
            country: "Please specify your Country name.",
            address1: {
                required: "Please specify your Billing Address1.",
                minlength: "Please specify your Billing Address1 is minimum 10 Character."
            },
            city: "Please specify your City.",
            state: "Please specify your State.",
            postcode: {
                required: "Please specify your Pincode/Zip.",
                digits: "Please specify your Pincode/Zip in number.",
                minlength: "Please Specify valid Pincode/Zip.",
                maxlength: "Please Specify valid Pincode/Zip."
            },
            phone: {
                required: "Please specify your Phone-No.",
                digits: "Please specify your Phone-No in number."
            },
            email: {
                required: "We need your email address to contact you.",
                email: "Your email address must be in the format of name@domain.com."
            },
            shipping_first_name: "Please specify your First name.",
            shipping_last_name: "Please specify your Last name.",
            shipping_company_name: "Please specify your Company name.",
            shipping_country: "Please specify your Country name.",
            shipping_address1: {
                required: "Please specify your Billing Address1.",
                minlength: "Please specify your Billing Address1 is minimum 10 Character."
            },
            shipping_city: "Please specify your City.",
            shipping_state: "Please specify your State.",
            shipping_postcode: {
                required: "Please specify your Pincode/Zip.",
                digits: "Please specify your Pincode/Zip in number.",
                minlength: "Please Specify valid Pincode/Zip.",
                maxlength: "Please Specify valid Pincode/Zip."
            },
            shipping_phone: {
                required: "Please specify your Phone-No.",
                digits: "Please specify your Phone-No in number."
            },
            shipping_email: {
                required: "We need your email address to contact you.",
                email: "Your email address must be in the format of name@domain.com."
            }
        },
        errorPlacement: function(){
            return false;  // suppresses error message text
        },
        errorElement : 'div',
        errorLabelContainer: '.errorTxt'
    });
});
</script>

</html>
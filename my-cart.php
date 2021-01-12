<?php
include 'config.php';
if (!isset($_SESSION['cart']) || count($_SESSION['cart']['item_name']) <= 0 ) {
    header('Location: index.php');
}
$cart = $_SESSION['cart'];
	// echo "<pre>";
	// print_r($_SESSION['cart']);
    // exit;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <title></title>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="assets/images/logo.png" alt="" width="150px">
			<h1>Shopping</h1>
			<div>
				<a href="index.php" class="btn btn-outline-primary button"><i class="fas fa-shopping-cart cart-icon"></i>Home</a>
			</div>
			
		</div>
	</div>
    <section class="card cart-tab">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">My Cart</a>
			</li>
		</ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Expired Tickets</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Remove</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						$subTotal = "";
						$taxPrice = "";
						$grandTotal = "";
						$shipping_charge = 100;
						for ($i=0;$i<count($cart['item_id']);$i++){
							$total = $cart['item_price'][$i]*$cart['item_qty'][$i];
							@$subTotal += $total;
							$taxPrice = $subTotal*5/100;
							$grandTotal = $subTotal+$taxPrice+$shipping_charge;
						?>
                        <tr>
                            <td>
                                <div>
                                    <div class="table-img float-left mr-4">
                                        <img class="rounded imagesize" src="<?php echo $cart['item_image'][$i]; ?>">
                                    </div>
                                    <div class="table-img-text text-left">
                                        <div class="product-head">
                                            <h3><?php echo $cart['item_name'][$i]; ?></h3>
                                        </div>
                                    </div>
                                </div>
							</td>
							<td>
								<input data-id="<?php echo $cart['item_id'][$i]; ?>" class="form-conroll quantity" type="number" value="<?php echo $cart['item_qty'][$i]; ?>" min="1">
							</td>
							<td>
								<?php echo $cart['item_price'][$i]; ?>
							</td>
                            <td>
                                <a href="javascript:;" data-id="<?php echo $cart['item_id'][$i]; ?>" class="column-remove">&times;</a>
                            </td>
                            <td class="table-amount">
								₹ <p style="display: inline;" id="subtotal"><?php echo $total; ?></p>
                            </td>
						</tr>
						<?php } ?>
                        <tr>
                            <td colspan="3" rowspan="4"></td>
                            <td>
                                subtotal
                            </td>
                            <td class="table-amount">
								₹ <p style="display: inline;" id="subtotal"><?php echo $subTotal; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tax(5%)
                            </td>
                            <td class="tax">
								₹ <p style="display: inline;" id="subtotal"><?php echo $taxPrice; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Shipping Charge
                            </td>
                            <td class="shipping-charge">
								₹ <p style="display: inline;" id="shipping_charge"><?php echo $shipping_charge; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Grand Total
                            </td>
                            <td class="grand-total">
								₹ <p style="display: inline;"><?php echo $grandTotal; ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <a href="checkout.php" class="btn btn-primary blue-btn mt-5 mb-5" style="padding: 12px 0px;">Checkout</a>
			</div>
    </section>

	<script src="assets/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script>
		$('.quantity').on('click', function(){
			var qty = $('.quantity').val();
			var id = $(this).data('id');
			console.log(id);
			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				data: {
					flag : 'update_cart',
					pro_id : id,
					pro_qty : qty,
				},
				success: function(data) {
					console.log(data);
					location.reload();
				}
			});
		});

		$('.column-remove').on('click', function(){
			var id = $(this).data('id');
			$.ajax({
				url: 'ajax.php',
				type: 'POST',
				data:{
					flag : 'delete_cart_item',
					pro_id : id
				},
				success: function(data){
					console.log(data);
					location.reload();
				}
			});
		});
	</script>
</body>

</html>
<!-- set up the modal to start hidden and fade in and out -->
<div id="mc_choosepayment_modal" class="modal hide fade">
    <!-- dialog contents -->
      <div class="modal-header">
      	<div class="shoprocketLogo"><a href="http://shoprocket.co/" target="_blank" id="ShoprocketLogo"><img  src="<?php echo $resourceurl;?>/images/shoprocket.png"/></a></div>
        <button type="button" class="close" data-dismiss="modal">×</button>
      	<h3 id="mc-choosepaymenttype1">Choose Payment Type</h3>
      	<h3 id="mc-choosepaymenttype2" class="hide">Add Shipping Address</h3>
      	<h3 id="mc-choosepaymenttype3" class="hide">Add Billing Address</h3>
      	<h3 id="mc-choosepaymenttype4" class="hide">Make a payment</h3>
      </div>
    <div class="modal-body">
    	<div id="paymenttypes">
	    	<a href="#" id="mc-pay-paypal"><img  src="<?php echo $resourceurl;?>/images/paypal.png"/></a>
	    	<a href="#" id="mc-pay-cc"><img src="<?php echo $resourceurl;?>/images/cc.png" width="250" height="250"/></a>
    	</div>
    	<div id="shippingaddress" class="hide">
			<div class="checkout-step">
				<div class="email">
					<label for="paymentEmail">Email</label>
						<input type="email" id="paymentEmail" value="" autocompletetype="email" autocorrect="off" spellcheck="off" required="">  
				</div>
				<label for="shippingName">Ship To</label>
				<div class="address-content">
					<input class="name" type="text" required="required" id="shippingName" placeholder="Name">
					<input class="street" type="text" required="required" placeholder="Street">
					<input class="zip" type="text" required="required" placeholder="Postal" >
					<input class="city" type="text" required="required" placeholder="City">
					<btn id="mc-deliveryaddress-btn" class="btn">Delivery</btn>
					<btn id="" class="mc-payment-btn btn hide">Pay</btn>
					<label class="checkbox">
      					<input type="checkbox" id="mc-matchaddress"> Billing same as Shipping Address
    				</label>
				</div>
			</div>
		</div>
    	<div id="mc-billingaddress" class="hide">
			<div class="checkout-step2">
				<div class="email">
					<label for="paymentEmail">Email</label>
						<input type="email" id="paymentEmail" value="" autocompletetype="email" autocorrect="off" spellcheck="off" required="">  
				</div>
				<label for="shippingName">Bill To</label>
				<div class="address-content">
					<input class="name" type="text" required="required" id="shippingName" placeholder="Name">
					<input class="street" type="text" required="required" placeholder="Street">
					<input class="zip" type="text" required="required" placeholder="Postal" >
					<input class="city" type="text" required="required" placeholder="City">
					<!--<btn id="mc-deliveryaddress-btn" class="btn">Delivery</btn>-->
					<btn id="" class="mc-payment-btn btn hide">Pay</btn>

				</div>
			</div>  
		</div> 

		<div id="mc-paypalconfirmation" class="hide">
			<p>
				You are about to make a Paypal payment.  You will leave this site...
			</p>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
				    <!-- Identify your business so that you can collect the payments. -->
				    <input type="hidden" name="rm" value="2">
				
				    <input type="hidden" name="business" value="hub@cudaboo.com">
				    <!-- Specify a Buy Now button. -->
				    <input type="hidden" name="cmd" value="_xclick">
				    <!-- Specify details about the item that buyers will purchase. -->
				    <input type="hidden" name="item_name" value="Cudaboo Order">
				    <input type="hidden" name="amount" value="">
				    <input type="hidden" name="currency_code" value="GBP">
				    <input type="hidden" name="cancel_return" value="http://cudaboostage.eu01.aws.af.cm/index.php?/checkout/paypalcancel">
				    <input type="hidden" name="return" value="http://cudaboostage.eu01.aws.af.cm/index.php?/checkout/paypalresult">
				    <!-- Display the payment button. -->
				    <button type="submit" id="mojagmakepayment" class="btn btn-info ">Pay <span class='mc-confirmamount'></span> by Pay Pal</button>
					<!--
				    <input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
				   	-->
				    <img alt="" border="0" width="1" height="1" src="https://www.paypal.com/en_US/i/scr/pixel.gif">
				</form>
			
			</div>
			<div id="mc-ccconfirmation" class="hide">
				<script src="https://checkout.stripe.com/v2/checkout.js"></script>
				<input type="hidden" name="ttotal" id="ttotal" value="">
				<form id="formstripe" action="index.php?/checkout/result" method="POST">
				<a href="#" id="stripemakepayment" class="btn btn-info ">Pay by Credit Card</a>
				</form>
			</div>
    </div>
   
</div>
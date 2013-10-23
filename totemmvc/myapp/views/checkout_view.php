<div class="row">
	<div id="addressdetails" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
		<form action="<?php echo $baseurl; ?>/index.php/cart/result" method="POST" name='myform' id='myform'>
			<!-- <div class="row">
				<p class="formtitle">Your Information</p>
			</div>
			<hr /> -->
			
			<div class="row">
				<p class="formtitle">Shipping Information</p>
			</div><!-- end row -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlshippingemail" class="form-group">
						<label for="inputName">Email Address</label>
    					<input type="email" class="form-control" id="shippingemail" name="shippingemail" placeholder="Your Email" data-cart-buyer="email">
    					<span id="help-shippingemail" class="help-block hide">A valid email address is required</span>
					</div><!-- end form-group -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlshippingname" class="form-group">
						<label for="inputName">Recipient's Name</label>
    					<input type="text" class="form-control" id="shippingname" name="shippingname" placeholder="Shipping Name" data-cart-buyer="name">
    					<span id="help-shippingname" class="help-block hide">A name is required</span>
					</div><!-- end form-group -->
				</div>
			</div><!-- end row -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="controlshippingstreet" class="form-group">
						<label for="inputName">Address Line 1</label>
    					<input type="text" class="form-control" id="shippingstreet" name="shippingstreet" placeholder="Address Line 1" data-cart-shipping-address="street">
    					<span id="help-shippingstreet" class="help-block hide">A number and street name are required</span>
					</div><!-- end form-group -->
				</div>
			</div><!-- end row -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlshippingcity" class="form-group">
						<label for="inputName">City</label>
    					<input type="text" class="form-control" id="shippingcity" name="shippingcity" placeholder="Street" data-cart-shipping-address="city">
    					<span id="help-shippingcity" class="help-block hide">You must enter a city</span>
					</div><!-- end form-group -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlshippingpostcode" class="form-group">
						<label for="inputName">Postcode</label>
    					<input type="text" class="form-control" id="shippingpostcode" name="shippingpostcode" placeholder="Postcode" data-cart-shipping-address="city">
    					<span id="help-shippingpostcode" class="help-block hide">You must enter a postcode</span>
					</div><!-- end form-group -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="form-group">
						<label for="inputName">Country</label>
						<select class="form-control" id='shippingcountry' name="country" data-cart-shipping-address="country">
					        <option value="UK" zone='0' selected="">United Kingdom</option>
							<option value="BE" zone='1'>Belgium</option>
							<option value="IRE" zone='1' >Republic Of Ireland</option>
							<option value="LU" zone='1' >Luxembourg</option>
							<option value="NL" zone='1' >Netherlands</option>
							<!--<option value="UK" zone='2' selected="">Channel Islands</option>-->
							<option value="FR" zone='2' >France</option>
							<option value="GR" zone='2' >Germany</option>
							<option value="AT" zone='2' >Austria</option>
							<option value="DK" zone='3' >Denmark</option>
							<option value="FI" zone='3' >Finland</option>
							<option value="IT" zone='3' >Italy</option>
							<option value="PT" zone='3' >Portugal</option>
							<option value="SM" zone='3' >San Marino</option>
							<option value="SM" zone='3' >Spain</option>
							<option value="SE" zone='3' >Sweden</option>
							<option value="AD" zone='4' >Andorra</option>
							<option value="BG" zone='4' >Bulgaria</option>
							<option value="CZ" zone='4' >Czech Republic</option>
							<option value="EE" zone='4' >Estonia</option>
							<option value="GR" zone='4' >Greece</option>
							<option value="HU" zone='4' >Hungary</option>
							<option value="LV" zone='4' >Latvia</option>
							<option value="LT" zone='4' >Lithuania</option>
							<option value="PL" zone='4' >Poland</option>
							<option value="RO" zone='4' >Romania</option>
							<option value="SK" zone='4' >Slovakia</option>
							<option value="SI" zone='4' >Slovenia</option>
							<option value="GI" zone='5' >Gibraltar</option>
							<option value="LI" zone='5' >Liechtenstein</option>
							<option value="NO" zone='5' >Norway</option>
							<option value="CH" zone='5' >Switzerland</option>
					    </select>
					    <span id="help-shippingcountry" class="help-block hide">A country must be selected</span>
					    <label class="checkbox">
      						<input type="checkbox" id='matchaddress'> Billing same as Shipping Address
    					</label>
					</div>
				</div>
			</div><!-- end row -->
			
			<hr />
			
			<div class="row">
				<p class="formtitle">Billing Information</p>
			</div><!-- end row -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlbillingemail" class="form-group">
						<label for="inputName">Email Address</label>
    					<input type="email" class="form-control" id="billingemail" name="billingemail" placeholder="Your Email" data-cart-buyer="email">
    					<span id="help-billingemail" class="help-block hide">A valid email address is required</span>
					</div><!-- end form-group -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlbillingname" class="form-group">
						<label for="inputName">Your Full Name</label>
    					<input type="text" class="form-control" id="billingname" name="billingname" placeholder="Billing Name" data-cart-buyer="name">
    					<span id="help-billingname" class="help-block hide">A name is required</span>
					</div><!-- end form-group -->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div id="controlbillingstreet" class="form-group">
						<label for="inputName">Address Line 1</label>
    					<input type="text" class="form-control" id="billingstreet" name="billingstreet" placeholder="Address Line 1" data-cart-billing-address="street">
    					<span id="help-billingstreet" class="help-block hide">A number and street name are required</span>
					</div><!-- end form-group -->
				</div>
			</div><!-- end row -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlbillingcity" class="form-group">
						<label for="inputName">City</label>
    					<input type="text" class="form-control" id="billingcity" name="billingcity" placeholder="Street" data-cart-billing-address="city">
    					<span id="help-billingcity" class="help-block hide">You must enter a city</span>
					</div><!-- end form-group -->
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div id="controlbillingpostcode" class="form-group">
						<label for="inputName">Postcode</label>
    					<input type="text" class="form-control" id="billingpostcode" name="billingpostcode" placeholder="Postcode" data-cart-billing-address="city">
    					<span id="help-billingpostcode" class="help-block hide">You must enter a postcode</span>
					</div><!-- end form-group -->
				</div>
			</div><!--end row -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="form-group">
						 <label for="inputName">Country</label>
						 <select class="form-control" id='billingcountry' name="country" data-cart-billing-address="country">
					        <option value="UK" zone='0' selected="">United Kingdom</option>
							<option value="BE" zone='1'>Belgium</option>
							<option value="IRE" zone='1' >Republic Of Ireland</option>
							<option value="LU" zone='1' >Luxembourg</option>
							<option value="NL" zone='1' >Netherlands</option>
							<!--<option value="UK" zone='2' selected="">Channel Islands</option>-->
							<option value="FR" zone='2' >France</option>
							<option value="GR" zone='2' >Germany</option>
							<option value="AT" zone='2' >Austria</option>
							<option value="DK" zone='3' >Denmark</option>
							<option value="FI" zone='3' >Finland</option>
							<option value="IT" zone='3' >Italy</option>
							<option value="PT" zone='3' >Portugal</option>
							<option value="SM" zone='3' >San Marino</option>
							<option value="SM" zone='3' >Spain</option>
							<option value="SE" zone='3' >Sweden</option>
							<option value="AD" zone='4' >Andorra</option>
							<option value="BG" zone='4' >Bulgaria</option>
							<option value="CZ" zone='4' >Czech Republic</option>
							<option value="EE" zone='4' >Estonia</option>
							<option value="GR" zone='4' >Greece</option>
							<option value="HU" zone='4' >Hungary</option>
							<option value="LV" zone='4' >Latvia</option>
							<option value="LT" zone='4' >Lithuania</option>
							<option value="PL" zone='4' >Poland</option>
							<option value="RO" zone='4' >Romania</option>
							<option value="SK" zone='4' >Slovakia</option>
							<option value="SI" zone='4' >Slovenia</option>
							<option value="GI" zone='5' >Gibraltar</option>
							<option value="LI" zone='5' >Liechtenstein</option>
							<option value="NO" zone='5' >Norway</option>
							<option value="CH" zone='5' >Switzerland</option>
					    </select>
					</div>
				</div>
			</div><!-- end row -->
			
			<hr />
			
			<div class="row">
				<p class="formtitle">Delivery</p>
			</div><!-- end row -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="form-group">
						<label>Delivery Options</label>
						<select class="form-control" name='deliveryselect' id='deliveryselect'>
	  						<option value="0.00">Standard UK Delivery</option>
	  						<option value="15.12">European Delivery</option>
	 						<option value="21.43">International Delivery</option>
						</select>
					</div>
				</div>
			</div><!-- end row -->
			
			<hr />
			
			<div class="row">
				<p class="formtitle">Summary</p>
			</div><!-- end row -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<p class='ac'>Total: &pound;<span id='ctotal'>
     				</span><br />
     				Including &pound;<span id='samount'>0.00</span> in shipping</p>
				</div>
			</div><!-- end row -->
			
			<hr />
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<script src="https://checkout.stripe.com/v2/checkout.js"></script>
					<a href='#' id="addaddress" class="btn btn-info pull-right">Confirm</a>
					<input type="hidden" name="fintotal" id="fintotal" value="">
					<input type="hidden" name="finshipping" id="finshipping" value="">
				</div>
			</div><!-- end row -->
		<br />
		<br />		
		</form>
	</div>
</div><!-- end .row (outer) -->

<footer>
    <div class="row">
    	<div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-5 col-sm-offset-1" id="copyright">
   			&copy; EABURNS 2013 | All Rights Reserved
    	</div>
    </div>
</footer>
	<!-- cart modal -->
		    <link href="css/mojagcart.css" rel="stylesheet">

	<div id='mojagcartmodal' class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id='carttitle'>Cart</h3>
  </div>
  
  <div class="modal-body">
  	<div class="box-content box-options">
    
      <div class="row">
      	<div id='agediv' class="span5">
        <p class="subtitle"><strong>Age</strong></p>
        <select id='age' class="input-block-level select-option" data-cart-item-option="Age">
          
            <option value="">-- Please Select --</option>
          
          
            <option data-cart-item-option-price="0" data-cart-item-option-value="0-3 Months (Tian the Panda)" value="0-3 Months (Tian the Panda)">0-3 Months (Tian the Panda) </option> 
          
            <option data-cart-item-option-price="0" data-cart-item-option-value="3-6 Months (Max the Lion)" value="3-6 Months (Max the Lion)">3-6 Months (Max the Lion) </option> 
          
            <option data-cart-item-option-price="0" data-cart-item-option-value="6-12 Months (Choco the Monkey)" value="6-12 Months (Choco the Monkey)">6-12 Months (Choco the Monkey) </option> 
          
        </select>
       
      </div>
          </div>

      <div class="row">
      	      	<div class="span5">

        <p class="subtitle"><strong>Colour</strong></p>
        <select id='mojagcartcolour' class="input-block-level select-option" data-cart-item-option="Colour">
          
            <option value="">-- Please Select --</option>
          
          
            <option data-cart-item-option-price="0" data-cart-item-option-value="Pink" value="Pink">Pink </option> 
          
            <option data-cart-item-option-price="0" data-cart-item-option-value="Grey" value="Grey">Grey</option> 
          
            <option data-cart-item-option-price="0" data-cart-item-option-value="Turquoise" value="Turquoise">Turquoise </option> 
          
        </select>
        </div>
         </div>
      </div>
      
           <hr>

  <div class="row">
 
    <div class="span1">
      <span class="mojagcartprice" data-cart-item-price="0" data-cart-item-deposit="0"></span>
    </div>

    <div class="span4 ">
            <button id='mojagcartaddtoorder' class="btn btn-info pull-right">Add to Order</button>
            <span id="pq">
Quantity
      <select id='product-quantity' data-cart-item-quantity="ss" name="product-quantity" class="selectwidthauto">
            <option value="1">1</option>
          
            <option value="2">2</option>
          
            <option value="3">3</option>
          
            <option value="4">4</option>
          
            <option value="5">5</option>
          
            <option value="6">6</option>
          
            <option value="7">7</option>
          
            <option value="8">8</option>
          
            <option value="9">9</option>
          
            <option value="10">10</option>
          
        
      </select>
</span>
      
    </div>
  </div>
               <hr>

  </div>
  
  <div class="modal-footer">
    <a href="#" class="btn btn-info">Continue shopping</a>
    <a href="<?php echo base_url();?>index.php?/checkout" class="btn btn-info">Checkout</a>
  </div>
</div>
<!-- end cart modal -->
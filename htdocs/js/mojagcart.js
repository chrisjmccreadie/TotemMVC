/*
 * 
 * Mojag Cart Js
 * 
 * 
 */
//set the mode to use 0 = local 1 = remore
var use = 0;
var ajaxcall = '';

//strip info
var livekey = 'pk_live_w2iqJl9CKdQS0KIoSni4aRwM';
var testkey = 'pk_test_t9wTwx0pmLYyOvBBSda2dZI8';
var uselive = 0; //set 1 for live 0 for test
var stripeaddress = false;
var stripecurrency = 'gbp';
var stripename = 'E.A.Burns Order';
var stripedesc = 'Please enter your credit/debit card details';
var currenttotal = 0;



//set the local url
if (use ==0) 
{
	hn = document.location.toString();
	var url = hn.split("/");
	//console.log(url);
	mojagcartroot =  'http://'+url[2]+'/index.php/mojagcartajax/';
}
else
	var mojagcartroot = 'http://www.mojagcart.com/mojagcartajax/';



$(document).ready(function(){
	  //get the basket items
	 // getBaskeTotal();
	  getBasket();

		
	  //add to basket
	  $('.mojagadditem').click(function(){
	  	//get the details
	  	var name = $(this).attr('mc-name');
	  	name = encodeURIComponent(name);
	  	var slug = $(this).attr('mc-slug');
	  	var price = $(this).attr('mc-price');
	  	price = encodeURIComponent(price);
	  	//alert('ddd');
		//built the url
		var ajaxurl = mojagcartroot+"addBasket?name="+name+'&slug='+slug+'&price='+price;
		ajaxcall = 'addbasket';
		fetchsc(ajaxurl);	
	  	//alert('yay');	
	  });
	  
		  //set the time slot
		var selectedslot='';
		$('.time').click(function(){
			selectedslot=$.trim($(this).text());
			console.log(selectedslot);
		});
	
	$('#mojgcartpay').click(function(){
		//special for collection
		var collectionpay = $(this).attr('mc-collectionpay');
		//alert(collectionpay);	
		if(collectionpay == "true")
		{
				//alert(selectedslot);
			//check if a time slot has been added
			if (selectedslot == '')
			{
					
				alert('please select a time slot');
			}
			else
			{
				//check out processing address etc
				/*
				if ($('#name').val() == "")
				{
					alert('please enter your name');
					$('#name').focus();
					return;
				}
				if ($('#email').val() == "")
				{
					alert('please enter your email');
					$('#email').focus();
					return;
				}
				if ($('#tel').val() == "")
				{
					alert('please enter your telephone');
					$('#tel').focus();
					return;
				}
				*/
				ajaxcall='paybasket';
				var ajaxurl = mojagcartroot+"payBasket";
				fetchsc(ajaxurl);	
					 
	      
	      
			}
		}
		else
		{
				ajaxcall='paybasket';
				var ajaxurl = mojagcartroot+"payBasket";
				fetchsc(ajaxurl);				
		}
	});
	
	//increase the quanity
	$(".mojagcartaddquantity" ).on( "click",  function() {
				alert('lineitemid');

		var lineitemid = $(this).attr('data-id');
				alert(lineitemid);

	});
	
	$(".mojagcartminusquantity" ).on( "click",  function() {
		var lineitemid = $(this).attr('data-id');
		alert(lineitemid);
	});
	
	function checkEmail(email) {
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (!filter.test(email)) {
			return false;
		}
		return(true);
	}
	
	//function add address
	$('#addaddress').click(function(event){
		//event.preventDefault();
		
		//get the address information
		//avalible fields
	  	var good = 1;
	    var billingname = '';
		var shippingname = '';	
		var billingaddress1 = '';    
		var billingaddress2 = '';    
		var billingaddress3 = '';    
		var billingaddress4 = '';    
		var billingaddress5 = '';    
		var shippingaddress1 = '';
		var shippingaddress2 = '';
		var shippingaddress3 = '';
		var shippingaddress4 = '';
		var shippingaddress5 = '';
		var billingemail = '';
		var shippingemail = '';
		var billingnotes = '';
		var shippingnotes = '';
		var cost = '0';
		var shippingcost = '0'; 
		
		
			 
    	 /*var $myDiv = $('#mojagbillingaddress5').val();
   		if ( $myDiv.length){
		  billingaddress5 = $('#mojagbillingaddress5').val();
    	}*/
    	
    	    	/*
     	var $myDiv = $('#mojagshippingaddress5').val();
   		if ( $myDiv.length){
		  shippingaddress5 = $('#mojagshippingaddress5').val();
    	}
     	var $myDiv = $('#mojagshippingaddress4').val();
   		if ( $myDiv.length){
		  shippingaddress4 = $('#mojagshippingaddress4').val();
    	}
     	var $myDiv = $('#mojagshippingaddress5').val();
   		if ( $myDiv.length){
		  shippingaddress5 = $('#mojagshippingaddress5').val();
    	}	*/
    	
		/*
     	var $myDiv = $('#billingnotes').val();
   		if ( $myDiv.length){
		  billingnotes = $('#billingnotes').val();
    	}	  	
     	var $myDiv = $('#shippingnotes').val();
   		if ( $myDiv.length){
		  shippingnotes = $('#shippingnotes').val();
    	}	  	
     	var $myDiv = $('#billingnotes').val();
   		if ( $myDiv.length){
		  billingnotes = $('#billingnotes').val();
    	}
     	var $myDiv = $('#shippingnotes').val();
   		if ( $myDiv.length){
		 var shippingnotes = $('#shippingnotes').val();
    	}
    	*/	  	

    	/*
       	var $myDiv = $('#shippingcost').val();
   		if ( $myDiv.length){
		 var cost = $('#shippingcost').val();
    	}	  	  	
		*/
		//add a check to any fields you want here
		
		/*
		if (billingname == '')
		{
			  event.preventDefault();
			  return('please add a Billing Name');
		}
		*/	
		
		
		//check routines. 		
		var $myDiv = $('#billingname');
   		if ( $myDiv.length){
		  billingname = $('#billingname').val();
		  if (billingname == '')
			{
				$('#controlbillingname').addClass('has-error');
				$('#help-billingname').removeClass('hide');
				$('#billingname').focus();
				good = 0;
			}
			else
			{
				$('#controlbillingname').removeClass('has-error');
				$('#help-billingname').addClass('hide');		
			}
    	}	
    	
		var $myDiv = $('#shippingname');
   		if ( $myDiv.length){
		  	shippingname = $('#shippingname').val();
			if (shippingname == '')
			{
				$('#controlshippingname').addClass('has-error');
				$('#help-shippingname').removeClass('hide');
				$('#shippingname').focus();
				good = 0;
			}
			else
			{
				$('#controlshippingname').removeClass('has-error');
				$('#help-shippingname').addClass('hide');		
			}
    	}
    	
		var $myDiv = $('#billingstreet');
   		if ( $myDiv.length){
		  billingaddress1 = $('#billingstreet').val();
		  if (billingaddress1 == '')
			{
				$('#controlbillingstreet').addClass('has-error');
				$('#help-billingstreet').removeClass('hide');
				$('#billingstreet').focus();
				good = 0;
			}
			else
			{
				$('#controlbillingstreet').removeClass('has-error');
				$('#help-billingstreet').addClass('hide');		
			}
    	}
    	
		var $myDiv = $('#billingcity');
   		if ( $myDiv.length){
			billingaddress2 = $('#billingcity').val();
			if (billingaddress2 == '')
			{
				$('#controlbillingcity').addClass('has-error');
				$('#help-billingcity').removeClass('hide');
				$('#billingcity').focus();
				good = 0;
			}
			else
			{
				$('#controlbillingcity').removeClass('has-error');
				$('#help-billingcity').addClass('hide');		
			}
    	}
    			
    	var $myDiv = $('#billingpostcode');
   		if ( $myDiv.length){
		  billingaddress3 = $('#billingpostcode').val();
		  if (billingaddress3 == '')
			{
				$('#controlbillingpostcode').addClass('has-error');
				$('#help-billingpostcode').removeClass('hide');
				$('#billingpostcode').focus();
				good = 0;
			}
			else
			{
				$('#controlbillingpostcode').removeClass('has-error');
				$('#help-billingpostcode').addClass('hide');		
			}
    	}
    			
    	var $myDiv = $('#billingcountry');
   		if ( $myDiv.length){
		  billingaddress4 = $('#billingcountry').val();
		  if (billingaddress4 == '')
			{
				$('#controlbillingcountry').addClass('has-error');
				$('#help-billingcountry').removeClass('hide');
				$('#billingcountry').focus();
				good = 0;
			}
			else
			{
				$('#controlbillingcountry').removeClass('has-error');
				$('#help-billingcountry').addClass('hide');		
			}
    	}		

    	var $myDiv = $('#shippingstreet');
   		if ( $myDiv.length){
		  shippingaddress1 = $('#shippingstreet').val();
		  if (shippingaddress1 == '')
			{
				$('#controlshippingstreet').addClass('has-error');
				$('#help-shippingstreet').removeClass('hide');
				$('#shippingstreet').focus();
				good = 0;
			}
			else
			{
				$('#controlshippingstreet').removeClass('has-error');
				$('#help-shippingstreet').addClass('hide');		
			}
    	}
    			
    	var $myDiv = $('#shippingcity');
   		if ( $myDiv.length){
		  shippingaddress2 = $('#shippingcity').val();
		  if (shippingaddress2 == '')
			{
				$('#controlshippingcity').addClass('has-error');
				$('#help-shippingcity').removeClass('hide');
				$('#shippingcity').focus();
				good = 0;
			}
			else
			{
				$('#controlshippingcity').removeClass('has-error');
				$('#help-shippingcity').addClass('hide');		
			}
    	}
    	
     	var $myDiv = $('#shippingpostcode');
   		if ( $myDiv.length){
		  shippingaddress3 = $('#shippingpostcode').val();
		  if (shippingaddress3 == '')
			{
				$('#controlshippingpostcode').addClass('has-error');
				$('#help-shippingpostcode').removeClass('hide');
				$('#shippingpostcode').focus();
				good = 0;
			}
			else
			{
				$('#controlshippingpostcode').removeClass('has-error');
				$('#help-shippingpostcode').addClass('hide');		
			}
    	}
    	
     	var $myDiv = $('#shippingcountry');
   		if ( $myDiv.length){
		  shippingaddress4 = $('#shippingcountry').val();
		  if (shippingaddress4 == '')
			{
				$('#controlshippingcountry').addClass('has-error');
				$('#help-shippingcountry').removeClass('hide');
				$('#shippingcountry').focus();
				good = 0;
			}
			else
			{
				$('#controlshippingpcountry').removeClass('has-error');
				$('#help-shippingcountry').addClass('hide');		
			}
    	}

     	var $myDiv = $('#billingemail');
   		if ( $myDiv.length){
		  billingemail = $('#billingemail').val();
		  if (billingemail == '' || !checkEmail(billingemail))
			{
				$('#controlbillingemail').addClass('has-error');
				$('#help-billingemail').removeClass('hide');
				$('#billingemail').focus();
				good = 0;
			}
			else
			{
				$('#controlbillingemail').removeClass('has-error');
				$('#help-billingemail').addClass('hide');		
			}
    	}
    	
     	var $myDiv = $('#shippingemail').val();
   		if ( $myDiv.length){
		  	shippingemail = $('#shippingemail').val();
		  	if (shippingemail == '' || !checkEmail(shippingemail))
			{
				$('#controlshippingemail').addClass('has-error'); // note: BS3 classes
				$('#help-shippingemail').removeClass('hide');
				$('#shippingemail').focus();
		
				good = 0;
			}
			else
			{
				$('#controlshippingemail').removeClass('has-error');
				$('#help-email').addClass('hide');		
				shippingemail = $('#shippingemail').val();
			}
    	}	  	

		var $myDiv = $('#ctotal').val();
   		if ( $myDiv.length){
			cost = $('#ctotal').val();
    	}
    	 
    
		
	
		/*============== OLD CHECKS ========================================
	  	
	  	
	  	
	  	if ($('#shippingstreet').val() == '')
		{
			$('#controlshippingstreet').addClass('has-error');
			$('#help-shippingstreet').removeClass('hide');
			$('#shippingstreet').focus();
	
			good = 0;
		}
		else
		{
			$('#controlshippingstreet').removeClass('has-error');
			$('#help-shippingstreet').addClass('hide');		
			ss = $('#shippingstreet').val();
		}
	  	
	  	if ($('#shippingcity').val() == '')
		{
			$('#controlshippingcity').addClass('has-error');
			$('#help-shippingcity').removeClass('hide');
			$('#shippingcity').focus();
	
			good = 0;
		}
		else
		{
			$('#controlshippingcity').removeClass('has-error');
			$('#help-shippingcity').addClass('hide');		
			sc = $('#shippingcity').val();
		}
	  	
	  	if ($('#shippingpostcode').val() == '')
		{
			$('#controlshippingpostcode').addClass('has-error');
			$('#help-shippingpostcode').removeClass('hide');
			$('#shippingpostcode').focus();
	
			good = 0;
		}
		else
		{
			$('#controlshippingpostcode').removeClass('has-error');
			$('#help-shippingpostcode').addClass('hide');		
			sp = $('#shippingpostcode').val();
		}
		
	  	// billing
	  	
	  	if ($('#billingemail').val() == '' || !checkEmail($('#billingemail').val()))
		{
			$('#controlbillingemail').addClass('has-error');
			$('#help-billingemail').removeClass('hide');
			$('#billingemail').focus();
	
			good = 0;
		}
		else
		{
			$('#controlbillingemail').removeClass('error');
			$('#help-email').addClass('hide');		
			billingemail = $('#billingemail').val();
		}
		
		if ($('#billingname').val() == '')
		{
			$('#controlbillingname').addClass('has-error');
			$('#help-billingname').removeClass('hide');
			$('#billingname').focus();
	
			good = 0;
		}
		else
		{
			$('#controlbillingname').removeClass('has-error');
			$('#help-billingname').addClass('hide');		
			billingname = $('#billingname').val();
		}
	  	
	  	if ($('#billingstreet').val() == '')
		{
			$('#controlbillingstreet').addClass('has-error');
			$('#help-billingstreet').removeClass('hide');
			$('#billingstreet').focus();
	
			good = 0;
		}
		else
		{
			$('#controlbillingstreet').removeClass('has-error');
			$('#help-billingstreet').addClass('hide');		
			ss = $('#billingstreet').val();
		}
	  	
	  	if ($('#billingcity').val() == '')
		{
			$('#controlbillingcity').addClass('has-error');
			$('#help-billingcity').removeClass('hide');
			$('#billingcity').focus();
	
			good = 0;
		}
		else
		{
			$('#controlbillingcity').removeClass('has-error');
			$('#help-billingcity').addClass('hide');		
			sc = $('#billingcity').val();
		}
	  	
	  	if ($('#billingpostcode').val() == '')
		{
			$('#controlbillingpostcode').addClass('has-error');
			$('#help-billingpostcode').removeClass('hide');
			$('#billingpostcode').focus();
	
			good = 0;
		}
		else
		{
			$('#controlbillingpostcode').removeClass('has-error');
			$('#help-billingpostcode').addClass('hide');		
			sp = $('#billingpostcode').val();
		}
		
		======================================================*/
		
		// check cost != 0
		var atotal = $('#ctotal').html();
		var stotal = $('#samount').html();
		
		//prices to be converted to pence
		atotal = parseFloat(atotal)*100;
		stotal = parseFloat(stotal)*100;
		
		if (atotal == 0)
		{
			//alert('Your balance cannot be 0');
    		return false;
    		event.preventDefault();
		}
		else {
			cost = atotal;
			shippingcost = stotal;
		}
		
		// if all checks passed, pass info to storeorderinfo
		
		//console.log('good = '+good);
		
		if (good == 0)
		{
			//alert('some information is massing or not valid');
			return false;
			event.preventDefault();
		}
		else
		{
		
		var data = {
    	  "billingname":billingname,
    	  "shippingname":shippingname,
    	  "billingaddress1":billingaddress1,
    	  "billingaddress2":billingaddress2,
     	  "billingaddress3":billingaddress3,
     	  "billingaddress4":billingaddress4,
     	  "billingaddress5":billingaddress5,
     	  "shippingaddress1":shippingaddress1,
     	  "shippingaddress2":shippingaddress2,
     	  "shippingaddress3":shippingaddress3,
     	  "shippingaddress4":shippingaddress4,
     	  "shippingaddress5":shippingaddress5,
     	  "billingemail":billingemail,
     	  "shippingemail":shippingemail,
     	  "billingnotes":billingnotes,
     	  "shippingnotes":shippingnotes,
          "cost":cost,
  	 	  "shippingcost":shippingcost
		 
		};
		// STORE THE DATA
		//alert(data.cost);
		//console.log(data);
		ajaxcall = 'storeaddress';
		var url = mojagcartroot+'storeorderinfo';
		postsc(url,data);	
		}
	});		
		    
});

function addQuan(id)
{
	var quantity = $('#lineitemquantity'+id).text();
	//alert(quantity);
	quantity++;
	//get the cost
	var price = $('#cartlineitemprice'+id).attr('data-price');
			//alert(price);
	currenttotal = parseFloat(currenttotal) + parseFloat(price);
	price = parseFloat(price) * parseInt(quantity);
			//alert(price);
	$('#basketTotal > h5 > .item-price').html('&pound; '+currenttotal);
	$('#cartlineitemprice'+id).text(price.toFixed(2));

	//alert(quantity);
	$('#lineitemquantity'+id).text(quantity);
	$('#lineitemquantity'+id).attr('data-id',quantity);

}

function removeQuan(id)
{
	//alert(id);
	var quantity = $('#lineitemquantity'+id).attr('data-id');
	if (quantity > 1)
	{
		quantity--;
		var price = $('#cartlineitemprice'+id).attr('data-price');
		currenttotal = parseFloat(currenttotal) - parseFloat(price);
		price = parseFloat(price) * parseInt(quantity);
		$('#basketTotal > h5 > .item-price').html('&pound; '+currenttotal);
		$('#cartlineitemprice'+id).text(price.toFixed(2));
		$('#lineitemquantity'+id).text(quantity);
		$('#lineitemquantity'+id).attr('data-id',quantity);
	}
	else
	{	
		var price = $('#cartlineitemprice'+id).attr('data-price');
		currenttotal = parseFloat(currenttotal) - parseFloat(price);
		$('#basketTotal > h5 > .item-price').html('&pound; '+currenttotal);
		//remove item
		//alert('dddd');
		$('#liid'+id).remove();
		var totalitems = $('#mojagbasketcount').text();
		totalitems--;
		$('#mojagbasketcount').text(totalitems);
		return;
		
	}


}

//getBasket
function getBasket()
{
	  var ajaxurl = mojagcartroot+"getBasket";
	  ajaxcall='getbasket';
	  fetchsc(ajaxurl);	
}

function getBaskeTotal()
{
	  var ajaxurl = mojagcartroot+"getBasketTotal";
	  ajaxcall='getbaskettotal';
	  fetchsc(ajaxurl);		
}



//url processing

function emptyBasket()
{
	//empty the basket + submit the order
	ajaxcall='emptybasket';
	var ajaxurl = mojagcartroot+"emptyBasket";
	fetchsc(ajaxurl);	
	//alert('ddd');
}

function processBasketTotal(total)
{
	//alert('ddd');
	var result = $.parseJSON(total);
	console.log(result);
	if (result == "") {
		$('#mojagbasketcount').html(0);
		currenttotal = 0.00;
		$('#basketTotal > h5 > .item-price').html('&pound; '+currenttotal);	
	}
	else
	{
		//$('mojagcartbuy').attr('mc-name','').attr('mc-slug','').attr('mc-price','');
		currenttotal = parseFloat(result.basket.total).toFixed(2);
		//alert(currenttotal);
		//set this to the total div you want.
		$('#basketTotal > h5 > .item-price').html('&pound; '+currenttotal);		
	}
	ctotal = result.basket.total;
	$('#ctotal').html(ctotal.toFixed(2));
}

function processBasket(basketitems)
{
	//process the basket
	//console.log(basketitems);
	var result = $.parseJSON(basketitems);
	//console.log(result);
	if (result == "") {
		$('#mojagbasketcount').html(0);
		currenttotal = 0.00;
		$('#basketTotal > h5 > .item-price').html('&pound; '+currenttotal);	
	}
	else
	{
		$('#mojagbasketcount').html(result.basket.numberofitems);
		mojagbasketitems ="<ul>";
	
		i = 0;
		currenttotal = 0;
		$.each(result.basketitems, function(i, item) {
			mojagbasketitems=mojagbasketitems+'<li id="liid'+i+'"><div>';
			mojagbasketitems=mojagbasketitems+'<span id="cartlineitemname'+i+'" class="item-title">'+item.name+'</span>';
			mojagbasketitems=mojagbasketitems+'<a class="mojagcartaddquantity item-quant" href="javascript:addQuan('+i+')" data-id="'+i+'">+</a><br/></a>';
			mojagbasketitems=mojagbasketitems+'<span id="lineitemquantity'+i+'" class="item-quant">'+item.quantity+"</span>";
			mojagbasketitems=mojagbasketitems+'<a class="mojagcartminusquantity item-quant" href="javascript:removeQuan('+i+')" data-id="'+i+'">-</a>';
			mojagbasketitems=mojagbasketitems+'<span id="cartlineitemprice'+i+'" data-price="'+item.price+'" class="item-price"> '+'&pound;'+parseFloat(item.price).toFixed(2)+'</span>';
			mojagbasketitems=mojagbasketitems+'</div></li>';
			i++;
			currenttotal = parseFloat(currenttotal) + parseFloat(item.price);
			//console.log(currenttotal);
	 		//console.log(item);
		}); //<-- lacking ")"
		mojagbasketitems=mojagbasketitems+'</ul>';
		$('#mojagbasketitems').html(mojagbasketitems);
	}
	$('mojagcartbuy').attr('mc-name','').attr('mc-slug','').attr('mc-price','');
	currenttotal = parseFloat(currenttotal).toFixed(2);
	$('#basketTotal > h5 > .item-price').html('&pound; '+currenttotal);
	//console.log(currenttotal);	
	$('#productPage').modal('hide');
}


function takePayment(total)
{
	//var result = $.parseJSON(paymentinfo);
	//	console.log(paymentinfo);
	//var total = result.basket.total;
	total = total * 100;
	
	 var token = function(res){
	      var $input = $('<input type=hidden name=stripeToken />').val(res.id);
	        $('#myform').append($input).submit();
	      };
	      
	      //strip info


if (uselive == 1)
	stripekey = livekey;
else
	stripekey = testkey;
	
	      StripeCheckout.open({
	        key:         stripekey,
	        address:     stripeaddress,
	        amount:     total,
	        currency:    stripecurrency,
	        name:        stripename,
	        description: stripedesc,
	        panelLabel:  'Checkout',
	        token:       token
	      });
}

    //generic post function
    var result ='';
    function parseajaxresponse(data)
    {
    	result =  jQuery.parseJSON(data);
		console.log(result);
		//do stuff with the object if you want.
    }
    function postsc(url,data)
    {
    	//alert(url);
    //	alert(data);
    	//data = JSON.stringify(data);
    	//alert(data);
    	//console.log('ddd');
    		    //console.log(data);

	    $.post(url,data ,function(data) {})
			.success(function(data) {
				console.log(data);
				//parseajaxresponse(data);	
				takePayment(currenttotal);		
			})
			.error(function(data) { 
				stopspinner();
			})
			.complete(function() { 
						//  alert("complete"); 
			});
	}


function fetchsc(url)
{
	//alert(url);
	var jqxhr = $.get(url, function(data) { })
	//if it is a success process
  	.success(function(result) {
		//alert(result);
		if (ajaxcall == 'getbasket')
			processBasket(result);
		if (ajaxcall == 'addbasket')
			processBasket(result);
		//if (ajaxcall == 'paybasket')
			//takePayment(result);	
		if (ajaxcall == 'getbaskettotal')
			processBasketTotal(result);	

			
	})
  	.error(function(result) { 

   	})
  	.complete(function() { 
  	    //alert("complete"); 
  	});
	
}

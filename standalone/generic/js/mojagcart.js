/*
 * 
 * Mojag Cart Js
 * 
 * 
 */
//set the mode to use 0 = local 1 = remore
var use = 0;
varajaxcall = '';

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
	  var ajaxurl = mojagcartroot+"getBasket";
	  ajaxcall='getbasket';
		fetchsc(ajaxurl);	
		
	  //add to basket
	  $('.mojagadditem').click(function(){
	  	//get the details

	  	var name = $(this).attr('mc-name');
	  	name = encodeURIComponent(name);
	  	var slug = $(this).attr('mc-slug');
	  	var price = $(this).attr('mc-price');
	  	price = encodeURIComponent(price);
	  	alert('ddd');
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
				ajaxcall='paybasket';
				var ajaxurl = mojagcartroot+"payBasket";
				fetchsc(ajaxurl);	
					 
	      
	      
			}
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
		    
});

function addQuan(id)
{
	var quantity = $('#lineitemquantity'+id).text();
	//alert(quantity);
	quantity++;
	//get the cost
	var price = $('#cartlineitemprice'+id).attr('data-price');
			//alert(price);

	price = parseFloat(price) * parseInt(quantity);
			//alert(price);

	$('#cartlineitemprice'+id).text(price);

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
		price = parseFloat(price) * parseInt(quantity);
		$('#cartlineitemprice'+id).text(price);
		$('#lineitemquantity'+id).text(quantity);
		$('#lineitemquantity'+id).attr('data-id',quantity);
	}
	else
	{
		//remove item
		//alert('dddd');
		$('#liid'+id).remove();
		var totalitems = $('#mojagbasketcount').text();
		totalitems--;
		$('#mojagbasketcount').text(totalitems);
		return;
		
	}


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

function processBasket(basketitems)
{
	//process the basket
	//console.log(basketitems);
	var result = $.parseJSON(basketitems);
	//console.log(result);
	if (result == "")
		$('#mojagbasketcount').html(0);	
	else
	{
		$('#mojagbasketcount').html(result.basket.numberofitems);
		mojagbasketitems ="<ul>";
	
		i = 0;
		$.each(result.basketitems, function(i, item) {
			mojagbasketitems=mojagbasketitems+'<li id="liid'+i+'">';
			mojagbasketitems=mojagbasketitems+'<span id="cartlineitemname'+i+'" class="">'+item.name+'</span>';
			mojagbasketitems=mojagbasketitems+'<span id="cartlineitemprice'+i+'" data-price="'+item.price+'" class=""> '+item.price+'</span>';
			mojagbasketitems=mojagbasketitems+'<span id="lineitemquantity'+i+'" class="">'+item.quantity+"</span>";
			mojagbasketitems=mojagbasketitems+'<a class="mojagcartminusquantity" href="javascript:removeQuan('+i+')" data-id="'+i+'">-</a>';
			mojagbasketitems=mojagbasketitems+'<a  class="mojagcartaddquantity" href="javascript:addQuan('+i+')" data-id="'+i+'">+</a><br/></a>';
			mojagbasketitems=mojagbasketitems+'</li>';
			i++;
	 		//console.log(item);
		}); //<-- lacking ")"
		mojagbasketitems=mojagbasketitems+'</ul>';
		$('#mojagbasketitems').html(mojagbasketitems);
	}
}


function takePayment(paymentinfo)
{
	var result = $.parseJSON(paymentinfo);
	//	console.log(paymentinfo);
	var total = result.basket.total;
	total = total * 100;
	
	 var token = function(res){
	      var $input = $('<input type=hidden name=stripeToken />').val(res.id);
	        $('form').append($input).submit();
	      };
	
	      StripeCheckout.open({
	        key:         'pk_test_aVXccYye8uoCBaeQwcHJHbBX',
	        address:     false,
	        amount:     total,
	        currency:    'gbp',
	        name:        'BLT ORDER',
	        description: 'Please enter your credit card details',
	        panelLabel:  'Checkout',
	        token:       token
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
		if (ajaxcall == 'paybasket')
			takePayment(result);		
	})
  	.error(function(result) { 

   	})
  	.complete(function() { 
  	    //alert("complete"); 
  	});
	
}

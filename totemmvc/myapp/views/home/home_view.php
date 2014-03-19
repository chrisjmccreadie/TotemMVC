
<body>
	
	
<!--main body part start-->
<div id="wrapper" class="row-fluid">
<div class="row-fluid">
  <div class="container">
    <div class="span12">
		<div class="well">

			Welcome, thankyou for taking a look at TotemMVC.
		</div>
		<div class="span10">
			<p>

			TotemMVC is a lightweight MVC based on the original work of TinyMVC.
			</p>
			<p>
It was developed internally to get up and running fast with our CMS Platform (Mojag).  It does a lot of the bootstrapping for you such removing the index.php in you ht access file or making sure your assets are all in a static directory.  Some of the things we do are obvious and none of it hard it's just, well damn convenient to have a modern framework that has all the resources you need to get up and running with 0 effort (we like 0 effort at Totem).

It has the all of the classes for Mojag, Mojagcart and our cache engine built. It also supports Sendmail (for email) and Memcachier (distrubuted Memcache) stripe and paypal (payment gateways) and has a very lightweight templating engine.
				</p>
				<p>
					it is not for everyone but if it's for you enjoy.
				</p>
				<p>
				Lastly TotemMVC could not exist with the work of these fine people
						</p>
						<ul>
							<li>
								TinyMVC
							</li>
							<li>
								Bolierplate
							</li>
							<li>
								Bootstrap
							</li>
							<li>
								jQuery
							</li>
						</ul>	
						<h2>Someuseful information</h2>
						Your base url is set to :<?php echo $baseurl;?>
				<br>
				and your resoruce url is : <?php echo $resourceurl;?>
				<br>
				Memory Used: <?php echo $memoryused;?>
				<br>
				excution time: {TMVC_TIMER} 

		</div>
    </div>
  </div>
</div>
</div>

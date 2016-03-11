<div class="jumbotron" style="margin-top:0px;background-image: url(img/Food.jpg)">
	<div class="container">
	  <h1 style="text-align:center;color:white">Petoo</h1>
	  <h3 style="text-align:center;" class="text-info">Get best of ethnic Indian dishes delivered to you within minutes</h3>
	</div>
</div>
<?php
	if(isset($_GET['category']))
							{
								$category = $_GET['category'];
							}
							else
								$category = 'x';
?>
<div class="container">
	<div class="row">
				
					
				<div class="col-lg-3 sidebar-offcanvas" id="sidebar">
					  <div class="list-group">
						<li class="list-group-item bg-info" style="background-color:#b3b3ff">Categories</li>
						<!--<a href="clock.php?genre=first" class="list-group-item <?php //if($sel_genre == 'first'){ echo "active" ;} ?>">Ist Year</a>
						<a href="clock.php?genre=dept" class="list-group-item <?php //if($sel_genre == 'dept'){ echo "active" ;} ?>">Departmental</a>-->
						<a href="http://localhost:8081/petoo/index.php?category=Desserts" class="list-group-item <?php if($category=='Desserts') echo 'active'; ?> ">Desserts</a>
						<a href="http://localhost:8081/petoo/index.php?category=Beverages" class="list-group-item <?php if($category=='Beverages') echo 'active'; ?>">Beverages</a>						
						<a href="http://localhost:8081/petoo/index.php?category=Veg main course" class="list-group-item <?php if($category=='Veg main course') echo 'active'; ?>">Veg main course</a>
						<a href="http://localhost:8081/petoo/index.php?category=Non veg main course" class="list-group-item <?php if($category=='Non veg main course') echo 'active'; ?>">Non veg main course</a>	
						<a href="http://localhost:8081/petoo/index.php?category=Non veg starters" class="list-group-item <?php if($category=='Non veg starters') echo 'active'; ?>">Non veg starters</a>
					  </div>
				</div><!--/.sidebar-offcanvas-->
				<?php
					//$jsondata = file_get_contents("http://dev.petoo.co.in/api_controller/ships_within_range?authkey=65db87aaaed69f2f832d27e6915b157d&source=intern&lat_long=12.924017099999999%2C77.6478056");
					$jsondata = file_get_contents("http://dev.petoo.co.in/api_controller/ships_within_range?authkey=65db87aaaed69f2f832d27e6915b157d&source=intern&lat_long=12.924017099999999%2C77.6478056");
					$json = json_decode($jsondata, true);
				?>
				<div class="col-lg-9">
					<div class="panel panel-default">
						
						<div class="panel-body">
							<?php
							
								if(isset($_GET['category']))
								{
									foreach($json['menu'] as $menu){
										foreach($menu as $item){
										if($item['category_name']==$category)
												{
													echo '<div class="panel panel-default">';
														echo'<div class="panel-body">';
												
															echo '<h3 class="text-primary">' . $item['item_name'] . '</h3>';
															echo '<div style="color:grey">' . $item['description'] . '</div>';
															echo '<div style="color:grey">' . 'Price: ' . $item['price'] . '</div>';
															//echo '<div style="color:grey">';
															//if($item['is_veg']) echo 'Veg';
														 	//echo '</div><br />';
															//echo '<img src="img/paneer-tikka-biryani.jpg"  class="img-responsive">';
														echo '</div>';
												echo '</div>';
												}
													
											
										}
									

									}
								}
								else
								{
									echo '<img src="img/paneer-tikka-biryani.jpg" height = "600" width="100%" class="img-responsive">';	
									echo '<br /><p class="text-info">Please select a category from the left.</p>';
								}
								
							
											
								
							?>
						</div>
					</div>
				</div>
	</div>
</div>
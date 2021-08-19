
		<header class="main-header">
			<div class="container-fluid d-flex align-items-end flex-column p-0">
				<div class="main-menu-burger">
					<span class="pattie"></span>
					<span class="pattie middle"></span>
					<span class="pattie"></span>
				</div>
			</div>
			<nav class="navbar navbar-expand-lg px-3">
				<div class="container-fluid d-flex align-items-center flex-column p-0">
					<div class="navbar-collapse">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item <?php print $city_name=="tokyo"?"active":""; ?>">
								<a href="<?php print base_url () . "home/tour/tokyo"; ?>" class="nav-link">Tokyo</a>
							</li>
							<li class="nav-item <?php print $city_name=="yokohama"?"active":""; ?>">
								<a href="<?php print base_url () . "home/tour/yokohama"; ?>" class="nav-link">Yokohama</a>
							</li>
							<li class="nav-item <?php print $city_name=="kyoto"?"active":""; ?>">
								<a href="<?php print base_url () . "home/tour/kyoto"; ?>" class="nav-link">Kyoto</a>
							</li>
							<li class="nav-item <?php print $city_name=="osaka"?"active":""; ?>">
								<a href="<?php print base_url () . "home/tour/osaka"; ?>" class="nav-link">Osaka</a>
							</li>
							<li class="nav-item <?php print $city_name=="sapporo"?"active":""; ?>">
								<a href="<?php print base_url () . "home/tour/sapporo"; ?>" class="nav-link">Sapporo</a>
							</li>
							<li class="nav-item <?php print $city_name=="nagoya"?"active":""; ?>">
								<a href="<?php print base_url () . "home/tour/nagoya"; ?>" class="nav-link">Nagoya</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
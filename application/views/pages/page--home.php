	<?php
	$fs_response	 = false;
	if (! empty($elements)) {
		$fs_response = $elements->response;
	}

	?>
		<div class="container">
			<div class="row mx-auto">
				<div class="col-lg-8 col-md-6 col-12 order-lg-first">
					<div class="contents-container-wrapper position-relative mx-auto">
						<div class="contents">
							<img src="<?php print base_url()."assets/images/" . $page->page_main_banner; ?>" alt="..." title="..." class="img-fluid contents-main-image" style="width: 100%;" />
							<div class="p-5">
								<h1><?php print (empty($fs_response->geocode->displayString))?ucwords($city_name):ucwords($fs_response->geocode->displayString); ?></h1>
								<p><?php print $page->page_summary; ?></p>
							</div>
							<?php if (! empty($fs_response)) : ?>
							<div class="main-attraction">
								<div class="p-5 pt-0">
								<h1>Main Attraction</h1>
								<?php
									$address = "";
									foreach ($fs_response->groups as $attraction) :
										foreach ($attraction->items[0]->venue->location->formattedAddress as $add) {
											$address.= $add. " ";
										}
								?>
									<h4><?php print $attraction->items[0]->venue->name; ?></h4>
									<p><?php print $address; ?><br>
									<?php print $attraction->items[0]->venue->categories[0]->name; ?></p>
								<?php
									endforeach;
								?>
								<?php if (! empty($attractions)) : ?>
									<div class="row">
										<div class="col-12">
											<img src="<?php print base_url()."assets/images/" . $attractions->attraction_main_image; ?>" alt="..." title="..." class="img-fluid mb-3" style="width: 100%;" />
											<p><?php print $attractions->attraction_summary; ?></p>
											<div class="row p-0 m-0">
												<?php 
												if (! empty($galleries)) :
													foreach($galleries as $gallery) :
												?>
												<div class="col-lg-6 p-0 m-0">
													<img src="<?php print base_url()."assets/images/" . $gallery->ag_image; ?>" alt="..." title="..." class="img-fluid mb-3" style="width: 100%; height: 100%" />
												</div>
												<?php 
													endforeach;
												endif; 
												?>
											</div>
										</div>
									</div>
								<?php endif; ?>
								</div>
							</div>
							<?php else : ?>
							<p>Unable to load other information...
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12 order-first">
					<div class="weather-container-wrapper contents-header">
						<div class="loading-overlay"></div>
						<div class="text-center" id="current_weather"></div>
					</div>
				</div>
			</div>
		</div>
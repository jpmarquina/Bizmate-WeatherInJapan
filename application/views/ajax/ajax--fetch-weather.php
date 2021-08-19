<?php
if (! empty ($result)) :
$city_name=(empty($result->name))?"Tokyo":$result->name;
date_default_timezone_set("Asia/Tokyo");
?>
<img src="<?php print "http://openweathermap.org/img/w/" . $result->weather[0]->icon . ".png"; ?>" class="icon" alt="..." title="..." />
<h1><?php print $result->main->temp - 273.15; ?> &deg;</h1>
<h2><?php print ucwords($result->weather[0]->description); ?></h2>
<p class="mt-3">
<img src="<?php print base_url () . "assets/images/icons8-sunrise-30.png"; ?>" class="me-3" /><?php print date("h:i A", $result->sys->sunrise); ?>
<br/>
<img src="<?php print base_url () . "assets/images/icons8-sunset-30.png"; ?>" class="me-3" /><?php print date("h:i A", $result->sys->sunset); ?>
</p>
<?php else : ?>
<small>Error while trying to connect with the api.</small>
<?php endif; ?>
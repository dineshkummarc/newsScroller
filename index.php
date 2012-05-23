<?php

require 'simplepie.inc';
$feed = new SimplePie('http://net.tutsplus.com/rss');
$feed->handle_content_type();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8" />
<title>Super Duper News Scroller</title>
</head>

<body>

<div id="container">
	<h1>Super Duper News Scroller: <small>Built With PHP, SimplePie, and jQuery</small</h1>
		
		<ul id="widget">
			<?php foreach($feed->get_items(0, 15) as $item) : ?>
			<li>
				<?php echo $item->get_description(); ?>
				<h4><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h4>
				<p>
					<?php echo $item->get_date(); ?>
				</p>
			</li>
			<?php endforeach; ?>
		</ul>
</div><!--end container-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="jquery.newsScroll.js"></script>

<script type="text/javascript">
	$('#widget').newsScroll({
		speed: 2000,
		delay: 5000
	});
	
	// or just call it like:
	// $('#widget').newsScroll();
</script>

</body>
</html>
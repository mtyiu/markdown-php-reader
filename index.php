<?php

require_once( 'Parsedown.php' );

$path = $_GET[ 'p' ];
$contents = file_get_contents( $path );

$Parsedown = new Parsedown();

$contents = $Parsedown->text( $contents );

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="index.css">
	<script src="jquery.min.js"></script>
</head>
<body>
<div class="container-fluid">
	<?php echo $contents; ?>
	<hr />
	File Name: <code><?php echo str_replace( '../', '', $path ); ?></code>
</div>
<script>
	$( 'code' ).each( function( i, element ) {
		var html = $( element ).html()
		if ( html.startsWith( '$' ) ) {
			$( element ).after( html )
			$( element ).remove()
		}
	} )
</script>
<script type="text/x-mathjax-config">
	MathJax.Hub.Config({
		tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]},
		skipTags: ["script","noscript","style","textarea"]
	});
</script>
<script type="text/javascript" src="//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
</body>
</html>


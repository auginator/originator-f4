<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	
	<title>
	<?php if (function_exists('is_tag') && is_tag()) {
	      single_tag_title('Tag Archive for &quot;'); echo '&quot; - ';
	} elseif (is_archive()) {
	      wp_title(''); echo ' Archive - ';
	} elseif (is_search()) {
	      echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
	} elseif (!(is_404()) && (is_single()) || (is_page())) {
	      wp_title(''); echo ' - ';
	} elseif (is_404()) {
	      echo 'Not Found - ';
	}
	if (is_home()) {
	      bloginfo('name'); echo ' - '; bloginfo('description');
	} else {
	      bloginfo('name');
	}
	if ($paged > 1) {
	      echo ' - page '. $paged;
	} ?>
	</title>
	
	<!-- Load main stylesheet -->
	<link rel='stylesheet' href='<?php bloginfo("stylesheet_url"); ?>' type='text/css' media='screen' />	
  	<!-- Call wp head -->
  	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	
	<div class="fixed">
	<?php
	
	//Add our Top Bar Nav: http://foundation.zurb.com/docs/components/top-bar.html 
	amsf_topnav();
	
	?>
	</div>

	<div class="header-image-wrap">
		<div class="row">
			<div class="large-12 columns">
				<div class="siteinfo">
					<h1><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
					<h4 class="subheader"><small><?php echo get_bloginfo ( 'description' ); ?></small></h4>
				</div>
			</div>
		</div>
	</div>
<!--
	TODO: DISABLING BREADCRUMBS TILL I HAVE BETTER SOLUTION...
	<div class="breadcrumb-wrap">
		<div class="row">
			<div class="large-12 columns">
				<?php //the_breadcrumb(); ?>
			</div>
		</div>
	</div>
-->
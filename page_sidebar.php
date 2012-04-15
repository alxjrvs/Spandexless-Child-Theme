<?php
/**
 * Template Name: Page Sidebar
 * The main template file for display page.
 *
 * @package WordPress
*/


/**
*	Get Current page object
**/
$page = get_page($post->ID);


/**
*	Get current page id
**/
$current_page_id = '';

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}

$page_sidebar = get_post_meta($current_page_id, 'page_sidebar', true);

get_header(); 
?>
		<br class="clear"/>

		<!-- Begin content -->
		<div id="content_wrapper">
			
			<div class="inner">
			
				<!-- Begin main content -->
				<div class="inner_wrapper">
				
				<div class="sidebar_content sidebar_page">
				<div class="hrrule"> </div> 
				
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		
						
							<h2 class="widgettitle header pagehead"><?php the_title(); ?></h2>
							
							<div class="page_fullwidth">			
								<?php do_shortcode(the_content()); ?>
							</div>

					<?php endwhile; ?>
					
				</div>
				
				<div class="sidebar_wrapper">
    				
					<div class="above_sidebar searchbuh">
						<input type="submit" id="searchsubmit" value="Search" class="btn"><h2 class="widgettitle">Search</h2></input>
						<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" size="18" value="" name="s" id="s" />

</div>
</form>
</div>

    				<div class="ads125_wrapper">
					    <?php
					        $pp_side_banner = get_option('pp_side_banner');
					    
					        if(!empty($pp_side_banner))
					        {
					        	echo stripslashes($pp_side_banner);
					        }
					    ?>
					</div>
    			
    				<div class="sidebar">
    				
    					<div class="content">
    				
    						<ul class="sidebar_widget">
    						<?php dynamic_sidebar($page_sidebar); ?>
    						</ul>
    					
    					</div>
    			
    				</div>
    				<br class="clear"/>

    			</div>
    			
    			<br class="clear"/>
				
				</div>
				<!-- End main content -->
				
				<br class="clear"/>
			</div>
			
		</div>
		<!-- End content -->

<br class="clear"/>
<?php get_footer(); ?>

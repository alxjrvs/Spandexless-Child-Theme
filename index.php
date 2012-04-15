<?php
include("wejnswpwhitespacefix.php");
/**
 * The main template file.
 *
 * @package WordPress
 */
 
get_header();

$pp_slider_timer = get_option('pp_slider_timer'); 			
if(empty($pp_slider_timer))
{
    $pp_slider_timer = 5;
}

// Get featured posts
$pp_featured_cat = get_option('pp_featured_cat');
$pp_home_display_slide = TRUE; 
$featured_posts_arr = array();

if(isset($_SESSION['pp_menu_style']))
{
    $pp_menu_style = $_SESSION['pp_menu_style'];
}
else
{
    $pp_menu_style = get_option('pp_menu_style');
}
		
?>

		<input type="hidden" id="slider_timer" name="slider_timer" value="<?php echo $pp_slider_timer; ?>"/>
	
		<br class="clear"/>
	
		<div id="content_wrapper">
			
			<div class="inner">
			
				<!-- Begin main content -->
				<div class="inner_wrapper">
				
				<?php
					if($pp_menu_style != 4 && $pp_menu_style != 5 && $pp_menu_style != 6)
					{
						include_once (TEMPLATEPATH . "/templates/template-slide-1.php");
					}
					else
					{
						include_once (TEMPLATEPATH . "/templates/template-slide-2.php");
				?>
				
					<div class="sidebar_content">
					
				<?php
					}
				?>
					
					<?php

					global $more; $more = false; # some wordpress wtf logic
					
					if(isset($_SESSION['pp_blog_layout']))
					{
					    $pp_blog_layout = $_SESSION['pp_blog_layout'];
					}
					else
					{
					    $pp_blog_layout = get_option('pp_blog_layout');
					}
					
					include_once (TEMPLATEPATH . "/templates/template-blog-".$pp_blog_layout.".php");

					if($pp_menu_style == 4 OR $pp_menu_style == 5 OR $pp_menu_style == 6)
					{
					?>
					</div>
					<?php
					}
					else
					{
					?>
					</div>
					</div>
					<?php
					}
					?>
					
					<div class="sidebar_wrapper">
					<div class="above_sidebar searchbuh">
						<input type="submit" id="searchsubmit" value="Search" class="btn"><h2 class="widgettitle">Search</h2></input>
						<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" size="18" value="" name="s" id="s" />

</div>
</form>

</div> 
					
						<?php
							$twitter_id = get_option(SHORTNAME.'_twitter_username');
							$fb_id = get_option('pp_feedburner_id');
							
							if(!empty($twitter_id) OR !empty($fb_id)):
						?>
						<div class="social_profile">
							<div class="profile">
								<a href="<?php echo $fb_id; ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/social_feeds.png" alt="" class="alignleft social"/>
								</a>
								<h4><?php pp_feeds_count(); ?></h4>
								<span class="count">subscribers</span>
							</div>
						
							<div class="profile">
								<a href="http://twitter.com/<?php echo $twitter_id; ?>">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/social_twitter.png" alt="" class="alignleft social"/>
								</a>
								<h4><?php pp_twitter_followers(); ?></h4>
								<span class="count">followers</span>
							</div>
							
							 <br class="clear"/>
						</div>
						<?php
							endif; 
						?>	
<?php dynamic_sidebar('abovesidebar_main'); ?>
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
					    		<?php dynamic_sidebar('Home Sidebar'); ?>
					    		</ul>
					    	
					    	</div>
					
					    </div>
					    <br class="clear"/>

					</div>
					
					<br class="clear"/>
				</div>
				<!-- End main content -->
				
			</div>
		
		</div>

<?php get_footer(); ?>

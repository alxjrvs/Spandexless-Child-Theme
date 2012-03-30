<?php
/**
 * The main template file for display category page.
 *
 * @package WordPress
*/

get_header(); 

?>
		<br class="clear"/>
	
		<div id="content_wrapper">
			
			<div class="inner">
			
				<!-- Begin main content -->
				<div class="inner_wrapper">
			
				<div class="sidebar_content">
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
				?>

				</div>
					
    			<div class="sidebar_wrapper">
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
    				
				<h2 class="widgettitle header"><?php printf( __( 'Results for &quot;%s&quot;', THEMEDOMAIN ), '' . get_search_query() . '' ); ?></h2>
				
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
    						<?php dynamic_sidebar('Search Sidebar'); ?>
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

<?php get_header(); ?>

<div class="content">

<div id="primary-wrapper">
	<div id="primary">
		<div id="notices"></div>
		<a name="startcontent" id="startcontent"></a>

		<div id="current-content" class="hfeed">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-head">
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php k2_permalink_title(); ?>"><?php the_title(); ?></a>
					</h1>

					<?php /* Edit Link */ edit_post_link(__('Edit','k2_domain'), '<span class="entry-edit">', '</span>'); ?>

					<?php /* K2 Hook */ do_action('template_entry_head'); ?>
				</div><!-- .entry-head -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

				<div class="entry-foot">
					<?php wp_link_pages( array('before' => '<div class="entry-pages"><span>' . __('Pages:','k2_domain') . '</span>', 'after' => '</div>' ) ); ?>

					<?php /* K2 Hook */ do_action('template_entry_foot'); ?>
				</div><!-- .entry-foot -->
			</div><!-- #post-ID -->
			
			<?php
				global $wpdb;
				$querystr = "SELECT ID, post_title, guid FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish' AND post_parent = ".$post->ID." ORDER BY post_title";
				$pageposts = $wpdb->get_results($querystr, OBJECT);
			?>
			
			<?php if( count($pageposts) > 0 ){ ?>
			<div class="matrix">	
				<ol>
					<?php
					foreach( $pageposts as $page )
					{ ?>
						<li>
							<a href="<?php echo get_permalink( $page->ID ) ?>">
								<?php echo get_the_post_thumbnail( $page->ID ); ?>
								<span class="title"><?php echo $page->post_title; ?></span>
							</a>
						</li>
					<?php
					} ?>
				</ol>
			</div>	
			<?php } ?>	
				
			<?php if ( comments_open() ): ?> 
			<div class="comments">
				<?php comments_template(); ?>
			</div><!-- .comments -->
			<?php endif; ?>

			<?php /* if ( get_post_custom_values('comments') ): ?>
			<div class="comments">
				<?php comments_template(); ?>
			</div><!-- .comments -->
			<?php endif; */ ?>

		<?php endwhile; else: define('K2_NOT_FOUND', true); ?>

			<?php locate_template( array('blocks/k2-404.php'), true ); ?>

		<?php endif; ?>

		</div><!-- #current-content -->

		<div id="dynamic-content"></div>
	</div><!-- #primary -->
</div><!-- #primary-wrapper -->

<?php if ( ! get_post_custom_values('sidebarless') ) get_sidebar(); ?>

</div><!-- .content -->
	
<?php get_footer(); ?>
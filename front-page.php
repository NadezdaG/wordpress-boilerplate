<?php get_header();?>

<!-- SLIDER -->
    <div class="ng_slider">
            <!-- Navigation arrows -->
      <div class="ng_slider__arrows">
        <a class="ng_slider__arrows__left" href="#" onclick="nextSlide(-1)">❮</a>
        <a class="ng_slider__arrows__right" href="#" onclick="nextSlide(1)">❯</a>
      </a>
    </div>

        <div class="ng_slider__slide slide1 active">
            <div class="ng_slider__slide__content">
              <h2>Text 1</h2>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<p>
              <a href="#" class="btn btn-dark" title="">View more</a>
          </div>
        </div>


      <div class="ng_slider__slide slide2">
            <div class="ng_slider__slide__content slide2">
              <h2>Text 2</h2>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<p>
              <a href="#" class="btn btn-dark" title="">View more</a>
          </div>
        </div>
        <div class="ng_slider__slide slide3">
            <div class="ng_slider__slide__content">
              <h2>Text 3</h2>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<p>
              <a href="#" class="btn btn-dark" title="">View more</a>
          </div>
        </div>
</div>
<!-- end of SLIDER -->


<div class="ng-container">
	<section class="mainContent">
	<!-- SHOWING MAIN CONTENT -->
	<?php if (have_posts()): while (have_posts()): the_post();?>
				  <h1><?php the_title();?></h1>
				  <?php the_content();?>
				<?php endwhile;endif;?>
  <!-- end of MAIN CONTENT -->
	</section>


	<!-- SHOWING SIDE PANEL WITH LATEST NEWS -->
	<aside>
<?php
$the_query = new WP_Query(array(
    'category_name'  => 'news',
    'posts_per_page' => 3,
));
?>
<?php if ($the_query->have_posts()): ?>
  <?php while ($the_query->have_posts()): $the_query->the_post();?>
		<article class="ng_post">
			  <?php the_post_thumbnail('medium');?>
		    <div class="ng_post__content">
			    <h3><a href="<?php the_permalink()?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
			    <p class="ng_post__meta"><?php echo get_the_date('d M Y'); ?></p>
			    <?php the_excerpt();?>
		    </div>
		    <a href="<?php the_permalink()?>" title="<?php the_title();?>" class="btn btn-dark"><?php the_title();?></a>
		</article>
		  <?php endwhile;?>
  <?php wp_reset_postdata();?>

<?php else: ?>
  <p><?php __('No News');?></p>
<?php endif;?>
	</aside>

	<!-- END OF SIDE PANEL -->

</div>
</div>

<?php get_footer();?>
<?php get_header(); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		   
		
        <article role="main" class="primary-content type-post digital-course" id="post-<?php the_ID(); ?>">
            <header>
				<div class="wrap">
                	<h1><?php the_title(); ?></h1>
					<div class="call-to-action">
						<a class="btn" href="<?= types_render_field("digital-course-url", array("raw" => true)); ?>">Begin Course</a>
					</div>
				</div>
				<?php the_post_thumbnail(); ?>
            </header>
			
			<section class="course-description">
				<div class="wrap">
					<div class="video">
						<a data-lity href="<?= types_render_field("digital-course-video-url", array("raw" => true)); ?>">
							<?= types_render_field("digital-course-video-image", array("size" => "highlight")); ?>
						</a>
					</div>
					<div class="description">
						<h2>Course Description</h2>
						<?= types_render_field("digital-course-description"); ?>
						<a class="btn" href="<?= types_render_field("digital-course-url", array("raw" => true)); ?>">Begin Course</a>
						<a class="btn btn-code" href="<?= types_render_field("digital-tottlabs-payment-url", array("raw" => true)); ?>">Enter Access Code</a>
					</div>
				</div>
			</section>
			
			<?php 
				$reviews = toolset_get_related_posts(
					$post->ID, 
					'course-review', 
					'parent', 
					1000000,
					0,
					array(),
					'post_object',
					'child'
				);		
				
				if (!empty($reviews)) :
			?>
				<section class="reviews">
					<div class="wrap">
						<h2>Course Reviews</h2>
						<?php foreach($reviews as $review) : ?>
							<div class="review">
								<h3><?= get_post_meta($review->ID, "wpcf-digital-review-author", true); ?></h3>
								<div class="rating rating-<?= get_post_meta($review->ID, "wpcf-digital-star-rating", true); ?>">
									<span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
								</div>
								<div class="review-content">
									<h3><?= $review->post_title; ?></h3>
									<p><?= $review->post_content; ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</section>
			<?php endif;?>
			
			<section class="what-youll-learn">
				<div class="wrap">
					<div class="learning-content">
						<h2>What You'll Learn</h2>
						<?php the_content(); ?>
					</div>
					<div class="course-meta">
						<h3><?php the_title(); ?></h3>
						<a class="btn" href="<?= types_render_field("digital-course-brochure", array("raw" => true)); ?>">Download Course Brochure</a>
						<?= types_render_field("digitial-course-content-short-details"); ?>
						<a class="btn btn-code" href="<?= types_render_field("digital-tottlabs-payment-url", array("raw" => true)); ?>">Have an Access Code?</a>
						<a href="mailto:contact@dukece.com">HAVE A QUESTION? Contact us...</a>
					</div>
				</div>
			</section>
			
			<section class="course-content">
				<div class="wrap">
					<h2>Course Content- Overview</h2>
					<?= types_render_field("digital-course-content"); ?>
					
					<h2>About the Instructors</h2>
					<?php 
						$instructors = toolset_get_related_posts(
							$post->ID, 
				            'course-instructor', 
				            'parent', 
				            1000000,
				            0,
				            array(),
				            'post_object',
				            'child'
						);					
						
							foreach($instructors as $instructor) :
						?>
							<div class="instructor">
								<h3><?= $instructor->post_title; ?></h3>
								<img src="<?= $instrutor->post_thumbnail; ?>" alt="<?= $instructor->post_title; ?>" />
								<div class="bio">
									<?= get_post_meta($instructor->ID, "wpcf-people-short-bio", true); ?>
								</div>
							</div>
						<?php endforeach; ?>
				</div>
			</section>

            <?php endwhile; // end of the loop. ?>
        </article>

<?php get_footer(); ?>

<div class="container">
    <div class="post mb-5">
		<div class="media">
			<div class="media-body">
				<div class="image-div">
					<a href="<?php the_permalink(); ?>">
					<img class="post-thumb" 
						src="<?php 
							the_post_thumbnail_url('thumbnail'); 
							?>" alt="image">
					</a>
				</div>
				<div class="post-detail-div">
					<h3 class="title mb-1">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					<div class="meta mb-1">
						<span class="date"><?php the_date(); ?></span>
						<span class="time">5 min read</span>
						<span class="comment">
							<a href="#"><?php comments_number(); ?></a>
						</span>
					</div>
					<div class="intro">
						<?php the_excerpt(); ?>
					</div>
					<button class="read-more-button">
						<a 	class="more-link" 
							href="<?php the_permalink(); ?>">
							Read more &rarr;
						</a>
					</button>
				</div>
			</div><!--//media-body-->
		</div><!--//media-->
	</div>
</div>
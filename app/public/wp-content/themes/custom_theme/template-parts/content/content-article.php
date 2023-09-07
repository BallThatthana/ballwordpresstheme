<div class="container">
	<header class="content-header">
		<div class="meta mb-3">
            <span class="date"><?php the_date(); ?></span>
                <?php 
                    the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span');
                ?>
            <span class="comment"><a href="#comments"><i class='fa fa-comment'><?php comments_number(); ?></i></a></span>
        </div>
	</header>
    <div class="content-container">
        <div class="image-container">
            <div class="blog-image" style="margin-bottom: 10px;">
                <?php 
                    the_post_thumbnail();
                ?>
            </div>
        </div>
        <div>
            <?php 
                the_content();
            ?>
        </div>
    </div>

<?php 
    comments_template();
?>

</div>
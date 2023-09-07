<?php 
    if(have_posts()){
        get_header();
    } else {
        get_header();
    }
?>
	<article class="content px-3 py-5 p-md-5">
	    <?php 
            if(have_posts()){
                while( have_posts() ){
                    the_post();
                    get_template_part('template-parts/archive/content-archive');

                } 
        
            } else {
                echo '<h3>Post Not Found Here</h3>';
                get_search_form();

            }
        ?>
     <?php 
        the_posts_pagination();
    ?>
	</article>
<?php 
    get_footer();
?>

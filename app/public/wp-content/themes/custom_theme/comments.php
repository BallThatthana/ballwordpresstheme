<div class="comments-wrapper">

					<div class="comments" id="comments">

						<div class="comments-header">

							<h3 class="comment-reply-title">
                                <?php 
                                    if(! have_comments()){
                                        echo "Leave a Comment";
                                    } else {
                                        echo get_comments_number(). " Comments";
                                    }
                                ?>
                            </h3><!-- .comments-title -->

						</div><!-- .comments-header -->

						<div class="comments-inner">

                                    <?php wp_list_comments(
                                        array(
                                            'avatar_size' => 120,
                                            'style' => 'div'
                                         )
                                        ); 
                                    ?>
							
						</div><!-- .comments-inner -->

					</div><!-- comments -->

					<hr class="" aria-hidden="true">
					<?php 
                        if( comments_open()){
                            comment_form(
                                array(
                                    'class_form' => '',
                                    'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
                                    'title_reply_after' => '</h3>'
                                
                                    )
                            );
                        }
                    ?>

				</div>
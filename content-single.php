
<div class='container'>
    <div class='row'>
        <?php
            if(have_posts()):
                while(have_posts()):
                    the_post();?>
                    
                    <h1 style="text-align:center"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                    <small>Posted on: <?php the_time('F j, Y');?> at <?php the_time('g:i a')?></small>
                    <h4><?php the_category();?></h4>
                    <div><?php the_tags();?> <?php edit_post_link();?></div>
                    <div class="thumbnail-img"><?php the_post_thumbnail('large');?></div>
                    <div class='content'>
                        <?php the_content();?>
                    </div>
                    <div class="comments">
                        <?php
                        if(comments_open()){
                            comments_template();
                        }else{
                            echo "<h3>Sorry! Comments are closed.</h3>";
                        }
                        ?>
                    </div>
                <?php endwhile;?> 
                        <div class="pagination">
                            <div class="left">
                                <?php previous_post_link();?>
                            </div>
                            <div class="right">
                                <?php next_post_link();?>
                            </div>
                        </div>
                    <?php else:?>
                        <p><?php _e('Sorry! No Posts were found.');?></p>
            <?php endif;
        ?>
    </div>
</div>
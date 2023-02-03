
<div class='container'>
    <div class='row'>
        <?php
            if(have_posts()):
                while(have_posts()):
                    the_post();?>
                    
                    <h1 style="text-align:center"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                    <small>Posted on: <?php the_time('F j, Y');?> at <?php the_time('g:i a')?></small>
                   <h4> <?php the_category();?></h4>
                   <div><?php the_tags();?> <?php edit_post_link();?></div>
                    <div class="thumbnail-img"><?php the_post_thumbnail('large');?></div>
                    <?php the_content();?>

                <?php endwhile; else:?>
                        <p><?php _e('Sorry! No Posts were found.');?></p>
            <?php endif;
        ?>
    </div>
</div>
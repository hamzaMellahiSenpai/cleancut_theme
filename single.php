<?php get_header();    
    while(have_posts()) : the_post();?>
        <section class="row title-bar">
            <div class="container">
                <h1><?php the_title(); ?></h1>        
            </div>
        </section>    
        <section class="row page post">
          <div class="container">
            <div class="col-md-8">
              <?php if(has_post_thumbnail()):
                        the_post_thumbnail('full', array(
                            "class" => "img-responsive"
                        ));
                      endif;
                ?>
              <div class="meta">
              Posted On <?php the_time('F j Y g:i a'); ?> By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                <?php the_author(); ?>
                            </a>
              </div>
              <p><?php the_content(); ?></p>
              <?php comments_template(); ?>
            </div>
            <div class="col-md-4">
              <?php 
                if(is_active_sidebar('sidebar')):
                    dynamic_sidebar('sidebar');
                endif;
              ?>
          </div>
        </section>
     <?php endwhile;
get_footer(); ?>

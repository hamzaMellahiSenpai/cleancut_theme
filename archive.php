<?php get_header(); ?>
    <section class="row title-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                     <h1>
                        <?php 
                        if(is_category()): 
                            single_cat_title(); // RETURN
                        elseif(is_author()) : 
                            the_post();
                            echo 'Archives By Author : ' . get_the_author();
                            rewind_posts();
                        elseif(is_tag()):
                            single_tag_title();
                        elseif(is_day()):
                            echo 'Archives By Day : ' . get_the_date();
                        elseif(is_month()):
                            echo "Archives By Day : " . get_the_date('F Y');
                        elseif(is_year()):
                            echo 'Archives By Day : ' . get_the_date('Y');
                        else:
                            echo "Archives";
                        endif; ?>
                    </h1>  
                 </div>
                 <div class="col-sm-8">
                     <?php 
                         if(is_active_sidebar('subnav')):
                             dynamic_sidebar('subnav');
                         endif; 
                    ?>
                 </div>
            </div>      
        </div>
    </section> 
<?php 
    $i = 0;
    while(have_posts()) : the_post();
        $i++;
        if($i % 2 != 0):
            // ODD POST
            $section_class = "section-a";
            $left_class    = "col-lg-5 col-sm-6 animated fadeInLeft";
            $right_class   = "col-lg-5 col-lg-offset-2 col-sm-6";
            $image_class   = "fadeInRight";
        else:
            // EVEN POST
            $section_class = "section-b";
            $left_class    = "col-lg-5 col-lg-offset-2 col-sm-6";
            $right_class   = "col-lg-5 col-sm-6 animated fadeInLeft";
            $image_class   = "fadeInLeft";
        endif;
         ?>
        <div class="<?php echo $section_class ?>">
            <div class="container">
                <div class="row">
                    <div class="<?php echo $left_class ?>">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading"><?php the_title(); ?></h2>
                        <div class="meta">
                            Posted On <?php the_time('F j Y g:i a'); ?> By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                                <?php the_author(); ?>
                            </a>
                            In <?php $categories = get_the_category();
                                    $seperator = ", ";
                                    $output = "";
                                    if($categories):
                                        foreach($categories as $category):
                                            $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . "</a>" . $seperator;
                                        endforeach;
                                    endif;
                                    echo trim($output , $seperator);
                                     ?>
                        </div> 
                        <p class="excerpt"><?php the_excerpt(); ?></p>
                        <button class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</button>
                    </div>
                    <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                        <?php if(has_post_thumbnail()):
                                the_post_thumbnail('full', array(
                                    "class" => "img-responsive animated "
                                ));
                              endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
     <?php endwhile;
get_footer(); ?>

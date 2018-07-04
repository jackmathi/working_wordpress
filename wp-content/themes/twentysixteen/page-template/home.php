<?php
/**
/* Template Name: Home Page 
 * @package WordPress
 * @subpackage CMHC
 * @since CMHC
 */
get_header(); ?>
    <!-- banner start here -->
    <section class="banner-section">
        <div class="swiper-container home-banner">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img class="mobile-img" src="img/bgimg3.jpg" alt="banner3">
                    <img class="desktop-img" src="<?php echo( get_option('banner_default') ); ?>" alt="banner1">
                    <div class="hero-banner-desc-left">
                        <div class="container banner-info">
                            <div class="hero-banner-content">
                                <h1>  <?php echo someshortocode_callback(); ?>


                                    <?php echo( get_option('banner_heading') ); ?></h1>
                                <p>
                                    <?php echo( get_option('banner_descri') ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img class="mobile-img" src="img/bgimg2.jpg" alt="banner2">
                    <img class="desktop-img" src="<?php echo( get_option('banner_default1') ); ?>" alt="banner2">
                    <div class="hero-banner-desc-left">
                        <div class="container banner-info">
                            <div class="hero-banner-content">
                                <h1><?php echo( get_option('banner_heading1') ); ?></h1>
                                <p>
                                    <?php echo( get_option('banner_descri1') ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img class="mobile-img" src="img/bgimg1.jpg" alt="banner1">
                    <img class="desktop-img" src="<?php echo( get_option('banner_default2') ); ?>" alt="banner3">
                    <div class="hero-banner-desc-left">
                        <div class="container banner-info">
                            <div class="hero-banner-content">
                                <h2><?php echo( get_option('banner_heading2') ); ?></h2>
                                <p>
                                    <?php echo( get_option('banner_descri2') ); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- banner end here -->

    <!-- help section start here -->
    <section class="help-section clearfix">
        <div class="container">
            <div class="row button-diraction">
                <div class="col-4 help-content">
                    <h4><?php echo( get_option('con_button_title') ); ?></h4>
                </div>
                <div class="col-4 contact-but">
                    <a href="<?php echo( get_option('con_button_link') ); ?>" class="button button-primary">
                        <?php echo( get_option('con_button_text') ); ?>
                    </a>
                </div>
                <div class="col-4">
                    <a href="<?php echo( get_option('app_button_link') ); ?>" class="button">
                        <?php echo( get_option('app_button_text') ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- help section end here -->

    <!-- About section end here -->
    <section id="about-section" class="section-row">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <!-- <img src="img/about-us.jpg" alt="aboutus"/> -->
                    <h2><?php echo( get_option('left_descri') ); ?></h2>
                </div>
                <div class="col-8 about-content">
                    <p>
                        <?php echo( get_option('right_descri') ); ?>
                    </p>
                    <a href="<?php echo( get_option('btn_link') ); ?>" class="button">
                        <?php echo( get_option('btn_name') ); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- About section end here -->

    <!-- Generic information start here -->
    <section class="generic-info">
        <div class="container">
            <div class="swiper-container info-banner">
                <div class="swiper-wrapper">

                    <?php 
$args = array( 'post_type' => 'quotation', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>

                        <div class="swiper-slide">
                            <div class="row">
                                <div class=" col-10 align-items-center ">
                                    <blockquote>
                                        <?php echo get_the_content();?>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;?>
                </div>
            </div>
        </div>
    </section>
    <!-- Generic information end here -->

    <div class="container">
        <!--  Assessments and treatement section Start -->

        <section class="treat-assessments section-row">
            <div class="row">
                <div class="col-4 navs">
                    <div class="treat-head">
                        <h2><?php echo( get_option('resource_title') ); ?></h2>
                        <p>
                            <?php echo( get_option('resource_content') ); ?>
                        </p>
                    </div>
                </div>
                <div class="col-4 navs">
                    <div class="assess-nav">
                        <h5><?php echo( get_option('resource_sub_heading1') ); ?></h5>

                        <ul class="nav-box">
                            <?php 
$args = array( 'post_type' => 'assessments', 'posts_per_page' => 5 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
?>
                                <li>
                                    <a href="#">
                                        <?php the_title();?>
                                    </a>
                                </li>
                                <?php endwhile;?>
                        </ul>
                    </div>
                </div>
                <div class="col-4 navs">
                    <div class="assess-nav">
                        <h5><?php echo( get_option('resource_sub_heading2') ); ?></h5>
                        <ul class="nav-box ">
                            <?php 
$args = array( 'post_type' => 'treatements', 'posts_per_page' => 5 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();?>
                                <li>
                                    <a href="#">
                                        <?php the_title();?>
                                    </a>
                                </li>
                                <?php endwhile;?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--  Assessments and treatement section End -->
        <!-- Resources section end -->
        <!-- Resources section end -->
        <section class="resources-details section-row">
            <div class="row">
                <div class="col-8 center-block">
                    <h2><?php echo get_option('resource_sub_heading5'); ?></h2>
                </div>
            </div>
            <div class="resource-tab">
                <!-- tabs start -->
                <div class="tabs">
            <ul class="tabs-links">
                        <?php
               $args = array(
               'numberposts' =>5,
               'post_type' => 'post',
               'orderby' => 'ID',
               'order' => 'ASC', 
               );
               $uses = get_posts($args);
               $a=1;
               $i = 0;
               $len = count($uses);
               foreach($uses as $post) {
               $active_class = ($a == 1) ? 'active' : '';
               setup_postdata($post); 
               $assessments= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
            ?>

                            <li class="<?php echo $active_class; ?>">
                                <a href="#tab<?php echo $post->ID; ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>

                            <?php $a++; } wp_reset_postdata(); ?>
                    </ul>
                    <div class="tabs-content accordion-row help-tab">
                        <?php
               $args = array(
               'numberposts' =>5,
               'post_type' => 'post',
               'orderby' => 'ID',
               'order' => 'ASC', 
               );
               $uses = get_posts($args);
               $a=1;
               $i = 0;
               $len = count($uses);
               foreach($uses as $post) {
               $active_class = ($a == 1) ? 'active' : '';
               setup_postdata($post); 
               $assessments= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); 
               ?>
                            <div id="tab<?php echo $post->ID; ?>" class="tab <?php echo $active_class; ?> tab-content accordion-row-blk">
                                <?php     { ?>
                                    <h6><?php the_title(); ?></h6>
                                    <?php }
                                        // …
               $i++;
 ?>
                                        <div class="mobile-tabContent">
                                            <div class="row">
                                                <div class="col-9 content-details align-self-center">
                                                    <?php the_content();?>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                            <?php $a++; } wp_reset_postdata(); ?>
                    </div>
                </div>
                <!-- tabs end -->
            </div>
        </section>
        <!-- Resources section end -->
    </div>

<!--- Custome post demo code -->







    <?php get_footer(); ?>
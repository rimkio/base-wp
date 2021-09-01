<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package flip_base
 */

get_header();
?>
    <main id="primary" class="site-main">
        <div class="container">
            <!--Start news hero header-->
	        <?= flip_base_template_news_hero_header(); ?>
            <!--End news hero header-->
        </div>
        <div class="content-single">
            <div class="container">
                <?php
                while ( have_posts() ) :
	                the_post();
	                $categories = get_the_category();
	                ?>
                    <div class="header-single">
                        <div class="thumbnail"><?= get_the_post_thumbnail(); ?></div>
                        <div class="post__info">
                            <span class="date"><?= get_the_date(); ?></span>
                            <h1 class="title"><?= get_the_title(); ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="post-body">
                                <div class="inner-content"><?= get_the_content(); ?></div>
                                <div class="sharing">
                                    <div class="sharing-inner">
                                        <span>SHARE</span>
                                        <div class="icons">
                                            <a target="_blank" rel="noreferrer noopener" href="https://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="20"> <path fill="#fff" fill-rule="evenodd" d="M7.998 3.188H9.75V.135A22.634 22.634 0 007.197 0C4.67 0 2.938 1.59 2.938 4.511V7.2H.15v3.413h2.788V19.2h3.42v-8.586h2.676L9.458 7.2H6.357V4.85c0-.987.266-1.662 1.64-1.662z" /> </svg></a>
                                            <a target="_blank" rel="noreferrer noopener" href="https://twitter.com/share?text=<?= get_the_title(); ?>&url=<?= get_the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="15"> <path fill="#fff" fill-rule="nonzero" d="M18.432 1.773c-.685.3-1.416.5-2.177.597A3.758 3.758 0 0017.917.28a7.552 7.552 0 01-2.396.915A3.778 3.778 0 008.985 3.78c0 .3.025.587.087.861A10.696 10.696 0 011.283.69a3.804 3.804 0 00-.517 1.91c0 1.309.674 2.469 1.679 3.14a3.732 3.732 0 01-1.708-.465v.041a3.796 3.796 0 003.028 3.713 3.771 3.771 0 01-.991.125c-.242 0-.486-.014-.715-.065a3.815 3.815 0 003.53 2.632 7.593 7.593 0 01-4.685 1.612c-.31 0-.607-.014-.904-.052a10.638 10.638 0 005.797 1.696c6.953 0 10.755-5.76 10.755-10.753a9.64 9.64 0 00-.014-.488 7.538 7.538 0 001.894-1.962z" /> </svg></a>
                                            <a target="_blank" rel="noreferrer noopener" href="mailto:?subject=<?= get_the_title(); ?>&amp;body=<?= get_the_permalink(); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="15"> <g fill="#fff" fill-rule="nonzero"> <path d="M9 6.183l8.514-4.995A2.7 2.7 0 0015.3 0H2.7A2.7 2.7 0 00.468 1.179L9 6.183z" /> <path d="M9.9 7.731a1.8 1.8 0 01-.9.243 1.8 1.8 0 01-.9-.234L0 2.997V11.7a2.7 2.7 0 002.7 2.7h12.6a2.7 2.7 0 002.7-2.7V2.997L9.9 7.731z" /> </g> </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile; // End of the loop.
                ?>
            </div>

	        <?php flip_base_news_related_post( get_the_ID() ); ?>
        </div>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();

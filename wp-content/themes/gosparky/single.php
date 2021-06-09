<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>

    <div class="single content">

        <div class="inner-content">

            <main class="main" role="main">
                <div class="grid-container">

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <?php get_template_part('parts/loop', 'single'); ?>

                    <?php endwhile; else : ?>

                        <?php get_template_part('parts/content', 'missing'); ?>

                    <?php endif; ?>
                </div>

            </main> <!-- end #main -->

            <?php // get_sidebar(); ?>

        </div> <!-- end #inner-content -->

    </div> <!-- end #content -->

<?php get_footer(); ?>
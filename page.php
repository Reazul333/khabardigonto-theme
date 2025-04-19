<?php get_header(); ?>

<div class="layout">
    <div class="content">

        <!-- 🔖 Breadcrumbs -->
        <?php khabardigonto_breadcrumbs_display(); ?>
        <?php khabardigonto_breadcrumbs_display(); ?>


        <main>
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <article class="single-post">
                        <h1><?php the_title(); ?></h1>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </article>

                    <?php comments_template(); ?>

            <?php
                endwhile;
            else :
                echo '<p>এই পেজ খুঁজে পাওয়া যায়নি।</p>';
            endif;
            ?>
        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

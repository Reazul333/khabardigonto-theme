<?php get_header(); ?>

<main>
<?php khabardigonto_breadcrumbs_display(); ?>

    <h1>সাম্প্রতিক সংবাদ</h1>

    <?php if (have_posts()) : ?>
        <div class="post-grid">
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>কোনো পোস্ট পাওয়া যায়নি।</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>

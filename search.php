<?php get_header(); ?>

<div class="layout">
    <div class="content">

        <!-- 🔖 Breadcrumbs -->
        <?php khabardigonto_breadcrumbs_display(); ?>

        <main>
            <h2 class="category-title">
                "<?php echo get_search_query(); ?>" এর জন্য ফলাফল:
            </h2>

            <?php if (have_posts()) : ?>
                <div class="post-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p>দুঃখিত, আপনার খোঁজার সাথে মিলে এমন কিছু পাওয়া যায়নি।</p>
            <?php endif; ?>
        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

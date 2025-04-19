<?php get_header(); ?>

<div class="layout">
    <div class="content">

        <!-- 🔖 Breadcrumbs -->
        <?php khabardigonto_breadcrumbs_display(); ?>

        <main>
            <h2 class="category-title"><?php single_cat_title(); ?></h2>

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

                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '« পূর্ববর্তী',
                        'next_text' => 'পরবর্তী »',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <p>এই ক্যাটাগরিতে কোনো পোস্ট পাওয়া যায়নি।</p>
            <?php endif; ?>
        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

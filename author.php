<?php get_header(); ?>

<div class="layout">
    <div class="content">
        <?php khabardigonto_breadcrumbs_display(); ?>

        <main>
            <!-- 👤 Author Bio -->
            <section class="author-bio">
                <div class="author-avatar">
                    <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                </div>
                <div class="author-details">
                    <h2><?php the_author(); ?></h2>
                    <p><?php the_author_meta('description'); ?></p>
                </div>
            </section>

            <!-- 📰 Author's Posts -->
            <section class="category-block">
                <h2><?php the_author(); ?> এর সব পোস্ট</h2>

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
                    <p>এই লেখকের কোনো পোস্ট পাওয়া যায়নি।</p>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

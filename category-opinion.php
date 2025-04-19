<?php get_header(); ?>

<div class="layout">
    <div class="content">
        <main>
            <h2 class="category-title">মতামত</h2>

            <?php if (have_posts()) : ?>
                <div class="post-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="opinion-article">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php the_excerpt(); ?></p>

                            <div class="opinion-author">
                                <div class="avatar">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                                </div>
                                <div class="author-info">
                                    <strong><?php the_author(); ?></strong><br>
                                    <span><?php echo wp_trim_words(get_the_author_meta('description'), 12, '...'); ?></span>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '« পূর্ববর্তী',
                        'next_text' => 'পরবর্তী »',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <p>এই বিভাগে কোনো মতামত পাওয়া যায়নি।</p>
            <?php endif; ?>
        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

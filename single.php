<?php get_header(); ?>

<div class="layout">
    <div class="content">
    <?php khabardigonto_breadcrumbs_display(); ?>

        <main>
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <article class="single-post">
                        <h1><?php the_title(); ?></h1>
                        <div class="post-meta">
                            <span>📅 প্রকাশিত: <?php echo get_the_date(); ?></span> |
                            <span>🗂️ ক্যাটাগরি: <?php the_category(', '); ?></span>
                        </div>

                        <!-- ✅ Post Format Based Output -->
                        <?php if (has_post_format('video')) : ?>
                            <div class="video-format">
                                <?php
                                $video_url = get_post_meta(get_the_ID(), 'video_url', true);
                                if ($video_url) {
                                    echo '<div class="embed-container">' . wp_oembed_get($video_url) . '</div>';
                                } else {
                                    the_content();
                                }
                                ?>
                            </div>

                        <?php elseif (has_post_format('image') && has_post_thumbnail()) : ?>
                            <div class="image-format">
                                <?php the_post_thumbnail('large'); ?>
                                <div class="post-content"><?php the_content(); ?></div>
                            </div>

                        <?php elseif (has_post_format('quote')) : ?>
                            <blockquote class="quote-format">
                                <?php the_content(); ?>
                            </blockquote>

                        <?php else : ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="featured-image">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="post-content"><?php the_content(); ?></div>
                        <?php endif; ?>

                        <!-- ✅ Social Share Buttons -->
                        <div class="social-share">
                            <h4>শেয়ার করুন:</h4>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">📘 Facebook</a>
                            <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank">🐦 Twitter</a>
                            <a href="https://wa.me/?text=<?php the_permalink(); ?>" target="_blank">🟢 WhatsApp</a>
                        </div>

                        <!-- ✅ Author Bio -->
                        <div class="author-bio">
                            <div class="author-avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                            </div>
                            <div class="author-details">
                                <h4>✍️ <?php the_author(); ?></h4>
                                <p><?php the_author_meta('description'); ?></p>
                            </div>
                        </div>

                        <!-- ✅ Tags & Categories Footer -->
                        <div class="post-footer-meta">
                            <div class="post-categories">
                                🗂️ ক্যাটাগরি: <?php the_category(', '); ?>
                            </div>

                            <?php
                            $post_tags = get_the_tags();
                            if ($post_tags) :
                            ?>
                                <div class="post-tags">
                                    🏷️ ট্যাগ:
                                    <?php
                                    $tag_links = array();
                                    foreach ($post_tags as $tag) {
                                        $tag_links[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                                    }
                                    echo implode(', ', $tag_links);
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Comments Section -->
                        <?php comments_template(); ?>
                    </article>

                    <!-- ✅ Related Posts -->
                    <section class="related-posts">
                        <h2>আরও পড়ুন</h2>
                        <div class="post-grid">
                            <?php
                            $categories = get_the_category();
                            if ($categories) {
                                $cat_ids = array();
                                foreach ($categories as $category) {
                                    $cat_ids[] = $category->term_id;
                                }

                                $related = new WP_Query(array(
                                    'category__in'   => $cat_ids,
                                    'post__not_in'   => array(get_the_ID()),
                                    'posts_per_page' => 4,
                                ));

                                if ($related->have_posts()) :
                                    while ($related->have_posts()) : $related->the_post();
                            ?>
                                            <article>
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('medium'); ?>
                                                    </a>
                                                <?php endif; ?>
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            </article>
                            <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo '<p>আর কোনো সম্পর্কিত পোস্ট নেই।</p>';
                                endif;
                            }
                            ?>
                        </div>
                    </section>

            <?php
                endwhile;
            else :
                echo '<p>কোনো পোস্ট পাওয়া যায়নি।</p>';
            endif;
            ?>
        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

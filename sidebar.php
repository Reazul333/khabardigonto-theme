<?php if (is_active_sidebar('sidebar-1')) : ?>
    <aside class="sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </aside>
<?php else : ?>
    <aside class="sidebar">
        <div class="tabbed-sidebar">
            <h2>📰 সাইডবার</h2>
            <div class="tabs">
                <button class="tab-btn active" data-tab="popular">জনপ্রিয়</button>
                <button class="tab-btn" data-tab="latest">সর্বশেষ</button>
                <button class="tab-btn" data-tab="trending">আলোচিত</button>
            </div>

            <!-- জনপ্রিয় -->
            <div class="tab-content" id="popular">
                <ul class="popular-posts">
                    <?php
                    $popular_posts = new WP_Query(array(
                        'posts_per_page' => 5,
                        'orderby' => 'comment_count',
                    ));
                    if ($popular_posts->have_posts()) :
                        while ($popular_posts->have_posts()) : $popular_posts->the_post();
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<li>কোনো জনপ্রিয় পোস্ট পাওয়া যায়নি।</li>';
                    endif;
                    ?>
                </ul>
            </div>

            <!-- সর্বশেষ -->
            <div class="tab-content" id="latest" style="display: none;">
                <ul class="popular-posts">
                    <?php
                    $latest_posts = new WP_Query(array(
                        'posts_per_page' => 5,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                    if ($latest_posts->have_posts()) :
                        while ($latest_posts->have_posts()) : $latest_posts->the_post();
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<li>কোনো সর্বশেষ পোস্ট নেই।</li>';
                    endif;
                    ?>
                </ul>
            </div>

            <!-- আলোচিত -->
            <div class="tab-content" id="trending" style="display: none;">
                <ul class="popular-posts">
                    <?php
                    $trending_posts = new WP_Query(array(
                        'posts_per_page' => 5,
                        'meta_key' => 'post_views_count',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC'
                    ));
                    if ($trending_posts->have_posts()) :
                        while ($trending_posts->have_posts()) : $trending_posts->the_post();
                            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<li>কোনো আলোচিত পোস্ট নেই।</li>';
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </aside>
<?php endif; ?>

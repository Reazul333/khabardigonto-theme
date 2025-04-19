<?php get_header(); ?>

<div class="layout">
    <div class="content">
        <main>

            <?php get_template_part('breaking-news'); ?>

            <!-- 🌟 ② Featured Post Section -->
            <section class="featured-post">
                <?php
                $featured = new WP_Query(array(
                    'posts_per_page' => 1,
                    'category_name' => 'lead'
                ));
                if ($featured->have_posts()) :
                    while ($featured->have_posts()) : $featured->the_post();
                ?>
                        <article>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>কোনো ফিচার্ড পোস্ট পাওয়া যায়নি।</p>';
                endif;
                ?>
            </section>

            <!-- 📚 ③ জাতীয় ক্যাটাগরি -->
            <section class="category-block">
                <h2>জাতীয়</h2>
                <div class="post-grid">
                    <?php
                    $national = new WP_Query(array(
                        'posts_per_page' => 4,
                        'category_name' => 'জাতীয়'
                    ));
                    if ($national->have_posts()) :
                        while ($national->have_posts()) : $national->the_post();
                    ?>
                            <article>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>জাতীয় বিভাগে কোনো পোস্ট পাওয়া যায়নি।</p>';
                    endif;
                    ?>
                </div>
            </section>

            <!-- 📺 ④ খেলা ক্যাটাগরি -->
            <section class="category-block">
                <h2>খেলা</h2>
                <div class="post-grid">
                    <?php
                    $sports = new WP_Query(array(
                        'posts_per_page' => 4,
                        'category_name' => 'খেলা'
                    ));
                    if ($sports->have_posts()) :
                        while ($sports->have_posts()) : $sports->the_post();
                    ?>
                            <article>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>খেলার পোস্ট পাওয়া যায়নি।</p>';
                    endif;
                    ?>
                </div>
            </section>

            <!-- 🎬 ⑤ বিনোদন ক্যাটাগরি -->
            <section class="category-block">
                <h2>বিনোদন</h2>
                <div class="post-grid">
                    <?php
                    $entertainment = new WP_Query(array(
                        'posts_per_page' => 4,
                        'category_name' => 'বিনোদন'
                    ));
                    if ($entertainment->have_posts()) :
                        while ($entertainment->have_posts()) : $entertainment->the_post();
                    ?>
                            <article>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>বিনোদন বিভাগে কোনো পোস্ট পাওয়া যায়নি।</p>';
                    endif;
                    ?>
                </div>
            </section>

            <!-- 🌍 ⑥ আন্তর্জাতিক ক্যাটাগরি -->
            <section class="category-block">
                <h2>আন্তর্জাতিক</h2>
                <div class="post-grid">
                    <?php
                    $international = new WP_Query(array(
                        'posts_per_page' => 4,
                        'category_name' => 'আন্তর্জাতিক'
                    ));
                    if ($international->have_posts()) :
                        while ($international->have_posts()) : $international->the_post();
                    ?>
                            <article>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>আন্তর্জাতিক বিভাগে কোনো পোস্ট পাওয়া যায়নি।</p>';
                    endif;
                    ?>
                </div>
            </section>

            <!-- 📝 ⑦ মতামত ক্যাটাগরি -->
            <section class="category-block">
                <h2>মতামত</h2>
                <div class="post-grid">
                    <?php
                    $opinion = new WP_Query(array(
                        'posts_per_page' => 4,
                        'category_name' => 'মতামত'
                    ));
                    if ($opinion->have_posts()) :
                        while ($opinion->have_posts()) : $opinion->the_post();
                    ?>
                            <article>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                <?php endif; ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><?php the_excerpt(); ?></p>
                            </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>মতামত বিভাগে কোনো পোস্ট পাওয়া যায়নি।</p>';
                    endif;
                    ?>
                </div>
            </section>

            <!-- 🔄 Latest Posts with Load More -->
            <section class="category-block">
                <h2>সাম্প্রতিক</h2>
                <div class="post-grid" id="main-post-grid">
                    <?php
                    $main_query = new WP_Query(array(
                        'posts_per_page' => 6,
                        'paged' => 1
                    ));
                    if ($main_query->have_posts()) :
                        while ($main_query->have_posts()) : $main_query->the_post();
                            get_template_part('template-parts/post-card');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>আর কোনো সাম্প্রতিক পোস্ট নেই।</p>';
                    endif;
                    ?>
                </div>

                <!-- Load More Button -->
                <div class="load-more-container">
                    <button id="loadMoreBtn" data-page="2">আরও দেখুন</button>
                </div>
            </section>

        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

<?php if (get_theme_mod('breaking_news_toggle', true)) : ?>
    <div class="breaking-news">
        <span class="label">🔴 ব্রেকিং নিউজ:</span>
        <marquee behavior="scroll" direction="left" scrollamount="4">
            <?php
            $breaking = new WP_Query(array(
                'posts_per_page' => 5,
                'category_name'  => 'breaking-news'
            ));

            if ($breaking->have_posts()) :
                while ($breaking->have_posts()) : $breaking->the_post();
                    echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a> &nbsp; | &nbsp; ';
                endwhile;
                wp_reset_postdata();
            else :
                echo 'এই মুহূর্তে কোনো ব্রেকিং নিউজ নেই।';
            endif;
            ?>
        </marquee>
    </div>
<?php endif; ?>

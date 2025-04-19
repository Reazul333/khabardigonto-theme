<?php
// কমেন্ট সেকশন শুরু
if (have_comments()) :
?>
    <h2 class="comments-title">
        <?php
        printf(
            _n( 'একটি মন্তব্য', '%1$sটি মন্তব্য', get_comments_number(), 'textdomain' ),
            number_format_i18n( get_comments_number() )
        );
        ?>
    </h2>

    <ul class="comment-list">
        <?php
        wp_list_comments( array(
            'style'      => 'ul',
            'short_ping' => true,
        ) );
        ?>
    </ul>

<?php
else :
    if ( comments_open() ) :
        // মন্তব্যের জন্য কোন মেসেজ যদি থাকে
    else :
        echo '<p>মন্তব্য বন্ধ রয়েছে।</p>';
    endif;
endif;

// মন্তব্য ফর্ম
comment_form();
?>

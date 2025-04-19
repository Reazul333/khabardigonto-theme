<?php get_header(); ?>

<div class="layout">
    <div class="content">

        <!-- 🔖 Breadcrumbs -->
        <?php khabardigonto_breadcrumbs_display(); ?>

        <main>
            <div class="not-found">
                <h1>😕 ৪০৪ – কিছু পাওয়া যায়নি</h1>
                <p>আপনি যে পাতাটি খুঁজছেন, সেটি হয়তো মুছে ফেলা হয়েছে অথবা ঠিকানাটি ভুল।</p>
                <p><a href="<?php echo home_url(); ?>">🏠 হোমপেইজে ফিরে যান</a></p>
                <p>অথবা নিচে থেকে কিছু খুঁজে দেখুন:</p>
                <?php get_search_form(); ?>
            </div>
        </main>
    </div>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>

<!-- ✅ Newsletter Subscription Box -->
<section class="newsletter-box">
    <h2>নিউজলেটার সাবস্ক্রিপশন</h2>
    <p>সর্বশেষ খবর পেতে আপনার ইমেইল দিন:</p>
    <form action="#" method="post">
        <input type="email" name="subscriber_email" placeholder="আপনার ইমেইল" required>
        <button type="submit">সাবস্ক্রাইব করুন</button>
    </form>
</section>

<!-- 🌐 Widgetized Footer Section -->
<footer class="site-footer">
    <div class="footer-widgets">
        <div class="footer-container">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div class="footer-column"><?php dynamic_sidebar('footer-1'); ?></div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-2')) : ?>
                <div class="footer-column"><?php dynamic_sidebar('footer-2'); ?></div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-3')) : ?>
                <div class="footer-column"><?php dynamic_sidebar('footer-3'); ?></div>
            <?php endif; ?>
        </div>
    </div>

    <!-- 🔻 Footer Bottom -->
    <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> - <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>

<!-- 🔝 Scroll to Top Button -->
<button id="scrollTopBtn" title="পৃষ্ঠার ওপরে যান">⬆️</button>

</body>
</html>

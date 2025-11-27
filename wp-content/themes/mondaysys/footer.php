</main> <!-- #site-content -->

<?php if(!(is_page_template ('templates/contact-page.php') || is_singular('post'))): ?>
    <div class="border-container fw-btn-section position-relative">
        <div class="empty-column"></div>
        <div class="section-column px-1 px-lg-2 py-1">
            <div class="global-grid align-item-center" style="--grid-col: 2; --gap: 0;--mob-grid-col:2;">
                <h5>Book a Discovery Call</h5>
                <a class="view_all_casestuday btn btn-tertiary" href="#"></a>
            </div>
        </div>
    </div>
<?php endif; ?>

<footer class="site_footer grid-row" style="--desk-col:2fr 22fr; --tab-col:1fr; --mob-col:1fr">
    <div class="blank_space"></div>
    <div class="footer_widget_area">
        <div class="footer_subscribe">
            <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                <?php dynamic_sidebar( 'footer-widget-1' ); ?>
            <?php endif; ?>
        </div>
        <div class="footer_menu">
            <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                <?php dynamic_sidebar( 'footer-widget-2' ); ?>
            <?php endif; ?>
        </div>
        <div class="footer_logo">
            <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                <?php dynamic_sidebar( 'footer-widget-3' ); ?>
            <?php endif; ?>
        </div>
        <div class="footer_info">
            <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                <?php dynamic_sidebar( 'footer-widget-4' ); ?>
            <?php endif; ?>

            <div class="copayright_area">
                Copyright <?php echo date('Y'); ?>. Mondaysys all Rights Reserved &nbsp;
                <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><u>Privacy Policy</u></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

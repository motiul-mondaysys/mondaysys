<?php
/**
 * Template Name: Contact Page
 */
get_header();
global $post;
    while ( have_posts() ) : the_post();
        ?>
            <section class="contact_page_form overflow-hidden">
                <div class="contact-wrap grid-row" style="--desk-col:5fr 1fr 6fr; --mob-col:1fr">
                    <div class="form-left-area px-1 px-md-0">
                        <?php if (get_post_meta($post->ID, '_cmb2_contact_left_content', true) ) : ?>
                            <?php echo wp_kses_post( get_post_meta($post->ID, '_cmb2_contact_left_content', true)); ?>
                        <?php endif; ?>
                        <div class="support-box align-item-center p-1 p-md-2 grid-row" style="--desk-col:4fr 6fr 2fr; --mob-col:3fr 6fr 3fr; --desk-gap:20px;">
                            <div>
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/support-eng-pic.jpg" alt="">
                            </div>
                            <div>
                                <h4>Ena Watson</h4>
                                <p class="mb-md-0">Support Executive</p>
                            </div>
                            <div class="text-center">
                                <svg width="60" height="60" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="24" r="24" fill="#0171E3"/><g clip-path="url(#clip0_3265_37493)"><path d="M19.673 14C19.8587 14 20.0367 14.0737 20.168 14.205C20.2993 14.3363 20.373 14.5143 20.373 14.7V16.009H27.89V14.709C27.89 14.5233 27.9637 14.3453 28.095 14.214C28.2263 14.0827 28.4043 14.009 28.59 14.009C28.7757 14.009 28.9537 14.0827 29.085 14.214C29.2162 14.3453 29.29 14.5233 29.29 14.709V16.009H32C32.5303 16.009 33.0388 16.2196 33.4139 16.5944C33.7889 16.9693 33.9997 17.4777 34 18.008V32.001C33.9997 32.5313 33.7889 33.0397 33.4139 33.4146C33.0388 33.7894 32.5303 34 32 34H16C15.4697 34 14.9612 33.7894 14.5861 33.4146C14.2111 33.0397 14.0003 32.5313 14 32.001V18.008C14.0003 17.4777 14.2111 16.9693 14.5861 16.5944C14.9612 16.2196 15.4697 16.009 16 16.009H18.973V14.699C18.9733 14.5135 19.0471 14.3357 19.1784 14.2047C19.3096 14.0736 19.4875 14 19.673 14ZM15.4 21.742V32.001C15.4 32.0798 15.4155 32.1578 15.4457 32.2306C15.4758 32.3034 15.52 32.3695 15.5757 32.4253C15.6315 32.481 15.6976 32.5252 15.7704 32.5553C15.8432 32.5855 15.9212 32.601 16 32.601H32C32.0788 32.601 32.1568 32.5855 32.2296 32.5553C32.3024 32.5252 32.3685 32.481 32.4243 32.4253C32.48 32.3695 32.5242 32.3034 32.5543 32.2306C32.5845 32.1578 32.6 32.0798 32.6 32.001V21.756L15.4 21.742ZM20.667 28.619V30.285H19V28.619H20.667ZM24.833 28.619V30.285H23.167V28.619H24.833ZM29 28.619V30.285H27.333V28.619H29ZM20.667 24.642V26.308H19V24.642H20.667ZM24.833 24.642V26.308H23.167V24.642H24.833ZM29 24.642V26.308H27.333V24.642H29ZM18.973 17.408H16C15.9212 17.408 15.8432 17.4235 15.7704 17.4537C15.6976 17.4838 15.6315 17.528 15.5757 17.5837C15.52 17.6395 15.4758 17.7056 15.4457 17.7784C15.4155 17.8512 15.4 17.9292 15.4 18.008V20.343L32.6 20.357V18.008C32.6 17.9292 32.5845 17.8512 32.5543 17.7784C32.5242 17.7056 32.48 17.6395 32.4243 17.5837C32.3685 17.528 32.3024 17.4838 32.2296 17.4537C32.1568 17.4235 32.0788 17.408 32 17.408H29.29V18.337C29.29 18.5227 29.2162 18.7007 29.085 18.832C28.9537 18.9633 28.7757 19.037 28.59 19.037C28.4043 19.037 28.2263 18.9633 28.095 18.832C27.9637 18.7007 27.89 18.5227 27.89 18.337V17.408H20.373V18.328C20.373 18.5137 20.2993 18.6917 20.168 18.823C20.0367 18.9543 19.8587 19.028 19.673 19.028C19.4873 19.028 19.3093 18.9543 19.178 18.823C19.0467 18.6917 18.973 18.5137 18.973 18.328V17.408Z" fill="white"/></g><defs><clipPath id="clip0_3265_37493"><rect width="20" height="20" fill="white" transform="translate(14 14)"/></clipPath></defs></svg>
                            </div>
                        </div>
                    </div>
                    <div class="contact-middle-area"></div>
                    <div class="form-right-area">
                        <h1 class="h3 px-1 px-lg-2 py-2 pt-lg-4 pb-lg-3">Get in Touch</h1>
                        <hr class="m-0">
                        <?php echo do_shortcode('[contact-form-7 id="a723db3" title="Contact page form"]'); ?>
                    </div>
                </div>
            </section>
            <?php if(get_post_meta($post->ID, '_cmb2_map_title', true)): ?>
                <section class="contact-map border-top pt-4 pt-lg-6">
                    <div class="container">
                        <div class="grid-row" style="--desk-col: 8fr 4fr">
                            <h2>
                                <?php echo get_post_meta($post->ID, '_cmb2_map_title', true); ?>
                            </h2>
                        </div>
                        <iframe src="https://lottie.host/embed/0e7b64a4-fb10-4b7f-b2e6-20cf4e1f942d/xwdh4e38VI.lottie"></iframe>
                    </div>
                </section>
            <?php endif; ?>
            <section class="border-top mt-2">
                <div class="container">
                    <?php
                    $addresses = get_post_meta( get_the_ID(), '_cmb2_address', true );
                    if ( ! empty( $addresses ) ) : ?>
                        <div class="address_box_wrap grid-row" style="--desk-col:repeat(3, 1fr); --mob-col:repeat(1, 1fr)">
                            <?php foreach ( $addresses as $item ) : 
                                $title   = isset( $item['title'] ) ? esc_html( $item['title'] ) : '';
                                $email   = isset( $item['email'] ) ? esc_html( $item['email'] ) : '';
                                $phone   = isset( $item['phone'] ) ? esc_html( $item['phone'] ) : '';
                                $address = isset( $item['address'] ) ? $item['address'] : '';
                            ?>
                                <div class="address_box">
                                    <?php if ( $title ) : ?>
                                        <h4 class="mb-1 mb-lg-3"><?php echo $title; ?></h4>
                                    <?php endif; ?>

                                    <?php if ( $email ) : ?>
                                        <a class="left-icon-box icon-email" href="mailto:<?php echo $email; ?>">
                                            <span><?php echo $email; ?></span>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ( $phone ) : ?>
                                        <a class="left-icon-box icon_phone" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/\D+/', '', $phone); ?>">
                                            <span><?php echo $phone; ?></span>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ( $address ) : ?>
                                        <p class="mb-0 pt-1 pt-lg-2"><?php echo $address; ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            <section class="border-top py-4 py-lg-6">
                <div class="container">
                    <div class="grid-row" style="--desk-col:2fr 8fr 2fr; --tab-col:1fr; --mob-col: 1fr;">
                        <div></div>
                        <h2 class="text-center mb-2 mb-lg-3">If You’ve Got a Project in Mind, Get In Touch and Let’s Get Started!</h2>
                    </div>
                    <div class="contact-button-wrap justify-content-center d-flex flex-row flex-wrap">
                        <a href="tel:+880248957899" class="btn btn-tertiary">Whatsapp</a>
                        <a href="mailto:hello@mondaysys.com" class="btn btn-tertiary">Mail</a>
                        <a href="#" class="btn btn-tertiary">Book a call with calendly</a>
                    </div>
                </div>
            </section>
        <?php 
    endwhile;
get_footer(); 
 
 ?>
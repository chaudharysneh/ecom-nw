<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $directoryURI);
$first_part = $components[1] ?? '';
$cmsdata = new App\Models\CmsModel();
$resdt = $cmsdata->get()->getResult('array');

$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();

$settings = new App\Models\Settings();
$sett_data = $settings->get()->getRow();

$links = json_decode($all_setting_data['Links'] ?? '{}', true);
$facebook = json_decode($links['facebook'] ?? '{}', true);
$twitter = json_decode($links['twitter'] ?? '{}', true);
$insta = json_decode($links['insta'] ?? '{}', true);
?>

<footer class="footer modern-footer">
    <section class="shop-services pt-5 pb-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-truck-fast"></i></div>
                        <div class="service-text">
                            <h4>Free Shipping</h4>
                            <p>Orders over <?php echo $all_setting_data['currency']; ?>100</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-arrow-rotate-left"></i></div>
                        <div class="service-text">
                            <h4>Free Return</h4>
                            <p>Within 30 days returns</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="service-text">
                            <h4>Secure Payment</h4>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="modern-service-item">
                        <div class="service-icon"><i class="fa-solid fa-gem"></i></div>
                        <div class="service-text">
                            <h4>Best Piece</h4>
                            <p>Guaranteed price</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-newsletter">
        <div class="footer-ambient footer-ambient-one"></div>
        <div class="footer-ambient footer-ambient-two"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <div class="newsletter-content footer-reveal">
                        <span class="newsletter-kicker">Fresh drops, early access, better deals</span>
                        <h2 class="text-white mb-3">Join Our Newsletter</h2>
                        <p class="text-white-50 mb-4">Get curated offers, new arrivals, and limited-time furniture deals before everyone else.</p>
                        <form id="add_subscribe" method="post" class="modern-newsletter-form">
                            <input type="hidden" name="baseurl" value="<?php echo base_url(); ?>">
                            <div class="newsletter-input-wrap mb-2">
                                <i class="fa-regular fa-envelope"></i>
                                <input name="email" class="form-control" placeholder="Your email address" required type="email">
                                <button type="submit" class="btn btn-primary send_email_data">
                                    Subscribe Now
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                            <p id="msg" class="text-left mt-2"></p>
                        </form>
                        <div class="newsletter-trust">
                            <span><i class="fa-solid fa-lock"></i> No spam</span>
                            <span><i class="fa-solid fa-tag"></i> Exclusive offers</span>
                            <span><i class="fa-solid fa-box-open"></i> New arrival alerts</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="footer-top">
        <div class="container">
            <div class="row g-4 gx-lg-5 align-items-stretch">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget about-widget footer-reveal footer-reveal-delay-1">
                        <div class="footer-logo mb-4">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url('admin/public/upload_images/' . $sett_data->Logo); ?>" alt="logo" style="max-height: 58px;">
                            </a>
                        </div>
                        <p class="mb-4"><?= $all_setting_data['Description'] ?? 'Providing high-quality furniture and home decor solutions for a modern lifestyle.'; ?></p>
                        <div class="footer-mini-stats">
                            <span><strong>24/7</strong> Support</span>
                            <span><strong>30D</strong> Returns</span>
                        </div>
                        <div class="app-buttons d-flex gap-2">
                            <a href="#"><img src="https://assets.pharmeasy.in/apothecary/images/googlePlay.svg?dim=360x0" alt="Google Play"></a>
                            <a href="#"><img src="https://assets.pharmeasy.in/apothecary/images/appStore.svg?dim=256x0" alt="App Store"></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget footer-reveal footer-reveal-delay-2">
                        <h4 class="widget-title">Information</h4>
                        <ul class="footer-links">
                            <li><a href="<?php echo base_url('about_us'); ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                            <li><a href="<?php echo base_url('blog'); ?>">Our Blog</a></li>
                            <li><a href="<?php echo base_url('track-order'); ?>">Track Order</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget footer-reveal footer-reveal-delay-3">
                        <h4 class="widget-title">Our Policies</h4>
                        <ul class="footer-links">
                            <?php foreach ($resdt as $rsdata) {
                                if ($rsdata['status'] == 1) { ?>
                                    <li><a href="<?php echo base_url() . $rsdata['CmsUrl']; ?>"><?php echo $rsdata['CmsTitle']; ?></a></li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget contact-widget footer-reveal footer-reveal-delay-4">
                        <h4 class="widget-title">Get In Touch</h4>
                        <ul class="contact-info">
                            <li>
                                <span class="contact-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <span><?= $all_setting_data['Address'] ?? ''; ?></span>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fa-solid fa-envelope"></i></span>
                                <a href="mailto:<?= $all_setting_data['Email'] ?? ''; ?>"><?= $all_setting_data['Email'] ?? ''; ?></a>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fa-solid fa-phone"></i></span>
                                <a href="tel:<?= $all_setting_data['Phone'] ?? ''; ?>">+<?= $all_setting_data['Phone'] ?? ''; ?></a>
                            </li>
                        </ul>
                        <div class="footer-social mt-4">
                            <?php if (!empty($facebook['link']) && ($facebook['status'] ?? 0) == 1) { ?>
                                <a href="<?= $facebook['link'] ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a>
                            <?php } ?>
                            <?php if (!empty($twitter['link']) && ($twitter['status'] ?? 0) == 1) { ?>
                                <a href="<?= $twitter['link'] ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-twitter"></i></a>
                            <?php } ?>
                            <?php if (!empty($insta['link']) && ($insta['status'] ?? 0) == 1) { ?>
                                <a href="<?= $insta['link'] ?>" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> <strong><?= $all_setting_data['Title'] ?? 'FurniLife'; ?></strong>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <div class="footer-payment-methods" aria-label="Payment Methods">
                        <span class="payment-method-badge payment-visa" title="Visa"><i class="fa-brands fa-cc-visa"></i></span>
                        <span class="payment-method-badge payment-mastercard" title="Mastercard"><i class="fa-brands fa-cc-mastercard"></i></span>
                        <span class="payment-method-badge payment-paypal" title="PayPal"><i class="fa-brands fa-cc-paypal"></i></span>
                        <span class="payment-method-badge payment-amex" title="American Express"><i class="fa-brands fa-cc-amex"></i></span>
                        <span class="payment-method-badge payment-applepay" title="Apple Pay"><i class="fa-brands fa-cc-apple-pay"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

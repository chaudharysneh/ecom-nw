<?php include('header.php'); ?>
<style>
    :root {
        --contact-accent: #4a3427;
        --contact-highlight: #f7941d;
        --contact-soft: #f8f2eb;
        --contact-border: rgba(74, 52, 39, 0.1);
        --contact-text: #2d2824;
        --contact-muted: #7c746d;
    }

    .main-category {
        display: none;
    }

    .contact-modern-page {
        padding: 28px 0 52px;
        background:
            radial-gradient(circle at top left, rgba(247, 148, 29, 0.08), transparent 26%),
            linear-gradient(180deg, #fffdfb 0%, #ffffff 42%, #fff8f2 100%);
    }

    .contact-modern-page .container {
        max-width: min(1380px, calc(100vw - 76px));
    }

    .contact-breadcrumb {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 22px;
        color: var(--contact-muted);
        font-size: 14px;
        font-weight: 600;
    }

    .contact-breadcrumb a {
        color: var(--contact-text);
        text-decoration: none;
    }

    .contact-breadcrumb i {
        font-size: 11px;
        color: #b8aca3;
    }

    .contact-hero {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(320px, 0.85fr);
        gap: 28px;
        align-items: stretch;
        margin-bottom: 28px;
    }

    .contact-hero-copy {
        position: relative;
        overflow: hidden;
        padding: 38px 40px 34px;
        border-radius: 32px;
        background:
            radial-gradient(circle at top right, rgba(247, 148, 29, 0.18), transparent 34%),
            linear-gradient(135deg, #fff8f2 0%, #ffffff 56%, #fff4e9 100%);
        border: 1px solid var(--contact-border);
        box-shadow: 0 22px 54px rgba(74, 52, 39, 0.08);
    }

    .contact-hero-copy::after {
        content: '';
        position: absolute;
        inset: 18px;
        border-radius: 24px;
        border: 1px solid rgba(74, 52, 39, 0.06);
        pointer-events: none;
    }

    .contact-hero-inner {
        position: relative;
        z-index: 1;
        max-width: 700px;
    }

    .contact-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
        padding: 9px 14px;
        border-radius: 999px;
        background: rgba(74, 52, 39, 0.06);
        color: var(--contact-accent);
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.15em;
    }

    .contact-hero-title {
        margin: 0 0 14px;
        color: var(--contact-text);
        font-size: clamp(22px, 2.9vw, 32px);
        line-height: 1.16;
        font-weight: 800;
        letter-spacing: -0.03em;
    }

    .contact-hero-text {
        margin: 0;
        max-width: 620px;
        color: var(--contact-muted);
        font-size: 13px;
        line-height: 1.62;
    }

    .contact-hero-points {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 22px;
    }

    .contact-hero-points span {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 15px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.78);
        border: 1px solid rgba(74, 52, 39, 0.08);
        color: var(--contact-text);
        font-size: 13px;
        font-weight: 700;
        box-shadow: 0 10px 22px rgba(74, 52, 39, 0.05);
    }

    .contact-hero-points i {
        color: var(--contact-highlight);
    }

    .contact-quick-panel {
        display: grid;
        gap: 18px;
        align-content: start;
    }

    .contact-quick-card {
        background: #fff;
        border: 1px solid var(--contact-border);
        border-radius: 28px;
        box-shadow: 0 20px 46px rgba(74, 52, 39, 0.08);
        overflow: hidden;
    }

    .contact-quick-body {
        padding: 28px 26px;
    }

    .contact-quick-top {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 12px;
    }

    .contact-quick-icon {
        width: 56px;
        height: 56px;
        border-radius: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(145deg, rgba(247, 148, 29, 0.18), rgba(74, 52, 39, 0.08));
        color: var(--contact-accent);
        font-size: 22px;
        box-shadow: inset 0 0 0 1px rgba(74, 52, 39, 0.08);
    }

    .contact-quick-label {
        color: var(--contact-accent);
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.14em;
    }

    .contact-quick-card h3 {
        margin: 0 0 10px;
        color: var(--contact-text);
        font-size: 22px;
        line-height: 1.12;
        font-weight: 800;
    }

    .contact-quick-card p {
        margin: 0;
        color: var(--contact-muted);
        font-size: 14px;
        line-height: 1.7;
    }

    .contact-quick-grid {
        display: grid;
        gap: 14px;
    }

    .contact-quick-item {
        display: grid;
        grid-template-columns: 52px minmax(0, 1fr);
        gap: 14px;
        align-items: start;
        padding: 16px 0;
        border-top: 1px solid rgba(74, 52, 39, 0.08);
    }

    .contact-quick-item:first-child {
        border-top: none;
        padding-top: 0;
    }

    .contact-quick-item:last-child {
        padding-bottom: 0;
    }

    .contact-quick-item .contact-quick-icon {
        width: 52px;
        height: 52px;
        font-size: 20px;
    }

    .contact-quick-item h4 {
        margin: 0 0 6px;
        color: var(--contact-text);
        font-size: 18px;
        line-height: 1.2;
        font-weight: 800;
    }

    .contact-quick-item a,
    .contact-quick-item span {
        color: var(--contact-muted);
        font-size: 15px;
        line-height: 1.7;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .contact-quick-item a:hover {
        color: var(--contact-accent);
    }

    .contact-content-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 24px;
        align-items: start;
    }

    .contact-form-card {
        background: #fff;
        border: 1px solid var(--contact-border);
        border-radius: 32px;
        box-shadow: 0 20px 48px rgba(74, 52, 39, 0.08);
        overflow: hidden;
    }

    .contact-form-card-body {
        padding: 32px;
    }

    .contact-section-label {
        display: inline-block;
        margin-bottom: 10px;
        color: var(--contact-highlight);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .contact-form-card h2 {
        margin: 0 0 8px;
        color: var(--contact-text);
        font-size: clamp(26px, 3.2vw, 34px);
        line-height: 1.12;
        font-weight: 800;
    }

    .contact-form-card p {
        margin: 0 0 26px;
        color: var(--contact-muted);
        font-size: 15px;
        line-height: 1.75;
        max-width: 640px;
    }

    .contact-modern-form .row {
        margin-left: -10px;
        margin-right: -10px;
    }

    .contact-modern-form .row > [class*="col-"] {
        padding-left: 10px;
        padding-right: 10px;
    }

    .contact-modern-form .form-group {
        margin-bottom: 18px;
    }

    .contact-modern-form label {
        display: block;
        margin-bottom: 9px;
        color: var(--contact-text);
        font-size: 14px;
        font-weight: 700;
    }

    .contact-modern-form label span {
        color: #e05a47;
        margin-left: 4px;
    }

    .contact-modern-form input,
    .contact-modern-form textarea {
        width: 100%;
        border: 1px solid rgba(74, 52, 39, 0.14);
        border-radius: 18px;
        background: #fffdfb;
        color: var(--contact-text);
        font-size: 14px;
        line-height: 1.4;
        box-shadow: none;
        transition: border-color 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
    }

    .contact-modern-form input {
        height: 56px;
        padding: 0 18px;
    }

    .contact-modern-form textarea {
        min-height: 220px;
        padding: 18px;
        resize: vertical;
    }

    .contact-modern-form input:focus,
    .contact-modern-form textarea:focus {
        outline: none;
        border-color: rgba(74, 52, 39, 0.32);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(74, 52, 39, 0.08);
    }

    .contact-modern-form .button {
        display: flex;
        align-items: center;
        gap: 14px;
        flex-wrap: wrap;
    }

    .contact-modern-form .btn {
        min-width: 190px;
        height: 54px;
        padding: 0 26px;
        border-radius: 999px;
        border: none;
        background: var(--contact-accent);
        color: #fff !important;
        font-size: 14px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 18px 32px rgba(74, 52, 39, 0.18);
        transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
    }

    .contact-modern-form .btn:hover {
        background: #36261c;
        transform: translateY(-2px);
        box-shadow: 0 24px 40px rgba(74, 52, 39, 0.26);
    }

    .contact-form-note {
        color: var(--contact-muted);
        font-size: 13px;
        line-height: 1.6;
    }

    .contact-side-stack {
        display: grid;
        gap: 20px;
    }

    .contact-side-card {
        background: #fff;
        border: 1px solid var(--contact-border);
        border-radius: 28px;
        box-shadow: 0 18px 42px rgba(74, 52, 39, 0.07);
        overflow: hidden;
    }

    .contact-side-card-body {
        padding: 24px;
    }

    .contact-side-card h3 {
        margin: 0 0 8px;
        color: var(--contact-text);
        font-size: 20px;
        line-height: 1.15;
        font-weight: 800;
    }

    .contact-side-card p {
        margin: 0;
        color: var(--contact-muted);
        font-size: 14px;
        line-height: 1.7;
    }

    .contact-side-list {
        display: grid;
        gap: 14px;
        margin-top: 18px;
    }

    .contact-side-list-item {
        display: grid;
        grid-template-columns: 48px minmax(0, 1fr);
        gap: 12px;
        align-items: start;
    }

    .contact-side-list-item .contact-quick-icon {
        width: 48px;
        height: 48px;
        border-radius: 16px;
        font-size: 18px;
    }

    .contact-side-list-item strong {
        display: block;
        margin-bottom: 5px;
        color: var(--contact-text);
        font-size: 16px;
        line-height: 1.3;
        font-weight: 800;
    }

    .contact-side-list-item a,
    .contact-side-list-item span {
        color: var(--contact-muted);
        font-size: 14px;
        line-height: 1.7;
        text-decoration: none;
    }

    .contact-side-list-item a:hover {
        color: var(--contact-accent);
    }

    .contact-map-section {
        margin-top: 28px;
        border-radius: 34px;
        overflow: hidden;
        border: 1px solid var(--contact-border);
        box-shadow: 0 20px 44px rgba(74, 52, 39, 0.08);
    }

    .contact-map-frame {
        width: 100%;
        height: 420px;
        border: 0;
        display: block;
    }

    @media (max-width: 1199.98px) {
        .contact-hero {
            grid-template-columns: 1fr;
        }

        .contact-content-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .contact-modern-page {
            padding: 18px 0 40px;
        }

        .contact-modern-page .container {
            max-width: calc(100vw - 24px);
        }

        .contact-hero-copy,
        .contact-form-card-body,
        .contact-quick-body,
        .contact-side-card-body {
            padding: 22px 18px;
        }

        .contact-hero-copy {
            border-radius: 24px;
        }

        .contact-form-card,
        .contact-quick-card,
        .contact-side-card {
            border-radius: 24px;
        }

        .contact-map-section {
            border-radius: 26px;
        }

        .contact-map-frame {
            height: 320px;
        }
    }
</style>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<section class="contact-modern-page">
    <div class="container">
        <div class="contact-breadcrumb">
            <a href="<?= base_url('/'); ?>">Home</a>
            <i class="ti-angle-right"></i>
            <span>Contact Us</span>
        </div>

        <div class="contact-hero">
            <div class="contact-hero-copy">
                <div class="contact-hero-inner">
                    <span class="contact-kicker">Get In Touch</span>
                    <h1 class="contact-hero-title">Let’s talk about your order, support request, or next purchase.</h1>
                    <p class="contact-hero-text">This page now follows the same design language as the rest of the project: softer surfaces, cleaner hierarchy, better spacing, and stronger contact entry points without the old generic form layout.</p>
                    <div class="contact-hero-points">
                        <span><i class="fa-solid fa-bolt"></i> Fast response flow</span>
                        <span><i class="fa-solid fa-headset"></i> Store support ready</span>
                        <span><i class="fa-solid fa-shield-heart"></i> Clear after-sales help</span>
                    </div>
                </div>
            </div>

            <div class="contact-quick-panel">
                <div class="contact-quick-card">
                    <div class="contact-quick-body">
                        <div class="contact-quick-top">
                            <span class="contact-quick-icon"><i class="fa-solid fa-comments"></i></span>
                            <div>
                                <span class="contact-quick-label">Support Desk</span>
                            </div>
                        </div>
                        <h3>We’re ready to help you quickly and properly.</h3>
                        <p>Use the form for detailed questions, or reach us directly through phone, email, and address details listed below.</p>
                    </div>
                </div>

                <div class="contact-quick-card">
                    <div class="contact-quick-body">
                        <div class="contact-quick-grid">
                            <div class="contact-quick-item">
                                <span class="contact-quick-icon"><i class="fa-solid fa-phone"></i></span>
                                <div>
                                    <h4>Call us now</h4>
                                    <a href="tel:<?= $all_setting_data['Phone'] ?? ''; ?>">+<?= $all_setting_data['Phone'] ?? ''; ?></a>
                                </div>
                            </div>
                            <div class="contact-quick-item">
                                <span class="contact-quick-icon"><i class="fa-solid fa-envelope-open-text"></i></span>
                                <div>
                                    <h4>Email support</h4>
                                    <a href="mailto:<?= $all_setting_data['Email'] ?? ''; ?>"><?= $all_setting_data['Email'] ?? ''; ?></a>
                                </div>
                            </div>
                            <div class="contact-quick-item">
                                <span class="contact-quick-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <div>
                                    <h4>Visit our address</h4>
                                    <span><?= $all_setting_data['Address'] ?? ''; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-content-grid">
            <div class="contact-form-card">
                <div class="contact-form-card-body">
                    <span class="contact-section-label">Write To Us</span>
                    <h2>Send a message that actually gets noticed.</h2>
                    <p>Share your enquiry with the details our team needs. The structure stays compatible with the existing submit logic, but the visual layer is now aligned with the rest of the storefront.</p>

                    <form class="form contact-modern-form" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group fullname">
                                    <label>Your Name<span>*</span></label>
                                    <input name="fullname" id="fullname" type="text" maxlength="30" placeholder="Enter your full name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group subject">
                                    <label>Your Subject<span>*</span></label>
                                    <input name="subject" id="subject" type="text" maxlength="30" placeholder="What do you need help with?">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group emailid">
                                    <label>Your Email<span>*</span></label>
                                    <input name="email" id="emailid" type="email" placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group phoneno">
                                    <label>Your Phone<span>*</span></label>
                                    <input type="number" name="phoneno" id="phoneno" maxlength="12" placeholder="Phone number">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group message">
                                    <label>Your Message<span>*</span></label>
                                    <textarea id="message" name="message" maxlength="300" placeholder="Tell us a bit more so we can respond properly."></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="dis_msg"></div>
                            </div>
                            <div class="col-12">
                                <div class="form-group button">
                                    <button type="button" name="submit" id="contactbtn" class="btn rounded">
                                        Send Message
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                    <span class="contact-form-note">We usually respond through the shared support channels configured for the store.</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="contact-side-stack">
                <div class="contact-side-card">
                    <div class="contact-side-card-body">
                        <span class="contact-section-label">Contact Details</span>
                        <h3>Reach us directly</h3>
                        <p>Prefer direct contact instead of the form? Use the quick details below.</p>

                        <div class="contact-side-list">
                            <div class="contact-side-list-item">
                                <span class="contact-quick-icon"><i class="fa-solid fa-phone"></i></span>
                                <div>
                                    <strong>Phone</strong>
                                    <a href="tel:<?= $all_setting_data['Phone'] ?? ''; ?>">+<?= $all_setting_data['Phone'] ?? ''; ?></a>
                                </div>
                            </div>
                            <div class="contact-side-list-item">
                                <span class="contact-quick-icon"><i class="fa-solid fa-envelope"></i></span>
                                <div>
                                    <strong>Email</strong>
                                    <a href="mailto:<?= $all_setting_data['Email'] ?? ''; ?>"><?= $all_setting_data['Email'] ?? ''; ?></a>
                                </div>
                            </div>
                            <div class="contact-side-list-item">
                                <span class="contact-quick-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <div>
                                    <strong>Address</strong>
                                    <span><?= $all_setting_data['Address'] ?? ''; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-side-card">
                    <div class="contact-side-card-body">
                        <span class="contact-section-label">Need Help?</span>
                        <h3>Good for orders, support, returns, and pre-sale questions.</h3>
                        <p>Use this page exactly like before, but with a cleaner interface that matches the upgraded project styling from the homepage, blog, and product areas.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-map-section">
            <iframe class="contact-map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193677.81034525938!2d-74.13851071310677!3d40.669214162796116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25f18a9544a0b%3A0x8ef353a024aeb84e!2sGlobal%20Tours%20And%20Travel%20Inc!5e0!3m2!1sen!2sin!4v1685427944046!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

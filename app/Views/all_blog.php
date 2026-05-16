<?php include('header.php'); ?>
<style>
    :root {
        --blog-accent: #4a3427;
        --blog-accent-soft: #f6eee7;
        --blog-border: #efe7de;
        --blog-text: #2a2521;
        --blog-muted: #7c746d;
        --blog-card-shadow: 0 18px 45px rgba(74, 52, 39, 0.08);
    }

    .main-category {
        display: none;
    }

    .blog-listing-page {
        padding: 28px 0 56px;
        background:
            radial-gradient(circle at top left, rgba(247, 148, 29, 0.07), transparent 25%),
            linear-gradient(180deg, #fffdfb 0%, #ffffff 42%, #fffaf6 100%);
    }

    .blog-listing-page .container {
        max-width: min(1380px, calc(100vw - 76px));
    }

    .blog-listing-shell {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 22px;
        align-items: start;
    }

    .blog-hero {
        position: relative;
        overflow: visible;
        padding: 6px 0 14px;
        border-radius: 0;
        border: none;
        background: transparent;
        box-shadow: none;
        margin-bottom: 26px;
    }

    .blog-hero::after {
        display: none;
    }

    .blog-hero-content {
        position: relative;
        z-index: 1;
        max-width: 640px;
    }

    .blog-hero-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 14px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(74, 52, 39, 0.06);
        color: var(--blog-accent);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .blog-hero h1 {
        margin: 0 0 12px;
        color: var(--blog-text);
        font-size: clamp(22px, 2.9vw, 32px);
        line-height: 1.16;
        font-weight: 800;
    }

    .blog-hero p {
        margin: 0;
        color: var(--blog-muted);
        font-size: 13px;
        line-height: 1.62;
        max-width: 560px;
    }

    .blog-hero-stats {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-top: 22px;
    }

    .blog-hero-stat {
        min-width: 140px;
        padding: 14px 16px;
        border-radius: 18px;
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(74, 52, 39, 0.08);
        box-shadow: 0 10px 24px rgba(74, 52, 39, 0.05);
    }

    .blog-hero-stat strong {
        display: block;
        margin-bottom: 4px;
        color: var(--blog-text);
        font-size: 20px;
        line-height: 1;
        font-weight: 800;
    }

    .blog-hero-stat span {
        color: var(--blog-muted);
        font-size: 13px;
        font-weight: 600;
    }

    .blog-results-bar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 22px;
        padding: 18px 22px;
        border-radius: 24px;
        background: #fff;
        border: 1px solid rgba(74, 52, 39, 0.08);
        box-shadow: 0 12px 34px rgba(74, 52, 39, 0.06);
    }

    .blog-results-copy {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    .blog-results-copy span {
        color: var(--blog-accent);
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.14em;
    }

    .blog-results-copy strong {
        color: var(--blog-text);
        font-size: 15px;
        line-height: 1.2;
        font-weight: 700;
    }

    .blog-results-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border-radius: 999px;
        background: var(--blog-accent-soft);
        color: var(--blog-accent);
        font-size: 13px;
        font-weight: 700;
    }

    .blog-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 20px;
    }

    .blog-feed-card {
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid rgba(74, 52, 39, 0.08);
        box-shadow: 0 16px 34px rgba(74, 52, 39, 0.06);
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-feed-card:hover {
        transform: translateY(-10px);
        border-color: rgba(74, 52, 39, 0.16);
        box-shadow: 0 24px 46px rgba(74, 52, 39, 0.12);
    }

    .blog-feed-media {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .blog-feed-media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.55s ease;
    }

    .blog-feed-card:hover .blog-feed-media img {
        transform: scale(1.08);
    }

    .blog-feed-date {
        position: absolute;
        top: 18px;
        left: 18px;
        display: inline-flex;
        flex-direction: column;
        gap: 2px;
        padding: 10px 12px;
        border-radius: 16px;
        background: rgba(74, 52, 39, 0.92);
        color: #fff;
        box-shadow: 0 16px 28px rgba(74, 52, 39, 0.22);
    }

    .blog-feed-date strong {
        font-size: 20px;
        line-height: 1;
        font-weight: 800;
    }

    .blog-feed-date span {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        font-weight: 700;
    }

    .blog-feed-content {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 22px 22px 20px;
    }

    .blog-feed-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        margin-bottom: 14px;
        color: var(--blog-muted);
        font-size: 13px;
        font-weight: 600;
    }

    .blog-feed-meta span,
    .blog-feed-meta a {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: inherit;
        text-decoration: none;
    }

    .blog-feed-meta i {
        color: #f7941d;
    }

    .blog-feed-title {
        margin: 0 0 12px;
        color: var(--blog-text);
        font-size: 18px;
        line-height: 1.28;
        font-weight: 800;
    }

    .blog-feed-title a {
        color: inherit;
        text-decoration: none;
        transition: color 0.25s ease;
    }

    .blog-feed-title a:hover {
        color: var(--blog-accent);
    }

    .blog-feed-excerpt {
        margin: 0 0 20px;
        color: var(--blog-muted);
        font-size: 14px;
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .blog-feed-footer {
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding-top: 16px;
        border-top: 1px solid rgba(74, 52, 39, 0.08);
    }

    .blog-feed-category {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        border-radius: 999px;
        background: #f8f3ed;
        color: var(--blog-accent);
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .blog-feed-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--blog-accent);
        font-size: 13px;
        font-weight: 800;
        text-decoration: none !important;
        transition: gap 0.2s ease, color 0.2s ease;
    }

    .blog-feed-link:hover {
        color: #f7941d;
        gap: 12px;
    }

    .blog-sidebar {
        position: sticky;
        top: 112px;
        display: grid;
        gap: 22px;
    }

    .blog-side-card {
        background: transparent;
        border-radius: 0;
        border: none;
        box-shadow: none;
        overflow: hidden;
    }

    .blog-side-card-body {
        padding: 4px 0 0;
    }

    .blog-side-title {
        margin: 0 0 18px;
        color: var(--blog-text);
        font-size: 19px;
        line-height: 1.2;
        font-weight: 800;
    }

    .blog-side-kicker {
        display: inline-block;
        margin-bottom: 8px;
        color: var(--blog-accent);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
    }

    .blog-category-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: grid;
        gap: 10px;
    }

    .blog-category-list a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 14px 16px;
        border-radius: 16px;
        color: var(--blog-text);
        text-decoration: none;
        background: #fffaf6;
        border: 1px solid transparent;
        font-size: 14px;
        font-weight: 600;
        transition: transform 0.2s ease, border-color 0.2s ease, color 0.2s ease;
    }

    .blog-category-list a::after {
        content: '\f105';
        font-family: 'FontAwesome';
        color: #b8aaa0;
        font-size: 14px;
    }

    .blog-category-list a:hover {
        transform: translateX(4px);
        border-color: rgba(74, 52, 39, 0.12);
        color: var(--blog-accent);
    }

    .blog-side-copy {
        margin: -6px 0 0;
        color: var(--blog-muted);
        font-size: 14px;
        line-height: 1.7;
    }

    .blog-mini-list {
        display: grid;
        gap: 14px;
    }

    .blog-mini-post {
        display: grid;
        grid-template-columns: 84px minmax(0, 1fr);
        gap: 14px;
        align-items: center;
        text-decoration: none !important;
    }

    .blog-mini-post img {
        width: 84px;
        height: 84px;
        border-radius: 18px;
        object-fit: cover;
        box-shadow: 0 10px 22px rgba(74, 52, 39, 0.12);
    }

    .blog-mini-post-title {
        margin: 0 0 6px;
        color: var(--blog-text);
        font-size: 15px;
        line-height: 1.4;
        font-weight: 700;
        transition: color 0.2s ease;
    }

    .blog-mini-post:hover .blog-mini-post-title {
        color: var(--blog-accent);
    }

    .blog-mini-post-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        color: var(--blog-muted);
        font-size: 12px;
        font-weight: 600;
    }

    .blog-mini-post-meta span {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .blog-mini-post-meta i {
        color: #f7941d;
    }

    .blog-listing-page .pagination-shell {
        margin-top: 28px;
        padding: 20px 22px;
        border-radius: 24px;
        background: #fff;
        border: 1px solid rgba(74, 52, 39, 0.08);
        box-shadow: 0 16px 34px rgba(74, 52, 39, 0.06);
    }

    .blog-listing-page .pagination {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin: 0;
    }

    .blog-listing-page .page-item {
        margin: 0;
    }

    .blog-listing-page .page-link {
        min-width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 14px;
        border: 1px solid rgba(74, 52, 39, 0.14);
        border-radius: 12px;
        background: #fff;
        color: var(--blog-text);
        font-size: 13px;
        font-weight: 700;
        text-decoration: none !important;
        box-shadow: none !important;
        transition: all 0.25s ease;
    }

    .blog-listing-page .page-link:hover {
        color: var(--blog-accent);
        border-color: rgba(74, 52, 39, 0.26);
        background: #f9f4ef;
    }

    .blog-listing-page .page-item.active .page-link {
        background: var(--blog-accent);
        border-color: var(--blog-accent);
        color: #fff;
        box-shadow: 0 14px 26px rgba(74, 52, 39, 0.18) !important;
    }

    .blog-listing-page .page-item.disabled .page-link {
        opacity: 0.5;
        pointer-events: none;
    }

    @media (max-width: 1199.98px) {
        .blog-listing-shell {
            grid-template-columns: minmax(0, 1fr) 280px;
        }

        .blog-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 991.98px) {
        .blog-listing-shell {
            grid-template-columns: 1fr;
        }

        .blog-sidebar {
            position: static;
        }
    }

    @media (max-width: 767.98px) {
        .blog-listing-page {
            padding: 18px 0 42px;
        }

        .blog-hero {
            padding: 0 0 12px;
        }

        .blog-results-bar {
            align-items: flex-start;
            flex-direction: column;
            padding: 16px 18px;
            border-radius: 20px;
        }

        .blog-grid {
            grid-template-columns: 1fr;
        }

        .blog-feed-media {
            height: 210px;
        }

        .blog-feed-content,
        .blog-side-card-body {
            padding: 20px 18px;
        }

        .blog-listing-page .pagination-shell {
            padding: 16px 14px;
            border-radius: 20px;
        }
    }
</style>

<?php
$category_model = new App\Models\Categorymodel();
$comment_model = new App\Models\BlogcommentModel();
$activeCategoryName = isset($catdata[0]['CategoryName']) ? 'Latest Articles' : 'Latest Articles';
$requestUrl = current_url();
?>

<section class="blog-listing-page">
    <div class="container">
        <div class="blog-listing-shell">
            <div class="blog-main-column">
                <div class="blog-hero">
                    <div class="blog-hero-content">
                        <span class="blog-hero-kicker">Editorial Journal</span>
                        <h1>Stories, style edits, and shopping inspiration for the modern catalog.</h1>
                        <p>Explore curated reads from the same visual language as the store: cleaner layouts, richer imagery, and product-adjacent content that feels premium instead of generic.</p>
                        <div class="blog-hero-stats">
                            <div class="blog-hero-stat">
                                <strong><?= (int) $totalPages; ?></strong>
                                <span>Pages of articles</span>
                            </div>
                            <div class="blog-hero-stat">
                                <strong><?= !empty($all_blog_data) ? count($all_blog_data) : 0; ?></strong>
                                <span>Posts on this page</span>
                            </div>
                            <div class="blog-hero-stat">
                                <strong><?= !empty($catdata) ? count($catdata) : 0; ?></strong>
                                <span>Blog categories</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="blog-results-bar">
                    <div class="blog-results-copy">
                        <span>Browse Posts</span>
                        <strong>Modern blog feed aligned with the store experience</strong>
                    </div>
                    <div class="blog-results-chip">
                        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                        Page <?= (int) $currentPage; ?> of <?= (int) $totalPages; ?>
                    </div>
                </div>

                <div class="blog-grid">
                    <?php if (!empty($all_blog_data)) : ?>
                        <?php foreach ($all_blog_data as $single_blog_data) : ?>
                            <?php
                            $blogCategory = $category_model->where('CategoryID', $single_blog_data['category'])->first();
                            $categoryName = $blogCategory['CategoryName'] ?? 'Blog';
                            $blogString = str_replace(' ', '_', $single_blog_data['title']);
                            $blogLink = base_url() . 'blog/' . $categoryName . '/' . $blogString . '/' . base64_encode($single_blog_data['blg_id']) . '/' . base64_encode($single_blog_data['category']);
                            $blogDate = new DateTime($single_blog_data['created_at']);
                            $blogCommentCount = $comment_model->where('blog_id', $single_blog_data['blg_id'])->countAllResults();
                            $excerpt = trim(strip_tags(html_entity_decode($single_blog_data['description'] ?? '')));
                            $excerpt = mb_strlen($excerpt) > 150 ? mb_substr($excerpt, 0, 150) . '...' : $excerpt;
                            ?>
                            <article class="blog-feed-card">
                                <div class="blog-feed-media">
                                    <a href="<?= $blogLink; ?>">
                                        <img src="<?= base_url(); ?>admin/public/upload_images/<?= esc($single_blog_data['image']); ?>" alt="<?= esc($single_blog_data['title']); ?>">
                                    </a>
                                    <div class="blog-feed-date">
                                        <strong><?= $blogDate->format('d'); ?></strong>
                                        <span><?= $blogDate->format('M Y'); ?></span>
                                    </div>
                                </div>
                                <div class="blog-feed-content">
                                    <div class="blog-feed-meta">
                                        <span><i class="fa fa-calendar"></i><?= $blogDate->format('M d, Y'); ?></span>
                                        <span><i class="fa fa-comments"></i>Comment (<?= $blogCommentCount; ?>)</span>
                                    </div>
                                    <h3 class="blog-feed-title">
                                        <a href="<?= $blogLink; ?>"><?= esc($single_blog_data['title']); ?></a>
                                    </h3>
                                    <p class="blog-feed-excerpt"><?= esc($excerpt ?: 'Discover fresh updates, curated ideas, and design-forward reads from our latest blog entries.'); ?></p>
                                    <div class="blog-feed-footer">
                                        <span class="blog-feed-category"><?= esc($categoryName); ?></span>
                                        <a href="<?= $blogLink; ?>" class="blog-feed-link">Read Article <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <?php if (($totalPages ?? 0) > 1) : ?>
                    <div class="pagination-shell">
                        <nav aria-label="Blog pagination">
                            <ul class="pagination">
                                <li class="page-item <?= $currentPage <= 1 ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?= $requestUrl . '?page=' . max(1, $currentPage - 1); ?>">Prev</a>
                                </li>
                                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                    <li class="page-item <?= ($currentPage == $i) ? 'active' : ''; ?>">
                                        <a class="page-link" href="<?= $requestUrl . '?page=' . $i; ?>"><?= $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <li class="page-item <?= $currentPage >= $totalPages ? 'disabled' : ''; ?>">
                                    <a class="page-link" href="<?= $requestUrl . '?page=' . min($totalPages, $currentPage + 1); ?>">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <?php endif; ?>
            </div>

            <aside class="blog-sidebar">
                <div class="blog-side-card">
                    <div class="blog-side-card-body">
                        <span class="blog-side-kicker">Categories</span>
                        <h3 class="blog-side-title">Browse by topic</h3>
                        <p class="blog-side-copy">Jump into category-focused reads without leaving the cleaner visual flow of the main blog page.</p>
                        <ul class="blog-category-list">
                            <?php if (!empty($catdata)) : ?>
                                <?php foreach ($catdata as $catdt) : ?>
                                    <li>
                                        <a href="<?= base_url() ?>all_blog/<?= esc($catdt['CategoryName']); ?>/<?= base64_encode($catdt['CategoryID']); ?>">
                                            <?= esc($catdt['CategoryName']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <?php if (!empty($catagory_blog_data)) : ?>
                    <div class="blog-side-card">
                        <div class="blog-side-card-body">
                            <span class="blog-side-kicker">Recent</span>
                            <h3 class="blog-side-title">Fresh from this category</h3>
                            <div class="blog-mini-list">
                                <?php foreach ($catagory_blog_data as $blog_dt) : ?>
                                    <?php
                                    $catDt = $category_model->where('CategoryID', $blog_dt['category'])->first();
                                    $miniCategoryName = $catDt['CategoryName'] ?? 'Blog';
                                    $miniBlogString = str_replace(' ', '_', $blog_dt['title']);
                                    $miniBlogLink = base_url() . 'blog/' . $miniCategoryName . '/' . $miniBlogString . '/' . base64_encode($blog_dt['id']) . '/' . base64_encode($blog_dt['category']);
                                    $miniDate = new DateTime($blog_dt['created_at']);
                                    $miniCommentCount = $comment_model->where('blog_id', $blog_dt['id'])->countAllResults();
                                    ?>
                                    <a href="<?= $miniBlogLink; ?>" class="blog-mini-post">
                                        <img src="<?= base_url(); ?>admin/public/upload_images/<?= esc($blog_dt['image']); ?>" alt="<?= esc($blog_dt['title']); ?>">
                                        <div>
                                            <h4 class="blog-mini-post-title"><?= esc($blog_dt['title']); ?></h4>
                                            <div class="blog-mini-post-meta">
                                                <span><i class="fa fa-calendar"></i><?= $miniDate->format('M d, Y'); ?></span>
                                                <span><i class="fa fa-comments"></i><?= $miniCommentCount; ?></span>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </aside>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

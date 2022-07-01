<section id="subsection">
    <div class="subsection container">
        <div class="super-section-title">
            <h1>Artikel</h1>
        </div>
    </div>
</section>
<section id="article-sample">
    <div class="article-sample container">
        <div class="artc-header">
            <div class="artc-title"><?= $article['artc_title'] ?></div>
            <div class="artc-author">
                <div class="published-date"><?= date('d F Y', $article['artc_date_created']) ?></div>
            </div>
        </div>
        <div class="artc-image"><img src="<?= base_url('assets/himatika/article/') . $article['artc_image'] ?>" alt=""></div>
        <div class="artc-description">
            <?= $article['artc_description'] ?>
        </div>
    </div>
</section>
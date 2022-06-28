<section id="subsection">
    <div class="subsection container">
        <div class="super-section-title">
            <h1>Artikel</h1>
        </div>
    </div>
</section>
<section id="articles">
    <div class="articles container">
        <div class="all-articles">

            <div class="articles-box">
                <!-- query artikel -->
                <!-- end query artikel -->
                <div class="articles-box-flex">
                    <?php foreach ($articles as $artc) : ?>
                        <div class="article-card">
                            <a href="<?= base_url('base/viewarticle/') . $artc['id']; ?>">
                                <div class="article-image">
                                    <img src="<?= base_url('assets/himatika/article/') . $artc['artc_image'] ?>" alt="">
                                </div>
                                <div class="article-title">
                                    <?= $artc['artc_title'] ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
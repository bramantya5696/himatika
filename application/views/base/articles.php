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
                <?php foreach ($artcs_topic as $artop) : ?>
                    <!-- query artikel -->
                    <?php
                    $ar_id = $artop['id'];
                    $query = "SELECT base_articles_list.* 
                        FROM base_articles_list JOIN base_articles 
                        ON base_articles_list.artc_id = base_articles.id
                        WHERE base_articles_list.artc_id = $ar_id
                        ";
                    $articles = $this->db->query($query)->result_array();
                    ?>
                    <!-- end query artikel -->
                    <h1 class="header"><?= $artop['artcs_topic'] ?></h1>
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
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
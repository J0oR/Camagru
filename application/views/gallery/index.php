<?php if (!isset($this)) { exit(header('HTTP/1.0 403 Forbidden')); } ?>
<section class="section">
    <nav class="level">
        <div class="level-item has-text-centered">
            <div class="level-item">
                <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                    <?php $this->pag(); ?>
                </nav>
            </div>
        </div>
    </nav>
</section>
<section class="container section">
    <div class="columns is-multiline">
        <?php
        $slide = 1;
        if ($this->img)
        {
            foreach ($this->img as $i): ?>
                <div class="column is-one-quarter-desktop is-half-tablet">
                    <div class="card" style="border-radius: 2%;">
                        <header class="card-header">
                            <span class="tag is-medium">
                                <span class="icon is-medium">
                                    <i class="far fa-user"></i>
                                </span>
                                <span>
                                    <?= htmlspecialchars($i['login'], ENT_QUOTES); ?>
                                </span>
                            </span>
                        </header>
                         <div class="card-image" style="padding: 2%">
                             <figure class="image is-3by2">
                                <img src="<?= htmlspecialchars($i['image']) ?>" alt="photo" onclick="openModal();currentSlide('<?= htmlspecialchars($slide++, ENT_QUOTES) ?>')">
                            </figure>
                        </div>
                        <?php if (!empty($_SESSION['logged_user'])) : ?>
                            <div class="card-footer">
                                <div class="card-footer-item tag is-large">
                                    <div class="button is-link" onclick="like('<?= htmlspecialchars($i['id'], ENT_QUOTES) ?>',
                                            '<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES) ?>')">
                                        <span class="icon is-small">
                                            <i class="far fa-thumbs-up"></i>
                                        </span>
                                        <span>
                                            <?= $this->total_likes(htmlspecialchars($i['id'], ENT_QUOTES)); ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer-item tag is-large">
                                    <div class="button is-link" onclick="DisplayCommModal('<?= htmlspecialchars($i['id'], ENT_QUOTES) ?>')">
                                        <span class="icon is-small">
                                            <i class="far fa-comment"></i>
                                        </span>
                                        <span><?= $this->total_comm(htmlspecialchars($i['id'], ENT_QUOTES)); ?></span>
                                    </div>
                                </div>
                             </div>
                        <?php else : ?>
                            <div class="card-footer">
                                <div class="card-footer-item tag is-large"></div>
                                <div class="card-footer-item tag is-large"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach;
        }
        ?>
    </div>
</section>

<?php if (!empty($_SESSION['logged_user'])) : ?>
    <div class="modal" id="CommentModal">
        <div class="modal-background" onclick="closeModal('CommentModal')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('CommentModal')"></button>
            </header>
            <form>
                <section class="modal-card-body">
                    <div class="field">
                        <p class="control" id="mySlidesComm">
                            <input type="hidden" name="form" value="comment_form" id="comment_form">
                            <input type="hidden" id="hidden_id_img" name="hidden_id_img">
                            <textarea class="hover-shadow textarea" rows="8" id="id_text_area" placeholder="add a comment" REQUIRED style="width: 50vw;"></textarea>
                        </p>
                    </div>

                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <a class="button is-info" onclick="add_comment('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES) ?>');">Submit</a>
                    </div>
                    <div class="control">
                        <a class="button is-primary" onclick="closeModal('CommentModal')">Cancel</a>
                    </div>
                </div>
                </section>
            </form>
        </div>
    </div>
<?php endif; ?>



<?php if ($this->img) : ?>
    <div id="GalleryModal" class="modal GalleryModal">
        <div class="modal-background" onclick="closeModal('GalleryModal')"></div>
        <?php foreach ($this->img as $i): ?>
            <div class="GalleryModalSlides card"  style="border-radius: 2%">
                <a class="close cursor button is-white" onclick="closeModal('GalleryModal')">&times;</a>
                <div class="modal-content" id="content">
                    <div class="card-content">
                        <div class="media">
                            <div class=" media-content tag is-large">
                                    <span class="icon is-large">
                                        <i class="far fa-user"></i>
                                    </span>
                                    <span>
                                        <?= htmlspecialchars($i['login'], ENT_QUOTES); ?>
                                    </span>
                            </div>
                            <div class=" media-content tag is-large">
                                    <?= date("d/m/y H:i A", strtotime(htmlspecialchars($i['date'], ENT_QUOTES))); ?>
                            </div>
                        </div>
                    </div>

                    <div class="card-image" id="card">
                        <figure class="image is-4by3" >
                            <img src="<?= htmlspecialchars($i['image'], ENT_QUOTES) ?>" style="border-radius: 1%">
                        </figure>
                    </div>
                    <div class="comment_box card-content" style="overflow: auto;">

                    <?php if ($comments = $this->show_comments($i['id'])): ?>
                            <?php foreach ($comments as $comm) : ?>
                            <article class="media">
                                <div class="media-content">
                                    <div class="notification is-info">

                                            <span>
                                                <?= htmlspecialchars($comm['login'], ENT_QUOTES) ?>
                                            </span>
                                            <span style="float: right">
                                                <?= date("d/m/y H:i A", strtotime(htmlspecialchars($comm['date'], ENT_QUOTES)))?>
                                            </span>
                                            <div class="notification is-primary">
                                                <?= htmlspecialchars($comm['comment'], ENT_QUOTES) ?>
                                            </div>

                                </div>
                            </article>
                            <?php endforeach;?>
                    <?php else : ?>
                        <div class="comment_box">
                            <div class="notification is-info">
                                No comments yet.
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>










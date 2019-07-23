<?php if (!isset($this)) { exit(header('HTTP/1.0 403 Forbidden')); }
if (!empty($_SESSION['logged_user'])): ?>
    <div class="container section">
        <div class="columns">
            <div class="column">
                <div class="shot_container">
                    <form method="post" id="pics_form" enctype="multipart/form-data" name="pics_form">
                        <input type="hidden" name="form" value="pics_form" id="">
                        <input type="hidden" name="hidden" id="hidden">
                        <?php foreach ($this->super_img as $cat) : ?>
                            <label class="radio_img" style="float: left">
                                <input type="radio" name="select_super" id="r" value="<?= htmlspecialchars($cat['img_path'], ENT_QUOTES); ?>">
                                <figure class="image is-128x128 ">
                                    <img id="catImage" class="super_img" src="<?= htmlspecialchars(URL . $cat['img_path'], ENT_QUOTES); ?>" >
                                </figure>
                            </label>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>

            <div class="column is-three-fifths">
                <div class="box has-background-info" id="content">
                    <form id="save_form" method="POST"
                          action="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES); ?>home/imageSave">
                        <input type="hidden" name="form" value="save_form" id="">
                        <input type="hidden" id="img_tosave" name="img_tosave">
                        <input type="hidden" id="save_img" name="save_img" value="save_img">
                    </form>
                    <form id="form_discard"
                          action="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES); ?>home/header/">
                    </form>

                    <section class="buttons field is-grouped is-grouped-centered">
                        <button class="button is-success" id="startbutton">Take photo</button>



                        <button class="button is-success" id="upload" style="display: none">Take picture</button>
                        <label class="button" id="upload_wrapper">
                            <i class="fas fa-cloud-upload-alt">
                                <input class="button is-info has-background-link" type="file"
                                       accept="image/gif, image/jpeg, image/png, image/jpg" name="fileToUpload"
                                       id="fileToUpload" form="pics_form">
                            </i> Upload
                        </label>

                        <button form="save_form" class="button is-success " id="save" style="display: none">save</button>
                        <button form="form_discard" class="button is-primary" id="discard" style="display: none">discard</button>

                    </section>
                    <div class="section column" style="display: none" id="noCamera">
                        <div class="notification is-link">Access to camera denied.</div>
                    </div>

                    <video class="" id="video" style="border-radius: 1%">Video stream not available.</video>
                    <canvas id="canvas" style="display: none"></canvas>
                    <div class="output">
                        <img id="photo" src="">
                    </div>
                </div>
                <div class="section column" style="display: none" id="unselected_super">
                    <div class="notification is-link">Select an image, first.</div>
                </div>
                <div class="section" style="display: none" id="errorUpload">
                    <div class="notification is-link">Error: the image is too big or the format is wrong.</div>
                </div>
            </div>

            <div class="column">
                <div class="shot_container">
                    <?php if ($this->user_img) :
                        foreach ($this->user_img as $img) : ?>
                            <div class="media-content" style="float: left;">
                                <div class="content">
                                    <form method="post"
                                          action="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES); ?>home/deleteImg/<?= htmlspecialchars($img['id'], ENT_QUOTES) ?>"
                                          name="<?= htmlspecialchars($img['id'], ENT_QUOTES) ?>_form">
                                        <figure class="image is-128x128">
                                            <button class="button delete is-small is-danger" title="Delete image" style="position: absolute;"></button>
                                            <img src="<?= htmlspecialchars($img['image'], ENT_QUOTES); ?>">
                                         </figure>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach;
                        else :?>
                            <div class="notification is-info">
                                Your shots will appear here.
                            </div>
                        <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="column is-fullhd" style="display: none" id="upload_error">
            <div class="notification"  ><p>Sorry, there was an error uploading your file.</p></div>
        </div>
    </div>
    <script src="<?= htmlspecialchars(URL, ENT_QUOTES)?>assets/js/capture.js"></script>

    <?php $this->image_merge();
elseif (isset($_SESSION['log_error']) AND $_SESSION['log_error'] === 'register_right') : ?>
    <section class="section title is-4">Check your mail</section>
    <?php unset ($_SESSION['log_error']);
elseif (isset($_SESSION['log_error']) AND $_SESSION['log_error'] === 'activation_right') : ?>
    <section class="section title is-4">Registration successfully done! You may now log in.</section>
    <?php unset ($_SESSION['log_error']);
elseif (isset($_SESSION['log_error']) AND $_SESSION['log_error'] === 'activation_wrong') : ?>
    <section class="section title is-4">We encountered a problem during your registration.</section>
    <?php unset ($_SESSION['log_error']);
else : ?>
    <section class="section container has-text-centered is-size-5" id="log_err">
        <div class="notification is-info">
            You must be logged in to view this page.
        </div>
    </section>
<?php endif; ?>
<?php if (!isset($this)) { exit(header('HTTP/1.0 403 Forbidden'));}
if (!empty($_SESSION['logged_user'])):?>
<div class="container section">
    <aside class="menu">
        <ul class="menu-list">
            <li>
                <span class="navbar-item is-flex ">
                    <a class="button is-flex is-rounded is-dark is-outlined" href="#" id="changeLogin" onclick="openFormModal('new_login_form')">Change login</a>
                </span>
            </li>
            <li>
                <span class="navbar-item is-flex ">
                    <a class="button is-flex is-rounded is-dark is-outlined" href="#" id="changePassword" onclick="openFormModal('new_pw_form')">Change password</a>
                </span>
            </li>
            <li>
                <span class="navbar-item is-flex ">
                    <a class="button is-flex is-rounded is-dark is-outlined" href="#" id="changeMail" onclick="openFormModal('new_mail_form')">Change mail</a>
                </span>
            </li>
            <li style="display: <?php $x = (isset($_SESSION['mail_status']) AND $_SESSION['mail_status'] == 1) ? 'block' :  'none';echo $x;?>">
                <span class="navbar-item is-flex ">
                    <a class="button is-flex is-rounded is-dark is-outlined" id="unsubscribeMail" href="#" onclick="return unsubscribe('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES)?>');">Unsubscribe mail</a>
                </span>
            </li>
            <li style="display: <?php $x = (isset($_SESSION['mail_status']) AND $_SESSION['mail_status'] == 0) ? 'block' : 'none';echo $x;?>">
                <span class="navbar-item is-flex ">
                    <a class="navbar-item button is-flex is-rounded is-dark is-outlined" id="subscribeMail" href="#" onclick="return subscribe('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES)?>');" >Subscribe mail</a>
                </span>
            </li>
        </ul>
    </aside>
</div>

<div id="new_pw_form" class="modal"
     onsubmit="return change_password('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES)?>');">
    <div class="modal-background" onclick="closeFormModal('new_pw_form')" ></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('new_pw_form')"></button>
        </header>
        <section class="modal-card-body">
            <form name="change_pw_form">
                <input type="hidden" id="string" value="<?= isset($string)? $string : ""?>" >
                <input type="hidden" name="form" value="new_pw_form">
                <div class="field">
                    <label class="label is-normal has-text-black">Username</label>
                    <div class="control">
                        <input class="input is-normal" type="text" placeholder="Enter Username"  id="login1" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-normal has-text-black">Password</label>
                    <div class="control">
                        <input class="input is-normal " type="password" placeholder="Enter Actual Password" id="old_password" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-normal has-text-black">New password</label>
                    <div class="control">
                        <input class="input is-normal "  type="password" placeholder="New Password" id="new_password"
                               title="Password must contain at least 8 characters, including uppercase, lowercase, numbers and special characters."
                               pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-normal has-text-black">Confirm new password</label>
                    <div class="control">
                        <input class="input is-normal "  type="password" placeholder="Confirm New Password" id="conf_new_password"
                               title="Password must contain at least 8 characters, including uppercase, lowercase, numbers and special characters."
                               pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$" required>
                    </div>
                </div>
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-link is-normal">Confirm</button>
                    </div>
                    <div class="control">
                        <button class="button is-normal" onclick="closeFormModal('new_pw_form')">Cancel</button>
                    </div>
                </div>
            </form>
        </section>
        <div class="modal-card-foot">
            <div id="different_password_userarea" class="form_error">Passwords don't match </div>
            <div id="new_pw_form_error" class="form_error" >Wrong Credentials!!</div>
        </div>
    </div>
</div>

<div id="new_login_form" class="modal"
     onsubmit="return change_login('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES)?>');">
    <div class="modal-background" onclick="closeFormModal('new_login_form')" ></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('new_login_form')"></button>
        </header>
        <section class="modal-card-body">
            <form name="change_login_form">
                <input type="hidden" name="form" value="new_login_form">

                <div class="field">
                    <label class="label is-normal has-text-black">Username</label>
                    <div class="control is-flex-widescreen">
                        <input class="input is-normal" type="text" placeholder="Enter Username"  id="login2" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-normal has-text-black">New Username</label>
                    <div class="control">
                        <input class="input is-normal " type="text" placeholder="Enter New Username" id="new_login" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-normal has-text-black">Password</label>
                    <div class="control">
                        <input class="input is-normal "  type="password" placeholder="Enter Password" id="password2" required>
                    </div>
                </div>
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <button class="button is-link is-normal">Confirm</button>
                    </div>
                    <div class="control">
                        <button class="button is-normal" onclick="closeFormModal('new_login_form')">Cancel</button>
                    </div>
                </div>

            </form>
        </section>
        <div class="modal-card-foot">
            <div id="new_login_form_error" class="form_error" >Wrong Credentials!</div>
            <div id="new_login_form_error2" class="form_error" >Existing user!</div>
        </div>
    </div>
</div>


<div id="new_mail_form" class="modal"
     onsubmit="return change_mail('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES)?>');">
    <div class="modal-background" onclick="closeFormModal('new_mail_form')" ></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('new_mail_form')"></button>
        </header>
        <section class="modal-card-body">
            <form name="change_mail_form">
                <input type="hidden" name="form" value="new_mail_form">
                <div class="field">
                    <label class="label is-normal has-text-black">Username</label>
                    <div class="control">
                        <input class="input is-normal" type="text" placeholder="Enter Username"  id="login3" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-normal has-text-black">New Email</label>
                    <div class="control">
                        <input class="input is-normal " type="text" placeholder="Enter New Email" id="new_mail" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label is-normal has-text-black">Password</label>
                    <div class="control">
                        <input class="input is-normal "  type="password" placeholder="Enter Password" id="password3" required>
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link is-normal">Confirm</button>
                    </div>
                    <div class="control">
                        <button class="button is-normal" onclick="closeFormModal('new_mail_form')">Cancel</button>
                    </div>
                </div>
            </form>
        </section>
        <div class="modal-card-foot">
            <div id="new_mail_form_error" class="form_error">Wrong Credentials!</div>
            <div id="new_login_form_error2" class="form_error">Existing user!</div>
        </div>
    </div>
</div>
<?php endif;


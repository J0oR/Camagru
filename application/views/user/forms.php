<?php if (!isset($this)) { exit(header('HTTP/1.0 403 Forbidden'));}
if (!isset ($_SESSION['logged_user']))
{
    ?>
    <div id="login_form" class="modal"
         onsubmit="return login('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES) ?>');">
        <div class="modal-background" onclick="closeModal('login_form')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('login_form')"></button>
            </header>
            <section class="modal-card-body">
                <form name="loginForm">
                    <div class="field">
                        <label class="label is-normal has-text-black">Username</label>
                        <div class="control">
                            <input class="input is-normal" type="text" placeholder="Enter Username" id="login"
                                   title="Username must be betweeen 5 an 19 characters, and can contain uppercase, lowercase, numbers and underscore."
                                   pattern="^[a-zA-Z0-9_]{5,20}$" required">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label is-normal has-text-black">Password</label>
                        <div class="control">
                            <input class="input is-normal" type="password" placeholder="Enter Password" id="password" required>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-link is-normal" type="submit" >Submit</button>
                        </div>
                        <div class="control">
                            <button class=" forgot_btn button is-normal" type="button"
                                    onclick="openFormModal('forgot_pw_form');closeFormModal('login_form');">Forgot password?
                            </button>
                        </div>
                    </div>
                </form>
            </section>
            <div class="modal-card-foot">
                <div id="login_form_error" class="form_error">Login and/or password incorrect</div>
            </div>
        </div>
    </div>


    <div id="register_form" class="modal"
         onsubmit="return register('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES) ?>');">
        <div class="modal-background" onclick="closeFormModal('register_form')"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('register_form')"></button>
            </header>

            <section class="modal-card-body">
                <form name="registerForm">
                    <div class="field">
                        <label class="label is-normal has-text-black">Username</label>
                        <div class="control">
                            <input class="input is-normal" type="text" placeholder="Enter Username" id="register_login"
                                   title="Username must be betweeen 5 an 19 characters, and can contain uppercase, lowercase, numbers and underscore."
                                   pattern="^[a-zA-Z0-9_]{5,20}$" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label is-normal has-text-black">Password</label>
                        <div class="control">
                            <input class="input is-normal" type="password" placeholder="Enter Password" id="register_password"
                                   required
                                   title="Password must contain at least 8 characters, including uppercase, lowercase, numbers and special characters."
                                   pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label is-normal has-text-black">Email</label>
                        <div class="control">
                            <input class="input is-normal " type="email" placeholder="Email input" id="register_email" required>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-link is-normal" type="submit">Register</button>
                        </div>
                        <div class="control">
                            <button class="button is-normal" onclick="closeFormModal('register_form')" type="button">Cancel
                            </button>
                        </div>
                     </div>
                </form>
            </section>
            <div class="modal-card-foot">
                <div id="register_form_error" class="form_error">User already existing!</div>
                <div id="register_form_error2" class="form_error">Invalid credentials!</div>
            </div>
        </div>
    </div>

    <div id="forgot_pw_form" class="modal"
         onsubmit="return forgot_pw('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES) ?>');">
        <div class="modal-background" onclick="closeFormModal('forgot_pw_form')"></div>
         <div class="modal-card">
            <header class="modal-card-head">
                <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('forgot_pw_form')"></button>
            </header>
             <section class="modal-card-body">
                <form name="forgotPw_form">
                    <div class="field">
                        <label class="label is-normal has-text-black">Email</label>
                        <div class="control">
                            <input class="input is-normal " type="email" placeholder="Enter your email" id="forgot_email"
                                   required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label is-normal has-text-black">Confirm Email</label>
                        <div class="control">
                            <input class="input is-normal " type="email" placeholder="Confirm your email"
                                   id="confirm_forgot_email" required>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-link is-normal" type="submit">Send Request</button>
                        </div>
                        <div class="control">
                            <button class="button is-normal" onclick="closeFormModal('forgot_pw_form')" type="button">Cancel
                            </button>
                        </div>
                    </div>
                </form>
             </section>
             <div class="modal-card-foot">
                 <div id="different_email" class="form_error">Emails don't match</div>
             </div>
         </div>
    </div>

    <div id="reset_pw_form" class="modal"
         onsubmit="return reset_password('<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES) ?>');">
        <div class="modal-background" onclick="closeFormModal('reset_pw_form')"></div>
         <div class="modal-card">
            <header class="modal-card-head">
                <button class="button delete is-danger" type="button" aria-label="close" onclick="closeModal('reset_pw_form')"></button>
            </header>
             <section class="modal-card-body">
                <form name="resetPw_form">
                    <input type="hidden" id="string" value="<?= isset($string) ? $string : "" ?>">
                    <div class="field">
                        <label class="label is-normal has-text-black">New password</label>
                        <div class="control">
                            <input class="input is-normal " type="password" placeholder="Enter New Password" id="new_password"
                                   title="Password must contain at least 8 characters, including uppercase, lowercase, numbers and special characters."
                                   pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label is-normal has-text-black">Confirm new password</label>
                        <div class="control">
                            <input class="input is-normal " type="password" placeholder="Confirm New Password"
                                   id="conf_new_password"
                                   title="Password must contain at least 8 characters, including uppercase, lowercase, numbers and special characters."
                                   pattern="^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$" required>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-link is-normal" type="submit">Confirm</button>
                        </div>
                    </div>
                </form>
             </section>
             <div class="modal-card-foot">
                 <div id="different_password" class="form_error">Passwords don't match</div>
             </div>
         </div>
    </div>
    <?php
}

if (isset($_SESSION['log_error']) AND $_SESSION['log_error'] === 'wrong')
{
    ?>
    <script>
        document.getElementById('login_form_error').style.display = "inline";
    </script>
    <?php
    unset($_SESSION['log_error']);
}
elseif (isset($_SESSION['log_error']) AND $_SESSION['log_error'] === 'register_wrong'){
    ?>
    <script>document.getElementById('register_form_error').style.display = "inline";</script>
    <?php
    unset($_SESSION['log_error']);
}
elseif (isset($_SESSION['log_error']) AND $_SESSION['log_error'] === 'register_wrong_credentials') {
    ?>
    <script>document.getElementById('register_form_error2').style.display = "inline";</script>
    <?php
    unset($_SESSION['log_error']);
}





<?php
/**
 * Blocks direct access to this file (so an attacker can't look into application/views/_templates/header.php).
 * "$this" only exists if header.php is loaded from within the app, but not if THIS file here is called directly.
 * If someone called header.php directly we completely stop everything via exit() and send a 403 server status code.
 * Make sure there are NO spaces etc. before "<!DOCTYPE" as this might break page rendering.
 */
if (!isset($this))
    exit(header('HTTP/1.0 403 Forbidden'));
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= htmlspecialchars(URL, ENT_QUOTES) ?>assets/css/main.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?= htmlspecialchars(URL, ENT_QUOTES) ?>assets/css/gallery.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?= htmlspecialchars(URL, ENT_QUOTES) ?>assets/css/gallery_modal.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?= htmlspecialchars(URL, ENT_QUOTES) ?>assets/css/user.css" type="text/css" media="all">
    <link rel="shortcut icon" href="<?= htmlspecialchars(URL, ENT_QUOTES) ?>favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body class="has-background-primary">
<div class="container">
    <nav class="navbar is-primary">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <span class="has-text-dark has-text-left is-italic has-text-weight-bold is-size-4">Camagru</span>
                <span class="icon is-large">
                    <img src="../../../favicon.ico" width="30" height="38">
                </span>

            </a>
            <div class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navMenu" class="navbar-menu  has-background-primary">
            <div class="navbar-start">
                 <span class="navbar-item">
                     <a class="button  is-dark is-rounded is-outlined"
                        href="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES);?>">Home</a>
                 </span>
                <span class="navbar-item">
                    <a class="button  is-dark is-rounded is-outlined"
                       href="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES);?>gallery">Gallery</a>
                </span>
            </div>
            <div class="navbar-end">
                    <?php if (!empty($_SESSION['logged_user'])) :?>
                        <span class="navbar-item">
                            <a class="button is-dark is-rounded is-outlined"
                               href="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES);?>userArea">
                                <?= htmlspecialchars($_SESSION['logged_user']);?>'s Area</a>
                        </span>
                        <span class="navbar-item">
                            <a class="button is-danger is-rounded is-outlined"
                               href="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES);?>userArea/logout">
                                <strong>Logout</strong></a>
                        </span>
                    <?php else: ?>
                        <span class="navbar-item">
                            <a class="button is-dark is-rounded is-outlined"
                               href="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES);?>userArea/login">
                                <strong>Log in</strong></a>
                        </span>
                        <span class="navbar-item">
                            <a class="button  is-dark is-rounded is-outlined"
                               href="<?= htmlspecialchars(URL_WITH_INDEX_FILE, ENT_QUOTES);?>userArea/register">
                                <strong>Sign Up</strong></a>
                        </span>
                    <?php endif; ?>
            </div>
        </div>
    </nav>
</div>
<script>
    (function() {
        /* Define a variable that looks for an element with the class of .burger */
        var burger = document.querySelector('.burger');
        /* Define a variable that looks for an element with the #id defined in the .burger data-target attribute */
        var nav = document.querySelector('#'+burger.dataset.target);

        var item = document.querySelector('button');

        /* Add a listener that runs when .burger is clicked */
        burger.addEventListener('click', function(){
            /*Toggle the class of .is-active on the .burger element and #navMenu*/
            burger.classList.toggle('is-active');
            nav.classList.toggle('is-active');
        });
    })();
</script>
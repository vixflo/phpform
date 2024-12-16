<?php

use phpformbuilder\Form;

/* =============================================
    Bootstrap Theme Switcher
============================================= */

$bsTheme = '';
if (isset($form) && ($form->framework == 'bs5' || $form->framework == 'bs4')) {
    $bs5_available_themes = array(
        'default'    => 'Bootstrap default theme',
        'cerulean'   => 'A calm blue sky',
        'cosmo'      => 'An ode to Metro',
        'cyborg'     => 'Jet black and electric blue',
        'darkly'     => 'Flatly in night mode',
        'flatly'     => 'Flat & modern',
        'journal'    => 'Crisp like a new sheet of paper',
        'litera'     => 'The medium is the message',
        'lumen'      => 'Light & shadow',
        'lux'        => 'A touch of class',
        'materia'    => 'Material is the metaphor',
        'minty'      => 'A fresh feel',
        'morph'      => 'A neumorphic layer',
        'pulse'      => 'A trace of purple',
        'quartz'     => 'A glassmorphic layer',
        'sandstone'  => 'A touch of warmth',
        'simplex'    => 'Mini & minimalmist',
        'sketchy'    => 'A hand-drawn look for mockups and mirth',
        'slate'      => 'Shades of gunmetal gray',
        'solar'      => 'A spin on solarized',
        'spacelab'   => 'Silvery and sleek',
        'superhero'  => 'The brave and the blue',
        'united'     => 'Ubuntu orange and unique font',
        'vapor'      => 'A cyberpunk aesthetic',
        'yeti'       => 'A friendly foundation',
        'zephyr'     => 'Breezy and beautiful'
    );
    $bs4_available_themes = array(
        'default'    => 'Bootstrap default theme',
        'cerulean'   => 'A calm blue sky',
        'cosmo'      => 'An ode to Metro',
        'cyborg'     => 'Jet black and electric blue',
        'darkly'     => 'Flatly in night mode',
        'flatly'     => 'Flat & modern',
        'journal'    => 'Crisp like a new sheet of paper',
        'litera'     => 'The medium is the message',
        'lumen'      => 'Light & shadow',
        'lux'        => 'A touch of class',
        'materia'    => 'Material is the metaphor',
        'minty'      => 'A fresh feel',
        'pulse'      => 'A trace of purple',
        'sandstone'  => 'A touch of warmth',
        'simplex'    => 'Mini & minimalmist',
        'sketchy'    => 'A hand-drawn look for mockups and mirth',
        'slate'      => 'Shades of gunmetal gray',
        'solar'      => 'A spin on solarized',
        'spacelab'   => 'Silvery and sleek',
        'superhero'  => 'The brave and the blue',
        'united'     => 'Ubuntu orange and unique font',
        'yeti'       => 'A friendly foundation'
    );
    if (isset($_GET[$form->framework . 'theme']) && preg_match('`[a-z]+`', $_GET[$form->framework . 'theme'])) {
        $bsTheme = $_GET[$form->framework . 'theme'];

        // store user prefered theme
        setcookie($form->framework . 'theme', $bsTheme);
        $_SESSION['theme-switcher']['theme'] = $bsTheme;
    } elseif (isset($_COOKIE[$form->framework . 'theme']) && preg_match('`[a-z]+`', $_COOKIE[$form->framework . 'theme'])) {
        $bsTheme = $_COOKIE[$form->framework . 'theme'];
        $_SESSION['theme-switcher']['theme'] = $bsTheme;
    } else {
        $bsTheme = 'default';
    }
    $formThemeSwitcher = new Form('theme-switcher', 'vertical', 'class=novalidate', $form->framework);
    $formThemeSwitcher->setMode('development');

    $formThemeSwitcher->setMethod('GET');
    $formThemeSwitcher->addOption('theme', '', '', '', 'data-placeholder=true');
    $bsAvailableThemes = $bs5_available_themes;
    if ($form->framework === 'bs4') {
        $bsAvailableThemes = $bs4_available_themes;
    }
    foreach ($bsAvailableThemes as $key => $value) {
        $palette = '<div style\=\'padding-left:2rem\' class\=\'palette ' . $key . '\'><span class\=\'default\'></span><span class\=\'primary\'></span><span class\=\'success\'></span><span class\=\'info\'></span><span class\=\'warning\'></span><span class\=\'danger\'></span></div>';
        $formThemeSwitcher->addOption('theme', $key, '', '', 'data-html=<div class\=\'d-flex justify-content-between\'><span>' . ucfirst($key) . '<small class\=\'text-muted\'> - ' . $value . '</small></span>' . $palette . '</div>');
    }
    $formThemeSwitcher->addSelect('theme', '', 'data-slimselect=true, data-show-search=false, data-placeholder=Choose a Bootstrap theme ...');
    $formThemeSwitcherOutput       = '<div class="row justify-content-center mb-5" id="theme-switcher-container"><div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">' . addslashes($formThemeSwitcher->getCode(false) . '</div></div>');

    /* =============================================
        Bootstrap 4/5 css
    ============================================= */
    $bootstrapVersion = 'bootstrap@5.1.3';
    $bootswatchVersion = 'bootswatch@5.1.3';
    if ($form->framework == 'bs4') {
        $bootstrapVersion = 'bootstrap@4.6.0';
        $bootswatchVersion = 'bootswatch@4.6.0';
    }
    if ($bsTheme == 'default') {
        $bootstrapCssLink = '<link rel="preload" href="//cdn.jsdelivr.net/npm/' . $bootstrapVersion . '/dist/css/bootstrap.min.css" as="style" onload="this.rel=\'stylesheet\'">';
    } else {
        $bootstrapCssLink = '<link rel="preload" href="//cdn.jsdelivr.net/npm/' . $bootswatchVersion . '/dist/' . $bsTheme . '/bootstrap.min.css" as="style" onload="this.rel=\'stylesheet\'">';
    }
    echo $bootstrapCssLink;
    $formThemeSwitcher->printIncludes('css');
}

/* =============================================
    Code preview
============================================= */

// avoid foundation warning
if (!isset($bootstrapCssLink)) {
    $bootstrapCssLink = '';
}

$sourceCode = (string) file_get_contents(rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . $_SERVER['PHP_SELF']);
$title   = '';
$find    = '';
$replace = '';
if (preg_match('`<title>([^<]+)</title>`', $sourceCode, $out)) {
    $title = $out[1];
    $find  = array('`\n(\s)+<\?php([\n\t\s/\*=]+)CODE PREVIEW([^\?]+)\?>`', '`
<!-- Link to Bootstrap css here -->`', '`6LeNWaQUAAAAAGO_c1ORq2wla-PEFlJruMzyH5L6`', '`6LeNWaQUAAAAAOnei_86FAp7aRZCOhNwK3e2o2x2`', '`\$isLoadjsForm = true;([\n]{2})`', '`321856aa-ff29-4ab6-840a-8db73ca51dbf`', '`0xE49dEF7c889f9a19F34C5AEE68D77EB78eB7870d`');
    $replace = array('', $bootstrapCssLink, 'YOUR_RECAPTCHA_SITE_CODE', 'YOUR_RECAPTCHA_SECRET_CODE', '', 'YOUR_HCAPTCHA_SITE_KEY', 'YOUR_HCAPTCHA_SECRET_KEY');
}
$sourceCode = htmlspecialchars((string) preg_replace($find, $replace, $sourceCode));
$codePreviewInlineStyles = preg_replace('/[\r\n]*/', '', (string) file_get_contents('../assets/stylesheets/code-preview-styles.min.css'));
?>
<?php
if ($_SERVER['HTTP_HOST'] !== 'www.phpformbuilder.pro') {
?>
    <meta name="robots" content="noindex, nofollow">
<?php
} else { ?>
    <meta name="theme-color" content="#0F9E7B">
    <meta property="og:type" content="website">
    <meta property="og:og:site_name" content="PHP Form Builder">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $title; ?>">
    <meta property="og:image" content="https://www.phpformbuilder.pro/documentation/assets/images/screenshots/home.png">
    <meta property="og:url" content="<?php echo 'https://www.phpformbuilder.pro' . $_SERVER['REQUEST_URI']; ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@miglisoft">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $title; ?>">
    <meta name="twitter:image" content="https://www.phpformbuilder.pro/documentation/assets/images/screenshots/home.png">
<?php } ?>
<style>
    <?php echo $codePreviewInlineStyles; ?>
</style>
<link rel="preload" href="../assets/stylesheets/prism.min.css" as="style" onload="this.rel='stylesheet'">
<script>
    /*! loadCSS. [c]2017 Filament Group, Inc. MIT License - https://github.com/filamentgroup/loadCSS */
    (function(w) {
        "use strict";
        if (!w.loadCSS) {
            w.loadCSS = function() {}
        }
        var rp = loadCSS.relpreload = {};
        rp.support = (function() {
            var ret;
            try {
                ret = w.document.createElement("link").relList.supports("preload")
            } catch (e) {
                ret = !1
            }
            return function() {
                return ret
            }
        })();
        rp.bindMediaToggle = function(link) {
            var finalMedia = link.media || "all";

            function enableStylesheet() {
                link.media = finalMedia
            }
            if (link.addEventListener) {
                link.addEventListener("load", enableStylesheet)
            } else if (link.attachEvent) {
                link.attachEvent("onload", enableStylesheet)
            }
            setTimeout(function() {
                link.rel = "stylesheet";
                link.media = "only x"
            });
            setTimeout(enableStylesheet, 3000)
        };
        rp.poly = function() {
            if (rp.support()) {
                return
            }
            var links = w.document.getElementsByTagName("link");
            for (var i = 0; i < links.length; i++) {
                var link = links[i];
                if (link.rel === "preload" && link.getAttribute("as") === "style" && !link.getAttribute("data-loadcss")) {
                    link.setAttribute("data-loadcss", !0);
                    rp.bindMediaToggle(link)
                }
            }
        };
        if (!rp.support()) {
            rp.poly();
            var run = w.setInterval(rp.poly, 500);
            if (w.addEventListener) {
                w.addEventListener("load", function() {
                    rp.poly();
                    w.clearInterval(run)
                })
            } else if (w.attachEvent) {
                w.attachEvent("onload", function() {
                    rp.poly();
                    w.clearInterval(run)
                })
            }
        }
        if (typeof exports !== "undefined") {
            exports.loadCSS = loadCSS
        } else {
            w.loadCSS = loadCSS
        }
    }(typeof global !== "undefined" ? global : this))
</script>
<!-- Bootstrap 4 style for footer on others frameworks -->
<style>
    footer {
        display: block
    }

    footer p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    footer ul {
        margin-top: 0;
        margin-bottom: 1rem
    }

    footer a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent
    }

    footer img {
        vertical-align: middle;
        border-style: none
    }

    footer .h4 {
        margin-bottom: .5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit
    }

    footer .h4 {
        font-size: 1.5rem
    }

    footer .list-unstyled {
        padding-left: 0;
        list-style: none
    }

    footer img {
        page-break-inside: avoid
    }

    footer p {
        orphans: 3;
        widows: 3
    }

    footer .pl-3,
    footer .px-3 {
        padding-left: 1rem !important
    }

    footer .pr-3,
    footer .px-3 {
        padding-right: 1rem !important
    }

    footer .d-block {
        display: block !important
    }

    footer .mb-4,
    footer .my-4 {
        margin-bottom: 1.5rem !important
    }

    footer .align-items-center {
        -ms-flex-align: center !important;
        align-items: center !important
    }

    footer .justify-content-center {
        -ms-flex-pack: center !important;
        justify-content: center !important
    }

    footer .d-flex {
        display: -ms-flexbox !important;
        display: flex !important
    }

    footer.mt-5,
    footer .my-5 {
        margin-top: 3rem !important
    }

    footer.border-secondary,
    footer .border-secondary {
        border-color: #6c757d !important
    }

    footer.border-top,
    footer .border-top {
        border-top: 1px solid #dee2e6 !important
    }

    footer.bg-light {
        background-color: #f8f9fa !important
    }

    footer .text-secondary {
        color: #6c757d !important
    }

    footer .text-center {
        text-align: center !important
    }

    footer .pb-4,
    footer .py-4 {
        padding-bottom: 1.5rem !important
    }

    footer .pt-4,
    footer .py-4 {
        padding-top: 1.5rem !important
    }

    footer .mb-0,
    footer .my-0 {
        margin-bottom: 0 !important
    }

    footer .text-dark {
        color: #343a40 !important
    }

    footer .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }

    footer .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px
    }

    footer .col,
    footer .col-md-3,
    footer .col-sm-6 {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px
    }

    footer .col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0%;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
    }

    @media (min-width:576px) {
        footer .container {
            max-width: 540px
        }

        footer .col-sm-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }
    }

    @media (min-width:768px) {
        footer .container {
            max-width: 720px
        }

        footer.text-md-left {
            text-align: left !important
        }

        footer .col-md-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }
    }
</style>

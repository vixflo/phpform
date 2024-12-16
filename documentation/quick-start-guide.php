<!doctype html>
<html lang="en-US">
<head>
    <?php
    $meta = array(
        'title'       => 'PHP Form Builder - Quickstart Guide',
        'description' => 'Quick start guide for creating HTML/PHP forms with PHP Form Builder, a professional web form design tool compatible with any CMS and CSS framework.',
        'canonical'   => 'https://www.phpformbuilder.pro/documentation/quick-start-guide.php',
        'screenshot'  => 'quick-start-guide.png'
    );
    include_once 'inc/page-head.php';
    ?>
    <style> @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 300; src: local("Roboto Light"), local("Roboto-Light"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 400; src: local("Roboto"), local("Roboto-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 500; src: local("Roboto Medium"), local("Roboto-Medium"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto Condensed; font-style: normal; font-weight: 400; src: local("Roboto Condensed"), local("RobotoCondensed-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff') format("woff")} @font-face{ font-display: swap; font-family: bootstrap-icons; src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff') format("woff")} :root{ --bs-blue: #0e73cc; --bs-red: #fc4848; --bs-yellow: #ffc107; --bs-gray: #8c8476; --bs-gray-dark: #38352f; --bs-gray-100: #f6f6f5; --bs-gray-200: #eae8e5; --bs-gray-300: #d4d1cc; --bs-gray-400: #bfbab2; --bs-gray-500: #a9a398; --bs-gray-600: #7f7a72; --bs-gray-700: #55524c; --bs-gray-800: #2a2926; --bs-gray-900: #191817; --bs-primary: #0e73cc; --bs-secondary: #7f7a72; --bs-success: #0f9e7b; --bs-info: #00c2db; --bs-pink: #e6006f; --bs-warning: #ffc107; --bs-danger: #fc4848; --bs-light: #f6f6f5; --bs-dark: #191817; --bs-primary-rgb: 14, 115, 204; --bs-secondary-rgb: 127, 122, 114; --bs-success-rgb: 15, 158, 123; --bs-info-rgb: 0, 194, 219; --bs-pink-rgb: 230, 0, 111; --bs-warning-rgb: 255, 193, 7; --bs-danger-rgb: 252, 72, 72; --bs-light-rgb: 246, 246, 245; --bs-dark-rgb: 25, 24, 23; --bs-white-rgb: 255, 255, 255; --bs-black-rgb: 0, 0, 0; --bs-body-color-rgb: 42, 45, 45; --bs-body-bg-rgb: 255, 255, 255; --bs-font-sans-serif: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; --bs-font-monospace: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace; --bs-gradient: linear-gradient(180deg, hsla(0, 0%, 100%, .15), hsla(0, 0%, 100%, 0)); --bs-body-font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; --bs-body-font-size: 0.9375rem; --bs-body-font-weight: 400; --bs-body-line-height: 1.5; --bs-body-color: #2a2d2d; --bs-body-bg: #fff} *, :after, :before{ box-sizing: border-box} @media (prefers-reduced-motion:no-preference){ :root{ scroll-behavior: smooth}} body{ -webkit-text-size-adjust: 100%; background-color: var(--bs-body-bg); color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); line-height: var(--bs-body-line-height); margin: 0; text-align: var(--bs-body-text-align)} hr{ background-color: currentColor; border: 0; color: inherit; margin: 1rem 0; opacity: .25} hr:not([size]){ height: 1px} h1, h2, h3{ font-weight: 500; line-height: 1.2; margin-bottom: .5rem; margin-top: 0} h1{ font-size: calc(1.375rem + 1.5vw)} @media (min-width:1200px){ h1{ font-size: 2.5rem}} h2{ font-size: calc(1.3125rem + .75vw)} @media (min-width:1200px){ h2{ font-size: 1.875rem}} h3{ font-size: calc(1.28906rem + .46875vw)} @media (min-width:1200px){ h3{ font-size: 1.640625rem}} p{ margin-bottom: 1rem; margin-top: 0} ul{ padding-left: 2rem} ul{ margin-bottom: 1rem; margin-top: 0} strong{ font-weight: bolder} a{ color: #0e73cc; text-decoration: underline} img, svg{ vertical-align: middle} label{ display: inline-block} button{ border-radius: 0} button, input{ font-family: inherit; font-size: inherit; line-height: inherit; margin: 0} button{ text-transform: none} [type=button], button{ appearance: button;-webkit-appearance: button} ::-moz-focus-inner{ border-style: none; padding: 0} ::-webkit-datetime-edit-day-field, ::-webkit-datetime-edit-fields-wrapper, ::-webkit-datetime-edit-hour-field, ::-webkit-datetime-edit-minute, ::-webkit-datetime-edit-month-field, ::-webkit-datetime-edit-text, ::-webkit-datetime-edit-year-field{ padding: 0} ::-webkit-inner-spin-button{ height: auto} [type=search]{ appearance: textfield;-webkit-appearance: textfield; outline-offset: -2px} ::-webkit-search-decoration{ -webkit-appearance: none} ::-webkit-color-swatch-wrapper{ padding: 0} ::file-selector-button{ font: inherit} ::-webkit-file-upload-button{ -webkit-appearance: button; font: inherit} .lead{ font-size: 1.171875rem; font-weight: 300} .list-unstyled{ list-style: none; padding-left: 0} .btn{ background-color: transparent; border: 1px solid transparent; border-radius: 0; color: #2a2d2d; display: inline-block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; text-align: center; text-decoration: none; vertical-align: middle} .btn-danger{ background-color: #fc4848; border-color: #fc4848; box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075); color: #000} .btn-outline-secondary{ border-color: #7f7a72; color: #7f7a72} .container, .container-fluid{ margin-left: auto; margin-right: auto; padding-left: var(--bs-gutter-x, .75rem); padding-right: var(--bs-gutter-x, .75rem); width: 100%} @media (min-width:576px){ .container{ max-width: 540px}} @media (min-width:768px){ .container{ max-width: 720px}} @media (min-width:992px){ .container{ max-width: 960px}} .form-text{ color: #7f7a72; font-size: .875em; margin-top: .25rem} .form-control{ -webkit-appearance: none; -moz-appearance: none; appearance: none; background-clip: padding-box; background-color: #fff; border: 1px solid #bfbab2; border-radius: 0; box-shadow: inset 0 1px 2px rgba(0, 0, 0, .075); color: #2a2d2d; display: block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; width: 100%} .form-control::-webkit-date-and-time-value{ height: 1.5em} .form-control::-moz-placeholder{ color: #7f7a72; opacity: 1} .form-control:-ms-input-placeholder{ color: #7f7a72; opacity: 1} .form-control::-webkit-file-upload-button{ -webkit-margin-end: .75rem; background-color: #eae8e5; border: 0 solid; border-color: inherit; border-inline-end-width: 1px; border-radius: 0; color: #2a2d2d; margin: -.375rem -.75rem; margin-inline-end: .75rem; padding: .375rem .75rem} .input-group{ align-items: stretch; display: flex; flex-wrap: wrap; position: relative; width: 100%} .input-group>.form-control{ flex: 1 1 auto; min-width: 0; position: relative; width: 1%} .input-group .btn{ position: relative; z-index: 2} .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu){ border-bottom-right-radius: 0; border-top-right-radius: 0} .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback){ border-bottom-left-radius: 0; border-top-left-radius: 0; margin-left: -1px} .nav{ display: flex; flex-wrap: wrap; list-style: none; margin-bottom: 0; padding-left: 0} .nav-link{ color: #0e73cc; display: block; padding: .5rem 1rem; text-decoration: none} .nav-pills .nav-link{ background: 0 0; border: 0; border-radius: 0} .nav-pills .nav-link.active{ background-color: #0e73cc; color: #fff} .navbar{ align-items: center; display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom: .5rem; padding-top: .5rem; position: relative} .navbar>.container-fluid{ align-items: center; display: flex; flex-wrap: inherit; justify-content: space-between} .navbar-brand{ font-size: 1.171875rem; margin-right: 1rem; padding-bottom: 0; padding-top: 0; text-decoration: none; white-space: nowrap} .navbar-nav{ display: flex; flex-direction: column; list-style: none; margin-bottom: 0; padding-left: 0} .navbar-nav .nav-link{ padding-left: 0; padding-right: 0} .navbar-collapse{ align-items: center; flex-basis: 100%; flex-grow: 1} .navbar-toggler{ background-color: transparent; border: 1px solid transparent; border-radius: 0; font-size: 1.171875rem; line-height: 1; padding: .25rem .75rem} .navbar-toggler-icon{ background-position: 50%; background-repeat: no-repeat; background-size: 100%; display: inline-block; height: 1.5em; vertical-align: middle; width: 1.5em} @media (min-width:992px){ .navbar-expand-lg{ flex-wrap: nowrap; justify-content: flex-start}
    .navbar-expand-lg .navbar-nav{ flex-direction: row} .navbar-expand-lg .navbar-nav .nav-link{ padding-left: 1rem; padding-right: 1rem} .navbar-expand-lg .navbar-collapse{ display: flex !important; flex-basis: auto} .navbar-expand-lg .navbar-toggler{ display: none}} .navbar-light .navbar-toggler{ border-color: rgba(0, 0, 0, .1); color: rgba(0, 0, 0, .55)} .navbar-light .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.55)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .navbar-dark .navbar-brand{ color: #fff} .navbar-dark .navbar-nav .nav-link{ color: hsla(0, 0%, 100%, .65)} .navbar-dark .navbar-nav .nav-link.active{ color: #fff} .navbar-dark .navbar-toggler{ border-color: hsla(0, 0%, 100%, .1); color: hsla(0, 0%, 100%, .65)} .navbar-dark .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.65)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .collapse:not(.show){ display: none} .fixed-top{ top: 0} .fixed-top{ left: 0; position: fixed; right: 0; z-index: 1030} .visually-hidden{ clip: rect(0, 0, 0, 0) !important; border: 0 !important; height: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; white-space: nowrap !important; width: 1px !important} .d-flex{ display: flex !important} .d-none{ display: none !important} .w-100{ width: 100% !important} .flex-column{ flex-direction: column !important} .flex-wrap{ flex-wrap: wrap !important} .justify-content-end{ justify-content: flex-end !important} .justify-content-center{ justify-content: center !important} .justify-content-between{ justify-content: space-between !important} .align-items-start{ align-items: flex-start !important} .align-items-center{ align-items: center !important} .my-5{ margin-bottom: 3rem !important; margin-top: 3rem !important} .me-1{ margin-right: .25rem !important} .me-3{ margin-right: 1rem !important} .mb-2{ margin-bottom: .5rem !important} .mb-4{ margin-bottom: 1.5rem !important} .mb-5{ margin-bottom: 3rem !important} .mb-7{ margin-bottom: 12.5rem !important} .ms-2{ margin-left: .5rem !important} .ms-auto{ margin-left: auto !important} .p-2{ padding: .5rem !important} .p-4{ padding: 1.5rem !important} .px-0{ padding-left: 0 !important; padding-right: 0 !important} .px-2{ padding-left: .5rem !important; padding-right: .5rem !important} .py-2{ padding-bottom: .5rem !important; padding-top: .5rem !important} .pt-1{ padding-top: .25rem !important} .pb-6{ padding-bottom: 6.25rem !important} .text-center{ text-align: center !important} .text-nowrap{ white-space: nowrap !important} .text-danger{ --bs-text-opacity: 1; color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important} .text-white{ --bs-text-opacity: 1; color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important} .bg-dark{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important} .bg-white{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important} @media (min-width:768px){ .d-md-inline{ display: inline !important}} @media (min-width:1200px){ .container{ max-width: 1140px} .d-xl-none{ display: none !important}} #website-navbar{ box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15); font-family: Roboto Condensed} #website-navbar .navbar-nav{ align-items: stretch; display: flex; flex-wrap: nowrap; margin-top: 1rem; width: 100%} #website-navbar .navbar-nav .nav-item{ align-items: stretch; flex-grow: 1; justify-content: center; line-height: 1.25rem} #website-navbar .navbar-nav .nav-link{ align-items: center; display: flex; flex-direction: column; font-size: .875rem; justify-content: center; padding: .5rem 1rem; text-align: center; text-transform: uppercase} #website-navbar .navbar-nav .nav-link.active{ background-color: #55524c; text-decoration: none} #navbar-left-wrapper{ background-color: #2a2926; box-shadow: 2px 0 1px rgba(0, 0, 0, .12), 1px 0 1px rgba(0, 0, 0, .24); display: none; height: 100%; padding-right: 0; position: fixed; top: 72px; width: 14.375rem; z-index: 9999; z-index: 2} #navbar-left-wrapper #navbar-left-collapse{ display: none} #navbar-left-wrapper~.container{ padding-left: 14.375rem} @media (min-width:992px){ .d-lg-none{ display: none !important} .px-lg-0{ padding-left: 0 !important; padding-right: 0 !important} #website-navbar{ box-shadow: 0 2px 1px rgba(0, 0, 0, .12), 0 1px 1px rgba(0, 0, 0, .24)} #website-navbar .navbar-nav{ margin-top: 0} #website-navbar .navbar-nav .nav-link{ font-size: .8125rem; height: 100%; padding-left: .75rem; padding-right: .75rem} #website-navbar .navbar-brand{ font-size: 1.0625rem; margin-bottom: 0} #navbar-left-wrapper{ display: block}} @media (max-width:991.98px){ #navbar-left-toggler-wrapper{ display: inline-block; top: 4.75rem; width: 54px; z-index: 1 !important} #navbar-left-wrapper #navbar-left-collapse{ display: block} #navbar-left-wrapper~.container{ padding-left: 15px} .w3-animate-left{ -webkit-animation: .4s animateleft; animation: .4s animateleft; position: relative} @-webkit-keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}} @keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}}} #navbar-left{ background-color: #2a2926; box-shadow: 0 1px 0 #030303; color: #fff; position: relative; width: 100%; z-index: 100} #navbar-left li{ margin: 0; padding: 0; width: inherit} #navbar-left>li>a{ background-color: #373632; border-bottom: 1px solid #151413; border-top: 1px solid #45433e; color: #fff; font-size: 13px; font-weight: 300; padding: 12px 20px 12px 18px; text-shadow: 1px 1px 0 #45433e} #navbar-left>li>a.active{ background-color: #912727} [data-simplebar]{ align-content: flex-start; align-items: flex-start; flex-direction: column; flex-wrap: wrap; justify-content: flex-start; position: relative} #share-wrapper{ height: 40px; position: absolute; right: 50px; top: 37px; transform: translateY(-50%); z-index: 1050} #share-wrapper ul{ left: calc(-50% + 22.5px); position: relative; width: 90px} #share-wrapper ul li{ width: 45px} #share-wrapper label, #share-wrapper li>a{ border-radius: 50%; color: #efefef; height: 2.5rem; overflow: hidden; text-decoration: none; width: 2.5rem} #share-wrapper label#share{ background: #4267b2; opacity: .75; position: relative; z-index: 14} #share-wrapper li>a#share-facebook{ background: #3b5998} #share-wrapper li>a#share-twitter{ background: #00acee} #share-wrapper li>a#share-pinterest{ background: #e4405f} #share-wrapper li>a#share-linkedin{ background: #0077b5} #share-wrapper li>a#share-reddit{ background: #ff4500} #share-wrapper li>a#share-google-bookmarks{ background: #4285f4} #share-wrapper li>a#share-mix{ background: #ff8226} #share-wrapper li>a#share-pocket{ background: #ee4056} #share-wrapper li>a#share-digg{ background: #2a2a2a} #share-wrapper li>a#share-blogger{ background: #fda352} #share-wrapper li>a#share-tumblr{ background: #35465c} #share-wrapper li>a#share-flipboard{ background: #c00} #share-wrapper li>a#share-hacker-news{ background: #f60} #share-wrapper li:first-child{ opacity: 0; transform: translateY(-30%); z-index: 13} #share-wrapper li:nth-child(2){ opacity: 0; transform: translateY(-30%); z-index: 12} #share-wrapper li:nth-child(3){ opacity: 0; transform: translateY(-30%); z-index: 11} #share-wrapper li:nth-child(4){ opacity: 0; transform: translateY(-30%); z-index: 10} #share-wrapper li:nth-child(5){ opacity: 0; transform: translateY(-30%); z-index: 9} #share-wrapper li:nth-child(6){ opacity: 0; transform: translateY(-30%); z-index: 8} #share-wrapper li:nth-child(7){ opacity: 0; transform: translateY(-30%); z-index: 7} #share-wrapper li:nth-child(8){ opacity: 0; transform: translateY(-30%); z-index: 6} #share-wrapper li:nth-child(9){ opacity: 0; transform: translateY(-30%); z-index: 5} #share-wrapper li:nth-child(10){ opacity: 0; transform: translateY(-30%); z-index: 4} #share-wrapper li:nth-child(11){ opacity: 0; transform: translateY(-30%); z-index: 3} #share-wrapper li:nth-child(12){ opacity: 0; transform: translateY(-30%); z-index: 2} #share-wrapper li:nth-child(13){ opacity: 0; transform: translateY(-30%); z-index: 1} #share-wrapper input~ul{ visibility: hidden} @media only screen and (min-width:992px){ #share-wrapper{ position: fixed; right: 0; top: 180px} #share-wrapper label#share{ right: -42px}} :target{ scroll-margin-top: 100px} html{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; min-height: 100%; position: relative} @media screen and (prefers-reduced-motion:reduce){ html{ overflow-anchor: none; scroll-behavior: auto}} body{ counter-reset: section} h1, h2, h3{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol} h1{ color: #0e73cc; line-height: .9; margin-bottom: 2.5rem} h1:first-letter{ font-size: 2em} h2{ border-bottom: 2px solid #2a2926; color: #2a2926; margin-bottom: 3rem; padding: 1rem} h3{ color: #2a2926} h3{ margin-bottom: 1.5rem} a{ text-decoration: none} p.lead{ color: #7f7a72; font-weight: 400} strong{ font-weight: 500} section>h3{ white-space: nowrap} .btn .icon-circle{ border-radius: 50%; display: inline-block; height: 1.40625rem; line-height: 1.40625rem; width: 1.40625rem} .dmca-badge{ min-height: 100px} #search-bar #search-results-count{ left: -5.75rem; line-height: 22.5px; margin-right: -5.75rem; padding: .375rem 0; position: relative; width: calc(5.75rem + 1px); z-index: 3} .bi:before, [class*=" bi-"]:before{ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; display: inline-block; font-family: bootstrap-icons !important; font-style: normal; font-variant: normal; font-weight: 400 !important; line-height: 1; text-transform: none; vertical-align: -.125em} .bi-arrow-down:before{ content: "\f128"} .bi-arrow-up:before{ content: "\f148"} .bi-share-fill:before{ content: "\f52d"} .bi-x:before{ content: "\f62a"} .bi-currency-dollar:before{ content: "\f636"} .bi-x-lg:before{ content: "\f659"} </style>
    <?php require_once 'inc/css-includes.php'; ?>
</head>

<body style="padding-top:76px;" data-bs-spy="scroll" data-bs-target="#navbar-left-wrapper" data-bs-offset="180">

    <!-- Discount -->

    <div id="discount"></div>

    <!-- Main navbar -->

    <nav id="website-navbar" class="navbar navbar-dark bg-dark navbar-expand-lg px-2 px-lg-0 fixed-top">

        <div class="container-fluid px-0">
            <a class="navbar-brand me-3" href="../"><img src="assets/images/phpformbuilder-logo.png" width="60" height="60" class="me-3" alt="PHP Form Builder" title="PHP Form Builder">PHP Form Builder</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navcol-1">

                <ul class="nav navbar-nav ms-auto">

                    <!-- https://www.phpformbuilder.pro navbar -->

                    <li class="nav-item"><a class="nav-link" href="../">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../drag-n-drop-form-builder/index.php">Drag &amp; drop Form Builder</a></li>
                    <li class="nav-item"><a class="nav-link active" href="quick-start-guide.php">Quickstart Guide</a></li>
                    <li class="nav-item"><a class="nav-link" href="../templates/index.php">Form Templates</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript-plugins.php">JavaScript plugins</a></li>
                    <li class="nav-item"><a class="nav-link" href="code-samples.php">Code Samples</a></li>
                    <li class="nav-item"><a class="nav-link" href="class-doc.php">Class Doc.</a></li>
                    <li class="nav-item"><a class="nav-link" href="functions-reference.php">Functions Reference</a></li>
                    <li class="nav-item"><a class="nav-link" href="help-center.php">Help Center</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main sidebar -->

    <div id="navbar-left-toggler-wrapper" class="navbar-light fixed-top p-2 d-lg-none d-xl-none">
        <button id="navbar-left-toggler" class="navbar-toggler bg-white"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    </div>

    <div id="navbar-left-wrapper" class="w3-animate-left pb-6" data-simplebar>
        <a href="#" id="navbar-left-collapse" class="d-flex justify-content-end d-lg-none d-xl-none text-white p-4"><i class="bi bi-x-lg"></i></a>

        <ul id="navbar-left" class="nav nav-pills flex-column pt-1 mb-4">
            <li class="nav-item"><a class="nav-link active" href="#welcome">Welcome</a></li>
            <li class="nav-item"><a class="nav-link" href="#requirements">Requirements</a></li>
            <li class="nav-item"><a class="nav-link" href="#installation">Installation</a></li>
            <li class="nav-item"><a class="nav-link" href="#cms-users-ajax-loading">CMS users (Ajax loading)</a></li>
            <li class="nav-item"><a class="nav-link" href="#how-it-works">How it works</a></li>
            <li class="nav-item"><a class="nav-link" href="#sample-page-code">Sample page code</a></li>
            <li class="nav-item"><a class="nav-link" href="#validate-posted-values">Validate the user's posted values and send emails</a></li>
            <li class="nav-item"><a class="nav-link" href="#database-recording">Database recording</a></li>
            <li class="nav-item"><a class="nav-link" href="#complete-page-code">Complete page code</a></li>
            <li class="nav-item"><a class="nav-link" href="#to-go-further">To go further</a></li>
        </ul>
        <!-- navbar-left -->
    </div>
    <!-- /main sidebar -->

    <main class="container">

        <?php include_once 'inc/top-section.php'; ?>

        <h1>Quickstart Guide</h1>

        <section class="mb-7">

            <h2 id="welcome">Welcome to PHP Form Builder's Quickstart Guide</h2>
            <p class="lead mb-5"><strong>To get started with PHP Form Builder you have two entry points according to your preferred approach:</strong></p>

            <h3>1. The Drag and drop form generator</h3>
            <p>Create your forms by dragging and dropping, then copy and paste the code into your page.</p>
            <p class="mb-5">The <a href="../drag-n-drop-form-builder/index.php">Drag and drop</a> method is the quickest & most straightforward way to build your forms.</p>

            <h3>2. The built-in PHP functions</h3>
            <p>Create your forms using the PHP functions provided for this purpose, simple, documented, and explained throughout this project.</p>
            <p>Numerous <a href="../templates/index.php">templates</a> and <a href="../documentation/code-samples.php">code examples</a>, the <a href="../documentation/functions-reference.php">function reference</a>, and the <a href="../documentation/class-doc.php">class documentation</a> are available to help you.</p>

            <hr class="my-5">
            <h3>Extensions for IDE</h3>

            <p><a href="https://marketplace.visualstudio.com/items?itemName=Miglisoft.phpformbuilder"><img src="assets/images/visual-studio-code.svg" height="60" alt="Visual Studio Code" class="me-4" />Download the PHP Form Builder extension for Visual Studio Code</a></p>
            <p><a href="https://packagecontrol.io/packages/PHP%20Form%20Builder"><img src="assets/images/sublime-text.svg" width="60" height="60" alt="Visual Studio Code" class="me-4" />Download the PHP Form Builder plugin for Sublime Text</a></p>
            <hr class="my-5">
            <p>For PHP Beginners, a detailed step-by-step tutorial is available here: <a href="beginners-guide.php">PHP Beginners Guide</a></p>
        </section>

        <section class="mb-7">

            <h2 id="requirements">Requirements</h2>
            <p><strong>All you need is:</strong></p>
            <ul>
                <li>a PHP server running with PHP 7.4+ with cURL and openssl extensions enabled.</li>
                <li>a valid hostname (local URLs with a port like <em>https://localhost:3000</em> are not accepted).</li>
            </ul>
            <p>If you use an invalid hostname like <em>localhost:3000</em>, the solution is to create an alias.</p>

        </section>

        <section class="mb-7">
            <h2 id="installation" class="mb-5">Installation</h2>
            <p class="lead text-pink "><strong>Don't upload all the files and folders on your production server.</strong></p>
            <p><strong>PHP Form Builder's package includes the Form Builder itself, the documentation, and the templates.</strong></p>
            <p class="mb-sm"><strong>Documentation and Templates are available online at <a href="https://www.phpformbuilder.pro/">https://www.phpformbuilder.pro/</a>.<br>There's no need to upload them on your production server.</strong></p>
            <p>In the same way, you can use the <a href="../drag-n-drop-form-builder/index.php">online Drag & Drop Form Builder</a></p>
            <hr>
            <ol class="numbered">
                <li class="mb-5">
                    <p><strong>Add the <span class="file-path">phpformbuilder</span> folder <span class="text-pink">at the root of your project</span>.</strong></p>
                    <p class="fw-bold">If you want to put the <span class="file-path">phpformbuilder</span> folder inside a subfolder, please <a href="help-center.php#warning-include_once">read this</a> to avoid PHP errors or warnings.</p>
                    <p>Your directory structure should be similar to this :</p>
                    <div class="tree mb-5">
                        <ul class="tree-list">
                            <li><a href="#" class="folder">your-project-root</a>

                                <ul class="tree-list">
                                    <li>
                                        <a href="#" class="folder">phpformbuilder</a>

                                        <ul class="tree-list">
                                            <li><a href="#" class="folder">class</a></li>
                                            <li><a href="#" class="folder">mailer</a></li>
                                            <li><a href="#" class="folder">plugins</a></li>
                                            <li><a href="#" class="folder">plugins-config</a></li>
                                            <li><a href="#" class="folder">plugins-config-custom</a></li>
                                            <li><a href="#" class="folder">vendor</a></li>
                                            <li><a href="#" class="file">autoload.php</a></li>
                                            <li><a href="#" class="file">curl-test.php</a></li>
                                            <li><a href="#" class="file">register.php</a></li>
                                            <li><a href="#" class="file">server.php</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="folder">drag-n-drop-form-builder</a>

                                        <ul class="tree-list">
                                            <li><a href="#" class="text-secondary">[drag & drop files & folders here]</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <p class="h5">Minimum required files</p>
                    <ul>
                        <li>If you don't send emails, you can delete the <span class="file-path">mailer</span> folder</li>
                        <li>You can delete all the plugins you don't use from the <span class="file-path">plugins</span> and <span class="file-path">plugins-config</span> folders</li>
                        <li>If you don't customize any plugin configuration you can delete the <span class="file-path">plugins-config-custom</span> folders</li>
                        <li>You can delete <span class="file-path">server.php</span> (this files gives some informations about your server configuration for debugging purpose)</li>
                        <li>You can delete <span class="file-path">register.php</span> after you have registered</li>
                    </ul>
                    <hr>
                    <p>More details about folders, files, and required files on the production server are available here: <a href="/#package-structure">../#package-structure</a></p>
                </li>
                <li class="mb-5" id="registration">
                    <p class="h5">Registration</p>
                    <p><strong>Open <span class="file-path">phpformbuilder/register.php</span> in your browser, and enter your purchase code to activate your copy.</strong></p>
                    <p>Each purchased license allows the installation of PHP Form Builder on two different domains:</p>
                    <ul>
                        <li>One for localhost</li>
                        <li>One for your production server</li>
                    </ul>
                    <p><strong>Once you register your purchase, delete <span class="file-path">register.php</span> from your production server to avoid unwanted access.</strong></p>
                </li>
                <li><strong>You're ready to go.</strong></li>
            </ol>
        </section>

        <section class="mb-7">
            <h2 id="cms-users-ajax-loading">CMS users (Ajax loading)</h2>
            <p class="lead mb-5">If you use a CMS (WordPress, Drupal, Prestashop¨, or other),<br>the easiest and most efficient way to load your forms is with Ajax.</p>
            <h3>If you use Drag & Drop tool</h3>
            <ol class="numbered mb-5">
                <li>Build your form with the drag and drop tool</li>
                <li>Open the <span class="badge bg-secondary">Main Settings</span>, then click the <span class="badge bg-secondary">Ajax loading</span> tab and enable Ajax</li>
                <li>Close the modal</li>
                <li>Click the <span class="badge bg-secondary">Get code</span> button and follow the instructions</li>
            </ol>
            <h3>If you code your form</h3>
            <p>Refer to <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#ajax-loading">https://www.phpformbuilder.pro/documentation/class-doc.php#ajax-loading</a></p>
        </section>

        <section class="mb-7">
            <h2 id="how-it-works">How it works</h2>
            <p><strong>You need 4 PHP blocks on your page :</strong></p>
            <ol class="numbered">
                <li>
                    <strong>1<sup>st</sup> block at the very beginning of your page to :</strong>
                    <ul>
                        <li class="mb-1">create your form</li>
                        <li class="mb-1">validate if posted</li>
                        <li class="mb-1">send emails, or record the values into your database if validated</li>
                    </ul>
                </li>
                <li><strong>2<sup>nd</sup> block just before <code class="language-php">&lt;/head&gt;</code></strong> to include css files required by plugins</li>
                <li><strong>3<sup>rd</sup> between <code class="language-php">&lt;body&gt;&lt;/body&gt;</code> to render your form</strong></li>
                <li><strong>4<sup>th</sup> just before <code class="language-php">&lt;/body&gt;</code> to include js files &amp; code required by plugins</strong></li>
            </ol>
        </section>

        <section class="mb-7">
            <h2 id="sample-page-code">Sample page code</h2>
            <pre class="line-numbers"><code class="language-php">&lt;?php
/*============================================
=            1st block - the form            =
============================================*/

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER[&apos;DOCUMENT_ROOT&apos;], DIRECTORY_SEPARATOR) . &apos;/phpformbuilder/autoload.php&apos;;

// Create the form
$form = new Form(&#039;test-form&#039;, &#039;horizontal&#039;, &#039;novalidate&#039;);

// Call functions to add fields and elements
$form-&gt;addInput(&#039;text&#039;, &#039;user-name&#039;, &#039;&#039;, &#039;Name :&#039;, &#039;required, placeholder=Name&#039;);
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;Yes&#039;, 1);
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;No&#039;, 0);
$form-&gt;printRadioGroup(&#039;is-all-ok&#039;, &#039;Is all ok ?&#039;, false, &#039;required&#039;);
$form-&gt;addBtn(&#039;submit&#039;, &#039;submit-btn&#039;, 1, &#039;Send&#039;, &#039;class=btn btn-success&#039;);

// iCheck plugin
$form-&gt;addPlugin(&#039;icheck&#039;, &#039;input&#039;, &#039;default&#039;, array(&#039;theme&#039; =&gt; &#039;square&#039;, &#039;color&#039; =&gt; &#039;red&#039;));

/*===========  End of 1st block  ============*/
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Test Form&lt;/title&gt;

&lt;!-- Bootstrap 5 CSS --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css&quot; integrity=&quot;sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3&quot; crossorigin=&quot;anonymous&quot;&gt;

&lt;?php
/*============================================================
=            2nd block - css includes for plugins            =
============================================================*/

$form-&gt;printIncludes(&#039;css&#039;);

/*===================  End of 2nd block  ====================*/
?&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h1&gt;My first form&lt;/h1&gt;
&lt;?php
/*======================================================================================================
=            3rd block - render the form and the feedback message if the form has been sent            =
======================================================================================================*/

if (isset($sent_message)) {
    echo $sent_message;
}
$form-&gt;render();

/*========================================  End of 3rd block  =========================================*/
?&gt;

&lt;!-- Bootstrap 5 JavaScript --&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js&quot; integrity=&quot;sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;

&lt;?php
/*========================================================================
=            4th block - js includes for plugins and js code (domready)  =
========================================================================*/

$form-&gt;printIncludes(&#039;js&#039;);
$form-&gt;printJsCode();

/*=========================  End of 4th block ===========================*/
?&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
            <p class="alert alert-info has-icon">All functions and arguments to build your form, setup layout, add plugins are detailed in <a href="class-doc.php">Class Documentation</a>, and <a href="functions-reference.php">Functions Reference</a>.</p>
        </section>

        <section class="mb-7">
            <h2 id="validate-posted-values">Validate the user's posted values and send emails</h2>
            <p><strong>Add this PHP block just after <code class="language-php">include_once [...] . &#039;/phpformbuilder/autoload.php&#039;;</code> :</strong></p>
            <pre><code class="language-php">if ($_SERVER[&quot;REQUEST_METHOD&quot;] == &quot;POST&quot; &amp;&amp; Form::testToken(&#039;test-form&#039;) === true) {
    // create validator &amp; auto-validate required fields
    $validator = Form::validate(&#039;test-form&#039;);

    // check for errors
    if ($validator-&gt;hasErrors()) {
        $_SESSION[&#039;errors&#039;][&#039;test-form&#039;] = $validator-&gt;getAllErrors();
    } else {
        $email_config = array(
            &#039;sender_email&#039;    =&gt; &#039;contact@my-site.com&#039;,
            &#039;sender_name&#039;     =&gt; &#039;PHP Form Builder&#039;,
            &#039;recipient_email&#039; =&gt; &#039;recipient-email@my-site.com&#039;,
            &#039;subject&#039;         =&gt; &#039;PHP Form Builder - Test form email&#039;,
            &#039;filter_values&#039;   =&gt; &#039;test-form&#039;
        );
        $sent_message = Form::sendMail($email_config);
        Form::clear(&#039;test-form&#039;);
    }
}</code></pre>
            <div class="alert alert-info has-icon">
                <p>Email sending may fail on your localhost, depending on your configuration.</p>
                <p>It should work anyway on the production server.</p>
            </div>
        </section>

        <section class="mb-7">
            <h2 id="database-recording">Database recording</h2>
            <p>PHP Form Builder relies on the <strong>PowerLite PDO library</strong> to connect to databases and perform all SQL operations.</p>
            <p>PowerLite PDO is included in the PHP Form Builder package, and available here on Github: <a href="https://github.com/migliori/power-lite-pdo">https://github.com/migliori/power-lite-pdo</a></p>
            <p><strong>The full documentation is available on <a href="https://www.powerlitepdo.com">PowerLite PDO's official website</a>.</p>
        </section>

        <section class="mb-7">
            <h2 id="complete-page-code">Complete page code</h2>
            <pre class="line-numbers"><code class="language-php">&lt;?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER[&apos;DOCUMENT_ROOT&apos;], DIRECTORY_SEPARATOR) . &apos;/phpformbuilder/autoload.php&apos;;

if ($_SERVER[&quot;REQUEST_METHOD&quot;] == &quot;POST&quot; &amp;&amp; Form::testToken(&#039;test-form&#039;) === true) {
    // create validator &amp; auto-validate required fields
    $validator = Form::validate(&#039;test-form&#039;);

    // check for errors
    if ($validator-&gt;hasErrors()) {
        $_SESSION[&#039;errors&#039;][&#039;test-form&#039;] = $validator-&gt;getAllErrors();
    } else {
        $email_config = array(
            &#039;sender_email&#039;    =&gt; &#039;contact@my-site.com&#039;,
            &#039;sender_name&#039;     =&gt; &#039;PHP Form Builder&#039;,
            &#039;recipient_email&#039; =&gt; &#039;recipient-email@my-site.com&#039;,
            &#039;subject&#039;         =&gt; &#039;PHP Form Builder - Test form email&#039;,
            &#039;filter_values&#039;   =&gt; &#039;test-form&#039;
        );
        $sent_message = Form::sendMail($email_config);
        Form::clear(&#039;test-form&#039;);
    }
}

// Create the form
$form = new Form('test-form', 'horizontal', 'novalidate');

// Call functions to add fields and elements
$form->addInput('text', 'user-name', '', 'Name :', 'required, placeholder=Name');
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;Yes&#039;, 1);
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;No&#039;, 0);
$form-&gt;printRadioGroup(&#039;is-all-ok&#039;, &#039;Is all ok ?&#039;, false, &#039;required&#039;);
$form-&gt;addPlugin(&#039;icheck&#039;, &#039;input&#039;, &#039;default&#039;, array(&#039;theme&#039; =&gt; &#039;square&#039;, &#039;color&#039; =&gt; &#039;red&#039;));
$form->addBtn('submit', 'submit-btn', 1, 'Send', 'class=btn btn-success');
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Test Form&lt;/title&gt;

&lt;!-- Bootstrap 5 CSS --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css&quot; integrity=&quot;sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3&quot; crossorigin=&quot;anonymous&quot;&gt;

&lt;?php $form-&gt;printIncludes(&#039;css&#039;); ?&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h1&gt;My first form&lt;/h1&gt;
&lt;?php
if (isset($sent_message)) {
    echo $sent_message;
}
$form-&gt;render();
?&gt;

&lt;!-- Bootstrap 5 JavaScript --&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js&quot; integrity=&quot;sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;

&lt;?php
$form-&gt;printIncludes(&#039;js&#039;);
$form-&gt;printJsCode();
?&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
        </section>

        <section class="mb-7">
            <h2 id="to-go-further">To go further</h2>
            <p><strong>Now you've learned the basics; Several resources will help to add other fields, plugins, validate different values and build more complex layouts :</strong></p>

            <ul>
                <li><a href="../templates/index.php">Templates</a></li>
                <li><a href="code-samples.php">Code Samples</a></li>
                <li><a href="functions-reference.php">Functions Reference</a></li>
                <li><a href="class-doc.php">Class Doc.</a></li>
            </ul>
        </section>

    </main>
    <?php require_once 'inc/js-includes.php'; ?>
</body>

</html>

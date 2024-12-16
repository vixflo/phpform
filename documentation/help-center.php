<!doctype html>
<html lang="en-US">

<head>
    <?php
    $meta = array(
        'title'       => 'PHP Form Builder Help Center: Contact, Troubleshooting and Common issues',
        'description' => 'PHP Form Builder - How to solve common issues',
        'canonical'   => 'https://www.phpformbuilder.pro/documentation/help-center.php',
        'screenshot'  => 'help-center.png'
    );
    include_once 'inc/page-head.php';
    ?>
    <style> @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 300; src: local("Roboto Light"), local("Roboto-Light"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 400; src: local("Roboto"), local("Roboto-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 500; src: local("Roboto Medium"), local("Roboto-Medium"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto Condensed; font-style: normal; font-weight: 400; src: local("Roboto Condensed"), local("RobotoCondensed-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff') format("woff")} @font-face{ font-display: swap; font-family: bootstrap-icons; src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff') format("woff")} :root{ --bs-blue: #0e73cc; --bs-red: #fc4848; --bs-yellow: #ffc107; --bs-gray: #8c8476; --bs-gray-dark: #38352f; --bs-gray-100: #f6f6f5; --bs-gray-200: #eae8e5; --bs-gray-300: #d4d1cc; --bs-gray-400: #bfbab2; --bs-gray-500: #a9a398; --bs-gray-600: #7f7a72; --bs-gray-700: #55524c; --bs-gray-800: #2a2926; --bs-gray-900: #191817; --bs-primary: #0e73cc; --bs-secondary: #7f7a72; --bs-success: #0f9e7b; --bs-info: #00c2db; --bs-pink: #e6006f; --bs-warning: #ffc107; --bs-danger: #fc4848; --bs-light: #f6f6f5; --bs-dark: #191817; --bs-primary-rgb: 14, 115, 204; --bs-secondary-rgb: 127, 122, 114; --bs-success-rgb: 15, 158, 123; --bs-info-rgb: 0, 194, 219; --bs-pink-rgb: 230, 0, 111; --bs-warning-rgb: 255, 193, 7; --bs-danger-rgb: 252, 72, 72; --bs-light-rgb: 246, 246, 245; --bs-dark-rgb: 25, 24, 23; --bs-white-rgb: 255, 255, 255; --bs-black-rgb: 0, 0, 0; --bs-body-color-rgb: 42, 45, 45; --bs-body-bg-rgb: 255, 255, 255; --bs-font-sans-serif: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; --bs-font-monospace: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace; --bs-gradient: linear-gradient(180deg, hsla(0, 0%, 100%, .15), hsla(0, 0%, 100%, 0)); --bs-body-font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; --bs-body-font-size: 0.9375rem; --bs-body-font-weight: 400; --bs-body-line-height: 1.5; --bs-body-color: #2a2d2d; --bs-body-bg: #fff} *, :after, :before{ box-sizing: border-box} @media (prefers-reduced-motion:no-preference){ :root{ scroll-behavior: smooth}} body{ -webkit-text-size-adjust: 100%; background-color: var(--bs-body-bg); color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); line-height: var(--bs-body-line-height); margin: 0; text-align: var(--bs-body-text-align)} h1, h2, h3{ font-weight: 500; line-height: 1.2; margin-bottom: .5rem; margin-top: 0} h1{ font-size: calc(1.375rem + 1.5vw)} @media (min-width:1200px){ h1{ font-size: 2.5rem}} h2{ font-size: calc(1.3125rem + .75vw)} @media (min-width:1200px){ h2{ font-size: 1.875rem}} h3{ font-size: calc(1.28906rem + .46875vw)} @media (min-width:1200px){ h3{ font-size: 1.640625rem}} p{ margin-bottom: 1rem; margin-top: 0} ul{ padding-left: 2rem} ul{ margin-bottom: 1rem; margin-top: 0} ul ul{ margin-bottom: 0} strong{ font-weight: bolder} a{ color: #0e73cc; text-decoration: underline} img, svg{ vertical-align: middle} label{ display: inline-block} button{ border-radius: 0} button, input{ font-family: inherit; font-size: inherit; line-height: inherit; margin: 0} button{ text-transform: none} [type=button], button{ appearance: button;-webkit-appearance: button} ::-moz-focus-inner{ border-style: none; padding: 0} ::-webkit-datetime-edit-day-field, ::-webkit-datetime-edit-fields-wrapper, ::-webkit-datetime-edit-hour-field, ::-webkit-datetime-edit-minute, ::-webkit-datetime-edit-month-field, ::-webkit-datetime-edit-text, ::-webkit-datetime-edit-year-field{ padding: 0} ::-webkit-inner-spin-button{ height: auto} [type=search]{ appearance: textfield;-webkit-appearance: textfield; outline-offset: -2px} ::-webkit-search-decoration{ -webkit-appearance: none} ::-webkit-color-swatch-wrapper{ padding: 0} ::file-selector-button{ font: inherit} ::-webkit-file-upload-button{ -webkit-appearance: button; font: inherit} .list-unstyled{ list-style: none; padding-left: 0} .btn{ background-color: transparent; border: 1px solid transparent; border-radius: 0; color: #2a2d2d; display: inline-block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; text-align: center; text-decoration: none; vertical-align: middle} .btn-danger{ background-color: #fc4848; border-color: #fc4848; box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075); color: #000} .btn-outline-secondary{ border-color: #7f7a72; color: #7f7a72} .container, .container-fluid{ margin-left: auto; margin-right: auto; padding-left: var(--bs-gutter-x, .75rem); padding-right: var(--bs-gutter-x, .75rem); width: 100%} @media (min-width:576px){ .container{ max-width: 540px}} @media (min-width:768px){ .container{ max-width: 720px}} @media (min-width:992px){ .container{ max-width: 960px}} .form-text{ color: #7f7a72; font-size: .875em; margin-top: .25rem} .form-control{ -webkit-appearance: none; -moz-appearance: none; appearance: none; background-clip: padding-box; background-color: #fff; border: 1px solid #bfbab2; border-radius: 0; box-shadow: inset 0 1px 2px rgba(0, 0, 0, .075); color: #2a2d2d; display: block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; width: 100%} .form-control::-webkit-date-and-time-value{ height: 1.5em} .form-control::-moz-placeholder{ color: #7f7a72; opacity: 1} .form-control:-ms-input-placeholder{ color: #7f7a72; opacity: 1} .form-control::-webkit-file-upload-button{ -webkit-margin-end: .75rem; background-color: #eae8e5; border: 0 solid; border-color: inherit; border-inline-end-width: 1px; border-radius: 0; color: #2a2d2d; margin: -.375rem -.75rem; margin-inline-end: .75rem; padding: .375rem .75rem} .input-group{ align-items: stretch; display: flex; flex-wrap: wrap; position: relative; width: 100%} .input-group>.form-control{ flex: 1 1 auto; min-width: 0; position: relative; width: 1%} .input-group .btn{ position: relative; z-index: 2} .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu){ border-bottom-right-radius: 0; border-top-right-radius: 0} .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback){ border-bottom-left-radius: 0; border-top-left-radius: 0; margin-left: -1px} .nav{ display: flex; flex-wrap: wrap; list-style: none; margin-bottom: 0; padding-left: 0} .nav-link{ color: #0e73cc; display: block; padding: .5rem 1rem; text-decoration: none} .nav-pills .nav-link{ background: 0 0; border: 0; border-radius: 0} .navbar{ align-items: center; display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom: .5rem; padding-top: .5rem; position: relative} .navbar>.container-fluid{ align-items: center; display: flex; flex-wrap: inherit; justify-content: space-between} .navbar-brand{ font-size: 1.171875rem; margin-right: 1rem; padding-bottom: 0; padding-top: 0; text-decoration: none; white-space: nowrap} .navbar-nav{ display: flex; flex-direction: column; list-style: none; margin-bottom: 0; padding-left: 0} .navbar-nav .nav-link{ padding-left: 0; padding-right: 0} .navbar-collapse{ align-items: center; flex-basis: 100%; flex-grow: 1} .navbar-toggler{ background-color: transparent; border: 1px solid transparent; border-radius: 0; font-size: 1.171875rem; line-height: 1; padding: .25rem .75rem} .navbar-toggler-icon{ background-position: 50%; background-repeat: no-repeat; background-size: 100%; display: inline-block; height: 1.5em; vertical-align: middle; width: 1.5em} @media (min-width:992px){ .navbar-expand-lg{ flex-wrap: nowrap; justify-content: flex-start} .navbar-expand-lg .navbar-nav{ flex-direction: row} .navbar-expand-lg .navbar-nav .nav-link{ padding-left: 1rem; padding-right: 1rem} .navbar-expand-lg .navbar-collapse{ display: flex !important; flex-basis: auto} .navbar-expand-lg .navbar-toggler{ display: none}} .navbar-light .navbar-toggler{ border-color: rgba(0, 0, 0, .1); color: rgba(0, 0, 0, .55)} .navbar-light .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.55)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .navbar-dark .navbar-brand{ color: #fff} .navbar-dark .navbar-nav .nav-link{ color: hsla(0, 0%, 100%, .65)} .navbar-dark .navbar-nav .nav-link.active{ color: #fff} .navbar-dark .navbar-toggler{ border-color: hsla(0, 0%, 100%, .1); color: hsla(0, 0%, 100%, .65)} .navbar-dark .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.65)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .collapse:not(.show){ display: none} .fixed-top{ top: 0} .fixed-top{ left: 0; position: fixed; right: 0; z-index: 1030} .visually-hidden{ clip: rect(0, 0, 0, 0) !important; border: 0 !important; height: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; white-space: nowrap !important; width: 1px !important} .d-flex{ display: flex !important} .d-none{ display: none !important} .w-100{ width: 100% !important} .flex-column{ flex-direction: column !important} .flex-wrap{ flex-wrap: wrap !important} .justify-content-end{ justify-content: flex-end !important} .justify-content-center{ justify-content: center !important} .justify-content-between{ justify-content: space-between !important} .align-items-start{ align-items: flex-start !important} .align-items-center{ align-items: center !important} .me-1{ margin-right: .25rem !important} .me-3{ margin-right: 1rem !important} .mb-2{ margin-bottom: .5rem !important} .mb-4{ margin-bottom: 1.5rem !important} .mb-7{ margin-bottom: 12.5rem !important} .ms-2{ margin-left: .5rem !important} .ms-auto{ margin-left: auto !important} .p-2{ padding: .5rem !important} .p-4{ padding: 1.5rem !important} .px-0{ padding-left: 0 !important; padding-right: 0 !important} .px-2{ padding-left: .5rem !important; padding-right: .5rem !important} .py-2{ padding-bottom: .5rem !important; padding-top: .5rem !important} .pt-1{ padding-top: .25rem !important} .pb-5{ padding-bottom: 3rem !important} .pb-6{ padding-bottom: 6.25rem !important} .fw-bold{ font-weight: 500 !important} .text-nowrap{ white-space: nowrap !important} .text-success{ --bs-text-opacity: 1; color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) !important} .text-danger{ --bs-text-opacity: 1; color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important} .text-white{ --bs-text-opacity: 1; color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important} .bg-dark{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important} .bg-white{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important} @media (min-width:768px){ .d-md-inline{ display: inline !important}} @media (min-width:1200px){ .container{ max-width: 1140px} .d-xl-none{ display: none !important}} #website-navbar{ box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15); font-family: Roboto Condensed} #website-navbar .navbar-nav{ align-items: stretch; display: flex; flex-wrap: nowrap; margin-top: 1rem; width: 100%} #website-navbar .navbar-nav .nav-item{ align-items: stretch; flex-grow: 1; justify-content: center; line-height: 1.25rem} #website-navbar .navbar-nav .nav-link{ align-items: center; display: flex; flex-direction: column; font-size: .875rem; justify-content: center; padding: .5rem 1rem; text-align: center; text-transform: uppercase} #website-navbar .navbar-nav .nav-link.active{ background-color: #55524c; text-decoration: none}
    #navbar-left-wrapper{ background-color: #2a2926; box-shadow: 2px 0 1px rgba(0, 0, 0, .12), 1px 0 1px rgba(0, 0, 0, .24); display: none; height: 100%; padding-right: 0; position: fixed; top: 72px; width: 14.375rem; z-index: 9999; z-index: 2} #navbar-left-wrapper #navbar-left-collapse{ display: none} #navbar-left-wrapper~.container{ padding-left: 14.375rem} @media (min-width:992px){ .d-lg-none{ display: none !important} .px-lg-0{ padding-left: 0 !important; padding-right: 0 !important} #website-navbar{ box-shadow: 0 2px 1px rgba(0, 0, 0, .12), 0 1px 1px rgba(0, 0, 0, .24)} #website-navbar .navbar-nav{ margin-top: 0} #website-navbar .navbar-nav .nav-link{ font-size: .8125rem; height: 100%; padding-left: .75rem; padding-right: .75rem} #website-navbar .navbar-brand{ font-size: 1.0625rem; margin-bottom: 0} #navbar-left-wrapper{ display: block}} @media (max-width:991.98px){ #navbar-left-toggler-wrapper{ display: inline-block; top: 4.75rem; width: 54px; z-index: 1 !important} #navbar-left-wrapper #navbar-left-collapse{ display: block} #navbar-left-wrapper~.container{ padding-left: 15px} .w3-animate-left{ -webkit-animation: .4s animateleft; animation: .4s animateleft; position: relative} @-webkit-keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}} @keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}}} #navbar-left{ background-color: #2a2926; box-shadow: 0 1px 0 #030303; color: #fff; position: relative; width: 100%; z-index: 100} #navbar-left li{ margin: 0; padding: 0; width: inherit} #navbar-left>li>a{ background-color: #373632; border-bottom: 1px solid #151413; border-top: 1px solid #45433e; color: #fff; font-size: 13px; font-weight: 300; padding: 12px 20px 12px 18px; text-shadow: 1px 1px 0 #45433e} [data-simplebar]{ align-content: flex-start; align-items: flex-start; flex-direction: column; flex-wrap: wrap; justify-content: flex-start; position: relative} #share-wrapper{ height: 40px; position: absolute; right: 50px; top: 37px; transform: translateY(-50%); z-index: 1050} #share-wrapper ul{ left: calc(-50% + 22.5px); position: relative; width: 90px} #share-wrapper ul li{ width: 45px} #share-wrapper label, #share-wrapper li>a{ border-radius: 50%; color: #efefef; height: 2.5rem; overflow: hidden; text-decoration: none; width: 2.5rem} #share-wrapper label#share{ background: #4267b2; opacity: .75; position: relative; z-index: 14} #share-wrapper li>a#share-facebook{ background: #3b5998} #share-wrapper li>a#share-twitter{ background: #00acee} #share-wrapper li>a#share-pinterest{ background: #e4405f} #share-wrapper li>a#share-linkedin{ background: #0077b5} #share-wrapper li>a#share-reddit{ background: #ff4500} #share-wrapper li>a#share-google-bookmarks{ background: #4285f4} #share-wrapper li>a#share-mix{ background: #ff8226} #share-wrapper li>a#share-pocket{ background: #ee4056} #share-wrapper li>a#share-digg{ background: #2a2a2a} #share-wrapper li>a#share-blogger{ background: #fda352} #share-wrapper li>a#share-tumblr{ background: #35465c} #share-wrapper li>a#share-flipboard{ background: #c00} #share-wrapper li>a#share-hacker-news{ background: #f60} #share-wrapper li:first-child{ opacity: 0; transform: translateY(-30%); z-index: 13} #share-wrapper li:nth-child(2){ opacity: 0; transform: translateY(-30%); z-index: 12} #share-wrapper li:nth-child(3){ opacity: 0; transform: translateY(-30%); z-index: 11} #share-wrapper li:nth-child(4){ opacity: 0; transform: translateY(-30%); z-index: 10} #share-wrapper li:nth-child(5){ opacity: 0; transform: translateY(-30%); z-index: 9} #share-wrapper li:nth-child(6){ opacity: 0; transform: translateY(-30%); z-index: 8} #share-wrapper li:nth-child(7){ opacity: 0; transform: translateY(-30%); z-index: 7} #share-wrapper li:nth-child(8){ opacity: 0; transform: translateY(-30%); z-index: 6} #share-wrapper li:nth-child(9){ opacity: 0; transform: translateY(-30%); z-index: 5} #share-wrapper li:nth-child(10){ opacity: 0; transform: translateY(-30%); z-index: 4} #share-wrapper li:nth-child(11){ opacity: 0; transform: translateY(-30%); z-index: 3} #share-wrapper li:nth-child(12){ opacity: 0; transform: translateY(-30%); z-index: 2} #share-wrapper li:nth-child(13){ opacity: 0; transform: translateY(-30%); z-index: 1} #share-wrapper input~ul{ visibility: hidden} @media only screen and (min-width:992px){ #share-wrapper{ position: fixed; right: 0; top: 180px} #share-wrapper label#share{ right: -42px}} :target{ scroll-margin-top: 100px} html{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; min-height: 100%; position: relative} @media screen and (prefers-reduced-motion:reduce){ html{ overflow-anchor: none; scroll-behavior: auto}} body{ counter-reset: section} h1, h2, h3{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol} h1{ color: #0e73cc; line-height: .9; margin-bottom: 2.5rem} h1:first-letter{ font-size: 2em} h2{ border-bottom: 2px solid #2a2926; color: #2a2926; margin-bottom: 3rem; padding: 1rem} h3{ color: #2a2926} h3{ margin-bottom: 1.5rem} a{ text-decoration: none} strong{ font-weight: 500} section>h3{ white-space: nowrap} section ul:not(.pagination):not(.list-unstyled):not(.tree-list):not(.list-inline):not(.picker__list):not(.select2-selection__rendered)>li{ list-style: none; margin-bottom: .5rem; position: relative} section ul:not(.pagination):not(.list-unstyled):not(.tree-list):not(.list-inline):not(.picker__list):not(.select2-selection__rendered)>li strong{ color: #2a2926} section ul:not(.pagination):not(.list-unstyled):not(.tree-list):not(.list-inline):not(.picker__list):not(.select2-selection__rendered)>li ul:not(.list-unstyled):not(.tree-list)>li:before{ background: #d4d1cc; border-radius: 0; content: " "; display: inline-block; height: 4px; left: -30px; position: absolute; top: .75em; width: 4px} section ul:not(.pagination):not(.list-unstyled):not(.tree-list):not(.list-inline):not(.picker__list):not(.select2-selection__rendered)>li:before{ background: #bfbab2; content: " "; display: inline-block; height: 6px; left: -30px; position: absolute; top: .55em; width: 6px} .btn .icon-circle{ border-radius: 50%; display: inline-block; height: 1.40625rem; line-height: 1.40625rem; width: 1.40625rem} .has-separator{ display: block; margin-bottom: 3rem; position: relative} .has-separator:after, .has-separator:before{ background: #d4d1cc; content: ""; height: 1px; left: 50%; position: absolute} .has-separator:before{ bottom: -1em; margin-left: -6%; width: 12%} .has-separator:after{ bottom: -1.1875em; margin-left: -10%; width: 20%} #search-bar #search-results-count{ left: -5.75rem; line-height: 22.5px; margin-right: -5.75rem; padding: .375rem 0; position: relative; width: calc(5.75rem + 1px); z-index: 3} .bi:before, [class*=" bi-"]:before{ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; display: inline-block; font-family: bootstrap-icons !important; font-style: normal; font-variant: normal; font-weight: 400 !important; line-height: 1; text-transform: none; vertical-align: -.125em} .bi-arrow-down:before{ content: "\f128"} .bi-arrow-up:before{ content: "\f148"} .bi-share-fill:before{ content: "\f52d"} .bi-x:before{ content: "\f62a"} .bi-currency-dollar:before{ content: "\f636"} .bi-x-lg:before{ content: "\f659"} </style>
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
                    <li class="nav-item"><a class="nav-link" href="quick-start-guide.php">Quickstart Guide</a></li>
                    <li class="nav-item"><a class="nav-link" href="../templates/index.php">Form Templates</a></li>
                    <li class="nav-item"><a class="nav-link" href="javascript-plugins.php">JavaScript plugins</a></li>
                    <li class="nav-item"><a class="nav-link" href="code-samples.php">Code Samples</a></li>
                    <li class="nav-item"><a class="nav-link" href="class-doc.php">Class Doc.</a></li>
                    <li class="nav-item"><a class="nav-link" href="functions-reference.php">Functions Reference</a></li>
                    <li class="nav-item"><a class="nav-link active" href="help-center.php">Help Center</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="navbar-left-toggler-wrapper" class="navbar-light fixed-top p-2 d-lg-none d-xl-none">
        <button id="navbar-left-toggler" class="navbar-toggler bg-white"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    </div>

    <div id="navbar-left-wrapper" class="w3-animate-left pb-6" data-simplebar>
        <a href="#" id="navbar-left-collapse" class="d-flex justify-content-end d-lg-none d-xl-none text-white p-4"><i class="bi bi-x-lg"></i></a>
        <ul id="navbar-left" class="nav nav-pills flex-column pt-1 mb-4">
            <li class="nav-item"><a class="nav-link" href="#contact">Contact us</a></li>
            <li class="nav-item"><a class="nav-link" href="#licensing-system">The licensing system</a></li>
            <li class="nav-item"><a class="nav-link" href="#installation-error">Installation error</a></li>
            <li class="nav-item"><a class="nav-link" href="#cant-connect-to-licensing-server">Can't connect to licensing server</a></li>
            <li class="nav-item"><a class="nav-link" href="#your-copy-of-php-form-builder-is-not-authorized">Your copy ... is NOT authorized</a></li>
            <li class="nav-item"><a class="nav-link" href="#reinstall-phpfb">Reinstall PHP Form Builder</a></li>
            <li class="nav-item"><a class="nav-link" href="#white-page">White page / Error 500</a></li>
            <li class="nav-item"><a class="nav-link" href="#warning-include_once">Installation in a subfolder - Warning: include_once(...)</a></li>
            <li class="nav-item"><a class="nav-link" href="#fatal-error">Fatal error: Class 'phpformbuilder\Form' not found</a></li>
            <li class="nav-item"><a class="nav-link" href="#mb-string">Fatal error: Call to undefined function phpformbuilder\mb_strtolower()</a></li>
            <li class="nav-item"><a class="nav-link" href="#plugins-don-t-work">Plugins don't work</a></li>
            <li class="nav-item"><a class="nav-link" href="#i-do-not-receive-the-emails-sent">I do not receive the emails sent</a></li>
            <li class="nav-item"><a class="nav-link" href="#css-issues">CSS issues</a></li>
            <li class="nav-item"><a class="nav-link" href="#can-t-submit-form">Can't Submit form (using jQuery validation plugin)</a></li>
            <li class="nav-item"><a class="nav-link" href="#php-session-settings-error">PHP SESSION settings error</a></li>
            <li class="nav-item"><a class="nav-link" href="#migration">Migration</a></li>
            <li class="nav-item"><a class="nav-link" href="#changelog">Changelog</a></li>
        </ul>
    </div>
    <main class="container">

        <?php include_once 'inc/top-section.php'; ?>

        <h1 id="home">Help, Troubleshooting &amp; Common issues</h1>
        <section id="contact" class="pb-5 mb-7 has-separator">
            <h2 class="mt-lg">For any question or request</h2>
            <h3 id="ask-for-help">Read This First</h3>
            <ul>
                <li>The answer to your problem may be found here or in the documentation.<br>Please take the time to look for it before contacting us.</li>
                <li>
                    <p><strong>To help you, we need to understand and be able to reproduce your problem</strong>.<br>PHP Form Builder doesn't have any known bugs so far. The difficulties you may encounter are primarily due to your server's configuration or other parameters related to your project.</p>
                    <p><strong>That's why it is essential to provide us with all the information we may need:</strong></p>
                    <ul class="mb-4">
                        <li>FTP access</li>
                        <li>URL of the form</li>
                        <li>Login and passwords if required</li>
                        <li>Access to the server administration if needed (cPanel) </li>
                    </ul>
                    <p class="text-success fw-bold">So please <a href="https://www.miglisoft.com/#contact">get in touch with us</a> and send us the necessary information. We will do our best to help you quickly and efficiently.</p>
                    <p class="text-danger fw-bold">If you refuse for any reason to give us the required information, we may not be able to help you effectively. In this case, no refund request will be accepted, except in specific situations.</p>
                </li>
                <li>
                    <p>If your problem isn't solved:</p>
                    <ul>
                        <li>Contact us through <a href="https://codecanyon.net/item/php-form-builder/8790160/comments">PHP Form Builder's comments on Codecanyon</a>.</li>
                        <li>Email us at <a href="https://www.miglisoft.com/#contact">https://www.miglisoft.com/#contact</a>.</li>
                        <li>Chat on <a href="https://www.phpformbuilder.pro">www.phpformbuilder.pro</a>.</li>
                    </ul>
                </li>
            </ul>
        </section>

        <section id="licensing-system" class="pb-5 mb-7 has-separator">
            <h2 class="mt-lg">The licensing system</h2>
            <h3>Here's how the licensing system works:</h3>

            <p><strong>1 license = 1 domain + any subdomain</strong></p>

            <h4>Registration:</h4>
            <ul>
                <li>
                    <h5>on production server</h5>
                    <ul>
                        <li>You have to open phpformbuilder/register.php in your browser on your main domain URL and enter your email & purchase code.</li>
                    </ul>
                </li>
                <li>
                    <h5>on localhost</h5>
                    <ul>
                        <li>Open phpformbuilder/register.php in your browser and enter your email & purchase code.</li>
                        <li>The licensing system does not allow URLs with different IP addresses.</li>
                        <li>Different IPs are not a problem, but the access URL must be unique.</li>
                        <li>virtualhost & alias allow you to access your project with a unique URL.</li>
                    </ul>
                </li>
            </ul>

            <p>When you register:</p>
            <ul>
                <li>PHPFB sends a request to register your copy on the licensing server</li>
                <li>It writes the registration data in <span class="file-path">phpformbuilder/<em class="text-secondary">[your-domain]</em>/license.php</span></li>
            </ul>

            <p>You have to register both on your localhost & production server.</p>
            <p class="alert alert-info has-icon">The <span class="file-path">license.php</span> content depends on your registration URL, & you must not overwrite your production <span class="file-path">license.php</span> with the localhost one.</p>

            <h4>License check system</h4>

            <p>PHP Form Builder is checking your registration in two different ways:</p>
            <ul>
                <li>
                    <p>It makes a primary verification each time you load a form, using your <span class="file-path">license.php</span></p>
                    <p>This one generates the ugly danger message if something's wrong.</p>
                </li>
                <li>
                    <p>The real strong verification is done once a week or month on the licensing server</p>
                    <p>If you pass the verification one time, i.e., post your form successfully, you can be 100% sure that all is ok.</p>
                </li>
            </ul>

            <p>Both will accept any subdomain, but you can't use different domain names extensions.</p>
            <p>You have to buy a license for domain.xxx & another one for domain.yyy<br>& register both with their purchase number.</p>
            <p>You can then use any subdomain on both.</p>
        </section>

        <section class="pb-7">
            <article class="pb-5 mb-7 has-separator">
                <h2 id="installation-error">Installation error</h2>
                <p>If you see the message "<em>An error occurred during the registration process.</em>", or any PHP error, or white page:</p>
                <p>You have to <a href="https://www.google.com/search?q=enable+php+curl" target="_blank" title="How to enable the PHP CURL extension">enable the PHP CURL extension</a>.</p>
                <p>Restart your PHP server. Then the installer will work.</p>
            </article>
        </section>
        <section class="pb-7">
            <article class="pb-5 mb-7 has-separator">
                <h2 id="cant-connect-to-licensing-server">Can't connect to licensing server</h2>
                <p>You entered your purchase code with a trailing space.</p>
            </article>
        </section>

        <section class="pb-7">
            <article class="pb-5 mb-7 has-separator">
                <h2 id="your-copy-of-php-form-builder-is-not-authorized">Your copy of PHP Form Builder is NOT authorized</h2>
                <p>This error occurs if you registered your license with a different URL (HTTP/HTTPS; www or without www) than the one you use to access your page.</p>
                <p>The solution is to always use the same URL, for instance, <code class="language-php">https://www.your-domain.com</code>. Regardless of PHP Form Builder, it is a good practice to adopt. It will also improve your SEO.</p>
            </article>
        </section>

        <section class="pb-7">
            <article class="pb-5 mb-7 has-separator">
                <h2 id="reinstall-phpfb">Reinstall PHP Form Builder</h2>
                <p>A Regular license allows two installations - one for your localhost &amp; the other for your production server.</p>
                <p>If you want to change the installation URL (domain, folder, ...), you have first to uninstall PHP Form Builder from your initial URL. Then reinstall it on the new one.</p>
                <p><strong>To uninstall PHP Form Builder</strong>:</p>
                <ol class="numbered">
                    <li>Open your registration URL - <span class="file-path">phpformbuilder/register.php</span><br>You should see a message saying that <em>Your PHP Form Builder copy is already registered on this domain</em>.</li>
                    <li>Enter your purchase code & click the <em>Unregister</em> button</li>
                    <li>You can register again on a different domain/URL.</li>
                </ol>
                <p>If for any reason you can't unregister your copy &amp; want to reinstall it, please <a href="https://www.miglisoft.com/#contact">get in touch with me</a>,<br>send me your purchase code &amp; <strong>delete <span class="file-path">phpformbuilder/<em class="text-secondary">[your-domain]</em>/license.php</span> from your server</strong>.<br>I'll remove your installation license from the server then you'll be able to reinstall it elsewhere.</p>
            </article>
        </section>
        <section class="pb-7">
            <article class="pb-5 mb-7 has-separator">
                <h2 id="white-page">White page / Error 500</h2>
                <p>If your page is white or returns "HTTP ERROR 500", <strong>you have a PHP error</strong>.</p>
                <p>To display the error message, you have to enable PHP display errors.</p>
                <ol class="numbered">
                    <li>
                        <strong>Add the following code just after use statements</strong> :<br>
                        <pre class="line-numbers"><code class="language-php">&lt;?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

// add the line below to your code :
ini_set(&#039;display_errors&#039;, 1);</code></pre>
                    </li>
                    <li><strong>Refresh your page</strong>. Then you'll see what error is thrown and probably find solutions in other parts of this document.<br>Once you have solved your problem, <strong>remove the ini_set()</strong> line if you don't want errors to be displayed anymore.</li>
                </ol>
                <p>If the <strong>ini_set()</strong> function does not work on your server, you have to turn display_errors On in your <span class="file-path">php.ini</span></p>
            </article>
        </section>
        <section class="pb-7">
            <h2 id="warning-include_once">Installation in a subfolder - Warning: include_once(...):</h2>
            <article class="pb-5 mb-7 has-separator">
                <p>If you installed PHP Form Builder in a subfolder make a global search / replace from your IDE to change all the includes at once:</p>
                <pre class="line-numbers mb-5"><code class="language-php">&lt;?php
// Search this:
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

// Replace with this:
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/your-dir/phpformbuilder/autoload.php';</code></pre>
                <h3>Explanation</h3>
                <p>PHP Form Builder requires a single file, which is always called using <strong>PHP include_once() function</strong> :</p>
                <pre class="line-numbers"><code class="language-php">&lt;?php
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';</code></pre>
                <p>If the path to file inside parenthesis is wrong <span class="file-path">Form.php</span> is not found.</p>
                <p><strong>You've got to set the right path leading to your <span class="file-path">phpformbuilder</span> directory</strong>.</p>
                <p class="fw-bold">To solve the problem:</p>
                <ul>
                    <li>Change the path of the include to point to the correct folder:<br>
                        <pre class="line-numbers"><code class="language-php">&lt;?php
// replace "your-dir" with yours in the following line
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/your-dir/phpformbuilder/autoload.php';</code></pre>
                    </li>
                </ul>
                <p class="fw-bold">OR</p>
                <ul>
                    <li>Open <a href="../phpformbuilder/server.php"><span class="file-path">../phpformbuilder/server.php</span></a> in your browser and follow the instructions.</li>
                </ul>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="fatal-error">Fatal error: Class 'phpformbuilder\Form' not found</h2>
                <p>See <a href="#warning-include_once">Warning: include_once([...])</a> (same error, same solution)</p>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="mb-string">Fatal error: Call to undefined function phpformbuilder\mb_strtolower()</h2>
                <p>PHP Form Builder uses the PHP <span class="var-valur">mb_string</span> extension to send emails with the correct encoding.</p>
                <p>PHP mb_string extension allows working with a multi-byte encoding (UTF-8, ...).</p>
                <p>PHP mb_string extension is not a default PHP extension but is enabled on most servers.</p>
                <p>If it's not enabled on yours, you've got two solutions:</p>
                <ol class="numbered">
                    <li class="mb-5"><strong>(Best solution)</strong> Install/Enable PHP <span class="var-value">mb_string</span>.<br>Depending on your server and system, many explanations are available on the web to know how to proceed.</li>
                    <li>
                        <ol>
                            <li>Open <span class="file-path">phpformbuilder/Form.php</span> and replace all occurrences of <span class="var-value">mb_strtolower</span> with <span class="var-value">strtolower</span>.</li>
                            <li>If your PHP Form Builder version is <= 3.5.2, replace <pre><code class="language-php">$charset = mb_detect_encoding($mergedHtml);</code></pre> with:
                                    <pre><code class="language-php">charset = 'iso-8859-1';
if (function_exists('mb_detect_encoding')) {
    $charset = mb_detect_encoding($mergedHtml);
}</code></pre>You'll find your version number in the comments at the beginning of phpformbuilder/Form.php</li>
                            <li><strong>Warning:</strong> You may experiment with encoding issues with multi-byte encoded characters (accents, special characters) when sending emails.</li>
                        </ol>
                    </li>
                </ol>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="plugins-don-t-work">Plugins don't work</h2>
                <ol class="numbered">
                    <li>
                        <p>Open your browser's console (<a href="https://webmasters.stackexchange.com/questions/8525/how-to-open-the-javascript-console-in-different-browsers">instructions here</a>)</p>
                        <p><strong>You have to solve all errors you see in the console</strong>. Errors probably come from your page content, not from phpformbuilder itself.</p>
                        <p>Be sure you include at first jQuery, <strong>THEN</strong> Bootstrap js, <strong>THEN</strong> phpformbuilder plugins code :</p>
                        <pre class="line-numbers"><code class="language-php">&lt;!-- jQuery --&gt;
&lt;script src=&quot;//code.jquery.com/jquery.js&quot;&gt;&lt;/script&gt;
&lt;!-- Bootstrap JavaScript --&gt;
&lt;script src=&quot;//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js&quot;&gt;&lt;/script&gt;
&lt;?php
    $form-&gt;printIncludes(&#039;js&#039;);
    $form-&gt;printJsCode();
?&gt;</code></pre>
                        <p>&nbsp;</p>
                    </li>
                    <li>
                        <p><strong>PHP Form Builder is optimized for fast loading.</strong></p>
                        <p>It means that all the required plugins files (CSS &amp; JavaScript) are <strong>automatically minified &amp; concacenated</strong>.</p>
                        <p>When you make changes to the form these files are automatically regenerated.</p>
                        <p>The minified/concatendated files are located in <code class="language-php">phpformbuilder/plugins/min/[css|js]</code></p>
                        <p><strong>You can always safely remove the css &amp; js files located in these 2 folders</strong>.<br>They'll be regenerated and refreshed. This can in some cases solve cache issues.</p>
                        <p><strong>When you're in development, you can call the unminified unconcatenated files this way:</strong></p>
                        <pre class="line-numbers"><code class="language-php">// This will load the unminified unconcatenated files
$form->setMode('development');</code></pre>
                    </li>
                    <li id="set-plugins-url">
                        <p>In a few cases, your server may not be correctly configured. The consequence is that the plugins URLs are wrong.</p>
                        <p>Solution is to set the URL to plugins directory manually:</p>
                        <pre class="line-numbers"><code class="language-php">// Set URL to match your plugins directory
$form->setPluginsUrl('https://phpformbuilder/plugins/');</code></pre>
                    </li>
                </ol>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="i-do-not-receive-the-emails-sent">I do not receive the emails sent</h2>
                <ol class="numbered">
                    <li>Check that the <strong>sender_email</strong> address is from your domain (<strong>anything@your-domain.com</strong>).<br>You must always use an email address from your domain as the sender when you send emails.<br>Otherwise, you will not pass the spam filters, which will assume that you have usurped an identity.<br><br>You can add a <strong>reply_to_email</strong> option to set to whom the reply will be sent.</li>
                    <li>Edit phpformbuilder/mailer/email-sending-test.php:<br>Replace the sender email address L.16 with an email address from your domain.<br>Open the file in your browser and fill in the form to send an email.<br>If you still don't receive the message, contact your hosting provider and ask him to enable the PHP <strong>mail()</strong> function.</li>
                </ol>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="css-issues">CSS issues</h2>
                <p>Included templates use a <strong>custom version of Bootstrap's css</strong>. You'll find it in <code>phpformbuilder/templates/assets/stylesheets/bootstrap.min.css</code>.</p>
                <p>Set the correct path from your form to this css :</p>
                <pre class="line-numbers"><code class="language-php">&lt;!-- Bootstrap CSS - Change path with your own --&gt;
&lt;link href=&quot;assets/assets/css/bootstrap.min.css&quot; rel=&quot;stylesheet&quot;&gt;</code></pre>
                <p>... Or replace with Bootstrap CDN :</p>
                <pre class="line-numbers"><code class="language-php">&lt;!-- Bootstrap CSS CDN --&gt;
&lt;link href=&quot;//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css&quot; rel=&quot;stylesheet&quot;&gt;</code></pre>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="can-t-submit-form">Can't Submit form (using jQuery validation plugin)</h2>
                <p>jQuery validation plugin is complex and can have unexpected behaviors if it encounters configuration issues or malformed HTML.</p>
                <p>To solve this : </p>
                <ol class="numbered">
                    <li>Don't use any input, button, or other form element named "submit". It's not compatible with jQuery validation (reserved name).</li>
                    <li>Validate your code <a href="https://validator.w3.org/">W3C validator</a></li>
                    <li>Open your browser's console (F12) and look for errors.</li>
                    <li>Open <span class="file-path">phpformbuilder/plugins-config/formvalidation.xml</span> and use <code class="language-php">console.log</code> (un-comment) to find out what's going on.</li>
                </ol>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="php-session-settings-error">PHP SESSION settings error</h2>
                <p><em>You have an error in your PHP SESSION settings</em>.</p>
                <p>If you see this message when you post a form, the PHP SESSION variables could not be registered due to some wrong settings on your server.</p>
                <ul>
                    <li>If <var>session.cookie_secure</var> is enabled in your php.ini and your URL is <em>HTTP</em> instead of <em>HTTPS</em>, the session cookies can't be sent. You must turn off <var>session.cookie_secure</var> in your php.ini or enable HTTPS.</li>
                    <li>If you have a <var>Set-Cookie</var> directive in a .htaccess with the <em>Secure</em> value and your URL is <em>HTTP</em> instead of <em>HTTPS</em>, the session cookies can't be sent. You must disable this directive or enable HTTPS.</li>
                    <li>Some other session settings may have to be reviewed in your php.ini or .htaccess, for instance, <var>session.cookie_domain</var>, <var>session.cookie_httponly</var>.</li>
                </ul>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="migration">Migration</h2>
                <h3>Migration from version 5.x to v6</h3>
                <p>PHP Form Builder 6 is a major update. Here's how to update your code to upgrade to the version 6:</p>
                <ol class="numbered">
                    <li>
                        <p>The PHP Form Builder now uses an autoloader. Include the autoloader instead of including individual files:</p>
                        <pre class="mb-4"><code class="language-php">// old code:
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/Form.php';

// replace with:
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';</code></pre>
                    </li>
                    <li>
                        <p>Remove all the references to the fileuploader includes in your code. The fileuploader is now included in the autoload:</p>
                        <pre class="mb-4"><code class="language-php">// remove all the references to the fileuploader includes in your code:
include_once $root . '/phpformbuilder/plugins/fileuploader/server/class.fileuploader.php';</code></pre>
                    </li>
                    <li>The DB class has been replaced by PowerLite PDO. Please refer to the <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#database-overview">Database documentation</a> for more information.</li>
                    <li>The <code class="language-php">Form::render()</code> method now always echoes its output and has only one argument instead of two.<br>A new <code class="language-php">Form::getCode()</code> method is available to return the form code with or without debugging enabled.
                        <pre class="mb-4"><code class="language-php">// old code:
$form->render(bool $debug = false, bool $display = true);

// replaced by:
$form->render(bool $debug = false);
$form->getCode(bool $debug = false);

/* Examples of use */

// render the form on the page without debugging
$form->render();

// render the form on the page with debugging (render the code inside a &lt;pre&gt;&lt;/pre&gt; tag)
$form->render(true);

// return the code without rendering it on the page
$form->getCode();

// return the code with debugging (return the code inside a &lt;pre&gt;&lt;/pre&gt; tag)
$form->getCode(true);</code></pre>
                    </li>
                </ol>
            </article>
            <article class="pb-5 mb-7 has-separator">
                <h2 id="changelog">Changelog (V4 and earlier versions)</h2>
                <p><strong class="text-danger">This changelog only includes the changes for version 4 and earlier versions.</strong></p>
                <p>The latest changelog is available <a href="https://www.phpformbuilder.pro/#changelog">here on the home page</a>.</p>
                <p class="h4 mb-1">version 4.5.7 (06/2021)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add a "readonly" option to the inputs in the drag & drop form builder
Improvements:
    - improve the dropzone sizing  in the drag & drop form builder
Bug Fix:
    - popup close not working in the drag & drop form builder when clicking "no".
</code></pre>
                <p class="h4 mb-1">version 4.5.6 (05/2021)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add a new Bootstrap Input Spinner plugin ('+' and '-' buttons for number inputs)
Improvements:
    - add $mail->Sender in Form.php for PHPMailer to improve email deliverability
    - edit the Fileuploader PHP image upload script to crop the images AFTER resizing
      (the original behavior that center-crops the original image is still available in the file code comments)
    - edit phpformbuilder/plugins-config/formvalidation.xml to accept empty tel numbers if they're not required
    - add a new 'no-auto-submit' attribute to the JavaScript validator plugin to allow to prevent the form submission after validation
      (this allows to write custom Ajax requests, which is helpful in some cases like step forms)
    - increase the height of the drop area in the drag & drop form generator
Bug Fix:
    - validator now validates integers with leading zeros (PHP::Bug #43372)
    - fix JavaScript validation with the file uploader plugin on required fields
    - remove PHP warning with Form::clear() combined with dependent fields
    - fix accidentally removed classes with Material Design textareas
    - repair the Passfield plugin Bootstrap popover - was broken by the latest Bootstrap versions
    - fix error in Material Datepicker months (error coming from the original plugin)
</code></pre>
                <p class="h4 mb-1">version 4.5.5 (12/2020)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add the "disabled" attribute in the Drag & Drop Form Builder for individual checkbox/radio buttons
Improvements:
    - sanitize directory separator in class/Form.php to avoid wrong plugins URL detection on server with inconsistent $_SERVER['SCRIPT_NAME'] and $_SERVER['SCRIPT_FILENAME'] values
    - update the Passfield plugin to the latest version, edit the plugin js file to solve a console error (& send a PULL request on Github)
Bug Fix:
    - fix file uploader plugin with editor set to false behavior
</code></pre>
                <p class="h4 mb-1">version 4.5.4 (11/2020)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add a new template with several Ajax forms loaded on the same HTML page
Improvements:
    - change the Ajax loader JavaScript to be able to load multiple Ajax forms on the same page easily
    - update the formValidation plugin to the latest 1.7 version
    - update the formValidation XML code to be able to load multiple Ajax forms
    - update the PHPMailer to the latest 6.1.8 version
Bug Fix:
    - no known bug at this time!
</code></pre>
                <p class="h4 mb-1">version 4.5.3 (10/2020)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add a new template with Dependent select dropdown loaded with Ajax depending on parent select value
Improvements:
    - add data-format-submit to material date/time pickers
    - auto-sanitize filenames with the Fileuploader plugin
Bug Fix:
    - sanitize email sent_message in the drag & drop form builder
    - replace the material timepicker deprecated "onClose" event with "onCloseEnd"
    - fix date value with date pickers when a form is posted with errors
    - fix deprecated curly braces in phpformbuilder/mailer/phpmailer/htmlfilter.php
</code></pre>
                <p class="h4 mb-1">version 4.5.2 (07/2020)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
    - auto-enable the Form validation plugin to the drag and drop default form
    - make the Form validation plugin translations available in the drag and drop form main settings
    - add an alert message when the form contains a submit button named "submit" with the Formvalidation plugin.
      ("submit" is a reserved name for the Formvalidation plugin)
    - add an alert message when the form contains a hidden field with the required attribute with the Formvalidation plugin.
      (the Formvalidation plugin doesn't allow this)
    - upgrade Material date / time pickers + i18n
    - add litepicker plugin custom css
Bug Fix:
    - properly escape the drag and drop form labels, placeholders, icons, and attributes (2nd attempt ...)
    - lc_switch labels now will toggle the switch as intended (the bug comes from the LC_switch plugin itself, PHP Form Builder will now compensate it)
    - fix JavaScript error with non-required checkboxes + icheck plugin + Formvalidation plugin
    - update links to the drag-and-drop from .php to .html
</code></pre>
                <p class="h4 mb-1">version 4.5.1 (06/2020)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add the formvalidation plugin to the drag & drop builder
Improvements:
    - fix PHP 7.4 warnings
    - add optional SMTP settings in the email test/debug file
Bug Fix:
    - fix drag and drop iframe preview in Firefox + Edge browsers
    - properly escape the drag and drop form labels, placeholders, icons, and attributes
    - fix the selectpicker problem when used on several fields
    - fix file uploads with the same file name issue. The uploaded files are now renamed with a suffix if they already exist.
    - fix material base js for bs4 forms with material pickers
</code></pre>

                <p class="h4 mb-1">version 4.5 (05/2020)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add a new "signature pad" plugin for electronic signatures (handwritten signatures in forms)
    - add a new "litepicker" plugin (date/date range picker)
    - add a new "date range picker" form in templates
    - add a new "license agreement" form in templates
    - update the "car rental form" template with the new date range picker plugin
    - add "isHTML" + "textBody" options in sendMail() function
    Drag and Drop form Builder:
        - Choice of field widths (33%, 50%, 66%, 100%)
        - possibility to group 2 fields on the same line (horizontal forms)
        - choice of the icon library used and the possibility to add and position icons on the input and button elements
        - load / save the JSON forms on the server as well as on disk
        - drag and drop files from the "save on server" file browser
        - save the JSON forms on the server in subfolders
        - add JSON forms templates in the JSON forms folder
Improvements:
    - accessibility: add aria-label automatically for all fields that have a placeholder and no label text
    - move the Bootstrap 4 error messages below the helper texts when inputs have addons (icons, ...)
    - the drag and drop form builder will now throw an alert if the user leaves the page without having saved the changes
    - disable browser autocompletion automatically for the date, date range, and time pickers
    - change the website search for a far better one
    - change the website chat widget
Bug Fix:
    - fix redirection after success in the drag and drop form builder
    - fix a drag-and-drop form builder error in JSON with the intlTelInput plugin
    - fix checkbox states memorization in the drag and drop form builder
    - fix customer-satisfaction-step-form behavior on window resizing
    - fix missing quotes in JSON files for checkboxes in the drag and drop tool
    - fix material-base.min.js JS console error
</code></pre>
                <p class="h4 mb-1">version 4.4 (03/2020)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - New Drag &amp; Drop Form Builder
Improvements:
    - auto-scroll to the 1st error when PHP validation failed after POST
    - upgrade the Bootstrap Select plugin to its latest version
Bug Fix:
    - fix undefined location.ancestorOrigins in Firefox
</code></pre>
                <p class="h4 mb-1">version 4.3.1 (12/2019)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
Bug Fix:
    - fix new Recaptcha v3 async. loading issue
</code></pre>
                <p class="h4 mb-1">version 4.3 (09/2019)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
    - update the licensing system to allow registration on domain aliases
      IMPORTANT: if you upgrade from a previous version, you must first unregister your license.
                 Then upload the new package and register again.
</code></pre>
                <p class="h4 mb-1">version 4.2.5 (02/2019)</p>
                <pre class="mb-5"><code class="language-php">
Bug Fix:
    - fix Material pickers javascript errors
</code></pre>

                <p class="h4 mb-1">version 4.2.4 (06/2019)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
    - add security checks on file removal with the fileuploader plugin
    - group security checks in a single readable file for the fileuploader plugin
</code></pre>

                <p class="h4 mb-1">version 4.2.3 (06/2019)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add dependent field example in switches-form.php templates
Improvements:
    - Dependent fields now play nice with LCSwitch
Bug Fix:
    - fix buggy LCSwitch events with Bootstrap 3
</code></pre>

                <p class="h4 mb-1">version 4.2.2 (05/2019)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
    - add Visual Studio Code extension - https://marketplace.visualstudio.com/items?itemName=Miglisoft.phpformbuilder
    - add Recaptcha V3 - https://www.phpformbuilder.pro/documentation/javascript-plugins.php#Recaptchav3-example
    - new "POST with Ajax" template available - https://www.phpformbuilder.pro/templates/bootstrap-4-forms/post-with-ajax-form.php
Improvements:
    - update the fileuploader plugin to latest V2.2
    - rebuild the phpformbuilder.pro website custom search engine
    - Dependent fields selectors now accept any fieldnames & loop indexes
    - update templates with latest Bootstrap 4 / jQuery / font awesome
    - replace invisible Recaptcha with Recaptcha V3 in templates
    - update Sublime Text plugin
Bug Fix:
    - label sizing for Bootstrap 4
    - main radio & checkbox label horizontal alignment with latest Bootstrap 4.3.1
</code></pre>

                <p class="h4 mb-1">version 4.2.1 (04/2019)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
- add (very) strong protection for fileuploader plugin uploads
- live validator now auto-revalidate fields with Select2 & iCheck plugins on change event
Bug Fix:
    - update the pickadate plugin to its latest (the previous version was buggy with Chrome's latest update)
    - fix pickadate timepicker use with translation
</code></pre>

                <p class="h4 mb-1">version 4.2 (03/2019)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- new function useLoadJs (https://github.com/muicss/loadjs):
  $form->useLoadJs($bundle = '');
  see https://www.phpformbuilder.pro/documentation/javascript-plugins.php#optimization-with-loadjs

Improvements:
- Prevent form submission while a file upload is in progress
- Misc minor improvements & code optimization
</code></pre>

                <p class="h4 mb-1">version 4.1 (03/2019)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add Tag Editor plugin for Ajax Search with Sortable Tags results
- add some new search forms in templates with Ajax search & tags
- add Ajax search in JavaScript plugins documentation
</code></pre>

                <p class="h4 mb-1">version 4.0.1 (02/2019)</p>
                <pre class="mb-5"><code class="language-php">
Bug Fix:
    - upgrade PHPMailer to the latest 6.0.6 to fix PHP 7.3 warnings
</code></pre>

                <p class="h4 mb-1">version 4.0 (Major release - 12/2018)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- new Material forms - use with Bootstrap 4 OR materialize framework as standalone
  more information: https://www.phpformbuilder.pro/documentation/class-doc.php#frameworks
- new material-datepicker plugin for Material forms + Bootstrap 4 forms
- add Select2 Material theme
- new setMode function
  development mode loads the original plugin CSS & JavaScript dependencies
  production mode (default) compile & compress all the plugins CSS & JavaScript dependencies
- new adAddon function to add button & text addons to input & select dropdowns
- add templates with addons examples: phpformbuilder/templates/[framework]/input-with-addons.php
- update JavaScript Form Validation plugin to the latest - now compatible with Foundation
- add JavaScript Form Validation icons
- add JavaScript Form Validation DEBUG mode
- update the Bootstrap Select plugin to the latest version - now compatible with Bootstrap 4
Improvements:
- rewrite all the plugins configuration
  now, most plugins accept HTML5 data-attributes for easy configuration
- rewrite all website, documentation & code examples for Bootstrap 4
- change the website structure
  now all the plugins have a dedicated page with code & examples
- remove the SMTP option from the sendMail function
    now SMTP is automatically enabled when $smtp_settings are filled.
- improve Ajax scripts loading (avoid browser console warning about deprecated Synchronous XMLHttpRequest on the main thread)
Bug Fix:
- solve plugins' URL detection with paths containing uppercase letters
- update Emogrifier to the latest version 2.0 (inline email css)
- edit phpformbuilder/mailer/phpmailer/extras/htmlfilter.php to remove the php7 warning
- now, Ladda buttons have correct settings when using different Ladda configurations simultaneously
Misc.:
- the default framework is now Bootstrap 4 (it was previously Bootstrap 3)
- remove the old Material Design forms based on Bootstrap 3 + old version of Materialize
- remove the old ugly jQuery-UI datepicker
- remove the "pickadate material" config
- remove deprecated templates which used the deprecated jQuery File Upload plugin
- remove deprecated jQuery File Upload plugin
</code></pre>

                <p class="h4 mb-1">version 3.6.2 (08/2018)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
- update server-side validation functions to accept empty values,
    except for the validators whose internal logic make values required.
    Details are available here: https://www.phpformbuilder.pro/documentation/class-doc.php#php-validation-methods
Bug Fix:
- fix licensing system timeshift issue
- fix the invalid feedback message with iCheck + bs4
- fix Ladda plugin behavior with grouped buttons
</code></pre>

                <p class="h4 mb-1">version 3.6.1 (07/2018)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
- improve HTML parsing
- disable onload live validation
- improve dynamic fields template 2 behavior
- improve dependent fields selectors parsing with regex
Bug Fix:
- fix centered button groups with the Foundation grid
</code></pre>

                <p class="h4 mb-1">version 3.6 (06/2018)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add required registration
- add the LC-Switch plugin
Improvements:
- update documentation
- update PHPMailer to the latest (6.0.5) - (wrong version numbers in src files, same issue in PHPMailer GitHub)
</code></pre>

                <p class="h4 mb-1">version 3.5.2 (05/2018)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
- Add support for PHP without mbstring extension
Bug Fix:
- Recaptcha server-side validation errors now display correctly with bs4 (they were hidden by bs4's display:none css)
- fix server-side Recaptcha validation (which always returned true before)
- fix server-side validation errors markup inside input groups
</code></pre>

                <p class="h4 mb-1">version 3.5.1 (04/2018)</p>
                <pre class="mb-5"><code class="language-php">
Bug Fix:
- fix live validation issue with invisible Recaptcha
</code></pre>

                <p class="h4 mb-1">version 3.5 (04/2018)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- switch Foundation forms to Foundation 6.4+
  older versions are still available as 'foundation-float-grid' framework
  doc: /documentation/class-doc.php#frameworks
- add the Invisible Recaptcha plugin
  replace all Recaptcha v2 in templates with invisible Recaptcha except with ajax forms & multiple modals
- add a new "deferScripts" option to defer the loading of the plugins' scripts
  default value: true
Improvements:
- all scripts are now loaded with defer
- add code to reload uploaded files if forms are sent with errors in fileupload templates
Bug Fix:
- fix plugins loading with ajax and forms reloaded with errors
</code></pre>

                <p class="h4 mb-1">version 3.4 (04/2018)</p>
                <p><span class="fw-bold">IMPORTANT</span></p>
                <p>This release includes a new <strong>fileuploader plugin</strong> with excellent new features.</p>
                <p><span class="fw-bold">The old fileupload plugin is now deprecated and will be removed in the next incoming version.</span></p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add a new awesome fileuploader plugin including image crop/resize tools
Improvements:
- switched Bootstrap 4.0.0-beta.3 to 4.1
- improve plugins code if several forms are using the same selectors & same plugins
- Add Bootstrap 4 Form Validation (live Javascript) i18n support in phpformbuilder/plugins-config/formvalidation.xml
- Rewrite step forms code
Bug Fix:
- fix PHP 7.2 warning with email sending - Parameter must be an array or an object that implements Countable
- Formvalidation now works fine with intl-tel-input and i18n (custom languages)
- Email sending will no more fail with an empty css file template
</code></pre>

                <p class="h4 mb-1">version 3.3 (12/2017)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
-   add ajax option (easy Ajax loading to load the forms in any HTML file)
    It plays well with any CMS (WordPress, Joomla, Drupal, ...)
-   add Documentation and screencast to use with CMS
-   add Image Picker plugin
-   add Image Picker Templates
Improvements:
-   upgrade PHP Mailer to the latest version
-   auto-filter token and submit buttons from email contents
Bug Fix:
- several minor fixes
</code></pre>

                <p class="h4 mb-1">version 3.2 (12/2017)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
-   add Bootstrap 4 support
-   add 40 Bootstrap 4 Templates
-   add the Select2 plugin - https://select2.github.io/
-   add the Ladda plugin - https://github.com/hakimel/Ladda
-   add the intl tel input plugin - https://github.com/jackocnr/intl-tel-input coupled with formvalidation
-   add the centerButtons(boolean) function
-   add some new options:
        buttonWrapper                   (element)
        centeredButtonWrapper           (element)
        centerButtons                   (boolean)
        verticalCheckboxLabelClass      (classname)
        verticalRadioLabelClass         (classname)
Improvements:
-   upgrade all plugins to the latest version
-   upgrade PHPMailer to latest 6.0 (required PHP 5.5+)
-   improve documentation
-   improve the use of several Recaptcha on the same page
-   reopen the modal if the form has been posted with a Recaptcha error
-   validate all generated code with Bootlint & W3C
    note: some of the included plugins (Bootstrap select, iCheck, jQuery file upload) generate Bootlint non-valid HTML
-   add Russian and Ukrainian languages to the server Validator (thanks to Ramstud)
-   update dynamic fields form 1 template with required dynamic fields and server + live validation
Bug Fix:
- PHP warning with button group + label
- PHP warning with inline forms
</code></pre>

                <p class="h4 mb-1">version 3.1 (07/2017)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add $combine_and_compress argument to printIncludes() function to combine and minify all plugin dependencies (css & js files)
  (default: true) - details at https://www.phpformbuilder.pro/documentation/class-doc.php#printIncludes
- add Foundation framework options and templates
- add the Nice Check plugin to style Radio buttons and Checkboxes
- add templates theme switcher for Bootstrap & Material forms
Improvements:
- auto combine and minify all plugin dependencies (css & js files)
- make Recaptcha fully responsive
- allow to wrap radiobuttons with addInputWrapper function
- switched setPluginsUrl() function to public and add "$forced_url = ''" optional argument to allow manual plugins URL configuration if user's server is misconfigured.
- escaped commas are now recognized in dependent fields (values with commas can be escaped)
- rename the "dependent fields" plugin to "dependent fields" (sorry ... confusion with French spelling ...)
Bug Fix:
- fix issues with complex nested dependent fields and jQuery live validation
- fix an issue with custom class attribute and addCountrySelect function
- fix an issue with radio button attributes on material forms
- fix css overflow with lists into dependent fields
</code></pre>

                <p class="h4 mb-1">version 3.0 (Major release - 05/2017)</p>
                <p><span class="fw-bold">IMPORTANT</span></p>
                <p>More efficient &amp; straightforward than ever, this release contains code simplifications, new features, and new syntax to send emails.
                    <br>To upgrade from version 2.X, see <a href="#upgrade-phpformbuilder">Upgrade PHP Form Builder</a> section.
                </p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add static function Form::validate('form-id');
  Form::validate function instantiates validator and auto-validate required fields
- merge sendAdvancedMail and sendMail function
- add helperWrapper option
- add addHelper($helper_text, $element_name) shortcut function
- add the "inverse" argument to Dependent fields
- auto-disable dependent fields when they're hidden
- add custom plugins config directory
- public non-static methods can now be all chained
Improvements:
- auto-locate plugins directory &amp; URL (phpformbuilder/plugins-path.php has been removed)
- add optional $fieldset_attr &amp; $legend_attr arguments to startFieldset() function
- improved jQuery validation with Bootstrap collapsible panels
- now, up to 12 fields can be grouped into the same container
- add Validator Spanish language (Thanks Hugo)
- minor performance improvements
Others:
- add tooltip-form template
- update templates according to new features
- update documentation
</code></pre>

                <p class="h4 mb-1">Version 2.3 (02/2017)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add jQuery real-time validation plugin ($50 value)
Improvements:
- better errors management on plugins path errors
- add support for several Recaptcha on the same page
Bug Fix:
- remove crossOrigin warning using the wordcharcount plugin
- solve a z-index issue with selectpicker &amp; modal</code></pre>

                <p class="h4 mb-1">Version 2.2.2 (01/2017)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
- add support for several modal forms on the same page
- add support for several popover forms on the same page
- add several modal forms on same page templates (Bootstrap + Material)
- add several popover forms on same page templates (Bootstrap + Material)
- better errors management on plugins path errors
- minor improvements in documentation</code></pre>

                <p class="h4 mb-1">Version 2.2.1 (01/2017)</p>
                <pre class="mb-5"><code class="language-php">
Bug Fix:
- add "phpformbuilder/mailer/phpmailer/extras" folder to package, missing in previous release</code></pre>

                <p class="h4 mb-1">Version 2.2 (01/2017)</p>
                <pre class="mb-5"><code class="language-php">
Security:
- update PHP Mailer Class to the latest (5.2.21)
Improvements:
- auto-trigger dependent fields on form load
- improve the main form attributes compilation
Bug Fix:
- add one missing translation in de
- remove PHP warning on selects with no option
- fix missing line breaks in emails</code></pre>

                <p class="h4 mb-1">Version 2.1 (10/2016)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add the Recaptcha plugin
- update the Fileupload plugin to its latest version
- add a new template default-db-values-form.php
- add a new template fileupload-test-form.php
- add default values [from database|from variables] in 'how-to' documentation
- add a 4th optional argument to group 4 inputs in the same wrapper
Bug Fix:
- missing required sign with radio and no classname</code></pre>

                <p class="h4 mb-1">Version 2.0.3 (08/2016)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
- Rewritten Dynamic Fields Template javascript to match any field
- update the sendAdvancedMail() function to convert posted arrays to comma-separated lists in emails automatically</code></pre>

                <p class="h4 mb-1">Version 2.0.2 (08/2016)</p>
                <pre class="mb-5"><code class="language-php">
Bug Fix:
- fix dependent select with checkboxes
- fix custom attributes with checkbox groups</code></pre>

                <p class="h4 mb-1">Version 2.0.1 (08/2016)</p>
                <pre class="mb-5"><code class="language-php">
Improvements:
- Add Dynamic Fields Templates
Bug Fix:
- fix php7 warning (upload button not shown) using addFileUpload() function</code></pre>

                <p class="h4 mb-1">version 2.0 (Major release - 07/2016)</p>
                <p><span class="fw-bold">IMPORTANT</span></p>
                <p>All features are backward-compatible, except addCheckbox() function: 3rd argument ($name) has been removed.</p>

                <ul>
                    <li>Previous versions: <code class="language-php">$form->addCheckbox($group_name, $label, $name, $value, $attr = '');</code></li>
                    <li>New version 2.0: <code class="language-php">$form->addCheckbox($group_name, $label, $value, $attr = '');</code></li>
                </ul>
                <p>(see examples or main class doc for more information).</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add the Material Design plugin
- add Material Design templates
- add the Modal plugin
- add the Popover plugin
- add the Pickadate plugin + Pickadate Material
- add XSS protection
- add CSRF protection
        (documentation: https://phpformbuilder.pro/documentation/class-doc/index.html#security)
- add two functions for dependent fields:
        -   startDependentFields($parent_field, $show_values) ;
        -   endDependentFields();
- add Autocomplete plugin
- add support for input grouped with buttons (i.e., search input + btn)
- automatic scroll to the first field with an error
- add a third argument to the render function to allow returning form code instead of echo
Improvements:
- restructure package
- rewrite all documentation
- add PHP beginner's guide
- rewrite &amp; optimize several Form functions
- better error fields rendering for grouped fields
- zero value will not be anymore considered empty
- checkboxes are automagically converted to an array of indexed values.
- add a new argument to render, printJsCode &amp; printIncludes functions to return code instead of echo.
- beautify output if debug enabled
Updates:
- update the Bootstrap Select plugin to the latest version (v1.10.0)
Bug Fix:
- fix validation custom error message with 'between' function
- fix validation errors with dates + hasSymbol function
- fix a wrong comma added in some cases with select option attr.</code></pre>

                <p class="h4 mb-1">Version 1.3.1 (10/2015)</p>
                <pre class="mb-5"><code class="language-php">
Bug Fix:
- fix reply_to issue in sendAdvancedMail function</code></pre>

                <p class="h4 mb-1">Version 1.3 (05/2015)</p>
                <pre class="mb-5"><code class="language-php">
Improvement:
- improve register / clear system
New Features:
- add the Country select plugin
- add the Bootstrap select plugin
- add the Passfield plugin
- add the Icheck plugin</code></pre>

                <p class="h4 mb-1">Version 1.2.7 (03/2015)</p>
                <pre class="mb-5"><code class="language-php">
Bug Fix:
- fix the word-char-count plugin used on the same page with tinyMce + word-char-count.</code></pre>

                <p class="h4 mb-1">Version 1.2.6 (03/2015)</p>
                <pre class="mb-5"><code class="language-php">
Improvement:
- register array fieldnames in session to keep values when validation fails.</code></pre>

                <p class="h4 mb-1">Version 1.2.5 (02/2015)</p>
                <pre class="mb-5"><code class="language-php">
Improvement:
- add word-char-count support with tinyMce</code></pre>

                <p class="h4 mb-1">Version 1.2.4 (12/2014)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add support for select into input groups
Improvements:
- input groups documentation &amp; examples in fully detailed</code></pre>

                <p class="h4 mb-1">Version 1.2.3 (12/2014)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add database utilities with the Mysql class
- add tinyMce (Rich Text Editor) plugin with responsivefilemanager
Improvements:
- add debug argument to print css/js includes &amp; js code on screen
- support multiple fileUploads on the same page</code></pre>

                <p class="h4 mb-1">Version 1.2.2 (10/2014)</p>
                <pre class="mb-5"><code class="language-php">
New Feature:
- add word/character count plugin
Bug Fix:
- Fix object context error with PHP &lt; 5.4
</code></pre>

                <p class="h4 mb-1">Version 1.2.1 (10/2014)</p>
                <pre class="mb-5"><code class="language-php">
Updates:
- improve email sending with attached files</code></pre>

                <p class="h4 mb-1">Version 1.2 (10/2014)</p>
                <pre class="mb-5"><code class="language-php">
New Features:
- add the sendMail function
- add the sendAdvancedMail function
- add the groupInputs function
- add the btnGroupClass option

Updates:
- update the fileUpload plugin to the last version

Bugs Fixes:
- Fix default checkbox wrapper HTML
- Fix plugin path with only fileUploads</code></pre>

                <p class="h4 mb-1">Version 1.1 (09/2014)</p>
                <pre class="mb-5"><code class="language-php">
Bugs Fixes:
- Fix Validator compatibility with 32/64 bit systems
- Fix object context error with PHP &lt; 5.4</code></pre>

                <p class="h4 mb-1">Version 1.0 (09/2014)</p>
                <pre class="mb-5"><code class="language-php">
PSR2 Standard support
Check for security vulnerabilities
Add documentation</code></pre>
            </article>
        </section>
    </main>
    <!-- container-->
    <?php require_once 'inc/js-includes.php'; ?>
</body>

</html>

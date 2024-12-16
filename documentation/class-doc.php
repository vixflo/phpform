<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php
    $meta = array(
        'title'       => 'PHP Form Class to build HTML forms - full documentation',
        'description' => 'All the functions and arguments for PHP Form Builder\'s main class are listed with detailed descriptions and code samples in this document.',
        'canonical'   => 'https://www.phpformbuilder.pro/documentation/class-doc.php',
        'screenshot'  => 'class-doc.png'
    );
    include_once 'inc/page-head.php';
    ?>
    <style> code{ direction: ltr; font-family: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace; font-size: 1em; unicode-bidi: bidi-override} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 300; src: local("Roboto Light"), local("Roboto-Light"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 400; src: local("Roboto"), local("Roboto-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 500; src: local("Roboto Medium"), local("Roboto-Medium"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto Condensed; font-style: normal; font-weight: 400; src: local("Roboto Condensed"), local("RobotoCondensed-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff') format("woff")} code, code[class*=language]{ font-size: .75rem} .dmca-badge{ min-height: 100px} @font-face{ font-display: swap; font-family: bootstrap-icons; src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff') format("woff")} :root{ --bs-blue: #0e73cc; --bs-red: #fc4848; --bs-yellow: #ffc107; --bs-gray: #8c8476; --bs-gray-dark: #38352f; --bs-gray-100: #f6f6f5; --bs-gray-200: #eae8e5; --bs-gray-300: #d4d1cc; --bs-gray-400: #bfbab2; --bs-gray-500: #a9a398; --bs-gray-600: #7f7a72; --bs-gray-700: #55524c; --bs-gray-800: #2a2926; --bs-gray-900: #191817; --bs-primary: #0e73cc; --bs-secondary: #7f7a72; --bs-success: #0f9e7b; --bs-info: #00c2db; --bs-pink: #e6006f; --bs-warning: #ffc107; --bs-danger: #fc4848; --bs-light: #f6f6f5; --bs-dark: #191817; --bs-primary-rgb: 14, 115, 204; --bs-secondary-rgb: 127, 122, 114; --bs-success-rgb: 15, 158, 123; --bs-info-rgb: 0, 194, 219; --bs-pink-rgb: 230, 0, 111; --bs-warning-rgb: 255, 193, 7; --bs-danger-rgb: 252, 72, 72; --bs-light-rgb: 246, 246, 245; --bs-dark-rgb: 25, 24, 23; --bs-white-rgb: 255, 255, 255; --bs-black-rgb: 0, 0, 0; --bs-body-color-rgb: 42, 45, 45; --bs-body-bg-rgb: 255, 255, 255; --bs-font-sans-serif: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; --bs-font-monospace: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace; --bs-gradient: linear-gradient(180deg, hsla(0, 0%, 100%, .15), hsla(0, 0%, 100%, 0)); --bs-body-font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; --bs-body-font-size: 0.9375rem; --bs-body-font-weight: 400; --bs-body-line-height: 1.5; --bs-body-color: #2a2d2d; --bs-body-bg: #fff} *, :after, :before{ box-sizing: border-box} @media (prefers-reduced-motion:no-preference){ :root{ scroll-behavior: smooth}} body{ -webkit-text-size-adjust: 100%; background-color: var(--bs-body-bg); color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); line-height: var(--bs-body-line-height); margin: 0; text-align: var(--bs-body-text-align)} .h4, h1, h2{ font-weight: 500; line-height: 1.2; margin-bottom: .5rem; margin-top: 0} h1{ font-size: calc(1.375rem + 1.5vw)} @media (min-width:1200px){ h1{ font-size: 2.5rem}} h2{ font-size: calc(1.3125rem + .75vw)} .h4{ font-size: calc(1.26563rem + .1875vw)} @media (min-width:1200px){ h2{ font-size: 1.875rem} .h4{ font-size: 1.40625rem}} p{ margin-bottom: 1rem; margin-top: 0} ol, ul{ padding-left: 2rem} ol, ul{ margin-bottom: 1rem; margin-top: 0} ul ul{ margin-bottom: 0} strong{ font-weight: bolder} .small{ font-size: .875em} a{ color: #0e73cc; text-decoration: underline} code, pre{ direction: ltr; font-family: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace; font-size: 1em; unicode-bidi: bidi-override} pre{ display: block; font-size: .875em; margin-bottom: 1rem; margin-top: 0; overflow: auto} pre code{ color: inherit; font-size: inherit; word-break: normal} code{ word-wrap: break-word; color: #e6006f; font-size: .875em} img, svg{ vertical-align: middle} label{ display: inline-block} button{ border-radius: 0} button, input, optgroup{ font-family: inherit; font-size: inherit; line-height: inherit; margin: 0} button{ text-transform: none} [type=button], button{ appearance: button; -webkit-appearance: button} ::-moz-focus-inner{ border-style: none; padding: 0} ::-webkit-datetime-edit-day-field, ::-webkit-datetime-edit-fields-wrapper, ::-webkit-datetime-edit-hour-field, ::-webkit-datetime-edit-minute, ::-webkit-datetime-edit-month-field, ::-webkit-datetime-edit-text, ::-webkit-datetime-edit-year-field{ padding: 0} ::-webkit-inner-spin-button{ height: auto} [type=search]{ appearance: textfield; -webkit-appearance: textfield; outline-offset: -2px} ::-webkit-search-decoration{ -webkit-appearance: none} ::-webkit-color-swatch-wrapper{ padding: 0} ::file-selector-button{ font: inherit} ::-webkit-file-upload-button{ -webkit-appearance: button; font: inherit} .lead{ font-size: 1.171875rem; font-weight: 300} .list-unstyled{ list-style: none; padding-left: 0} .badge{ border-radius: 0; color: #fff; display: inline-block; font-size: .75em; font-weight: 500; line-height: 1; padding: .35em .65em; text-align: center; vertical-align: baseline; white-space: nowrap} .btn{ background-color: transparent; border: 1px solid transparent; border-radius: 0; color: #2a2d2d; display: inline-block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; text-align: center; text-decoration: none; vertical-align: middle} .btn-danger{ background-color: #fc4848; border-color: #fc4848; box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075); color: #000} .btn-outline-secondary{ border-color: #7f7a72; color: #7f7a72} .container, .container-fluid{ margin-left: auto; margin-right: auto; padding-left: var(--bs-gutter-x, .75rem); padding-right: var(--bs-gutter-x, .75rem); width: 100%} @media (min-width:576px){ .container{ max-width: 540px}} @media (min-width:768px){ .container{ max-width: 720px}} @media (min-width:992px){ .container{ max-width: 960px}} .dropdown-toggle{ white-space: nowrap} .dropdown-toggle:after{ border-bottom: 0; border-left: .3em solid transparent; border-right: .3em solid transparent; border-top: .3em solid; content: ""; display: inline-block; margin-left: .255em; vertical-align: .255em} .form-text{ color: #7f7a72; font-size: .875em; margin-top: .25rem} .form-control{ -webkit-appearance: none; -moz-appearance: none; appearance: none; background-clip: padding-box; background-color: #fff; border: 1px solid #bfbab2; border-radius: 0; box-shadow: inset 0 1px 2px rgba(0, 0, 0, .075); color: #2a2d2d; display: block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; width: 100%} .form-control::-webkit-date-and-time-value{ height: 1.5em} .form-control::-moz-placeholder{ color: #7f7a72; opacity: 1} .form-control:-ms-input-placeholder{ color: #7f7a72; opacity: 1} .form-control::-webkit-file-upload-button{ -webkit-margin-end: .75rem; background-color: #eae8e5; border: 0 solid; border-color: inherit; border-inline-end-width: 1px; border-radius: 0; color: #2a2d2d; margin: -.375rem -.75rem; margin-inline-end: .75rem; padding: .375rem .75rem} .input-group{ align-items: stretch; display: flex; flex-wrap: wrap; position: relative; width: 100%} .input-group>.form-control{ flex: 1 1 auto; min-width: 0; position: relative; width: 1%} .input-group .btn{ position: relative; z-index: 2} .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu){ border-bottom-right-radius: 0; border-top-right-radius: 0} .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback){ border-bottom-left-radius: 0; border-top-left-radius: 0; margin-left: -1px} .nav{ display: flex; flex-wrap: wrap; list-style: none; margin-bottom: 0; padding-left: 0} .nav-link{ color: #0e73cc; display: block; padding: .5rem 1rem; text-decoration: none} .nav-pills .nav-link{ background: 0 0; border: 0; border-radius: 0} .navbar{ align-items: center; display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom: .5rem; padding-top: .5rem; position: relative} .navbar>.container-fluid{ align-items: center; display: flex; flex-wrap: inherit; justify-content: space-between} .navbar-brand{ font-size: 1.171875rem; margin-right: 1rem; padding-bottom: 0; padding-top: 0; text-decoration: none; white-space: nowrap} .navbar-nav{ display: flex; flex-direction: column; list-style: none; margin-bottom: 0; padding-left: 0} .navbar-nav .nav-link{ padding-left: 0; padding-right: 0} .navbar-collapse{ align-items: center; flex-basis: 100%; flex-grow: 1} .navbar-toggler{ background-color: transparent; border: 1px solid transparent; border-radius: 0; font-size: 1.171875rem; line-height: 1; padding: .25rem .75rem} .navbar-toggler-icon{ background-position: 50%; background-repeat: no-repeat; background-size: 100%; display: inline-block; height: 1.5em; vertical-align: middle; width: 1.5em} @media (min-width:992px){ .navbar-expand-lg{ flex-wrap: nowrap; justify-content: flex-start} .navbar-expand-lg .navbar-nav{ flex-direction: row} .navbar-expand-lg .navbar-nav .nav-link{ padding-left: 1rem; padding-right: 1rem} .navbar-expand-lg .navbar-collapse{ display: flex !important; flex-basis: auto} .navbar-expand-lg .navbar-toggler{ display: none}} .navbar-light .navbar-toggler{ border-color: rgba(0, 0, 0, .1); color: rgba(0, 0, 0, .55)} .navbar-light .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.55)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .navbar-dark .navbar-brand{ color: #fff} .navbar-dark .navbar-nav .nav-link{ color: hsla(0, 0%, 100%, .65)} .navbar-dark .navbar-nav .nav-link.active{ color: #fff} .navbar-dark .navbar-toggler{ border-color: hsla(0, 0%, 100%, .1); color: hsla(0, 0%, 100%, .65)} .navbar-dark .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.65)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .collapse:not(.show){ display: none} .fixed-top{ top: 0} .fixed-top{ left: 0; position: fixed; right: 0; z-index: 1030} .visually-hidden{ clip: rect(0, 0, 0, 0) !important; border: 0 !important; height: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; white-space: nowrap !important; width: 1px !important} .d-flex{ display: flex !important} .d-none{ display: none !important} .w-100{ width: 100% !important} .flex-column{ flex-direction: column !important} .flex-wrap{ flex-wrap: wrap !important} .justify-content-end{ justify-content: flex-end !important} .justify-content-center{ justify-content: center !important} .justify-content-between{ justify-content: space-between !important} .align-items-start{ align-items: flex-start !important} .align-items-center{ align-items: center !important} .my-4{ margin-bottom: 1.5rem !important; margin-top: 1.5rem !important} .me-1{ margin-right: .25rem !important} .me-3{ margin-right: 1rem !important} .mb-2{ margin-bottom: .5rem !important} .mb-4{ margin-bottom: 1.5rem !important} .mb-7{ margin-bottom: 12.5rem !important} .ms-2{ margin-left: .5rem !important} .ms-auto{ margin-left: auto !important} .p-2{ padding: .5rem !important} .p-4{ padding: 1.5rem !important} .px-0{ padding-left: 0 !important; padding-right: 0 !important} .px-2{ padding-left: .5rem !important; padding-right: .5rem !important} .py-1{ padding-bottom: .25rem !important; padding-top: .25rem !important} .py-2{ padding-bottom: .5rem !important; padding-top: .5rem !important} .pt-1{ padding-top: .25rem !important} .pb-5{ padding-bottom: 3rem !important} .pb-6{ padding-bottom: 6.25rem !important} .text-center{ text-align: center !important} .text-nowrap{ white-space: nowrap !important} .text-danger{ --bs-text-opacity: 1; color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important} .text-white{ --bs-text-opacity: 1; color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important} .bg-dark{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important} .bg-white{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important} @media (min-width:768px){ .d-md-inline{ display: inline !important}} @media (min-width:992px){ .d-lg-none{ display: none !important} .px-lg-0{ padding-left: 0 !important; padding-right: 0 !important}} @media (min-width:1200px){ .container{ max-width: 1140px} .d-xl-none{ display: none !important}} .dropdown-toggle:not(.sidebar-toggler):after{ background-repeat: no-repeat; border: none; content: " "; display: block; height: 14px; line-height: 1.40625rem; margin: 0; position: absolute; right: 1rem; top: calc(50% - 7px); transform: rotate(0); width: 7px} .dropdown-toggle{ padding-right: 2.5rem !important; position: relative} .dropdown-toggle.dropdown-light:after{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg aria-hidden='true' data-prefix='fas' data-icon='angle-right' xmlns='https://www.w3.org/2000/svg' viewBox='0 0 256 512' class='svg-inline--fa fa-angle-right fa-w-8 fa-2x'%3E%3Cpath fill='%23f6f6f5' d='m224.3 273-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z'/%3E%3C/svg%3E")} .bg-gray-800{ background-color: #2a2926} #website-navbar{ box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15); font-family: Roboto Condensed} #website-navbar .navbar-nav{ align-items: stretch; display: flex; flex-wrap: nowrap; margin-top: 1rem; width: 100%} #website-navbar .navbar-nav .nav-item{ align-items: stretch; flex-grow: 1; justify-content: center; line-height: 1.25rem} #website-navbar .navbar-nav .nav-link{ align-items: center; display: flex; flex-direction: column; font-size: .875rem; justify-content: center; padding: .5rem 1rem; text-align: center; text-transform: uppercase} #website-navbar .navbar-nav .nav-link.active{ background-color: #55524c; text-decoration: none} #navbar-left-wrapper{ background-color: #2a2926; box-shadow: 2px 0 1px rgba(0, 0, 0, .12), 1px 0 1px rgba(0, 0, 0, .24); display: none; height: 100%; padding-right: 0; position: fixed; top: 72px; width: 14.375rem; z-index: 9999; z-index: 2} #navbar-left-wrapper #navbar-left-collapse{ display: none} #navbar-left-wrapper~.container{ padding-left: 14.375rem} @media (min-width:992px){ #website-navbar{ box-shadow: 0 2px 1px rgba(0, 0, 0, .12), 0 1px 1px rgba(0, 0, 0, .24)} #website-navbar .navbar-nav{ margin-top: 0} #website-navbar .navbar-nav .nav-link{ font-size: .8125rem; height: 100%; padding-left: .75rem; padding-right: .75rem} #website-navbar .navbar-brand{ font-size: 1.0625rem; margin-bottom: 0} #navbar-left-wrapper{ display: block}} @media (max-width:991.98px){ #navbar-left-toggler-wrapper{ display: inline-block; top: 4.75rem; width: 54px; z-index: 1 !important} #navbar-left-wrapper #navbar-left-collapse{ display: block} #navbar-left-wrapper~.container{ padding-left: 15px} .w3-animate-left{ -webkit-animation: .4s animateleft; animation: .4s animateleft; position: relative} @-webkit-keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}} @keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}}} #navbar-left{ background-color: #2a2926; box-shadow: 0 1px 0 #030303; color: #fff; position: relative; width: 100%; z-index: 100} #navbar-left .h4{ font-weight: 400} #navbar-left li, #navbar-left ul{ margin: 0; padding: 0; width: inherit} #navbar-left>li>a{ background-color: #373632; border-bottom: 1px solid #151413; border-top: 1px solid #45433e; color: #fff; font-size: 13px; font-weight: 300; padding: 12px 20px 12px 18px; text-shadow: 1px 1px 0 #45433e} #navbar-left>li>ul>li{ width: 100%} #navbar-left>li>ul>li a{ background-color: #3f3e39; border-bottom: 1px solid #1d1c1a; border-top: 1px solid #52504a; color: #fff; display: block; font-size: 13px; font-weight: 300; line-height: 20px; padding: 5px 22px 5px 30px; text-decoration: none; text-shadow: none; text-shadow: 1px 1px 0 #45433e} #navbar-left>li>ul>li a .badge{ text-shadow: none; text-transform: uppercase} #navbar-left>li>ul>li:first-child a{ border-top: none} #navbar-left>li>ul>li:last-child a{ border-bottom: none} [data-simplebar]{ align-content: flex-start; align-items: flex-start; flex-direction: column; flex-wrap: wrap; justify-content: flex-start; position: relative} #share-wrapper{ height: 40px; position: absolute; right: 50px; top: 37px; transform: translateY(-50%); z-index: 1050} #share-wrapper ul{ left: calc(-50% + 22.5px); position: relative; width: 90px} #share-wrapper ul li{ width: 45px} #share-wrapper label, #share-wrapper li>a{ border-radius: 50%; color: #efefef; height: 2.5rem; overflow: hidden; text-decoration: none; width: 2.5rem} #share-wrapper label#share{ background: #4267b2; opacity: .75; position: relative; z-index: 14} #share-wrapper li>a#share-facebook{ background: #3b5998} #share-wrapper li>a#share-twitter{ background: #00acee} #share-wrapper li>a#share-pinterest{ background: #e4405f} #share-wrapper li>a#share-linkedin{ background: #0077b5} #share-wrapper li>a#share-reddit{ background: #ff4500} #share-wrapper li>a#share-google-bookmarks{ background: #4285f4} #share-wrapper li>a#share-mix{ background: #ff8226} #share-wrapper li>a#share-pocket{ background: #ee4056} #share-wrapper li>a#share-digg{ background: #2a2a2a} #share-wrapper li>a#share-blogger{ background: #fda352} #share-wrapper li>a#share-tumblr{ background: #35465c} #share-wrapper li>a#share-flipboard{ background: #c00} #share-wrapper li>a#share-hacker-news{ background: #f60} #share-wrapper li:first-child{ opacity: 0; transform: translateY(-30%); z-index: 13} #share-wrapper li:nth-child(2){ opacity: 0; transform: translateY(-30%); z-index: 12} #share-wrapper li:nth-child(3){ opacity: 0; transform: translateY(-30%); z-index: 11} #share-wrapper li:nth-child(4){ opacity: 0; transform: translateY(-30%); z-index: 10} #share-wrapper li:nth-child(5){ opacity: 0; transform: translateY(-30%); z-index: 9} #share-wrapper li:nth-child(6){ opacity: 0; transform: translateY(-30%); z-index: 8} #share-wrapper li:nth-child(7){ opacity: 0; transform: translateY(-30%); z-index: 7} #share-wrapper li:nth-child(8){ opacity: 0; transform: translateY(-30%); z-index: 6} #share-wrapper li:nth-child(9){ opacity: 0; transform: translateY(-30%); z-index: 5} #share-wrapper li:nth-child(10){ opacity: 0; transform: translateY(-30%); z-index: 4} #share-wrapper li:nth-child(11){ opacity: 0; transform: translateY(-30%); z-index: 3} #share-wrapper li:nth-child(12){ opacity: 0; transform: translateY(-30%); z-index: 2} #share-wrapper li:nth-child(13){ opacity: 0; transform: translateY(-30%); z-index: 1} #share-wrapper input~ul{ visibility: hidden} @media only screen and (min-width:992px){ #share-wrapper{ position: fixed; right: 0; top: 180px} #share-wrapper label#share{ right: -42px}} :target{ scroll-margin-top: 100px} html{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; min-height: 100%; position: relative} @media screen and (prefers-reduced-motion:reduce){ html{ overflow-anchor: none; scroll-behavior: auto}} body{ counter-reset: section} .h4, h1, h2{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol} h1{ color: #0e73cc; line-height: .9; margin-bottom: 2.5rem} h1:first-letter{ font-size: 2em} h2{ border-bottom: 2px solid #2a2926; color: #2a2926; margin-bottom: 3rem; padding: 1rem} .h4{ color: #55524c; font-weight: 300 !important} .h4{ margin-bottom: 1rem} a{ text-decoration: none} p.lead{ color: #7f7a72; font-weight: 400} code, code[class*=language], pre{ font-size: .75rem} pre>code[class*=language]{ padding-left: 0 !important; padding-right: 0 !important} code[class*=language]{ padding-left: .25rem !important; padding-right: .25rem !important} strong{ font-weight: 500} ol li{ margin-bottom: 1rem} .badge:not(.badge-circle){ border-radius: 0} .btn .icon-circle{ border-radius: 50%; display: inline-block; height: 1.40625rem; line-height: 1.40625rem; width: 1.40625rem} .has-separator{ display: block; margin-bottom: 3rem; position: relative} .has-separator:after, .has-separator:before{ background: #d4d1cc; content: ""; height: 1px; left: 50%; position: absolute} .has-separator:before{ bottom: -1em; margin-left: -6%; width: 12%} .has-separator:after{ bottom: -1.1875em; margin-left: -10%; width: 20%} .file-path{ white-space: nowrap} .file-path{ background-color: #f6f6f5; color: #000; display: inline-block; font-size: .8125rem; font-weight: 400; line-height: 1; margin-left: .25rem; margin-right: .25rem; padding: .35em .65em; text-align: center; vertical-align: baseline} #search-bar #search-results-count{ left: -5.75rem; line-height: 22.5px; margin-right: -5.75rem; padding: .375rem 0; position: relative; width: calc(5.75rem + 1px); z-index: 3} .bi:before, [class*=" bi-"]:before{ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; display: inline-block; font-family: bootstrap-icons !important; font-style: normal; font-variant: normal; font-weight: 400 !important; line-height: 1; text-transform: none; vertical-align: -.125em} .bi-arrow-down:before{ content: "\f128"} .bi-arrow-up:before{ content: "\f148"} .bi-share-fill:before{ content: "\f52d"} .bi-x:before{ content: "\f62a"} .bi-currency-dollar:before{ content: "\f636"} .bi-x-lg:before{ content: "\f659"} code[class*=language-]{ color: #ccc; background: 0 0; font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace; font-size: .8125rem; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; word-wrap: normal; line-height: 1.5; -moz-tab-size: 4; -o-tab-size: 4; tab-size: 4; -webkit-hyphens: none; -moz-hyphens: none; -ms-hyphens: none; hyphens: none} :not(pre)>code[class*=language-]{ background: #2d2d2d} :not(pre)>code[class*=language-]{ padding: .1em; border-radius: .3em; white-space: normal} </style>
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
                    <li class="nav-item"><a class="nav-link active" href="class-doc.php">Class Doc.</a></li>
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

            <li class="nav-item">
                <p class="h4 text-center my-4">Settings</p>
            </li>

            <li class="nav-item"><a class="nav-link" href="#overview">Overview</a></li>
            <li class="nav-item"><a class="nav-link" href="#frameworks">Frameworks</a></li>
            <li class="nav-item"><a class="nav-link" href="#about-optimization">About optimization</a></li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" href="#collapseOptions" role="button" data-bs-toggle="collapse" data-parent="#navbar-left-wrapper" aria-expanded="false">Options</a>
                <ul class="nav nav-pills nav-stacked collapse" id="collapseOptions">
                    <li class="nav-item"><a class="nav-link" href="#options-overview">Overview</a></li>
                    <li class="nav-item"><a class="nav-link" href="#options-default">Default options (Bootstrap / Material Design)</a></li>
                    <li class="nav-item"><a class="nav-link" href="#options-customizing">Customizing for another framework</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <p class="h4 text-center my-4">Main functions</p>
            </li>

            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" data-bs-toggle="collapse" href="#collapseGeneral" aria-controls="collapseGeneral" aria-expanded="false">General</a>
                <ul class="nav nav-pills nav-stacked collapse" id="collapseGeneral">
                    <li class="nav-item"><a class="nav-link" href="#main-functions">construct</a></li>
                    <li class="nav-item"><a class="nav-link" href="#setMode">setMode</a></li>
                    <li class="nav-item"><a class="nav-link" href="#setOptions">setOptions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#setMethod">setMethod</a></li>
                    <li class="nav-item"><a class="nav-link" href="#setAction">setAction</a></li>
                    <li class="nav-item"><a class="nav-link" href="#startFieldset">startFieldset</a></li>
                    <li class="nav-item"><a class="nav-link" href="#endFieldset">endFieldset</a></li>
                    <li class="nav-item"><a class="nav-link" href="#startDependentFields">startDependentFields</a></li>
                    <li class="nav-item"><a class="nav-link" href="#endDependentFields">endDependentFields</a></li>
                    <li class="nav-item"><a class="nav-link" href="#attr">$attr argument</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" href="#collapseElements" role="button" data-bs-toggle="collapse" aria-controls="collapseElements" aria-expanded="false">Elements</a>
                <ul class="nav nav-pills nav-stacked collapse" id="collapseElements">
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#elements">addInput<span class="badge bg-gray-800 text-gray-300 px-2 py-1">input</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addTextarea">addTextarea<span class="badge bg-gray-800 text-gray-300 px-2 py-1">textarea</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addOption">addOption<span class="badge bg-gray-800 text-gray-300 px-2 py-1">select</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addSelect">addSelect<span class="badge bg-gray-800 text-gray-300 px-2 py-1">select</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addCountrySelect">addCountrySelect<span class="badge bg-gray-800 text-gray-300 px-2 py-1">select</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addTimeSelect">addTimeSelect<span class="badge bg-gray-800 text-gray-300 px-2 py-1">select</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addRadio">addRadio<span class="badge bg-gray-800 text-gray-300 px-2 py-1">radio</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#printRadioGroup">printRadioGroup<span class="badge bg-gray-800 text-gray-300 px-2 py-1">radio</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addCheckbox">addCheckbox<span class="badge bg-gray-800 text-gray-300 px-2 py-1">checkbox</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#printCheckboxGroup"><span class="small">printCheckboxGroup</span><span class="badge bg-gray-800 text-gray-300 px-2 py-1">checkbox</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addBtn">addBtn<span class="badge bg-gray-800 text-gray-300 px-2 py-1">button</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#printBtnGroup">printBtnGroup<span class="badge bg-gray-800 text-gray-300 px-2 py-1">button</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#addHtml">addHtml<span class="badge bg-gray-800 text-gray-300 px-2 py-1">HTML</span></a></li>
                    <li class="nav-item"><a class="nav-link d-flex justify-content-between" href="#add-input-wrapper">addInputWrapper<span class="badge bg-gray-800 text-gray-300 px-2 py-1">HTML</span></a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" href="#collapseRendering" role="button" data-bs-toggle="collapse" aria-controls="collapseRendering" aria-expanded="false">Rendering</a>
                <ul class="nav nav-pills nav-stacked collapse" id="collapseRendering">
                    <li class="nav-item"><a class="nav-link" href="#rendering">render</a></li>
                    <li class="nav-item"><a class="nav-link" href="#get-code">getCode</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ajax-loading">Ajax loading</a></li>
                    <li class="nav-item"><a class="nav-link" href="#useLoadJs">useLoadJs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#getIncludes">getIncludes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#printIncludes">printIncludes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#getJsCode">getJsCode</a></li>
                    <li class="nav-item"><a class="nav-link" href="#printJsCode">printJsCode</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" href="#collapseUtilities" role="button" data-bs-toggle="collapse" aria-controls="collapseUtilities" aria-expanded="false">Utilities</a>
                <ul class="nav nav-pills nav-stacked collapse" id="collapseUtilities">
                    <li class="nav-item"><a class="nav-link" href="#groupElements">groupElements</a></li>
                    <li class="nav-item"><a class="nav-link" href="#set-cols">setCols</a></li>
                    <li class="nav-item"><a class="nav-link" href="#add-helper">addHelper</a></li>
                    <li class="nav-item"><a class="nav-link" href="#add-addon">addAddon</a></li>
                    <li class="nav-item"><a class="nav-link" href="#add-heading">addHeading</a></li>
                    <li class="nav-item"><a class="nav-link" href="#add-icon">addIcon</a></li>
                    <li class="nav-item"><a class="nav-link" href="#build-alert">buildAlert</a></li>
                    <li class="nav-item"><a class="nav-link" href="#start-div">startDiv</a></li>
                    <li class="nav-item"><a class="nav-link" href="#end-div">endDiv</a></li>
                    <li class="nav-item"><a class="nav-link" href="#start-row">startRow</a></li>
                    <li class="nav-item"><a class="nav-link" href="#end-row">endRow</a></li>
                    <li class="nav-item"><a class="nav-link" href="#start-col">startCol</a></li>
                    <li class="nav-item"><a class="nav-link" href="#end-col">endCol</a></li>
                    <li class="nav-item"><a class="nav-link" href="#center-content">centerContent</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" href="#collapseEmailSending1" role="button" data-bs-toggle="collapse" aria-controls="collapseEmailSending1" aria-expanded="false">Email sending</a>
                <ul class="nav nav-pills nav-stacked collapse" id="collapseEmailSending1">
                    <li class="nav-item"><a class="nav-link" href="#mainFunctionsSendMail">sendMail</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" href="#collapseRegisteringClearingValues" role="button" data-bs-toggle="collapse" aria-controls="collapseRegisteringClearingValues" aria-expanded="false">Registering / Clearing values</a>
                <ul class="nav nav-pills nav-stacked collapse" id="collapseRegisteringClearingValues">
                    <li class="nav-item"><a class="nav-link" href="#global-registration-process">Global registration process</a></li>
                    <li class="nav-item"><a class="nav-link" href="#registerValues">registerValues (static)</a></li>
                    <li class="nav-item"><a class="nav-link" href="#mergeValues">mergeValues (static)</a></li>
                    <li class="nav-item"><a class="nav-link" href="#clear">clear (static)</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <p class="h4 text-center my-4">Form Validation</p>
            </li>

            <li class="nav-item"><a class="nav-link" href="#validation-overview">Overview</a></li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" href="#php-validation" role="button" data-bs-toggle="collapse" aria-controls="php-validation" aria-expanded="false">PHP Validation</a>
                <ul class="nav nav-pills nav-stacked collapse" id="php-validation">
                    <li class="nav-item"><a class="nav-link" href="#php-validation-basics">Basics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#dependent-fields-validation">Dependent fields validation</a></li>
                    <li class="nav-item"><a class="nav-link" href="#php-validation-methods">Available methods</a></li>
                    <li class="nav-item"><a class="nav-link" href="#php-validation-examples">Examples</a></li>
                    <li class="nav-item"><a class="nav-link" href="#php-validation-multilanguage">Multilanguage support</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle dropdown-light" class="collapsible-child" href="#javascript-validation" role="button" data-bs-toggle="collapse" aria-controls="javascript-validation" aria-expanded="false">Real-time Validation (Javascript)</a>
                <ul class="nav nav-pills nav-stacked collapse" id="javascript-validation">
                    <li class="nav-item"><a class="nav-link" href="#javascript-validation-getting-started">Getting started</a></li>
                    <li class="nav-item"><a class="nav-link" href="#javascript-validation-available-methods">Available methods</a></li>
                    <li class="nav-item"><a class="nav-link" href="#javascript-validation-form-submission">Form submission</a></li>
                    <li class="nav-item"><a class="nav-link" href="#javascript-validation-callback-api">Callback & API</a></li>
                    <li class="nav-item"><a class="nav-link" href="#javascript-validation-examples">Examples</a></li>
                    <li class="nav-item"><a class="nav-link" href="#javascript-validation-multilanguage">Multilanguage support</a></li>
                    <li class="nav-item"><a class="nav-link" href="#javascript-validation-more">More</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <p class="h4 text-center my-4">Email sending</p>
            </li>

            <li class="nav-item"><a class="nav-link" href="#sendMail">sendMail</a></li>
            <li class="nav-item"><a class="nav-link" href="#attachmentsExamples">Attachments examples</a></li>

            <li class="nav-item">
                <p class="h4 text-center my-4">Database PDO Library</p>
            </li>

            <li class="nav-item"><a class="nav-link" href="#database-overview">Overview</a></li>
            <li class="nav-item"><a class="nav-link" href="#database-connection">Connection</a></li>
            <li class="nav-item"><a class="nav-link" href="#database-select">Select example</a></li>
            <li class="nav-item"><a class="nav-link" href="#database-insert">Insert example</a></li>
            <li class="nav-item"><a class="nav-link" href="#database-update">Update example</a></li>
            <li class="nav-item"><a class="nav-link" href="#database-delete">Delete example</a></li>
            <li class="nav-item"><a class="nav-link" href="#database-debug">Errors &amp; Debug</a></li>
            <li class="nav-item">

            <li class="nav-item">
                <p class="h4 text-center my-4">Security</p>
            </li>

            <li class="nav-item"><a class="nav-link" href="#security">Main</a></li>
            <li class="nav-item"><a class="nav-link" href="#security-xss">XSS (Cross-Site Scripting)</a></li>
            <li class="nav-item"><a class="nav-link" href="#securityt-csrf">CSRF (Cross-Site Request Forgeries)</a></li>

            <li class="nav-item">
                <p class="h4 text-center my-4">~</p>
            </li>

            <li class="nav-item"><a class="nav-link" href="#extending-main-class">Extending Main Class</a></li>
            <li class="nav-item"><a class="nav-link" href="#chaining-methods">Chaining methods</a></li>
            <li class="nav-item"><a class="nav-link" href="#credits">Sources &amp; Credits</a></li>
        </ul>
        <!-- navbar-left -->
    </div>

    <!-- /main sidebar -->

    <main class="container">

        <?php include_once 'inc/top-section.php'; ?>

        <article class="pb-5 mb-7 has-separator">
            <h1>PHP Form Class <br><small>Complete documentation with code examples</small></h1>
            <p>The <strong>PHP Form class</strong> is the core of the system.<br>Instantiate your forms by creating an object with <code>$form = new Form();</code>.<br>Then add your fields and render the HTML code with the help of the functions detailed in this document.</p>
            <h2 id="overview">Overview</h2>
            <p class="lead">To build and display your form, you have to include four PHP code blocks:</p>
            <ol>
                <li>The first block at the very beginning of your page to include the autoloader and build the form.</li>
                <li>The second block in your <code class="language-php">&lt;head&gt;&lt;/head&gt;</code> section to call required css files for plugins.</li>
                <li>The third block in <code class="language-php">&lt;body&gt;&lt;/body&gt;</code> section to render your form.</li>
                <li>The fourth block just before <code class="language-php">&lt;/body&gt;</code> to call required js files and js code to activate plugins.</li>
            </ol>
            <p><strong>Here is an example of a page containing a form:</strong></p>
            <pre class="line-numbers mb-4"><code class="language-php">&lt;?php
/*============================================
=            1st block - the form            =
============================================*/

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

// Start the PHP session
session_start();

// Include the main Form class
include_once rtrim($_SERVER[&apos;DOCUMENT_ROOT&apos;], DIRECTORY_SEPARATOR) . &apos;/phpformbuilder/autoload.php&apos;;

// Create the form
$form = new Form(&apos;test-form&apos;, &apos;horizontal&apos;, &apos;novalidate&apos;);

// Call functions to add fields and elements
$form-&gt;addInput(&apos;text&apos;, &apos;user-name&apos;, &apos;&apos;, &apos;Name :&apos;, &apos;required, placeholder=Name&apos;);
$form-&gt;addRadio(&apos;is-all-ok&apos;, &apos;Yes&apos;, 1);
$form-&gt;addRadio(&apos;is-all-ok&apos;, &apos;No&apos;, 0);
$form-&gt;printRadioGroup(&apos;is-all-ok&apos;, &apos;Is all ok ?&apos;, false, &apos;required&apos;);
$form-&gt;addBtn(&apos;submit&apos;, &apos;submit-btn&apos;, 1, &apos;Send&apos;, &apos;class=btn btn-success&apos;);

// iCheck plugin
$form-&gt;addPlugin(&apos;icheck&apos;, &apos;input&apos;, &apos;default&apos;, array(&apos;%theme%&apos; =&gt; &apos;square&apos;, &apos;%color%&apos; =&gt; &apos;red&apos;));

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

    $form-&gt;printIncludes(&apos;css&apos;);

    /*===================  End of 2nd block  ====================*/
    ?&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;My first form&lt;/h1&gt;
    &lt;?php
    /*======================================================================================================
    =            3rd block - render the form and the feedback message if the form has been sent            =
    ======================================================================================================*/

    if (isset($sentMessage)) {
        echo $sentMessage;
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

    $form-&gt;printIncludes(&apos;js&apos;);
    $form-&gt;printJsCode();

    /*=========================  End of 4th block ===========================*/
    ?&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="frameworks">Frameworks</h2>
            <p>All options are ready to use and will generate HTML markup according to the chosen framework.</p>
            <p>The default framework is <strong>Bootstrap 5</strong>.</p>
            <p>If none of the available frameworks powers your website, we provide a <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#no-framework">minimal version of Bootstrap 5 CSS</a> to design your forms.</p>
            <section class="mb-6">
                <h3 class="mb-2">Bootstrap 4</h3>
                <pre class="line-numbers mb-5"><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate', 'bs4');</code></pre>
                <h3 class="mb-2">Bootstrap 5 <small class="badge bg-secondary ms-2">Default</small></h3>
                <pre class="line-numbers mb-5"><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate');</code></pre>
                <h3 class="mb-2">Bulma</h3>
                <pre class="line-numbers mb-5"><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate', 'bulma');</code></pre>
                <h3 class="mb-2">Foundation - v6.4 or higher, with XY grid</h3>
                <pre class="line-numbers mb-5"><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate', 'foundation');</code></pre>
                <h3 class="mb-2">Material Design</h3>
                <p>Material Design forms are built with <a href="https://materializecss.com/">Materialize framework</a>.</p>
                <p>Pages created with <strong>Materialize</strong> or <strong>Bootstrap 4</strong> can both include Material Design forms.</p>
                <ul class="mb-6">
                    <li>
                        If your website uses <strong>Materialize framework</strong>:
                        <pre><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate', 'material');</code></pre>
                    </li>
                    <li>
                        If your website uses <strong>Bootstrap 4 framework</strong>:
                        <pre><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate', 'material');

// materialize plugin
$form->addPlugin('materialize', '#my-form');</code></pre>
                    </li>
                </ul>
                <h3 class="mb-2">Tailwind</h3>
                <pre class="line-numbers mb-5"><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate', 'tailwind');</code></pre>
                <h3 class="mb-2">UIKit</h3>
                <pre class="line-numbers mb-5"><code class="language-php">$form = new Form('my-form', 'horizontal', 'novalidate', 'uikit');</code></pre>
                <h3 class="mb-2" id="no-framework">No framework</h3>
                <p>Add the <strong>minimal Bootstrap 5 CSS</strong> to your page head, then you can build your forms with Bootstrap 5.</p>
                <p>This style sheet only includes what is necessary to layout your responsive forms and will not break anything in the other parts of your pages.</p>
                <pre class="line-numbers mb-5"><code class="language-php">&lt;head&gt;
    // link to the minimal Bootstrap 5 CSS
    &lt;link rel=&quot;stylesheet&quot; href=&quot;/phpformbuilder/templates/assets/bootstrap5-phpfb/css/bootstrap5-phpfb.min.css&quot;&gt;
&lt;/head&gt;
&lt;?php
// Then you can build your form
$form = new Form('my-form', 'horizontal', 'novalidate');</code></pre>
                <p>More details about <code class="language-php">__construct()</code> here: <a href="#construct">Main functions > General > Construct</a></p>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <!--=====================================
            =            Section comment            =
            ======================================-->

            <!-- Ajouter instructions pour désactiver les icones:
                 $form = new Form('booking-form', 'horizontal', 'data-fv-no-icon=true, novalidate'); -->

            <!-- Ajouter instructions pour le mode DEBUG:
                 $form = new Form('booking-form', 'horizontal', 'data-fv-debug=true, novalidate'); -->

            <!--====  End of Section comment  ====-->

            <h2 id="about-optimization">About optimization (CSS & JS dependencies)</h2>
            <p><strong>Without PHP Form Builder, your page loads the plugin dependencies (CSS and JavaScript files) one by one</strong>.<br>For instance, if your form uses five plugins, you will need to call at least ten files (5 CSS + 5 JavaScript),<br>which considerably increases the loading time.</p>
            <p><strong>PHP Form Builder groups and compresses all the CSS and JavaScript dependencies into a single CSS | JavaScript file</strong>.</p>
            <p>Your page will, therefore, only call two dependency files. Efficiency is maximum, no matter how many plugins you use.</p>
            <p>JavaScript dependencies can also be loaded with the excellent <a href="https://github.com/muicss/loadjs" target="_blank">loadjs library</a>.</p>
            <p>Detailed explanations are available here: <a href="javascript-plugins.php#optimization">Optimization (CSS & JS dependencies)</a></p>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="options-overview">Options</h2>
            <section class="mb-6">
                <h3>Overview</h3>
                <p>The PHP Form Builder <code>options</code> define the containers and various HTML elements your forms will use.
                    <br>The Default options are for use with Bootstrap 5.
                    <br>Each can be overwritten the way you want to match other framework
                </p>
                <p id="getOptions">You can call the <code class="language-php">getOptions(mixed $opt)</code> function at any time to display the options and their values for debugging purposes.<br>The <code class="language-php">$opt</code> argument can be an option name, or an array of options names, or null if you want to show all the options keys => values.</p>
                <p>For example, with Bootstrap, each group (label + element) has to be wrapped into a <code class="language-php">&lt;div class=&quot;form-group&quot;&gt;&lt;/div&gt;</code> and to have a <code class="language-php">.form-control class</code></p>
                <p>We also need do add <code class="language-php">.col-sm-x</code> &amp; <code class="language-php">.control-label</code> to labels, <br>and to wrap elements with <code class="language-php">&lt;div class=&quot;col-sm-x mb-3&quot;&gt;&lt;/div&gt;</code>.</p>
                <p>The form options allow us to configure it all efficiently.</p>
                <p>If needed, wrappers can contain two HTML elements.<br>
                    It can be done with <var>elementsWrapper</var>, <var>checkboxWrapper</var>, and <var>radioWrapper</var>.
                </p>
                <p>To add an input wrapper, see the <a href="#add-input-wrapper">addInputWrapper</a> function.</p>
            </section>
            <section class="mb-6">
                <h3 id="options-default">Default options (Bootstrap 5)</h3>
                <pre class="line-numbers mb-4"><code class="language-php">$bs5_options = array(
&apos;formHorizontalClass&apos;          =&gt; &apos;form-horizontal&apos;,
&apos;formVerticalClass&apos;            =&gt; &apos;&apos;,
&apos;elementsWrapper&apos;              =&gt; &apos;&lt;div class=&quot;bs5-form-stacked-element mb-3&quot;&gt;&lt;/div&gt;&apos;,
&apos;checkboxWrapper&apos;              =&gt; &apos;&lt;div class=&quot;form-check&quot;&gt;&lt;/div&gt;&apos;,
&apos;radioWrapper&apos;                 =&gt; &apos;&lt;div class=&quot;form-check&quot;&gt;&lt;/div&gt;&apos;,
&apos;helperWrapper&apos;                =&gt; &apos;&lt;span class=&quot;form-text&quot;&gt;&lt;/span&gt;&apos;,
&apos;buttonWrapper&apos;                =&gt; &apos;&lt;div class=&quot;mb-3&quot;&gt;&lt;/div&gt;&apos;,
&apos;wrapElementsIntoLabels&apos;       =&gt; false,
&apos;wrapCheckboxesIntoLabels&apos;     =&gt; false,
&apos;wrapRadiobtnsIntoLabels&apos;      =&gt; false,
&apos;elementsClass&apos;                =&gt; &apos;form-control&apos;,
&apos;wrapperErrorClass&apos;            =&gt; &apos;&apos;,
&apos;elementsErrorClass&apos;           =&gt; &apos;is-invalid&apos;,
&apos;textErrorClass&apos;               =&gt; &apos;invalid-feedback w-100 d-block&apos;,
&apos;verticalLabelWrapper&apos;         =&gt; false,
&apos;verticalLabelClass&apos;           =&gt; &apos;form-label&apos;,
&apos;verticalCheckboxLabelClass&apos;   =&gt; &apos;form-label&apos;,
&apos;verticalRadioLabelClass&apos;      =&gt; &apos;form-label&apos;,
&apos;horizontalLabelWrapper&apos;       =&gt; false,
&apos;horizontalLabelClass&apos;         =&gt; &apos;col-form-label&apos;,
&apos;horizontalLabelCol&apos;           =&gt; &apos;col-sm-4&apos;,
&apos;horizontalOffsetCol&apos;          =&gt; &apos;col-sm-offset-4 mb-3&apos;,
&apos;horizontalElementCol&apos;         =&gt; &apos;col-sm-8 mb-3&apos;,
&apos;inlineCheckboxLabelClass&apos;     =&gt; &apos;form-check-label&apos;,
&apos;inlineRadioLabelClass&apos;        =&gt; &apos;form-check-label&apos;,
&apos;inlineCheckboxWrapper&apos;        =&gt; &apos;&lt;div class=&quot;form-check form-check-inline&quot;&gt;&lt;/div&gt;&apos;,
&apos;inlineRadioWrapper&apos;           =&gt; &apos;&lt;div class=&quot;form-check form-check-inline&quot;&gt;&lt;/div&gt;&apos;,
&apos;iconBeforeWrapper&apos;            =&gt; &apos;&lt;div class=&quot;input-group-text&quot;&gt;&lt;/div&gt;&apos;,
&apos;iconAfterWrapper&apos;             =&gt; &apos;&lt;div class=&quot;input-group-text&quot;&gt;&lt;/div&gt;&apos;,
&apos;btnGroupClass&apos;                =&gt; &apos;btn-group&apos;,
&apos;requiredMark&apos;                 =&gt; &apos;&lt;sup class=&quot;text-danger&quot;&gt;* &lt;/sup&gt;&apos;,
&apos;openDomReady&apos;                 =&gt; &apos;document.addEventListener(\&apos;DOMContentLoaded\&apos;, function(event) {&apos;,
&apos;closeDomReady&apos;                =&gt; &apos;});&apos;
);</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example of generated HTML code for each option</h4>
                        <p>The table below shows the correspondence between the options and the generated HTML code. The values of the options are arbitrary, used simply to illustrate the examples.</p>
                        <div class="table-responsive">
                            <table class="table table-striped highlight">
                                <tbody>
                                    <tr>
                                        <th class="medium">formHorizontalClass</th>
                                        <td class="text-muted small">&lt;form class="<code class="language-php">form-horizontal</code>" [...]&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">formVerticalClass</th>
                                        <td class="text-muted small">&lt;form class="<code class="language-php">form-vertical</code>" [...]&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">elementsWrapper</th>
                                        <td class="text-muted small">
                                            <code class="language-php">&lt;div class="row mb-3"&gt;</code><br>
                                            <span class="ms-3">[&lt;label&gt; ... &lt;/label&gt;]</span><br>
                                            <span class="ms-3">[&lt;input&gt;]</span><br>
                                            <code class="language-php">&lt;/div&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">checkboxWrapper</th>
                                        <td class="text-muted small">
                                            <code class="language-php">&lt;div class="form-check"&gt;</code><br>
                                            <span class="ms-3">[&lt;label&gt;]</span><br>
                                            <span class="ms-3"><span class="ms-3">[&lt;input type="checkbox"&gt;[text]]</span></span><br>
                                            <span class="ms-3">[&lt;/label&gt;]</span><br>
                                            <code class="language-php">&lt;/div&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">radioWrapper</th>
                                        <td class="text-muted small">
                                            <code class="language-php">&lt;div class="form-check"&gt;</code><br>
                                            <span class="ms-3">[&lt;label&gt;]</span><br>
                                            <span class="ms-3"><span class="ms-3">[&lt;input type="radio"&gt;]</span></span><br>
                                            <span class="ms-3">[&lt;/label&gt;]</span><br>
                                            <code class="language-php">&lt;/div&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">helperWrapper</th>
                                        <td class="text-muted small">
                                            <code class="language-php">&lt;span class=&quot;form-text&quot;&gt;</code>[Help text]<code class="language-php">&lt;/span&gt;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">buttonWrapper</th>
                                        <td class="text-muted small">
                                            <code class="language-php">&lt;div class=&quot;mb-3&quot;&gt;</code><br>
                                            <span class="ms-3">[&lt;label&gt; ... &lt;/label&gt;]</span><br>
                                            <span class="ms-3">[&lt;button&gt; ... &lt;/button&gt;]</span><br>
                                            <code class="language-php">&lt;/div&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">wrapElementsIntoLabels (if true)</th>
                                        <td class="text-muted small"><code class="language-php">&lt;label&gt;</code>[input | textarea | ...]<code class="language-php">&lt;/label&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">wrapCheckboxesIntoLabels (if true)</th>
                                        <td class="text-muted small"><code class="language-php">&lt;label&gt;</code>[checkbox]<code class="language-php">&lt;/label&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">wrapRadiobtnsIntoLabels (if true)</th>
                                        <td class="text-muted small"><code class="language-php">&lt;label&gt;</code>[radio]<code class="language-php">&lt;/label&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">elementsClass</th>
                                        <td class="text-muted small">&lt;input class="<code class="language-php">form-control</code>" [...]&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">wrapperErrorClass</th>
                                        <td class="text-muted small">&lt;div class="[form-group] <code class="language-php">has-error</code>"&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">elementsErrorClass</th>
                                        <td class="text-muted small">&lt;input class="[form-control] <code class="language-php">error-class</code>" [...]&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">textErrorClass</th>
                                        <td class="text-muted small">&lt;p class="<code class="language-php">text-danger</code>"&gt; ... &lt;/p&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">verticalLabelWrapper</th>
                                        <td class="text-muted small">if <span class="var-value">true</span>, the labels will be wrapped in a &lt;div class="<code class="language-php">verticalLabelClass</code>"&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">verticalLabelClass</th>
                                        <td class="text-muted small">&lt;div class="<code class="language-php">verticalLabelClass</code>"&gt;[label]&lt;/div&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">verticalCheckboxLabelClass</th>
                                        <td class="text-muted small">&lt;label for="[fieldname]" class="<code class="language-php">verticalCheckboxLabelClass</code>"&gt;[text]&lt;/label&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">verticalRadioLabelClass</th>
                                        <td class="text-muted small">&lt;label for="[fieldname]" class="<code class="language-php">verticalRadioLabelClass</code>"&gt;[text]&lt;/label&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">horizontalLabelWrapper</th>
                                        <td class="text-muted small">if <span class="var-value">true</span>, the labels will be wrapped in a div with the column class instead of having the column class themselves</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">horizontalLabelClass,<br>horizontalLabelCol</th>
                                        <td class="text-muted small">&lt;label class="<code class="language-php">col-sm-4</code> <code class="language-php">control-label</code>"&gt;...&lt;/label&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">horizontalOffsetCol</th>
                                        <td class="text-muted small">
                                            // when label is empty, automaticaly offsetting field container<br>
                                            &lt;div class="<code class="language-php">col-sm-offset-4</code> [col-sm-8]"&gt;<br>
                                            <span class="ms-3">[&lt;input&gt;]</span><br>
                                            &lt;/div&gt;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">horizontalElementCol</th>
                                        <td class="text-muted small">
                                            &lt;div class="<code class="language-php">col-sm-8 mb-3</code>"&gt;<br>
                                            <span class="ms-3">[&lt;input&gt;]</span><br>
                                            &lt;/div&gt;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">inlineCheckboxLabelClass</th>
                                        <td class="text-muted small">&lt;label class="<code class="language-php">checkbox-inline</code>"&gt;...&lt;/label&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">inlineRadioLabelClass</th>
                                        <td class="text-muted small">&lt;label class="<code class="language-php">radio-inline</code>"&gt;...&lt;/label&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">inlineCheckboxWrapper</th>
                                        <td class="text-muted small">
                                            <code class="language-php">&lt;div class="form-check form-check-inline"&gt;</code><br>
                                            <span class="ms-3">[input type="checkbox"]</span><br>
                                            <span class="ms-3">[label]</span><br>
                                            <code class="language-php">&lt;/div&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">inlineRadioWrapper</th>
                                        <td class="text-muted small">
                                            <code class="language-php">&lt;div class="form-check form-check-inline"&gt;</code><br>
                                            <span class="ms-3">[input type="radio"]</span><br>
                                            <span class="ms-3">[label]</span><br>
                                            <code class="language-php">&lt;/div&gt;</code>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">iconBeforeWrapper</th>
                                        <td class="text-muted small">&lt;div class="<code class="language-php">input-group-text icon-before</code>"&gt;[input with addon]&lt;/div&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">iconAfterWrapper</th>
                                        <td class="text-muted small">&lt;div class="<code class="language-php">input-group-text icon-after</code>"&gt;[input with addon]&lt;/div&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">btnGroupClass</th>
                                        <td class="text-muted small">&lt;div class=&quot;<code class="language-php">btn-group</code>&quot;&gt;...&lt;/div&gt;</td>
                                    </tr>
                                    <tr>
                                        <th class="medium">requiredMark</th>
                                        <td class="text-muted small">
                                            // required markup is automaticaly added on required fields<br>
                                            &lt;label&gt;my required text<code class="language-php">&lt;sup class="text-danger"&gt; *&lt;/sup&gt;</code>&lt;/label&gt;
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="medium">openDomReady</th>
                                        <td class="text-muted small"><code class="language-php">document.addEventListener(\'DOMContentLoaded\', function(event) {</code></td>
                                    </tr>
                                    <tr>
                                        <th class="medium">closeDomReady</th>
                                        <td class="text-muted small"><code class="language-php">});</code></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="options-customizing">Customizing for another framework</h3>
                <p>You can use PHP Form Builder with any framework, e.g., <strong>Semantic-UI, Pure, Skeleton, UIKit, Milligram, Susy, Bulma, Kube, etc.</strong></p>
                <p>You simply have to change the options to match your framework HTML &amp; CSS classes:</p>
                <pre class="line-numbers mb-4"><code class="language-php">$options = array(
    // your options here
);

$form->setOptions($options);</code></pre>
                <p>If you always use the same framework, the best way is to create a custom function with your custom config in the <code>FormExtended</code> class.</p>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="main-functions">Main functions - General</h2>
            <section class="mb-6">
                <h3 id="construct">construct</h3>
                <pre><code class="language-php">$form = new Form(string $formId, string $layout = 'horizontal', string $attr = '', string $framework = 'bs5');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Defines the layout (horizontal | vertical).
 * Default is 'horizontal'
 * Clears values from the PHP session if static::clear has been called before
 * Catches posted errors
 * Adds hidden field with the form ID
 * Sets elements wrappers
 *
 * @param  string $formId   The ID of the form
 * @param  string $layout    (Optional) Can be 'horizontal' or 'vertical'
 * @param  string $attr      (Optional) Can be any HTML input attribute or js event EXCEPT class
 *                           (class is defined in layout param).
 *                           attributes must be listed separated with commas.
 *                           Example : novalidate,onclick=alert(\'clicked\');
 * @param  string $framework (Optional) bs4 | bs5 | bulma | foundation | material | tailwind | uikit
 *                           (Bootstrap 4, Bootstrap 5, Bulma, Foundation, Material design, Tailwind, UIkit)
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="setOptions">options</h3>
                <p>Call <code class="language-php">setOptions()</code> only if you change defaults options</p>
                <p>Go to <a href="#options-overview">Options</a> for more details</p>
                <pre><code class="language-php">$form->setOptions($options);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">    /**
    * Sets form layout options to match your framework
    * @param array $userOptions (Optional) An associative array containing the
    *                            options names as keys and values as data.
    */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="setMode">Mode (production vs. development)</h3>
                <p>Default mode is <code class="language-php">production</code>.</p>
                <pre><code class="language-php">$form->setMode(string $mode);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * set the form mode to 'development' or 'production'
 * in production mode, all the plugins dependencies are combined and compressed in a single css or js file.
 * the css | js files are saved in plugins/min/css and plugins/min/js folders.
 * these 2 folders have to be wrirable (chmod 0755+)
 *
 * @param  string $mode 'development' | 'production'
 * @return \phpformbuilder\Form
 */</code></pre>
                <p>Detailed explanations available here: <a href="https://phpformbuilder.pro/documentation/javascript-plugins.php#optimization">Optimization (CSS & JS dependencies)</a></p>
            </section>
            <section class="mb-6">
                <h3 id="setAction">Action</h3>
                <p>Default action is <code class="language-php">htmlspecialchars($_SERVER["PHP_SELF"])</code>.</p>
                <p><code class="language-php">htmlspecialchars</code> prevents attackers from exploiting the code by injecting HTML or JavaScript code (Cross-site Scripting attacks) in forms (recommended on <a href="https://www.w3schools.com/php/php_form_validation.asp">https://www.w3schools.com/php/php_form_validation.asp</a>)</p>
                <p>Call <code class="language-php">setAction()</code> only if you change default action</p>
                <pre><code class="language-php">$form->setAction(string $url, bool $addGetVars = true);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Redefines form action
 *
 * @param string  $url          The URL to post the form to
 * @param boolean $addGetVars (Optional) If $addGetVars is set to false,
 *                              url vars will be removed from destination page.
 *                              Example : www.myUrl.php?var=value => www.myUrl.php
 *
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="setLayout">Layout</h3>
                <p>Set the layout of the form ("horizontal" or "vertical")</p>
                <pre><code class="language-php">$form->setLayout(string $layout);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Set the layout of the form.
 *
 * @param string $layout The layout to use. Can be "horizontal" or "vertical".
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="setMethod">Method</h3>
                <p>The default method is <code class="language-php">POST</code>.</p>
                <p>Call <code class="language-php">setMethod()</code> only if you change default method</p>
                <pre><code class="language-php">$form->setMethod(string $method);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * set sending method
 *
 * @param  string $method POST|GET
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="startFieldset">Start Fieldset</h3>
                <p>Start your fieldset with an optional legend.<br>
                    Don't forget to call <code class="language-php">endFieldset</code> to end your fieldset.
                </p>
                <p>You can add several fieldsets on the same form.</p>
                <pre><code class="language-php">$form->startFieldset(string $legend = '', string $fieldsetAttr = '', string $legendAttr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Starts a fieldset tag.
 *
 * @param string $legend (Optional) Legend of the fieldset.
 * @param string $fieldsetAttr (Optional) Fieldset attributes.
 * @param string $legendAttr (Optional) Legend attributes.
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="endFieldset">End Fieldset</h3>
                <pre><code class="language-php">$form->endFieldset();</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Ends a fieldset tag.
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="startDependentFields">startDependentFields</h3>
                <p>Start a dependent fields block.<br>
                    The <em>dependent fields</em> block is hidden and will be shown if <code class="language-php">$parentField</code> changes to one of <code class="language-php">$showValues</code>.<br>
                    Don't forget to call <code class="language-php">endDependentFields</code> to end your Dependent Fields block.
                </p>
                <p>if <code class="language-php">$inverse</code> is true, dependent fields will be shown if any other value than $showValues is selected</p>
                <p>Each Dependent fields block can include one or several dependent fields blocks.</p>
                <p class="alert alert-warning has-icon">Dependent fields MUST NOT START with the same fieldname as their parent field.</p>
                <pre><code class="language-php">$form->startDependentFields($parentField, $showValues[, $inverse = false]);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">    /**
    * Start a hidden block
    * which can contain any element and html
    * Hiden block will be shown on $parentField change
    * if $parentField value matches one of $showValues
    * @param  string $parentField name of the field which will trigger show/hide
    * @param  string $showValues  single value or comma separated values which will trigger show.
    * @param  boolean $inverse  if true, dependent fields will be shown if any other value than $showValues is selected.
    * @return void
    */</code></pre>
                <p>Live examples with code are available here: <a href="javascript-plugins.php#dependent-fields-example">javascript-plugins.php#dependent-fields-example</a></p>
            </section>
            <section class="mb-6">
                <h3 id="endDependentFields">endDependentFields</h3>
                <pre><code class="language-php">$form->endDependentFields();</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">    /**
    * Ends Dependent Fields block.
    */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="attr">$attr argument</h3>
                <p>Several element functions use a <code class="language-php">$attr</code> argument.</p>
                <p>The <code class="language-php">$attr</code> argument accepts <strong>any HTML attribute</strong> or <strong>javascript event</strong>.</p>
                <p>Use comma-separated values (see examples below).</p>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Examples</p>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('text', 'name', '', 'Your name: ', 'id=my-id, placeholder=My Text, required=required');
    $form->addInput('password', 'pass', '', 'Your password: ', 'required=required, pattern=(.){7\,15}');
    $form->addTextarea('my-textarea', '', 'Your message: ', 'cols=30, rows=4');
    $form->addBtn('button', 'myBtnName', 1, 'Cancel', 'class=btn btn-danger, onclick=alert(\'cancelled\');');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="attr-form-example" action="class-doc.php#attr" method="post" class="form-horizontal">
                                <div class="row"><label for="my-id" class="col-sm-4 col-form-label">Your name: <sup class="text-danger">* </sup></label>
                                    <div class="col-sm-8 mb-3"><input id="my-id" name="name" type="text" value="" placeholder="My Text" required="required" class="form-control"></div>
                                </div>
                                <div class="row"><label for="pass" class="col-sm-4 col-form-label">Your password: <sup class="text-danger">* </sup></label>
                                    <div class="col-sm-8 mb-3"><input id="pass" name="pass" type="password" value="" required="required" pattern="(.){7,15}" class="form-control"></div>
                                </div>
                                <div class="row"><label for="my-textarea" class="col-sm-4 col-form-label">Your message: </label>
                                    <div class="col-sm-8 mb-3"><textarea id="my-textarea" name="my-textarea" cols="30" rows="4" class="form-control"></textarea></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-offset-4 col-sm-8 mb-3"><button type="button" name="myBtnName" value="1" class="btn btn-danger" onclick="alert('cancelled');">Cancel</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <h2 id="elements">Elements</h2>
            <section class="mb-6">
                <h3 id="addInput">Input</h3>
                <pre><code class="language-php">$form->addInput(string $type, string $name, string $value = '', string $label = '', string $attr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Adds an input element to the form.
 *
 * @param string $type  The type of the input element.
 *                      Accepts all input html5 types except checkbox and radio :
 *                      button, color, date, datetime, datetime-local,
 *                      email, file, hidden, image, month, number, password,
 *                      range, reset, search, submit, tel, text, time, url, week
 * @param string $name  The name of the input element.
 * @param string $value (Optional) The default value of the input element.
 * @param string $label (Optional) The label of the input element.
 * @param string $attr  (Optional) Any additional attributes for the input element.
 *                      Can be any HTML input attribute or js event.
 *                      attributes must be listed separated with commas.
 *                      If you don't specify any ID as attr, the ID will be the input's name.
 *                      Example : class=my-class,placeholder=My Text,onclick=alert(\'clicked\');
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="addTextarea">Textarea</h3>
                <pre><code class="language-php">$form->addTextarea(string $name, string $value = '', string $label = '', string $attr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
* Adds textarea to the form
* @param string $name  The textarea name
* @param string $value (Optional) The textarea default value
* @param string $label (Optional) The textarea label
* @param string $attr  (Optional) Can be any HTML input attribute or js event.
*                      attributes must be listed separated with commas.
*                      If you don't specify any ID as attr, the ID will be the name of the textarea.
*                      Example : cols=30, rows=4;
* @return \phpformbuilder\Form
*/</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="addOption">Options for Select list</h3>
                <p class="alert alert-warning has-icon">Always add your options BEFORE creating the select element</p>
                <ol class="list-timeline">
                    <li class="d-flex align-items-start">
                        <span class="badge bg-yellow-300 text-yellow-600 badge-circle">1</span>
                        <span class="timeline-content">Add your options</span>
                    </li>
                    <li class="d-flex align-items-start">
                        <span class="badge bg-yellow-300 text-yellow-600 badge-circle">2</span>
                        <span class="timeline-content">Create your select</span>
                    </li>
                </ol>
                <pre><code class="language-php">$form->addOption(string $selectName, string $value, string $txt, string $groupName = '', string $attr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Adds option to the $selectName element
 *
 * IMPORTANT : Always add your options BEFORE creating the select element
 *
 * @param string $selectName The name of the select element
 * @param string $value       The option value
 * @param string $txt         The text that will be displayed
 * @param string $groupName  (Optional) the optgroup name
 * @param string $attr        (Optional) Can be any HTML input attribute or js event.
 *                            attributes must be listed separated with commas.
 *                            If you don't specify any ID as attr, the ID will be the name of the option.
 *                            Example : class=my-class
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="addSelect">Select list</h3>
                <pre><code class="language-php">$form->addSelect(string $selectName, string $label = '', string $attr = '', bool $displayGroupLabels = true);</code></pre>
                <div class="alert alert-info has-icon mb-5">
                    <p><code class="language-php">addSelect()</code> function plays nice with <a href="javascript-plugins.php#bootstrap-select-example">bootstrap-select plugin</a> and <a href="javascript-plugins.php#select2-example">select2 plugin</a>.</p>
                    <p>Add the <span class="var-value">selectpicker</span> class for <em>Bootstrap select</em> or the <span class="var-value">select2</span> class for the <em>Select2</em> plugin, data-attributes and phpformbuilder will do the job.</p>
                    <p class="mb-0">Don't forget to <a href="javascript-plugins.php#plugins-overview">activate your plugins</a> to add the required css/js files to your page.</p>
                </div>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Adds a select element
 *
 * IMPORTANT : Always add your options BEFORE creating the select element
 *
 * @param string $selectName        The name of the select element
 * @param string $label              (Optional) The select label
 * @param string $attr               (Optional)  Can be any HTML input attribute or js event.
 *                                   attributes must be listed separated with commas.
 *                                   If you don't specify any ID as attr, the ID will be the input's name.
 *                                   Example : class=my-class
 * @param bool   $displayGroupLabels (Optional) True or false.
 *                                   Default is true.
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example with optgroup</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addOption('select-with-groupnames', 'option-1', 'option 1', 'group 1');
    $form->addOption('select-with-groupnames', 'option-2', 'option 2', 'group 1', 'selected=selected');
    $form->addOption('select-with-groupnames', 'option-3', 'option 3', 'group 1');
    $form->addOption('select-with-groupnames', 'option-4', 'option 4', 'group 2');
    $form->addOption('select-with-groupnames', 'option-5', 'option 5', 'group 2');
    $form->addSelect('select-with-groupnames', 'Select please: ', '');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="select-test-2" action="class-doc.php#addSelect" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="select-with-groupnames" class="col-sm-4 col-form-label">
                                        Select please:
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <select id="select-with-groupnames" name="select-with-groupnames" class="form-control">
                                            <optgroup label="group 1">
                                                <option value="option-1">
                                                    option 1
                                                </option>
                                                <option value="option-2" selected="selected">
                                                    option 2
                                                </option>
                                                <option value="option-3">
                                                    option 3
                                                </option>
                                            </optgroup>
                                            <optgroup label="group 2">
                                                <option value="option-4">
                                                    option 4
                                                </option>
                                                <option value="option-5">
                                                    option 5
                                                </option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example with multiple selections</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    for ($i=1; $i &lt; 11; $i++) {
        $form->addOption('myMultipleSelectName[]', $i, 'option ' . $i);
    }
    $form->addSelect('myMultipleSelectName[]', 'Select please:<br>(multiple selections)', 'multiple=multiple');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="select-test-2-form" action="class-doc.php#addSelect" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="myMultipleSelectName" class="col-sm-4 col-form-label">
                                        Select please:(multiple selections)
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <select id="myMultipleSelectName" name="myMultipleSelectName[]" multiple="multiple" class="form-control">
                                            <option value="1">
                                                option 1
                                            </option>
                                            <option value="2">
                                                option 2
                                            </option>
                                            <option value="3">
                                                option 3
                                            </option>
                                            <option value="4">
                                                option 4
                                            </option>
                                            <option value="5">
                                                option 5
                                            </option>
                                            <option value="6">
                                                option 6
                                            </option>
                                            <option value="7">
                                                option 7
                                            </option>
                                            <option value="8">
                                                option 8
                                            </option>
                                            <option value="9">
                                                option 9
                                            </option>
                                            <option value="10">
                                                option 10
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="addCountrySelect">Country Select list</h3>
                <p>The <code>addCountrySelect()</code> function generates a <strong>full country select dropdown list</strong> with all the countries options. Fortunately, you don't have to add the options one by one. The function does it for you.</p>
                <p>You can choose your prefered plugin, which can be <code>slimselect</code> (default), <code>bootstrap-select</code> or <code>select2</code>.</p>
                <p>If you choose the <code>bootstrap-select</code> plugin keep in mind that it requires <a href="https://getbootstrap.com/javascript/#dropdowns">Bootstrap's dropdown</a> in your bootstrap.min.js</p>
                <pre><code class="language-php">$form->addCountrySelect(string $selectName, string $label = '', string $attr = '', array $userOptions = []);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * adds a country select list with flags
 * @param string  $selectName
 * @param string $label        (Optional) The select label
 * @param string $attr         (Optional)  Can be any HTML input attribute or js event.
 *                             attributes must be listed separated with commas.
 *                             If you don't specify any ID as attr, the ID will be the name of the select.
 *                             Example : class=my-class
 * @param array  $userOptions (Optional) :
 *                             plugin          : slimselect | select2 | bootstrap-select    Default: 'slimselect'
 *                             lang            : MUST correspond to one subfolder of [$this->pluginsUrl]countries/country-list/country/cldr/
 *                             *** for example 'en', or 'fr_FR'                 Default : 'en'
 *                             flags           : true or false.                 Default : true
 *                             *** displays flags into option list
 *                             flag_size       : 16 or 32                       Default : 32
 *                             return_value    : 'name' or 'code'               Default : 'name'
 *                             *** type of the value that will be returned
 * @return \phpformbuilder\Form
 */</code></pre>
                <p>Live examples with code are available here:<br>
                    <a href="javascript-plugins.php#slimselect-example">javascript-plugins.php#slimselect-example</a>
                    <a href="javascript-plugins.php#bootstrap-select-example">javascript-plugins.php#bootstrap-select-example</a><br>
                    <a href="javascript-plugins.php#select2-example">javascript-plugins.php#select2-example</a>
                </p>
            </section>
            <section class="mb-6">
                <h3 id="addTimeSelect">Time Select list</h3>
                <p>The <code>addTimeSelect()</code> function generates an hours:minutes drop-down list. The options allow you to set a minimum time, a maximum time, the interval in minutes between each option, and the separator character.</p>
                <pre><code class="language-php">$form->addTimeSelect(string $selectName, string $label = '', string $attr = '', array $userOptions = []);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * adds an hours:minutes select dropdown
 * @param  string $selectName
 * @param  string $label       (Optional) The select label
 * @param  string (Optional)   Can be any HTML input attribute or js event.
 *                             attributes must be listed separated with commas.
 *                             If you don't specify any ID as attr, the ID will be the name of the select.
 *                             Example : class=my-class
 * @param array  $userOptions (Optional) :
 *                             min       : the minimum time in hour:minutes                   Default: '00:00'
 *                             max       : the maximum time in hour:minutes                   Default: '23:59'
 *                             step      : the step interval in minutes between each option   Default: 1
 *                             format    : '12hours' or '24hours'                             Default : '24hours'
 *                             display_separator : the displayed separator character between hours and minutes  Default : 'h'
 *                             value_separator   : the value separator character between hours and minutes  Default : ':'
 * @return \phpformbuilder\Form
 */</code></pre>
                <p>Live examples with code are available here:<br>
                    <a href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/booking-form.php">https://www.phpformbuilder.pro/templates/bootstrap-5-forms/booking-form.php</a>
                    <a href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/car-rental-form.php">https://www.phpformbuilder.pro/templates/bootstrap-5-forms/car-rental-form.php</a>
                </p>
            </section>
            <section class="mb-6">
                <h3 id="addRadio">Radio Btns</h3>
                <ol>
                    <li>Add your radio buttons</li>
                    <li>Call printRadioGroup</li>
                </ol>
                <pre><code class="language-php">$form->addRadio(string $groupName, string $label, string $value, string $attr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Adds radio button to $groupName element
 *
 * @param string $groupName The radio button groupname
 * @param string $label      The radio button label
 * @param string $value      The radio button value
 * @param string $attr       (Optional) Can be any HTML input attribute or js event.
 *                           attributes must be listed separated with commas.
 *                           Example : checked=checked
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="printRadioGroup">Print Radio Group</h3>
                <pre><code class="language-php">$form->printRadioGroup(string $groupName, string $label = '', bool $inline = true, string $attr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Prints radio buttons group.
 *
 * @param string $groupName The radio button group name
 * @param string $label      (Optional) The radio buttons group label
 * @param bool   $inline     (Optional) True or false.
 *                           Default is true.
 * @param string $attr       (Optional) Can be any HTML input attribute or js event.
 *                           attributes must be listed separated with commas.
 *                           Example : class=my-class
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addRadio('myRadioBtnGroup', 'choice one', 'value 1');
    $form->addRadio('myRadioBtnGroup', 'choice two', 'value 2', 'checked=checked');
    $form->addRadio('myRadioBtnGroup', 'choice three', 'value 3');
    $form->printRadioGroup('myRadioBtnGroup', 'Choose one please', true, 'required=required');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="radio-test" action="class-doc.php#add-radio" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="myRadioBtnGroup" required="required" class="main-label col-sm-4 col-form-label">
                                        Choose one please <sup class="text-danger">* </sup>
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="myRadioBtnGroup_0" name="myRadioBtnGroup" value="value 1" required class="form-check-input">
                                            <label for="myRadioBtnGroup_0" class="form-check-label">
                                                choice one
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="myRadioBtnGroup_1" name="myRadioBtnGroup" value="value 2" required checked="checked" class="form-check-input">
                                            <label for="myRadioBtnGroup_1" class="form-check-label">
                                                choice two
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" id="myRadioBtnGroup_2" name="myRadioBtnGroup" value="value 3" required class="form-check-input">
                                            <label for="myRadioBtnGroup_2" class="form-check-label">
                                                choice three
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p>Several plugins are available to replace the ugly browser default radio buttons with nice ones:</p>
                <ul>
                    <li><a href="javascript-plugins.php#nice-check-example">Nice Check</a></li>
                    <li><a href="javascript-plugins.php#icheck-example">iCheck</a></li>
                    <li><a href="javascript-plugins.php#lcswitch-example">LcSwitch</a></li>
                </ul>
            </section>
            <section class="mb-6">
                <h3 id="addCheckbox">Checkboxes</h3>
                <ol>
                    <li>Add your checkboxes</li>
                    <li>Call printCheckboxGroup</li>
                </ol>
                <pre><code class="language-php">$form->addCheckbox(string $groupName, string $label, string $value, string $attr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Adds checkbox to $groupName
 *
 * @param string $groupName The checkbox button groupname
 * @param string $label      The checkbox label
 * @param string $value      The checkbox value
 * @param string $attr       The checkbox attributes
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="printCheckboxGroup">Print Checkbox Group</h3>
                <pre><code class="language-php">$form->printCheckboxGroup(string $groupName, string $label = '', bool $inline = true, string $attr = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Prints checkbox group.
 *
 * @param string $groupName The checkbox group name (will be converted to an array of indexed value)
 * @param string $label      (Optional) The checkbox group label
 * @param bool   $inline     (Optional) True or false.
 *                           Default is true.
 * @param string $attr       (Optional) Can be any HTML input attribute or js event.
 *                           attributes must be listed separated with commas.
 *                           Example : class=my-class
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addCheckbox('myCheckboxGroup', 'choice one', 'value 1');
    $form->addCheckbox('myCheckboxGroup', 'choice two', 'value 2', 'checked=checked');
    $form->addCheckbox('myCheckboxGroup', 'choice three', 'value 3', 'checked=checked');
    $form->printCheckboxGroup('myCheckboxGroup', 'Check please: ', true, 'required=required');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="checkbox-test" action="" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="myCheckboxGroup" required="required" class="main-label col-sm-4 col-form-label">
                                        Check please: <sup class="text-danger">* </sup>
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" id="myCheckboxGroup_0" name="myCheckboxGroup[]" value="value 1" class="form-check-input">
                                            <label for="myCheckboxGroup_0" class="form-check-label">
                                                choice one
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" id="myCheckboxGroup_1" name="myCheckboxGroup[]" value="value 2" checked="checked" class="form-check-input">
                                            <label for="myCheckboxGroup_1" class="form-check-label">
                                                choice two
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" id="myCheckboxGroup_2" name="myCheckboxGroup[]" value="value 3" checked="checked" class="form-check-input">
                                            <label for="myCheckboxGroup_2" class="form-check-label">
                                                choice three
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p>Several plugins are available to replace the ugly browser default checkboxes with nice ones:</p>
                <ul>
                    <li><a href="javascript-plugins.php#nice-check-example">Nice Check</a></li>
                    <li><a href="javascript-plugins.php#icheck-example">iCheck</a></li>
                    <li><a href="javascript-plugins.php#lcswitch-example">LcSwitch</a></li>
                </ul>
            </section>
            <section class="mb-6">
                <h3 id="addBtn">Buttons</h3>
                <p>For a <strong>single button</strong>, just call <code class="language-php">addBtn()</code> and let <span class="var-value">$btnGroupName</span> empty.</p>
                <p>For <strong>button group</strong>, call <code class="language-php">addBtn()</code> for each button, give a name to <span class="var-value">$btnGroupName</span>, then call <code class="language-php">printBtnGroup()</code></p>
                <pre><code class="language-php">$form->addBtn(string $type, string $name, string $value, string $text, string $attr = '', string $btnGroupName = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Adds a button to the form
 *
 * If $btnGroupName is empty, the button will be automatically displayed.
 * Otherwise, you'll have to call printBtnGroup to display your btnGroup.
 *
 * @param string $type         The html button type
 * @param string $name         The button name
 * @param string $value        The button value
 * @param string $text         The button text
 * @param string $attr         (Optional) Can be any HTML input attribute or js event.
 *                             attributes must be listed separated with commas.
 *                             If you don't specify any ID as attr, the ID will be the input's name.
 *                             Example : class=my-class,onclick=alert(\'clicked\');
 * @param string $btnGroupName (Optional) If you wants to group several buttons, group them then call printBtnGroup.
 * @return \phpformbuilder\Form
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="printBtnGroup">Print Btn Group</h3>
                <pre><code class="language-php">$form->printBtnGroup(string $btnGroupName, string $label = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Prints buttons group.
 *
 * @param string $btnGroupName The buttons' group name
 * @param string $label        (Optional) The buttons group label
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Single button example</h4>
                        <div class="code-example">
                            <pre><code class="language-php">$form->addBtn('submit', 'myBtnName', 1, 'Submit form', 'class=btn btn-primary');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <div class="form-group row justify-content-end">
                                <div class=" col-sm-8 mb-3">
                                    <button type="submit" name="myBtnName" value="1" class="btn btn-primary">
                                        Submit form
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Button group example</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addBtn('submit', 'mySubmitBtnName', 1, 'Submit form', 'class=btn btn-primary', 'myBtnGroup');
    $form->addBtn('button', 'myCancelBtnName', 0, 'Cancel', 'class=btn btn-danger, onclick=alert(\'cancelled\');', 'myBtnGroup');
    $form->printBtnGroup('myBtnGroup');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <div class="form-group row justify-content-end">
                                <div class=" col-sm-8 mb-3">
                                    <div class="btn-group">
                                        <button type="submit" name="mySubmitBtnName" value="1" class="btn btn-primary">
                                            Submit form
                                        </button>
                                        <button type="button" name="myCancelBtnName" value="0" class="btn btn-danger" onclick="alert('cancelled');">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="addHtml">Custom HTML</h3>
                <p>You can add some HTML code at any place you want when creating your form.</p>
                <p>This way, you can:</p>
                <ul>
                    <li><a href="#html-between-elements">Add HTML between elements</a></li>
                    <li><a href="#html-prepend-append">Prepend or append HTML to elements</a></li>
                    <li><a href="#add-input-wrapper">Wrap elements with tags</a></li>
                </ul>
                <pre><code class="language-php">$form->addHtml(string $html, string $elementName = '', string $pos = 'after');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Adds HTML code at any place of the form
 *
 * @param string $html         The html code to add.
 * @param string $elementName (Optional) If not empty, the html code will be inserted
 *                             just before or after the element.
 * @param string $pos          (Optional) If $elementName is not empty, defines the position
 *                             of the inserted html code.
 *                             Values can be 'before' or 'after'.
 * @return \phpformbuilder\Form
 */</code></pre>
                <p class="alert alert-warning has-icon">When your HTML is linked to an element, always call <code class="language-php">addHtml()</code> BEFORE creating the element.</p>
                <div class="alert alert-info has-icon">
                    <p>To add helper texts, icons, buttons, or any input group addon, use the shortcut functions:</p>
                    <ul>
                        <li><a href="class-doc.php#add-helper">Add Helper</a></li>
                        <li><a href="class-doc.php#add-addon">Add Addon</a></li>
                        <li><a href="class-doc.php#add-icon">Add Icon</a></li>
                    </ul>
                </div>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2" id="html-between-elements">Add HTML between elements</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('text', 'input-name', '', 'Your name: ');
    $form->addHtml('&lt;p class="alert alert-danger"&gt;Your email address is required&lt;/p&gt;');
    $form->addInput('text', 'email', '', 'Your email', 'required');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="html-test" action="class-doc.php#addHtml" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="input-name" class="col-sm-4 col-form-label">
                                        Your name:
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <input id="input-name" name="input-name" type="text" value="" class="form-control">
                                    </div>
                                </div>
                                <p class="alert alert-danger">
                                    Your email address is required
                                </p>
                                <div class="form-group row justify-content-end">
                                    <label for="email" class="col-sm-4 col-form-label">
                                        Your email <sup class="text-danger">* </sup>
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <input id="email" name="email" type="text" value="" required class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2" id="html-prepend-append">Prepend or append HTML to elements</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('text', 'input-name-2', '', 'Your name: ');
    $form->addHtml('&lt;p class="form-text alert alert-danger"&gt;Your email address is required&lt;/p&gt;', 'email-2', 'after');
    $form->addInput('text', 'email-2', '', 'Your email', 'required');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="custom-html-test" action="" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="input-name-2" class="col-sm-4 col-form-label">
                                        Your name:
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <input id="input-name-2" name="input-name-2" type="text" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <label for="email-2" class="col-sm-4 col-form-label">
                                        Your email <sup class="text-danger">* </sup>
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <input id="email-2" name="email-2" type="text" value="" required class="form-control">
                                        <p class="form-text alert alert-danger">
                                            Your email address is required
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="add-input-wrapper">Custom HTML with input wrapper</h3>
                <p class="alert alert-warning has-icon">wrapper can be one or two html elements</p>
                <pre><code class="language-php">$form->addInputWrapper(string $html, string $elementName);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Wraps the element with HTML code.
 *
 * @param string $html         The HTML code to wrap the element with.
 *                             The HTML tag must be opened and closed.
 *                             Example : <div class="my-class"></div>
 * @param string $elementName The form element to wrap.
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addInputWrapper('&lt;div class="bg-dark rounded p-2"&gt;&lt;div class="bg-white rounded p-2"&gt;&lt;/div&gt;&lt;/div&gt;', 'imput-wrapped');
    $form->addInput('text', 'imput-wrapped', '', 'Input wrapped with custom divs');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="add-input-wrapper-test" action="class-doc.php#add-input-wrapper" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="imput-wrapped" class="col-sm-4 col-form-label">
                                        Input wrapped with custom divs
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <div class="bg-dark rounded p-2">
                                            <div class="bg-white rounded p-2">
                                                <input id="imput-wrapped" name="imput-wrapped" type="text" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <h2 id="rendering">Rendering</h2>
            <section class="mb-6">
                <h3 id="render">Render</h3>
                <p>Renders the form.</p>
                <p>Set <code class="language-php">$debug</code> to <code class="language-php">true</code> if you wants to display HTML code of the form on your page</p>
                <pre><code class="language-php">$form->render(bool $debug = false);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Renders the form.
 *
 * @param bool $debug (optional) Whether to enable debug mode. Default is false.
 * @return void
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="get-code">getCode</h3>
                <p>Return the form code.</p>
                <p>Set <code class="language-php">$debug</code> to <code class="language-php">true</code> if you want the code to be returned inside a <code class="language-php">&lt;pre&gt;&lt;/pre&gt;</code> tag</p>
                <pre><code class="language-php">$form->getCode(bool $debug = false);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Get the code for rendering the form.
 *
 * @param bool $debug Whether to enable debug mode or not.
 *                    With debug mode enabled, the HTML code will be returned inside a &lt;pre&gt;&lt;/pre&gt; tag.
 * @return string The generated HTML code for rendering the form.
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="ajax-loading">Ajax loading</h3>
                <p>PHP Form Builder allows you to load your forms with Ajax.</p>
                <p>Loading in Ajax allows to:</p>
                <ul>
                    <li class="mb-3">integrate your forms on any HTML page</li>
                    <li class="mb-3">load the forms asynchronously, which is suitable for your page loading speed</li>
                </ul>
                <p class="h4">To load your form with Ajax:</p>
                <ol class="list-timeline">
                    <li class="d-flex align-items-start">
                        <span class="badge bg-yellow-300 text-yellow-600 badge-circle">1</span>
                        <span class="timeline-content">
                            Create your form using the built-in PHP functions and save it in a PHP file somewhere on your server.<br>Set the <code class="language-php">ajax</code> option to <code class="language-php">true</code> to enable Ajax loading.<br>Here's a sample code:
                            <pre class="line-numbers mb-4"><code class="language-php">&lt;?php

use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    start session and include form class
============================================= */

$formId = 'my-form';

session_start();
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

/* =============================================
    validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken($formId) === true) {
    // do stuff
}

/* ==================================================
    The Form
================================================== */

$form = new Form($formId, 'horizontal', 'data-fv-no-icon=true, novalidate');
// $form->setMode('development');

// enable Ajax loading
$form->setOptions(['ajax' => true]);

// add your fields & plugins here

// render the form
$form->render();
</code></pre>
                        </span>
                    </li>
                    <li class="d-flex align-items-start">
                        <span class="badge bg-yellow-300 text-yellow-600 badge-circle">2</span>
                        <span class="timeline-content">
                            In your main file (html):<br>Create a div with a specific id, for instance:
                            <pre class="line-numbers mb-4"><code class="language-php">&lt;div id=&quot;ajax-form&quot;&gt;&lt;/div&gt;</code></pre>
                        </span>
                    </li>
                    <li class="d-flex align-items-start">
                        <span class="badge bg-yellow-300 text-yellow-600 badge-circle">3</span>
                        <span class="timeline-content">
                            In your main file (html):<br>
                            Add the JavaScript code to load your form:
                            <pre class="line-numbers mb-4"><code class="language-html">&lt;!-- Ajax form loader --&gt;

&lt;!-- Change the src url below if necessary --&gt;
&lt;script src=&quot;/phpformbuilder/plugins/ajax-data-loader/ajax-data-loader.min.js&quot;&gt;&lt;/script&gt;

&lt;script&gt;
    // --- SETUP YOUR FORM(S) BELOW IN THE &quot;ajaxForms&quot; VARIABLE ---
    var ajaxForms = [
        {
            formId: &apos;ajax-contact-form-1&apos;,
            container: &apos;#ajax-form&apos;,
            url: &apos;ajax-forms/contact-form-1.php&apos;
        }
    ];

    // --- NO NEED TO CHANGE ANYTHING AFTER THIS LINE ---
    // --- COPY/PASTE THE FOLLOWING CODE IN THE HTML FILE THAT WILL LOAD THE FORM ---

    document.addEventListener(&apos;DOMContentLoaded&apos;, function() {
        ajaxForms.forEach(function(currentForm) {
            const $formContainer = document.querySelector(currentForm.container);
            if (typeof($formContainer.dataset.ajaxForm) === &apos;undefined&apos;) {
                fetch(currentForm.url)
                .then((response) =&gt; {
                    return response.text()
                })
                .then((data) =&gt; {
                    $formContainer.innerHTML = &apos;&apos;;
                    $formContainer.dataset.ajaxForm = currentForm;
                    $formContainer.dataset.ajaxFormId = currentForm.formId;
                    loadData(data, currentForm.container);
                }).catch((error) =&gt; {
                    console.log(error);
                });
            }
        });
    });
&lt;/script&gt;</code></pre>
                        </span>
                    </li>
                </ol>
                <p>You'll find an example here: <a href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/ajax-loaded-contact-form-1.html">https://www.phpformbuilder.pro/templates/bootstrap-5-forms/ajax-loaded-contact-form-1.html</a></p>
            </section>
            <section class="mb-6">
                <h3 id="useLoadJs">useLoadJs</h3>
                <p>Use the great LoadJs library to load CSS & JavaScript plugins dependencies.</p>
                <p>This feature is perfect for fast loading optimization ; it requires to include the <a href="https://github.com/muicss/loadjs">LoadJs JavaScript library</a> in your page</p>
                <p>Details &amp; sample codes here: <a href="javascript-plugins.php#async-loading-with-load-js-library">javascript-plugins.php#async-loading-with-load-js-library</a></p>
                <pre><code class="language-php">$form->useLoadJs(string $bundle = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * load scripts with loadJS
 * https://github.com/muicss/loadjs
 *
 * @param  string $bundle optional loadjs bundle name to wait for
 * @return void
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="getIncludes">Get the plugins includes</h3>
                <p>The <code class="language-php">getIncludes()</code> function returns the HTML code required by each plugin used in your form. Unlike the <a href="#printIncludes">printIncludes()</a> function, it returns the code but does not display it ("return" instead of "echo").</p>
                <pre><code class="language-php">getIncludes(string $type, bool $debug = false);</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="printIncludes">Print plugins includes</h3>
                <p>The <code class="language-php">printIncludes()</code> function inserts the CSS & JavaScript files required by each plugin used in your form.</p>
                <p>Call <code class="language-php">printIncludes()</code> at the right places (generally css inside your <code class="language-php">&lt;head&gt;&lt;/head&gt;</code> section, and js just before <code class="language-php">&lt;/body&gt;</code>).</p>
                <p class="alert alert-warning has-icon">If your form contains no plugin, no need to call this function.</p>
                <pre><code class="language-php">printIncludes(string $type, bool $debug = false, bool $display = true);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Prints html code to include css or js dependancies required by plugins.
 * i.e.:
 *     &lt;link rel=&quot;stylesheet&quot; ... /&gt;
 *     &lt;script src=&quot;...&quot;&gt;&lt;/script&gt;
 *
 * @param string  $type                 value : 'css' or 'js'
 * @param bool $debug                (Optional) True or false.
 *                                      If true, the html code will be displayed
 * @param bool $display              (Optional) True or false.
 *                                      If false, the html code will be returned but not displayed.
 * @return string|object $finalOutput|$this
 */</code></pre>
                <h4 class="mb-2">About optimization</h4>
                <p><strong>PHP Form Builder is conceived for maximum optimization and speedy loading time.</strong></p>
                <p>Detailed explanations available here: <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#optimization">Optimization (CSS & JS dependencies)</a></p>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example with colorpicker plugin</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('text', 'my-color', '', 'Pick a color:', 'data-colorpicker=true');

    // call this just before &lt;/head&gt;
    $form->printIncludes('css');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <pre class="line-numbers mb-4"><code class="language-php">&lt;link href=&quot;../../phpformbuilder/plugins/colorpicker/themes/classic.min.css&quot; rel=&quot;stylesheet&quot; media=&quot;screen&quot;&gt;</code></pre>
                        </div>
                        <hr>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('text', 'my-color', '', 'Pick a color:', 'data-colorpicker=true');

    // call this just before &lt;/body&gt;
    $form->printIncludes('js');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <pre class="line-numbers mb-4"><code class="language-php">&lt;script src=&quot;../../phpformbuilder/plugins/colorpicker/pickr.min.js&quot;&gt;&lt;/script&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="getJsCode">Get the plugins JS code</h3>
                <p>The <code class="language-php">getJsCode()</code> function returns the JS code generated by the plugin. Unlike the <a href="#printJsCode">printJsCode()</a> function, it returns the code but does not display it ("return" instead of "echo").</p>
                <pre><code class="language-php">getJsCode(string $type, bool $debug = false);</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="printJsCode">Print plugins JS code</h3>
                <p>Prints the JS code generated by the plugin.</p>
                <p class="alert alert-warning has-icon">If your form contains no plugin, no need to call this function.</p>
                <pre><code class="language-php">$form->printJsCode(bool $debug = false, bool $display = true);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Prints js code generated by plugins.
 * @param bool $debug   (Optional) True or false.
 *                         If true, the html code will be displayed
 * @param bool $display (Optional) True or false.
 *                         If false, the html code will be returned but not displayed.
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example with colorpicker plugin</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('text', 'my-color', '', 'Pick a color:', 'data-colorpicker=true');
    $form->printJsCode();</code></pre>
                        </div>
                        <div class="output pt-5">
                            <pre class="line-numbers mb-4"><code class="language-php">    &lt;script type=&quot;text/javascript&quot;&gt;
        document.addEventListener(&apos;DOMContentLoaded&apos;, function(event) {
            phpfbColorpicker[&quot;#my-color&quot;] = Pickr.create({
                // ...
            });
        });
    &lt;/script&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            <h2>Utilities</h2>
            <section class="mb-6">
                <h3 id="groupElements">Input Groups</h3>
                <p>Input Groups allow having several inputs/selects on the same line in horizontal forms.</p>
                <p>You can group up to twelve elements.</p>
                <p><strong>There's two ways to set arguments:</strong></p>
                <ul>
                    <li>
                        <pre class="line-numbers mb-4"><code class="language-php">    // 1st way: each fieldname as argument
    $form->groupElements('street', 'zip', 'countries');</code></pre>
                    </li>
                    <li>
                        <pre class="line-numbers mb-4"><code class="language-php">    // 2nd way: a single array including all fieldnames as argument
    $fields = array('street', 'zip', 'countries');
    $form->groupElements($fields);</code></pre>
                    </li>
                </ul>
                <p class="alert alert-warning has-icon">Always create your input group BEFORE creating the input elements.</p>
                <pre><code class="language-php">$form->groupElements($input1, $input2, ..., $input12 = '');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Allows to group inputs in the same wrapper
 *
 * Arguments can be :
 *     -    a single array with fieldnames to group
 *     OR
 *     -    fieldnames given as strings
 *
 * @param string|array $input1 The name of the first input of the group
 *                             OR
 *                             array including all fieldnames
 *
 * @param string $input2 The name of the second input of the group
 * @param string $input3 [optional] The name of the third input of the group
 * @param string $input4 [optional] The name of the fourth input of the group
 * @param string ...etc.
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Input Groups Example</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->startFieldset('Personal informations');
    $form->groupElements('street', 'zip', 'countries');
    $form->setCols(3, 4);
    $form->addInput('text', 'street', '', 'Your address: ', 'placeholder=street,required=required');
    $form->setCols(0, 2);
    $form->addInput('text', 'zip', '', '', 'placeholder=zip code,required=required');
    $form->setCols(0, 3);
    $form->addOption('countries', '', 'Countries');
    $form->addOption('countries', 'United States', 'United States');
    $form->addOption('countries', 'Canada', 'Canada');
    $form->addOption('countries', 'France', 'France');
    $form->addSelect('countries', '', '');
    $form->endFieldset();</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="input-group-test" action="class-doc.php#groupElements" method="post" class="form-horizontal">
                                <fieldset>
                                    <legend>
                                        Personal informations
                                    </legend>
                                    <div class="form-group row justify-content-end">
                                        <label for="street" class="col-sm-3 col-form-label">
                                            Your address: <sup class="text-danger">* </sup>
                                        </label>
                                        <div class="col-sm-4 mb-3">
                                            <input id="street" name="street" type="text" value="" placeholder="street" required="required" class="form-control">
                                        </div>
                                        <div class=" col-sm-2 mb-3">
                                            <input id="zip" name="zip" type="text" value="" placeholder="zip code" required="required" class="form-control">
                                        </div>
                                        <div class=" col-sm-3 mb-3">
                                            <select id="countries" name="countries" class="form-control">
                                                <option value="">
                                                    Countries
                                                </option>
                                                <option value="United States">
                                                    United States
                                                </option>
                                                <option value="Canada">
                                                    Canada
                                                </option>
                                                <option value="France">
                                                    France
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="set-cols">Set Cols</h3>
                <p>The <code class="language-php">setCols()</code> function wraps label and fields with columns.</p>
                <p>The columns can only be set in horizontal forms.</p>
                <pre><code class="language-php">$form->setCols(int $labelColNumber, int $fieldColNumber, string $breakpoint = 'sm');</code></pre>
                <p class="alert alert-info has-icon"><strong>Bootstrap 4 / 5 auto column</strong><br>Bootstrap 4 &amp; Bootstrap 5 allows automatic-width columns.<br>To build automatic-width columns, set <span class="var-value">$fieldsCols</span> to <span class="var-value">-1</span></p>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Shortcut for labels & cols options
 *
 * @param int $labelColNumber number of columns for label
 * @param int $fieldColNumber number of columns for fields
 * @param string $breakpoint Bootstrap's breakpoints : xs | sm | md |lg
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">$form->setCols(3, 9);
$form->addInput('text', 'username', '', 'Name');</code></pre>
                        </div>
                        <div class="output pt-5">
                            Will generate the following markup:
                            <pre class="line-numbers mb-4"><code class="language-php">    &lt;div class="form-group row justify-content-end"&gt;
        &lt;label for="username" class="col-sm-3 col-form-label"&gt;
            Name
        &lt;/label&gt;
        &lt;div class="col-sm-9 mb-3"&gt;
            &lt;input id="username" name="username" type="text" value=""  class="form-control"&gt;
        &lt;/div&gt;
    &lt;/div&gt;</code></pre>
                            Equivalent to:
                            <pre class="line-numbers mb-4"><code class="language-php">    $options = array(
        'horizontalLabelCol'       => 'col-sm-3',
        'horizontalElementCol'     => 'col-sm-9'
    );
    $form->setOptions($options);
    $form->addInput('text', 'username', '', 'Name');</code></pre>
                        </div>
                    </div>
                </div>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Bootstrap 4 automatic-width example</h4>
                        <div class="code-example">
                            <pre><code class="language-php">    $form->setCols(-1, -1, 'sm');
    $form->groupElements('user-name', 'user-first-name');
    $form->addInput('text', 'user-name', '', 'Name', 'required, placeholder=Name');
    $form->addInput('text', 'user-first-name', '', 'First name', 'required, placeholder=First Name');

    $form->setCols(-1, -1); // without breakpoint
    $form->addIcon('user-email', '&lt;i class=&quot;bi bi-envelope&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;', 'before');
    $form->addInput('email', 'user-email', '', '', 'required, placeholder=Email');</code></pre>
                        </div>
                        <div class="output pt-5">
                            Will generate the following markup:
                            <pre class="line-numbers mb-4"><code class="language-php">    &lt;div class=&quot;form-group row justify-content-end&quot;&gt;
        &lt;label for=&quot;user-name&quot; class=&quot;col-sm col-form-label&quot;&gt;
            Name &lt;sup class=&quot;text-danger&quot;&gt;* &lt;/sup&gt;
        &lt;/label&gt;
        &lt;div class=&quot;col-sm mb-3&quot;&gt;
            &lt;input id=&quot;user-name&quot; name=&quot;user-name&quot; type=&quot;text&quot; value=&quot;&quot; required placeholder=&quot;Name&quot; class=&quot;form-control fv-group&quot;&gt;
        &lt;/div&gt;
        &lt;label for=&quot;user-first-name&quot; class=&quot;col-sm col-form-label&quot;&gt;
            First name &lt;sup class=&quot;text-danger&quot;&gt;* &lt;/sup&gt;
        &lt;/label&gt;
        &lt;div class=&quot;col-sm mb-3&quot;&gt;
            &lt;input id=&quot;user-first-name&quot; name=&quot;user-first-name&quot; type=&quot;text&quot; value=&quot;&quot; required placeholder=&quot;First Name&quot; class=&quot;form-control fv-group&quot;&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;form-group row justify-content-end&quot;&gt;
        &lt;div class=&quot; col-sm mb-3&quot;&gt;
            &lt;div class=&quot;input-group&quot;&gt;
                &lt;div class=&quot;input-group-prepend&quot;&gt;
                    &lt;span class=&quot;input-group-text&quot;&gt;&lt;i class=&quot;bi bi-envelope&quot; aria-hidden=&quot;true&quot;&gt;&lt;/i&gt;&lt;/span&gt;
        &lt;/div&gt;
        &lt;input id=&quot;user-email&quot; name=&quot;user-email&quot; type=&quot;email&quot; value=&quot;&quot; required placeholder=&quot;Email&quot; class=&quot;form-control&quot;&gt;
    &lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="add-helper">Add Helper</h3>
                <p>Adds helper text after the chosen field</p>
                <pre><code class="language-php">$form->addHelper(string $helperText, string $elementName);</code></pre>
                <p class="alert alert-warning has-icon"><code class="language-php">addHelper()</code> MUST always be called BEFORE creating the element
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Shortcut to add element helper text
 *
 * @param string $helperText    The helper text or HTML to add.
 * @param string $elementName   the helper text will be inserted just after the element.
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $form->addHelper('Enter your last name', 'last-name');
    $form->addInput('text', 'last-name', '', 'Last name', 'required');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="add-helper-form" action="" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="last-name" class="col-sm-4 col-form-label">
                                        Last name <sup class="text-danger">* </sup>
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <input id="last-name" name="last-name" type="text" value="" required class="form-control">
                                        <small class="form-text text-muted">Enter your last name</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="add-addon">Add Addon</h3>
                <p>Adds button or text addon before or after the chosen field</p>
                <pre><code class="language-php">$form->addAddon(string $inputName, string $addonHtml, string $pos);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * shortcut to prepend or append any adon to an input
 * @param string $inputName the name of target input
 * @param string $addonHtml  addon html code
 * @param string $pos        before | after
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $addon = '&lt;button class="btn btn-warning" type="button" onclick="document.getElementById(\'input-with-button-after\').value=\'\';"&gt;reset&lt;/button&gt;';
    $form->addAddon('input-with-button-after', $addon, 'after');
    $form->addInput('text', 'input-with-button-after', '', 'Your name');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="add-addon-form" action="" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="input-with-button-after" class="col-sm-4 col-form-label">
                                        Your name
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <div class="input-group">
                                            <input id="input-with-button-after" name="input-with-button-after" type="text" value="" class="form-control">
                                            <div class="input-group-append">
                                                <button class="btn btn-warning" type="button" onclick="document.getElementById('input-with-button-after').value='';">
                                                    reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="add-heading">Add Heading</h3>
                <p>Add a HTML heading tag.</p>
                <pre><code class="language-php">$form->addHeading(string $html, string $tagName = 'h4', string $attr = '')</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * add a HTML heading
 *
 * @param  string $html         the heading content text or HTML
 * @param  string $tagName     (Optional) the heading tag name (h1, h2, ...)
 * @param  string $attr         (Optional) the heading attributes
 * @return void
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $form-&gt;addHeading('Please fill the form', 'h5', 'class=text-muted');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <p class="h5 text-muted">Please fill the form</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="add-icon">Add Icon</h3>
                <p>Adds an icon before or after the chosen field</p>
                <pre><code class="language-php">$form->addIcon(string $inputName, string $iconHtml, string $pos);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * shortcut to prepend or append icon to an input
 *
 * @param string $inputName the name of target input
 * @param string $iconHtml  icon html code
 * @param string $pos        before | after
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $form->addIcon('username', '&lt;i class="bi bi-person-fill" aria-hidden="true"&gt;&lt;/i&gt;', 'before');
    $form->addInput('text', 'username', '', 'Name');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="add-icon-form" action="" method="post" class="form-horizontal">
                                <div class="form-group row justify-content-end">
                                    <label for="username" class="col-sm-4 col-form-label">
                                        Name
                                    </label>
                                    <div class="col-sm-8 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="bi bi-person-fill" aria-hidden="true"></i></span>
                                            </div>
                                            <input id="username" name="username" type="text" value="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="build-alert">buildAlert (static method)</h3>
                <p>Build an <em>alert</em> div according to the given framework</p>
                <pre><code class="language-php">Form::buildAlert(string $contentText, string $framework, string $type = 'success');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * build an Alert message according to the framework html
 *
 * @param  string $contentText
 * @param  string $framework     bs4|bs5|bulma|foundation|material|tailwind|uikit
 * @param  string $type  success|primary|info|warning|danger
 * @return string the alert HTML code
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    Form::buildAlert('&lt;strong&gt;This is a danger alert example&lt;/strong&gt;', 'bs5', 'danger');</code></pre>
                        </div>
                        <div class="output pt-5">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>This is a danger alert example</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="start-div">startDiv</h3>
                <p>Start a new HTML DIV Element</p>
                <pre><code class="language-php">$form->startDiv(string $class = '', string $id = '')</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 *
 * Start a HTML div element
 * @param string $class
 * @param string $id
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $form->startDiv('classname', 'div-id');</code></pre>
                        </div>
                        <div class="output pt-5">
                            &lt;div class=&quot;classname&quot; id=&quot;div-id&quot;&gt;
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="end-row">endDiv</h3>
                <p>End a HTML div Element</p>
                <pre><code class="language-php">$form->endDiv()</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="start-row">startRow</h3>
                <p>Start a new HTML row according to the form framework</p>
                <pre><code class="language-php">$form->startRow(string $additionalClass = '', string $id = '')</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Start a HTML row
 *
 * @param string $additionalClass
 * @param string $id
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $form->startRow();</code></pre>
                        </div>
                        <div class="output pt-5">
                            &lt;div class=&quot;row&quot;&gt;
                        </div>
                    </div>
                </div>
                <p class="h4">Others examples in templates:</p>
                <p>
                    <a href="../templates/bootstrap-5-forms/special-offer-sign-up.php">Special Offer Sign Up Form</a><br>
                    <a href="../templates/bootstrap-5-forms/order-form.php">Order Form</a><br>
                </p>
            </section>
            <section class="mb-6">
                <h3 id="end-row">endRow</h3>
                <p>End a row HTML div</p>
                <pre><code class="language-php">$form->endRow()</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="start-col">startCol</h3>
                <p>Start a new HTML responsive column according to the form framework</p>
                <pre><code class="language-php">$form->startCol(int $colNumber, string $breakpoint = 'sm', string $additionalClass = '', string $id = '')</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Start a column HTML div
 *
 * @param int $colNumber - the number of columns between 1 and 12
 * @param string $breakpoint - xs, sm, md or lg
 * @param string $additionalClass
 * @param string $id
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $form->startCol(6);</code></pre>
                        </div>
                        <div class="output pt-5">
                            &lt;div class=&quot;col-sm-6 mb-3&quot;&gt;
                        </div>
                    </div>
                </div>
                <p class="h4">Others examples in templates:</p>
                <p>
                    <a href="../templates/bootstrap-5-forms/special-offer-sign-up.php">Special Offer Sign Up Form</a><br>
                    <a href="../templates/bootstrap-5-forms/order-form.php">Order Form</a><br>
                </p>
            </section>
            <section class="mb-6">
                <h3 id="end-col">endCol</h3>
                <p>End a column HTML div</p>
                <pre><code class="language-php">$form->endCol()</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="center-content">Center Content</h3>
                <p>Center any field or element horizontally on the page. The centered elements can be displayed on the same line or stacked.</p>
                <pre><code class="language-php">$form->centerContent(bool $center = true, bool $stack = false);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * @param bool $center
 * @param bool $stack
 * @return \phpformbuilder\Form
 */</code></pre>
                <div class="card mb-6">
                    <div class="card-body">
                        <p class="h4 mb-2">Example</p>
                        <div class="code-example">
                            <pre><code class="language-php">    $form-&gt;centerContent();
    $form-&gt;addBtn(&#039;submit&#039;, &#039;submit-btn&#039;, 1, &#039;Submit&#039;, &#039;class=btn btn-success&#039;);</code></pre>
                        </div>
                        <div class="output pt-5">
                            <form id="center-content-form" action="" method="post" class="form-horizontal">
                                <div class="row phpfb-centered phpfb-centered-stacked">
                                    <div class="col-sm-12">
                                        <button type="submit" name="submit-btn" value="1" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h2 id="mainFunctionsSendMail">Email Sending</h2>
                <h3>sendMail() function</h3>
                <pre class="mb-4"><code class="language-php">$sentMessage = Form::send($options, $smtpSettings = array());</code></pre>
                <p>See details at <a href="#sendMail">Email Sending</a></p>
            </section>
            <section class="mb-6">
                <h2 id="global-registration-process">Registering / Clearing values</h2>
                <h3>Global registration process</h3>
                <p>PHP Form Builder manages the memorization of fields and posted values without you needing taking any action.</p>
                <p>If your form is posted with errors, i.e., validation fails, the posted values are automatically displayed in the corresponding fields.</p>
                <p>To <strong>set the default value of a field</strong>, it must be saved in the PHP session in this way:</p>
                <pre><code class="language-php">$_SESSION['form-id']['field-name'] = 'my-value';</code></pre>
                <p class="mb-6">If the form is posted, the field will have the posted value. Otherwise, it will have the default value registered in the PHP session.</p>
                <h4>Here's the global workflow:</h4>
                <ol class="numbered">
                    <li>You create your form and add fields.<br>
                        PHP Form Builder registers each field name in PHP session: <code class="language-php">$_SESSION['form-id']['fields'][] = 'field-name';</code>
                    </li>
                    <li>You post the form</li>
                    <li>You validate the posted values: <code class="language-php">$validator = Form::validate('form-id');</code></li>
                    <li>If the validation fails:<br>
                        The error messages are stored in PHP session: <code class="language-php">$_SESSION['errors'][$formId] as $field => $message</code>
                    </li>
                    <li>You instanciate your form again:<br>
                        PHP Form Builder registers the posted values in PHP session: <code class="language-php">$_SESSION['form-id']['field-name'] = $_POST['my-value'];</code><br>
                        PHP Form Builder gets and displays the session value and the possible error for each field.</li>
                </ol>
            </section>
            <section class="mb-6">
                <h3 id="registerValues">registerValues (static function)</h3>
                <p class="alert alert-info has-icon">When you instantiate a form, it automatically stores corresponding posted values in session unless you called the <a href="#clear">clear function</a> before creating your form.<br><br>Values are registered this way: <span class="var-value">$_SESSION['form-id']['field-name']</span></p>
                <p>You can call <code class="language-php">Form::registerValues('form-id')</code> manually at any time.</p>
                <pre><code class="language-php">Form::registerValues('form-id');</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
* register all posted values in session
* ex: $_SESSION['form-id']['field-name'] = $_POST['field-name'];
*
* @param string $formId
* @return void
*/</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="mergeValues">mergeValues (static function)</h3>
                <p class="alert alert-info has-icon">mergeValues is used to merge previously registered values in a single array.<br>Usefull for step forms to send all steps values by email or store into database for example.</span></p>
                <pre><code class="language-php">Form::mergeValues(array('step-form-1', 'step-form-2', 'step-form-3'));</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * merge previously registered session vars => values of each registered form
 * @param  array $formsArray array of forms IDs to merge
 * @return array pairs of names => values
 *                           ex : $values[$fieldName] = $value
 */</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="clear">clear (static function)</h3>
                <p>Clears the corresponding previously registered values from session.</p>
                <pre><code class="language-php">Form::clear('form-id');</code></pre>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="validation-overview">Validation</h2>
            <section class="mb-6">
                <h3 id="validation-overview">Overview</h3>
                <p>PHP Form Builder comes with <strong>two different validation systems</strong>.</p>
                <ol>
                    <li><strong>PHP Validation</strong><br>The form is validated after being posted. It is a PHP validation, essential for security.</li>
                    <li><strong>JavaScript Validation</strong><br>The fields are validated on the fly for better User Experience.</li>
                </ol>
                <p class="alert alert-info has-icon">Never forget: The only way to avoid security issues is <strong>PHP Validation</strong>.<br>Users can easily disable JavaScript and get around the JavaScript validation.</p>
            </section>
            <h3 id="php-validation-basics">PHP Validation</h3>
            <section class="mb-6">
                <h3>Basics</h3>
                <p><strong>To create a new validator object and auto-validate required fields, use this standard-code</strong><br><small>(replace 'form-id' with your form ID)</small></p>
                <pre class="line-numbers mb-4"><code class="language-php">    /* =============================================
    validation if posted
    ============================================= */

    if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('form-id') === true) {

        // create validator & auto-validate required fields
        $validator = Form::validate('form-id');

        // additional validation
        $validator->maxLength(100)->validate('message');
        $validator->email()->validate('user-email');

        // check for errors
        if ($validator->hasErrors()) {
        $_SESSION['errors']['form-id'] = $validator->getAllErrors();
        } else {
            // validation passed, you can send email or do anything
        }
    }</code></pre>
                <dl>
                    <dt>
                        <pre><code class="language-php">$validator = Form::validate('form-id');</code></pre>
                    </dt>
                    <dd class="mb-4">This loads the Validator, then creates a new Validator object, and finally validates the required fields, if any.<br><strong>Required fields validation is automatic</strong>. There's nothing more to do.</dd>
                    <dt>
                        <pre><code class="language-php">    // additional validation
    $validator->maxLength(100)->validate('message');
    $validator->email()->validate('user-email');</code></pre>
                    <dd class="mb-4">Then we use $validator native methods for others validations<br>(email, date, length, ...)</dd>
                    <dt>
                        <pre><code class="language-php">    // check for errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['form-id'] = $validator->getAllErrors();
    }</code></pre>
                    </dt>
                    <dd class="mb-4">If there are some errors, we register them in the PHP session.<br>The form will automatically display the error messages.</dd>
                </dl>
            </section>
            <section class="mb-6">
                <h3 id="dependent-fields-validation">Dependent fields validation</h3>
                <p>Dependent fields validation is something magic.</p>
                <p><strong><code class="language-php">Form::validate()</code> validates the required dependent fields only if their parent field value matches the condition to display them</strong>.</p>
                <p>If you use additional validators, for example <code class="language-php">$validator->email()->validate('user-email');</code> you have to test if the field has to be validated or not according to your dependent fields conditions:</p>
                <pre class="line-numbers mb-4"><code class="language-php">    if ($_POST['parent-field'] == 'value') {
        $validator->email()->validate('user-email');
    }</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="php-validation-methods">Php Validator Methods</h3>
                <div class="alert alert-info has-icon">
                    <p>To validate an array, use the <strong>dot syntax</strong>.<br><br>Example: <code class="language-php">&lt;select name=&quot;my-field[]&quot; multiple=&quot;multiple&quot;&gt;</code></p>
                    <pre class="line-numbers mb-4"><code class="language-php">    $validator->required()->validate('my-field.0');

    /* if at least 2 values must be selected: */

    $validator->required()->validate(array('my-field.0', 'my-field.1'));</code></pre>
                </div>
                <p>The validation is done with <a href="https://github.com/blackbelt/php-validation">blackbelt's php-validation class</a>.</p>
                <p>Complete documentation at <a href="https://github.com/blackbelt/php-validation">https://github.com/blackbelt/php-validation</a>.</p>
                <p>I just added these features:</p>
                <ul>
                    <li>Captcha validation support for the <a href="#captcha-example">included captcha plugin</a></li>
                    <li><a href="#php-validation-multilanguage">Multilanguage support</a></li>
                    <li>
                        Patterns validation for the <a href="#passfield-example">included passfield plugin</a>:
                        <ul>
                            <li>$validator->hasLowercase()->validate($fieldName);</li>
                            <li>$validator->hasUppercase()->validate($fieldName);</li>
                            <li>$validator->hasNumber()->validate($fieldName);</li>
                            <li>$validator->hasSymbol()->validate($fieldName);</li>
                            <li>$validator->hasPattern('/custom_regex/')->validate($fieldName);</li>
                        </ul>
                    </li>
                </ul>
                <h3>Available methods: </h3>

                <dl class="row">
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">jsCaptcha(<em>$field, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">Added to validate included jsCaptcha plugin.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">hcaptcha(<em>$secretKey, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">Added to validate included hcaptcha plugin.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">recaptcha(<em>$secretKey, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">Added to validate included recaptcha plugin.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">required(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value is required.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">email(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be a valid email address string.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">float(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be a float.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">integer(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be an integer.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">digits(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be a digit (integer with no upper bounds).</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">min(<em>$limit, $include = TRUE, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be greater than $limit (numeric). $include defines if the value can be equal to the limit.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">max(<em>$limit, $include = TRUE, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be less than $limit (numeric). $include defines if the value can be equal to the limit.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">between(<em>$min, $max, $include = TRUE, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be between $min and $max (numeric). $include defines if the value can be equal to $min and $max.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">minLength(<em>$length, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be greater than or equal to $length characters.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">maxLength(<em>$length, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be less than or equal to $length characters.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">length(<em>$length, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field must be $length characters long.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">matches(<em>$field, $label, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">One field matches another one (i.e. password matching)</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">notMatches(<em>$field, $label, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must not match the value of $field.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">startsWith(<em>$sub, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field must start with $sub as a string.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">notStartsWith(<em>$sub, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field must not start with $sub as a string.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">endsWith(<em>$sub, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">THe field must end with $sub as a string.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">notEndsWith(<em>$sub, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field must not end with $sub as a string.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">ip(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value is a valid IP, determined using filter_var.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">url(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value is a valid URL, determined using filter_var.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">date(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value is a valid date, can be of any format accepted by DateTime()</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">minDate(<em>$date, $format, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The date must be greater than $date. $format must be of a format on the page <a href="https://php.net/manual/en/datetime.createfromformat.php">https://php.net/manual/en/datetime.createfromformat.php</a></dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">maxDate(<em>$date, $format, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The date must be less than $date. $format must be of a format on the page <a href="https://php.net/manual/en/datetime.createfromformat.php">https://php.net/manual/en/datetime.createfromformat.php</a></dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">ccnum(<em>$message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be a valid credit card number.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">oneOf(<em>$allowed, $message = null</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must be one of the $allowed values. $allowed can be either an array or a comma-separated list of values. If comma-separated, do not include spaces unless intended for matching.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">hasLowercase(<em>$message = ''</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must contain at least one lowercase character.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">hasUppercase(<em>$message = ''</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must contain at least one uppercase character.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">hasNumber(<em>$message = ''</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must contain at least one numeric character.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">hasSymbol(<em>$message = ''</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must contain at least one symbol character.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Required</span><code class="language-php">hasPattern(<em>$pattern, $message = ''</em>)</code>
                    </dt>
                    <dd class="col-lg-6 mb-4">The field value must match regex.</dd>
                    <dt class="col-lg-6">
                        <span class="badge bg-secondary me-2">Optional</span><code class="language-php">callback(<em>$callback, $message = '', $params = array()</em>)</code>
                    </dt>
                    <dd class="col-lg-6">Define your own custom callback validation function. $callback must pass an is_callable() check. $params can be any value, or an array if multiple parameters must be passed.</dd>
                </dl>
                <dl class="row">
                    <dt class="col-lg-6"><span class="badge bg-secondary me-2">Required</span></dt>
                    <dd class="col-lg-6 mb-2">: Empty fields are <span class="text-danger">NOT VALID</span></dd>
                    <dt class="col-lg-6"><span class="badge bg-secondary me-2">Optional</span></dt>
                    <dd class="col-lg-6">: Empty fields are <span class="teal-text">VALID</span></dd>
                </dl>
            </section>
            <section class="mb-6">
                <h3 id="php-validation-examples">Validation examples</h3>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Validation examples code</h4>
                        <h3>Main validation code</h3>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    if ($_SERVER["REQUEST_METHOD"] == "POST" &amp;&amp; Form::testToken('my-form-id') === true) {

        // create validator & auto-validate required fields
        $validator = Form::validate('contact-form-1');

        // additional validation
        $validator->email()->validate('email-field-name');

        // add custom message if you want:
        $validator->integer('You must enter a number')->validate('number-field-name');

        $validator->hcaptcha('hcaptcha-secret-key', 'Captcha Error')->validate('h-captcha-response');

        // check for errors
        if ($validator->hasErrors()) {
            $_SESSION['errors']['my-form-id'] = $validator->getAllErrors();
        }
    }</code></pre>
                        </div>
                        <hr>
                        <h3>Checkboxes validation</h3>
                        <p>If we want at least one checked:</p>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addCheckbox('chk_group', 'check 1', 1);
    $form->addCheckbox('chk_group', 'check 2', 2);
    $form->addCheckbox('chk_group', 'check 3', 3);
    $form->printCheckboxGroup('chk_group', 'check one: ');

    /* Validation: */

    if(!isset($_POST['chk_group']) || !is_array($_POST['chk_group'])) {

        /* if none are posted, we register the error */

        $validator->required('check at least one checkbox please')->validate('chk_group');
    }</code></pre>
                        </div>
                        <hr>
                        <h3>Trigger an error manually</h3>
                        <p>If we want at least 2 checked:</p>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addCheckbox('chk_group', 'check 1', 1);
    $form->addCheckbox('chk_group', 'check 2', 2);
    $form->addCheckbox('chk_group', 'check 3', 3);
    $form->printCheckboxGroup('chk_group', 'check at least 2: ');

    /* Validation: */

    if(!isset($_POST['chk_group']) || !is_array($_POST['chk_group']) || count($_POST['chk_group']) < 2) {

        /* if less than two are posted, we create a tricky validation which always throws an error */

        $validator->maxLength(-1, 'Check at least two please')->validate('chk_group');
    }</code></pre>
                        </div>
                        <hr>
                        <h3>Radio validation</h3>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addRadio('rating', 'Good', 'Good');
    $form->addRadio('rating', 'Fair', 'Fair');
    $form->addRadio('rating', 'Poor', 'Poor');
    $form->printRadioGroup('rating', 'Rate please: ', false, 'required=required');

    /* Validation: */

    $validator->required('Please rate')->validate('rating');
    </code></pre>
                        </div>
                        <hr>
                        <h3>Multiple select validation</h3>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addOption('product-choice[]', 'Books', 'Books');
    $form->addOption('product-choice[]', 'Music', 'Music');
    $form->addOption('product-choice[]', 'Photos', 'Photos');
    $form->addSelect('product-choice[]', 'What products are you interested in ?<br><small>(multiple choices)</small>', 'required=required, multiple=multiple, style=min-height:130px');

    /* Validation: */

    $validator->required('Please choose one or several product(s)')->validate('product-choice.0');</code></pre>
                        </div>
                        <hr>
                        <h3 id="recaptcha-validation">Recaptcha validation</h3>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $form->addRecaptcha('YOUR_RECAPTCHA_KEY_HERE');

    /* Validation: */

    $validator->recaptcha('YOUR_RECAPTCHA_SECRET_KEY_HERE', 'Recaptcha Error')->validate('g-recaptcha-response');</code></pre>
                        </div>
                        <hr>
                        <h3>Conditional validation</h3>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    if ($_SERVER["REQUEST_METHOD"] == "POST" &amp;&amp; Form::testToken('my-form-id') === true) {

        // 'field_name' will be validated only if $_POST['parent_field_name'] === 'Yes'
        $_SESSION['my-form-id']['required_fields_conditions']['field_name'] = array(
            'parent_field'  => 'parent_field_name',
            'show_values'   => 'Yes',
            'inverse'       => false
        );

        // create validator & auto-validate required fields
        $validator = Form::validate('my-form-id');

        // check for errors
        if ($validator->hasErrors()) {
            $_SESSION['errors']['my-form-id'] = $validator->getAllErrors();
        }
    }</code></pre>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="php-validation-multilanguage">Validation multilanguage support</h3>
                <p>The default language is 'en' (English).</p>
                <p>The currently available languages are:</p>
                <ul>
                    <li>de</li>
                    <li>en</li>
                    <li>es</li>
                    <li>fr</li>
                    <li>pt_br</li>
                </ul>
                <p>If you need other language support:
                <ol>
                    <li>Add your language to <span class="file-path">form/Validator/Validator.php</span> => <code class="language-php">_getDefaultMessage($rule, $args = null)</code></li>
                    <li>
                        instantiate with your language as second argument: <br>
                        <pre><code class="language-php">$validator = Form::validate('contact-form-1', 'fr');</code></pre>
                    </li>
                </ol>
                <p><strong>If you add your language, please share it so it can benefit other users</strong>.</p>
            </section>
            <h3>Real-time Validation (Javascript)</h3>
            <section class="mb-6">
                <h3 id="javascript-validation-getting-started">Getting started</h3>
                <p>Real-time Validation is done with the formvalidation plugin.</p>
                <ol class="numbered mb-6">
                    <li>Call plugin like you would do with any other plugin:
                        <pre class="line-numbers mb-4"><code class="language-php">$form->addPlugin('formvalidation', '#my-form'); // replace "my-form" with your form name</code></pre>
                    </li>
                    <li>Fields with the following HTML5 types/attributes will be automatically validated:
                        <pre class="line-numbers mb-4"><code class="language-php">    min="..."
    max="..."
    maxlength="..."
    minlength="..."
    pattern="..."
    required
    type="color"
    type="email"
    type="range"
    type="url"</code></pre>
                    </li>
                    <li>To add any custom validation, use HTML5 attributes with validatorname and validator option:
                        <pre class="line-numbers mb-4"><code class="language-php">&lt;?php
    $form->addInput('text', 'username', 'Username', '', 'data-fv-not-empty, data-fv-not-empty___message=The username is required and cannot be empty');</code></pre>
                        <p class="alert alert-info has-icon">Complete list of HTML5 validation attributes available at <a href="https://formvalidation.io/guide/plugins/declarative/#example-using-html-5-inputs-and-attributes">example using html 5 inputs and attributes</a></p>
                    </li>
                </ol>
                <h4>Validator icons</h4>
                <p>The JavaScript validation plugin is configured to show feedback valid/invalid icons on the right of each field.</p>
                <p>You can disable them this way:</p>
                <pre class="mb-6"><code class="language-php">$form = new Form('booking-form', 'horizontal', 'data-fv-no-icon=true, novalidate');</code></pre>
                <h4>DEBUG mode</h4>
                <p>In some complex cases, you may want to see which fields are validated or not:</p>
                <ol class="numbered mb-5">
                    <li>Enable the <strong>DEBUG mode</strong>:<br>
                        <pre><code class="language-php">$form = new Form('booking-form', 'horizontal', 'data-fv-debug=true, novalidate');</code></pre>
                    </li>
                    <li>Open your browser's console, fill in some fields, then post your form.</li>
                    <li>The form will not be submitted:<br><strong>In DEBUG mode, submit is disabled</strong>.<br>The browser's console will display the validation results:</li>
                </ol>
                <div class="text-center">
                    <img src="assets/images/jquery-validator-debug-console.png" alt="jquery validator debug console" width="425" height="279" loading="lazy" class="border rounded p1">
                </div>
            </section>
            <section class="mb-6">
                <h3 id="javascript-validation-available-methods">JavaScript validation - Available methods</h3>
                <p>The complete list of validators methods is available here: <a href="https://formvalidation.io/guide/validators/">https://formvalidation.io/guide/validators/</a>.</p>
            </section>
            <section class="mb-6">
                <h3 id="javascript-validation-form-submission">Form Submission</h3>
                <p>When the user submits the form, the validator automatically sends the form if all the fields are valid.<br>If you want to disable this behavior add the <span class="var-value">data-fv-no-auto-submit</span> attribute to your form:</p>
                <pre><code class="language-php">$form = new Form('my-form', 'vertical', 'data-fv-no-auto-submit=true, novalidate');</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="javascript-validation-callback-api">Callback & JavaScript validation API</h3>
                <p>The callback function allows you to enable/disable validators and use the <strong>Form Validation plugin API</strong> the way you want.</p>
                <p>Create a function named <span class="var-value">fvCallback</span> - The validator plugin will call it when it's ready.<br>Then you can use all the <a href="https://formvalidation.io/guide/api/" title="JavaScript validator API">validator's API</a>.</p>
                <ul>
                    <li>The callback function name is <span class="var-value">fvCallback</span></li>
                    <li>You can access the form validator instance this way:
                        <pre><code class="language-php">var form = forms['my-form'];

// form.fv is the validator
form.fv.on('core.form.invalid', function() {
    // do stuff
});</code></pre>
                    </li>
                </ul>
                <p>example of use:</p>
                <pre><code class="language-php">&lt;script type="text/javascript"&gt;
var fvCallback = function() {
    var form = forms['my-form'];

    // form.fv is the validator
    // you can then use the formvalidation plugin API
    form.fv.on('core.form.invalid', function() {
        // do stuff
    });
};
&lt;/script&gt;</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="javascript-validation-examples">Examples</h3>
                <p><a href="../templates/index.php">All the templates</a> use the JavaScript validation plugin.</p>
            </section>
            <section class="mb-6">
                <h3 id="javascript-validation-multilanguage">Multilanguage support</h3>
                <p><strong>JavaScript Validation languages files</strong> are in <span class="file-path">phpformbuilder/plugins/formvalidation/js/language/</span></p>
                <p><strong>To set your language:</strong></p>
                <ol class="numbered">
                    <li>Find your language file in <span class="file-path">phpformbuilder/plugins/formvalidation/js/locales/</span></li>
                    <li>Add the validation plugin this way:
                        <pre><code class="language-php">$jsReplacements = array('language' => 'fr_FR');
$form->addPlugin('formvalidation', '#form-name', 'default', $jsReplacements);</code></pre> where <span class="var-value">fr_FR</span> is the name of your language file.
                    </li>
                </ol>
            </section>
            <section class="mb-6">
                <h3 id="javascript-validation-more">More</h3>
                <p>The <em>Formvalidation</em> plugin comes with rich &amp; complex features.</p>
                <p>The complete documentation is available on the <a href="https://formvalidation.io/">Formvalidation plugin's official site</a>.</p>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="sendMail">Email Sending</h2>
            <section class="mb-6">
                <h3 id="sendMail">sendMail function (static)</h3>
                <pre><code class="language-php">$sentMessage = Form::sendMail(array $options, array $smtpSettings = []);</code></pre>
                <pre class="line-numbers mb-4"><code class="language-php">/**
 * Send an email with posted values and custom content
 *
 * Tests and secures values to prevent attacks (phpmailer/extras/htmlfilter.php => HTMLFilter)
 * Uses custom html/css template and replaces shortcodes - syntax : {fieldname} - in both html/css templates with posted|custom values
 * Creates an automatic html table with vars/values - shortcode : {table}
 * Merges html/css to inline style with Pelago Emogrifier
 * Sends email and catches errors with Phpmailer
 * @param  array  $options
 *                     sender_email                    : the email of the sender
 *                     sender_name [optional]          : the name of the sender
 *                     reply_to_email [optional]       : the email for reply
 *                     recipient_email                 : the email destination(s), separated with commas
 *                     cc [optional]                   : the email(s) of copies to send, separated with commas
 *                     bcc [optional]                  : the email(s) of blind copies to send, separated with commas
 *                     subject                         : The email subject
 *                     isHTML                          : Send the mail in HTML format or Plain text (default: true)
 *                     textBody                        : The email body if isHTML is set to false
 *                     attachments [optional]          : file(s) to attach : separated with commas, or array (see details inside function)
 *                     template [optional]             : name of the html/css template to use in phpformbuilder/mailer/email-templates/
 *                                           (default: default.html)
 *                     human_readable_labels [optional]: replace '-' ans '_' in labels with spaces if true (default: true)
 *                     values                          : $_POST
 *                     filter_values [optional]        : posted values you don't want to include in the e-mail automatic html table
 *                     custom_replacements [optional]  : array to replace shortcodes in email template. ex : array('mytext' => 'Hello !') will replace {mytext} with Hello !
 *                     sent_message [optional]         : message to display when email is sent. If sent_message is a string it'll be automatically wrapped into an alert div. Else if sent_message is html code it'll be displayed as is.
 *                     debug [optional]                : displays sending errors (default: false)
 *                     smtp [optional]                 : use smtp (default: false)
 *
 * @param  array  $smtpSettings
 *                         host :       String      Specify main and backup SMTP servers - i.e: smtp1.example.com, smtp2.example.com
 *                         smtp_auth:   Boolean     Enable SMTP authentication
 *                         username:    String      SMTP username
 *                         password:    String      SMTP password
 *                         smtp_secure: String      Enable TLS encryption. Accepted values: tls|ssl
 *                         port:        Number      TCP port to connect to (usually 25 or 587)
 *
 * @return string sent_message
 *                         success or error message to display on the page
 */</code></pre>
                <p class="alert alert-info has-icon">The fields named <span class="var-type">*-token</span> and <span class="var-type">*submit-btn</span> are automatically filtered.<br>It means that the posted values will not appear in the email sent.</p>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Minimal Example</h4>
                        <p><strong>The following code will :</strong></p>
                        <ul>
                            <li>Load default email template <code class="language-php">phpformbuilder/mailer/email-templates/default[.html/.css]</code></li>
                            <li>Replace template shortcode <code class="language-php">{table}</code> with an automatic HTML table with vars/ posted values</li>
                            <li>Merge HTML/CSS to inline style with Pelago Emogrifier</li>
                            <li>Send email and catch errors with PHPMailer</li>
                        </ul>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $options = array(
        'sender_email'     =>  'contact@phpformbuilder.pro',
        'recipient_email'  =>  'john.doe@gmail.com',
        'subject'          =>  'contact from PHP Form Builder'
    );
    $sentMessage = Form::sendMail($options);</code></pre>
                        </div>
                        <div class="output pt-5">
                            <p class="alert alert-success">Your message has been successfully sent !</p>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example with SMTP</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $smtpSettings = array(
        'host'        => 'smtp1.example.com',
        'smtp_auth'   => true,
        'username'    => 'myname',
        'password'    => 'mypassword',
        'smtp_secure' => 'tls',
        'port'        => 25
    );

    $options = array(
        'sender_email'     =>  'contact@phpformbuilder.pro',
        'recipient_email'  =>  'john.doe@gmail.com',
        'subject'          =>  'contact from PHP Form Builder',
        'smtp'             =>  true
    );
    $sentMessage = Form::sendMail($options, $smtpSettings);</code></pre>
                        </div>
                        <div class="output pt-5">
                            <p class="alert alert-success">Your message has been successfully sent !</p>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example with custom template</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    // Create 'my-custom-template.html' and 'my-custom-template.css' in the 'phpformbuilder/mailer/email-templates-custom/' folder
    // You can use shortcodes in your HTML template, they will be automatically replaced with the posted values.
    // For instance, {user-email} will be replaced with the real $_POST['user-email'] value.

    // You can use the special {table} shortcode to display a complete table with all the posted fieldnames / values.

    // Then:

    $emailConfig = array(
        'sender_email'    => 'contact@phpformbuilder.pro',
        'sender_name'     => 'PHP Form Builder',
        'recipient_email' => addslashes($_POST['user-email']),
        'subject'         => 'Contact From PHP Form Builder',
        'template'        => 'my-custom-template.html',
        'filter_values'   => 'submit-btn, token',
        'debug'           => true
    );
    $sentMessage = Form::sendMail($emailConfig);</code></pre>
                        </div>
                        <div class="output pt-5">
                            <p class="alert alert-success">Your message has been successfully sent !</p>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example with Text Email (no template, no HTML)</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    $emailConfig = array(
        'sender_email'    => 'contact@phpformbuilder.pro',
        'sender_name'     => 'PHP Form Builder',
        'recipient_email' => addslashes($_POST['user-email']),
        'subject'         => 'Contact From PHP Form Builder',
        'textBody'        => $_POST['message'], // textBody is required or the message won't be sent.
        'isHTML'          => false,
        'debug'           => true
    );
    $sentMessage = Form::sendMail($emailConfig);</code></pre>
                        </div>
                        <div class="output pt-5">
                            <p class="alert alert-success">Your message has been successfully sent !</p>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Complete Example using a styled template</h4>
                        <p><strong>The following code will :</strong></p>
                        <ul>
                            <li>Load a styled email template <code class="language-php">phpformbuilder/mailer/email-templates/custom[.html/.css]</code></li>
                            <li>Replace template shortcodes, including header image and colors, with the values set in <code class="language-php">$replacements</code></li>
                            <li>Replace the other template's shortcodes with the posted values</li>
                            <li>Merge HTML/CSS to inline style with Pelago Emogrifier</li>
                            <li>Send email and catch errors with Phpmailer</li>
                        </ul>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">    // email HTML template placeholders replacements
    $replacements = array(
        'tpl-header-image'              => 'https://www.phpformbuilder.pro/assets/images/phpformbuilder-preview-600-160.png',
        'tpl-content-dark-background'   => '#363331',
        'tpl-content-light-background'  => '#FAF6F2',
        'user-full-name'                => $_POST['user-first-name'] . ' ' . $_POST['user-name']
    );

    $emailConfig = array(
        'sender_email'        => 'contact@phpformbuilder.pro',
        'sender_name'         => 'Php Form Builder',
        'recipient_email'     => addslashes($_POST['user-email']),
        'subject'             => 'Contact From Php Form Builder',
        'filter_values'       => 'email-templates',
        'template'            => 'custom.html',
        'custom_replacements' => $replacements,
        'debug'               => true
    );
    $sentMessage = Form::sendMail($emailConfig);</code></pre>
                        </div>
                        <div class="output pt-5">
                            <p class="alert alert-success">Your message has been successfully sent !</p>
                        </div>
                    </div>
                </div>
                <div class="alert alert-info has-icon mb-6">
                    <p>See code example here: <a href="../templates/bootstrap-5-forms/email-templates.php">templates/bootstrap-5-forms/email-templates.php</a></p>
                </div>
                <h4>To create custom email templates:</h4>
                <ol class="numbered mb-6">
                    <li><strong>Copy/paste an existing HTML/CSS template from <span class="file-path">phpformbuilder/mailer/email-templates/</span></strong> and save it into <span class="file-path">phpformbuilder/mailer/email-templates-custom/</span> (or create a new HTML file + a new css file with both same name)</li>
                    <li><strong>Use the shortcode <span class="var-value">{table}</span> in your HTML template</strong> if you want to add an automatic HTML table with all posted values.</li>
                    <li><strong>Write the fieldnames between braces in your template</strong>.<br>They'll be replaced automatically with posted values.<br>For example: <span class="var-value">Hello {user-first-name} {user-name}</span></li>
                    <li>[optional] You can use the <span class="var-value">custom_replacements</span> option to replace specific texts in email with specific values</li>
                    <li><strong>Call <code class="language-php">sendMail()</code> function</strong> and set your HTML template in <span class="file-path">template</span> option</li>
                </ol>
                <h4>How to replace array values using sendMail() function</h4>
                <p>The best way to replace the posted array values in a custom email template is to create non-array indexed values, then add them in the sendMail <span class="var-value">custom_replacements</span> option.</p>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Example using array values</h4>
                        <div class="code-example">
                            <pre class="line-numbers mb-4"><code class="language-php">&lt;?php
    /*
    Example with three posted colors
    Email template will use {color_1}, {color_2}, {color_3}
    */

    // create index
    $i = 1;

    // loop through posted values
    foreach ($_POST['color'] as $color) {

        // name indexed variable and give it posted value
        $var = 'color_' . $i;
        $$var = $color;

        // increment index
        $i++;
    }

    $options = array(
        // [...]
        'custom_replacements'  => array(
            'color_1' => $color_1,
            'color_2' => $color_2,
            'color_3' => $color_3
        ),
        // [...]
    );

    $sentMessage = Form::sendMail($options);</code></pre>
                        </div>
                        <div class="output pt-5">
                            <p class="alert alert-success">Your message has been successfully sent !</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="attachmentsExamples">Attachments Examples</h3>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Examples using the FileUpload plugin</h4>
                        <div class="alert alert-info has-icon">
                            <p>The path of the uploaded files is defined in the fileuploader plugin configuration (variable <code class="language-php">$fileUploadConfig</code>) when you instantiate the <a href="https://www.phpformbuilder.pro/documentation/javascript-plugins.php#fileuploader">fileuploader plugin</a>.</p>
                            <p>To get the information about the uploaded file you have to call the function <code class="language-php">FileUploader::getPostedFiles</code></p>
                        </div>
                        <p></p>
                        <p><strong>Single file:</strong></p>
                        <pre class="line-numbers mb-4"><code class="language-php">    // at the beginning of your file
    use fileuploader\server\FileUploader;
    include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . 'phpformbuilder/plugins/fileuploader/server/class.fileuploader.php';

    // once the form is validated
    $options = array(
        [...]
    );

    if (isset($_POST['user-file']) && !empty($_POST['user-file'])) {
        // set the filepath according to the path defined in the fileuploader plugin configuration
        $path = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/file-uploads/';

        // get the posted filename
        $postedFile = FileUploader::getPostedFiles($_POST['user-file']);
        $filename    = $postedFile[0]['file'];

        // add the attachment to the email
        $options['attachments'] = $path . $filename;
    }

    $msg = Form::sendMail($options);</code></pre>
                        <p><strong>Multiple files separated with commas:</strong></p>
                        <pre class="line-numbers mb-4"><code class="language-php">    // at the beginning of your file
    use fileuploader\server\FileUploader;
    include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . 'phpformbuilder/plugins/fileuploader/server/class.fileuploader.php';

    // once the form is validated
    $options = array(
        [...]
    );

    if (isset($_POST['user-files']) && !empty($_POST['user-files'])) {
        // set the filepath according to the path defined in the fileuploader plugin configuration
        $path = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/file-uploads/';

        // get the posted filename
        $postedFiles = FileUploader::getPostedFiles($_POST['user-files']);
        $attachments = array();
        foreach ($postedFiles as $pf) {
            $filename = $pf['file'];
            $attachments[] = $path . $filename;
        }

        // add the attachments to the email
        $options['attachments'] = implode(',', $attachments);
    }

    $msg = Form::sendMail($options);</code></pre>
                    </div>
                </div>
                <div class="card mb-6">
                    <div class="card-body">
                        <h4 class="mb-2">Examples using input type="file"</h4>
                        <p><strong>Single file:</strong></p>
                        <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('file', 'myFile', '', 'file: ');

    $attachments = array(
        array(
            'file_path' => $_FILES['myFile']['tmp_name'],
            'file_name' => $_FILES['myFile']['name']
        )
    );

    $options = array(
        [...]
        'attachments' => $attachments,
        [...]
    );

    $msg = Form::sendMail($options);</code></pre>
                        <p><strong>Multiple files:</strong></p>
                        <pre class="line-numbers mb-4"><code class="language-php">    $form->addInput('file', 'myFile', '', 'file: ');
    $form->addInput('file', 'mySecondFile', '', 'file: ');

    $attachments = array(
        array(
            'file_path' => $_FILES['myFile']['tmp_name'],
            'file_name' => $_FILES['myFile']['name']
        ),
        array(
            'file_path' => $_FILES['mySecondFile']['tmp_name'],
            'file_name' => $_FILES['mySecondFile']['name']
        )
    );

    $options = array(
        [...]
        'attachments' => $attachments,
        [...]
    );
    $msg = Form::sendMail($options);</code></pre>
                    </div>
                </div>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="database-overview">Database PDO Library</h2>
            <p>PHP Form Builder uses the PowerLite PDO library to interact with the database. The library is located in the <span class="file-path">phpformbuilder/vendor/migliori</span> folder.</p>
            <p>PowerLite PDO is a Database Abstraction Layer (<abbr title="Database Abstraction Layer">DBAL</abbr>) and provides everything you need to work with the database and execute queries.</p>
            <p>The package is available on Github at <a href="https://github.com/migliori/power-lite-pdo" title="PowerLite PDO on Github">https://github.com/migliori/power-lite-pdo</a>.</p>
            <p>The full documentation is available at <a href="https://www.powerlitepdo.com/docs/" title="PowerLite PDO documentation">https://www.powerlitepdo.com/docs/</a>.</p>

            <p>Here's for convenience a quick overview of the PowerLite PDO library's main features:</p>

            <section class="mb-6">
                <h3 id="database-connection">Database connection</h3>
                <ol class="numbered mb-5">
                    <li>Set your localhost/production database connection settings in <span class="file-path">phpformbuilder/vendor/migliori/power-lite-pdo/src/connection.php</span></li>
                    <li>Add the <code>use</code> statement at the beginning of your PHP code.</li>
                    <li>Load the container and instanciate the DB object.</li>
                    <li>Build your queries with the help of the DB methods.</li>
                </ol>
                <p class="h4">Example:</p>
                <pre class="line-numbers mb-4"><code class="language-php">use Migliori\PowerLitePdo\Db;

$root = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);

/* =============================================
    Database connection
============================================= */

$container = require_once $root . '/phpformbuilder/vendor/migliori/power-lite-pdo/src/bootstrap.php';
$db = $container->get(Db::class);
</code></pre>
            </section>

            <section class="mb-6">
                <h3 id="database-select">Database Select Examples</h3>

                <h4 class="mb-2">$db->query - <small>With SQL code and placeholders</small></h4>
                <pre class="line-numbers mb-5"><code class="language-php">// Execute a SQL query with (or without) placeholders, then fetch the results
$sql = 'SELECT * FROM test_table';
$db->query($sql);

// Execute the same query in debug mode
$rows = $db->query($sql, $values, true);

// Execute a SQL query with placeholders
$sql = 'SELECT id, name, age FROM test_table WHERE active = :active';
$values = array('active' => true);
$db->query($sql, $values);

// loop through the results
while ($row = $db->fetch()) {
    echo $row->name . '&lt;br&gt;';
}

// or fetch all the records then loop
// (this function should not be used if a huge number of rows have been selected, otherwise it will consume a lot of memory)
$rows = $db->fetchAll();

foreach($rows as $row) {
    echo $row->name . '<br>';
}</code></pre>

                <h4 class="mb-2">$db->select - <small>The DB class creates the SQL query for you</small></h4>
                <pre class="line-numbers mb-5"><code class="language-php">// Setup the query
$columns = array('id', 'name');
$where   = false;
$extras = array('order_by' => 'name ASC');
$db->select('test_table', $columns, $where, $extras);

// loop through the results
while ($row = $db->fetch()) {
    echo $row->name . '&lt;br&gt;';
}

// or fetch all the records then loop
// (this function should not be used if a huge number of rows have been selected, otherwise it will consume a lot of memory)
$rows = $db->fetchAll();

foreach($rows as $row) {
    echo $row->name . '<br>';
}</code></pre>

                <h4 class="mb-2">$db->convertQueryToSimpleArray - <small>Convert the rows to an associative array then loop</small></h4>
                <pre class="mb-4"><code class="language-php">$db->select('states', 'state_code, state_name');
$result = $db->fetchAll(PDO::FETCH_ASSOC);

$array = $db->convertQueryToSimpleArray($result, 'state_name', 'state_code');
print_r($array);

/* will output something like:
Array
(
    [AL] => Alabama
    [AK] => Alaska
    [AZ] => Arizona
)
*/</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="database-insert">Database Insert</h3>
                <pre class="line-numbers mb-4"><code class="language-php">// Insert a new record
$values = array('name' => 'Riley', 'age' => 30, 'active' => false);

if (!$db->insert('test_table', $values)) {
    $msg = Form::buildAlert($db->error(), 'bs5', 'danger');
} else {
    $id  = $db->getLastInsertId();
    $msg = Form::buildAlert('1 Record inserted ; id = #' . $id, 'bs5', 'success');
}

echo $msg;

// Try it in debug mode
$success = $db->insert('test_table', $values, true);</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="database-update">Database Update</h3>
                <pre class="line-numbers mb-4"><code class="language-php">// Update an existing record
$update = array('age' => 35);
$where  = array('name' => 'Riley');

if (!$db->update('test_table', $update, $where)) {
    $msg = Form::buildAlert($db->error(), 'bs5', 'danger');
} else {
    $msg = Form::buildAlert('Database updated successfully', 'bs5', 'success');
}

echo $msg;</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="database-delete">Database Delete</h3>
                <pre class="line-numbers mb-4"><code class="language-php">// Delete records
$where = array('active' => false);

if (!$db->delete('test_table', $where)) {
    $msg = Form::buildAlert($db->error(), 'bs5', 'danger');
} else {
    $msg = Form::buildAlert('1 record deleted', 'bs5', 'success');
}

echo $msg;</code></pre>
            </section>
            <section class="mb-6">
                <h3 id="database-debug">Errors & Debug</h3>
                <p>All functions that perform queries can be called with <em>debug</em> mode enabled.</p>
                <p>Please refer to the official documentation at <a href="https://www.powerlitepdo.com/docs/1.0.0/debugging-in-powerlitepdo/">https://www.powerlitepdo.com/docs/1.0.0/debugging-in-powerlitepdo/</a></p>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="security">Security</h2>
            <section class="mb-6">
                <h3 id="security-xss">Protection against XSS<br><small>(Cross-Site Scripting)</small></h3>
                <h4>How it works</h4>
                <ol class="numbered mb-5">
                    <li>Each fieldname is registered in the PHP session when a form is created.</li>
                    <li>Each posted value is registered in the PHP session when a form is posted.</li>
                    <li>If validation is ok, call <code class="language-php">Form::clear('form-id');</code> to clear all previously registered values</li>
                    <li>If validation fails, the form will fill fields using the user-posted values stored in the PHP session, protected using <code class="language-php">htmlspecialchars()</code>.</li>
                </ol>
                <div class="alert alert-info has-icon">
                    <p>To display posted values on your pages, always protect with htmlspecialchars(): <code class="language-php">htmlspecialchars($_POST['value'])</code></p>
                    <p>To register posted values into your database: </p>
                    <ul>
                        <li>protect with addslashes(): <code class="language-php">addslashes(htmlspecialchars($_POST['value']))</code></li>
                        <li>or just with addslashes id you want to keep html intact: <code class="language-php">addslashes($_POST['value'])</code></li>
                        <li>or use <a href="#database-insert">built-in Mysql class protection</a></li>
                    </ul>
                </div>
            </section>
            <section class="mb-6">
                <h3 id="securityt-csrf">Protection against CSRF<br><small>(Cross-Site Request Forgeries)</small></h3>
                <p>A security token is automatically added to each form.</p>
                <p>The token is valid for 1800 seconds (30mn) without refreshing the page.</p>
                <p>Validate posted token this way:</p>
                <pre class="line-numbers mb-4"><code class="language-php">    if(Form::testToken('my-form-id') === true) {
        // token valid, no CSRF.
    }</code></pre>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="extending-main-class">Extending main class</h2>
            <section class="mb-6">
                <p><strong>Extending PHP Form Builder allows creating a complete form or form parts using a single customized function.</strong></p>
                <p>Created form or parts can be validated the same way, using a single customized function.</p>
                <div class="alert alert-success has-icon">
                    <p>Very useful if you want, for example:</p>
                    <ul>
                        <li>Create a complete contact form and use it on several projects</li>
                        <li>Create several similar fields in a single form</li>
                        <li>Create and reuse several fields in different forms</li>
                    </ul>
                </div>
                <p>See live examples with code in <a href="../templates/index.php?forms=extended">Templates</a></p>
                <p>See <span class="file-path">class/phpformbuilder/FormExtended.php</span> code</a></p>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="chaining-methods">Chaining methods</h2>
            <section class="mb-6">
                <p><strong>All the public non-static methods can be chained.</strong></p>
                <h3>The classic way:</h3>
                <pre class="line-numbers mb-4"><code class="language-php">/* ==================================================
    The Form
    ================================================== */

    $form = new Form(&#039;contact-form-2&#039;, &#039;vertical&#039;, &#039;novalidate&#039;);
    $form-&gt;startFieldset(&#039;Please fill in this form to contact us&#039;);
    $form-&gt;addInput(&#039;text&#039;, &#039;user-name&#039;, &#039;&#039;, &#039;Your name: &#039;, &#039;required&#039;);
    $form-&gt;addInput(&#039;email&#039;, &#039;user-email&#039;, &#039;&#039;, &#039;Your email: &#039;, &#039;required&#039;);
    $form-&gt;addHelper(&#039;Enter a valid US phone number&#039;, &#039;user-phone&#039;);
    $form-&gt;addInput(&#039;text&#039;, &#039;user-phone&#039;, &#039;&#039;, &#039;Your phone: &#039;, &#039;required, data-fv-phone, data-fv-phone-country=US&#039;);
    $form-&gt;addTextarea(&#039;message&#039;, &#039;&#039;, &#039;Your message: &#039;, &#039;cols=30, rows=4, required&#039;);
    $form-&gt;addPlugin(&#039;word-character-count&#039;, &#039;#message&#039;, &#039;default&#039;, array(&#039;%maxAuthorized%&#039; =&gt; 100));
    $form-&gt;addCheckbox(&#039;newsletter&#039;, &#039;Suscribe to Newsletter&#039;, 1, &#039;checked=checked&#039;);
    $form-&gt;printCheckboxGroup(&#039;newsletter&#039;, &#039;&#039;);
    $form-&gt;addRecaptcha(&#039;recaptcha-code-here&#039;);
    $form-&gt;addBtn(&#039;submit&#039;, &#039;submit-btn&#039;, 1, &#039;Submit&#039;, &#039;class=btn btn-success&#039;);
    $form-&gt;endFieldset();
    $form-&gt;addPlugin(&#039;icheck&#039;, &#039;input&#039;, &#039;default&#039;, array(&#039;%theme%&#039; =&gt; &#039;square-custom&#039;, &#039;%color%&#039; =&gt; &#039;green&#039;));

    // JavaScript validation
    $form-&gt;addPlugin(&#039;formvalidation&#039;, &#039;#contact-form-2&#039;);</code></pre>
                <h3>Using chained methods:</h3>
                <pre class="line-numbers mb-4"><code class="language-php">$form = new Form(&#039;contact-form-2&#039;, &#039;vertical&#039;, &#039;novalidate&#039;);
$form-&gt;startFieldset(&#039;Please fill in this form to contact us&#039;)-&gt;addInput(&#039;text&#039;, &#039;user-name&#039;, &#039;&#039;, &#039;Your name: &#039;, &#039;required&#039;)
    -&gt;addInput(&#039;email&#039;, &#039;user-email&#039;, &#039;&#039;, &#039;Your email: &#039;, &#039;required&#039;)
    -&gt;addHelper(&#039;Enter a valid US phone number&#039;, &#039;user-phone&#039;)
    -&gt;addInput(&#039;text&#039;, &#039;user-phone&#039;, &#039;&#039;, &#039;Your phone: &#039;, &#039;required, data-fv-phone, data-fv-phone-country=US&#039;)
    -&gt;addTextarea(&#039;message&#039;, &#039;&#039;, &#039;Your message: &#039;, &#039;cols=30, rows=4, required&#039;)
    -&gt;addPlugin(&#039;word-character-count&#039;, &#039;#message&#039;, &#039;default&#039;, array(&#039;%maxAuthorized%&#039; =&gt; 100))
    -&gt;addCheckbox(&#039;newsletter&#039;, &#039;Suscribe to Newsletter&#039;, 1, &#039;checked=checked&#039;)
    -&gt;printCheckboxGroup(&#039;newsletter&#039;, &#039;&#039;)
    -&gt;addRecaptcha(&#039;recaptcha-code-here&#039;)
    -&gt;addBtn(&#039;submit&#039;, &#039;submit-btn&#039;, 1, &#039;Submit&#039;, &#039;class=btn btn-success&#039;)
    -&gt;endFieldset()
    -&gt;addPlugin(&#039;icheck&#039;, &#039;input&#039;, &#039;default&#039;, array(&#039;%theme%&#039; =&gt; &#039;square-custom&#039;, &#039;%color%&#039; =&gt; &#039;green&#039;))

    // JavaScript validation
    -&gt;addPlugin(&#039;formvalidation&#039;, &#039;#contact-form-2&#039;);</code></pre>
            </section>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="credits">Sources &amp; Credits</h2>
            <p>
                <a href="https://www.phpformbuilder.pro/#credits">https://www.phpformbuilder.pro/#credits</a>
            </p>
        </article>
    </main>
    <!-- container -->

    <?php require_once 'inc/js-includes.php'; ?>
</body>

</html>

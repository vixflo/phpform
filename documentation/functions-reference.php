<!doctype html>
<html lang="en-US">

<head>
    <?php
    $meta = array(
        'title'       => 'PHP Form Builder - Functions reference',
        'description' => 'PHP Form Builder - Quick reminder with all available methods to build your forms',
        'canonical'   => 'https://www.phpformbuilder.pro/documentation/functions-reference.php',
        'screenshot'  => 'functions-reference.png'
    );
    include_once 'inc/page-head.php';
    ?>
    <style> @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 300; src: local("Roboto Light"), local("Roboto-Light"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 400; src: local("Roboto"), local("Roboto-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto; font-style: normal; font-weight: 500; src: local("Roboto Medium"), local("Roboto-Medium"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff') format("woff")} @font-face{ font-display: swap; font-family: Roboto Condensed; font-style: normal; font-weight: 400; src: local("Roboto Condensed"), local("RobotoCondensed-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff') format("woff")} @font-face{ font-display: swap; font-family: bootstrap-icons; src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff') format("woff")} :root{ --bs-blue: #0e73cc; --bs-red: #fc4848; --bs-yellow: #ffc107; --bs-gray: #8c8476; --bs-gray-dark: #38352f; --bs-gray-100: #f6f6f5; --bs-gray-200: #eae8e5; --bs-gray-300: #d4d1cc; --bs-gray-400: #bfbab2; --bs-gray-500: #a9a398; --bs-gray-600: #7f7a72; --bs-gray-700: #55524c; --bs-gray-800: #2a2926; --bs-gray-900: #191817; --bs-primary: #0e73cc; --bs-secondary: #7f7a72; --bs-success: #0f9e7b; --bs-info: #00c2db; --bs-pink: #e6006f; --bs-warning: #ffc107; --bs-danger: #fc4848; --bs-light: #f6f6f5; --bs-dark: #191817; --bs-primary-rgb: 14, 115, 204; --bs-secondary-rgb: 127, 122, 114; --bs-success-rgb: 15, 158, 123; --bs-info-rgb: 0, 194, 219; --bs-pink-rgb: 230, 0, 111; --bs-warning-rgb: 255, 193, 7; --bs-danger-rgb: 252, 72, 72; --bs-light-rgb: 246, 246, 245; --bs-dark-rgb: 25, 24, 23; --bs-white-rgb: 255, 255, 255; --bs-black-rgb: 0, 0, 0; --bs-body-color-rgb: 42, 45, 45; --bs-body-bg-rgb: 255, 255, 255; --bs-font-sans-serif: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; --bs-font-monospace: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace; --bs-gradient: linear-gradient(180deg, hsla(0, 0%, 100%, .15), hsla(0, 0%, 100%, 0)); --bs-body-font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; --bs-body-font-size: 0.9375rem; --bs-body-font-weight: 400; --bs-body-line-height: 1.5; --bs-body-color: #2a2d2d; --bs-body-bg: #fff} *, :after, :before{ box-sizing: border-box} @media (prefers-reduced-motion:no-preference){ :root{ scroll-behavior: smooth}} body{ -webkit-text-size-adjust: 100%; background-color: var(--bs-body-bg); color: var(--bs-body-color); font-family: var(--bs-body-font-family); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); line-height: var(--bs-body-line-height); margin: 0; text-align: var(--bs-body-text-align)} h1, h2{ font-weight: 500; line-height: 1.2; margin-bottom: .5rem; margin-top: 0} h1{ font-size: calc(1.375rem + 1.5vw)} @media (min-width:1200px){ h1{ font-size: 2.5rem}} h2{ font-size: calc(1.3125rem + .75vw)} @media (min-width:1200px){ h2{ font-size: 1.875rem}} ul{ padding-left: 2rem} ul{ margin-bottom: 1rem; margin-top: 0} strong{ font-weight: bolder} a{ color: #0e73cc; text-decoration: underline} code{ direction: ltr; font-family: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace; font-size: 1em; unicode-bidi: bidi-override} code{ word-wrap: break-word; color: #e6006f; font-size: .875em} img, svg{ vertical-align: middle} label{ display: inline-block} button{ border-radius: 0} button, input{ font-family: inherit; font-size: inherit; line-height: inherit; margin: 0} button{ text-transform: none} [type=button], button{ appearance: button;-webkit-appearance: button} ::-moz-focus-inner{ border-style: none; padding: 0} ::-webkit-datetime-edit-day-field, ::-webkit-datetime-edit-fields-wrapper, ::-webkit-datetime-edit-hour-field, ::-webkit-datetime-edit-minute, ::-webkit-datetime-edit-month-field, ::-webkit-datetime-edit-text, ::-webkit-datetime-edit-year-field{ padding: 0} ::-webkit-inner-spin-button{ height: auto} [type=search]{ appearance: textfield;-webkit-appearance: textfield; outline-offset: -2px} ::-webkit-search-decoration{ -webkit-appearance: none} ::-webkit-color-swatch-wrapper{ padding: 0} ::file-selector-button{ font: inherit} ::-webkit-file-upload-button{ -webkit-appearance: button; font: inherit} .list-unstyled{ list-style: none; padding-left: 0} .badge{ border-radius: 0; color: #fff; display: inline-block; font-size: .75em; font-weight: 500; line-height: 1; padding: .35em .65em; text-align: center; vertical-align: baseline; white-space: nowrap} .btn{ background-color: transparent; border: 1px solid transparent; border-radius: 0; color: #2a2d2d; display: inline-block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; text-align: center; text-decoration: none; vertical-align: middle} .btn-primary{ background-color: #0e73cc; border-color: #0e73cc; box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075); color: #fff} .btn-danger{ background-color: #fc4848; border-color: #fc4848; box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075); color: #000} .btn-outline-secondary{ border-color: #7f7a72; color: #7f7a72} .btn-sm{ border-radius: 0; font-size: .8203125rem; padding: .25rem .5rem} .container, .container-fluid{ margin-left: auto; margin-right: auto; padding-left: var(--bs-gutter-x, .75rem); padding-right: var(--bs-gutter-x, .75rem); width: 100%} @media (min-width:576px){ .container{ max-width: 540px}} @media (min-width:768px){ .container{ max-width: 720px}} @media (min-width:992px){ .container{ max-width: 960px}} @media (min-width:1200px){ .container{ max-width: 1140px}} .form-text{ color: #7f7a72; font-size: .875em; margin-top: .25rem} .form-control{ -webkit-appearance: none; -moz-appearance: none; appearance: none; background-clip: padding-box; background-color: #fff; border: 1px solid #bfbab2; border-radius: 0; box-shadow: inset 0 1px 2px rgba(0, 0, 0, .075); color: #2a2d2d; display: block; font-size: .9375rem; font-weight: 400; line-height: 1.5; padding: .375rem .75rem; width: 100%} .form-control::-webkit-date-and-time-value{ height: 1.5em} .form-control::-moz-placeholder{ color: #7f7a72; opacity: 1} .form-control:-ms-input-placeholder{ color: #7f7a72; opacity: 1} .form-control::-webkit-file-upload-button{ -webkit-margin-end: .75rem; background-color: #eae8e5; border: 0 solid; border-color: inherit; border-inline-end-width: 1px; border-radius: 0; color: #2a2d2d; margin: -.375rem -.75rem; margin-inline-end: .75rem; padding: .375rem .75rem} .input-group{ align-items: stretch; display: flex; flex-wrap: wrap; position: relative; width: 100%} .input-group>.form-control{ flex: 1 1 auto; min-width: 0; position: relative; width: 1%} .input-group .btn{ position: relative; z-index: 2} .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu){ border-bottom-right-radius: 0; border-top-right-radius: 0} .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback){ border-bottom-left-radius: 0; border-top-left-radius: 0; margin-left: -1px} .row{ --bs-gutter-x: 1.5rem; --bs-gutter-y: 0; display: flex; flex-wrap: wrap; margin-left: calc(var(--bs-gutter-x)*-.5); margin-right: calc(var(--bs-gutter-x)*-.5); margin-top: calc(var(--bs-gutter-y)*-1)} .row>*{ flex-shrink: 0; margin-top: var(--bs-gutter-y); max-width: 100%; padding-left: calc(var(--bs-gutter-x)*.5); padding-right: calc(var(--bs-gutter-x)*.5); width: 100%} @media (min-width:576px){ .col-sm-1{ flex: 0 0 auto; width: 8.33333333%} .col-sm-3{ flex: 0 0 auto; width: 25%} .col-sm-8{ flex: 0 0 auto; width: 66.66666667%}} .nav{ display: flex; flex-wrap: wrap; list-style: none; margin-bottom: 0; padding-left: 0} .nav-link{ color: #0e73cc; display: block; padding: .5rem 1rem; text-decoration: none} .nav-pills .nav-link{ background: 0 0; border: 0; border-radius: 0} .nav-pills .nav-link.active{ background-color: #0e73cc; color: #fff} .navbar{ align-items: center; display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom: .5rem; padding-top: .5rem; position: relative} .navbar>.container-fluid{ align-items: center; display: flex; flex-wrap: inherit; justify-content: space-between} .navbar-brand{ font-size: 1.171875rem; margin-right: 1rem; padding-bottom: 0; padding-top: 0; text-decoration: none; white-space: nowrap} .navbar-nav{ display: flex; flex-direction: column; list-style: none; margin-bottom: 0; padding-left: 0} .navbar-nav .nav-link{ padding-left: 0; padding-right: 0} .navbar-collapse{ align-items: center; flex-basis: 100%; flex-grow: 1} .navbar-toggler{ background-color: transparent; border: 1px solid transparent; border-radius: 0; font-size: 1.171875rem; line-height: 1; padding: .25rem .75rem} .navbar-toggler-icon{ background-position: 50%; background-repeat: no-repeat; background-size: 100%; display: inline-block; height: 1.5em; vertical-align: middle; width: 1.5em} @media (min-width:992px){ .navbar-expand-lg{ flex-wrap: nowrap; justify-content: flex-start} .navbar-expand-lg .navbar-nav{ flex-direction: row} .navbar-expand-lg .navbar-nav .nav-link{ padding-left: 1rem; padding-right: 1rem} .navbar-expand-lg .navbar-collapse{ display: flex !important; flex-basis: auto} .navbar-expand-lg .navbar-toggler{ display: none}} .navbar-light .navbar-toggler{ border-color: rgba(0, 0, 0, .1); color: rgba(0, 0, 0, .55)} .navbar-light .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.55)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .navbar-dark .navbar-brand{ color: #fff} .navbar-dark .navbar-nav .nav-link{ color: hsla(0, 0%, 100%, .65)} .navbar-dark .navbar-nav .nav-link.active{ color: #fff} .navbar-dark .navbar-toggler{ border-color: hsla(0, 0%, 100%, .1); color: hsla(0, 0%, 100%, .65)}
    .navbar-dark .navbar-toggler-icon{ background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.65)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")} .collapse:not(.show){ display: none} .fixed-top{ top: 0} .fixed-top{ left: 0; position: fixed; right: 0; z-index: 1030} .visually-hidden{ clip: rect(0, 0, 0, 0) !important; border: 0 !important; height: 1px !important; margin: -1px !important; overflow: hidden !important; padding: 0 !important; position: absolute !important; white-space: nowrap !important; width: 1px !important} .d-flex{ display: flex !important} .d-none{ display: none !important} .w-100{ width: 100% !important} .flex-column{ flex-direction: column !important} .flex-wrap{ flex-wrap: wrap !important} .justify-content-end{ justify-content: flex-end !important} .justify-content-center{ justify-content: center !important} .justify-content-between{ justify-content: space-between !important} .align-items-start{ align-items: flex-start !important} .align-items-center{ align-items: center !important} .mt-1{ margin-top: .25rem !important} .me-1{ margin-right: .25rem !important} .me-3{ margin-right: 1rem !important} .mb-2{ margin-bottom: .5rem !important} .mb-4{ margin-bottom: 1.5rem !important} .mb-7{ margin-bottom: 12.5rem !important} .ms-2{ margin-left: .5rem !important} .ms-auto{ margin-left: auto !important} .p-2{ padding: .5rem !important} .p-4{ padding: 1.5rem !important} .px-0{ padding-left: 0 !important; padding-right: 0 !important} .px-2{ padding-left: .5rem !important; padding-right: .5rem !important} .py-2{ padding-bottom: .5rem !important; padding-top: .5rem !important} .pt-1{ padding-top: .25rem !important} .pb-5{ padding-bottom: 3rem !important} .pb-6{ padding-bottom: 6.25rem !important} .text-nowrap{ white-space: nowrap !important} .text-danger{ --bs-text-opacity: 1; color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important} .text-white{ --bs-text-opacity: 1; color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important} .bg-dark{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important} .bg-white{ --bs-bg-opacity: 1; background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important} @media (min-width:768px){ .d-md-inline{ display: inline !important}} @media (min-width:1200px){ .d-xl-none{ display: none !important}} #website-navbar{ box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15); font-family: Roboto Condensed} #website-navbar .navbar-nav{ align-items: stretch; display: flex; flex-wrap: nowrap; margin-top: 1rem; width: 100%} #website-navbar .navbar-nav .nav-item{ align-items: stretch; flex-grow: 1; justify-content: center; line-height: 1.25rem} #website-navbar .navbar-nav .nav-link{ align-items: center; display: flex; flex-direction: column; font-size: .875rem; justify-content: center; padding: .5rem 1rem; text-align: center; text-transform: uppercase} #website-navbar .navbar-nav .nav-link.active{ background-color: #55524c; text-decoration: none} #navbar-left-wrapper{ background-color: #2a2926; box-shadow: 2px 0 1px rgba(0, 0, 0, .12), 1px 0 1px rgba(0, 0, 0, .24); display: none; height: 100%; padding-right: 0; position: fixed; top: 72px; width: 14.375rem; z-index: 9999; z-index: 2} #navbar-left-wrapper #navbar-left-collapse{ display: none} #navbar-left-wrapper~.container{ padding-left: 14.375rem} @media (min-width:992px){ .d-lg-none{ display: none !important} .px-lg-0{ padding-left: 0 !important; padding-right: 0 !important} #website-navbar{ box-shadow: 0 2px 1px rgba(0, 0, 0, .12), 0 1px 1px rgba(0, 0, 0, .24)} #website-navbar .navbar-nav{ margin-top: 0} #website-navbar .navbar-nav .nav-link{ font-size: .8125rem; height: 100%; padding-left: .75rem; padding-right: .75rem} #website-navbar .navbar-brand{ font-size: 1.0625rem; margin-bottom: 0} #navbar-left-wrapper{ display: block}} @media (max-width:991.98px){ #navbar-left-toggler-wrapper{ display: inline-block; top: 4.75rem; width: 54px; z-index: 1 !important} #navbar-left-wrapper #navbar-left-collapse{ display: block} #navbar-left-wrapper~.container{ padding-left: 15px} .w3-animate-left{ -webkit-animation: .4s animateleft; animation: .4s animateleft; position: relative} @-webkit-keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}} @keyframes animateleft{ 0%{ left: -14.375rem; opacity: 0} to{ left: 0; opacity: 1}}} #navbar-left{ background-color: #2a2926; box-shadow: 0 1px 0 #030303; color: #fff; position: relative; width: 100%; z-index: 100} #navbar-left li{ margin: 0; padding: 0; width: inherit} #navbar-left>li>a{ background-color: #373632; border-bottom: 1px solid #151413; border-top: 1px solid #45433e; color: #fff; font-size: 13px; font-weight: 300; padding: 12px 20px 12px 18px; text-shadow: 1px 1px 0 #45433e} #navbar-left>li>a.active{ background-color: #912727} [data-simplebar]{ align-content: flex-start; align-items: flex-start; flex-direction: column; flex-wrap: wrap; justify-content: flex-start; position: relative} #share-wrapper{ height: 40px; position: absolute; right: 50px; top: 37px; transform: translateY(-50%); z-index: 1050} #share-wrapper ul{ left: calc(-50% + 22.5px); position: relative; width: 90px} #share-wrapper ul li{ width: 45px} #share-wrapper label, #share-wrapper li>a{ border-radius: 50%; color: #efefef; height: 2.5rem; overflow: hidden; text-decoration: none; width: 2.5rem} #share-wrapper label#share{ background: #4267b2; opacity: .75; position: relative; z-index: 14} #share-wrapper li>a#share-facebook{ background: #3b5998} #share-wrapper li>a#share-twitter{ background: #00acee} #share-wrapper li>a#share-pinterest{ background: #e4405f} #share-wrapper li>a#share-linkedin{ background: #0077b5} #share-wrapper li>a#share-reddit{ background: #ff4500} #share-wrapper li>a#share-google-bookmarks{ background: #4285f4} #share-wrapper li>a#share-mix{ background: #ff8226} #share-wrapper li>a#share-pocket{ background: #ee4056} #share-wrapper li>a#share-digg{ background: #2a2a2a} #share-wrapper li>a#share-blogger{ background: #fda352} #share-wrapper li>a#share-tumblr{ background: #35465c} #share-wrapper li>a#share-flipboard{ background: #c00} #share-wrapper li>a#share-hacker-news{ background: #f60} #share-wrapper li:first-child{ opacity: 0; transform: translateY(-30%); z-index: 13} #share-wrapper li:nth-child(2){ opacity: 0; transform: translateY(-30%); z-index: 12} #share-wrapper li:nth-child(3){ opacity: 0; transform: translateY(-30%); z-index: 11} #share-wrapper li:nth-child(4){ opacity: 0; transform: translateY(-30%); z-index: 10} #share-wrapper li:nth-child(5){ opacity: 0; transform: translateY(-30%); z-index: 9} #share-wrapper li:nth-child(6){ opacity: 0; transform: translateY(-30%); z-index: 8} #share-wrapper li:nth-child(7){ opacity: 0; transform: translateY(-30%); z-index: 7} #share-wrapper li:nth-child(8){ opacity: 0; transform: translateY(-30%); z-index: 6} #share-wrapper li:nth-child(9){ opacity: 0; transform: translateY(-30%); z-index: 5} #share-wrapper li:nth-child(10){ opacity: 0; transform: translateY(-30%); z-index: 4} #share-wrapper li:nth-child(11){ opacity: 0; transform: translateY(-30%); z-index: 3} #share-wrapper li:nth-child(12){ opacity: 0; transform: translateY(-30%); z-index: 2} #share-wrapper li:nth-child(13){ opacity: 0; transform: translateY(-30%); z-index: 1} #share-wrapper input~ul{ visibility: hidden} @media only screen and (min-width:992px){ #share-wrapper{ position: fixed; right: 0; top: 180px} #share-wrapper label#share{ right: -42px}} :target{ scroll-margin-top: 100px} html{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; min-height: 100%; position: relative} @media screen and (prefers-reduced-motion:reduce){ html{ overflow-anchor: none; scroll-behavior: auto}} body{ counter-reset: section} h1, h2{ font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol} h1{ color: #0e73cc; line-height: .9; margin-bottom: 2.5rem} h1:first-letter{ font-size: 2em} h2{ border-bottom: 2px solid #2a2926; color: #2a2926; margin-bottom: 3rem; padding: 1rem} a{ text-decoration: none} code, code[class*=language]{ font-size: .75rem} code[class*=language]{ padding-left: .25rem !important; padding-right: .25rem !important} strong{ font-weight: 500} .badge:not(.badge-circle){ border-radius: 0} .badge-secondary{ background-color: #55524c; color: #fff} .btn .icon-circle{ border-radius: 50%; display: inline-block; height: 1.40625rem; line-height: 1.40625rem; width: 1.40625rem} .has-separator{ display: block; margin-bottom: 3rem; position: relative} .has-separator:after, .has-separator:before{ background: #d4d1cc; content: ""; height: 1px; left: 50%; position: absolute} .has-separator:before{ bottom: -1em; margin-left: -6%; width: 12%} .has-separator:after{ bottom: -1.1875em; margin-left: -10%; width: 20%} #search-bar #search-results-count{ left: -5.75rem; line-height: 22.5px; margin-right: -5.75rem; padding: .375rem 0; position: relative; width: calc(5.75rem + 1px); z-index: 3} .bi:before, [class*=" bi-"]:before{ -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; display: inline-block; font-family: bootstrap-icons !important; font-style: normal; font-variant: normal; font-weight: 400 !important; line-height: 1; text-transform: none; vertical-align: -.125em} .bi-arrow-down:before{ content: "\f128"} .bi-arrow-up:before{ content: "\f148"} .bi-share-fill:before{ content: "\f52d"} .bi-x:before{ content: "\f62a"} .bi-currency-dollar:before{ content: "\f636"} .bi-x-lg:before{ content: "\f659"} code[class*=language-]{ color: #ccc; background: 0 0; font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace; font-size: .8125rem; text-align: left; white-space: pre; word-spacing: normal; word-break: normal; word-wrap: normal; line-height: 1.5; -moz-tab-size: 4; -o-tab-size: 4; tab-size: 4; -webkit-hyphens: none; -moz-hyphens: none; -ms-hyphens: none; hyphens: none} :not(pre)>code[class*=language-]{ background: #2d2d2d} :not(pre)>code[class*=language-]{ padding: .1em; border-radius: .3em; white-space: normal} </style>
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
                    <li class="nav-item"><a class="nav-link active" href="functions-reference.php">Functions Reference</a></li>
                    <li class="nav-item"><a class="nav-link" href="help-center.php">Help Center</a></li>
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
            <li class="nav-item"><a class="nav-link active" href="#general">General</a></li>
            <li class="nav-item"><a class="nav-link" href="#elements">Elements</a></li>
            <li class="nav-item"><a class="nav-link" href="#rendering">Rendering</a></li>
            <li class="nav-item"><a class="nav-link" href="#utilities">Utilities</a></li>
            <li class="nav-item"><a class="nav-link" href="#plugins">Plugins</a></li>
            <li class="nav-item"><a class="nav-link" href="#popover-modal">Popover &amp; Modal</a></li>
            <li class="nav-item"><a class="nav-link" href="#email-sending">Email sending</a></li>
        </ul>
    </div>
    <main class="container">

        <?php include_once 'inc/top-section.php'; ?>

        <h1 id="home">Functions reference</h1>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="general">General</h2>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>__construct</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form = new Form(string $form_ID, string $layout = 'horizontal', string $attr = '', string $framework = 'bs5');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#construct" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>setMode</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->setMode(string $mode);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#setMode" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>setOptions</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->setOptions($user_options = array());</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#setOptions" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>getOptions</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->getOptions(mixed $options);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#getOptions" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>setAction</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->setAction(string $url, bool $add_get_vars = true);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#setAction" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>setLayout</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->setLayout(string $layout);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#setLayout" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>setMethod</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->setMethod(string $method);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#setMethod" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>startFieldset</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->startFieldset(string $legend = '', string $fieldset_attr = '', string $legend_attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#startFieldset" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>endFieldset</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->endFieldset();</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#endFieldset" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>startDependentFields</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->startDependentFields($parent_field, $show_values[, $inverse = false]);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#startDependentFields" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>endDependentFields</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->endDependentFields();</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#endDependentFields" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>clear</strong> <span class="badge badge-secondary mt-1 float-right">static</span></div>
                <div class="col-sm-8 mb-2"><code class="language-php">Form::clear(string $form_ID);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#clear" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>registerValues</strong> <span class="badge badge-secondary mt-1 float-right">static</span></div>
                <div class="col-sm-8 mb-2"><code class="language-php">Form::registerValues(string $form_ID);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#registerValues" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>mergeValues</strong> <span class="badge badge-secondary mt-1 float-right">static</span></div>
                <div class="col-sm-8 mb-2"><code class="language-php">Form::mergeValues(array $form_names_array);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#mergeValues" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>testToken</strong> <span class="badge badge-secondary mt-1 float-right">static</span></div>
                <div class="col-sm-8 mb-2"><code class="language-php">Form::testToken(string $form_ID);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#securityt-csrf" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>validate</strong> <span class="badge badge-secondary mt-1 float-right">static</span></div>
                <div class="col-sm-8 mb-2"><code class="language-php">Form::validate(string $form_ID);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#php-validation-basics" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="elements">Elements</h2>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addInput</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addInput(string $type, string $name, string $value = '', string $label = '', string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addInput" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addTextarea</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addTextarea(string $name, string $value = '', string $label = '', string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addTextarea" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addOption</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addOption(string $select_name, string $value, string $txt, string $group_name = '', string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addOption" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addSelect</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addSelect(string $select_name, string $label = '', string $attr = '', bool $displayGroupLabels = true);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addSelect" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addCountrySelect</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addCountrySelect(string $select_name, string $label = '', string $attr = '', array $user_options = []);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addCountrySelect" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addTimeSelect</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addTimeSelect(string $select_name, string $label = '', string $attr = '', array $user_options = []);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addTimeSelect" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addRadio</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addRadio(string $group_name, string $label, string $value, string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addRadio" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>printRadioGroup</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->printRadioGroup(string $group_name, string $label = '', bool $inline = true, string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#printRadioGroup" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addCheckbox</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addCheckbox(string $group_name, string $label, string $value, string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addCheckbox" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>printCheckboxGroup</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->printCheckboxGroup(string $group_name, string $label = '', bool $inline = true, string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#printCheckboxGroup" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addBtn</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addBtn(string $type, string $name, string $value, string $text, string $attr = '', string $btnGroupName = '')</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addBtn" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>printBtnGroup</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->printBtnGroup(string $btnGroupName, string $label = '')</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#printBtnGroup" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addHtml</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addHtml(string $html, string $element_name = '', string $pos = 'after');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#addHtml" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="rendering">Rendering</h2>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>render</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->render(bool $debug = false, bool $display = true);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#render" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>useLoadJs</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->useLoadJs($bundle = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#useLoadJs" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>getIncludes</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->getIncludes(string $type, bool $debug = false);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#getIncludes" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>printIncludes</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->printIncludes(string $type, bool $debug = false);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#printIncludes" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>getJsCode</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->printJsCode(bool $debug = false);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#getJsCode" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>printJsCode</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->printJsCode(bool $debug = false);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#printJsCode" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="utilities">Utilities</h2>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>groupElements</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->groupElements(string $input1, $input2, ..., $input12 = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#groupElements" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>setCols</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->setCols(int $label_col_number, int $field_col_number, string $breakpoint = 'sm');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#set-cols" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addHelper</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addHelper(string $helper_text, string $element_name);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#add-helper" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addAddon</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addAddon(string $input_name, string $addon_html, string $pos);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#add-addon" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addHeading</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addHeading(string $html, string $tag_name = 'h4', string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#add-heading" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addIcon</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addIcon(string $input_name, string $icon_html, string $pos);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#add-icon" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addInputWrapper</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addInputWrapper(string $html, string $element_name);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#add-input-wrapper" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>buildAlert</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">Form::buildAlert(string $content_text, string $framework, string $type = 'success');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#build-alert" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>centerContent</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->centerContent(bool $center = true, bool $stack = false);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#center-content" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>startDiv</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->startDiv(string $class = '', string $id = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#start-div" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>endDiv</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->endDiv();</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#end-div" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>startRow</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->startRow(string $additional_class = '', string $id = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#start-row" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>endRow</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->endRow();</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#end-row" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>startCol</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->startCol(int $col_number, string $breakpoint = 'sm', string $additionalClass = '', string $id = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#start-col" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>endCol</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->endCol();</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#end-col" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="plugins">Plugins</h2>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>setPluginsUrl</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->setPluginsUrl(string $forced_url = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="help-center.php#set-plugins-url" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addPlugin</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addPlugin(string $plugin_name, string $selector, string $js_config = 'default', array $plugin_settings = []);</code></div>
                <div class="col-sm-1 mb-2"><a href="javascript-plugins.php#plugins-overview" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addFileUpload</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">(string $name, string $value = '', string $label = '', string $attr = '', array  $fileUpload_config = [], array  $current_file = [])</code></div>
                <div class="col-sm-1 mb-2"><a href="javascript-plugins.php#fileuploader" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addHcaptcha</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addHcaptcha(string $sitekey, string $attr = '');</code></div>
                <div class="col-sm-1 mb-2"><a href="javascript-plugins.php#hcaptcha-example" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>addRecaptchaV3</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->addRecaptchaV3($key);</code></div>
                <div class="col-sm-1 mb-2"><a href="javascript-plugins.php#recaptchav3-example" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="popover-modal">Popover &amp; Modal</h2>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>popover</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->popover();</code></div>
                <div class="col-sm-1 mb-2"><a href="javascript-plugins.php#popover-example" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>modal</strong></div>
                <div class="col-sm-8 mb-2"><code class="language-php">$form->modal(array $options = []);</code></div>
                <div class="col-sm-1 mb-2"><a href="javascript-plugins.php#modal-example" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
        </article>
        <article class="pb-5 mb-7 has-separator">
            <h2 id="email-sending">Email sending</h2>
            <div class="row">
                <div class="col-sm-3 mb-2"><strong>sendMail</strong> <span class="badge badge-secondary mt-1 float-right">static</span></div>
                <div class="col-sm-8 mb-2"><code class="language-php">Form::sendMail(array $options, array $smtp_settings = []);</code></div>
                <div class="col-sm-1 mb-2"><a href="class-doc.php#sendMail" class="btn btn-sm btn-primary">doc.</a></div>
            </div>
        </article>
    </main>
    <!-- container -->
    <?php require_once 'inc/js-includes.php'; ?>
</body>

</html>

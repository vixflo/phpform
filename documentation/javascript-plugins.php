<?php
session_start();

include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

$forms = array();
$output = array();
?>
<!doctype html>
<html lang="en-US">

<head>
    <?php
    $meta = array(
        'title'       => 'PHP Form Builder - JavaScript Plugins - documentation, examples with code',
        'description' => 'PHP Form Builder Library includes the very best JavaScript Plugins. Add any plugin to your form with a single line of code - Save and recall your JS plugin configurations',
        'canonical'   => 'https://www.phpformbuilder.pro/documentation/javascript-plugins.php',
        'screenshot'  => 'javascript-plugins.png'
    );
    include_once 'inc/page-head.php';
    ?>
    <style>
        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            src: local("Roboto Light"), local("Roboto-Light"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-300.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 400;
            src: local("Roboto"), local("Roboto-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-regular.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto;
            font-style: normal;
            font-weight: 500;
            src: local("Roboto Medium"), local("Roboto-Medium"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-v18-latin-500.woff') format("woff")
        }

        @font-face {
            font-display: swap;
            font-family: Roboto Condensed;
            font-style: normal;
            font-weight: 400;
            src: local("Roboto Condensed"), local("RobotoCondensed-Regular"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/roboto-condensed-v16-latin-regular.woff') format("woff")
        }

        .dmca-badge {
            min-height: 100px
        }

        @font-face {
            font-display: swap;
            font-family: bootstrap-icons;
            src: url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff2') format("woff2"), url('https://www.phpformbuilder.pro/documentation/assets/fonts/bootstrap-icons.woff') format("woff")
        }

        :root {
            --bs-blue: #0e73cc;
            --bs-red: #fc4848;
            --bs-yellow: #ffc107;
            --bs-gray: #8c8476;
            --bs-gray-dark: #38352f;
            --bs-gray-100: #f6f6f5;
            --bs-gray-200: #eae8e5;
            --bs-gray-300: #d4d1cc;
            --bs-gray-400: #bfbab2;
            --bs-gray-500: #a9a398;
            --bs-gray-600: #7f7a72;
            --bs-gray-700: #55524c;
            --bs-gray-800: #2a2926;
            --bs-gray-900: #191817;
            --bs-primary: #0e73cc;
            --bs-secondary: #7f7a72;
            --bs-success: #0f9e7b;
            --bs-info: #00c2db;
            --bs-pink: #e6006f;
            --bs-warning: #ffc107;
            --bs-danger: #fc4848;
            --bs-light: #f6f6f5;
            --bs-dark: #191817;
            --bs-primary-rgb: 14, 115, 204;
            --bs-secondary-rgb: 127, 122, 114;
            --bs-success-rgb: 15, 158, 123;
            --bs-info-rgb: 0, 194, 219;
            --bs-pink-rgb: 230, 0, 111;
            --bs-warning-rgb: 255, 193, 7;
            --bs-danger-rgb: 252, 72, 72;
            --bs-light-rgb: 246, 246, 245;
            --bs-dark-rgb: 25, 24, 23;
            --bs-white-rgb: 255, 255, 255;
            --bs-black-rgb: 0, 0, 0;
            --bs-body-color-rgb: 42, 45, 45;
            --bs-body-bg-rgb: 255, 255, 255;
            --bs-font-sans-serif: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --bs-font-monospace: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace;
            --bs-gradient: linear-gradient(180deg, hsla(0, 0%, 100%, .15), hsla(0, 0%, 100%, 0));
            --bs-body-font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            --bs-body-font-size: 0.9375rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.5;
            --bs-body-color: #2a2d2d;
            --bs-body-bg: #fff
        }

        *,
        :after,
        :before {
            box-sizing: border-box
        }

        @media (prefers-reduced-motion:no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            -webkit-text-size-adjust: 100%;
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            margin: 0;
            text-align: var(--bs-body-text-align)
        }

        .h4,
        h1,
        h2,
        h3 {
            font-weight: 500;
            line-height: 1.2;
            margin-bottom: .5rem;
            margin-top: 0
        }

        h1 {
            font-size: calc(1.375rem + 1.5vw)
        }

        @media (min-width:1200px) {
            h1 {
                font-size: 2.5rem
            }
        }

        h2 {
            font-size: calc(1.3125rem + .75vw)
        }

        @media (min-width:1200px) {
            h2 {
                font-size: 1.875rem
            }
        }

        h3 {
            font-size: calc(1.28906rem + .46875vw)
        }

        .h4 {
            font-size: calc(1.26563rem + .1875vw)
        }

        @media (min-width:1200px) {
            h3 {
                font-size: 1.640625rem
            }

            .h4 {
                font-size: 1.40625rem
            }
        }

        p {
            margin-bottom: 1rem;
            margin-top: 0
        }

        ul {
            padding-left: 2rem
        }

        ul {
            margin-bottom: 1rem;
            margin-top: 0
        }

        small {
            font-size: .875em
        }

        sup {
            font-size: .75em;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sup {
            top: -.5em
        }

        a {
            color: #0e73cc;
            text-decoration: underline
        }

        code,
        pre {
            direction: ltr;
            font-family: Consolas, Monaco, Andale Mono, Ubuntu Mono, monospace;
            font-size: 1em;
            unicode-bidi: bidi-override
        }

        pre {
            display: block;
            font-size: .875em;
            margin-bottom: 1rem;
            margin-top: 0;
            overflow: auto
        }

        pre code {
            color: inherit;
            font-size: inherit;
            word-break: normal
        }

        code {
            word-wrap: break-word;
            color: #e6006f;
            font-size: .875em
        }

        img,
        svg {
            vertical-align: middle
        }

        table {
            border-collapse: collapse;
            caption-side: bottom
        }

        th {
            text-align: inherit;
            text-align: -webkit-match-parent
        }

        tbody,
        td,
        th,
        thead,
        tr {
            border: 0 solid;
            border-color: inherit
        }

        label {
            display: inline-block
        }

        button {
            border-radius: 0
        }

        button,
        input {
            font-family: inherit;
            font-size: inherit;
            line-height: inherit;
            margin: 0
        }

        button {
            text-transform: none
        }

        [type=button],
        button {
            appearance: button;
            -webkit-appearance: button
        }

        ::-moz-focus-inner {
            border-style: none;
            padding: 0
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        [type=search] {
            appearance: textfield;
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::file-selector-button {
            font: inherit
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        .list-unstyled {
            list-style: none;
            padding-left: 0
        }

        .btn {
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 0;
            color: #2a2d2d;
            display: inline-block;
            font-size: .9375rem;
            font-weight: 400;
            line-height: 1.5;
            padding: .375rem .75rem;
            text-align: center;
            text-decoration: none;
            vertical-align: middle
        }

        .btn-danger {
            background-color: #fc4848;
            border-color: #fc4848;
            box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075);
            color: #000
        }

        .btn-outline-secondary {
            border-color: #7f7a72;
            color: #7f7a72
        }

        .container,
        .container-fluid {
            margin-left: auto;
            margin-right: auto;
            padding-left: var(--bs-gutter-x, .75rem);
            padding-right: var(--bs-gutter-x, .75rem);
            width: 100%
        }

        @media (min-width:576px) {
            .container {
                max-width: 540px
            }
        }

        @media (min-width:768px) {
            .container {
                max-width: 720px
            }
        }

        @media (min-width:992px) {
            .container {
                max-width: 960px
            }
        }

        .form-text {
            color: #7f7a72;
            font-size: .875em;
            margin-top: .25rem
        }

        .form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-clip: padding-box;
            background-color: #fff;
            border: 1px solid #bfbab2;
            border-radius: 0;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, .075);
            color: #2a2d2d;
            display: block;
            font-size: .9375rem;
            font-weight: 400;
            line-height: 1.5;
            padding: .375rem .75rem;
            width: 100%
        }

        .form-control::-webkit-date-and-time-value {
            height: 1.5em
        }

        .form-control::-moz-placeholder {
            color: #7f7a72;
            opacity: 1
        }

        .form-control:-ms-input-placeholder {
            color: #7f7a72;
            opacity: 1
        }

        .form-control::-webkit-file-upload-button {
            -webkit-margin-end: .75rem;
            background-color: #eae8e5;
            border: 0 solid;
            border-color: inherit;
            border-inline-end-width: 1px;
            border-radius: 0;
            color: #2a2d2d;
            margin: -.375rem -.75rem;
            margin-inline-end: .75rem;
            padding: .375rem .75rem
        }

        .input-group {
            align-items: stretch;
            display: flex;
            flex-wrap: wrap;
            position: relative;
            width: 100%
        }

        .input-group>.form-control {
            flex: 1 1 auto;
            min-width: 0;
            position: relative;
            width: 1%
        }

        .input-group .btn {
            position: relative;
            z-index: 2
        }

        .input-group:not(.has-validation)>:not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0
        }

        .input-group>:not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            margin-left: -1px
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin-bottom: 0;
            padding-left: 0
        }

        .nav-link {
            color: #0e73cc;
            display: block;
            padding: .5rem 1rem;
            text-decoration: none
        }

        .nav-pills .nav-link {
            background: 0 0;
            border: 0;
            border-radius: 0
        }

        .nav-pills .nav-link.active {
            background-color: #0e73cc;
            color: #fff
        }

        .navbar {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding-bottom: .5rem;
            padding-top: .5rem;
            position: relative
        }

        .navbar>.container-fluid {
            align-items: center;
            display: flex;
            flex-wrap: inherit;
            justify-content: space-between
        }

        .navbar-brand {
            font-size: 1.171875rem;
            margin-right: 1rem;
            padding-bottom: 0;
            padding-top: 0;
            text-decoration: none;
            white-space: nowrap
        }

        .navbar-nav {
            display: flex;
            flex-direction: column;
            list-style: none;
            margin-bottom: 0;
            padding-left: 0
        }

        .navbar-nav .nav-link {
            padding-left: 0;
            padding-right: 0
        }

        .navbar-collapse {
            align-items: center;
            flex-basis: 100%;
            flex-grow: 1
        }

        .navbar-toggler {
            background-color: transparent;
            border: 1px solid transparent;
            border-radius: 0;
            font-size: 1.171875rem;
            line-height: 1;
            padding: .25rem .75rem
        }

        .navbar-toggler-icon {
            background-position: 50%;
            background-repeat: no-repeat;
            background-size: 100%;
            display: inline-block;
            height: 1.5em;
            vertical-align: middle;
            width: 1.5em
        }

        @media (min-width:992px) {
            .navbar-expand-lg {
                flex-wrap: nowrap;
                justify-content: flex-start
            }

            .navbar-expand-lg .navbar-nav {
                flex-direction: row
            }

            .navbar-expand-lg .navbar-nav .nav-link {
                padding-left: 1rem;
                padding-right: 1rem
            }

            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                flex-basis: auto
            }

            .navbar-expand-lg .navbar-toggler {
                display: none
            }
        }

        .navbar-light .navbar-toggler {
            border-color: rgba(0, 0, 0, .1);
            color: rgba(0, 0, 0, .55)
        }

        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0, 0, 0, 0.55)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
        }

        .navbar-dark .navbar-brand {
            color: #fff
        }

        .navbar-dark .navbar-nav .nav-link {
            color: hsla(0, 0%, 100%, .65)
        }

        .navbar-dark .navbar-nav .nav-link.active {
            color: #fff
        }

        .navbar-dark .navbar-toggler {
            border-color: hsla(0, 0%, 100%, .1);
            color: hsla(0, 0%, 100%, .65)
        }

        .navbar-dark .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='https://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255, 255, 255, 0.65)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E")
        }

        .table {
            --bs-table-bg: transparent;
            --bs-table-accent-bg: transparent;
            --bs-table-striped-color: #2a2d2d;
            --bs-table-striped-bg: rgba(0, 0, 0, .05);
            --bs-table-active-color: #2a2d2d;
            --bs-table-active-bg: rgba(0, 0, 0, .1);
            --bs-table-hover-color: #2a2d2d;
            --bs-table-hover-bg: rgba(0, 0, 0, .075);
            border-color: #d4d1cc;
            color: #2a2d2d;
            margin-bottom: 1rem;
            vertical-align: top;
            width: 100%
        }

        .table>:not(caption)>*>* {
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
            padding: .5rem
        }

        .table>tbody {
            vertical-align: inherit
        }

        .table>thead {
            vertical-align: bottom
        }

        .table>:not(:first-child) {
            border-top: 2px solid
        }

        .table-bordered>:not(caption)>* {
            border-width: 1px 0
        }

        .table-bordered>:not(caption)>*>* {
            border-width: 0 1px
        }

        .table-striped>tbody>tr:nth-of-type(odd)>* {
            --bs-table-accent-bg: var(--bs-table-striped-bg);
            color: var(--bs-table-striped-color)
        }

        .table-warning {
            --bs-table-bg: #ffe69c;
            --bs-table-striped-bg: #f2db94;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #e6cf8c;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #ecd590;
            --bs-table-hover-color: #000;
            border-color: #e6cf8c;
            color: #000
        }

        .table-responsive {
            -webkit-overflow-scrolling: touch;
            overflow-x: auto
        }

        .collapse:not(.show) {
            display: none
        }

        .fixed-top {
            top: 0
        }

        .fixed-top {
            left: 0;
            position: fixed;
            right: 0;
            z-index: 1030
        }

        .visually-hidden {
            clip: rect(0, 0, 0, 0) !important;
            border: 0 !important;
            height: 1px !important;
            margin: -1px !important;
            overflow: hidden !important;
            padding: 0 !important;
            position: absolute !important;
            white-space: nowrap !important;
            width: 1px !important
        }

        .d-flex {
            display: flex !important
        }

        .d-none {
            display: none !important
        }

        .w-100 {
            width: 100% !important
        }

        .flex-column {
            flex-direction: column !important
        }

        .flex-wrap {
            flex-wrap: wrap !important
        }

        .justify-content-end {
            justify-content: flex-end !important
        }

        .justify-content-center {
            justify-content: center !important
        }

        .justify-content-between {
            justify-content: space-between !important
        }

        .align-items-start {
            align-items: flex-start !important
        }

        .align-items-center {
            align-items: center !important
        }

        .my-4 {
            margin-bottom: 1.5rem !important;
            margin-top: 1.5rem !important
        }

        .me-1 {
            margin-right: .25rem !important
        }

        .me-3 {
            margin-right: 1rem !important
        }

        .mb-2 {
            margin-bottom: .5rem !important
        }

        .mb-4 {
            margin-bottom: 1.5rem !important
        }

        .mb-7 {
            margin-bottom: 12.5rem !important
        }

        .ms-2 {
            margin-left: .5rem !important
        }

        .ms-auto {
            margin-left: auto !important
        }

        .p-2 {
            padding: .5rem !important
        }

        .p-4 {
            padding: 1.5rem !important
        }

        .px-0 {
            padding-left: 0 !important;
            padding-right: 0 !important
        }

        .px-2 {
            padding-left: .5rem !important;
            padding-right: .5rem !important
        }

        .py-2 {
            padding-bottom: .5rem !important;
            padding-top: .5rem !important
        }

        .pt-1 {
            padding-top: .25rem !important
        }

        .pb-5 {
            padding-bottom: 3rem !important
        }

        .pb-6 {
            padding-bottom: 6.25rem !important
        }

        .text-center {
            text-align: center !important
        }

        .text-nowrap {
            white-space: nowrap !important
        }

        .text-danger {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) !important
        }

        .text-light {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-light-rgb), var(--bs-text-opacity)) !important
        }

        .text-white {
            --bs-text-opacity: 1;
            color: rgba(var(--bs-white-rgb), var(--bs-text-opacity)) !important
        }

        .text-muted {
            --bs-text-opacity: 1;
            color: #7f7a72 !important
        }

        .bg-dark {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important
        }

        .bg-white {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-white-rgb), var(--bs-bg-opacity)) !important
        }

        @media (min-width:768px) {
            .d-md-inline {
                display: inline !important
            }
        }

        @media (min-width:1200px) {
            .container {
                max-width: 1140px
            }

            .d-xl-none {
                display: none !important
            }
        }

        #website-navbar {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15);
            font-family: Roboto Condensed
        }

        #website-navbar .navbar-nav {
            align-items: stretch;
            display: flex;
            flex-wrap: nowrap;
            margin-top: 1rem;
            width: 100%
        }

        #website-navbar .navbar-nav .nav-item {
            align-items: stretch;
            flex-grow: 1;
            justify-content: center;
            line-height: 1.25rem
        }

        #website-navbar .navbar-nav .nav-link {
            align-items: center;
            display: flex;
            flex-direction: column;
            font-size: .875rem;
            justify-content: center;
            padding: .5rem 1rem;
            text-align: center;
            text-transform: uppercase
        }

        #website-navbar .navbar-nav .nav-link.active {
            background-color: #55524c;
            text-decoration: none
        }

        #navbar-left-wrapper {
            background-color: #2a2926;
            box-shadow: 2px 0 1px rgba(0, 0, 0, .12), 1px 0 1px rgba(0, 0, 0, .24);
            display: none;
            height: 100%;
            padding-right: 0;
            position: fixed;
            top: 72px;
            width: 14.375rem;
            z-index: 9999;
            z-index: 2
        }

        #navbar-left-wrapper #navbar-left-collapse {
            display: none
        }

        #navbar-left-wrapper~.container {
            padding-left: 14.375rem
        }

        @media (min-width:992px) {
            .d-lg-none {
                display: none !important
            }

            .px-lg-0 {
                padding-left: 0 !important;
                padding-right: 0 !important
            }

            #website-navbar {
                box-shadow: 0 2px 1px rgba(0, 0, 0, .12), 0 1px 1px rgba(0, 0, 0, .24)
            }

            #website-navbar .navbar-nav {
                margin-top: 0
            }

            #website-navbar .navbar-nav .nav-link {
                font-size: .8125rem;
                height: 100%;
                padding-left: .75rem;
                padding-right: .75rem
            }

            #website-navbar .navbar-brand {
                font-size: 1.0625rem;
                margin-bottom: 0
            }

            #navbar-left-wrapper {
                display: block
            }
        }

        @media (max-width:991.98px) {
            #navbar-left-toggler-wrapper {
                display: inline-block;
                top: 4.75rem;
                width: 54px;
                z-index: 1 !important
            }

            #navbar-left-wrapper #navbar-left-collapse {
                display: block
            }

            #navbar-left-wrapper~.container {
                padding-left: 15px
            }

            .w3-animate-left {
                -webkit-animation: .4s animateleft;
                animation: .4s animateleft;
                position: relative
            }

            @-webkit-keyframes animateleft {
                0% {
                    left: -14.375rem;
                    opacity: 0
                }

                to {
                    left: 0;
                    opacity: 1
                }
            }

            @keyframes animateleft {
                0% {
                    left: -14.375rem;
                    opacity: 0
                }

                to {
                    left: 0;
                    opacity: 1
                }
            }
        }

        #navbar-left {
            background-color: #2a2926;
            box-shadow: 0 1px 0 #030303;
            color: #fff;
            position: relative;
            width: 100%;
            z-index: 100
        }

        #navbar-left .h4 {
            font-weight: 400
        }

        #navbar-left li {
            margin: 0;
            padding: 0;
            width: inherit
        }

        #navbar-left>li>a {
            background-color: #373632;
            border-bottom: 1px solid #151413;
            border-top: 1px solid #45433e;
            color: #fff;
            font-size: 13px;
            font-weight: 300;
            padding: 12px 20px 12px 18px;
            text-shadow: 1px 1px 0 #45433e
        }

        #navbar-left>li>a.active {
            background-color: #912727
        }

        [data-simplebar] {
            align-content: flex-start;
            align-items: flex-start;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: flex-start;
            position: relative
        }

        #share-wrapper {
            height: 40px;
            position: absolute;
            right: 50px;
            top: 37px;
            transform: translateY(-50%);
            z-index: 1050
        }

        #share-wrapper ul {
            left: calc(-50% + 22.5px);
            position: relative;
            width: 90px
        }

        #share-wrapper ul li {
            width: 45px
        }

        #share-wrapper label,
        #share-wrapper li>a {
            border-radius: 50%;
            color: #efefef;
            height: 2.5rem;
            overflow: hidden;
            text-decoration: none;
            width: 2.5rem
        }

        #share-wrapper label#share {
            background: #4267b2;
            opacity: .75;
            position: relative;
            z-index: 14
        }

        #share-wrapper li>a#share-facebook {
            background: #3b5998
        }

        #share-wrapper li>a#share-twitter {
            background: #00acee
        }

        #share-wrapper li>a#share-pinterest {
            background: #e4405f
        }

        #share-wrapper li>a#share-linkedin {
            background: #0077b5
        }

        #share-wrapper li>a#share-reddit {
            background: #ff4500
        }

        #share-wrapper li>a#share-google-bookmarks {
            background: #4285f4
        }

        #share-wrapper li>a#share-mix {
            background: #ff8226
        }

        #share-wrapper li>a#share-pocket {
            background: #ee4056
        }

        #share-wrapper li>a#share-digg {
            background: #2a2a2a
        }

        #share-wrapper li>a#share-blogger {
            background: #fda352
        }

        #share-wrapper li>a#share-tumblr {
            background: #35465c
        }

        #share-wrapper li>a#share-flipboard {
            background: #c00
        }

        #share-wrapper li>a#share-hacker-news {
            background: #f60
        }

        #share-wrapper li:first-child {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 13
        }

        #share-wrapper li:nth-child(2) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 12
        }

        #share-wrapper li:nth-child(3) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 11
        }

        #share-wrapper li:nth-child(4) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 10
        }

        #share-wrapper li:nth-child(5) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 9
        }

        #share-wrapper li:nth-child(6) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 8
        }

        #share-wrapper li:nth-child(7) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 7
        }

        #share-wrapper li:nth-child(8) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 6
        }

        #share-wrapper li:nth-child(9) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 5
        }

        #share-wrapper li:nth-child(10) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 4
        }

        #share-wrapper li:nth-child(11) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 3
        }

        #share-wrapper li:nth-child(12) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 2
        }

        #share-wrapper li:nth-child(13) {
            opacity: 0;
            transform: translateY(-30%);
            z-index: 1
        }

        #share-wrapper input~ul {
            visibility: hidden
        }

        @media only screen and (min-width:992px) {
            #share-wrapper {
                position: fixed;
                right: 0;
                top: 180px
            }

            #share-wrapper label#share {
                right: -42px
            }
        }

        :target {
            scroll-margin-top: 100px
        }

        html {
            font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            min-height: 100%;
            position: relative
        }

        @media screen and (prefers-reduced-motion:reduce) {
            html {
                overflow-anchor: none;
                scroll-behavior: auto
            }
        }

        body {
            counter-reset: section
        }

        .h4,
        h1,
        h2,
        h3 {
            font-family: Roboto, -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol
        }

        h1 {
            color: #0e73cc;
            line-height: .9;
            margin-bottom: 2.5rem
        }

        h1:first-letter {
            font-size: 2em
        }

        h2 {
            border-bottom: 2px solid #2a2926;
            color: #2a2926;
            margin-bottom: 3rem;
            padding: 1rem
        }

        h3 {
            color: #2a2926
        }

        .h4 {
            color: #55524c;
            font-weight: 300 !important
        }

        h3 {
            margin-bottom: 1.5rem
        }

        .h4 small {
            font-size: .66em;
            font-weight: 400
        }

        .h4 {
            margin-bottom: 1rem
        }

        a {
            text-decoration: none
        }

        code,
        code[class*=language],
        pre {
            font-size: .75rem
        }

        pre>code[class*=language] {
            padding-left: 0 !important;
            padding-right: 0 !important
        }

        code[class*=language] {
            padding-left: .25rem !important;
            padding-right: .25rem !important
        }

        th {
            font-weight: 500
        }

        .btn .icon-circle {
            border-radius: 50%;
            display: inline-block;
            height: 1.40625rem;
            line-height: 1.40625rem;
            width: 1.40625rem
        }

        .has-separator {
            display: block;
            margin-bottom: 3rem;
            position: relative
        }

        .has-separator:after,
        .has-separator:before {
            background: #d4d1cc;
            content: "";
            height: 1px;
            left: 50%;
            position: absolute
        }

        .has-separator:before {
            bottom: -1em;
            margin-left: -6%;
            width: 12%
        }

        .has-separator:after {
            bottom: -1.1875em;
            margin-left: -10%;
            width: 20%
        }

        .file-path,
        th {
            white-space: nowrap
        }

        .file-path {
            background-color: #f6f6f5;
            color: #000;
            display: inline-block;
            font-size: .8125rem;
            font-weight: 400;
            line-height: 1;
            margin-left: .25rem;
            margin-right: .25rem;
            padding: .35em .65em;
            text-align: center;
            vertical-align: baseline
        }

        .table-striped>tbody>tr:nth-of-type(odd) .file-path {
            background-color: #fff;
            color: #000
        }

        .var-type {
            color: #7f7a72
        }

        #search-bar #search-results-count {
            left: -5.75rem;
            line-height: 22.5px;
            margin-right: -5.75rem;
            padding: .375rem 0;
            position: relative;
            width: calc(5.75rem + 1px);
            z-index: 3
        }

        .jquery,
        .vanilla-js {
            position: relative
        }

        .jquery:after,
        .vanilla-js:after {
            background-repeat: no-repeat;
            background-size: cover;
            content: " ";
            height: 1.5em;
            position: absolute;
            right: 1em;
            width: 1.5em
        }

        .vanilla-js:after {
            background-image: url('https://www.phpformbuilder.pro/documentation/assets/images/javascript.svg')
        }

        .jquery:after {
            background-image: url('https://www.phpformbuilder.pro/documentation/assets/images/jquery.svg')
        }

        .bi:before,
        [class*=" bi-"]:before {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            display: inline-block;
            font-family: bootstrap-icons !important;
            font-style: normal;
            font-variant: normal;
            font-weight: 400 !important;
            line-height: 1;
            text-transform: none;
            vertical-align: -.125em
        }

        .bi-arrow-down:before {
            content: "\f128"
        }

        .bi-arrow-up:before {
            content: "\f148"
        }

        .bi-share-fill:before {
            content: "\f52d"
        }

        .bi-x:before {
            content: "\f62a"
        }

        .bi-currency-dollar:before {
            content: "\f636"
        }

        .bi-x-lg:before {
            content: "\f659"
        }

        code[class*=language-] {
            color: #ccc;
            background: 0 0;
            font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
            font-size: .8125rem;
            text-align: left;
            white-space: pre;
            word-spacing: normal;
            word-break: normal;
            word-wrap: normal;
            line-height: 1.5;
            -moz-tab-size: 4;
            -o-tab-size: 4;
            tab-size: 4;
            -webkit-hyphens: none;
            -moz-hyphens: none;
            -ms-hyphens: none;
            hyphens: none
        }

        select[multiple]~.select2 .select2-search {
            display: none;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link active" href="javascript-plugins.php">JavaScript plugins</a></li>
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
            <li class="nav-item">
                <p class="h4 text-light text-center my-4">JavaScript Plugins<br><small>Overview</small></p>
            </li>
            <li class="nav-item"><a class="nav-link active" href="#the-addplugin-function">The addPlugin() Function</a></li>
            <li class="nav-item"><a class="nav-link" href="#plugins-overview">How to enable plugins</a></li>
            <li class="nav-item"><a class="nav-link" href="#plugin-files-and-configuration">Plugin files & configuration</a></li>
            <li class="nav-item"><a class="nav-link" href="#optimization">Optimization (CSS & JS)</a></li>
            <li class="nav-item"><a class="nav-link" href="#async-loading-with-load-js-library">Async loading with LoadJs</a></li>
            <li class="nav-item"><a class="nav-link" href="#customizing-plugins">Customizing plugins</a></li>
            <li class="nav-item"><a class="nav-link" href="#adding-your-own-plugins">Adding your own plugins</a></li>
            <li class="nav-item"><a class="nav-link" href="#credits">Credits (plugins list)</a></li>
            <li class="nav-item">
                <p class="h4 text-light text-center my-4">JavaScript Plugins<br><small>Usage & Code examples</small></p>
            </li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#accordion-example">Accordion</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#altcha-example">Altcha</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#autocomplete-example">Autocomplete</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#bootstrap-input-spinner-example">Bootstrap Input Spinner</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#bootstrap-select-example">Bootstrap Select</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#colorpicker-example">Colorpicker</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#dependent-fields-example">Dependent fields</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#fileuploader">File Uploader</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#floating-labels">Floating labels</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#formvalidation">Formvalidation</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#hcaptcha-example">Hcaptcha</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#icheck-example">Icheck</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#image-picker-example">Image Picker</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#intl-tel-input-example">Intl Tel Input<br>(International Phone Numbers)</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#js-captcha-example">JS-Captcha</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#ladda-example">Ladda (Buttons spinners)</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#lcswitch-example">LC-Switch</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#litepicker-example">Litepicker<br>(Date/Date range picker)</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#material-design">Material Design plugin (Materialize)</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#material-datepicker-example">Material Date Picker</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#material-timepicker-example">Material Time Picker</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#modal-example">Modal</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#nice-check-example">Nice Check</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#passfield-example">Passfield</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#pickadate-example">Pickadate (Date Picker)</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#pickadate-timepicker-example">Pickadate (Time Picker)</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#popover-example">Popover</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#pretty-checkbox-example">Pretty Checkbox</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#recaptchav3-example">Recaptcha V3</a></li>
            <li class="nav-item"><a class="nav-link jquery" href="#select2-example">Select2</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#signature-pad-example">Signature pad</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#slimselect-example">Slimselect</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#tinymce-example">Tinymce</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#tooltip-example">Tooltip</a></li>
            <li class="nav-item"><a class="nav-link vanilla-js" href="#wordcharactercount-example">Word/Character counter</a></li>
        </ul>
    </div>

    <!-- /main sidebar -->

    <main class="container" id="javascript-plugins-container">

        <?php include_once 'inc/top-section.php'; ?>

        <h1 id="javascript-plugins-title">JavaScript plugins</h1>

        <h2>Overview</h2>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="the-addplugin-function">The addPlugin() Function</h3>

            <pre><code class="language-php">$form->addPlugin(string $plugin_name, string $selector, string $js_config = 'default', array $plugin_settings = [])</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$plugin_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><span class="text-muted">-</span></td>
                            <td>The plugin name. Must be the name of the XML file in <span class="file-path">/plugins-config</span> without extension.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><span class="text-muted">-</span></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code> or <code>'.fieldname'</code>) of the field on which the plugin will be enabled. </td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>The XML node where the plugin JavaScript code is in <span class="file-path">plugins-config/[plugin-name.xml]</span></td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$options</var></th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>Associative array containing the key/value pairs of plugin-specific options.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="plugins-overview">How to enable plugins</h3>

            <p class="lead">Enabling plugins with PHP Form Builder is deadly fast and straightforward:</p>

            <ol class="list-timeline">
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">1</span>
                    <span class="timeline-content">Create your field. e.g., <code>$form->addInput('text', 'my-date', '', 'Pickup a date');</code></span>
                </li>
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">2</span>
                    <span class="timeline-content">Add the plugin. e.g., <code>$form->addPlugin('pickadate', '#my-date');</code></span>
                </li>
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">3</span>
                    <span class="timeline-content">Call <code>$form->printIncludes('css');</code> in your <code>&lt;head&gt;</code> section</span>
                </li>
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">4</span>
                    <span class="timeline-content">Call <code>$form->printIncludes('js');</code> then <code>$form->printJsCode();</code> just before <code>&lt;/body&gt;</code></span>
                </li>
            </ol>

            <p>It will add the <em>pickadate</em> plugin to the input named <code>my-date</code>.<br>The plugin will use its default configuration stored in <span class="file-path">phpformbuilder/plugins-config/pickadate.xml</span></p>

            <div class="alert alert-info has-icon my-5">
                <p><code>printIncludes('css')</code>, <code>printIncludes('js')</code> and <code>printJsCode()</code> must be called only once,<br>even if your form uses several plugins.</p>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p>Some plugins can be enabled by simply adding an attribute (<code>data-attr</code>) or a CSS class to the target field without calling the <code>addPlugin()</code> function.</p>
                    <p class="mb-0">You'll see this by referring to the documentation for each plugin.</p>
                </div>
            </div>

            <p><strong>To go further:</strong></p>

            <ul class="ms-5">
                <li><a href="#customizing-plugins">Customize and store several plugin configs for further use</a>,<br></li>
                <li><a href="#adding-your-own-plugins">Add your own plugins</a>.</li>
            </ul>
        </article>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="plugin-files-and-configuration">Plugin files & configuration</h3>

            <section class="mb-6">
                <h4>Plugins</h4>

                <p>The plugin source files (CSS & JS files) are located in the <span class="file-path">/plugins</span> folder.</p>
            </section>
            <section class="mb-6">
                <h4>Plugins configuration (XML configuration files)</h4>

                <p>Each plugin has its own XML configuration file in the <span class="file-path">/plugins-config</span> directory.</p>
                <p>Each XML configuration file contains the necessary information for PHP to generate the code required to initialize it:</p>

                <ul>
                    <li>Addition of the plugin's CSS and JavaScript dependencies</li>
                    <li>JavaScript initialization code</li>
                </ul>

                <p>The XML structure is always the same: </p>

                <pre class="line-numbers mb-4"><code class="language-php">&lt;root&gt;
    &lt;default&gt;
        &lt;includes&gt;
            &lt;css&gt;
                &lt;file&gt;../../phpformbuilder/plugins/[plugin dir]/[plugin].css&lt;/file&gt;
            &lt;/css&gt;
            &lt;js&gt;
                &lt;file&gt;../../phpformbuilder/plugins/[plugin dir]/[plugin].js&lt;/file&gt;
            &lt;/js&gt;
        &lt;/includes&gt;
        &lt;js_code&gt;
            &lt;![CDATA[
                // JavaScript init code here
            ]]&gt;
        &lt;/js_code&gt;
    &lt;/default&gt;
&lt;/root&gt;</code></pre>

                <p>You can create, save and reuse as many configurations as you like for each plugin.<br>Create a new node in the plugin's XML file and insert your JavaScript code inside. See <a href="#customizing-plugins">Customizing plugins</a></p>
            </section>
            <section>
                <h4>CSS & JS dependencies</h4>

                <p>Each plugin has its own CSS &amp; JS dependencies in its folder inside <span class="file-path">phpformbuilder/plugins/</span></p>
                <p>PHP Form Builder generates a single compiled and minified CSS file for each form, including all the plugins css used by the form.</p>
                <p>The plugins' JS dependencies are compiled the same way.</p>
                <p>These compiled files are located in <span class="file-path">phpformbuilder/plugins/min/css</span> and <span class="file-path">phpformbuilder/plugins/min/js</span> folders.</p>
            </section>
        </article>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="optimization">Optimization (CSS & JS dependencies)<br><small>In <code>'production'</code> mode, PHP Form Builder minifies and compiles all the plugins' JavaScript and CSS dependencies into a single CSS/JavaScript file for ultra-fast loading.</small></h3>

            <pre class="mb-4"><code class="language-php">$form->setMode(string $mode);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$mode</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>'production'</code></td>
                            <td><code>'development'</code> or <code>'production'</code><br>The default mode is <code>'production'</code> until you change it with the <code>setMode($mode)</code> function.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <h4 class="mb-2">The production mode</h4>

                <p>When your form is in <code>production</code> mode:</p>
                <p>When you call <code>$form->printIncludes('css');</code> or <code>$form->printIncludes('js');</code>, all plugins assets (plugin's CSS and JavaScript dependencies) are <strong>compressed and minified for fast loading</strong> in a single js|css file in <span class="file-path">phpformbuilder/plugins/min/[css|js]/[framework-][form-name].min.[css|js]</span>.</p>
                <p>Your form will load a single CSS file and a single JavaScript file instead of a file for each plugin, which dramatically improves performance.</p>
                <p class="alert alert-warning has-icon">Your <span class="file-path">phpformbuilder/plugins/min/[css|js]/</span> dir has to be writable (chmod 0755+)</p>
            </section>

            <section>
                <h4 class="mb-2">The development mode</h4>

                <p>When your form is in <code>'development'</code> mode:</p>

                <ul class="ms-5">
                    <li><code>$form->printIncludes('css');</code> will add each plugin CSS dependencies to your page</li>
                    <li><code>$form->printIncludes('js');</code> will add each plugin JavaScript dependencies to your page</li>
                </ul>

                <p>The <code>'development'</code> mode is helpful to inspect or debug your code. Still, you'll have many CSS & JavaScript files to load, depending on your form's number of plugins.</p>
            </section>
        </article>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="async-loading-with-load-js-library">Async loading with LoadJs library</h3>
            <p><a href="https://github.com/muicss/loadjs" title="LoadJs library">LoadJs</a> is a tiny async loader/dependency manager for modern browsers (789 bytes)</p>
            <p>Used with PHP Form Builder it allows to load the plugins CSS & JS dependencies asynchronously without blocking your page rendering.</p>

            <pre class="mb-4"><code class="language-php">$form->useLoadJs(string $bundle = '');</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$bundle</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Optional bundle name to wait for before triggering the domReady events</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <p>Wen you enable LoadJs, <code>$form->printJsCode();</code> will load all the CSS & JS dependencies.</p>
                <ul>
                    <li>Don't call <code>$form->printIncludes('css');</code>: the CSS files will be loaded with LoadJs</li>
                    <li>Don't call <code>$form->printIncludes('js');</code> the JS files will be loaded with LoadJs</li>
                </ul>
            </section>
            <section>
                <h4>Example 1</h4>

                <pre class="line-numbers mb-5"><code class="language-php">&lt;?php
$form = new Form('my-form', 'horizontal');

$form->useLoadJs();

$form->addInput('text', 'my-color', '', 'Pick a color:');
$form->addPlugin('colorpicker', '#my-color');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-success ladda-button, data-style=zoom-in');
$form->render();
?&gt;
&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/loadjs/3.5.5/loadjs.min.js&quot;&gt;&lt;/script&gt;

&lt;!-- The following line will load the plugins CSS & JS dependencies --&gt;
&lt;?php $form->printJsCode(); ?&gt;</code></pre>
                <h4>Example 2: wait for your bundle before triggering the domReady events</h4>
                <pre class="line-numbers"><code class="language-php">&lt;?php
$form = new Form('my-form', 'horizontal');

$form->useLoadJs('core');

$form->addInput('text', 'my-color', '', 'Pick a color:');
$form->addPlugin('colorpicker', '#my-color');
$form->addBtn('submit', 'submit-btn', 1, 'Submit', 'class=btn btn-success ladda-button, data-style=zoom-in');
$form->render();
?&gt;

&lt;script src=&quot;https://cdnjs.cloudflare.com/ajax/libs/loadjs/3.5.5/loadjs.min.js&quot;&gt;&lt;/script&gt;

&lt;script&gt;
// loading jQuery with loadJs (core bundle)
loadjs(['assets/javascripts/jquery-3.3.1.min.js'], 'core');

// Core's loaded - do any stuff
loadjs.ready('core', function() {
   // ...
});
&lt;/script&gt;

&lt;!-- load the form CSS & JS dependencies
Trigger domready when the core bundle and the form JS dependencies are loaded --&gt;
&lt;?php $form->printJsCode(); ?&gt;</code></pre>
            </section>
        </article>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="customizing-plugins">Customizing plugins</h3>

            <ul class="ms-5 mb-5">
                <li>The <code>addPlugin()</code> function has 4 arguments: <code>$plugin_name</code>, <code>$selector</code>, <code>$config</code> and <code>$options</code></li>
                <li><code>$config</code> indicates the XML node you targets. Default value: <code>'default'</code>.</li>
                <li><code>$selector</code> will replace <code>&quot;%selector%&quot;</code> in the XML code.</li>
            </ul>

            <h4>To customize a plugin:</h4>

            <p>Duplicate the plugin's XML file from <span class="file-path">plugins-config</span> to the <span class="file-path">plugins-config-custom</span> folder.<br>It will allow you to update PHP Form Builder's package at any time without overwriting your custom config.</p>
            <p class="mb-md">PHP Form Builder will always look for a custom XML file in the <span class="file-path">plugins-config-custom/</span> folder. If none exist, it will load the default one in <span class="file-path">plugins-config/</span>.</p>
            <p class="alert alert-info has-icon my-5">You can use both default &amp; custom config in the same form. There's no need to duplicate default XML nodes in your custom XML file.</p>

            <ol class="list-timeline mb-5">
                <li class="d-flex align-items-start pb-2">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">1</span>
                    <span class="timeline-content">Open the plugin XML file in your code editor. I.e., <span class="file-path">plugins-config/the-plugin.xml</span></span>
                </li>
                <li class="d-flex align-items-start pb-2">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">2</span>
                    <span class="timeline-content">Copy the <code>&lt;default&gt;</code> node structure and give it a name<br>(for example, replace '<var>&lt;default&gt;</var>' with '<var>&lt;custom&gt;</var>')</span>
                </li>
                <li class="d-flex align-items-start pb-2">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">3</span>
                    <span class="timeline-content">If the <code class="language-php">&lt;includes&gt;</code> node does not need to be modified, delete it from your structure.<br>The program will use the default include node instead.</span>
                </li>
                <li class="d-flex align-items-start pb-2">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">4</span>
                    <span class="timeline-content">Enter your JavaScript code (the code to instanciate the plugin) in the <code class="language-php">&lt;js_code&gt;</code> node</span>
                </li>
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">5</span>
                    <span class="timeline-content">If you need some other replacements than <code class="language-php">%selector%</code> in your JavaScript code, use custom markup like <code class="language-php">%my-value%</code> in XML, then define them in <code class="language-php">$options</code> when you call <code class="language-php">addPlugin</code>.</span>
                </li>
            </ol>

            <h4>Customizing plugin example</h4>

            <pre class="line-numbers"><code class="language-php">$options = array('skin' => 'red', 'my-value' => 'replacement-text');
$form->addPlugin('nice-check', 'form', 'default', $options);</code></pre>
        </article>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="adding-your-own-plugins">Adding your own plugins</h3>

            <p class="lead">You can easily add any javascript plugin to PHP Form Builder. Here's how to do it:</p>

            <ol class="list-timeline">
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">1</span>
                    <span class="timeline-content">Upload your plugin in <span class="file-path">plugin/</span></span>
                </li>
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">2</span>
                    <span class="timeline-content">Create an XML file with the name of your plugin in <span class="file-path">plugins-config-custom/</span> dir,<br>using the tree described in the <a href="#customizing-plugins">Customizing Plugins</a> section</span>
                </li>
                <li class="d-flex align-items-start">
                    <span class="badge bg-yellow-300 text-yellow-600 badge-circle">3</span>
                    <span class="timeline-content">Call your plugin with the <a href="#addPlugin"><code>addPlugin()</code></a> function</span>
                </li>
            </ol>
        </article>

        <article class="pb-5 mb-7 has-separator">
            <h3 id="credits">Credits (plugins list)</h3>

            <p class="lead py-4">PHP Form Builder includes the following JavaScript Plugins:</p>

            <ul class="ms-5 mb-6">
                <li>accordion - <a href="https://github.com/stuartjnelson/badger-accordion">https://github.com/stuartjnelson/badger-accordion</a></li>
                <li>hcaptcha - <a href="https://docs.hcaptcha.com">https://altcha.org/docs</a></li>
                <li>autocomplete - <a href="https://github.com/TarekRaafat/autoComplete.js">https://github.com/TarekRaafat/autoComplete.js</a></li>
                <li>bootstrap-input-spinner - <a href="https://github.com/shaack/bootstrap-input-spinner">https://github.com/shaack/bootstrap-input-spinner</a></li>
                <li>bootstrap-select - <a href="https://silviomoreto.github.io/bootstrap-select/">https://silviomoreto.github.io/bootstrap-select/</a></li>
                <li>colorpicker - <a href="https://github.com/Simonwep/pickr">https://github.com/Simonwep/pickr</a></li>
                <li>floating-labels - <span class="text-muted">PHP Form Builder custom plugin</span></li>
                <li>fileuploader - <a href="https://github.com/migliori/shadow-floating-labels">https://github.com/migliori/shadow-floating-labels</a></li>
                <li>fileuploader - <a href="https://innostudio.de/fileuploader/">https://innostudio.de/fileuploader/</a></li>
                <li>formvalidation - <a href="https://formvalidation.io/">https://formvalidation.io/</a></li>
                <li>iCheck - <a href="https://icheck.fronteed.com">https://icheck.fronteed.com</a></li>
                <li>image-picker - <a href="https://github.com/rvera/image-picker">https://github.com/rvera/image-picker</a></li>
                <li>intl-tel-input - <a href="https://github.com/jackocnr/intl-tel-input">https://github.com/jackocnr/intl-tel-input</a></li>
                <li>hcaptcha - <a href="https://docs.hcaptcha.com">https://docs.hcaptcha.com</a></li>
                <li>js-captcha - <a href="https://github.com/robiveli/js-captcha">https://github.com/robiveli/js-captcha</a></li>
                <li>ladda - <a href="https://github.com/hakimel/Ladda">https://github.com/hakimel/Ladda</a></li>
                <li>lcswitch - <a href="https://lcweb.it/lc-switch-javascript-plugin">https://lcweb.it/lc-switch-javascript-plugin</a></li>
                <li>materialize - <a href="https://materializecss.com">https://materializecss.com</a></li>
                <li>modal - <a href="https://github.com/Ghosh/micromodal">https://github.com/Ghosh/micromodal</a></li>
                <li>nicecheck - <span class="text-muted">PHP Form Builder custom plugin</span></li>
                <li>passfield - <a href="https://antelle.github.io/passfield">https://antelle.github.io/passfield</a></li>
                <li>pickadate - <a href="https://amsul.ca/pickadate.js/">https://amsul.ca/pickadate.js/</a></li>
                <li>popover - built with Tippy as well as the tooltips</li>
                <li>pretty-checkbox - <a href="https://github.com/lokesh-coder/pretty-checkbox">https://github.com/lokesh-coder/pretty-checkbox</a></li>
                <li>recaptcha - <a href="https://developers.google.com/recaptcha/docs/v3">https://developers.google.com/recaptcha/docs/v3</a></li>
                <li>select2 - <a href="https://github.com/select2/select2">https://github.com/select2/select2</a></li>
                <li>timepicker - <a href="https://github.com/jonthornton/jquery-timepicker">https://github.com/jonthornton/jquery-timepicker</a></li>
                <li>tinymce - <a href="https://www.tiny.cloud/">https://www.tiny.cloud/</a></li>
                <li>tooltip - <a href="https://atomiks.github.io/tippyjs/">https://atomiks.github.io/tippyjs/</a></li>
                <li>word-character-count - <span class="text-muted">PHP Form Builder custom plugin</span></li>
            </ul>

            <p class="lead text-center">Thanks to all the authors for their excellent work</p>
        </article>

        <h2 id="accordion-example">JavaScript Plugins - <small>Usage & Code examples</small></h2>

        <!-- accordion -->

        <article class="pb-5 mb-7 has-separator">
            <h3 class="mb-1 vanilla-js">Accordion</h3>

            <p class="mb-4"><a href="https://github.com/stuartjnelson/badger-accordion">https://github.com/stuartjnelson/badger-accordion</a></p>

            <p>The <em>Accordion</em> plugin allows you to create a step-by-step form, each embedded in a dropdown section in the accordion.</p>

            <p><strong>To create an accordion form:</strong></p>
            <ul class="mb-5">
                <li class="mb-2">Add <code>data-accordion=true</code> to the form instance.</li>
                <li class="mb-2">Group your elements into <em>fieldsets</em> using the <code>startFieldset()</code> and <code>endFieldset()</code> functions.<br>Each fieldset will be an accordion section.</li>
                <li class="mb-2">Add a heading using the <code>addHeading()</code> function before each fieldset.<br>The headings will be the accordion's headers.</li>
            </ul>

            <p>PHP Form Builder will automatically load the plugin and generate the appropriate markup to run the accordion.</p>

            <div id="accordion-example-wrapper" class="observed" style="min-height:898px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- Altcha -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="altcha-example" class="mb-1 vanilla-js">Altcha</h3>

            <p class="mb-4"><a href="https://altcha.org/docs">https://altcha.org/docs</a></p>

            <p>Altcha is a Free, open-source Captcha alternative with Anti-Spam</p>

            <blockquote class="blockquote">
                <p>"Unlike other solutions, ALTCHA is free, open-source and self-hosted, without external services, does not use cookies nor fingerprinting, does not track users, and is fully compliant with GDPR." <cite><a href="https://altcha.org/">https://altcha.org/</a></cite></p>
            </blockquote>

            <blockquote class="blockquote">
                <p>"Altcha's <strong>anti-spam feature</strong> enables you to classify text and other information, allowing you to filter out spam and identify legitimate messages. It works by analyzing textual and other information, evaluating various factors to provide a numeric score indicating whether the message appears legitimate or is likely spam." <cite><a href="https://altcha.org/">https://altcha.org/</a></cite></p>
            </blockquote>

            <h4>Getting started</h4>

            <p>Set your hostname and get your keys on the Altcha website, then enter them in <code class="language-php">phpformbuilder/plugins/altcha/altcha_api_key.php</code></p>

            <pre class="mb-4"><code class="language-php">$form->addAltcha(bool $spamFilter = false);

// Validation after POST:
$validator->altcha('Captcha Error')->validate('altcha');</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$spamFilter</var></th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Enables the spam filter feature if <code>true</code></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>SPAM Filter feature</h4>

            <p>To enable Altcha's SPAM Filter, you must set the <code>$spamFilter</code> argument to <code>true</code> when you enable the Altcha plugin: <code>$form->addAltcha(true)</code>.</p>

            <p>Then you can use the validator to first validate the Altcha field and then check the spam score.</p>

            <p>The altcha plugin provides some detailed information about the spam score in the <code>altcha</code> field. You can use this information to decide whether to accept or reject the form submission.</p>

            <p>The Validator provides these methods to get the SPAM Filter data and the reasons of the rejection:</p>

            <pre class="mb-4"><code class="language-php">$spamFilterData = $validator->getAltchaSpamFilterData('altcha');
/* returns an array with the following entries:
$spamFilterData = [
    'classification' // the classification of the message: 'GOOD', 'NEUTRAL' or 'BAD'
    'score' // the SPAM score between 0 and 10. 0 is good, 10 is bad
    'reasons' // an array with the reasons of rejection (refer to https://altcha.org/docs/api/spam-filter-api/#usage-with-the-widget)
];
*/

// Get the message with the reasons of rejection
// The translations are done in phpformbuilder/class/phpformbuilder/Validator/traits/Altcha.php
$errorMessage = $validator->getAltchaSpamFilterErrorMessage();
</code></pre>

            <p>You can then take action based on the spam score. For example, you can reject the form submission if the score is too high.</p>

            <pre class="mb-4"><code class="language-php">/* =============================================
    Example of form rejection if SPAM score > 2
============================================= */

// Add the Altcha plugin with the spam filter enabled
$form->addAltcha(true);/documentation/javascript-plugins.php#recaptchav3-example

/* =============================================
    Validation if posted
============================================= */

if ($_SERVER["REQUEST_METHOD"] == "POST" && Form::testToken('replace-with-your-form-id') === true) {
    // Validate the Altcha field
    $validator->altcha('Captcha Error')->validate('altcha');

    // get the altcha SPAM Filter data
    $spamFilterData = $validator->getAltchaSpamFilterData('altcha');

    // Check the spam score
    if ($spamFilterData['score'] > 2) {
        // The spam score is too high, get the message with the reasons of rejection
        $errorMessage = $validator->getAltchaSpamFilterErrorMessage();

        // Add the error message to the altcha field.
        // This will prevent the form submission.
        // Instead of preventing the form submission, anything else could be done here: add a '[SPAM]' prefix to the email subject, etc.
        $validator->addError('altcha', $errorMessage);
    }

    // Check if there are errors
    if ($validator->hasErrors()) {
        $_SESSION['errors']['replace-with-your-form-id'] = $validator->getAllErrors();
    } else {
        // send email or do something else
    }
}</code></pre>

            <div id="altcha-example-wrapper" class="observed" style="min-height:898px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- autocomplete -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="autocomplete-example" class="mb-1 vanilla-js">Autocomplete</h3>

            <p class="mb-4"><a href="https://github.com/TarekRaafat/autoComplete.js">https://github.com/TarekRaafat/autoComplete.js</a></p>

            <p>The <em>Autocomplete</em> plugin offers the user a dropdown list of suggestions based on the characters entered. Suggestions can be defined by an array in PHP or loaded with an Ajax call, which must return an object in JSON format.</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('autocomplete', $selector, $config, $options);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">autocomplete <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'autocomplete'.</code></td>
                        </tr>
                        <tr>
                            <th scope="row">$selector <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>
                                <p>The CSS selector (e.g., <code>'#fieldname'</code>) of the field on which the plugin will be enabled.</p>
                                <p>The autocomplete plugin must be activated individually for each target field (It doesn't accept CSS class selectors).</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">$config <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>
                                <p><code>'default'</code> | <code>'ajax'</code></p>
                                <p class="medium mb-0">The configuration node in the plugin's XML file.<br>You can add your own configurations in <span class="file-path">phpformbuilder/plugins-config/autocomplete.xml</span></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">$options <sup class="text-danger">*</sup></th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>
                                <p>Associative array with <code>['src' => $target]</code></p>
                                <ul>
                                    <li><strong>If <var>$config</var> is <code>'default'</code></strong><br><code>$target</code> must be an array of the available completions. Example:
                                        <pre class="mb-4"><code class="language-php">$options = [
    'src' => [
        'Completion 1',
        'Completion 2',
        // ...
    ];
];</code></pre>
                                    </li>
                                    <li><strong>If <var>$config</var> is <code>'ajax'</code></strong><br><code>$target</code> is the target url that will be called with Ajax and must return a JSON array of strings or objects. Example:
                                        <pre class="mb-4"><code class="language-php">$options = ['src' => 'autocomplete-ajax.php'];</code></pre>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Autocomplete plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-start-with</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>If <code>true</code> the results items must start with the search string.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-debounce</th>
                            <td class="var-type">Number</td>
                            <td><code>0</code></td>
                            <td>Sets the delay time duration in milliseconds that counts after typing is done for autoComplete.js engine to start.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-multiple-choices</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>If <code>true</code> the user can perform several consecutive searches, and the selected results are added and separated by commas.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-threshold</th>
                            <td class="var-type">Number</td>
                            <td><code>0</code></td>
                            <td>Sets the threshold value of the length of the minimum characters where the autoComplete.js engine starts.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-max-results</th>
                            <td class="var-type">Number</td>
                            <td><code>5</code></td>
                            <td>Sets the maximum number of results items.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="autocomplete-example-wrapper" class="observed" style="min-height:2665px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- bootstrap-input-spinner -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="bootstrap-input-spinner-example" class="mb-1 jquery">Bootstrap Input Spinner</h3>

            <p class="mb-4"><a href="https://github.com/shaack/bootstrap-input-spinner">https://github.com/shaack/bootstrap-input-spinner</a></p>

            <p>The <em>Bootstrap Input Spinner</em> plugin wraps a <code>input[type="number"]</code> field with "-" and "+" buttons to decrement/increment the field value.</p>

            <pre class="mb-4"><code class="language-php">$form->addInput('number', $input_name, $value, $label, 'data-input-spinner=true, min=0, max=20, data-buttons-clazz=btn-outline-light');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$type</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input type. The <em>Bootstrap Input Spinner</em> plugin must be used with an <code>input[type="number"]</code>, so the expected value is <code>'number'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$input_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$value</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The initial value of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-input-spinner</code> attribute to the input element to activate the <em>Bootstrap Input Spinner</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>Bootstrap Input Spinner plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-decrement-button</th>
                            <td class="var-type">String</td>
                            <td><code>'-'</code></td>
                            <td>The "-" button text.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-increment-button</th>
                            <td class="var-type">String</td>
                            <td><code>'+'</code></td>
                            <td>The "+" button text.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-group-clazz</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>CSS class of the resulting input-group</td>
                        </tr>
                        <tr>
                            <th scope="row">data-buttons-clazz</th>
                            <td class="var-type">String</td>
                            <td><code>'btn-outline-secondary'</code></td>
                            <td>CSS class of the resulting '+' &amp; '-' buttons.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-buttons-width</th>
                            <td class="var-type">String</td>
                            <td><code>'2.5rem'</code></td>
                            <td>CSS width of the resulting '+' &amp; '-' buttons.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-text-align</th>
                            <td class="var-type">String</td>
                            <td><code>'center'</code></td>
                            <td>CSS alignment of the entered number.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-auto-delay</th>
                            <td class="var-type">Number</td>
                            <td><code>500</code></td>
                            <td>ms threshold before auto value change.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-auto-interval</th>
                            <td class="var-type">Number</td>
                            <td><code>50</code></td>
                            <td>Speed of auto value change.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-buttons-only</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Set this <var>true</var> to disable the possibility to enter or paste the number via keyboard.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-suffix</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Add a suffix to the input (see Example 2)</td>
                        </tr>
                        <tr>
                            <th scope="row">data-decimals</th>
                            <td class="var-type">Number</td>
                            <td><code>null</code></td>
                            <td>Number of decimals for the input value (see Example 2)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="bootstrap-input-spinner-example-wrapper" class="observed" style="min-height:717px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- bootstrap-select -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="bootstrap-select-example" class="mb-1 jquery">Bootstrap Select</h3>
            <p class="mb-4"><a href="https://silviomoreto.github.io/bootstrap-select/">https://silviomoreto.github.io/bootstrap-select/</a></p>

            <p>The <em>Bootstrap Select</em> plugin offers many features to enhance and facilitate the use of Select dropdowns.</p>

            <pre class="mb-4"><code class="language-php">$form->addSelect($select_name, $label, 'class=selectpicker show-tick');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$select_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The select field name.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the select field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The select field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>class=selectpicker</code> attribute to the attributes of the select element to activate the <em>Bootstrap Select</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>Options: </h4>

            <p>Pass options with data attributes. Example:</p>

            <pre class="mb-4"><code class="language-php">$form->addSelect('select-name', 'Label', 'class=selectpicker, data-icon-base=glyphicon');</code></pre>

            <p class="mb-0">The complete data-attribute list is available at <a href="https://developer.snapappointments.com/bootstrap-select/options/#bootstrap-version">https://developer.snapappointments.com/bootstrap-select/options/#bootstrap-version</a>.</p>

            <div id="bootstrap-select-example-wrapper" class="observed" style="min-height:2110px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- colorpicker -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="colorpicker-example" class="mb-1 vanilla-js">Colorpicker</h3>
            <p class="mb-4"><a href="https://github.com/Simonwep/pickr">https://github.com/Simonwep/pickr</a></p>

            <p>The <em>Colorpicker</em> plugin allows you to select colours, set up the colour picker interface and choose the output format.</p>

            <pre class="mb-4"><code class="language-php">$form->addInput('text', 'my-color', '', 'Pick a color:', 'data-colorpicker=true');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$type</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input type. The <em>Colorpicker</em> plugin must be used with an <code>input[type="text"]</code>, so the expected value is <code>'text'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$input_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$value</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The initial value of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-colorpicker</code> attribute to the input element to activate the <em>Colorpicker</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>Colorpicker plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-theme</th>
                            <td class="var-type">String</td>
                            <td><code>'classic'</code></td>
                            <td>The colorpicker theme: <code>'classic'</code>, <code>'monolith'</code> or <code>'nano'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-lock-opacity</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>If true, the user won't be able to adjust any opacity.<br>Opacity will be locked at 1, and the opacity slider will be removed.<br>The HSVaColor object also doesn't contain an alpha, so the toString() methods print HSV, HSL, RGB, HEX, etc.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-preview</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Enable/disable the preview.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-hue</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Enable/disable the hue adjustment.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-output-format</th>
                            <td class="var-type">String</td>
                            <td><code>'HEX'</code></td>
                            <td>Output color format and default color representation of the colorpicker input/output textbox.<br>Valid options are <code>'HEX'</code>, <code>'RGBA'</code>, <code>'HSVA'</code>, <code>'HSLA'</code> and <code>'CMYK'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-position</th>
                            <td class="var-type">String</td>
                            <td><code>'bottom-middle'</code></td>
                            <td>Defines the position of the color-picker.<br>Any combinations of top, left, bottom, or right with one of these optional modifiers: start, middle, end. <br>Examples: 'top-start'/'right-end'<br>If clipping occurs, the color picker will automatically choose its position.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-interaction-[button]</th>
                            <td class="var-type">Boolean</td>
                            <td>No interaction button except the <code>save</code> button.</td>
                            <td>Whether to show the interaction buttons.<br>e.g., <code>data-interaction-hex=true</code><br>The available buttons are the followings: <code>hex</code> <code>rgba</code> <code>hsla</code> <code>hsva</code> <code>cmyk</code> <code>input</code> <code>clear</code> <code>save</code></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="colorpicker-example-wrapper" class="observed" style="min-height:1517px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- dependent-fields -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="dependent-fields-example" class="mb-1 vanilla-js">Dependent Fields</h3>
            <p>The <em>Dependent Fields</em> plugin allows you to show/hide one or more fields based on the value of another.</p>

            <pre class="mb-4"><code class="language-php">$form->startDependentFields($parent_field, $show_values[, $inverse = false]);
// add the dependent fields here
// they'll be shown if the $parent_field value belongs to $show_values
$form->endDependentFields();
</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$parent_field</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the field which will trigger show/hide on dependent fields</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$show_values</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The value(s) (single value or comma separated values) that will show the dependent fields if one is selected</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$inverse</var></th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>if <code>true</code>, dependent fields will be shown if any other value than <var>$show_values</var> is selected.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <p>The dependent fields block is hidden and will be shown if <var>$parent_field</var> changes to one of <var>$show_values</var>.</p>
                <p>Don't forget to call <code>endDependentFields()</code> to end your Dependent Fields block.</p>
                <p>The Dependent fields can be nested (each Dependent fields block can include one or several dependent fields blocks).</p>
                <p class="alert alert-warning has-icon">Dependent fields MUST NOT START with the same fieldname as their parent field.</p>
                <div class="alert alert-info has-icon mb-0">
                    <p class="h4 alert-heading">Triggering events with Javascript</p>
                    <div class="alert-body">
                        <p>In some situations the browser may not dispatch the parent field's <code>change</code> event.<br>Eg,: if the parent field is an hidden field.</p>
                        <p>The alternative in such cases is to trigger the event manually with Javascript:</p>
                        <pre class="language-php"><code>const evt = new Event('change', { bubbles: true });
document.querySelector('input[name="the-parent-field-name"]').dispatchEvent(evt);</code></pre>
                    </div>
                </div>
            </section>

            <div id="dependent-fields-example-wrapper" class="observed" style="min-height:455px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- fileupload -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="fileuploader" class="mb-1 jquery">FileUploader</h3>
            <p class="mb-4"><a href="https://innostudio.de/fileuploader/">https://innostudio.de/fileuploader/</a></p>

            <p>The <em>FileUploader</em> plugin offers a user-friendly interface and makes it easy to set up file fields: click or drag and drop uploads, choice of allowed extensions, file sizes, etc.</p>
            <p>Uploading images, resizing them, creating thumbnails and displaying them is integrated and very easy to set up.</p>

            <pre class="mb-4"><code class="language-php">$form->addFileUpload(string $name, string $value = '', string $label = '', string $attr = '', array  $fileUpload_config = [], array  $current_file = []);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$input_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$value</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The initial value of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$fileUpload_config</var></th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>The plugin configuration node in <span class="file-path">phpformbuilder/plugins-config/fileuploader.xml</span><br>See <a href="#file-uploader-ready-to-use-configurations"><em>Ready-to-use configurations</em></a> below</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$current_file</var></th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>File data if the uploader has to be loaded with an existing file.<br>Useful for update purpose.<br>Example of use here: <a href="../templates/bootstrap-5-forms/fileupload-test-form.php">templates/bootstrap-5-forms/fileupload-test-form.php</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4 id="file-uploader-ready-to-use-configurations" class="border-bottom">Ready-to-use configurations</h4>
            <p>File Uploader is supplied with several ready XML configs:</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Value</th>
                            <th scope="col">Uploader</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><code>'default'</code></td>
                            <td><span class="file-path">phpformbuilder/plugins/fileuploader/default/php/ajax_upload_file.php</span></td>
                        </tr>
                        <tr>
                            <td><code>'image-upload'</code></td>
                            <td><span class="file-path">phpformbuilder/plugins/fileuploader/image-upload/php/ajax_upload_file.php</span></td>
                        </tr>
                        <tr>
                            <td><code>'drag-and-drop'</code></td>
                            <td><span class="file-path">phpformbuilder/plugins/fileuploader/drag-and-drop/ajax_upload_file.php</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>$fileUpload_config - default configuration</h4>

            <pre class="mb-4"><code class="language-php">$default_config = array(
    'xml'           => 'default',
    'uploader'      => 'ajax_upload_file.php',
    'upload_dir'    => '../../../../../file-uploads/',
    'limit'         => 1,
    'extensions'    => ['jpg', 'jpeg', 'png', 'gif'],
    'file_max_size' => 5,
    'thumbnails'    => false,
    'editor'        => false,
    'width'         => null,
    'height'        => null,
    'crop'          => false,
    'debug'         => false
);</code></pre>

            <h4>$fileUpload_config - arguments</h4>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">'xml'</th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>Name of the XML configuration node called in <span class="file-path">phpformbuilder/plugins-config/fileuploader.xml</span></td>
                        </tr>
                        <tr>
                            <th scope="row">'uploader'</th>
                            <td class="var-type">String</td>
                            <td><code>'ajax_upload_file.php'</code></td>
                            <td>name of the PHP uploader file in <span class="file-path">phpformbuilder/plugins/fileuploader/[xms-node-name]/</span></td>
                        </tr>
                        <tr>
                            <th scope="row">'upload_dir'</th>
                            <td class="var-type">String</td>
                            <td><code>'../../../../../file-uploads/'</code></td>
                            <td>Path from the PHP uploader (i.e., <span class="file-path">phpformbuilder/plugins/fileuploader/default/php/ajax_upload_file.php</span>) to the upload directory</td>
                        </tr>
                        <tr>
                            <th scope="row">'limit'</th>
                            <td class="var-type">Integer</td>
                            <td><code>1</code></td>
                            <td>Maximum number of uploaded files</td>
                        </tr>
                        <tr>
                            <th scope="row">'extensions'</th>
                            <td class="var-type">Array</td>
                            <td><code>['jpg', 'jpeg', 'png', 'gif']</code></td>
                            <td>Array with the allowed extensions</td>
                        </tr>
                        <tr>
                            <th scope="row">'file_max_size'</th>
                            <td class="var-type">Integer</td>
                            <td><code>5</code></td>
                            <td>maximal file size in MB</td>
                        </tr>
                        <tr>
                            <th scope="row">'thumbnails'</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>For image upload - Defines whether the uploader creates thumbnails or not - the thumbnails can be configured in the PHP image uploader in <span class="file-path">phpformbuilder/plugins/fileuploader/image-upload/php/ajax_upload_file.php</span></td>
                        </tr>
                        <tr>
                            <th scope="row">'editor'</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>For image upload - uploaded images can be clicked & edited by user (true|false)</td>
                        </tr>
                        <tr>
                            <th scope="row">'width'</th>
                            <td class="var-type">Integer|null</td>
                            <td><code>null</code></td>
                            <td>For image upload - maximum image width in px. <code>null</code> = no limitation</td>
                        </tr>
                        <tr>
                            <th scope="row">'height'</th>
                            <td class="var-type">Integer|null</td>
                            <td><code>null</code></td>
                            <td>For image upload - maximum image height in px. <code>null</code> = no limitation</td>
                        </tr>
                        <tr>
                            <th scope="row">'crop'</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>For image upload - crop image to fit the given width & height (true|false)</td>
                        </tr>
                        <tr>
                            <th scope="row">'debug'</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Log errors in the browser console (true|false)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <p class="alert alert-info medium has-icon">You can easily deal with uploaded files, thumbnails and images sizes in <span class="file-path">plugins/fileuploader/[xml]/php/[uploader].php</span></p>

                <p class="alert alert-info medium has-icon">Other examples with code are available in <a href="../templates/index.php">Templates</a></p>
            </section>

            <div id="file-upload-example-wrapper" class="observed" style="min-height:1101px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>

            <h4>Uploaded file names and replacements</h4>

            <p>These options are set in <span class="file-path">phpformbuilder/plugins/fileuploader/<span class="text-muted">[default|drag-and-drop|image-upload]</span>/php/ajax_upload_file.php</span></p>
            <p>The uploader PHP documentation is available on the author's website: <a href="https://innostudio.de/fileuploader/documentation/#php">https://innostudio.de/fileuploader/documentation/#php</a>.</p>
            <p class="mb-5">If the uploaded file has the same name as an existing file, the fileuploader will add a suffix.<br> E.g., "<em>my-file-1.jpg</em>".</p>

            <h4>To deal with the posted uploaded files:</h4>

            <pre class="line-numbers"><code class="language-php">// at the beginning of your file
use fileuploader\server\FileUploader;
include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . 'phpformbuilder/plugins/fileuploader/server/class.fileuploader.php';

// once the form is validated
if (isset($_POST['user-logo']) && !empty($_POST['user-logo'])) {
    $posted_img = FileUploader::getPostedFiles($_POST['user-logo']);
    $filename   = $posted_img[0]['file'];
    // Then do what you want with the filename
}</code></pre>
        </article>

        <!-- Floating labels -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="floating-labels" class="mb-1 vanilla-js">Floating Labels</h3>
            <p class="mb-4"><a href="https://github.com/migliori/shadow-floating-labels">https://github.com/migliori/shadow-floating-labels</a></p>
            <p>The <em>Floating Labels</em> plugin is a simple and lightweight Javascript which transforms your input and textarea's placeholders into floating labels.</p>
            <p><strong>This plugin is automatically activated on all forms</strong> except Material Design forms (Material Design already floats labels on its own).</p>
            <p>If you want to disable floating labels, simply add the <code>data-no-floating-labels</code> attribute to your form.</p>

            <div id="floating-labels-example-wrapper" class="observed" style="min-height:658px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- Formvalidation -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="formvalidation" class="mb-1 vanilla-js">Form Validation</h3>
            <p class="mb-4"><a href="https://formvalidation.io/">https://formvalidation.io/</a></p>
            <p>The <em>Form Validation</em> plugin is a professional JavaScript validation module with extensive functionality. It integrates perfectly with all frameworks and other plugins.</p>
            <p>For complete documentation, see <a href="class-doc.php#javascript-validation-getting-started">javascript validation</a>.</p>
        </article>

        <!-- hcaptcha -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="hcaptcha-example" class="mb-1 vanilla-js">HCaptcha</h3>
            <p class="mb-4"><a href="https://docs.hcaptcha.com">https://docs.hcaptcha.com</a></p>
            <p>The <em>HCaptcha</em> plugin is a good alternative to Google's <em>Recaptcha</em>. It allows you to verify that the user of your form is not a bot without asking for problems for human users.</p>

            <pre class="mb-4"><code class="language-php">$form->addHcaptcha($hcaptcha_site_key, $attr);

// Validation after POST:
$validator->hcaptcha('hcaptcha-secret-key', 'Captcha Error')->validate('h-captcha-response');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$hcaptcha_site_key</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The HCaptcha site key. You have to get it on the <a href="https://www.hcaptcha.com">HCaptcha website</a>.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The HCaptcha data-attributes in a comma-separated list.<br>HCaptcha accepts several data-attributes for its configuration, you'll find them here: <a href="https://docs.hcaptcha.com/configuration">https://docs.hcaptcha.com/configuration</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-info has-icon">
                <ul>
                    <li>If you use CSP headers, please add the following to your configuration:
                        <ul>
                            <li>script-src should include https://hcaptcha.com, https://*.hcaptcha.com</li>
                            <li>frame-src should include https://hcaptcha.com, https://*.hcaptcha.com</li>
                            <li>style-src should include https://hcaptcha.com, https://*.hcaptcha.com</li>
                            <li>connect-src should include https://hcaptcha.com, https://*.hcaptcha.com</li>
                        </ul>
                    </li>
                    <li>If you encounter any issue please see the <a href="https://docs.hcaptcha.com">hCaptcha documentation.</a>.</li>
                </ul>
            </div>

            <div class="my-5">
                <h4>HCaptcha Local Development</h4>
                <p>PHP Form Builder detects your environment (localhost vs production) with this code:</p>
                <pre class="mb-4"><code class="language-php">if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1') {
    // local development server detected
}</code></pre>
                <p>If a local development server is detected, PHP Form Builder automatically replaces your HCaptcha keys with the Test Keys provided by hcaptcha.</p>
                <p class="mb-0">In short, this means that <strong>your HCaptcha will work on your localhost and your production server. You don't have to worry about it</strong>.</p>
            </div>

            <div id="hcaptcha-example-wrapper" class="observed" style="min-height:658px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- iCheck -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="icheck-example" class="mb-1 jquery">iCheck</h3>
            <p class="mb-4"><a href="https://github.com/fronteed/icheck">https://github.com/fronteed/icheck</a></p>

            <p>The <em>iCheck</em> plugin transforms radio buttons and checkboxes to make them look better</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('icheck', $selector, $config, $options;</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">icheck <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'icheck'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <code>'default'</code>: Configuration to be used with the <em>'flat'</em>, <em>'minimal'</em> or <em>'square'</em> themes<br>
                                <code>'theme'</code>: Configuration to be used with the <em>'futurico'</em> or <em>'polaris'</em> themes<br>
                                <code>'line'</code>: Configuration to be used with the <em>'line'</em> theme
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$options</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>
                                <p class="mb-1">Associative array with:</p>
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Key</th>
                                            <th scope="col">Value</th>
                                        </tr>
                                    <tbody>
                                        <tr>
                                            <td>'theme'</td>
                                            <td>A theme from <span class="file-path">plugins/icheck/skins/</span>.<br>Available themes: <code>'flat'</code>, <code>'futurico'</code>, <code>'line'</code>, <code>'minimal'</code>, <code>'polaris'</code>, <code>'square'</code></td>
                                        </tr>
                                        <tr>
                                            <td>'color'</td>
                                            <td>
                                                A color from <span class="file-path">plugins/icheck/skins/[theme]/</span>.<br>Available colors: <code>'purple'</code>, <code>'blue'</code>, <code>'green'</code>, <code>'grey'</code>, <code>'orange'</code>, <code>'pink'</code>, <code>'purple'</code>, <code>'red'</code>, <code>'yellow'</code>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </thead>
                                </table>
                                Example:
                                <pre><code class="language-php">[
    'theme' => 'flat',
    'color' => 'red'
]</code></pre>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="icheck-example-wrapper" class="observed" style="min-height:2263px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- image-picker -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="image-picker-example" class="mb-1 jquery">Image Picker</h3>

            <p class="mb-4"><a href="https://rvera.github.io/image-picker/">https://rvera.github.io/image-picker/</a></p>

            <p>The <em>Image Picker</em> plugin allows you to select images by clicking them instead of displaying a select dropdown list. applies on <code>&lt;select&gt;</code> elements.</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('image-picker', 'select');</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">image-picker <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'image-picker'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p class="medium mb-0">The configuration node in the plugin's XML file.<br>You can add your own configurations in <span class="file-path">phpformbuilder/plugins-config/image-picker</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Image Picker plugin ~ available data-attributes for the <em>option</em> tags:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;option&gt;</code> tags.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-img-src</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The URL of the source image</td>
                        </tr>
                        <tr>
                            <th scope="row">data-img-alt</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The alternative text</td>
                        </tr>
                        <tr>
                            <th scope="row">data-img-label</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The image label (the parent select must have the <code>show_label</code> class</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Image Picker plugin ~ available data-attributes for the <em>select</em> tags:</h4>

            <p>The following options are available with data-attributes and CSS class on the <code>&lt;select&gt;</code> fields</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-limit</th>
                            <td class="var-type">Number</td>
                            <td><code>null</code></td>
                            <td>Limit maximum selection in multiple select</td>
                        </tr>
                        <tr>
                            <th scope="row">data-img-alt</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The alternative text</td>
                        </tr>
                        <tr>
                            <th scope="row">show_label</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Add the <em>show_label</em> class (i.e, <code>class=show_label</code>) to enable label for each option (image)</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="image-picker-example-wrapper" class="observed" style="min-height:518px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
            <p>Other examples with option groups & multiple selections are available at <a href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/image-picker-form.php">https://www.phpformbuilder.pro/templates/bootstrap-4-forms/image-picker-form.php</a>.</p>
        </article>

        <!-- Intl Tel Input -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="intl-tel-input-example" class="mb-1 vanilla-js">Intl Tel Input (International Phone Numbers)</h3>

            <p class="mb-4"><a href="https://github.com/jackocnr/intl-tel-input">https://github.com/jackocnr/intl-tel-input</a></p>

            <p>The <em>Intl Tel Input</em> plugin allows you to choose a country and display a corresponding phone number placeholder. It is perfectly well supported by the <a href="#formvalidation">JavaScript validation plugin</a>.</p>

            <pre class="mb-4"><code class="language-php">$form->addInput('tel', $name, $value, $label, 'data-intphone=true');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$type</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input type. The <em>Intl Tel Input</em> plugin must be used with an <code>input[type="tel"]</code>, so the expected value is <code>'tel'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$input_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$value</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The initial value of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-intphone</code> attribute to the input element to activate the <em>Intl Tel Input</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>Intl Tel Input plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-allow-dropdown</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Whether or not to allow the dropdown. If disabled, there is no dropdown arrow, and the selected flag is not clickable. Also, we display the selected flag on the right instead because it is just a state marker.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-exclude-countries</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>In the dropdown, display all countries except the ones you specify here. You must enter countries' codes separated by commas.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-initial-country</th>
                            <td class="var-type">String</td>
                            <td><code>'auto'</code></td>
                            <td>Set the initial country selection by specifying its country code. You can also set it to "auto", which will look up the user's country based on their IP address<br>Example: <code>'fr'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-only-countries</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>In the dropdown, display only the countries you specify. You must enter countries' codes separated by commas.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-preferred-countries</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Specify the countries to appear at the top of the list. You must enter countries' codes separated by commas.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="alert alert-info has-icon mb-6">If you use Intl Tel Input with the <strong>Formvalidation plugin</strong>,<br>add <code>data-fv-intphonenumber=true</code> to the input attributes.</p>

            <div id="intl-tel-input-example-wrapper" class="observed" style="min-height:1558px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- js-captcha -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="js-captcha-example" class="mb-1 vanilla-js">JS-Captcha</h3>
            <p class="mb-4"><a href="https://github.com/robiveli/js-captcha">https://github.com/robiveli/js-captcha</a></p>

            <p>Simple numeric captcha (anti-spam) rendered within basic canvas element.</p>

            <pre class="mb-4"><code class="language-php">$form->addInput('text', 'j-captcha-input', '', 'Type in result please', 'class=jCaptcha');</code></pre>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>jCaptcha</code> class to the input element to activate the <em>JS-Captcha</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>JS-Captcha plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-color</th>
                            <td class="var-type">String</td>
                            <td><code>'#333'</code></td>
                            <td>The CSS color for the challenge operation.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-error-text</th>
                            <td class="var-type">String</td>
                            <td><code>'Wrong result'</code></td>
                            <td>The error text for wrong result.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <dl class="dl-horizontal medium mb-4">
                <dt>data-color <span class="text-muted">[String]</span></dt>
                <dd>The CSS color for the challenge operation.<br>Default: <code>'#333'</code></dd>
                <dd class="line-break"></dd>
                <dt>data-error-text <span class="text-muted">[String]</span></dt>
                <dd>The error text for wrong result.</dd>
                <dd class="line-break"></dd>
            </dl>

            <h4>Server-side validation</h4>

            <p>The <em>JS-Captcha</em> plugin is effective only if JavaScript is enabled.<br>To overcome this problem, PHP Form Builder automatically creates a hidden field that allows server-side validation by adding this line to the PHP validator:</p>

            <pre class="mb-4"><code class="language-php">// replace 'j-captcha-input' with your input name
$validator->jsCaptcha()->validate('j-captcha-input');</code></pre>

            <div id="js-captcha-example-wrapper" class="observed" style="min-height:871px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- Ladda -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="ladda-example" class="mb-1 vanilla-js">Ladda (Buttons spinners)</h3>

            <p class="mb-4"><a href="https://github.com/hakimel/Ladda">https://github.com/hakimel/Ladda</a></p>

            <p>Buttons with built-in loading indicators, effectively bridging the gap between action and feedback.</p>

            <pre class="mb-4"><code class="language-php">$form->addBtn($type, $btn_name, $value, $label, 'data-ladda-button=true');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$type</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The button type. <code>'submit'</code>, <code>'button'</code> or <code>'reset'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$btn_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the button.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$value</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The value of the button.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the button.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The button attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-ladda-button</code> attribute to the button element to activate the <em>Ladda</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>Ladda plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;button&gt;</code> tag.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-style</th>
                            <td class="var-type">String</td>
                            <td><code>'zoom-in'</code></td>
                            <td>The style of the Ladda loader.<br>
                                <code>'expand-left'</code>, <code class="ms-2">'expand-right'</code>,
                                <code class="ms-2">'expand-up'</code>, <code class="ms-2">'expand-down'</code>,
                                <code class="ms-2">'contract'</code>, <code class="ms-2">'contract-overlay'</code>,
                                <code class="ms-2">'zoom-in'</code>, <code class="ms-2">'zoom-out'</code>,
                                <code class="ms-2">'slide-left'</code>, <code class="ms-2">'slide-right'</code>,
                                <code class="ms-2">'slide-up'</code>, <code class="ms-2">'slide-down'</code>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">data-spinner-size</th>
                            <td class="var-type">Number</td>
                            <td><code>40</code></td>
                            <td>pixel dimensions of spinner, defaults to dynamic size based on the button height.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-spinner-color</th>
                            <td class="var-type">String</td>
                            <td><code>'#fff'</code></td>
                            <td>A hex code or any named CSS color.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-spinner-lines</th>
                            <td class="var-type">Number</td>
                            <td><code>12</code></td>
                            <td>The number of lines the for the spinner</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="ladda-example-wrapper" class="observed" style="min-height:1592px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- LC-Switch -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="lcswitch-example" class="mb-1 vanilla-js">LC-Switch (Checkbox/radio switches)</h3>

            <p class="mb-4"><a href="https://lcweb.it/lc-switch-javascript-plugin">https://lcweb.it/lc-switch-javascript-plugin</a></p>

            <p>The <em>LC-Switch</em> plugin turns radio buttons and checkboxes into switches.</p>

            <p>It can be <strong>enabled globally on checkbox groups/radio button groups</strong>ith common texts and colors, or <strong>enabled individually on checkboxes/radio buttons with specific settings for each one.</strong></p>

            <pre class="mb-4"><code class="language-php">$form->printCheckboxGroup($group_name, $label, $inline, 'data-lcswitch=true');
// or
$form->printRadioGroup($group_name, $label, $inline, 'data-lcswitch=true');
            </code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$group_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the target checkbox group/radio button group.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The main label of the checkbox group/radio button group.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$inline</var></th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Defines whether if the checkboxes/radio buttons are displayed inline or not.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The checkbox group/radio button group attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">To activate the <em>LC-Switch</em> plugin, add the <code>data-lcswitch</code> attribute to the checkbox group/radio button group.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>LC-Switch plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the checkbox group/radio button group, AND <code>&lt;radio&gt;</code> or <code>&lt;radio&gt;</code> element.</p>

            <p>Attributes defined on checkbox/radio elements have priority over those defined on checkbox group/radio button group</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-ontext</th>
                            <td class="var-type">String</td>
                            <td><code>'Yes'</code></td>
                            <td>Short 'On' text to fit into the switch width.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-offtext</th>
                            <td class="var-type">String</td>
                            <td><code>'No'</code></td>
                            <td>short 'Off' text to fit into the switch width.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-oncolor</th>
                            <td class="var-type">String</td>
                            <td><code>'rgb(117, 185, 54)'</code></td>
                            <td>
                                Sets the background color of the "<em>On</em>" switches.<br>Can be any CSS color/gradient in any format.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">data-oncss</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>
                                Sets the background color of the "<em>On</em>" switches.<br>Can be any CSS classname.<br>"<em>data-oncolor</em>" takes precedence on "<em>data-oncss</em>".
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="lcswitch-example-wrapper" class="observed" style="min-height:487px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- Litepicker -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="litepicker-example" class="mb-1 vanilla-js">Litepicker (Date/Date range picker)</h3>

            <p class="mb-4"><a href="https://wakirin.github.io/Litepicker/">https://wakirin.github.io/Litepicker/</a></p>

            <p>The <em>LitePicker</em> plugin is a very light and powerful date picker with many advanced features.</p>

            <pre class="mb-4"><code class="language-php">$form->addInput($type, $input_name, $value, $label, 'data-litepick=true');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$type</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input type. The <em>Litepicker</em> plugin must be used with an <code>input[type="text"]</code>, so the expected value is <code>'text'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$input_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$value</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The initial value of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The select field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-litepick</code> attribute to the input element to activate the <em>Litepicker</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                    <p>The following options, whose value is an object or a function, must be passed in JavaScript, as well as the callback events:</p>
                    <ul>
                        <li>buttonText (Object)</li>
                        <li>lockDaysFilter (function)</li>
                        <li>tooltipText (Object)</li>
                    </ul>
                    <p>See <a href="#litepicker-object">The litePicker JavaScript API (Object &amp; events)</a></p>
                    <hr>
                    <p class="h5"><strong>Year/Month dropdowns</strong></p>
                    <p>The original plugin passes a <var>dropdowns</var> object to enable Year/Month dropdowns.</p>
                    <p class="mb-0">With PHP Form Builder, you can enable the dropdowns with the <var>data-dropdown-months</var> and <var>data-dropdown-years</var> attributes.</p>
                </div>
            </div>

            <h4>LitePicker plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-allow-repick</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>If a date range is already selected, the user can change only the start date or the end date (depending on the clicked field) instead of the new date range.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-auto-apply</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Hide the apply and cancel buttons and automatically apply a new date range as soon as two dates are clicked.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-auto-refresh</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Indicates whether the date range picker should automatically update the value of the <code>&lt;input&gt;</code> element it's attached to at initialization and when the selected dates change.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-delimiter</th>
                            <td class="var-type">String</td>
                            <td><code>" - "</code></td>
                            <td>Delimiter between dates.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-disallow-lock-days-in-range</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Prevent to select date ranges with locked dates.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-dropdown-min-year</th>
                            <td class="var-type">Number</td>
                            <td><code>1990</code></td>
                            <td>Minimum year in the Years dropdown selector</td>
                        </tr>
                        <tr>
                            <th scope="row">data-dropdown-max-year</th>
                            <td class="var-type">Number</td>
                            <td><code>null</code></td>
                            <td>Maximum year in the Years dropdown selector</td>
                        </tr>
                        <tr>
                            <th scope="row">data-dropdown-months</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Enables the Months dropdown selector</td>
                        </tr>
                        <tr>
                            <th scope="row">data-dropdown-years</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Enables the Years dropdown selector</td>
                        </tr>
                        <tr>
                            <th scope="row">data-element-end</th>
                            <td class="var-type">String</td>
                            <td><code>null</code></td>
                            <td>Bind the datepicker to a element for end date. The value is the element ID.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-end-date</th>
                            <td class="var-type">Date | Number | String</td>
                            <td><code>null</code></td>
                            <td>Preselect end date.<br> Required <var>startDate</var>.<br> Date Object or Unix Timestamp (with milliseconds) or String (must be equal to option format).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-first-day</th>
                            <td class="var-type">Number</td>
                            <td><code>1</code></td>
                            <td>Day of start week. (0 - Sunday, 1 - Monday, 2 - Tuesday, etc.</td>
                        </tr>
                        <tr>
                            <th scope="row" id="litepicker-data-format">data-format</th>
                            <td class="var-type">String</td>
                            <td><code>"YYYY-MM-DD"</code></td>
                            <td>
                                <p>Allowed formats:</p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th scope="col">Token</th>
                                            <th scope="col">Output</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th rowspan="2" scope="row">Day of Month</th>
                                            <td>D</td>
                                            <td>1 2 … 30 31</td>
                                        </tr>
                                        <tr>
                                            <td>DD</td>
                                            <td>01 02 … 30 31</td>
                                        </tr>
                                        <tr>
                                            <th rowspan="4" scope="row">Month</th>
                                            <td>M</td>
                                            <td>1 2 … 11 12</td>
                                        </tr>
                                        <tr>
                                            <td>MM</td>
                                            <td>01 02 … 11 12</td>
                                        </tr>
                                        <tr>
                                            <td>MMM</td>
                                            <td>Jan Feb … Nov Dec</td>
                                        </tr>
                                        <tr>
                                            <td>MMMM</td>
                                            <td>January February … November December</td>
                                        </tr>
                                        <tr>
                                            <th rowspan="2" scope="row">Year</th>
                                            <td>YY</td>
                                            <td>70 71 … 29 30</td>
                                        </tr>
                                        <tr>
                                            <td>YYYY</td>
                                            <td>1970 1971 … 2029 2030</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">data-highlighted-days</th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>Highlight days. Can contains array with range:<br> E.g., <code>[ ['2019-01-01', '2019-01-10'], '2019-01-31' ]</code>.<br> Can contain Date Object or Unix Timestamp (with milliseconds) or String (must be equal to option <var>highlightedDaysFormat</var>).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-highlighted-days-format</th>
                            <td class="var-type">String</td>
                            <td><code>"YYYY-MM-DD"</code></td>
                            <td>Date format for option <var>highlightedDays</var>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-inline-mode</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Show calendar inline.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-lang</th>
                            <td class="var-type">String</td>
                            <td><code>"en-US"</code></td>
                            <td>Language. This option affect to day names, month names via <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date/toLocaleString">Date.prototype.toLocaleString()</a> and also affect to plural rules via <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/PluralRules">Intl.PluralRules</a>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-lock-days</th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>Disable days for select. Can contain array with range:<br> Eg: <code>[ ['2019-01-01', '2019-01-10'], '2019-01-31' ]</code>.<br> This example will disable range from 01 Jan 2019 to 10 Jan 2019 and 31 Jan 2019.<br> Can contain Date Object or Unix Timestamp (with milliseconds) or String (must be equal to option <var>lockDaysFormat</var>).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-lock-days-format</th>
                            <td class="var-type">String</td>
                            <td><code>"YYYY-MM-DD"</code></td>
                            <td>Date format for option lockDays.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-lock-days-inclusivity</th>
                            <td class="var-type">String</td>
                            <td><code>"[]"</code></td>
                            <td>A <code>[</code> indicates inclusion of a value. A <code>(</code> indicates exclusion. If the inclusivity parameter is used, both indicators must be passed.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-max-date</th>
                            <td class="var-type">Date | Number | String</td>
                            <td><code>null</code></td>
                            <td>The maximum/latest date that users can select.<br>Date Object or Unix Timestamp (with milliseconds) or ISO String.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-max-days</th>
                            <td class="var-type">Number</td>
                            <td><code>null</code></td>
                            <td>The maximum days of the selected range.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-min-date</th>
                            <td class="var-type">Date | Number | String</td>
                            <td><code>null</code></td>
                            <td>The minimum/earliest date that users can choose.<br>Date Object or Unix Timestamp (with milliseconds) or ISO String.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-min-days</th>
                            <td class="var-type">Number</td>
                            <td><code>null</code></td>
                            <td>The minimum days of the selected range.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-number-of-columns</th>
                            <td class="var-type">Number</td>
                            <td><code>1</code></td>
                            <td>Number of columns months.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-number-of-months</th>
                            <td class="var-type">Number</td>
                            <td><code>1</code></td>
                            <td>Number of visible months.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-parent-el</th>
                            <td class="var-type">String</td>
                            <td><code>null</code></td>
                            <td>Adds the date picker to an element. The value is the element ID.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-position</th>
                            <td class="var-type">String</td>
                            <td><code>'auto'</code></td>
                            <td>
                                <p>A space-separated string consisting of one or two of left or right, top or bottom, and auto (may be omitted).</p>
                                <p>For example:</p>
                                <ul>
                                    <li><code>'top left'</code> - calendar will be displayed above the element.</li>
                                    <li><code>'bottom'</code> - calendar will be displayed below the element. Horizontal orientation will be default to auto.</li>
                                    <li><code>'right'</code> - vertical orientation will default to auto.</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">data-reset-button</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Adds a reset button to clear the current selection.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-scroll-to-date</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Scroll to start date on open.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-select-backward</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Select second date before the first selected date.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-select-forward</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Select second date after the first selected date.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-show-tooltip</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Showing tooltip with how much days will be selected.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-show-week-numbers</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Show week numbers. Based on option <var>firstDay</var>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-single-mode</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Choose a single date instead of a date range.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-split-view</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Enable the previous and the next button for each month.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-start-date</th>
                            <td class="var-type">Date | Number | String</td>
                            <td><code>null</code></td>
                            <td>Preselect date.<br>If option <var>singleMode</var> is disabled, then <var>endDate</var> must be set too.<br>Date Object or Unix Timestamp (with milliseconds) or String (must be equal to option <var>format</var>).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-switching-months</th>
                            <td class="var-type">Number</td>
                            <td><code>null</code></td>
                            <td>Indicates whether the date range picker should switch months by this value instead of the <var>numberOfMonths</var>' value'.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-z-index</th>
                            <td class="var-type">Number</td>
                            <td><code>9999</code></td>
                            <td>Control zIndex of the picker element.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <h4 id="litepicker-object" class="border-bottom">The litePicker JavaScript API (Object &amp; events)</h4>
                <p>PHP Form Builder creates a global <code>litePickers</code> object. Then each instance is registered with its input field name.<br>It allows access to each instance individually and the use of the litepicker Events or functions.<br>For instance:</p>

                <pre class="mb-4"><code class="language-javascript">// get the input id
let inputId = 'my-input';

// set some options
litePickers[inputId].setOptions({'onSelect': function() {
    console.log(this.options);
    console.log(this.getDate());
    console.log(document.getElementById(inputId).value);
}});

litePickers[inputId].setOptions({
    'buttonText': {
        "apply":"Apply",
        "cancel":"Cancel",
        "previousMonth":"&lt;svg&gt;...&lt;/svg&gt;",
        "nextMonth":"&lt;svg&gt;...&lt;/svg&gt;",
        "reset":"&lt;svg&gt;...&lt;/svg&gt;"
    }
});</code></pre>
            </section>

            <div id="litepicker-example-wrapper" class="observed" style="min-height:1437px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
            <p>Other examples with different options are available at <a href="https://www.phpformbuilder.pro/templates/bootstrap-4-forms/date-range-picker-form.php">https://www.phpformbuilder.pro/templates/bootstrap-4-forms/date-range-picker-form.php</a>.</p>
        </article>

        <!-- Material Design -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="material-design" class="mb-1 vanilla-js">Material Design plugin</h3>

            <p class="mb-4"><a href="https://materializecss.com/">https://materializecss.com/</a></p>

            <p><em>Material Design</em> must be enabled globally as a framework when creating your form.</p>

            <ul>
                <li class="mb-2"><strong>If your page uses the <em>Material Design</em> CSS framework</strong>, setting the framework when creating the form is sufficient.</li>
                <li><strong>If your page uses the <em>Bootstrap</em> CSS framework</strong>, you need to enable the <em>Material Design</em> plugin to convert the fields to "<em>material design</em>" style.</li>
            </ul>

            <p>Check out the code of the <a href="../templates/index.php?framework=material"><em>"Material"</em></a> and <a href="../templates/index.php?framework=material-bootstrap"><em>"Material Bootstrap"</em></a> templates to see how it works.</p>

            <pre class="mb-4"><code class="language-php">$form = new Form($form_id, $layout, $attr, 'material');

// if your page uses Bootstrap add the following line to enable the Material Design style
$form->addPlugin('materialize', $selector);
            </code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">materialize <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'materialize'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#my-form'</code>) of the form on which the plugin will be enabled.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="material-example-wrapper" class="observed" style="min-height:465px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- Material datepicker -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="material-datepicker-example" class="mb-1 vanilla-js">Material Datepicker</h3>

            <p class="mb-4"><a href="https://materializecss.com/pickers.html">https://materializecss.com/pickers.html</a></p>

            <p>The <em>Material Datepicker</em> plugin can be used with any framework (Bootstrap 4, Bootstrap 5, Bulma, Foundation, Material Design, ...)</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('material-datepicker', $selector, $config);</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">material-datepicker <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'material-datepicker'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p class="medium mb-0">The configuration node in the plugin's XML file.<br>You can add your own configurations in <span class="file-path">phpformbuilder/plugins-config/material-datepicker</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-warning has-icon mb-6">
                <p>If you use the Material Datepicker plugin <strong>with Ajax</strong> AND <strong>without Material framework</strong>,<br>you have to load the 3 following files in your main page:</p>
                <ul>
                    <li><code>&lt;link rel=&quot;stylesheet&quot; href=&quot;/phpformbuilder/plugins/material-pickers-base/dist/css/material-pickers-base.min.css&quot;&gt;</code></li>
                    <li><code>&lt;script src=&quot;/phpformbuilder/plugins/material-pickers-base/dist/js/material-pickers-base.min.js&quot;&gt;&lt;/script&gt;</code></li>
                    <li><code>&lt;script src=&quot;/phpformbuilder/plugins/material-datepicker/dist/i18n/en_EN.js&quot;&gt;&lt;/script&gt;</code></li>
                </ul>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <h5>Material Datepicker JavaScript API (Object &amp; events)</h5>
                    <p class="mb-0">Get the Datepicker instance as described in Materialize's documentation: <code>var instance = M.Datepicker.getInstance(elem);</code>.</p>
                </div>
            </div>

            <h4>Material Datepicker plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-auto-close</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Automatically close picker when date is selected.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-format</th>
                            <td class="var-type">String</td>
                            <td><code>'mmm dd, yyyy'</code></td>
                            <td>The date output format for the input field value.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-default-date</th>
                            <td class="var-type">null|String</td>
                            <td><code>null</code></td>
                            <td>The initial date to view when first opened.<br>The date must be a string in JavaScript <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date">Date Object format</a></td>
                        </tr>
                        <tr>
                            <th scope="row">data-set-default-date</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Make the defaultDate the initially selected value.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-disable-weekends</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Prevent selection of any date on the weekend.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-first-day</th>
                            <td class="var-type">Number</td>
                            <td><code>0</code></td>
                            <td>First day of the week (0: Sunday, 1: Monday, etc.).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-min-date</th>
                            <td class="var-type">null|String</td>
                            <td><code>null</code></td>
                            <td>The earliest date that can be selected.<br>The date must be a string in JavaScript <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date">Date Object format</a>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-max-date</th>
                            <td class="var-type">null|String</td>
                            <td><code>null</code></td>
                            <td>The latest date that can be selected.<br>The date must be a string in JavaScript <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date">Date Object format</a>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-year-range</th>
                            <td class="var-type">Number</td>
                            <td><code>10</code></td>
                            <td>Number of years either side or array of upper/lower range.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-is-rtl</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Changes Datepicker to RTL.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-show-month-after-year</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Show the month after the year in the Datepicker title.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-show-days-in-next-and-previous-months</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Render days of the calendar grid that fall in the next or previous month.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-show-clear-btn</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Show the clear button in the datepicker.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <h4>Translation (i18n)</h4>
                <ol class="numbered">
                    <li>Add your language file in <span class="file-path">phpformbuilder/plugins/material-datepicker/dist/i18n/</span></li>
                    <li>Initialize the plugin with your language, for example:<br>
                        <code>$form->addPlugin('material-datepicker', '#selector', 'default', array('language' => 'fr_FR'));</code>
                    </li>
                </ol>
            </section>

            <div id="material-datepicker-example-wrapper" class="observed" style="min-height:1299px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- Material timepicker -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="material-timepicker-example" class="mb-1 vanilla-js">Material Timepicker</h3>

            <p class="mb-4"><a href="https://materializecss.com/pickers.html">https://materializecss.com/pickers.html</a></p>

            <p>The <em>Material Timepicker</em> plugin can be used with any framework (Bootstrap 4, Bootstrap 5, Bulma, Foundation, Material Design, ...)</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('material-timepicker', $selector, $config);</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">material-timepicker <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'material-timepicker'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p class="medium mb-0">The configuration node in the plugin's XML file.<br>You can add your own configurations in <span class="file-path">phpformbuilder/plugins-config/material-timepicker</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="alert alert-warning has-icon mb-6">
                <p>If you use the Material Timepicker plugin <strong>with Ajax</strong> AND <strong>without Material framework</strong>,<br>you have to load the 3 following files in your main page:</p>
                <ul>
                    <li><code>&lt;link rel=&quot;stylesheet&quot; href=&quot;/phpformbuilder/plugins/material-pickers-base/dist/css/material-pickers-base.min.css&quot;&gt;</code></li>
                    <li><code>&lt;script src=&quot;/phpformbuilder/plugins/material-pickers-base/dist/js/material-pickers-base.min.js&quot;&gt;&lt;/script&gt;</code></li>
                    <li><code>&lt;script src=&quot;/phpformbuilder/plugins/material-datepicker/dist/i18n/en_EN.js&quot;&gt;&lt;/script&gt;</code></li>
                </ul>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <h5>Timepicker Datepicker JavaScript API (Object &amp; events)</h5>
                    <p class="mb-0">Get the Datepicker instance as described in Materialize's documentation: <code>var instance = M.Timepicker.getInstance(elem);</code>.</p>
                </div>
            </div>

            <h4>Material Timepicker plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-show-clear-btn</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Show the clear button in the timepicker.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-default-time</th>
                            <td class="var-type">String</td>
                            <td><code>'now'</code></td>
                            <td>Default time to set on the timepicker.<br>e.g., <code>'now'</code> or <code>'13:14'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-from-now</th>
                            <td class="var-type">Number</td>
                            <td><code>0</code></td>
                            <td>Millisecond offset from the defaultTime.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-auto-close</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Automatically close picker when minute is selected.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-twelve-hour</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Use 12 hour AM/PM clock instead of 24 hour clock.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <h4>Translation (i18n)</h4>
                <ol class="numbered">
                    <li>Add your language file in <span class="file-path">phpformbuilder/plugins/material-timepicker/dist/i18n/</span></li>
                    <li>Initialize the plugin with your language, for example:<br>
                        <code>$form->addPlugin('material-timepicker', '#selector', 'default', array('language' => 'fr_FR'));</code>
                    </li>
                </ol>
            </section>

            <div id="material-timepicker-example-wrapper" class="observed" style="min-height:1228px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- modal -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="modal-example" class="mb-1 vanilla-js">Modal</h3>

            <p class="mb-4"><a href="https://github.com/Ghosh/micromodal">https://github.com/Ghosh/micromodal</a></p>

            <p>The <em>Micromodal</em> plugin is a lightweight, configurable and Accessibility-enabled modal library written in pure JavaScript.</p>
            <p>PHP Form Builder creates the HTML code for the modal and wraps your form inside it when you enable it.<br>So you just need to add a link to your page to open the modal with the form inside.<br>No additional code is required.</p>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p>The link that will open the modal must have the <code>data-micromodal-trigger="modal-form-id"</code> attribute where <em>modal-form-id</em> is <strong>the literal string <code>'modal-'</code> + the form id</strong>.</p>
                    <p class="mb-0">For instance, if you create your form with <code>$form = new Form('my-form');</code>, the data-attribute for the modal link will be: <code>data-micromodal-trigger="modal-my-form"</code></p>
                </div>
            </div>

            <pre class="mb-4"><code class="language-php">&lt;?php
// create the form & enable the modal plugin
$form = new Form('form-id');
// add fields, ...

// enable the modal plugin
$form->modal();

// ... or with some custom options
$modal_options = [
    'title'       => 'Here is a modal form',
    'title-class' => 'text-secondary',
    'title-tag'   => 'h3',
    'animation'   => 'slide-in-top',
    'blurred'     => false
];
$form->modal($modal_options);
?&gt;

&lt;!-- PHP code inside &lt;head /&gt; --&gt;
&lt;?php $form->printIncludes('css'); ?&gt;

&lt;!--
HTML modal link, anywhere inside the &lt;body /&gt; tag
"modal-form-id" is the literal string 'modal-' + the id of your modal form.
e.g., if your form id is 'my-form', the code will be:
&lt;button data-micromodal-trigger="modal-my-form" ...


IMPORTANT - DON'T FORGET TO ADD "modal-" before your form-id in "data-micromodal-trigger" --&gt;
<?php echo htmlspecialchars('<button data-micromodal-trigger="modal-form-id" class="btn btn-primary text-white btn-lg">Open the modal form</button>'); ?>


&lt;!-- Render the form anywhere inside the &lt;body /&gt; tag --&gt; --&gt;
&lt;?php $form->render(); ?&gt;

&lt;!-- PHP code at the end of &lt;body /&gt; --&gt;
&lt;?php
$form->printIncludes('js');
$form->printJsCode();
?&gt;</code></pre>

            <h4>Available options:</h4>

            <p><var>$modal_options</var> is an optional array which can contain the following keys/values:</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Option</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><code>'title'</code></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Title (string or HTML code) of the modal header. If empty, the modal won't have any header.</td>
                        </tr>
                        <tr>
                            <th scope="row"><code>'title-class'</code></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>CSS class of the title.</td>
                        </tr>
                        <tr>
                            <th scope="row"><code>'title-tag'</code></th>
                            <td class="var-type">String</td>
                            <td><code>'h2'</code></td>
                            <td>The HTML tag name of the title.</td>
                        </tr>
                        <tr>
                            <th scope="row"><code>'animation'</code></th>
                            <td class="var-type">String</td>
                            <td><code>'fade-in'</code></td>
                            <td>
                                The entrance animation for the modal; one of the followings:<br>
                                <code>'fade-in'</code>, <code class="ms-2">'slide-in-top'</code>, <code class="ms-2">'slide-in-left'</code>, <code class="ms-2">'slide-in-right'</code>, <code class="ms-2">'slide-in-bottom'</code>, <code class="ms-2">'scale-in'</code>, <code class="ms-2">'flip-in-horizontal'</code>, <code class="ms-2">'flip-in-vertical'</code>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><code>'blur'</code></th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Blur the page behind the modal overlay if enabled</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="modal-example-wrapper" class="observed" style="min-height:636px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- nice-check -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="nice-check-example" class="mb-1 vanilla-js">Nice Check</h3>

            <p>The <em>Nice Check</em> plugin converts your checkboxes and ratio buttons to make them look better.</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('nice-check', $selector, $config, $options);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">nice-check <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'nice-check'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The selector of the form (e.g., <em>#my-form</em>) in which the plugin is activated.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p>The XML node where the plugin JavaScript code is in <span class="file-path">plugins-config/nice-check.xml</span></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$options</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">Array</td>
                            <td><code>['skin' => 'green']</code></td>
                            <td>
                                <p class="mb-1">Associative array with:</p>
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Key</th>
                                            <th scope="col">Value</th>
                                        </tr>
                                    <tbody>
                                        <tr>
                                            <td>'skin'</td>
                                            <td>A skin from the available skins listed below.</td>
                                        </tr>
                                    </tbody>
                                    </thead>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Available skins:</h4>
            <ul class="list-unstyled d-flex flex-wrap">
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#000000"></i>black</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#78909c"></i>blue-gray</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#268fff"></i>blue</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#3ab0c3"></i>cyan</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#5d5552"></i>gray-dark</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#c4bdb9"></i>gray</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#48b461"></i>green</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#7d34f4"></i>indigo</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#fd9137"></i>orange</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#eb5b9d"></i>pink</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#855eca"></i>purple</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#e15361"></i>red</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#41d1a7"></i>teal</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#fff;border:1px solid #ccc;border-radius:50%"></i>white</li>
                <li class="w-25 p-1 mb-2"><i class="bi bi-circle-fill me-2" style="color:#ffca2c"></i>yellow</li>
            </ul>
            <p>Example with skins & code available here: <a href="https://www.phpformbuilder.pro/templates/bootstrap-5-forms/custom-radio-checkbox-css-form.php">Custom radio checkbox css form</a></p>

            <div id="nice-check-example-wrapper" class="observed" style="min-height:945px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- passfield -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="passfield-example" class="mb-1 vanilla-js">Passfield</h3>

            <p class="mb-4"><a href="https://antelle.net/passfield/">https://antelle.net/passfield/</a></p>

            <p>The <em>Passfield</em> plugin makes it easy to create passwords, choose the required complexity, generate them automatically, and warn users if their password is too simple.</p>
            <p>The functions required for validation in PHP are provided for server-side validation.</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('passfield', $selector, $config);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">passfield <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'passfield'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p>One of the available configurations in <span class="file-path">phpformbuilder/plugins-config/passfield.xml</span>.<br>Each Passfield pattern represents the constraints that the password must meet (number of characters, uppercase, numbers, special characters). See <a href="#passfield-available-patterns">Available patterns</a> below.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4 id="passfield-available-patterns" class="border-bottom">Available patterns (<var>$config</var> values):</h4>

            <p>The patterns are validated in JavaScript by the <em>Passfield</em> plugin.<br>An additional server-side validation after posting the form is recommended.<br>We can easily do it with the <a href="https://www.phpformbuilder.pro/documentation/class-doc.php#php-validation-basics">PHP Validators</a>.</p>

            <p class="small text-danger text-end mb-1"><var>x</var> is a number between 3 and 8.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                            <th scope="col">PHP validation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><code>'default'</code></th>
                            <td>The password must contain lowercase letters + numbers and be 8 characters long.</td>
                            <td>
                                <pre><code class="language-php">$validator
->hasLowercase()
->hasNumber()
->minLength(8)
->validate('user-password');</code></pre>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><code>'lower-upper-min-x'</code></th>
                            <td>The password must contain lowercase + uppercase letters and be <var>x</var> characters long.</td>
                            <td>
                                <pre><code class="language-php">$validator
->hasLowercase()
->hasUppercase()
->minLength(x)
->validate('user-password');</code></pre>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><code>'lower-upper-number-min-x'</code></th>
                            <td>The password must contain lowercase + uppercase letters + numbers and be <var>x</var> characters long.</td>
                            <td>
                                <pre><code class="language-php">$validator
->hasLowercase()
->hasUppercase()
->hasNumber()
->minLength(x)
->validate('user-password');</code></pre>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><code>'lower-upper-number-symbol-min-x'</code></th>
                            <td>The password must contain lowercase + uppercase letters + numbers + symbols and be <var>x</var> characters long.</td>
                            <td>
                                <pre><code class="language-php">$validator
->hasLowercase()
->hasUppercase()
->hasNumber()
->hasSymbol()
->minLength(x)
->validate('user-password');</code></pre>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="alert alert-info has-icon mb-6">You can easily add your own patterns into <span class="file-path">phpformbuilder/plugins-config/passfield.xml</span>.A pattern generator is available at <a href="https://antelle.net/passfield/demo.html">https://antelle.net/passfield/demo.html</a>.</p>

            <div id="passfield-example-wrapper" class="observed" style="min-height:421px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- pickadate -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="pickadate-example" class="mb-1 jquery">Pickadate</h3>

            <p class="mb-4"><a href="https://amsul.ca/pickadate.js/">https://amsul.ca/pickadate.js/</a></p>

            <p>Pickadate is a jQuery date/time picker jQuery. A new version in Vanilla JavaScript is planned for a future update.</p>

            <p class="alert alert-info has-icon my-6">The author of the plugin is working on a new Vanilla JS version.<br>It will be released as soon as a stable version is available.</p>

            <h4>Date picker</h4>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('pickadate', $selector, $config);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">pickadate <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'pickadate'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p><code>'default'</code> | <code>'pickatime'</code></p>
                                <p>The <code>'default'</code> configuration is for the datepicker,<br><code>'pickatime'</code> is for the timepicker.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">The list of the date formats used by the Pickadate plugin is available here: <a href="https://amsul.ca/pickadate.js/date/#formatting-rules" title="Pickadate plugin date formats">https://amsul.ca/pickadate.js/date/#formatting-rules</a>.</p>
                </div>
            </div>

            <h4>Pickadate plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-format</th>
                            <td class="var-type">String</td>
                            <td><code>'mmm dd, yyyy'</code></td>
                            <td>The date output format for the input field value.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-format-submit</th>
                            <td class="var-type">String</td>
                            <td><code>undefined</code></td>
                            <td>Display a human-friendly format and use an alternate one to submit to the server.<br>It is done by creating a new hidden input element with the same name attribute as the original with the <code>_submit</code> suffix.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-select-years</th>
                            <td class="var-type">Boolean</td>
                            <td><code>undefined</code></td>
                            <td>Display select menu to pick the year.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-select-months</th>
                            <td class="var-type">Boolean</td>
                            <td><code>undefined</code></td>
                            <td>Display select menu to pick the month.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-first-day</th>
                            <td class="var-type">Number</td>
                            <td><code>undefined</code></td>
                            <td>First day of the week (0: Sunday, 1: Monday, etc.).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-min</th>
                            <td class="var-type">String</td>
                            <td><code>null</code></td>
                            <td>The earliest date that can be selected.<br>The date must be a string in JavaScript <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date">Date Object format</a>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-max</th>
                            <td class="var-type">String</td>
                            <td><code>null</code></td>
                            <td>The latest date that can be selected.<br>The date must be a string in JavaScript <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date">Date Object format</a>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-close-on-select</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>When a date is selected, the picker closes. To change this behavior, use the following option.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-close-on-clear</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>When the "clear" button is pressed, the picker closes. To change this behavior, use the following option.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Translation (i18n)</h4>

            <ol class="numbered">
                <li>Add your language file in <span class="file-path">phpformbuilder/plugins/pickadate/lib/translations/</span></li>
                <li>Initialize the plugin with your language, for example:<br>
                    <pre class="mb-4"><code>$form->addPlugin('pickadate', '#selector', 'default', array('language' => 'fr_FR'));</code></pre>
                </li>
            </ol>

            <div id="pickadate-example-wrapper" class="observed" style="min-height:1858px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>

            <h4 id="pickadate-timepicker-example">Time picker</h4>

            <p>The <em>Time picker</em> is built with <em>Pickadate</em>, a jQuery date/time picker. A new version in Vanilla JavaScript is planned for a future update.</p>

            <p class="alert alert-info has-icon my-6">The author of the plugin is working on a new Vanilla JS version.<br>It will be released as soon as a stable version is available.</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('pickadate', $selector, $config);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">pickadate <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'pickadate'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p><code>'default'</code> | <code>'pickatime'</code></p>
                                <p>The <code>'default'</code> configuration is for the datepicker,<br><code>'pickatime'</code> is for the timepicker.</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Time picker plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-format</th>
                            <td class="var-type">String</td>
                            <td><code>'h:i A'</code></td>
                            <td>The time output format for the input field value.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-format-submit</th>
                            <td class="var-type">String</td>
                            <td><code>undefined</code></td>
                            <td>Display a human-friendly format and use an alternate one to submit to the server.<br>This is done by creating a new hidden input element with the same name attribute as the original with the <code>_submit</code> suffix.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-interval</th>
                            <td class="var-type">Number</td>
                            <td><code>30</code></td>
                            <td>Choose the minutes interval between each time in the list.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-min</th>
                            <td class="var-type">String</td>
                            <td><code>undefined</code></td>
                            <td>Set the minimum selectable times on the picker.<br>Arrays formatted as [HOUR, MINUTE] (see example below).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-max</th>
                            <td class="var-type">String</td>
                            <td><code>undefined</code></td>
                            <td>Set the maximum selectable times on the picker.<br>Arrays formatted as [HOUR, MINUTE] (see example below).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-close-on-select</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>When a time is selected, the picker closes. To change this behavior, use the following option.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-close-on-clear</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>When the "clear" button is pressed, the picker closes. To change this behavior, use the following option.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Translation (i18n)</h4>
            <ol class="numbered">
                <li>Add your language file in <span class="file-path">phpformbuilder/plugins/pickadate/lib/translations/</span></li>
                <li>Initialize the plugin with your language, for example:<br>
                    <pre class="mb-4"><code class="language-php">$form->addPlugin('pickadate', '#selector', 'pickatime', array('language' => 'fr_FR'));</code></pre>
                </li>
            </ol>

            <div id="pickadate-timepicker-example-wrapper" class="observed" style="min-height:878px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- popover -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="popover-example" class="mb-1 vanilla-js">Popover</h3>

            <p class="mb-4"><a href="https://atomiks.github.io/tippyjs/">https://atomiks.github.io/tippyjs/</a></p>

            <p>The <em>Popover</em> plugin uses <em>tippyjs</em>, as well as the <em>Tooltip</em> plugin.<br>The configuration is therefore defined in the <code>popover</code> node of <span class="file-path">plugins-config/tooltip.xml</span>.<br>
                The settings must be passed as <code>data-attributes</code> on the link(s) that will open the popover.</p>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p>The link that will open the popover must have the <code>data-popover-trigger="form-id"</code> attribute where <em>form-id</em> is your form id</strong>.</p>
                    <p class="mb-0">For instance, if you create your form with <code>$form = new Form('my-form');</code>, the data-attribute for the popover link will be: <code>data-popover-trigger="my-form"</code></p>
                </div>
            </div>

            <pre class="mb-4"><code class="language-php">&lt;?php
// create the form & enable the popover plugin
$form = new Form('form-id');
// add fields, ...

// enable the popover plugin
$form->popover();
?&gt;

&lt;!-- PHP code inside &lt;head /&gt; --&gt;
&lt;?php $form->printIncludes('css'); ?&gt;

&lt;!-- HTML popover link, anywhere inside the &lt;body /&gt; tag --&gt;
<?php echo htmlspecialchars('<button data-popover-trigger="form-id" class="btn btn-primary text-white btn-lg">Open the popover form</button>'); ?>


&lt;!-- Render the form anywhere inside the &lt;body /&gt; tag --&gt; --&gt;
&lt;?php $form->render(); ?&gt;

&lt;!-- PHP code at the end of &lt;body /&gt; --&gt;
&lt;?php
$form->printIncludes('js');
$form->printJsCode();
?&gt;</code></pre>

            <h4>Popover plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the link or button that will open the popover.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-animation</th>
                            <td class="var-type">String</td>
                            <td><code>'fade'</code></td>
                            <td>The popover show/hide animation, among the followings: <code>'fade'</code>, <code class="ms-2">'shift-away'</code>, <code class="ms-2">'shift-toward'</code>, <code class="ms-2">'scale'</code>, <code class="ms-2">'perspective'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-arrow</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>The arrow that points toward the element.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-backdrop</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Covers the page with a semi-opaque background. The background can be customized in <span class="file-path">plugins/tippyjs/stylesheets/backdrop.min.css</span></td>
                        </tr>
                        <tr>
                            <th scope="row">data-delay</th>
                            <td class="var-type">Number</td>
                            <td><code>0</code></td>
                            <td>The delay in milliseconds before opening the popover.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-max-width</th>
                            <td class="var-type">String</td>
                            <td><code>'none'</code></td>
                            <td>The maximum width of the popover. All valid css units are accepted (px, rem, vw, etc.).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-placement</th>
                            <td class="var-type">String</td>
                            <td><code>'top'</code></td>
                            <td>The preferred placement of the tippy. Popper's flip modifier can change it to the opposite placement if it has more space.<br><code>'top'</code>, <code class="ms-2">'top-start'</code>, <code class="ms-2">'top-end'</code>, <code class="ms-2">'right'</code>, <code class="ms-2">'right-start'</code>, <code class="ms-2">'right-end'</code>, <code class="ms-2">'bottom'</code>, <code class="ms-2">'bottom-start'</code>, <code class="ms-2">'bottom-end'</code>, <code class="ms-2">'left'</code>, <code class="ms-2">'left-start'</code>, <code class="ms-2">'left-end'</code>, <code class="ms-2">'auto'</code>, <code class="ms-2">'auto-start'</code>, <code class="ms-2">'auto-end'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-theme</th>
                            <td class="var-type">String</td>
                            <td><code>'light'</code></td>
                            <td>The package comes with themes for you to use:<br><code>'light'</code>, <code class="ms-2">'light-border'</code>, <code class="ms-2">'material'</code>, <code class="ms-2">'translucent'</code>, <code class="ms-2">'null'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-trigger</th>
                            <td class="var-type">String</td>
                            <td><code>'click'</code></td>
                            <td>Determines the events that cause the tippy to show. Multiple event names are separated by spaces.<br>For instance: <code>'mouseenter focus'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-z-index</th>
                            <td class="var-type">Number</td>
                            <td><code>9999</code></td>
                            <td>Specifies the z-index CSS on the root popper node.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="popover-example-wrapper" class="observed" style="min-height:553px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- pretty-checkbox -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="pretty-checkbox-example" class="mb-1 vanilla-js">Pretty Checkbox</h3>
            <p class="mb-4"><a href="https://github.com/lokesh-coder/pretty-checkbox">https://github.com/lokesh-coder/pretty-checkbox</a></p>

            <p><em>Pretty Checkbox</em> is a pure CSS library to beautify checkbox and radio buttons.<br> The PHP Form Builder <em>Pretty Checkbox</em> plugin adds a small JavaScript layer that makes it easier to activate and configure the plugin by setting its options globally and its parameters using <var>data-attributes</var>.</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('pretty-checkbox', $selector, $config, $options);</code></pre>

            <div class="alert alert-info has-icon my-6">
                <p>Activate the plugin and set its options globally with the <code class="language-php">$form->addPlugin()</code> function. Then you can change any option individually on each target element.</p>
                <p>The plugin allows icons, colors, and a toggle function; these options must be defined for each element individually using data-attributes.</p>
            </div>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col">pretty-checkbox <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'pretty-checkbox'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#my-form'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p>The configuration node in the plugin's XML file.<br>You can add your own configurations in <span class="file-path">phpformbuilder/plugins-config/pretty-checkbox.xml</span></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$options</var></th>
                            <td class="var-type">Array</td>
                            <td><code>['checkboxStyle' => 'default', 'radioStyle' => 'default', 'fill' => 'none', 'plain' => '', 'size' => 'none', 'animations' => 'none']</code></td>
                            <td>
                                <p class="mb-1">An associative array with the options names => values.</p>
                                <p>The available options are the followings:</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">Option name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Available values</th>
                                                <th scope="col">Default value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">checkboxStyle</th>
                                                <td><span class="var-type">[String]</span></td>
                                                <td><code>'default'</code>, <code>'curve'</code>, <code>'round'</code></td>
                                                <td><code>'default'</code> <small>(square shapes)</small></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">radioStyle</th>
                                                <td><span class="var-type">[String]</span></td>
                                                <td><code>'default'</code>, <code>'curve'</code>, <code>'round'</code></td>
                                                <td><code>'round'</code></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">fill</th>
                                                <td><span class="var-type">[String]</span></td>
                                                <td><code>''</code>, <code>'fill'</code>, <code>'thick'</code></td>
                                                <td><code>''</code> <small>(default style)</small></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">plain</th>
                                                <td><span class="var-type">[String]</span></td>
                                                <td><code>''</code>, <code>'plain'</code></td>
                                                <td><code>''</code></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">size</th>
                                                <td><span class="var-type">[String]</span></td>
                                                <td><code>''</code>, <code>'bigger'</code></td>
                                                <td><code>''</code> <small>(default size)</small></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">animations</th>
                                                <td><span class="var-type">[String]</span></td>
                                                <td><code>''</code>, <code>'smooth'</code>, <code>'jelly'</code>, <code>'tada'</code>, <code>'rotate'</code>, <code>'pulse'</code></td>
                                                <td><code>''</code> <br><small>(no animation)</small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4>Pretty Checkbox plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-color</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>One of the followings: 'primary', 'primary-o', 'success', 'success-o', 'info', 'info-o', 'warning', 'warning-o', 'danger', 'danger-o'<br>The <code>-o</code> means "outline".</td>
                        </tr>
                        <tr>
                            <th scope="row">data-icon</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Icon class from any icon library.<br>You need to add the appropriate font icon library to your application.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-toggle</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>
                                <p>Toggle allows showing a different content depending on the input on/off state.<br>When you enable <code>data-toggle</code> you can set the on/off states with the following data-attributes:</p>
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Attribute</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">description</th>
                                        </tr>
                                    <tbody>
                                        <tr>
                                            <td>data-on-label</td>
                                            <td class="var-type">String</td>
                                            <td>The text of the label when checked</td>
                                        </tr>
                                        <tr>
                                            <td>data-off-label</td>
                                            <td class="var-type">String</td>
                                            <td>The text of the label when unchecked</td>
                                        </tr>
                                        <tr>
                                            <td>data-on-icon</td>
                                            <td class="var-type">String</td>
                                            <td>The icon class when checked.<br>For the Material Icons library, add the <em>material-icons</em> class and then the icon name.<br>e.g., <code>data-on-icon=material-icons radio_button_checked</code></td>
                                        </tr>
                                        <tr>
                                            <td>data-on-label</td>
                                            <td class="var-type">String</td>
                                            <td>The text of the label when checked</td>
                                        </tr>
                                        <tr>
                                            <td>data-off-icon</td>
                                            <td class="var-type">String</td>
                                            <td>The icon class when unchecked.<br>For the Material Icons library, add the <em>material-icons</em> class and then the icon name.<br>e.g., <code>data-on-icon=material-icons radio_button_unchecked</code></td>
                                        </tr>
                                        <tr>
                                            <td>data-on-color</td>
                                            <td class="var-type">String</td>
                                            <td>The color when checked</td>
                                        </tr>
                                        <tr>
                                            <td>data-off-color</td>
                                            <td class="var-type">String</td>
                                            <td>The color when unchecked</td>
                                        </tr>
                                    </tbody>
                                    </thead>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="pretty-checkbox-example-wrapper" class="observed" style="min-height:2868px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- recaptcha V3 -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="recaptchav3-example">Recaptcha V3 - <small><a href="https://developers.google.com/recaptcha/docs/v3">https://www.google.com/recaptcha/</a></small></h3>

            <p>The <em>Recaptcha V3</em> plugin allows you to verify that your form user is not a bot without asking for problems for human users.</p>

            <pre class="mb-4"><code class="language-php">$form->addRecaptchav3($sitekey);

// Validation after POST:
$validator->recaptcha($secretkey, $error_msg)->validate('g-recaptcha-response');</code></pre>

            <p><code>$sitekey</code> is the site key that you get from the Google Recaptcha website.</p>
            <p><code>$secretkey</code> is the secret key that you get from the Google Recaptcha website.</p>
            <p><code>$error_msg</code> is the error message shown to the users if the verification fails.<br>Default is <em>"Recaptcha Error"</em></p>
            <p><code>'g-recaptcha-response'</code> is the name of the response field (leave it as it is).</p>

            <div id="recaptchav3-example-wrapper">
                <p>Live examples available in <a href="https://www.phpformbuilder.pro/templates/index.php">Templates</a></p>
            </div>
        </article>

        <!-- Select2 -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="select2-example" class="mb-1 jquery">Select2</h3>

            <p class="mb-4"><a href="https://select2.org/">https://select2.org/</a></p>

            <p>The <em>Select2</em> plugin gives you a customizable select box with support for searching, tagging, remote data sets, infinite scrolling, and many other highly used options.</p>

            <pre class="mb-4"><code class="language-php">$form->addSelect($select_name, $label, 'class=select2');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$select_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the target select field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the select field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The select field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>select2</code> class to the select element to activate the <em>Select2</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                </div>
            </div>

            <h4>Select2 plugin ~ available data-attributes:</h4>

            <h4>Options: </h4>

            <p>Pass options with data-attributes on the <code>&lt;select&gt;</code> field. Example:</p>

            <pre class="mb-4"><code class="language-php">$form->addSelect('select-name', 'Label', 'class=select2, data-width=100%');</code></pre>

            <p>The data-attribute list is available at <a href="https://select2.org/configuration/options-api">https://select2.org/configuration/options-api</a>.</p>

            <p class="mb-0">More details about data-attribute usage at <a href="https://select2.org/configuration/data-attributes">https://select2.org/configuration/data-attributes</a></p>

            <hr>

            <div class="alert alert-info has-icon my-6">
                <p>Instead of adding the <code>select2</code> class to the select element, you can also call the <code>addPlugin()</code> function.</p>
                <p>This way, you can call a custom node from the XML configuration file (<span class="file-path">phpformbuilder/plugins-config/select2.xml</span>).</p>
                <p>This method allows you to store different custom select2 configurations and, for example, change the <code>buildTemplate</code> function, which builds the options dropdown list.</p>
            </div>

            <div id="select2-example-wrapper" class="observed" style="min-height:2894px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>

            <div class="alert alert-info has-icon">
                <h4 class="text-info-700">Quick Tips</h4>
                <dl class="dl-horizontal">
                    <dt>Remove search box</dt>
                    <dd>Select2 adds a search box to the dropdowns. To remove the search box, add <code>data-minimum-results-for-search=Infinity</code> to the select element attributes.</dd>
                    <dd class="line-break"></dd>
                    <dt>Placeholders</dt>
                    <dd>To add a placeholder, first add an empty option:<br><code>$form->addOption('category', '', '');</code><br>Then use <code>data-placeholder=Your placeholder text</code></dd>
                </dl>
            </div>
        </article>

        <!-- signature-pad -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="signature-pad-example" class="mb-1 vanilla-js">Signature pad</h3>

            <p class="mb-4"><a href="https://github.com/szimek/signature_pad">https://github.com/szimek/signature_pad</a></p>

            <p>The <em>Signature Pad</em> plugin is a JavaScript library for drawing smooth signatures. It's HTML5 canvas based and uses variable width Bézier curve interpolation. It works in all modern desktop and mobile browsers and doesn't depend on any external libraries.</p>

            <pre class="mb-4"><code class="language-php">$form->addInput('hidden', $input_name, $value, $label, 'class=signature-pad, data-background-color=#336699, data-pen-color=#fff, data-width=100%, data-clear-button=true, data-clear-button-class=btn btn-sm btn-warning, data-clear-button-text=clear, data-fv-not-empty, data-fv-not-empty___message=You must sign to accept the license agreement');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$type</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input type. The <em>Signature pad</em> plugin must be used with an <code>input[type="hidden"]</code>, so the expected value is <code>'hidden'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$input_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$value</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The initial value of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the input field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The input field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-signature-pad</code> attribute to the input element to activate the <em>Signature pad</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                    <p class="mb-0">The signature value is sent with the hidden input. The value is a base64 png image (<code>data:image/png;base64</code>).</p>
                    <p>Here's how to save the image on the server:</p>
                    <pre><code class="language-php">$data_uri = $_POST['fieldname'];
$encoded_image = explode(',', $data_uri)[1];
$decoded_image = base64_decode($encoded_image);
file_put_contents('signature.png', $decoded_image);</code></pre>
                </div>
            </div>

            <h4>Signature pad plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;input&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-width</th>
                            <td class="var-type">Number | String</td>
                            <td><code>'100%'</code></td>
                            <td>The input field width. Accepts number (in pixels) or percent value.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-height</th>
                            <td class="var-type">Number</td>
                            <td><code>300</code></td>
                            <td>The input field height. Accepts number (in pixels).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-background-color</th>
                            <td class="var-type">String</td>
                            <td><code>'rgba(255, 255, 255, 0)'</code></td>
                            <td>The background color in valid CSS format. The default background color is white.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-pen-color</th>
                            <td class="var-type">String</td>
                            <td><code>'rgb(0, 0, 0)'</code></td>
                            <td>The pen color in valid CSS format. The default pen color is black.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-clear-button</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Show a button to clear the signature</td>
                        </tr>
                        <tr>
                            <th scope="row">data-clear-button-class</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS classes for the <em>clear</em> button</td>
                        </tr>
                        <tr>
                            <th scope="row">data-clear-button-text</th>
                            <td class="var-type">String</td>
                            <td><code>'clear'</code></td>
                            <td>The text of the <em>clear</em> button</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="signature-pad-example-wrapper" class="observed" style="min-height:516px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- Slimselect -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="slimselect-example" class="mb-1 jquery">Slimselect</h3>

            <p class="mb-4"><a href="https://slimselectjs.com">https://slimselectjs.com</a></p>
            <p>The <em>Slimselect</em> plugin is a Vanilla JS plugin to enhance the select dropdown lists.</p>
            <p>It's an excellent alternative to the <em>Select2</em> plugin for those who want to avoid the <em>jQuery</em> dependency. Similar features are available: search, tagging, Ajax, many others options and callbacks.</p>

            <pre class="mb-4"><code class="language-php">$form->addSelect($select_name, $label, 'data-slimselect=true');</code></pre>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><var>$select_name</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The name of the target select field.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$label</var></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The label of the select field.</td>
                        </tr>
                        <tr>
                            <th scope="row">$attr</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The select field attributes <a href="class-doc.php#attr" class="badge bg-secondary badge-lg ms-2"><i class="bi bi-link me-2"></i>documentation</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-slimselect</code> attribute to the select element to activate the <em>Slimselect</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                    <h5>Slimselect JavaScript API (Object &amp; events)</h5>
                    <p class="mb-0">The JavaScript instance is stored in the global variable <code>window.slimSelects[selectId]</code> when you activate the plugin.</p>
                    <p class="mb-0">You can then use it to call the Slimselect JavaScript API, for example:</p>
                    <pre><code class="language-javascript">&lt;script&gt;
    document.addEventListener(&apos;DOMContentLoaded&apos;, function(event) {
        slimSelects[&apos;my-select-name&apos;].enable();
    });
&lt;/script&gt;</code></pre>
                </div>
            </div>

            <h4>Slimselect ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes on the <code>&lt;select&gt;</code> field.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-placeholder</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Set a placeholder text when nothing is selected. Single selects require an empty option with data-placeholder set to true to enable it.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-allow-deselect</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>This will allow you to deselect a value on a single select dropdown.<br>Be sure to have an empty option data placeholder, so slimselect has an empty string value to select.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-allow-deselect-option</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>This will allow you to deselect a value in the dropdown by clicking the option again.<br>Be sure to have an empty option data placeholder, so slimselect has an empty string value to select.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-deselect-label</th>
                            <td class="var-type">String</td>
                            <td><code>'x' svg image</code></td>
                            <td>This will allow you to change the deselect label (default is an 'x' svg image) on single select lists and the delete label on multiple-select lists.<br><strong>Note</strong>: Be aware of the limited space available for it.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-addable</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Slim select can dynamically add options via the search input field. The added values are automatically sanitized by PHP Form Builder using <em>dompurify</em>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-limit</th>
                            <td class="var-type">Number</td>
                            <td><code>0</code></td>
                            <td>When using multi-select, you limit the number of selections you can have.<br>Zero is no limit.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-show-search</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Decide whether or not to show the search.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-search-text</th>
                            <td class="var-type">String</td>
                            <td><code>'No Results'</code></td>
                            <td>The string that will show in the event there are no results. </td>
                        </tr>
                        <tr>
                            <th scope="row">data-search-placeholder</th>
                            <td class="var-type">String</td>
                            <td><code>'Search ...'</code></td>
                            <td>The input search placeholder text.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-search-focus</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Focus search input on opening</td>
                        </tr>
                        <tr>
                            <th scope="row">data-search-highlight</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Highlights search results</td>
                        </tr>
                        <tr>
                            <th scope="row">data-close-on-select</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Determines whether or not to close the content area upon selecting a value.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-show-content</th>
                            <td class="var-type">String</td>
                            <td><code>'auto'</code></td>
                            <td>Decide where to show your content when it comes out. By default, slimselect will try to put the content where it can without going off-screen. But you may always want to show it in one direction.<br>Possible Options: <code>'auto'</code>, <code>'up'</code> or <code>'down'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-add-to-body</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>Configures the select dropdown to be added directly to the document body, rather than the parent container. It allows using slimselect in scenarios where you have no control of the overflow state of the parent containers. Remember that the widget has to be removed explicitly by calling destroy.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-select-by-group</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Enables the selection of all options under a specific group by clicking that option group's label.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-hide-selected-option</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Hide the current selected option in the dropdown.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>The following options are available with data-attributes on the <code>&lt;option&gt;</code> tags. For instance:</p>
            <pre class="mb-4"><code class="language-php">$form->addOption('select-name', 'value', 'text', 'opt-groupname', 'data-icon=bi bi-headphones me-2');</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-icon</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The icon CSS classes of the <code>icon</code> tag that'll be added before the option text.<br>You can use any icon library of your choice: Fontawesome, Material icons, ...</td>
                        </tr>
                        <tr>
                            <th scope="row">data-html</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Replaces the option text by any HTML code of your choice.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="slimselect-example-wrapper" class="observed" style="min-height:2894px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- tinyMce -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="tinymce-example" class="mb-1 vanilla-js">Tinymce</h3>

            <p class="mb-4"><a href="https://www.tiny.cloud/tinymce/">https://www.tiny.cloud/tinymce/</a></p>

            <p><em>Tinymce</em> is a WYSIWYG editor known, and loved, by millions of developers worldwide</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('tinymce', $selector, $config);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">tinymce <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'tinymce'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The CSS selector (e.g., <code>'#fieldname'</code>) of the field(s) on which the plugin will be enabled.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row"><code>'default'</code></th>
                                            <td>The default configuration activates the most common Tinymce plugins, including the Responsive Filemanager.</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><code>'word-char-count'</code></th>
                                            <td>Same configuration as the default, with the addition of a word and character counter.</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><code>'light'</code></th>
                                            <td>Minimal configuration, without file manager, to be used, for example, for a contact form.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="medium mb-0">The configuration node in the plugin's XML file.<br>You can add your own configurations in <span class="file-path">phpformbuilder/plugins-config/tinymce.xml</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <section class="mb-6">
                <h4>Customization &amp;Translation (i18n)</h4>
                <p>To customize the TinyMCE editor settings:</p>
                <ol class="numbered">
                    <li>
                        Duplicate <span class="file-path">phpformbuilder/plugins-config/tinymce.xml</span> to <span class="file-path">phpformbuilder/plugins-config-custom/tinymce.xml</span>
                    </li>
                    <li>
                        Make your changes in the duplicated file (in the <span class="file-path">plugins-config-custom</span> folder).
                    </li>
                </ol>
                <p>If you change the language:</p>
                <p>Download the language file on tiny.cloud website and put it in <span class="file-path">phpformbuilder/plugins/tinymce/langs/</span></p>
            </section>

            <div id="tinymce-example-wrapper" class="observed" style="min-height:1215px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- tooltip -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="tooltip-example" class="mb-1 vanilla-js">Tooltip</h3>

            <p class="mb-4"><a href="https://atomiks.github.io/tippyjs/">https://atomiks.github.io/tippyjs/</a></p>

            <p>The <em>Tooltip</em> plugin uses <em>tippyjs</em>, as well as the <em>Popover</em> plugin.</p>

            <div class="my-5">
                <p class="h5 medium bg-gray-200 px-4 py-2 mb-0 fw-bold">Special notes:</p>
                <div class="bg-gray-100 p-4">
                    <p class="mb-0">Add the <code>data-tooltip</code> attribute to the input element to activate the <em>Tooltip</em> plugin.<br>There is no need to call the <code>addPlugin()</code> function.</p>
                    <p>You can add tooltips anywhere in your form, not only on fields but also on labels, helpers, or any content.</p>
                    <p class="mb-0">The tooltips can also contain HTML content based on HTML templates and be interactive.</p>
                </div>
            </div>


            <h4>Tooltip plugin ~ available data-attributes:</h4>

            <p>The following options are available with data-attributes.</p>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Attribute</th>
                            <th scope="col">Type</th>
                            <th scope="col">Default</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">data-tooltip</th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>Enables the tooltip on the element.<br>The value is the tooltip text content if <code>data-content-src</code> is not defined.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-content-src</th>
                            <td class="var-type">String</td>
                            <td><code>undefined</code></td>
                            <td>The id of the template that contains the tooltip HTML content.<br>For instance, create a <code>&lt;template id=&quot;tooltip-html-content&quot;&gt;&lt;/template&gt;</code>, then set <code>data-content-src=tooltip-html-content</code>.<br>(See example 2 below).</td>
                        </tr>
                        <tr>
                            <th scope="row">data-animation</th>
                            <td class="var-type">String</td>
                            <td><code>'fade'</code></td>
                            <td>The popover show/hide animation, among the followings: <code>'fade'</code>, <code class="ms-2">'shift-away'</code>, <code class="ms-2">'shift-toward'</code>, <code class="ms-2">'scale'</code>, <code class="ms-2">'perspective'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-arrow</th>
                            <td class="var-type">Boolean</td>
                            <td><code>true</code></td>
                            <td>The arrow that points toward the element.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-delay</th>
                            <td class="var-type">Number</td>
                            <td><code>0</code></td>
                            <td>The delay in milliseconds before opening the popover.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-interactive</th>
                            <td class="var-type">Boolean</td>
                            <td><code>false</code></td>
                            <td>Whether to enable interactivity inside the tooltip content.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-placement</th>
                            <td class="var-type">String</td>
                            <td><code>'top'</code></td>
                            <td>The preferred placement of the tippy. Popper's flip modifier can change this to the opposite placement if it has more space.<br><code>'top'</code>, <code class="ms-2">'top-start'</code>, <code class="ms-2">'top-end'</code>, <code class="ms-2">'right'</code>, <code class="ms-2">'right-start'</code>, <code class="ms-2">'right-end'</code>, <code class="ms-2">'bottom'</code>, <code class="ms-2">'bottom-start'</code>, <code class="ms-2">'bottom-end'</code>, <code class="ms-2">'left'</code>, <code class="ms-2">'left-start'</code>, <code class="ms-2">'left-end'</code>, <code class="ms-2">'auto'</code>, <code class="ms-2">'auto-start'</code>, <code class="ms-2">'auto-end'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-theme</th>
                            <td class="var-type">String</td>
                            <td><code>'light'</code></td>
                            <td>The package comes with themes for you to use:<br><code>'light'</code>, <code class="ms-2">'light-border'</code>, <code class="ms-2">'material'</code>, <code class="ms-2">'translucent'</code>, <code class="ms-2">'null'</code></td>
                        </tr>
                        <tr>
                            <th scope="row">data-trigger</th>
                            <td class="var-type">String</td>
                            <td><code>'mouseenter'</code></td>
                            <td>Determines the events that cause the tippy to show. Multiple event names are separated by spaces.<br>For instance: <code>'mouseenter focus'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row">data-z-index</th>
                            <td class="var-type">Number</td>
                            <td><code>9999</code></td>
                            <td>Specifies the z-index CSS on the root popper node.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="tooltip-example-wrapper" class="observed" style="min-height:1815px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>

        <!-- wordcharactercount -->

        <article class="pb-5 mb-7 has-separator">
            <h3 id="wordcharactercount-example" class="mb-1 vanilla-js">Word/Character Count</h3>

            <p>The <em>Word/Character Count</em> plugin is a tiny custom PHP Form Builder plugin built to display a characters/words counter below textareas. It can also be used with Tinymce.</p>

            <pre class="mb-4"><code class="language-php">$form->addPlugin('word-character-count', $selector, $config, $options);</code></pre>

            <div class="table-responsive mb-6">
                <table class="table table-bordered table-striped">
                    <thead class="table-warning">
                        <tr>
                            <th scope="col">Argument</th>
                            <th scope="col">Type</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">word-character-count <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>The plugin name, which is <code>'word-character-count'</code>.</td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$selector</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>''</code></td>
                            <td>
                                <p>The CSS selector (e.g., <code>'#fieldname'</code>) of the field on which the plugin will be enabled.</p>
                                <p class="mb-0">The word-character-count plugin must be activated individually for each target field (It doesn't accept CSS class selectors).</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$config</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">String</td>
                            <td><code>'default'</code></td>
                            <td>
                                <p class="medium mb-0">The configuration node in the plugin's XML file.<br>You can add your own configurations in <span class="file-path">phpformbuilder/plugins-config/word-character-count.xml</span></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><var>$options</var> <sup class="text-danger">*</sup></th>
                            <td class="var-type">Array</td>
                            <td><code>[]</code></td>
                            <td>
                                <p class="mb-1">Associative array with:</p>
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">Key</th>
                                            <th scope="col">Value</th>
                                        </tr>
                                    <tbody>
                                        <tr>
                                            <td>'maxCharacters'</td>
                                            <td><var>[Number]</var> The maximum number of characters.<br>Default: <code>100</code></td>
                                        </tr>
                                        <tr>
                                            <td>'maxWords'</td>
                                            <td><var>[Number]</var> The maximum number of words.<br>Default: <code>10</code></td>
                                        </tr>
                                        <tr>
                                            <td>characterCount</td>
                                            <td><var>[Boolean]</var> Whether to display the characters counter or not.<br>Default: <code>true</code></td>
                                        </tr>
                                        <tr>
                                            <td>wordCount</td>
                                            <td><var>[Boolean]</var> Whether to display the words counter or not.<br>Default: <code>true</code></td>
                                        </tr>
                                        <tr>
                                            <td>characterText</td>
                                            <td><var>[String]</var> The text for 'character(s)'<br>Default: <code>'character(s)'</code></td>
                                        </tr>
                                        <tr>
                                            <td>wordText</td>
                                            <td><var>[String]</var> The text for 'word(s)'.<br>Default: <code>'word(s)'</code></td>
                                        </tr>
                                        <tr>
                                            <td>separator</td>
                                            <td><var>[String]</var> The separator character(s) between words count and characters count.<br>Default: <code>' • '</code></td>
                                        </tr>
                                        <tr>
                                            <td>wrapperClassName</td>
                                            <td>
                                                <var>[String]</var> The CSS classname(s) for the wrapper div element.<br>Default:<br>
                                                automatically set according to your framework:<br>
                                                Bootstrap 4/5: <code>'form-text'</code>,<br>
                                                Bulma: <code>'help'</code>,<br>
                                                Foundation: <code>'help-text'</code>,<br>
                                                Material: <code>'form-text'</code>,<br>
                                                Tailwind: <code>'mt-2 text-sm'</code>,<br>
                                                UIkit: <code>'uk-text-small'</code>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>className</td>
                                            <td>
                                                <var>[String]</var> The CSS classname for the counter when the maximum number of characters is not reached.<br>Default:<br>
                                                automatically set according to your framework:<br>
                                                Bootstrap 4/5: <code>'text-muted mb-0'</code>,<br>
                                                Bulma: <code>'has-text-grey'</code>,<br>
                                                Foundation: <code>''</code>,<br>
                                                Material: <code>'text-muted'</code>,<br>
                                                Tailwind: <code>'text-gray-500 dark:text-gray-400'</code>,<br>
                                                UIkit: <code>'uk-text-muted uk-margin-remove-bottom'</code>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>errorClassName</td>
                                            <td>
                                                <var>[String]</var> The CSS classname for the counter when the maximum number of characters is reached.<br>Default:<br>
                                                automatically set according to your framework:<br>
                                                Bootstrap 4/5: <code>'text-danger mb-0'</code>,<br>
                                                Bulma: <code>'has-text-danger'</code>,<br>
                                                Foundation: <code>''</code>,<br>
                                                Material: <code>'text-danger'</code>,<br>
                                                Tailwind: <code>'text-danger-500 dark:text-danger-400'</code>,<br>
                                                UIkit: <code>'uk-text-danger uk-margin-remove-bottom'</code>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </thead>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="word-character-count-example-wrapper" class="observed" style="min-height:1311px">
                <div class="loader text-center">
                    <p><i class="bi-hourglass-split me-2"></i><span class="text-muted">Loading the plugin ...</span></p>
                    <p class="text-muted">Please wait ...</p>
                </div>
            </div>
        </article>
    </main>
    <?php require_once 'inc/js-includes.php'; ?>

    <!-- Ajax form loader -->

    <script async defer src="../phpformbuilder/plugins/ajax-data-loader/ajax-data-loader.min.js"></script>

    <script type="text/javascript">
        var goToHashNow = true;

        function goToHash() {
            let hash = window.location.hash;
            if (hash !== '' && document.querySelector(hash)) {
                document.querySelector(hash).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        function highlight($elementId) {
            if (typeof(Prism) !== 'undefined') {
                Prism.highlightAllUnder(document.getElementById($elementId), true);
            } else {
                setTimeout(function() {
                    highlight($elementId);
                }, 50);
            }
        }

        function triggerPluginLoading(entry) {
            let target = entry.target.id.replace('-wrapper', '').replace('#', '');
            if (document.querySelector('#' + entry.target.id + ' .loader') !== null) {
                fetch('inc/javascript-plugins/' + target + '.php')
                    .then(function(response) {
                        return response.text()
                    })
                    .then(function(response) {
                        loadData(response, '#' + entry.target.id).then(() => {
                            observer.unobserve(document.querySelector('#' + entry.target.id));
                            highlight(entry.target.id);
                            if (goToHashNow) {
                                goToHash();
                                goToHashNow = false;
                            }
                        });
                    }).catch((error) => {
                        console.log(error);
                    });
            }
        }

        function reportIntersection(entries) {
            clearTimeout(debounceTimeout);
            if (is_scrolling()) {
                debounceTimeout = setTimeout(reportIntersection, 150, entries);
            } else {
                setTimeout(() => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const entryIndex = parseInt(entry.target.dataset.observedIndex);
                            triggerPluginLoading(entry);
                        }
                    });
                }, 600);
            }
        }

        window.addEventListener('scroll', () => {
            window.lastScrollTime = new Date().getTime()
        });

        function is_scrolling() {
            return window.lastScrollTime && new Date().getTime() < window.lastScrollTime + 150
        }

        let debounceTimeout = null;

        const observerOptions = {
            rootMargin: '0px',
            threshold: 0
        }
        const observer = new IntersectionObserver(reportIntersection, observerOptions);

        loadjs.ready(['core'], function() {
            const observed = document.querySelectorAll('.observed');
            observed.forEach(item => {
                observer.observe(item);
            });
        });
    </script>
</body>

</html>
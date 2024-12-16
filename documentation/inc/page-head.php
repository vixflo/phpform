<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo isset($meta['title']) ? $meta['title'] : ''; ?></title>
<meta name="description" content="<?php echo isset($meta['description']) ? $meta['description'] : ''; ?>">
<meta name="author" content="Gilles Migliori">
<meta name="copyright" content="Gilles Migliori">
<?php
if ($_SERVER['HTTP_HOST'] === 'www.phpformbuilder.pro') {
    ?>
<meta name="thumbnail" content="https://www.phpformbuilder.pro/documentation/assets/images/screenshots/<?php echo isset($meta['screenshot']) ? str_replace('.png', '-xs.png', $meta['screenshot']) : ''; ?>" />
<link rel="canonical" href="<?php echo isset($meta['canonical']) ? $meta['canonical'] : ''; ?>" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#0F9E7B">
<meta property="og:type" content="website">
<meta property="og:og:site_name" content="PHP Form Builder">
<meta property="og:title" content="<?php echo isset($meta['title']) ? $meta['title'] : ''; ?>">
<meta property="og:description" content="<?php echo isset($meta['description']) ? $meta['description'] : ''; ?>">
<meta property="og:image" content="https://www.phpformbuilder.pro/documentation/assets/images/screenshots/<?php echo isset($meta['screenshot']) ? $meta['screenshot'] : ''; ?>">
<meta property="og:url" content="<?php echo isset($meta['canonical']) ? $meta['canonical'] : ''; ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@miglisoft">
<meta name="twitter:title" content="<?php echo isset($meta['title']) ? $meta['title'] : ''; ?>">
<meta name="twitter:description" content="<?php echo isset($meta['description']) ? $meta['description'] : ''; ?>">
<meta name="twitter:image" content="https://www.phpformbuilder.pro/documentation/assets/images/screenshots/<?php echo isset($meta['screenshot']) ? $meta['screenshot'] : ''; ?>">

    <?php
} else {
    ?>
<meta name="robots" content="noindex, nofollow">
    <?php
} // end if

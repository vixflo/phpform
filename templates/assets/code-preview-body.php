<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm button primary has-background-primary text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 uk-button uk-button-primary" id="view-src-btn" data-micromodal-trigger="code-modal" type="button">
    View source code
</button>
<!-- Modal -->

<div class="micromodal micromodal-fade-in" id="code-modal" aria-hidden="true">
    <div tabindex="-1" class="modal-overlay modal-overlay-blurred" data-micromodal-close>
        <div role="dialog" class="modal-container" aria-modal="true" aria-labelledby="code-modal-title">

            <header class="modal-header">
                <h2 id="code-modal-title" class="h4 modal-title">
                    <?php echo isset($title) ? $title : ''; ?>
                </h2>
                <button class="modal-close" aria-label="Close modal" data-micromodal-close></button>
            </header>

            <div id="code-modal-content">
                <pre><code class="language-php"><?php echo isset($sourceCode) ? $sourceCode : ''; ?></code></pre>
            </div>

        </div>
    </div>
</div>
<!-- /.modal -->
<!-- Footer -->
<?php
$frameworks = array(
    'bootstrap-4-forms'         => 'Bootstrap 4',
    'bootstrap-5-forms'         => 'Bootstrap 5',
    'bulma-forms'               => 'Bulma',
    'material-forms'            => 'Material Design',
    'material-bootstrap-forms'  => 'Material Bootstrap',
    'foundation-forms'          => 'Foundation',
    'tailwind-forms'            => 'Tailwind'
);
$framework = '';
foreach ($frameworks as $key => $value) {
    if (strstr($_SERVER['REQUEST_URI'], $key) !== false) {
        $framework = $value;
    }
}

$shareUrl = str_replace(' ', '%20', 'https://www.phpformbuilder.pro' . $_SERVER['REQUEST_URI']);
$shareTitle = str_replace(' ', '%20', 'PHP Form Builder');
$shareText = str_replace(' ', '%20', 'Create ' . $framework . ' Forms with strong code and the very best Javascript plugins');
$hashTags = '#php#bootstrap#form#phpformbuilder';
?>
<footer class="bg-light border-top border-secondary text-center text-md-left mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3 pb-4">
                <p class="text-dark h4 mb-4">
                    About
                </p>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.phpformbuilder.pro" class="text-dark">PHP Form Builder</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 pb-4">
                <p class="text-dark h4 mb-4">
                    Templates
                </p>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.phpformbuilder.pro/templates/index.php" class="text-dark"><?php echo $framework; ?> Form Templates</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 pb-4">
                <p class="text-dark h4 mb-4">
                    Drag &amp; drop
                </p>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.phpformbuilder.pro/drag-n-drop-form-builder/index.php" class="text-dark">Drag &amp; drop Form Builder</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3 pb-4">
                <p class="text-dark h4 mb-4">
                    Documentation
                </p>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.phpformbuilder.pro/documentation/class-doc.php" class="text-dark"><?php echo $framework; ?> Forms documentation</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="col d-flex justify-content-center align-items-center mb-4">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
            <div class="fb-like d-block px-3" data-href="<?php // echo $_SERVER['REQUEST_URI'];
                                                            ?>" data-width="" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
            <a class="d-block px-3" href="https://www.facebook.com/sharer.php?u=<?php // echo $shareUrl
                                                                                ?>&amp;t=<?php // echo $shareTitle;
                                                                                            ?>" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="left" title="Share on Facebook"><img src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-facebook-m.png" alt="Facebook" /></a>
            <a class="d-block px-3" href="https://pinterest.com/pin/create/button/?url=<?php // echo $shareUrl
                                                                                        ?>" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="left" title="Share on Pinterest"><img src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-pinterest-m.png" alt="Twitter" /></a>
            <a class="d-block px-3" href="https://reddit.com/submit?url=<?php // echo $shareUrl
                                                                        ?>&title=<?php // echo $shareTitle;
                                                                                    ?>" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="left" title="Share on Reddit"><img src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-reddit-m.png" alt="Instagram" /></a>
            <a class="d-block px-3" href="https://twitter.com/share?url=<?php // echo $shareUrl
                                                                        ?>" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="left" title="Tweet this page!"><img src="https://cdnjs.cloudflare.com/ajax/libs/webicons/2.0.0/webicons/webicon-twitter-m.png" alt="Linkedin" /></a>
        </div> -->
    </div>
    <p class="text-center text-secondary border-top border-secondary py-4 mb-0">
        PHP Form Builder © <?php echo date('Y'); ?>
    </p>
</footer>
<!-- /Footer -->

<!-- Prism code -->
<script src="../assets/js/prism.min.js" data-manual defer></script>
<script>
    setTimeout(() => {
        window.Prism.plugins.customClass.map({
            number: "prism-number",
            tag: "prism-tag"
        });
    }, 5000);
</script>
<!-- Demo slimselect -->
<?php if (isset($formThemeSwitcher) && isset($sourceCode) && (!preg_match('`slimselect`', $sourceCode) || preg_match('`form-step-1`', $sourceCode))) { // if no slimselect in main form
    if (isset($isLoadjsForm)) { ?>
        <script>
            loadjs(['<?php echo $formThemeSwitcher->pluginsUrl; ?>slimselect/slimselect.min.js'], 'slimselect', {
                async: false
            });
        </script>
    <?php } else { ?>
        <script src="<?php echo $formThemeSwitcher->pluginsUrl; ?>slimselect/slimselect.min.js" defer></script>
<?php
    }
} ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/micromodal/0.4.10/micromodal.min.js" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
<script>
    function htmlToElement(html) {
        let template = document.createElement('template');
        html = html.trim(); // Never return a text node of whitespace as the result
        template.innerHTML = html;
        return template.content.firstChild;
    }
    <?php
    if (isset($isLoadjsForm)) {
        if (isset($formThemeSwitcher) && isset($sourceCode) && (!preg_match('`slimselect`', $sourceCode) || preg_match('`form-step-1`', $sourceCode))) { // if no slimselect in main form
    ?>
            loadjs.ready(['core', 'slimselect'], function() {
                        // console.log('core, slimselect ready');
                        Prism.highlightAllUnder(document.getElementById('code-modal-content'));
                        MicroModal.init();
                    <?php
                } else { ?>
                        loadjs.ready('core', function() {
                                    Prism.highlightAllUnder(document.getElementById('code-modal-content'));
                                    MicroModal.init();
                                <?php
                            }
                        } else { ?>
                                document.addEventListener('DOMContentLoaded', function(event) {
                                    if (!document.body.classList.contains('code-preview-loaded')) {
                                        document.body.classList.add('code-preview-loaded');
                                        Prism.highlightAllUnder(document.getElementById('code-modal-content'));
                                        MicroModal.init();
                                    <?php
                                } ?>
                                    if (top == self && location.hostname == 'www.phpformbuilder.pro') {
                                        var templateBuyBtn = document.createElement('div');
                                        templateBuyBtn.id = 'template-buy-div';
                                        var templateBuyLink = document.createElement('a');
                                        templateBuyLink.id = 'template-buy-btn';
                                        templateBuyLink.href = 'https://1.envato.market/qKq4g';
                                        templateBuyLink.classList.add('btn', 'btn-primary', 'btn-sm', 'button', 'primary', 'has-background-primary', 'text-white', 'bg-blue-700', 'hover:bg-blue-800', 'focus:ring-4', 'focus:ring-blue-300', 'font-medium', 'rounded-lg', 'text-sm', 'px-5', 'py-2.5', 'text-center', 'mr-2', 'mb-2', 'dark:bg-blue-600', 'dark:hover:bg-blue-700', 'dark:focus:ring-blue-800', 'uk-button', 'uk-button-primary');
                                        templateBuyLink.innerText = 'Buy Php Form Builder';
                                        templateBuyBtn.appendChild(templateBuyLink);
                                        document.querySelector('body h1').insertAdjacentElement('afterend', templateBuyBtn);

                                        var templateLogo = document.createElement('a');
                                        templateLogo.href = 'https://www.phpformbuilder.pro/templates/index.php';
                                        templateLogo.style.display = 'inline-flex';
                                        templateLogo.style.marginTop = '10px';
                                        templateLogo.style.alignItems = 'middle';
                                        templateLogo.style.fontSize = '24px';
                                        templateLogo.style.textDecoration = 'none';
                                        templateLogo.title = 'Php Form Builder Templates';
                                        var templateLogoImg = document.createElement('img');
                                        templateLogoImg.src = 'https://www.phpformbuilder.pro/documentation/assets/images/phpformbuilder-logo-mini.png';
                                        templateLogoImg.width = '36';
                                        templateLogoImg.height = '36';
                                        templateLogoImg.style.marginRight = '20px';
                                        templateLogoImg.alt = 'Php Form Builder Templates';
                                        var templateLogoSmall = document.createElement('small');
                                        templateLogoSmall.style.lineHeight = '36px';
                                        templateLogoSmall.innerText = 'Php Form Builder';
                                        templateLogo.appendChild(templateLogoImg);
                                        templateLogo.appendChild(templateLogoSmall);
                                        document.querySelector('body h1').appendChild(document.createElement('br'));
                                        document.querySelector('body h1').appendChild(templateLogo);
                                    }
                                    <?php if (isset($formThemeSwitcher) && isset($formThemeSwitcher_output)) { ?>
                                        document.querySelector('body > .container').insertBefore(htmlToElement('<?php echo $formThemeSwitcher_output; ?>'), document.querySelector('body > .container').firstChild);
                                        document.querySelector('select[name="theme"]').addEventListener('change', function(evt) {
                                            let href = '<?php echo $_SERVER['PHP_SELF']; ?>';
                                            if (evt.target.value !== '') {
                                                href += '?<?php echo isset($form->framework) ? $form->framework : ''; ?>theme=' + evt.target.value;
                                            }
                                            window.location.href = href
                                        });
                                    <?php
                                    } ?>
                                    var $modal = document.getElementById('code-modal');
                                    if (document.getElementById('material-collapsible-notice') !== null) {
                                        M.Collapsible.init(document.getElementById('material-collapsible-notice'));
                                    }
                                    <?php if (!isset($isLoadjsForm)) { ?>
                                    }
                                <?php
                                    } ?>
                                });
</script>
<?php
if (isset($formThemeSwitcher)) {
    if (isset($isLoadjsForm)) {
        $formThemeSwitcher->useLoadJs('core');
    }
    $formThemeSwitcher->printJsCode();
}

<?php
$share_url = 'https://www.phpformbuilder.pro' . $_SERVER['REQUEST_URI'];
$share_title = 'PHP Form Builder';
$share_text = 'Create PHP Forms with strong code and the very best JavaScript Plugins';
$hash_tags = '#php#bootstrap#form#phpformbuilder'; ?>
<div id="share-wrapper">
    <input type="checkbox" name="share-checkbox" id="share-checkbox" class="d-none" />
    <label id="share" class="mb-2 d-flex justify-content-center align-items-center" for="share-checkbox" title="Click to share">
        <i class="bi bi-share-fill"></i>
    </label>
    <ul class="list-unstyled d-flex flex-wrap">

        <!-- facebook -->

        <li>
            <a id="share-facebook" class="mb-2 d-flex justify-content-center align-items-center bg-white" href="https://www.facebook.com/sharer.php?u=<?php echo $share_url ?>&amp;t=<?php echo $share_title; ?>" target="_blank" rel="nofollow" title="Share on Facebook">
                <svg fill="#3B5998">
                    <use xlink:href="/assets/images/brands.svg#facebook"></use>
                </svg>
            </a>
        </li>

        <!-- twitter -->

        <li>
            <a id="share-twitter" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://twitter.com/share?url=<?php echo $share_url ?>" target="_blank" rel="nofollow" title="Tweet this page!">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#twitter"></use>
                </svg>
            </a>
        </li>

        <!-- pinterest -->

        <li>
            <a id="share-pinterest" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://pinterest.com/pin/create/button/?url=<?php echo $share_url ?>" target="_blank" rel="nofollow" title="Share on Pinterest">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#pinterest-p"></use>
                </svg>
            </a>
        </li>

        <!-- linkedin -->

        <li>
            <a id="share-linkedin" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url ?>" target="_blank" rel="nofollow" title="Share on Linkedin">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#linkedin-in"></use>
                </svg>
            </a>
        </li>

        <!-- reddit -->

        <li>
            <a id="share-reddit" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://reddit.com/submit?url=<?php echo $share_url ?>&title=<?php echo $share_title; ?>" target="_blank" rel="nofollow" title="Share on Reddit">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#reddit-alien"></use>
                </svg>
            </a>
        </li>

        <!-- google bookmarks -->

        <li>
            <a id="share-google-bookmarks" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://www.google.com/bookmarks/mark?op=edit&bkmk=<?php echo $share_url ?>&title=<?php echo $share_title; ?>&annotation=<?php echo $share_text; ?>&labels=<?php echo $hash_tags; ?>" target="_blank" rel="nofollow" title="Share on Google Bookmarks">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#google"></use>
                </svg>
            </a>
        </li>

        <!-- mix -->

        <li>
            <a id="share-mix" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://mix.com/add?url=<?php echo $share_url ?>" target="_blank" rel="nofollow" title="Share on Mix">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#mix"></use>
                </svg>
            </a>
        </li>

        <!-- pocket -->

        <li>
            <a id="share-pocket" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://getpocket.com/edit?url=<?php echo $share_url ?>" target="_blank" rel="nofollow" title="Share on Pocket">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#get-pocket"></use>
                </svg>
            </a>
        </li>

        <!-- digg -->

        <li>
            <a id="share-digg" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://www.digg.com/submit?url=<?php echo $share_url ?>" target="_blank" rel="nofollow" title="Share on Digg">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#digg"></use>
                </svg>
            </a>
        </li>

        <!-- blogger -->

        <li>
            <a id="share-blogger" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://www.blogger.com/blog-this.g?u=<?php echo $share_url ?>&n=<?php echo $share_title; ?>&t=<?php echo $share_text; ?>" target="_blank" rel="nofollow" title="Share on Blogger">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#blogger"></use>
                </svg>
            </a>
        </li>

        <!-- tumblr -->

        <li>
            <a id="share-tumblr" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $share_url ?>&title=<?php echo $share_title; ?>&caption=CAPTIONTOSHARE&tags=<?php echo $hash_tags; ?>" target="_blank" rel="nofollow" title="Share on Tumblr">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#tumblr"></use>
                </svg>
            </a>
        </li>

        <!-- flipboard -->

        <li>
            <a id="share-flipboard" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://share.flipboard.com/bookmarklet/popout?v=2&url=<?php echo $share_url ?>&title=<?php echo $share_title; ?>" target="_blank" rel="nofollow" title="Share on Flipboard">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#flipboard"></use>
                </svg>
            </a>
        </li>

        <!-- hacker news -->

        <li>
            <a id="share-hacker-news" class="mb-2 d-flex justify-content-center align-items-center p-2" href="https://news.ycombinator.com/submitlink?u=<?php echo $share_url ?>&t=<?php echo $share_title; ?>" target="_blank" rel="nofollow" title="Share on Hacker News">
                <svg fill="#fff">
                    <use xlink:href="/assets/images/brands.svg#hacker-news"></use>
                </svg>
            </a>
        </li>
    </ul>
</div>
<?php

/**
 * Builds the left navigation menu.
 *
 * @param array<string, array<string|int, string|array<string, string>>> $sections $sections An array of section names.
 * @return void The HTML markup for the left navigation menu.
 */

function buildLeftNav(array $sections): void
{
    $html = '';
    foreach ($sections as $section => $content) {
        // no subnav
        if (isset($content['title']) && is_string($content['title']) && is_string($content['anchor'])) {
            $html .= '<li class="nav-item"><a class="nav-link" href="#' . $content['anchor'] . '">' . $content['title'] . '</a></li>' . " \n";
        } else {
            // with subnav

            // main nav
            $html .= '<li class="nav-item">
    <p class="h4 text-center my-4">' . $section . '</p>
</li>' . " \n";

            foreach ($content as $c) {
                $html .= '<li class="nav-item"><a class="nav-link" href="#' . ($c['anchor'] ?? '') . '">' . ($c['title'] ?? '') . '</a></li>' . " \n";
            }
        }
    }
    echo $html;
}

/**
 * Builds the content for a webpage using the provided sections, content text, PHP code, output, and output code.
 *
 * @param array<string, array<string|int, string|array<string, string>>> $sections An array of section names.
 * @param array<string, string> $contentText An array of content text for each section.
 * @param array<array<int, string>> $phpCode An array of PHP code snippets for each section.
 * @param array<string, array<int, string>|string> $output An array of output for each section.
 * @param array<string, array<int, string>|string> $outputCode An array of output code snippets for each section.
 * @return void
 */
function buildContent(array $sections, array $contentText, array $phpCode, array $output, array $outputCode): void
{
    $html = '';
    foreach ($sections as $section => $content) {
        $html .= '<section class="pb-7">' . " \n";
        $html .= '<h2>' . $section . '</h2>' . " \n";
        // no subnav
        if (isset($content['title'])) {
            $docLink = '';
            if (is_string($content['doc-link']) && !empty($content['doc-link'])) {
                $docLink = '<a href="' . $content['doc-link'] . '" class="btn btn-xs btn-primary pull-right">doc.</a>';
            }
            $html .= '<article class="pb-5 mb-7 has-separator">' . " \n";
            $anchor = $content['anchor'];
            if (is_string($anchor) && is_string($content['title'])) {
                $html .= '<h3 id="' . $anchor . '">' . $content['title'] . $docLink . '</h3>' . " \n";
                if (isset($contentText[$anchor])) {
                    $html .= $contentText[$anchor];
                }
            }

            // examples
            if (is_array($phpCode) && is_string($anchor) && isset($phpCode[$anchor])) {
                $nbre = count($phpCode[$anchor]);
                for ($i = 0; $i < $nbre; $i++) {
                    $html .= '<div class="mb-6">' . " \n";
                    if ($nbre > 1) {
                        $html .= '<p class="h4 mb-2 border-bottom">Example ' . ($i + 1) . '</p>' . " \n";
                    }
                    if (isset($phpCode[$anchor][$i])) {
                        $html .= '<div class="form-code">
                <pre class="line-numbers mb-4"><code class=" language-php">' . $phpCode[$anchor][$i] . '</code></pre>
            </div>' . " \n";
                    }
                    if (isset($output[$anchor][$i])) {
                        $html .= '<div class="output">
                <div class="form-element">' . $output[$anchor][$i] . '</div>
            </div>';
                    }
                    if (isset($outputCode[$anchor][$i])) {
                        $uniqid = uniqid();
                        $html .= '<p class="text-right"><a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#a' . $uniqid . '" role="button" aria-expanded="false" aria-controls="a' . $uniqid . '">
                    show output code</a></p>';
                        $html .= '<div class="output-code collapse" id="a' . $uniqid . '">
                <pre class="line-numbers language-php"><code class=" language-php">' . $outputCode[$anchor][$i] . '</code></pre>
            </div>' . " \n";
                    }
                    $html .= '</div>' . " \n";
                }
            }
            $html .= '</article>' . " \n";
        } else {
            foreach ($content as $c) {
                $docLink = '';
                if (isset($c['doc-link']) && !empty($content['doc-link'])) {
                    $docLink = '<a href="' . $c['doc-link'] . '" class="btn btn-xs btn-primary pull-right">doc.</a>';
                }
                $html .= '<article class="pb-5 mb-7 has-separator">' . " \n";
                //       section, content = array<string|int, string|array<string, string>>
                // array<string, array<string|int, string|array<string, string>>>
                $anchor= '';
                if (is_array($c) && isset($c['anchor'])) {
                    $anchor = $c['anchor'];
                    $html .= '<h3 id="' . $anchor . '">' . $c['title'] . $docLink . '</h3>' . " \n";
                }
                if (isset($contentText[$anchor])) {
                    $html .= $contentText[$anchor];
                }
                // examples
                if (isset($phpCode[$anchor])) {
                    $nbre = count($phpCode[$anchor]);
                    for ($i = 0; $i < $nbre; $i++) {
                        $html .= '<div class="mb-6">' . " \n";
                        if ($nbre > 1) {
                            $html .= '<h4 class="mb-2 border-bottom">Example ' . ($i + 1) . '</h4>' . " \n";
                        }
                        if (isset($phpCode[$anchor][$i])) {
                            $html .= '<div class="form-code">
                <pre class="line-numbers language-php"><code class=" language-php">' . $phpCode[$anchor][$i] . '</code></pre>
            </div>' . " \n";
                        }
                        if (isset($output[$anchor][$i])) {
                            $html .= '<div class="output">
                <div class="form-element">' . $output[$anchor][$i] . '</div>
            </div>';
                        }
                        if (isset($outputCode[$anchor][$i])) {
                            $uniqid = uniqid();
                            $html .= '<p class="text-right"><a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#a' . $uniqid . '" role="button" aria-expanded="false" aria-controls="a' . $uniqid . '">
                    show output code</a></p>';
                            $html .= '<div class="output-code collapse" id="a' . $uniqid . '">
                <pre class="line-numbers language-php"><code class=" language-php">' . $outputCode[$anchor][$i] . '</code></pre>
            </div>' . " \n";
                        }
                        $html .= '</div>' . " \n";
                    }
                }
                $html .= '</article>' . " \n";
            }
        }
        $html .= '</section>' . " \n";
    }

    echo $html;
}

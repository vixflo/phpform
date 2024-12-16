<?php

/* =============================================
        functions
    ============================================= */

/**
 * Renders the example output.
 *
 * @param array $output The output to be rendered.
 *                     The $output parameter should be an array containing the following keys:
 *                     - 'html' (string): The HTML content to be rendered.
 *                     - 'css' (array): An array of CSS files to be included.
 *                     - 'js' (array): An array of JavaScript files to be included.
 *                     - 'data' (array): An array of data to be passed to the rendered output.
 *                     - 'options' (array): An array of additional options for rendering.
 *                     - 'config' (array): An array of configuration settings for rendering.
 *
 * @return string The rendered output.
 */
/**
 * Renders the example output.
 *
 * @param array<string, array<string, mixed|string|array>> $output The output to be rendered.
 *                     The $output parameter should be an array containing the following keys:
 *                     - 'form' (array): An array of forms to be rendered.
 *                     - 'title' (array): An array of titles for each form.
 *                     - 'subtitle' (array): An array of subtitles for each form.
 *                     - 'form_code' (array): An array of form codes for each form.
 *                     - 'html_code' (array): An array of HTML codes for each form.
 *
 * @return string The rendered output.
 */
function renderExample(array $output): string
{
    $html = '';
    $nbre = count($output['form']);
    for ($i = 0; $i < $nbre; $i++) {
        $nb_text      = '';
        if ($nbre > 1) {
            $nb_text = ' ' . ($i + 1);
        }
        $title = '';
        if (!empty($output['title'][$i])) {
            $title = ' - ' . $output['title'][$i];
        }
        $html .= '<div class="mb-6">';
        $html .= '<p class="h4">Example' . $nb_text . $title . '</p>' . " \n";

        if (!empty($output['subtitle'][$i])) {
            $html .= $output['subtitle'][$i];
        }

        $html .= '<div class="form-code"><pre class="line-numbers language-php"><code class="language-php">' . $output['form_code'][$i] . '</code></pre></div>' . " \n";
        $form = $output['form'][$i];
        if ($form instanceof phpformbuilder\Form) {
            $html .= '<div class="output pt-5">' . " \n";

            // if modal or popover
            if ($form->formId == 'plugins-modal-form-1') {
                $html .= '<div class="text-center"> <button data-micromodal-trigger="modal-plugins-modal-form-1" class="btn btn-primary text-white btn-lg">Open the modal form</button> </div>';
            } elseif ($form->formId == 'plugins-popover-form-1') {
                $html .= '<div class="d-flex justify-content-between">';
                $html .= '<button data-popover-trigger="plugins-popover-form-1" class="btn btn-warning">Open the popover form</button>';

                $html .= '<button data-popover-trigger="plugins-popover-form-1" data-animation="perspective" data-backdrop="true" data-theme="light-border" class="btn btn-danger text-white">Open the same popover form with different settings</button>';
                $html .= '</div>';
            }

            $html .= $form->getCode(false);

            $html .= '</div>';
        } else {
            $html .= '<div class="output pt-5">' . $form . '</div>';
        }
        $uniqid = uniqid();
        $html .= '<button class="btn btn-primary dropdown-toggle dropdown-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' . $uniqid . '" aria-expanded="false" aria-controls="collapse-' . $uniqid . '">show output code</button>' . " \n";
        $html .= '<div class="output-code collapse" id="collapse-' . $uniqid . '"><pre class="line-numbers language-php"><code class=" language-php">' . $output['html_code'][$i] . '</code></pre></div>' . " \n";
        $html .= '</div>';

        if ($form instanceof phpformbuilder\Form) {
            $form->setMode('development');
            $form->useLoadJs();
            $jsfiles  = preg_replace("/[\r\n]/", "", $form->getIncludes('js', false));

            $html .= $jsfiles;
            $html .= $form->getJsCode(false);
        }
    }

    return $html;
}

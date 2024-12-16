<!doctype html>
<html lang="en-US">

<head>
    <?php
    $meta = array(
        'title'       => 'PHP Form Builder - PHP Beginners guide',
        'description' => 'PHP Form Builder - Tutorial and detailed instructions for PHP beginners',
        'canonical'   => 'https://www.phpformbuilder.pro/documentation/beginners-guide.php',
        'screenshot'  => 'beginners-guide.png'
    );
    include_once 'inc/page-head.php';
    ?>
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
            <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#php-server">Install and run a local PHP server</a></li>
            <li class="nav-item"><a class="nav-link" href="#php-version">Check your PHP version</a></li>
            <li class="nav-item"><a class="nav-link" href="#upload-phpformbuilder-folders">Upload phpformbuilder folders</a></li>
            <li class="nav-item"><a class="nav-link" href="#include-required-files">Include required files on your page to build your form</a></li>
            <li class="nav-item"><a class="nav-link" href="#build-your-first-form">Build your first form</a></li>
            <li class="nav-item"><a class="nav-link" href="#validate-posted-values">Validate the user's posted values and send emails</a></li>
            <li class="nav-item"><a class="nav-link" href="#complete-page-code">Complete page code</a></li>
            <li class="nav-item"><a class="nav-link" href="#to-go-further">To go further</a></li>
        </ul>
    </div>

    <!-- /main sidebar -->

    <main class="container">

        <?php include_once 'inc/top-section.php'; ?>

        <h1>PHP Beginners Guide</h1>
        <section class="mb-6">
            <h2 id="home">Welcome to PHP Form Builder's Beginners Guide</h2>
            <p>Here you'll learn in a few steps how to:</p>
            <ul class="mb-5">
                <li><a href="#php-server">Install and run a local PHP server</a></li>
                <li><a href="#php-version">Check your PHP version</a></li>
                <li><a href="#include-required-files">Include the required files on your page to build your form</a></li>
                <li><a href="#register">Register your copy</a></li>
                <li><a href="#build-your-first-form">Build your first form</a></li>
                <li><a href="#validate-posted-values">Validate user's posted values and send email</a></li>
                <li><a href="#complete-page-code">Complete page code</a></li>
                <li><a href="#to-go-further">To go further</a></li>
            </ul>
            <h4 class="mt-lg">For any question or request</h4>
            <p>Please </p>
            <ul>
                <li>contact me through <a href="https://codecanyon.net/item/php-form-builder/8790160/comments">PHP Form Builder's comments on Codecanyon</a></li>
                <li>Email me at <a href="https://www.miglisoft.com/#contact">https://www.miglisoft.com/#contact</a></li>
            </ul>
        </section>
        <section class="mb-6">
            <article class="mb-6">
                <h3 id="php-server" class="numbered-title">Install and run a local PHP server</h3>
                <div class="ps-4">
                    <p><strong>Download and install a PHP server - this is required to run PHP on your computer.</strong></p>
                    <p>Most well-known are:</p>
                    <ul>
                        <li><a href="https://www.apachefriends.org">XAMPP</a> (WINDOWS | OSX | LINUX)</li>
                        <li><a href="https://www.wampserver.com">WAMP</a> (WINDOWS)</li>
                        <li><a href="https://www.mamp.info">MAMP</a> (OSX)</li>
                    </ul>
                    <p class="alert alert-info has-icon">You'll find numerous pages and videos installing and running a PHP server.</p>
                </div>
            </article>
            <article class="mb-6">
                <h3 id="php-version" class="numbered-title">Check your PHP version</h3>
                <div class="ps-4">
                    <ol class="numbered">
                        <li>
                            <p><strong>Create a new empty file at the root of your project, named, for example, <span class="file-path">test-form.php</span>.</strong></p>
                        </li>
                        <li>
                            <p><strong>Add the following line to your file:</strong></p>
                            <pre><code class="language-php">&lt;?php phpinfo(); ?&gt;</code></pre>
                        </li>
                        <li>
                            <p><strong>Open your favorite browser and go to your file's URL, for example, <span class="file-path">https://localhost/test-form.php</span></strong></p>
                        </li>
                        <li>
                            <p><strong>If your version is PHP 7.4 or newer, you're on the right track.</strong></p>
                            <p>If not, you've got to upgrade your PHP to a more recent version.</p>
                        </li>
                    </ol>
                </div>
            </article>
            <article class="mb-6">
                <h3 id="upload-phpformbuilder-folders" class="numbered-title">Upload the phpformbuilder folder</h3>
                <div class="ps-4">
                    <ul>
                        <li>
                            <p><strong>Add the <span class="file-path">phpformbuilder</span> folder at the root of your project.</strong></p>
                            <p>Your directory structure should be similar to this:</p>
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
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <p>PHP Form Builder's package includes the Form Builder itself, the documentation, and the templates.</p>
                            <p class="alert alert-warning has-icon">You don't have to upload all the files and folders on your production server.</p>
                            <p><strong>Documentation and Templates are available online at <a href="https://www.phpformbuilder.pro/">https://www.phpformbuilder.pro/</a>.<br>There's no need to upload them on your production server.</strong></p>
                            <p>More details about folders, files, and required files on the production server are available here: <a href="/#package-structure">../#package-structure</a></p>
                        </li>
                    </ul>
                </div>
            </article>

            <article class="mb-6">
                <h3 id="register" class="numbered-title">Register</h3>
                <div class="ps-4">

                    <p><strong>Open <span class="file-path">phpformbuilder/register.php</span> in your browser, and enter your purchase code to activate your copy.</strong></p>
                    <p>Each purchased license allows the installation of PHP Form Builder on two different domains:</p>
                    <ul>
                        <li>One for localhost</li>
                        <li>One for your production server</li>
                    </ul>
                    <p><strong>Once you register your purchase, delete <span class="file-path">register.php</span> from your production server to avoid unwanted access.</strong></p>
                </div>
            </article>

            <article class="mb-6">
                <h3 id="include-required-files" class="numbered-title">Include required files on your page to build the form</h3>
                <div class="ps-4">
                    <ol class="numbered">
                        <li class="mb-5">
                            <p><strong>Open the <span class="file-path">test-form.php</span> you created on <a href="#php-version">step n°2</a> with your favorite editor (VS-Code, Sublime Text, Notepad++, Atom, ...)</strong></p>
                        </li>
                        <li class="mb-5">
                            <p><strong>Add HTML basic markup:</strong></p>
                            <pre class="line-numbers"><code class="language-php">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;meta charset=&quot;utf-8&quot;&gt;
&lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;
&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;
&lt;title&gt;Test Form&lt;/title&gt;

&lt;!-- Bootstrap 5 CSS --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css&quot; integrity=&quot;sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3&quot; crossorigin=&quot;anonymous&quot;&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h1&gt;My first form&lt;/h1&gt;

&lt;!-- Bootstrap 5 JavaScript --&gt;
&lt;script src=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js&quot; integrity=&quot;sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p&quot; crossorigin=&quot;anonymous&quot;&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                        </li>
                        <li class="mb-5">
                            <p><strong>Now add the following code at the very beginning of your file:</strong></p>
                            <pre class="line-numbers"><code class="language-php">&lt;?php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

/* =============================================
    Start session and include the autoloader
============================================= */

session_start();
include_once rtrim($_SERVER[&apos;DOCUMENT_ROOT&apos;], DIRECTORY_SEPARATOR) . &apos;/phpformbuilder/autoload.php&apos;;
?&gt;</code></pre>
                            <p class="alert alert-success has-icon">This code will be the same for all pages containing forms.</p>
                            <p><button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#code-hint-include" aria-expanded="false">What's going on here? <span class="caret"></span></button></p>
                            <div class="collapse" id="code-hint-include">
                                <div class="well">
                                    <pre class="line-numbers"><code class="language-php">&lt;?php
// Following 2 lines are required since PHP 5.3 to set namespaces.
// more details here: https://www.php.net/manual/en/language.namespaces.php
use phpformbuilder\Form;
use phpformbuilder\Validator\Validator;

// Following line starts PHP session. That's to say we'll memorize variables in PHP session.
session_start();

// Then we include the autoloader.
include_once rtrim($_SERVER[&apos;DOCUMENT_ROOT&apos;], DIRECTORY_SEPARATOR) . &apos;/phpformbuilder/autoload.php&apos;;
?&gt;</code></pre>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <p><strong>Refresh your <span class="file-path">test-form.php</span> in your browser (<span class="file-path">https://localhost/my-project/test-form.php</span>)</strong></p>
                            <p>If you see a blank page, all is ok, you can <a href="#build-your-first-form">go on to next step</a></p>
                            <p id="error500">If your browser throws an error 500, click button below to solve this.</p>
                            <p><button class="btn btn-danger" data-bs-toggle="collapse" data-bs-target="#code-hint-error-500" aria-expanded="false" aria-controls="code-hint-error-500">How to solve error 500 <span class="caret"></span></button></p>
                            <div class="collapse" id="code-hint-error-500">
                                <div class="well">
                                    <p><strong>Your browser has thrown this error because PHP can't find <span class="file-path">phpformbuilder/autoload.php</span>.</strong></p>
                                    <p><code class="language-php">rtrim($_SERVER[&#039;DOCUMENT_ROOT&#039;], DIRECTORY_SEPARATOR)</code> should lead to the root of your project.<br>If works fine if your server is well configured, but it seems that's not the case.</p>
                                    <p>To solve this, open <a href="../phpformbuilder/server.php">../phpformbuilder/server.php</a> in your browser and follow the instructions.</p>
                                    <p>More explainations about error 500 are available at <a href="https://www.phpformbuilder.pro/documentation/help-center.php#warning-include_once">https://www.phpformbuilder.pro/documentation/help-center.php#warning-include_once</a></p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            </article>
            <article class="mb-6">
                <h3 id="build-your-first-form" class="numbered-title">Build your first form</h3>
                <div class="ps-4">
                    <p><strong>So let's start building the form.</strong></p>
                    <ol class="numbered">
                        <li class="mb-5">
                            <p><strong>To create a new form, add this line just after the <code class="language-php">include_once</code> statement Line 5 in your <span class="file-path">test-form.php</span>:</strong></p>
                            <pre class="line-numbers" data-start="6"><code class="language-php">$form = new Form('test-form', 'horizontal', 'novalidate');</code></pre>
                            <p><button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#code-hint-new-form" aria-expanded="false" aria-controls="code-hint-new-form">What's going on here? <span class="caret"></span></button></p>
                            <div class="collapse" id="code-hint-new-form">
                                <div class="well">
                                    <pre><code class="language-php">$form = new Form(&#039;test-form&#039;, &#039;horizontal&#039;, &#039;novalidate&#039;);
// this function creates a new form object.

// arguments:
//      &#039;test-form&#039; : this is the form name
//      &#039;horizontal&#039;: this will add class=&quot;form-horizontal&quot;
//      &#039;novalidate&#039;: this will add &#039;novalidate&#039; attribute. It prevents browser to use browser&#039;s html5 built-in validation.

// You can skip &#039;novalidate&#039; argument if you want to use browser&#039;s html5 built-in validation.

// If you want Material Design style, instanciate this way:
$form = new Form(&#039;test-form&#039;, &#039;horizontal&#039;, &#039;novalidate&#039;, &#039;material&#039;);

// or with html5 validation:
$form = new Form(&#039;test-form&#039;, &#039;horizontal&#039;, &#039;&#039;, &#039;material&#039;);</code></pre>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <p><strong>Add the following line to create an input field:</strong></p>
                            <pre class="line-numbers" data-start="7"><code class="language-php">$form->addInput('text', 'user-name', '', 'Name:', 'required, placeholder=Name');</code></pre>
                            <p><button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#code-hint-add-input" aria-expanded="false" aria-controls="code-hint-add-input">What's going on here? <span class="caret"></span></button></p>
                            <div class="collapse" id="code-hint-add-input">
                                <div class="well">
                                    <pre><code class="language-php">$form-&gt;addInput(&#039;text&#039;, &#039;user-name&#039;, &#039;&#039;, &#039;Name:&#039;, &#039;required, placeholder=Name&#039;);
// this function adds an input to your form.

// arguments:
//      &#039;text&#039;     : the html input type. can be for example &#039;text&#039; or &#039;hidden&#039;, &#039;email&#039;, &#039;number&#039;, ...
//      &#039;user-name&#039;: the html &quot;name&quot; attribute
//      &#039;Name:&#039;   : label content displayed on screen
//      &#039;required, placeholder=Name&#039;: can be any html addributes, separated with commas and without quotes.</code></pre>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <p><strong>Add the following line to create 2 radio buttons with Nice Check plugin</strong></p>
                            <pre class="line-numbers" data-start="8"><code class="language-php">$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;Yes&#039;, 1);
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;No&#039;, 0);
$form-&gt;printRadioGroup(&#039;is-all-ok&#039;, &#039;Is all ok?&#039;, false, &#039;required&#039;);
$form-&gt;addPlugin(&apos;nice-check&apos;, &apos;#test-form&apos;, &apos;default&apos;, [&apos;skin&apos; =&gt; &apos;red&apos;]);</code></pre>
                            <p><button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#code-hint-add-radio" aria-expanded="false" aria-controls="code-hint-add-radio">What's going on here? <span class="caret"></span></button></p>
                            <div class="collapse" id="code-hint-add-radio">
                                <div class="well">
                                    <pre><code class="language-php">// add 2 radio buttons.
// arguments:
//      &#039;is-all-ok&#039;  : radio groupname
//      &#039;Yes&#039;        : radio label
//      1                      : radio value
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;Yes&#039;, 1);
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;No&#039;, 0);

// render radio group
// arguments:
//      &#039;is-all-ok&#039;  : radio groupname
//      &#039;Is all ok?&#039;: radio group  label
//      false                  : inline (true or false)
//      &#039;required&#039;   : this will add 'required' attribute. can contain any html attribute(s), separated with commas.
$form-&gt;printRadioGroup(&#039;is-all-ok&#039;, &#039;Is all ok?&#039;, false, &#039;required&#039;);

// Add Nice Check plugin (beautiful radio buttons)
// arguments:
//      &#039;input&#039;  : plugin's target (JavaScript selector)
//      &#039;default&#039;: plugin's config (see class doc for details please)
//      array([...])       : arguments sended to plugin (see class doc for details please)
$form-&gt;addPlugin(&apos;nice-check&apos;, &apos;#test-form&apos;, &apos;default&apos;, [&apos;skin&apos; =&gt; &apos;red&apos;]);</code></pre>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <p><strong>Add the submit button:</strong></p>
                            <pre class="line-numbers" data-start="12"><code class="language-php">$form->addBtn('submit', 'submit-btn', 1, 'Send', 'class=btn btn-success');</code></pre>
                            <p><button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#code-hint-add-submit" aria-expanded="false" aria-controls="code-hint-add-submit">What's going on here? <span class="caret"></span></button></p>
                            <div class="collapse" id="code-hint-add-submit">
                                <div class="well">
                                    <pre><code class="language-php">$form-&gt;addBtn(&#039;submit&#039;, &#039;submit-btn&#039;, 1, &#039;Send&#039;, &#039;class=btn btn-success&#039;);
// this function adds a button to your form.

// arguments:
//      &#039;submit&#039;     : the html button type.
//      &#039;submit-btn&#039; : the html &quot;name&quot; attribute
//      &#039;Send:&#039;     : Button text content displayed on screen
//      &#039;class=btn btn-success&#039;: can be any html addributes, separated with commas and without quotes.</code></pre>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <p><strong>Well done. Now the form is ready with an input and a submit button.</strong></p>
                            <p><strong>Last step is to render it on page.We'll add 3 PHP blocks.</strong></p>
                            <ol class="spaced">
                                <li>
                                    <p>Just before <code class="language-php">&lt;/head&gt;</code>:</p>
                                    <pre><code class="language-php">&lt;?php $form-&gt;printIncludes(&#039;css&#039;); ?&gt;</code></pre>
                                </li>
                                <li>
                                    <p>Anywhere between <code class="language-php">&lt;body&gt;&lt;/body&gt;</code>: (at the place you want the form to be displayed)</p>
                                    <pre><code class="language-php">&lt;?php
if (isset($sentMessage)) {
    echo $sentMessage;
}
$form-&gt;render();
?&gt;</code></pre>
                                </li>
                                <li>
                                    <p>Just before <code class="language-php">&lt;/body&gt;</code>:</p>
                                    <pre><code class="language-php">&lt;?php
    $form-&gt;printIncludes(&#039;js&#039;);
    $form-&gt;printJsCode();
?&gt;</code></pre>
                                </li>
                            </ol>
                            <p><button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#code-hint-render" aria-expanded="false" aria-controls="code-hint-render">What's going on here? <span class="caret"></span></button></p>
                            <div class="collapse" id="code-hint-render">
                                <div class="well">
                                    <pre><code class="language-php">// Following lines will include JavaScript plugin's css files if your form uses plugins.
&lt;?php $form-&gt;printIncludes(&#039;css&#039;); ?&gt;

// following lines will render the form in your page, and display success / error message if form has been posted by user.
&lt;?php
if (isset($sentMessage)) {
    echo $sentMessage;
}
$form-&gt;render();
?&gt;

// Following lines will include JavaScript plugin's js files if your form uses plugins.
&lt;?php $form-&gt;printIncludes(&#039;js&#039;); ?&gt;</code></pre>
                                </div>
                            </div>
                        </li>
                        <li class="mb-5">
                            <p><strong>Refresh your <span class="file-path">test-form.php</span> in your browser (<span class="file-path">https://localhost/my-project/test-form.php</span>)</strong></p>
                            <p>your form should be displayed.</p>
                        </li>
                    </ol>
                </div>
            </article>
            <article class="mb-6">
                <h3 id="validate-posted-values" class="numbered-title">Validate the user's posted values and send emails</h3>
                <div class="ps-4">
                    <p><strong>Add this PHP block just after <code class="language-php">include_once [...] . &#039;/phpformbuilder/autoload.php&#039;;</code>:</strong></p>
                    <pre><code class="language-php">if ($_SERVER[&quot;REQUEST_METHOD&quot;] == &quot;POST&quot;) {

    // create validator &amp; auto-validate required fields
    $validator = Form::validate(&#039;test-form&#039;);

    // check for errors
    if ($validator-&gt;hasErrors()) {
        $_SESSION[&#039;errors&#039;][&#039;test-form&#039;] = $validator-&gt;getAllErrors();
    } else {
        $emailConfig = array(
            &#039;sender_email&#039;    =&gt; &#039;contact@my-site.com&#039;,
            &#039;sender_name&#039;     =&gt; &#039;PHP Form Builder&#039;,
            &#039;recipient_email&#039; =&gt; &#039;recipient-email@my-site.com&#039;,
            &#039;subject&#039;         =&gt; &#039;PHP Form Builder - Test form email&#039;,
            &#039;filter_values&#039;   =&gt; &#039;test-form&#039;
        );
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear(&#039;test-form&#039;);
    }
}</code></pre>
                    <div class="alert alert-info has-icon">
                        <p>Email sending may fail on your localhost, depending on your configuration.</p>
                        <p>It should work anyway on your production server.</p>
                    </div>
                    <p><button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#code-hint-validate" aria-expanded="false" aria-controls="code-hint-validate">What's going on here? <span class="caret"></span></button></p>
                    <div class="collapse" id="code-hint-validate">
                        <div class="well">
                            <pre><code class="language-php">// if form has been posted
if ($_SERVER[&quot;REQUEST_METHOD&quot;] == &quot;POST&quot; &amp;&amp; Form::testToken(&#039;test-form&#039;) === true) {

    // create a new validator object &amp; auto-validate required fields
    $validator = Form::validate(&#039;test-form&#039;);

    // store errors in session if any
    if ($validator-&gt;hasErrors()) {
        $_SESSION[&#039;errors&#039;][&#039;test-form&#039;] = $validator-&gt;getAllErrors();
    } else {

        // all is ok, send email
        // PHP Form Builder will add all posted labels and values to your message,
        // no need to do anything manually.
        $emailConfig = array(
            &#039;sender_email&#039;    =&gt; &#039;contact@my-site.com&#039;,
            &#039;sender_name&#039;     =&gt; &#039;PHP Form Builder&#039;,
            &#039;recipient_email&#039; =&gt; &#039;recipient-email@my-site.com&#039;,
            &#039;subject&#039;         =&gt; &#039;PHP Form Builder - Test form email&#039;,
            // filter_values are posted values you don&#039;t want to include in your message. Separated with commas.
            &#039;filter_values&#039;   =&gt; &#039;test-form&#039;
        );

        // send message
        $sentMessage = Form::sendMail($emailConfig);

        // clear session values: next time your form is displayed it&#039;ll be emptied.
        Form::clear(&#039;test-form&#039;);
    }
}</code></pre>
                        </div>
                    </div>
                </div>
            </article>
            <article class="mb-6">
                <h3 id="complete-page-code" class="numbered-title">Complete page code</h3>
                <div class="ps-4">
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
        $emailConfig = array(
            &#039;sender_email&#039;    =&gt; &#039;contact@my-site.com&#039;,
            &#039;sender_name&#039;     =&gt; &#039;PHP Form Builder&#039;,
            &#039;recipient_email&#039; =&gt; &#039;recipient-email@my-site.com&#039;,
            &#039;subject&#039;         =&gt; &#039;PHP Form Builder - Test form email&#039;,
            // filter_values are posted values you don&#039;t want to include in your message. Separated with commas.
            &#039;filter_values&#039;   =&gt; &#039;test-form&#039;
        );

        // send message
        $sentMessage = Form::sendMail($emailConfig);
        Form::clear(&#039;test-form&#039;);
    }
}
$form = new Form('test-form', 'horizontal', 'novalidate');
$form->addInput('text', 'user-name', '', 'Name:', 'required, placeholder=Name');
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;Yes&#039;, 1);
$form-&gt;addRadio(&#039;is-all-ok&#039;, &#039;No&#039;, 0);
$form-&gt;printRadioGroup(&#039;is-all-ok&#039;, &#039;Is all ok?&#039;, false, &#039;required&#039;);
$form-&gt;addPlugin(&apos;nice-check&apos;, &apos;#test-form&apos;, &apos;default&apos;, [&apos;skin&apos; =&gt; &apos;red&apos;]);
$form->addBtn('submit', 'submit-btn', 1, 'Send', 'class=btn btn-success');
?&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;meta charset=&quot;utf-8&quot;&gt;
&lt;meta http-equiv=&quot;X-UA-Compatible&quot; content=&quot;IE=edge&quot;&gt;
&lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1, shrink-to-fit=no&quot;&gt;
&lt;title&gt;Test Form&lt;/title&gt;

&lt;!-- Bootstrap 5 CSS --&gt;
&lt;link rel=&quot;stylesheet&quot; href=&quot;https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css&quot; integrity=&quot;sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3&quot; crossorigin=&quot;anonymous&quot;&gt;
&lt;?php $form-&gt;printIncludes(&#039;css&#039;);?&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;h1&gt;My first form&lt;/h1&gt;
&lt;?php
if (isset($sentMessage)) {
    echo $sentMessage;
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
                </div>
            </article>
            <article class="mb-6">
                <h3 id="to-go-further" class="numbered-title">To go further</h3>
                <div class="ps-4">
                    <p><strong>Now you've learned the basics; Several resources will help to add other fields, plugins, validate different values and build more complex layouts:</strong></p>
                    <ul>
                        <li><a href="../templates/index.php">Templates</a></li>
                        <li><a href="code-samples.php">Code Samples</a></li>
                        <li><a href="functions-reference.php">Functions Reference</a></li>
                        <li><a href="class-doc.php">Class Doc.</a></li>
                    </ul>
                </div>
            </article>
        </section>
    </main>
    <?php require_once 'inc/js-includes.php'; ?>
</body>

</html>
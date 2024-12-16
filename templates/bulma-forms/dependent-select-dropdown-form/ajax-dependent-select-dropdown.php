<?php

use phpformbuilder\Form;

session_start();

include_once rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) . '/phpformbuilder/autoload.php';

if (!isset($_POST['movie_cat']) || !preg_match('`[a-zA-Z]`', $_POST['movie_cat'])) {
    exit('Wrong data received by Ajax');
}

// values for demo
$dbCount = 7;
$categories = array(
    'Action' => array(
        'Cinderella Man',
        'Robinson Crusoe (Daniel Defoe\'s Robinson Crusoe)',
        'Kounterfeit',
        'Revenge of the Zombies',
        'Harrison Bergeron',
        'Master, The (Huang Fei Hong jiu er zhi long xing tian xia)',
        'Elvira, Mistress of the Dark'
    ),
    'Adventure' => array(
        'Ant Bully, The',
        'Inglourious Basterds',
        'Evil Cult, The (Lord of the Wu Tang) (Yi tian tu long ji: Zhi mo jiao jiao zhu)',
        'Burning Hot Summer, A (Un été brûlant)',
        'The Mayor of Casterbridge',
        'War of the Wildcats (In Old Oklahoma)',
        'Common'
    ),
    'Animation' => array(
        'Charisma (Karisuma)',
        'Don\'t Be a Menace to South Central While Drinking Your Juice in the Hood',
        'According to Spencer',
        'From Hell',
        'Enon opetukset',
        'Climate of Change',
        'Rare Exports: A Christmas Tale (Rare Exports)'
    ),
    'Comedy' => array(
        'Maniac Cop',
        '44 Minutes: The North Hollywood Shoot-Out',
        'Ethan Frome',
        'Saturn 3',
        'Busher, The',
        'Paparazzi',
        'Paulette'
    ),
    'Documentary' => array(
        'Harry and Walter Go to New York',
        'Harper',
        'Extremely Loud and Incredibly Close',
        'Ambushers, The',
        'ID:A',
        'Hands on a Hard Body',
        'Best Foot Forward'
    ),
    'Drama' => array(
        'Born American',
        'St. Francisville Experiment, The',
        'Two Moon Junction',
        'Dead Outside, The',
        'Dungeons & Dragons',
        'Woo',
        'The Six Million Dollar Man'
    ),
    'Horror' => array(
        'Gamera the Brave',
        'Joe and Max',
        'Ginger & Rosa',
        'Arrapaho',
        'The Vexxer',
        'Sealed Cargo',
        'Night and the City'
    ),
    'Mystery' => array(
        'W.',
        'Guarding Tess',
        'Boy in the Striped Pajamas, The (Boy in the Striped Pyjamas, The)',
        'Last Exorcism, The',
        'Along Came Polly',
        'White Wedding (Noce blanche)',
        'Cry of the Owl, The'
    ),
    'Thriller' => array(
        'Hijacking, A (Kapringen)',
        '6th Man, The (Sixth Man, The)',
        'Night on the Galactic Railroad (Ginga-tetsudo no yoru)',
        'In the Realms of the Unreal',
        'Toll of the Sea, The',
        'Showrunners: The Art of Running a TV Show',
        'Brandon Teena Story, The'
    ),
    'War' => array(
        'Samurai (Samourais)',
        'Bitter Victory',
        'El Lobo',
        'Dot the I',
        'Third Part of the Night, The (Trzecia czesc nocy)',
        'AKA',
        'Bugs Bunny / Road Runner Movie, The (a.k.a. The Great American Chase)'
    )
);

$movieCat = $_POST['movie_cat'];
$movies = $categories[$movieCat];

// END values for demo

$form = new Form('movies-form', 'vertical', 'novalidate', 'bulma');
foreach ($movies as $mv) {
    $form->addOption('movie', $mv, $mv);
}
$form->addSelect('movie', 'Movie', 'required');

/* render select lists */

echo $form->html;

// The script below updates the form token value with the new generated token
?>
<script>
    var form = forms['movies-form'];
    document.querySelector('input[name="movies-form-token"]').value = '<?php echo $_SESSION['movies-form_token']; ?>';

    // enable the slimselect plugin for the new fields
    new SlimSelect({
        select: 'select[name="movie"]'
    });
    setTimeout(() => {
        // enable validator for the new fields
        form.fv.addField(
            'movie', {
                validators: {
                    notEmpty: {}
                }
            }
        );
    }, 500);
</script>

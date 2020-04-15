<?php

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('views');

$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'auto_reload' => true,
]);

$file = file_get_contents('./images.json', true);

//var_dump($file);

$json = $file;

$story = null;

$images = json_decode($json);

$categories = array();

foreach ($images->{'images'} as &$image) {
    if ($image->viewOnCategories) {
        array_push($categories, $image);
        $story = $images->story;
    };
}

$template = $twig->load('categories.html');
echo $template->render(array(
    'categories' => $categories,
    'story' => $story,
    'title' => 'COVID-19 Educational Resources',
	'description' => 'Covid Tutorials'
));

// $template = $twig->load('index.html');
// echo $template->render(array(
//     'images' => $images->{'images'}
// ));


//include ("cards.php")

?>
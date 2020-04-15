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

$images = json_decode($json);

$categories = array();

foreach ($images->{'images'} as &$image) {
    if ($image->viewOnCategories) {
        array_push($categories, $image);
    };
}

//var_dump($categories);

$template = $twig->load('categories.html');
echo $template->render(array(
    'categories' => $categories
));


//include ("cards.php")

?>
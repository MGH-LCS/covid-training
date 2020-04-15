<?php

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('views');

$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'auto_reload' => true,
]);

$category = null;
$category = $_GET['category'];
$set = null;
$tag = $_GET['tag'];

$file = file_get_contents('./images.json', true);

//var_dump($file);
//var_dump($photoId);

$json = $file;

$obj = json_decode($json);

//print $obj->{'images'};

$setImages = array();

foreach ($obj->{'images'} as &$image) {
    if ($image->tags != null && in_array($tag, $image->tags)) {
        array_push($setImages, $image);
    };
}

//var_dump($photo);

$template = $twig->load('tag.html');
echo $template->render(array(
		'categoryTitle' => $category,
		'setTitle' => $set,
		'images' => $setImages,
		'id' => $id,
		'view' => 'Set',
		'tag' => $tag,
		'title' => 'COVID-19 Educational Resources'.$set,
		'description' => 'Coronavirus'
	));

?>
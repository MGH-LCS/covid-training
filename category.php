<?php

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('views');

$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'auto_reload' => true,
]);

$category = null;
$category = $_GET['category'];
$partOfSet = null;

$file = file_get_contents('./images.json', true);

//var_dump($file);
//var_dump($photoId);

$json = $file;

$obj = json_decode($json);

//print $obj->{'images'};

$categoryImages = array();

foreach ($obj->{'images'} as &$image) {
    if ($image->category == $category) {
    	//if (($image->viewOnSets == true) || ($image->viewOnSets != false)) {
        	array_push($categoryImages, $image);
    	//}
        $partOfSet = $image->viewOnSets;
    };
}

//var_dump($photo);

$template = $twig->load('category.html');
echo $template->render(array(
		'categoryTitle' => $category,
		'images' => $categoryImages,
		'id' => $id,
		'view' => 'Full',
		'partOfSet' => $partOfSet,
		'title' => 'COVID-19 Educational Resources'.$category,
		'description' => 'Coronavirus'
	));

?>
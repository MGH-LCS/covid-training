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

$tags = array();

foreach ($images->{'images'} as &$image) {
    if ($image->tags != null) {
//        print "tags: $image->tags";

        foreach ($image->tags as &$tag) {
//            print "tag: $tag";
            if (!in_array($tag, $tags)) {
                array_push($tags, $tag);
            }

        }
    };
}

//var_dump($categories);

$template = $twig->load('tags.html');
echo $template->render(array(
    'tags' => $tags
));


//include ("cards.php")

?>
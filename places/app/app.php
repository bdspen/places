<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";

    session_start();

    if(empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();
    }

    $place_app = new Silex\Application();

    $place_app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $place_app->get("/", function() use ($place_app) {

        return $place_app['twig']->render('places.html.twig', array('places' => Place::getAll()));

    });

    $place_app->post("/places", function() use ($place_app) {
        $place = new Place($_POST['input_place']);
        $place->save();
        return $place_app['twig']->render('create_place.html.twig', array('newplace' => $place));
    });

    $place_app->post("/delete_places", function() use ($place_app) {
        Place::deleteAll();
        return $place_app['twig']->render('delete_places.html.twig');
    });

    return $place_app;
?>

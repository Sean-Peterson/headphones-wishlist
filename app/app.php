<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/headphones.php";

    session_start();

    if (empty($_SESSION['list_of_headphones'])) {
        $_SESSION['list_of_headphones'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get('/', function() use ($app) {
        return $app['twig']->render('headphones.html.twig', array('headphones' => Headphones::getAll()));
    });

    $app->post('/add_headphones', function() use ($app){
        $headphones = new Headphones($_POST['brand'], $_POST['model'], $_POST['price']);
        $headphones->save();
        return $app['twig']->render('add_headphones.html.twig', array('add_headphones' => $headphones));
    });

    $app->post('/delete', function() use ($app){
        Headphones::deleteAll();
        return $app['twig']->render('/headphones.html.twig');
    });

    return $app;
?>

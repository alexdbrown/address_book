<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Address_book.php";

    session_start();

    if (empty($_SESSION['list_of_addresses'])) {
        $_SESSION['list_of_addresses'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'

    ));

    $app->get("/", function() use ($app) {

    //     $output = "";
    //
    //     $all_contacts = Contact::getAll();
    //
    //     //previously instantiated platforms - not static yet
    //     $list_of_addresses = array(//need to add instantiated tasks here??)
    //
    //     foreach ($all_contacts as $contact) {
    //         $output .= "<p>" . $contact->getContact() . "</p>";
    //     }
    // }

        return $app['twig']->render('contacts.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/contacts", function () use ($app) {
        $contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
        $contact->save();
        return $app['twig']->render('create_contact.html.twig');

    });

    $app->post("/delete_tasks", function () {

        Task::deleteAll();

    });

    return $app;

?>

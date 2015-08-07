<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../Address_book.php";

    session_start();
    if (empty($_SESSION['list_of_addresses'])) {
        $_SESSION['list_of_addresses'] = array();
    }

    $app = new Silex\Application();

    $app->get("/", function() {

        $output = "";

        $all_contacts = Contact::getAll();
        //previously instantiated platforms - not static yet
        $list_of_addresses = array(//need to add instantiated tasks here??)

        foreach (Contct::() as $contact) {
            $output .= "<p>" . $contact->getContact() . "</p>";
        }

        return $output;

    });

    $app->post("/contacts", function () {
        $contact = new Contact($_POST['name'], $_POST['phone'], $_POST['address']);
        $contact->save();
        return //twig rendering here

    });

    $app->post("/delete_tasks", function () {

        Task::deleteAll();

    });

    return $app;

?>

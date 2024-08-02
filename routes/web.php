<?php

declare(strict_types=1);

$task   = new Task();
$router = new Router();

// FIXME: Convert into routes
if (count($_GET) > 0 || count($_POST) > 0) {
    if (isset($_POST['text'])) {
        $task->add($_POST['text']);
    }

    if (isset($_GET['complete'])) {
        $task->complete((int) $_GET['complete']);
    }

    if (isset($_GET['uncompleted'])) {
        $task->uncompleted((int) $_GET['uncompleted']);
    }

    if (isset($_GET['delete'])) {
        $task->delete((int) $_GET['delete']);
    }
}

$router->get('/', fn() => require 'view/pages/home.php');
$router->get('/todos', fn() => require 'view/pages/todos.php');

$router->get('/notes', fn() => require 'view/pages/notes.php');

$router->get('/login', fn() => require 'view/pages/auth/login.php');
$router->post('/login', fn() => (new User())->login());
$router->get('/logout', fn() => (new User())->logout());

$router->get('/register', fn() => require 'view/pages/auth/register.php');
$router->post('/register', fn() => (new User())->register());

$router->notFound();

/**
 * Registration process:
 * 1. Create a user
 * 1.1. Check if user exists
 * 1.1.1. If true => Show error message
 * 1.2. Create a new user
 * 2. Login user
 * 3. Redirect to profile
 * 4.
 */


<?php

declare(strict_types=1);

$task   = new Task();

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

Router::get('/', fn() => require 'view/pages/home.php');
Router::get('/todos', fn() => require 'view/pages/todos.php');

Router::get('/notes', fn() => require 'view/pages/notes.php');

Router::get('/login', fn() => require 'view/pages/auth/login.php');
Router::post('/login', fn() => (new User())->login());
Router::get('/logout', fn() => (new User())->logout());

Router::get('/register', fn() => require 'view/pages/auth/register.php');
Router::post('/register', fn() => (new User())->register());

Router::notFound();

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


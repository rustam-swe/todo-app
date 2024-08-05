<?php

declare(strict_types=1);

$task = new Task();

// FIXME: Convert into routes
if (count($_GET) > 0 || count($_POST) > 0) {
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
Router::post('/todos', fn() => require 'controllers/addNewTask.php');

Router::get('/notes', fn() => require 'view/pages/notes.php');

Router::get('/login', fn() => require 'view/pages/auth/login.php');
Router::post('/login', fn() => (new User())->login());
Router::get('/logout', fn() => (new User())->logout());

Router::get('/register', fn() => require 'view/pages/auth/register.php');
Router::post('/register', fn() => (new User())->register());

Router::notFound();

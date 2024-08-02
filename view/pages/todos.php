<?php
if (!isset($_SESSION['user'])) {
    header('Location: /login');
}
?><!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c4497f215d.js" crossorigin="anonymous"></script>
    <title>TODO App</title>
</head>
<body>
<?php
require 'view/partials/navbar.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="my-5">Hello, <?php
                echo $_SESSION['user'] ?? 'Guest'; ?></h1>
            <?php
            require 'view/todo-list.php';

            echo "<hr class='border border-2 opacity-50'>";

            require 'view/new-todo-form.php';
            ?>
        </div>
    </div>
</div>
</body>
</html>
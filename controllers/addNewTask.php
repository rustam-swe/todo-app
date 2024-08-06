<?php

declare(strict_types=1);

(new Task())->add($_POST['text'], $_SESSION['user']['id']);
header('Location: /todos');
exit();
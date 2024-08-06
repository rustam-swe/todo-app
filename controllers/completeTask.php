<?php

declare(strict_types=1);

(new Task())->complete((int)$_GET['id']);
header('Location: /todos');
exit();
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">TODO App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <?php
                if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/todos">Todo list</a>
                    </li>
                <?php
                endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/notes">Notes</a>
                </li>
            </ul>
            <?php
            if (!isset($_SESSION['user'])): ?>
                <a href="/login" class="btn btn-outline-primary mx-2">Login</a>
                <a href="/register" class="btn btn-outline-success">Register</a>
            <?php
            else: {
                echo $_SESSION['user']['email'];
                echo "<a href='/logout' class='ms-2 text-underlined'>Logout</a>";
                $token = rand(1000000000, 9999999999);

                // FIXME: Get rid off db connection
                $db = DB::connect();
                $stmt = $db->prepare("UPDATE users SET temp_token = :token WHERE email = :email");
                $stmt->bindParam(':token', $token);
                $stmt->bindParam(':email', $_SESSION['user']['email']);
                $stmt->execute();

                echo "<a href='https://t.me/{$_ENV['BOT_USERNAME']}?start=$token' class='ms-2 text-underlined'>Connect to telegram</a>";
            }
            endif; ?>
        </div>
    </div>
</nav>
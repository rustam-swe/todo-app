<?php

declare(strict_types=1);

class User
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function login(): void
    {
        $email    = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user'] = $user['email'];
            header('Location: /');
            exit();
        }

        echo 'Email or password is incorrect'; // FIXME: Show on the login page
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /');
        exit();
    }

    public function register()
    {
        if ($this->isUserExists()) {
            echo "User already exists"; // FIXME: Show on the register
            return;
        }

        $user = $this->create();

        $_SESSION['user'] = $user['email'];
        header('Location: /');
    }

    public function isUserExists(): bool
    {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $stmt  = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return (bool) $stmt->fetch();
        }
        return false;
    }

    public function create()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password); // FIXME: hash password
            $stmt->execute();

            // Fetch last created user
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC); // FIXME: Move mode into options
        }
    }
}
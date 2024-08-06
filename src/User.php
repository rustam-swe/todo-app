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
            $_SESSION['user'] = [
                'email' => $user['email'],
                'id'    => $user['id'],
            ];
            unset($_SESSION['message']['error']);
            header('Location: /');
            exit();
        }
        $_SESSION['message']['error'] = "Wrong email or password";
        header('Location: /login');
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
            $_SESSION['message']['error'] = "User already exists";
            header('Location: /register');
            return;
        }

        $user = $this->create();

        $_SESSION['user'] = [
            'email' => $user['email'],
            'id'    => $user['id'],
        ];
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
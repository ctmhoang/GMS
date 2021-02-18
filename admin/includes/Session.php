<?php

class Session
{

    private bool $isSignedIn = false;
    private string $uid;
    private static int $count;
    private string $fullName;

    public function __construct()
    {
        session_start();
        $this->checkSession();
        self::countVisitor();
    }

    public function checkSession(): void
    {
        if (isset($_SESSION['uid'])) {
            $this->uid = $_SESSION['uid'];
            $this->isSignedIn = true;
        } else {
            unset($this->uid);
            $this->isSignedIn = false;
        }
    }

    public static function countVisitor(): void
    {
        if (isset($_SESSION['count'])) {
            self::$count = $_SESSION['count']++;
            return;
        }
        $_SESSION['count'] = 1;
    }

    /**
     * @return bool
     */
    public function isSignedIn(): bool
    {
        return $this->isSignedIn;
    }

    public function login(User $user): void
    {
        if ($user) {
            $this->uid = $_SESSION['uid'] = (string)$user->id;
            $this->isSignedIn = true;
            $this->fullName = $_SESSION['name'] = (string)$user->fullName;
        }
    }

    public function logout(): void
    {
        session_destroy();
        unset($this->uid, $this->fullName);
        $this->isSignedIn = false;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        $flash = isset($_SESSION['message']) ? $_SESSION['message'] : '';
        unset($_SESSION['message']);
        return $flash;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $_SESSION['name'];
    }

    /**
     * @return string
     */
    public function getUid(): string
    {
        return $this->uid;
    }



    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $_SESSION['message'] = $message;
    }

    /**
     * @return int
     */
    public static function getCount(): int
    {
        return self::$count;
    }


}

$session = new Session();
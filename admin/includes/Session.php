<?php

class Session
{

    private bool $isSignedIn = false;
    public string $uid;

    public function __construct()
    {
        session_start();
        $this->checkSession();
    }

    public function checkSession()
    {
        if (isset($_SESSION['uid'])) {
            $this->uid = $_SESSION['uid'];
            $this->isSignedIn = true;
        } else {
            unset($this->uid);
            $this->isSignedIn = false;
        }
    }

    /**
     * @return bool
     */
    public function isSignedIn(): bool
    {
        return $this->isSignedIn;
    }

    public function login(User $user)
    {
        if ($user) {
            $this->uid = $_SESSION['uid'] = (string)$user->id;
            $this->isSignedIn = true;
        }
    }

    public function logout()
    {
        session_destroy();
        unset($this->uid);
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
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $_SESSION['message'] = $message;
    }



}

$session = new Session();
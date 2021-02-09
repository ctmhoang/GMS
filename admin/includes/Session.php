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

    public function logout(User $user)
    {
        session_destroy();
        unset($this->uid);
        $this->isSignedIn = false;
    }

}

$session = new Session();
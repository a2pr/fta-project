<?php

namespace App\Session;

use App\Entity\Users;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionHandler
{
    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function setUserSession(Users $user)
    {
        $this->session->set('user', ['id' => $user->getId(), 'email' => $user->getEmail(), 'name' => $user->getName()]);
    }

    public function getSession(): SessionInterface
    {
        return $this->session;
    }

    public function getUserId()
    {
        return $this->session->get('userId');
    }

    public function removeSession()
    {
        $this->session->clear();
    }
}
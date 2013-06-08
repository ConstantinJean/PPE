<?php



namespace Musee\UserBundle\Util;



class TokenGenerator implements TokenGeneratorInterface
{

    public function generateToken()
    {
        return rtrim(strtr(base64_encode($this->getRandomNumber()), '+/', '-_'), '=');
    }

    private function getRandomNumber()
    {

        return hash('sha256', uniqid(mt_rand(), true), true);
    }
}
<?php



namespace Musee\UserBundle\Util;

interface TokenGeneratorInterface
{
    /**
* @return string
*/
    public function generateToken();
}
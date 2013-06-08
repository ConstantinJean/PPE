<?php


namespace Musee\UserBundle\Mailer;

use Symfony\Component\Security\Core\User\UserInterface;


interface MailerInterface
{
    /**
* Send an email to a user to confirm the account creation
*
* @param UserInterface $user
*
* @return void
*/
    public function sendConfirmationEmailMessage(UserInterface $user);

}
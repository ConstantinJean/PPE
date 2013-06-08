<?php
// src/Musee/UserBundle/EventListener/EmailConfirmationListener.php
 
namespace Musee\UserBundle\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Musee\UserBundle\UserBundleEvents;
use Musee\UserBundle\Event\FormEvent;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Musee\UserBundle\Mailer\MailerInterface;
use Musee\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

 
class EmailConfirmationListener implements EventSubscriberInterface
{
	private $mailer;
	private $tokenGenerator;
	private $router;
	
	
	public function __construct(MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator, UrlGeneratorInterface $router)
    {
        $this->mailer = $mailer;
        $this->tokenGenerator = $tokenGenerator;
		$this->router = $router;
		
    }
	
	public static function getSubscribedEvents()
    {
        return array(
            UserBundleEvents::onRegistrationSuccess => 'onRegistrationSuccess',
        );
    }
	
	public function onRegistrationSuccess(FormEvent $event)
	{
		$user = $event->getForm()->getData();

        $user->setIsActive(false);
        if (null === $user->getConfirmationToken()) {
            $user->setConfirmationToken($this->tokenGenerator->generateToken());
        }

        $this->mailer->sendConfirmationEmailMessage($user);


        $url = $this->router->generate('musee_accueil');
        $event->setResponse(new RedirectResponse($url));
	}
}
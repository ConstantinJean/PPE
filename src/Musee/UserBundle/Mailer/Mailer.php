<?php



namespace Musee\UserBundle\Mailer;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Musee\UserBundle\Mailer\MailerInterface;


class Mailer implements MailerInterface
{
    protected $mailer;
    protected $router;
	protected $templating;
	
	public function __construct($mailer, RouterInterface $router, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
	}

  

    /**
* {@inheritdoc}
*/
    public function sendConfirmationEmailMessage(UserInterface $user)
    {
        $url = $this->router->generate('musee_confirm_inscription', array('token' => $user->getConfirmationToken()));
		$confirmationUrl = 'http://83.156.181.93'.$url;
        $rendered = $this->templating->render('MuseeUserBundle:User:activationEmail.html.twig', array(
            'user' => $user,
            'confirmationUrl' => $confirmationUrl
        ));
        $this->sendEmailMessage($rendered, $user->getEmail(), 'confirmation d\'inscription');
    }


    /**
* @param string $renderedTemplate
* @param string $fromEmail
* @param string $toEmail
*/
    protected function sendEmailMessage($body, $toEmail, $subject)
    {
        

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom('kustomkadiak@gmail.com')
            ->setTo($toEmail)
            ->setBody($body);

        $this->mailer->send($message);
    }
}
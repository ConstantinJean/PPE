<?php

namespace Musee\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MuseeUserBundle extends Bundle
{
    public function getParent()
	{
        return 'FOSUserBundle';
    }
}

<?php

namespace HB\ConnectBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HBConnectBundle extends Bundle
{
	public function getParent()
	{
		return ('FOSUserBundle');
	}
}

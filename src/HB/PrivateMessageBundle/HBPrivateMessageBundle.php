<?php

namespace HB\PrivateMessageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HBPrivateMessageBundle extends Bundle
{
	public function getParents()
	{
		return ('FOSMessageBundle');
	}
}

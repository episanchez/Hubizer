<?php

namespace HB\CommentBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class HBCommentBundle extends Bundle
{
	public function getParents()
	{
		return ('FOSCommentBundle');
	}
}

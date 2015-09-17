<?php
/**
 * @package     FOF
 * @copyright   2010-2015 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 */

namespace FOF30\Generator\Command\Generate\Layout;

use FOF30\Generator\Command\Command as Command;

class Layouts extends LayoutBase
{
	public function execute($composer, $input)
    {
		$this->createView($composer, $input, 'default');
		$this->createView($composer, $input, 'form');
		$this->createView($composer, $input, 'item');
	}
}
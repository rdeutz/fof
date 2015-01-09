<?php
/**
 * @package     FOF
 * @copyright   2010-2015 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 *
 * This file overrides certain core cURL functions inside the FOF30\Download\Adapter namespace. Because of the strange
 * way PHP handles calls to functions, the functions specified in this namespace override the core functions which are
 * implicitly defined in the global namespace. Therefore when the FOF30\Download\Adapter\Curl adapter calls, say,
 * curl_init PHP will execute FOF30\Download\Adapter\curl_init instead of the core, global curl_init function. This
 * allows us to mock libcurl for testing.
 */

namespace FOF30\Download\Adapter;

use FOF30\Tests\Helpers\Download\FakeFopen;

function file_get_contents($url, $flags = null, $context = null, $offset = null, $maxlen = null)
{
	return FakeFopen::file_get_contents($url, $flags, $context, $offset, $maxlen);
}
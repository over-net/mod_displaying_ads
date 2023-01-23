<?php
/**
 * @package         Joomla.Site
 * @subpackage      mod_displaying_ads
 *
 * @author          overnet
 *
 * @copyright   (C) 2005 Open Source Matters, Inc. <https://www.joomla.org>
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


use JRegistry;
use Joomla\Module\Advertising\Site\Helper\DisplayingAdsHelper;

/**
 * @var object $module
 * @var JRegistry $params
 */

try
{
	$model = new DisplayingAdsHelper([
		'module' => $module, 'params' => $params
	]);
}
catch (Exception $e)
{
}


require JModuleHelper::getLayoutPath('mod_displaying_ads', $params->get('layout', 'default'));

<?php
/**
 * @package         Joomla.Site
 * @subpackage      mod_displaying_ads
 *
 * @author          overnet
 *
 * @copyright   (C) 2006 Open Source Matters, Inc. <https://www.joomla.org>
 * @license         GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;

/**
 * @package
 *
 * @since       version
 */
final class mod_displaying_adsInstallerScript
{
	/**
	 * @var string
	 * @since
	 */
	private string $minimumJoomla;
	/**
	 * @var string
	 * @since
	 */
	private string $minimumPhp;


	/**
	 * @var string
	 * @since
	 */
	private string $currentJoomla;
	/**
	 * @var string
	 * @since
	 */
	private string $currentPhp;

	/**
	 * @since
	 */
	private const CONFIG = [
		'minimumJoomla' => '4.2.0',
		'minimumPhp'    => '7.4.0'
	];

	/**
	 * Extension script constructor.
	 *
	 * @since
	 */
	public function __construct()
	{
		$this->minimumJoomla = self::CONFIG['minimumJoomla'];
		$this->minimumPhp    = self::CONFIG['minimumPhp'];
		$this->currentJoomla = (new Joomla\CMS\Version)->getShortVersion();
		$this->currentPhp    = PHP_VERSION;
	}

	/**
	 * Method to install the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 * @since
	 */
	public function install(InstallerAdapter $parent): bool
	{
		echo Text::_('MOD_DISPLAYING_ADS_INSTALLER_SCRIPT_INSTALL');

		return true;
	}

	/**
	 * Method to uninstall the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since
	 */
	public function uninstall(InstallerAdapter $parent): bool
	{
		echo Text::_('MOD_DISPLAYING_ADS_INSTALLER_SCRIPT_UNINSTALL');

		return true;
	}

	/**
	 * Method to update the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 * @since
	 */
	public function update(InstallerAdapter $parent): bool
	{
		echo Text::_('MOD_DISPLAYING_ADS_INSTALLER_SCRIPT_UPDATE') . "<br/>";

		return true;
	}

	/**
	 * Function called before extension installation/update/removal procedure commences
	 *
	 * @param   string            $type    The type of change (install, update or discover_install, not uninstall)
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 * @since
	 */
	public function preflight(string $type, InstallerAdapter $parent): bool
	{
		// Check for the minimum PHP version before continuing
		if (!empty($this->minimumPhp) && version_compare(PHP_VERSION, $this->minimumPhp, '<'))
		{
			Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_PHP', $this->minimumPhp), Log::WARNING, 'jerror');

			return false;
		}

		// Check for the minimum Joomla version before continuing
		if (!empty($this->minimumJoomla) && version_compare(JVERSION, $this->minimumJoomla, '<'))
		{
			Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_JOOMLA', $this->minimumJoomla), Log::WARNING, 'jerror');

			return false;
		}

		echo Text::sprintf('MOD_DISPLAYING_ADS_INSTALLER_SCRIPT_PRE_FLIGHT', $this->minimumPhp, $this->currentPhp, $this->minimumJoomla, $this->currentJoomla) . "<br>";

		return true;
	}

	/**
	 * Function called after extension installation/update/removal procedure commences
	 *
	 * @param   string            $type    The type of change (install, update or discover_install, not uninstall)
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 * @since
	 */
	public function postflight(string $type, InstallerAdapter $parent): bool
	{
		echo Text::_('MOD_DISPLAYING_ADS_INSTALLER_SCRIPT_POST_FLIGHT');

		return true;
	}
}
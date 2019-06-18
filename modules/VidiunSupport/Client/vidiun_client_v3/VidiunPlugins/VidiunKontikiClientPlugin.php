<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Vidiun Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platfroms allow them to do with
// text.
//
// Copyright (C) 2006-2011  Vidiun Inc.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// @ignore
// ===================================================================================================

/**
 * @package Vidiun
 * @subpackage Client
 */
require_once(dirname(__FILE__) . "/../VidiunClientBase.php");
require_once(dirname(__FILE__) . "/../VidiunEnums.php");
require_once(dirname(__FILE__) . "/../VidiunTypes.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunKontikiStorageProfile extends VidiunStorageProfile
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $serviceToken = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunKontikiStorageDeleteJobData extends VidiunStorageDeleteJobData
{
	/**
	 * Unique Kontiki MOID for the content uploaded to Kontiki
	 *      
	 *
	 * @var string
	 */
	public $contentMoid = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serviceToken = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunKontikiStorageExportJobData extends VidiunStorageExportJobData
{
	/**
	 * Holds the id of the exported asset
	 * 	 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * Unique Kontiki MOID for the content uploaded to Kontiki
	 * 	 
	 *
	 * @var string
	 */
	public $contentMoid = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serviceToken = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunKontikiClientPlugin extends VidiunClientPlugin
{
	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
	}

	/**
	 * @return VidiunKontikiClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunKontikiClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'kontiki';
	}
}

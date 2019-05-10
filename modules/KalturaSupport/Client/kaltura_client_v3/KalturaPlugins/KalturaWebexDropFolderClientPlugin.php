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
require_once(dirname(__FILE__) . "/VidiunDropFolderClientPlugin.php");
require_once(dirname(__FILE__) . "/VidiunMetadataClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolderFileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const FILE_NAME_ASC = "+fileName";
	const FILE_SIZE_ASC = "+fileSize";
	const FILE_SIZE_LAST_SET_AT_ASC = "+fileSizeLastSetAt";
	const ID_ASC = "+id";
	const PARSED_FLAVOR_ASC = "+parsedFlavor";
	const PARSED_SLUG_ASC = "+parsedSlug";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const FILE_NAME_DESC = "-fileName";
	const FILE_SIZE_DESC = "-fileSize";
	const FILE_SIZE_LAST_SET_AT_DESC = "-fileSizeLastSetAt";
	const ID_DESC = "-id";
	const PARSED_FLAVOR_DESC = "-parsedFlavor";
	const PARSED_SLUG_DESC = "-parsedSlug";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolderOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const NAME_ASC = "+name";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
	const NAME_DESC = "-name";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolder extends VidiunDropFolder
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $webexUserId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $webexPassword = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $webexSiteId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $webexPartnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $webexServiceUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $webexHostIdMetadataFieldName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesMetadataFieldName = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $enforceEntitlement = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolderFile extends VidiunDropFolderFile
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $recordingId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $webexHostId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $confId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $contentUrl = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolderContentProcessorJobData extends VidiunDropFolderContentProcessorJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $webexHostId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $dropFolderId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunWebexDropFolderBaseFilter extends VidiunDropFolderFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunWebexDropFolderFileBaseFilter extends VidiunDropFolderFileFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolderFileFilter extends VidiunWebexDropFolderFileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolderFilter extends VidiunWebexDropFolderBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebexDropFolderClientPlugin extends VidiunClientPlugin
{
	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
	}

	/**
	 * @return VidiunWebexDropFolderClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunWebexDropFolderClientPlugin($client);
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
		return 'WebexDropFolder';
	}
}


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
class VidiunFileSyncStatus
{
	const ERROR = -1;
	const PENDING = 1;
	const READY = 2;
	const DELETED = 3;
	const PURGED = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileSyncType
{
	const FILE = 1;
	const LINK = 2;
	const URL = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileSyncOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const FILE_SIZE_ASC = "+fileSize";
	const READY_AT_ASC = "+readyAt";
	const SYNC_TIME_ASC = "+syncTime";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const FILE_SIZE_DESC = "-fileSize";
	const READY_AT_DESC = "-readyAt";
	const SYNC_TIME_DESC = "-syncTime";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunFileSyncBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunFileSyncObjectType
	 */
	public $fileObjectTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileObjectTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $objectIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $objectIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $versionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $versionIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $objectSubTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $objectSubTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $dcEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $dcIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $originalEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $readyAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $readyAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $syncTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $syncTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var VidiunFileSyncStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * 
	 *
	 * @var VidiunFileSyncType
	 */
	public $fileTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileTypeIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $linkedIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $linkCountGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $linkCountLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $fileSizeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $fileSizeLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileSyncFilter extends VidiunFileSyncBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileSyncClientPlugin extends VidiunClientPlugin
{
	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
	}

	/**
	 * @return VidiunFileSyncClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunFileSyncClientPlugin($client);
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
		return 'fileSync';
	}
}

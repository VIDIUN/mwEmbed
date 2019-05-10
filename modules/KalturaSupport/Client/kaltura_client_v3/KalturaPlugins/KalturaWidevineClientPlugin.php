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
require_once(dirname(__FILE__) . "/VidiunDrmClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineRepositorySyncMode
{
	const MODIFY = 0;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorAssetOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DELETED_AT_ASC = "+deletedAt";
	const SIZE_ASC = "+size";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DELETED_AT_DESC = "-deletedAt";
	const SIZE_DESC = "-size";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineProfileOrderBy
{
	const ID_ASC = "+id";
	const NAME_ASC = "+name";
	const ID_DESC = "-id";
	const NAME_DESC = "-name";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineProfile extends VidiunDrmProfile
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $iv = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $owner = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $portal = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxGop = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $regServerHost = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineRepositorySyncJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var VidiunWidevineRepositorySyncMode
	 */
	public $syncMode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $wvAssetIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $modifiedAttributes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $monitorSyncCompletion = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorAsset extends VidiunFlavorAsset
{
	/**
	 * License distribution window start date 
	 * 	 
	 *
	 * @var int
	 */
	public $widevineDistributionStartDate = null;

	/**
	 * License distribution window end date
	 * 	 
	 *
	 * @var int
	 */
	public $widevineDistributionEndDate = null;

	/**
	 * Widevine unique asset id
	 * 	 
	 *
	 * @var int
	 */
	public $widevineAssetId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorParams extends VidiunFlavorParams
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorParamsOutput extends VidiunFlavorParamsOutput
{
	/**
	 * License distribution window start date 
	 * 	 
	 *
	 * @var int
	 */
	public $widevineDistributionStartDate = null;

	/**
	 * License distribution window end date
	 * 	 
	 *
	 * @var int
	 */
	public $widevineDistributionEndDate = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunWidevineProfileBaseFilter extends VidiunDrmProfileFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineProfileFilter extends VidiunWidevineProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunWidevineFlavorAssetBaseFilter extends VidiunFlavorAssetFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunWidevineFlavorParamsBaseFilter extends VidiunFlavorParamsFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorAssetFilter extends VidiunWidevineFlavorAssetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorParamsFilter extends VidiunWidevineFlavorParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunWidevineFlavorParamsOutputBaseFilter extends VidiunFlavorParamsOutputFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineFlavorParamsOutputFilter extends VidiunWidevineFlavorParamsOutputBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineDrmService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get license for encrypted content playback
	 * 
	 * @param string $flavorAssetId 
	 * @param string $referrer 64base encoded
	 * @return string
	 */
	function getLicense($flavorAssetId, $referrer = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "flavorAssetId", $flavorAssetId);
		$this->client->addParam($vparams, "referrer", $referrer);
		$this->client->queueServiceActionCall("widevine_widevinedrm", "getLicense", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidevineClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunWidevineDrmService
	 */
	public $widevineDrm = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->widevineDrm = new VidiunWidevineDrmService($client);
	}

	/**
	 * @return VidiunWidevineClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunWidevineClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'widevineDrm' => $this->widevineDrm,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'widevine';
	}
}


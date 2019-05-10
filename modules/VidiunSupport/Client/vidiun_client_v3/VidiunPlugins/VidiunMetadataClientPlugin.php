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
class VidiunMetadataProfileCreateMode
{
	const API = 1;
	const VMC = 2;
	const APP = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfileStatus
{
	const ACTIVE = 1;
	const DEPRECATED = 2;
	const TRANSFORMING = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataStatus
{
	const VALID = 1;
	const INVALID = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileAssetOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataObjectType
{
	const AD_CUE_POINT = "adCuePointMetadata.AdCuePoint";
	const ANNOTATION = "annotationMetadata.Annotation";
	const CODE_CUE_POINT = "codeCuePointMetadata.CodeCuePoint";
	const ENTRY = "1";
	const CATEGORY = "2";
	const USER = "3";
	const PARTNER = "4";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const METADATA_PROFILE_VERSION_ASC = "+metadataProfileVersion";
	const UPDATED_AT_ASC = "+updatedAt";
	const VERSION_ASC = "+version";
	const CREATED_AT_DESC = "-createdAt";
	const METADATA_PROFILE_VERSION_DESC = "-metadataProfileVersion";
	const UPDATED_AT_DESC = "-updatedAt";
	const VERSION_DESC = "-version";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadata extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $metadataProfileId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $metadataProfileVersion = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataObjectType
	 * @readonly
	 */
	public $metadataObjectType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $objectId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $xml = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunMetadata
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfile extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataObjectType
	 */
	public $metadataObjectType = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataProfileStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $xsd = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $views = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $xslt = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataProfileCreateMode
	 */
	public $createMode = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfileField extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $xPath = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $key = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $label = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfileFieldListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunMetadataProfileField
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunMetadataProfile
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunFileAssetBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunFileAssetObjectType
	 */
	public $fileAssetObjectTypeEqual = null;

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
	 * @var VidiunFileAssetStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImportMetadataJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileLocalPath = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $metadataId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMetadataBaseFilter extends VidiunFilter
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
	 * @var int
	 */
	public $metadataProfileIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $metadataProfileVersionEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $metadataProfileVersionGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $metadataProfileVersionLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataObjectType
	 */
	public $metadataObjectTypeEqual = null;

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
	 * @var int
	 */
	public $versionEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $versionGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $versionLessThanOrEqual = null;

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
	 * @var VidiunMetadataStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMetadataProfileBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataObjectType
	 */
	public $metadataObjectTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $metadataObjectTypeIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $versionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemNameIn = null;

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
	 * @var VidiunMetadataProfileStatus
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
	 * @var VidiunMetadataProfileCreateMode
	 */
	public $createModeEqual = null;

	/**
	 * 
	 *
	 * @var VidiunMetadataProfileCreateMode
	 */
	public $createModeNotEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $createModeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $createModeNotIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTransformMetadataJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $srcXslPath = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $srcVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $destVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destXsdPath = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $metadataProfileId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCompareMetadataCondition extends VidiunCompareCondition
{
	/**
	 * May contain the full xpath to the field in three formats
	 * 	 1. Slashed xPath, e.g. /metadata/myElementName
	 * 	 2. Using local-name function, e.g. /[local-name()='metadata']/[local-name()='myElementName']
	 * 	 3. Using only the field name, e.g. myElementName, it will be searched as //myElementName
	 * 	 
	 *
	 * @var string
	 */
	public $xPath = null;

	/**
	 * Metadata profile id
	 * 	 
	 *
	 * @var int
	 */
	public $profileId = null;

	/**
	 * Metadata profile system name
	 * 	 
	 *
	 * @var string
	 */
	public $profileSystemName = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileAssetFilter extends VidiunFileAssetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMatchMetadataCondition extends VidiunMatchCondition
{
	/**
	 * May contain the full xpath to the field in three formats
	 * 	 1. Slashed xPath, e.g. /metadata/myElementName
	 * 	 2. Using local-name function, e.g. /[local-name()='metadata']/[local-name()='myElementName']
	 * 	 3. Using only the field name, e.g. myElementName, it will be searched as //myElementName
	 * 	 
	 *
	 * @var string
	 */
	public $xPath = null;

	/**
	 * Metadata profile id
	 * 	 
	 *
	 * @var int
	 */
	public $profileId = null;

	/**
	 * Metadata profile system name
	 * 	 
	 *
	 * @var string
	 */
	public $profileSystemName = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataFieldChangedCondition extends VidiunMatchCondition
{
	/**
	 * May contain the full xpath to the field in three formats
	 * 	 1. Slashed xPath, e.g. /metadata/myElementName
	 * 	 2. Using local-name function, e.g. /[local-name()='metadata']/[local-name()='myElementName']
	 * 	 3. Using only the field name, e.g. myElementName, it will be searched as //myElementName
	 * 	 
	 *
	 * @var string
	 */
	public $xPath = null;

	/**
	 * Metadata profile id
	 * 	 
	 *
	 * @var int
	 */
	public $profileId = null;

	/**
	 * Metadata profile system name
	 * 	 
	 *
	 * @var string
	 */
	public $profileSystemName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $versionA = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $versionB = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataFilter extends VidiunMetadataBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfileFilter extends VidiunMetadataProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataSearchItem extends VidiunSearchOperator
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $metadataProfileId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $orderBy = null;


}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Allows you to add a metadata object and metadata content associated with Vidiun object
	 * 
	 * @param int $metadataProfileId 
	 * @param string $objectType 
	 * @param string $objectId 
	 * @param string $xmlData XML metadata
	 * @return VidiunMetadata
	 */
	function add($metadataProfileId, $objectType, $objectId, $xmlData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($vparams, "objectType", $objectType);
		$this->client->addParam($vparams, "objectId", $objectId);
		$this->client->addParam($vparams, "xmlData", $xmlData);
		$this->client->queueServiceActionCall("metadata_metadata", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}

	/**
	 * Allows you to add a metadata object and metadata file associated with Vidiun object
	 * 
	 * @param int $metadataProfileId 
	 * @param string $objectType 
	 * @param string $objectId 
	 * @param file $xmlFile XML metadata
	 * @return VidiunMetadata
	 */
	function addFromFile($metadataProfileId, $objectType, $objectId, $xmlFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($vparams, "objectType", $objectType);
		$this->client->addParam($vparams, "objectId", $objectId);
		$vfiles = array();
		$this->client->addParam($vfiles, "xmlFile", $xmlFile);
		$this->client->queueServiceActionCall("metadata_metadata", "addFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}

	/**
	 * Allows you to add a metadata xml data from remote URL
	 * 
	 * @param int $metadataProfileId 
	 * @param string $objectType 
	 * @param string $objectId 
	 * @param string $url XML metadata remote url
	 * @return VidiunMetadata
	 */
	function addFromUrl($metadataProfileId, $objectType, $objectId, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($vparams, "objectType", $objectType);
		$this->client->addParam($vparams, "objectId", $objectId);
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("metadata_metadata", "addFromUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}

	/**
	 * Allows you to add a metadata xml data from remote URL.
	 Enables different permissions than addFromUrl action.
	 * 
	 * @param int $metadataProfileId 
	 * @param string $objectType 
	 * @param string $objectId 
	 * @param string $url XML metadata remote url
	 * @return VidiunMetadata
	 */
	function addFromBulk($metadataProfileId, $objectType, $objectId, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "metadataProfileId", $metadataProfileId);
		$this->client->addParam($vparams, "objectType", $objectType);
		$this->client->addParam($vparams, "objectId", $objectId);
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("metadata_metadata", "addFromBulk", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}

	/**
	 * Retrieve a metadata object by id
	 * 
	 * @param int $id 
	 * @return VidiunMetadata
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("metadata_metadata", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}

	/**
	 * Update an existing metadata object with new XML content
	 * 
	 * @param int $id 
	 * @param string $xmlData XML metadata
	 * @param int $version Enable update only if the metadata object version did not change by other process
	 * @return VidiunMetadata
	 */
	function update($id, $xmlData = null, $version = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "xmlData", $xmlData);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("metadata_metadata", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}

	/**
	 * Update an existing metadata object with new XML file
	 * 
	 * @param int $id 
	 * @param file $xmlFile XML metadata
	 * @return VidiunMetadata
	 */
	function updateFromFile($id, $xmlFile = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "xmlFile", $xmlFile);
		$this->client->queueServiceActionCall("metadata_metadata", "updateFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}

	/**
	 * List metadata objects by filter and pager
	 * 
	 * @param VidiunMetadataFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunMetadataListResponse
	 */
	function listAction(VidiunMetadataFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("metadata_metadata", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataListResponse");
		return $resultObject;
	}

	/**
	 * Delete an existing metadata
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("metadata_metadata", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Mark existing metadata as invalid
	 Used by batch metadata transform
	 * 
	 * @param int $id 
	 * @param int $version Enable update only if the metadata object version did not change by other process
	 * @return 
	 */
	function invalidate($id, $version = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("metadata_metadata", "invalidate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Serves metadata XML file
	 * 
	 * @param int $id 
	 * @return file
	 */
	function serve($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("metadata_metadata", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Action transforms current metadata object XML using a provided XSL.
	 * 
	 * @param int $id 
	 * @param file $xslFile 
	 * @return VidiunMetadata
	 */
	function updateFromXSL($id, $xslFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "xslFile", $xslFile);
		$this->client->queueServiceActionCall("metadata_metadata", "updateFromXSL", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadata");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Allows you to add a metadata profile object and metadata profile content associated with Vidiun object type
	 * 
	 * @param VidiunMetadataProfile $metadataProfile 
	 * @param string $xsdData XSD metadata definition
	 * @param string $viewsData UI views definition
	 * @return VidiunMetadataProfile
	 */
	function add(VidiunMetadataProfile $metadataProfile, $xsdData, $viewsData = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "metadataProfile", $metadataProfile->toParams());
		$this->client->addParam($vparams, "xsdData", $xsdData);
		$this->client->addParam($vparams, "viewsData", $viewsData);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * Allows you to add a metadata profile object and metadata profile file associated with Vidiun object type
	 * 
	 * @param VidiunMetadataProfile $metadataProfile 
	 * @param file $xsdFile XSD metadata definition
	 * @param file $viewsFile UI views definition
	 * @return VidiunMetadataProfile
	 */
	function addFromFile(VidiunMetadataProfile $metadataProfile, $xsdFile, $viewsFile = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "metadataProfile", $metadataProfile->toParams());
		$vfiles = array();
		$this->client->addParam($vfiles, "xsdFile", $xsdFile);
		$this->client->addParam($vfiles, "viewsFile", $viewsFile);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "addFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * Retrieve a metadata profile object by id
	 * 
	 * @param int $id 
	 * @return VidiunMetadataProfile
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * Update an existing metadata object
	 * 
	 * @param int $id 
	 * @param VidiunMetadataProfile $metadataProfile 
	 * @param string $xsdData XSD metadata definition
	 * @param string $viewsData UI views definition
	 * @return VidiunMetadataProfile
	 */
	function update($id, VidiunMetadataProfile $metadataProfile, $xsdData = null, $viewsData = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "metadataProfile", $metadataProfile->toParams());
		$this->client->addParam($vparams, "xsdData", $xsdData);
		$this->client->addParam($vparams, "viewsData", $viewsData);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * List metadata profile objects by filter and pager
	 * 
	 * @param VidiunMetadataProfileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunMetadataProfileListResponse
	 */
	function listAction(VidiunMetadataProfileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("metadata_metadataprofile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfileListResponse");
		return $resultObject;
	}

	/**
	 * List metadata profile fields by metadata profile id
	 * 
	 * @param int $metadataProfileId 
	 * @return VidiunMetadataProfileFieldListResponse
	 */
	function listFields($metadataProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "metadataProfileId", $metadataProfileId);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "listFields", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfileFieldListResponse");
		return $resultObject;
	}

	/**
	 * Delete an existing metadata profile
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Update an existing metadata object definition file
	 * 
	 * @param int $id 
	 * @param int $toVersion 
	 * @return VidiunMetadataProfile
	 */
	function revert($id, $toVersion)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "toVersion", $toVersion);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "revert", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * Update an existing metadata object definition file
	 * 
	 * @param int $id 
	 * @param file $xsdFile XSD metadata definition
	 * @return VidiunMetadataProfile
	 */
	function updateDefinitionFromFile($id, $xsdFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "xsdFile", $xsdFile);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "updateDefinitionFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * Update an existing metadata object views file
	 * 
	 * @param int $id 
	 * @param file $viewsFile UI views file
	 * @return VidiunMetadataProfile
	 */
	function updateViewsFromFile($id, $viewsFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "viewsFile", $viewsFile);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "updateViewsFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * Update an existing metadata object xslt file
	 * 
	 * @param int $id 
	 * @param file $xsltFile XSLT file, will be executed on every metadata add/update
	 * @return VidiunMetadataProfile
	 */
	function updateTransformationFromFile($id, $xsltFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "xsltFile", $xsltFile);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "updateTransformationFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMetadataProfile");
		return $resultObject;
	}

	/**
	 * Serves metadata profile XSD file
	 * 
	 * @param int $id 
	 * @return file
	 */
	function serve($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Serves metadata profile view file
	 * 
	 * @param int $id 
	 * @return file
	 */
	function serveView($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("metadata_metadataprofile", "serveView", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMetadataClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunMetadataService
	 */
	public $metadata = null;

	/**
	 * @var VidiunMetadataProfileService
	 */
	public $metadataProfile = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->metadata = new VidiunMetadataService($client);
		$this->metadataProfile = new VidiunMetadataProfileService($client);
	}

	/**
	 * @return VidiunMetadataClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunMetadataClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'metadata' => $this->metadata,
			'metadataProfile' => $this->metadataProfile,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'metadata';
	}
}


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
class VidiunCaptionAssetStatus
{
	const ERROR = -1;
	const QUEUED = 0;
	const READY = 2;
	const DELETED = 3;
	const IMPORTING = 7;
	const EXPORTING = 9;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAssetOrderBy
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
class VidiunCaptionParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionType
{
	const SRT = "1";
	const DFXP = "2";
	const WEBVTT = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAsset extends VidiunAsset
{
	/**
	 * The Caption Params used to create this Caption Asset
	 * 	 
	 *
	 * @var int
	 * @insertonly
	 */
	public $captionParamsId = null;

	/**
	 * The language of the caption asset content
	 * 	 
	 *
	 * @var VidiunLanguage
	 */
	public $language = null;

	/**
	 * The language of the caption asset content
	 * 	 
	 *
	 * @var VidiunLanguageCode
	 * @readonly
	 */
	public $languageCode = null;

	/**
	 * Is default caption asset of the entry
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isDefault = null;

	/**
	 * Friendly label
	 * 	 
	 *
	 * @var string
	 */
	public $label = null;

	/**
	 * The caption format
	 * 	 
	 *
	 * @var VidiunCaptionType
	 * @insertonly
	 */
	public $format = null;

	/**
	 * The status of the asset
	 * 	 
	 *
	 * @var VidiunCaptionAssetStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAssetListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunCaptionAsset
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
class VidiunCaptionParams extends VidiunAssetParams
{
	/**
	 * The language of the caption content
	 * 	 
	 *
	 * @var VidiunLanguage
	 * @insertonly
	 */
	public $language = null;

	/**
	 * Is default caption asset of the entry
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isDefault = null;

	/**
	 * Friendly label
	 * 	 
	 *
	 * @var string
	 */
	public $label = null;

	/**
	 * The caption format
	 * 	 
	 *
	 * @var VidiunCaptionType
	 * @insertonly
	 */
	public $format = null;

	/**
	 * Id of the caption params or the flavor params to be used as source for the caption creation
	 * 	 
	 *
	 * @var int
	 */
	public $sourceParamsId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionParamsListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunCaptionParams
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
abstract class VidiunCaptionAssetBaseFilter extends VidiunAssetFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $captionParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $captionParamsIdIn = null;

	/**
	 * 
	 *
	 * @var VidiunCaptionType
	 */
	public $formatEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $formatIn = null;

	/**
	 * 
	 *
	 * @var VidiunCaptionAssetStatus
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
	 * @var string
	 */
	public $statusNotIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunCaptionParamsBaseFilter extends VidiunAssetParamsFilter
{
	/**
	 * 
	 *
	 * @var VidiunCaptionType
	 */
	public $formatEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $formatIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAssetFilter extends VidiunCaptionAssetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionParamsFilter extends VidiunCaptionParamsBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAssetService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add caption asset
	 * 
	 * @param string $entryId 
	 * @param VidiunCaptionAsset $captionAsset 
	 * @return VidiunCaptionAsset
	 */
	function add($entryId, VidiunCaptionAsset $captionAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "captionAsset", $captionAsset->toParams());
		$this->client->queueServiceActionCall("caption_captionasset", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionAsset");
		return $resultObject;
	}

	/**
	 * Update content of caption asset
	 * 
	 * @param string $id 
	 * @param VidiunContentResource $contentResource 
	 * @return VidiunCaptionAsset
	 */
	function setContent($id, VidiunContentResource $contentResource)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "contentResource", $contentResource->toParams());
		$this->client->queueServiceActionCall("caption_captionasset", "setContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionAsset");
		return $resultObject;
	}

	/**
	 * Update caption asset
	 * 
	 * @param string $id 
	 * @param VidiunCaptionAsset $captionAsset 
	 * @return VidiunCaptionAsset
	 */
	function update($id, VidiunCaptionAsset $captionAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "captionAsset", $captionAsset->toParams());
		$this->client->queueServiceActionCall("caption_captionasset", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionAsset");
		return $resultObject;
	}

	/**
	 * Serves caption by entry id and thumnail params id
	 * 
	 * @param string $entryId 
	 * @param int $captionParamId If not set, default caption will be used.
	 * @return file
	 */
	function serveByEntryId($entryId, $captionParamId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "captionParamId", $captionParamId);
		$this->client->queueServiceActionCall("caption_captionasset", "serveByEntryId", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Get download URL for the asset
	 * 
	 * @param string $id 
	 * @param int $storageId 
	 * @return string
	 */
	function getUrl($id, $storageId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "storageId", $storageId);
		$this->client->queueServiceActionCall("caption_captionasset", "getUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Get remote storage existing paths for the asset
	 * 
	 * @param string $id 
	 * @return VidiunRemotePathListResponse
	 */
	function getRemotePaths($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("caption_captionasset", "getRemotePaths", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunRemotePathListResponse");
		return $resultObject;
	}

	/**
	 * Serves caption by its id
	 * 
	 * @param string $captionAssetId 
	 * @return file
	 */
	function serve($captionAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "captionAssetId", $captionAssetId);
		$this->client->queueServiceActionCall("caption_captionasset", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Serves caption by its id converting it to segmented WebVTT
	 * 
	 * @param string $captionAssetId 
	 * @param int $segmentDuration 
	 * @param int $segmentIndex 
	 * @param int $localTimestamp 
	 * @return file
	 */
	function serveWebVTT($captionAssetId, $segmentDuration = 30, $segmentIndex = null, $localTimestamp = 10000)
	{
		$vparams = array();
		$this->client->addParam($vparams, "captionAssetId", $captionAssetId);
		$this->client->addParam($vparams, "segmentDuration", $segmentDuration);
		$this->client->addParam($vparams, "segmentIndex", $segmentIndex);
		$this->client->addParam($vparams, "localTimestamp", $localTimestamp);
		$this->client->queueServiceActionCall("caption_captionasset", "serveWebVTT", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Markss the caption as default and removes that mark from all other caption assets of the entry.
	 * 
	 * @param string $captionAssetId 
	 * @return 
	 */
	function setAsDefault($captionAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "captionAssetId", $captionAssetId);
		$this->client->queueServiceActionCall("caption_captionasset", "setAsDefault", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $captionAssetId 
	 * @return VidiunCaptionAsset
	 */
	function get($captionAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "captionAssetId", $captionAssetId);
		$this->client->queueServiceActionCall("caption_captionasset", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionAsset");
		return $resultObject;
	}

	/**
	 * List caption Assets by filter and pager
	 * 
	 * @param VidiunAssetFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunCaptionAssetListResponse
	 */
	function listAction(VidiunAssetFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("caption_captionasset", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionAssetListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $captionAssetId 
	 * @return 
	 */
	function delete($captionAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "captionAssetId", $captionAssetId);
		$this->client->queueServiceActionCall("caption_captionasset", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionParamsService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Caption Params
	 * 
	 * @param VidiunCaptionParams $captionParams 
	 * @return VidiunCaptionParams
	 */
	function add(VidiunCaptionParams $captionParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "captionParams", $captionParams->toParams());
		$this->client->queueServiceActionCall("caption_captionparams", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionParams");
		return $resultObject;
	}

	/**
	 * Get Caption Params by ID
	 * 
	 * @param int $id 
	 * @return VidiunCaptionParams
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("caption_captionparams", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionParams");
		return $resultObject;
	}

	/**
	 * Update Caption Params by ID
	 * 
	 * @param int $id 
	 * @param VidiunCaptionParams $captionParams 
	 * @return VidiunCaptionParams
	 */
	function update($id, VidiunCaptionParams $captionParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "captionParams", $captionParams->toParams());
		$this->client->queueServiceActionCall("caption_captionparams", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionParams");
		return $resultObject;
	}

	/**
	 * Delete Caption Params by ID
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("caption_captionparams", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List Caption Params by filter with paging support (By default - all system default params will be listed too)
	 * 
	 * @param VidiunCaptionParamsFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunCaptionParamsListResponse
	 */
	function listAction(VidiunCaptionParamsFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("caption_captionparams", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionParamsListResponse");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunCaptionAssetService
	 */
	public $captionAsset = null;

	/**
	 * @var VidiunCaptionParamsService
	 */
	public $captionParams = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->captionAsset = new VidiunCaptionAssetService($client);
		$this->captionParams = new VidiunCaptionParamsService($client);
	}

	/**
	 * @return VidiunCaptionClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunCaptionClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'captionAsset' => $this->captionAsset,
			'captionParams' => $this->captionParams,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'caption';
	}
}


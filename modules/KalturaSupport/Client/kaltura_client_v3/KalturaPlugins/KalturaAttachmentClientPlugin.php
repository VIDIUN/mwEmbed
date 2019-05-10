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
class VidiunAttachmentAssetStatus
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
class VidiunAttachmentAssetOrderBy
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
class VidiunAttachmentType
{
	const TEXT = "1";
	const MEDIA = "2";
	const DOCUMENT = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAttachmentAsset extends VidiunAsset
{
	/**
	 * The filename of the attachment asset content
	 * 	 
	 *
	 * @var string
	 */
	public $filename = null;

	/**
	 * Attachment asset title
	 * 	 
	 *
	 * @var string
	 */
	public $title = null;

	/**
	 * The attachment format
	 * 	 
	 *
	 * @var VidiunAttachmentType
	 */
	public $format = null;

	/**
	 * The status of the asset
	 * 	 
	 *
	 * @var VidiunAttachmentAssetStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAttachmentAssetListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunAttachmentAsset
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
abstract class VidiunAttachmentAssetBaseFilter extends VidiunAssetFilter
{
	/**
	 * 
	 *
	 * @var VidiunAttachmentType
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
	 * @var VidiunAttachmentAssetStatus
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
class VidiunAttachmentAssetFilter extends VidiunAttachmentAssetBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAttachmentAssetService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add attachment asset
	 * 
	 * @param string $entryId 
	 * @param VidiunAttachmentAsset $attachmentAsset 
	 * @return VidiunAttachmentAsset
	 */
	function add($entryId, VidiunAttachmentAsset $attachmentAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "attachmentAsset", $attachmentAsset->toParams());
		$this->client->queueServiceActionCall("attachment_attachmentasset", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAttachmentAsset");
		return $resultObject;
	}

	/**
	 * Update content of attachment asset
	 * 
	 * @param string $id 
	 * @param VidiunContentResource $contentResource 
	 * @return VidiunAttachmentAsset
	 */
	function setContent($id, VidiunContentResource $contentResource)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "contentResource", $contentResource->toParams());
		$this->client->queueServiceActionCall("attachment_attachmentasset", "setContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAttachmentAsset");
		return $resultObject;
	}

	/**
	 * Update attachment asset
	 * 
	 * @param string $id 
	 * @param VidiunAttachmentAsset $attachmentAsset 
	 * @return VidiunAttachmentAsset
	 */
	function update($id, VidiunAttachmentAsset $attachmentAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "attachmentAsset", $attachmentAsset->toParams());
		$this->client->queueServiceActionCall("attachment_attachmentasset", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAttachmentAsset");
		return $resultObject;
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
		$this->client->queueServiceActionCall("attachment_attachmentasset", "getUrl", $vparams);
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
		$this->client->queueServiceActionCall("attachment_attachmentasset", "getRemotePaths", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunRemotePathListResponse");
		return $resultObject;
	}

	/**
	 * Serves attachment by its id
	 * 
	 * @param string $attachmentAssetId 
	 * @return file
	 */
	function serve($attachmentAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "attachmentAssetId", $attachmentAssetId);
		$this->client->queueServiceActionCall("attachment_attachmentasset", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * 
	 * 
	 * @param string $attachmentAssetId 
	 * @return VidiunAttachmentAsset
	 */
	function get($attachmentAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "attachmentAssetId", $attachmentAssetId);
		$this->client->queueServiceActionCall("attachment_attachmentasset", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAttachmentAsset");
		return $resultObject;
	}

	/**
	 * List attachment Assets by filter and pager
	 * 
	 * @param VidiunAssetFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunAttachmentAssetListResponse
	 */
	function listAction(VidiunAssetFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("attachment_attachmentasset", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAttachmentAssetListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $attachmentAssetId 
	 * @return 
	 */
	function delete($attachmentAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "attachmentAssetId", $attachmentAssetId);
		$this->client->queueServiceActionCall("attachment_attachmentasset", "delete", $vparams);
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
class VidiunAttachmentClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunAttachmentAssetService
	 */
	public $attachmentAsset = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->attachmentAsset = new VidiunAttachmentAssetService($client);
	}

	/**
	 * @return VidiunAttachmentClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunAttachmentClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'attachmentAsset' => $this->attachmentAsset,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'attachment';
	}
}


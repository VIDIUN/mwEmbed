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
class VidiunDocumentType
{
	const DOCUMENT = 11;
	const SWF = 12;
	const PDF = 13;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentEntryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const END_DATE_ASC = "+endDate";
	const MODERATION_COUNT_ASC = "+moderationCount";
	const NAME_ASC = "+name";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const RANK_ASC = "+rank";
	const RECENT_ASC = "+recent";
	const START_DATE_ASC = "+startDate";
	const TOTAL_RANK_ASC = "+totalRank";
	const UPDATED_AT_ASC = "+updatedAt";
	const WEIGHT_ASC = "+weight";
	const CREATED_AT_DESC = "-createdAt";
	const END_DATE_DESC = "-endDate";
	const MODERATION_COUNT_DESC = "-moderationCount";
	const NAME_DESC = "-name";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const RANK_DESC = "-rank";
	const RECENT_DESC = "-recent";
	const START_DATE_DESC = "-startDate";
	const TOTAL_RANK_DESC = "-totalRank";
	const UPDATED_AT_DESC = "-updatedAt";
	const WEIGHT_DESC = "-weight";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentFlavorParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentFlavorParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImageFlavorParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImageFlavorParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPdfFlavorParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPdfFlavorParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSwfFlavorParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSwfFlavorParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentEntry extends VidiunBaseEntry
{
	/**
	 * The type of the document
	 * 	 
	 *
	 * @var VidiunDocumentType
	 * @insertonly
	 */
	public $documentType = null;

	/**
	 * Comma separated asset params ids that exists for this media entry
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $assetParamsIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunDocumentEntry
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
class VidiunDocumentFlavorParams extends VidiunFlavorParams
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImageFlavorParams extends VidiunFlavorParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $densityWidth = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $densityHeight = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sizeWidth = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sizeHeight = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $depth = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPdfFlavorParams extends VidiunFlavorParams
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $readonly = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSwfFlavorParams extends VidiunFlavorParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $flashVersion = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $poly2Bitmap = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDocumentEntryBaseFilter extends VidiunBaseEntryFilter
{
	/**
	 * 
	 *
	 * @var VidiunDocumentType
	 */
	public $documentTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $documentTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetParamsIdsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetParamsIdsMatchAnd = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentFlavorParamsOutput extends VidiunFlavorParamsOutput
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImageFlavorParamsOutput extends VidiunFlavorParamsOutput
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $densityWidth = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $densityHeight = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sizeWidth = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sizeHeight = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $depth = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPdfFlavorParamsOutput extends VidiunFlavorParamsOutput
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $readonly = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSwfFlavorParamsOutput extends VidiunFlavorParamsOutput
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $flashVersion = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $poly2Bitmap = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentEntryFilter extends VidiunDocumentEntryBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDocumentFlavorParamsBaseFilter extends VidiunFlavorParamsFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunImageFlavorParamsBaseFilter extends VidiunFlavorParamsFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPdfFlavorParamsBaseFilter extends VidiunFlavorParamsFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunSwfFlavorParamsBaseFilter extends VidiunFlavorParamsFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentFlavorParamsFilter extends VidiunDocumentFlavorParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImageFlavorParamsFilter extends VidiunImageFlavorParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPdfFlavorParamsFilter extends VidiunPdfFlavorParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSwfFlavorParamsFilter extends VidiunSwfFlavorParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDocumentFlavorParamsOutputBaseFilter extends VidiunFlavorParamsOutputFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunImageFlavorParamsOutputBaseFilter extends VidiunFlavorParamsOutputFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPdfFlavorParamsOutputBaseFilter extends VidiunFlavorParamsOutputFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunSwfFlavorParamsOutputBaseFilter extends VidiunFlavorParamsOutputFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentFlavorParamsOutputFilter extends VidiunDocumentFlavorParamsOutputBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImageFlavorParamsOutputFilter extends VidiunImageFlavorParamsOutputBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPdfFlavorParamsOutputFilter extends VidiunPdfFlavorParamsOutputBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSwfFlavorParamsOutputFilter extends VidiunSwfFlavorParamsOutputBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentsService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new document entry after the specific document file was uploaded and the upload token id exists
	 * 
	 * @param VidiunDocumentEntry $documentEntry Document entry metadata
	 * @param string $uploadTokenId Upload token id
	 * @return VidiunDocumentEntry
	 */
	function addFromUploadedFile(VidiunDocumentEntry $documentEntry, $uploadTokenId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "documentEntry", $documentEntry->toParams());
		$this->client->addParam($vparams, "uploadTokenId", $uploadTokenId);
		$this->client->queueServiceActionCall("document_documents", "addFromUploadedFile", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}

	/**
	 * Copy entry into new entry
	 * 
	 * @param string $sourceEntryId Document entry id to copy from
	 * @param VidiunDocumentEntry $documentEntry Document entry metadata
	 * @param int $sourceFlavorParamsId The flavor to be used as the new entry source, source flavor will be used if not specified
	 * @return VidiunDocumentEntry
	 */
	function addFromEntry($sourceEntryId, VidiunDocumentEntry $documentEntry = null, $sourceFlavorParamsId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "sourceEntryId", $sourceEntryId);
		if ($documentEntry !== null)
			$this->client->addParam($vparams, "documentEntry", $documentEntry->toParams());
		$this->client->addParam($vparams, "sourceFlavorParamsId", $sourceFlavorParamsId);
		$this->client->queueServiceActionCall("document_documents", "addFromEntry", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}

	/**
	 * Copy flavor asset into new entry
	 * 
	 * @param string $sourceFlavorAssetId Flavor asset id to be used as the new entry source
	 * @param VidiunDocumentEntry $documentEntry Document entry metadata
	 * @return VidiunDocumentEntry
	 */
	function addFromFlavorAsset($sourceFlavorAssetId, VidiunDocumentEntry $documentEntry = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "sourceFlavorAssetId", $sourceFlavorAssetId);
		if ($documentEntry !== null)
			$this->client->addParam($vparams, "documentEntry", $documentEntry->toParams());
		$this->client->queueServiceActionCall("document_documents", "addFromFlavorAsset", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}

	/**
	 * Convert entry
	 * 
	 * @param string $entryId Document entry id
	 * @param int $conversionProfileId 
	 * @param array $dynamicConversionAttributes 
	 * @return int
	 */
	function convert($entryId, $conversionProfileId = null, array $dynamicConversionAttributes = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		if ($dynamicConversionAttributes !== null)
			foreach($dynamicConversionAttributes as $index => $obj)
			{
				$this->client->addParam($vparams, "dynamicConversionAttributes:$index", $obj->toParams());
			}
		$this->client->queueServiceActionCall("document_documents", "convert", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Get document entry by ID.
	 * 
	 * @param string $entryId Document entry id
	 * @param int $version Desired version of the data
	 * @return VidiunDocumentEntry
	 */
	function get($entryId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("document_documents", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}

	/**
	 * Update document entry. Only the properties that were set will be updated.
	 * 
	 * @param string $entryId Document entry id to update
	 * @param VidiunDocumentEntry $documentEntry Document entry metadata to update
	 * @return VidiunDocumentEntry
	 */
	function update($entryId, VidiunDocumentEntry $documentEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "documentEntry", $documentEntry->toParams());
		$this->client->queueServiceActionCall("document_documents", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}

	/**
	 * Delete a document entry.
	 * 
	 * @param string $entryId Document entry id to delete
	 * @return 
	 */
	function delete($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("document_documents", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List document entries by filter with paging support.
	 * 
	 * @param VidiunDocumentEntryFilter $filter Document entry filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunDocumentListResponse
	 */
	function listAction(VidiunDocumentEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("document_documents", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentListResponse");
		return $resultObject;
	}

	/**
	 * Upload a document file to Vidiun, then the file can be used to create a document entry.
	 * 
	 * @param file $fileData The file data
	 * @return string
	 */
	function upload($fileData)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("document_documents", "upload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * This will queue a batch job for converting the document file to swf
	 Returns the URL where the new swf will be available
	 * 
	 * @param string $entryId 
	 * @return string
	 */
	function convertPptToSwf($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("document_documents", "convertPptToSwf", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Serves the file content
	 * 
	 * @param string $entryId Document entry id
	 * @param string $flavorAssetId Flavor asset id
	 * @param bool $forceProxy Force to get the content without redirect
	 * @return file
	 */
	function serve($entryId, $flavorAssetId = null, $forceProxy = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "flavorAssetId", $flavorAssetId);
		$this->client->addParam($vparams, "forceProxy", $forceProxy);
		$this->client->queueServiceActionCall("document_documents", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Serves the file content
	 * 
	 * @param string $entryId Document entry id
	 * @param string $flavorParamsId Flavor params id
	 * @param bool $forceProxy Force to get the content without redirect
	 * @return file
	 */
	function serveByFlavorParamsId($entryId, $flavorParamsId = null, $forceProxy = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "flavorParamsId", $flavorParamsId);
		$this->client->addParam($vparams, "forceProxy", $forceProxy);
		$this->client->queueServiceActionCall("document_documents", "serveByFlavorParamsId", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Replace content associated with the given document entry.
	 * 
	 * @param string $entryId Document entry id to update
	 * @param VidiunResource $resource Resource to be used to replace entry doc content
	 * @param int $conversionProfileId The conversion profile id to be used on the entry
	 * @return VidiunDocumentEntry
	 */
	function updateContent($entryId, VidiunResource $resource, $conversionProfileId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "resource", $resource->toParams());
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		$this->client->queueServiceActionCall("document_documents", "updateContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}

	/**
	 * Approves document replacement
	 * 
	 * @param string $entryId Document entry id to replace
	 * @return VidiunDocumentEntry
	 */
	function approveReplace($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("document_documents", "approveReplace", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}

	/**
	 * Cancels document replacement
	 * 
	 * @param string $entryId Document entry id to cancel
	 * @return VidiunDocumentEntry
	 */
	function cancelReplace($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("document_documents", "cancelReplace", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDocumentEntry");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunDocumentsService
	 */
	public $documents = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->documents = new VidiunDocumentsService($client);
	}

	/**
	 * @return VidiunDocumentClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunDocumentClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'documents' => $this->documents,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'document';
	}
}


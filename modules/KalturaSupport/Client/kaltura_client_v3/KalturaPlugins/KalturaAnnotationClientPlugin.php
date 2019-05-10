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
require_once(dirname(__FILE__) . "/VidiunCuePointClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAnnotationOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DURATION_ASC = "+duration";
	const END_TIME_ASC = "+endTime";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const START_TIME_ASC = "+startTime";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DURATION_DESC = "-duration";
	const END_TIME_DESC = "-endTime";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const START_TIME_DESC = "-startTime";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAnnotation extends VidiunCuePoint
{
	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	public $parentId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $text = null;

	/**
	 * End time in milliseconds
	 * 	 
	 *
	 * @var int
	 */
	public $endTime = null;

	/**
	 * Duration in milliseconds
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $duration = null;

	/**
	 * Depth in the tree
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $depth = null;

	/**
	 * Number of all descendants
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $childrenCount = null;

	/**
	 * Number of children, first generation only.
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $directChildrenCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAnnotationListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunAnnotation
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
abstract class VidiunAnnotationBaseFilter extends VidiunCuePointFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $parentIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parentIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $textLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $textMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $textMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAnnotationFilter extends VidiunAnnotationBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAnnotationService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Allows you to add an annotation object associated with an entry
	 * 
	 * @param VidiunCuePoint $annotation 
	 * @return VidiunAnnotation
	 */
	function add(VidiunCuePoint $annotation)
	{
		$vparams = array();
		$this->client->addParam($vparams, "annotation", $annotation->toParams());
		$this->client->queueServiceActionCall("annotation_annotation", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAnnotation");
		return $resultObject;
	}

	/**
	 * Update annotation by id
	 * 
	 * @param string $id 
	 * @param VidiunCuePoint $annotation 
	 * @return VidiunAnnotation
	 */
	function update($id, VidiunCuePoint $annotation)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "annotation", $annotation->toParams());
		$this->client->queueServiceActionCall("annotation_annotation", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAnnotation");
		return $resultObject;
	}

	/**
	 * List annotation objects by filter and pager
	 * 
	 * @param VidiunCuePointFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunAnnotationListResponse
	 */
	function listAction(VidiunCuePointFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("annotation_annotation", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAnnotationListResponse");
		return $resultObject;
	}

	/**
	 * Allows you to add multiple cue points objects by uploading XML that contains multiple cue point definitions
	 * 
	 * @param file $fileData 
	 * @return VidiunCuePointListResponse
	 */
	function addFromBulk($fileData)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("annotation_annotation", "addFromBulk", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCuePointListResponse");
		return $resultObject;
	}

	/**
	 * Download multiple cue points objects as XML definitions
	 * 
	 * @param VidiunCuePointFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return file
	 */
	function serveBulk(VidiunCuePointFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("annotation_annotation", "serveBulk", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Retrieve an CuePoint object by id
	 * 
	 * @param string $id 
	 * @return VidiunCuePoint
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("annotation_annotation", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCuePoint");
		return $resultObject;
	}

	/**
	 * Count cue point objects by filter
	 * 
	 * @param VidiunCuePointFilter $filter 
	 * @return int
	 */
	function count(VidiunCuePointFilter $filter = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("annotation_annotation", "count", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Delete cue point by id, and delete all children cue points
	 * 
	 * @param string $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("annotation_annotation", "delete", $vparams);
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
class VidiunAnnotationClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunAnnotationService
	 */
	public $annotation = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->annotation = new VidiunAnnotationService($client);
	}

	/**
	 * @return VidiunAnnotationClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunAnnotationClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'annotation' => $this->annotation,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'annotation';
	}
}


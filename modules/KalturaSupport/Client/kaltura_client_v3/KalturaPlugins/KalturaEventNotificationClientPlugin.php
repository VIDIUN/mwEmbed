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
class VidiunEventNotificationTemplateStatus
{
	const DISABLED = 1;
	const ACTIVE = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationEventObjectType
{
	const AD_CUE_POINT = "adCuePointEventNotifications.AdCuePoint";
	const ANNOTATION = "annotationEventNotifications.Annotation";
	const CAPTION_ASSET = "captionAssetEventNotifications.CaptionAsset";
	const CODE_CUE_POINT = "codeCuePointEventNotifications.CodeCuePoint";
	const DISTRIBUTION_PROFILE = "contentDistributionEventNotifications.DistributionProfile";
	const ENTRY_DISTRIBUTION = "contentDistributionEventNotifications.EntryDistribution";
	const CUE_POINT = "cuePointEventNotifications.CuePoint";
	const METADATA = "metadataEventNotifications.Metadata";
	const ENTRY = "1";
	const CATEGORY = "2";
	const ASSET = "3";
	const FLAVORASSET = "4";
	const THUMBASSET = "5";
	const VUSER = "8";
	const ACCESSCONTROL = "9";
	const BATCHJOB = "10";
	const BULKUPLOADRESULT = "11";
	const CATEGORYVUSER = "12";
	const CONVERSIONPROFILE2 = "14";
	const FLAVORPARAMS = "15";
	const FLAVORPARAMSCONVERSIONPROFILE = "16";
	const FLAVORPARAMSOUTPUT = "17";
	const GENERICSYNDICATIONFEED = "18";
	const VUSERTOUSERROLE = "19";
	const PARTNER = "20";
	const PERMISSION = "21";
	const PERMISSIONITEM = "22";
	const PERMISSIONTOPERMISSIONITEM = "23";
	const SCHEDULER = "24";
	const SCHEDULERCONFIG = "25";
	const SCHEDULERSTATUS = "26";
	const SCHEDULERWORKER = "27";
	const STORAGEPROFILE = "28";
	const SYNDICATIONFEED = "29";
	const THUMBPARAMS = "31";
	const THUMBPARAMSOUTPUT = "32";
	const UPLOADTOKEN = "33";
	const USERLOGINDATA = "34";
	const USERROLE = "35";
	const WIDGET = "36";
	const CATEGORYENTRY = "37";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationEventType
{
	const BATCH_JOB_STATUS = "1";
	const OBJECT_ADDED = "2";
	const OBJECT_CHANGED = "3";
	const OBJECT_COPIED = "4";
	const OBJECT_CREATED = "5";
	const OBJECT_DATA_CHANGED = "6";
	const OBJECT_DELETED = "7";
	const OBJECT_ERASED = "8";
	const OBJECT_READY_FOR_REPLACMENT = "9";
	const OBJECT_SAVED = "10";
	const OBJECT_UPDATED = "11";
	const OBJECT_REPLACED = "12";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationTemplateOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationTemplateType
{
	const EMAIL = "emailNotification.Email";
	const HTTP = "httpNotification.Http";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationParameter extends VidiunObjectBase
{
	/**
	 * The key in the subject and body to be replaced with the dynamic value
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
	public $description = null;

	/**
	 * The dynamic value to be placed in the final output
	 * 	 
	 *
	 * @var VidiunStringValue
	 */
	public $value;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationTemplate extends VidiunObjectBase
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
	 * @var VidiunEventNotificationTemplateType
	 * @insertonly
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var VidiunEventNotificationTemplateStatus
	 * @readonly
	 */
	public $status = null;

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
	 * Define that the template could be dispatched manually from the API
	 * 	 
	 *
	 * @var bool
	 */
	public $manualDispatchEnabled = null;

	/**
	 * Define that the template could be dispatched automatically by the system
	 * 	 
	 *
	 * @var bool
	 */
	public $automaticDispatchEnabled = null;

	/**
	 * Define the event that should trigger this notification
	 * 	 
	 *
	 * @var VidiunEventNotificationEventType
	 */
	public $eventType = null;

	/**
	 * Define the object that raied the event that should trigger this notification
	 * 	 
	 *
	 * @var VidiunEventNotificationEventObjectType
	 */
	public $eventObjectType = null;

	/**
	 * Define the conditions that cause this notification to be triggered
	 * 	 
	 *
	 * @var array of VidiunCondition
	 */
	public $eventConditions;

	/**
	 * Define the content dynamic parameters
	 * 	 
	 *
	 * @var array of VidiunEventNotificationParameter
	 */
	public $contentParameters;

	/**
	 * Define the content dynamic parameters
	 * 	 
	 *
	 * @var array of VidiunEventNotificationParameter
	 */
	public $userParameters;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationTemplateListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunEventNotificationTemplate
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
class VidiunEventFieldCondition extends VidiunCondition
{
	/**
	 * The field to be evaluated at runtime
	 * 	 
	 *
	 * @var VidiunBooleanField
	 */
	public $field;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationArrayParameter extends VidiunEventNotificationParameter
{
	/**
	 * 
	 *
	 * @var array of VidiunString
	 */
	public $values;

	/**
	 * Used to restrict the values to close list
	 * 	 
	 *
	 * @var array of VidiunStringValue
	 */
	public $allowedValues;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationDispatchJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $templateId = null;

	/**
	 * Define the content dynamic parameters
	 * 	 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $contentParameters;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationScope extends VidiunScope
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $objectId = null;

	/**
	 * 
	 *
	 * @var VidiunEventNotificationEventObjectType
	 */
	public $scopeObjectType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunEventNotificationTemplateBaseFilter extends VidiunFilter
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
	 * @var string
	 */
	public $partnerIdIn = null;

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
	 * @var VidiunEventNotificationTemplateType
	 */
	public $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * 
	 *
	 * @var VidiunEventNotificationTemplateStatus
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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventObjectChangedCondition extends VidiunCondition
{
	/**
	 * Comma seperated column names to be tested
	 * 	 
	 *
	 * @var string
	 */
	public $modifiedColumns = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationTemplateFilter extends VidiunEventNotificationTemplateBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationTemplateService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Allows you to add a new event notification template object
	 * 
	 * @param VidiunEventNotificationTemplate $eventNotificationTemplate 
	 * @return VidiunEventNotificationTemplate
	 */
	function add(VidiunEventNotificationTemplate $eventNotificationTemplate)
	{
		$vparams = array();
		$this->client->addParam($vparams, "eventNotificationTemplate", $eventNotificationTemplate->toParams());
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplate");
		return $resultObject;
	}

	/**
	 * Allows you to clone exiting event notification template object and create a new one with similar configuration
	 * 
	 * @param int $id Source template to clone
	 * @param VidiunEventNotificationTemplate $eventNotificationTemplate Overwrite configuration object
	 * @return VidiunEventNotificationTemplate
	 */
	function cloneAction($id, VidiunEventNotificationTemplate $eventNotificationTemplate = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		if ($eventNotificationTemplate !== null)
			$this->client->addParam($vparams, "eventNotificationTemplate", $eventNotificationTemplate->toParams());
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "clone", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplate");
		return $resultObject;
	}

	/**
	 * Retrieve an event notification template object by id
	 * 
	 * @param int $id 
	 * @return VidiunEventNotificationTemplate
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplate");
		return $resultObject;
	}

	/**
	 * Update an existing event notification template object
	 * 
	 * @param int $id 
	 * @param VidiunEventNotificationTemplate $eventNotificationTemplate 
	 * @return VidiunEventNotificationTemplate
	 */
	function update($id, VidiunEventNotificationTemplate $eventNotificationTemplate)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "eventNotificationTemplate", $eventNotificationTemplate->toParams());
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplate");
		return $resultObject;
	}

	/**
	 * Update event notification template status by id
	 * 
	 * @param int $id 
	 * @param int $status 
	 * @return VidiunEventNotificationTemplate
	 */
	function updateStatus($id, $status)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "status", $status);
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "updateStatus", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplate");
		return $resultObject;
	}

	/**
	 * Delete an event notification template object
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List event notification template objects
	 * 
	 * @param VidiunEventNotificationTemplateFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunEventNotificationTemplateListResponse
	 */
	function listAction(VidiunEventNotificationTemplateFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplateListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param VidiunPartnerFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunEventNotificationTemplateListResponse
	 */
	function listByPartner(VidiunPartnerFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "listByPartner", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplateListResponse");
		return $resultObject;
	}

	/**
	 * Dispatch event notification object by id
	 * 
	 * @param int $id 
	 * @param VidiunEventNotificationScope $scope 
	 * @return int
	 */
	function dispatch($id, VidiunEventNotificationScope $scope)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "scope", $scope->toParams());
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "dispatch", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Action lists the template partner event notification templates.
	 * 
	 * @param VidiunEventNotificationTemplateFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunEventNotificationTemplateListResponse
	 */
	function listTemplates(VidiunEventNotificationTemplateFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("eventnotification_eventnotificationtemplate", "listTemplates", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEventNotificationTemplateListResponse");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEventNotificationClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunEventNotificationTemplateService
	 */
	public $eventNotificationTemplate = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->eventNotificationTemplate = new VidiunEventNotificationTemplateService($client);
	}

	/**
	 * @return VidiunEventNotificationClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunEventNotificationClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'eventNotificationTemplate' => $this->eventNotificationTemplate,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'eventNotification';
	}
}


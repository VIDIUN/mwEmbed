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
require_once(dirname(__FILE__) . "/VidiunClientBase.php");
require_once(dirname(__FILE__) . "/VidiunEnums.php");
require_once(dirname(__FILE__) . "/VidiunTypes.php");


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new access control profile
	 * 
	 * @param VidiunAccessControlProfile $accessControlProfile 
	 * @return VidiunAccessControlProfile
	 */
	function add(VidiunAccessControlProfile $accessControlProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "accessControlProfile", $accessControlProfile->toParams());
		$this->client->queueServiceActionCall("accesscontrolprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControlProfile");
		return $resultObject;
	}

	/**
	 * Get access control profile by id
	 * 
	 * @param int $id 
	 * @return VidiunAccessControlProfile
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("accesscontrolprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControlProfile");
		return $resultObject;
	}

	/**
	 * Update access control profile by id
	 * 
	 * @param int $id 
	 * @param VidiunAccessControlProfile $accessControlProfile 
	 * @return VidiunAccessControlProfile
	 */
	function update($id, VidiunAccessControlProfile $accessControlProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "accessControlProfile", $accessControlProfile->toParams());
		$this->client->queueServiceActionCall("accesscontrolprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControlProfile");
		return $resultObject;
	}

	/**
	 * Delete access control profile by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("accesscontrolprofile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List access control profiles by filter and pager
	 * 
	 * @param VidiunAccessControlProfileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunAccessControlProfileListResponse
	 */
	function listAction(VidiunAccessControlProfileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("accesscontrolprofile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControlProfileListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Access Control Profile
	 * 
	 * @param VidiunAccessControl $accessControl 
	 * @return VidiunAccessControl
	 */
	function add(VidiunAccessControl $accessControl)
	{
		$vparams = array();
		$this->client->addParam($vparams, "accessControl", $accessControl->toParams());
		$this->client->queueServiceActionCall("accesscontrol", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControl");
		return $resultObject;
	}

	/**
	 * Get Access Control Profile by id
	 * 
	 * @param int $id 
	 * @return VidiunAccessControl
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("accesscontrol", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControl");
		return $resultObject;
	}

	/**
	 * Update Access Control Profile by id
	 * 
	 * @param int $id 
	 * @param VidiunAccessControl $accessControl 
	 * @return VidiunAccessControl
	 */
	function update($id, VidiunAccessControl $accessControl)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "accessControl", $accessControl->toParams());
		$this->client->queueServiceActionCall("accesscontrol", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControl");
		return $resultObject;
	}

	/**
	 * Delete Access Control Profile by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("accesscontrol", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List Access Control Profiles by filter and pager
	 * 
	 * @param VidiunAccessControlFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunAccessControlListResponse
	 */
	function listAction(VidiunAccessControlFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("accesscontrol", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAccessControlListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdminUserService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Update admin user password and email
	 * 
	 * @param string $email 
	 * @param string $password 
	 * @param string $newEmail Optional, provide only when you want to update the email
	 * @param string $newPassword 
	 * @return VidiunAdminUser
	 */
	function updatePassword($email, $password, $newEmail = "", $newPassword = "")
	{
		$vparams = array();
		$this->client->addParam($vparams, "email", $email);
		$this->client->addParam($vparams, "password", $password);
		$this->client->addParam($vparams, "newEmail", $newEmail);
		$this->client->addParam($vparams, "newPassword", $newPassword);
		$this->client->queueServiceActionCall("adminuser", "updatePassword", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunAdminUser");
		return $resultObject;
	}

	/**
	 * Reset admin user password and send it to the users email address
	 * 
	 * @param string $email 
	 * @return 
	 */
	function resetPassword($email)
	{
		$vparams = array();
		$this->client->addParam($vparams, "email", $email);
		$this->client->queueServiceActionCall("adminuser", "resetPassword", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Get an admin session using admin email and password (Used for login to the VMC application)
	 * 
	 * @param string $email 
	 * @param string $password 
	 * @param int $partnerId 
	 * @return string
	 */
	function login($email, $password, $partnerId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "email", $email);
		$this->client->addParam($vparams, "password", $password);
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("adminuser", "login", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Set initial users password
	 * 
	 * @param string $hashKey 
	 * @param string $newPassword New password to set
	 * @return 
	 */
	function setInitialPassword($hashKey, $newPassword)
	{
		$vparams = array();
		$this->client->addParam($vparams, "hashKey", $hashKey);
		$this->client->addParam($vparams, "newPassword", $newPassword);
		$this->client->queueServiceActionCall("adminuser", "setInitialPassword", $vparams);
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
class VidiunBaseEntryService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Generic add entry, should be used when the uploaded entry type is not known.
	 * 
	 * @param VidiunBaseEntry $entry 
	 * @param string $type 
	 * @return VidiunBaseEntry
	 */
	function add(VidiunBaseEntry $entry, $type = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entry", $entry->toParams());
		$this->client->addParam($vparams, "type", $type);
		$this->client->queueServiceActionCall("baseentry", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Attach content resource to entry in status NO_MEDIA
	 * 
	 * @param string $entryId 
	 * @param VidiunResource $resource 
	 * @return VidiunBaseEntry
	 */
	function addContent($entryId, VidiunResource $resource)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "resource", $resource->toParams());
		$this->client->queueServiceActionCall("baseentry", "addContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Generic add entry using an uploaded file, should be used when the uploaded entry type is not known.
	 * 
	 * @param VidiunBaseEntry $entry 
	 * @param string $uploadTokenId 
	 * @param string $type 
	 * @return VidiunBaseEntry
	 */
	function addFromUploadedFile(VidiunBaseEntry $entry, $uploadTokenId, $type = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entry", $entry->toParams());
		$this->client->addParam($vparams, "uploadTokenId", $uploadTokenId);
		$this->client->addParam($vparams, "type", $type);
		$this->client->queueServiceActionCall("baseentry", "addFromUploadedFile", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Get base entry by ID.
	 * 
	 * @param string $entryId Entry id
	 * @param int $version Desired version of the data
	 * @return VidiunBaseEntry
	 */
	function get($entryId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("baseentry", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Get remote storage existing paths for the asset.
	 * 
	 * @param string $entryId 
	 * @return VidiunRemotePathListResponse
	 */
	function getRemotePaths($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("baseentry", "getRemotePaths", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunRemotePathListResponse");
		return $resultObject;
	}

	/**
	 * Update base entry. Only the properties that were set will be updated.
	 * 
	 * @param string $entryId Entry id to update
	 * @param VidiunBaseEntry $baseEntry Base entry metadata to update
	 * @return VidiunBaseEntry
	 */
	function update($entryId, VidiunBaseEntry $baseEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "baseEntry", $baseEntry->toParams());
		$this->client->queueServiceActionCall("baseentry", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Update the content resource associated with the entry.
	 * 
	 * @param string $entryId Entry id to update
	 * @param VidiunResource $resource Resource to be used to replace entry content
	 * @param int $conversionProfileId The conversion profile id to be used on the entry
	 * @return VidiunBaseEntry
	 */
	function updateContent($entryId, VidiunResource $resource, $conversionProfileId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "resource", $resource->toParams());
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		$this->client->queueServiceActionCall("baseentry", "updateContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Get an array of VidiunBaseEntry objects by a comma-separated list of ids.
	 * 
	 * @param string $entryIds Comma separated string of entry ids
	 * @return array
	 */
	function getByIds($entryIds)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryIds", $entryIds);
		$this->client->queueServiceActionCall("baseentry", "getByIds", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Delete an entry.
	 * 
	 * @param string $entryId Entry id to delete
	 * @return 
	 */
	function delete($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("baseentry", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List base entries by filter with paging support.
	 * 
	 * @param VidiunBaseEntryFilter $filter Entry filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunBaseEntryListResponse
	 */
	function listAction(VidiunBaseEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("baseentry", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntryListResponse");
		return $resultObject;
	}

	/**
	 * List base entries by filter according to reference id
	 * 
	 * @param string $refId Entry Reference ID
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunBaseEntryListResponse
	 */
	function listByReferenceId($refId, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "refId", $refId);
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("baseentry", "listByReferenceId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntryListResponse");
		return $resultObject;
	}

	/**
	 * Count base entries by filter.
	 * 
	 * @param VidiunBaseEntryFilter $filter Entry filter
	 * @return int
	 */
	function count(VidiunBaseEntryFilter $filter = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("baseentry", "count", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Upload a file to Vidiun, that can be used to create an entry.
	 * 
	 * @param file $fileData The file data
	 * @return string
	 */
	function upload($fileData)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("baseentry", "upload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Update entry thumbnail using a raw jpeg file.
	 * 
	 * @param string $entryId Media entry id
	 * @param file $fileData Jpeg file data
	 * @return VidiunBaseEntry
	 */
	function updateThumbnailJpeg($entryId, $fileData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("baseentry", "updateThumbnailJpeg", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Update entry thumbnail using url.
	 * 
	 * @param string $entryId Media entry id
	 * @param string $url File url
	 * @return VidiunBaseEntry
	 */
	function updateThumbnailFromUrl($entryId, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("baseentry", "updateThumbnailFromUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Update entry thumbnail from a different entry by a specified time offset (in seconds).
	 * 
	 * @param string $entryId Media entry id
	 * @param string $sourceEntryId Media entry id
	 * @param int $timeOffset Time offset (in seconds)
	 * @return VidiunBaseEntry
	 */
	function updateThumbnailFromSourceEntry($entryId, $sourceEntryId, $timeOffset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "sourceEntryId", $sourceEntryId);
		$this->client->addParam($vparams, "timeOffset", $timeOffset);
		$this->client->queueServiceActionCall("baseentry", "updateThumbnailFromSourceEntry", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Flag inappropriate entry for moderation.
	 * 
	 * @param VidiunModerationFlag $moderationFlag 
	 * @return 
	 */
	function flag(VidiunModerationFlag $moderationFlag)
	{
		$vparams = array();
		$this->client->addParam($vparams, "moderationFlag", $moderationFlag->toParams());
		$this->client->queueServiceActionCall("baseentry", "flag", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Reject the entry and mark the pending flags (if any) as moderated (this will make the entry non-playable).
	 * 
	 * @param string $entryId 
	 * @return 
	 */
	function reject($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("baseentry", "reject", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Approve the entry and mark the pending flags (if any) as moderated (this will make the entry playable).
	 * 
	 * @param string $entryId 
	 * @return 
	 */
	function approve($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("baseentry", "approve", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all pending flags for the entry.
	 * 
	 * @param string $entryId 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunModerationFlagListResponse
	 */
	function listFlags($entryId, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("baseentry", "listFlags", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunModerationFlagListResponse");
		return $resultObject;
	}

	/**
	 * Anonymously rank an entry, no validation is done on duplicate rankings.
	 * 
	 * @param string $entryId 
	 * @param int $rank 
	 * @return 
	 */
	function anonymousRank($entryId, $rank)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "rank", $rank);
		$this->client->queueServiceActionCall("baseentry", "anonymousRank", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * This action delivers entry-related data, based on the user's context: access control, restriction, playback format and storage information.
	 * 
	 * @param string $entryId 
	 * @param VidiunEntryContextDataParams $contextDataParams 
	 * @return VidiunEntryContextDataResult
	 */
	function getContextData($entryId, VidiunEntryContextDataParams $contextDataParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "contextDataParams", $contextDataParams->toParams());
		$this->client->queueServiceActionCall("baseentry", "getContextData", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryContextDataResult");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $entryId 
	 * @param int $storageProfileId 
	 * @return VidiunBaseEntry
	 */
	function export($entryId, $storageProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "storageProfileId", $storageProfileId);
		$this->client->queueServiceActionCall("baseentry", "export", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Index an entry by id.
	 * 
	 * @param string $id 
	 * @param bool $shouldUpdate 
	 * @return int
	 */
	function index($id, $shouldUpdate = true)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "shouldUpdate", $shouldUpdate);
		$this->client->queueServiceActionCall("baseentry", "index", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Clone an entry with optional attributes to apply to the clone
	 * 
	 * @param string $entryId Id of entry to clone
	 * @return VidiunBaseEntry
	 */
	function cloneAction($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("baseentry", "clone", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new bulk upload batch job
	 Conversion profile id can be specified in the API or in the CSV file, the one in the CSV file will be stronger.
	 If no conversion profile was specified, partner's default will be used
	 * 
	 * @param int $conversionProfileId Convertion profile id to use for converting the current bulk (-1 to use partner's default)
	 * @param file $csvFileData Bulk upload file
	 * @param string $bulkUploadType 
	 * @param string $uploadedBy 
	 * @param string $fileName Friendly name of the file, used to be recognized later in the logs.
	 * @return VidiunBulkUpload
	 */
	function add($conversionProfileId, $csvFileData, $bulkUploadType = null, $uploadedBy = null, $fileName = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		$vfiles = array();
		$this->client->addParam($vfiles, "csvFileData", $csvFileData);
		$this->client->addParam($vparams, "bulkUploadType", $bulkUploadType);
		$this->client->addParam($vparams, "uploadedBy", $uploadedBy);
		$this->client->addParam($vparams, "fileName", $fileName);
		$this->client->queueServiceActionCall("bulkupload", "add", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}

	/**
	 * Get bulk upload batch job by id
	 * 
	 * @param bigint $id 
	 * @return VidiunBulkUpload
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}

	/**
	 * List bulk upload batch jobs
	 * 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunBulkUploadListResponse
	 */
	function listAction(VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("bulkupload", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUploadListResponse");
		return $resultObject;
	}

	/**
	 * Serve action returan the original file.
	 * 
	 * @param bigint $id Job id
	 * @return file
	 */
	function serve($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * ServeLog action returan the original file.
	 * 
	 * @param bigint $id Job id
	 * @return file
	 */
	function serveLog($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload", "serveLog", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Aborts the bulk upload and all its child jobs
	 * 
	 * @param bigint $id Job id
	 * @return VidiunBulkUpload
	 */
	function abort($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload", "abort", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntryService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new CategoryEntry
	 * 
	 * @param VidiunCategoryEntry $categoryEntry 
	 * @return VidiunCategoryEntry
	 */
	function add(VidiunCategoryEntry $categoryEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryEntry", $categoryEntry->toParams());
		$this->client->queueServiceActionCall("categoryentry", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryEntry");
		return $resultObject;
	}

	/**
	 * Delete CategoryEntry
	 * 
	 * @param string $entryId 
	 * @param int $categoryId 
	 * @return 
	 */
	function delete($entryId, $categoryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->queueServiceActionCall("categoryentry", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all categoryEntry
	 * 
	 * @param VidiunCategoryEntryFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunCategoryEntryListResponse
	 */
	function listAction(VidiunCategoryEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("categoryentry", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryEntryListResponse");
		return $resultObject;
	}

	/**
	 * Index CategoryEntry by Id
	 * 
	 * @param string $entryId 
	 * @param int $categoryId 
	 * @param bool $shouldUpdate 
	 * @return int
	 */
	function index($entryId, $categoryId, $shouldUpdate = true)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "shouldUpdate", $shouldUpdate);
		$this->client->queueServiceActionCall("categoryentry", "index", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Activate CategoryEntry when it is pending moderation
	 * 
	 * @param string $entryId 
	 * @param int $categoryId 
	 * @return 
	 */
	function activate($entryId, $categoryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->queueServiceActionCall("categoryentry", "activate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Activate CategoryEntry when it is pending moderation
	 * 
	 * @param string $entryId 
	 * @param int $categoryId 
	 * @return 
	 */
	function reject($entryId, $categoryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->queueServiceActionCall("categoryentry", "reject", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Update privacy context from the category
	 * 
	 * @param string $entryId 
	 * @param int $categoryId 
	 * @return 
	 */
	function syncPrivacyContext($entryId, $categoryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->queueServiceActionCall("categoryentry", "syncPrivacyContext", $vparams);
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
	 * @param VidiunBulkServiceData $bulkUploadData 
	 * @param VidiunBulkUploadCategoryEntryData $bulkUploadCategoryEntryData 
	 * @return VidiunBulkUpload
	 */
	function addFromBulkUpload(VidiunBulkServiceData $bulkUploadData, VidiunBulkUploadCategoryEntryData $bulkUploadCategoryEntryData = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "bulkUploadData", $bulkUploadData->toParams());
		if ($bulkUploadCategoryEntryData !== null)
			$this->client->addParam($vparams, "bulkUploadCategoryEntryData", $bulkUploadCategoryEntryData->toParams());
		$this->client->queueServiceActionCall("categoryentry", "addFromBulkUpload", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Category
	 * 
	 * @param VidiunCategory $category 
	 * @return VidiunCategory
	 */
	function add(VidiunCategory $category)
	{
		$vparams = array();
		$this->client->addParam($vparams, "category", $category->toParams());
		$this->client->queueServiceActionCall("category", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategory");
		return $resultObject;
	}

	/**
	 * Get Category by id
	 * 
	 * @param int $id 
	 * @return VidiunCategory
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("category", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategory");
		return $resultObject;
	}

	/**
	 * Update Category
	 * 
	 * @param int $id 
	 * @param VidiunCategory $category 
	 * @return VidiunCategory
	 */
	function update($id, VidiunCategory $category)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "category", $category->toParams());
		$this->client->queueServiceActionCall("category", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategory");
		return $resultObject;
	}

	/**
	 * Delete a Category
	 * 
	 * @param int $id 
	 * @param int $moveEntriesToParentCategory 
	 * @return 
	 */
	function delete($id, $moveEntriesToParentCategory = 1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "moveEntriesToParentCategory", $moveEntriesToParentCategory);
		$this->client->queueServiceActionCall("category", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all categories
	 * 
	 * @param VidiunCategoryFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunCategoryListResponse
	 */
	function listAction(VidiunCategoryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("category", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryListResponse");
		return $resultObject;
	}

	/**
	 * Index Category by id
	 * 
	 * @param int $id 
	 * @param bool $shouldUpdate 
	 * @return int
	 */
	function index($id, $shouldUpdate = true)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "shouldUpdate", $shouldUpdate);
		$this->client->queueServiceActionCall("category", "index", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Move categories that belong to the same parent category to a target categroy - enabled only for vs with disable entitlement
	 * 
	 * @param string $categoryIds 
	 * @param int $targetCategoryParentId 
	 * @return VidiunCategoryListResponse
	 */
	function move($categoryIds, $targetCategoryParentId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryIds", $categoryIds);
		$this->client->addParam($vparams, "targetCategoryParentId", $targetCategoryParentId);
		$this->client->queueServiceActionCall("category", "move", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryListResponse");
		return $resultObject;
	}

	/**
	 * Unlock categories
	 * 
	 * @return 
	 */
	function unlockCategories()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("category", "unlockCategories", $vparams);
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
	 * @param file $fileData 
	 * @param VidiunBulkUploadJobData $bulkUploadData 
	 * @param VidiunBulkUploadCategoryData $bulkUploadCategoryData 
	 * @return VidiunBulkUpload
	 */
	function addFromBulkUpload($fileData, VidiunBulkUploadJobData $bulkUploadData = null, VidiunBulkUploadCategoryData $bulkUploadCategoryData = null)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		if ($bulkUploadData !== null)
			$this->client->addParam($vparams, "bulkUploadData", $bulkUploadData->toParams());
		if ($bulkUploadCategoryData !== null)
			$this->client->addParam($vparams, "bulkUploadCategoryData", $bulkUploadCategoryData->toParams());
		$this->client->queueServiceActionCall("category", "addFromBulkUpload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new CategoryUser
	 * 
	 * @param VidiunCategoryUser $categoryUser 
	 * @return VidiunCategoryUser
	 */
	function add(VidiunCategoryUser $categoryUser)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryUser", $categoryUser->toParams());
		$this->client->queueServiceActionCall("categoryuser", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryUser");
		return $resultObject;
	}

	/**
	 * Get CategoryUser by id
	 * 
	 * @param int $categoryId 
	 * @param string $userId 
	 * @return VidiunCategoryUser
	 */
	function get($categoryId, $userId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("categoryuser", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryUser");
		return $resultObject;
	}

	/**
	 * Update CategoryUser by id
	 * 
	 * @param int $categoryId 
	 * @param string $userId 
	 * @param VidiunCategoryUser $categoryUser 
	 * @param bool $override - to override manual changes
	 * @return VidiunCategoryUser
	 */
	function update($categoryId, $userId, VidiunCategoryUser $categoryUser, $override = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "categoryUser", $categoryUser->toParams());
		$this->client->addParam($vparams, "override", $override);
		$this->client->queueServiceActionCall("categoryuser", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryUser");
		return $resultObject;
	}

	/**
	 * Delete a CategoryUser
	 * 
	 * @param int $categoryId 
	 * @param string $userId 
	 * @return 
	 */
	function delete($categoryId, $userId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("categoryuser", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Activate CategoryUser
	 * 
	 * @param int $categoryId 
	 * @param string $userId 
	 * @return VidiunCategoryUser
	 */
	function activate($categoryId, $userId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("categoryuser", "activate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryUser");
		return $resultObject;
	}

	/**
	 * Reject CategoryUser
	 * 
	 * @param int $categoryId 
	 * @param string $userId 
	 * @return VidiunCategoryUser
	 */
	function deactivate($categoryId, $userId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("categoryuser", "deactivate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryUser");
		return $resultObject;
	}

	/**
	 * List all categories
	 * 
	 * @param VidiunCategoryUserFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunCategoryUserListResponse
	 */
	function listAction(VidiunCategoryUserFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("categoryuser", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCategoryUserListResponse");
		return $resultObject;
	}

	/**
	 * Copy all memeber from parent category
	 * 
	 * @param int $categoryId 
	 * @return 
	 */
	function copyFromCategory($categoryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->queueServiceActionCall("categoryuser", "copyFromCategory", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Index CategoryUser by userid and category id
	 * 
	 * @param string $userId 
	 * @param int $categoryId 
	 * @param bool $shouldUpdate 
	 * @return int
	 */
	function index($userId, $categoryId, $shouldUpdate = true)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "shouldUpdate", $shouldUpdate);
		$this->client->queueServiceActionCall("categoryuser", "index", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param file $fileData 
	 * @param VidiunBulkUploadJobData $bulkUploadData 
	 * @param VidiunBulkUploadCategoryUserData $bulkUploadCategoryUserData 
	 * @return VidiunBulkUpload
	 */
	function addFromBulkUpload($fileData, VidiunBulkUploadJobData $bulkUploadData = null, VidiunBulkUploadCategoryUserData $bulkUploadCategoryUserData = null)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		if ($bulkUploadData !== null)
			$this->client->addParam($vparams, "bulkUploadData", $bulkUploadData->toParams());
		if ($bulkUploadCategoryUserData !== null)
			$this->client->addParam($vparams, "bulkUploadCategoryUserData", $bulkUploadCategoryUserData->toParams());
		$this->client->queueServiceActionCall("categoryuser", "addFromBulkUpload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileAssetParamsService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Lists asset parmas of conversion profile by ID
	 * 
	 * @param VidiunConversionProfileAssetParamsFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunConversionProfileAssetParamsListResponse
	 */
	function listAction(VidiunConversionProfileAssetParamsFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("conversionprofileassetparams", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfileAssetParamsListResponse");
		return $resultObject;
	}

	/**
	 * Update asset parmas of conversion profile by ID
	 * 
	 * @param int $conversionProfileId 
	 * @param int $assetParamsId 
	 * @param VidiunConversionProfileAssetParams $conversionProfileAssetParams 
	 * @return VidiunConversionProfileAssetParams
	 */
	function update($conversionProfileId, $assetParamsId, VidiunConversionProfileAssetParams $conversionProfileAssetParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		$this->client->addParam($vparams, "assetParamsId", $assetParamsId);
		$this->client->addParam($vparams, "conversionProfileAssetParams", $conversionProfileAssetParams->toParams());
		$this->client->queueServiceActionCall("conversionprofileassetparams", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfileAssetParams");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Set Conversion Profile to be the partner default
	 * 
	 * @param int $id 
	 * @return VidiunConversionProfile
	 */
	function setAsDefault($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("conversionprofile", "setAsDefault", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfile");
		return $resultObject;
	}

	/**
	 * Get the partner's default conversion profile
	 * 
	 * @param string $type 
	 * @return VidiunConversionProfile
	 */
	function getDefault($type = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "type", $type);
		$this->client->queueServiceActionCall("conversionprofile", "getDefault", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfile");
		return $resultObject;
	}

	/**
	 * Add new Conversion Profile
	 * 
	 * @param VidiunConversionProfile $conversionProfile 
	 * @return VidiunConversionProfile
	 */
	function add(VidiunConversionProfile $conversionProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "conversionProfile", $conversionProfile->toParams());
		$this->client->queueServiceActionCall("conversionprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfile");
		return $resultObject;
	}

	/**
	 * Get Conversion Profile by ID
	 * 
	 * @param int $id 
	 * @return VidiunConversionProfile
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("conversionprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfile");
		return $resultObject;
	}

	/**
	 * Update Conversion Profile by ID
	 * 
	 * @param int $id 
	 * @param VidiunConversionProfile $conversionProfile 
	 * @return VidiunConversionProfile
	 */
	function update($id, VidiunConversionProfile $conversionProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "conversionProfile", $conversionProfile->toParams());
		$this->client->queueServiceActionCall("conversionprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfile");
		return $resultObject;
	}

	/**
	 * Delete Conversion Profile by ID
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("conversionprofile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List Conversion Profiles by filter with paging support
	 * 
	 * @param VidiunConversionProfileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunConversionProfileListResponse
	 */
	function listAction(VidiunConversionProfileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("conversionprofile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunConversionProfileListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDataService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new data entry
	 * 
	 * @param VidiunDataEntry $dataEntry Data entry
	 * @return VidiunDataEntry
	 */
	function add(VidiunDataEntry $dataEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dataEntry", $dataEntry->toParams());
		$this->client->queueServiceActionCall("data", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDataEntry");
		return $resultObject;
	}

	/**
	 * Get data entry by ID.
	 * 
	 * @param string $entryId Data entry id
	 * @param int $version Desired version of the data
	 * @return VidiunDataEntry
	 */
	function get($entryId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("data", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDataEntry");
		return $resultObject;
	}

	/**
	 * Update data entry. Only the properties that were set will be updated.
	 * 
	 * @param string $entryId Data entry id to update
	 * @param VidiunDataEntry $documentEntry Data entry metadata to update
	 * @return VidiunDataEntry
	 */
	function update($entryId, VidiunDataEntry $documentEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "documentEntry", $documentEntry->toParams());
		$this->client->queueServiceActionCall("data", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDataEntry");
		return $resultObject;
	}

	/**
	 * Delete a data entry.
	 * 
	 * @param string $entryId Data entry id to delete
	 * @return 
	 */
	function delete($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("data", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List data entries by filter with paging support.
	 * 
	 * @param VidiunDataEntryFilter $filter Document entry filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunDataListResponse
	 */
	function listAction(VidiunDataEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("data", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDataListResponse");
		return $resultObject;
	}

	/**
	 * Serve action returan the file from dataContent field.
	 * 
	 * @param string $entryId Data entry id
	 * @param int $version Desired version of the data
	 * @param bool $forceProxy Force to get the content without redirect
	 * @return file
	 */
	function serve($entryId, $version = -1, $forceProxy = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->addParam($vparams, "forceProxy", $forceProxy);
		$this->client->queueServiceActionCall("data", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDocumentService extends VidiunServiceBase
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
		$this->client->queueServiceActionCall("document", "addFromUploadedFile", $vparams);
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
		$this->client->queueServiceActionCall("document", "addFromEntry", $vparams);
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
		$this->client->queueServiceActionCall("document", "addFromFlavorAsset", $vparams);
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
		$this->client->queueServiceActionCall("document", "convert", $vparams);
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
		$this->client->queueServiceActionCall("document", "get", $vparams);
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
		$this->client->queueServiceActionCall("document", "update", $vparams);
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
		$this->client->queueServiceActionCall("document", "delete", $vparams);
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
		$this->client->queueServiceActionCall("document", "list", $vparams);
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
		$this->client->queueServiceActionCall("document", "upload", $vparams, $vfiles);
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
		$this->client->queueServiceActionCall("document", "convertPptToSwf", $vparams);
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
		$this->client->queueServiceActionCall("document", "serve", $vparams);
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
		$this->client->queueServiceActionCall("document", "serveByFlavorParamsId", $vparams);
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
		$this->client->queueServiceActionCall("document", "updateContent", $vparams);
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
		$this->client->queueServiceActionCall("document", "approveReplace", $vparams);
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
		$this->client->queueServiceActionCall("document", "cancelReplace", $vparams);
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
class VidiunEmailIngestionProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * EmailIngestionProfile Add action allows you to add a EmailIngestionProfile to Vidiun DB
	 * 
	 * @param VidiunEmailIngestionProfile $EmailIP Mandatory input parameter of type VidiunEmailIngestionProfile
	 * @return VidiunEmailIngestionProfile
	 */
	function add(VidiunEmailIngestionProfile $EmailIP)
	{
		$vparams = array();
		$this->client->addParam($vparams, "EmailIP", $EmailIP->toParams());
		$this->client->queueServiceActionCall("emailingestionprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEmailIngestionProfile");
		return $resultObject;
	}

	/**
	 * Retrieve a EmailIngestionProfile by email address
	 * 
	 * @param string $emailAddress 
	 * @return VidiunEmailIngestionProfile
	 */
	function getByEmailAddress($emailAddress)
	{
		$vparams = array();
		$this->client->addParam($vparams, "emailAddress", $emailAddress);
		$this->client->queueServiceActionCall("emailingestionprofile", "getByEmailAddress", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEmailIngestionProfile");
		return $resultObject;
	}

	/**
	 * Retrieve a EmailIngestionProfile by id
	 * 
	 * @param int $id 
	 * @return VidiunEmailIngestionProfile
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("emailingestionprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEmailIngestionProfile");
		return $resultObject;
	}

	/**
	 * Update an existing EmailIngestionProfile
	 * 
	 * @param int $id 
	 * @param VidiunEmailIngestionProfile $EmailIP 
	 * @return VidiunEmailIngestionProfile
	 */
	function update($id, VidiunEmailIngestionProfile $EmailIP)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "EmailIP", $EmailIP->toParams());
		$this->client->queueServiceActionCall("emailingestionprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEmailIngestionProfile");
		return $resultObject;
	}

	/**
	 * Delete an existing EmailIngestionProfile
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("emailingestionprofile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Add VidiunMediaEntry from email ingestion
	 * 
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata
	 * @param string $uploadTokenId Upload token id
	 * @param int $emailProfId 
	 * @param string $fromAddress 
	 * @param string $emailMsgId 
	 * @return VidiunMediaEntry
	 */
	function addMediaEntry(VidiunMediaEntry $mediaEntry, $uploadTokenId, $emailProfId, $fromAddress, $emailMsgId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($vparams, "uploadTokenId", $uploadTokenId);
		$this->client->addParam($vparams, "emailProfId", $emailProfId);
		$this->client->addParam($vparams, "fromAddress", $fromAddress);
		$this->client->addParam($vparams, "emailMsgId", $emailMsgId);
		$this->client->queueServiceActionCall("emailingestionprofile", "addMediaEntry", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileAssetService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new file asset
	 * 
	 * @param VidiunFileAsset $fileAsset 
	 * @return VidiunFileAsset
	 */
	function add(VidiunFileAsset $fileAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "fileAsset", $fileAsset->toParams());
		$this->client->queueServiceActionCall("fileasset", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFileAsset");
		return $resultObject;
	}

	/**
	 * Get file asset by id
	 * 
	 * @param int $id 
	 * @return VidiunFileAsset
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("fileasset", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFileAsset");
		return $resultObject;
	}

	/**
	 * Update file asset by id
	 * 
	 * @param int $id 
	 * @param VidiunFileAsset $fileAsset 
	 * @return VidiunFileAsset
	 */
	function update($id, VidiunFileAsset $fileAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "fileAsset", $fileAsset->toParams());
		$this->client->queueServiceActionCall("fileasset", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFileAsset");
		return $resultObject;
	}

	/**
	 * Delete file asset by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("fileasset", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Serve file asset by id
	 * 
	 * @param int $id 
	 * @return file
	 */
	function serve($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("fileasset", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Set content of file asset
	 * 
	 * @param string $id 
	 * @param VidiunContentResource $contentResource 
	 * @return VidiunFileAsset
	 */
	function setContent($id, VidiunContentResource $contentResource)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "contentResource", $contentResource->toParams());
		$this->client->queueServiceActionCall("fileasset", "setContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFileAsset");
		return $resultObject;
	}

	/**
	 * List file assets by filter and pager
	 * 
	 * @param VidiunFileAssetFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunFileAssetListResponse
	 */
	function listAction(VidiunFileAssetFilter $filter, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("fileasset", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFileAssetListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorAssetService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add flavor asset
	 * 
	 * @param string $entryId 
	 * @param VidiunFlavorAsset $flavorAsset 
	 * @return VidiunFlavorAsset
	 */
	function add($entryId, VidiunFlavorAsset $flavorAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "flavorAsset", $flavorAsset->toParams());
		$this->client->queueServiceActionCall("flavorasset", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorAsset");
		return $resultObject;
	}

	/**
	 * Update flavor asset
	 * 
	 * @param string $id 
	 * @param VidiunFlavorAsset $flavorAsset 
	 * @return VidiunFlavorAsset
	 */
	function update($id, VidiunFlavorAsset $flavorAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "flavorAsset", $flavorAsset->toParams());
		$this->client->queueServiceActionCall("flavorasset", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorAsset");
		return $resultObject;
	}

	/**
	 * Update content of flavor asset
	 * 
	 * @param string $id 
	 * @param VidiunContentResource $contentResource 
	 * @return VidiunFlavorAsset
	 */
	function setContent($id, VidiunContentResource $contentResource)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "contentResource", $contentResource->toParams());
		$this->client->queueServiceActionCall("flavorasset", "setContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorAsset");
		return $resultObject;
	}

	/**
	 * Get Flavor Asset by ID
	 * 
	 * @param string $id 
	 * @return VidiunFlavorAsset
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("flavorasset", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorAsset");
		return $resultObject;
	}

	/**
	 * Get Flavor Assets for Entry
	 * 
	 * @param string $entryId 
	 * @return array
	 */
	function getByEntryId($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("flavorasset", "getByEntryId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * List Flavor Assets by filter and pager
	 * 
	 * @param VidiunAssetFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunFlavorAssetListResponse
	 */
	function listAction(VidiunAssetFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("flavorasset", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorAssetListResponse");
		return $resultObject;
	}

	/**
	 * Get web playable Flavor Assets for Entry
	 * 
	 * @param string $entryId 
	 * @return array
	 */
	function getWebPlayableByEntryId($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("flavorasset", "getWebPlayableByEntryId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Add and convert new Flavor Asset for Entry with specific Flavor Params
	 * 
	 * @param string $entryId 
	 * @param int $flavorParamsId 
	 * @param int $priority 
	 * @return 
	 */
	function convert($entryId, $flavorParamsId, $priority = 0)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "flavorParamsId", $flavorParamsId);
		$this->client->addParam($vparams, "priority", $priority);
		$this->client->queueServiceActionCall("flavorasset", "convert", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Reconvert Flavor Asset by ID
	 * 
	 * @param string $id Flavor Asset ID
	 * @return 
	 */
	function reconvert($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("flavorasset", "reconvert", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Delete Flavor Asset by ID
	 * 
	 * @param string $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("flavorasset", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Get download URL for the asset
	 * 
	 * @param string $id 
	 * @param int $storageId 
	 * @param bool $forceProxy 
	 * @return string
	 */
	function getUrl($id, $storageId = null, $forceProxy = false, KalturaFlavorAssetUrlOptions $options = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "storageId", $storageId);
		$this->client->addParam($kparams, "forceProxy", $forceProxy);
		if ($options !== null)
			$this->client->addParam($kparams, "options", $options->toParams());
		$this->client->queueServiceActionCall("flavorasset", "getUrl", $kparams);
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
		$this->client->queueServiceActionCall("flavorasset", "getRemotePaths", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunRemotePathListResponse");
		return $resultObject;
	}

	/**
	 * Get download URL for the Flavor Asset
	 * 
	 * @param string $id 
	 * @param bool $useCdn 
	 * @return string
	 */
	function getDownloadUrl($id, $useCdn = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "useCdn", $useCdn);
		$this->client->queueServiceActionCall("flavorasset", "getDownloadUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Get Flavor Asset with the relevant Flavor Params (Flavor Params can exist without Flavor Asset & vice versa)
	 * 
	 * @param string $entryId 
	 * @return array
	 */
	function getFlavorAssetsWithParams($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("flavorasset", "getFlavorAssetsWithParams", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Manually export an asset
	 * 
	 * @param string $assetId 
	 * @param int $storageProfileId 
	 * @return VidiunFlavorAsset
	 */
	function export($assetId, $storageProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "assetId", $assetId);
		$this->client->addParam($vparams, "storageProfileId", $storageProfileId);
		$this->client->queueServiceActionCall("flavorasset", "export", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorAsset");
		return $resultObject;
	}

	/**
	 * Set a given flavor as the original flavor
	 * 
	 * @param string $assetId 
	 * @return 
	 */
	function setAsSource($assetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "assetId", $assetId);
		$this->client->queueServiceActionCall("flavorasset", "setAsSource", $vparams);
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
class VidiunFlavorParamsOutputService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get flavor params output object by ID
	 * 
	 * @param int $id 
	 * @return VidiunFlavorParamsOutput
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("flavorparamsoutput", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorParamsOutput");
		return $resultObject;
	}

	/**
	 * List flavor params output objects by filter and pager
	 * 
	 * @param VidiunFlavorParamsOutputFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunFlavorParamsOutputListResponse
	 */
	function listAction(VidiunFlavorParamsOutputFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("flavorparamsoutput", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorParamsOutputListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorParamsService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Flavor Params
	 * 
	 * @param VidiunFlavorParams $flavorParams 
	 * @return VidiunFlavorParams
	 */
	function add(VidiunFlavorParams $flavorParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "flavorParams", $flavorParams->toParams());
		$this->client->queueServiceActionCall("flavorparams", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorParams");
		return $resultObject;
	}

	/**
	 * Get Flavor Params by ID
	 * 
	 * @param int $id 
	 * @return VidiunFlavorParams
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("flavorparams", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorParams");
		return $resultObject;
	}

	/**
	 * Update Flavor Params by ID
	 * 
	 * @param int $id 
	 * @param VidiunFlavorParams $flavorParams 
	 * @return VidiunFlavorParams
	 */
	function update($id, VidiunFlavorParams $flavorParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "flavorParams", $flavorParams->toParams());
		$this->client->queueServiceActionCall("flavorparams", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorParams");
		return $resultObject;
	}

	/**
	 * Delete Flavor Params by ID
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("flavorparams", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List Flavor Params by filter with paging support (By default - all system default params will be listed too)
	 * 
	 * @param VidiunFlavorParamsFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunFlavorParamsListResponse
	 */
	function listAction(VidiunFlavorParamsFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("flavorparams", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFlavorParamsListResponse");
		return $resultObject;
	}

	/**
	 * Get Flavor Params by Conversion Profile ID
	 * 
	 * @param int $conversionProfileId 
	 * @return array
	 */
	function getByConversionProfileId($conversionProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		$this->client->queueServiceActionCall("flavorparams", "getByConversionProfileId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelSegmentService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new live channel segment
	 * 
	 * @param VidiunLiveChannelSegment $liveChannelSegment 
	 * @return VidiunLiveChannelSegment
	 */
	function add(VidiunLiveChannelSegment $liveChannelSegment)
	{
		$vparams = array();
		$this->client->addParam($vparams, "liveChannelSegment", $liveChannelSegment->toParams());
		$this->client->queueServiceActionCall("livechannelsegment", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannelSegment");
		return $resultObject;
	}

	/**
	 * Get live channel segment by id
	 * 
	 * @param int $id 
	 * @return VidiunLiveChannelSegment
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("livechannelsegment", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannelSegment");
		return $resultObject;
	}

	/**
	 * Update live channel segment by id
	 * 
	 * @param int $id 
	 * @param VidiunLiveChannelSegment $liveChannelSegment 
	 * @return VidiunLiveChannelSegment
	 */
	function update($id, VidiunLiveChannelSegment $liveChannelSegment)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "liveChannelSegment", $liveChannelSegment->toParams());
		$this->client->queueServiceActionCall("livechannelsegment", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannelSegment");
		return $resultObject;
	}

	/**
	 * Delete live channel segment by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("livechannelsegment", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List live channel segments by filter and pager
	 * 
	 * @param VidiunLiveChannelSegmentFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunLiveChannelSegmentListResponse
	 */
	function listAction(VidiunLiveChannelSegmentFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("livechannelsegment", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannelSegmentListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds new live channel.
	 * 
	 * @param VidiunLiveChannel $liveChannel Live channel metadata
	 * @return VidiunLiveChannel
	 */
	function add(VidiunLiveChannel $liveChannel)
	{
		$vparams = array();
		$this->client->addParam($vparams, "liveChannel", $liveChannel->toParams());
		$this->client->queueServiceActionCall("livechannel", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannel");
		return $resultObject;
	}

	/**
	 * Get live channel by ID.
	 * 
	 * @param string $id Live channel id
	 * @return VidiunLiveChannel
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("livechannel", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannel");
		return $resultObject;
	}

	/**
	 * Update live channel. Only the properties that were set will be updated.
	 * 
	 * @param string $id Live channel id to update
	 * @param VidiunLiveChannel $liveChannel Live channel metadata to update
	 * @return VidiunLiveChannel
	 */
	function update($id, VidiunLiveChannel $liveChannel)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "liveChannel", $liveChannel->toParams());
		$this->client->queueServiceActionCall("livechannel", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannel");
		return $resultObject;
	}

	/**
	 * Delete a live channel.
	 * 
	 * @param string $id Live channel id to delete
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("livechannel", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List live channels by filter with paging support.
	 * 
	 * @param VidiunLiveChannelFilter $filter Live channel filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunLiveChannelListResponse
	 */
	function listAction(VidiunLiveChannelFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("livechannel", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveChannelListResponse");
		return $resultObject;
	}

	/**
	 * Delivering the status of a live channel (on-air/offline)
	 * 
	 * @param string $id ID of the live channel
	 * @return bool
	 */
	function isLive($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("livechannel", "isLive", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Append recorded video to live entry
	 * 
	 * @param string $entryId Live entry id
	 * @param int $mediaServerIndex 
	 * @param VidiunDataCenterContentResource $resource 
	 * @param float $duration 
	 * @return VidiunLiveEntry
	 */
	function appendRecording($entryId, $mediaServerIndex, VidiunDataCenterContentResource $resource, $duration)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "mediaServerIndex", $mediaServerIndex);
		$this->client->addParam($vparams, "resource", $resource->toParams());
		$this->client->addParam($vparams, "duration", $duration);
		$this->client->queueServiceActionCall("livechannel", "appendRecording", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveEntry");
		return $resultObject;
	}

	/**
	 * Register media server to live entry
	 * 
	 * @param string $entryId Live entry id
	 * @param string $hostname Media server host name
	 * @param int $mediaServerIndex Media server index primary / secondary
	 * @return VidiunLiveEntry
	 */
	function registerMediaServer($entryId, $hostname, $mediaServerIndex)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "hostname", $hostname);
		$this->client->addParam($vparams, "mediaServerIndex", $mediaServerIndex);
		$this->client->queueServiceActionCall("livechannel", "registerMediaServer", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveEntry");
		return $resultObject;
	}

	/**
	 * Unregister media server from live entry
	 * 
	 * @param string $entryId Live entry id
	 * @param string $hostname Media server host name
	 * @param int $mediaServerIndex Media server index primary / secondary
	 * @return VidiunLiveEntry
	 */
	function unregisterMediaServer($entryId, $hostname, $mediaServerIndex)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "hostname", $hostname);
		$this->client->addParam($vparams, "mediaServerIndex", $mediaServerIndex);
		$this->client->queueServiceActionCall("livechannel", "unregisterMediaServer", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveEntry");
		return $resultObject;
	}

	/**
	 * Validates all registered media servers
	 * 
	 * @param string $entryId Live entry id
	 * @return 
	 */
	function validateRegisteredMediaServers($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("livechannel", "validateRegisteredMediaServers", $vparams);
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
class VidiunLiveStreamService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds new live stream entry.
	 The entry will be queued for provision.
	 * 
	 * @param VidiunLiveStreamEntry $liveStreamEntry Live stream entry metadata
	 * @param string $sourceType Live stream source type
	 * @return VidiunLiveStreamEntry
	 */
	function add(VidiunLiveStreamEntry $liveStreamEntry, $sourceType = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "liveStreamEntry", $liveStreamEntry->toParams());
		$this->client->addParam($vparams, "sourceType", $sourceType);
		$this->client->queueServiceActionCall("livestream", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveStreamEntry");
		return $resultObject;
	}

	/**
	 * Get live stream entry by ID.
	 * 
	 * @param string $entryId Live stream entry id
	 * @param int $version Desired version of the data
	 * @return VidiunLiveStreamEntry
	 */
	function get($entryId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("livestream", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveStreamEntry");
		return $resultObject;
	}

	/**
	 * Authenticate live-stream entry against stream token and partner limitations
	 * 
	 * @param string $entryId Live stream entry id
	 * @param string $token Live stream broadcasting token
	 * @return VidiunLiveStreamEntry
	 */
	function authenticate($entryId, $token)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "token", $token);
		$this->client->queueServiceActionCall("livestream", "authenticate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveStreamEntry");
		return $resultObject;
	}

	/**
	 * Update live stream entry. Only the properties that were set will be updated.
	 * 
	 * @param string $entryId Live stream entry id to update
	 * @param VidiunLiveStreamEntry $liveStreamEntry Live stream entry metadata to update
	 * @return VidiunLiveStreamEntry
	 */
	function update($entryId, VidiunLiveStreamEntry $liveStreamEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "liveStreamEntry", $liveStreamEntry->toParams());
		$this->client->queueServiceActionCall("livestream", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveStreamEntry");
		return $resultObject;
	}

	/**
	 * Delete a live stream entry.
	 * 
	 * @param string $entryId Live stream entry id to delete
	 * @return 
	 */
	function delete($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("livestream", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List live stream entries by filter with paging support.
	 * 
	 * @param VidiunLiveStreamEntryFilter $filter Live stream entry filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunLiveStreamListResponse
	 */
	function listAction(VidiunLiveStreamEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("livestream", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveStreamListResponse");
		return $resultObject;
	}

	/**
	 * Update live stream entry thumbnail using a raw jpeg file
	 * 
	 * @param string $entryId Live stream entry id
	 * @param file $fileData Jpeg file data
	 * @return VidiunLiveStreamEntry
	 */
	function updateOfflineThumbnailJpeg($entryId, $fileData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("livestream", "updateOfflineThumbnailJpeg", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveStreamEntry");
		return $resultObject;
	}

	/**
	 * Update entry thumbnail using url
	 * 
	 * @param string $entryId Live stream entry id
	 * @param string $url File url
	 * @return VidiunLiveStreamEntry
	 */
	function updateOfflineThumbnailFromUrl($entryId, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("livestream", "updateOfflineThumbnailFromUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveStreamEntry");
		return $resultObject;
	}

	/**
	 * Delivering the status of a live stream (on-air/offline) if it is possible
	 * 
	 * @param string $id ID of the live stream
	 * @param string $protocol Protocol of the stream to test.
	 * @return bool
	 */
	function isLive($id, $protocol)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "protocol", $protocol);
		$this->client->queueServiceActionCall("livestream", "isLive", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Append recorded video to live entry
	 * 
	 * @param string $entryId Live entry id
	 * @param int $mediaServerIndex 
	 * @param VidiunDataCenterContentResource $resource 
	 * @param float $duration 
	 * @return VidiunLiveEntry
	 */
	function appendRecording($entryId, $mediaServerIndex, VidiunDataCenterContentResource $resource, $duration)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "mediaServerIndex", $mediaServerIndex);
		$this->client->addParam($vparams, "resource", $resource->toParams());
		$this->client->addParam($vparams, "duration", $duration);
		$this->client->queueServiceActionCall("livestream", "appendRecording", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveEntry");
		return $resultObject;
	}

	/**
	 * Register media server to live entry
	 * 
	 * @param string $entryId Live entry id
	 * @param string $hostname Media server host name
	 * @param int $mediaServerIndex Media server index primary / secondary
	 * @return VidiunLiveEntry
	 */
	function registerMediaServer($entryId, $hostname, $mediaServerIndex)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "hostname", $hostname);
		$this->client->addParam($vparams, "mediaServerIndex", $mediaServerIndex);
		$this->client->queueServiceActionCall("livestream", "registerMediaServer", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveEntry");
		return $resultObject;
	}

	/**
	 * Unregister media server from live entry
	 * 
	 * @param string $entryId Live entry id
	 * @param string $hostname Media server host name
	 * @param int $mediaServerIndex Media server index primary / secondary
	 * @return VidiunLiveEntry
	 */
	function unregisterMediaServer($entryId, $hostname, $mediaServerIndex)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "hostname", $hostname);
		$this->client->addParam($vparams, "mediaServerIndex", $mediaServerIndex);
		$this->client->queueServiceActionCall("livestream", "unregisterMediaServer", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunLiveEntry");
		return $resultObject;
	}

	/**
	 * Validates all registered media servers
	 * 
	 * @param string $entryId Live entry id
	 * @return 
	 */
	function validateRegisteredMediaServers($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("livestream", "validateRegisteredMediaServers", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Creates perioding metadata sync-point events on a live stream
	 * 
	 * @param string $entryId Vidiun live-stream entry id
	 * @param int $interval Events interval in seconds
	 * @param int $duration Duration in seconds
	 * @return 
	 */
	function createPeriodicSyncPoints($entryId, $interval, $duration)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "interval", $interval);
		$this->client->addParam($vparams, "duration", $duration);
		$this->client->queueServiceActionCall("livestream", "createPeriodicSyncPoints", $vparams);
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
class VidiunMediaInfoService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List media info objects by filter and pager
	 * 
	 * @param VidiunMediaInfoFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunMediaInfoListResponse
	 */
	function listAction(VidiunMediaInfoFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("mediainfo", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaInfoListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaServerService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get media server by hostname
	 * 
	 * @param string $hostname 
	 * @return VidiunMediaServer
	 */
	function get($hostname)
	{
		$vparams = array();
		$this->client->addParam($vparams, "hostname", $hostname);
		$this->client->queueServiceActionCall("mediaserver", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaServer");
		return $resultObject;
	}

	/**
	 * Update media server status
	 * 
	 * @param string $hostname 
	 * @param VidiunMediaServerStatus $mediaServerStatus 
	 * @return VidiunMediaServer
	 */
	function reportStatus($hostname, VidiunMediaServerStatus $mediaServerStatus)
	{
		$vparams = array();
		$this->client->addParam($vparams, "hostname", $hostname);
		$this->client->addParam($vparams, "mediaServerStatus", $mediaServerStatus->toParams());
		$this->client->queueServiceActionCall("mediaserver", "reportStatus", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaServer");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add entry
	 * 
	 * @param VidiunMediaEntry $entry 
	 * @return VidiunMediaEntry
	 */
	function add(VidiunMediaEntry $entry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entry", $entry->toParams());
		$this->client->queueServiceActionCall("media", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Add content to media entry which is not yet associated with content (therefore is in status NO_CONTENT).
     If the requirement is to replace the entry's associated content, use action updateContent.
	 * 
	 * @param string $entryId 
	 * @param VidiunResource $resource 
	 * @return VidiunMediaEntry
	 */
	function addContent($entryId, VidiunResource $resource = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		if ($resource !== null)
			$this->client->addParam($vparams, "resource", $resource->toParams());
		$this->client->queueServiceActionCall("media", "addContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Adds new media entry by importing an HTTP or FTP URL.
	 The entry will be queued for import and then for conversion.
	 * 
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata
	 * @param string $url An HTTP or FTP URL
	 * @return VidiunMediaEntry
	 */
	function addFromUrl(VidiunMediaEntry $mediaEntry, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("media", "addFromUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Adds new media entry by importing the media file from a search provider.
	 This action should be used with the search service result.
	 * 
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata
	 * @param VidiunSearchResult $searchResult Result object from search service
	 * @return VidiunMediaEntry
	 */
	function addFromSearchResult(VidiunMediaEntry $mediaEntry = null, VidiunSearchResult $searchResult = null)
	{
		$vparams = array();
		if ($mediaEntry !== null)
			$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		if ($searchResult !== null)
			$this->client->addParam($vparams, "searchResult", $searchResult->toParams());
		$this->client->queueServiceActionCall("media", "addFromSearchResult", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Add new entry after the specific media file was uploaded and the upload token id exists
	 * 
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata
	 * @param string $uploadTokenId Upload token id
	 * @return VidiunMediaEntry
	 */
	function addFromUploadedFile(VidiunMediaEntry $mediaEntry, $uploadTokenId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($vparams, "uploadTokenId", $uploadTokenId);
		$this->client->queueServiceActionCall("media", "addFromUploadedFile", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Add new entry after the file was recored on the server and the token id exists
	 * 
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata
	 * @param string $webcamTokenId Token id for the recored webcam file
	 * @return VidiunMediaEntry
	 */
	function addFromRecordedWebcam(VidiunMediaEntry $mediaEntry, $webcamTokenId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($vparams, "webcamTokenId", $webcamTokenId);
		$this->client->queueServiceActionCall("media", "addFromRecordedWebcam", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Copy entry into new entry
	 * 
	 * @param string $sourceEntryId Media entry id to copy from
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata
	 * @param int $sourceFlavorParamsId The flavor to be used as the new entry source, source flavor will be used if not specified
	 * @return VidiunMediaEntry
	 */
	function addFromEntry($sourceEntryId, VidiunMediaEntry $mediaEntry = null, $sourceFlavorParamsId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "sourceEntryId", $sourceEntryId);
		if ($mediaEntry !== null)
			$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->addParam($vparams, "sourceFlavorParamsId", $sourceFlavorParamsId);
		$this->client->queueServiceActionCall("media", "addFromEntry", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Copy flavor asset into new entry
	 * 
	 * @param string $sourceFlavorAssetId Flavor asset id to be used as the new entry source
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata
	 * @return VidiunMediaEntry
	 */
	function addFromFlavorAsset($sourceFlavorAssetId, VidiunMediaEntry $mediaEntry = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "sourceFlavorAssetId", $sourceFlavorAssetId);
		if ($mediaEntry !== null)
			$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->queueServiceActionCall("media", "addFromFlavorAsset", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Convert entry
	 * 
	 * @param string $entryId Media entry id
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
		$this->client->queueServiceActionCall("media", "convert", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Get media entry by ID.
	 * 
	 * @param string $entryId Media entry id
	 * @param int $version Desired version of the data
	 * @return VidiunMediaEntry
	 */
	function get($entryId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("media", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Get MRSS by entry id
     XML will return as an escaped string
	 * 
	 * @param string $entryId Entry id
	 * @param array $extendingItemsArray 
	 * @return string
	 */
	function getMrss($entryId, array $extendingItemsArray = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		if ($extendingItemsArray !== null)
			foreach($extendingItemsArray as $index => $obj)
			{
				$this->client->addParam($vparams, "extendingItemsArray:$index", $obj->toParams());
			}
		$this->client->queueServiceActionCall("media", "getMrss", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Update media entry. Only the properties that were set will be updated.
	 * 
	 * @param string $entryId Media entry id to update
	 * @param VidiunMediaEntry $mediaEntry Media entry metadata to update
	 * @return VidiunMediaEntry
	 */
	function update($entryId, VidiunMediaEntry $mediaEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "mediaEntry", $mediaEntry->toParams());
		$this->client->queueServiceActionCall("media", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Replace content associated with the media entry.
	 * 
	 * @param string $entryId Media entry id to update
	 * @param VidiunResource $resource Resource to be used to replace entry media content
	 * @param int $conversionProfileId The conversion profile id to be used on the entry
	 * @return VidiunMediaEntry
	 */
	function updateContent($entryId, VidiunResource $resource, $conversionProfileId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "resource", $resource->toParams());
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		$this->client->queueServiceActionCall("media", "updateContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Delete a media entry.
	 * 
	 * @param string $entryId Media entry id to delete
	 * @return 
	 */
	function delete($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("media", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Approves media replacement
	 * 
	 * @param string $entryId Media entry id to replace
	 * @return VidiunMediaEntry
	 */
	function approveReplace($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("media", "approveReplace", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Cancels media replacement
	 * 
	 * @param string $entryId Media entry id to cancel
	 * @return VidiunMediaEntry
	 */
	function cancelReplace($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("media", "cancelReplace", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * List media entries by filter with paging support.
	 * 
	 * @param VidiunMediaEntryFilter $filter Media entry filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunMediaListResponse
	 */
	function listAction(VidiunMediaEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("media", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaListResponse");
		return $resultObject;
	}

	/**
	 * Count media entries by filter.
	 * 
	 * @param VidiunMediaEntryFilter $filter Media entry filter
	 * @return int
	 */
	function count(VidiunMediaEntryFilter $filter = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("media", "count", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Upload a media file to Vidiun, then the file can be used to create a media entry.
	 * 
	 * @param file $fileData The file data
	 * @return string
	 */
	function upload($fileData)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("media", "upload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Update media entry thumbnail by a specified time offset (In seconds)
	 If flavor params id not specified, source flavor will be used by default
	 * 
	 * @param string $entryId Media entry id
	 * @param int $timeOffset Time offset (in seconds)
	 * @param int $flavorParamsId The flavor params id to be used
	 * @return VidiunMediaEntry
	 */
	function updateThumbnail($entryId, $timeOffset, $flavorParamsId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "timeOffset", $timeOffset);
		$this->client->addParam($vparams, "flavorParamsId", $flavorParamsId);
		$this->client->queueServiceActionCall("media", "updateThumbnail", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Update media entry thumbnail from a different entry by a specified time offset (In seconds)
	 If flavor params id not specified, source flavor will be used by default
	 * 
	 * @param string $entryId Media entry id
	 * @param string $sourceEntryId Media entry id
	 * @param int $timeOffset Time offset (in seconds)
	 * @param int $flavorParamsId The flavor params id to be used
	 * @return VidiunMediaEntry
	 */
	function updateThumbnailFromSourceEntry($entryId, $sourceEntryId, $timeOffset, $flavorParamsId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "sourceEntryId", $sourceEntryId);
		$this->client->addParam($vparams, "timeOffset", $timeOffset);
		$this->client->addParam($vparams, "flavorParamsId", $flavorParamsId);
		$this->client->queueServiceActionCall("media", "updateThumbnailFromSourceEntry", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Update media entry thumbnail using a raw jpeg file
	 * 
	 * @param string $entryId Media entry id
	 * @param file $fileData Jpeg file data
	 * @return VidiunMediaEntry
	 */
	function updateThumbnailJpeg($entryId, $fileData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("media", "updateThumbnailJpeg", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMediaEntry");
		return $resultObject;
	}

	/**
	 * Update entry thumbnail using url
	 * 
	 * @param string $entryId Media entry id
	 * @param string $url File url
	 * @return VidiunBaseEntry
	 */
	function updateThumbnailFromUrl($entryId, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("media", "updateThumbnailFromUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Request a new conversion job, this can be used to convert the media entry to a different format
	 * 
	 * @param string $entryId Media entry id
	 * @param string $fileFormat Format to convert
	 * @return int
	 */
	function requestConversion($entryId, $fileFormat)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "fileFormat", $fileFormat);
		$this->client->queueServiceActionCall("media", "requestConversion", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Flag inappropriate media entry for moderation
	 * 
	 * @param VidiunModerationFlag $moderationFlag 
	 * @return 
	 */
	function flag(VidiunModerationFlag $moderationFlag)
	{
		$vparams = array();
		$this->client->addParam($vparams, "moderationFlag", $moderationFlag->toParams());
		$this->client->queueServiceActionCall("media", "flag", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Reject the media entry and mark the pending flags (if any) as moderated (this will make the entry non playable)
	 * 
	 * @param string $entryId 
	 * @return 
	 */
	function reject($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("media", "reject", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Approve the media entry and mark the pending flags (if any) as moderated (this will make the entry playable)
	 * 
	 * @param string $entryId 
	 * @return 
	 */
	function approve($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("media", "approve", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all pending flags for the media entry
	 * 
	 * @param string $entryId 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunModerationFlagListResponse
	 */
	function listFlags($entryId, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("media", "listFlags", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunModerationFlagListResponse");
		return $resultObject;
	}

	/**
	 * Anonymously rank a media entry, no validation is done on duplicate rankings
	 * 
	 * @param string $entryId 
	 * @param int $rank 
	 * @return 
	 */
	function anonymousRank($entryId, $rank)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "rank", $rank);
		$this->client->queueServiceActionCall("media", "anonymousRank", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Add new bulk upload batch job
	 Conversion profile id can be specified in the API or in the CSV file, the one in the CSV file will be stronger.
	 If no conversion profile was specified, partner's default will be used
	 * 
	 * @param file $fileData 
	 * @param VidiunBulkUploadJobData $bulkUploadData 
	 * @param VidiunBulkUploadEntryData $bulkUploadEntryData 
	 * @return VidiunBulkUpload
	 */
	function bulkUploadAdd($fileData, VidiunBulkUploadJobData $bulkUploadData = null, VidiunBulkUploadEntryData $bulkUploadEntryData = null)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		if ($bulkUploadData !== null)
			$this->client->addParam($vparams, "bulkUploadData", $bulkUploadData->toParams());
		if ($bulkUploadEntryData !== null)
			$this->client->addParam($vparams, "bulkUploadEntryData", $bulkUploadEntryData->toParams());
		$this->client->queueServiceActionCall("media", "bulkUploadAdd", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMixingService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new mix.
	 If the dataContent is null, a default timeline will be created.
	 * 
	 * @param VidiunMixEntry $mixEntry Mix entry metadata
	 * @return VidiunMixEntry
	 */
	function add(VidiunMixEntry $mixEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mixEntry", $mixEntry->toParams());
		$this->client->queueServiceActionCall("mixing", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMixEntry");
		return $resultObject;
	}

	/**
	 * Get mix entry by id.
	 * 
	 * @param string $entryId Mix entry id
	 * @param int $version Desired version of the data
	 * @return VidiunMixEntry
	 */
	function get($entryId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("mixing", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMixEntry");
		return $resultObject;
	}

	/**
	 * Update mix entry. Only the properties that were set will be updated.
	 * 
	 * @param string $entryId Mix entry id to update
	 * @param VidiunMixEntry $mixEntry Mix entry metadata to update
	 * @return VidiunMixEntry
	 */
	function update($entryId, VidiunMixEntry $mixEntry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "mixEntry", $mixEntry->toParams());
		$this->client->queueServiceActionCall("mixing", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMixEntry");
		return $resultObject;
	}

	/**
	 * Delete a mix entry.
	 * 
	 * @param string $entryId Mix entry id to delete
	 * @return 
	 */
	function delete($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("mixing", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List entries by filter with paging support.
	 Return parameter is an array of mix entries.
	 * 
	 * @param VidiunMixEntryFilter $filter Mix entry filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunMixListResponse
	 */
	function listAction(VidiunMixEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("mixing", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMixListResponse");
		return $resultObject;
	}

	/**
	 * Count mix entries by filter.
	 * 
	 * @param VidiunMediaEntryFilter $filter Media entry filter
	 * @return int
	 */
	function count(VidiunMediaEntryFilter $filter = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("mixing", "count", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * Clones an existing mix.
	 * 
	 * @param string $entryId Mix entry id to clone
	 * @return VidiunMixEntry
	 */
	function cloneAction($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("mixing", "clone", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMixEntry");
		return $resultObject;
	}

	/**
	 * Appends a media entry to a the end of the mix timeline, this will save the mix timeline as a new version.
	 * 
	 * @param string $mixEntryId Mix entry to append to its timeline
	 * @param string $mediaEntryId Media entry to append to the timeline
	 * @return VidiunMixEntry
	 */
	function appendMediaEntry($mixEntryId, $mediaEntryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mixEntryId", $mixEntryId);
		$this->client->addParam($vparams, "mediaEntryId", $mediaEntryId);
		$this->client->queueServiceActionCall("mixing", "appendMediaEntry", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunMixEntry");
		return $resultObject;
	}

	/**
	 * Get the mixes in which the media entry is included
	 * 
	 * @param string $mediaEntryId 
	 * @return array
	 */
	function getMixesByMediaId($mediaEntryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mediaEntryId", $mediaEntryId);
		$this->client->queueServiceActionCall("mixing", "getMixesByMediaId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Get all ready media entries that exist in the given mix id
	 * 
	 * @param string $mixId 
	 * @param int $version Desired version to get the data from
	 * @return array
	 */
	function getReadyMediaEntries($mixId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mixId", $mixId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("mixing", "getReadyMediaEntries", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Anonymously rank a mix entry, no validation is done on duplicate rankings
	 * 
	 * @param string $entryId 
	 * @param int $rank 
	 * @return 
	 */
	function anonymousRank($entryId, $rank)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "rank", $rank);
		$this->client->queueServiceActionCall("mixing", "anonymousRank", $vparams);
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
class VidiunNotificationService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return the notifications for a specific entry id and type
	 * 
	 * @param string $entryId 
	 * @param int $type 
	 * @return VidiunClientNotification
	 */
	function getClientNotification($entryId, $type)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "type", $type);
		$this->client->queueServiceActionCall("notification", "getClientNotification", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunClientNotification");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Create a new Partner object
	 * 
	 * @param VidiunPartner $partner 
	 * @param string $cmsPassword 
	 * @param int $templatePartnerId 
	 * @param bool $silent 
	 * @return VidiunPartner
	 */
	function register(VidiunPartner $partner, $cmsPassword = "", $templatePartnerId = null, $silent = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partner", $partner->toParams());
		$this->client->addParam($vparams, "cmsPassword", $cmsPassword);
		$this->client->addParam($vparams, "templatePartnerId", $templatePartnerId);
		$this->client->addParam($vparams, "silent", $silent);
		$this->client->queueServiceActionCall("partner", "register", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartner");
		return $resultObject;
	}

	/**
	 * Update details and settings of an existing partner
	 * 
	 * @param VidiunPartner $partner 
	 * @param bool $allowEmpty 
	 * @return VidiunPartner
	 */
	function update(VidiunPartner $partner, $allowEmpty = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partner", $partner->toParams());
		$this->client->addParam($vparams, "allowEmpty", $allowEmpty);
		$this->client->queueServiceActionCall("partner", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartner");
		return $resultObject;
	}

	/**
	 * Retrieve partner object by Id
	 * 
	 * @param int $id 
	 * @return VidiunPartner
	 */
	function get($id = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("partner", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartner");
		return $resultObject;
	}

	/**
	 * Retrieve partner secret and admin secret
	 * 
	 * @param int $partnerId 
	 * @param string $adminEmail 
	 * @param string $cmsPassword 
	 * @return VidiunPartner
	 */
	function getSecrets($partnerId, $adminEmail, $cmsPassword)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "adminEmail", $adminEmail);
		$this->client->addParam($vparams, "cmsPassword", $cmsPassword);
		$this->client->queueServiceActionCall("partner", "getSecrets", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartner");
		return $resultObject;
	}

	/**
	 * Retrieve all info attributed to the partner
	 This action expects no parameters. It returns information for the current VS partnerId.
	 * 
	 * @return VidiunPartner
	 */
	function getInfo()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("partner", "getInfo", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartner");
		return $resultObject;
	}

	/**
	 * Get usage statistics for a partner
	 Calculation is done according to partner's package
	 Additional data returned is a graph points of streaming usage in a timeframe
	 The resolution can be "days" or "months"
	 * 
	 * @param int $year 
	 * @param int $month 
	 * @param string $resolution 
	 * @return VidiunPartnerUsage
	 */
	function getUsage($year = "", $month = 1, $resolution = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "year", $year);
		$this->client->addParam($vparams, "month", $month);
		$this->client->addParam($vparams, "resolution", $resolution);
		$this->client->queueServiceActionCall("partner", "getUsage", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartnerUsage");
		return $resultObject;
	}

	/**
	 * Get usage statistics for a partner
	 Calculation is done according to partner's package
	 * 
	 * @return VidiunPartnerStatistics
	 */
	function getStatistics()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("partner", "getStatistics", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartnerStatistics");
		return $resultObject;
	}

	/**
	 * Retrieve a list of partner objects which the current user is allowed to access.
	 * 
	 * @param VidiunPartnerFilter $partnerFilter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunPartnerListResponse
	 */
	function listPartnersForUser(VidiunPartnerFilter $partnerFilter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($partnerFilter !== null)
			$this->client->addParam($vparams, "partnerFilter", $partnerFilter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("partner", "listPartnersForUser", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartnerListResponse");
		return $resultObject;
	}

	/**
	 * List partners by filter with paging support
	 Current implementation will only list the sub partners of the partner initiating the api call (using the current VS).
	 This action is only partially implemented to support listing sub partners of a VAR partner.
	 * 
	 * @param VidiunPartnerFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunPartnerListResponse
	 */
	function listAction(VidiunPartnerFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("partner", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartnerListResponse");
		return $resultObject;
	}

	/**
	 * List partner's current processes' statuses
	 * 
	 * @return VidiunFeatureStatusListResponse
	 */
	function listFeatureStatus()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("partner", "listFeatureStatus", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunFeatureStatusListResponse");
		return $resultObject;
	}

	/**
	 * Count partner's existing sub-publishers (count includes the partner itself).
	 * 
	 * @param VidiunPartnerFilter $filter 
	 * @return int
	 */
	function count(VidiunPartnerFilter $filter = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("partner", "count", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionItemService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new permission item object to the account.
	 This action is available only to Vidiun system administrators.
	 * 
	 * @param VidiunPermissionItem $permissionItem The new permission item
	 * @return VidiunPermissionItem
	 */
	function add(VidiunPermissionItem $permissionItem)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permissionItem", $permissionItem->toParams());
		$this->client->queueServiceActionCall("permissionitem", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermissionItem");
		return $resultObject;
	}

	/**
	 * Retrieves a permission item object using its ID.
	 * 
	 * @param int $permissionItemId The permission item's unique identifier
	 * @return VidiunPermissionItem
	 */
	function get($permissionItemId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permissionItemId", $permissionItemId);
		$this->client->queueServiceActionCall("permissionitem", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermissionItem");
		return $resultObject;
	}

	/**
	 * Updates an existing permission item object.
	 This action is available only to Vidiun system administrators.
	 * 
	 * @param int $permissionItemId The permission item's unique identifier
	 * @param VidiunPermissionItem $permissionItem Id The permission item's unique identifier
	 * @return VidiunPermissionItem
	 */
	function update($permissionItemId, VidiunPermissionItem $permissionItem)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permissionItemId", $permissionItemId);
		$this->client->addParam($vparams, "permissionItem", $permissionItem->toParams());
		$this->client->queueServiceActionCall("permissionitem", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermissionItem");
		return $resultObject;
	}

	/**
	 * Deletes an existing permission item object.
	 This action is available only to Vidiun system administrators.
	 * 
	 * @param int $permissionItemId The permission item's unique identifier
	 * @return VidiunPermissionItem
	 */
	function delete($permissionItemId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permissionItemId", $permissionItemId);
		$this->client->queueServiceActionCall("permissionitem", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermissionItem");
		return $resultObject;
	}

	/**
	 * Lists permission item objects that are associated with an account.
	 * 
	 * @param VidiunPermissionItemFilter $filter A filter used to exclude specific types of permission items
	 * @param VidiunFilterPager $pager A limit for the number of records to display on a page
	 * @return VidiunPermissionItemListResponse
	 */
	function listAction(VidiunPermissionItemFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("permissionitem", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermissionItemListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new permission object to the account.
	 * 
	 * @param VidiunPermission $permission The new permission
	 * @return VidiunPermission
	 */
	function add(VidiunPermission $permission)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permission", $permission->toParams());
		$this->client->queueServiceActionCall("permission", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermission");
		return $resultObject;
	}

	/**
	 * Retrieves a permission object using its ID.
	 * 
	 * @param string $permissionName The name assigned to the permission
	 * @return VidiunPermission
	 */
	function get($permissionName)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permissionName", $permissionName);
		$this->client->queueServiceActionCall("permission", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermission");
		return $resultObject;
	}

	/**
	 * Updates an existing permission object.
	 * 
	 * @param string $permissionName The name assigned to the permission
	 * @param VidiunPermission $permission Name The name assigned to the permission
	 * @return VidiunPermission
	 */
	function update($permissionName, VidiunPermission $permission)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permissionName", $permissionName);
		$this->client->addParam($vparams, "permission", $permission->toParams());
		$this->client->queueServiceActionCall("permission", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermission");
		return $resultObject;
	}

	/**
	 * Deletes an existing permission object.
	 * 
	 * @param string $permissionName The name assigned to the permission
	 * @return VidiunPermission
	 */
	function delete($permissionName)
	{
		$vparams = array();
		$this->client->addParam($vparams, "permissionName", $permissionName);
		$this->client->queueServiceActionCall("permission", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermission");
		return $resultObject;
	}

	/**
	 * Lists permission objects that are associated with an account.
	 Blocked permissions are listed unless you use a filter to exclude them.
	 Blocked permissions are listed unless you use a filter to exclude them.
	 * 
	 * @param VidiunPermissionFilter $filter A filter used to exclude specific types of permissions
	 * @param VidiunFilterPager $pager A limit for the number of records to display on a page
	 * @return VidiunPermissionListResponse
	 */
	function listAction(VidiunPermissionFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("permission", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPermissionListResponse");
		return $resultObject;
	}

	/**
	 * Retrieves a list of permissions that apply to the current VS.
	 * 
	 * @return string
	 */
	function getCurrentPermissions()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("permission", "getCurrentPermissions", $vparams);
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
class VidiunPlaylistService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new playlist
	 Note that all entries used in a playlist will become public and may appear in VidiunNetwork
	 * 
	 * @param VidiunPlaylist $playlist 
	 * @param bool $updateStats Indicates that the playlist statistics attributes should be updated synchronously now
	 * @return VidiunPlaylist
	 */
	function add(VidiunPlaylist $playlist, $updateStats = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "playlist", $playlist->toParams());
		$this->client->addParam($vparams, "updateStats", $updateStats);
		$this->client->queueServiceActionCall("playlist", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPlaylist");
		return $resultObject;
	}

	/**
	 * Retrieve a playlist
	 * 
	 * @param string $id 
	 * @param int $version Desired version of the data
	 * @return VidiunPlaylist
	 */
	function get($id, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("playlist", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPlaylist");
		return $resultObject;
	}

	/**
	 * Update existing playlist
	 Note - you cannot change playlist type. updated playlist must be of the same type.
	 * 
	 * @param string $id 
	 * @param VidiunPlaylist $playlist 
	 * @param bool $updateStats 
	 * @return VidiunPlaylist
	 */
	function update($id, VidiunPlaylist $playlist, $updateStats = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "playlist", $playlist->toParams());
		$this->client->addParam($vparams, "updateStats", $updateStats);
		$this->client->queueServiceActionCall("playlist", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPlaylist");
		return $resultObject;
	}

	/**
	 * Delete existing playlist
	 * 
	 * @param string $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("playlist", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Clone an existing playlist
	 * 
	 * @param string $id Id of the playlist to clone
	 * @param VidiunPlaylist $newPlaylist Parameters defined here will override the ones in the cloned playlist
	 * @return VidiunPlaylist
	 */
	function cloneAction($id, VidiunPlaylist $newPlaylist = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		if ($newPlaylist !== null)
			$this->client->addParam($vparams, "newPlaylist", $newPlaylist->toParams());
		$this->client->queueServiceActionCall("playlist", "clone", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPlaylist");
		return $resultObject;
	}

	/**
	 * List available playlists
	 * 
	 * @param VidiunPlaylistFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunPlaylistListResponse
	 */
	function listAction(VidiunPlaylistFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("playlist", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPlaylistListResponse");
		return $resultObject;
	}

	/**
	 * Retrieve playlist for playing purpose
	 * 
	 * @param string $id 
	 * @param string $detailed 
	 * @param VidiunContext $playlistContext 
	 * @param VidiunMediaEntryFilterForPlaylist $filter 
	 * @return array
	 */
	function execute($id, $detailed = "", VidiunContext $playlistContext = null, VidiunMediaEntryFilterForPlaylist $filter = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "detailed", $detailed);
		if ($playlistContext !== null)
			$this->client->addParam($vparams, "playlistContext", $playlistContext->toParams());
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("playlist", "execute", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Retrieve playlist for playing purpose, based on content
	 * 
	 * @param int $playlistType 
	 * @param string $playlistContent 
	 * @param string $detailed 
	 * @return array
	 */
	function executeFromContent($playlistType, $playlistContent, $detailed = "")
	{
		$vparams = array();
		$this->client->addParam($vparams, "playlistType", $playlistType);
		$this->client->addParam($vparams, "playlistContent", $playlistContent);
		$this->client->addParam($vparams, "detailed", $detailed);
		$this->client->queueServiceActionCall("playlist", "executeFromContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Revrieve playlist for playing purpose, based on media entry filters
	 * 
	 * @param array $filters 
	 * @param int $totalResults 
	 * @param string $detailed 
	 * @return array
	 */
	function executeFromFilters(array $filters, $totalResults, $detailed = "")
	{
		$vparams = array();
		foreach($filters as $index => $obj)
		{
			$this->client->addParam($vparams, "filters:$index", $obj->toParams());
		}
		$this->client->addParam($vparams, "totalResults", $totalResults);
		$this->client->addParam($vparams, "detailed", $detailed);
		$this->client->queueServiceActionCall("playlist", "executeFromFilters", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Retrieve playlist statistics
	 * 
	 * @param int $playlistType 
	 * @param string $playlistContent 
	 * @return VidiunPlaylist
	 */
	function getStatsFromContent($playlistType, $playlistContent)
	{
		$vparams = array();
		$this->client->addParam($vparams, "playlistType", $playlistType);
		$this->client->addParam($vparams, "playlistContent", $playlistContent);
		$this->client->queueServiceActionCall("playlist", "getStatsFromContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPlaylist");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Report getGraphs action allows to get a graph data for a specific report.
	 * 
	 * @param int $reportType 
	 * @param VidiunReportInputFilter $reportInputFilter 
	 * @param string $dimension 
	 * @param string $objectIds - one ID or more (separated by ',') of specific objects to query
	 * @return array
	 */
	function getGraphs($reportType, VidiunReportInputFilter $reportInputFilter, $dimension = null, $objectIds = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "reportType", $reportType);
		$this->client->addParam($vparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($vparams, "dimension", $dimension);
		$this->client->addParam($vparams, "objectIds", $objectIds);
		$this->client->queueServiceActionCall("report", "getGraphs", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Report getTotal action allows to get a graph data for a specific report.
	 * 
	 * @param int $reportType 
	 * @param VidiunReportInputFilter $reportInputFilter 
	 * @param string $objectIds - one ID or more (separated by ',') of specific objects to query
	 * @return VidiunReportTotal
	 */
	function getTotal($reportType, VidiunReportInputFilter $reportInputFilter, $objectIds = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "reportType", $reportType);
		$this->client->addParam($vparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($vparams, "objectIds", $objectIds);
		$this->client->queueServiceActionCall("report", "getTotal", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReportTotal");
		return $resultObject;
	}

	/**
	 * Report getBaseTotal action allows to get a the total base for storage reports
	 * 
	 * @param int $reportType 
	 * @param VidiunReportInputFilter $reportInputFilter 
	 * @param string $objectIds - one ID or more (separated by ',') of specific objects to query
	 * @return array
	 */
	function getBaseTotal($reportType, VidiunReportInputFilter $reportInputFilter, $objectIds = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "reportType", $reportType);
		$this->client->addParam($vparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($vparams, "objectIds", $objectIds);
		$this->client->queueServiceActionCall("report", "getBaseTotal", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Report getTable action allows to get a graph data for a specific report.
	 * 
	 * @param int $reportType 
	 * @param VidiunReportInputFilter $reportInputFilter 
	 * @param VidiunFilterPager $pager 
	 * @param string $order 
	 * @param string $objectIds - one ID or more (separated by ',') of specific objects to query
	 * @return VidiunReportTable
	 */
	function getTable($reportType, VidiunReportInputFilter $reportInputFilter, VidiunFilterPager $pager, $order = null, $objectIds = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "reportType", $reportType);
		$this->client->addParam($vparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->addParam($vparams, "order", $order);
		$this->client->addParam($vparams, "objectIds", $objectIds);
		$this->client->queueServiceActionCall("report", "getTable", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReportTable");
		return $resultObject;
	}

	/**
	 * Will create a Csv file for the given report and return the URL to access it
	 * 
	 * @param string $reportTitle The title of the report to display at top of CSV
	 * @param string $reportText The text of the filter of the report
	 * @param string $headers The headers of the columns - a map between the enumerations on the server side and the their display text
	 * @param int $reportType 
	 * @param VidiunReportInputFilter $reportInputFilter 
	 * @param string $dimension 
	 * @param VidiunFilterPager $pager 
	 * @param string $order 
	 * @param string $objectIds - one ID or more (separated by ',') of specific objects to query
	 * @return string
	 */
	function getUrlForReportAsCsv($reportTitle, $reportText, $headers, $reportType, VidiunReportInputFilter $reportInputFilter, $dimension = null, VidiunFilterPager $pager = null, $order = null, $objectIds = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "reportTitle", $reportTitle);
		$this->client->addParam($vparams, "reportText", $reportText);
		$this->client->addParam($vparams, "headers", $headers);
		$this->client->addParam($vparams, "reportType", $reportType);
		$this->client->addParam($vparams, "reportInputFilter", $reportInputFilter->toParams());
		$this->client->addParam($vparams, "dimension", $dimension);
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->addParam($vparams, "order", $order);
		$this->client->addParam($vparams, "objectIds", $objectIds);
		$this->client->queueServiceActionCall("report", "getUrlForReportAsCsv", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @param array $params 
	 * @return VidiunReportResponse
	 */
	function execute($id, array $params = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		if ($params !== null)
			foreach($params as $index => $obj)
			{
				$this->client->addParam($vparams, "params:$index", $obj->toParams());
			}
		$this->client->queueServiceActionCall("report", "execute", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReportResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @param array $params 
	 * @return file
	 */
	function getCsv($id, array $params = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		if ($params !== null)
			foreach($params as $index => $obj)
			{
				$this->client->addParam($vparams, "params:$index", $obj->toParams());
			}
		$this->client->queueServiceActionCall("report", "getCsv", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Returns report CSV file executed by string params with the following convention: param1=value1;param2=value2
	 * 
	 * @param int $id 
	 * @param string $params 
	 * @return file
	 */
	function getCsvFromStringParams($id, $params = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "params", $params);
		$this->client->queueServiceActionCall("report", "getCsvFromStringParams", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSchemaService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Serves the requested XSD according to the type and name.
	 * 
	 * @param string $type 
	 * @return file
	 */
	function serve($type)
	{
		$vparams = array();
		$this->client->addParam($vparams, "type", $type);
		$this->client->queueServiceActionCall("schema", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Search for media in one of the supported media providers
	 * 
	 * @param VidiunSearch $search A VidiunSearch object contains the search keywords, media provider and media type
	 * @param VidiunFilterPager $pager 
	 * @return VidiunSearchResultResponse
	 */
	function search(VidiunSearch $search, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "search", $search->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("search", "search", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSearchResultResponse");
		return $resultObject;
	}

	/**
	 * Retrieve extra information about media found in search action
	 Some providers return only part of the fields needed to create entry from, use this action to get the rest of the fields.
	 * 
	 * @param VidiunSearchResult $searchResult VidiunSearchResult object extends VidiunSearch and has all fields required for media:add
	 * @return VidiunSearchResult
	 */
	function getMediaInfo(VidiunSearchResult $searchResult)
	{
		$vparams = array();
		$this->client->addParam($vparams, "searchResult", $searchResult->toParams());
		$this->client->queueServiceActionCall("search", "getMediaInfo", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSearchResult");
		return $resultObject;
	}

	/**
	 * Search for media given a specific URL
	 Vidiun supports a searchURL action on some of the media providers.
	 This action will return a VidiunSearchResult object based on a given URL (assuming the media provider is supported)
	 * 
	 * @param int $mediaType 
	 * @param string $url 
	 * @return VidiunSearchResult
	 */
	function searchUrl($mediaType, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "mediaType", $mediaType);
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("search", "searchUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSearchResult");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $searchSource 
	 * @param string $userName 
	 * @param string $password 
	 * @return VidiunSearchAuthData
	 */
	function externalLogin($searchSource, $userName, $password)
	{
		$vparams = array();
		$this->client->addParam($vparams, "searchSource", $searchSource);
		$this->client->addParam($vparams, "userName", $userName);
		$this->client->addParam($vparams, "password", $password);
		$this->client->queueServiceActionCall("search", "externalLogin", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSearchAuthData");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSessionService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Start a session with Vidiun's server.
	 The result VS is the session key that you should pass to all services that requires a ticket.
	 * 
	 * @param string $secret Remember to provide the correct secret according to the sessionType you want
	 * @param string $userId 
	 * @param int $type Regular session or Admin session
	 * @param int $partnerId 
	 * @param int $expiry VS expiry time in seconds
	 * @param string $privileges 
	 * @return string
	 */
	function start($secret, $userId = "", $type = 0, $partnerId = null, $expiry = 86400, $privileges = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "secret", $secret);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "type", $type);
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "expiry", $expiry);
		$this->client->addParam($vparams, "privileges", $privileges);
		$this->client->queueServiceActionCall("session", "start", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * End a session with the Vidiun server, making the current VS invalid.
	 * 
	 * @return 
	 */
	function end()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("session", "end", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Start an impersonated session with Vidiun's server.
	 The result VS is the session key that you should pass to all services that requires a ticket.
	 * 
	 * @param string $secret - should be the secret (admin or user) of the original partnerId (not impersonatedPartnerId).
	 * @param int $impersonatedPartnerId 
	 * @param string $userId - impersonated userId
	 * @param int $type 
	 * @param int $partnerId 
	 * @param int $expiry VS expiry time in seconds
	 * @param string $privileges 
	 * @return string
	 */
	function impersonate($secret, $impersonatedPartnerId, $userId = "", $type = 0, $partnerId = null, $expiry = 86400, $privileges = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "secret", $secret);
		$this->client->addParam($vparams, "impersonatedPartnerId", $impersonatedPartnerId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "type", $type);
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "expiry", $expiry);
		$this->client->addParam($vparams, "privileges", $privileges);
		$this->client->queueServiceActionCall("session", "impersonate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Start an impersonated session with Vidiun's server.
	 The result VS info contains the session key that you should pass to all services that requires a ticket.
	 Type, expiry and privileges won't be changed if they're not set
	 * 
	 * @param string $session The old VS of the impersonated partner
	 * @param int $type Type of the new VS
	 * @param int $expiry Expiry time in seconds of the new VS
	 * @param string $privileges Privileges of the new VS
	 * @return VidiunSessionInfo
	 */
	function impersonateByVs($session, $type = null, $expiry = null, $privileges = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "session", $session);
		$this->client->addParam($vparams, "type", $type);
		$this->client->addParam($vparams, "expiry", $expiry);
		$this->client->addParam($vparams, "privileges", $privileges);
		$this->client->queueServiceActionCall("session", "impersonateByVs", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSessionInfo");
		return $resultObject;
	}

	/**
	 * Parse session key and return its info
	 * 
	 * @param string $session The VS to be parsed, keep it empty to use current session.
	 * @return VidiunSessionInfo
	 */
	function get($session = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "session", $session);
		$this->client->queueServiceActionCall("session", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSessionInfo");
		return $resultObject;
	}

	/**
	 * Start a session for Vidiun's flash widgets
	 * 
	 * @param string $widgetId 
	 * @param int $expiry 
	 * @return VidiunStartWidgetSessionResponse
	 */
	function startWidgetSession($widgetId, $expiry = 86400)
	{
		$vparams = array();
		$this->client->addParam($vparams, "widgetId", $widgetId);
		$this->client->addParam($vparams, "expiry", $expiry);
		$this->client->queueServiceActionCall("session", "startWidgetSession", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunStartWidgetSessionResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStatsService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Will write to the event log a single line representing the event
	 client version - will help interprete the line structure. different client versions might have slightly different data/data formats in the line
event_id - number is the row number in yuval's excel
datetime - same format as MySql's datetime - can change and should reflect the time zone
session id - can be some big random number or guid
partner id
entry id
unique viewer
widget id
ui_conf id
uid - the puser id as set by the ppartner
current point - in milliseconds
duration - milliseconds
user ip
process duration - in milliseconds
control id
seek
new point
referrer
	
	
	 VidiunStatsEvent $event
	 * 
	 * @param VidiunStatsEvent $event 
	 * @return bool
	 */
	function collect(VidiunStatsEvent $event)
	{
		$vparams = array();
		$this->client->addParam($vparams, "event", $event->toParams());
		$this->client->queueServiceActionCall("stats", "collect", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Will collect the vmcEvent sent form the VMC client
	 // this will actually be an empty function because all events will be sent using GET and will anyway be logged in the apache log
	 * 
	 * @param VidiunStatsVmcEvent $vmcEvent 
	 * @return 
	 */
	function vmcCollect(VidiunStatsVmcEvent $vmcEvent)
	{
		$vparams = array();
		$this->client->addParam($vparams, "vmcEvent", $vmcEvent->toParams());
		$this->client->queueServiceActionCall("stats", "vmcCollect", $vparams);
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
	 * @param VidiunCEError $vidiunCEError 
	 * @return VidiunCEError
	 */
	function reportVceError(VidiunCEError $vidiunCEError)
	{
		$vparams = array();
		$this->client->addParam($vparams, "vidiunCEError", $vidiunCEError->toParams());
		$this->client->queueServiceActionCall("stats", "reportVceError", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCEError");
		return $resultObject;
	}

	/**
	 * Use this action to report errors to the vidiun server.
	 * 
	 * @param string $errorCode 
	 * @param string $errorMessage 
	 * @return 
	 */
	function reportError($errorCode, $errorMessage)
	{
		$vparams = array();
		$this->client->addParam($vparams, "errorCode", $errorCode);
		$this->client->addParam($vparams, "errorMessage", $errorMessage);
		$this->client->queueServiceActionCall("stats", "reportError", $vparams);
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
class VidiunStorageProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a storage profile to the Vidiun DB.
	 * 
	 * @param VidiunStorageProfile $storageProfile 
	 * @return VidiunStorageProfile
	 */
	function add(VidiunStorageProfile $storageProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "storageProfile", $storageProfile->toParams());
		$this->client->queueServiceActionCall("storageprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunStorageProfile");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $storageId 
	 * @param int $status 
	 * @return 
	 */
	function updateStatus($storageId, $status)
	{
		$vparams = array();
		$this->client->addParam($vparams, "storageId", $storageId);
		$this->client->addParam($vparams, "status", $status);
		$this->client->queueServiceActionCall("storageprofile", "updateStatus", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Get storage profile by id
	 * 
	 * @param int $storageProfileId 
	 * @return VidiunStorageProfile
	 */
	function get($storageProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "storageProfileId", $storageProfileId);
		$this->client->queueServiceActionCall("storageprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunStorageProfile");
		return $resultObject;
	}

	/**
	 * Update storage profile by id
	 * 
	 * @param int $storageProfileId 
	 * @param VidiunStorageProfile $storageProfile Id
	 * @return VidiunStorageProfile
	 */
	function update($storageProfileId, VidiunStorageProfile $storageProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "storageProfileId", $storageProfileId);
		$this->client->addParam($vparams, "storageProfile", $storageProfile->toParams());
		$this->client->queueServiceActionCall("storageprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunStorageProfile");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param VidiunStorageProfileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunStorageProfileListResponse
	 */
	function listAction(VidiunStorageProfileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("storageprofile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunStorageProfileListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationFeedService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Syndication Feed
	 * 
	 * @param VidiunBaseSyndicationFeed $syndicationFeed 
	 * @return VidiunBaseSyndicationFeed
	 */
	function add(VidiunBaseSyndicationFeed $syndicationFeed)
	{
		$vparams = array();
		$this->client->addParam($vparams, "syndicationFeed", $syndicationFeed->toParams());
		$this->client->queueServiceActionCall("syndicationfeed", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseSyndicationFeed");
		return $resultObject;
	}

	/**
	 * Get Syndication Feed by ID
	 * 
	 * @param string $id 
	 * @return VidiunBaseSyndicationFeed
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("syndicationfeed", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseSyndicationFeed");
		return $resultObject;
	}

	/**
	 * Update Syndication Feed by ID
	 * 
	 * @param string $id 
	 * @param VidiunBaseSyndicationFeed $syndicationFeed 
	 * @return VidiunBaseSyndicationFeed
	 */
	function update($id, VidiunBaseSyndicationFeed $syndicationFeed)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "syndicationFeed", $syndicationFeed->toParams());
		$this->client->queueServiceActionCall("syndicationfeed", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseSyndicationFeed");
		return $resultObject;
	}

	/**
	 * Delete Syndication Feed by ID
	 * 
	 * @param string $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("syndicationfeed", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List Syndication Feeds by filter with paging support
	 * 
	 * @param VidiunBaseSyndicationFeedFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunBaseSyndicationFeedListResponse
	 */
	function listAction(VidiunBaseSyndicationFeedFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("syndicationfeed", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseSyndicationFeedListResponse");
		return $resultObject;
	}

	/**
	 * Get entry count for a syndication feed
	 * 
	 * @param string $feedId 
	 * @return VidiunSyndicationFeedEntryCount
	 */
	function getEntryCount($feedId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "feedId", $feedId);
		$this->client->queueServiceActionCall("syndicationfeed", "getEntryCount", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSyndicationFeedEntryCount");
		return $resultObject;
	}

	/**
	 * Request conversion for all entries that doesnt have the required flavor param
	 returns a comma-separated ids of conversion jobs
	 * 
	 * @param string $feedId 
	 * @return string
	 */
	function requestConversion($feedId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "feedId", $feedId);
		$this->client->queueServiceActionCall("syndicationfeed", "requestConversion", $vparams);
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
class VidiunSystemService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * 
	 * 
	 * @return bool
	 */
	function ping()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("system", "ping", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @return bool
	 */
	function pingDatabase()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("system", "pingDatabase", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @return int
	 */
	function getTime()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("system", "getTime", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbAssetService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add thumbnail asset
	 * 
	 * @param string $entryId 
	 * @param VidiunThumbAsset $thumbAsset 
	 * @return VidiunThumbAsset
	 */
	function add($entryId, VidiunThumbAsset $thumbAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "thumbAsset", $thumbAsset->toParams());
		$this->client->queueServiceActionCall("thumbasset", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * Update content of thumbnail asset
	 * 
	 * @param string $id 
	 * @param VidiunContentResource $contentResource 
	 * @return VidiunThumbAsset
	 */
	function setContent($id, VidiunContentResource $contentResource)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "contentResource", $contentResource->toParams());
		$this->client->queueServiceActionCall("thumbasset", "setContent", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * Update thumbnail asset
	 * 
	 * @param string $id 
	 * @param VidiunThumbAsset $thumbAsset 
	 * @return VidiunThumbAsset
	 */
	function update($id, VidiunThumbAsset $thumbAsset)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "thumbAsset", $thumbAsset->toParams());
		$this->client->queueServiceActionCall("thumbasset", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * Serves thumbnail by entry id and thumnail params id
	 * 
	 * @param string $entryId 
	 * @param int $thumbParamId If not set, default thumbnail will be used.
	 * @return file
	 */
	function serveByEntryId($entryId, $thumbParamId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "thumbParamId", $thumbParamId);
		$this->client->queueServiceActionCall("thumbasset", "serveByEntryId", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Serves thumbnail by its id
	 * 
	 * @param string $thumbAssetId 
	 * @param int $version 
	 * @param VidiunThumbParams $thumbParams 
	 * @param VidiunThumbnailServeOptions $options 
	 * @return file
	 */
	function serve($thumbAssetId, $version = null, VidiunThumbParams $thumbParams = null, VidiunThumbnailServeOptions $options = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "thumbAssetId", $thumbAssetId);
		$this->client->addParam($vparams, "version", $version);
		if ($thumbParams !== null)
			$this->client->addParam($vparams, "thumbParams", $thumbParams->toParams());
		if ($options !== null)
			$this->client->addParam($vparams, "options", $options->toParams());
		$this->client->queueServiceActionCall("thumbasset", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Tags the thumbnail as DEFAULT_THUMB and removes that tag from all other thumbnail assets of the entry.
	 Create a new file sync link on the entry thumbnail that points to the thumbnail asset file sync.
	 * 
	 * @param string $thumbAssetId 
	 * @return 
	 */
	function setAsDefault($thumbAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "thumbAssetId", $thumbAssetId);
		$this->client->queueServiceActionCall("thumbasset", "setAsDefault", $vparams);
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
	 * @param string $entryId 
	 * @param int $destThumbParamsId Indicate the id of the ThumbParams to be generate this thumbnail by
	 * @return VidiunThumbAsset
	 */
	function generateByEntryId($entryId, $destThumbParamsId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "destThumbParamsId", $destThumbParamsId);
		$this->client->queueServiceActionCall("thumbasset", "generateByEntryId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $entryId 
	 * @param VidiunThumbParams $thumbParams 
	 * @param string $sourceAssetId Id of the source asset (flavor or thumbnail) to be used as source for the thumbnail generation
	 * @return VidiunThumbAsset
	 */
	function generate($entryId, VidiunThumbParams $thumbParams, $sourceAssetId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "thumbParams", $thumbParams->toParams());
		$this->client->addParam($vparams, "sourceAssetId", $sourceAssetId);
		$this->client->queueServiceActionCall("thumbasset", "generate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $thumbAssetId 
	 * @return VidiunThumbAsset
	 */
	function regenerate($thumbAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "thumbAssetId", $thumbAssetId);
		$this->client->queueServiceActionCall("thumbasset", "regenerate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $thumbAssetId 
	 * @return VidiunThumbAsset
	 */
	function get($thumbAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "thumbAssetId", $thumbAssetId);
		$this->client->queueServiceActionCall("thumbasset", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $entryId 
	 * @return array
	 */
	function getByEntryId($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("thumbasset", "getByEntryId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * List Thumbnail Assets by filter and pager
	 * 
	 * @param VidiunAssetFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunThumbAssetListResponse
	 */
	function listAction(VidiunAssetFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("thumbasset", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAssetListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $entryId 
	 * @param string $url 
	 * @return VidiunThumbAsset
	 */
	function addFromUrl($entryId, $url)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "url", $url);
		$this->client->queueServiceActionCall("thumbasset", "addFromUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $entryId 
	 * @param file $fileData 
	 * @return VidiunThumbAsset
	 */
	function addFromImage($entryId, $fileData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("thumbasset", "addFromImage", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbAsset");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $thumbAssetId 
	 * @return 
	 */
	function delete($thumbAssetId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "thumbAssetId", $thumbAssetId);
		$this->client->queueServiceActionCall("thumbasset", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Get download URL for the asset
	 * 
	 * @param string $id 
	 * @param int $storageId 
	 * @param VidiunThumbParams $thumbParams 
	 * @return string
	 */
	function getUrl($id, $storageId = null, VidiunThumbParams $thumbParams = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "storageId", $storageId);
		if ($thumbParams !== null)
			$this->client->addParam($vparams, "thumbParams", $thumbParams->toParams());
		$this->client->queueServiceActionCall("thumbasset", "getUrl", $vparams);
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
		$this->client->queueServiceActionCall("thumbasset", "getRemotePaths", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunRemotePathListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsOutputService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get thumb params output object by ID
	 * 
	 * @param int $id 
	 * @return VidiunThumbParamsOutput
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("thumbparamsoutput", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbParamsOutput");
		return $resultObject;
	}

	/**
	 * List thumb params output objects by filter and pager
	 * 
	 * @param VidiunThumbParamsOutputFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunThumbParamsOutputListResponse
	 */
	function listAction(VidiunThumbParamsOutputFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("thumbparamsoutput", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbParamsOutputListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Thumb Params
	 * 
	 * @param VidiunThumbParams $thumbParams 
	 * @return VidiunThumbParams
	 */
	function add(VidiunThumbParams $thumbParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "thumbParams", $thumbParams->toParams());
		$this->client->queueServiceActionCall("thumbparams", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbParams");
		return $resultObject;
	}

	/**
	 * Get Thumb Params by ID
	 * 
	 * @param int $id 
	 * @return VidiunThumbParams
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("thumbparams", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbParams");
		return $resultObject;
	}

	/**
	 * Update Thumb Params by ID
	 * 
	 * @param int $id 
	 * @param VidiunThumbParams $thumbParams 
	 * @return VidiunThumbParams
	 */
	function update($id, VidiunThumbParams $thumbParams)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "thumbParams", $thumbParams->toParams());
		$this->client->queueServiceActionCall("thumbparams", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbParams");
		return $resultObject;
	}

	/**
	 * Delete Thumb Params by ID
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("thumbparams", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List Thumb Params by filter with paging support (By default - all system default params will be listed too)
	 * 
	 * @param VidiunThumbParamsFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunThumbParamsListResponse
	 */
	function listAction(VidiunThumbParamsFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("thumbparams", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunThumbParamsListResponse");
		return $resultObject;
	}

	/**
	 * Get Thumb Params by Conversion Profile ID
	 * 
	 * @param int $conversionProfileId 
	 * @return array
	 */
	function getByConversionProfileId($conversionProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "conversionProfileId", $conversionProfileId);
		$this->client->queueServiceActionCall("thumbparams", "getByConversionProfileId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * UIConf Add action allows you to add a UIConf to Vidiun DB
	 * 
	 * @param VidiunUiConf $uiConf Mandatory input parameter of type VidiunUiConf
	 * @return VidiunUiConf
	 */
	function add(VidiunUiConf $uiConf)
	{
		$vparams = array();
		$this->client->addParam($vparams, "uiConf", $uiConf->toParams());
		$this->client->queueServiceActionCall("uiconf", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConf");
		return $resultObject;
	}

	/**
	 * Update an existing UIConf
	 * 
	 * @param int $id 
	 * @param VidiunUiConf $uiConf 
	 * @return VidiunUiConf
	 */
	function update($id, VidiunUiConf $uiConf)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "uiConf", $uiConf->toParams());
		$this->client->queueServiceActionCall("uiconf", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConf");
		return $resultObject;
	}

	/**
	 * Retrieve a UIConf by id
	 * 
	 * @param int $id 
	 * @return VidiunUiConf
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("uiconf", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConf");
		return $resultObject;
	}

	/**
	 * Delete an existing UIConf
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("uiconf", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Clone an existing UIConf
	 * 
	 * @param int $id 
	 * @return VidiunUiConf
	 */
	function cloneAction($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("uiconf", "clone", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConf");
		return $resultObject;
	}

	/**
	 * Retrieve a list of available template UIConfs
	 * 
	 * @param VidiunUiConfFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunUiConfListResponse
	 */
	function listTemplates(VidiunUiConfFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("uiconf", "listTemplates", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConfListResponse");
		return $resultObject;
	}

	/**
	 * Retrieve a list of available UIConfs
	 * 
	 * @param VidiunUiConfFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunUiConfListResponse
	 */
	function listAction(VidiunUiConfFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("uiconf", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConfListResponse");
		return $resultObject;
	}

	/**
	 * Retrieve a list of all available versions by object type
	 * 
	 * @return array
	 */
	function getAvailableTypes()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("uiconf", "getAvailableTypes", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * 
	 * 
	 * @param file $fileData The file data
	 * @return string
	 */
	function upload($fileData)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("upload", "upload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param string $fileName 
	 * @return VidiunUploadResponse
	 */
	function getUploadedFileTokenByFileName($fileName)
	{
		$vparams = array();
		$this->client->addParam($vparams, "fileName", $fileName);
		$this->client->queueServiceActionCall("upload", "getUploadedFileTokenByFileName", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUploadResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadTokenService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds new upload token to upload a file
	 * 
	 * @param VidiunUploadToken $uploadToken 
	 * @return VidiunUploadToken
	 */
	function add(VidiunUploadToken $uploadToken = null)
	{
		$vparams = array();
		if ($uploadToken !== null)
			$this->client->addParam($vparams, "uploadToken", $uploadToken->toParams());
		$this->client->queueServiceActionCall("uploadtoken", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUploadToken");
		return $resultObject;
	}

	/**
	 * Get upload token by id
	 * 
	 * @param string $uploadTokenId 
	 * @return VidiunUploadToken
	 */
	function get($uploadTokenId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "uploadTokenId", $uploadTokenId);
		$this->client->queueServiceActionCall("uploadtoken", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUploadToken");
		return $resultObject;
	}

	/**
	 * Upload a file using the upload token id, returns an error on failure (an exception will be thrown when using one of the Vidiun clients)
	 * 
	 * @param string $uploadTokenId 
	 * @param file $fileData 
	 * @param bool $resume 
	 * @param bool $finalChunk 
	 * @param float $resumeAt 
	 * @return VidiunUploadToken
	 */
	function upload($uploadTokenId, $fileData, $resume = false, $finalChunk = true, $resumeAt = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "uploadTokenId", $uploadTokenId);
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		$this->client->addParam($vparams, "resume", $resume);
		$this->client->addParam($vparams, "finalChunk", $finalChunk);
		$this->client->addParam($vparams, "resumeAt", $resumeAt);
		$this->client->queueServiceActionCall("uploadtoken", "upload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUploadToken");
		return $resultObject;
	}

	/**
	 * Deletes the upload token by upload token id
	 * 
	 * @param string $uploadTokenId 
	 * @return 
	 */
	function delete($uploadTokenId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "uploadTokenId", $uploadTokenId);
		$this->client->queueServiceActionCall("uploadtoken", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List upload token by filter with pager support. 
	 When using a user session the service will be restricted to users objects only.
	 * 
	 * @param VidiunUploadTokenFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunUploadTokenListResponse
	 */
	function listAction(VidiunUploadTokenFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("uploadtoken", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUploadTokenListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserRoleService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new user role object to the account.
	 * 
	 * @param VidiunUserRole $userRole A new role
	 * @return VidiunUserRole
	 */
	function add(VidiunUserRole $userRole)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userRole", $userRole->toParams());
		$this->client->queueServiceActionCall("userrole", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserRole");
		return $resultObject;
	}

	/**
	 * Retrieves a user role object using its ID.
	 * 
	 * @param int $userRoleId The user role's unique identifier
	 * @return VidiunUserRole
	 */
	function get($userRoleId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userRoleId", $userRoleId);
		$this->client->queueServiceActionCall("userrole", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserRole");
		return $resultObject;
	}

	/**
	 * Updates an existing user role object.
	 * 
	 * @param int $userRoleId The user role's unique identifier
	 * @param VidiunUserRole $userRole Id The user role's unique identifier
	 * @return VidiunUserRole
	 */
	function update($userRoleId, VidiunUserRole $userRole)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userRoleId", $userRoleId);
		$this->client->addParam($vparams, "userRole", $userRole->toParams());
		$this->client->queueServiceActionCall("userrole", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserRole");
		return $resultObject;
	}

	/**
	 * Deletes an existing user role object.
	 * 
	 * @param int $userRoleId The user role's unique identifier
	 * @return VidiunUserRole
	 */
	function delete($userRoleId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userRoleId", $userRoleId);
		$this->client->queueServiceActionCall("userrole", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserRole");
		return $resultObject;
	}

	/**
	 * Lists user role objects that are associated with an account.
	 Blocked user roles are listed unless you use a filter to exclude them.
	 Deleted user roles are not listed unless you use a filter to include them.
	 * 
	 * @param VidiunUserRoleFilter $filter A filter used to exclude specific types of user roles
	 * @param VidiunFilterPager $pager A limit for the number of records to display on a page
	 * @return VidiunUserRoleListResponse
	 */
	function listAction(VidiunUserRoleFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("userrole", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserRoleListResponse");
		return $resultObject;
	}

	/**
	 * Creates a new user role object that is a duplicate of an existing role.
	 * 
	 * @param int $userRoleId The user role's unique identifier
	 * @return VidiunUserRole
	 */
	function cloneAction($userRoleId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userRoleId", $userRoleId);
		$this->client->queueServiceActionCall("userrole", "clone", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserRole");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new user to an existing account in the Vidiun database.
	 Input param $id is the unique identifier in the partner's system.
	 * 
	 * @param VidiunUser $user The new user
	 * @return VidiunUser
	 */
	function add(VidiunUser $user)
	{
		$vparams = array();
		$this->client->addParam($vparams, "user", $user->toParams());
		$this->client->queueServiceActionCall("user", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUser");
		return $resultObject;
	}

	/**
	 * Updates an existing user object.
	 You can also use this action to update the userId.
	 * 
	 * @param string $userId The user's unique identifier in the partner's system
	 * @param VidiunUser $user Id The user's unique identifier in the partner's system
	 * @return VidiunUser
	 */
	function update($userId, VidiunUser $user)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "user", $user->toParams());
		$this->client->queueServiceActionCall("user", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUser");
		return $resultObject;
	}

	/**
	 * Retrieves a user object for a specified user ID.
	 * 
	 * @param string $userId The user's unique identifier in the partner's system
	 * @return VidiunUser
	 */
	function get($userId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("user", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUser");
		return $resultObject;
	}

	/**
	 * Retrieves a user object for a user's login ID and partner ID.
	 A login ID is the email address used by a user to log into the system.
	 * 
	 * @param string $loginId The user's email address that identifies the user for login
	 * @return VidiunUser
	 */
	function getByLoginId($loginId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "loginId", $loginId);
		$this->client->queueServiceActionCall("user", "getByLoginId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUser");
		return $resultObject;
	}

	/**
	 * Deletes a user from a partner account.
	 * 
	 * @param string $userId The user's unique identifier in the partner's system
	 * @return VidiunUser
	 */
	function delete($userId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("user", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUser");
		return $resultObject;
	}

	/**
	 * Lists user objects that are associated with an account.
	 Blocked users are listed unless you use a filter to exclude them.
	 Deleted users are not listed unless you use a filter to include them.
	 * 
	 * @param VidiunUserFilter $filter A filter used to exclude specific types of users
	 * @param VidiunFilterPager $pager A limit for the number of records to display on a page
	 * @return VidiunUserListResponse
	 */
	function listAction(VidiunUserFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("user", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserListResponse");
		return $resultObject;
	}

	/**
	 * Notifies that a user is banned from an account.
	 * 
	 * @param string $userId The user's unique identifier in the partner's system
	 * @return 
	 */
	function notifyBan($userId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("user", "notifyBan", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Logs a user into a partner account with a partner ID, a partner user ID (puser), and a user password.
	 * 
	 * @param int $partnerId The identifier of the partner account
	 * @param string $userId The user's unique identifier in the partner's system
	 * @param string $password The user's password
	 * @param int $expiry The requested time (in seconds) before the generated VS expires (By default, a VS expires after 24 hours).
	 * @param string $privileges Special privileges
	 * @return string
	 */
	function login($partnerId, $userId, $password, $expiry = 86400, $privileges = "*")
	{
		$vparams = array();
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "password", $password);
		$this->client->addParam($vparams, "expiry", $expiry);
		$this->client->addParam($vparams, "privileges", $privileges);
		$this->client->queueServiceActionCall("user", "login", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Logs a user into a partner account with a user login ID and a user password.
	 * 
	 * @param string $loginId The user's email address that identifies the user for login
	 * @param string $password The user's password
	 * @param int $partnerId The identifier of the partner account
	 * @param int $expiry The requested time (in seconds) before the generated VS expires (By default, a VS expires after 24 hours).
	 * @param string $privileges Special privileges
	 * @return string
	 */
	function loginByLoginId($loginId, $password, $partnerId = null, $expiry = 86400, $privileges = "*")
	{
		$vparams = array();
		$this->client->addParam($vparams, "loginId", $loginId);
		$this->client->addParam($vparams, "password", $password);
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "expiry", $expiry);
		$this->client->addParam($vparams, "privileges", $privileges);
		$this->client->queueServiceActionCall("user", "loginByLoginId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Updates a user's login data: email, password, name.
	 * 
	 * @param string $oldLoginId The user's current email address that identified the user for login
	 * @param string $password The user's current email address that identified the user for login
	 * @param string $newLoginId Optional, The user's email address that will identify the user for login
	 * @param string $newPassword Optional, The user's new password
	 * @param string $newFirstName Optional, The user's new first name
	 * @param string $newLastName Optional, The user's new last name
	 * @return 
	 */
	function updateLoginData($oldLoginId, $password, $newLoginId = "", $newPassword = "", $newFirstName = null, $newLastName = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "oldLoginId", $oldLoginId);
		$this->client->addParam($vparams, "password", $password);
		$this->client->addParam($vparams, "newLoginId", $newLoginId);
		$this->client->addParam($vparams, "newPassword", $newPassword);
		$this->client->addParam($vparams, "newFirstName", $newFirstName);
		$this->client->addParam($vparams, "newLastName", $newLastName);
		$this->client->queueServiceActionCall("user", "updateLoginData", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Reset user's password and send the user an email to generate a new one.
	 * 
	 * @param string $email The user's email address (login email)
	 * @return 
	 */
	function resetPassword($email)
	{
		$vparams = array();
		$this->client->addParam($vparams, "email", $email);
		$this->client->queueServiceActionCall("user", "resetPassword", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Set initial users password
	 * 
	 * @param string $hashKey The hash key used to identify the user (retrieved by email)
	 * @param string $newPassword The new password to set for the user
	 * @return 
	 */
	function setInitialPassword($hashKey, $newPassword)
	{
		$vparams = array();
		$this->client->addParam($vparams, "hashKey", $hashKey);
		$this->client->addParam($vparams, "newPassword", $newPassword);
		$this->client->queueServiceActionCall("user", "setInitialPassword", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Enables a user to log into a partner account using an email address and a password
	 * 
	 * @param string $userId The user's unique identifier in the partner's system
	 * @param string $loginId The user's email address that identifies the user for login
	 * @param string $password The user's password
	 * @return VidiunUser
	 */
	function enableLogin($userId, $loginId, $password = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "loginId", $loginId);
		$this->client->addParam($vparams, "password", $password);
		$this->client->queueServiceActionCall("user", "enableLogin", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUser");
		return $resultObject;
	}

	/**
	 * Disables a user's ability to log into a partner account using an email address and a password.
	 You may use either a userId or a loginId parameter for this action.
	 * 
	 * @param string $userId The user's unique identifier in the partner's system
	 * @param string $loginId The user's email address that identifies the user for login
	 * @return VidiunUser
	 */
	function disableLogin($userId = null, $loginId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "loginId", $loginId);
		$this->client->queueServiceActionCall("user", "disableLogin", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUser");
		return $resultObject;
	}

	/**
	 * Index an entry by id.
	 * 
	 * @param string $id 
	 * @param bool $shouldUpdate 
	 * @return string
	 */
	function index($id, $shouldUpdate = true)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "shouldUpdate", $shouldUpdate);
		$this->client->queueServiceActionCall("user", "index", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param file $fileData 
	 * @param VidiunBulkUploadJobData $bulkUploadData 
	 * @param VidiunBulkUploadUserData $bulkUploadUserData 
	 * @return VidiunBulkUpload
	 */
	function addFromBulkUpload($fileData, VidiunBulkUploadJobData $bulkUploadData = null, VidiunBulkUploadUserData $bulkUploadUserData = null)
	{
		$vparams = array();
		$vfiles = array();
		$this->client->addParam($vfiles, "fileData", $fileData);
		if ($bulkUploadData !== null)
			$this->client->addParam($vparams, "bulkUploadData", $bulkUploadData->toParams());
		if ($bulkUploadUserData !== null)
			$this->client->addParam($vparams, "bulkUploadUserData", $bulkUploadUserData->toParams());
		$this->client->queueServiceActionCall("user", "addFromBulkUpload", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}

	/**
	 * Action which checks whther user login
	 * 
	 * @param VidiunUserLoginDataFilter $filter 
	 * @return bool
	 */
	function checkLoginDataExists(VidiunUserLoginDataFilter $filter)
	{
		$vparams = array();
		$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("user", "checkLoginDataExists", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidgetService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new widget, can be attached to entry or vshow
	 SourceWidget is ignored.
	 * 
	 * @param VidiunWidget $widget 
	 * @return VidiunWidget
	 */
	function add(VidiunWidget $widget)
	{
		$vparams = array();
		$this->client->addParam($vparams, "widget", $widget->toParams());
		$this->client->queueServiceActionCall("widget", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunWidget");
		return $resultObject;
	}

	/**
	 * Update exisiting widget
	 * 
	 * @param string $id 
	 * @param VidiunWidget $widget 
	 * @return VidiunWidget
	 */
	function update($id, VidiunWidget $widget)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "widget", $widget->toParams());
		$this->client->queueServiceActionCall("widget", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunWidget");
		return $resultObject;
	}

	/**
	 * Get widget by id
	 * 
	 * @param string $id 
	 * @return VidiunWidget
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("widget", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunWidget");
		return $resultObject;
	}

	/**
	 * Add widget based on existing widget.
	 Must provide valid sourceWidgetId
	 * 
	 * @param VidiunWidget $widget 
	 * @return VidiunWidget
	 */
	function cloneAction(VidiunWidget $widget)
	{
		$vparams = array();
		$this->client->addParam($vparams, "widget", $widget->toParams());
		$this->client->queueServiceActionCall("widget", "clone", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunWidget");
		return $resultObject;
	}

	/**
	 * Retrieve a list of available widget depends on the filter given
	 * 
	 * @param VidiunWidgetFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunWidgetListResponse
	 */
	function listAction(VidiunWidgetFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("widget", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunWidgetListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunXInternalService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Creates new download job for multiple entry ids (comma separated), an email will be sent when the job is done
	 This sevice support the following entries: 
	 - MediaEntry
	 - Video will be converted using the flavor params id
	 - Audio will be downloaded as MP3
	 - Image will be downloaded as Jpeg
	 - MixEntry will be flattened using the flavor params id
	 - Other entry types are not supported
	 Returns the admin email that the email message will be sent to
	 * 
	 * @param string $entryIds Comma separated list of entry ids
	 * @param string $flavorParamsId 
	 * @return string
	 */
	function xAddBulkDownload($entryIds, $flavorParamsId = "")
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryIds", $entryIds);
		$this->client->addParam($vparams, "flavorParamsId", $flavorParamsId);
		$this->client->queueServiceActionCall("xinternal", "xAddBulkDownload", $vparams);
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
class VidiunClient extends VidiunClientBase
{
	/**
	 * @var string
	 */
	protected $apiVersion = '3.1.6';

	/**
	 * Manage access control profiles
	 * @var VidiunAccessControlProfileService
	 */
	public $accessControlProfile = null;

	/**
	 * Add & Manage Access Controls
	 * @var VidiunAccessControlService
	 */
	public $accessControl = null;

	/**
	 * Manage details for the administrative user
	 * @var VidiunAdminUserService
	 */
	public $adminUser = null;

	/**
	 * Base Entry Service
	 * @var VidiunBaseEntryService
	 */
	public $baseEntry = null;

	/**
	 * Bulk upload service is used to upload & manage bulk uploads using CSV files.
	 *  This service manages only entry bulk uploads.
	 * @var VidiunBulkUploadService
	 */
	public $bulkUpload = null;

	/**
	 * Add & Manage CategoryEntry - assign entry to category
	 * @var VidiunCategoryEntryService
	 */
	public $categoryEntry = null;

	/**
	 * Add & Manage Categories
	 * @var VidiunCategoryService
	 */
	public $category = null;

	/**
	 * Add & Manage CategoryUser - membership of a user in a category
	 * @var VidiunCategoryUserService
	 */
	public $categoryUser = null;

	/**
	 * Manage the connection between Conversion Profiles and Asset Params
	 * @var VidiunConversionProfileAssetParamsService
	 */
	public $conversionProfileAssetParams = null;

	/**
	 * Add & Manage Conversion Profiles
	 * @var VidiunConversionProfileService
	 */
	public $conversionProfile = null;

	/**
	 * Data service lets you manage data content (textual content)
	 * @var VidiunDataService
	 */
	public $data = null;

	/**
	 * Document service
	 * @var VidiunDocumentService
	 */
	public $document = null;

	/**
	 * EmailIngestionProfile service lets you manage email ingestion profile records
	 * @var VidiunEmailIngestionProfileService
	 */
	public $EmailIngestionProfile = null;

	/**
	 * Manage file assets
	 * @var VidiunFileAssetService
	 */
	public $fileAsset = null;

	/**
	 * Retrieve information and invoke actions on Flavor Asset
	 * @var VidiunFlavorAssetService
	 */
	public $flavorAsset = null;

	/**
	 * Flavor Params Output service
	 * @var VidiunFlavorParamsOutputService
	 */
	public $flavorParamsOutput = null;

	/**
	 * Add & Manage Flavor Params
	 * @var VidiunFlavorParamsService
	 */
	public $flavorParams = null;

	/**
	 * Manage live channel segments
	 * @var VidiunLiveChannelSegmentService
	 */
	public $liveChannelSegment = null;

	/**
	 * Live Channel service lets you manage live channels
	 * @var VidiunLiveChannelService
	 */
	public $liveChannel = null;

	/**
	 * Live Stream service lets you manage live stream entries
	 * @var VidiunLiveStreamService
	 */
	public $liveStream = null;

	/**
	 * Media Info service
	 * @var VidiunMediaInfoService
	 */
	public $mediaInfo = null;

	/**
	 * Manage media servers
	 * @var VidiunMediaServerService
	 */
	public $mediaServer = null;

	/**
	 * Media service lets you upload and manage media files (images / videos & audio)
	 * @var VidiunMediaService
	 */
	public $media = null;

	/**
	 * A Mix is an XML unique format invented by Vidiun, it allows the user to create a mix of videos and images, in and out points, transitions, text overlays, soundtrack, effects and much more...
	 *  Mixing service lets you create a new mix, manage its metadata and make basic manipulations.
	 * @var VidiunMixingService
	 */
	public $mixing = null;

	/**
	 * Notification Service
	 * @var VidiunNotificationService
	 */
	public $notification = null;

	/**
	 * Partner service allows you to change/manage your partner personal details and settings as well
	 * @var VidiunPartnerService
	 */
	public $partner = null;

	/**
	 * PermissionItem service lets you create and manage permission items
	 * @var VidiunPermissionItemService
	 */
	public $permissionItem = null;

	/**
	 * Permission service lets you create and manage user permissions
	 * @var VidiunPermissionService
	 */
	public $permission = null;

	/**
	 * Playlist service lets you create,manage and play your playlists
	 *  Playlists could be static (containing a fixed list of entries) or dynamic (baseed on a filter)
	 * @var VidiunPlaylistService
	 */
	public $playlist = null;

	/**
	 * Api for getting reports data by the report type and some inputFilter
	 * @var VidiunReportService
	 */
	public $report = null;

	/**
	 * Expose the schema definitions for syndication MRSS, bulk upload XML and other schema types.
	 * @var VidiunSchemaService
	 */
	public $schema = null;

	/**
	 * Search service allows you to search for media in various media providers
	 *  This service is being used mostly by the CW component
	 * @var VidiunSearchService
	 */
	public $search = null;

	/**
	 * Session service
	 * @var VidiunSessionService
	 */
	public $session = null;

	/**
	 * Stats Service
	 * @var VidiunStatsService
	 */
	public $stats = null;

	/**
	 * Storage Profiles service
	 * @var VidiunStorageProfileService
	 */
	public $storageProfile = null;

	/**
	 * Add & Manage Syndication Feeds
	 * @var VidiunSyndicationFeedService
	 */
	public $syndicationFeed = null;

	/**
	 * System service is used for internal system helpers & to retrieve system level information
	 * @var VidiunSystemService
	 */
	public $system = null;

	/**
	 * Retrieve information and invoke actions on Thumb Asset
	 * @var VidiunThumbAssetService
	 */
	public $thumbAsset = null;

	/**
	 * Thumbnail Params Output service
	 * @var VidiunThumbParamsOutputService
	 */
	public $thumbParamsOutput = null;

	/**
	 * Add & Manage Thumb Params
	 * @var VidiunThumbParamsService
	 */
	public $thumbParams = null;

	/**
	 * UiConf service lets you create and manage your UIConfs for the various flash components
	 *  This service is used by the VMC-ApplicationStudio
	 * @var VidiunUiConfService
	 */
	public $uiConf = null;

	/**
	 * 
	 * @var VidiunUploadService
	 */
	public $upload = null;

	/**
	 * 
	 * @var VidiunUploadTokenService
	 */
	public $uploadToken = null;

	/**
	 * UserRole service lets you create and manage user roles
	 * @var VidiunUserRoleService
	 */
	public $userRole = null;

	/**
	 * Manage partner users on Vidiun's side
	 *  The userId in vidiun is the unique Id in the partner's system, and the [partnerId,Id] couple are unique key in vidiun's DB
	 * @var VidiunUserService
	 */
	public $user = null;

	/**
	 * Widget service for full widget management
	 * @var VidiunWidgetService
	 */
	public $widget = null;

	/**
	 * Internal Service is used for actions that are used internally in Vidiun applications and might be changed in the future without any notice.
	 * @var VidiunXInternalService
	 */
	public $xInternal = null;

	/**
	 * Vidiun client constructor
	 *
	 * @param VidiunConfiguration $config
	 */
	public function __construct(VidiunConfiguration $config)
	{
		parent::__construct($config);
		
		$this->accessControlProfile = new VidiunAccessControlProfileService($this);
		$this->accessControl = new VidiunAccessControlService($this);
		$this->adminUser = new VidiunAdminUserService($this);
		$this->baseEntry = new VidiunBaseEntryService($this);
		$this->bulkUpload = new VidiunBulkUploadService($this);
		$this->categoryEntry = new VidiunCategoryEntryService($this);
		$this->category = new VidiunCategoryService($this);
		$this->categoryUser = new VidiunCategoryUserService($this);
		$this->conversionProfileAssetParams = new VidiunConversionProfileAssetParamsService($this);
		$this->conversionProfile = new VidiunConversionProfileService($this);
		$this->data = new VidiunDataService($this);
		$this->document = new VidiunDocumentService($this);
		$this->EmailIngestionProfile = new VidiunEmailIngestionProfileService($this);
		$this->fileAsset = new VidiunFileAssetService($this);
		$this->flavorAsset = new VidiunFlavorAssetService($this);
		$this->flavorParamsOutput = new VidiunFlavorParamsOutputService($this);
		$this->flavorParams = new VidiunFlavorParamsService($this);
		$this->liveChannelSegment = new VidiunLiveChannelSegmentService($this);
		$this->liveChannel = new VidiunLiveChannelService($this);
		$this->liveStream = new VidiunLiveStreamService($this);
		$this->mediaInfo = new VidiunMediaInfoService($this);
		$this->mediaServer = new VidiunMediaServerService($this);
		$this->media = new VidiunMediaService($this);
		$this->mixing = new VidiunMixingService($this);
		$this->notification = new VidiunNotificationService($this);
		$this->partner = new VidiunPartnerService($this);
		$this->permissionItem = new VidiunPermissionItemService($this);
		$this->permission = new VidiunPermissionService($this);
		$this->playlist = new VidiunPlaylistService($this);
		$this->report = new VidiunReportService($this);
		$this->schema = new VidiunSchemaService($this);
		$this->search = new VidiunSearchService($this);
		$this->session = new VidiunSessionService($this);
		$this->stats = new VidiunStatsService($this);
		$this->storageProfile = new VidiunStorageProfileService($this);
		$this->syndicationFeed = new VidiunSyndicationFeedService($this);
		$this->system = new VidiunSystemService($this);
		$this->thumbAsset = new VidiunThumbAssetService($this);
		$this->thumbParamsOutput = new VidiunThumbParamsOutputService($this);
		$this->thumbParams = new VidiunThumbParamsService($this);
		$this->uiConf = new VidiunUiConfService($this);
		$this->upload = new VidiunUploadService($this);
		$this->uploadToken = new VidiunUploadTokenService($this);
		$this->userRole = new VidiunUserRoleService($this);
		$this->user = new VidiunUserService($this);
		$this->widget = new VidiunWidgetService($this);
		$this->xInternal = new VidiunXInternalService($this);
	}
	
}


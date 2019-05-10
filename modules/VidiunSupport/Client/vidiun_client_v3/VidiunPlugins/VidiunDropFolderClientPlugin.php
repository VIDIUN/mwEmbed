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
require_once(dirname(__FILE__) . "/VidiunMetadataClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderContentFileHandlerMatchPolicy
{
	const ADD_AS_NEW = 1;
	const MATCH_EXISTING_OR_ADD_AS_NEW = 2;
	const MATCH_EXISTING_OR_KEEP_IN_FOLDER = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileDeletePolicy
{
	const MANUAL_DELETE = 1;
	const AUTO_DELETE = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileStatus
{
	const UPLOADING = 1;
	const PENDING = 2;
	const WAITING = 3;
	const HANDLED = 4;
	const IGNORE = 5;
	const DELETED = 6;
	const PURGED = 7;
	const NO_MATCH = 8;
	const ERROR_HANDLING = 9;
	const ERROR_DELETING = 10;
	const DOWNLOADING = 11;
	const ERROR_DOWNLOADING = 12;
	const PROCESSING = 13;
	const PARSED = 14;
	const DETECTED = 15;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderStatus
{
	const DISABLED = 0;
	const ENABLED = 1;
	const DELETED = 2;
	const ERROR = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderErrorCode
{
	const ERROR_CONNECT = "1";
	const ERROR_AUTENTICATE = "2";
	const ERROR_GET_PHISICAL_FILE_LIST = "3";
	const ERROR_GET_DB_FILE_LIST = "4";
	const DROP_FOLDER_APP_ERROR = "5";
	const CONTENT_MATCH_POLICY_UNDEFINED = "6";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileErrorCode
{
	const ERROR_ADDING_BULK_UPLOAD = "dropFolderXmlBulkUpload.ERROR_ADDING_BULK_UPLOAD";
	const ERROR_ADD_CONTENT_RESOURCE = "dropFolderXmlBulkUpload.ERROR_ADD_CONTENT_RESOURCE";
	const ERROR_IN_BULK_UPLOAD = "dropFolderXmlBulkUpload.ERROR_IN_BULK_UPLOAD";
	const ERROR_WRITING_TEMP_FILE = "dropFolderXmlBulkUpload.ERROR_WRITING_TEMP_FILE";
	const LOCAL_FILE_WRONG_CHECKSUM = "dropFolderXmlBulkUpload.LOCAL_FILE_WRONG_CHECKSUM";
	const LOCAL_FILE_WRONG_SIZE = "dropFolderXmlBulkUpload.LOCAL_FILE_WRONG_SIZE";
	const MALFORMED_XML_FILE = "dropFolderXmlBulkUpload.MALFORMED_XML_FILE";
	const XML_FILE_SIZE_EXCEED_LIMIT = "dropFolderXmlBulkUpload.XML_FILE_SIZE_EXCEED_LIMIT";
	const ERROR_UPDATE_ENTRY = "1";
	const ERROR_ADD_ENTRY = "2";
	const FLAVOR_NOT_FOUND = "3";
	const FLAVOR_MISSING_IN_FILE_NAME = "4";
	const SLUG_REGEX_NO_MATCH = "5";
	const ERROR_READING_FILE = "6";
	const ERROR_DOWNLOADING_FILE = "7";
	const ERROR_UPDATE_FILE = "8";
	const ERROR_ADDING_CONTENT_PROCESSOR = "10";
	const ERROR_IN_CONTENT_PROCESSOR = "11";
	const ERROR_DELETING_FILE = "12";
	const FILE_NO_MATCH = "13";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileHandlerType
{
	const XML = "dropFolderXmlBulkUpload.XML";
	const CONTENT = "1";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileOrderBy
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
class VidiunDropFolderOrderBy
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
class VidiunDropFolderType
{
	const LOCAL = "1";
	const FTP = "2";
	const SCP = "3";
	const SFTP = "4";
	const S3 = "6";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFtpDropFolderOrderBy
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
class VidiunRemoteDropFolderOrderBy
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
class VidiunScpDropFolderOrderBy
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
class VidiunSftpDropFolderOrderBy
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
class VidiunSshDropFolderOrderBy
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
abstract class VidiunDropFolderFileHandlerConfig extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunDropFolderFileHandlerType
	 * @readonly
	 */
	public $handlerType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolder extends VidiunObjectBase
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
	 * @insertonly
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
	public $description = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $conversionProfileId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $dc = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $path = null;

	/**
	 * The ammount of time, in seconds, that should pass so that a file with no change in size we'll be treated as "finished uploading to folder"
	 * 	 
	 *
	 * @var int
	 */
	public $fileSizeCheckInterval = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileDeletePolicy
	 */
	public $fileDeletePolicy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $autoFileDeleteDays = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileHandlerType
	 */
	public $fileHandlerType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileNamePatterns = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileHandlerConfig
	 */
	public $fileHandlerConfig;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderErrorCode
	 */
	public $errorCode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorDescription = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $ignoreFileNamePatterns = null;

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
	 * @var int
	 */
	public $lastAccessedAt = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $incremental = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $lastFileTimestamp = null;

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
class VidiunDropFolderFile extends VidiunObjectBase
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
	 * @insertonly
	 */
	public $dropFolderId = null;

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	public $fileName = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $fileSize = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $fileSizeLastSetAt = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderType
	 * @readonly
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedSlug = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedFlavor = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedUserId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $leadDropFolderFileId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $deletedDropFolderFileId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileErrorCode
	 */
	public $errorCode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorDescription = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $lastModificationTime = null;

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
	 * @var int
	 */
	public $uploadStartDetectedAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uploadEndDetectedAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $importStartedAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $importEndedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $batchJobId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunDropFolderFile
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
class VidiunDropFolderListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunDropFolder
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
abstract class VidiunDropFolderBaseFilter extends VidiunFilter
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
	public $nameLike = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderType
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
	 * @var VidiunDropFolderStatus
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
	public $conversionProfileIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $conversionProfileIdIn = null;

	/**
	 * 
	 *
	 * @var int
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
	 * @var string
	 */
	public $pathEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $pathLike = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileHandlerType
	 */
	public $fileHandlerTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileHandlerTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileNamePatternsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileNamePatternsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileNamePatternsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderErrorCode
	 */
	public $errorCodeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorCodeIn = null;

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
class VidiunDropFolderContentFileHandlerConfig extends VidiunDropFolderFileHandlerConfig
{
	/**
	 * 
	 *
	 * @var VidiunDropFolderContentFileHandlerMatchPolicy
	 */
	public $contentMatchPolicy = null;

	/**
	 * Regular expression that defines valid file names to be handled.
	 * 	 The following might be extracted from the file name and used if defined:
	 * 	 - (?P<referenceId>\w+) - will be used as the drop folder file's parsed slug.
	 * 	 - (?P<flavorName>\w+)  - will be used as the drop folder file's parsed flavor.
	 * 	 
	 *
	 * @var string
	 */
	public $slugRegex = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderContentProcessorJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $dropFolderId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $dropFolderFileIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedSlug = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderContentFileHandlerMatchPolicy
	 */
	public $contentMatchPolicy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $conversionProfileId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedUserId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDropFolderFileBaseFilter extends VidiunFilter
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
	 * @var int
	 */
	public $dropFolderIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $dropFolderIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileNameIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileNameLike = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileStatus
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

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedSlugEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedSlugIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedSlugLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedFlavorEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedFlavorIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parsedFlavorLike = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $leadDropFolderFileIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $deletedDropFolderFileIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunDropFolderFileErrorCode
	 */
	public $errorCodeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorCodeIn = null;

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
abstract class VidiunRemoteDropFolder extends VidiunDropFolder
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileFilter extends VidiunDropFolderFileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFilter extends VidiunDropFolderBaseFilter
{
	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $currentDc = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFtpDropFolder extends VidiunRemoteDropFolder
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $host = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $port = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $password = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunSshDropFolder extends VidiunRemoteDropFolder
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $host = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $port = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $password = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $privateKey = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $publicKey = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $passPhrase = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileResource extends VidiunDataCenterContentResource
{
	/**
	 * Id of the drop folder file object
	 * 	 
	 *
	 * @var int
	 */
	public $dropFolderFileId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderImportJobData extends VidiunSshImportJobData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $dropFolderFileId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunRemoteDropFolderBaseFilter extends VidiunDropFolderFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunScpDropFolder extends VidiunSshDropFolder
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSftpDropFolder extends VidiunSshDropFolder
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunRemoteDropFolderFilter extends VidiunRemoteDropFolderBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunFtpDropFolderBaseFilter extends VidiunRemoteDropFolderFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunSshDropFolderBaseFilter extends VidiunRemoteDropFolderFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFtpDropFolderFilter extends VidiunFtpDropFolderBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSshDropFolderFilter extends VidiunSshDropFolderBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunScpDropFolderBaseFilter extends VidiunSshDropFolderFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunSftpDropFolderBaseFilter extends VidiunSshDropFolderFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunScpDropFolderFilter extends VidiunScpDropFolderBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSftpDropFolderFilter extends VidiunSftpDropFolderBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Allows you to add a new VidiunDropFolder object
	 * 
	 * @param VidiunDropFolder $dropFolder 
	 * @return VidiunDropFolder
	 */
	function add(VidiunDropFolder $dropFolder)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolder", $dropFolder->toParams());
		$this->client->queueServiceActionCall("dropfolder_dropfolder", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolder");
		return $resultObject;
	}

	/**
	 * Retrieve a VidiunDropFolder object by ID
	 * 
	 * @param int $dropFolderId 
	 * @return VidiunDropFolder
	 */
	function get($dropFolderId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderId", $dropFolderId);
		$this->client->queueServiceActionCall("dropfolder_dropfolder", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolder");
		return $resultObject;
	}

	/**
	 * Update an existing VidiunDropFolder object
	 * 
	 * @param int $dropFolderId 
	 * @param VidiunDropFolder $dropFolder Id
	 * @return VidiunDropFolder
	 */
	function update($dropFolderId, VidiunDropFolder $dropFolder)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderId", $dropFolderId);
		$this->client->addParam($vparams, "dropFolder", $dropFolder->toParams());
		$this->client->queueServiceActionCall("dropfolder_dropfolder", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolder");
		return $resultObject;
	}

	/**
	 * Mark the VidiunDropFolder object as deleted
	 * 
	 * @param int $dropFolderId 
	 * @return VidiunDropFolder
	 */
	function delete($dropFolderId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderId", $dropFolderId);
		$this->client->queueServiceActionCall("dropfolder_dropfolder", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolder");
		return $resultObject;
	}

	/**
	 * List VidiunDropFolder objects
	 * 
	 * @param VidiunDropFolderFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunDropFolderListResponse
	 */
	function listAction(VidiunDropFolderFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("dropfolder_dropfolder", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderFileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Allows you to add a new VidiunDropFolderFile object
	 * 
	 * @param VidiunDropFolderFile $dropFolderFile 
	 * @return VidiunDropFolderFile
	 */
	function add(VidiunDropFolderFile $dropFolderFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderFile", $dropFolderFile->toParams());
		$this->client->queueServiceActionCall("dropfolder_dropfolderfile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderFile");
		return $resultObject;
	}

	/**
	 * Retrieve a VidiunDropFolderFile object by ID
	 * 
	 * @param int $dropFolderFileId 
	 * @return VidiunDropFolderFile
	 */
	function get($dropFolderFileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderFileId", $dropFolderFileId);
		$this->client->queueServiceActionCall("dropfolder_dropfolderfile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderFile");
		return $resultObject;
	}

	/**
	 * Update an existing VidiunDropFolderFile object
	 * 
	 * @param int $dropFolderFileId 
	 * @param VidiunDropFolderFile $dropFolderFile Id
	 * @return VidiunDropFolderFile
	 */
	function update($dropFolderFileId, VidiunDropFolderFile $dropFolderFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderFileId", $dropFolderFileId);
		$this->client->addParam($vparams, "dropFolderFile", $dropFolderFile->toParams());
		$this->client->queueServiceActionCall("dropfolder_dropfolderfile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderFile");
		return $resultObject;
	}

	/**
	 * Update status of VidiunDropFolderFile
	 * 
	 * @param int $dropFolderFileId 
	 * @param int $status 
	 * @return VidiunDropFolderFile
	 */
	function updateStatus($dropFolderFileId, $status)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderFileId", $dropFolderFileId);
		$this->client->addParam($vparams, "status", $status);
		$this->client->queueServiceActionCall("dropfolder_dropfolderfile", "updateStatus", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderFile");
		return $resultObject;
	}

	/**
	 * Mark the VidiunDropFolderFile object as deleted
	 * 
	 * @param int $dropFolderFileId 
	 * @return VidiunDropFolderFile
	 */
	function delete($dropFolderFileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderFileId", $dropFolderFileId);
		$this->client->queueServiceActionCall("dropfolder_dropfolderfile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderFile");
		return $resultObject;
	}

	/**
	 * List VidiunDropFolderFile objects
	 * 
	 * @param VidiunDropFolderFileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunDropFolderFileListResponse
	 */
	function listAction(VidiunDropFolderFileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("dropfolder_dropfolderfile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderFileListResponse");
		return $resultObject;
	}

	/**
	 * Set the VidiunDropFolderFile status to ignore (VidiunDropFolderFileStatus::IGNORE)
	 * 
	 * @param int $dropFolderFileId 
	 * @return VidiunDropFolderFile
	 */
	function ignore($dropFolderFileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "dropFolderFileId", $dropFolderFileId);
		$this->client->queueServiceActionCall("dropfolder_dropfolderfile", "ignore", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDropFolderFile");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDropFolderClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunDropFolderService
	 */
	public $dropFolder = null;

	/**
	 * @var VidiunDropFolderFileService
	 */
	public $dropFolderFile = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->dropFolder = new VidiunDropFolderService($client);
		$this->dropFolderFile = new VidiunDropFolderFileService($client);
	}

	/**
	 * @return VidiunDropFolderClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunDropFolderClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'dropFolder' => $this->dropFolder,
			'dropFolderFile' => $this->dropFolderFile,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'dropFolder';
	}
}


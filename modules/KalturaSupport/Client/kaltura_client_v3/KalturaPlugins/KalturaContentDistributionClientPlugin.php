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
class VidiunDistributionAction
{
	const SUBMIT = 1;
	const UPDATE = 2;
	const DELETE = 3;
	const FETCH_REPORT = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionErrorType
{
	const MISSING_FLAVOR = 1;
	const MISSING_THUMBNAIL = 2;
	const MISSING_METADATA = 3;
	const INVALID_DATA = 4;
	const MISSING_ASSET = 5;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionFieldRequiredStatus
{
	const NOT_REQUIRED = 0;
	const REQUIRED_BY_PROVIDER = 1;
	const REQUIRED_BY_PARTNER = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProfileActionStatus
{
	const DISABLED = 1;
	const AUTOMATIC = 2;
	const MANUAL = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProfileStatus
{
	const DISABLED = 1;
	const ENABLED = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProtocol
{
	const FTP = 1;
	const SCP = 2;
	const SFTP = 3;
	const HTTP = 4;
	const HTTPS = 5;
	const ASPERA = 10;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionValidationErrorType
{
	const CUSTOM_ERROR = 0;
	const STRING_EMPTY = 1;
	const STRING_TOO_LONG = 2;
	const STRING_TOO_SHORT = 3;
	const INVALID_FORMAT = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryDistributionFlag
{
	const NONE = 0;
	const SUBMIT_REQUIRED = 1;
	const DELETE_REQUIRED = 2;
	const UPDATE_REQUIRED = 3;
	const ENABLE_REQUIRED = 4;
	const DISABLE_REQUIRED = 5;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryDistributionStatus
{
	const PENDING = 0;
	const QUEUED = 1;
	const READY = 2;
	const DELETED = 3;
	const SUBMITTING = 4;
	const UPDATING = 5;
	const DELETING = 6;
	const ERROR_SUBMITTING = 7;
	const ERROR_UPDATING = 8;
	const ERROR_DELETING = 9;
	const REMOVED = 10;
	const IMPORT_SUBMITTING = 11;
	const IMPORT_UPDATING = 12;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryDistributionSunStatus
{
	const BEFORE_SUNRISE = 1;
	const AFTER_SUNRISE = 2;
	const AFTER_SUNSET = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderParser
{
	const XSL = 1;
	const XPATH = 2;
	const REGEX = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderStatus
{
	const ACTIVE = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConfigurableDistributionProfileOrderBy
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
class VidiunDistributionProfileOrderBy
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
class VidiunDistributionProviderOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProviderType
{
	const IDETIC = "ideticDistribution.IDETIC";
	const YOUTUBE_API = "youtubeApiDistribution.YOUTUBE_API";
	const GENERIC = "1";
	const SYNDICATION = "2";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryDistributionOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const SUBMITTED_AT_ASC = "+submittedAt";
	const SUNRISE_ASC = "+sunrise";
	const SUNSET_ASC = "+sunset";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const SUBMITTED_AT_DESC = "-submittedAt";
	const SUNRISE_DESC = "-sunrise";
	const SUNSET_DESC = "-sunset";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProfileOrderBy
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
class VidiunGenericDistributionProviderActionOrderBy
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
class VidiunGenericDistributionProviderOrderBy
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
class VidiunSyndicationDistributionProfileOrderBy
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
class VidiunSyndicationDistributionProviderOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunAssetDistributionCondition extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetDistributionRule extends VidiunObjectBase
{
	/**
	 * The validation error description that will be set on the "data" property on VidiunDistributionValidationErrorMissingAsset if rule was not fulfilled
	 * 	 
	 *
	 * @var string
	 */
	public $validationError = null;

	/**
	 * An array of asset distribution conditions
	 * 	 
	 *
	 * @var array of VidiunAssetDistributionCondition
	 */
	public $assetDistributionConditions;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionFieldConfig extends VidiunObjectBase
{
	/**
	 * A value taken from a connector field enum which associates the current configuration to that connector field
	 *      Field enum class should be returned by the provider's getFieldEnumClass function.
	 *      
	 *
	 * @var string
	 */
	public $fieldName = null;

	/**
	 * A string that will be shown to the user as the field name in error messages related to the current field
	 *      
	 *
	 * @var string
	 */
	public $userFriendlyFieldName = null;

	/**
	 * An XSLT string that extracts the right value from the Vidiun entry MRSS XML.
	 *      The value of the current connector field will be the one that is returned from transforming the Vidiun entry MRSS XML using this XSLT string.
	 *      
	 *
	 * @var string
	 */
	public $entryMrssXslt = null;

	/**
	 * Is the field required to have a value for submission ?
	 *      
	 *
	 * @var VidiunDistributionFieldRequiredStatus
	 */
	public $isRequired = null;

	/**
	 * Trigger distribution update when this field changes or not ?
	 *      
	 *
	 * @var bool
	 */
	public $updateOnChange = null;

	/**
	 * Entry column or metadata xpath that should trigger an update
	 *      
	 *
	 * @var array of VidiunString
	 */
	public $updateParams;

	/**
	 * Is this field config is the default for the distribution provider?
	 *      
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefault = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDistributionJobProviderData extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionThumbDimensions extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $height = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDistributionProfile extends VidiunObjectBase
{
	/**
	 * Auto generated unique id
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Profile creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Profile last update date as Unix timestamp (In seconds)
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
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProviderType
	 * @insertonly
	 */
	public $providerType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProfileStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProfileActionStatus
	 */
	public $submitEnabled = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProfileActionStatus
	 */
	public $updateEnabled = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProfileActionStatus
	 */
	public $deleteEnabled = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProfileActionStatus
	 */
	public $reportEnabled = null;

	/**
	 * Comma separated flavor params ids that should be auto converted
	 * 	 
	 *
	 * @var string
	 */
	public $autoCreateFlavors = null;

	/**
	 * Comma separated thumbnail params ids that should be auto generated
	 * 	 
	 *
	 * @var string
	 */
	public $autoCreateThumb = null;

	/**
	 * Comma separated flavor params ids that should be submitted if ready
	 * 	 
	 *
	 * @var string
	 */
	public $optionalFlavorParamsIds = null;

	/**
	 * Comma separated flavor params ids that required to be ready before submission
	 * 	 
	 *
	 * @var string
	 */
	public $requiredFlavorParamsIds = null;

	/**
	 * Thumbnail dimensions that should be submitted if ready
	 * 	 
	 *
	 * @var array of VidiunDistributionThumbDimensions
	 */
	public $optionalThumbDimensions;

	/**
	 * Thumbnail dimensions that required to be readt before submission
	 * 	 
	 *
	 * @var array of VidiunDistributionThumbDimensions
	 */
	public $requiredThumbDimensions;

	/**
	 * Asset Distribution Rules for assets that should be submitted if ready
	 * 	 
	 *
	 * @var array of VidiunAssetDistributionRule
	 */
	public $optionalAssetDistributionRules;

	/**
	 * Assets Asset Distribution Rules for assets that are required to be ready before submission
	 * 	 
	 *
	 * @var array of VidiunAssetDistributionRule
	 */
	public $requiredAssetDistributionRules;

	/**
	 * If entry distribution sunrise not specified that will be the default since entry creation time, in seconds
	 * 	 
	 *
	 * @var int
	 */
	public $sunriseDefaultOffset = null;

	/**
	 * If entry distribution sunset not specified that will be the default since entry creation time, in seconds
	 * 	 
	 *
	 * @var int
	 */
	public $sunsetDefaultOffset = null;

	/**
	 * The best external storage to be used to download the asset files from
	 * 	 
	 *
	 * @var int
	 */
	public $recommendedStorageProfileForDownload = null;

	/**
	 * The best Vidiun data center to be used to download the asset files to
	 * 	 
	 *
	 * @var int
	 */
	public $recommendedDcForDownload = null;

	/**
	 * The best Vidiun data center to be used to execute the distribution job
	 * 	 
	 *
	 * @var int
	 */
	public $recommendedDcForExecute = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProfileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunDistributionProfile
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
abstract class VidiunDistributionProvider extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunDistributionProviderType
	 * @readonly
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $scheduleUpdateEnabled = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $availabilityUpdateEnabled = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $deleteInsteadUpdate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $intervalBeforeSunrise = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $intervalBeforeSunset = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredEntryFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredMetadataXPaths = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProviderListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunDistributionProvider
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
class VidiunDistributionRemoteMediaFile extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $version = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remoteId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDistributionValidationError extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunDistributionAction
	 */
	public $action = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionErrorType
	 */
	public $errorType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryDistribution extends VidiunObjectBase
{
	/**
	 * Auto generated unique id
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Entry distribution creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Entry distribution last update date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * Entry distribution submission date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $submittedAt = null;

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	public $entryId = null;

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
	public $distributionProfileId = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistributionStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistributionSunStatus
	 * @readonly
	 */
	public $sunStatus = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistributionFlag
	 * @readonly
	 */
	public $dirtyStatus = null;

	/**
	 * Comma separated thumbnail asset ids
	 * 	 
	 *
	 * @var string
	 */
	public $thumbAssetIds = null;

	/**
	 * Comma separated flavor asset ids
	 * 	 
	 *
	 * @var string
	 */
	public $flavorAssetIds = null;

	/**
	 * Comma separated asset ids
	 * 	 
	 *
	 * @var string
	 */
	public $assetIds = null;

	/**
	 * Entry distribution publish time as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 */
	public $sunrise = null;

	/**
	 * Entry distribution un-publish time as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 */
	public $sunset = null;

	/**
	 * The id as returned from the distributed destination
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $remoteId = null;

	/**
	 * The plays as retrieved from the remote destination reports
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $plays = null;

	/**
	 * The views as retrieved from the remote destination reports
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $views = null;

	/**
	 * 
	 *
	 * @var array of VidiunDistributionValidationError
	 */
	public $validationErrors;

	/**
	 * 
	 *
	 * @var VidiunBatchJobErrorTypes
	 * @readonly
	 */
	public $errorType = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $errorNumber = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $errorDescription = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 * @readonly
	 */
	public $hasSubmitResultsLog = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 * @readonly
	 */
	public $hasSubmitSentDataLog = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 * @readonly
	 */
	public $hasUpdateResultsLog = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 * @readonly
	 */
	public $hasUpdateSentDataLog = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 * @readonly
	 */
	public $hasDeleteResultsLog = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 * @readonly
	 */
	public $hasDeleteSentDataLog = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryDistributionListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunEntryDistribution
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
class VidiunGenericDistributionProfileAction extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunDistributionProtocol
	 */
	public $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverPath = null;

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
	 * @var bool
	 */
	public $ftpPassiveMode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $httpFieldName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $httpFileName = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderAction extends VidiunObjectBase
{
	/**
	 * Auto generated
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Generic distribution provider action creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Generic distribution provider action last update date as Unix timestamp (In seconds)
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
	 * @insertonly
	 */
	public $genericDistributionProviderId = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionAction
	 * @insertonly
	 */
	public $action = null;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProviderStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProviderParser
	 */
	public $resultsParser = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProtocol
	 */
	public $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverAddress = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remotePath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remoteUsername = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remotePassword = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $editableFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $mandatoryFields = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $mrssTransformer = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $mrssValidator = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $resultsTransformer = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderActionListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunGenericDistributionProviderAction
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
class VidiunGenericDistributionProvider extends VidiunDistributionProvider
{
	/**
	 * Auto generated
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Generic distribution provider creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Generic distribution provider last update date as Unix timestamp (In seconds)
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
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isDefault = null;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProviderStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $optionalFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $requiredFlavorParamsIds = null;

	/**
	 * 
	 *
	 * @var array of VidiunDistributionThumbDimensions
	 */
	public $optionalThumbDimensions;

	/**
	 * 
	 *
	 * @var array of VidiunDistributionThumbDimensions
	 */
	public $requiredThumbDimensions;

	/**
	 * 
	 *
	 * @var string
	 */
	public $editableFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $mandatoryFields = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunGenericDistributionProvider
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
class VidiunAssetDistributionPropertyCondition extends VidiunAssetDistributionCondition
{
	/**
	 * The property name to look for, this will match to a getter on the asset object.
	 * 	 Should be camelCase naming convention (defining "myPropertyName" will look for getMyPropertyName())
	 * 	 
	 *
	 * @var string
	 */
	public $propertyName = null;

	/**
	 * The value to compare
	 * 	 
	 *
	 * @var string
	 */
	public $propertyValue = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunConfigurableDistributionJobProviderData extends VidiunDistributionJobProviderData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $fieldValues = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunConfigurableDistributionProfile extends VidiunDistributionProfile
{
	/**
	 * 
	 *
	 * @var array of VidiunDistributionFieldConfig
	 */
	public $fieldConfigArray;

	/**
	 * 
	 *
	 * @var array of VidiunExtendingItemMrssParameter
	 */
	public $itemXpathsToExtend;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunContentDistributionSearchItem extends VidiunSearchItem
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $noDistributionProfiles = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $distributionProfileId = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistributionSunStatus
	 */
	public $distributionSunStatus = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistributionFlag
	 */
	public $entryDistributionFlag = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistributionStatus
	 */
	public $entryDistributionStatus = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $hasEntryDistributionValidationErrors = null;

	/**
	 * Comma seperated validation error types
	 * 	 
	 *
	 * @var string
	 */
	public $entryDistributionValidationErrors = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $distributionProfileId = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProfile
	 */
	public $distributionProfile;

	/**
	 * 
	 *
	 * @var int
	 */
	public $entryDistributionId = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistribution
	 */
	public $entryDistribution;

	/**
	 * Id of the media in the remote system
	 * 	 
	 *
	 * @var string
	 */
	public $remoteId = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionProviderType
	 */
	public $providerType = null;

	/**
	 * Additional data that relevant for the provider only
	 * 	 
	 *
	 * @var VidiunDistributionJobProviderData
	 */
	public $providerData;

	/**
	 * The results as returned from the remote destination
	 * 	 
	 *
	 * @var string
	 */
	public $results = null;

	/**
	 * The data as sent to the remote destination
	 * 	 
	 *
	 * @var string
	 */
	public $sentData = null;

	/**
	 * Stores array of media files that submitted to the destination site
	 * 	 Could be used later for media update 
	 * 	 
	 *
	 * @var array of VidiunDistributionRemoteMediaFile
	 */
	public $mediaFiles;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDistributionProfileBaseFilter extends VidiunFilter
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
	 * @var VidiunDistributionProfileStatus
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
abstract class VidiunDistributionProviderBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var VidiunDistributionProviderType
	 */
	public $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionValidationErrorInvalidData extends VidiunDistributionValidationError
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $fieldName = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionValidationErrorType
	 */
	public $validationErrorType = null;

	/**
	 * Parameter of the validation error
	 * 	 For example, minimum value for VidiunDistributionValidationErrorType::STRING_TOO_SHORT validation error
	 * 	 
	 *
	 * @var string
	 */
	public $validationErrorParam = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionValidationErrorMissingAsset extends VidiunDistributionValidationError
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $data = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionValidationErrorMissingFlavor extends VidiunDistributionValidationError
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionValidationErrorMissingMetadata extends VidiunDistributionValidationError
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $fieldName = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionValidationErrorMissingThumbnail extends VidiunDistributionValidationError
{
	/**
	 * 
	 *
	 * @var VidiunDistributionThumbDimensions
	 */
	public $dimensions;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunEntryDistributionBaseFilter extends VidiunFilter
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
	public $submittedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $submittedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $distributionProfileIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $distributionProfileIdIn = null;

	/**
	 * 
	 *
	 * @var VidiunEntryDistributionStatus
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
	 * @var VidiunEntryDistributionFlag
	 */
	public $dirtyStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $dirtyStatusIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunriseGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunriseLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunsetGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sunsetLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionJobProviderData extends VidiunDistributionJobProviderData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $xml = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $resultParseData = null;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProviderParser
	 */
	public $resultParserType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProfile extends VidiunDistributionProfile
{
	/**
	 * 
	 *
	 * @var int
	 * @insertonly
	 */
	public $genericProviderId = null;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProfileAction
	 */
	public $submitAction;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProfileAction
	 */
	public $updateAction;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProfileAction
	 */
	public $deleteAction;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProfileAction
	 */
	public $fetchReportAction;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredEntryFields = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateRequiredMetadataXPaths = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunGenericDistributionProviderActionBaseFilter extends VidiunFilter
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
	public $genericDistributionProviderIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $genericDistributionProviderIdIn = null;

	/**
	 * 
	 *
	 * @var VidiunDistributionAction
	 */
	public $actionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $actionIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationDistributionProfile extends VidiunDistributionProfile
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $xsl = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $feedId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationDistributionProvider extends VidiunDistributionProvider
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionDeleteJobData extends VidiunDistributionJobData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionFetchReportJobData extends VidiunDistributionJobData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $plays = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $views = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProfileFilter extends VidiunDistributionProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProviderFilter extends VidiunDistributionProviderBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionSubmitJobData extends VidiunDistributionJobData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionUpdateJobData extends VidiunDistributionJobData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionValidationErrorInvalidMetadata extends VidiunDistributionValidationErrorInvalidData
{
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
class VidiunEntryDistributionFilter extends VidiunEntryDistributionBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderActionFilter extends VidiunGenericDistributionProviderActionBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunConfigurableDistributionProfileBaseFilter extends VidiunDistributionProfileFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionDisableJobData extends VidiunDistributionUpdateJobData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionEnableJobData extends VidiunDistributionUpdateJobData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunGenericDistributionProfileBaseFilter extends VidiunDistributionProfileFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunGenericDistributionProviderBaseFilter extends VidiunDistributionProviderFilter
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
	 * @var VidiunNullableBoolean
	 */
	public $isDefaultEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $isDefaultIn = null;

	/**
	 * 
	 *
	 * @var VidiunGenericDistributionProviderStatus
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
abstract class VidiunSyndicationDistributionProfileBaseFilter extends VidiunDistributionProfileFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunSyndicationDistributionProviderBaseFilter extends VidiunDistributionProviderFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConfigurableDistributionProfileFilter extends VidiunConfigurableDistributionProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProfileFilter extends VidiunGenericDistributionProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderFilter extends VidiunGenericDistributionProviderBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationDistributionProfileFilter extends VidiunSyndicationDistributionProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationDistributionProviderFilter extends VidiunSyndicationDistributionProviderBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Distribution Profile
	 * 
	 * @param VidiunDistributionProfile $distributionProfile 
	 * @return VidiunDistributionProfile
	 */
	function add(VidiunDistributionProfile $distributionProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "distributionProfile", $distributionProfile->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDistributionProfile");
		return $resultObject;
	}

	/**
	 * Get Distribution Profile by id
	 * 
	 * @param int $id 
	 * @return VidiunDistributionProfile
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDistributionProfile");
		return $resultObject;
	}

	/**
	 * Update Distribution Profile by id
	 * 
	 * @param int $id 
	 * @param VidiunDistributionProfile $distributionProfile 
	 * @return VidiunDistributionProfile
	 */
	function update($id, VidiunDistributionProfile $distributionProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "distributionProfile", $distributionProfile->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDistributionProfile");
		return $resultObject;
	}

	/**
	 * Update Distribution Profile status by id
	 * 
	 * @param int $id 
	 * @param int $status 
	 * @return VidiunDistributionProfile
	 */
	function updateStatus($id, $status)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "status", $status);
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "updateStatus", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDistributionProfile");
		return $resultObject;
	}

	/**
	 * Delete Distribution Profile by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all distribution providers
	 * 
	 * @param VidiunDistributionProfileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunDistributionProfileListResponse
	 */
	function listAction(VidiunDistributionProfileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDistributionProfileListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param VidiunPartnerFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunDistributionProfileListResponse
	 */
	function listByPartner(VidiunPartnerFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprofile", "listByPartner", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDistributionProfileListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryDistributionService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Entry Distribution
	 * 
	 * @param VidiunEntryDistribution $entryDistribution 
	 * @return VidiunEntryDistribution
	 */
	function add(VidiunEntryDistribution $entryDistribution)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryDistribution", $entryDistribution->toParams());
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Get Entry Distribution by id
	 * 
	 * @param int $id 
	 * @return VidiunEntryDistribution
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Validates Entry Distribution by id for submission
	 * 
	 * @param int $id 
	 * @return VidiunEntryDistribution
	 */
	function validate($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "validate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Update Entry Distribution by id
	 * 
	 * @param int $id 
	 * @param VidiunEntryDistribution $entryDistribution 
	 * @return VidiunEntryDistribution
	 */
	function update($id, VidiunEntryDistribution $entryDistribution)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "entryDistribution", $entryDistribution->toParams());
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Delete Entry Distribution by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all distribution providers
	 * 
	 * @param VidiunEntryDistributionFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunEntryDistributionListResponse
	 */
	function listAction(VidiunEntryDistributionFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistributionListResponse");
		return $resultObject;
	}

	/**
	 * Submits Entry Distribution to the remote destination
	 * 
	 * @param int $id 
	 * @param bool $submitWhenReady 
	 * @return VidiunEntryDistribution
	 */
	function submitAdd($id, $submitWhenReady = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "submitWhenReady", $submitWhenReady);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitAdd", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Submits Entry Distribution changes to the remote destination
	 * 
	 * @param int $id 
	 * @return VidiunEntryDistribution
	 */
	function submitUpdate($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitUpdate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Submits Entry Distribution report request
	 * 
	 * @param int $id 
	 * @return VidiunEntryDistribution
	 */
	function submitFetchReport($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitFetchReport", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Deletes Entry Distribution from the remote destination
	 * 
	 * @param int $id 
	 * @return VidiunEntryDistribution
	 */
	function submitDelete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "submitDelete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Retries last submit action
	 * 
	 * @param int $id 
	 * @return VidiunEntryDistribution
	 */
	function retrySubmit($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "retrySubmit", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunEntryDistribution");
		return $resultObject;
	}

	/**
	 * Serves entry distribution sent data
	 * 
	 * @param int $id 
	 * @param int $actionType 
	 * @return file
	 */
	function serveSentData($id, $actionType)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "actionType", $actionType);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "serveSentData", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Serves entry distribution returned data
	 * 
	 * @param int $id 
	 * @param int $actionType 
	 * @return file
	 */
	function serveReturnedData($id, $actionType)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "actionType", $actionType);
		$this->client->queueServiceActionCall("contentdistribution_entrydistribution", "serveReturnedData", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDistributionProviderService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List all distribution providers
	 * 
	 * @param VidiunDistributionProviderFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunDistributionProviderListResponse
	 */
	function listAction(VidiunDistributionProviderFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_distributionprovider", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDistributionProviderListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Generic Distribution Provider
	 * 
	 * @param VidiunGenericDistributionProvider $genericDistributionProvider 
	 * @return VidiunGenericDistributionProvider
	 */
	function add(VidiunGenericDistributionProvider $genericDistributionProvider)
	{
		$vparams = array();
		$this->client->addParam($vparams, "genericDistributionProvider", $genericDistributionProvider->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProvider");
		return $resultObject;
	}

	/**
	 * Get Generic Distribution Provider by id
	 * 
	 * @param int $id 
	 * @return VidiunGenericDistributionProvider
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProvider");
		return $resultObject;
	}

	/**
	 * Update Generic Distribution Provider by id
	 * 
	 * @param int $id 
	 * @param VidiunGenericDistributionProvider $genericDistributionProvider 
	 * @return VidiunGenericDistributionProvider
	 */
	function update($id, VidiunGenericDistributionProvider $genericDistributionProvider)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "genericDistributionProvider", $genericDistributionProvider->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProvider");
		return $resultObject;
	}

	/**
	 * Delete Generic Distribution Provider by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all distribution providers
	 * 
	 * @param VidiunGenericDistributionProviderFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunGenericDistributionProviderListResponse
	 */
	function listAction(VidiunGenericDistributionProviderFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovider", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericDistributionProviderActionService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Generic Distribution Provider Action
	 * 
	 * @param VidiunGenericDistributionProviderAction $genericDistributionProviderAction 
	 * @return VidiunGenericDistributionProviderAction
	 */
	function add(VidiunGenericDistributionProviderAction $genericDistributionProviderAction)
	{
		$vparams = array();
		$this->client->addParam($vparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Add MRSS transform file to generic distribution provider action
	 * 
	 * @param int $id The id of the generic distribution provider action
	 * @param string $xslData XSL MRSS transformation data
	 * @return VidiunGenericDistributionProviderAction
	 */
	function addMrssTransform($id, $xslData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "xslData", $xslData);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssTransform", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Add MRSS transform file to generic distribution provider action
	 * 
	 * @param int $id The id of the generic distribution provider action
	 * @param file $xslFile XSL MRSS transformation file
	 * @return VidiunGenericDistributionProviderAction
	 */
	function addMrssTransformFromFile($id, $xslFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "xslFile", $xslFile);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssTransformFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Add MRSS validate file to generic distribution provider action
	 * 
	 * @param int $id The id of the generic distribution provider action
	 * @param string $xsdData XSD MRSS validatation data
	 * @return VidiunGenericDistributionProviderAction
	 */
	function addMrssValidate($id, $xsdData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "xsdData", $xsdData);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssValidate", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Add MRSS validate file to generic distribution provider action
	 * 
	 * @param int $id The id of the generic distribution provider action
	 * @param file $xsdFile XSD MRSS validatation file
	 * @return VidiunGenericDistributionProviderAction
	 */
	function addMrssValidateFromFile($id, $xsdFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "xsdFile", $xsdFile);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addMrssValidateFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Add results transform file to generic distribution provider action
	 * 
	 * @param int $id The id of the generic distribution provider action
	 * @param string $transformData Transformation data xsl, xPath or regex
	 * @return VidiunGenericDistributionProviderAction
	 */
	function addResultsTransform($id, $transformData)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "transformData", $transformData);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addResultsTransform", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Add MRSS transform file to generic distribution provider action
	 * 
	 * @param int $id The id of the generic distribution provider action
	 * @param file $transformFile Transformation file xsl, xPath or regex
	 * @return VidiunGenericDistributionProviderAction
	 */
	function addResultsTransformFromFile($id, $transformFile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$vfiles = array();
		$this->client->addParam($vfiles, "transformFile", $transformFile);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "addResultsTransformFromFile", $vparams, $vfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Get Generic Distribution Provider Action by id
	 * 
	 * @param int $id 
	 * @return VidiunGenericDistributionProviderAction
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Get Generic Distribution Provider Action by provider id
	 * 
	 * @param int $genericDistributionProviderId 
	 * @param int $actionType 
	 * @return VidiunGenericDistributionProviderAction
	 */
	function getByProviderId($genericDistributionProviderId, $actionType)
	{
		$vparams = array();
		$this->client->addParam($vparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($vparams, "actionType", $actionType);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "getByProviderId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Update Generic Distribution Provider Action by provider id
	 * 
	 * @param int $genericDistributionProviderId 
	 * @param int $actionType 
	 * @param VidiunGenericDistributionProviderAction $genericDistributionProviderAction 
	 * @return VidiunGenericDistributionProviderAction
	 */
	function updateByProviderId($genericDistributionProviderId, $actionType, VidiunGenericDistributionProviderAction $genericDistributionProviderAction)
	{
		$vparams = array();
		$this->client->addParam($vparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($vparams, "actionType", $actionType);
		$this->client->addParam($vparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "updateByProviderId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Update Generic Distribution Provider Action by id
	 * 
	 * @param int $id 
	 * @param VidiunGenericDistributionProviderAction $genericDistributionProviderAction 
	 * @return VidiunGenericDistributionProviderAction
	 */
	function update($id, VidiunGenericDistributionProviderAction $genericDistributionProviderAction)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "genericDistributionProviderAction", $genericDistributionProviderAction->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderAction");
		return $resultObject;
	}

	/**
	 * Delete Generic Distribution Provider Action by id
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Delete Generic Distribution Provider Action by provider id
	 * 
	 * @param int $genericDistributionProviderId 
	 * @param int $actionType 
	 * @return 
	 */
	function deleteByProviderId($genericDistributionProviderId, $actionType)
	{
		$vparams = array();
		$this->client->addParam($vparams, "genericDistributionProviderId", $genericDistributionProviderId);
		$this->client->addParam($vparams, "actionType", $actionType);
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "deleteByProviderId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List all distribution providers
	 * 
	 * @param VidiunGenericDistributionProviderActionFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunGenericDistributionProviderActionListResponse
	 */
	function listAction(VidiunGenericDistributionProviderActionFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("contentdistribution_genericdistributionprovideraction", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunGenericDistributionProviderActionListResponse");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunContentDistributionClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunDistributionProfileService
	 */
	public $distributionProfile = null;

	/**
	 * @var VidiunEntryDistributionService
	 */
	public $entryDistribution = null;

	/**
	 * @var VidiunDistributionProviderService
	 */
	public $distributionProvider = null;

	/**
	 * @var VidiunGenericDistributionProviderService
	 */
	public $genericDistributionProvider = null;

	/**
	 * @var VidiunGenericDistributionProviderActionService
	 */
	public $genericDistributionProviderAction = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->distributionProfile = new VidiunDistributionProfileService($client);
		$this->entryDistribution = new VidiunEntryDistributionService($client);
		$this->distributionProvider = new VidiunDistributionProviderService($client);
		$this->genericDistributionProvider = new VidiunGenericDistributionProviderService($client);
		$this->genericDistributionProviderAction = new VidiunGenericDistributionProviderActionService($client);
	}

	/**
	 * @return VidiunContentDistributionClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunContentDistributionClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'distributionProfile' => $this->distributionProfile,
			'entryDistribution' => $this->entryDistribution,
			'distributionProvider' => $this->distributionProvider,
			'genericDistributionProvider' => $this->genericDistributionProvider,
			'genericDistributionProviderAction' => $this->genericDistributionProviderAction,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'contentDistribution';
	}
}


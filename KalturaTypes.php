<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Kaltura Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platfroms allow them to do with
// text.
//
// Copyright (C) 2006-2018  Kaltura Inc.
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
 * @package Kaltura
 * @subpackage Client
 */
require_once(dirname(__FILE__) . "/KalturaClientBase.php");

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaListResponse extends KalturaObjectBase
{
	/**
	 * Total items
	 *
	 * @var int
	 */
	public $totalCount = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiExceptionArg extends KalturaObjectBase
{
	/**
	 * Argument name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Argument value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialComment extends KalturaObjectBase
{
	/**
	 * Comment header
	 *
	 * @var string
	 */
	public $header = null;

	/**
	 * Comment body
	 *
	 * @var string
	 */
	public $text = null;

	/**
	 * Comment creation date
	 *
	 * @var int
	 */
	public $createDate = null;

	/**
	 * The writer of the comment
	 *
	 * @var string
	 */
	public $writer = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialCommentListResponse extends KalturaListResponse
{
	/**
	 * Social comments list
	 *
	 * @var array of KalturaSocialComment
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialNetworkComment extends KalturaSocialComment
{
	/**
	 * Number of likes
	 *
	 * @var string
	 */
	public $likeCounter = null;

	/**
	 * The URL of the profile picture of the author of the comment
	 *
	 * @var string
	 */
	public $authorImageUrl = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTwitterTwit extends KalturaSocialNetworkComment
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFacebookPost extends KalturaSocialNetworkComment
{
	/**
	 * List of comments on the post
	 *
	 * @var array of KalturaSocialNetworkComment
	 */
	public $comments;

	/**
	 * A link associated to the post
	 *
	 * @var string
	 */
	public $link = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetComment extends KalturaSocialComment
{
	/**
	 * Comment ID
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * Asset identifier
	 *
	 * @var int
	 */
	public $assetId = null;

	/**
	 * Asset Type
	 *
	 * @var KalturaAssetType
	 */
	public $assetType = null;

	/**
	 * Sub Header
	 *
	 * @var string
	 */
	public $subHeader = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialAction extends KalturaObjectBase
{
	/**
	 * social action document id
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Action type
	 *
	 * @var KalturaSocialActionType
	 */
	public $actionType = null;

	/**
	 * EPOC based timestamp for when the action occurred
	 *
	 * @var int
	 */
	public $time = null;

	/**
	 * ID of the asset that was acted upon
	 *
	 * @var int
	 */
	public $assetId = null;

	/**
	 * Type of the asset that was acted upon, currently only VOD (media)
	 *
	 * @var KalturaAssetType
	 */
	public $assetType = null;

	/**
	 * The value of the url
	 *
	 * @var string
	 */
	public $url = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialFriendActivity extends KalturaObjectBase
{
	/**
	 * The full name of the user who did the social action
	 *
	 * @var string
	 */
	public $userFullName = null;

	/**
	 * The URL of the profile picture of the user who did the social action
	 *
	 * @var string
	 */
	public $userPictureUrl = null;

	/**
	 * The social action
	 *
	 * @var KalturaSocialAction
	 */
	public $socialAction;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialFriendActivityListResponse extends KalturaListResponse
{
	/**
	 * Social friends activity
	 *
	 * @var array of KalturaSocialFriendActivity
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionRate extends KalturaSocialAction
{
	/**
	 * The value of the rating
	 *
	 * @var int
	 */
	public $rate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionListResponse extends KalturaListResponse
{
	/**
	 * The social actions
	 *
	 * @var array of KalturaSocialAction
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentMethod extends KalturaObjectBase
{
	/**
	 * Household payment method identifier (internal)
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * External identifier for the household payment method
	 *
	 * @var string
	 * @insertonly
	 */
	public $externalId = null;

	/**
	 * Payment-gateway identifier
	 *
	 * @var int
	 */
	public $paymentGatewayId = null;

	/**
	 * Description of the payment method details
	 *
	 * @var string
	 */
	public $details = null;

	/**
	 * indicates whether the payment method is set as default for the household
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefault = null;

	/**
	 * Payment method profile identifier
	 *
	 * @var int
	 */
	public $paymentMethodProfileId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentMethodListResponse extends KalturaListResponse
{
	/**
	 * Follow data list
	 *
	 * @var array of KalturaHouseholdPaymentMethod
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentMethodProfile extends KalturaObjectBase
{
	/**
	 * Payment method identifier (internal)
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Payment gateway identifier (internal)
	 *
	 * @var int
	 */
	public $paymentGatewayId = null;

	/**
	 * Payment method name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Indicates whether the payment method allow multiple instances
	 *
	 * @var bool
	 */
	public $allowMultiInstance = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentMethodProfileListResponse extends KalturaListResponse
{
	/**
	 * Payment method profiles list
	 *
	 * @var array of KalturaPaymentMethodProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentGateway extends KalturaObjectBase
{
	/**
	 * payment gateway id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * payment gateway name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Payment gateway default (true/false)
	 *
	 * @var bool
	 */
	public $isDefault = null;

	/**
	 * distinction payment gateway selected by account or household
	 *
	 * @var KalturaHouseholdPaymentGatewaySelectedBy
	 */
	public $selectedBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentGatewayListResponse extends KalturaListResponse
{
	/**
	 * Follow data list
	 *
	 * @var array of KalturaHouseholdPaymentGateway
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentGatewayBaseProfile extends KalturaObjectBase
{
	/**
	 * payment gateway id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * payment gateway name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Payment gateway default (true/false)
	 *
	 * @var bool
	 */
	public $isDefault = null;

	/**
	 * distinction payment gateway selected by account or household
	 *
	 * @var KalturaHouseholdPaymentGatewaySelectedBy
	 */
	public $selectedBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaValue extends KalturaObjectBase
{
	/**
	 * Description
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStringValue extends KalturaValue
{
	/**
	 * Value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentGatewayProfile extends KalturaPaymentGatewayBaseProfile
{
	/**
	 * Payment gateway is active status
	 *
	 * @var int
	 */
	public $isActive = null;

	/**
	 * Payment gateway adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * Payment gateway transact URL
	 *
	 * @var string
	 */
	public $transactUrl = null;

	/**
	 * Payment gateway status URL
	 *
	 * @var string
	 */
	public $statusUrl = null;

	/**
	 * Payment gateway renew URL
	 *
	 * @var string
	 */
	public $renewUrl = null;

	/**
	 * Payment gateway extra parameters
	 *
	 * @var map
	 */
	public $paymentGatewaySettings;

	/**
	 * Payment gateway external identifier
	 *
	 * @var string
	 */
	public $externalIdentifier = null;

	/**
	 * Pending Interval in minutes
	 *
	 * @var int
	 */
	public $pendingInterval = null;

	/**
	 * Pending Retries
	 *
	 * @var int
	 */
	public $pendingRetries = null;

	/**
	 * Shared Secret
	 *
	 * @var string
	 */
	public $sharedSecret = null;

	/**
	 * Renew Interval Minutes
	 *
	 * @var int
	 */
	public $renewIntervalMinutes = null;

	/**
	 * Renew Start Minutes
	 *
	 * @var int
	 */
	public $renewStartMinutes = null;

	/**
	 * Payment gateway external verification
	 *
	 * @var bool
	 */
	public $externalVerification = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentGatewayProfileListResponse extends KalturaListResponse
{
	/**
	 * A list of payment-gateway profiles
	 *
	 * @var array of KalturaPaymentGatewayProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTranslationToken extends KalturaObjectBase
{
	/**
	 * Language code
	 *
	 * @var string
	 */
	public $language = null;

	/**
	 * Translated value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMultilingualStringValue extends KalturaValue
{
	/**
	 * Value
	 *
	 * @var string
	 * @readonly
	 */
	public $value = null;

	/**
	 * Value
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualValue;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLongValue extends KalturaValue
{
	/**
	 * Value
	 *
	 * @var int
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDoubleValue extends KalturaValue
{
	/**
	 * Value
	 *
	 * @var float
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBooleanValue extends KalturaValue
{
	/**
	 * Value
	 *
	 * @var bool
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIntegerValue extends KalturaValue
{
	/**
	 * Value
	 *
	 * @var int
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPluginData extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDrmPlaybackPluginData extends KalturaPluginData
{
	/**
	 * Scheme
	 *
	 * @var KalturaDrmSchemeName
	 */
	public $scheme = null;

	/**
	 * License URL
	 *
	 * @var string
	 */
	public $licenseURL = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCustomDrmPlaybackPluginData extends KalturaDrmPlaybackPluginData
{
	/**
	 * Custom DRM license data
	 *
	 * @var string
	 */
	public $data = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdDevice extends KalturaObjectBase
{
	/**
	 * Household identifier
	 *
	 * @var int
	 */
	public $householdId = null;

	/**
	 * Device UDID
	 *
	 * @var string
	 * @insertonly
	 */
	public $udid = null;

	/**
	 * Device name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Device brand identifier
	 *
	 * @var int
	 */
	public $brandId = null;

	/**
	 * Device activation date (epoch)
	 *
	 * @var int
	 */
	public $activatedOn = null;

	/**
	 * Device state
	 *
	 * @var KalturaDeviceStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Device family id
	 *
	 * @var int
	 * @readonly
	 */
	public $deviceFamilyId = null;

	/**
	 * Device DRM data
	 *
	 * @var KalturaCustomDrmPlaybackPluginData
	 * @readonly
	 */
	public $drm;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdDeviceListResponse extends KalturaListResponse
{
	/**
	 * Household devices
	 *
	 * @var array of KalturaHouseholdDevice
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFairPlayPlaybackPluginData extends KalturaDrmPlaybackPluginData
{
	/**
	 * Custom data string
	 *
	 * @var string
	 */
	public $certificate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdUser extends KalturaObjectBase
{
	/**
	 * The identifier of the household
	 *
	 * @var int
	 */
	public $householdId = null;

	/**
	 * The identifier of the user
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * True if the user added as master use
	 *
	 * @var bool
	 */
	public $isMaster = null;

	/**
	 * The username of the household master for adding a user in status pending for the household master to approve
	 *
	 * @var string
	 * @insertonly
	 */
	public $householdMasterUsername = null;

	/**
	 * The status of the user in the household
	 *
	 * @var KalturaHouseholdUserStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * True if the user is a default user
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefault = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdUserListResponse extends KalturaListResponse
{
	/**
	 * Household users
	 *
	 * @var array of KalturaHouseholdUser
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHomeNetwork extends KalturaObjectBase
{
	/**
	 * Home network identifier
	 *
	 * @var string
	 * @insertonly
	 */
	public $externalId = null;

	/**
	 * Home network name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Home network description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Is home network is active
	 *
	 * @var bool
	 */
	public $isActive = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHomeNetworkListResponse extends KalturaListResponse
{
	/**
	 * Home networks
	 *
	 * @var array of KalturaHomeNetwork
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurations extends KalturaObjectBase
{
	/**
	 * Configuration id
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Partner id
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * Configuration group id
	 *
	 * @var string
	 */
	public $configurationGroupId = null;

	/**
	 * Application name
	 *
	 * @var string
	 */
	public $appName = null;

	/**
	 * Client version
	 *
	 * @var string
	 */
	public $clientVersion = null;

	/**
	 * Platform: Android/iOS/WindowsPhone/Blackberry/STB/CTV/Other
	 *
	 * @var KalturaPlatform
	 */
	public $platform = null;

	/**
	 * External push id
	 *
	 * @var string
	 */
	public $externalPushId = null;

	/**
	 * Is force update
	 *
	 * @var bool
	 */
	public $isForceUpdate = null;

	/**
	 * Content
	 *
	 * @var string
	 */
	public $content = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationsListResponse extends KalturaListResponse
{
	/**
	 * Configurations
	 *
	 * @var array of KalturaConfigurations
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupDevice extends KalturaObjectBase
{
	/**
	 * Configuration group id
	 *
	 * @var string
	 */
	public $configurationGroupId = null;

	/**
	 * Partner id
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * Device UDID
	 *
	 * @var string
	 */
	public $udid = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupDeviceListResponse extends KalturaListResponse
{
	/**
	 * Configuration group devices
	 *
	 * @var array of KalturaConfigurationGroupDevice
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupTag extends KalturaObjectBase
{
	/**
	 * Configuration group identifier
	 *
	 * @var string
	 */
	public $configurationGroupId = null;

	/**
	 * Partner identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * Tag
	 *
	 * @var string
	 */
	public $tag = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupTagListResponse extends KalturaListResponse
{
	/**
	 * Configuration group tags
	 *
	 * @var array of KalturaConfigurationGroupTag
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationIdentifier extends KalturaObjectBase
{
	/**
	 * Identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * Name
	 *
	 * @var string
	 */
	public $name = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroup extends KalturaObjectBase
{
	/**
	 * Configuration group identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Configuration group name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Partner id
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * Is default
	 *
	 * @var bool
	 * @insertonly
	 */
	public $isDefault = null;

	/**
	 * tags
	 *
	 * @var array of KalturaStringValue
	 * @readonly
	 */
	public $tags;

	/**
	 * Number of devices
	 *
	 * @var int
	 * @readonly
	 */
	public $numberOfDevices = null;

	/**
	 * Configuration identifiers
	 *
	 * @var array of KalturaConfigurationIdentifier
	 * @readonly
	 */
	public $configurationIdentifiers;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupListResponse extends KalturaListResponse
{
	/**
	 * Configuration groups
	 *
	 * @var array of KalturaConfigurationGroup
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSSOAdapterProfile extends KalturaObjectBase
{
	/**
	 * SSO Adapter id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * SSO Adapter name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * SSO Adapter is active status
	 *
	 * @var int
	 */
	public $isActive = null;

	/**
	 * SSO Adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * SSO Adapter extra parameters
	 *
	 * @var map
	 */
	public $settings;

	/**
	 * SSO Adapter external identifier
	 *
	 * @var string
	 */
	public $externalIdentifier = null;

	/**
	 * Shared Secret
	 *
	 * @var string
	 */
	public $sharedSecret = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSSOAdapterProfileListResponse extends KalturaListResponse
{
	/**
	 * A list of payment-gateway profiles
	 *
	 * @var array of KalturaSSOAdapterProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserInterestTopic extends KalturaObjectBase
{
	/**
	 * Meta identifier
	 *
	 * @var string
	 */
	public $metaId = null;

	/**
	 * Meta Value
	 *
	 * @var string
	 */
	public $value = null;

	/**
	 * Parent topic
	 *
	 * @var KalturaUserInterestTopic
	 */
	public $parentTopic;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserInterest extends KalturaObjectBase
{
	/**
	 * Identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Topic
	 *
	 * @var KalturaUserInterestTopic
	 */
	public $topic;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserInterestListResponse extends KalturaListResponse
{
	/**
	 * A list of UserInterests
	 *
	 * @var array of KalturaUserInterest
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaImage extends KalturaObjectBase
{
	/**
	 * Image aspect ratio
	 *
	 * @var string
	 */
	public $ratio = null;

	/**
	 * Image width
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * Image height
	 *
	 * @var int
	 */
	public $height = null;

	/**
	 * Image URL
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * Image Version
	 *
	 * @var int
	 */
	public $version = null;

	/**
	 * Image ID
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Determined whether image was taken from default configuration or not
	 *
	 * @var bool
	 */
	public $isDefault = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFile extends KalturaObjectBase
{
	/**
	 * URL of the media file to be played
	 *
	 * @var string
	 */
	public $url = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStringValueArray extends KalturaObjectBase
{
	/**
	 * List of string values
	 *
	 * @var array of KalturaStringValue
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFile extends KalturaAssetFile
{
	/**
	 * Unique identifier for the asset
	 *
	 * @var int
	 */
	public $assetId = null;

	/**
	 * File unique identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Deprecated - Device types as defined in the system
	 *
	 * @var string
	 * @readonly
	 */
	public $type = null;

	/**
	 * Device types identifier as defined in the system
	 *
	 * @var int
	 */
	public $typeId = null;

	/**
	 * Duration of the media file
	 *
	 * @var int
	 */
	public $duration = null;

	/**
	 * External identifier for the media file
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * Alternative external identifier for the media file
	 *
	 * @var string
	 */
	public $altExternalId = null;

	/**
	 * File size
	 *
	 * @var int
	 */
	public $fileSize = null;

	/**
	 * Additional Data
	 *
	 * @var string
	 */
	public $additionalData = null;

	/**
	 * Alternative streaming code
	 *
	 * @var string
	 */
	public $altStreamingCode = null;

	/**
	 * Alternative cdn adapter profile identifier
	 *
	 * @var int
	 */
	public $alternativeCdnAdapaterProfileId = null;

	/**
	 * EndDate
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * StartDate
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * ExternalStoreId
	 *
	 * @var string
	 */
	public $externalStoreId = null;

	/**
	 * IsDefaultLanguage
	 *
	 * @var bool
	 */
	public $isDefaultLanguage = null;

	/**
	 * Language
	 *
	 * @var string
	 */
	public $language = null;

	/**
	 * OrderNum
	 *
	 * @var int
	 */
	public $orderNum = null;

	/**
	 * OutputProtecationLevel
	 *
	 * @var string
	 */
	public $outputProtecationLevel = null;

	/**
	 * cdn adapter profile identifier
	 *
	 * @var int
	 */
	public $cdnAdapaterProfileId = null;

	/**
	 * The media file status
	 *
	 * @var bool
	 */
	public $status = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBuzzScore extends KalturaObjectBase
{
	/**
	 * Normalized average score
	 *
	 * @var float
	 */
	public $normalizedAvgScore = null;

	/**
	 * Update date
	 *
	 * @var int
	 */
	public $updateDate = null;

	/**
	 * Average score
	 *
	 * @var float
	 */
	public $avgScore = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStatistics extends KalturaObjectBase
{
	/**
	 * Unique identifier for the asset
	 *
	 * @var int
	 */
	public $assetId = null;

	/**
	 * Total number of likes for this asset
	 *
	 * @var int
	 */
	public $likes = null;

	/**
	 * Total number of views for this asset
	 *
	 * @var int
	 */
	public $views = null;

	/**
	 * Number of people that rated the asset
	 *
	 * @var int
	 */
	public $ratingCount = null;

	/**
	 * Average rating for the asset
	 *
	 * @var float
	 */
	public $rating = null;

	/**
	 * Buzz score
	 *
	 * @var KalturaBuzzScore
	 */
	public $buzzScore;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMultilingualStringValueArray extends KalturaObjectBase
{
	/**
	 * List of string values
	 *
	 * @var array of KalturaMultilingualStringValue
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFavorite extends KalturaObjectBase
{
	/**
	 * AssetInfo Model
	 *
	 * @var int
	 */
	public $assetId = null;

	/**
	 * Extra Value
	 *
	 * @var string
	 */
	public $extraData = null;

	/**
	 * Specifies when was the favorite created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFavoriteListResponse extends KalturaListResponse
{
	/**
	 * A list of favorites
	 *
	 * @var array of KalturaFavorite
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackSource extends KalturaMediaFile
{
	/**
	 * Source format according to delivery profile streamer type (applehttp, mpegdash etc.)
	 *
	 * @var string
	 */
	public $format = null;

	/**
	 * Comma separated string according to deliveryProfile media protocols (&#39;http,https&#39; etc.)
	 *
	 * @var string
	 */
	public $protocols = null;

	/**
	 * DRM data object containing relevant license URL ,scheme name and certificate
	 *
	 * @var array of KalturaDrmPlaybackPluginData
	 */
	public $drm;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseOTTUser extends KalturaObjectBase
{
	/**
	 * User identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Username
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * First name
	 *
	 * @var string
	 */
	public $firstName = null;

	/**
	 * Last name
	 *
	 * @var string
	 */
	public $lastName = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountry extends KalturaObjectBase
{
	/**
	 * Country identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Country name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Country code
	 *
	 * @var string
	 */
	public $code = null;

	/**
	 * The main language code in the country
	 *
	 * @var string
	 */
	public $mainLanguageCode = null;

	/**
	 * All the languages code that are supported in the country
	 *
	 * @var string
	 */
	public $languagesCode = null;

	/**
	 * Currency code
	 *
	 * @var string
	 */
	public $currency = null;

	/**
	 * Currency Sign
	 *
	 * @var string
	 */
	public $currencySign = null;

	/**
	 * Vat Percent in the country
	 *
	 * @var float
	 */
	public $vatPercent = null;

	/**
	 * Time zone ID
	 *
	 * @var string
	 */
	public $timeZoneId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOTTUserType extends KalturaObjectBase
{
	/**
	 * User type identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * User type description
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOTTUser extends KalturaBaseOTTUser
{
	/**
	 * Household identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $householdId = null;

	/**
	 * Email
	 *
	 * @var string
	 */
	public $email = null;

	/**
	 * Address
	 *
	 * @var string
	 */
	public $address = null;

	/**
	 * City
	 *
	 * @var string
	 */
	public $city = null;

	/**
	 * Country identifier
	 *
	 * @var int
	 */
	public $countryId = null;

	/**
	 * Zip code
	 *
	 * @var string
	 */
	public $zip = null;

	/**
	 * Phone
	 *
	 * @var string
	 */
	public $phone = null;

	/**
	 * Affiliate code
	 *
	 * @var string
	 * @insertonly
	 */
	public $affiliateCode = null;

	/**
	 * External user identifier
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * User type
	 *
	 * @var KalturaOTTUserType
	 */
	public $userType;

	/**
	 * Dynamic data
	 *
	 * @var map
	 */
	public $dynamicData;

	/**
	 * Is the user the household master
	 *
	 * @var bool
	 * @readonly
	 */
	public $isHouseholdMaster = null;

	/**
	 * Suspension state
	 *
	 * @var KalturaHouseholdSuspensionState
	 * @readonly
	 */
	public $suspensionState = null;

	/**
	 * User state
	 *
	 * @var KalturaUserState
	 * @readonly
	 */
	public $userState = null;

	/**
	 * Comma separated list of role Ids.
	 *
	 * @var string
	 */
	public $roleIds = null;

	/**
	 * User create date
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * User last update date
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOTTUserListResponse extends KalturaListResponse
{
	/**
	 * A list of users
	 *
	 * @var array of KalturaOTTUser
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalList extends KalturaObjectBase
{
	/**
	 * Id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Create Date
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Search assets using dynamic criteria. Provided collection of nested expressions with key, comparison operators, value, and logical conjunction.
	 *             Possible keys: any Tag or Meta defined in the system and the following reserved keys: start_date, end_date. 
	 *             epg_id, media_id - for specific asset IDs.
	 *             geo_block - only valid value is &quot;true&quot;: When enabled, only assets that are not restricted to the user by geo-block rules will return.
	 *             parental_rules - only valid value is &quot;true&quot;: When enabled, only assets that the user doesn&#39;t need to provide PIN code will return.
	 *             user_interests - only valid value is &quot;true&quot;. When enabled, only assets that the user defined as his interests (by tags and metas) will return.
	 *             epg_channel_id – the channel identifier of the EPG program.
	 *             entitled_assets - valid values: &quot;free&quot;, &quot;entitled&quot;, &quot;not_entitled&quot;, &quot;both&quot;. free - gets only free to watch assets. entitled - only those that the user is implicitly entitled to watch.
	 *             asset_type - valid values: &quot;media&quot;, &quot;epg&quot;, &quot;recording&quot; or any number that represents media type in group.
	 *             Comparison operators: for numerical fields =, &gt;, &gt;=, &lt;, &lt;=, : (in). 
	 *             For alpha-numerical fields =, != (not), ~ (like), !~, ^ (any word starts with), ^= (phrase starts with), + (exists), !+ (not exists).
	 *             Logical conjunction: and, or. 
	 *             Search values are limited to 20 characters each for the next operators: ~, !~, ^, ^=
	 *             (maximum length of entire filter is 4096 characters)
	 *
	 * @var string
	 */
	public $ksql = null;

	/**
	 * Partner List Type (optional)
	 *
	 * @var int
	 */
	public $partnerListType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalListListResponse extends KalturaListResponse
{
	/**
	 * Follow data list
	 *
	 * @var array of KalturaPersonalList
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagement extends KalturaObjectBase
{
	/**
	 * Engagement id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Total number of recipients
	 *
	 * @var int
	 * @readonly
	 */
	public $totalNumberOfRecipients = null;

	/**
	 * Engagement type
	 *
	 * @var KalturaEngagementType
	 */
	public $type = null;

	/**
	 * Engagement adapter id
	 *
	 * @var int
	 */
	public $adapterId = null;

	/**
	 * Engagement adapter dynamic data
	 *
	 * @var string
	 */
	public $adapterDynamicData = null;

	/**
	 * Interval (seconds)
	 *
	 * @var int
	 */
	public $intervalSeconds = null;

	/**
	 * Manual User list
	 *
	 * @var string
	 */
	public $userList = null;

	/**
	 * Send time (seconds)
	 *
	 * @var int
	 */
	public $sendTimeInSeconds = null;

	/**
	 * Coupon GroupId
	 *
	 * @var int
	 */
	public $couponGroupId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementListResponse extends KalturaListResponse
{
	/**
	 * A list of Engagement
	 *
	 * @var array of KalturaEngagement
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementAdapterBase extends KalturaObjectBase
{
	/**
	 * Engagement adapter id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Engagement adapter name
	 *
	 * @var string
	 */
	public $name = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementAdapter extends KalturaEngagementAdapterBase
{
	/**
	 * Engagement adapter active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Engagement adapter adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * Engagement provider adapter URL
	 *
	 * @var string
	 */
	public $providerUrl = null;

	/**
	 * Engagement adapter extra parameters
	 *
	 * @var map
	 */
	public $engagementAdapterSettings;

	/**
	 * Shared Secret
	 *
	 * @var string
	 * @readonly
	 */
	public $sharedSecret = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementAdapterListResponse extends KalturaListResponse
{
	/**
	 * A list of Engagement adapter
	 *
	 * @var array of KalturaEngagementAdapter
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReminder extends KalturaObjectBase
{
	/**
	 * Reminder name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Reminder id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Reminder type
	 *
	 * @var KalturaReminderType
	 */
	public $type = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReminderListResponse extends KalturaListResponse
{
	/**
	 * Reminders
	 *
	 * @var array of KalturaReminder
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesReminder extends KalturaReminder
{
	/**
	 * Series identifier
	 *
	 * @var string
	 */
	public $seriesId = null;

	/**
	 * Season number
	 *
	 * @var int
	 */
	public $seasonNumber = null;

	/**
	 * EPG channel identifier
	 *
	 * @var int
	 */
	public $epgChannelId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetReminder extends KalturaReminder
{
	/**
	 * Asset id
	 *
	 * @var int
	 */
	public $assetId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessage extends KalturaObjectBase
{
	/**
	 * message id
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * message
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Status
	 *
	 * @var KalturaInboxMessageStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Type
	 *
	 * @var KalturaInboxMessageType
	 */
	public $type = null;

	/**
	 * Created at
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * url
	 *
	 * @var string
	 */
	public $url = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessageListResponse extends KalturaListResponse
{
	/**
	 * Follow data list
	 *
	 * @var array of KalturaInboxMessage
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFollowDataBase extends KalturaObjectBase
{
	/**
	 * Announcement Id
	 *
	 * @var int
	 * @readonly
	 */
	public $announcementId = null;

	/**
	 * Status
	 *
	 * @var int
	 * @readonly
	 */
	public $status = null;

	/**
	 * Title
	 *
	 * @var string
	 * @readonly
	 */
	public $title = null;

	/**
	 * Timestamp
	 *
	 * @var int
	 * @readonly
	 */
	public $timestamp = null;

	/**
	 * Follow Phrase
	 *
	 * @var string
	 * @readonly
	 */
	public $followPhrase = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFollowTvSeries extends KalturaFollowDataBase
{
	/**
	 * Asset Id
	 *
	 * @var int
	 */
	public $assetId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFollowTvSeriesListResponse extends KalturaListResponse
{
	/**
	 * Follow data list
	 *
	 * @var array of KalturaFollowTvSeries
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncement extends KalturaObjectBase
{
	/**
	 * Announcement name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Announcement message
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Announcement enabled
	 *
	 * @var bool
	 */
	public $enabled = null;

	/**
	 * Announcement start time
	 *
	 * @var int
	 */
	public $startTime = null;

	/**
	 * Announcement time zone
	 *
	 * @var string
	 */
	public $timezone = null;

	/**
	 * Announcement status: NotSent=0/Sending=1/Sent=2/Aborted=3
	 *
	 * @var KalturaAnnouncementStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Announcement recipients: All=0/LoggedIn=1/Guests=2/Other=3
	 *
	 * @var KalturaAnnouncementRecipientsType
	 */
	public $recipients = null;

	/**
	 * Announcement id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Announcement image URL, relevant for system announcements
	 *
	 * @var string
	 */
	public $imageUrl = null;

	/**
	 * Include Mail
	 *
	 * @var bool
	 */
	public $includeMail = null;

	/**
	 * Mail Template
	 *
	 * @var string
	 */
	public $mailTemplate = null;

	/**
	 * Mail Subject
	 *
	 * @var string
	 */
	public $mailSubject = null;

	/**
	 * Include SMS
	 *
	 * @var bool
	 */
	public $includeSms = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncementListResponse extends KalturaListResponse
{
	/**
	 * Announcements
	 *
	 * @var array of KalturaAnnouncement
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFeed extends KalturaObjectBase
{
	/**
	 * Asset identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $assetId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalFeed extends KalturaFeed
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalFeedListResponse extends KalturaListResponse
{
	/**
	 * Follow data list
	 *
	 * @var array of KalturaPersonalFeed
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopic extends KalturaObjectBase
{
	/**
	 * message id
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * message
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * message
	 *
	 * @var string
	 */
	public $subscribersAmount = null;

	/**
	 * automaticIssueNotification
	 *
	 * @var KalturaTopicAutomaticIssueNotification
	 */
	public $automaticIssueNotification = null;

	/**
	 * lastMessageSentDateSec
	 *
	 * @var int
	 */
	public $lastMessageSentDateSec = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicListResponse extends KalturaListResponse
{
	/**
	 * Follow data list
	 *
	 * @var array of KalturaTopic
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPartnerConfiguration extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerConfigurationListResponse extends KalturaListResponse
{
	/**
	 * Partner Configurations
	 *
	 * @var array of KalturaPartnerConfiguration
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConcurrencyPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * Comma separated list of device Family Ids order by their priority.
	 *
	 * @var string
	 */
	public $deviceFamilyIds = null;

	/**
	 * Policy of eviction devices
	 *
	 * @var KalturaEvictionPolicyType
	 */
	public $evictionPolicy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBillingPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * configuration value
	 *
	 * @var string
	 */
	public $value = null;

	/**
	 * partner configuration type
	 *
	 * @var KalturaPartnerConfigurationType
	 */
	public $type = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaT extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenericListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaT
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIntegerValueListResponse extends KalturaListResponse
{
	/**
	 * Interger value items
	 *
	 * @var array of KalturaIntegerValue
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReport extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportListResponse extends KalturaListResponse
{
	/**
	 * Reports
	 *
	 * @var array of KalturaReport
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPushParams extends KalturaObjectBase
{
	/**
	 * Device-Application push token
	 *
	 * @var string
	 */
	public $token = null;

	/**
	 * External device token as received from external push provider in exchange for the device token
	 *
	 * @var string
	 */
	public $externalToken = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceReport extends KalturaReport
{
	/**
	 * Partner unique identifier
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * Configuration group identifier which the version configuration the device last received belongs to
	 *
	 * @var string
	 */
	public $configurationGroupId = null;

	/**
	 * Device unique identifier
	 *
	 * @var string
	 */
	public $udid = null;

	/**
	 * Device-Application push parameters
	 *
	 * @var KalturaPushParams
	 */
	public $pushParameters;

	/**
	 * Application version number
	 *
	 * @var string
	 */
	public $versionNumber = null;

	/**
	 * Application version type
	 *
	 * @var KalturaPlatform
	 */
	public $versionPlatform = null;

	/**
	 * Application version name
	 *
	 * @var string
	 */
	public $versionAppName = null;

	/**
	 * Last access IP
	 *
	 * @var string
	 */
	public $lastAccessIP = null;

	/**
	 * Last device configuration request date
	 *
	 * @var int
	 */
	public $lastAccessDate = null;

	/**
	 * request header property
	 *
	 * @var string
	 */
	public $userAgent = null;

	/**
	 * Request header property
	 *             Incase value cannot be found - returns &quot;Unknown 0.0&quot;
	 *
	 * @var string
	 */
	public $operationSystem = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulk extends KalturaObjectBase
{
	/**
	 * Bulk identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Status
	 *
	 * @var KalturaBatchJobStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Specifies when was the bulk action created. Date and time represented as epoch
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the bulk action last updated. Date and time represented as epoch
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkListResponse extends KalturaListResponse
{
	/**
	 * bulk items
	 *
	 * @var array of KalturaBulk
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseSegmentCondition extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseSegmentValue extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentationType extends KalturaObjectBase
{
	/**
	 * Id of segmentation type
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Name of segmentation type
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Description of segmentation type
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Segmentation conditions - can be empty
	 *
	 * @var array of KalturaBaseSegmentCondition
	 */
	public $conditions;

	/**
	 * Segmentation values - can be empty (so only one segment will be created)
	 *
	 * @var KalturaBaseSegmentValue
	 */
	public $value;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentationTypeListResponse extends KalturaListResponse
{
	/**
	 * Segmentation Types
	 *
	 * @var array of KalturaSegmentationType
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMonetizationCondition extends KalturaObjectBase
{
	/**
	 * Purchase type
	 *
	 * @var KalturaMonetizationType
	 */
	public $type = null;

	/**
	 * Minimum price of purchase
	 *
	 * @var int
	 */
	public $minimumPrice = null;

	/**
	 * Score multiplier
	 *
	 * @var int
	 */
	public $multiplier = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaScoredMonetizationCondition extends KalturaBaseSegmentCondition
{
	/**
	 * The minimum score to be met
	 *
	 * @var int
	 */
	public $minScore = null;

	/**
	 * The maximum score to be met
	 *
	 * @var int
	 */
	public $maxScore = null;

	/**
	 * How many days back should the actions be considered
	 *
	 * @var int
	 */
	public $days = null;

	/**
	 * List of the actions that consist the condition
	 *
	 * @var array of KalturaMonetizationCondition
	 */
	public $actions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaContentActionCondition extends KalturaObjectBase
{
	/**
	 * The relevant action to be examined
	 *
	 * @var KalturaContentAction
	 */
	public $action = null;

	/**
	 * Optional - if action required specific length to be considered (in percentage or minutes)
	 *
	 * @var int
	 */
	public $length = null;

	/**
	 * Optional - if action required specific length to be considered (in percentage or minutes)
	 *
	 * @var KalturaContentActionConditionLengthType
	 */
	public $lengthType = null;

	/**
	 * Score multiplier - how much is a single action worth when considering the action
	 *
	 * @var int
	 */
	public $multiplier = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaContentScoreCondition extends KalturaBaseSegmentCondition
{
	/**
	 * The minimum score to be met
	 *
	 * @var int
	 */
	public $minScore = null;

	/**
	 * The maximum score to be met
	 *
	 * @var int
	 */
	public $maxScore = null;

	/**
	 * How many days back should the actions be considered
	 *
	 * @var int
	 */
	public $days = null;

	/**
	 * If condition should be applied on specific field (and not the one of the segment value)
	 *
	 * @var string
	 */
	public $field = null;

	/**
	 * If condition should be applied on specific field (and not the one of the segment value) -
	 *
	 * @var string
	 */
	public $value = null;

	/**
	 * List of the actions that consist the condition
	 *
	 * @var array of KalturaContentActionCondition
	 */
	public $actions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserDataCondition extends KalturaBaseSegmentCondition
{
	/**
	 * Field name
	 *
	 * @var string
	 */
	public $field = null;

	/**
	 * Value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentSource extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentValue extends KalturaObjectBase
{
	/**
	 * Id of segment
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Systematic name of segment
	 *
	 * @var string
	 */
	public $systematicName = null;

	/**
	 * Name of segment
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * The value of the segment
	 *
	 * @var string
	 */
	public $value = null;

	/**
	 * Threshold - minimum score to be met for this specific value
	 *
	 * @var int
	 */
	public $threshold = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentValues extends KalturaBaseSegmentValue
{
	/**
	 * Segment values source
	 *
	 * @var KalturaSegmentSource
	 */
	public $source;

	/**
	 * List of segment values
	 *
	 * @var array of KalturaSegmentValue
	 */
	public $values;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentAllValues extends KalturaSegmentValues
{
	/**
	 * Segment names&#39; format - they will be automatically generated
	 *
	 * @var string
	 */
	public $nameFormat = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMonetizationSource extends KalturaSegmentSource
{
	/**
	 * Purchase type
	 *
	 * @var KalturaMonetizationType
	 */
	public $type = null;

	/**
	 * Mathermtical operator to calculate
	 *
	 * @var KalturaMathemticalOperatorType
	 */
	public $operator = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaContentSource extends KalturaSegmentSource
{
	/**
	 * Topic (meta or tag) name
	 *
	 * @var string
	 */
	public $field = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserDynamicDataSource extends KalturaSegmentSource
{
	/**
	 * Field name
	 *
	 * @var string
	 */
	public $field = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentRange extends KalturaObjectBase
{
	/**
	 * Id of segment
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Systematic name of segment
	 *
	 * @var string
	 */
	public $systematicName = null;

	/**
	 * Specific segment name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Greater than or equals &gt;=
	 *
	 * @var float
	 */
	public $gte = null;

	/**
	 * Greater than &gt;
	 *
	 * @var float
	 */
	public $gt = null;

	/**
	 * Less than or equals
	 *
	 * @var float
	 */
	public $lte = null;

	/**
	 * Less than
	 *
	 * @var float
	 */
	public $lt = null;

	/**
	 * Equals
	 *
	 * @var float
	 */
	public $equals = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentRanges extends KalturaBaseSegmentValue
{
	/**
	 * Range source
	 *
	 * @var KalturaSegmentSource
	 */
	public $source;

	/**
	 * List of ranges for segmentation
	 *
	 * @var array of KalturaSegmentRange
	 */
	public $ranges;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSegment extends KalturaObjectBase
{
	/**
	 * Segment Id
	 *
	 * @var int
	 */
	public $segmentId = null;

	/**
	 * User Id of segment
	 *
	 * @var string
	 */
	public $userId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSegmentListResponse extends KalturaListResponse
{
	/**
	 * Segmentation Types
	 *
	 * @var array of KalturaUserSegment
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesRecording extends KalturaObjectBase
{
	/**
	 * Kaltura unique ID representing the series recording identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Kaltura EpgId
	 *
	 * @var int
	 */
	public $epgId = null;

	/**
	 * Kaltura ChannelId
	 *
	 * @var int
	 */
	public $channelId = null;

	/**
	 * Kaltura SeriesId
	 *
	 * @var string
	 */
	public $seriesId = null;

	/**
	 * Kaltura SeasonNumber
	 *
	 * @var int
	 */
	public $seasonNumber = null;

	/**
	 * Recording Type: single/series/season
	 *
	 * @var KalturaRecordingType
	 */
	public $type = null;

	/**
	 * Specifies when was the series recording created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the series recording last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * List of the season numbers to exclude.
	 *
	 * @var array of KalturaIntegerValue
	 * @readonly
	 */
	public $excludedSeasons;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesRecordingListResponse extends KalturaListResponse
{
	/**
	 * Series Recordings
	 *
	 * @var array of KalturaSeriesRecording
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPremiumService extends KalturaObjectBase
{
	/**
	 * Service identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Service name / description
	 *
	 * @var string
	 */
	public $name = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPremiumService extends KalturaPremiumService
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPremiumServiceListResponse extends KalturaListResponse
{
	/**
	 * A list of premium services
	 *
	 * @var array of KalturaHouseholdPremiumService
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNpvrPremiumService extends KalturaPremiumService
{
	/**
	 * Quota in minutes
	 *
	 * @var int
	 * @readonly
	 */
	public $quotaInMinutes = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCDVRAdapterProfile extends KalturaObjectBase
{
	/**
	 * C-DVR adapter identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * C-DVR adapter name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * C-DVR adapter active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * C-DVR adapter adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * C-DVR adapter extra parameters
	 *
	 * @var map
	 */
	public $settings;

	/**
	 * C-DVR adapter external identifier
	 *
	 * @var string
	 */
	public $externalIdentifier = null;

	/**
	 * C-DVR shared secret
	 *
	 * @var string
	 * @readonly
	 */
	public $sharedSecret = null;

	/**
	 * Indicates whether the C-DVR adapter supports dynamic URLs
	 *
	 * @var bool
	 */
	public $dynamicLinksSupport = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCDVRAdapterProfileListResponse extends KalturaListResponse
{
	/**
	 * C-DVR adapter profiles
	 *
	 * @var array of KalturaCDVRAdapterProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecording extends KalturaObjectBase
{
	/**
	 * Kaltura unique ID representing the recording identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Recording state: scheduled/recording/recorded/canceled/failed/deleted
	 *
	 * @var KalturaRecordingStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Kaltura unique ID representing the program identifier
	 *
	 * @var int
	 */
	public $assetId = null;

	/**
	 * Recording Type: single/season/series
	 *
	 * @var KalturaRecordingType
	 * @insertonly
	 */
	public $type = null;

	/**
	 * Specifies until when the recording is available for viewing. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $viewableUntilDate = null;

	/**
	 * Specifies whether or not the recording is protected
	 *
	 * @var bool
	 * @insertonly
	 */
	public $isProtected = null;

	/**
	 * Specifies when was the recording created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the recording last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalRecording extends KalturaRecording
{
	/**
	 * External identifier for the recording
	 *
	 * @var string
	 * @insertonly
	 */
	public $externalId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingListResponse extends KalturaListResponse
{
	/**
	 * Recordings
	 *
	 * @var array of KalturaRecording
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPrice extends KalturaObjectBase
{
	/**
	 * Price
	 *
	 * @var float
	 */
	public $amount = null;

	/**
	 * Currency
	 *
	 * @var string
	 */
	public $currency = null;

	/**
	 * Currency Sign
	 *
	 * @var string
	 */
	public $currencySign = null;

	/**
	 * Country ID
	 *
	 * @var int
	 */
	public $countryId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBillingTransaction extends KalturaObjectBase
{
	/**
	 * Reciept Code
	 *
	 * @var string
	 * @readonly
	 */
	public $recieptCode = null;

	/**
	 * Purchased Item Name
	 *
	 * @var string
	 * @readonly
	 */
	public $purchasedItemName = null;

	/**
	 * Purchased Item Code
	 *
	 * @var string
	 * @readonly
	 */
	public $purchasedItemCode = null;

	/**
	 * Item Type
	 *
	 * @var KalturaBillingItemsType
	 * @readonly
	 */
	public $itemType = null;

	/**
	 * Billing Action
	 *
	 * @var KalturaBillingAction
	 * @readonly
	 */
	public $billingAction = null;

	/**
	 * price
	 *
	 * @var KalturaPrice
	 * @readonly
	 */
	public $price;

	/**
	 * Action Date
	 *
	 * @var int
	 * @readonly
	 */
	public $actionDate = null;

	/**
	 * Start Date
	 *
	 * @var int
	 * @readonly
	 */
	public $startDate = null;

	/**
	 * End Date
	 *
	 * @var int
	 * @readonly
	 */
	public $endDate = null;

	/**
	 * Payment Method
	 *
	 * @var KalturaPaymentMethodType
	 * @readonly
	 */
	public $paymentMethod = null;

	/**
	 * Payment Method Extra Details
	 *
	 * @var string
	 * @readonly
	 */
	public $paymentMethodExtraDetails = null;

	/**
	 * Is Recurring
	 *
	 * @var bool
	 * @readonly
	 */
	public $isRecurring = null;

	/**
	 * Billing Provider Ref
	 *
	 * @var int
	 * @readonly
	 */
	public $billingProviderRef = null;

	/**
	 * Purchase ID
	 *
	 * @var int
	 * @readonly
	 */
	public $purchaseId = null;

	/**
	 * Remarks
	 *
	 * @var string
	 * @readonly
	 */
	public $remarks = null;

	/**
	 * Billing Price Info
	 *
	 * @var KalturaBillingPriceType
	 * @readonly
	 */
	public $billingPriceType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBillingTransactionListResponse extends KalturaListResponse
{
	/**
	 * Transactions
	 *
	 * @var array of KalturaBillingTransaction
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscount extends KalturaPrice
{
	/**
	 * The discount percentage
	 *
	 * @var int
	 * @readonly
	 */
	public $percentage = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlement extends KalturaObjectBase
{
	/**
	 * Purchase identifier (for subscriptions and collections only)
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Product identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $productId = null;

	/**
	 * The current number of uses
	 *
	 * @var int
	 * @readonly
	 */
	public $currentUses = null;

	/**
	 * The end date of the entitlement
	 *
	 * @var int
	 * @readonly
	 */
	public $endDate = null;

	/**
	 * Current date
	 *
	 * @var int
	 * @readonly
	 */
	public $currentDate = null;

	/**
	 * The last date the item was viewed
	 *
	 * @var int
	 * @readonly
	 */
	public $lastViewDate = null;

	/**
	 * Purchase date
	 *
	 * @var int
	 * @readonly
	 */
	public $purchaseDate = null;

	/**
	 * Payment Method
	 *
	 * @var KalturaPaymentMethodType
	 * @readonly
	 */
	public $paymentMethod = null;

	/**
	 * The UDID of the device from which the purchase was made
	 *
	 * @var string
	 * @readonly
	 */
	public $deviceUdid = null;

	/**
	 * The name of the device from which the purchase was made
	 *
	 * @var string
	 * @readonly
	 */
	public $deviceName = null;

	/**
	 * Indicates whether a cancelation window period is enabled
	 *
	 * @var bool
	 * @readonly
	 */
	public $isCancelationWindowEnabled = null;

	/**
	 * The maximum number of uses available for this item (only for subscription and PPV)
	 *
	 * @var int
	 * @readonly
	 */
	public $maxUses = null;

	/**
	 * The Identifier of the purchasing user
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * The Identifier of the purchasing household
	 *
	 * @var int
	 * @readonly
	 */
	public $householdId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementListResponse extends KalturaListResponse
{
	/**
	 * A list of entitlements
	 *
	 * @var array of KalturaEntitlement
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollectionEntitlement extends KalturaEntitlement
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPpvEntitlement extends KalturaEntitlement
{
	/**
	 * Media file identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $mediaFileId = null;

	/**
	 * Media identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $mediaId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionEntitlement extends KalturaEntitlement
{
	/**
	 * The date of the next renewal (only for subscription)
	 *
	 * @var int
	 * @readonly
	 */
	public $nextRenewalDate = null;

	/**
	 * Indicates whether the subscription is renewable in this purchase (only for subscription)
	 *
	 * @var bool
	 * @readonly
	 */
	public $isRenewableForPurchase = null;

	/**
	 * Indicates whether a subscription is renewable (only for subscription)
	 *
	 * @var bool
	 * @readonly
	 */
	public $isRenewable = null;

	/**
	 * Indicates whether the user is currently in his grace period entitlement
	 *
	 * @var bool
	 * @readonly
	 */
	public $isInGracePeriod = null;

	/**
	 * Payment Gateway identifier
	 *
	 * @var int
	 */
	public $paymentGatewayId = null;

	/**
	 * Payment Method identifier
	 *
	 * @var int
	 */
	public $paymentMethodId = null;

	/**
	 * Scheduled Subscription Identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $scheduledSubscriptionId = null;

	/**
	 * Unified payment identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $unifiedPaymentId = null;

	/**
	 * Indicates if the subscription suspended
	 *
	 * @var bool
	 * @readonly
	 */
	public $isSuspended = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFilePpv extends KalturaObjectBase
{
	/**
	 * Asset file identifier
	 *
	 * @var int
	 */
	public $assetFileId = null;

	/**
	 * Ppv module identifier
	 *
	 * @var int
	 */
	public $ppvModuleId = null;

	/**
	 * Start date and time represented as epoch.
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * End date and time represented as epoch.
	 *
	 * @var int
	 */
	public $endDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFilePpvListResponse extends KalturaListResponse
{
	/**
	 * A list of asset files ppvs
	 *
	 * @var array of KalturaAssetFilePpv
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPriceDetails extends KalturaObjectBase
{
	/**
	 * The price code identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * The price code name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * The price
	 *
	 * @var KalturaPrice
	 * @readonly
	 */
	public $price;

	/**
	 * Multi currency prices for all countries and currencies
	 *
	 * @var array of KalturaPrice
	 */
	public $multiCurrencyPrice;

	/**
	 * A list of the descriptions for this price on different languages (language code and translation)
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $descriptions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountModule extends KalturaObjectBase
{
	/**
	 * The discount percentage
	 *
	 * @var float
	 */
	public $percent = null;

	/**
	 * The first date the discount is available
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The last date the discount is available
	 *
	 * @var int
	 */
	public $endDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponsGroup extends KalturaObjectBase
{
	/**
	 * Coupon group identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Coupon group name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * The first date the coupons in this coupons group are valid
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The last date the coupons in this coupons group are valid
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * Maximum number of uses for each coupon in the group
	 *
	 * @var int
	 */
	public $maxUsesNumber = null;

	/**
	 * Maximum number of uses for each coupon in the group on a renewable subscription
	 *
	 * @var int
	 */
	public $maxUsesNumberOnRenewableSub = null;

	/**
	 * Type of the coupon group
	 *
	 * @var KalturaCouponGroupType
	 */
	public $couponGroupType = null;

	/**
	 * Maximum number of uses per household for each coupon in the group
	 *
	 * @var int
	 */
	public $maxHouseholdUses = null;

	/**
	 * Discount ID
	 *
	 * @var int
	 */
	public $discountId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUsageModule extends KalturaObjectBase
{
	/**
	 * Usage module identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Usage module name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * The maximum number of times an item in this usage module can be viewed
	 *
	 * @var int
	 * @readonly
	 */
	public $maxViewsNumber = null;

	/**
	 * The amount time an item is available for viewing since a user started watching the item
	 *
	 * @var int
	 * @readonly
	 */
	public $viewLifeCycle = null;

	/**
	 * The amount time an item is available for viewing
	 *
	 * @var int
	 * @readonly
	 */
	public $fullLifeCycle = null;

	/**
	 * Identifies a specific coupon linked to this object
	 *
	 * @var int
	 * @readonly
	 */
	public $couponId = null;

	/**
	 * Time period during which the end user can waive his rights to cancel a purchase. When the time period is passed, the purchase can no longer be cancelled
	 *
	 * @var int
	 * @readonly
	 */
	public $waiverPeriod = null;

	/**
	 * Indicates whether or not the end user has the right to waive his rights to cancel a purchase
	 *
	 * @var bool
	 * @readonly
	 */
	public $isWaiverEnabled = null;

	/**
	 * Indicates that usage is targeted for offline playback
	 *
	 * @var bool
	 * @readonly
	 */
	public $isOfflinePlayback = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPpv extends KalturaObjectBase
{
	/**
	 * PPV identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * the name for the ppv
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * The price of the ppv
	 *
	 * @var KalturaPriceDetails
	 */
	public $price;

	/**
	 * A list of file types identifiers that are supported in this ppv
	 *
	 * @var array of KalturaIntegerValue
	 */
	public $fileTypes;

	/**
	 * The internal discount module for the ppv
	 *
	 * @var KalturaDiscountModule
	 */
	public $discountModule;

	/**
	 * Coupons group for the ppv
	 *
	 * @var KalturaCouponsGroup
	 */
	public $couponsGroup;

	/**
	 * A list of the descriptions of the ppv on different languages (language code and translation)
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $descriptions;

	/**
	 * Product code for the ppv
	 *
	 * @var string
	 */
	public $productCode = null;

	/**
	 * Indicates whether or not this ppv can be purchased standalone or only as part of a subscription
	 *
	 * @var bool
	 */
	public $isSubscriptionOnly = null;

	/**
	 * Indicates whether or not this ppv can be consumed only on the first device
	 *
	 * @var bool
	 */
	public $firstDeviceLimitation = null;

	/**
	 * PPV usage module
	 *
	 * @var KalturaUsageModule
	 */
	public $usageModule;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPpvListResponse extends KalturaListResponse
{
	/**
	 * A list of PPV
	 *
	 * @var array of KalturaPpv
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPricePlan extends KalturaUsageModule
{
	/**
	 * Denotes whether or not this object can be renewed
	 *
	 * @var bool
	 * @readonly
	 */
	public $isRenewable = null;

	/**
	 * Defines the number of times the module will be renewed (for the life_cycle period)
	 *
	 * @var int
	 * @readonly
	 */
	public $renewalsNumber = null;

	/**
	 * The discount module identifier of the price plan
	 *
	 * @var int
	 * @readonly
	 */
	public $discountId = null;

	/**
	 * The ID of the price details associated with this price plan
	 *
	 * @var int
	 */
	public $priceDetailsId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBaseChannel extends KalturaObjectBase
{
	/**
	 * Unique identifier for the channel
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProductCode extends KalturaObjectBase
{
	/**
	 * Provider Name
	 *
	 * @var string
	 */
	public $inappProvider = null;

	/**
	 * Product Code
	 *
	 * @var string
	 */
	public $code = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollection extends KalturaObjectBase
{
	/**
	 * Collection identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * A list of channels associated with this collection
	 *
	 * @var array of KalturaBaseChannel
	 */
	public $channels;

	/**
	 * The first date the collection is available for purchasing
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The last date the collection is available for purchasing
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * The internal discount module for the subscription
	 *
	 * @var KalturaDiscountModule
	 */
	public $discountModule;

	/**
	 * Name of the subscription
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Name of the subscription
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * description of the subscription
	 *
	 * @var string
	 * @readonly
	 */
	public $description = null;

	/**
	 * description of the subscription
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualDescription;

	/**
	 * Collection usage module
	 *
	 * @var KalturaUsageModule
	 */
	public $usageModule;

	/**
	 * List of Coupons group
	 *
	 * @var array of KalturaCouponsGroup
	 */
	public $couponsGroups;

	/**
	 * External ID
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * List of Collection product codes
	 *
	 * @var array of KalturaProductCode
	 */
	public $productCodes;

	/**
	 * The ID of the price details associated with this collection
	 *
	 * @var int
	 */
	public $priceDetailsId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollectionListResponse extends KalturaListResponse
{
	/**
	 * A list of collections
	 *
	 * @var array of KalturaCollection
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetGroupBy extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDynamicOrderBy extends KalturaObjectBase
{
	/**
	 * order by name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * order by meta asc/desc
	 *
	 * @var KalturaMetaTagOrderBy
	 */
	public $orderBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelOrder extends KalturaObjectBase
{
	/**
	 * Channel dynamic order by (meta)
	 *
	 * @var KalturaDynamicOrderBy
	 */
	public $dynamicOrderBy;

	/**
	 * Channel order by
	 *
	 * @var KalturaChannelOrderBy
	 */
	public $orderBy = null;

	/**
	 * Sliding window period in minutes, used only when ordering by LIKES_DESC / VOTES_DESC / RATINGS_DESC / VIEWS_DESC
	 *
	 * @var int
	 */
	public $period = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannel extends KalturaBaseChannel
{
	/**
	 * Channel name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Channel name
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * Channel name
	 *
	 * @var string
	 */
	public $oldName = null;

	/**
	 * Channel system name
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Cannel description
	 *
	 * @var string
	 * @readonly
	 */
	public $description = null;

	/**
	 * Cannel description
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualDescription;

	/**
	 * Cannel description
	 *
	 * @var string
	 */
	public $oldDescription = null;

	/**
	 * active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Channel order by
	 *
	 * @var KalturaChannelOrder
	 */
	public $orderBy;

	/**
	 * Specifies when was the Channel was created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the Channel last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDynamicChannel extends KalturaChannel
{
	/**
	 * Search assets using dynamic criteria. Provided collection of nested expressions with key, comparison operators, value, and logical conjunction.
	 *             Possible keys: any Tag or Meta defined in the system and the following reserved keys: start_date, end_date. 
	 *             epg_id, media_id - for specific asset IDs.
	 *             geo_block - only valid value is &quot;true&quot;: When enabled, only assets that are not restriced to the user by geo-block rules will return.
	 *             parental_rules - only valid value is &quot;true&quot;: When enabled, only assets that the user doesn&#39;t need to provide PIN code will return.
	 *             user_interests - only valid value is &quot;true&quot;. When enabled, only assets that the user defined as his interests (by tags and metas) will return.
	 *             epg_channel_id – the channel identifier of the EPG program. *****Deprecated, please use linear_media_id instead*****
	 *             linear_media_id – the linear media identifier of the EPG program.
	 *             entitled_assets - valid values: &quot;free&quot;, &quot;entitled&quot;, &quot;both&quot;. free - gets only free to watch assets. entitled - only those that the user is implicitly entitled to watch.
	 *             Comparison operators: for numerical fields =, &gt;, &gt;=, &lt;, &lt;=, : (in). 
	 *             For alpha-numerical fields =, != (not), ~ (like), !~, ^ (any word starts with), ^= (phrase starts with), + (exists), !+ (not exists).
	 *             Logical conjunction: and, or. 
	 *             Search values are limited to 20 characters each.
	 *             (maximum length of entire filter is 4096 characters)
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * Asset types in the channel.
	 *             -26 is EPG
	 *
	 * @var array of KalturaIntegerValue
	 */
	public $assetTypes;

	/**
	 * Channel group by
	 *
	 * @var KalturaAssetGroupBy
	 */
	public $groupBy;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaManualChannel extends KalturaChannel
{
	/**
	 * A list of comma separated media ids associated with this channel, according to the order of the medias in the channel.
	 *
	 * @var string
	 */
	public $mediaIds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetMetaOrTagGroupBy extends KalturaAssetGroupBy
{
	/**
	 * Group by a tag or meta - according to the name that appears in the system (similar to KSQL)
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFieldGroupBy extends KalturaAssetGroupBy
{
	/**
	 * Group by a specific field that is defined in enum
	 *
	 * @var KalturaGroupByField
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountDetails extends KalturaObjectBase
{
	/**
	 * The discount ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * The price code name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Multi currency discounts for all countries and currencies
	 *
	 * @var array of KalturaDiscount
	 */
	public $multiCurrencyDiscount;

	/**
	 * Start date represented as epoch
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * End date represented as epoch
	 *
	 * @var int
	 */
	public $endDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountDetailsListResponse extends KalturaListResponse
{
	/**
	 * A list of price details
	 *
	 * @var array of KalturaDiscountDetails
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaSubscriptionSet extends KalturaObjectBase
{
	/**
	 * SubscriptionSet identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * SubscriptionSet name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Type of the Subscription Set
	 *
	 * @var KalturaSubscriptionSetType
	 * @readonly
	 */
	public $type = null;

	/**
	 * A list of comma separated subscription ids associated with this set ordered by priority ascending
	 *
	 * @var string
	 */
	public $subscriptionIds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSetListResponse extends KalturaListResponse
{
	/**
	 * A list of subscriptionSets
	 *
	 * @var array of KalturaSubscriptionSet
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionDependencySet extends KalturaSubscriptionSet
{
	/**
	 * Base Subscription identifier
	 *
	 * @var int
	 */
	public $baseSubscriptionId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSwitchSet extends KalturaSubscriptionSet
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaProductPrice extends KalturaObjectBase
{
	/**
	 * Product identifier
	 *
	 * @var string
	 */
	public $productId = null;

	/**
	 * Product Type
	 *
	 * @var KalturaTransactionType
	 */
	public $productType = null;

	/**
	 * Product price
	 *
	 * @var KalturaPrice
	 */
	public $price;

	/**
	 * Product purchase status
	 *
	 * @var KalturaPurchaseStatus
	 */
	public $purchaseStatus = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProductPriceListResponse extends KalturaListResponse
{
	/**
	 * A list of prices
	 *
	 * @var array of KalturaProductPrice
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollectionPrice extends KalturaProductPrice
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPpvPrice extends KalturaProductPrice
{
	/**
	 * Media file identifier
	 *
	 * @var int
	 */
	public $fileId = null;

	/**
	 * The associated PPV module identifier
	 *
	 * @var string
	 */
	public $ppvModuleId = null;

	/**
	 * Denotes whether this object is available only as part of a subscription or can be sold separately
	 *
	 * @var bool
	 */
	public $isSubscriptionOnly = null;

	/**
	 * The full price of the item (with no discounts)
	 *
	 * @var KalturaPrice
	 */
	public $fullPrice;

	/**
	 * The identifier of the relevant subscription
	 *
	 * @var string
	 */
	public $subscriptionId = null;

	/**
	 * The identifier of the relevant collection
	 *
	 * @var string
	 */
	public $collectionId = null;

	/**
	 * The identifier of the relevant pre paid
	 *
	 * @var string
	 */
	public $prePaidId = null;

	/**
	 * A list of the descriptions of the PPV module on different languages (language code and translation)
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $ppvDescriptions;

	/**
	 * If the item already purchased - the identifier of the user (in the household) who purchased this item
	 *
	 * @var string
	 */
	public $purchaseUserId = null;

	/**
	 * If the item already purchased - the identifier of the purchased file
	 *
	 * @var int
	 */
	public $purchasedMediaFileId = null;

	/**
	 * Related media files identifiers (different types)
	 *
	 * @var array of KalturaIntegerValue
	 */
	public $relatedMediaFileIds;

	/**
	 * If the item already purchased - since when the user can start watching the item
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * If the item already purchased - until when the user can watch the item
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * Discount end date
	 *
	 * @var int
	 */
	public $discountEndDate = null;

	/**
	 * If the item already purchased and played - the name of the device on which it was first played
	 *
	 * @var string
	 */
	public $firstDeviceName = null;

	/**
	 * If waiver period is enabled - donates whether the user is still in the cancelation window
	 *
	 * @var bool
	 */
	public $isInCancelationPeriod = null;

	/**
	 * The PPV product code
	 *
	 * @var string
	 */
	public $ppvProductCode = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionPrice extends KalturaProductPrice
{
	/**
	 * If the item related to unified billing cycle purchased - until when the this price is relevant
	 *
	 * @var int
	 */
	public $endDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponsGroupListResponse extends KalturaListResponse
{
	/**
	 * A list of coupons groups
	 *
	 * @var array of KalturaCouponsGroup
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPriceDetailsListResponse extends KalturaListResponse
{
	/**
	 * A list of price details
	 *
	 * @var array of KalturaPriceDetails
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPricePlanListResponse extends KalturaListResponse
{
	/**
	 * A list of price plans
	 *
	 * @var array of KalturaPricePlan
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPreviewModule extends KalturaObjectBase
{
	/**
	 * Preview module identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Preview module name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Preview module life cycle - for how long the preview module is active
	 *
	 * @var int
	 */
	public $lifeCycle = null;

	/**
	 * The time you can&#39;t buy the item to which the preview module is assigned to again
	 *
	 * @var int
	 */
	public $nonRenewablePeriod = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscription extends KalturaObjectBase
{
	/**
	 * Subscription identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * A list of channels associated with this subscription
	 *
	 * @var array of KalturaBaseChannel
	 */
	public $channels;

	/**
	 * The first date the subscription is available for purchasing
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The last date the subscription is available for purchasing
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * A list of file types identifiers that are supported in this subscription
	 *
	 * @var array of KalturaIntegerValue
	 */
	public $fileTypes;

	/**
	 * Denotes whether or not this subscription can be renewed
	 *
	 * @var bool
	 */
	public $isRenewable = null;

	/**
	 * Defines the number of times this subscription will be renewed
	 *
	 * @var int
	 */
	public $renewalsNumber = null;

	/**
	 * Indicates whether the subscription will renew forever
	 *
	 * @var bool
	 */
	public $isInfiniteRenewal = null;

	/**
	 * The price of the subscription
	 *
	 * @var KalturaPriceDetails
	 */
	public $price;

	/**
	 * The internal discount module for the subscription
	 *
	 * @var KalturaDiscountModule
	 */
	public $discountModule;

	/**
	 * Name of the subscription
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Name of the subscription
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * description of the subscription
	 *
	 * @var string
	 * @readonly
	 */
	public $description = null;

	/**
	 * description of the subscription
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualDescription;

	/**
	 * Identifier of the media associated with the subscription
	 *
	 * @var int
	 */
	public $mediaId = null;

	/**
	 * Subscription order (when returned in methods that retrieve subscriptions)
	 *
	 * @var int
	 */
	public $prorityInOrder = null;

	/**
	 * Comma separated subscription price plan IDs
	 *
	 * @var string
	 */
	public $pricePlanIds = null;

	/**
	 * Subscription preview module
	 *
	 * @var KalturaPreviewModule
	 */
	public $previewModule;

	/**
	 * The household limitation module identifier associated with this subscription
	 *
	 * @var int
	 */
	public $householdLimitationsId = null;

	/**
	 * The subscription grace period in minutes
	 *
	 * @var int
	 */
	public $gracePeriodMinutes = null;

	/**
	 * List of premium services included in the subscription
	 *
	 * @var array of KalturaPremiumService
	 */
	public $premiumServices;

	/**
	 * The maximum number of times an item in this usage module can be viewed
	 *
	 * @var int
	 */
	public $maxViewsNumber = null;

	/**
	 * The amount time an item is available for viewing since a user started watching the item
	 *
	 * @var int
	 */
	public $viewLifeCycle = null;

	/**
	 * Time period during which the end user can waive his rights to cancel a purchase. When the time period is passed, the purchase can no longer be cancelled
	 *
	 * @var int
	 */
	public $waiverPeriod = null;

	/**
	 * Indicates whether or not the end user has the right to waive his rights to cancel a purchase
	 *
	 * @var bool
	 */
	public $isWaiverEnabled = null;

	/**
	 * List of permitted user types for the subscription
	 *
	 * @var array of KalturaOTTUserType
	 */
	public $userTypes;

	/**
	 * List of Coupons group
	 *
	 * @var array of KalturaCouponsGroup
	 */
	public $couponsGroups;

	/**
	 * List of Subscription product codes
	 *
	 * @var array of KalturaProductCode
	 */
	public $productCodes;

	/**
	 * Dependency Type
	 *
	 * @var KalturaSubscriptionDependencyType
	 */
	public $dependencyType = null;

	/**
	 * External ID
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * Is cancellation blocked for the subscription
	 *
	 * @var bool
	 */
	public $isCancellationBlocked = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionListResponse extends KalturaListResponse
{
	/**
	 * A list of subscriptions
	 *
	 * @var array of KalturaSubscription
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProductsPriceListResponse extends KalturaListResponse
{
	/**
	 * A list of prices
	 *
	 * @var array of KalturaProductPrice
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructMeta extends KalturaObjectBase
{
	/**
	 * Asset Struct id (template_id)
	 *
	 * @var int
	 * @readonly
	 */
	public $assetStructId = null;

	/**
	 * Meta id (topic_id)
	 *
	 * @var int
	 * @readonly
	 */
	public $metaId = null;

	/**
	 * IngestReferencePath
	 *
	 * @var string
	 */
	public $ingestReferencePath = null;

	/**
	 * ProtectFromIngest
	 *
	 * @var bool
	 */
	public $protectFromIngest = null;

	/**
	 * DefaultIngestValue
	 *
	 * @var string
	 */
	public $defaultIngestValue = null;

	/**
	 * Specifies when was the Asset Struct Meta was created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the Asset Struct Meta last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Is inherited
	 *
	 * @var bool
	 */
	public $isInherited = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructMetaListResponse extends KalturaListResponse
{
	/**
	 * A list of asset struct metas
	 *
	 * @var array of KalturaAssetStructMeta
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileType extends KalturaObjectBase
{
	/**
	 * Unique identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Unique name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Unique description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Indicates if media-file type is active or disabled
	 *
	 * @var bool
	 */
	public $status = null;

	/**
	 * Specifies when was the type was created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the type last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Specifies whether playback as trailer is allowed
	 *
	 * @var bool
	 * @insertonly
	 */
	public $isTrailer = null;

	/**
	 * Defines playback streamer type
	 *
	 * @var KalturaMediaFileStreamerType
	 * @insertonly
	 */
	public $streamerType = null;

	/**
	 * DRM adapter-profile identifier, use -1 for uDRM, 0 for no DRM.
	 *
	 * @var int
	 * @insertonly
	 */
	public $drmProfileId = null;

	/**
	 * Media file type quality
	 *
	 * @var KalturaMediaFileTypeQuality
	 */
	public $quality = null;

	/**
	 * List of comma separated video codecs
	 *
	 * @var string
	 */
	public $videoCodecs = null;

	/**
	 * List of comma separated audio codecs
	 *
	 * @var string
	 */
	public $audioCodecs = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileTypeListResponse extends KalturaListResponse
{
	/**
	 * A list of media-file types
	 *
	 * @var array of KalturaMediaFileType
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelListResponse extends KalturaListResponse
{
	/**
	 * A list of channels
	 *
	 * @var array of KalturaChannel
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImage extends KalturaObjectBase
{
	/**
	 * Image ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Image version
	 *
	 * @var string
	 * @readonly
	 */
	public $version = null;

	/**
	 * Image type ID
	 *
	 * @var int
	 */
	public $imageTypeId = null;

	/**
	 * ID of the object the image is related to
	 *
	 * @var int
	 */
	public $imageObjectId = null;

	/**
	 * Type of the object the image is related to
	 *
	 * @var KalturaImageObjectType
	 */
	public $imageObjectType = null;

	/**
	 * Image content status
	 *
	 * @var KalturaImageStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Image URL
	 *
	 * @var string
	 * @readonly
	 */
	public $url = null;

	/**
	 * Image content ID
	 *
	 * @var string
	 * @readonly
	 */
	public $contentId = null;

	/**
	 * Specifies if the image is default for atleast one image type.
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefault = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImageListResponse extends KalturaListResponse
{
	/**
	 * A list of images
	 *
	 * @var array of KalturaImage
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRatio extends KalturaObjectBase
{
	/**
	 * ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Name
	 *
	 * @var string
	 * @insertonly
	 */
	public $name = null;

	/**
	 * Height
	 *
	 * @var int
	 * @insertonly
	 */
	public $height = null;

	/**
	 * Width
	 *
	 * @var int
	 * @insertonly
	 */
	public $width = null;

	/**
	 * Accepted error margin precentage of an image uploaded for this ratio
	 *             0 - no validation, everything accepted
	 *
	 * @var int
	 */
	public $precisionPrecentage = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRatioListResponse extends KalturaListResponse
{
	/**
	 * A list of ratios
	 *
	 * @var array of KalturaRatio
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTag extends KalturaObjectBase
{
	/**
	 * Tag id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Tag Type
	 *
	 * @var int
	 */
	public $type = null;

	/**
	 * Tag
	 *
	 * @var string
	 * @readonly
	 */
	public $tag = null;

	/**
	 * Tag
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualTag;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTagListResponse extends KalturaListResponse
{
	/**
	 * A list of partner tags
	 *
	 * @var array of KalturaTag
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAsset extends KalturaObjectBase
{
	/**
	 * Unique identifier for the asset
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Identifies the asset type (EPG, Recording, Movie, TV Series, etc). 
	 *             Possible values: 0 – EPG linear programs, 1 - Recording; or any asset type ID according to the asset types IDs defined in the system.
	 *
	 * @var int
	 * @insertonly
	 */
	public $type = null;

	/**
	 * Asset name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Asset name
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * Asset description
	 *
	 * @var string
	 * @readonly
	 */
	public $description = null;

	/**
	 * Asset description
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualDescription;

	/**
	 * Collection of images details that can be used to represent this asset
	 *
	 * @var array of KalturaMediaImage
	 * @readonly
	 */
	public $images;

	/**
	 * Files
	 *
	 * @var array of KalturaMediaFile
	 * @readonly
	 */
	public $mediaFiles;

	/**
	 * Dynamic collection of key-value pairs according to the String Meta defined in the system
	 *
	 * @var map
	 */
	public $metas;

	/**
	 * Dynamic collection of key-value pairs according to the Tag Types defined in the system
	 *
	 * @var map
	 */
	public $tags;

	/**
	 * Date and time represented as epoch. For VOD – since when the asset is available in the catalog. For EPG/Linear – when the program is aired (can be in the future).
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * Date and time represented as epoch. For VOD – till when the asset be available in the catalog. For EPG/Linear – program end time and date
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * Specifies when was the Asset was created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the Asset last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * External identifier for the asset
	 *
	 * @var string
	 */
	public $externalId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetListResponse extends KalturaListResponse
{
	/**
	 * Assets
	 *
	 * @var array of KalturaAsset
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaAsset extends KalturaAsset
{
	/**
	 * External identifiers
	 *
	 * @var string
	 */
	public $externalIds = null;

	/**
	 * Entry Identifier
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * Device rule identifier
	 *
	 * @var int
	 */
	public $deviceRuleId = null;

	/**
	 * Geo block rule identifier
	 *
	 * @var int
	 */
	public $geoBlockRuleId = null;

	/**
	 * The media asset status
	 *
	 * @var bool
	 */
	public $status = null;

	/**
	 * The media asset inheritance policy
	 *
	 * @var KalturaAssetInheritancePolicy
	 */
	public $inheritancePolicy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveAsset extends KalturaMediaAsset
{
	/**
	 * Enable CDVR, configuration only
	 *
	 * @var KalturaTimeShiftedTvState
	 */
	public $enableCdvrState = null;

	/**
	 * Enable catch-up, configuration only
	 *
	 * @var KalturaTimeShiftedTvState
	 */
	public $enableCatchUpState = null;

	/**
	 * Enable start over, configuration only
	 *
	 * @var KalturaTimeShiftedTvState
	 */
	public $enableStartOverState = null;

	/**
	 * buffer Catch-up, configuration only
	 *
	 * @var int
	 */
	public $bufferCatchUpSetting = null;

	/**
	 * buffer Trick-play, configuration only
	 *
	 * @var int
	 */
	public $bufferTrickPlaySetting = null;

	/**
	 * Enable Recording playback for non entitled channel, configuration only
	 *
	 * @var KalturaTimeShiftedTvState
	 */
	public $enableRecordingPlaybackNonEntitledChannelState = null;

	/**
	 * Enable trick-play, configuration only
	 *
	 * @var KalturaTimeShiftedTvState
	 */
	public $enableTrickPlayState = null;

	/**
	 * External identifier used when ingesting programs for this linear media asset
	 *
	 * @var string
	 */
	public $externalEpgIngestId = null;

	/**
	 * External identifier for the CDVR
	 *
	 * @var string
	 */
	public $externalCdvrId = null;

	/**
	 * Is CDVR enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableCdvr = null;

	/**
	 * Is catch-up enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableCatchUp = null;

	/**
	 * Is start over enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableStartOver = null;

	/**
	 * summed Catch-up buffer, the TimeShiftedTvPartnerSettings are also taken into consideration
	 *
	 * @var int
	 * @readonly
	 */
	public $catchUpBuffer = null;

	/**
	 * summed Trick-play buffer, the TimeShiftedTvPartnerSettings are also taken into consideration
	 *
	 * @var int
	 * @readonly
	 */
	public $trickPlayBuffer = null;

	/**
	 * Is recording playback for non entitled channel enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableRecordingPlaybackNonEntitledChannel = null;

	/**
	 * Is trick-play enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableTrickPlay = null;

	/**
	 * channel type, possible values: UNKNOWN, DTT, OTT, DTT_AND_OTT
	 *
	 * @var KalturaLinearChannelType
	 */
	public $channelType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProgramAsset extends KalturaAsset
{
	/**
	 * EPG channel identifier
	 *
	 * @var int
	 */
	public $epgChannelId = null;

	/**
	 * EPG identifier
	 *
	 * @var string
	 */
	public $epgId = null;

	/**
	 * Ralated media identifier
	 *
	 * @var int
	 */
	public $relatedMediaId = null;

	/**
	 * Unique identifier for the program
	 *
	 * @var string
	 */
	public $crid = null;

	/**
	 * Id of linear media asset
	 *
	 * @var int
	 */
	public $linearAssetId = null;

	/**
	 * Is CDVR enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableCdvr = null;

	/**
	 * Is catch-up enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableCatchUp = null;

	/**
	 * Is start over enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableStartOver = null;

	/**
	 * Is trick-play enabled for this asset
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableTrickPlay = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingAsset extends KalturaProgramAsset
{
	/**
	 * Recording identifier
	 *
	 * @var string
	 */
	public $recordingId = null;

	/**
	 * Recording Type: single/season/series
	 *
	 * @var KalturaRecordingType
	 */
	public $recordingType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStruct extends KalturaObjectBase
{
	/**
	 * Asset Struct id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Asset struct name for the partner
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Asset struct name for the partner
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * Asset Struct system name for the partner
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Is the Asset Struct protected by the system
	 *
	 * @var bool
	 */
	public $isProtected = null;

	/**
	 * A list of comma separated meta ids associated with this asset struct, returned according to the order.
	 *
	 * @var string
	 */
	public $metaIds = null;

	/**
	 * Specifies when was the Asset Struct was created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the Asset Struct last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * List of supported features
	 *
	 * @var string
	 */
	public $features = null;

	/**
	 * Plural Name
	 *
	 * @var string
	 */
	public $pluralName = null;

	/**
	 * AssetStruct parent Id
	 *
	 * @var int
	 */
	public $parentId = null;

	/**
	 * connectingMetaId
	 *
	 * @var int
	 */
	public $connectingMetaId = null;

	/**
	 * connectedParentMetaId
	 *
	 * @var int
	 */
	public $connectedParentMetaId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructListResponse extends KalturaListResponse
{
	/**
	 * A list of asset structs
	 *
	 * @var array of KalturaAssetStruct
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImageType extends KalturaObjectBase
{
	/**
	 * Image type ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * System name
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Ration ID
	 *
	 * @var int
	 */
	public $ratioId = null;

	/**
	 * Help text
	 *
	 * @var string
	 */
	public $helpText = null;

	/**
	 * Default image ID
	 *
	 * @var int
	 */
	public $defaultImageId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImageTypeListResponse extends KalturaListResponse
{
	/**
	 * A list of partner image types
	 *
	 * @var array of KalturaImageType
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCount extends KalturaObjectBase
{
	/**
	 * Value
	 *
	 * @var string
	 */
	public $value = null;

	/**
	 * Count
	 *
	 * @var int
	 */
	public $count = null;

	/**
	 * Sub groups
	 *
	 * @var array of KalturaAssetsCount
	 */
	public $subs;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetsCount extends KalturaObjectBase
{
	/**
	 * Field name
	 *
	 * @var string
	 */
	public $field = null;

	/**
	 * Values, their count and sub groups
	 *
	 * @var array of KalturaAssetCount
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCountListResponse extends KalturaListResponse
{
	/**
	 * Count of assets that match filter result, regardless of group by result
	 *
	 * @var int
	 */
	public $assetsCount = null;

	/**
	 * List of groupings (field name and sub-list of values and their counts)
	 *
	 * @var array of KalturaAssetsCount
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSlimAsset extends KalturaObjectBase
{
	/**
	 * Internal identifier of the asset
	 *
	 * @var string
	 * @insertonly
	 */
	public $id = null;

	/**
	 * The type of the asset. Possible values: media, recording, epg
	 *
	 * @var KalturaAssetType
	 * @insertonly
	 */
	public $type = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkPlayerData extends KalturaObjectBase
{
	/**
	 * Action
	 *
	 * @var KalturaBookmarkActionType
	 */
	public $action = null;

	/**
	 * Average Bitrate
	 *
	 * @var int
	 */
	public $averageBitrate = null;

	/**
	 * Total Bitrate
	 *
	 * @var int
	 */
	public $totalBitrate = null;

	/**
	 * Current Bitrate
	 *
	 * @var int
	 */
	public $currentBitrate = null;

	/**
	 * Identifier of the file
	 *
	 * @var int
	 */
	public $fileId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmark extends KalturaSlimAsset
{
	/**
	 * User identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * The position of the user in the specific asset (in seconds)
	 *
	 * @var int
	 * @insertonly
	 */
	public $position = null;

	/**
	 * Indicates who is the owner of this position
	 *
	 * @var KalturaPositionOwner
	 * @readonly
	 */
	public $positionOwner = null;

	/**
	 * Specifies whether the user&#39;s current position exceeded 95% of the duration
	 *
	 * @var bool
	 * @readonly
	 */
	public $finishedWatching = null;

	/**
	 * Insert only player data
	 *
	 * @var KalturaBookmarkPlayerData
	 */
	public $playerData;

	/**
	 * Program Id
	 *
	 * @var int
	 */
	public $programId = null;

	/**
	 * Indicates if the current request is in reporting mode (hit)
	 *
	 * @var bool
	 */
	public $isReportingMode = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkListResponse extends KalturaListResponse
{
	/**
	 * Assets
	 *
	 * @var array of KalturaBookmark
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCommentListResponse extends KalturaListResponse
{
	/**
	 * Assets
	 *
	 * @var array of KalturaAssetComment
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStatisticsListResponse extends KalturaListResponse
{
	/**
	 * Assets
	 *
	 * @var array of KalturaAssetStatistics
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileListResponse extends KalturaListResponse
{
	/**
	 * A list of media-file types
	 *
	 * @var array of KalturaMediaFile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetHistory extends KalturaObjectBase
{
	/**
	 * Asset identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $assetId = null;

	/**
	 * Asset identifier
	 *
	 * @var KalturaAssetType
	 * @readonly
	 */
	public $assetType = null;

	/**
	 * Position in seconds of the relevant asset
	 *
	 * @var int
	 * @readonly
	 */
	public $position = null;

	/**
	 * Duration in seconds of the relevant asset
	 *
	 * @var int
	 * @readonly
	 */
	public $duration = null;

	/**
	 * The date when the media was last watched
	 *
	 * @var int
	 * @readonly
	 */
	public $watchedDate = null;

	/**
	 * Boolean which specifies whether the user finished watching the movie or not
	 *
	 * @var bool
	 * @readonly
	 */
	public $finishedWatching = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetHistoryListResponse extends KalturaListResponse
{
	/**
	 * WatchHistoryAssets Models
	 *
	 * @var array of KalturaAssetHistory
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaRule extends KalturaObjectBase
{
	/**
	 * ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Description
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaCondition extends KalturaObjectBase
{
	/**
	 * The type of the condition
	 *
	 * @var KalturaRuleConditionType
	 * @readonly
	 */
	public $type = null;

	/**
	 * Description
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaRuleAction extends KalturaObjectBase
{
	/**
	 * The type of the action
	 *
	 * @var KalturaRuleActionType
	 * @readonly
	 */
	public $type = null;

	/**
	 * Description
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApplyDiscountModuleAction extends KalturaRuleAction
{
	/**
	 * Discount module ID
	 *
	 * @var int
	 */
	public $discountModuleId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBusinessModuleRule extends KalturaRule
{
	/**
	 * List of conditions for the rule
	 *
	 * @var array of KalturaCondition
	 */
	public $conditions;

	/**
	 * List of actions for the rule
	 *
	 * @var array of KalturaApplyDiscountModuleAction
	 */
	public $actions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBusinessModuleRuleListResponse extends KalturaListResponse
{
	/**
	 * Asset rules
	 *
	 * @var array of KalturaBusinessModuleRule
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetRuleBase extends KalturaRule
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCondition extends KalturaCondition
{
	/**
	 * KSQL
	 *
	 * @var string
	 */
	public $ksql = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetUserRuleAction extends KalturaRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetUserRule extends KalturaAssetRuleBase
{
	/**
	 * List of Ksql conditions for the user rule
	 *
	 * @var array of KalturaAssetCondition
	 */
	public $conditions;

	/**
	 * List of actions for the user rule
	 *
	 * @var array of KalturaAssetUserRuleAction
	 */
	public $actions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaNotCondition extends KalturaCondition
{
	/**
	 * Indicates whether to apply not on the other properties in the condition
	 *
	 * @var bool
	 */
	public $not = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountryCondition extends KalturaNotCondition
{
	/**
	 * Comma separated countries IDs list
	 *
	 * @var string
	 */
	public $countries = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDateCondition extends KalturaNotCondition
{
	/**
	 * Start date
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * End date
	 *
	 * @var int
	 */
	public $endDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOrCondition extends KalturaCondition
{
	/**
	 * List of conditions with or between them
	 *
	 * @var array of KalturaCondition
	 */
	public $conditions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConcurrencyCondition extends KalturaAssetCondition
{
	/**
	 * Concurrency limitation
	 *
	 * @var int
	 */
	public $limit = null;

	/**
	 * Concurrency limitation type
	 *
	 * @var KalturaConcurrencyLimitationType
	 */
	public $concurrencyLimitationType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIpRangeCondition extends KalturaCondition
{
	/**
	 * From IP address range
	 *
	 * @var string
	 */
	public $fromIP = null;

	/**
	 * TO IP address range
	 *
	 * @var string
	 */
	public $toIP = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBusinessModuleCondition extends KalturaCondition
{
	/**
	 * Business module type
	 *
	 * @var KalturaTransactionType
	 */
	public $businessModuleType = null;

	/**
	 * Business module ID
	 *
	 * @var int
	 */
	public $businessModuleId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentsCondition extends KalturaCondition
{
	/**
	 * Comma separated segments IDs list
	 *
	 * @var string
	 */
	public $segmentsIds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetRuleAction extends KalturaRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAccessControlBlockAction extends KalturaAssetRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaTimeOffsetRuleAction extends KalturaAssetRuleAction
{
	/**
	 * Offset in seconds
	 *
	 * @var int
	 */
	public $offset = null;

	/**
	 * Indicates whether to add time zone offset to the time
	 *
	 * @var bool
	 */
	public $timeZone = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEndDateOffsetRuleAction extends KalturaTimeOffsetRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStartDateOffsetRuleAction extends KalturaTimeOffsetRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAllowPlaybackAction extends KalturaAssetRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBlockPlaybackAction extends KalturaAssetRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetUserRuleBlockAction extends KalturaAssetUserRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetRule extends KalturaAssetRuleBase
{
	/**
	 * List of conditions for the rule
	 *
	 * @var array of KalturaCondition
	 */
	public $conditions;

	/**
	 * List of actions for the rule
	 *
	 * @var array of KalturaAssetRuleAction
	 */
	public $actions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDrmProfile extends KalturaObjectBase
{
	/**
	 * DRM adapter identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * DRM adapter name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * DRM adapter active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * DRM adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * DRM adapter settings
	 *
	 * @var string
	 */
	public $settings = null;

	/**
	 * DRM adapter alias
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * DRM shared secret
	 *
	 * @var string
	 * @readonly
	 */
	public $sharedSecret = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDrmProfileListResponse extends KalturaListResponse
{
	/**
	 * Adapters
	 *
	 * @var array of KalturaDrmProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermission extends KalturaObjectBase
{
	/**
	 * Permission identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Permission name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Permission friendly name
	 *
	 * @var string
	 */
	public $friendlyName = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionListResponse extends KalturaListResponse
{
	/**
	 * A list of permissions
	 *
	 * @var array of KalturaPermission
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGroupPermission extends KalturaPermission
{
	/**
	 * Permission identifier
	 *
	 * @var string
	 */
	public $group = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaConcurrencyRule extends KalturaObjectBase
{
	/**
	 * Media concurrency rule  identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * Media concurrency rule  name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Concurrency limitation type
	 *
	 * @var KalturaConcurrencyLimitationType
	 */
	public $concurrencyLimitationType = null;

	/**
	 * Limitation
	 *
	 * @var int
	 */
	public $limitation = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaConcurrencyRuleListResponse extends KalturaListResponse
{
	/**
	 * Media CONCURRENCY RULES
	 *
	 * @var array of KalturaMediaConcurrencyRule
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetUserRuleListResponse extends KalturaListResponse
{
	/**
	 * Asset user rules
	 *
	 * @var array of KalturaAssetUserRule
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCurrency extends KalturaObjectBase
{
	/**
	 * Currency name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Currency code
	 *
	 * @var string
	 */
	public $code = null;

	/**
	 * Currency Sign
	 *
	 * @var string
	 */
	public $sign = null;

	/**
	 * Is the default Currency of the account
	 *
	 * @var bool
	 */
	public $isDefault = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCurrencyListResponse extends KalturaListResponse
{
	/**
	 * Currencies
	 *
	 * @var array of KalturaCurrency
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetRuleListResponse extends KalturaListResponse
{
	/**
	 * Asset rules
	 *
	 * @var array of KalturaAssetRule
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLanguage extends KalturaObjectBase
{
	/**
	 * Language name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Language system name
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Language code
	 *
	 * @var string
	 */
	public $code = null;

	/**
	 * Language direction (LTR/RTL)
	 *
	 * @var string
	 */
	public $direction = null;

	/**
	 * Is the default language of the account
	 *
	 * @var bool
	 */
	public $isDefault = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLanguageListResponse extends KalturaListResponse
{
	/**
	 * Languages
	 *
	 * @var array of KalturaLanguage
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMeta extends KalturaObjectBase
{
	/**
	 * Meta id
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Meta name for the partner
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Meta name for the partner
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * Meta system name for the partner
	 *
	 * @var string
	 * @insertonly
	 */
	public $systemName = null;

	/**
	 * Meta data type
	 *
	 * @var KalturaMetaDataType
	 * @insertonly
	 */
	public $dataType = null;

	/**
	 * Does the meta contain multiple values
	 *
	 * @var bool
	 */
	public $multipleValue = null;

	/**
	 * Is the meta protected by the system
	 *
	 * @var bool
	 * @insertonly
	 */
	public $isProtected = null;

	/**
	 * The help text of the meta to be displayed on the UI.
	 *
	 * @var string
	 */
	public $helpText = null;

	/**
	 * List of supported features
	 *
	 * @var string
	 */
	public $features = null;

	/**
	 * Parent meta id
	 *
	 * @var string
	 */
	public $parentId = null;

	/**
	 * Specifies when was the meta created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the meta last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaListResponse extends KalturaListResponse
{
	/**
	 * A list asset meta
	 *
	 * @var array of KalturaMeta
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceBrand extends KalturaObjectBase
{
	/**
	 * Device brand identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Device brand name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Device family identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $deviceFamilyid = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceBrandListResponse extends KalturaListResponse
{
	/**
	 * Device brands
	 *
	 * @var array of KalturaDeviceBrand
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountryListResponse extends KalturaListResponse
{
	/**
	 * Countries
	 *
	 * @var array of KalturaCountry
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOSSAdapterBaseProfile extends KalturaObjectBase
{
	/**
	 * OSS adapter id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * OSS adapter name
	 *
	 * @var string
	 */
	public $name = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOSSAdapterProfile extends KalturaOSSAdapterBaseProfile
{
	/**
	 * OSS adapter active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * OSS adapter adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * OSS adapter extra parameters
	 *
	 * @var map
	 */
	public $ossAdapterSettings;

	/**
	 * OSS adapter external identifier
	 *
	 * @var string
	 */
	public $externalIdentifier = null;

	/**
	 * Shared Secret
	 *
	 * @var string
	 * @readonly
	 */
	public $sharedSecret = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOSSAdapterProfileListResponse extends KalturaListResponse
{
	/**
	 * A list of OSS adapter-profiles
	 *
	 * @var array of KalturaOSSAdapterProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchHistory extends KalturaObjectBase
{
	/**
	 * Search ID
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Search name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Filter
	 *
	 * @var string
	 * @readonly
	 */
	public $filter = null;

	/**
	 * Search language
	 *
	 * @var string
	 * @readonly
	 */
	public $language = null;

	/**
	 * When search was performed
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Kaltura OTT Service
	 *
	 * @var string
	 * @readonly
	 */
	public $service = null;

	/**
	 * Kaltura OTT Service Action
	 *
	 * @var string
	 * @readonly
	 */
	public $action = null;

	/**
	 * Unique Device ID
	 *
	 * @var string
	 * @readonly
	 */
	public $deviceId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchHistoryListResponse extends KalturaListResponse
{
	/**
	 * KalturaSearchHistory Models
	 *
	 * @var array of KalturaSearchHistory
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceFamilyBase extends KalturaObjectBase
{
	/**
	 * Device family identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Device family name
	 *
	 * @var string
	 */
	public $name = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceFamily extends KalturaDeviceFamilyBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceFamilyListResponse extends KalturaListResponse
{
	/**
	 * Device families
	 *
	 * @var array of KalturaDeviceFamily
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdDeviceFamilyLimitations extends KalturaDeviceFamilyBase
{
	/**
	 * Allowed device change frequency code
	 *
	 * @var int
	 */
	public $frequency = null;

	/**
	 * Max number of devices allowed for this family
	 *
	 * @var int
	 */
	public $deviceLimit = null;

	/**
	 * Max number of streams allowed for this family
	 *
	 * @var int
	 */
	public $concurrentLimit = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionalChannel extends KalturaObjectBase
{
	/**
	 * The identifier of the linear media representing the channel
	 *
	 * @var int
	 */
	public $linearChannelId = null;

	/**
	 * The number of the channel
	 *
	 * @var int
	 */
	public $channelNumber = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegion extends KalturaObjectBase
{
	/**
	 * Region identifier
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * Region name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Region external identifier
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * Indicates whether this is the default region for the partner
	 *
	 * @var bool
	 */
	public $isDefault = null;

	/**
	 * List of associated linear channels
	 *
	 * @var array of KalturaRegionalChannel
	 */
	public $linearChannels;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionListResponse extends KalturaListResponse
{
	/**
	 * A list of regions
	 *
	 * @var array of KalturaRegion
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetRule extends KalturaObjectBase
{
	/**
	 * Unique rule identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Rule type - possible values: Rule type – Parental, Geo, UserType, Device
	 *
	 * @var KalturaRuleType
	 */
	public $ruleType = null;

	/**
	 * Rule display name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Additional description for the specific rule
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetRuleListResponse extends KalturaListResponse
{
	/**
	 * A list of generic rules
	 *
	 * @var array of KalturaUserAssetRule
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCDNAdapterProfile extends KalturaObjectBase
{
	/**
	 * CDN adapter identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * CDNR adapter name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * CDN adapter active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * CDN adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * CDN adapter base URL
	 *
	 * @var string
	 */
	public $baseUrl = null;

	/**
	 * CDN adapter settings
	 *
	 * @var map
	 */
	public $settings;

	/**
	 * CDN adapter alias
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * CDN shared secret
	 *
	 * @var string
	 * @readonly
	 */
	public $sharedSecret = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCDNAdapterProfileListResponse extends KalturaListResponse
{
	/**
	 * Adapters
	 *
	 * @var array of KalturaCDNAdapterProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportTask extends KalturaObjectBase
{
	/**
	 * Task identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Alias for the task used to solicit an export using API
	 *
	 * @var string
	 */
	public $alias = null;

	/**
	 * Task display name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * The data type exported in this task
	 *
	 * @var KalturaExportDataType
	 */
	public $dataType = null;

	/**
	 * Filter to apply on the export, utilize KSQL.
	 *             Note: KSQL currently applies to media assets only. It cannot be used for USERS filtering
	 *
	 * @var string
	 */
	public $filter = null;

	/**
	 * Type of export batch – full or incremental
	 *
	 * @var KalturaExportType
	 */
	public $exportType = null;

	/**
	 * How often the export should occur, reasonable minimum threshold should apply, configurable in minutes
	 *
	 * @var int
	 */
	public $frequency = null;

	/**
	 * The URL for sending a notification when the task&#39;s export process is done
	 *
	 * @var string
	 */
	public $notificationUrl = null;

	/**
	 * List of media type identifiers (as configured in TVM) to export. used only in case data_type = vod
	 *
	 * @var array of KalturaIntegerValue
	 */
	public $vodTypes;

	/**
	 * Indicates if the task is active or not
	 *
	 * @var bool
	 */
	public $isActive = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportTaskListResponse extends KalturaListResponse
{
	/**
	 * Export task items
	 *
	 * @var array of KalturaExportTask
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelEnrichmentHolder extends KalturaObjectBase
{
	/**
	 * Enrichment type
	 *
	 * @var KalturaChannelEnrichment
	 */
	public $type = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalChannelProfile extends KalturaObjectBase
{
	/**
	 * External channel id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * External channel name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * External channel active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * External channel external identifier
	 *
	 * @var string
	 */
	public $externalIdentifier = null;

	/**
	 * Filter expression
	 *
	 * @var string
	 */
	public $filterExpression = null;

	/**
	 * Recommendation engine id
	 *
	 * @var int
	 */
	public $recommendationEngineId = null;

	/**
	 * Enrichments
	 *
	 * @var array of KalturaChannelEnrichmentHolder
	 */
	public $enrichments;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalChannelProfileListResponse extends KalturaListResponse
{
	/**
	 * External channel profiles
	 *
	 * @var array of KalturaExternalChannelProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecommendationProfile extends KalturaObjectBase
{
	/**
	 * recommendation engine id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * recommendation engine name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * recommendation engine is active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * recommendation engine adapter URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * recommendation engine extra parameters
	 *
	 * @var map
	 */
	public $recommendationEngineSettings;

	/**
	 * recommendation engine external identifier
	 *
	 * @var string
	 */
	public $externalIdentifier = null;

	/**
	 * Shared Secret
	 *
	 * @var string
	 * @readonly
	 */
	public $sharedSecret = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecommendationProfileListResponse extends KalturaListResponse
{
	/**
	 * Recommendation profiles list
	 *
	 * @var array of KalturaRecommendationProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegistrySettings extends KalturaObjectBase
{
	/**
	 * Permission item identifier
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * Permission item name
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegistrySettingsListResponse extends KalturaListResponse
{
	/**
	 * Registry settings list
	 *
	 * @var array of KalturaRegistrySettings
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaParentalRule extends KalturaObjectBase
{
	/**
	 * Unique parental rule identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Rule display name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Explanatory description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Rule order within the full list of rules
	 *
	 * @var int
	 */
	public $order = null;

	/**
	 * Media asset tag ID to in which to look for corresponding trigger values
	 *
	 * @var int
	 */
	public $mediaTag = null;

	/**
	 * EPG asset tag ID to in which to look for corresponding trigger values
	 *
	 * @var int
	 */
	public $epgTag = null;

	/**
	 * Content that correspond to this rule is not available for guests
	 *
	 * @var bool
	 */
	public $blockAnonymousAccess = null;

	/**
	 * Rule type – Movies, TV series or both
	 *
	 * @var KalturaParentalRuleType
	 */
	public $ruleType = null;

	/**
	 * Media tag values that trigger rule
	 *
	 * @var array of KalturaStringValue
	 */
	public $mediaTagValues;

	/**
	 * EPG tag values that trigger rule
	 *
	 * @var array of KalturaStringValue
	 */
	public $epgTagValues;

	/**
	 * Is the rule the default rule of the account
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefault = null;

	/**
	 * Where was this rule defined account, household or user
	 *
	 * @var KalturaRuleLevel
	 * @readonly
	 */
	public $origin = null;

	/**
	 * active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Specifies when was the parental rule created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the parental rule last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaParentalRuleListResponse extends KalturaListResponse
{
	/**
	 * A list of parental rules
	 *
	 * @var array of KalturaParentalRule
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRole extends KalturaObjectBase
{
	/**
	 * User role identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * User role name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * permissions associated with the user role
	 *
	 * @var string
	 */
	public $permissionNames = null;

	/**
	 * permissions associated with the user role in is_exclueded = true
	 *
	 * @var string
	 */
	public $excludedPermissionNames = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleListResponse extends KalturaListResponse
{
	/**
	 * A list of generic rules
	 *
	 * @var array of KalturaUserRole
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaClientConfiguration extends KalturaObjectBase
{
	/**
	 * Client Tag
	 *
	 * @var string
	 */
	public $clientTag = null;

	/**
	 * API client version
	 *
	 * @var string
	 */
	public $apiVersion = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseResponseProfile extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRequestConfiguration extends KalturaObjectBase
{
	/**
	 * Impersonated partner id
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * Impersonated user id
	 *
	 * @var int
	 */
	public $userId = null;

	/**
	 * Content language
	 *
	 * @var string
	 */
	public $language = null;

	/**
	 * Currency to be used
	 *
	 * @var string
	 */
	public $currency = null;

	/**
	 * Kaltura API session
	 *
	 * @var string
	 */
	public $ks = null;

	/**
	 * Kaltura response profile object
	 *
	 * @var KalturaBaseResponseProfile
	 */
	public $responseProfile;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilter extends KalturaObjectBase
{
	/**
	 * order by
	 *
	 * @var string
	 */
	public $orderBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDetachedResponseProfile extends KalturaBaseResponseProfile
{
	/**
	 * name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * filter
	 *
	 * @var KalturaRelatedObjectFilter
	 */
	public $filter;

	/**
	 * relatedProfiles
	 *
	 * @var array of KalturaDetachedResponseProfile
	 */
	public $relatedProfiles;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaRelatedObjectFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialCommentFilter extends KalturaFilter
{
	/**
	 * Asset ID to filter by
	 *
	 * @var int
	 */
	public $assetIdEqual = null;

	/**
	 * Asset type to filter by, currently only VOD (media)
	 *
	 * @var KalturaAssetType
	 */
	public $assetTypeEqual = null;

	/**
	 * Comma separated list of social actions to filter by
	 *
	 * @var KalturaSocialPlatform
	 */
	public $socialPlatformEqual = null;

	/**
	 * The create date from which to get the comments
	 *
	 * @var int
	 */
	public $createDateGreaterThan = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialFriendActivityFilter extends KalturaFilter
{
	/**
	 * Asset ID to filter by
	 *
	 * @var int
	 */
	public $assetIdEqual = null;

	/**
	 * Asset type to filter by, currently only VOD (media)
	 *
	 * @var KalturaAssetType
	 */
	public $assetTypeEqual = null;

	/**
	 * Comma separated list of social actions to filter by
	 *
	 * @var string
	 */
	public $actionTypeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionFilter extends KalturaFilter
{
	/**
	 * Comma separated list of asset identifiers.
	 *
	 * @var string
	 */
	public $assetIdIn = null;

	/**
	 * Asset Type
	 *
	 * @var KalturaAssetType
	 */
	public $assetTypeEqual = null;

	/**
	 * Comma separated list of social actions to filter by
	 *
	 * @var string
	 */
	public $actionTypeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentMethodProfileFilter extends KalturaFilter
{
	/**
	 * Payment gateway identifier to list the payment methods for
	 *
	 * @var int
	 */
	public $paymentGatewayIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdDeviceFilter extends KalturaFilter
{
	/**
	 * The identifier of the household
	 *
	 * @var int
	 */
	public $householdIdEqual = null;

	/**
	 * Device family Ids
	 *
	 * @var string
	 */
	public $deviceFamilyIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdUserFilter extends KalturaFilter
{
	/**
	 * The identifier of the household
	 *
	 * @var int
	 */
	public $householdIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationsFilter extends KalturaFilter
{
	/**
	 * the ID of the configuration group for which to return related configurations
	 *
	 * @var string
	 */
	public $configurationGroupIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaReportFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceReportFilter extends KalturaReportFilter
{
	/**
	 * Filter device configuration later than specific date
	 *
	 * @var int
	 */
	public $lastAccessDateGreaterThanOrEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupTagFilter extends KalturaFilter
{
	/**
	 * the ID of the configuration group for which to return related configurations group tags
	 *
	 * @var string
	 */
	public $configurationGroupIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupDeviceFilter extends KalturaFilter
{
	/**
	 * the ID of the configuration group for which to return related configurations group devices
	 *
	 * @var string
	 */
	public $configurationGroupIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFavoriteFilter extends KalturaFilter
{
	/**
	 * Media type to filter by the favorite assets
	 *
	 * @var int
	 */
	public $mediaTypeEqual = null;

	/**
	 * Media identifiers from which to filter the favorite assets
	 *
	 * @var string
	 */
	public $mediaIdIn = null;

	/**
	 * Indicates whether the results should be filtered by origin UDID using the current
	 *
	 * @var bool
	 */
	public $udidEqualCurrent = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOTTUserFilter extends KalturaFilter
{
	/**
	 * Username
	 *
	 * @var string
	 */
	public $usernameEqual = null;

	/**
	 * User external identifier
	 *
	 * @var string
	 */
	public $externalIdEqual = null;

	/**
	 * List of user identifiers separated by &#39;,&#39;
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Comma separated list of role Ids.
	 *
	 * @var string
	 */
	public $roleIdsIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalListFilter extends KalturaFilter
{
	/**
	 * Comma separated list of partner list types to search within. 
	 *             If omitted – all types should be included.
	 *
	 * @var string
	 */
	public $partnerListTypeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementFilter extends KalturaFilter
{
	/**
	 * List of inbox message types to search within.
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * SendTime GreaterThanOrEqual
	 *
	 * @var int
	 */
	public $sendTimeGreaterThanOrEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaReminderFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetReminderFilter extends KalturaReminderFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesReminderFilter extends KalturaReminderFilter
{
	/**
	 * Comma separated series IDs
	 *
	 * @var string
	 */
	public $seriesIdIn = null;

	/**
	 * EPG channel ID
	 *
	 * @var int
	 */
	public $epgChannelIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeasonsReminderFilter extends KalturaReminderFilter
{
	/**
	 * Series ID
	 *
	 * @var string
	 */
	public $seriesIdEqual = null;

	/**
	 * Comma separated season numbers
	 *
	 * @var string
	 */
	public $seasonNumberIn = null;

	/**
	 * EPG channel ID
	 *
	 * @var int
	 */
	public $epgChannelIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFollowTvSeriesFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessageFilter extends KalturaFilter
{
	/**
	 * List of inbox message types to search within.
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * createdAtGreaterThanOrEqual
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * createdAtLessThanOrEqual
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncementFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalFeedFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerConfigurationFilter extends KalturaFilter
{
	/**
	 * Indicates which partner configuration list to return
	 *
	 * @var KalturaPartnerConfigurationType
	 */
	public $partnerConfigurationTypeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAggregationCountFilter extends KalturaRelatedObjectFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaPersistedFilter extends KalturaFilter
{
	/**
	 * Name for the presisted filter. If empty, no action will be done. If has value, the filter will be saved and persisted in user&#39;s search history.
	 *
	 * @var string
	 */
	public $name = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkFilter extends KalturaPersistedFilter
{
	/**
	 * dynamicOrderBy - order by Meta
	 *
	 * @var KalturaBatchJobStatus
	 */
	public $statusEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFilter extends KalturaPersistedFilter
{
	/**
	 * dynamicOrderBy - order by Meta
	 *
	 * @var KalturaDynamicOrderBy
	 */
	public $dynamicOrderBy;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseSearchAssetFilter extends KalturaAssetFilter
{
	/**
	 * Search assets using dynamic criteria. Provided collection of nested expressions with key, comparison operators, value, and logical conjunction.
	 *             Possible keys: any Tag or Meta defined in the system and the following reserved keys: start_date, end_date. 
	 *             epg_id, media_id - for specific asset IDs.
	 *             geo_block - only valid value is &quot;true&quot;: When enabled, only assets that are not restricted to the user by geo-block rules will return.
	 *             parental_rules - only valid value is &quot;true&quot;: When enabled, only assets that the user doesn&#39;t need to provide PIN code will return.
	 *             user_interests - only valid value is &quot;true&quot;. When enabled, only assets that the user defined as his interests (by tags and metas) will return.
	 *             epg_channel_id – the channel identifier of the EPG program.
	 *             entitled_assets - valid values: &quot;free&quot;, &quot;entitled&quot;, &quot;not_entitled&quot;, &quot;both&quot;. free - gets only free to watch assets. entitled - only those that the user is implicitly entitled to watch.
	 *             asset_type - valid values: &quot;media&quot;, &quot;epg&quot;, &quot;recording&quot; or any number that represents media type in group.
	 *             Comparison operators: for numerical fields =, &gt;, &gt;=, &lt;, &lt;=, : (in). 
	 *             For alpha-numerical fields =, != (not), ~ (like), !~, ^ (any word starts with), ^= (phrase starts with), + (exists), !+ (not exists).
	 *             Logical conjunction: and, or. 
	 *             Search values are limited to 20 characters each for the next operators: ~, !~, ^, ^=
	 *             (maximum length of entire filter is 4096 characters)
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * groupBy
	 *
	 * @var array of KalturaAssetGroupBy
	 */
	public $groupBy;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalListSearchFilter extends KalturaBaseSearchAssetFilter
{
	/**
	 * Comma separated list of partner list types to search within. 
	 *             If omitted – all types should be included.
	 *
	 * @var string
	 */
	public $partnerListTypeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchAssetFilter extends KalturaBaseSearchAssetFilter
{
	/**
	 * (Deprecated - use KalturaBaseSearchAssetFilter.kSql)
	 *             Comma separated list of asset types to search within. 
	 *             Possible values: 0 – EPG linear programs entries; 1 - Recordings; Any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted – all types should be included.
	 *
	 * @var string
	 */
	public $typeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchAssetListFilter extends KalturaSearchAssetFilter
{
	/**
	 * Exclude watched asset.
	 *
	 * @var bool
	 */
	public $excludeWatched = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaScheduledRecordingProgramFilter extends KalturaAssetFilter
{
	/**
	 * The type of recordings to return
	 *
	 * @var KalturaScheduledRecordingAssetType
	 */
	public $recordingTypeEqual = null;

	/**
	 * Channels to filter by
	 *
	 * @var string
	 */
	public $channelsIn = null;

	/**
	 * start date
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrNull = null;

	/**
	 * end date
	 *
	 * @var int
	 */
	public $endDateLessThanOrNull = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBundleFilter extends KalturaAssetFilter
{
	/**
	 * Bundle Id.
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * Comma separated list of asset types to search within. 
	 *             Possible values: 0 – EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted – all types should be included.
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * bundleType - possible values: Subscription or Collection
	 *
	 * @var KalturaBundleType
	 */
	public $bundleTypeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelExternalFilter extends KalturaAssetFilter
{
	/**
	 * External Channel Id.
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * UtcOffsetEqual
	 *
	 * @var float
	 */
	public $utcOffsetEqual = null;

	/**
	 * FreeTextEqual
	 *
	 * @var string
	 */
	public $freeText = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelFilter extends KalturaAssetFilter
{
	/**
	 * Channel Id
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * /// 
	 *             Search assets using dynamic criteria. Provided collection of nested expressions with key, comparison operators, value, and logical conjunction.
	 *             Possible keys: any Tag or Meta defined in the system and the following reserved keys: start_date, end_date. 
	 *             epg_id, media_id - for specific asset IDs.
	 *             geo_block - only valid value is &quot;true&quot;: When enabled, only assets that are not restricted to the user by geo-block rules will return.
	 *             parental_rules - only valid value is &quot;true&quot;: When enabled, only assets that the user doesn&#39;t need to provide PIN code will return.
	 *             user_interests - only valid value is &quot;true&quot;. When enabled, only assets that the user defined as his interests (by tags and metas) will return.
	 *             epg_channel_id – the channel identifier of the EPG program. *****Deprecated, please use linear_media_id instead*****
	 *             linear_media_id – the linear media identifier of the EPG program.
	 *             entitled_assets - valid values: &quot;free&quot;, &quot;entitled&quot;, &quot;not_entitled&quot;, &quot;both&quot;. free - gets only free to watch assets. entitled - only those that the user is implicitly entitled to watch.
	 *             asset_type - valid values: &quot;media&quot;, &quot;epg&quot;, &quot;recording&quot; or any number that represents media type in group.
	 *             Comparison operators: for numerical fields =, &gt;, &gt;=, &lt;, &lt;=, : (in). 
	 *             For alpha-numerical fields =, != (not), ~ (like), !~, ^ (any word starts with), ^= (phrase starts with), + (exists), !+ (not exists).
	 *             Logical conjunction: and, or. 
	 *             Search values are limited to 20 characters each for the next operators: ~, !~, ^, ^=
	 *             (maximum length of entire filter is 4096 characters)
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * Exclude watched asset.
	 *
	 * @var bool
	 */
	public $excludeWatched = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRelatedFilter extends KalturaBaseSearchAssetFilter
{
	/**
	 * the ID of the asset for which to return related assets
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * Comma separated list of asset types to search within. 
	 *             Possible values: any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted – same type as the provided asset.
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * Exclude watched asset.
	 *
	 * @var bool
	 */
	public $excludeWatched = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRelatedExternalFilter extends KalturaAssetFilter
{
	/**
	 * the External ID of the asset for which to return related assets
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * Comma separated list of asset types to search within. 
	 *             Possible values: 0 – EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted – all types should be included.
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * UtcOffsetEqual
	 *
	 * @var int
	 */
	public $utcOffsetEqual = null;

	/**
	 * FreeText
	 *
	 * @var string
	 */
	public $freeText = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchExternalFilter extends KalturaAssetFilter
{
	/**
	 * Query
	 *
	 * @var string
	 */
	public $query = null;

	/**
	 * UtcOffsetEqual
	 *
	 * @var int
	 */
	public $utcOffsetEqual = null;

	/**
	 * Comma separated list of asset types to search within. 
	 *             Possible values: 0 – EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted – all types should be included.
	 *
	 * @var string
	 */
	public $typeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentationTypeFilter extends KalturaFilter
{
	/**
	 * Comma separated segmentation types identifieridentifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSegmentFilter extends KalturaFilter
{
	/**
	 * User ID
	 *
	 * @var string
	 */
	public $userIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesRecordingFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProductPriceFilter extends KalturaFilter
{
	/**
	 * Comma separated subscriptions identifiers
	 *
	 * @var string
	 */
	public $subscriptionIdIn = null;

	/**
	 * Comma separated media files identifiers
	 *
	 * @var string
	 */
	public $fileIdIn = null;

	/**
	 * Comma separated collections identifiers
	 *
	 * @var string
	 */
	public $collectionIdIn = null;

	/**
	 * A flag that indicates if only the lowest price of an item should return
	 *
	 * @var bool
	 */
	public $isLowest = null;

	/**
	 * Discount coupon code
	 *
	 * @var string
	 */
	public $couponCodeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementFilter extends KalturaFilter
{
	/**
	 * The type of the entitlements to return
	 *
	 * @var KalturaTransactionType
	 */
	public $productTypeEqual = null;

	/**
	 * Reference type to filter by
	 *
	 * @var KalturaEntityReferenceBy
	 */
	public $entityReferenceEqual = null;

	/**
	 * Is expired
	 *
	 * @var bool
	 */
	public $isExpiredEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionHistoryFilter extends KalturaFilter
{
	/**
	 * Reference type to filter by
	 *
	 * @var KalturaEntityReferenceBy
	 */
	public $entityReferenceEqual = null;

	/**
	 * Filter transactions later than specific date
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrEqual = null;

	/**
	 * Filter transactions earlier than specific date
	 *
	 * @var int
	 */
	public $endDateLessThanOrEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingContextFilter extends KalturaFilter
{
	/**
	 * Comma separated asset ids
	 *
	 * @var string
	 */
	public $assetIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingFilter extends KalturaFilter
{
	/**
	 * Recording Statuses
	 *
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * Comma separated external identifiers
	 *
	 * @var string
	 */
	public $externalRecordingIdIn = null;

	/**
	 * KSQL expression
	 *
	 * @var string
	 */
	public $kSql = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPpvFilter extends KalturaFilter
{
	/**
	 * Comma separated identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFilePpvFilter extends KalturaFilter
{
	/**
	 * Filter Asset file ppvs that contain a specific asset id
	 *
	 * @var int
	 */
	public $assetIdEqual = null;

	/**
	 * Filter Asset file ppvs that contain a specific asset file id
	 *
	 * @var int
	 */
	public $assetFileIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollectionFilter extends KalturaFilter
{
	/**
	 * Comma separated collection IDs
	 *
	 * @var string
	 */
	public $collectionIdIn = null;

	/**
	 * Media-file ID to get the subscriptions by
	 *
	 * @var int
	 */
	public $mediaFileIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountDetailsFilter extends KalturaFilter
{
	/**
	 * Comma separated discount codes
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPricePlanFilter extends KalturaFilter
{
	/**
	 * Comma separated price plans identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPriceDetailsFilter extends KalturaFilter
{
	/**
	 * Comma separated price identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSetFilter extends KalturaFilter
{
	/**
	 * Comma separated identifiers
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Comma separated subscription identifiers
	 *
	 * @var string
	 */
	public $subscriptionIdContains = null;

	/**
	 * Subscription Type
	 *
	 * @var KalturaSubscriptionSetType
	 */
	public $typeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionDependencySetFilter extends KalturaSubscriptionSetFilter
{
	/**
	 * Comma separated identifiers
	 *
	 * @var string
	 */
	public $baseSubscriptionIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionFilter extends KalturaFilter
{
	/**
	 * Comma separated subscription IDs to get the subscriptions by
	 *
	 * @var string
	 */
	public $subscriptionIdIn = null;

	/**
	 * Media-file ID to get the subscriptions by
	 *
	 * @var int
	 */
	public $mediaFileIdEqual = null;

	/**
	 * Comma separated subscription external IDs to get the subscriptions by
	 *
	 * @var string
	 */
	public $externalIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructMetaFilter extends KalturaFilter
{
	/**
	 * Filter Asset Struct metas that contain a specific asset struct id
	 *
	 * @var int
	 */
	public $assetStructIdEqual = null;

	/**
	 * Filter Asset Struct metas that contain a specific meta id
	 *
	 * @var int
	 */
	public $metaIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelsFilter extends KalturaFilter
{
	/**
	 * channel identifier to filter by
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * media identifier to filter by
	 *
	 * @var int
	 */
	public $mediaIdEqual = null;

	/**
	 * Exact channel name to filter by
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * Channel name starts with (auto-complete)
	 *
	 * @var string
	 */
	public $nameStartsWith = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileFilter extends KalturaFilter
{
	/**
	 * Asset identifier to filter by
	 *
	 * @var int
	 */
	public $assetIdEqual = null;

	/**
	 * Asset file identifier to filter by
	 *
	 * @var int
	 */
	public $idEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImageFilter extends KalturaFilter
{
	/**
	 * IDs to filter by
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * ID of the object the is related to, to filter by
	 *
	 * @var int
	 */
	public $imageObjectIdEqual = null;

	/**
	 * Type of the object the image is related to, to filter by
	 *
	 * @var KalturaImageObjectType
	 */
	public $imageObjectTypeEqual = null;

	/**
	 * Filter images that are default on atleast on image type or not default at any
	 *
	 * @var bool
	 */
	public $isDefaultEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImageTypeFilter extends KalturaFilter
{
	/**
	 * IDs to filter by
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Ratio IDs to filter by
	 *
	 * @var string
	 */
	public $ratioIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTagFilter extends KalturaFilter
{
	/**
	 * Tag to filter by
	 *
	 * @var string
	 */
	public $tagEqual = null;

	/**
	 * Tag to filter by
	 *
	 * @var string
	 */
	public $tagStartsWith = null;

	/**
	 * Type identifier
	 *
	 * @var int
	 */
	public $typeEqual = null;

	/**
	 * Language to filter by
	 *
	 * @var string
	 */
	public $languageEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructFilter extends KalturaFilter
{
	/**
	 * Comma separated identifiers
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Filter Asset Structs that contain a specific meta id
	 *
	 * @var int
	 */
	public $metaIdEqual = null;

	/**
	 * Filter Asset Structs by isProtectedEqual value
	 *
	 * @var bool
	 */
	public $isProtectedEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCommentFilter extends KalturaFilter
{
	/**
	 * Asset Id
	 *
	 * @var int
	 */
	public $assetIdEqual = null;

	/**
	 * Asset Type
	 *
	 * @var KalturaAssetType
	 */
	public $assetTypeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkFilter extends KalturaFilter
{
	/**
	 * Comma separated list of assets identifiers
	 *
	 * @var string
	 */
	public $assetIdIn = null;

	/**
	 * Asset type
	 *
	 * @var KalturaAssetType
	 */
	public $assetTypeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetHistoryFilter extends KalturaFilter
{
	/**
	 * Comma separated list of asset types to search within.
	 *             Possible values: 0 – EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted – all types should be included.
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * Comma separated list of asset identifiers.
	 *
	 * @var string
	 */
	public $assetIdIn = null;

	/**
	 * Which type of recently watched media to include in the result – those that finished watching, those that are in progress or both.
	 *             If omitted or specified filter = all – return all types.
	 *             Allowed values: progress – return medias that are in-progress, done – return medias that finished watching.
	 *
	 * @var KalturaWatchStatus
	 */
	public $statusEqual = null;

	/**
	 * How many days back to return the watched media. If omitted, default to 7 days
	 *
	 * @var int
	 */
	public $daysLessThanOrEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBusinessModuleRuleFilter extends KalturaFilter
{
	/**
	 * Business module type the rules applied on
	 *
	 * @var KalturaTransactionType
	 */
	public $businessModuleTypeApplied = null;

	/**
	 * Business module ID the rules applied on
	 *
	 * @var int
	 */
	public $businessModuleIdApplied = null;

	/**
	 * Comma separated segment IDs the rules applied on
	 *
	 * @var string
	 */
	public $segmentIdsApplied = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetRuleFilter extends KalturaFilter
{
	/**
	 * Indicates which asset rule list to return by it KalturaRuleConditionType.
	 *             Default value: KalturaRuleConditionType.COUNTRY
	 *
	 * @var KalturaRuleConditionType
	 */
	public $conditionsContainType = null;

	/**
	 * Indicates if to return an asset rule list that related to specific asset
	 *
	 * @var KalturaSlimAsset
	 */
	public $assetApplied;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetUserRuleFilter extends KalturaFilter
{
	/**
	 * Indicates if to get the asset user rule list for the attached user or for the entire group
	 *
	 * @var bool
	 */
	public $attachedUserIdEqualCurrent = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCurrencyFilter extends KalturaFilter
{
	/**
	 * Currency codes
	 *
	 * @var string
	 */
	public $codeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLanguageFilter extends KalturaFilter
{
	/**
	 * Language codes
	 *
	 * @var string
	 */
	public $codeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaFilter extends KalturaFilter
{
	/**
	 * Comma separated identifiers
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Filter Metas that are contained in a specific asset struct
	 *
	 * @var int
	 */
	public $assetStructIdEqual = null;

	/**
	 * Meta data type to filter by
	 *
	 * @var KalturaMetaDataType
	 */
	public $dataTypeEqual = null;

	/**
	 * Filter metas by multipleValueEqual value
	 *
	 * @var bool
	 */
	public $multipleValueEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountryFilter extends KalturaFilter
{
	/**
	 * Country identifiers
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Ip to identify the country
	 *
	 * @var string
	 */
	public $ipEqual = null;

	/**
	 * Indicates if to get the IP from the request
	 *
	 * @var bool
	 */
	public $ipEqualCurrent = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchHistoryFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionFilter extends KalturaFilter
{
	/**
	 * List of comma separated regions external identifiers
	 *
	 * @var string
	 */
	public $externalIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetRuleFilter extends KalturaFilter
{
	/**
	 * Asset identifier to filter by
	 *
	 * @var int
	 */
	public $assetIdEqual = null;

	/**
	 * Asset type to filter by - 0 = EPG, 1 = media
	 *
	 * @var int
	 */
	public $assetTypeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaParentalRuleFilter extends KalturaFilter
{
	/**
	 * Reference type to filter by
	 *
	 * @var KalturaEntityReferenceBy
	 */
	public $entityReferenceEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportTaskFilter extends KalturaFilter
{
	/**
	 * Comma separated tasks identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionFilter extends KalturaFilter
{
	/**
	 * Indicates whether the results should be filtered by userId using the current
	 *
	 * @var bool
	 */
	public $currentUserPermissionsContains = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleFilter extends KalturaFilter
{
	/**
	 * Comma separated roles identifiers
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Indicates whether the results should be filtered by userId using the current
	 *
	 * @var bool
	 */
	public $currentUserRoleIdsContains = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterPager extends KalturaObjectBase
{
	/**
	 * The number of objects to retrieve. Possible range 1 ≤ value ≤ 50. If omitted or value &lt; 1 - will be set to 25. If a value &gt; 50 provided – will be set to 50
	 *
	 * @var int
	 */
	public $pageSize = null;

	/**
	 * The page number for which {pageSize} of objects should be retrieved
	 *
	 * @var int
	 */
	public $pageIndex = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAppToken extends KalturaObjectBase
{
	/**
	 * The id of the application token
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Expiry time of current token (unix timestamp in seconds)
	 *
	 * @var int
	 */
	public $expiry = null;

	/**
	 * Partner identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * Expiry duration of KS (Kaltura Session) that created using the current token (in seconds)
	 *
	 * @var int
	 */
	public $sessionDuration = null;

	/**
	 * The hash type of the token
	 *
	 * @var KalturaAppTokenHashType
	 */
	public $hashType = null;

	/**
	 * Comma separated privileges to be applied on KS (Kaltura Session) that created using the current token
	 *
	 * @var string
	 */
	public $sessionPrivileges = null;

	/**
	 * The application token
	 *
	 * @var string
	 * @readonly
	 */
	public $token = null;

	/**
	 * User id of KS (Kaltura Session) that created using the current token
	 *
	 * @var string
	 */
	public $sessionUserId = null;

	/**
	 * Create date
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Update date
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSession extends KalturaObjectBase
{
	/**
	 * KS
	 *
	 * @var string
	 */
	public $ks = null;

	/**
	 * Partner identifier
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * User identifier
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * Expiry
	 *
	 * @var int
	 */
	public $expiry = null;

	/**
	 * Privileges
	 *
	 * @var string
	 */
	public $privileges = null;

	/**
	 * UDID
	 *
	 * @var string
	 */
	public $udid = null;

	/**
	 * Create date
	 *
	 * @var int
	 */
	public $createDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSessionInfo extends KalturaSession
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackContextOptions extends KalturaObjectBase
{
	/**
	 * Protocol of the specific media object (http / https).
	 *
	 * @var string
	 */
	public $mediaProtocol = null;

	/**
	 * Playback streamer type: applehttp, mpegdash, url.
	 *
	 * @var string
	 */
	public $streamerType = null;

	/**
	 * List of comma separated media file IDs
	 *
	 * @var string
	 */
	public $assetFileIds = null;

	/**
	 * Playback context type
	 *
	 * @var KalturaPlaybackContextType
	 */
	public $context = null;

	/**
	 * Url type
	 *
	 * @var KalturaUrlType
	 */
	public $urlType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAccessControlMessage extends KalturaObjectBase
{
	/**
	 * Message
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Code
	 *
	 * @var string
	 */
	public $code = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackContext extends KalturaObjectBase
{
	/**
	 * Sources
	 *
	 * @var array of KalturaPlaybackSource
	 */
	public $sources;

	/**
	 * Actions
	 *
	 * @var array of KalturaRuleAction
	 */
	public $actions;

	/**
	 * Messages
	 *
	 * @var array of KalturaAccessControlMessage
	 */
	public $messages;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAdsSource extends KalturaObjectBase
{
	/**
	 * File unique identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Device types as defined in the system
	 *
	 * @var string
	 */
	public $type = null;

	/**
	 * Ads policy
	 *
	 * @var KalturaAdsPolicy
	 */
	public $adsPolicy = null;

	/**
	 * The parameters to pass to the ads server
	 *
	 * @var string
	 */
	public $adsParam = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAdsContext extends KalturaObjectBase
{
	/**
	 * Sources
	 *
	 * @var array of KalturaAdsSource
	 */
	public $sources;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFileContext extends KalturaObjectBase
{
	/**
	 * viewLifeCycle
	 *
	 * @var string
	 * @readonly
	 */
	public $viewLifeCycle = null;

	/**
	 * fullLifeCycle
	 *
	 * @var string
	 * @readonly
	 */
	public $fullLifeCycle = null;

	/**
	 * isOfflinePlayBack
	 *
	 * @var bool
	 * @readonly
	 */
	public $isOfflinePlayBack = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStatisticsQuery extends KalturaObjectBase
{
	/**
	 * Comma separated list of asset identifiers.
	 *
	 * @var string
	 */
	public $assetIdIn = null;

	/**
	 * Asset type
	 *
	 * @var KalturaAssetType
	 */
	public $assetTypeEqual = null;

	/**
	 * The beginning of the time window to get the statistics for (in epoch).
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrEqual = null;

	/**
	 * /// The end of the time window to get the statistics for (in epoch).
	 *
	 * @var int
	 */
	public $endDateGreaterThanOrEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadToken extends KalturaObjectBase
{
	/**
	 * Upload-token identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Status
	 *
	 * @var KalturaUploadTokenStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * File size
	 *
	 * @var float
	 * @readonly
	 */
	public $fileSize = null;

	/**
	 * Specifies when was the Asset was created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the Asset last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCDNPartnerSettings extends KalturaObjectBase
{
	/**
	 * Default CDN adapter identifier
	 *
	 * @var int
	 */
	public $defaultAdapterId = null;

	/**
	 * Default recording CDN adapter identifier
	 *
	 * @var int
	 */
	public $defaultRecordingAdapterId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCompensation extends KalturaObjectBase
{
	/**
	 * Compensation identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Subscription identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $subscriptionId = null;

	/**
	 * Compensation type
	 *
	 * @var KalturaCompensationType
	 */
	public $compensationType = null;

	/**
	 * Compensation amount
	 *
	 * @var float
	 */
	public $amount = null;

	/**
	 * The number of renewals for compensation
	 *
	 * @var int
	 */
	public $totalRenewalIterations = null;

	/**
	 * The number of renewals the compensation was already applied on
	 *
	 * @var int
	 * @readonly
	 */
	public $appliedRenewalIterations = null;

	/**
	 * Purchase identifier
	 *
	 * @var int
	 */
	public $purchaseId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaContentResource extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadedFileTokenResource extends KalturaContentResource
{
	/**
	 * Token that returned from uploadToken.add action
	 *
	 * @var string
	 */
	public $token = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUrlResource extends KalturaContentResource
{
	/**
	 * URL of the content
	 *
	 * @var string
	 */
	public $url = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponGenerationOptions extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPublicCouponGenerationOptions extends KalturaCouponGenerationOptions
{
	/**
	 * Coupon code (name)
	 *
	 * @var string
	 */
	public $code = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRandomCouponGenerationOptions extends KalturaCouponGenerationOptions
{
	/**
	 * Number of coupons to generate
	 *
	 * @var int
	 */
	public $numberOfCoupons = null;

	/**
	 * Indicates whether to use letters in the generated codes (default is true)
	 *
	 * @var bool
	 */
	public $useLetters = null;

	/**
	 * Indicates whether to use numbers in the generated codes (default is true)
	 *
	 * @var bool
	 */
	public $useNumbers = null;

	/**
	 * Indicates whether to use special characters in the generated codes(default is true)
	 *
	 * @var bool
	 */
	public $useSpecialCharacters = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaKeyValue extends KalturaObjectBase
{
	/**
	 * Key
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * Value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEmailMessage extends KalturaObjectBase
{
	/**
	 * email template name
	 *
	 * @var string
	 */
	public $templateName = null;

	/**
	 * email subject
	 *
	 * @var string
	 */
	public $subject = null;

	/**
	 * first name
	 *
	 * @var string
	 */
	public $firstName = null;

	/**
	 * last name
	 *
	 * @var string
	 */
	public $lastName = null;

	/**
	 * sender name
	 *
	 * @var string
	 */
	public $senderName = null;

	/**
	 * sender from
	 *
	 * @var string
	 */
	public $senderFrom = null;

	/**
	 * sender to
	 *
	 * @var string
	 */
	public $senderTo = null;

	/**
	 * bcc address - seperated by comma
	 *
	 * @var string
	 */
	public $bccAddress = null;

	/**
	 * extra parameters
	 *
	 * @var array of KalturaKeyValue
	 */
	public $extraParameters;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementRenewalBase extends KalturaObjectBase
{
	/**
	 * Price that is going to be paid on the renewal
	 *
	 * @var float
	 */
	public $price = null;

	/**
	 * Puchase ID
	 *
	 * @var int
	 */
	public $purchaseId = null;

	/**
	 * Subscription ID
	 *
	 * @var int
	 */
	public $subscriptionId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUnifiedPaymentRenewal extends KalturaObjectBase
{
	/**
	 * Price that is going to be paid on the renewal
	 *
	 * @var KalturaPrice
	 */
	public $price;

	/**
	 * Next renewal date
	 *
	 * @var int
	 */
	public $date = null;

	/**
	 * Unified payment ID
	 *
	 * @var int
	 */
	public $unifiedPaymentId = null;

	/**
	 * List of entitlements in this unified payment renewal
	 *
	 * @var array of KalturaEntitlementRenewalBase
	 */
	public $entitlements;

	/**
	 * User ID
	 *
	 * @var int
	 */
	public $userId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNetworkActionStatus extends KalturaObjectBase
{
	/**
	 * Status
	 *
	 * @var KalturaSocialStatus
	 */
	public $status = null;

	/**
	 * Social network
	 *
	 * @var KalturaSocialNetwork
	 */
	public $network = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSocialActionResponse extends KalturaObjectBase
{
	/**
	 * socialAction
	 *
	 * @var KalturaSocialAction
	 */
	public $socialAction;

	/**
	 * List of action permission items
	 *
	 * @var array of KalturaNetworkActionStatus
	 */
	public $failStatus;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentGatewayConfiguration extends KalturaObjectBase
{
	/**
	 * Payment gateway configuration
	 *
	 * @var array of KalturaKeyValue
	 */
	public $paymentGatewayConfiguration;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdQuota extends KalturaObjectBase
{
	/**
	 * Household identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $householdId = null;

	/**
	 * Total quota that is allocated to the household
	 *
	 * @var int
	 * @readonly
	 */
	public $totalQuota = null;

	/**
	 * Available quota that household has remaining
	 *
	 * @var int
	 * @readonly
	 */
	public $availableQuota = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMessageTemplate extends KalturaObjectBase
{
	/**
	 * The message template with placeholders
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Default date format for the date &amp; time entries used in the template
	 *
	 * @var string
	 */
	public $dateFormat = null;

	/**
	 * Template type. Possible values: Series, Reminder,Churn, SeriesReminder
	 *
	 * @var KalturaMessageTemplateType
	 */
	public $messageType = null;

	/**
	 * Sound file name to play upon message arrival to the device (if supported by target device)
	 *
	 * @var string
	 */
	public $sound = null;

	/**
	 * an optional action
	 *
	 * @var string
	 */
	public $action = null;

	/**
	 * URL template for deep linking. Example - /app/location/{mediaId}
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * Mail template name
	 *
	 * @var string
	 */
	public $mailTemplate = null;

	/**
	 * Mail subject
	 *
	 * @var string
	 */
	public $mailSubject = null;

	/**
	 * Ratio identifier
	 *
	 * @var string
	 */
	public $ratioId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLicensedUrl extends KalturaObjectBase
{
	/**
	 * Main licensed URL
	 *
	 * @var string
	 */
	public $mainUrl = null;

	/**
	 * An alternate URL to use in case the main fails
	 *
	 * @var string
	 */
	public $altUrl = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLicensedUrlBaseRequest extends KalturaObjectBase
{
	/**
	 * Asset identifier
	 *
	 * @var string
	 */
	public $assetId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLicensedUrlMediaRequest extends KalturaLicensedUrlBaseRequest
{
	/**
	 * Identifier of the content to get the link for (file identifier)
	 *
	 * @var int
	 */
	public $contentId = null;

	/**
	 * Base URL for the licensed URLs
	 *
	 * @var string
	 */
	public $baseUrl = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLicensedUrlEpgRequest extends KalturaLicensedUrlMediaRequest
{
	/**
	 * The stream type to get the URL for
	 *
	 * @var KalturaStreamType
	 */
	public $streamType = null;

	/**
	 * The start date of the stream (epoch)
	 *
	 * @var int
	 */
	public $startDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLicensedUrlRecordingRequest extends KalturaLicensedUrlBaseRequest
{
	/**
	 * The file type for the URL
	 *
	 * @var string
	 */
	public $fileType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegistryResponse extends KalturaObjectBase
{
	/**
	 * Announcement Id
	 *
	 * @var int
	 */
	public $announcementId = null;

	/**
	 * Key
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * URL
	 *
	 * @var string
	 */
	public $url = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPushMessage extends KalturaObjectBase
{
	/**
	 * The message that will be presented to the user.
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Optional. Can be used to change the default push sound on the user device.
	 *
	 * @var string
	 */
	public $sound = null;

	/**
	 * Optional. Used to change the default action of the application when a push is received.
	 *
	 * @var string
	 */
	public $action = null;

	/**
	 * Optional. Used to direct the application to the relevant page.
	 *
	 * @var string
	 */
	public $url = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationsPartnerSettings extends KalturaObjectBase
{
	/**
	 * Push notification capability is enabled for the account
	 *
	 * @var bool
	 */
	public $pushNotificationEnabled = null;

	/**
	 * System announcement capability is enabled for the account
	 *
	 * @var bool
	 */
	public $pushSystemAnnouncementsEnabled = null;

	/**
	 * Window start time (UTC) for send automated push messages
	 *
	 * @var int
	 */
	public $pushStartHour = null;

	/**
	 * Window end time (UTC) for send automated push messages
	 *
	 * @var int
	 */
	public $pushEndHour = null;

	/**
	 * Inbox enabled
	 *
	 * @var bool
	 */
	public $inboxEnabled = null;

	/**
	 * Message TTL in days
	 *
	 * @var int
	 */
	public $messageTTLDays = null;

	/**
	 * Automatic issue follow notification
	 *
	 * @var bool
	 */
	public $automaticIssueFollowNotification = null;

	/**
	 * Topic expiration duration in days
	 *
	 * @var int
	 */
	public $topicExpirationDurationDays = null;

	/**
	 * Reminder enabled
	 *
	 * @var bool
	 */
	public $reminderEnabled = null;

	/**
	 * Offset time (UTC) in seconds for send reminder
	 *
	 * @var int
	 */
	public $reminderOffsetSec = null;

	/**
	 * Push adapter URL
	 *
	 * @var string
	 */
	public $pushAdapterUrl = null;

	/**
	 * Churn mail template name
	 *
	 * @var string
	 */
	public $churnMailTemplateName = null;

	/**
	 * Churn mail subject
	 *
	 * @var string
	 */
	public $churnMailSubject = null;

	/**
	 * Sender email
	 *
	 * @var string
	 */
	public $senderEmail = null;

	/**
	 * Mail sender name
	 *
	 * @var string
	 */
	public $mailSenderName = null;

	/**
	 * Mail notification adapter identifier
	 *
	 * @var int
	 */
	public $mailNotificationAdapterId = null;

	/**
	 * SMS capability is enabled for the account
	 *
	 * @var bool
	 */
	public $smsEnabled = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationsSettings extends KalturaObjectBase
{
	/**
	 * Specify if the user want to receive push notifications or not
	 *
	 * @var bool
	 */
	public $pushNotificationEnabled = null;

	/**
	 * Specify if the user will be notified for followed content via push. (requires push_notification_enabled to be enabled)
	 *
	 * @var bool
	 */
	public $pushFollowEnabled = null;

	/**
	 * Specify if the user wants to receive mail notifications or not
	 *
	 * @var bool
	 */
	public $mailEnabled = null;

	/**
	 * Specify if the user wants to receive SMS notifications or not
	 *
	 * @var bool
	 */
	public $smsEnabled = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTimeShiftedTvPartnerSettings extends KalturaObjectBase
{
	/**
	 * Is catch-up enabled
	 *
	 * @var bool
	 */
	public $catchUpEnabled = null;

	/**
	 * Is c-dvr enabled
	 *
	 * @var bool
	 */
	public $cdvrEnabled = null;

	/**
	 * Is start-over enabled
	 *
	 * @var bool
	 */
	public $startOverEnabled = null;

	/**
	 * Is trick-play enabled
	 *
	 * @var bool
	 */
	public $trickPlayEnabled = null;

	/**
	 * Is recording schedule window enabled
	 *
	 * @var bool
	 */
	public $recordingScheduleWindowEnabled = null;

	/**
	 * Is recording protection enabled
	 *
	 * @var bool
	 */
	public $protectionEnabled = null;

	/**
	 * Catch-up buffer length
	 *
	 * @var int
	 */
	public $catchUpBufferLength = null;

	/**
	 * Trick play buffer length
	 *
	 * @var int
	 */
	public $trickPlayBufferLength = null;

	/**
	 * Recording schedule window. Indicates how long (in minutes) after the program starts it is allowed to schedule the recording
	 *
	 * @var int
	 */
	public $recordingScheduleWindow = null;

	/**
	 * Indicates how long (in seconds) before the program starts the recording will begin
	 *
	 * @var int
	 */
	public $paddingBeforeProgramStarts = null;

	/**
	 * Indicates how long (in seconds) after the program ends the recording will end
	 *
	 * @var int
	 */
	public $paddingAfterProgramEnds = null;

	/**
	 * Specify the time in days that a recording should be protected. Start time begins at protection request.
	 *
	 * @var int
	 */
	public $protectionPeriod = null;

	/**
	 * Indicates how many percent of the quota can be used for protection
	 *
	 * @var int
	 */
	public $protectionQuotaPercentage = null;

	/**
	 * Specify the time in days that a recording should be kept for user. Start time begins with the program end date.
	 *
	 * @var int
	 */
	public $recordingLifetimePeriod = null;

	/**
	 * The time in days before the recording lifetime is due from which the client should be able to warn user about deletion.
	 *
	 * @var int
	 */
	public $cleanupNoticePeriod = null;

	/**
	 * Is recording of series enabled
	 *
	 * @var bool
	 */
	public $seriesRecordingEnabled = null;

	/**
	 * Is recording playback for non-entitled channel enables
	 *
	 * @var bool
	 */
	public $nonEntitledChannelPlaybackEnabled = null;

	/**
	 * Is recording playback for non-existing channel enables
	 *
	 * @var bool
	 */
	public $nonExistingChannelPlaybackEnabled = null;

	/**
	 * Quota Policy
	 *
	 * @var KalturaQuotaOveragePolicy
	 */
	public $quotaOveragePolicy = null;

	/**
	 * Protection Policy
	 *
	 * @var KalturaProtectionPolicy
	 */
	public $protectionPolicy = null;

	/**
	 * The time in days for recovery recording that was delete by Auto Delete .
	 *
	 * @var int
	 */
	public $recoveryGracePeriod = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetsListItem extends KalturaObjectBase
{
	/**
	 * Asset identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * The order index of the asset in the list
	 *
	 * @var int
	 */
	public $orderIndex = null;

	/**
	 * The type of the asset
	 *
	 * @var KalturaUserAssetsListItemType
	 */
	public $type = null;

	/**
	 * The identifier of the user who added the item to the list
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * The type of the list, all is not supported
	 *
	 * @var KalturaUserAssetsListType
	 */
	public $listType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdLimitations extends KalturaObjectBase
{
	/**
	 * Household limitation module identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Household limitation module name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Max number of streams allowed for the household
	 *
	 * @var int
	 * @readonly
	 */
	public $concurrentLimit = null;

	/**
	 * Max number of devices allowed for the household
	 *
	 * @var int
	 * @readonly
	 */
	public $deviceLimit = null;

	/**
	 * Allowed device change frequency code
	 *
	 * @var int
	 * @readonly
	 */
	public $deviceFrequency = null;

	/**
	 * Allowed device change frequency description
	 *
	 * @var string
	 * @readonly
	 */
	public $deviceFrequencyDescription = null;

	/**
	 * Allowed user change frequency code
	 *
	 * @var int
	 * @readonly
	 */
	public $userFrequency = null;

	/**
	 * Allowed user change frequency description
	 *
	 * @var string
	 * @readonly
	 */
	public $userFrequencyDescription = null;

	/**
	 * Allowed NPVR Quota in Seconds
	 *
	 * @var int
	 * @readonly
	 */
	public $npvrQuotaInSeconds = null;

	/**
	 * Max number of users allowed for the household
	 *
	 * @var int
	 * @readonly
	 */
	public $usersLimit = null;

	/**
	 * Device families limitations
	 *
	 * @var array of KalturaHouseholdDeviceFamilyLimitations
	 * @readonly
	 */
	public $deviceFamiliesLimitations;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLoginSession extends KalturaObjectBase
{
	/**
	 * Access token in a KS format
	 *
	 * @var string
	 */
	public $ks = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHousehold extends KalturaObjectBase
{
	/**
	 * Household identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Household name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Household description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Household external identifier
	 *
	 * @var string
	 * @insertonly
	 */
	public $externalId = null;

	/**
	 * Household limitation module identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $householdLimitationsId = null;

	/**
	 * The max number of the devices that can be added to the household
	 *
	 * @var int
	 * @readonly
	 */
	public $devicesLimit = null;

	/**
	 * The max number of the users that can be added to the household
	 *
	 * @var int
	 * @readonly
	 */
	public $usersLimit = null;

	/**
	 * The max number of concurrent streams in the household
	 *
	 * @var int
	 * @readonly
	 */
	public $concurrentLimit = null;

	/**
	 * The households region identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $regionId = null;

	/**
	 * Household state
	 *
	 * @var KalturaHouseholdState
	 * @readonly
	 */
	public $state = null;

	/**
	 * Is household frequency enabled
	 *
	 * @var bool
	 * @readonly
	 */
	public $isFrequencyEnabled = null;

	/**
	 * The next time a device is allowed to be removed from the household (epoch)
	 *
	 * @var int
	 * @readonly
	 */
	public $frequencyNextDeviceAction = null;

	/**
	 * The next time a user is allowed to be removed from the household (epoch)
	 *
	 * @var int
	 * @readonly
	 */
	public $frequencyNextUserAction = null;

	/**
	 * Household restriction
	 *
	 * @var KalturaHouseholdRestriction
	 * @readonly
	 */
	public $restriction = null;

	/**
	 * suspended roleId
	 *
	 * @var int
	 * @readonly
	 */
	public $roleId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDevicePin extends KalturaObjectBase
{
	/**
	 * Device pin
	 *
	 * @var string
	 */
	public $pin = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLoginResponse extends KalturaObjectBase
{
	/**
	 * User
	 *
	 * @var KalturaOTTUser
	 */
	public $user;

	/**
	 * Kaltura login session details
	 *
	 * @var KalturaLoginSession
	 */
	public $loginSession;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPin extends KalturaObjectBase
{
	/**
	 * PIN code
	 *
	 * @var string
	 */
	public $pin = null;

	/**
	 * Where the PIN was defined at – account, household or user
	 *
	 * @var KalturaRuleLevel
	 */
	public $origin = null;

	/**
	 * PIN type
	 *
	 * @var KalturaPinType
	 */
	public $type = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchaseSettings extends KalturaPin
{
	/**
	 * Purchase permission - block, ask or allow
	 *
	 * @var KalturaPurchaseSettingsType
	 */
	public $permission = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCoupon extends KalturaObjectBase
{
	/**
	 * Coupons group details
	 *
	 * @var KalturaCouponsGroup
	 * @readonly
	 */
	public $couponsGroup;

	/**
	 * Coupon status
	 *
	 * @var KalturaCouponStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Total available coupon uses
	 *
	 * @var int
	 * @readonly
	 */
	public $totalUses = null;

	/**
	 * Left coupon uses
	 *
	 * @var int
	 * @readonly
	 */
	public $leftUses = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOTTCategory extends KalturaObjectBase
{
	/**
	 * Unique identifier for the category
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Category name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Category parent identifier
	 *
	 * @var int
	 */
	public $parentCategoryId = null;

	/**
	 * Child categories
	 *
	 * @var array of KalturaOTTCategory
	 */
	public $childCategories;

	/**
	 * Category channels
	 *
	 * @var array of KalturaChannel
	 */
	public $channels;

	/**
	 * Category images
	 *
	 * @var array of KalturaMediaImage
	 */
	public $images;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementRenewal extends KalturaObjectBase
{
	/**
	 * Price that is going to be paid on the renewal
	 *
	 * @var KalturaPrice
	 */
	public $price;

	/**
	 * Next renewal date
	 *
	 * @var int
	 */
	public $date = null;

	/**
	 * Puchase ID
	 *
	 * @var int
	 */
	public $purchaseId = null;

	/**
	 * Subscription ID
	 *
	 * @var int
	 */
	public $subscriptionId = null;

	/**
	 * User ID
	 *
	 * @var int
	 */
	public $userId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaSocial extends KalturaObjectBase
{
	/**
	 * Facebook identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Full name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * First name
	 *
	 * @var string
	 */
	public $firstName = null;

	/**
	 * Last name
	 *
	 * @var string
	 */
	public $lastName = null;

	/**
	 * User email
	 *
	 * @var string
	 */
	public $email = null;

	/**
	 * Gender
	 *
	 * @var string
	 */
	public $gender = null;

	/**
	 * User identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * User birthday
	 *
	 * @var string
	 */
	public $birthday = null;

	/**
	 * User model status
	 *             Possible values: UNKNOWN, OK, ERROR, NOACTION, NOTEXIST, CONFLICT, MERGE, MERGEOK, NEWUSER, MINFRIENDS, INVITEOK, INVITEERROR, ACCESSDENIED, WRONGPASSWORDORUSERNAME, UNMERGEOK, USEREMAILISMISSING
	 *
	 * @var string
	 * @readonly
	 */
	public $status = null;

	/**
	 * Profile picture URL
	 *
	 * @var string
	 */
	public $pictureUrl = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFacebookSocial extends KalturaSocial
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialConfig extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialFacebookConfig extends KalturaSocialConfig
{
	/**
	 * The application identifier
	 *
	 * @var string
	 */
	public $appId = null;

	/**
	 * List of application permissions
	 *
	 * @var string
	 */
	public $permissions = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaActionPermissionItem extends KalturaObjectBase
{
	/**
	 * Social network
	 *
	 * @var KalturaSocialNetwork
	 */
	public $network = null;

	/**
	 * Action privacy
	 *
	 * @var KalturaSocialActionPrivacy
	 */
	public $actionPrivacy = null;

	/**
	 * Social privacy
	 *
	 * @var KalturaSocialPrivacy
	 */
	public $privacy = null;

	/**
	 * Action - separated with comma
	 *
	 * @var string
	 */
	public $action = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialUserConfig extends KalturaSocialConfig
{
	/**
	 * List of action permission items
	 *
	 * @var array of KalturaActionPermissionItem
	 */
	public $actionPermissionItems;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchaseBase extends KalturaObjectBase
{
	/**
	 * Identifier for the package from which this content is offered
	 *
	 * @var int
	 */
	public $productId = null;

	/**
	 * Identifier for the content to purchase. Relevant only if Product type = PPV
	 *
	 * @var int
	 */
	public $contentId = null;

	/**
	 * Package type. Possible values: PPV, Subscription, Collection
	 *
	 * @var KalturaTransactionType
	 */
	public $productType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchase extends KalturaPurchaseBase
{
	/**
	 * Identifier for paying currency, according to ISO 4217
	 *
	 * @var string
	 */
	public $currency = null;

	/**
	 * Net sum to charge – as a one-time transaction. Price must match the previously provided price for the specified content.
	 *
	 * @var float
	 */
	public $price = null;

	/**
	 * Identifier for a pre-entered payment method. If not provided – the household’s default payment method is used
	 *
	 * @var int
	 */
	public $paymentMethodId = null;

	/**
	 * Identifier for a pre-associated payment gateway. If not provided – the account’s default payment gateway is used
	 *
	 * @var int
	 */
	public $paymentGatewayId = null;

	/**
	 * Coupon code
	 *
	 * @var string
	 */
	public $coupon = null;

	/**
	 * Additional data for the adapter
	 *
	 * @var string
	 */
	public $adapterData = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchaseSession extends KalturaPurchase
{
	/**
	 * Preview module identifier (relevant only for subscription)
	 *
	 * @var int
	 */
	public $previewModuleId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalReceipt extends KalturaPurchaseBase
{
	/**
	 * A unique identifier that was provided by the In-App billing service to validate the purchase
	 *
	 * @var string
	 */
	public $receiptId = null;

	/**
	 * The payment gateway name for the In-App billing service to be used. Possible values: Google/Apple
	 *
	 * @var string
	 */
	public $paymentGatewayName = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransaction extends KalturaObjectBase
{
	/**
	 * Kaltura unique ID representing the transaction
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * Transaction reference ID received from the payment gateway. 
	 *             Value is available only if the payment gateway provides this information.
	 *
	 * @var string
	 */
	public $paymentGatewayReferenceId = null;

	/**
	 * Response ID received from by the payment gateway. 
	 *             Value is available only if the payment gateway provides this information.
	 *
	 * @var string
	 */
	public $paymentGatewayResponseId = null;

	/**
	 * Transaction state: OK/Pending/Failed
	 *
	 * @var string
	 */
	public $state = null;

	/**
	 * Adapter failure reason code
	 *             Insufficient funds = 20, Invalid account = 21, User unknown = 22, Reason unknown = 23, Unknown payment gateway response = 24,
	 *             No response from payment gateway = 25, Exceeded retry limit = 26, Illegal client request = 27, Expired = 28
	 *
	 * @var int
	 */
	public $failReasonCode = null;

	/**
	 * Entitlement creation date
	 *
	 * @var int
	 */
	public $createdAt = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionStatus extends KalturaObjectBase
{
	/**
	 * Payment gateway adapter application state for the transaction to update
	 *
	 * @var KalturaTransactionAdapterStatus
	 */
	public $adapterTransactionStatus = null;

	/**
	 * External transaction identifier
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * Payment gateway transaction status
	 *
	 * @var string
	 */
	public $externalStatus = null;

	/**
	 * Payment gateway message
	 *
	 * @var string
	 */
	public $externalMessage = null;

	/**
	 * The reason the transaction failed
	 *
	 * @var int
	 */
	public $failReason = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserLoginPin extends KalturaObjectBase
{
	/**
	 * Generated login pin code
	 *
	 * @var string
	 */
	public $pinCode = null;

	/**
	 * Login pin expiration time (epoch)
	 *
	 * @var int
	 */
	public $expirationTime = null;

	/**
	 * User Identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOTTUserDynamicData extends KalturaObjectBase
{
	/**
	 * User identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * Key
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * Value
	 *
	 * @var KalturaStringValue
	 */
	public $value;


}


<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Kaltura Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platforms allow them to do with
// text.
//
// Copyright (C) 2006-2023  Kaltura Inc.
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
abstract class KalturaSkipCondition extends KalturaObjectBase
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

	/**
	 * Abort the Multireuqset call if any error occurs in one of the requests
	 *
	 * @var bool
	 */
	public $abortOnError = null;

	/**
	 * Abort all following requests in Multireuqset if current request has an error
	 *
	 * @var bool
	 */
	public $abortAllOnError = null;

	/**
	 * Skip current request according to skip condition
	 *
	 * @var KalturaSkipCondition
	 */
	public $skipCondition;


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
class KalturaOnDemandResponseProfile extends KalturaDetachedResponseProfile
{
	/**
	 * Comma seperated properties names
	 *
	 * @var string
	 */
	public $retrievedProperties = null;


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
class KalturaDeviceReferenceDataFilter extends KalturaFilter
{
	/**
	 * IdIn
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceManufacturersReferenceDataFilter extends KalturaDeviceReferenceDataFilter
{
	/**
	 * name equal
	 *
	 * @var string
	 */
	public $nameEqual = null;


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

	/**
	 * User email
	 *
	 * @var string
	 */
	public $emailEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerFilter extends KalturaFilter
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
class KalturaPasswordPolicyFilter extends KalturaFilter
{
	/**
	 * Comma separated list of role Ids.
	 *
	 * @var string
	 */
	public $userRoleIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSessionProfileFilter extends KalturaFilter
{
	/**
	 * UserSessionProfile identifier to filter by
	 *
	 * @var int
	 */
	public $idEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadFilter extends KalturaFilter
{
	/**
	 * bulk objects Type name (must be type of KalturaOTTObject)
	 *
	 * @var string
	 */
	public $bulkObjectTypeEqual = null;

	/**
	 * upload date to search within (search in the last 60 days)
	 *
	 * @var int
	 */
	public $createDateGreaterThanOrEqual = null;

	/**
	 * Indicates if to get the BulkUpload list that created by current user or by the entire group.
	 *
	 * @var bool
	 */
	public $uploadedByUserIdEqualCurrent = null;

	/**
	 * Comma separated list of BulkUpload Statuses to search\filter
	 *
	 * @var string
	 */
	public $statusIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubtitlesFilter extends KalturaFilter
{
	/**
	 * A comma separated list of IDs indicating the KalturaSubtitles objects&#39; IDs.
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Contains a name or a partial name of the subtitles file.
	 *
	 * @var string
	 */
	public $fileNameContains = null;


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
abstract class KalturaBaseSegmentationTypeFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentationTypeFilter extends KalturaBaseSegmentationTypeFilter
{
	/**
	 * Comma separated segmentation types identifiers
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * KSQL expression
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * Name of segment contains specific string value
	 *
	 * @var string
	 */
	public $nameContain = null;

	/**
	 * comma-separated list of KalturaSegmentationType.assetUserRuleId values
	 *
	 * @var string
	 */
	public $assetUserRuleIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentValueFilter extends KalturaBaseSegmentationTypeFilter
{
	/**
	 * Comma separated segmentation identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdSegmentFilter extends KalturaFilter
{
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
class KalturaUserSegmentFilter extends KalturaFilter
{
	/**
	 * User ID
	 *
	 * @var string
	 */
	public $userIdEqual = null;

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
abstract class KalturaWatchBasedRecommendationsProfileFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWatchBasedRecommendationsProfileByIdsFilter extends KalturaWatchBasedRecommendationsProfileFilter
{
	/**
	 * Comma seperated watch based recommendation profile ids
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWatchBasedRecommendationsProfileByNameFilter extends KalturaWatchBasedRecommendationsProfileFilter
{
	/**
	 * A string that is included in the profile name
	 *
	 * @var string
	 */
	public $nameContains = null;


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
	 * Media-file ID to get the collections by
	 *
	 * @var int
	 */
	public $mediaFileIdEqual = null;

	/**
	 * couponGroupIdEqual
	 *
	 * @var int
	 */
	public $couponGroupIdEqual = null;

	/**
	 * return also inactive
	 *
	 * @var bool
	 */
	public $alsoInactive = null;

	/**
	 * comma-separated list of KalturaCollection.assetUserRuleId values.  Matching KalturaCollection objects will be returned by the filter.
	 *
	 * @var string
	 */
	public $assetUserRuleIdIn = null;

	/**
	 * A string that is included in the collection name
	 *
	 * @var string
	 */
	public $nameContains = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssociatedShopEntities extends KalturaObjectBase
{
	/**
	 * comma-separated list of assetUserRuleId values. Matching entities will be returned by the filter.
	 *
	 * @var string
	 */
	public $assetUserRuleIdIn = null;

	/**
	 * If true, filter will return entities with null/empty assetUserRuleId value, in addition to any entities whose assetUserRuleId value matches the assetUserRuleIdIn parameter.
	 *             If false (or field is not specified) filter will return only entities whose assetUserRuleId value matches the assetUserRuleIdIn parameter.
	 *
	 * @var bool
	 */
	public $includeNullAssetUserRuleId = null;


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

	/**
	 * filter all discountDetails by associate shop entities
	 *
	 * @var KalturaAssociatedShopEntities
	 */
	public $associatedShopEntities;


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

	/**
	 * couponGroupIdEqual
	 *
	 * @var int
	 */
	public $couponGroupIdEqual = null;

	/**
	 * return also inactive
	 *
	 * @var bool
	 */
	public $alsoInactive = null;

	/**
	 * A string that is included in the ppv name
	 *
	 * @var string
	 */
	public $nameContains = null;

	/**
	 * comma-separated list of KalturaPpv.assetUserRuleId values.  Matching KalturaPpv objects will be returned by the filter.
	 *
	 * @var string
	 */
	public $assetUserRuleIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPreviewModuleFilter extends KalturaFilter
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
class KalturaProgramAssetGroupOfferFilter extends KalturaFilter
{
	/**
	 * return also inactive
	 *
	 * @var bool
	 */
	public $alsoInactive = null;

	/**
	 * A string that is included in the PAGO name
	 *
	 * @var string
	 */
	public $nameContains = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProgramAssetGroupOfferIdInFilter extends KalturaProgramAssetGroupOfferFilter
{
	/**
	 * Comma separated asset group offer identifiers
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

	/**
	 * couponGroupIdEqual
	 *
	 * @var int
	 */
	public $couponGroupIdEqual = null;

	/**
	 * previewModuleIdEqual
	 *
	 * @var int
	 */
	public $previewModuleIdEqual = null;

	/**
	 * pricePlanIdEqual
	 *
	 * @var int
	 */
	public $pricePlanIdEqual = null;

	/**
	 * channelIdEqual
	 *
	 * @var int
	 */
	public $channelIdEqual = null;

	/**
	 * KSQL expression
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * return also inactive
	 *
	 * @var bool
	 */
	public $alsoInactive = null;

	/**
	 * comma separated values of KalturaSubscriptionDependencyType 
	 *             return subscriptions associated by their subscription sets dependency Type
	 *
	 * @var string
	 */
	public $dependencyTypeIn = null;

	/**
	 * A string that is included in the subscription name
	 *
	 * @var string
	 */
	public $nameContains = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUsageModuleFilter extends KalturaFilter
{
	/**
	 * usageModule id
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * filter all usageModules by associate shop entities
	 *
	 * @var KalturaAssociatedShopEntities
	 */
	public $associatedShopEntities;


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
class KalturaAnnouncementFilter extends KalturaFilter
{
	/**
	 * A list of comma separated announcement ids.
	 *
	 * @var string
	 */
	public $idIn = null;


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
class KalturaPersonalFeedFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSmsAdapterProfileFilter extends KalturaFilter
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
class KalturaSubscribeReference extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicNotificationFilter extends KalturaFilter
{
	/**
	 * Subscribe rreference
	 *
	 * @var KalturaSubscribeReference
	 */
	public $subscribeReference;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSubscribeReference extends KalturaSubscribeReference
{
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
class KalturaTopicNotificationMessageFilter extends KalturaFilter
{
	/**
	 * Topic notification ID
	 *
	 * @var int
	 */
	public $topicNotificationIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestByCompoundFilter extends KalturaFilter
{
	/**
	 * A string that is included in the ingest file name
	 *
	 * @var string
	 */
	public $ingestNameContains = null;

	/**
	 * Comma seperated user ids
	 *
	 * @var string
	 */
	public $ingestedByUserIdIn = null;

	/**
	 * Comma seperated valid stutuses
	 *
	 * @var string
	 */
	public $ingestStatusIn = null;

	/**
	 * Ingest created date greater then this value. . Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $createdDateGreaterThan = null;

	/**
	 * Ingest created date smaller than this value. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $createdDateSmallerThan = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestByIdsFilter extends KalturaFilter
{
	/**
	 * Comma seperated ingest profile ids
	 *
	 * @var string
	 */
	public $ingestIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestEpgProgramResultFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaIngestProgramResultsByRefineFilter extends KalturaIngestEpgProgramResultFilter
{
	/**
	 * Comma seperated valid statuses - only &#39;FAILURE&#39;, &#39;WARNING&#39; and &#39;SUCCESS&#39; are valid strings. No repetitions are allowed.
	 *
	 * @var string
	 */
	public $ingestStatusIn = null;

	/**
	 * Program EPG start date greater then this value. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $startDateGreaterThan = null;

	/**
	 * Program EPG start date smaller than this value. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $startDateSmallerThan = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestProgramResultsByCombinedFieldsFilter extends KalturaIngestProgramResultsByRefineFilter
{
	/**
	 * String value to substring search by ProgramID or ExternalProgramID or LinearChannelID.
	 *             Up to 20 ids are allowed.
	 *
	 * @var string
	 */
	public $combinedFieldsValue = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestProgramResultsByCompoundFilter extends KalturaIngestProgramResultsByRefineFilter
{
	/**
	 * Comma seperated channel id (the id of the linear channel asset that the program belongs to).
	 *             Up to 20 ids are allowed.
	 *
	 * @var string
	 */
	public $linearChannelIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestProgramResultsByExternalIdsFilter extends KalturaIngestEpgProgramResultFilter
{
	/**
	 * Comma seperated external program id.
	 *             Up to 20 ids are allowed.
	 *
	 * @var string
	 */
	public $externalProgramIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestProgramResultsByProgramIdsFilter extends KalturaIngestEpgProgramResultFilter
{
	/**
	 * Comma seperated program id (the unique ingested program id as it determined by Kaltura BE).
	 *             Up to 20 ids are allowed.
	 *
	 * @var string
	 */
	public $programIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaVodIngestAssetResultFilter extends KalturaFilter
{
	/**
	 * Filter KalturaVodIngestAssetResult elements based on the ingest XML file name or partial name.
	 *
	 * @var string
	 */
	public $fileNameContains = null;

	/**
	 * Filter KalturaVodIngestAssetResult elements based on the asset name or partial name.
	 *
	 * @var string
	 */
	public $assetNameContains = null;

	/**
	 * Comma separated values, representing multiple selection of ingest status state (\&quot;SUCCESS\&quot;,\&quot;FAIL\&quot;,\&quot;SUCCESS_WARNING\&quot;EXTERNAL_FAIL\&quot;).
	 *
	 * @var string
	 */
	public $ingestStatusIn = null;

	/**
	 * Filter assets ingested after the greater than value. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $ingestDateGreaterThan = null;

	/**
	 * Filter assets ingested before the smaller than value. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $ingestDateSmallerThan = null;

	/**
	 * Comma separated asset types, representing multiple selection of VOD asset types (e.g. \&quot;MOVIE\&quot;,\&quot;SERIES\&quot;,\&quot;SEASON\&quot;,\&quot;EPISODE\&quot;...).
	 *
	 * @var string
	 */
	public $vodTypeSystemNameIn = null;

	/**
	 * Comma separated Ids, pointing to AssetUserRules which hold the shop markers (shop provider values)
	 *
	 * @var string
	 */
	public $shopAssetUserRuleIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserLogFilter extends KalturaFilter
{
	/**
	 * A comma-separated list of up to 15 positive integer user IDs (greater than zero) used to filter log entries. An empty list is not permitted;
	 *             Valid IDs: Only log entries associated with valid, existing user IDs are returned; 
	 *             Invalid IDs: Specifying a non-existent user ID will result in no log entries being returned for that specific ID; 
	 *             Users: Log entries associated with a deleted user will be returned unless the log entry itself has also been deleted;
	 *
	 * @var string
	 */
	public $userIdIn = null;

	/**
	 * The start date for filtering (Epoch format). Only logs created on or after this date are returned. If omitted, no start date filter is applied.
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The end date for filtering (Epoch format). Only logs created on or before this date are returned. If omitted, no end date filter is applied.
	 *
	 * @var int
	 */
	public $endDate = null;


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
class KalturaDynamicListFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDynamicListIdInFilter extends KalturaDynamicListFilter
{
	/**
	 * DynamicList identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaDynamicListSearchFilter extends KalturaDynamicListFilter
{
	/**
	 * DynamicList id to search by
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * udid value that should be in the DynamicList
	 *
	 * @var string
	 */
	public $valueEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUdidDynamicListSearchFilter extends KalturaDynamicListSearchFilter
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
abstract class KalturaBaseAssetOrder extends KalturaObjectBase
{

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

	/**
	 * Parameters for asset list sorting.
	 *
	 * @var array of KalturaBaseAssetOrder
	 */
	public $orderingParameters;

	/**
	 * Trending Days Equal
	 *
	 * @var int
	 */
	public $trendingDaysEqual = null;

	/**
	 * Should apply priority groups filter or not.
	 *
	 * @var bool
	 */
	public $shouldApplyPriorityGroupsEqual = null;


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
abstract class KalturaBaseSearchAssetFilter extends KalturaAssetFilter
{
	/**
	 * Search assets using dynamic criteria. Provided collection of nested expressions with key, comparison operators, value, and logical conjunction.
	 *             Possible keys: any Tag or Meta defined in the system and the following reserved keys: start_date, end_date. 
	 *             epg_id, media_id - for specific asset IDs.
	 *             geo_block - only valid value is &quot;true&quot;: When enabled, only assets that are not restricted to the user by geo-block rules will return.
	 *             parental_rules - only valid value is &quot;true&quot;: When enabled, only assets that the user doesn&#39;t need to provide PIN code will return.
	 *             user_interests - only valid value is &quot;true&quot;. When enabled, only assets that the user defined as his interests (by tags and metas) will return.
	 *             epg_channel_id - the channel identifier of the EPG program.
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

	/**
	 * order by of grouping
	 *
	 * @var KalturaGroupByOrder
	 */
	public $groupOrderBy = null;

	/**
	 * Grouping Option, Omit if not specified otherwise
	 *
	 * @var KalturaGroupingOption
	 */
	public $groupingOptionEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelFilter extends KalturaBaseSearchAssetFilter
{
	/**
	 * Channel Id
	 *
	 * @var int
	 */
	public $idEqual = null;

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
class KalturaPersonalListSearchFilter extends KalturaBaseSearchAssetFilter
{
	/**
	 * Comma separated list of partner list types to search within. 
	 *             If omitted - all types should be included.
	 *
	 * @var string
	 */
	public $partnerListTypeIn = null;


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
	 *             If omitted - same type as the provided asset.
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
class KalturaSearchAssetFilter extends KalturaBaseSearchAssetFilter
{
	/**
	 * (Deprecated - use KalturaBaseSearchAssetFilter.kSql)
	 *             Comma separated list of asset types to search within. 
	 *             Possible values: 0 - EPG linear programs entries; 1 - Recordings; Any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted - all types should be included.
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
	 *             Possible values: 0 - EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted - all types should be included.
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

	/**
	 * Alias for External Channel Id.
	 *
	 * @var string
	 */
	public $alias = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveAssetHasRecordingsFilter extends KalturaAssetFilter
{
	/**
	 * KalturaLiveAsset.id value of the live linear channel to be examined for associated recordings
	 *
	 * @var int
	 */
	public $liveAssetIdEqual = null;


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
	 *             Possible values: 0 - EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted - all types should be included.
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

	/**
	 * Series to filter by
	 *
	 * @var string
	 */
	public $seriesIdsIn = null;


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
	 *             Possible values: 0 - EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted - all types should be included.
	 *
	 * @var string
	 */
	public $typeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetDynamicOrder extends KalturaBaseAssetOrder
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
class KalturaAssetOrder extends KalturaBaseAssetOrder
{
	/**
	 * Order By
	 *
	 * @var KalturaAssetOrderByType
	 */
	public $orderBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStatisticsOrder extends KalturaBaseAssetOrder
{
	/**
	 * Trending Days Equal
	 *
	 * @var int
	 */
	public $trendingDaysEqual = null;

	/**
	 * order by meta asc/desc
	 *
	 * @var KalturaAssetOrderByStatistics
	 */
	public $orderBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPriorityGroupFilter extends KalturaRelatedObjectFilter
{

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
class KalturaHouseholdCouponCodeFilter extends KalturaRelatedObjectFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdCouponFilter extends KalturaFilter
{
	/**
	 * Indicates which household coupons list to return by their business module type.
	 *
	 * @var KalturaTransactionType
	 */
	public $businessModuleTypeEqual = null;

	/**
	 * Indicates which household coupons list to return by their business module ID.
	 *
	 * @var int
	 */
	public $businessModuleIdEqual = null;

	/**
	 * Allow clients to inquiry if a specific coupon is part of an HH’s wallet or not
	 *
	 * @var string
	 */
	public $couponCode = null;

	/**
	 * Allow clients to filter out coupons which are valid/invalid
	 *
	 * @var KalturaCouponStatus
	 */
	public $status = null;


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

	/**
	 * External Id
	 *
	 * @var string
	 */
	public $externalIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdFilter extends KalturaFilter
{
	/**
	 * Household external identifier to search by
	 *
	 * @var string
	 */
	public $externalIdEqual = null;


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
class KalturaExternalRecordingFilter extends KalturaRecordingFilter
{
	/**
	 * MetaData filtering
	 *
	 * @var map
	 */
	public $metaData;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCloudRecordingFilter extends KalturaExternalRecordingFilter
{
	/**
	 * Adapter Data
	 *
	 * @var map
	 */
	public $adapterData;


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
class KalturaCloudSeriesRecordingFilter extends KalturaSeriesRecordingFilter
{
	/**
	 * Adapter Data
	 *
	 * @var map
	 */
	public $adapterData;


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
class KalturaProgramAssetGroupOfferEntitlementFilter extends KalturaEntitlementFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalRecordingResponseProfileFilter extends KalturaRelatedObjectFilter
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

	/**
	 * Comma separated ProgramAssetGroupOffer identifiers
	 *
	 * @var string
	 */
	public $programAssetGroupOfferIdIn = null;


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

	/**
	 * Filter transaction by entitlement id
	 *
	 * @var int
	 */
	public $entitlementIdEqual = null;

	/**
	 * Filter transaction by external Id
	 *
	 * @var string
	 */
	public $externalIdEqual = null;

	/**
	 * Filter transaction by billing item type
	 *
	 * @var KalturaBillingItemsType
	 */
	public $billingItemsTypeEqual = null;

	/**
	 * Filter transaction by billing action
	 *
	 * @var KalturaBillingAction
	 */
	public $billingActionEqual = null;


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
class KalturaAssetHistoryFilter extends KalturaFilter
{
	/**
	 * Comma separated list of asset types to search within.
	 *             Possible values: 0 - EPG linear programs entries, any media type ID (according to media type IDs defined dynamically in the system).
	 *             If omitted - all types should be included.
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
	 * Which type of recently watched media to include in the result - those that finished watching, those that are in progress or both.
	 *             If omitted or specified filter = all - return all types.
	 *             Allowed values: progress - return medias that are in-progress, done - return medias that finished watching.
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
class KalturaAssetHistorySuppressFilter extends KalturaRelatedObjectFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetImagePerRatioFilter extends KalturaRelatedObjectFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseAssetStructFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructFilter extends KalturaBaseAssetStructFilter
{
	/**
	 * Comma separated identifiers, id = 0 is identified as program AssetStruct
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

	/**
	 * Filter Asset Structs by object virtual asset info type value
	 *
	 * @var KalturaObjectVirtualAssetInfoType
	 */
	public $objectVirtualAssetInfoTypeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLinearAssetStructFilter extends KalturaBaseAssetStructFilter
{

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

	/**
	 * The date of the last successful login
	 *
	 * @var int
	 * @readonly
	 */
	public $lastLoginDate = null;

	/**
	 * The number of failed login attempts since the last successful login
	 *
	 * @var int
	 * @readonly
	 */
	public $failedLoginCount = null;


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
	 *             For external recordings will always be &#39;0&#39;
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
	 *             For external recordings will always be &#39;True&#39;
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

	/**
	 * Playback context type
	 *
	 * @var KalturaPlaybackContextType
	 */
	public $context = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryItemFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryItemAncestorsFilter extends KalturaCategoryItemFilter
{
	/**
	 * KSQL expression
	 *
	 * @var int
	 */
	public $id = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryItemByIdInFilter extends KalturaCategoryItemFilter
{
	/**
	 * Category item identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryItemSearchFilter extends KalturaCategoryItemFilter
{
	/**
	 * KSQL expression
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * Root only
	 *
	 * @var bool
	 */
	public $rootOnly = null;

	/**
	 * Indicates which category to return by their type.
	 *
	 * @var string
	 */
	public $typeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryVersionFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryVersionFilterByTree extends KalturaCategoryVersionFilter
{
	/**
	 * Category version tree identifier
	 *
	 * @var int
	 */
	public $treeIdEqual = null;

	/**
	 * Category version state
	 *
	 * @var KalturaCategoryVersionState
	 */
	public $stateEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaChannelsBaseFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelsFilter extends KalturaChannelsBaseFilter
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

	/**
	 * Comma separated channel ids
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * comma-separated list of KalturaChannel.assetUserRuleId values.  Matching KalturaChannel objects will be returned by the filter.
	 *
	 * @var string
	 */
	public $assetUserRuleIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelSearchByKsqlFilter extends KalturaChannelsBaseFilter
{
	/**
	 * KSQL expression
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * channel struct
	 *
	 * @var KalturaChannelStruct
	 */
	public $channelStructEqual = null;


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
	 * Filter images that are default on at least on image type or not default at any
	 *
	 * @var bool
	 */
	public $isDefaultEqual = null;

	/**
	 * Comma separated imageObject ids list
	 *
	 * @var string
	 */
	public $imageObjectIdIn = null;


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
class KalturaLabelFilter extends KalturaFilter
{
	/**
	 * Comma-separated identifiers of labels
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Filter the label with this value
	 *
	 * @var string
	 */
	public $labelEqual = null;

	/**
	 * Filter labels which start with this value
	 *
	 * @var string
	 */
	public $labelStartsWith = null;

	/**
	 * Type of entity that labels are associated with
	 *
	 * @var KalturaEntityAttribute
	 */
	public $entityAttributeEqual = null;


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
class KalturaPersonalAssetSelectionFilter extends KalturaFilter
{
	/**
	 * Filters the results of asset.listPersonalSelection by slot number.  Takes a slot number as input and returns only those assets from the personal selection that are assigned to that slot.
	 *
	 * @var int
	 */
	public $slotNumberEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStreamingDeviceFilter extends KalturaFilter
{
	/**
	 * filter by asset type
	 *
	 * @var KalturaAssetType
	 */
	public $assetTypeEqual = null;


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
class KalturaSearchPriorityGroupFilter extends KalturaFilter
{
	/**
	 * Return only search priority groups that are in use
	 *
	 * @var bool
	 */
	public $activeOnlyEqual = null;

	/**
	 * Identifier of search priority group to return
	 *
	 * @var int
	 */
	public $idEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLineupRegionalChannelFilter extends KalturaFilter
{
	/**
	 * Region ID filter
	 *
	 * @var int
	 */
	public $regionIdEqual = null;

	/**
	 * Should include lineup from parent region into response
	 *
	 * @var bool
	 */
	public $parentRegionIncluded = null;

	/**
	 * A valid KSQL statement - Only linear channels that satisfies the KSQL statement will be included in the results
	 *
	 * @var string
	 */
	public $kSql = null;

	/**
	 * Filter only LCNs that greater or equals to the provided number
	 *
	 * @var int
	 */
	public $lcnGreaterThanOrEqual = null;

	/**
	 * Filter only LCNs that less or equals to the provided number
	 *
	 * @var int
	 */
	public $lcnLessThanOrEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaListGroupsRepresentativesFilter extends KalturaFilter
{
	/**
	 * Search assets using dynamic criteria. Provided collection of nested expressions with key, comparison operators, value, and logical conjunction.
	 *
	 * @var string
	 */
	public $kSql = null;


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
class KalturaAssetPersonalMarkupSearchFilter extends KalturaFilter
{
	/**
	 * all assets to search their personal markups
	 *
	 * @var array of KalturaSlimAsset
	 */
	public $assetsIn;


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

	/**
	 * Indicates which asset rule list to return by this KalturaRuleActionType.
	 *
	 * @var KalturaRuleActionType
	 */
	public $actionsContainType = null;

	/**
	 * Asset rule id
	 *
	 * @var int
	 */
	public $assetRuleIdEqual = null;

	/**
	 * Name
	 *
	 * @var string
	 */
	public $nameContains = null;


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

	/**
	 * Indicates which asset rule list to return by this KalturaRuleActionType.
	 *
	 * @var KalturaRuleActionType
	 */
	public $actionsContainType = null;

	/**
	 * Indicates that only asset rules are returned that have exactly one and not more associated condition.
	 *
	 * @var KalturaRuleConditionType
	 */
	public $conditionsContainType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCampaignFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCampaignSearchFilter extends KalturaCampaignFilter
{
	/**
	 * start Date Greater Than Or Equal
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrEqual = null;

	/**
	 * end Date Greater Than Or Equal
	 *
	 * @var int
	 */
	public $endDateLessThanOrEqual = null;

	/**
	 * state Equal
	 *
	 * @var KalturaObjectState
	 */
	public $stateEqual = null;

	/**
	 * has Promotion
	 *
	 * @var bool
	 */
	public $hasPromotion = null;

	/**
	 * Filter the Campaign with this name.
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * A string that is included in the Campaign name
	 *
	 * @var string
	 */
	public $nameContains = null;

	/**
	 * Comma separated Campaign State list
	 *
	 * @var string
	 */
	public $stateIn = null;

	/**
	 * Comma separated AssetUserRule Ids to filter by
	 *
	 * @var string
	 */
	public $assetUserRuleIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBatchCampaignSearchFilter extends KalturaCampaignSearchFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCampaignIdInFilter extends KalturaCampaignFilter
{
	/**
	 * campaign identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCampaignSegmentFilter extends KalturaCampaignSearchFilter
{
	/**
	 * segment id to be searched inside campaigns
	 *
	 * @var int
	 */
	public $segmentIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTriggerCampaignSearchFilter extends KalturaCampaignSearchFilter
{

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

	/**
	 * Indicates which business module rule list to return by their action.
	 *
	 * @var KalturaRuleActionType
	 */
	public $actionsContainType = null;


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
class KalturaCurrencyFilter extends KalturaFilter
{
	/**
	 * Currency codes
	 *
	 * @var string
	 */
	public $codeIn = null;

	/**
	 * Exclude partner
	 *
	 * @var bool
	 */
	public $excludePartner = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceBrandFilter extends KalturaFilter
{
	/**
	 * Filter the device brand with this identifier.
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * Filter the device brands with this device family&#39;s identifier.
	 *
	 * @var int
	 */
	public $deviceFamilyIdEqual = null;

	/**
	 * Filter the device brand with this name.
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * Filter device brands of this type
	 *
	 * @var KalturaDeviceBrandType
	 */
	public $typeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceFamilyFilter extends KalturaFilter
{
	/**
	 * Filter the device family with this identifier.
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * Filter the device family with this name.
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * Filter device families of this type
	 *
	 * @var KalturaDeviceFamilyType
	 */
	public $typeEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEventNotificationFilter extends KalturaFilter
{
	/**
	 * Indicates which event notification to return by their event notifications Id.
	 *
	 * @var string
	 */
	public $idEqual = null;

	/**
	 * Indicates which objectId to return by their event notifications.
	 *
	 * @var int
	 */
	public $objectIdEqual = null;

	/**
	 * Indicates which objectType to return by their event notifications.
	 *
	 * @var string
	 */
	public $eventObjectTypeEqual = null;


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
class KalturaExternalChannelProfileFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalChannelProfileByIdInFilter extends KalturaExternalChannelProfileFilter
{
	/**
	 * Comma separated external channel profile ids
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIotFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIotProfileFilter extends KalturaFilter
{

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

	/**
	 * Exclude partner
	 *
	 * @var bool
	 */
	public $excludePartner = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileDynamicDataFilter extends KalturaFilter
{
	/**
	 * A comma-separated list of KalturaMediaFileDynamicData.Id to be searched.
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * An integer representing the the mediaFileType holding the keys for which the values should be stored.
	 *
	 * @var int
	 */
	public $mediaFileTypeId = null;

	/**
	 * A string representing the key name within the mediaFileType that identifies the list corresponding
	 *             to that key name.
	 *
	 * @var string
	 */
	public $mediaFileTypeKeyName = null;

	/**
	 * A string representing a specific value to be searched.
	 *
	 * @var string
	 */
	public $valueEqual = null;

	/**
	 * A string representing the beginning of multiple (zero or more) matching values.
	 *
	 * @var string
	 */
	public $valueStartsWith = null;


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
class KalturaBasePermissionFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionFilter extends KalturaBasePermissionFilter
{
	/**
	 * Indicates whether the results should be filtered by userId using the current
	 *
	 * @var bool
	 */
	public $currentUserPermissionsContains = null;

	/**
	 * Return permissions by role ID
	 *
	 * @var int
	 */
	public $roleIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionByIdInFilter extends KalturaBasePermissionFilter
{
	/**
	 * Category item identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemByIdInFilter extends KalturaPermissionItemFilter
{
	/**
	 * Permission item identifiers
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemByApiActionFilter extends KalturaPermissionItemFilter
{
	/**
	 * API service name
	 *
	 * @var string
	 */
	public $serviceEqual = null;

	/**
	 * API action name
	 *
	 * @var string
	 */
	public $actionEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemByArgumentFilter extends KalturaPermissionItemByApiActionFilter
{
	/**
	 * Parameter name
	 *
	 * @var string
	 */
	public $parameterEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemByParameterFilter extends KalturaPermissionItemFilter
{
	/**
	 * Parameter name
	 *
	 * @var string
	 */
	public $parameterEqual = null;

	/**
	 * Parameter name
	 *
	 * @var string
	 */
	public $objectEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackProfileFilter extends KalturaFilter
{
	/**
	 * Playback profile to filter by
	 *
	 * @var int
	 */
	public $playbackProfileEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBaseRegionFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionFilter extends KalturaBaseRegionFilter
{
	/**
	 * List of comma separated regions external IDs
	 *
	 * @var string
	 */
	public $externalIdIn = null;

	/**
	 * List of comma separated regions Ids
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * Region parent ID to filter by
	 *
	 * @var int
	 */
	public $parentIdEqual = null;

	/**
	 * Region parent ID to filter by
	 *
	 * @var int
	 */
	public $liveAssetIdEqual = null;

	/**
	 * Parent region to filter by
	 *
	 * @var bool
	 */
	public $parentOnly = null;

	/**
	 * Retrieves only the channels belonging specifically to the child region
	 *
	 * @var bool
	 */
	public $exclusiveLcn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDefaultRegionFilter extends KalturaBaseRegionFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAddDefaultIfEmptyResponseProfile extends KalturaRelatedObjectFilter
{

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
class KalturaTvmRuleFilter extends KalturaFilter
{
	/**
	 * Indicates which tvm rule list to return by their type.
	 *
	 * @var KalturaTvmRuleType
	 */
	public $ruleTypeEqual = null;

	/**
	 * Indicates which tvm rule list to return by their name.
	 *
	 * @var string
	 */
	public $nameEqual = null;


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
	 * Asset type to filter by - 0 = EPG, 1 = media, 2 = npvr
	 *
	 * @var int
	 */
	public $assetTypeEqual = null;


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

	/**
	 * User role type
	 *
	 * @var KalturaUserRoleType
	 */
	public $typeEqual = null;

	/**
	 * User role profile
	 *
	 * @var KalturaUserRoleProfile
	 */
	public $profileEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGeoBlockRuleFilter extends KalturaFilter
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEpgFilter extends KalturaFilter
{
	/**
	 * date in unix timestamp, e.g. 1610928000(January 18, 2021 0:00:00), 1611014400(January 19, 2021 0:00:00)
	 *
	 * @var int
	 */
	public $dateEqual = null;

	/**
	 * EPG live asset identifier
	 *
	 * @var int
	 */
	public $liveAssetIdEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPropertySkipCondition extends KalturaSkipCondition
{
	/**
	 * The property path on which the condition is checked
	 *
	 * @var string
	 */
	public $propertyPath = null;

	/**
	 * The operator that applies the check to the condition
	 *
	 * @var KalturaSkipOperators
	 */
	public $operator = null;

	/**
	 * The value on which the condition is checked
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAggregatedPropertySkipCondition extends KalturaPropertySkipCondition
{
	/**
	 * The aggregation type on which the condition is based on
	 *
	 * @var KalturaAggregationType
	 */
	public $aggregationType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSkipOnErrorCondition extends KalturaSkipCondition
{
	/**
	 * Indicates which error should be considered to skip the current request
	 *
	 * @var KalturaSkipOptions
	 */
	public $condition = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenerateMetadataBySubtitlesJob extends KalturaObjectBase
{
	/**
	 * Unique identifier for the generation job
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Specifies when the job was created, expressed in Epoch timestamp.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when the job was updated, expressed in Epoch timestamp.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Name of the uploaded subtitles file from which the metadata is generated.
	 *
	 * @var string
	 * @readonly
	 */
	public $fileName = null;

	/**
	 * Service status states.
	 *
	 * @var KalturaGenerateMetadataStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Error messages for non-success cases.
	 *
	 * @var string
	 * @readonly
	 */
	public $errorMessage = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenerateMetadataResult extends KalturaObjectBase
{
	/**
	 * A dictionary/map containing the generated metadata. The map key includes the metadata name and the map value includes the generated value.
	 *
	 * @var map
	 */
	public $enrichedMetadata;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaFieldNameMap extends KalturaObjectBase
{
	/**
	 * map &#39;genre&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $genre = null;

	/**
	 * map &#39;subGenre&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $subGenre = null;

	/**
	 * map &#39;sentiment&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $sentiment = null;

	/**
	 * map &#39;suggestedTitle&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $suggestedTitle = null;

	/**
	 * map &#39;Description&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * map &#39;oneLiner&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $oneLiner = null;

	/**
	 * map &#39;Keywords&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $keywords = null;

	/**
	 * map &#39;sensitiveContent&#39; AI generated metadata name to assetStruct&#39;s meta systemName
	 *
	 * @var string
	 */
	public $sensitiveContent = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAiMetadataGeneratorConfiguration extends KalturaObjectBase
{
	/**
	 * Specifies if the feature is enabled or disabled.
	 *
	 * @var bool
	 */
	public $isEnabled = null;

	/**
	 * A map (dictionary) to indicate to which existing metadata or tag the newly generated metadata value should be pushed, per assetStruct (per &#39;asset type&#39;)
	 *
	 * @var map
	 */
	public $assetStructMetaNameMap;

	/**
	 * A read only array to list the set of languages which can be used with the service.
	 *             In practice it is populated with the values set in KalturaMetadataGeneratorLanguages ENUM.
	 *
	 * @var array of KalturaStringValue
	 * @readonly
	 */
	public $supportedLanguages;


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

	/**
	 * Include IOT
	 *
	 * @var bool
	 */
	public $includeIot = null;

	/**
	 * Should add to user inbox
	 *
	 * @var bool
	 */
	public $includeUserInbox = null;


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
class KalturaOTTObjectSupportNullable extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceReferenceData extends KalturaOTTObjectSupportNullable
{
	/**
	 * id
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
	 * Status
	 *
	 * @var bool
	 */
	public $status = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceReferenceDataListResponse extends KalturaListResponse
{
	/**
	 * A list of KalturaDeviceReferenceData
	 *
	 * @var array of KalturaDeviceReferenceData
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceManufacturerInformation extends KalturaDeviceReferenceData
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegexExpression extends KalturaObjectBase
{
	/**
	 * regex expression
	 *
	 * @var string
	 */
	public $expression = null;

	/**
	 * description
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPasswordPolicy extends KalturaOTTObjectSupportNullable
{
	/**
	 * id
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
	 * Comma separated UserRole Ids list which the policy is applied on
	 *
	 * @var string
	 */
	public $userRoleIds = null;

	/**
	 * The number of passwords that should be remembered for each user so that they cannot be reused.
	 *
	 * @var int
	 */
	public $historyCount = null;

	/**
	 * When should the password expire (will represent time as days).
	 *
	 * @var int
	 */
	public $expiration = null;

	/**
	 * array of  KalturaRegex
	 *
	 * @var array of KalturaRegexExpression
	 */
	public $complexities;

	/**
	 * the number of passwords failures before the account is locked.
	 *
	 * @var int
	 */
	public $lockoutFailuresCount = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdSegment extends KalturaOTTObjectSupportNullable
{
	/**
	 * Segment Id
	 *
	 * @var int
	 */
	public $segmentId = null;

	/**
	 * Segment Id
	 *
	 * @var int
	 */
	public $householdId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFilePpv extends KalturaOTTObjectSupportNullable
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
class KalturaBaseChannel extends KalturaOTTObjectSupportNullable
{
	/**
	 * Unique identifier for the channel
	 *
	 * @var int
	 */
	public $id = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountModule extends KalturaObjectBase
{
	/**
	 * Discount module identifier
	 *
	 * @var int
	 */
	public $id = null;

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

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 */
	public $assetUserRuleId = null;


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
	 */
	public $id = null;

	/**
	 * Usage module name
	 *
	 * @var string
	 */
	public $name = null;

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
	 * The amount time an item is available for viewing
	 *
	 * @var int
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
	 */
	public $waiverPeriod = null;

	/**
	 * Indicates whether or not the end user has the right to waive his rights to cancel a purchase
	 *
	 * @var bool
	 */
	public $isWaiverEnabled = null;

	/**
	 * Indicates that usage is targeted for offline playback
	 *
	 * @var bool
	 */
	public $isOfflinePlayback = null;

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 * @insertonly
	 */
	public $assetUserRuleId = null;


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
class KalturaCollectionCouponGroup extends KalturaObjectBase
{
	/**
	 * Coupon group identifier
	 *
	 * @var int
	 */
	public $id = null;

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
class KalturaCollection extends KalturaOTTObjectSupportNullable
{
	/**
	 * Collection identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * A list of channels associated with this collection
	 *             This property will deprecated soon. Please use ChannelsIds instead of it.
	 *
	 * @var array of KalturaBaseChannel
	 * @readonly
	 */
	public $channels;

	/**
	 * Comma separated channels Ids associated with this collection
	 *
	 * @var string
	 */
	public $channelsIds = null;

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
	 * The internal discount module for the collection
	 *             This property will deprecated soon. Please use DiscountModuleId instead of it.
	 *
	 * @var KalturaDiscountModule
	 * @readonly
	 */
	public $discountModule;

	/**
	 * The internal discount module identifier for the collection
	 *
	 * @var int
	 */
	public $discountModuleId = null;

	/**
	 * Name of the collection
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Name of the collection
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * description of the collection
	 *
	 * @var string
	 * @readonly
	 */
	public $description = null;

	/**
	 * description of the collection
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualDescription;

	/**
	 * Collection usage module
	 *             This property will deprecated soon. Please use usageModuleId instead of it.
	 *
	 * @var KalturaUsageModule
	 * @readonly
	 */
	public $usageModule;

	/**
	 * The internal usage module identifier for the collection
	 *
	 * @var int
	 */
	public $usageModuleId = null;

	/**
	 * List of Coupons group
	 *             This property will deprecated soon. Please use CollectionCouponGroup instead of it.
	 *
	 * @var array of KalturaCouponsGroup
	 * @readonly
	 */
	public $couponsGroups;

	/**
	 * List of collection Coupons group
	 *
	 * @var array of KalturaCollectionCouponGroup
	 */
	public $collectionCouponGroup;

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

	/**
	 * Is active collection
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Specifies when was the collection created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the collection last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Virtual asset id
	 *
	 * @var int
	 * @readonly
	 */
	public $virtualAssetId = null;

	/**
	 * A list of file types identifiers that are supported in this collection
	 *
	 * @var array of KalturaIntegerValue
	 * @readonly
	 */
	public $fileTypes;

	/**
	 * Comma separated file types identifiers that are supported in this collection
	 *
	 * @var string
	 */
	public $fileTypesIds = null;

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 * @insertonly
	 */
	public $assetUserRuleId = null;


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

	/**
	 * Image type identifier
	 *
	 * @var int
	 */
	public $imageTypeId = null;

	/**
	 * Image type Name
	 *
	 * @var string
	 */
	public $imageTypeName = null;


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
abstract class KalturaBaseChannelOrder extends KalturaObjectBase
{

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
	 * Parameters for asset list sorting.
	 *
	 * @var array of KalturaBaseChannelOrder
	 */
	public $orderingParametersEqual;

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

	/**
	 * Specifies whether the assets in this channel will be ordered based on their match to the user&#39;s segments (see BEO-5524)
	 *
	 * @var bool
	 */
	public $supportSegmentBasedOrdering = null;

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 */
	public $assetUserRuleId = null;

	/**
	 * key/value map field for extra data
	 *
	 * @var map
	 */
	public $metaData;

	/**
	 * Virtual asset id
	 *
	 * @var int
	 * @readonly
	 */
	public $virtualAssetId = null;


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
class KalturaManualCollectionAsset extends KalturaObjectBase
{
	/**
	 * Internal identifier of the asset
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * The type of the asset. Possible values: media, epg
	 *
	 * @var KalturaManualCollectionAssetType
	 */
	public $type = null;


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

	/**
	 * List of assets identifier
	 *
	 * @var array of KalturaManualCollectionAsset
	 */
	public $assets;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelDynamicOrder extends KalturaBaseChannelOrder
{
	/**
	 * Value
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Order By
	 *
	 * @var KalturaMetaTagOrderBy
	 */
	public $orderBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelFieldOrder extends KalturaBaseChannelOrder
{
	/**
	 * Order By
	 *
	 * @var KalturaChannelFieldOrderByType
	 */
	public $orderBy = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelSlidingWindowOrder extends KalturaBaseChannelOrder
{
	/**
	 * Sliding window period in minutes
	 *
	 * @var int
	 */
	public $period = null;

	/**
	 * Order By
	 *
	 * @var KalturaChannelSlidingWindowOrderByType
	 */
	public $orderBy = null;


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
	 */
	public $isRenewable = null;

	/**
	 * Defines the number of times the module will be renewed (for the life_cycle period)
	 *
	 * @var int
	 */
	public $renewalsNumber = null;

	/**
	 * The discount module identifier of the price plan
	 *
	 * @var int
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
class KalturaProgramAssetGroupOffer extends KalturaOTTObjectSupportNullable
{
	/**
	 * Unique Kaltura internal identifier for the module
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * Name of the Program asset group offer
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Name of the Program asset group offer
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * ID of the KalturaPriceDetails object which contains details of the price to be paid for purchasing this KalturaProgramAssetGroupOffer.
	 *
	 * @var int
	 */
	public $priceDetailsId = null;

	/**
	 * Comma separated file types identifiers that are supported in this Program asset group offer.
	 *             The subset of KalturaMediaFiles of the live linear channel on which the associated Program Assets are carried to which households entitled to this
	 *             Program Asset Group Offer are entitled to view E.g.may be used to restrict entitlement only to HD flavour of the Program Asset(and not the UHD flavour)
	 *             If this parameter is empty, the Household shall be entitled to all KalturaMediaFiles associated with the KalturaLiveAsset.
	 *
	 * @var string
	 */
	public $fileTypesIds = null;

	/**
	 * A list of the descriptions of the Program asset group offer on different languages (language code and translation)
	 *
	 * @var string
	 * @readonly
	 */
	public $description = null;

	/**
	 * A list of the descriptions of the Program asset group offer on different languages (language code and translation)
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualDescription;

	/**
	 * The id of the paired asset
	 *
	 * @var int
	 * @readonly
	 */
	public $virtualAssetId = null;

	/**
	 * Indicates whether the PAGO is active or not (includes whether the PAGO can be purchased and whether it is returned in list API response for regular users)
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Specifies when was the pago created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when was the pago last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * The date/time at which the Program Asset Group Offer is first purchasable by households. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The date/time at which the Program Asset Group Offer is last purchasable by households.Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * The last date/time at which the system will attempt to locate Program Assets that may be associated with this offer.Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $expiryDate = null;

	/**
	 * External identifier
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * Identifies the Program Assets which will be entitled by Households that purchase this offer. Must be a unique value in the context of an account.
	 *
	 * @var string
	 */
	public $externalOfferId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPrice extends KalturaObjectBase
{
	/**
	 * Currency ID
	 *
	 * @var int
	 * @readonly
	 */
	public $currencyId = null;

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
class KalturaPremiumService extends KalturaObjectBase
{
	/**
	 * Service identifier
	 *
	 * @var int
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
class KalturaSubscriptionCouponGroup extends KalturaObjectBase
{
	/**
	 * Coupon group identifier
	 *
	 * @var int
	 */
	public $id = null;

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


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscription extends KalturaOTTObjectSupportNullable
{
	/**
	 * Subscription identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * List of KalturaBaseChannel objects associated with this subscription
	 *
	 * @var array of KalturaBaseChannel
	 * @readonly
	 */
	public $channels;

	/**
	 * Comma separated list identifying the KalturaBaseChannel objects associated with this subscription. In practice this is a list of KalturaBaseChannel.id values.
	 *
	 * @var string
	 */
	public $channelsIds = null;

	/**
	 * The first date the subscription is available for purchasing (in seconds since the Unix epoch)
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The last date the subscription is available for purchasing (in seconds since the Unix epoch)
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * List of file types (KalturaMediaFileType.id values) that are supported by this subscription
	 *
	 * @var array of KalturaIntegerValue
	 * @readonly
	 */
	public $fileTypes;

	/**
	 * Comma separated list of file types (KalturaMediaFileType.id values) that are supported by this subscription
	 *
	 * @var string
	 */
	public $fileTypesIds = null;

	/**
	 * Denotes whether or not this subscription can be renewed
	 *
	 * @var bool
	 * @readonly
	 */
	public $isRenewable = null;

	/**
	 * Defines the number of times this subscription will be renewed
	 *
	 * @var int
	 * @readonly
	 */
	public $renewalsNumber = null;

	/**
	 * Indicates whether the subscription will renew forever
	 *
	 * @var bool
	 * @readonly
	 */
	public $isInfiniteRenewal = null;

	/**
	 * The price of the subscription
	 *
	 * @var KalturaPriceDetails
	 * @readonly
	 */
	public $price;

	/**
	 * The internal discount module for the subscription
	 *
	 * @var KalturaDiscountModule
	 * @readonly
	 */
	public $discountModule;

	/**
	 * The internal discount module identifier (kalturaDiscountModule.id value) for the subscription
	 *
	 * @var int
	 */
	public $internalDiscountModuleId = null;

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
	 * Identifier of the media (KalturaAsset.id value) associated with the subscription
	 *
	 * @var int
	 * @readonly
	 */
	public $mediaId = null;

	/**
	 * Subscription order (when returned in methods that retrieve subscriptions)
	 *
	 * @var int
	 */
	public $prorityInOrder = null;

	/**
	 * Comma separated list of subscription price plans (KalturaPricePlan.id values) that are associated to this subscription
	 *
	 * @var string
	 */
	public $pricePlanIds = null;

	/**
	 * Optional: If the subscription has a flexible price plan. Represents an initial non-recurring discounted period which is charged immediately (no unified billing), followed by a recurring price plan which should be aligned with the unified billing cycle
	 *
	 * @var int
	 */
	public $flexiblePricePlanId = null;

	/**
	 * Subscription preview module
	 *
	 * @var KalturaPreviewModule
	 * @readonly
	 */
	public $previewModule;

	/**
	 * Identifier of the KalturaPreviewModule (KalturaPreviewModule.id value) associated with this subscription
	 *
	 * @var int
	 */
	public $previewModuleId = null;

	/**
	 * Identifier of the KalturaHouseholdLimitationModule (KalturaHouseholdLimitations.id value) associated with this subscription
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
	 * List of permitted user types for the subscription
	 *
	 * @var array of KalturaOTTUserType
	 * @readonly
	 */
	public $userTypes;

	/**
	 * List of KalturaCouponsGroup objects associated with the subscription
	 *
	 * @var array of KalturaCouponsGroup
	 * @readonly
	 */
	public $couponsGroups;

	/**
	 * List of KalturaSubscriptionCouponGroup objects associated with the subscription
	 *
	 * @var array of KalturaSubscriptionCouponGroup
	 */
	public $subscriptionCouponGroup;

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
	 * Identifier of the subsription object as assigned by an external system
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

	/**
	 * Pre-sale date that subscription is available for purchasing (in seconds since the Unix epoch)
	 *
	 * @var int
	 */
	public $preSaleDate = null;

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

	/**
	 * Is active subscription
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Specifies when the subscription was created (in seconds since the Unix epoch)
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies when the subscription was last updated (in seconds since the Unix epoch)
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
class KalturaDiscount extends KalturaPrice
{
	/**
	 * The discount percentage
	 *
	 * @var float
	 */
	public $percentage = null;


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
class KalturaNpvrPremiumService extends KalturaPremiumService
{
	/**
	 * Quota in minutes
	 *
	 * @var int
	 */
	public $quotaInMinutes = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSmsAdapterProfile extends KalturaOTTObjectSupportNullable
{
	/**
	 * id
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * adapter url
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * Shared Secret
	 *
	 * @var string
	 */
	public $sharedSecret = null;

	/**
	 * SSO Adapter is active status
	 *
	 * @var int
	 */
	public $isActive = null;

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
class KalturaDynamicList extends KalturaOTTObjectSupportNullable
{
	/**
	 * ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Create date of the DynamicList
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Update date of the DynamicList
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

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
class KalturaUdidDynamicList extends KalturaDynamicList
{

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

	/**
	 * Dynamic data
	 *
	 * @var map
	 */
	public $dynamicData;


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
class KalturaHouseholdDevice extends KalturaOTTObjectSupportNullable
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

	/**
	 * external Id
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * mac address
	 *
	 * @var string
	 */
	public $macAddress = null;

	/**
	 * Dynamic data
	 *
	 * @var map
	 */
	public $dynamicData;

	/**
	 * model
	 *
	 * @var string
	 */
	public $model = null;

	/**
	 * manufacturer
	 *
	 * @var string
	 */
	public $manufacturer = null;

	/**
	 * manufacturer Id, read only
	 *
	 * @var int
	 * @readonly
	 */
	public $manufacturerId = null;

	/**
	 * Last Activity Time, read only
	 *
	 * @var int
	 * @readonly
	 */
	public $lastActivityTime = null;


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
class KalturaHouseholdCoupon extends KalturaOTTObjectSupportNullable
{
	/**
	 * Coupon code
	 *
	 * @var string
	 */
	public $code = null;

	/**
	 * Last Usage Date
	 *
	 * @var int
	 */
	public $lastUsageDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUnifiedChannel extends KalturaOTTObjectSupportNullable
{
	/**
	 * Channel&#160;identifier
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * Channel Type
	 *
	 * @var KalturaChannelType
	 */
	public $type = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryItem extends KalturaOTTObjectSupportNullable
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
	 * @readonly
	 */
	public $name = null;

	/**
	 * Category name
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * Category parent identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $parentId = null;

	/**
	 * Comma separated list of child categories&#39; Ids.
	 *
	 * @var string
	 */
	public $childrenIds = null;

	/**
	 * List of unified Channels.
	 *
	 * @var array of KalturaUnifiedChannel
	 */
	public $unifiedChannels;

	/**
	 * Dynamic data
	 *
	 * @var map
	 */
	public $dynamicData;

	/**
	 * Specifies when was the Category last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Category active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Start date in seconds
	 *
	 * @var int
	 */
	public $startDateInSeconds = null;

	/**
	 * End date in seconds
	 *
	 * @var int
	 */
	public $endDateInSeconds = null;

	/**
	 * Category type
	 *
	 * @var string
	 * @insertonly
	 */
	public $type = null;

	/**
	 * Unique identifier for the category version
	 *
	 * @var int
	 * @readonly
	 */
	public $versionId = null;

	/**
	 * Virtual asset id
	 *
	 * @var int
	 * @readonly
	 */
	public $virtualAssetId = null;

	/**
	 * Category reference identifier
	 *
	 * @var string
	 */
	public $referenceId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUnifiedChannelInfo extends KalturaUnifiedChannel
{
	/**
	 * Channel&#160;name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Start date in seconds
	 *
	 * @var int
	 */
	public $startDateInSeconds = null;

	/**
	 * End date in seconds
	 *
	 * @var int
	 */
	public $endDateInSeconds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryVersion extends KalturaOTTObjectSupportNullable
{
	/**
	 * Unique identifier for the category version
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Category version name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Category tree identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $treeId = null;

	/**
	 * The category version state
	 *
	 * @var KalturaCategoryVersionState
	 * @readonly
	 */
	public $state = null;

	/**
	 * The version id that this version was created from
	 *
	 * @var int
	 * @insertonly
	 */
	public $baseVersionId = null;

	/**
	 * The root of category item id that was created for this version
	 *
	 * @var int
	 * @readonly
	 */
	public $categoryRootId = null;

	/**
	 * The date that this version became default represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $defaultDate = null;

	/**
	 * Last updater user id.
	 *
	 * @var int
	 * @readonly
	 */
	public $updaterId = null;

	/**
	 * Comment.
	 *
	 * @var string
	 */
	public $comment = null;

	/**
	 * The date that this version was created represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * The date that this version was last updated represented as epoch.
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
abstract class KalturaRule extends KalturaOTTObjectSupportNullable
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

	/**
	 * Label
	 *
	 * @var string
	 */
	public $label = null;


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
abstract class KalturaAssetRuleAction extends KalturaRuleAction
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

	/**
	 * List of actions for the rule
	 *
	 * @var KalturaAssetRuleStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetConditionBase extends KalturaCondition
{

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
	 * List of conditions for the user rule
	 *
	 * @var array of KalturaAssetConditionBase
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
class KalturaAssetCondition extends KalturaAssetConditionBase
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
class KalturaAssetShopCondition extends KalturaAssetConditionBase
{
	/**
	 * Shop marker&#39;s value
	 *
	 * @var string
	 */
	public $value = null;

	/**
	 * Shop marker&#39;s values
	 *
	 * @var KalturaStringValueArray
	 */
	public $values;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaSubscriptionCondition extends KalturaCondition
{
	/**
	 * Comma separated subscription IDs list
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetSubscriptionCondition extends KalturaSubscriptionCondition
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSubscriptionCondition extends KalturaSubscriptionCondition
{

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
class KalturaChannelCondition extends KalturaCondition
{
	/**
	 * Comma separated channel IDs list
	 *
	 * @var string
	 */
	public $idIn = null;


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
class KalturaHeaderCondition extends KalturaNotCondition
{
	/**
	 * Header key
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * Header value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOrCondition extends KalturaNotCondition
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
class KalturaDeviceBrandCondition extends KalturaCondition
{
	/**
	 * Comma separated Device Brand IDs list
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceDynamicDataCondition extends KalturaCondition
{
	/**
	 * key
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceFamilyCondition extends KalturaCondition
{
	/**
	 * Comma separated Device Family IDs list
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceManufacturerCondition extends KalturaCondition
{
	/**
	 * Comma separated Device Manufacturer IDs list
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceModelCondition extends KalturaCondition
{
	/**
	 * regex of device model that is compared to
	 *
	 * @var string
	 */
	public $regexEqual = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDynamicKeysCondition extends KalturaCondition
{
	/**
	 * key
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * comma-separated values
	 *
	 * @var string
	 */
	public $values = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFileTypeCondition extends KalturaCondition
{
	/**
	 * Comma separated filetype IDs list
	 *
	 * @var string
	 */
	public $idIn = null;


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
class KalturaIpV6RangeCondition extends KalturaCondition
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
class KalturaUdidDynamicListCondition extends KalturaCondition
{
	/**
	 * KalturaUdidDynamicList.id
	 *
	 * @var int
	 */
	public $id = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleCondition extends KalturaCondition
{
	/**
	 * Comma separated user role IDs list
	 *
	 * @var string
	 */
	public $idIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSessionProfileCondition extends KalturaCondition
{
	/**
	 * UserSessionProfile id
	 *
	 * @var int
	 */
	public $id = null;


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
class KalturaAllowPlaybackAction extends KalturaAssetRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApplyPlaybackAdapterAction extends KalturaAssetRuleAction
{
	/**
	 * Playback Adapter Identifier
	 *
	 * @var int
	 */
	public $adapterId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaAssetLifeCycleTransitionAction extends KalturaAssetRuleAction
{
	/**
	 * Asset LifeCycle Rule Action Type
	 *
	 * @var KalturaAssetLifeCycleRuleActionType
	 */
	public $assetLifeCycleRuleActionType = null;

	/**
	 * Asset LifeCycle Rule Transition Type
	 *
	 * @var KalturaAssetLifeCycleRuleTransitionType
	 * @readonly
	 */
	public $assetLifeCycleRuleTransitionType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetLifeCycleBuisnessModuleTransitionAction extends KalturaAssetLifeCycleTransitionAction
{
	/**
	 * Comma separated list of fileType Ids.
	 *
	 * @var string
	 */
	public $fileTypeIds = null;

	/**
	 * Comma separated list of ppv Ids.
	 *
	 * @var string
	 */
	public $ppvIds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetLifeCycleTagTransitionAction extends KalturaAssetLifeCycleTransitionAction
{
	/**
	 * Comma separated list of tag Ids.
	 *
	 * @var string
	 */
	public $tagIds = null;


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
abstract class KalturaBasePreActionCondition extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterAction extends KalturaAssetRuleAction
{
	/**
	 * PreAction condition
	 *
	 * @var KalturaBasePreActionCondition
	 */
	public $preActionCondition;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByAudioCodecAction extends KalturaFilterAction
{
	/**
	 * List of comma separated audioCodecs
	 *
	 * @var string
	 */
	public $audioCodecIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByAudioCodecInDiscoveryAction extends KalturaFilterFileByAudioCodecAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByAudioCodecInPlaybackAction extends KalturaFilterFileByAudioCodecAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByDynamicDataAction extends KalturaFilterAction
{
	/**
	 * Key to be searched
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * Comma separated values to be searched
	 *
	 * @var string
	 */
	public $values = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByDynamicDataInDiscoveryAction extends KalturaFilterFileByDynamicDataAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByDynamicDataInPlaybackAction extends KalturaFilterFileByDynamicDataAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByFileTypeIdAction extends KalturaFilterAction
{
	/**
	 * List of comma separated fileTypesIds
	 *
	 * @var string
	 */
	public $fileTypeIdIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByFileTypeIdForAssetTypeAction extends KalturaFilterFileByFileTypeIdAction
{
	/**
	 * List of comma separated assetTypes
	 *
	 * @var string
	 */
	public $assetTypeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByFileTypeIdForAssetTypeInDiscoveryAction extends KalturaFilterFileByFileTypeIdForAssetTypeAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByFileTypeIdForAssetTypeInPlaybackAction extends KalturaFilterFileByFileTypeIdForAssetTypeAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByFileTypeIdInDiscoveryAction extends KalturaFilterFileByFileTypeIdAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByFileTypeIdInPlaybackAction extends KalturaFilterFileByFileTypeIdAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByLabelAction extends KalturaFilterAction
{
	/**
	 * List of comma separated labels
	 *
	 * @var string
	 */
	public $labelIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByLabelInDiscoveryAction extends KalturaFilterFileByLabelAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByLabelInPlaybackAction extends KalturaFilterFileByLabelAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByQualityAction extends KalturaFilterAction
{
	/**
	 * List of comma separated qualities
	 *
	 * @var string
	 */
	public $qualityIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByQualityInDiscoveryAction extends KalturaFilterFileByQualityAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByQualityInPlaybackAction extends KalturaFilterFileByQualityAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByStreamerTypeAction extends KalturaFilterAction
{
	/**
	 * List of comma separated streamerTypes
	 *
	 * @var string
	 */
	public $streamerTypeIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByStreamerTypeInDiscovery extends KalturaFilterFileByStreamerTypeAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByStreamerTypeInPlayback extends KalturaFilterFileByStreamerTypeAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaFilterFileByVideoCodecAction extends KalturaFilterAction
{
	/**
	 * List of comma separated videoCodecs
	 *
	 * @var string
	 */
	public $videoCodecIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByVideoCodecInDiscoveryAction extends KalturaFilterFileByVideoCodecAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterFileByVideoCodecInPlayback extends KalturaFilterFileByVideoCodecAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilterAssetByKsqlAction extends KalturaFilterAction
{
	/**
	 * ksql to filter assets by
	 *
	 * @var string
	 */
	public $ksql = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNoShopPreActionCondition extends KalturaBasePreActionCondition
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaShopPreActionCondition extends KalturaBasePreActionCondition
{
	/**
	 * Asset user rule ID with shop condition
	 *
	 * @var int
	 */
	public $shopAssetUserRuleId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBusinessModuleRuleAction extends KalturaRuleAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApplyDiscountModuleAction extends KalturaBusinessModuleRuleAction
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
class KalturaApplyFreePlaybackAction extends KalturaBusinessModuleRuleAction
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
class KalturaAssetUserRuleFilterAction extends KalturaAssetUserRuleAction
{
	/**
	 * Indicates whether to apply on channel
	 *
	 * @var bool
	 */
	public $applyOnChannel = null;


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
	 * @var array of KalturaBusinessModuleRuleAction
	 */
	public $actions;

	/**
	 * Create date of the rule
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Update date of the rule
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
abstract class KalturaTvmRule extends KalturaRule
{
	/**
	 * Specifies when was the tvm rule was created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Specifies the tvm rule type.
	 *
	 * @var KalturaTvmRuleType
	 * @readonly
	 */
	public $ruleType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTvmDeviceRule extends KalturaTvmRule
{
	/**
	 * Comma separated list of country Ids.
	 *
	 * @var string
	 */
	public $deviceBrandIds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTvmGeoRule extends KalturaTvmRule
{
	/**
	 * Indicates if the rule is relevent ONLY for the country ids or except country ids here. - is that true?
	 *
	 * @var bool
	 */
	public $onlyOrBut = null;

	/**
	 * Comma separated list of country Ids.
	 *
	 * @var string
	 */
	public $countryIds = null;

	/**
	 * proxyRuleId - what is that?
	 *
	 * @var int
	 */
	public $proxyRuleId = null;

	/**
	 * proxyRuleName - what is that?
	 *
	 * @var string
	 */
	public $proxyRuleName = null;

	/**
	 * proxyLevelId - what is that?
	 *
	 * @var int
	 */
	public $proxyLevelId = null;

	/**
	 * proxyLevelName - what is that?
	 *
	 * @var string
	 */
	public $proxyLevelName = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBasePromotion extends KalturaObjectBase
{
	/**
	 * These conditions define the Promotion that applies on
	 *
	 * @var array of KalturaCondition
	 */
	public $conditions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCampaign extends KalturaOTTObjectSupportNullable
{
	/**
	 * ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Create date of the rule
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Update date of the rule
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Start date of the rule
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * End date of the rule
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * Name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * systemName
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * state
	 *
	 * @var KalturaObjectState
	 * @readonly
	 */
	public $state = null;

	/**
	 * The Promotion that is promoted to the user
	 *
	 * @var KalturaBasePromotion
	 */
	public $promotion;

	/**
	 * Free text message to the user that gives information about the campaign.
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Comma separated collection IDs list
	 *
	 * @var string
	 */
	public $collectionIdIn = null;

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 */
	public $assetUserRuleId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBatchCampaign extends KalturaCampaign
{
	/**
	 * These conditions define the population that apply one the campaign
	 *
	 * @var array of KalturaCondition
	 */
	public $populationConditions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTriggerCampaign extends KalturaCampaign
{
	/**
	 * service
	 *
	 * @var KalturaApiService
	 */
	public $service = null;

	/**
	 * action
	 *
	 * @var KalturaApiAction
	 */
	public $action = null;

	/**
	 * List of conditions for the trigger (conditions on the object)
	 *
	 * @var array of KalturaCondition
	 */
	public $triggerConditions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponPromotion extends KalturaBasePromotion
{
	/**
	 * CouponGroup identifier
	 *
	 * @var int
	 */
	public $couponGroupId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPromotion extends KalturaBasePromotion
{
	/**
	 * The discount module id that is promoted to the user
	 *
	 * @var int
	 */
	public $discountModuleId = null;

	/**
	 * the numer of recurring for this promotion
	 *
	 * @var int
	 */
	public $numberOfRecurring = null;

	/**
	 * The number of times a household can use the discount module in this campaign.
	 *             If omitted than no limitation is enforced on the number of usages.
	 *
	 * @var int
	 */
	public $maxDiscountUsages = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEventNotification extends KalturaOTTObjectSupportNullable
{
	/**
	 * Identifier
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * Object identifier
	 *
	 * @var int
	 */
	public $objectId = null;

	/**
	 * Event object type
	 *
	 * @var string
	 */
	public $eventObjectType = null;

	/**
	 * Message
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Status
	 *
	 * @var KalturaEventNotificationStatus
	 */
	public $status = null;

	/**
	 * Action type
	 *
	 * @var string
	 */
	public $actionType = null;

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
class KalturaIot extends KalturaOTTObjectSupportNullable
{
	/**
	 * id
	 *
	 * @var string
	 */
	public $udid = null;

	/**
	 * accessKey
	 *
	 * @var string
	 */
	public $accessKey = null;

	/**
	 * accessSecretKey
	 *
	 * @var string
	 */
	public $accessSecretKey = null;

	/**
	 * Username
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * UserPassword
	 *
	 * @var string
	 */
	public $userPassword = null;

	/**
	 * IdentityId
	 *
	 * @var string
	 */
	public $identityId = null;

	/**
	 * ThingArn
	 *
	 * @var string
	 */
	public $thingArn = null;

	/**
	 * ThingId
	 *
	 * @var string
	 */
	public $thingId = null;

	/**
	 * Principal
	 *
	 * @var string
	 */
	public $principal = null;

	/**
	 * EndPoint
	 *
	 * @var string
	 */
	public $endPoint = null;

	/**
	 * ExtendedEndPoint
	 *
	 * @var string
	 */
	public $extendedEndPoint = null;

	/**
	 * IdentityPoolId
	 *
	 * @var string
	 */
	public $identityPoolId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIotProfileAws extends KalturaOTTObjectSupportNullable
{
	/**
	 * iotEndPoint
	 *
	 * @var string
	 */
	public $iotEndPoint = null;

	/**
	 * accessKeyId
	 *
	 * @var string
	 */
	public $accessKeyId = null;

	/**
	 * secretAccessKey
	 *
	 * @var string
	 */
	public $secretAccessKey = null;

	/**
	 * userPoolId
	 *
	 * @var string
	 */
	public $userPoolId = null;

	/**
	 * clientId
	 *
	 * @var string
	 */
	public $clientId = null;

	/**
	 * identityPoolId
	 *
	 * @var string
	 */
	public $identityPoolId = null;

	/**
	 * region
	 *
	 * @var string
	 */
	public $region = null;

	/**
	 * updateDate
	 *
	 * @var int
	 */
	public $updateDate = null;


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
class KalturaBusinessModuleDetails extends KalturaObjectBase
{
	/**
	 * BusinessModuleId
	 *
	 * @var int
	 */
	public $businessModuleId = null;

	/**
	 * BusinessModuleType
	 *
	 * @var KalturaTransactionType
	 */
	public $businessModuleType = null;


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
	 * URL of the media file to be played
	 *
	 * @var string
	 */
	public $altUrl = null;

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

	/**
	 * Catalog end date
	 *
	 * @var int
	 */
	public $catalogEndDate = null;

	/**
	 * OPL
	 *
	 * @var string
	 */
	public $opl = null;

	/**
	 * businessModuleDetails
	 *
	 * @var KalturaBusinessModuleDetails
	 */
	public $businessModuleDetails;

	/**
	 * Labels associated with the media file
	 *
	 * @var string
	 */
	public $labels = null;

	/**
	 * List of KalturaMediaFile&#39;s dynamic data keys
	 *
	 * @var map
	 */
	public $dynamicData;


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

	/**
	 * Is Tokenized
	 *
	 * @var bool
	 */
	public $isTokenized = null;

	/**
	 * Business Module Id
	 *
	 * @var int
	 * @readonly
	 */
	public $businessModuleId = null;

	/**
	 * Business Module Type
	 *
	 * @var KalturaTransactionType
	 * @readonly
	 */
	public $businessModuleType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscoveryMediaFile extends KalturaMediaFile
{
	/**
	 * show, if file could be played
	 *
	 * @var bool
	 */
	public $isPlaybackable = null;


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
class KalturaPartner extends KalturaObjectBase
{
	/**
	 * PartnerId
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * PartnerName
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Creat date represented as epoch
	 *
	 * @var int
	 */
	public $createDate = null;

	/**
	 * Update date represented as epoch
	 *
	 * @var int
	 */
	public $updateDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerListResponse extends KalturaListResponse
{
	/**
	 * A list of Partners
	 *
	 * @var array of KalturaPartner
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPasswordPolicyListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaPasswordPolicy
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

	/**
	 * Adapter GRPC Address, without protocol, i.e: &#39;adapter-hostname:9090&#39;
	 *
	 * @var string
	 */
	public $adapterGrpcAddress = null;


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
abstract class KalturaUserSessionProfileExpression extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSessionProfile extends KalturaObjectBase
{
	/**
	 * The user session profile id.
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * The user session profile name for presentation.
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * expression
	 *
	 * @var KalturaUserSessionProfileExpression
	 */
	public $expression;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSessionProfileListResponse extends KalturaListResponse
{
	/**
	 * A list of KalturaUserSessionProfile
	 *
	 * @var array of KalturaUserSessionProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExpressionAnd extends KalturaUserSessionProfileExpression
{
	/**
	 * expressions with and relation between them
	 *
	 * @var array of KalturaUserSessionProfileExpression
	 */
	public $expressions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExpressionNot extends KalturaUserSessionProfileExpression
{
	/**
	 * expression
	 *
	 * @var KalturaUserSessionProfileExpression
	 */
	public $expression;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExpressionOr extends KalturaUserSessionProfileExpression
{
	/**
	 * expressions with or relation between them
	 *
	 * @var array of KalturaUserSessionProfileExpression
	 */
	public $expressions;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSessionCondition extends KalturaUserSessionProfileExpression
{
	/**
	 * expression
	 *
	 * @var KalturaCondition
	 */
	public $condition;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMessage extends KalturaObjectBase
{
	/**
	 * Massage code
	 *
	 * @var int
	 */
	public $code = null;

	/**
	 * Message details
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Message args
	 *
	 * @var map
	 */
	public $args;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBulkUploadResult extends KalturaObjectBase
{
	/**
	 * the result ObjectId (assetId, userId etc)
	 *
	 * @var int
	 * @readonly
	 */
	public $objectId = null;

	/**
	 * result index
	 *
	 * @var int
	 * @readonly
	 */
	public $index = null;

	/**
	 * Bulk upload identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $bulkUploadId = null;

	/**
	 * status
	 *
	 * @var KalturaBulkUploadResultStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * A list of errors
	 *
	 * @var array of KalturaMessage
	 * @readonly
	 */
	public $errors;

	/**
	 * A list of warnings
	 *
	 * @var array of KalturaMessage
	 * @readonly
	 */
	public $warnings;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUpload extends KalturaObjectBase
{
	/**
	 * Bulk identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * File Name
	 *
	 * @var string
	 * @readonly
	 */
	public $fileName = null;

	/**
	 * Status
	 *
	 * @var KalturaBulkUploadJobStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Action
	 *
	 * @var KalturaBulkUploadJobAction
	 * @readonly
	 */
	public $action = null;

	/**
	 * Total number of objects in file
	 *
	 * @var int
	 * @readonly
	 */
	public $numOfObjects = null;

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

	/**
	 * The user who uploaded this bulk
	 *
	 * @var int
	 * @readonly
	 */
	public $uploadedByUserId = null;

	/**
	 * A list of results
	 *
	 * @var array of KalturaBulkUploadResult
	 * @readonly
	 */
	public $results;

	/**
	 * A list of errors
	 *
	 * @var array of KalturaMessage
	 * @readonly
	 */
	public $errors;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadListResponse extends KalturaListResponse
{
	/**
	 * bulk upload items
	 *
	 * @var array of KalturaBulkUpload
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBulkUploadAssetResult extends KalturaBulkUploadResult
{
	/**
	 * Identifies the asset type (EPG, Recording, Movie, TV Series, etc). 
	 *             Possible values: 0 – EPG linear programs, 1 - Recording; or any asset type ID according to the asset types IDs defined in the system.
	 *
	 * @var int
	 * @readonly
	 */
	public $type = null;

	/**
	 * External identifier for the asset
	 *
	 * @var string
	 * @readonly
	 */
	public $externalId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadMediaAssetResult extends KalturaBulkUploadAssetResult
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadLiveAssetResult extends KalturaBulkUploadMediaAssetResult
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBulkUploadDynamicListResult extends KalturaBulkUploadResult
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadUdidDynamicListResult extends KalturaBulkUploadDynamicListResult
{
	/**
	 * The udid from the excel to add to DynamicLis values
	 *
	 * @var string
	 * @readonly
	 */
	public $udid = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadProgramAssetResult extends KalturaBulkUploadResult
{
	/**
	 * The programID that was created
	 *
	 * @var int
	 * @readonly
	 */
	public $programId = null;

	/**
	 * The external program Id as was sent in the bulk xml file
	 *
	 * @var string
	 * @readonly
	 */
	public $programExternalId = null;

	/**
	 * The  live asset Id that was identified according liveAssetExternalId that was sent in bulk xml file
	 *
	 * @var int
	 * @readonly
	 */
	public $liveAssetId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubtitles extends KalturaObjectBase
{
	/**
	 * Unique identifier for the subtitles file.
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Specifies when the file was uploaded, expressed in Epoch timestamp.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Name of the uploaded subtitles text file.
	 *
	 * @var string
	 */
	public $fileName = null;

	/**
	 * The content type included in the subtitles file, as auto-detected by the subtitles service. Can be of SRT, WebVTT or free text without cues.
	 *
	 * @var KalturaSubtitlesType
	 */
	public $detectedType = null;

	/**
	 * The language used for the subtitles.
	 *
	 * @var string
	 */
	public $language = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubtitlesListResponse extends KalturaListResponse
{
	/**
	 * A list of subtitles files
	 *
	 * @var array of KalturaSubtitles
	 */
	public $objects;


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
class KalturaTwitterTwit extends KalturaSocialNetworkComment
{

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
class KalturaHouseholdSegmentListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaHouseholdSegment
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
class KalturaBaseSegmentAction extends KalturaObjectBase
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
	 * Boolean operator between segmentation type&#39;s conditions - defaults to &quot;And&quot;
	 *
	 * @var KalturaBooleanOperator
	 */
	public $conditionsOperator = null;

	/**
	 * Segmentation conditions - can be empty
	 *
	 * @var array of KalturaBaseSegmentAction
	 */
	public $actions;

	/**
	 * Segmentation values - can be empty (so only one segment will be created)
	 *
	 * @var KalturaBaseSegmentValue
	 */
	public $value;

	/**
	 * Create date of segmentation type
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Update date of segmentation type
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Last date of execution of segmentation type
	 *
	 * @var int
	 * @readonly
	 */
	public $executeDate = null;

	/**
	 * Segmentation type version
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

	/**
	 * Asset User Rule Id
	 *
	 * @var int
	 * @insertonly
	 */
	public $assetUserRuleId = null;


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
	 *             list of values to be considered together
	 *
	 * @var array of KalturaStringValue
	 */
	public $values;

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
class KalturaMonetizationCondition extends KalturaBaseSegmentCondition
{
	/**
	 * How many days back should the actions be considered
	 *
	 * @var int
	 */
	public $days = null;

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

	/**
	 * Comma saperated list of business module IDs
	 *
	 * @var string
	 */
	public $businessModuleIdIn = null;

	/**
	 * Which currency code should be taken into consideration
	 *
	 * @var string
	 */
	public $currencyCode = null;

	/**
	 * The minimum value to be met
	 *
	 * @var int
	 */
	public $minValue = null;

	/**
	 * The maximum value to be met
	 *
	 * @var int
	 */
	public $maxValue = null;


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
class KalturaAssetOrderSegmentAction extends KalturaBaseSegmentAction
{
	/**
	 * Action name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Action values
	 *
	 * @var array of KalturaStringValue
	 */
	public $values;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaKsqlSegmentAction extends KalturaBaseSegmentAction
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
abstract class KalturaBlockSubscriptionSegmentAction extends KalturaKsqlSegmentAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaSegmentAssetFilterAction extends KalturaKsqlSegmentAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentAssetFilterSegmentAction extends KalturaSegmentAssetFilterAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentAssetFilterSubscriptionAction extends KalturaSegmentAssetFilterAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentBlockCancelSubscriptionAction extends KalturaBlockSubscriptionSegmentAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentBlockPlaybackSubscriptionAction extends KalturaBlockSubscriptionSegmentAction
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentBlockPurchaseSubscriptionAction extends KalturaBlockSubscriptionSegmentAction
{

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

	/**
	 * Days to consider when checking the users&#39; purchaes
	 *
	 * @var int
	 */
	public $days = null;


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
class KalturaSingleSegmentValue extends KalturaBaseSegmentValue
{
	/**
	 * Id of segment
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * The amount of users that are being affected by this Segmentation type
	 *
	 * @var int
	 * @readonly
	 */
	public $affectedUsers = null;

	/**
	 * The amount of households that are being affected by this Segmentation type
	 *
	 * @var int
	 * @readonly
	 */
	public $affectedHouseholds = null;


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
class KalturaWatchBasedRecommendationsProfile extends KalturaObjectBase
{
	/**
	 * Unique identifier for the profile
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Friendly name for the profile
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * List of comma seperated topic ids considered for recommendations calculation.
	 *
	 * @var string
	 */
	public $topicIds = null;

	/**
	 * List of comma seperated type ids considered for recommendations calculation.
	 *
	 * @var string
	 */
	public $analysisMediaTypeIds = null;

	/**
	 * The minimum coverage in percentages that media is considered viewed.
	 *
	 * @var int
	 */
	public $userInterestPlayThresholdInPercentages = null;

	/**
	 * The number of interests that will be selected per user.
	 *
	 * @var int
	 */
	public $numberOfInterests = null;

	/**
	 * Reference to partner default recommendations (first 30 assets that are included in the referred KalturaChannel).
	 *
	 * @var int
	 */
	public $fallbackChannelId = null;

	/**
	 * Minimum number of media assets that user shall watch to trigger user interests calculation.
	 *
	 * @var int
	 */
	public $minPlaybacks = null;

	/**
	 * Maximum number of assets that watched by a user and will be considered for recommendations calculation (the last maxPlaybacks shall be used in the analysis).
	 *
	 * @var int
	 */
	public $maxPlaybacks = null;

	/**
	 * A kSql is used to filter the “user interests“ recommendations. Only asset properties, metas, or tags are allowed ti be included in this ksql.
	 *
	 * @var string
	 */
	public $allowedRecommendationsKsql = null;

	/**
	 * The number of days the user interests are considered to be up-to-date.
	 *
	 * @var int
	 */
	public $playbackInterestsCalculationPeriodDays = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWatchBasedRecommendationsProfileListResponse extends KalturaListResponse
{
	/**
	 * Assets
	 *
	 * @var array of KalturaWatchBasedRecommendationsProfile
	 */
	public $objects;


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

	/**
	 * Coupon code
	 *
	 * @var string
	 * @readonly
	 */
	public $couponCode = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponListResponse extends KalturaListResponse
{
	/**
	 * A list of Coupons
	 *
	 * @var array of KalturaCoupon
	 */
	public $objects;


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

	/**
	 * End date represented as epoch
	 *
	 * @var int
	 */
	public $whenAlgoTimes = null;

	/**
	 * End date represented as epoch
	 *
	 * @var int
	 */
	public $whenAlgoType = null;

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 * @insertonly
	 */
	public $assetUserRuleId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountDetailsListResponse extends KalturaListResponse
{
	/**
	 * A list of discount details
	 *
	 * @var array of KalturaDiscountDetails
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPromotionInfo extends KalturaObjectBase
{
	/**
	 * Campaign Id
	 *
	 * @var int
	 */
	public $campaignId = null;


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
	 * The full price of the item (with no discounts)
	 *
	 * @var KalturaPrice
	 */
	public $fullPrice;

	/**
	 * Product purchase status
	 *
	 * @var KalturaPurchaseStatus
	 */
	public $purchaseStatus = null;

	/**
	 * Promotion Info
	 *
	 * @var KalturaPromotionInfo
	 */
	public $promotionInfo;


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
class KalturaProgramAssetGroupOfferPrice extends KalturaProductPrice
{

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
	 * This property will deprecated soon. Please use PriceId instead of it.
	 *
	 * @var KalturaPriceDetails
	 * @readonly
	 */
	public $price;

	/**
	 * The price if of the ppv
	 *
	 * @var int
	 */
	public $priceDetailsId = null;

	/**
	 * This property will deprecated soon. Please use fileTypesIds instead of it.
	 *
	 * @var array of KalturaIntegerValue
	 * @readonly
	 */
	public $fileTypes;

	/**
	 * Comma separated file types identifiers that are supported in this subscription
	 *
	 * @var string
	 */
	public $fileTypesIds = null;

	/**
	 * This property will deprecated soon. Please use DiscountId instead of it.
	 *
	 * @var KalturaDiscountModule
	 * @readonly
	 */
	public $discountModule;

	/**
	 * The discount id for the ppv
	 *
	 * @var int
	 */
	public $discountId = null;

	/**
	 * This property will deprecated soon. Please use CouponsGroupId instead of it.
	 *
	 * @var KalturaCouponsGroup
	 * @readonly
	 */
	public $couponsGroup;

	/**
	 * Coupons group id for the ppv
	 *
	 * @var int
	 */
	public $couponsGroupId = null;

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
	 * This property will deprecated soon. Please use UsageModuleId instead of it.
	 *
	 * @var KalturaUsageModule
	 * @readonly
	 */
	public $usageModule;

	/**
	 * PPV usage module Id
	 *
	 * @var int
	 */
	public $usageModuleId = null;

	/**
	 * adsPolicy
	 *
	 * @var KalturaAdsPolicy
	 */
	public $adsPolicy = null;

	/**
	 * Is active ppv
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Specifies when was the ppv last updated. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * Specifies when was the ppv created. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Virtual asset id
	 *
	 * @var int
	 * @readonly
	 */
	public $virtualAssetId = null;

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 * @insertonly
	 */
	public $assetUserRuleId = null;


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
class KalturaPreviewModuleListResponse extends KalturaListResponse
{
	/**
	 * A list of Preview Module
	 *
	 * @var array of KalturaPreviewModule
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
class KalturaProgramAssetGroupOfferListResponse extends KalturaListResponse
{
	/**
	 * A list of collections
	 *
	 * @var array of KalturaProgramAssetGroupOffer
	 */
	public $objects;


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
class KalturaUsageModuleListResponse extends KalturaListResponse
{
	/**
	 * A list of usage modules
	 *
	 * @var array of KalturaUsageModule
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
class KalturaBasePartnerConfiguration extends KalturaPartnerConfiguration
{
	/**
	 * KSExpirationSeconds
	 *
	 * @var int
	 */
	public $ksExpirationSeconds = null;

	/**
	 * AppTokenSessionMaxDurationSeconds
	 *
	 * @var int
	 */
	public $appTokenSessionMaxDurationSeconds = null;

	/**
	 * AnonymousKSExpirationSeconds
	 *
	 * @var int
	 */
	public $anonymousKSExpirationSeconds = null;

	/**
	 * RefreshExpirationForPinLoginSeconds
	 *
	 * @var int
	 */
	public $refreshExpirationForPinLoginSeconds = null;

	/**
	 * AppTokenMaxExpirySeconds
	 *
	 * @var int
	 */
	public $appTokenMaxExpirySeconds = null;

	/**
	 * AutoRefreshAppToken
	 *
	 * @var bool
	 */
	public $autoRefreshAppToken = null;

	/**
	 * uploadTokenExpirySeconds
	 *
	 * @var int
	 */
	public $uploadTokenExpirySeconds = null;

	/**
	 * apptokenUserValidationDisabled
	 *
	 * @var bool
	 */
	public $apptokenUserValidationDisabled = null;

	/**
	 * epgFeatureVersion
	 *             defines the epg feature version from version 1 to version 3
	 *             if not provided v2 will be used
	 *
	 * @var int
	 */
	public $epgFeatureVersion = null;


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
class KalturaCategoryManagement extends KalturaObjectBase
{
	/**
	 * Default CategoryVersion tree id
	 *
	 * @var int
	 */
	public $defaultTreeId = null;

	/**
	 * Device family to Category TreeId mapping
	 *
	 * @var map
	 */
	public $deviceFamilyToCategoryTree;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCatalogPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * Single multilingual mode
	 *
	 * @var bool
	 */
	public $singleMultilingualMode = null;

	/**
	 * Category management
	 *
	 * @var KalturaCategoryManagement
	 */
	public $categoryManagement;

	/**
	 * EPG Multilingual Fallback Support
	 *
	 * @var bool
	 */
	public $epgMultilingualFallbackSupport = null;

	/**
	 * Upload Export Datalake
	 *
	 * @var bool
	 */
	public $uploadExportDatalake = null;

	/**
	 * Shop Marker&#39;s identifier
	 *
	 * @var int
	 */
	public $shopMarkerMetaId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCloudUploadSettingsConfiguration extends KalturaPartnerConfiguration
{
	/**
	 * Comma seperated list of file extensions that allowed to all partners
	 *
	 * @var string
	 * @readonly
	 */
	public $defaultAllowedFileExtensions = null;

	/**
	 * Comma seperated list of file extensions that allowed to partner in question
	 *             {&quot;jpeg&quot;, &quot;image/jpeg&quot; },
	 *             {&quot;jpg&quot;,&quot;image/jpeg&quot;},
	 *             {&quot;jpg&quot;,&quot;image/png&quot;},
	 *             { &quot;tif&quot;,&quot;image/tiff&quot;},
	 *             { &quot;tiff&quot;, &quot;image/tiff&quot;},
	 *             {&quot;gif&quot;,  &quot;image/gif&quot;},
	 *             {&quot;xls&quot;,  &quot;application/vnd.ms-excel&quot;},
	 *             {&quot;xlsx&quot;,&quot;application/vnd.openxmlformats-officedocument.spreadsheetml.sheet&quot; },
	 *             {&quot;csv&quot;,&quot;text/csv&quot;},
	 *             {&quot;xml&quot;,&quot;text/xml&quot;},
	 *             {&quot;txt&quot;,&quot;text/plain&quot;},
	 *             {&quot;doc&quot;,&quot;application/msword&quot;},
	 *             {&quot;docx&quot;,&quot;application/vnd.openxmlformats-officedocument.wordprocessingml.document&quot;},
	 *             {&quot;bmp&quot;,&quot;image/bmp&quot;},
	 *             {&quot;ico&quot;,&quot;image/x-icon&quot;},
	 *             {&quot;mp3&quot;,&quot;audio/mpeg&quot;},
	 *             {&quot;pdf&quot;,&quot;application/pdf&quot;}}
	 *
	 * @var string
	 */
	public $customAllowedFileExtensions = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkEventThreshold extends KalturaObjectBase
{
	/**
	 * bookmark transaction type
	 *
	 * @var KalturaTransactionType
	 */
	public $transactionType = null;

	/**
	 * event threshold in seconds
	 *
	 * @var int
	 */
	public $threshold = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCommercePartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * configuration for bookmark event threshold (when to dispatch the event) in seconds.
	 *
	 * @var array of KalturaBookmarkEventThreshold
	 */
	public $bookmarkEventThresholds;

	/**
	 * configuration for keep add-ons after subscription deletion
	 *
	 * @var bool
	 */
	public $keepSubscriptionAddOns = null;

	/**
	 * configuration for asset start entitlement padding e.g. asset start time - padding still relevant for asset
	 *
	 * @var int
	 */
	public $programAssetEntitlementPaddingStart = null;

	/**
	 * configuration for asset end entitlement padding e.g. asset end time + padding still relevant for asset
	 *
	 * @var int
	 */
	public $programAssetEntitlementPaddingEnd = null;


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

	/**
	 * Concurrency threshold in seconds
	 *
	 * @var int
	 */
	public $concurrencyThresholdInSeconds = null;

	/**
	 * Revoke on device delete
	 *
	 * @var bool
	 */
	public $revokeOnDeviceDelete = null;

	/**
	 * If set to true then for all concurrency checks in all APIs, system shall exclude free content from counting towards the use of a concurrency slot
	 *
	 * @var bool
	 */
	public $excludeFreeContentFromConcurrency = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCustomFieldsPartnerConfiguration extends KalturaPartnerConfiguration
{
	/**
	 * Array of clientTag values
	 *
	 * @var string
	 */
	public $metaSystemNameInsteadOfAliasList = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDefaultParentalSettingsPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * defaultTvSeriesParentalRuleId
	 *
	 * @var int
	 */
	public $defaultMoviesParentalRuleId = null;

	/**
	 * defaultTvSeriesParentalRuleId
	 *
	 * @var int
	 */
	public $defaultTvSeriesParentalRuleId = null;

	/**
	 * defaultParentalPin
	 *
	 * @var string
	 */
	public $defaultParentalPin = null;

	/**
	 * defaultPurchasePin
	 *
	 * @var string
	 */
	public $defaultPurchasePin = null;

	/**
	 * defaultPurchaseSettings
	 *
	 * @var int
	 */
	public $defaultPurchaseSettings = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRollingDeviceRemovalData extends KalturaObjectBase
{
	/**
	 * Rolling Device Policy
	 *
	 * @var KalturaRollingDevicePolicy
	 */
	public $rollingDeviceRemovalPolicy = null;

	/**
	 * Rolling Device Policy in a CSV style
	 *
	 * @var string
	 */
	public $rollingDeviceRemovalFamilyIds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGeneralPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * Partner name
	 *
	 * @var string
	 */
	public $partnerName = null;

	/**
	 * Main metadata language
	 *
	 * @var int
	 */
	public $mainLanguage = null;

	/**
	 * A list of comma separated languages ids.
	 *
	 * @var string
	 */
	public $secondaryLanguages = null;

	/**
	 * Delete media policy
	 *
	 * @var KalturaDeleteMediaPolicy
	 */
	public $deleteMediaPolicy = null;

	/**
	 * Main currency
	 *
	 * @var int
	 */
	public $mainCurrency = null;

	/**
	 * A list of comma separated currency ids.
	 *
	 * @var string
	 */
	public $secondaryCurrencies = null;

	/**
	 * Downgrade policy
	 *
	 * @var KalturaDowngradePolicy
	 */
	public $downgradePolicy = null;

	/**
	 * Priority Family Ids to remove devices on downgrade (first in the list first to remove)
	 *
	 * @var string
	 */
	public $downgradePriorityFamilyIds = null;

	/**
	 * Mail settings
	 *
	 * @var string
	 */
	public $mailSettings = null;

	/**
	 * Default Date Format for Email notifications (default should be: DD Month YYYY)
	 *
	 * @var string
	 */
	public $dateFormat = null;

	/**
	 * Household limitation module
	 *
	 * @var int
	 */
	public $householdLimitationModule = null;

	/**
	 * Enable Region Filtering
	 *
	 * @var bool
	 */
	public $enableRegionFiltering = null;

	/**
	 * Default Region
	 *
	 * @var int
	 */
	public $defaultRegion = null;

	/**
	 * Rolling Device Policy
	 *
	 * @var KalturaRollingDeviceRemovalData
	 */
	public $rollingDeviceData;

	/**
	 * minimum bookmark position of a linear channel to be included in a watch history
	 *
	 * @var int
	 */
	public $linearWatchHistoryThreshold = null;

	/**
	 * Finished PercentThreshold
	 *
	 * @var int
	 */
	public $finishedPercentThreshold = null;

	/**
	 * Suspension Profile Inheritance
	 *
	 * @var KalturaSuspensionProfileInheritanceType
	 */
	public $suspensionProfileInheritanceType = null;

	/**
	 * Allow Device Mobility
	 *
	 * @var bool
	 */
	public $allowDeviceMobility = null;

	/**
	 * Enable multi LCNs per linear channel
	 *
	 * @var bool
	 */
	public $enableMultiLcns = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaObjectVirtualAssetInfo extends KalturaObjectBase
{
	/**
	 * Asset struct identifier
	 *
	 * @var int
	 */
	public $assetStructId = null;

	/**
	 * Meta identifier
	 *
	 * @var int
	 */
	public $metaId = null;

	/**
	 * Object virtual asset info type
	 *
	 * @var KalturaObjectVirtualAssetInfoType
	 */
	public $type = null;

	/**
	 * Extended types mapping
	 *
	 * @var map
	 */
	public $extendedTypes;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaObjectVirtualAssetPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * List of object virtual asset info
	 *
	 * @var array of KalturaObjectVirtualAssetInfo
	 */
	public $objectVirtualAssets;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaResetPasswordPartnerConfigTemplate extends KalturaObjectBase
{
	/**
	 * id
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * label
	 *
	 * @var string
	 */
	public $label = null;

	/**
	 * is Default
	 *
	 * @var bool
	 */
	public $isDefault = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaResetPasswordPartnerConfig extends KalturaObjectBase
{
	/**
	 * template List Label
	 *
	 * @var string
	 */
	public $templateListLabel = null;

	/**
	 * templates
	 *
	 * @var array of KalturaResetPasswordPartnerConfigTemplate
	 */
	public $templates;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOpcPartnerConfiguration extends KalturaPartnerConfiguration
{
	/**
	 * Reset Password
	 *
	 * @var KalturaResetPasswordPartnerConfig
	 */
	public $resetPassword;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDuration extends KalturaObjectBase
{
	/**
	 * duration unit
	 *
	 * @var KalturaDurationUnit
	 */
	public $unit = null;

	/**
	 * duration value
	 *
	 * @var int
	 */
	public $value = null;

	/**
	 * duration code - the canculat time in minutes except from years and months that have specific code
	 *
	 * @var int
	 * @readonly
	 */
	public $code = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUnifiedBillingCycle extends KalturaObjectBase
{
	/**
	 * UnifiedBillingCycle name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * cycle duration
	 *
	 * @var KalturaDuration
	 */
	public $duration;

	/**
	 * Payment Gateway Id
	 *
	 * @var int
	 */
	public $paymentGatewayId = null;

	/**
	 * Define if partial billing shall be calculated or not
	 *
	 * @var bool
	 */
	public $ignorePartialBilling = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * configuration for unified billing cycles.
	 *
	 * @var array of KalturaUnifiedBillingCycle
	 */
	public $unifiedBillingCycles;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDefaultPlaybackAdapters extends KalturaObjectBase
{
	/**
	 * Default adapter identifier for media
	 *
	 * @var int
	 */
	public $mediaAdapterId = null;

	/**
	 * Default adapter identifier for epg
	 *
	 * @var int
	 */
	public $epgAdapterId = null;

	/**
	 * Default adapter identifier for recording
	 *
	 * @var int
	 */
	public $recordingAdapterId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * default adapter configuration for: media, epg,recording.
	 *
	 * @var KalturaDefaultPlaybackAdapters
	 */
	public $defaultAdapters;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEncryption extends KalturaObjectBase
{
	/**
	 * Encryption type
	 *
	 * @var KalturaEncryptionType
	 */
	public $encryptionType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDataEncryption extends KalturaObjectBase
{
	/**
	 * Username encryption config
	 *
	 * @var KalturaEncryption
	 */
	public $username;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSecurityPartnerConfig extends KalturaPartnerConfiguration
{
	/**
	 * Encryption config
	 *
	 * @var KalturaDataEncryption
	 */
	public $encryption;


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

	/**
	 * campaignId
	 *
	 * @var int
	 * @readonly
	 */
	public $campaignId = null;


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
class KalturaSmsAdapterProfileListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaSmsAdapterProfile
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
	 * List of Topics
	 *
	 * @var array of KalturaTopic
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicNotification extends KalturaObjectBase
{
	/**
	 * Topic notification ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Topic notification name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Topic notification description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Announcement enabled
	 *
	 * @var KalturaSubscribeReference
	 */
	public $subscribeReference;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicNotificationListResponse extends KalturaListResponse
{
	/**
	 * Topic notifications
	 *
	 * @var array of KalturaTopicNotification
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTrigger extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDispatcher extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicNotificationMessage extends KalturaObjectBase
{
	/**
	 * Topic notification message ID
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Topic notification message
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Topic notification message image URL
	 *
	 * @var string
	 */
	public $imageUrl = null;

	/**
	 * Topic notification ID
	 *
	 * @var int
	 */
	public $topicNotificationId = null;

	/**
	 * Topic notification message trigger
	 *
	 * @var KalturaTrigger
	 */
	public $trigger;

	/**
	 * Topic notification message dispatchers
	 *
	 * @var array of KalturaDispatcher
	 */
	public $dispatchers;

	/**
	 * Message status
	 *
	 * @var KalturaAnnouncementStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicNotificationMessageListResponse extends KalturaListResponse
{
	/**
	 * Topic notification messages
	 *
	 * @var array of KalturaTopicNotificationMessage
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDateTrigger extends KalturaTrigger
{
	/**
	 * Trigger date
	 *
	 * @var int
	 */
	public $date = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionTrigger extends KalturaTrigger
{
	/**
	 * Subscription trigger type
	 *
	 * @var KalturaSubscriptionTriggerType
	 */
	public $type = null;

	/**
	 * Subscription trigger offset
	 *
	 * @var int
	 */
	public $offset = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSmsDispatcher extends KalturaDispatcher
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMailDispatcher extends KalturaDispatcher
{
	/**
	 * Mail body template
	 *
	 * @var string
	 */
	public $bodyTemplate = null;

	/**
	 * Mail subjsct template
	 *
	 * @var string
	 */
	public $subjectTemplate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestEpg extends KalturaObjectBase
{
	/**
	 * Unique id of the ingest job in question
	 *
	 * @var int
	 * @readonly
	 */
	public $ingestId = null;

	/**
	 * The ingested file name without its extention
	 *
	 * @var string
	 */
	public $ingestName = null;

	/**
	 * The ingested file name extention
	 *
	 * @var string
	 */
	public $ingestFilenameExtension = null;

	/**
	 * The ingest job created date and time. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $createdDate = null;

	/**
	 * The user id of the addFromBulkUpload caller.
	 *
	 * @var int
	 */
	public $ingestedByUserId = null;

	/**
	 * The ingest job completed date and time. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $completedDate = null;

	/**
	 * The ingest profile id that of the ingest job.
	 *
	 * @var int
	 */
	public $ingestProfileId = null;

	/**
	 * The ingest profile id that of the ingest job.
	 *
	 * @var KalturaIngestStatus
	 */
	public $status = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestStatusEpgListResponse extends KalturaListResponse
{
	/**
	 * A list of IngestStatus
	 *
	 * @var array of KalturaIngestEpg
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEpgIngestErrorMessage extends KalturaObjectBase
{
	/**
	 * The message description with arguments place holders
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * The message code
	 *
	 * @var string
	 */
	public $code = null;

	/**
	 * Message args
	 *
	 * @var map
	 */
	public $args;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAggregatedIngestInfo extends KalturaObjectBase
{
	/**
	 * Number of results
	 *
	 * @var int
	 */
	public $resultsCount = null;

	/**
	 * Number of results that include at least one error of severity TotalFailure
	 *
	 * @var int
	 */
	public $totalFailureCount = null;

	/**
	 * Number of results that include no error with severity TotalFailure but at at least one error of severity PartialFailure
	 *
	 * @var int
	 */
	public $partialFailureCount = null;

	/**
	 * Number of results that include at least one warning
	 *
	 * @var int
	 */
	public $warningsCount = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelAggregatedIngestInfo extends KalturaObjectBase
{
	/**
	 * The linear channel asset id
	 *
	 * @var int
	 */
	public $linearChannelId = null;

	/**
	 * Aggregated error counters
	 *
	 * @var KalturaAggregatedIngestInfo
	 */
	public $aggregatedErrors;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDateAggregatedIngestInfo extends KalturaObjectBase
{
	/**
	 * 00:00 UTC of the date in question
	 *
	 * @var int
	 */
	public $date = null;

	/**
	 * Aggregated error counters
	 *
	 * @var KalturaAggregatedIngestInfo
	 */
	public $aggregatedErrors;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestEpgDetailsAggregation extends KalturaObjectBase
{
	/**
	 * Array of aggregated information per channel that included in the ingest job in question
	 *
	 * @var array of KalturaChannelAggregatedIngestInfo
	 */
	public $linearChannels;

	/**
	 * Array of aggregated information per date that included in the ingest job in question
	 *
	 * @var array of KalturaDateAggregatedIngestInfo
	 */
	public $dates;

	/**
	 * All aggregated counters
	 *
	 * @var KalturaAggregatedIngestInfo
	 */
	public $all;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestEpgDetails extends KalturaIngestEpg
{
	/**
	 * Errors
	 *
	 * @var array of KalturaEpgIngestErrorMessage
	 */
	public $errors;

	/**
	 * Aggregated counters
	 *
	 * @var KalturaIngestEpgDetailsAggregation
	 */
	public $aggregations;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestEpgProgramResult extends KalturaObjectBase
{
	/**
	 * The unique ingested program id
	 *
	 * @var int
	 */
	public $programId = null;

	/**
	 * An external program id
	 *
	 * @var string
	 */
	public $externalProgramId = null;

	/**
	 * The id of the linear channel asset that the program belongs to
	 *
	 * @var int
	 */
	public $linearChannelId = null;

	/**
	 * The index of the program in the ingested file
	 *
	 * @var int
	 */
	public $indexInFile = null;

	/**
	 * Program EPG start date. Date and time represented as epoch
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * Program EPG end date. Date and time represented as epoch
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * The program status
	 *
	 * @var KalturaIngestEpgProgramStatus
	 */
	public $status = null;

	/**
	 * List of errors. Note: error cause the data in question or the whole ingest to fail
	 *
	 * @var array of KalturaEpgIngestErrorMessage
	 */
	public $errors;

	/**
	 * List of warnings. Note: warning cause no failure
	 *
	 * @var array of KalturaMessage
	 */
	public $warnings;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestStatusEpgProgramResultListResponse extends KalturaListResponse
{
	/**
	 * list of KalturaIngestEpgProgramResult
	 *
	 * @var array of KalturaIngestEpgProgramResult
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserLog extends KalturaObjectBase
{
	/**
	 * UserLog entry unique identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * The log created date in epoch
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * A valid user unique identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $userId = null;

	/**
	 * Log message
	 *
	 * @var string
	 * @readonly
	 */
	public $message = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserLogListResponse extends KalturaListResponse
{
	/**
	 * KalturaUserLog list response
	 *
	 * @var array of KalturaUserLog
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDurationListResponse extends KalturaListResponse
{
	/**
	 * Durations
	 *
	 * @var array of KalturaDuration
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDynamicListListResponse extends KalturaListResponse
{
	/**
	 * A list of KalturaDynamicList
	 *
	 * @var array of KalturaDynamicList
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
class KalturaHouseholdCouponListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaHouseholdCoupon
	 */
	public $objects;


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
class KalturaDeviceFamilyBase extends KalturaObjectBase
{
	/**
	 * Device family identifier
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * Device family name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Type of device family.
	 *              if this device family belongs only to this group,
	 *              otherwise.
	 *
	 * @var KalturaDeviceFamilyType
	 * @readonly
	 */
	public $type = null;


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

	/**
	 * Is the Max number of devices allowed for this family is default value or not
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefaultDeviceLimit = null;

	/**
	 * Is the Max number of streams allowed for this family is default value or not
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefaultConcurrentLimit = null;

	/**
	 * Is the Allowed device change frequency code for this family is default value or not
	 *
	 * @var bool
	 * @readonly
	 */
	public $isDefaultFrequencyLimit = null;


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
	 */
	public $name = null;

	/**
	 * Max number of streams allowed for the household
	 *
	 * @var int
	 */
	public $concurrentLimit = null;

	/**
	 * Max number of devices allowed for the household
	 *
	 * @var int
	 */
	public $deviceLimit = null;

	/**
	 * Allowed device change frequency code
	 *
	 * @var int
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
	 */
	public $usersLimit = null;

	/**
	 * Device families limitations
	 *
	 * @var array of KalturaHouseholdDeviceFamilyLimitations
	 */
	public $deviceFamiliesLimitations;

	/**
	 * Allowed device change frequency description
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Associated Device Families ids
	 *
	 * @var string
	 */
	public $associatedDeviceFamiliesIdsIn = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdLimitationsListResponse extends KalturaListResponse
{
	/**
	 * Household limitations
	 *
	 * @var array of KalturaHouseholdLimitations
	 */
	public $objects;


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

	/**
	 * create date
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * update date
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
class KalturaHouseholdListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaHousehold
	 */
	public $objects;


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
	 * The default value for &quot;isForceUpdate&quot; is &quot;FALSE&quot;. When &quot;isForceUpdate&quot; is not populated it will revert to its default value.
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
	 *             Note: when purchasing subscription that is “ENTITLED_TO_PREVIEW_MODULE”:
	 *              the first BillingTransaction.billingAction will be “unknown”, 
	 *              the second BillingTransaction.billingAction will be “purchase”, 
	 *              and the rest of them will be “renew_payment&quot;.
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

	/**
	 * External Transaction Id
	 *
	 * @var string
	 * @readonly
	 */
	public $externalTransactionId = null;


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
class KalturaBulkResponseObject extends KalturaObjectBase
{
	/**
	 * Indicates whether the bulk operation was successful
	 *
	 * @var bool
	 */
	public $isSuccess = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkPlaybackContextResponse extends KalturaListResponse
{
	/**
	 * Array of playback contexts or errors.
	 *             Each item corresponds to the request at the same index in the request array.
	 *             Items can be either KalturaPlaybackContext (success) or KalturaBulkPlaybackContextError (error).
	 *
	 * @var array of KalturaBulkResponseObject
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkPlaybackContextError extends KalturaBulkResponseObject
{
	/**
	 * The error code from the API exception
	 *
	 * @var string
	 */
	public $code = null;

	/**
	 * The error message from the API exception
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Additional error arguments from the API exception
	 *
	 * @var array of KalturaApiExceptionArg
	 */
	public $args;


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
class KalturaCaptionPlaybackPluginData extends KalturaObjectBase
{
	/**
	 * url
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * Language
	 *
	 * @var string
	 */
	public $language = null;

	/**
	 * Label
	 *
	 * @var string
	 */
	public $label = null;

	/**
	 * Format
	 *
	 * @var string
	 */
	public $format = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackPluginData extends KalturaObjectBase
{

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

	/**
	 * Playback captions
	 *
	 * @var array of KalturaCaptionPlaybackPluginData
	 */
	public $playbackCaptions;

	/**
	 * Plugins
	 *
	 * @var array of KalturaPlaybackPluginData
	 */
	public $plugins;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkPlaybackContextSuccess extends KalturaBulkResponseObject
{
	/**
	 * The successful playback context
	 *
	 * @var KalturaPlaybackContext
	 */
	public $playbackContext;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBumpersPlaybackPluginData extends KalturaPlaybackPluginData
{
	/**
	 * url
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * Streamer type: hls, dash, progressive.
	 *
	 * @var string
	 */
	public $streamertype = null;


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

	/**
	 * Indicates whether the asynchronous purchase is pending
	 *
	 * @var bool
	 */
	public $isPending = null;


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
class KalturaProgramAssetGroupOfferEntitlement extends KalturaEntitlement
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementDiscountDetails extends KalturaObjectBase
{
	/**
	 * Amount
	 *
	 * @var float
	 * @readonly
	 */
	public $amount = null;

	/**
	 * Start date
	 *
	 * @var int
	 * @readonly
	 */
	public $startDate = null;

	/**
	 * End date
	 *
	 * @var int
	 * @readonly
	 */
	public $endDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementPriceDetails extends KalturaObjectBase
{
	/**
	 * Full price
	 *
	 * @var KalturaPrice
	 * @readonly
	 */
	public $fullPrice;

	/**
	 * List of the season numbers to exclude.
	 *
	 * @var array of KalturaEntitlementDiscountDetails
	 * @readonly
	 */
	public $discountDetails;


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

	/**
	 * Price details
	 *
	 * @var KalturaEntitlementPriceDetails
	 * @readonly
	 */
	public $priceDetails;

	/**
	 * Indicates whether the subscription is now within the flexible price plan lifecycle or not
	 *
	 * @var bool
	 * @readonly
	 */
	public $isFlexiblePricePlan = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementDiscountDetailsIdentifier extends KalturaEntitlementDiscountDetails
{
	/**
	 * Identifier
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
class KalturaCampaignEntitlementDiscountDetails extends KalturaEntitlementDiscountDetailsIdentifier
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCompensationEntitlementDiscountDetails extends KalturaEntitlementDiscountDetailsIdentifier
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountEntitlementDiscountDetails extends KalturaEntitlementDiscountDetailsIdentifier
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTrailEntitlementDiscountDetails extends KalturaEntitlementDiscountDetailsIdentifier
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponEntitlementDiscountDetails extends KalturaEntitlementDiscountDetails
{
	/**
	 * Coupon Code
	 *
	 * @var string
	 * @readonly
	 */
	public $couponCode = null;

	/**
	 * Endless coupon
	 *
	 * @var bool
	 * @readonly
	 */
	public $endlessCoupon = null;


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
	 * @insertonly
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
	 */
	public $viewableUntilDate = null;

	/**
	 * Specifies whether or not the recording is protected
	 *
	 * @var bool
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

	/**
	 * Duration in seconds
	 *
	 * @var int
	 * @readonly
	 */
	public $duration = null;


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

	/**
	 * key/value map field for extra data
	 *
	 * @var map
	 */
	public $metaData;

	/**
	 * Specifies until when the recording is available. Date and time represented as epoch.
	 *
	 * @var int
	 * @readonly
	 */
	public $expiryDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImmediateRecording extends KalturaRecording
{
	/**
	 * Household specific end padding of the recording
	 *
	 * @var int
	 */
	public $endPadding = null;

	/**
	 * Household absolute start time of the immediate recording
	 *
	 * @var int
	 * @readonly
	 */
	public $absoluteStart = null;

	/**
	 * Household absolute end time of the immediate recording, empty if till end of program
	 *
	 * @var int
	 * @readonly
	 */
	public $absoluteEnd = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaddedRecording extends KalturaRecording
{
	/**
	 * Household specific start padding of the recording
	 *
	 * @var int
	 */
	public $startPadding = null;

	/**
	 * Household specific end padding of the recording
	 *
	 * @var int
	 */
	public $endPadding = null;

	/**
	 * Indicates whether startPadding value is personal padding (counts towards HH quota) or system padding (does not count towards HH quota).
	 *
	 * @var bool
	 * @readonly
	 */
	public $startPaddingIsPersonal = null;

	/**
	 * Indicates whether endPadding value is personal padding (counts towards HH quota) or system padding (does not count towards HH quota).
	 *
	 * @var bool
	 * @readonly
	 */
	public $endPaddingIsPersonal = null;


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
class KalturaSeriesRecordingOption extends KalturaObjectBase
{
	/**
	 * min Season Number
	 *
	 * @var int
	 */
	public $minSeasonNumber = null;

	/**
	 * min Season Number
	 *
	 * @var int
	 */
	public $minEpisodeNumber = null;

	/**
	 * Record future only from selected value
	 *
	 * @var KalturaChronologicalRecordStartTime
	 */
	public $chronologicalRecordStartTime = null;


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

	/**
	 * Series Recording Option
	 *
	 * @var KalturaSeriesRecordingOption
	 */
	public $seriesRecordingOption;


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
class KalturaExternalSeriesRecording extends KalturaSeriesRecording
{
	/**
	 * MetaData filtering
	 *
	 * @var map
	 */
	public $metaData;


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
class KalturaRelatedEntity extends KalturaObjectBase
{
	/**
	 * Unique identifier for the related entry
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * Defines related entry type
	 *
	 * @var KalturaRelatedEntityType
	 */
	public $type = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRelatedEntityArray extends KalturaObjectBase
{
	/**
	 * List of related entities
	 *
	 * @var array of KalturaRelatedEntity
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
	 *             Possible values: 0 - EPG linear programs, 1 - Recording; or any asset type ID according to the asset types IDs defined in the system.
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
	 * Dynamic collection of key-value pairs according to the related entity defined in the system
	 *
	 * @var map
	 */
	public $relatedEntities;

	/**
	 * Date and time represented as epoch. For VOD - since when the asset is available in the catalog. For EPG/Linear - when the program is aired (can be in the future).
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * Date and time represented as epoch. For VOD - till when the asset be available in the catalog. For EPG/Linear - program end time and date
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

	/**
	 * The media asset index status
	 *
	 * @var KalturaAssetIndexStatus
	 * @readonly
	 */
	public $indexStatus = null;


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
class KalturaLiveToVodInfoAsset extends KalturaObjectBase
{
	/**
	 * Linear Asset Id
	 *
	 * @var int
	 */
	public $linearAssetId = null;

	/**
	 * EPG Id
	 *
	 * @var string
	 */
	public $epgId = null;

	/**
	 * EPG Channel Id
	 *
	 * @var int
	 */
	public $epgChannelId = null;

	/**
	 * Crid
	 *
	 * @var string
	 */
	public $crid = null;

	/**
	 * Original Start Date
	 *
	 * @var int
	 */
	public $originalStartDate = null;

	/**
	 * Original End Date
	 *
	 * @var int
	 */
	public $originalEndDate = null;

	/**
	 * Padding before program starts
	 *
	 * @var int
	 */
	public $paddingBeforeProgramStarts = null;

	/**
	 * Padding after program ends
	 *
	 * @var int
	 */
	public $paddingAfterProgramEnds = null;


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

	/**
	 * Live to VOD (if present)
	 *
	 * @var KalturaLiveToVodInfoAsset
	 */
	public $liveToVod;


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
	 * Returns padding before program starts in seconds from a live asset if configured,
	 *             otherwise returns corresponding value from TimeShiftedTvPartnerSettings.
	 *
	 * @var int
	 */
	public $paddingBeforeProgramStarts = null;

	/**
	 * Returns padding after program ends in seconds from a live asset if configured,
	 *             otherwise returns corresponding value from TimeShiftedTvPartnerSettings.
	 *
	 * @var int
	 */
	public $paddingAfterProgramEnds = null;

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
	 *             Please, note that value of this property is strictly connected with CDV-R setting on Partner level.
	 *             In order to enable CDV-R for KalturaLiveAsset, Partner CDV-R setting should be enabled.
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableCdvr = null;

	/**
	 * Is catch-up enabled for this asset
	 *             Please, note that value of this property is strictly connected with Catch Up setting on Partner level.
	 *             In order to enable Catch Up for KalturaLiveAsset, Partner Catch Up setting should be enabled.
	 *
	 * @var bool
	 * @readonly
	 */
	public $enableCatchUp = null;

	/**
	 * Is start over enabled for this asset
	 *             Please, note that value of this property is strictly connected with Start Over setting on Partner level.
	 *             In order to enable Start Over for KalturaLiveAsset, Partner Start Over setting should be enabled.
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
	 *             Please, note that value of this property is strictly connected with Trick Play setting on Partner level.
	 *             In order to enable Trick Play for KalturaLiveAsset, Partner Trick Play setting should be enabled.
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
class KalturaLineupChannelAsset extends KalturaLiveAsset
{
	/**
	 * Lineup channel number (LCN) - A logical linear channel number. This number is unique in the region context.
	 *
	 * @var int
	 */
	public $lcn = null;


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
	 * @readonly
	 */
	public $epgChannelId = null;

	/**
	 * EPG identifier
	 *
	 * @var string
	 * @readonly
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
	 * @insertonly
	 */
	public $linearAssetId = null;

	/**
	 * Is CDVR enabled for this asset
	 *             Please, note that value of this property is strictly connected with CDV-R setting on Partner and KalturaLiveAsset levels.
	 *             In order to enable CDV-R for KalturaProgramAsset, Partner and KalturaLiveAsset CDV-R settings should be enabled.
	 *
	 * @var bool
	 */
	public $enableCdvr = null;

	/**
	 * Is catch-up enabled for this asset
	 *             Please, note that value of this property is strictly connected with Catch Up setting on Partner and KalturaLiveAsset levels.
	 *             In order to enable Catch Up for KalturaProgramAsset, Partner and KalturaLiveAsset Catch Up settings should be enabled.
	 *
	 * @var bool
	 */
	public $enableCatchUp = null;

	/**
	 * Is start over enabled for this asset
	 *             Please, note that value of this property is strictly connected with Start Over setting on Partner and KalturaLiveAsset levels.
	 *             In order to enable Start Over for KalturaProgramAsset, Partner and KalturaLiveAsset Start Over settings should be enabled.
	 *
	 * @var bool
	 */
	public $enableStartOver = null;

	/**
	 * Is trick-play enabled for this asset
	 *             Please, note that value of this property is strictly connected with Trick Play setting on Partner and KalturaLiveAsset levels.
	 *             In order to enable Trick Play for KalturaProgramAsset, Partner and KalturaLiveAsset Trick Play settings should be enabled.
	 *
	 * @var bool
	 */
	public $enableTrickPlay = null;

	/**
	 * Contains comma separate list of KalturaProgramAssetGroupOffer.externalOfferId values indicating the PAGOs to which the Program Asset is bound.
	 *
	 * @var string
	 */
	public $externalOfferIds = null;


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

	/**
	 * Specifies until when the recording is available for viewing. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $viewableUntilDate = null;

	/**
	 * When TRUE indicates that there are multiple KalturaImmediateRecording instances for the event.
	 *
	 * @var bool
	 */
	public $multiRecord = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEpg extends KalturaProgramAsset
{

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

	/**
	 * Dynamic data
	 *
	 * @var map
	 */
	public $dynamicData;


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

	/**
	 * Is Location Tag
	 *
	 * @var bool
	 */
	public $isLocationTag = null;

	/**
	 * suppressed Order, ascending
	 *
	 * @var int
	 */
	public $suppressedOrder = null;

	/**
	 * Case sensitive alias value
	 *
	 * @var string
	 */
	public $aliasName = null;


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
class KalturaCategoryItemListResponse extends KalturaListResponse
{
	/**
	 * A list of CategoryItem
	 *
	 * @var array of KalturaCategoryItem
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryVersionListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaCategoryVersion
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
	 * Image type Name
	 *
	 * @var string
	 */
	public $imageTypeName = null;

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
class KalturaLabel extends KalturaObjectBase
{
	/**
	 * Label identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Label value. It must be unique in the context of entityAttribute
	 *
	 * @var string
	 */
	public $value = null;

	/**
	 * Identifier of entity to which label belongs
	 *
	 * @var KalturaEntityAttribute
	 * @insertonly
	 */
	public $entityAttribute = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLabelListResponse extends KalturaListResponse
{
	/**
	 * List of labels
	 *
	 * @var array of KalturaLabel
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLineupChannelAssetListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaLineupChannelAsset
	 */
	public $objects;

	/**
	 * Lineup External Id
	 *
	 * @var string
	 */
	public $lineupExternalId = null;

	/**
	 * Parent Lineup External Id
	 *
	 * @var string
	 */
	public $parentLineupExternalId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileDynamicData extends KalturaObjectBase
{
	/**
	 * An integer representing the identifier of the value.
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * An integer representing the the mediaFileType holding the keys for which the values should be stored.
	 *
	 * @var int
	 */
	public $mediaFileTypeId = null;

	/**
	 * A string representing the key name within the mediaFileType that identifies the list corresponding
	 *             to that key name.
	 *
	 * @var string
	 */
	public $mediaFileTypeKeyName = null;

	/**
	 * Dynamic data value
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileDynamicDataListResponse extends KalturaListResponse
{
	/**
	 * A list of media-file types
	 *
	 * @var array of KalturaMediaFileDynamicData
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

	/**
	 * List of comma separated keys allowed to be used as KalturaMediaFile&#39;s dynamic data keys
	 *
	 * @var string
	 */
	public $dynamicDataKeys = null;


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
class KalturaStreamingDevice extends KalturaObjectBase
{
	/**
	 * Asset
	 *
	 * @var KalturaSlimAsset
	 * @readonly
	 */
	public $asset;

	/**
	 * User identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * Device UDID
	 *
	 * @var string
	 * @insertonly
	 */
	public $udid = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStreamingDeviceListResponse extends KalturaListResponse
{
	/**
	 * Streaming devices
	 *
	 * @var array of KalturaStreamingDevice
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
class KalturaSearchPriorityCriteria extends KalturaObjectBase
{
	/**
	 * Criterion type
	 *
	 * @var KalturaSearchPriorityCriteriaType
	 */
	public $type = null;

	/**
	 * Condition
	 *             KSQL has to have no more than 10 conditions. Text, boolean, enum and tag fields can be used only with = operator, numeric and datetime fields - only with &lt;, = and &gt; operators.
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchPriorityGroup extends KalturaObjectBase
{
	/**
	 * Identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Name
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * Search criterion
	 *
	 * @var KalturaSearchPriorityCriteria
	 */
	public $criteria;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchPriorityGroupListResponse extends KalturaListResponse
{
	/**
	 * List of search priority groups
	 *
	 * @var array of KalturaSearchPriorityGroup
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSuspendSettings extends KalturaObjectBase
{
	/**
	 * revoke entitlements
	 *
	 * @var bool
	 */
	public $revokeEntitlements = null;

	/**
	 * stop renew
	 *
	 * @var bool
	 */
	public $stopRenew = null;


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

	/**
	 * suspend settings
	 *
	 * @var KalturaSuspendSettings
	 * @readonly
	 */
	public $suspendSettings;


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

	/**
	 * Payment gateway - Support asynchronous purchase
	 *
	 * @var bool
	 */
	public $isAsyncPolicy = null;


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
class KalturaProductMarkup extends KalturaObjectBase
{
	/**
	 * Product Id
	 *
	 * @var int
	 * @readonly
	 */
	public $productId = null;

	/**
	 * Product Type
	 *
	 * @var KalturaTransactionType
	 * @readonly
	 */
	public $productType = null;

	/**
	 * Is Entitled to this product
	 *
	 * @var bool
	 * @readonly
	 */
	public $isEntitled = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetPersonalMarkup extends KalturaObjectBase
{
	/**
	 * Asset Id
	 *
	 * @var int
	 * @readonly
	 */
	public $assetId = null;

	/**
	 * Asset Type
	 *
	 * @var KalturaAssetType
	 * @readonly
	 */
	public $assetType = null;

	/**
	 * all related asset&#39;s Product Markups
	 *
	 * @var array of KalturaProductMarkup
	 */
	public $products;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetPersonalMarkupListResponse extends KalturaListResponse
{
	/**
	 * Adapters
	 *
	 * @var array of KalturaAssetPersonalMarkup
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
class KalturaCampaignListResponse extends KalturaListResponse
{
	/**
	 * A list of Campaigns
	 *
	 * @var array of KalturaCampaign
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
class KalturaCurrency extends KalturaObjectBase
{
	/**
	 * Identifier
	 *
	 * @var int
	 */
	public $id = null;

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
class KalturaDeviceBrand extends KalturaObjectBase
{
	/**
	 * Device brand identifier
	 *
	 * @var int
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
	 */
	public $deviceFamilyid = null;

	/**
	 * Type of device family.
	 *              if this device family belongs only to this group,
	 *              otherwise.
	 *
	 * @var KalturaDeviceBrandType
	 * @readonly
	 */
	public $type = null;


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
class KalturaEventNotificationListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaEventNotification
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

	/**
	 * Asset user rule identifier
	 *
	 * @var int
	 */
	public $assetUserRuleId = null;

	/**
	 * key/value map field for extra data
	 *
	 * @var map
	 */
	public $metaData;


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
class KalturaIngestProfile extends KalturaObjectBase
{
	/**
	 * Ingest profile identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Ingest profile name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Ingest profile externalId
	 *
	 * @var string
	 */
	public $externalId = null;

	/**
	 * Type of assets that this profile suppose to ingest: 0 - EPG, 1 - MEDIA
	 *
	 * @var int
	 */
	public $assetTypeId = null;

	/**
	 * Transformation Adapter URL
	 *
	 * @var string
	 */
	public $transformationAdapterUrl = null;

	/**
	 * Transformation Adapter settings
	 *
	 * @var map
	 */
	public $transformationAdapterSettings;

	/**
	 * Transformation Adapter shared secret
	 *
	 * @var string
	 */
	public $transformationAdapterSharedSecret = null;

	/**
	 * Ingest profile default Auto-fill policy
	 *
	 * @var KalturaIngestProfileAutofillPolicy
	 */
	public $defaultAutoFillPolicy = null;

	/**
	 * Ingest profile default Overlap policy
	 *
	 * @var KalturaIngestProfileOverlapPolicy
	 */
	public $defaultOverlapPolicy = null;

	/**
	 * Ingest profile overlap channels
	 *
	 * @var string
	 */
	public $overlapChannels = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestProfileListResponse extends KalturaListResponse
{
	/**
	 * Adapters
	 *
	 * @var array of KalturaIngestProfile
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIotListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaIot
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
	 * Identifier
	 *
	 * @var int
	 */
	public $id = null;

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

	/**
	 * Dynamic data
	 *
	 * @var map
	 */
	public $dynamicData;


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
class KalturaPermissionItem extends KalturaObjectBase
{
	/**
	 * Permission item identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Permission item name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Permission isExcluded
	 *
	 * @var bool
	 */
	public $isExcluded = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemListResponse extends KalturaListResponse
{
	/**
	 * A list of objects
	 *
	 * @var array of KalturaPermissionItem
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiActionPermissionItem extends KalturaPermissionItem
{
	/**
	 * API service name
	 *
	 * @var string
	 */
	public $service = null;

	/**
	 * API action name
	 *
	 * @var string
	 */
	public $action = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiArgumentPermissionItem extends KalturaPermissionItem
{
	/**
	 * API service name
	 *
	 * @var string
	 */
	public $service = null;

	/**
	 * API action name
	 *
	 * @var string
	 */
	public $action = null;

	/**
	 * API parameter name
	 *
	 * @var string
	 */
	public $parameter = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiParameterPermissionItem extends KalturaPermissionItem
{
	/**
	 * API object name
	 *
	 * @var string
	 */
	public $object = null;

	/**
	 * API parameter name
	 *
	 * @var string
	 */
	public $parameter = null;

	/**
	 * API action type
	 *
	 * @var KalturaApiParameterPermissionItemAction
	 */
	public $action = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaApiPriviligesPermissionItem extends KalturaPermissionItem
{
	/**
	 * API object name
	 *
	 * @var string
	 */
	public $object = null;

	/**
	 * API parameter name
	 *
	 * @var string
	 */
	public $parameter = null;


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

	/**
	 * Comma separated permissions names from type SPECIAL_FEATURE
	 *
	 * @var string
	 * @readonly
	 */
	public $dependsOnPermissionNames = null;

	/**
	 * Permission type
	 *
	 * @var KalturaPermissionType
	 */
	public $type = null;

	/**
	 * Comma separated associated permission items IDs
	 *
	 * @var string
	 */
	public $permissionItemsIds = null;


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
	 * @readonly
	 */
	public $group = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackProfile extends KalturaObjectBase
{
	/**
	 * Playback profile identifier
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Playback profile name
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Playback profile active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Playback profile Grpc address
	 *
	 * @var string
	 */
	public $adapterGrpcAddress = null;

	/**
	 * Playback profile URL
	 *
	 * @var string
	 */
	public $adapterUrl = null;

	/**
	 * Playback profile settings
	 *
	 * @var string
	 */
	public $settings = null;

	/**
	 * Playback profile alias
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Playback adapter shared secret
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
class KalturaPlaybackProfileListResponse extends KalturaListResponse
{
	/**
	 * A list of Engagement adapter
	 *
	 * @var array of KalturaPlaybackProfile
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

	/**
	 * The dynamic data of a channel
	 *
	 * @var map
	 */
	public $dynamicData;


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
	 * @readonly
	 */
	public $isDefault = null;

	/**
	 * List of associated linear channels
	 *
	 * @var array of KalturaRegionalChannel
	 */
	public $linearChannels;

	/**
	 * Parent region ID
	 *
	 * @var int
	 */
	public $parentId = null;


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
class KalturaRegionalChannelMultiLcns extends KalturaRegionalChannel
{
	/**
	 * Linear channel numbers
	 *
	 * @var string
	 */
	public $lcns = null;


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
class KalturaTvmRuleListResponse extends KalturaListResponse
{
	/**
	 * tvm rules
	 *
	 * @var array of KalturaTvmRule
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

	/**
	 * Role type
	 *
	 * @var KalturaUserRoleType
	 * @readonly
	 */
	public $type = null;

	/**
	 * Role profile
	 *
	 * @var KalturaUserRoleProfile
	 */
	public $profile = null;


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
class KalturaGeoBlockRule extends KalturaObjectBase
{
	/**
	 * Geo Block Rule id
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
	 * Create Date Epoch time in seconds
	 *
	 * @var int
	 * @readonly
	 */
	public $createDate = null;

	/**
	 * Update Date Epoch time in seconds
	 *
	 * @var int
	 * @readonly
	 */
	public $updateDate = null;

	/**
	 * comma separated string representing list of countries that the rule shall apply to
	 *
	 * @var string
	 */
	public $countryIds = null;

	/**
	 * mode - Defines the geo-blocking strategy based on user location.
	 *             AllowOnlySelected - Implements a restrictive whitelist approach where content is only accessible from explicitly selected countries. All other countries are blocked by default.
	 *             BlockOnlySelected - Implements a permissive blacklist approach where content is accessible from all countries except those explicitly selected for blocking.
	 *
	 * @var KalturaGeoBlockMode
	 */
	public $mode = null;

	/**
	 * Should geo block rule check proxy as well
	 *
	 * @var bool
	 */
	public $isProxyRuleEnabled = null;

	/**
	 * Level of proxy rule check - medium or high
	 *
	 * @var KalturaProxyRuleLevel
	 */
	public $proxyRuleLevel = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGeoBlockRuleListResponse extends KalturaListResponse
{
	/**
	 * Geo block rules
	 *
	 * @var array of KalturaGeoBlockRule
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEpgListResponse extends KalturaListResponse
{
	/**
	 * Assets
	 *
	 * @var array of KalturaEpg
	 */
	public $objects;


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

	/**
	 * The region identifier of the KS used to create the appToken. Value is presented only for partners with the enabled feature.
	 *
	 * @var int
	 * @readonly
	 */
	public $regionId = null;


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
abstract class KalturaRepresentativeSelectionPolicy extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopEntitledOrFreeRsp extends KalturaRepresentativeSelectionPolicy
{
	/**
	 * order by
	 *
	 * @var KalturaBaseAssetOrder
	 */
	public $orderBy;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopRsp extends KalturaRepresentativeSelectionPolicy
{
	/**
	 * order by
	 *
	 * @var KalturaBaseAssetOrder
	 */
	public $orderBy;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopSubscriptionEntitledOrFreeRsp extends KalturaRepresentativeSelectionPolicy
{
	/**
	 * order by
	 *
	 * @var KalturaBaseAssetOrder
	 */
	public $orderBy;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopSubscriptionEntitledRsp extends KalturaRepresentativeSelectionPolicy
{
	/**
	 * order by
	 *
	 * @var KalturaBaseAssetOrder
	 */
	public $orderBy;


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
	 * Playback streamer type: applehttp, mpegdash, url, smothstreaming, multicast, none
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
	 * key/value map field for extra data
	 *
	 * @var map
	 */
	public $adapterData;

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
class KalturaGetPlaybackContextParams extends KalturaObjectBase
{
	/**
	 * Unique identifier of the asset
	 *
	 * @var string
	 */
	public $assetId = null;

	/**
	 * Type of the asset
	 *
	 * @var KalturaAssetType
	 */
	public $assetType = null;

	/**
	 * Playback context options
	 *
	 * @var KalturaPlaybackContextOptions
	 */
	public $contextDataParams;

	/**
	 * Source type (optional)
	 *
	 * @var string
	 */
	public $sourceType = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkPlaybackContextRequest extends KalturaObjectBase
{
	/**
	 * Array of request parameters for getPlaybackContext.
	 *             Each entry represents an individual playback context request.
	 *
	 * @var array of KalturaGetPlaybackContextParams
	 */
	public $playbackContextParamSets;


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
abstract class KalturaBulkUploadJobData extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadExcelJobData extends KalturaBulkUploadJobData
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadIngestJobData extends KalturaBulkUploadJobData
{
	/**
	 * Identifies the ingest profile that will handle the ingest of programs
	 *             Ingest profiles are created separately using the ingest profile service
	 *
	 * @var int
	 */
	public $ingestProfileId = null;

	/**
	 * By default, after the successful ingest, devices will be notified about changes in epg channels.
	 *             This parameter disables this notification.
	 *
	 * @var bool
	 */
	public $disableEpgNotification = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBulkUploadObjectData extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBulkUploadAssetData extends KalturaBulkUploadObjectData
{
	/**
	 * Identifies the asset type (EPG, Recording, Movie, TV Series, etc). 
	 *             Possible values: 0 - EPG linear programs, 1 - Recording; or any asset type ID according to the asset types IDs defined in the system.
	 *
	 * @var int
	 */
	public $typeId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaBulkUploadDynamicListData extends KalturaBulkUploadObjectData
{
	/**
	 * Identifies the dynamicList Id
	 *
	 * @var int
	 */
	public $dynamicListId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadUdidDynamicListData extends KalturaBulkUploadDynamicListData
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadMediaAssetData extends KalturaBulkUploadAssetData
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadLiveAssetData extends KalturaBulkUploadMediaAssetData
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadProgramAssetData extends KalturaBulkUploadAssetData
{

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

	/**
	 * Is Live PlayBack
	 *
	 * @var bool
	 * @readonly
	 */
	public $isLivePlayBack = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesIdArguments extends KalturaObjectBase
{
	/**
	 * Comma separated asset type IDs
	 *
	 * @var string
	 */
	public $assetTypeIdIn = null;

	/**
	 * Series ID
	 *
	 * @var string
	 */
	public $seriesId = null;

	/**
	 * Series ID meta name.
	 *
	 * @var string
	 */
	public $seriesIdMetaName = null;

	/**
	 * Season number meta name
	 *
	 * @var string
	 */
	public $seasonNumberMetaName = null;

	/**
	 * Episode number meta name
	 *
	 * @var string
	 */
	public $episodeNumberMetaName = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetPersonalSelection extends KalturaObjectBase
{
	/**
	 * Asset Id
	 *
	 * @var int
	 * @readonly
	 */
	public $assetId = null;

	/**
	 * Asset Type
	 *
	 * @var KalturaAssetType
	 * @readonly
	 */
	public $assetType = null;

	/**
	 * Update Date
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
class KalturaBulkUploadStatistics extends KalturaObjectBase
{
	/**
	 * count of bulk upload in pending status
	 *
	 * @var int
	 */
	public $pending = null;

	/**
	 * count of bulk Uploaded in uploaded status
	 *
	 * @var int
	 */
	public $uploaded = null;

	/**
	 * count of bulk upload in queued status
	 *
	 * @var int
	 */
	public $queued = null;

	/**
	 * count of bulk upload in parsing status
	 *
	 * @var int
	 */
	public $parsing = null;

	/**
	 * count of bulk upload in processing status
	 *
	 * @var int
	 */
	public $processing = null;

	/**
	 * count of bulk upload in processed status
	 *
	 * @var int
	 */
	public $processed = null;

	/**
	 * count of bulk upload in success status
	 *
	 * @var int
	 */
	public $success = null;

	/**
	 * count of bulk upload in partial status
	 *
	 * @var int
	 */
	public $partial = null;

	/**
	 * count of bulk upload in failed status
	 *
	 * @var int
	 */
	public $failed = null;

	/**
	 * count of bulk upload in fatal status
	 *
	 * @var int
	 */
	public $fatal = null;


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
class KalturaCategoryTree extends KalturaObjectBase
{
	/**
	 * Unique identifier for the category item
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Category name
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Category name
	 *
	 * @var array of KalturaTranslationToken
	 */
	public $multilingualName;

	/**
	 * List of category tree
	 *
	 * @var array of KalturaCategoryTree
	 * @readonly
	 */
	public $children;

	/**
	 * List of unified Channels.
	 *
	 * @var array of KalturaUnifiedChannelInfo
	 */
	public $unifiedChannels;

	/**
	 * Dynamic data
	 *
	 * @var map
	 */
	public $dynamicData;

	/**
	 * Category images
	 *
	 * @var array of KalturaImage
	 */
	public $images;

	/**
	 * Category active status
	 *
	 * @var bool
	 */
	public $isActive = null;

	/**
	 * Start date in seconds
	 *
	 * @var int
	 */
	public $startDateInSeconds = null;

	/**
	 * End date in seconds
	 *
	 * @var int
	 */
	public $endDateInSeconds = null;

	/**
	 * Category type
	 *
	 * @var string
	 * @insertonly
	 */
	public $type = null;

	/**
	 * Unique identifier for the category version
	 *
	 * @var int
	 * @readonly
	 */
	public $versionId = null;

	/**
	 * Virtual asset id
	 *
	 * @var int
	 * @readonly
	 */
	public $virtualAssetId = null;

	/**
	 * Category reference identifier
	 *
	 * @var string
	 * @readonly
	 */
	public $referenceId = null;


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
class KalturaCouponFilesLinks extends KalturaObjectBase
{
	/**
	 * Total count of coupons code files
	 *
	 * @var int
	 */
	public $totalCount = null;

	/**
	 * A pre-signed URL pointing to a coupon codes file
	 *
	 * @var array of KalturaStringValue
	 */
	public $objects;


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
class KalturaEpgServicePartnerConfiguration extends KalturaObjectBase
{
	/**
	 * The number of slots (NOS) that are supported (1, 2, 3, 4, 6, 8, 12, 24)
	 *
	 * @var int
	 */
	public $numberOfSlots = null;

	/**
	 * The offset of the first slot from 00:00 UTC
	 *
	 * @var int
	 */
	public $firstSlotOffset = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
abstract class KalturaEventNotificationScope extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEventObject extends KalturaObjectBase
{

}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEventNotificationObjectScope extends KalturaEventNotificationScope
{
	/**
	 * Event object to fire
	 *
	 * @var KalturaEventObject
	 */
	public $eventObject;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetEvent extends KalturaEventObject
{
	/**
	 * User Id
	 *
	 * @var int
	 * @readonly
	 */
	public $userId = null;

	/**
	 * Asset Id
	 *
	 * @var int
	 * @readonly
	 */
	public $assetId = null;

	/**
	 * Identifies the asset type (EPG, Recording, Movie, TV Series, etc). 
	 *             Possible values: 0 – EPG linear programs, 1 - Recording; or any asset type ID according to the asset types IDs defined in the system.
	 *
	 * @var int
	 * @readonly
	 */
	public $type = null;

	/**
	 * External identifier for the asset
	 *
	 * @var string
	 * @readonly
	 */
	public $externalId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProgramAssetEvent extends KalturaAssetEvent
{
	/**
	 * The  live asset Id that was identified according liveAssetExternalId
	 *
	 * @var int
	 * @readonly
	 */
	public $liveAssetId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkEvent extends KalturaEventObject
{
	/**
	 * User Id
	 *
	 * @var int
	 */
	public $userId = null;

	/**
	 * Household Id
	 *
	 * @var int
	 */
	public $householdId = null;

	/**
	 * Asset Id
	 *
	 * @var int
	 */
	public $assetId = null;

	/**
	 * File Id
	 *
	 * @var int
	 */
	public $fileId = null;

	/**
	 * position
	 *
	 * @var int
	 */
	public $position = null;

	/**
	 * Bookmark Action Type
	 *
	 * @var KalturaBookmarkActionType
	 */
	public $action = null;

	/**
	 * Product Type
	 *
	 * @var KalturaTransactionType
	 */
	public $productType = null;

	/**
	 * Product Id
	 *
	 * @var int
	 */
	public $productId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConcurrencyViolation extends KalturaEventObject
{
	/**
	 * Timestamp
	 *
	 * @var int
	 */
	public $timestamp = null;

	/**
	 * UDID
	 *
	 * @var string
	 */
	public $udid = null;

	/**
	 * Asset Id
	 *
	 * @var string
	 */
	public $assetId = null;

	/**
	 * Violation Rule
	 *
	 * @var string
	 */
	public $violationRule = null;

	/**
	 * Household Id
	 *
	 * @var string
	 */
	public $householdId = null;

	/**
	 * User Id
	 *
	 * @var string
	 */
	public $userId = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTriggerCampaignEvent extends KalturaEventObject
{
	/**
	 * User Id
	 *
	 * @var int
	 * @readonly
	 */
	public $userId = null;

	/**
	 * Campaign Id
	 *
	 * @var int
	 * @readonly
	 */
	public $campaignId = null;

	/**
	 * Udid
	 *
	 * @var string
	 * @readonly
	 */
	public $udid = null;

	/**
	 * Household Id
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
class KalturaRetryDeleteRequest extends KalturaObjectBase
{
	/**
	 * The first date (epoch) to start the retryDelete from - by default {now} - {30 days in second}
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * The last date (epoch) to do the retryDelete - by default {now} (should be greater than startDate)
	 *
	 * @var int
	 */
	public $endDate = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPartnerConfiguration extends KalturaObjectBase
{
	/**
	 * Retention period in days.
	 *
	 * @var int
	 */
	public $retentionPeriodDays = null;


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
class KalturaLoginSession extends KalturaObjectBase
{
	/**
	 * Access token in a KS format
	 *
	 * @var string
	 */
	public $ks = null;

	/**
	 * Expiration
	 *
	 * @var int
	 */
	public $expiry = null;


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
class KalturaDynamicData extends KalturaObjectBase
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
	 * @var KalturaValue
	 */
	public $value;


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
abstract class KalturaContentResource extends KalturaObjectBase
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
class KalturaIngestStatusEpgConfiguration extends KalturaObjectBase
{
	/**
	 * Defines whether partner in question enabled core ingest status service.
	 *
	 * @var bool
	 */
	public $isSupported = null;

	/**
	 * Defines the time in seconds that the service retain information about ingest status.
	 *
	 * @var int
	 */
	public $retainingPeriod = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestStatusVodConfiguration extends KalturaObjectBase
{
	/**
	 * Defines whether partner in question enabled core ingest status service.
	 *
	 * @var bool
	 */
	public $isSupported = null;

	/**
	 * Defines the time in seconds that the service retain information about ingest status.
	 *
	 * @var int
	 */
	public $retainingPeriod = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestStatusPartnerConfiguration extends KalturaObjectBase
{
	/**
	 * Defines the epg configuration of the partner.
	 *
	 * @var KalturaIngestStatusEpgConfiguration
	 */
	public $epg;

	/**
	 * Defines the vod configuration of the partner.
	 *
	 * @var KalturaIngestStatusVodConfiguration
	 */
	public $vod;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaVodIngestAssetResultErrorMessage extends KalturaObjectBase
{
	/**
	 * The message description with arguments place holders
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * The message code
	 *
	 * @var string
	 */
	public $code = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaVodIngestAssetResult extends KalturaObjectBase
{
	/**
	 * Ingested asset name. Absent only in case of NameRequired error
	 *
	 * @var string
	 */
	public $assetName = null;

	/**
	 * The shop ID the asset is assigned to. Omitted if the asset is not associated to any shop.
	 *
	 * @var int
	 */
	public $shopAssetUserRuleId = null;

	/**
	 * The XML file name used at the ingest gateway. Referred to as process name
	 *
	 * @var string
	 */
	public $fileName = null;

	/**
	 * Date and time the asset was ingested. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $ingestDate = null;

	/**
	 * The status result for the asset ingest.
	 *             FAILURE - the asset ingest was failed after the ingest process started, specify the error for it.
	 *             SUCCESS - the asset was succeeded to be ingested.
	 *             SUCCESS_WARNING - the asset was succeeded to be ingested with warnings that do not prevent the ingest.
	 *             EXTERNAL_FAILURE - the asset ingest was failed before the ingest process started, specify the error for it.
	 *
	 * @var KalturaVodIngestAssetResultStatus
	 */
	public $status = null;

	/**
	 * VOD asset type (assetStruct.systemName).
	 *
	 * @var string
	 */
	public $vodTypeSystemName = null;

	/**
	 * Errors which prevent the asset from being ingested
	 *
	 * @var array of KalturaVodIngestAssetResultErrorMessage
	 */
	public $errors;

	/**
	 * Errors which do not prevent the asset from being ingested
	 *
	 * @var array of KalturaVodIngestAssetResultErrorMessage
	 */
	public $warnings;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaVodIngestAssetResultList extends KalturaObjectBase
{
	/**
	 * list of KalturaVodIngestAssetResult
	 *
	 * @var array of KalturaVodIngestAssetResult
	 */
	public $objects;

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
class KalturaVodIngestAssetResultAggregation extends KalturaObjectBase
{
	/**
	 * Ingest date of the first asset in the response list. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $ingestDateFrom = null;

	/**
	 * Ingest date of the last asset in the response list. Date and time represented as epoch.
	 *
	 * @var int
	 */
	public $ingestDateTo = null;

	/**
	 * Number of assets which failed ingest. Calculated on the assets returned according to the applied filters.
	 *
	 * @var int
	 */
	public $failureCount = null;

	/**
	 * Number of assets which succeeded ingest without any warning. Calculated on the assets returned according to the applied filters.
	 *
	 * @var int
	 */
	public $successCount = null;

	/**
	 * Number of files (not assets) which failed ingest and are reported by external none-WS_ingest entity. Calculated on the failed files returned according to the applied filters.
	 *
	 * @var int
	 */
	public $externalFailureCount = null;

	/**
	 * Number of assets which succeeded ingest, but with warnings. Calculated on the assets returned according to the applied filters.
	 *
	 * @var int
	 */
	public $successWithWarningCount = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaVodIngestAssetResultResponse extends KalturaObjectBase
{
	/**
	 * Errors
	 *
	 * @var KalturaVodIngestAssetResultList
	 */
	public $result;

	/**
	 * Aggregated counters
	 *
	 * @var KalturaVodIngestAssetResultAggregation
	 */
	public $aggregations;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIotClientConfiguration extends KalturaObjectBase
{
	/**
	 * IdentityPoolId
	 *
	 * @var string
	 */
	public $identityPoolId = null;

	/**
	 * UserPoolId
	 *
	 * @var string
	 */
	public $userPoolId = null;

	/**
	 * AwsRegion
	 *
	 * @var string
	 */
	public $awsRegion = null;

	/**
	 * appClientId
	 *
	 * @var string
	 */
	public $appClientId = null;

	/**
	 * legacyEndPoint
	 *
	 * @var string
	 */
	public $legacyEndPoint = null;

	/**
	 * endPoint
	 *
	 * @var string
	 */
	public $endPoint = null;

	/**
	 * thingName
	 *
	 * @var string
	 */
	public $thingName = null;

	/**
	 * thingArn
	 *
	 * @var string
	 */
	public $thingArn = null;

	/**
	 * thingId
	 *
	 * @var string
	 */
	public $thingId = null;

	/**
	 * username
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * password
	 *
	 * @var string
	 */
	public $password = null;

	/**
	 * topics
	 *
	 * @var array of KalturaKeyValue
	 */
	public $topics;

	/**
	 * status
	 *
	 * @var string
	 */
	public $status = null;

	/**
	 * message
	 *
	 * @var string
	 */
	public $message = null;


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
class KalturaLiveToVodLinearAssetConfiguration extends KalturaObjectBase
{
	/**
	 * Linear asset&#39;s identifier.
	 *
	 * @var int
	 */
	public $linearAssetId = null;

	/**
	 * Enable/disable the feature per linear channel. Considered only if the flag is enabled on the account level.
	 *
	 * @var bool
	 */
	public $isL2vEnabled = null;

	/**
	 * Number of days the L2V asset is retained in the system.
	 *             Optional - if configured, overriding the account level value.
	 *
	 * @var int
	 */
	public $retentionPeriodDays = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveToVodFullConfiguration extends KalturaObjectBase
{
	/**
	 * Enable/disable the feature globally. If disabled, then all linear assets are not enabled.
	 *
	 * @var bool
	 */
	public $isL2vEnabled = null;

	/**
	 * Number of days the L2V asset is retained in the system.
	 *
	 * @var int
	 */
	public $retentionPeriodDays = null;

	/**
	 * The name (label) of the metadata field marking the program asset to be duplicated as a L2V asset.
	 *
	 * @var string
	 */
	public $metadataClassifier = null;

	/**
	 * Configuring isL2vEnabled/retentionPeriodDays per each channel, overriding the defaults set in the global isL2vEnabled and retentionPeriodDays parameters.
	 *
	 * @var array of KalturaLiveToVodLinearAssetConfiguration
	 */
	public $linearAssets;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveToVodPartnerConfiguration extends KalturaObjectBase
{
	/**
	 * Enable/disable the feature globally. If disabled, then all linear assets are not enabled.
	 *
	 * @var bool
	 */
	public $isL2vEnabled = null;

	/**
	 * Number of days the L2V asset is retained in the system.
	 *
	 * @var int
	 */
	public $retentionPeriodDays = null;

	/**
	 * The name (label) of the metadata field marking the program asset to be duplicated as a L2V asset.
	 *
	 * @var string
	 */
	public $metadataClassifier = null;


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
class KalturaMultifactorAuthenticationPartnerConfiguration extends KalturaObjectBase
{
	/**
	 * Is MFA Enabled for partner
	 *
	 * @var bool
	 */
	public $isEnabled = null;

	/**
	 * Roles
	 *
	 * @var string
	 */
	public $roles = null;

	/**
	 * Token expiration in seconds
	 *
	 * @var int
	 */
	public $tokenExpirationInSeconds = null;

	/**
	 * Token delivery method
	 *
	 * @var KalturaTokenDeliveryMethod
	 */
	public $tokenDeliveryMethod = null;


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

	/**
	 * Device unique identifier
	 *
	 * @var string
	 */
	public $udid = null;

	/**
	 * PushChannels - separated with comma
	 *
	 * @var string
	 */
	public $pushChannels = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEpgNotificationSettings extends KalturaObjectBase
{
	/**
	 * EPG notification capability is enabled for the account
	 *
	 * @var bool
	 */
	public $enabled = null;

	/**
	 * Specify which devices should receive notifications
	 *
	 * @var string
	 */
	public $deviceFamilyIds = null;

	/**
	 * Specify which live assets should fire notifications
	 *
	 * @var string
	 */
	public $liveAssetIds = null;

	/**
	 * The backward range (in hours), in which, EPG updates triggers a notification,
	 *             every program that is updated and it’s starts time falls within this range shall trigger a notification
	 *
	 * @var int
	 */
	public $backwardTimeRange = null;

	/**
	 * The forward range (in hours), in which, EPG updates triggers a notification,
	 *             every program that is updated and it’s starts time falls within this range shall trigger a notification
	 *
	 * @var int
	 */
	public $forwardTimeRange = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLineupNotificationSettings extends KalturaObjectBase
{
	/**
	 * if lineup notifications are enabled.
	 *
	 * @var bool
	 */
	public $enabled = null;


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

	/**
	 * IOT capability is enabled for the account
	 *
	 * @var bool
	 */
	public $iotEnabled = null;

	/**
	 * Settings for epg notifications
	 *
	 * @var KalturaEpgNotificationSettings
	 */
	public $epgNotification;

	/**
	 * Settings for lineup notifications
	 *
	 * @var KalturaLineupNotificationSettings
	 */
	public $lineupNotification;


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

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaResendMfaTokenResponse extends KalturaObjectBase
{
	/**
	 * Result of resend MFA token operation
	 *
	 * @var bool
	 */
	public $result = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerSetup extends KalturaObjectBase
{
	/**
	 * admin Username
	 *
	 * @var string
	 */
	public $adminUsername = null;

	/**
	 * admin Password
	 *
	 * @var string
	 */
	public $adminPassword = null;

	/**
	 * basePartnerConfiguration
	 *
	 * @var KalturaBasePartnerConfiguration
	 */
	public $basePartnerConfiguration;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerPremiumService extends KalturaObjectBase
{
	/**
	 * Service identifier
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * Service name / description
	 *
	 * @var string
	 * @readonly
	 */
	public $name = null;

	/**
	 * Service name / description
	 *
	 * @var bool
	 */
	public $isApplied = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerPremiumServices extends KalturaObjectBase
{
	/**
	 * A list of services
	 *
	 * @var array of KalturaPartnerPremiumService
	 */
	public $objects;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalActivityCleanupConfiguration extends KalturaObjectBase
{
	/**
	 * Retention Period Days
	 *
	 * @var int
	 */
	public $retentionPeriodDays = null;


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
class KalturaActionResult extends KalturaObjectBase
{
	/**
	 * Identifier of entity
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Identifier of entity
	 *
	 * @var KalturaMessage
	 * @readonly
	 */
	public $result;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionChannelNumber extends KalturaObjectBase
{
	/**
	 * The identifier of the region
	 *
	 * @var int
	 */
	public $regionId = null;

	/**
	 * The LCN of a channel
	 *
	 * @var int
	 */
	public $channelNumber = null;

	/**
	 * The dynamic data of a channel
	 *
	 * @var map
	 */
	public $dynamicData;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionChannelNumberMultiLcns extends KalturaRegionChannelNumber
{
	/**
	 * Linear channel numbers
	 *
	 * @var string
	 */
	public $lcns = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchPriorityGroupOrderedIdsSet extends KalturaObjectBase
{
	/**
	 * The order and effectively the priority of each group.
	 *
	 * @var string
	 */
	public $priorityGroupIds = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentationPartnerConfiguration extends KalturaObjectBase
{
	/**
	 * The maximum number of past days to be calculated for dynamic segments, default=180
	 *
	 * @var int
	 */
	public $maxCalculatedPeriod = null;

	/**
	 * How many dynamic segments (segments with conditions) the operator is allowed to have, default=50
	 *
	 * @var int
	 */
	public $maxDynamicSegments = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchableAttribute extends KalturaObjectBase
{
	/**
	 * The unique identifier of the asset structure.
	 *
	 * @var int
	 */
	public $assetStructId = null;

	/**
	 * Comma-separated list of field names to include in embedding.
	 *
	 * @var string
	 */
	public $attributes = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchableAttributes extends KalturaObjectBase
{
	/**
	 * A list of searchable attributes.
	 *
	 * @var array of KalturaSearchableAttribute
	 */
	public $items;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFilteringCondition extends KalturaObjectBase
{
	/**
	 * Meta Name (SystemName) to apply the rule to.
	 *
	 * @var string
	 */
	public $metaName = null;

	/**
	 * Operator to use for the rule.
	 *
	 * @var KalturaConditionOperator
	 */
	public $operator = null;

	/**
	 * Single value for the rule condition.
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGenerateSemanticQuery extends KalturaObjectBase
{
	/**
	 * A primary query to be extended with multiple sub-queries.
	 *
	 * @var string
	 */
	public $text = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSemanticSubQuery extends KalturaObjectBase
{
	/**
	 * The text generated for the sub-query.
	 *
	 * @var string
	 */
	public $text = null;

	/**
	 * The name generated for the sub-query, using the account&#39;s Primary language.
	 *
	 * @var KalturaTranslationToken
	 */
	public $name;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSemanticQuery extends KalturaObjectBase
{
	/**
	 * A list of generated sub-queries.
	 *
	 * @var array of KalturaSemanticSubQuery
	 */
	public $subQueries;

	/**
	 * A title generated for the entire queries&#39; generation.
	 *
	 * @var string
	 */
	public $title = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSemanticQueryPartnerConfiguration extends KalturaObjectBase
{
	/**
	 * The number of sub-queries to generate, including the main (base) one. Optional, Requires Admin role.
	 *
	 * @var int
	 */
	public $subQueriesCount = null;

	/**
	 * The number of default sub-queries to generate if the primary requested query is empty. Optional, Requires Admin role.
	 *
	 * @var int
	 */
	public $defaultQueriesCount = null;

	/**
	 * The number of assets per suggested collection.
	 *
	 * @var int
	 */
	public $assetsPerCollectionCount = null;


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
class KalturaSSOAdapterProfileInvoke extends KalturaObjectBase
{
	/**
	 * key/value map field for adapter data
	 *
	 * @var map
	 */
	public $adapterData;

	/**
	 * code
	 *
	 * @var string
	 */
	public $code = null;

	/**
	 * message
	 *
	 * @var string
	 */
	public $message = null;


}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadSubtitles extends KalturaObjectBase
{
	/**
	 * Name of the subtitles file.
	 *
	 * @var string
	 */
	public $fileName = null;

	/**
	 * The language in which the subtitles are written.
	 *
	 * @var string
	 */
	public $language = null;


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

	/**
	 * Is private copy enabled for the account
	 *
	 * @var bool
	 */
	public $privateCopyEnabled = null;

	/**
	 * Quota in seconds
	 *
	 * @var int
	 */
	public $defaultQuota = null;

	/**
	 * Define whatever the partner enables the Personal Padding and Immediate / Stop recording services to the partner. Default value should be FALSE
	 *
	 * @var bool
	 */
	public $personalizedRecording = null;

	/**
	 * Define the max allowed number of parallel recordings. Default NULL unlimited
	 *
	 * @var int
	 */
	public $maxRecordingConcurrency = null;

	/**
	 * Define the max grace margin time for overlapping recording. Default NULL 0 margin
	 *
	 * @var int
	 */
	public $maxConcurrencyMargin = null;

	/**
	 * When using padded and immediate recordings, define if end date of recording should be rounded by the minute or by the second.
	 *             Default by minutes, FALSE.
	 *
	 * @var bool
	 */
	public $shouldRoundStopRecordingsBySeconds = null;


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
class KalturaWatchBasedRecommendationsAdminConfiguration extends KalturaObjectBase
{
	/**
	 * The maximum number of profiles.
	 *
	 * @var int
	 */
	public $maxProfiles = null;

	/**
	 * The duration that a user is considered active after his last playback.
	 *
	 * @var int
	 */
	public $activeUserDurationDays = null;

	/**
	 * The number of days the recommendations will be cached.
	 *
	 * @var int
	 */
	public $recommendationsCachingTimeDays = null;


}


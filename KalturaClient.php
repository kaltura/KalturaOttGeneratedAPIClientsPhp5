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
// Copyright (C) 2006-2022  Kaltura Inc.
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
require_once(dirname(__FILE__) . "/KalturaEnums.php");
require_once(dirname(__FILE__) . "/KalturaTypes.php");


/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncementService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new future scheduled system announcement push notification
	 * 
	 * @param KalturaAnnouncement $announcement The announcement to be added.
            timezone parameter should be taken from the 'name of timezone' from: https://msdn.microsoft.com/en-us/library/ms912391(v=winembedded.11).aspx
            Recipients values: All, LoggedIn, Guests
	 * @return KalturaAnnouncement
	 */
	function add(KalturaAnnouncement $announcement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "announcement", $announcement->toParams());
		$this->client->queueServiceActionCall("announcement", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnouncement");
		return $resultObject;
	}

	/**
	 * Delete an existing announcing. Announcement cannot be delete while being sent.
	 * 
	 * @param bigint $id Id of the announcement.
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("announcement", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Enable system announcements
	 * 
	 * @return bool
	 */
	function enableSystemAnnouncements()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("announcement", "enableSystemAnnouncements", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Lists all announcements in the system.
	 * 
	 * @param KalturaAnnouncementFilter $filter Filter object
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaAnnouncementListResponse
	 */
	function listAction(KalturaAnnouncementFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("announcement", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnouncementListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing future system announcement push notification. Announcement can only be updated only before sending
	 * 
	 * @param int $announcementId The announcement identifier
	 * @param KalturaAnnouncement $announcement The announcement to update.
            timezone parameter should be taken from the 'name of timezone' from: https://msdn.microsoft.com/en-us/library/ms912391(v=winembedded.11).aspx
            Recipients values: All, LoggedIn, Guests
	 * @return KalturaAnnouncement
	 */
	function update($announcementId, KalturaAnnouncement $announcement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "announcementId", $announcementId);
		$this->client->addParam($kparams, "announcement", $announcement->toParams());
		$this->client->queueServiceActionCall("announcement", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnouncement");
		return $resultObject;
	}

	/**
	 * Update a system announcement status
	 * 
	 * @param bigint $id Id of the announcement.
	 * @param bool $status Status to update to.
	 * @return bool
	 */
	function updateStatus($id, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "status", $status);
		$this->client->queueServiceActionCall("announcement", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAppTokenService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new application authentication token
	 * 
	 * @param KalturaAppToken $appToken Application token
	 * @return KalturaAppToken
	 */
	function add(KalturaAppToken $appToken)
	{
		$kparams = array();
		$this->client->addParam($kparams, "appToken", $appToken->toParams());
		$this->client->queueServiceActionCall("apptoken", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAppToken");
		return $resultObject;
	}

	/**
	 * Delete application authentication token by id
	 * 
	 * @param string $id Application token identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("apptoken", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get application authentication token by id
	 * 
	 * @param string $id Application token identifier
	 * @return KalturaAppToken
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("apptoken", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAppToken");
		return $resultObject;
	}

	/**
	 * Starts a new KS (Kaltura Session) based on application authentication token id
	 * 
	 * @param string $id Application token id
	 * @param string $tokenHash Hashed token - current KS concatenated with the application token hashed using the application token ‘hashType’
	 * @param string $userId Session user id, will be ignored if a different user id already defined on the application token
	 * @param int $expiry Session expiry (in seconds), could be overwritten by shorter expiry of the application token and the session-expiry that defined on the application token
	 * @param string $udid Device UDID
	 * @return KalturaSessionInfo
	 */
	function startSession($id, $tokenHash, $userId = null, $expiry = null, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "tokenHash", $tokenHash);
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "expiry", $expiry);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("apptoken", "startSession", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSessionInfo");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCommentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add asset comments by asset id
	 * 
	 * @param KalturaAssetComment $comment Comment
	 * @return KalturaAssetComment
	 */
	function add(KalturaAssetComment $comment)
	{
		$kparams = array();
		$this->client->addParam($kparams, "comment", $comment->toParams());
		$this->client->queueServiceActionCall("assetcomment", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetComment");
		return $resultObject;
	}

	/**
	 * Returns asset comments by asset id
	 * 
	 * @param KalturaAssetCommentFilter $filter Filtering the assets comments request
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaAssetCommentListResponse
	 */
	function listAction(KalturaAssetCommentFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("assetcomment", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetCommentListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new asset.
            For metas of type bool-&gt; use kalturaBoolValue, type number-&gt; KalturaDoubleValue, type date -&gt; KalturaLongValue, type string -&gt; KalturaStringValue
	 * 
	 * @param KalturaAsset $asset Asset object
	 * @return KalturaAsset
	 */
	function add(KalturaAsset $asset)
	{
		$kparams = array();
		$this->client->addParam($kparams, "asset", $asset->toParams());
		$this->client->queueServiceActionCall("asset", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAsset");
		return $resultObject;
	}

	/**
	 * Add new bulk upload batch job Conversion profile id can be specified in the API.
	 * 
	 * @param file $fileData FileData
	 * @param KalturaBulkUploadJobData $bulkUploadJobData BulkUploadJobData
	 * @param KalturaBulkUploadAssetData $bulkUploadAssetData BulkUploadAssetData
	 * @return KalturaBulkUpload
	 */
	function addFromBulkUpload($fileData, KalturaBulkUploadJobData $bulkUploadJobData, KalturaBulkUploadAssetData $bulkUploadAssetData)
	{
		$kparams = array();
		$kfiles = array();
		$this->client->addParam($kfiles, "fileData", $fileData);
		$this->client->addParam($kparams, "bulkUploadJobData", $bulkUploadJobData->toParams());
		$this->client->addParam($kparams, "bulkUploadAssetData", $bulkUploadAssetData->toParams());
		$this->client->queueServiceActionCall("asset", "addFromBulkUpload", $kparams, $kfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUpload");
		return $resultObject;
	}

	/**
	 * Returns a group-by result for media or EPG according to given filter. Lists values of each field and their respective count.
	 * 
	 * @param KalturaSearchAssetFilter $filter Filtering the assets request
	 * @return KalturaAssetCount
	 */
	function count(KalturaSearchAssetFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("asset", "count", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetCount");
		return $resultObject;
	}

	/**
	 * Delete an existing asset
	 * 
	 * @param bigint $id Asset Identifier
	 * @param string $assetReferenceType Type of asset
	 * @return bool
	 */
	function delete($id, $assetReferenceType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetReferenceType", $assetReferenceType);
		$this->client->queueServiceActionCall("asset", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns media or EPG asset by media / EPG internal or external identifier
	 * 
	 * @param string $id Asset identifier
	 * @param string $assetReferenceType Asset type
	 * @return KalturaAsset
	 */
	function get($id, $assetReferenceType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetReferenceType", $assetReferenceType);
		$this->client->queueServiceActionCall("asset", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAsset");
		return $resultObject;
	}

	/**
	 * Returns the data for ads control
	 * 
	 * @param string $assetId Asset identifier
	 * @param string $assetType Asset type
	 * @param KalturaPlaybackContextOptions $contextDataParams Parameters for the request
	 * @return KalturaAdsContext
	 */
	function getAdsContext($assetId, $assetType, KalturaPlaybackContextOptions $contextDataParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "contextDataParams", $contextDataParams->toParams());
		$this->client->queueServiceActionCall("asset", "getAdsContext", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAdsContext");
		return $resultObject;
	}

	/**
	 * This action delivers all data relevant for player
	 * 
	 * @param string $assetId Asset identifier
	 * @param string $assetType Asset type
	 * @param KalturaPlaybackContextOptions $contextDataParams Parameters for the request
	 * @param string $sourceType Filter sources by type
	 * @return KalturaPlaybackContext
	 */
	function getPlaybackContext($assetId, $assetType, KalturaPlaybackContextOptions $contextDataParams, $sourceType = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "contextDataParams", $contextDataParams->toParams());
		$this->client->addParam($kparams, "sourceType", $sourceType);
		$this->client->queueServiceActionCall("asset", "getPlaybackContext", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaybackContext");
		return $resultObject;
	}

	/**
	 * This action delivers all data relevant for player
	 * 
	 * @param string $assetId Asset identifier
	 * @param string $assetType Asset type
	 * @param KalturaPlaybackContextOptions $contextDataParams Parameters for the request
	 * @param string $sourceType Filter sources by type
	 * @return KalturaPlaybackContext
	 */
	function getPlaybackManifest($assetId, $assetType, KalturaPlaybackContextOptions $contextDataParams, $sourceType = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "contextDataParams", $contextDataParams->toParams());
		$this->client->addParam($kparams, "sourceType", $sourceType);
		$this->client->queueServiceActionCall("asset", "getPlaybackManifest", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaybackContext");
		return $resultObject;
	}

	/**
	 * Returns assets deduplicated by asset metadata (or supported asset&#39;s property).
	 * 
	 * @param KalturaAssetGroupBy $groupBy A metadata (or supported asset's property) to group by the assets
	 * @param string $unmatchedItemsPolicy Defines the policy to handle assets that don't have groupBy property
	 * @param KalturaBaseAssetOrder $orderBy A metadata or supported asset's property to sort by
	 * @param KalturaListGroupsRepresentativesFilter $filter Filtering the assets request
	 * @param KalturaRepresentativeSelectionPolicy $selectionPolicy A policy that implements a well defined parametric process to select an asset out of group
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaAssetListResponse
	 */
	function groupRepresentativeList(KalturaAssetGroupBy $groupBy, $unmatchedItemsPolicy, KalturaBaseAssetOrder $orderBy = null, KalturaListGroupsRepresentativesFilter $filter = null, KalturaRepresentativeSelectionPolicy $selectionPolicy = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "groupBy", $groupBy->toParams());
		$this->client->addParam($kparams, "unmatchedItemsPolicy", $unmatchedItemsPolicy);
		if ($orderBy !== null)
			$this->client->addParam($kparams, "orderBy", $orderBy->toParams());
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($selectionPolicy !== null)
			$this->client->addParam($kparams, "selectionPolicy", $selectionPolicy->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("asset", "groupRepresentativeList", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetListResponse");
		return $resultObject;
	}

	/**
	 * Returns media or EPG assets. Filters by media identifiers or by EPG internal or external identifier.
	 * 
	 * @param KalturaAssetFilter $filter Filtering the assets request
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaAssetListResponse
	 */
	function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("asset", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetListResponse");
		return $resultObject;
	}

	/**
	 * Returns recent selected assets
	 * 
	 * @param KalturaPersonalAssetSelectionFilter $filter Filtering the assets request
	 * @return KalturaAssetListResponse
	 */
	function listPersonalSelection(KalturaPersonalAssetSelectionFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("asset", "listPersonalSelection", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetListResponse");
		return $resultObject;
	}

	/**
	 * Remove metas and tags from asset
	 * 
	 * @param bigint $id Asset Identifier
	 * @param string $assetReferenceType Type of asset
	 * @param string $idIn Comma separated ids of metas and tags
	 * @return bool
	 */
	function removeMetasAndTags($id, $assetReferenceType, $idIn)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetReferenceType", $assetReferenceType);
		$this->client->addParam($kparams, "idIn", $idIn);
		$this->client->queueServiceActionCall("asset", "removeMetasAndTags", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update an existing asset.
            For metas of type bool-&gt; use kalturaBoolValue, type number-&gt; KalturaDoubleValue, type date -&gt; KalturaLongValue, type string -&gt; KalturaStringValue
	 * 
	 * @param bigint $id Asset Identifier
	 * @param KalturaAsset $asset Asset object
	 * @return KalturaAsset
	 */
	function update($id, KalturaAsset $asset)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "asset", $asset->toParams());
		$this->client->queueServiceActionCall("asset", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAsset");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get KalturaAssetFileContext
	 * 
	 * @param string $id Asset file identifier
	 * @param string $contextType Kaltura Context Type (none = 0, recording = 1)
	 * @return KalturaAssetFileContext
	 */
	function getContext($id, $contextType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "contextType", $contextType);
		$this->client->queueServiceActionCall("assetfile", "getContext", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetFileContext");
		return $resultObject;
	}

	/**
	 * Redirects to play manifest
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $assetId Asset identifier
	 * @param string $assetType Asset type
	 * @param bigint $assetFileId Asset file identifier
	 * @param string $contextType Playback context type
	 * @param string $ks Kaltura session for the user, not mandatory for anonymous user
	 * @param string $tokenizedUrl Tokenized Url, not mandatory
	 * @param bool $isAltUrl Is alternative url
	 * @return KalturaAssetFile
	 */
	function playManifest($partnerId, $assetId, $assetType, $assetFileId, $contextType, $ks = null, $tokenizedUrl = null, $isAltUrl = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "assetFileId", $assetFileId);
		$this->client->addParam($kparams, "contextType", $contextType);
		$this->client->addParam($kparams, "ks", $ks);
		$this->client->addParam($kparams, "tokenizedUrl", $tokenizedUrl);
		$this->client->addParam($kparams, "isAltUrl", $isAltUrl);
		$this->client->queueServiceActionCall("assetfile", "playManifest", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetFile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFilePpvService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add asset file ppv
	 * 
	 * @param KalturaAssetFilePpv $assetFilePpv Asset file ppv
	 * @return KalturaAssetFilePpv
	 */
	function add(KalturaAssetFilePpv $assetFilePpv)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetFilePpv", $assetFilePpv->toParams());
		$this->client->queueServiceActionCall("assetfileppv", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetFilePpv");
		return $resultObject;
	}

	/**
	 * Delete asset file ppv
	 * 
	 * @param bigint $assetFileId Asset file id
	 * @param bigint $ppvModuleId Ppv module id
	 * @return bool
	 */
	function delete($assetFileId, $ppvModuleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetFileId", $assetFileId);
		$this->client->addParam($kparams, "ppvModuleId", $ppvModuleId);
		$this->client->queueServiceActionCall("assetfileppv", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return a list of asset files ppvs for the account with optional filter
	 * 
	 * @param KalturaAssetFilePpvFilter $filter Filter parameters for filtering out the result
	 * @return KalturaAssetFilePpvListResponse
	 */
	function listAction(KalturaAssetFilePpvFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assetfileppv", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetFilePpvListResponse");
		return $resultObject;
	}

	/**
	 * Update assetFilePpv
	 * 
	 * @param bigint $assetFileId Asset file id
	 * @param bigint $ppvModuleId Ppv module id
	 * @param KalturaAssetFilePpv $assetFilePpv AssetFilePpv
	 * @return KalturaAssetFilePpv
	 */
	function update($assetFileId, $ppvModuleId, KalturaAssetFilePpv $assetFilePpv)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetFileId", $assetFileId);
		$this->client->addParam($kparams, "ppvModuleId", $ppvModuleId);
		$this->client->addParam($kparams, "assetFilePpv", $assetFilePpv->toParams());
		$this->client->queueServiceActionCall("assetfileppv", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetFilePpv");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetHistoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Clean the user’s viewing history
	 * 
	 * @param KalturaAssetHistoryFilter $filter List of assets identifier
	 */
	function clean(KalturaAssetHistoryFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assethistory", "clean", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Get next episode by last watch asset in given assetId
	 * 
	 * @param bigint $assetId Asset Id of series to search for next episode
	 * @return KalturaAssetHistory
	 */
	function getNextEpisode($assetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->queueServiceActionCall("assethistory", "getNextEpisode", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetHistory");
		return $resultObject;
	}

	/**
	 * Get recently watched media for user, ordered by recently watched first.
	 * 
	 * @param KalturaAssetHistoryFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index. Number of assets to return per page. Possible range 5 ≤ size ≥ 50. If omitted - will be set to 25. If a value > 50 provided – will set to 50
	 * @return KalturaAssetHistoryListResponse
	 */
	function listAction(KalturaAssetHistoryFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("assethistory", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetHistoryListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetPersonalMarkupService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Response with list of assetPersonalMarkup.
	 * 
	 * @param KalturaAssetPersonalMarkupSearchFilter $filter Filter pager
	 * @return KalturaAssetPersonalMarkupListResponse
	 */
	function listAction(KalturaAssetPersonalMarkupSearchFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assetpersonalmarkup", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetPersonalMarkupListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetPersonalSelectionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Remove asset selection in slot
	 * 
	 * @param bigint $assetId Asset id
	 * @param string $assetType Asset type: media/epg
	 * @param int $slotNumber Slot number
	 */
	function delete($assetId, $assetType, $slotNumber)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "slotNumber", $slotNumber);
		$this->client->queueServiceActionCall("assetpersonalselection", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Remove asset selection in slot
	 * 
	 * @param int $slotNumber Slot number
	 */
	function deleteAll($slotNumber)
	{
		$kparams = array();
		$this->client->addParam($kparams, "slotNumber", $slotNumber);
		$this->client->queueServiceActionCall("assetpersonalselection", "deleteAll", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Add or update asset selection in slot
	 * 
	 * @param bigint $assetId Asset id
	 * @param string $assetType Asset type: media/epg
	 * @param int $slotNumber Slot number
	 * @return KalturaAssetPersonalSelection
	 */
	function upsert($assetId, $assetType, $slotNumber)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "slotNumber", $slotNumber);
		$this->client->queueServiceActionCall("assetpersonalselection", "upsert", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetPersonalSelection");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add asset rule
	 * 
	 * @param KalturaAssetRule $assetRule Asset rule
	 * @return KalturaAssetRule
	 */
	function add(KalturaAssetRule $assetRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetRule", $assetRule->toParams());
		$this->client->queueServiceActionCall("assetrule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetRule");
		return $resultObject;
	}

	/**
	 * Delete asset rule
	 * 
	 * @param bigint $id Asset rule ID
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("assetrule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the list of asset rules for the partner
	 * 
	 * @param KalturaAssetRuleFilter $filter Filter by condition name
	 * @return KalturaAssetRuleListResponse
	 */
	function listAction(KalturaAssetRuleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assetrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetRuleListResponse");
		return $resultObject;
	}

	/**
	 * Update asset rule
	 * 
	 * @param bigint $id Asset rule ID to update
	 * @param KalturaAssetRule $assetRule Asset rule
	 * @return KalturaAssetRule
	 */
	function update($id, KalturaAssetRule $assetRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetRule", $assetRule->toParams());
		$this->client->queueServiceActionCall("assetrule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetRule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStatisticsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns statistics for given list of assets by type and / or time period
	 * 
	 * @param KalturaAssetStatisticsQuery $query Query for assets statistics
	 * @return KalturaAssetStatisticsListResponse
	 */
	function query(KalturaAssetStatisticsQuery $query)
	{
		$kparams = array();
		$this->client->addParam($kparams, "query", $query->toParams());
		$this->client->queueServiceActionCall("assetstatistics", "query", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStatisticsListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new assetStruct
	 * 
	 * @param KalturaAssetStruct $assetStruct AssetStruct Object
	 * @return KalturaAssetStruct
	 */
	function add(KalturaAssetStruct $assetStruct)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetStruct", $assetStruct->toParams());
		$this->client->queueServiceActionCall("assetstruct", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStruct");
		return $resultObject;
	}

	/**
	 * Delete an existing assetStruct
	 * 
	 * @param bigint $id AssetStruct Identifier, id = 0 is identified as program AssetStruct
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("assetstruct", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get AssetStruct by ID
	 * 
	 * @param bigint $id ID to get
	 * @return KalturaAssetStruct
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("assetstruct", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStruct");
		return $resultObject;
	}

	/**
	 * Return a list of asset structs for the account with optional filter
	 * 
	 * @param KalturaBaseAssetStructFilter $filter Filter parameters for filtering out the result
	 * @return KalturaAssetStructListResponse
	 */
	function listAction(KalturaBaseAssetStructFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assetstruct", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStructListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing assetStruct
	 * 
	 * @param bigint $id AssetStruct Identifier, id = 0 is identified as program AssetStruct
	 * @param KalturaAssetStruct $assetStruct AssetStruct Object
	 * @return KalturaAssetStruct
	 */
	function update($id, KalturaAssetStruct $assetStruct)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetStruct", $assetStruct->toParams());
		$this->client->queueServiceActionCall("assetstruct", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStruct");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStructMetaService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return a list of asset struct metas for the account with optional filter
	 * 
	 * @param KalturaAssetStructMetaFilter $filter Filter parameters for filtering out the result
	 * @return KalturaAssetStructMetaListResponse
	 */
	function listAction(KalturaAssetStructMetaFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assetstructmeta", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStructMetaListResponse");
		return $resultObject;
	}

	/**
	 * Update Asset struct meta
	 * 
	 * @param bigint $assetStructId AssetStruct Identifier
	 * @param bigint $metaId Meta Identifier
	 * @param KalturaAssetStructMeta $assetStructMeta AssetStructMeta Object
	 * @return KalturaAssetStructMeta
	 */
	function update($assetStructId, $metaId, KalturaAssetStructMeta $assetStructMeta)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetStructId", $assetStructId);
		$this->client->addParam($kparams, "metaId", $metaId);
		$this->client->addParam($kparams, "assetStructMeta", $assetStructMeta->toParams());
		$this->client->queueServiceActionCall("assetstructmeta", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStructMeta");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetUserRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add asset user rule
	 * 
	 * @param KalturaAssetUserRule $assetUserRule Asset user rule
	 * @return KalturaAssetUserRule
	 */
	function add(KalturaAssetUserRule $assetUserRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetUserRule", $assetUserRule->toParams());
		$this->client->queueServiceActionCall("assetuserrule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetUserRule");
		return $resultObject;
	}

	/**
	 * Attach AssetUserRule To User
	 * 
	 * @param bigint $ruleId AssetUserRule id to add
	 */
	function attachUser($ruleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("assetuserrule", "attachUser", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Delete asset user rule
	 * 
	 * @param bigint $id Asset user rule ID
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("assetuserrule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Detach AssetUserRule from user
	 * 
	 * @param bigint $ruleId AssetUserRule id to remove
	 */
	function detachUser($ruleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("assetuserrule", "detachUser", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Get the list of asset user rules for the partner
	 * 
	 * @param KalturaAssetUserRuleFilter $filter AssetUserRule Filter
	 * @return KalturaAssetUserRuleListResponse
	 */
	function listAction(KalturaAssetUserRuleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assetuserrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetUserRuleListResponse");
		return $resultObject;
	}

	/**
	 * Update asset user rule
	 * 
	 * @param bigint $id Asset user rule ID to update
	 * @param KalturaAssetUserRule $assetUserRule Asset user rule
	 * @return KalturaAssetUserRule
	 */
	function update($id, KalturaAssetUserRule $assetUserRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetUserRule", $assetUserRule->toParams());
		$this->client->queueServiceActionCall("assetuserrule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetUserRule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Report player position and action for the user on the watched asset. Player position is used to later allow resume watching.
	 * 
	 * @param KalturaBookmark $bookmark Bookmark details
	 * @return bool
	 */
	function add(KalturaBookmark $bookmark)
	{
		$kparams = array();
		$this->client->addParam($kparams, "bookmark", $bookmark->toParams());
		$this->client->queueServiceActionCall("bookmark", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns player position record/s for the requested asset and the requesting user. 
            If default user makes the request – player position records are provided for all of the users in the household.
            If non-default user makes the request - player position records are provided for the requesting user and the default user of the household.
	 * 
	 * @param KalturaBookmarkFilter $filter Filter option for the last position
	 * @return KalturaBookmarkListResponse
	 */
	function listAction(KalturaBookmarkFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("bookmark", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBookmarkListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get BulkUpload by ID
	 * 
	 * @param bigint $id ID to get
	 * @return KalturaBulkUpload
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUpload");
		return $resultObject;
	}

	/**
	 * Get list of KalturaBulkUpload by filter
	 * 
	 * @param KalturaBulkUploadFilter $filter Filtering the bulk action request
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaBulkUploadListResponse
	 */
	function listAction(KalturaBulkUploadFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("bulkupload", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUploadListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBulkUploadStatisticsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get BulkUploadStatistics count summary by status
	 * 
	 * @param string $bulkObjectTypeEqual BulkUploadObject for status summary
	 * @param bigint $createDateGreaterThanOrEqual Date created filter
	 * @return KalturaBulkUploadStatistics
	 */
	function get($bulkObjectTypeEqual, $createDateGreaterThanOrEqual)
	{
		$kparams = array();
		$this->client->addParam($kparams, "bulkObjectTypeEqual", $bulkObjectTypeEqual);
		$this->client->addParam($kparams, "createDateGreaterThanOrEqual", $createDateGreaterThanOrEqual);
		$this->client->queueServiceActionCall("bulkuploadstatistics", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUploadStatistics");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBusinessModuleRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add business module rule
	 * 
	 * @param KalturaBusinessModuleRule $businessModuleRule Business module rule
	 * @return KalturaBusinessModuleRule
	 */
	function add(KalturaBusinessModuleRule $businessModuleRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "businessModuleRule", $businessModuleRule->toParams());
		$this->client->queueServiceActionCall("businessmodulerule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBusinessModuleRule");
		return $resultObject;
	}

	/**
	 * Delete business module rule
	 * 
	 * @param bigint $id Business module rule ID
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("businessmodulerule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Get business module rule by ID
	 * 
	 * @param bigint $id ID to get
	 * @return KalturaBusinessModuleRule
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("businessmodulerule", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBusinessModuleRule");
		return $resultObject;
	}

	/**
	 * Get the list of business module rules for the partner
	 * 
	 * @param KalturaBusinessModuleRuleFilter $filter Filter by condition name
	 * @return KalturaBusinessModuleRuleListResponse
	 */
	function listAction(KalturaBusinessModuleRuleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("businessmodulerule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBusinessModuleRuleListResponse");
		return $resultObject;
	}

	/**
	 * Update business module rule
	 * 
	 * @param bigint $id Business module rule ID to update
	 * @param KalturaBusinessModuleRule $businessModuleRule Business module rule
	 * @return KalturaBusinessModuleRule
	 */
	function update($id, KalturaBusinessModuleRule $businessModuleRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "businessModuleRule", $businessModuleRule->toParams());
		$this->client->queueServiceActionCall("businessmodulerule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBusinessModuleRule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCampaignService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new Campaign
	 * 
	 * @param KalturaCampaign $objectToAdd Campaign Object to add
	 * @return KalturaCampaign
	 */
	function add(KalturaCampaign $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("campaign", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCampaign");
		return $resultObject;
	}

	/**
	 * Delete existing Campaign
	 * 
	 * @param bigint $id Campaign identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("campaign", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns the list of available Campaigns
	 * 
	 * @param KalturaCampaignFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaCampaignListResponse
	 */
	function listAction(KalturaCampaignFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("campaign", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCampaignListResponse");
		return $resultObject;
	}

	/**
	 * Set campaign&#39;s state
	 * 
	 * @param bigint $campaignId Campaign Id
	 * @param string $newState New campaign state
	 */
	function setState($campaignId, $newState)
	{
		$kparams = array();
		$this->client->addParam($kparams, "campaignId", $campaignId);
		$this->client->addParam($kparams, "newState", $newState);
		$this->client->queueServiceActionCall("campaign", "setState", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Update existing Campaign
	 * 
	 * @param bigint $id Id of Campaign to update
	 * @param KalturaCampaign $objectToUpdate Campaign Object to update
	 * @return KalturaCampaign
	 */
	function update($id, KalturaCampaign $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("campaign", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCampaign");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryItemService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * CategoryItem add
	 * 
	 * @param KalturaCategoryItem $objectToAdd CategoryItem details
	 * @return KalturaCategoryItem
	 */
	function add(KalturaCategoryItem $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("categoryitem", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryItem");
		return $resultObject;
	}

	/**
	 * Remove category
	 * 
	 * @param bigint $id Category identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("categoryitem", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Gets all categoryItem items
	 * 
	 * @param KalturaCategoryItemFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaCategoryItemListResponse
	 */
	function listAction(KalturaCategoryItemFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("categoryitem", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryItemListResponse");
		return $resultObject;
	}

	/**
	 * CategoryItem update
	 * 
	 * @param bigint $id Category identifier
	 * @param KalturaCategoryItem $objectToUpdate CategoryItem details
	 * @return KalturaCategoryItem
	 */
	function update($id, KalturaCategoryItem $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("categoryitem", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryItem");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryTreeService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Duplicate category Item
	 * 
	 * @param bigint $categoryItemId Category item identifier
	 * @param string $name Root category name
	 * @return KalturaCategoryTree
	 */
	function duplicate($categoryItemId, $name)
	{
		$kparams = array();
		$this->client->addParam($kparams, "categoryItemId", $categoryItemId);
		$this->client->addParam($kparams, "name", $name);
		$this->client->queueServiceActionCall("categorytree", "duplicate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryTree");
		return $resultObject;
	}

	/**
	 * Retrive category tree.
	 * 
	 * @param bigint $categoryItemId Category item identifier
	 * @param bool $filter Filter categories dates
	 * @return KalturaCategoryTree
	 */
	function get($categoryItemId, $filter = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "categoryItemId", $categoryItemId);
		$this->client->addParam($kparams, "filter", $filter);
		$this->client->queueServiceActionCall("categorytree", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryTree");
		return $resultObject;
	}

	/**
	 * Retrieve default category tree of deviceFamilyId by KS or specific one if versionId is set.
	 * 
	 * @param bigint $versionId Category version id of tree
	 * @param int $deviceFamilyId DeviceFamilyId related to category tree
	 * @return KalturaCategoryTree
	 */
	function getByVersion($versionId = null, $deviceFamilyId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "versionId", $versionId);
		$this->client->addParam($kparams, "deviceFamilyId", $deviceFamilyId);
		$this->client->queueServiceActionCall("categorytree", "getByVersion", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryTree");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCategoryVersionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * CategoryVersion add
	 * 
	 * @param KalturaCategoryVersion $objectToAdd CategoryVersion details
	 * @return KalturaCategoryVersion
	 */
	function add(KalturaCategoryVersion $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("categoryversion", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryVersion");
		return $resultObject;
	}

	/**
	 * Acreate new tree for this categoryItem
	 * 
	 * @param bigint $categoryItemId The categoryItemId to create the tree accordingly
	 * @param string $name Name of version
	 * @param string $comment Comment of version
	 * @return KalturaCategoryVersion
	 */
	function createTree($categoryItemId, $name, $comment)
	{
		$kparams = array();
		$this->client->addParam($kparams, "categoryItemId", $categoryItemId);
		$this->client->addParam($kparams, "name", $name);
		$this->client->addParam($kparams, "comment", $comment);
		$this->client->queueServiceActionCall("categoryversion", "createTree", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryVersion");
		return $resultObject;
	}

	/**
	 * Remove category version
	 * 
	 * @param bigint $id Category version identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("categoryversion", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Gets all category versions
	 * 
	 * @param KalturaCategoryVersionFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaCategoryVersionListResponse
	 */
	function listAction(KalturaCategoryVersionFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("categoryversion", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryVersionListResponse");
		return $resultObject;
	}

	/**
	 * Set new default category version
	 * 
	 * @param bigint $id Category version id to set as default
	 * @param bool $force Force to set even if version is older then currenct version
	 */
	function setDefault($id, $force = false)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "force", $force);
		$this->client->queueServiceActionCall("categoryversion", "setDefault", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * CategoryVersion update
	 * 
	 * @param bigint $id Category version identifier
	 * @param KalturaCategoryVersion $objectToUpdate CategoryVersion details
	 * @return KalturaCategoryVersion
	 */
	function update($id, KalturaCategoryVersion $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("categoryversion", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCategoryVersion");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCdnAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new CDN adapter for partner
	 * 
	 * @param KalturaCDNAdapterProfile $adapter CDN adapter object
	 * @return KalturaCDNAdapterProfile
	 */
	function add(KalturaCDNAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdnadapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfile");
		return $resultObject;
	}

	/**
	 * Delete CDN adapter by CDN adapter id
	 * 
	 * @param int $adapterId CDN adapter identifier
	 * @return bool
	 */
	function delete($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdnadapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate CDN adapter shared secret
	 * 
	 * @param int $adapterId CDN adapter identifier
	 * @return KalturaCDNAdapterProfile
	 */
	function generateSharedSecret($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdnadapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all CDN adapters for partner
	 * 
	 * @return KalturaCDNAdapterProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("cdnadapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update CDN adapter details
	 * 
	 * @param int $adapterId CDN adapter id to update
	 * @param KalturaCDNAdapterProfile $adapter CDN adapter Object
	 * @return KalturaCDNAdapterProfile
	 */
	function update($adapterId, KalturaCDNAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdnadapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCdnPartnerSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the partner’s CDN settings (default adapters)
	 * 
	 * @return KalturaCDNPartnerSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("cdnpartnersettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNPartnerSettings");
		return $resultObject;
	}

	/**
	 * Configure the partner’s CDN settings (default adapters)
	 * 
	 * @param KalturaCDNPartnerSettings $settings CDN partner settings
	 * @return KalturaCDNPartnerSettings
	 */
	function update(KalturaCDNPartnerSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("cdnpartnersettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNPartnerSettings");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCDVRAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new C-DVR adapter for partner
	 * 
	 * @param KalturaCDVRAdapterProfile $adapter C-DVR adapter object
	 * @return KalturaCDVRAdapterProfile
	 */
	function add(KalturaCDVRAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdvradapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfile");
		return $resultObject;
	}

	/**
	 * Delete C-DVR adapter by C-DVR adapter id
	 * 
	 * @param int $adapterId C-DVR adapter identifier
	 * @return bool
	 */
	function delete($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdvradapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate C-DVR adapter shared secret
	 * 
	 * @param int $adapterId C-DVR adapter identifier
	 * @return KalturaCDVRAdapterProfile
	 */
	function generateSharedSecret($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdvradapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all C-DVR adapters for partner
	 * 
	 * @return KalturaCDVRAdapterProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("cdvradapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update C-DVR adapter details
	 * 
	 * @param int $adapterId C-DVR adapter identifier
	 * @param KalturaCDVRAdapterProfile $adapter C-DVR adapter Object
	 * @return KalturaCDVRAdapterProfile
	 */
	function update($adapterId, KalturaCDVRAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdvradapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new channel for partner. Supports KalturaDynamicChannel or KalturaManualChannel
	 * 
	 * @param KalturaChannel $channel KSQL channel Object
	 * @return KalturaChannel
	 */
	function add(KalturaChannel $channel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "channel", $channel->toParams());
		$this->client->queueServiceActionCall("channel", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaChannel");
		return $resultObject;
	}

	/**
	 * Delete channel by its channel id
	 * 
	 * @param int $channelId Channel identifier
	 * @return bool
	 */
	function delete($channelId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "channelId", $channelId);
		$this->client->queueServiceActionCall("channel", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns channel
	 * 
	 * @param int $id Channel Identifier
	 * @return KalturaChannel
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("channel", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaChannel");
		return $resultObject;
	}

	/**
	 * Get the list of tags for the partner
	 * 
	 * @param KalturaChannelsBaseFilter $filter Filter
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaChannelListResponse
	 */
	function listAction(KalturaChannelsBaseFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("channel", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaChannelListResponse");
		return $resultObject;
	}

	/**
	 * Update channel details. Supports KalturaDynamicChannel or KalturaManualChannel
	 * 
	 * @param int $id Channel identifier
	 * @param KalturaChannel $channel KSQL channel Object
	 * @return KalturaChannel
	 */
	function update($id, KalturaChannel $channel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "channel", $channel->toParams());
		$this->client->queueServiceActionCall("channel", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaChannel");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollectionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new collection for partner
	 * 
	 * @param KalturaCollection $collection Collection object
	 * @return KalturaCollection
	 */
	function add(KalturaCollection $collection)
	{
		$kparams = array();
		$this->client->addParam($kparams, "collection", $collection->toParams());
		$this->client->queueServiceActionCall("collection", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCollection");
		return $resultObject;
	}

	/**
	 * Delete collection
	 * 
	 * @param bigint $id Collection id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("collection", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns a list of collections requested by Collection IDs or file identifier or coupon group identifier
	 * 
	 * @param KalturaCollectionFilter $filter Filter request
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaCollectionListResponse
	 */
	function listAction(KalturaCollectionFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("collection", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCollectionListResponse");
		return $resultObject;
	}

	/**
	 * Update Collection
	 * 
	 * @param bigint $id Collection id
	 * @param KalturaCollection $collection Collection
	 * @return KalturaCollection
	 */
	function update($id, KalturaCollection $collection)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "collection", $collection->toParams());
		$this->client->queueServiceActionCall("collection", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCollection");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCompensationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new compensation for a household for a given number of iterations of a subscription renewal for a fixed amount / percentage of the renewal price.
	 * 
	 * @param KalturaCompensation $compensation Compensation parameters
	 * @return KalturaCompensation
	 */
	function add(KalturaCompensation $compensation)
	{
		$kparams = array();
		$this->client->addParam($kparams, "compensation", $compensation->toParams());
		$this->client->queueServiceActionCall("compensation", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCompensation");
		return $resultObject;
	}

	/**
	 * Delete a compensation by identifier
	 * 
	 * @param bigint $id Compensation identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("compensation", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Get a compensation by identifier
	 * 
	 * @param bigint $id Compensation identifier
	 * @return KalturaCompensation
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("compensation", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCompensation");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new configuration group
	 * 
	 * @param KalturaConfigurationGroup $configurationGroup Configuration group
	 * @return KalturaConfigurationGroup
	 */
	function add(KalturaConfigurationGroup $configurationGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurationGroup", $configurationGroup->toParams());
		$this->client->queueServiceActionCall("configurationgroup", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroup");
		return $resultObject;
	}

	/**
	 * Remove a configuration group, including its tags, device configurations and devices associations
	 * 
	 * @param string $id Configuration group identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurationgroup", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the configuration group details, including group identifiers, tags, and number of associated devices, and list of device configuration
	 * 
	 * @param string $id Configuration group identifier
	 * @return KalturaConfigurationGroup
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurationgroup", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroup");
		return $resultObject;
	}

	/**
	 * Return the list of configuration groups
	 * 
	 * @return KalturaConfigurationGroupListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("configurationgroup", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupListResponse");
		return $resultObject;
	}

	/**
	 * Update configuration group name
	 * 
	 * @param string $id Configuration group identifier
	 * @param KalturaConfigurationGroup $configurationGroup Configuration group
	 * @return KalturaConfigurationGroup
	 */
	function update($id, KalturaConfigurationGroup $configurationGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "configurationGroup", $configurationGroup->toParams());
		$this->client->queueServiceActionCall("configurationgroup", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroup");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupDeviceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Associate a collection of devices to a configuration group. If a device is already associated to another group – old association is replaced
	 * 
	 * @param KalturaConfigurationGroupDevice $configurationGroupDevice Configuration group device
	 * @return bool
	 */
	function add(KalturaConfigurationGroupDevice $configurationGroupDevice)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurationGroupDevice", $configurationGroupDevice->toParams());
		$this->client->queueServiceActionCall("configurationgroupdevice", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Remove a device association
	 * 
	 * @param string $udid Device UDID
	 * @return bool
	 */
	function delete($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("configurationgroupdevice", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the configuration group to which a specific device is associated to
	 * 
	 * @param string $udid Device UDID
	 * @return KalturaConfigurationGroupDevice
	 */
	function get($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("configurationgroupdevice", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupDevice");
		return $resultObject;
	}

	/**
	 * Return the list of associated devices for a given configuration group
	 * 
	 * @param KalturaConfigurationGroupDeviceFilter $filter Filter option for configuration group identifier
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaConfigurationGroupDeviceListResponse
	 */
	function listAction(KalturaConfigurationGroupDeviceFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("configurationgroupdevice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupDeviceListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupTagService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new tag to a configuration group. If this tag is already associated to another group, request fails
	 * 
	 * @param KalturaConfigurationGroupTag $configurationGroupTag Configuration group tag
	 * @return KalturaConfigurationGroupTag
	 */
	function add(KalturaConfigurationGroupTag $configurationGroupTag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurationGroupTag", $configurationGroupTag->toParams());
		$this->client->queueServiceActionCall("configurationgrouptag", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupTag");
		return $resultObject;
	}

	/**
	 * Remove a tag association from configuration group
	 * 
	 * @param string $tag Tag
	 * @return bool
	 */
	function delete($tag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "tag", $tag);
		$this->client->queueServiceActionCall("configurationgrouptag", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the configuration group the tag is associated to
	 * 
	 * @param string $tag Tag
	 * @return KalturaConfigurationGroupTag
	 */
	function get($tag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "tag", $tag);
		$this->client->queueServiceActionCall("configurationgrouptag", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupTag");
		return $resultObject;
	}

	/**
	 * Return list of tags for a configuration group
	 * 
	 * @param KalturaConfigurationGroupTagFilter $filter Filter option for configuration group identifier
	 * @return KalturaConfigurationGroupTagListResponse
	 */
	function listAction(KalturaConfigurationGroupTagFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("configurationgrouptag", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupTagListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new device configuration to a configuration group
	 * 
	 * @param KalturaConfigurations $configurations Device configuration
	 * @return KalturaConfigurations
	 */
	function add(KalturaConfigurations $configurations)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurations", $configurations->toParams());
		$this->client->queueServiceActionCall("configurations", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurations");
		return $resultObject;
	}

	/**
	 * Delete a device configuration
	 * 
	 * @param string $id Configuration identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurations", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the device configuration
	 * 
	 * @param string $id Configuration identifier
	 * @return KalturaConfigurations
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurations", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurations");
		return $resultObject;
	}

	/**
	 * Return a list of device configurations of a configuration group
	 * 
	 * @param KalturaConfigurationsFilter $filter Filter option for configuration group id.
	 * @return KalturaConfigurationsListResponse
	 */
	function listAction(KalturaConfigurationsFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("configurations", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationsListResponse");
		return $resultObject;
	}

	/**
	 * Return a device configuration applicable for a specific device (UDID), app name, software version, platform and optionally a configuration group’s tag
	 * 
	 * @param string $applicationName Application name
	 * @param string $clientVersion Client version
	 * @param string $platform Platform
	 * @param string $udid Device UDID
	 * @param string $tag Tag
	 * @param int $partnerId Partner Id
	 * @return file
	 */
	function serveByDevice($applicationName, $clientVersion, $platform, $udid, $tag, $partnerId = 0)
	{
		$kparams = array();
		$this->client->addParam($kparams, "applicationName", $applicationName);
		$this->client->addParam($kparams, "clientVersion", $clientVersion);
		$this->client->addParam($kparams, "platform", $platform);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "tag", $tag);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("configurations", "serveByDevice", $kparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Update device configuration
	 * 
	 * @param string $id Configuration identifier
	 * @param KalturaConfigurations $configurations Configuration to update
	 * @return KalturaConfigurations
	 */
	function update($id, KalturaConfigurations $configurations)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "configurations", $configurations->toParams());
		$this->client->queueServiceActionCall("configurations", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurations");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of countries for the partner with option to filter by countries identifiers
	 * 
	 * @param KalturaCountryFilter $filter Country filter
	 * @return KalturaCountryListResponse
	 */
	function listAction(KalturaCountryFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("country", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCountryListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns information about a coupon
	 * 
	 * @param string $code Coupon code
	 * @return KalturaCoupon
	 */
	function get($code)
	{
		$kparams = array();
		$this->client->addParam($kparams, "code", $code);
		$this->client->queueServiceActionCall("coupon", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCoupon");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponsGroupService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add coupons group
	 * 
	 * @param KalturaCouponsGroup $couponsGroup Coupons group
	 * @return KalturaCouponsGroup
	 */
	function add(KalturaCouponsGroup $couponsGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "couponsGroup", $couponsGroup->toParams());
		$this->client->queueServiceActionCall("couponsgroup", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroup");
		return $resultObject;
	}

	/**
	 * Delete a coupons group
	 * 
	 * @param bigint $id Coupons group identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("couponsgroup", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate a coupon
	 * 
	 * @param bigint $id Coupon group identifier
	 * @param KalturaCouponGenerationOptions $couponGenerationOptions Coupon generation options
	 * @return KalturaStringValueArray
	 */
	function generate($id, KalturaCouponGenerationOptions $couponGenerationOptions)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "couponGenerationOptions", $couponGenerationOptions->toParams());
		$this->client->queueServiceActionCall("couponsgroup", "generate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStringValueArray");
		return $resultObject;
	}

	/**
	 * Returns information about coupons group
	 * 
	 * @param bigint $id Coupons group ID
	 * @return KalturaCouponsGroup
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("couponsgroup", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroup");
		return $resultObject;
	}

	/**
	 * Returns information about partner coupons groups
	 * 
	 * @return KalturaCouponsGroupListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("couponsgroup", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroupListResponse");
		return $resultObject;
	}

	/**
	 * Update coupons group
	 * 
	 * @param bigint $id Coupons group identifier
	 * @param KalturaCouponsGroup $couponsGroup Coupons group
	 * @return KalturaCouponsGroup
	 */
	function update($id, KalturaCouponsGroup $couponsGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "couponsGroup", $couponsGroup->toParams());
		$this->client->queueServiceActionCall("couponsgroup", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroup");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCurrencyService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of currencies for the partner with option to filter by currency codes
	 * 
	 * @param KalturaCurrencyFilter $filter Currency filter
	 * @return KalturaCurrencyListResponse
	 */
	function listAction(KalturaCurrencyFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("currency", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCurrencyListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceBrandService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new device brand which belongs to a specific group.
	 * 
	 * @param KalturaDeviceBrand $deviceBrand Device brand.
	 * @return KalturaDeviceBrand
	 */
	function add(KalturaDeviceBrand $deviceBrand)
	{
		$kparams = array();
		$this->client->addParam($kparams, "deviceBrand", $deviceBrand->toParams());
		$this->client->queueServiceActionCall("devicebrand", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceBrand");
		return $resultObject;
	}

	/**
	 * Return a list of the available device brands.
	 * 
	 * @param KalturaDeviceBrandFilter $filter Filter with no more than one condition specified.
	 * @param KalturaFilterPager $pager Page size and index.
	 * @return KalturaDeviceBrandListResponse
	 */
	function listAction(KalturaDeviceBrandFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("devicebrand", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceBrandListResponse");
		return $resultObject;
	}

	/**
	 * Updates an existing device brand which belongs to a specific group.
	 * 
	 * @param bigint $id Device brand's identifier.
	 * @param KalturaDeviceBrand $deviceBrand Device brand.
	 * @return KalturaDeviceBrand
	 */
	function update($id, KalturaDeviceBrand $deviceBrand)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "deviceBrand", $deviceBrand->toParams());
		$this->client->queueServiceActionCall("devicebrand", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceBrand");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceFamilyService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new device family which belongs to a specific group.
	 * 
	 * @param KalturaDeviceFamily $deviceFamily Device family.
	 * @return KalturaDeviceFamily
	 */
	function add(KalturaDeviceFamily $deviceFamily)
	{
		$kparams = array();
		$this->client->addParam($kparams, "deviceFamily", $deviceFamily->toParams());
		$this->client->queueServiceActionCall("devicefamily", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceFamily");
		return $resultObject;
	}

	/**
	 * Return a list of the available device families.
	 * 
	 * @param KalturaDeviceFamilyFilter $filter Filter with no more than one condition specified.
	 * @param KalturaFilterPager $pager Page size and index.
	 * @return KalturaDeviceFamilyListResponse
	 */
	function listAction(KalturaDeviceFamilyFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("devicefamily", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceFamilyListResponse");
		return $resultObject;
	}

	/**
	 * Updates an existing device family which belongs to a specific group.
	 * 
	 * @param bigint $id Device family's identifier.
	 * @param KalturaDeviceFamily $deviceFamily Device family.
	 * @return KalturaDeviceFamily
	 */
	function update($id, KalturaDeviceFamily $deviceFamily)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "deviceFamily", $deviceFamily->toParams());
		$this->client->queueServiceActionCall("devicefamily", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceFamily");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceReferenceDataService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add DeviceReferenceData
	 * 
	 * @param KalturaDeviceReferenceData $objectToAdd DeviceReferenceData details
	 * @return KalturaDeviceReferenceData
	 */
	function add(KalturaDeviceReferenceData $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("devicereferencedata", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceReferenceData");
		return $resultObject;
	}

	/**
	 * Delete existing DeviceReferenceData
	 * 
	 * @param bigint $id DeviceReferenceData identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("devicereferencedata", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns the list of available DeviceReferenceData
	 * 
	 * @param KalturaDeviceReferenceDataFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaDeviceReferenceDataListResponse
	 */
	function listAction(KalturaDeviceReferenceDataFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("devicereferencedata", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceReferenceDataListResponse");
		return $resultObject;
	}

	/**
	 * Update existing DeviceReferenceData
	 * 
	 * @param bigint $id Id of DeviceReferenceData to update
	 * @param KalturaDeviceReferenceData $objectToUpdate DeviceReferenceData Object to update
	 * @return KalturaDeviceReferenceData
	 */
	function update($id, KalturaDeviceReferenceData $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("devicereferencedata", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceReferenceData");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDiscountDetailsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Internal API !!! Insert new DiscountDetails for partner
	 * 
	 * @param KalturaDiscountDetails $discountDetails Discount details Object
	 * @return KalturaDiscountDetails
	 */
	function add(KalturaDiscountDetails $discountDetails)
	{
		$kparams = array();
		$this->client->addParam($kparams, "discountDetails", $discountDetails->toParams());
		$this->client->queueServiceActionCall("discountdetails", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDiscountDetails");
		return $resultObject;
	}

	/**
	 * Internal API !!! Delete DiscountDetails
	 * 
	 * @param bigint $id DiscountDetails id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("discountdetails", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the list of available discounts details, can be filtered by discount codes
	 * 
	 * @param KalturaDiscountDetailsFilter $filter Filter
	 * @return KalturaDiscountDetailsListResponse
	 */
	function listAction(KalturaDiscountDetailsFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("discountdetails", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDiscountDetailsListResponse");
		return $resultObject;
	}

	/**
	 * Update discount details
	 * 
	 * @param bigint $id DiscountDetails id
	 * @param KalturaDiscountDetails $discountDetails Discount details Object
	 * @return KalturaDiscountDetails
	 */
	function update($id, KalturaDiscountDetails $discountDetails)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "discountDetails", $discountDetails->toParams());
		$this->client->queueServiceActionCall("discountdetails", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDiscountDetails");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDrmProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Internal API !!! Insert new DrmProfile
	 * 
	 * @param KalturaDrmProfile $drmProfile Drm adapter Object
	 * @return KalturaDrmProfile
	 */
	function add(KalturaDrmProfile $drmProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "drmProfile", $drmProfile->toParams());
		$this->client->queueServiceActionCall("drmprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDrmProfile");
		return $resultObject;
	}

	/**
	 * Internal API !!! Delete DrmProfile
	 * 
	 * @param bigint $id Drm adapter id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("drmprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns all DRM adapters for partner
	 * 
	 * @return KalturaDrmProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("drmprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDrmProfileListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDurationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of optinal Duration codes
	 * 
	 * @return KalturaDurationListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("duration", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDurationListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDynamicListService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new KalturaDynamicList
	 * 
	 * @param KalturaDynamicList $objectToAdd KalturaDynamicList Object to add
	 * @return KalturaDynamicList
	 */
	function add(KalturaDynamicList $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("dynamiclist", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDynamicList");
		return $resultObject;
	}

	/**
	 * Add new bulk upload batch job Conversion profile id can be specified in the API.
	 * 
	 * @param file $fileData FileData
	 * @param KalturaBulkUploadExcelJobData $jobData JobData
	 * @param KalturaBulkUploadDynamicListData $bulkUploadData BulkUploadData
	 * @return KalturaBulkUpload
	 */
	function addFromBulkUpload($fileData, KalturaBulkUploadExcelJobData $jobData, KalturaBulkUploadDynamicListData $bulkUploadData)
	{
		$kparams = array();
		$kfiles = array();
		$this->client->addParam($kfiles, "fileData", $fileData);
		$this->client->addParam($kparams, "jobData", $jobData->toParams());
		$this->client->addParam($kparams, "bulkUploadData", $bulkUploadData->toParams());
		$this->client->queueServiceActionCall("dynamiclist", "addFromBulkUpload", $kparams, $kfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBulkUpload");
		return $resultObject;
	}

	/**
	 * Delete existing DynamicList
	 * 
	 * @param bigint $id DynamicList identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("dynamiclist", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns the list of available DynamicList
	 * 
	 * @param KalturaDynamicListFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaDynamicListListResponse
	 */
	function listAction(KalturaDynamicListFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("dynamiclist", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDynamicListListResponse");
		return $resultObject;
	}

	/**
	 * Update existing KalturaDynamicList
	 * 
	 * @param bigint $id Id of KalturaDynamicList to update
	 * @param KalturaDynamicList $objectToUpdate KalturaDynamicList Object to update
	 * @return KalturaDynamicList
	 */
	function update($id, KalturaDynamicList $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("dynamiclist", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDynamicList");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEmailService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Sends email notification
	 * 
	 * @param KalturaEmailMessage $emailMessage Email details
	 * @return bool
	 */
	function send(KalturaEmailMessage $emailMessage)
	{
		$kparams = array();
		$this->client->addParam($kparams, "emailMessage", $emailMessage->toParams());
		$this->client->queueServiceActionCall("email", "send", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementAdapterService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new Engagement adapter for partner
	 * 
	 * @param KalturaEngagementAdapter $engagementAdapter Engagement adapter Object
	 * @return KalturaEngagementAdapter
	 */
	function add(KalturaEngagementAdapter $engagementAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "engagementAdapter", $engagementAdapter->toParams());
		$this->client->queueServiceActionCall("engagementadapter", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}

	/**
	 * Delete Engagement adapter by Engagement adapter id
	 * 
	 * @param int $id Engagement adapter identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagementadapter", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate engagement adapter shared secret
	 * 
	 * @param int $id Engagement adapter identifier
	 * @return KalturaEngagementAdapter
	 */
	function generateSharedSecret($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagementadapter", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}

	/**
	 * Returns all Engagement adapters for partner : id + name
	 * 
	 * @param int $id Engagement adapter identifier
	 * @return KalturaEngagementAdapter
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagementadapter", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}

	/**
	 * Returns all Engagement adapters for partner : id + name
	 * 
	 * @return KalturaEngagementAdapterListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("engagementadapter", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapterListResponse");
		return $resultObject;
	}

	/**
	 * Update Engagement adapter details
	 * 
	 * @param int $id Engagement adapter identifier
	 * @param KalturaEngagementAdapter $engagementAdapter Engagement adapter Object
	 * @return KalturaEngagementAdapter
	 */
	function update($id, KalturaEngagementAdapter $engagementAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "engagementAdapter", $engagementAdapter->toParams());
		$this->client->queueServiceActionCall("engagementadapter", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new Engagement for partner
	 * 
	 * @param KalturaEngagement $engagement Engagement adapter Object
	 * @return KalturaEngagement
	 */
	function add(KalturaEngagement $engagement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "engagement", $engagement->toParams());
		$this->client->queueServiceActionCall("engagement", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagement");
		return $resultObject;
	}

	/**
	 * Delete engagement by engagement adapter id
	 * 
	 * @param int $id Engagement identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagement", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return engagement
	 * 
	 * @param int $id Engagement identifier
	 * @return KalturaEngagement
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagement", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagement");
		return $resultObject;
	}

	/**
	 * Returns all Engagement for partner
	 * 
	 * @param KalturaEngagementFilter $filter Filter
	 * @return KalturaEngagementListResponse
	 */
	function listAction(KalturaEngagementFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("engagement", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Apply new coupon for existing subscription
	 * 
	 * @param bigint $purchaseId Purchase Id
	 * @param string $couponCode Coupon Code
	 */
	function applyCoupon($purchaseId, $couponCode)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchaseId", $purchaseId);
		$this->client->addParam($kparams, "couponCode", $couponCode);
		$this->client->queueServiceActionCall("entitlement", "applyCoupon", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Immediately cancel a subscription, PPV, collection or programAssetGroupOffer. Cancel is possible only if within cancellation window and content not already consumed
	 * 
	 * @param int $assetId The mediaFileID to cancel
	 * @param string $productType The product type for the cancelation
	 * @return bool
	 */
	function cancel($assetId, $productType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "productType", $productType);
		$this->client->queueServiceActionCall("entitlement", "cancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Cancel a household service subscription at the next renewal. The subscription stays valid till the next renewal.
	 * 
	 * @param string $subscriptionId Subscription Code
	 */
	function cancelRenewal($subscriptionId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "subscriptionId", $subscriptionId);
		$this->client->queueServiceActionCall("entitlement", "cancelRenewal", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Cancel Scheduled Subscription
	 * 
	 * @param bigint $scheduledSubscriptionId Scheduled Subscription Identifier
	 * @return bool
	 */
	function cancelScheduledSubscription($scheduledSubscriptionId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "scheduledSubscriptionId", $scheduledSubscriptionId);
		$this->client->queueServiceActionCall("entitlement", "cancelScheduledSubscription", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Reconcile the user household&#39;s entitlements with an external entitlements source. This request is frequency protected to avoid too frequent calls per household.
	 * 
	 * @return bool
	 */
	function externalReconcile()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("entitlement", "externalReconcile", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Immediately cancel a subscription, PPV, collection or programAssetGroupOffer. Cancel applies regardless of cancellation window and content consumption status
	 * 
	 * @param int $assetId The mediaFileID to cancel
	 * @param string $productType The product type for the cancelation
	 * @return bool
	 */
	function forceCancel($assetId, $productType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "productType", $productType);
		$this->client->queueServiceActionCall("entitlement", "forceCancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the data about the next renewal
	 * 
	 * @param int $id Purchase Id
	 * @return KalturaEntitlementRenewal
	 */
	function getNextRenewal($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("entitlement", "getNextRenewal", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntitlementRenewal");
		return $resultObject;
	}

	/**
	 * Grant household for an entitlement for a PPV, Subscription or programAssetGroupOffer.
	 * 
	 * @param int $productId Identifier for the product package from which this content is offered
	 * @param string $productType Product package type. Possible values: PPV, Subscription, Collection
	 * @param bool $history Controls if the new entitlements grant will appear in the user’s history. True – will add a history entry. False (or if ommited) – no history entry will be added
	 * @param int $contentId Identifier for the content. Relevant only if Product type = PPV
	 * @return bool
	 */
	function grant($productId, $productType, $history, $contentId = 0)
	{
		$kparams = array();
		$this->client->addParam($kparams, "productId", $productId);
		$this->client->addParam($kparams, "productType", $productType);
		$this->client->addParam($kparams, "history", $history);
		$this->client->addParam($kparams, "contentId", $contentId);
		$this->client->queueServiceActionCall("entitlement", "grant", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets all the entitled media items for a household
	 * 
	 * @param KalturaBaseEntitlementFilter $filter Request filter
	 * @param KalturaFilterPager $pager Request pager
	 * @return KalturaEntitlementListResponse
	 */
	function listAction(KalturaBaseEntitlementFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("entitlement", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntitlementListResponse");
		return $resultObject;
	}

	/**
	 * Swap current entitlement (subscription) with new entitlement (subscription) - only Grant
	 * 
	 * @param int $currentProductId Identifier for the current product package
	 * @param int $newProductId Identifier for the new product package
	 * @param bool $history Controls if the new entitlements swap will appear in the user’s history. True – will add a history entry. False (or if ommited) – no history entry will be added
	 * @return bool
	 */
	function swap($currentProductId, $newProductId, $history)
	{
		$kparams = array();
		$this->client->addParam($kparams, "currentProductId", $currentProductId);
		$this->client->addParam($kparams, "newProductId", $newProductId);
		$this->client->addParam($kparams, "history", $history);
		$this->client->queueServiceActionCall("entitlement", "swap", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update Kaltura Entitelment by Purchase id
	 * 
	 * @param int $id Purchase Id
	 * @param KalturaEntitlement $entitlement KalturaEntitlement object
	 * @return KalturaEntitlement
	 */
	function update($id, KalturaEntitlement $entitlement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "entitlement", $entitlement->toParams());
		$this->client->queueServiceActionCall("entitlement", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntitlement");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEpgService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns EPG assets.
	 * 
	 * @param KalturaEpgFilter $filter Filters by EPG live asset identifier and date in unix timestamp, e.g. 1610928000(January 18, 2021 0:00:00), 1611014400(January 19, 2021 0:00:00)
	 * @return KalturaEpgListResponse
	 */
	function listAction(KalturaEpgFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("epg", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEpgListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEpgServicePartnerConfigurationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns EPG cache service partner configurations
	 * 
	 * @return KalturaEpgServicePartnerConfiguration
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("epgservicepartnerconfiguration", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEpgServicePartnerConfiguration");
		return $resultObject;
	}

	/**
	 * Returns EPG cache service partner configurations
	 * 
	 * @param KalturaEpgServicePartnerConfiguration $config The partner config updates
	 */
	function update(KalturaEpgServicePartnerConfiguration $config)
	{
		$kparams = array();
		$this->client->addParam($kparams, "config", $config->toParams());
		$this->client->queueServiceActionCall("epgservicepartnerconfiguration", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEventNotificationActionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Dispatches event notification
	 * 
	 * @param KalturaEventNotificationScope $scope Scope
	 * @return bool
	 */
	function dispatch(KalturaEventNotificationScope $scope)
	{
		$kparams = array();
		$this->client->addParam($kparams, "scope", $scope->toParams());
		$this->client->queueServiceActionCall("eventnotificationaction", "dispatch", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEventNotificationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Gets all EventNotification items for a given Object id and type
	 * 
	 * @param KalturaEventNotificationFilter $filter Filter
	 * @return KalturaEventNotificationListResponse
	 */
	function listAction(KalturaEventNotificationFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("eventnotification", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEventNotificationListResponse");
		return $resultObject;
	}

	/**
	 * EventNotification update
	 * 
	 * @param string $id Id of eventNotification
	 * @param KalturaEventNotification $objectToUpdate EventNotification details
	 * @return KalturaEventNotification
	 */
	function update($id, KalturaEventNotification $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("eventnotification", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEventNotification");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportTaskService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new bulk export task
	 * 
	 * @param KalturaExportTask $task The task model to add
	 * @return KalturaExportTask
	 */
	function add(KalturaExportTask $task)
	{
		$kparams = array();
		$this->client->addParam($kparams, "task", $task->toParams());
		$this->client->queueServiceActionCall("exporttask", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTask");
		return $resultObject;
	}

	/**
	 * Deletes an existing bulk export task by task identifier
	 * 
	 * @param bigint $id The identifier of the task to delete
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("exporttask", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets an existing bulk export task by task identifier
	 * 
	 * @param bigint $id The identifier of the task to get
	 * @return KalturaExportTask
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("exporttask", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTask");
		return $resultObject;
	}

	/**
	 * Returns bulk export tasks by tasks identifiers
	 * 
	 * @param KalturaExportTaskFilter $filter Bulk export tasks filter
	 * @return KalturaExportTaskListResponse
	 */
	function listAction(KalturaExportTaskFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("exporttask", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTaskListResponse");
		return $resultObject;
	}

	/**
	 * Updates an existing bulk export task by task identifier
	 * 
	 * @param bigint $id The task id to update
	 * @param KalturaExportTask $task The task model to update
	 * @return KalturaExportTask
	 */
	function update($id, KalturaExportTask $task)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "task", $task->toParams());
		$this->client->queueServiceActionCall("exporttask", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTask");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalChannelProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new External channel for partner
	 * 
	 * @param KalturaExternalChannelProfile $externalChannel External channel Object
	 * @return KalturaExternalChannelProfile
	 */
	function add(KalturaExternalChannelProfile $externalChannel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalChannel", $externalChannel->toParams());
		$this->client->queueServiceActionCall("externalchannelprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExternalChannelProfile");
		return $resultObject;
	}

	/**
	 * Delete External channel by External channel id
	 * 
	 * @param int $externalChannelId External channel identifier
	 * @return bool
	 */
	function delete($externalChannelId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalChannelId", $externalChannelId);
		$this->client->queueServiceActionCall("externalchannelprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns all External channels for partner
	 * 
	 * @param KalturaExternalChannelProfileFilter $filter External channel profile filter
	 * @return KalturaExternalChannelProfileListResponse
	 */
	function listAction(KalturaExternalChannelProfileFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("externalchannelprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExternalChannelProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update External channel details
	 * 
	 * @param int $externalChannelId External channel identifier
	 * @param KalturaExternalChannelProfile $externalChannel External channel Object
	 * @return KalturaExternalChannelProfile
	 */
	function update($externalChannelId, KalturaExternalChannelProfile $externalChannel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalChannelId", $externalChannelId);
		$this->client->addParam($kparams, "externalChannel", $externalChannel->toParams());
		$this->client->queueServiceActionCall("externalchannelprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExternalChannelProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFavoriteService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add media to user&#39;s favorite list
	 * 
	 * @param KalturaFavorite $favorite Favorite details.
	 * @return KalturaFavorite
	 */
	function add(KalturaFavorite $favorite)
	{
		$kparams = array();
		$this->client->addParam($kparams, "favorite", $favorite->toParams());
		$this->client->queueServiceActionCall("favorite", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFavorite");
		return $resultObject;
	}

	/**
	 * Remove media from user&#39;s favorite list
	 * 
	 * @param bigint $id Media identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("favorite", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieving users&#39; favorites
	 * 
	 * @param KalturaFavoriteFilter $filter Request filter
	 * @return KalturaFavoriteListResponse
	 */
	function listAction(KalturaFavoriteFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("favorite", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFavoriteListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFollowTvSeriesService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a user&#39;s tv series follow.
            Possible status codes: UserAlreadyFollowing = 8013, NotFound = 500007, InvalidAssetId = 4024
	 * 
	 * @param KalturaFollowTvSeries $followTvSeries Follow series request parameters
	 * @return KalturaFollowTvSeries
	 */
	function add(KalturaFollowTvSeries $followTvSeries)
	{
		$kparams = array();
		$this->client->addParam($kparams, "followTvSeries", $followTvSeries->toParams());
		$this->client->queueServiceActionCall("followtvseries", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFollowTvSeries");
		return $resultObject;
	}

	/**
	 * Delete a user&#39;s tv series follow.
	 * 
	 * @param int $assetId Asset identifier
	 * @return bool
	 */
	function delete($assetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->queueServiceActionCall("followtvseries", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete a user&#39;s tv series follow.
	 * 
	 * @param int $assetId Asset identifier
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 */
	function deleteWithToken($assetId, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("followtvseries", "deleteWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * List user&#39;s tv series follows.
            Possible status codes:
	 * 
	 * @param KalturaFollowTvSeriesFilter $filter Follow TV series filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaFollowTvSeriesListResponse
	 */
	function listAction(KalturaFollowTvSeriesFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("followtvseries", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFollowTvSeriesListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHomeNetworkService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new home network to a household
	 * 
	 * @param KalturaHomeNetwork $homeNetwork Home network to add
	 * @return KalturaHomeNetwork
	 */
	function add(KalturaHomeNetwork $homeNetwork)
	{
		$kparams = array();
		$this->client->addParam($kparams, "homeNetwork", $homeNetwork->toParams());
		$this->client->queueServiceActionCall("homenetwork", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHomeNetwork");
		return $resultObject;
	}

	/**
	 * Delete household’s existing home network
	 * 
	 * @param string $externalId The network to update
	 * @return bool
	 */
	function delete($externalId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalId", $externalId);
		$this->client->queueServiceActionCall("homenetwork", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieve the household’s home networks
	 * 
	 * @return KalturaHomeNetworkListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("homenetwork", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHomeNetworkListResponse");
		return $resultObject;
	}

	/**
	 * Update and existing home network for a household
	 * 
	 * @param string $externalId Home network identifier
	 * @param KalturaHomeNetwork $homeNetwork Home network to update
	 * @return KalturaHomeNetwork
	 */
	function update($externalId, KalturaHomeNetwork $homeNetwork)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalId", $externalId);
		$this->client->addParam($kparams, "homeNetwork", $homeNetwork->toParams());
		$this->client->queueServiceActionCall("homenetwork", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHomeNetwork");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Creates a household for the user
	 * 
	 * @param KalturaHousehold $household Household object
	 * @return KalturaHousehold
	 */
	function add(KalturaHousehold $household)
	{
		$kparams = array();
		$this->client->addParam($kparams, "household", $household->toParams());
		$this->client->queueServiceActionCall("household", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}

	/**
	 * Fully delete a household. Delete all of the household information, including users, devices, entitlements, payment methods and notification date.
	 * 
	 * @param int $id Household identifier
	 * @return bool
	 */
	function delete($id = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("household", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the household model
	 * 
	 * @param int $id Household identifier
	 * @return KalturaHousehold
	 */
	function get($id = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("household", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}

	/**
	 * Retrive household for the partner filter by external identifier
	 * 
	 * @param KalturaHouseholdFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index. Number of assets to return per page. Possible range 5 ≤ size ≥ 50. If omitted - will be set to 25. If a value > 50 provided – will set to 50
	 * @return KalturaHouseholdListResponse
	 */
	function listAction(KalturaHouseholdFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("household", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdListResponse");
		return $resultObject;
	}

	/**
	 * Purge a household. Delete all of the household information, including users, devices, entitlements, payment methods and notification date.
	 * 
	 * @param int $id Household identifier
	 * @return bool
	 */
	function purge($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("household", "purge", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Reset a household’s time limitation for removing user or device
	 * 
	 * @param string $frequencyType Possible values: devices – reset the device change frequency. 
            users – reset the user add/remove frequency
	 * @return KalturaHousehold
	 */
	function resetFrequency($frequencyType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "frequencyType", $frequencyType);
		$this->client->queueServiceActionCall("household", "resetFrequency", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}

	/**
	 * Resumed a given household service to its previous service settings
	 * 
	 * @return bool
	 */
	function resume()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("household", "resume", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Suspend a given household service. Sets the household status to “suspended&quot;.The household service settings are maintained for later resume
	 * 
	 * @param int $roleId RoleId
	 * @return bool
	 */
	function suspend($roleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "roleId", $roleId);
		$this->client->queueServiceActionCall("household", "suspend", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update the household name and description
	 * 
	 * @param KalturaHousehold $household Household object
	 * @return KalturaHousehold
	 */
	function update(KalturaHousehold $household)
	{
		$kparams = array();
		$this->client->addParam($kparams, "household", $household->toParams());
		$this->client->queueServiceActionCall("household", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdCouponService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * HouseholdCoupon add
	 * 
	 * @param KalturaHouseholdCoupon $objectToAdd HouseholdCoupon details
	 * @return KalturaHouseholdCoupon
	 */
	function add(KalturaHouseholdCoupon $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("householdcoupon", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdCoupon");
		return $resultObject;
	}

	/**
	 * Remove coupon from household
	 * 
	 * @param string $id Coupon code
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("householdcoupon", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Gets all HouseholdCoupon items for a household
	 * 
	 * @param KalturaHouseholdCouponFilter $filter Filter
	 * @return KalturaHouseholdCouponListResponse
	 */
	function listAction(KalturaHouseholdCouponFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("householdcoupon", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdCouponListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdDeviceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add device to household
	 * 
	 * @param KalturaHouseholdDevice $device Device
	 * @return KalturaHouseholdDevice
	 */
	function add(KalturaHouseholdDevice $device)
	{
		$kparams = array();
		$this->client->addParam($kparams, "device", $device->toParams());
		$this->client->queueServiceActionCall("householddevice", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Registers a device to a household using pin code
	 * 
	 * @param string $deviceName Device name
	 * @param string $pin Pin code
	 * @return KalturaHouseholdDevice
	 */
	function addByPin($deviceName, $pin)
	{
		$kparams = array();
		$this->client->addParam($kparams, "deviceName", $deviceName);
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->queueServiceActionCall("householddevice", "addByPin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Removes a device from household
	 * 
	 * @param string $udid Device UDID
	 * @return bool
	 */
	function delete($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("householddevice", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Deletes dynamic data item with key  for device with identifier .
	 * 
	 * @param string $udid Unique identifier of device.
	 * @param string $key Key of dynamic data item.
	 * @return bool
	 */
	function deleteDynamicData($udid, $key)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "key", $key);
		$this->client->queueServiceActionCall("householddevice", "deleteDynamicData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generates device pin to use when adding a device to household by pin
	 * 
	 * @param string $udid Device UDID
	 * @param int $brandId Device brand identifier
	 * @return KalturaDevicePin
	 */
	function generatePin($udid, $brandId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "brandId", $brandId);
		$this->client->queueServiceActionCall("householddevice", "generatePin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDevicePin");
		return $resultObject;
	}

	/**
	 * Returns device registration status to the supplied household
	 * 
	 * @param string $udid Device id
	 * @return KalturaHouseholdDevice
	 */
	function get($udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("householddevice", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Returns the devices within the household
	 * 
	 * @param KalturaHouseholdDeviceFilter $filter Household devices filter
	 * @return KalturaHouseholdDeviceListResponse
	 */
	function listAction(KalturaHouseholdDeviceFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("householddevice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDeviceListResponse");
		return $resultObject;
	}

	/**
	 * User sign-in via a time-expired sign-in PIN.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $pin Pin code
	 * @param string $udid Device UDID
	 * @param map $extraParams Extra params
	 * @return KalturaLoginResponse
	 */
	function loginWithPin($partnerId, $pin, $udid = null, array $extraParams = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->addParam($kparams, "udid", $udid);
		if ($extraParams !== null)
			$this->client->addParam($kparams, "extraParams", $extraParams->toParams());
		$this->client->queueServiceActionCall("householddevice", "loginWithPin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * Update the name of the device by UDID
	 * 
	 * @param string $udid Device UDID
	 * @param KalturaHouseholdDevice $device Device object
	 * @return KalturaHouseholdDevice
	 */
	function update($udid, KalturaHouseholdDevice $device)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "device", $device->toParams());
		$this->client->queueServiceActionCall("householddevice", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Update the name of the device by UDID
	 * 
	 * @param string $udid Device UDID
	 * @param string $status Device status
	 * @return bool
	 */
	function updateStatus($udid, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "status", $status);
		$this->client->queueServiceActionCall("householddevice", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Adds or updates dynamic data item for device with identifier udid. If it is needed to update several items, use a multi-request to avoid race conditions.
	 * 
	 * @param string $udid Unique identifier of device.
	 * @param string $key Key of dynamic data item. Max length of key is 125 characters.
	 * @param KalturaStringValue $value Value of dynamic data item. Max length of value is 255 characters.
	 * @return KalturaDynamicData
	 */
	function upsertDynamicData($udid, $key, KalturaStringValue $value)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "key", $key);
		$this->client->addParam($kparams, "value", $value->toParams());
		$this->client->queueServiceActionCall("householddevice", "upsertDynamicData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDynamicData");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdLimitationsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add household limitation
	 * 
	 * @param KalturaHouseholdLimitations $householdLimitations Household limitations
	 * @return KalturaHouseholdLimitations
	 */
	function add(KalturaHouseholdLimitations $householdLimitations)
	{
		$kparams = array();
		$this->client->addParam($kparams, "householdLimitations", $householdLimitations->toParams());
		$this->client->queueServiceActionCall("householdlimitations", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdLimitations");
		return $resultObject;
	}

	/**
	 * Delete household limitation
	 * 
	 * @param int $householdLimitationsId Id of household limitation
	 * @return bool
	 */
	function delete($householdLimitationsId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "householdLimitationsId", $householdLimitationsId);
		$this->client->queueServiceActionCall("householdlimitations", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the limitation module by id
	 * 
	 * @param int $id Household limitations module identifier
	 * @return KalturaHouseholdLimitations
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("householdlimitations", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdLimitations");
		return $resultObject;
	}

	/**
	 * Checks if the DLM is used
	 * 
	 * @param int $dlmId Household limitations module identifier
	 * @return bool
	 */
	function isUsed($dlmId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "dlmId", $dlmId);
		$this->client->queueServiceActionCall("householdlimitations", "isUsed", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the list of PartnerConfiguration
	 * 
	 * @return KalturaHouseholdLimitationsListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdlimitations", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdLimitationsListResponse");
		return $resultObject;
	}

	/**
	 * Updates household limitation
	 * 
	 * @param int $dlmId Id of household limitation
	 * @param KalturaHouseholdLimitations $householdLimitation Household limitation
	 * @return KalturaHouseholdLimitations
	 */
	function update($dlmId, KalturaHouseholdLimitations $householdLimitation)
	{
		$kparams = array();
		$this->client->addParam($kparams, "dlmId", $dlmId);
		$this->client->addParam($kparams, "householdLimitation", $householdLimitation->toParams());
		$this->client->queueServiceActionCall("householdlimitations", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdLimitations");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentGatewayService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Disable payment-gateway on the household
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @return bool
	 */
	function disable($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "disable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Enable a payment-gateway provider for the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @return bool
	 */
	function enable($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "enable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get a household’s billing account identifier (charge ID) for a given payment gateway
	 * 
	 * @param string $paymentGatewayExternalId External identifier for the payment gateway
	 * @return string
	 */
	function getChargeID($paymentGatewayExternalId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayExternalId", $paymentGatewayExternalId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "getChargeID", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Gets the Payment Gateway Configuration for the payment gateway identifier given
	 * 
	 * @param int $paymentGatewayId The payemnt gateway for which to return the registration URL/s for the household. If omitted – return the regisration URL for the household for the default payment gateway
	 * @param string $intent Represent the client’s intent for working with the payment gateway. Intent options to be coordinated with the applicable payment gateway adapter.
	 * @param array $extraParameters Additional parameters to send to the payment gateway adapter.
	 * @return KalturaPaymentGatewayConfiguration
	 */
	function invoke($paymentGatewayId, $intent, array $extraParameters)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "intent", $intent);
		foreach($extraParameters as $index => $obj)
		{
			$this->client->addParam($kparams, "extraParameters:$index", $obj->toParams());
		}
		$this->client->queueServiceActionCall("householdpaymentgateway", "invoke", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayConfiguration");
		return $resultObject;
	}

	/**
	 * Get a list of all configured Payment Gateways providers available for the account. For each payment is provided with the household associated payment methods.
	 * 
	 * @return KalturaHouseholdPaymentGatewayListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdpaymentgateway", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPaymentGatewayListResponse");
		return $resultObject;
	}

	/**
	 * Resumes all the entitlements of the given payment gateway
	 * 
	 * @param int $paymentGatewayId Payment gateway ID
	 * @param array $adapterData Adapter data
	 */
	function resume($paymentGatewayId, array $adapterData = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		if ($adapterData !== null)
			foreach($adapterData as $index => $obj)
			{
				$this->client->addParam($kparams, "adapterData:$index", $obj->toParams());
			}
		$this->client->queueServiceActionCall("householdpaymentgateway", "resume", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Set user billing account identifier (charge ID), for a specific household and a specific payment gateway
	 * 
	 * @param string $paymentGatewayExternalId External identifier for the payment gateway
	 * @param string $chargeId The billing user account identifier for this household at the given payment gateway
	 * @return bool
	 */
	function setChargeID($paymentGatewayExternalId, $chargeId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayExternalId", $paymentGatewayExternalId);
		$this->client->addParam($kparams, "chargeId", $chargeId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "setChargeID", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Suspends all the entitlements of the given payment gateway
	 * 
	 * @param int $paymentGatewayId Payment gateway ID
	 * @param KalturaSuspendSettings $suspendSettings Suspend settings
	 */
	function suspend($paymentGatewayId, KalturaSuspendSettings $suspendSettings = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		if ($suspendSettings !== null)
			$this->client->addParam($kparams, "suspendSettings", $suspendSettings->toParams());
		$this->client->queueServiceActionCall("householdpaymentgateway", "suspend", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentMethodService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new payment method for household
	 * 
	 * @param KalturaHouseholdPaymentMethod $householdPaymentMethod Household payment method
	 * @return KalturaHouseholdPaymentMethod
	 */
	function add(KalturaHouseholdPaymentMethod $householdPaymentMethod)
	{
		$kparams = array();
		$this->client->addParam($kparams, "householdPaymentMethod", $householdPaymentMethod->toParams());
		$this->client->queueServiceActionCall("householdpaymentmethod", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPaymentMethod");
		return $resultObject;
	}

	/**
	 * Force remove of a payment method of the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param int $paymentMethodId Payment method Identifier
	 * @return bool
	 */
	function forceRemove($paymentGatewayId, $paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("householdpaymentmethod", "forceRemove", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get a list of all payment methods of the household.
	 * 
	 * @return KalturaHouseholdPaymentMethodListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdpaymentmethod", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPaymentMethodListResponse");
		return $resultObject;
	}

	/**
	 * Removes a payment method of the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param int $paymentMethodId Payment method Identifier
	 * @return bool
	 */
	function remove($paymentGatewayId, $paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("householdpaymentmethod", "remove", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Set a payment method as default for the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param int $paymentMethodId Payment method Identifier
	 * @return bool
	 */
	function setAsDefault($paymentGatewayId, $paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("householdpaymentmethod", "setAsDefault", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPremiumServiceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns all the premium services allowed for the household
	 * 
	 * @return KalturaHouseholdPremiumServiceListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdpremiumservice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPremiumServiceListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdQuotaService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns the household&#39;s quota data
	 * 
	 * @return KalturaHouseholdQuota
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdquota", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdQuota");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdSegmentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * HouseholdSegment add
	 * 
	 * @param KalturaHouseholdSegment $objectToAdd HouseholdSegment details
	 * @return KalturaHouseholdSegment
	 */
	function add(KalturaHouseholdSegment $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("householdsegment", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdSegment");
		return $resultObject;
	}

	/**
	 * Remove segment from household
	 * 
	 * @param bigint $id Segment identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("householdsegment", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Gets all HouseholdSegment items for a household
	 * 
	 * @param KalturaHouseholdSegmentFilter $filter Filter
	 * @return KalturaHouseholdSegmentListResponse
	 */
	function listAction(KalturaHouseholdSegmentFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("householdsegment", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdSegmentListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdUserService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a user to household
	 * 
	 * @param KalturaHouseholdUser $householdUser User details to add
	 * @return KalturaHouseholdUser
	 */
	function add(KalturaHouseholdUser $householdUser)
	{
		$kparams = array();
		$this->client->addParam($kparams, "householdUser", $householdUser->toParams());
		$this->client->queueServiceActionCall("householduser", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdUser");
		return $resultObject;
	}

	/**
	 * Removes a user from household
	 * 
	 * @param string $id The identifier of the user to delete
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("householduser", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the users within the household
	 * 
	 * @param KalturaHouseholdUserFilter $filter Household user filter
	 * @return KalturaHouseholdUserListResponse
	 */
	function listAction(KalturaHouseholdUserFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("householduser", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdUserListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImageService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new image
	 * 
	 * @param KalturaImage $image Image
	 * @return KalturaImage
	 */
	function add(KalturaImage $image)
	{
		$kparams = array();
		$this->client->addParam($kparams, "image", $image->toParams());
		$this->client->queueServiceActionCall("image", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaImage");
		return $resultObject;
	}

	/**
	 * Delete an existing image
	 * 
	 * @param bigint $id Image ID
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("image", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the list of images by different filtering
	 * 
	 * @param KalturaImageFilter $filter Filter
	 * @return KalturaImageListResponse
	 */
	function listAction(KalturaImageFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("image", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaImageListResponse");
		return $resultObject;
	}

	/**
	 * Sets the content of an existing image
	 * 
	 * @param bigint $id Image ID
	 * @param KalturaContentResource $content Content of the image to set
	 */
	function setContent($id, KalturaContentResource $content)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "content", $content->toParams());
		$this->client->queueServiceActionCall("image", "setContent", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaImageTypeService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new image type
	 * 
	 * @param KalturaImageType $imageType Image type object
	 * @return KalturaImageType
	 */
	function add(KalturaImageType $imageType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "imageType", $imageType->toParams());
		$this->client->queueServiceActionCall("imagetype", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaImageType");
		return $resultObject;
	}

	/**
	 * Delete an existing image type
	 * 
	 * @param bigint $id Image type ID
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("imagetype", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the list of image types for the partner
	 * 
	 * @param KalturaImageTypeFilter $filter Filter
	 * @return KalturaImageTypeListResponse
	 */
	function listAction(KalturaImageTypeFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("imagetype", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaImageTypeListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing image type
	 * 
	 * @param bigint $id Image type ID
	 * @param KalturaImageType $imageType Image type object
	 * @return KalturaImageType
	 */
	function update($id, KalturaImageType $imageType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "imageType", $imageType->toParams());
		$this->client->queueServiceActionCall("imagetype", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaImageType");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessageService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * TBD
	 * 
	 * @param string $id Message id
	 * @return KalturaInboxMessage
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("inboxmessage", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaInboxMessage");
		return $resultObject;
	}

	/**
	 * List inbox messages
	 * 
	 * @param KalturaInboxMessageFilter $filter Filter
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaInboxMessageListResponse
	 */
	function listAction(KalturaInboxMessageFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("inboxmessage", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaInboxMessageListResponse");
		return $resultObject;
	}

	/**
	 * Updates the message status.
	 * 
	 * @param string $id Message identifier
	 * @param string $status Message status
	 * @return bool
	 */
	function updateStatus($id, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "status", $status);
		$this->client->queueServiceActionCall("inboxmessage", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new ingest profile for partner
	 * 
	 * @param KalturaIngestProfile $ingestProfile Ingest profile Object to be added
	 * @return KalturaIngestProfile
	 */
	function add(KalturaIngestProfile $ingestProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ingestProfile", $ingestProfile->toParams());
		$this->client->queueServiceActionCall("ingestprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIngestProfile");
		return $resultObject;
	}

	/**
	 * Delete ingest profiles by ingest profiles id
	 * 
	 * @param int $ingestProfileId Ingest profile Identifier
	 * @return bool
	 */
	function delete($ingestProfileId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ingestProfileId", $ingestProfileId);
		$this->client->queueServiceActionCall("ingestprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns all ingest profiles for partner
	 * 
	 * @return KalturaIngestProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ingestprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIngestProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update ingest profile details
	 * 
	 * @param int $ingestProfileId Ingest profile Identifier
	 * @param KalturaIngestProfile $ingestProfile Ingest profile Object
	 * @return KalturaIngestProfile
	 */
	function update($ingestProfileId, KalturaIngestProfile $ingestProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ingestProfileId", $ingestProfileId);
		$this->client->addParam($kparams, "ingestProfile", $ingestProfile->toParams());
		$this->client->queueServiceActionCall("ingestprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIngestProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIngestStatusService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns information about specific Ingest job
	 * 
	 * @param bigint $ingestId The id of the requested ingest job
	 * @return KalturaIngestEpgDetails
	 */
	function getEpgDetails($ingestId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ingestId", $ingestId);
		$this->client->queueServiceActionCall("ingeststatus", "getEpgDetails", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIngestEpgDetails");
		return $resultObject;
	}

	/**
	 * Response with list of ingest jobs.
	 * 
	 * @param KalturaIngestByIdsFilter $idsFilter Filter pager
	 * @param KalturaIngestByCompoundFilter $filter Filter pager
	 * @param KalturaFilterPager $pager Filter pager
	 * @return KalturaIngestStatusEpgListResponse
	 */
	function getEpgList(KalturaIngestByIdsFilter $idsFilter = null, KalturaIngestByCompoundFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($idsFilter !== null)
			$this->client->addParam($kparams, "idsFilter", $idsFilter->toParams());
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("ingeststatus", "getEpgList", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIngestStatusEpgListResponse");
		return $resultObject;
	}

	/**
	 * Get as input ingest job id, filter and pager and response with page of filtered detailed ingest job results.
	 * 
	 * @param bigint $ingestId The id of the requested ingest job
	 * @param KalturaIngestEpgProgramResultFilter $filter Filter for Ingest program, results
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaIngestStatusEpgProgramResultListResponse
	 */
	function getEpgProgramResultList($ingestId, KalturaIngestEpgProgramResultFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ingestId", $ingestId);
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("ingeststatus", "getEpgProgramResultList", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIngestStatusEpgProgramResultListResponse");
		return $resultObject;
	}

	/**
	 * Returns Core Ingest service partner configurations
	 * 
	 * @return KalturaIngestStatusPartnerConfiguration
	 */
	function getPartnerConfiguration()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ingeststatus", "getPartnerConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIngestStatusPartnerConfiguration");
		return $resultObject;
	}

	/**
	 * Returns Core Ingest service partner configurations
	 * 
	 * @param KalturaIngestStatusPartnerConfiguration $config The partner config updates
	 */
	function updatePartnerConfiguration(KalturaIngestStatusPartnerConfiguration $config)
	{
		$kparams = array();
		$this->client->addParam($kparams, "config", $config->toParams());
		$this->client->queueServiceActionCall("ingeststatus", "updatePartnerConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIotService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get iot Client Configuration
	 * 
	 * @return KalturaIotClientConfiguration
	 */
	function getClientConfiguration()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("iot", "getClientConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaIotClientConfiguration");
		return $resultObject;
	}

	/**
	 * Register IOT device
	 * 
	 * @return bool
	 */
	function register()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("iot", "register", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaIotProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new environment in aws
	 * 
	 * @return bool
	 */
	function add()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("iotprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLabelService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Create a new label associated with a predefined entity attribute. Currently supports only labels on KalturaMediaFile.
	 * 
	 * @param KalturaLabel $label KalturaLabel object with defined Value.
	 * @return KalturaLabel
	 */
	function add(KalturaLabel $label)
	{
		$kparams = array();
		$this->client->addParam($kparams, "label", $label->toParams());
		$this->client->queueServiceActionCall("label", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLabel");
		return $resultObject;
	}

	/**
	 * Deletes the existing label by its identifier.
	 * 
	 * @param bigint $id The identifier of label.
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("label", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets list of labels which meet the filter criteria.
	 * 
	 * @param KalturaLabelFilter $filter Filter.
	 * @param KalturaFilterPager $pager Page size and index.
	 * @return KalturaLabelListResponse
	 */
	function listAction(KalturaLabelFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("label", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLabelListResponse");
		return $resultObject;
	}

	/**
	 * Updates the existing label with a new value.
	 * 
	 * @param bigint $id The identifier of label.
	 * @param KalturaLabel $label KalturaLabel object with new Value.
	 * @return KalturaLabel
	 */
	function update($id, KalturaLabel $label)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "label", $label->toParams());
		$this->client->queueServiceActionCall("label", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLabel");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLanguageService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of languages for the partner with option to filter by language codes
	 * 
	 * @param KalturaLanguageFilter $filter Language filter
	 * @return KalturaLanguageListResponse
	 */
	function listAction(KalturaLanguageFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("language", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLanguageListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLicensedUrlService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the URL for playing an asset - program, media or recording
	 * 
	 * @param KalturaLicensedUrlBaseRequest $request Licensed URL request parameters
	 * @return KalturaLicensedUrl
	 */
	function get(KalturaLicensedUrlBaseRequest $request)
	{
		$kparams = array();
		$this->client->addParam($kparams, "request", $request->toParams());
		$this->client->queueServiceActionCall("licensedurl", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLicensedUrl");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLineupService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return regional lineup (list of lineup channel asset objects) based on the requester session characteristics and his region.
	 * 
	 * @param int $pageIndex Page index - The page index to retrieve, (if it is not sent the default page size is 1).
	 * @param int $pageSize Page size - The page size to retrieve. Must be one of the follow numbers: 100, 200, 800, 1200, 1600 (if it is not sent the default page size is 500).
	 * @return KalturaLineupChannelAssetListResponse
	 */
	function get($pageIndex, $pageSize)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pageIndex", $pageIndex);
		$this->client->addParam($kparams, "pageSize", $pageSize);
		$this->client->queueServiceActionCall("lineup", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLineupChannelAssetListResponse");
		return $resultObject;
	}

	/**
	 * Sends lineup update requested notification.
	 * 
	 * @param string $regionIds Region IDs separated by commas.
	 * @return bool
	 */
	function sendUpdatedNotification($regionIds)
	{
		$kparams = array();
		$this->client->addParam($kparams, "regionIds", $regionIds);
		$this->client->queueServiceActionCall("lineup", "sendUpdatedNotification", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLiveToVodService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get existing L2V configuration for both the partner level and all channels level.
	 * 
	 * @return KalturaLiveToVodFullConfiguration
	 */
	function getConfiguration()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("livetovod", "getConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveToVodFullConfiguration");
		return $resultObject;
	}

	/**
	 * Get existing L2V configuration for a specific linear asset.
	 * 
	 * @param bigint $linearAssetId Linear asset's identifier.
	 * @return KalturaLiveToVodLinearAssetConfiguration
	 */
	function getLinearAssetConfiguration($linearAssetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "linearAssetId", $linearAssetId);
		$this->client->queueServiceActionCall("livetovod", "getLinearAssetConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveToVodLinearAssetConfiguration");
		return $resultObject;
	}

	/**
	 * Get existing L2V partner configuration.
	 * 
	 * @return KalturaLiveToVodPartnerConfiguration
	 */
	function getPartnerConfiguration()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("livetovod", "getPartnerConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveToVodPartnerConfiguration");
		return $resultObject;
	}

	/**
	 * Set L2V configuration for a specific Linear channel.
	 * 
	 * @param KalturaLiveToVodLinearAssetConfiguration $configuration Live to VOD linear asset (live channel) configuration object.
	 * @return KalturaLiveToVodLinearAssetConfiguration
	 */
	function updateLinearAssetConfiguration(KalturaLiveToVodLinearAssetConfiguration $configuration)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("livetovod", "updateLinearAssetConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveToVodLinearAssetConfiguration");
		return $resultObject;
	}

	/**
	 * Set L2V configuration on the partner level.
	 * 
	 * @param KalturaLiveToVodPartnerConfiguration $configuration Live to VOD configuration object.
	 * @return KalturaLiveToVodPartnerConfiguration
	 */
	function updatePartnerConfiguration(KalturaLiveToVodPartnerConfiguration $configuration)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("livetovod", "updatePartnerConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLiveToVodPartnerConfiguration");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaConcurrencyRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of meta mappings for the partner
	 * 
	 * @return KalturaMediaConcurrencyRuleListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("mediaconcurrencyrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaConcurrencyRuleListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new media file
	 * 
	 * @param KalturaMediaFile $mediaFile Media file object
	 * @return KalturaMediaFile
	 */
	function add(KalturaMediaFile $mediaFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaFile", $mediaFile->toParams());
		$this->client->queueServiceActionCall("mediafile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaFile");
		return $resultObject;
	}

	/**
	 * Delete an existing media file
	 * 
	 * @param bigint $id Media file identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("mediafile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns a list of media-file
	 * 
	 * @param KalturaMediaFileFilter $filter Filter
	 * @return KalturaMediaFileListResponse
	 */
	function listAction(KalturaMediaFileFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("mediafile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaFileListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing media file
	 * 
	 * @param bigint $id Media file identifier
	 * @param KalturaMediaFile $mediaFile Media file object
	 * @return KalturaMediaFile
	 */
	function update($id, KalturaMediaFile $mediaFile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "mediaFile", $mediaFile->toParams());
		$this->client->queueServiceActionCall("mediafile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaFile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMediaFileTypeService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new media-file type
	 * 
	 * @param KalturaMediaFileType $mediaFileType Media-file type
	 * @return KalturaMediaFileType
	 */
	function add(KalturaMediaFileType $mediaFileType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "mediaFileType", $mediaFileType->toParams());
		$this->client->queueServiceActionCall("mediafiletype", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaFileType");
		return $resultObject;
	}

	/**
	 * Delete media-file type by id
	 * 
	 * @param int $id Media-file type identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("mediafiletype", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns a list of media-file types
	 * 
	 * @return KalturaMediaFileTypeListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("mediafiletype", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaFileTypeListResponse");
		return $resultObject;
	}

	/**
	 * Update existing media-file type
	 * 
	 * @param int $id Media-file type identifier
	 * @param KalturaMediaFileType $mediaFileType Media-file type
	 * @return KalturaMediaFileType
	 */
	function update($id, KalturaMediaFileType $mediaFileType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "mediaFileType", $mediaFileType->toParams());
		$this->client->queueServiceActionCall("mediafiletype", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMediaFileType");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMessageTemplateService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve a message template used in push notifications and inbox
	 * 
	 * @param string $messageType Possible values: Asset type – Series, Reminder,Churn
	 * @return KalturaMessageTemplate
	 */
	function get($messageType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "messageType", $messageType);
		$this->client->queueServiceActionCall("messagetemplate", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMessageTemplate");
		return $resultObject;
	}

	/**
	 * Set the account’s push notifications and inbox messages templates
	 * 
	 * @param string $messageType The asset type to update its template
	 * @param KalturaMessageTemplate $template The actual message with placeholders to be presented to the user
	 * @return KalturaMessageTemplate
	 */
	function update($messageType, KalturaMessageTemplate $template)
	{
		$kparams = array();
		$this->client->addParam($kparams, "messageType", $messageType);
		$this->client->addParam($kparams, "template", $template->toParams());
		$this->client->queueServiceActionCall("messagetemplate", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMessageTemplate");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new meta
	 * 
	 * @param KalturaMeta $meta Meta Object
	 * @return KalturaMeta
	 */
	function add(KalturaMeta $meta)
	{
		$kparams = array();
		$this->client->addParam($kparams, "meta", $meta->toParams());
		$this->client->queueServiceActionCall("meta", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMeta");
		return $resultObject;
	}

	/**
	 * Delete an existing meta
	 * 
	 * @param bigint $id Meta Identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("meta", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return a list of metas for the account with optional filter
	 * 
	 * @param KalturaMetaFilter $filter Meta filter
	 * @return KalturaMetaListResponse
	 */
	function listAction(KalturaMetaFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("meta", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetaListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing meta
	 * 
	 * @param bigint $id Meta identifier
	 * @param KalturaMeta $meta Meta
	 * @return KalturaMeta
	 */
	function update($id, KalturaMeta $meta)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "meta", $meta->toParams());
		$this->client->queueServiceActionCall("meta", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMeta");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * TBD
	 * 
	 * @param string $identifier In case type is 'announcement', identifier should be the announcement ID. In case type is 'system', identifier should be 'login' (the login topic)
	 * @param string $type 'announcement' - TV-Series topic, 'system' - login topic
	 * @return KalturaRegistryResponse
	 */
	function register($identifier, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "identifier", $identifier);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("notification", "register", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegistryResponse");
		return $resultObject;
	}

	/**
	 * Sends push notification to user devices
	 * 
	 * @param int $userId User identifications
	 * @param KalturaPushMessage $pushMessage Message push data
	 * @return bool
	 */
	function sendPush($userId, KalturaPushMessage $pushMessage)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "pushMessage", $pushMessage->toParams());
		$this->client->queueServiceActionCall("notification", "sendPush", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Sends SMS notification to user
	 * 
	 * @param string $message Message to send
	 * @param string $phoneNumber Optional phoneNumber
	 * @param map $adapterData Data used by the adapter
	 * @return bool
	 */
	function sendSms($message, $phoneNumber = null, array $adapterData = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "message", $message);
		$this->client->addParam($kparams, "phoneNumber", $phoneNumber);
		if ($adapterData !== null)
			$this->client->addParam($kparams, "adapterData", $adapterData->toParams());
		$this->client->queueServiceActionCall("notification", "sendSms", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Registers the device push token to the push service
	 * 
	 * @param string $pushToken The device-application pair authentication for push delivery
	 * @return bool
	 */
	function setDevicePushToken($pushToken)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pushToken", $pushToken);
		$this->client->queueServiceActionCall("notification", "setDevicePushToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationsPartnerSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the partner notification settings.
	 * 
	 * @return KalturaNotificationsPartnerSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("notificationspartnersettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaNotificationsPartnerSettings");
		return $resultObject;
	}

	/**
	 * Update the account notification settings
	 * 
	 * @param KalturaNotificationsPartnerSettings $settings Account notification settings model
	 * @return bool
	 */
	function update(KalturaNotificationsPartnerSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("notificationspartnersettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationsSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the user’s notification settings.
	 * 
	 * @return KalturaNotificationsSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("notificationssettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaNotificationsSettings");
		return $resultObject;
	}

	/**
	 * Update the user’s notification settings.
	 * 
	 * @param KalturaNotificationsSettings $settings Notifications settings
	 * @return bool
	 */
	function update(KalturaNotificationsSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("notificationssettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update the user’s notification settings.
	 * 
	 * @param KalturaNotificationsSettings $settings Notifications settings
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 * @return bool
	 */
	function updateWithToken(KalturaNotificationsSettings $settings, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("notificationssettings", "updateWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOssAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new OSS adapter for partner
	 * 
	 * @param KalturaOSSAdapterProfile $ossAdapter OSS adapter Object
	 * @return KalturaOSSAdapterProfile
	 */
	function add(KalturaOSSAdapterProfile $ossAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapter", $ossAdapter->toParams());
		$this->client->queueServiceActionCall("ossadapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}

	/**
	 * Delete OSS adapter by OSS adapter id
	 * 
	 * @param int $ossAdapterId OSS adapter identifier
	 * @return bool
	 */
	function delete($ossAdapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapterId", $ossAdapterId);
		$this->client->queueServiceActionCall("ossadapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate oss adapter shared secret
	 * 
	 * @param int $ossAdapterId OSS adapter identifier
	 * @return KalturaOSSAdapterProfile
	 */
	function generateSharedSecret($ossAdapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapterId", $ossAdapterId);
		$this->client->queueServiceActionCall("ossadapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all OSS adapters for partner : id + name
	 * 
	 * @param int $id OSS adapter identifier
	 * @return KalturaOSSAdapterProfile
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ossadapterprofile", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all OSS adapters for partner : id + name
	 * 
	 * @return KalturaOSSAdapterProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ossadapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update OSS adapter details
	 * 
	 * @param int $ossAdapterId OSS adapter identifier
	 * @param KalturaOSSAdapterProfile $ossAdapter OSS adapter Object
	 * @return KalturaOSSAdapterProfile
	 */
	function update($ossAdapterId, KalturaOSSAdapterProfile $ossAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapterId", $ossAdapterId);
		$this->client->addParam($kparams, "ossAdapter", $ossAdapter->toParams());
		$this->client->queueServiceActionCall("ossadapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOttCategoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the list of categories (hierarchical) and their associated channels
	 * 
	 * @param int $id Category Identifier
	 * @return KalturaOTTCategory
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ottcategory", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTCategory");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOttUserService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Activate the account by activation token
	 * 
	 * @param int $partnerId The partner ID
	 * @param string $username Username of the user to activate
	 * @param string $activationToken Activation token of the user
	 * @return KalturaOTTUser
	 */
	function activate($partnerId, $username, $activationToken)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->addParam($kparams, "activationToken", $activationToken);
		$this->client->queueServiceActionCall("ottuser", "activate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Deprecate - use Register or Update actions instead by setting user.roleIds parameter
	 * 
	 * @param bigint $roleId The role identifier to add
	 * @return bool
	 */
	function addRole($roleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "roleId", $roleId);
		$this->client->queueServiceActionCall("ottuser", "addRole", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns tokens (KS and refresh token) for anonymous access
	 * 
	 * @param int $partnerId The partner ID
	 * @param string $udid The caller device's UDID
	 * @return KalturaLoginSession
	 */
	function anonymousLogin($partnerId, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("ottuser", "anonymousLogin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginSession");
		return $resultObject;
	}

	/**
	 * Permanently delete a user. User to delete cannot be an exclusive household master, and cannot be default user.
	 * 
	 * @return bool
	 */
	function delete()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ottuser", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Deletes dynamic data item for a user.
	 * 
	 * @param string $key Key of dynamic data item.
	 * @return bool
	 */
	function deleteDynamicData($key)
	{
		$kparams = array();
		$this->client->addParam($kparams, "key", $key);
		$this->client->queueServiceActionCall("ottuser", "deleteDynamicData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieving users&#39; data
	 * 
	 * @return KalturaOTTUser
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ottuser", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Returns the identifier of the user encrypted with SHA1 using configured key
	 * 
	 * @return KalturaStringValue
	 */
	function getEncryptedUserId()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ottuser", "getEncryptedUserId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStringValue");
		return $resultObject;
	}

	/**
	 * Returns list of OTTUser (limited to 500 items). Filters by username/external identifier/idIn or roleIdIn
	 * 
	 * @param KalturaOTTUserFilter $filter Filter request
	 * @return KalturaOTTUserListResponse
	 */
	function listAction(KalturaOTTUserFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("ottuser", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUserListResponse");
		return $resultObject;
	}

	/**
	 * Login with user name and password.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $username User name
	 * @param string $password Password
	 * @param map $extraParams Extra params
	 * @param string $udid Device UDID
	 * @return KalturaLoginResponse
	 */
	function login($partnerId, $username = null, $password = null, array $extraParams = null, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->addParam($kparams, "password", $password);
		if ($extraParams !== null)
			$this->client->addParam($kparams, "extraParams", $extraParams->toParams());
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("ottuser", "login", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * User sign-in via a time-expired sign-in PIN.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $pin Pin code
	 * @param string $udid Device UDID
	 * @param string $secret Additional security parameter to validate the login
	 * @param map $extraParams Extra params
	 * @return KalturaLoginResponse
	 */
	function loginWithPin($partnerId, $pin, $udid = null, $secret = null, array $extraParams = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "secret", $secret);
		if ($extraParams !== null)
			$this->client->addParam($kparams, "extraParams", $extraParams->toParams());
		$this->client->queueServiceActionCall("ottuser", "loginWithPin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * Logout the calling user.
	 * 
	 * @param map $adapterData Adapter data
	 * @return bool
	 */
	function logout(array $adapterData = null)
	{
		$kparams = array();
		if ($adapterData !== null)
			$this->client->addParam($kparams, "adapterData", $adapterData->toParams());
		$this->client->queueServiceActionCall("ottuser", "logout", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Sign up a new user.
	 * 
	 * @param int $partnerId Partner identifier
	 * @param KalturaOTTUser $user The user model to add
	 * @param string $password Password
	 * @return KalturaOTTUser
	 */
	function register($partnerId, KalturaOTTUser $user, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "user", $user->toParams());
		$this->client->addParam($kparams, "password", $password);
		$this->client->queueServiceActionCall("ottuser", "register", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Resend the activation token to a user
	 * 
	 * @param int $partnerId The partner ID
	 * @param string $username Username of the user to activate
	 * @return bool
	 */
	function resendActivationToken($partnerId, $username)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->queueServiceActionCall("ottuser", "resendActivationToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Send an e-mail with URL to enable the user to set new password.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $username User name
	 * @param string $templateName Template name for reset password
	 * @return bool
	 */
	function resetPassword($partnerId, $username, $templateName = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->addParam($kparams, "templateName", $templateName);
		$this->client->queueServiceActionCall("ottuser", "resetPassword", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Renew the user&#39;s password after validating the token that sent as part of URL in e-mail.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $token Token that sent by e-mail
	 * @param string $password New password
	 * @return KalturaOTTUser
	 */
	function setInitialPassword($partnerId, $token, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "password", $password);
		$this->client->queueServiceActionCall("ottuser", "setInitialPassword", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Update user information
	 * 
	 * @param KalturaOTTUser $user User data (includes basic and dynamic data)
	 * @param string $id User ID
	 * @return KalturaOTTUser
	 */
	function update(KalturaOTTUser $user, $id = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "user", $user->toParams());
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ottuser", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Update user dynamic data. If it is needed to update several items, use a multi-request to avoid race conditions.
            This API endpoint will deprecated soon. Please use UpsertDynamicData instead of it.
	 * 
	 * @param string $key Type of dynamicData. Max length of key is 50 characters.
	 * @param KalturaStringValue $value Value of dynamicData. Max length of value is 512 characters.
	 * @return KalturaOTTUserDynamicData
	 */
	function updateDynamicData($key, KalturaStringValue $value)
	{
		$kparams = array();
		$this->client->addParam($kparams, "key", $key);
		$this->client->addParam($kparams, "value", $value->toParams());
		$this->client->queueServiceActionCall("ottuser", "updateDynamicData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUserDynamicData");
		return $resultObject;
	}

	/**
	 * Given a user name and existing password, change to a new password.
	 * 
	 * @param string $username User name
	 * @param string $oldPassword Old password
	 * @param string $newPassword New password
	 * @return bool
	 */
	function updateLoginData($username, $oldPassword, $newPassword)
	{
		$kparams = array();
		$this->client->addParam($kparams, "username", $username);
		$this->client->addParam($kparams, "oldPassword", $oldPassword);
		$this->client->addParam($kparams, "newPassword", $newPassword);
		$this->client->queueServiceActionCall("ottuser", "updateLoginData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update the user&#39;s existing password.
	 * 
	 * @param int $userId User Identifier
	 * @param string $password New password
	 */
	function updatePassword($userId, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "password", $password);
		$this->client->queueServiceActionCall("ottuser", "updatePassword", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Adds or updates dynamic data item for a user. If it is needed to update several items, use a multi-request to avoid race conditions.
	 * 
	 * @param string $key Key of dynamic data item. Max length of key is 50 characters.
	 * @param KalturaStringValue $value Value of dynamic data item. Max length of value is 512 characters.
	 * @return KalturaDynamicData
	 */
	function upsertDynamicData($key, KalturaStringValue $value)
	{
		$kparams = array();
		$this->client->addParam($kparams, "key", $key);
		$this->client->addParam($kparams, "value", $value->toParams());
		$this->client->queueServiceActionCall("ottuser", "upsertDynamicData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDynamicData");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaParentalRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new parentalRule
	 * 
	 * @param KalturaParentalRule $parentalRule ParentalRule object
	 * @return KalturaParentalRule
	 */
	function add(KalturaParentalRule $parentalRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "parentalRule", $parentalRule->toParams());
		$this->client->queueServiceActionCall("parentalrule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaParentalRule");
		return $resultObject;
	}

	/**
	 * Delete an existing parentalRule
	 * 
	 * @param bigint $id ParentalRule identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("parentalrule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Disables a parental rule that was previously defined by the household master. Disable can be at specific user or household level.
	 * 
	 * @param bigint $ruleId Rule Identifier
	 * @param string $entityReference Reference type to filter by
	 * @return bool
	 */
	function disable($ruleId, $entityReference)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->queueServiceActionCall("parentalrule", "disable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Disables a parental rule that was defined at account level. Disable can be at specific user or household level.
	 * 
	 * @param string $entityReference Reference type to filter by
	 * @return bool
	 */
	function disableDefault($entityReference)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->queueServiceActionCall("parentalrule", "disableDefault", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Enable a parental rules for a user
	 * 
	 * @param bigint $ruleId Rule Identifier
	 * @param string $entityReference Reference type to filter by
	 * @return bool
	 */
	function enable($ruleId, $entityReference)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->queueServiceActionCall("parentalrule", "enable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get an existing parentalRule by identifier
	 * 
	 * @param bigint $id ParentalRule identifier
	 * @return KalturaParentalRule
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("parentalrule", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaParentalRule");
		return $resultObject;
	}

	/**
	 * Return the parental rules that applies for the user or household. Can include rules that have been associated in account, household, or user level.
            Association level is also specified in the response.
	 * 
	 * @param KalturaParentalRuleFilter $filter Filter
	 * @return KalturaParentalRuleListResponse
	 */
	function listAction(KalturaParentalRuleFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("parentalrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaParentalRuleListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing parentalRule
	 * 
	 * @param bigint $id ParentalRule identifier
	 * @param KalturaParentalRule $parentalRule ParentalRule object
	 * @return KalturaParentalRule
	 */
	function update($id, KalturaParentalRule $parentalRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "parentalRule", $parentalRule->toParams());
		$this->client->queueServiceActionCall("parentalrule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaParentalRule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerConfigurationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of PartnerConfiguration
	 * 
	 * @param KalturaPartnerConfigurationFilter $filter Filter by PartnerConfiguration type
	 * @return KalturaPartnerConfigurationListResponse
	 */
	function listAction(KalturaPartnerConfigurationFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("partnerconfiguration", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartnerConfigurationListResponse");
		return $resultObject;
	}

	/**
	 * Update/set Partner Configuration
	 * 
	 * @param KalturaPartnerConfiguration $configuration Partner Configuration to update
	 * @return bool
	 */
	function update(KalturaPartnerConfiguration $configuration)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("partnerconfiguration", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a partner with default user
	 * 
	 * @param KalturaPartner $partner Partner
	 * @param KalturaPartnerSetup $partnerSetup Mandatory parameters to create partner
	 * @return KalturaPartner
	 */
	function add(KalturaPartner $partner, KalturaPartnerSetup $partnerSetup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partner", $partner->toParams());
		$this->client->addParam($kparams, "partnerSetup", $partnerSetup->toParams());
		$this->client->queueServiceActionCall("partner", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartner");
		return $resultObject;
	}

	/**
	 * Internal API !!! create ElasticSearch indexes for partner
	 * 
	 * @return bool
	 */
	function createIndexes()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("partner", "createIndexes", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Internal API !!! Delete Partner
	 * 
	 * @param int $id Partner id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("partner", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns a login session for external system (like OVP)
	 * 
	 * @return KalturaLoginSession
	 */
	function externalLogin()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("partner", "externalLogin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginSession");
		return $resultObject;
	}

	/**
	 * Internal API !!! Returns the list of active Partners
	 * 
	 * @param KalturaPartnerFilter $filter Filter
	 * @return KalturaPartnerListResponse
	 */
	function listAction(KalturaPartnerFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("partner", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartnerListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerPremiumServicesService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns list of services
	 * 
	 * @return KalturaPartnerPremiumServices
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("partnerpremiumservices", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartnerPremiumServices");
		return $resultObject;
	}

	/**
	 * Update partnerPremiumServices
	 * 
	 * @param KalturaPartnerPremiumServices $partnerPremiumServices PartnerPremiumServices to update
	 * @return KalturaPartnerPremiumServices
	 */
	function update(KalturaPartnerPremiumServices $partnerPremiumServices)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerPremiumServices", $partnerPremiumServices->toParams());
		$this->client->queueServiceActionCall("partnerpremiumservices", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPartnerPremiumServices");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPasswordPolicyService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new KalturaPasswordPolicy
	 * 
	 * @param KalturaPasswordPolicy $objectToAdd KalturaPasswordPolicy Object to add
	 * @return KalturaPasswordPolicy
	 */
	function add(KalturaPasswordPolicy $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("passwordpolicy", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPasswordPolicy");
		return $resultObject;
	}

	/**
	 * Delete existing PasswordPolicy
	 * 
	 * @param bigint $id PasswordPolicy identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("passwordpolicy", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns the list of available KalturaPasswordPolicy
	 * 
	 * @param KalturaPasswordPolicyFilter $filter Filter
	 * @return KalturaPasswordPolicyListResponse
	 */
	function listAction(KalturaPasswordPolicyFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("passwordpolicy", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPasswordPolicyListResponse");
		return $resultObject;
	}

	/**
	 * Update existing KalturaPasswordPolicy
	 * 
	 * @param bigint $id Id of KalturaPasswordPolicy to update
	 * @param KalturaPasswordPolicy $objectToUpdate KalturaPasswordPolicy Object to update
	 * @return KalturaPasswordPolicy
	 */
	function update($id, KalturaPasswordPolicy $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("passwordpolicy", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPasswordPolicy");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentGatewayProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new payment gateway for partner
	 * 
	 * @param KalturaPaymentGatewayProfile $paymentGateway Payment Gateway Object
	 * @return KalturaPaymentGatewayProfile
	 */
	function add(KalturaPaymentGatewayProfile $paymentGateway)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGateway", $paymentGateway->toParams());
		$this->client->queueServiceActionCall("paymentgatewayprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfile");
		return $resultObject;
	}

	/**
	 * Delete payment gateway by payment gateway id
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @return bool
	 */
	function delete($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("paymentgatewayprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate payment gateway shared secret
	 * 
	 * @param int $paymentGatewayId Payment gateway identifier
	 * @return KalturaPaymentGatewayProfile
	 */
	function generateSharedSecret($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("paymentgatewayprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfile");
		return $resultObject;
	}

	/**
	 * Gets the Payment Gateway Configuration for the payment gateway identifier given
	 * 
	 * @param string $alias The payemnt gateway for which to return the registration URL/s for the household. If omitted – return the regisration URL for the household for the default payment gateway
	 * @param string $intent Represent the client’s intent for working with the payment gateway. Intent options to be coordinated with the applicable payment gateway adapter.
	 * @param array $extraParameters Additional parameters to send to the payment gateway adapter.
	 * @return KalturaPaymentGatewayConfiguration
	 */
	function getConfiguration($alias, $intent, array $extraParameters)
	{
		$kparams = array();
		$this->client->addParam($kparams, "alias", $alias);
		$this->client->addParam($kparams, "intent", $intent);
		foreach($extraParameters as $index => $obj)
		{
			$this->client->addParam($kparams, "extraParameters:$index", $obj->toParams());
		}
		$this->client->queueServiceActionCall("paymentgatewayprofile", "getConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayConfiguration");
		return $resultObject;
	}

	/**
	 * Returns all payment gateways for partner : id + name
	 * 
	 * @return KalturaPaymentGatewayProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("paymentgatewayprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update payment gateway details
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param KalturaPaymentGatewayProfile $paymentGateway Payment Gateway Object
	 * @return KalturaPaymentGatewayProfile
	 */
	function update($paymentGatewayId, KalturaPaymentGatewayProfile $paymentGateway)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentGateway", $paymentGateway->toParams());
		$this->client->queueServiceActionCall("paymentgatewayprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentMethodProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * TBD
	 * 
	 * @param KalturaPaymentMethodProfile $paymentMethod Payment method to add
	 * @return KalturaPaymentMethodProfile
	 */
	function add(KalturaPaymentMethodProfile $paymentMethod)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentMethod", $paymentMethod->toParams());
		$this->client->queueServiceActionCall("paymentmethodprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentMethodProfile");
		return $resultObject;
	}

	/**
	 * Delete payment method profile
	 * 
	 * @param int $paymentMethodId Payment method identifier to delete
	 * @return bool
	 */
	function delete($paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("paymentmethodprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * TBD
	 * 
	 * @param KalturaPaymentMethodProfileFilter $filter Payment gateway method profile filter
	 * @return KalturaPaymentMethodProfileListResponse
	 */
	function listAction(KalturaPaymentMethodProfileFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("paymentmethodprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentMethodProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update payment method
	 * 
	 * @param int $paymentMethodId Payment method identifier to update
	 * @param KalturaPaymentMethodProfile $paymentMethod Payment method to update
	 * @return KalturaPaymentMethodProfile
	 */
	function update($paymentMethodId, KalturaPaymentMethodProfile $paymentMethod)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->addParam($kparams, "paymentMethod", $paymentMethod->toParams());
		$this->client->queueServiceActionCall("paymentmethodprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentMethodProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds new permission
	 * 
	 * @param KalturaPermission $permission Permission to insert
	 * @return KalturaPermission
	 */
	function add(KalturaPermission $permission)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permission", $permission->toParams());
		$this->client->queueServiceActionCall("permission", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermission");
		return $resultObject;
	}

	/**
	 * Adds permission item to permission
	 * 
	 * @param bigint $permissionId Permission ID to add to
	 * @param bigint $permissionItemId Permission item ID to add
	 */
	function addPermissionItem($permissionId, $permissionItemId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionId", $permissionId);
		$this->client->addParam($kparams, "permissionItemId", $permissionItemId);
		$this->client->queueServiceActionCall("permission", "addPermissionItem", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Deletes an existing permission
	 * 
	 * @param bigint $id Permission ID to delete
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("permission", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns permission names as comma separated string
	 * 
	 * @return string
	 */
	function getCurrentPermissions()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("permission", "getCurrentPermissions", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Retrieving permissions by identifiers, if filter is empty, returns all partner permissions
	 * 
	 * @param KalturaBasePermissionFilter $filter Filter for permissions
	 * @return KalturaPermissionListResponse
	 */
	function listAction(KalturaBasePermissionFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("permission", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionListResponse");
		return $resultObject;
	}

	/**
	 * Removes permission item from permission
	 * 
	 * @param bigint $permissionId Permission ID to remove from
	 * @param bigint $permissionItemId Permission item ID to remove
	 */
	function removePermissionItem($permissionId, $permissionItemId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "permissionId", $permissionId);
		$this->client->addParam($kparams, "permissionItemId", $permissionItemId);
		$this->client->queueServiceActionCall("permission", "removePermissionItem", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Update an existing permission.
	 * 
	 * @param bigint $id Permission  Identifier
	 * @param KalturaPermission $permission Permission object
	 * @return KalturaPermission
	 */
	function update($id, KalturaPermission $permission)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "permission", $permission->toParams());
		$this->client->queueServiceActionCall("permission", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermission");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPermissionItemService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return a list of permission items with filtering options
	 * 
	 * @param KalturaPermissionItemFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaPermissionItemListResponse
	 */
	function listAction(KalturaPermissionItemFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("permissionitem", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPermissionItemListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalFeedService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List user&#39;s feeds.
            Possible status codes:
	 * 
	 * @param KalturaPersonalFeedFilter $filter Required sort option to apply for the identified assets. If omitted – will use relevancy.
            Possible values: relevancy, a_to_z, z_to_a, views, ratings, votes, newest.
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaPersonalFeedListResponse
	 */
	function listAction(KalturaPersonalFeedFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("personalfeed", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPersonalFeedListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalListService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a user&#39;s personal list item to follow.
	 * 
	 * @param KalturaPersonalList $personalList Follow personal list item request parameters
	 * @return KalturaPersonalList
	 */
	function add(KalturaPersonalList $personalList)
	{
		$kparams = array();
		$this->client->addParam($kparams, "personalList", $personalList->toParams());
		$this->client->queueServiceActionCall("personallist", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPersonalList");
		return $resultObject;
	}

	/**
	 * Remove followed item from user&#39;s personal list
	 * 
	 * @param bigint $personalListId PersonalListId identifier
	 */
	function delete($personalListId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "personalListId", $personalListId);
		$this->client->queueServiceActionCall("personallist", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * List user&#39;s tv personal item to follow.
            Possible status codes:
	 * 
	 * @param KalturaPersonalListFilter $filter Personal list filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaPersonalListListResponse
	 */
	function listAction(KalturaPersonalListFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("personallist", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPersonalListListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPinService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the parental or purchase PIN that applies for the household or user. Includes specification of where the PIN was defined at – account, household or user  level
	 * 
	 * @param string $by Reference type to filter by
	 * @param string $type The PIN type to retrieve
	 * @param int $ruleId Rule ID - for PIN per rule (MediaCorp): BEO-1923
	 * @return KalturaPin
	 */
	function get($by, $type, $ruleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "by", $by);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("pin", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPin");
		return $resultObject;
	}

	/**
	 * Set the parental or purchase PIN that applies for the user or the household.
	 * 
	 * @param string $by Reference type to filter by
	 * @param string $type The PIN type to retrieve
	 * @param KalturaPin $pin PIN to set
	 * @param int $ruleId Rule ID - for PIN per rule (MediaCorp): BEO-1923
	 * @return KalturaPin
	 */
	function update($by, $type, KalturaPin $pin, $ruleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "by", $by);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "pin", $pin->toParams());
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("pin", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPin");
		return $resultObject;
	}

	/**
	 * Validate a purchase or parental PIN for a user.
	 * 
	 * @param string $pin PIN to validate
	 * @param string $type The PIN type to retrieve
	 * @param int $ruleId Rule ID - for PIN per rule (MediaCorp): BEO-1923
	 * @return bool
	 */
	function validate($pin, $type, $ruleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("pin", "validate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new Playback adapter for partner
	 * 
	 * @param KalturaPlaybackProfile $playbackProfile Playback adapter Object
	 * @return KalturaPlaybackProfile
	 */
	function add(KalturaPlaybackProfile $playbackProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "playbackProfile", $playbackProfile->toParams());
		$this->client->queueServiceActionCall("playbackprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaybackProfile");
		return $resultObject;
	}

	/**
	 * Delete Playback adapter by Playback adapter id
	 * 
	 * @param int $id Playback adapter identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("playbackprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate playback adapter shared secret
	 * 
	 * @param int $id Playback adapter identifier
	 * @return KalturaPlaybackProfile
	 */
	function generateSharedSecret($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("playbackprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaybackProfile");
		return $resultObject;
	}

	/**
	 * Returns all playback profiles for partner : id + name
	 * 
	 * @param KalturaPlaybackProfileFilter $filter Filter parameters for filtering out the result
	 * @return KalturaPlaybackProfileListResponse
	 */
	function listAction(KalturaPlaybackProfileFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("playbackprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaybackProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update Playback adapter details
	 * 
	 * @param int $id Playback adapter identifier
	 * @param KalturaPlaybackProfile $playbackProfile Playback adapter Object
	 * @return KalturaPlaybackProfile
	 */
	function update($id, KalturaPlaybackProfile $playbackProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "playbackProfile", $playbackProfile->toParams());
		$this->client->queueServiceActionCall("playbackprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaybackProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPpvService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new ppv
	 * 
	 * @param KalturaPpv $ppv Ppv objec
	 * @return KalturaPpv
	 */
	function add(KalturaPpv $ppv)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ppv", $ppv->toParams());
		$this->client->queueServiceActionCall("ppv", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPpv");
		return $resultObject;
	}

	/**
	 * Delete Ppv
	 * 
	 * @param bigint $id Ppv id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ppv", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns ppv object by internal identifier
	 * 
	 * @param bigint $id Ppv identifier
	 * @return KalturaPpv
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ppv", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPpv");
		return $resultObject;
	}

	/**
	 * Returns all ppv objects
	 * 
	 * @param KalturaPpvFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaPpvListResponse
	 */
	function listAction(KalturaPpvFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("ppv", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPpvListResponse");
		return $resultObject;
	}

	/**
	 * Update ppv
	 * 
	 * @param int $id Ppv id
	 * @param KalturaPpv $ppv Ppv Object
	 * @return KalturaPpv
	 */
	function update($id, KalturaPpv $ppv)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "ppv", $ppv->toParams());
		$this->client->queueServiceActionCall("ppv", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPpv");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPreviewModuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new PreviewModule for partner
	 * 
	 * @param KalturaPreviewModule $previewModule Preview module object
	 * @return KalturaPreviewModule
	 */
	function add(KalturaPreviewModule $previewModule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "previewModule", $previewModule->toParams());
		$this->client->queueServiceActionCall("previewmodule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPreviewModule");
		return $resultObject;
	}

	/**
	 * Internal API !!! Delete PreviewModule
	 * 
	 * @param bigint $id PreviewModule id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("previewmodule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns all PreviewModule
	 * 
	 * @param KalturaPreviewModuleFilter $filter Filter
	 * @return KalturaPreviewModuleListResponse
	 */
	function listAction(KalturaPreviewModuleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("previewmodule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPreviewModuleListResponse");
		return $resultObject;
	}

	/**
	 * Update PreviewModule
	 * 
	 * @param bigint $id PreviewModule id
	 * @param KalturaPreviewModule $previewModule PreviewModule
	 * @return KalturaPreviewModule
	 */
	function update($id, KalturaPreviewModule $previewModule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "previewModule", $previewModule->toParams());
		$this->client->queueServiceActionCall("previewmodule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPreviewModule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPriceDetailsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new PriceDetails for partner
	 * 
	 * @param KalturaPriceDetails $priceDetails PriceDetails Object
	 * @return KalturaPriceDetails
	 */
	function add(KalturaPriceDetails $priceDetails)
	{
		$kparams = array();
		$this->client->addParam($kparams, "priceDetails", $priceDetails->toParams());
		$this->client->queueServiceActionCall("pricedetails", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPriceDetails");
		return $resultObject;
	}

	/**
	 * Delete PriceDetails
	 * 
	 * @param bigint $id PriceDetails identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("pricedetails", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the list of available prices, can be filtered by price IDs
	 * 
	 * @param KalturaPriceDetailsFilter $filter Filter
	 * @return KalturaPriceDetailsListResponse
	 */
	function listAction(KalturaPriceDetailsFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("pricedetails", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPriceDetailsListResponse");
		return $resultObject;
	}

	/**
	 * Update existing PriceDetails
	 * 
	 * @param bigint $id Id of priceDetails
	 * @param KalturaPriceDetails $priceDetails PriceDetails to update
	 * @return KalturaPriceDetails
	 */
	function update($id, KalturaPriceDetails $priceDetails)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "priceDetails", $priceDetails->toParams());
		$this->client->queueServiceActionCall("pricedetails", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPriceDetails");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPricePlanService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new PricePlan
	 * 
	 * @param KalturaPricePlan $pricePlan Price plan Object
	 * @return KalturaPricePlan
	 */
	function add(KalturaPricePlan $pricePlan)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pricePlan", $pricePlan->toParams());
		$this->client->queueServiceActionCall("priceplan", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPricePlan");
		return $resultObject;
	}

	/**
	 * Delete PricePlan
	 * 
	 * @param bigint $id PricePlan identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("priceplan", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns a list of price plans by IDs
	 * 
	 * @param KalturaPricePlanFilter $filter Filter request
	 * @return KalturaPricePlanListResponse
	 */
	function listAction(KalturaPricePlanFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("priceplan", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPricePlanListResponse");
		return $resultObject;
	}

	/**
	 * Updates a price plan
	 * 
	 * @param bigint $id Price plan ID
	 * @param KalturaPricePlan $pricePlan Price plan to update
	 * @return KalturaPricePlan
	 */
	function update($id, KalturaPricePlan $pricePlan)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "pricePlan", $pricePlan->toParams());
		$this->client->queueServiceActionCall("priceplan", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPricePlan");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProductPriceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns a price and a purchase status for each subscription or/and media file, for a given user (if passed) and with the consideration of a coupon code (if passed).
	 * 
	 * @param KalturaProductPriceFilter $filter Request filter
	 * @return KalturaProductPriceListResponse
	 */
	function listAction(KalturaProductPriceFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("productprice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaProductPriceListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProgramAssetGroupOfferService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new ProgramAssetGroupOffer for partner
	 * 
	 * @param KalturaProgramAssetGroupOffer $programAssetGroupOffer ProgramAssetGroupOffer object
	 * @return KalturaProgramAssetGroupOffer
	 */
	function add(KalturaProgramAssetGroupOffer $programAssetGroupOffer)
	{
		$kparams = array();
		$this->client->addParam($kparams, "programAssetGroupOffer", $programAssetGroupOffer->toParams());
		$this->client->queueServiceActionCall("programassetgroupoffer", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaProgramAssetGroupOffer");
		return $resultObject;
	}

	/**
	 * Delete programAssetGroupOffer
	 * 
	 * @param bigint $id ProgramAssetGroupOffer id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("programassetgroupoffer", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets all Program asset group offer
	 * 
	 * @param KalturaProgramAssetGroupOfferFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaProgramAssetGroupOfferListResponse
	 */
	function listAction(KalturaProgramAssetGroupOfferFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("programassetgroupoffer", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaProgramAssetGroupOfferListResponse");
		return $resultObject;
	}

	/**
	 * Update ProgramAssetGroupOffer
	 * 
	 * @param bigint $id ProgramAssetGroupOffer id
	 * @param KalturaProgramAssetGroupOffer $programAssetGroupOffer ProgramAssetGroupOffer
	 * @return KalturaProgramAssetGroupOffer
	 */
	function update($id, KalturaProgramAssetGroupOffer $programAssetGroupOffer)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "programAssetGroupOffer", $programAssetGroupOffer->toParams());
		$this->client->queueServiceActionCall("programassetgroupoffer", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaProgramAssetGroupOffer");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchaseSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the purchase settings.
            Includes specification of where these settings were defined – account, household or user
	 * 
	 * @param string $by Reference type to filter by
	 * @return KalturaPurchaseSettings
	 */
	function get($by)
	{
		$kparams = array();
		$this->client->addParam($kparams, "by", $by);
		$this->client->queueServiceActionCall("purchasesettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPurchaseSettings");
		return $resultObject;
	}

	/**
	 * Set a purchase PIN for the household or user
	 * 
	 * @param string $entityReference Reference type to filter by
	 * @param KalturaPurchaseSettings $settings New settings to apply
	 * @return KalturaPurchaseSettings
	 */
	function update($entityReference, KalturaPurchaseSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("purchasesettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPurchaseSettings");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRatioService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new group ratio
	 * 
	 * @param KalturaRatio $ratio Ratio to add for the partner
	 * @return KalturaRatio
	 */
	function add(KalturaRatio $ratio)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ratio", $ratio->toParams());
		$this->client->queueServiceActionCall("ratio", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRatio");
		return $resultObject;
	}

	/**
	 * Get the list of available ratios
	 * 
	 * @return KalturaRatioListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ratio", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRatioListResponse");
		return $resultObject;
	}

	/**
	 * Update group ratio&#39;s PrecisionPrecentage
	 * 
	 * @param bigint $id The ratio ID
	 * @param KalturaRatio $ratio Ratio to update for the partner
	 * @return KalturaRatio
	 */
	function update($id, KalturaRatio $ratio)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "ratio", $ratio->toParams());
		$this->client->queueServiceActionCall("ratio", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRatio");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecommendationProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new recommendation engine for partner
	 * 
	 * @param KalturaRecommendationProfile $recommendationEngine Recommendation engine Object
	 * @return KalturaRecommendationProfile
	 */
	function add(KalturaRecommendationProfile $recommendationEngine)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recommendationEngine", $recommendationEngine->toParams());
		$this->client->queueServiceActionCall("recommendationprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfile");
		return $resultObject;
	}

	/**
	 * Delete recommendation engine by recommendation engine id
	 * 
	 * @param int $id Recommendation engine Identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recommendationprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate recommendation engine  shared secret
	 * 
	 * @param int $recommendationEngineId Recommendation engine Identifier
	 * @return KalturaRecommendationProfile
	 */
	function generateSharedSecret($recommendationEngineId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recommendationEngineId", $recommendationEngineId);
		$this->client->queueServiceActionCall("recommendationprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfile");
		return $resultObject;
	}

	/**
	 * Returns all recommendation engines for partner
	 * 
	 * @return KalturaRecommendationProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("recommendationprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update recommendation engine details
	 * 
	 * @param int $recommendationEngineId Recommendation engine identifier
	 * @param KalturaRecommendationProfile $recommendationEngine Recommendation engine Object
	 * @return KalturaRecommendationProfile
	 */
	function update($recommendationEngineId, KalturaRecommendationProfile $recommendationEngine)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recommendationEngineId", $recommendationEngineId);
		$this->client->addParam($kparams, "recommendationEngine", $recommendationEngine->toParams());
		$this->client->queueServiceActionCall("recommendationprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Issue a record request for a program
	 * 
	 * @param KalturaRecording $recording Recording Object
	 * @return KalturaRecording
	 */
	function add(KalturaRecording $recording)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recording", $recording->toParams());
		$this->client->queueServiceActionCall("recording", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Delete list of user&#39;s recordings. Recording can be deleted only in status Recorded.
            Possible error codes for each recording: RecordingNotFound = 3039, RecordingStatusNotValid = 3043, Error = 1
	 * 
	 * @param string $recordingIds Recording identifiers. Up to 40 private copies and up to 100 shared copies can be deleted withing a call.
	 * @return array
	 */
	function bulkdelete($recordingIds)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recordingIds", $recordingIds);
		$this->client->queueServiceActionCall("recording", "bulkdelete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Cancel a previously requested recording. Cancel recording can be called for recording in status Scheduled or Recording Only
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function cancel($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "cancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Delete one or more user recording(s). Delete recording can be called only for recordings in status Recorded
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Returns recording object by internal identifier
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Return a list of recordings for the household with optional filter by status and KSQL.
	 * 
	 * @param KalturaRecordingFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaRecordingListResponse
	 */
	function listAction(KalturaRecordingFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("recording", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecordingListResponse");
		return $resultObject;
	}

	/**
	 * Deprecated, please use recording.update instead
            Protects an existing recording from the cleanup process for the defined protection period
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function protect($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "protect", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Update an existing recording with is protected field
	 * 
	 * @param bigint $id Recording identifier
	 * @param KalturaRecording $recording Recording to update
	 * @return KalturaRecording
	 */
	function update($id, KalturaRecording $recording)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "recording", $recording->toParams());
		$this->client->queueServiceActionCall("recording", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new region for partner
	 * 
	 * @param KalturaRegion $region Region to add
	 * @return KalturaRegion
	 */
	function add(KalturaRegion $region)
	{
		$kparams = array();
		$this->client->addParam($kparams, "region", $region->toParams());
		$this->client->queueServiceActionCall("region", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegion");
		return $resultObject;
	}

	/**
	 * Adds a linear channel to the list of regions.
	 * 
	 * @param bigint $linearChannelId The identifier of the linear channel
	 * @param array $regionChannelNumbers List of regions and number of linear channel in it.
	 * @return bool
	 */
	function linearchannelbulkadd($linearChannelId, array $regionChannelNumbers)
	{
		$kparams = array();
		$this->client->addParam($kparams, "linearChannelId", $linearChannelId);
		foreach($regionChannelNumbers as $index => $obj)
		{
			$this->client->addParam($kparams, "regionChannelNumbers:$index", $obj->toParams());
		}
		$this->client->queueServiceActionCall("region", "linearchannelbulkadd", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Deletes a linear channel from the list of regions.
	 * 
	 * @param bigint $linearChannelId The identifier of the linear channel
	 * @param string $regionIds List of identifiers of regions.
	 * @return bool
	 */
	function linearchannelbulkdelete($linearChannelId, $regionIds)
	{
		$kparams = array();
		$this->client->addParam($kparams, "linearChannelId", $linearChannelId);
		$this->client->addParam($kparams, "regionIds", $regionIds);
		$this->client->queueServiceActionCall("region", "linearchannelbulkdelete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete an existing region
	 * 
	 * @param int $id Region ID to delete
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("region", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns all regions for the partner
	 * 
	 * @param KalturaBaseRegionFilter $filter Regions filter
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaRegionListResponse
	 */
	function listAction(KalturaBaseRegionFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("region", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegionListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing region
	 * 
	 * @param int $id Region ID to update
	 * @param KalturaRegion $region Region to update
	 * @return KalturaRegion
	 */
	function update($id, KalturaRegion $region)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "region", $region->toParams());
		$this->client->queueServiceActionCall("region", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegion");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegistrySettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the registry settings.
	 * 
	 * @return KalturaRegistrySettingsListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("registrysettings", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegistrySettingsListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReminderService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new future reminder
	 * 
	 * @param KalturaReminder $reminder The reminder to be added.
	 * @return KalturaReminder
	 */
	function add(KalturaReminder $reminder)
	{
		$kparams = array();
		$this->client->addParam($kparams, "reminder", $reminder->toParams());
		$this->client->queueServiceActionCall("reminder", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReminder");
		return $resultObject;
	}

	/**
	 * Delete a reminder. Reminder cannot be delete while being sent.
	 * 
	 * @param bigint $id Id of the reminder.
	 * @param string $type Reminder type.
	 * @return bool
	 */
	function delete($id, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("reminder", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete a reminder. Reminder cannot be delete while being sent.
	 * 
	 * @param bigint $id Id of the reminder.
	 * @param string $type Reminder type.
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 */
	function deleteWithToken($id, $type, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("reminder", "deleteWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Return a list of reminders with optional filter by KSQL.
	 * 
	 * @param KalturaReminderFilter $filter Filter object
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaReminderListResponse
	 */
	function listAction(KalturaReminderFilter $filter, KalturaFilterPager $pager = null)
	{
		if ($this->client->isMultiRequest())
			throw new KalturaClientException("Action is not supported as part of multi-request.", KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
		
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("reminder", "list", $kparams);
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReminderListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return a device configuration retrieval log request for a specific device.
	 * 
	 * @param string $udid Device UDID
	 * @return KalturaReport
	 */
	function get($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("report", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReport");
		return $resultObject;
	}

	/**
	 * Return device configurations retrieval log. Supports paging and can be filtered with the parameter &quot;FromData&quot;.
	 * 
	 * @param KalturaReportFilter $filter Filter option for from date (sec)
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaReportListResponse
	 */
	function listAction(KalturaReportFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("report", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReportListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchHistoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Clean the user’s search history
	 * 
	 * @param KalturaSearchHistoryFilter $filter Filter of search history
	 * @return bool
	 */
	function clean(KalturaSearchHistoryFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("searchhistory", "clean", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete a specific search history.
            Possible error code: 2032 - ItemNotFound
	 * 
	 * @param string $id ID of the search history reference as shown in the list action
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("searchhistory", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get user&#39;s last search requests
	 * 
	 * @param KalturaSearchHistoryFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index. Number of assets to return per page. Possible range 5 ≤ size ≥ 50. If omitted - will be set to 25. If a value > 50 provided – will set to 50>
	 * @return KalturaSearchHistoryListResponse
	 */
	function listAction(KalturaSearchHistoryFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("searchhistory", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchHistoryListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchPriorityGroupService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new priority group.
	 * 
	 * @param KalturaSearchPriorityGroup $searchPriorityGroup Search priority group.
	 * @return KalturaSearchPriorityGroup
	 */
	function add(KalturaSearchPriorityGroup $searchPriorityGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "searchPriorityGroup", $searchPriorityGroup->toParams());
		$this->client->queueServiceActionCall("searchprioritygroup", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchPriorityGroup");
		return $resultObject;
	}

	/**
	 * Delete the existing priority group by its identifier.
	 * 
	 * @param int $id The identifier of a search priority group.
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("searchprioritygroup", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets list of search priority groups which meet the filter criteria.
	 * 
	 * @param KalturaSearchPriorityGroupFilter $filter Filter.
	 * @param KalturaFilterPager $pager Page size and index.
	 * @return KalturaSearchPriorityGroupListResponse
	 */
	function listAction(KalturaSearchPriorityGroupFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("searchprioritygroup", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchPriorityGroupListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing priority group.
	 * 
	 * @param bigint $id Identifier of search priority group.
	 * @param KalturaSearchPriorityGroup $searchPriorityGroup Search priority group.
	 * @return KalturaSearchPriorityGroup
	 */
	function update($id, KalturaSearchPriorityGroup $searchPriorityGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "searchPriorityGroup", $searchPriorityGroup->toParams());
		$this->client->queueServiceActionCall("searchprioritygroup", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchPriorityGroup");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchPriorityGroupOrderedIdsSetService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return the current ordering of priority groups for the partner.
	 * 
	 * @return KalturaSearchPriorityGroupOrderedIdsSet
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("searchprioritygrouporderedidsset", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchPriorityGroupOrderedIdsSet");
		return $resultObject;
	}

	/**
	 * Set the ordering of priority groups for the partner.
	 * 
	 * @param KalturaSearchPriorityGroupOrderedIdsSet $orderedList List with ordered search priority groups.
	 * @return KalturaSearchPriorityGroupOrderedIdsSet
	 */
	function set(KalturaSearchPriorityGroupOrderedIdsSet $orderedList)
	{
		$kparams = array();
		$this->client->addParam($kparams, "orderedList", $orderedList->toParams());
		$this->client->queueServiceActionCall("searchprioritygrouporderedidsset", "set", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchPriorityGroupOrderedIdsSet");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSegmentationTypeService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new segmentation type to the system
	 * 
	 * @param KalturaSegmentationType $segmentationType The segmentation type to be added
	 * @return KalturaSegmentationType
	 */
	function add(KalturaSegmentationType $segmentationType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "segmentationType", $segmentationType->toParams());
		$this->client->queueServiceActionCall("segmentationtype", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSegmentationType");
		return $resultObject;
	}

	/**
	 * Delete a segmentation type from the system
	 * 
	 * @param bigint $id Segmentation type id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("segmentationtype", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets existing partner segmentation configuration
	 * 
	 * @return KalturaSegmentationPartnerConfiguration
	 */
	function getPartnerConfiguration()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("segmentationtype", "getPartnerConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSegmentationPartnerConfiguration");
		return $resultObject;
	}

	/**
	 * Lists all segmentation types in group
	 * 
	 * @param KalturaBaseSegmentationTypeFilter $filter Segmentation type filter - basically empty
	 * @param KalturaFilterPager $pager Simple pager
	 * @return KalturaSegmentationTypeListResponse
	 */
	function listAction(KalturaBaseSegmentationTypeFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("segmentationtype", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSegmentationTypeListResponse");
		return $resultObject;
	}

	/**
	 * Updates an existing segmentation type
	 * 
	 * @param bigint $segmentationTypeId The ID of the object that will be updated
	 * @param KalturaSegmentationType $segmentationType The segmentation type to be updated
	 * @return KalturaSegmentationType
	 */
	function update($segmentationTypeId, KalturaSegmentationType $segmentationType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "segmentationTypeId", $segmentationTypeId);
		$this->client->addParam($kparams, "segmentationType", $segmentationType->toParams());
		$this->client->queueServiceActionCall("segmentationtype", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSegmentationType");
		return $resultObject;
	}

	/**
	 * Sets partner configuration for segments configuration
	 * 
	 * @param KalturaSegmentationPartnerConfiguration $configuration 1. maxDynamicSegments - how many dynamic segments (segments with conditions) the operator is allowed to have.
            Displayed in the OPC as *'Maximum Number of Dynamic Segments' 
            *maxCalculatedPeriod - 
            the maximum number of past days to be calculated for dynamic segments. e.g. the last 60 days, the last 90 days etc.
            Displayed in OPC as *'Maximum of Dynamic Segments period'*
	 * @return bool
	 */
	function updatePartnerConfiguration(KalturaSegmentationPartnerConfiguration $configuration)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("segmentationtype", "updatePartnerConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesRecordingService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Issue a record request for a complete season or series
	 * 
	 * @param KalturaSeriesRecording $recording SeriesRecording Object
	 * @return KalturaSeriesRecording
	 */
	function add(KalturaSeriesRecording $recording)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recording", $recording->toParams());
		$this->client->queueServiceActionCall("seriesrecording", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Cancel a previously requested series recording. Cancel series recording can be called for recording in status Scheduled or Recording Only
	 * 
	 * @param bigint $id Series Recording identifier
	 * @return KalturaSeriesRecording
	 */
	function cancel($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("seriesrecording", "cancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Cancel EPG recording that was recorded as part of series
	 * 
	 * @param bigint $id Series Recording identifier
	 * @param bigint $epgId Epg program identifier
	 * @return KalturaSeriesRecording
	 */
	function cancelByEpgId($id, $epgId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "epgId", $epgId);
		$this->client->queueServiceActionCall("seriesrecording", "cancelByEpgId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Cancel Season recording epgs that was recorded as part of series
	 * 
	 * @param bigint $id Series Recording identifier
	 * @param bigint $seasonNumber Season Number
	 * @return KalturaSeriesRecording
	 */
	function cancelBySeasonNumber($id, $seasonNumber)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "seasonNumber", $seasonNumber);
		$this->client->queueServiceActionCall("seriesrecording", "cancelBySeasonNumber", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Delete series recording(s). Delete series recording can be called recordings in any status
	 * 
	 * @param bigint $id Series Recording identifier
	 * @return KalturaSeriesRecording
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("seriesrecording", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Delete Season recording epgs that was recorded as part of series
	 * 
	 * @param bigint $id Series Recording identifier
	 * @param int $seasonNumber Season Number
	 * @return KalturaSeriesRecording
	 */
	function deleteBySeasonNumber($id, $seasonNumber)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "seasonNumber", $seasonNumber);
		$this->client->queueServiceActionCall("seriesrecording", "deleteBySeasonNumber", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Return a list of series recordings for the household with optional filter by status and KSQL.
	 * 
	 * @param KalturaSeriesRecordingFilter $filter Filter parameters for filtering out the result - support order by only - START_DATE_ASC, START_DATE_DESC, ID_ASC,ID_DESC,SERIES_ID_ASC, SERIES_ID_DESC
	 * @return KalturaSeriesRecordingListResponse
	 */
	function listAction(KalturaSeriesRecordingFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("seriesrecording", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecordingListResponse");
		return $resultObject;
	}

	/**
	 * Enable EPG recording that was canceled as part of series
	 * 
	 * @param bigint $epgId EPG program identifies
	 * @return KalturaSeriesRecording
	 */
	function rebookCanceledByEpgId($epgId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "epgId", $epgId);
		$this->client->queueServiceActionCall("seriesrecording", "rebookCanceledByEpgId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSessionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Parses KS
	 * 
	 * @param string $session Additional KS to parse, if not passed the user's KS will be parsed
	 * @return KalturaSession
	 */
	function get($session = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "session", $session);
		$this->client->queueServiceActionCall("session", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSession");
		return $resultObject;
	}

	/**
	 * Revokes all the sessions (KS) of a given user
	 * 
	 * @return bool
	 */
	function revoke()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("session", "revoke", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Switching the user in the session by generating a new session for a new user within the same household
	 * 
	 * @param string $userIdToSwitch The identifier of the user to change
	 * @return KalturaLoginSession
	 */
	function switchUser($userIdToSwitch)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userIdToSwitch", $userIdToSwitch);
		$this->client->queueServiceActionCall("session", "switchUser", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginSession");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSmsAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * SmsAdapterProfile add
	 * 
	 * @param KalturaSmsAdapterProfile $objectToAdd SmsAdapterProfile details
	 * @return KalturaSmsAdapterProfile
	 */
	function add(KalturaSmsAdapterProfile $objectToAdd)
	{
		$kparams = array();
		$this->client->addParam($kparams, "objectToAdd", $objectToAdd->toParams());
		$this->client->queueServiceActionCall("smsadapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSmsAdapterProfile");
		return $resultObject;
	}

	/**
	 * Remove SmsAdapterProfile
	 * 
	 * @param bigint $id SmsAdapterProfile identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("smsadapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Generate Sms Adapter shared secret
	 * 
	 * @param int $smsAdapterId Sms Adapter identifier
	 * @return KalturaSmsAdapterProfile
	 */
	function generateSharedSecret($smsAdapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "smsAdapterId", $smsAdapterId);
		$this->client->queueServiceActionCall("smsadapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSmsAdapterProfile");
		return $resultObject;
	}

	/**
	 * Get SmsAdapterProfile
	 * 
	 * @param bigint $id SmsAdapterProfile identifier
	 * @return KalturaSmsAdapterProfile
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("smsadapterprofile", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSmsAdapterProfile");
		return $resultObject;
	}

	/**
	 * Gets all SmsAdapterProfile items
	 * 
	 * @param KalturaSmsAdapterProfileFilter $filter Filter
	 * @return KalturaSmsAdapterProfileListResponse
	 */
	function listAction(KalturaSmsAdapterProfileFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("smsadapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSmsAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * SmsAdapterProfile update
	 * 
	 * @param bigint $id SmsAdapterProfile identifier
	 * @param KalturaSmsAdapterProfile $objectToUpdate SmsAdapterProfile details
	 * @return KalturaSmsAdapterProfile
	 */
	function update($id, KalturaSmsAdapterProfile $objectToUpdate)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "objectToUpdate", $objectToUpdate->toParams());
		$this->client->queueServiceActionCall("smsadapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSmsAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new user social action
	 * 
	 * @param KalturaSocialAction $socialAction Social Action Object
	 * @return KalturaUserSocialActionResponse
	 */
	function add(KalturaSocialAction $socialAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "socialAction", $socialAction->toParams());
		$this->client->queueServiceActionCall("socialaction", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserSocialActionResponse");
		return $resultObject;
	}

	/**
	 * Delete user social action
	 * 
	 * @param string $id Social Action Id
	 * @return array
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("socialaction", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Get list of user social actions
	 * 
	 * @param KalturaSocialActionFilter $filter Social action filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaSocialActionListResponse
	 */
	function listAction(KalturaSocialActionFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("socialaction", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialActionListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialCommentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get a list of all social comments filtered by asset ID and social platform
	 * 
	 * @param KalturaSocialCommentFilter $filter Country filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaSocialCommentListResponse
	 */
	function listAction(KalturaSocialCommentFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("socialcomment", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialCommentListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List social accounts
	 * 
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function get($type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Return the user object with social information according to a provided external social token
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $token Social token
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function getByToken($partnerId, $token, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "getByToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Retrieve the social network’s configuration information
	 * 
	 * @param string $type Social network type
	 * @param int $partnerId Partner identifier
	 * @return KalturaSocialConfig
	 */
	function getConfiguration($type, $partnerId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("social", "getConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialConfig");
		return $resultObject;
	}

	/**
	 * Login using social token
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $token Social token
	 * @param string $type Social network
	 * @param string $udid Device UDID
	 * @return KalturaLoginResponse
	 */
	function login($partnerId, $token, $type, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("social", "login", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * Connect an existing user in the system to an external social network user
	 * 
	 * @param string $token Social token
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function merge($token, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "merge", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Create a new user in the system using a provided external social token
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $token Social token
	 * @param string $type Social network type
	 * @param string $email User email
	 * @return KalturaSocial
	 */
	function register($partnerId, $token, $type, $email = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "email", $email);
		$this->client->queueServiceActionCall("social", "register", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Disconnect an existing user in the system from its external social network user
	 * 
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function unmerge($type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "unmerge", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Set the user social network’s configuration information
	 * 
	 * @param KalturaSocialConfig $configuration The social action settings
	 * @return KalturaSocialConfig
	 */
	function UpdateConfiguration(KalturaSocialConfig $configuration)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("social", "UpdateConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialConfig");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialFriendActivityService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get a list of the social friends activity for a user
	 * 
	 * @param KalturaSocialFriendActivityFilter $filter Social friend activity filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaSocialFriendActivityListResponse
	 */
	function listAction(KalturaSocialFriendActivityFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("socialfriendactivity", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialFriendActivityListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSsoAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new sso adapter for partner
	 * 
	 * @param KalturaSSOAdapterProfile $ssoAdapter SSO Adapter Object to be added
	 * @return KalturaSSOAdapterProfile
	 */
	function add(KalturaSSOAdapterProfile $ssoAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ssoAdapter", $ssoAdapter->toParams());
		$this->client->queueServiceActionCall("ssoadapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSSOAdapterProfile");
		return $resultObject;
	}

	/**
	 * Delete sso adapters by sso adapters id
	 * 
	 * @param int $ssoAdapterId SSO Adapter Identifier
	 * @return bool
	 */
	function delete($ssoAdapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ssoAdapterId", $ssoAdapterId);
		$this->client->queueServiceActionCall("ssoadapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate SSO Adapter shared secret
	 * 
	 * @param int $ssoAdapterId SSO Adapter identifier
	 * @return KalturaSSOAdapterProfile
	 */
	function generateSharedSecret($ssoAdapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ssoAdapterId", $ssoAdapterId);
		$this->client->queueServiceActionCall("ssoadapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSSOAdapterProfile");
		return $resultObject;
	}

	/**
	 * Request validation against 3rd party
	 * 
	 * @param string $intent Intent
	 * @param array $adapterData Adapter Data
	 * @return KalturaSSOAdapterProfileInvoke
	 */
	function invoke($intent, array $adapterData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "intent", $intent);
		foreach($adapterData as $index => $obj)
		{
			$this->client->addParam($kparams, "adapterData:$index", $obj->toParams());
		}
		$this->client->queueServiceActionCall("ssoadapterprofile", "invoke", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSSOAdapterProfileInvoke");
		return $resultObject;
	}

	/**
	 * Returns all sso adapters for partner : id + name
	 * 
	 * @return KalturaSSOAdapterProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ssoadapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSSOAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update sso adapter details
	 * 
	 * @param int $ssoAdapterId SSO Adapter Identifier
	 * @param KalturaSSOAdapterProfile $ssoAdapter SSO Adapter Object
	 * @return KalturaSSOAdapterProfile
	 */
	function update($ssoAdapterId, KalturaSSOAdapterProfile $ssoAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ssoAdapterId", $ssoAdapterId);
		$this->client->addParam($kparams, "ssoAdapter", $ssoAdapter->toParams());
		$this->client->queueServiceActionCall("ssoadapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSSOAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStreamingDeviceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Reserves a concurrency slot for the given asset-device combination
	 * 
	 * @param string $fileId KalturaMediaFile.id media file belonging to the asset for which a concurrency slot is being reserved
	 * @param string $assetId KalturaAsset.id - asset for which a concurrency slot is being reserved
	 * @param string $assetType Identifies the type of asset for which the concurrency slot is being reserved
	 * @return bool
	 */
	function bookPlaybackSession($fileId, $assetId, $assetType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "fileId", $fileId);
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->queueServiceActionCall("streamingdevice", "bookPlaybackSession", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Lists of devices that are streaming at that moment
	 * 
	 * @param KalturaStreamingDeviceFilter $filter Segmentation type filter - basically empty
	 * @return KalturaStreamingDeviceListResponse
	 */
	function listAction(KalturaStreamingDeviceFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("streamingdevice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStreamingDeviceListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new subscription for partner
	 * 
	 * @param KalturaSubscription $subscription Subscription object
	 * @return KalturaSubscription
	 */
	function add(KalturaSubscription $subscription)
	{
		$kparams = array();
		$this->client->addParam($kparams, "subscription", $subscription->toParams());
		$this->client->queueServiceActionCall("subscription", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscription");
		return $resultObject;
	}

	/**
	 * Delete subscription
	 * 
	 * @param bigint $id Subscription id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("subscription", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns a list of subscriptions requested by Subscription ID or file ID
	 * 
	 * @param KalturaSubscriptionFilter $filter Filter request
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaSubscriptionListResponse
	 */
	function listAction(KalturaSubscriptionFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("subscription", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionListResponse");
		return $resultObject;
	}

	/**
	 * Update Subscription
	 * 
	 * @param bigint $id Subscription id
	 * @param KalturaSubscription $subscription Subscription
	 * @return KalturaSubscription
	 */
	function update($id, KalturaSubscription $subscription)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "subscription", $subscription->toParams());
		$this->client->queueServiceActionCall("subscription", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscription");
		return $resultObject;
	}

	/**
	 * Returns information about a coupon for subscription
	 * 
	 * @param int $id Subscription id
	 * @param string $code Coupon code
	 * @return KalturaCoupon
	 */
	function validateCoupon($id, $code)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "code", $code);
		$this->client->queueServiceActionCall("subscription", "validateCoupon", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCoupon");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSetService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new subscriptionSet
	 * 
	 * @param KalturaSubscriptionSet $subscriptionSet SubscriptionSet Object
	 * @return KalturaSubscriptionSet
	 */
	function add(KalturaSubscriptionSet $subscriptionSet)
	{
		$kparams = array();
		$this->client->addParam($kparams, "subscriptionSet", $subscriptionSet->toParams());
		$this->client->queueServiceActionCall("subscriptionset", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSet");
		return $resultObject;
	}

	/**
	 * Delete a subscriptionSet
	 * 
	 * @param bigint $id SubscriptionSet Identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("subscriptionset", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the subscriptionSet according to the Identifier
	 * 
	 * @param bigint $id SubscriptionSet Identifier
	 * @return KalturaSubscriptionSet
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("subscriptionset", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSet");
		return $resultObject;
	}

	/**
	 * Returns a list of subscriptionSets requested by ids or subscription ids
	 * 
	 * @param KalturaSubscriptionSetFilter $filter SubscriptionSet filter
	 * @return KalturaSubscriptionSetListResponse
	 */
	function listAction(KalturaSubscriptionSetFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("subscriptionset", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSetListResponse");
		return $resultObject;
	}

	/**
	 * Update the subscriptionSet
	 * 
	 * @param bigint $id SubscriptionSet Identifier
	 * @param KalturaSubscriptionSet $subscriptionSet SubscriptionSet Object
	 * @return KalturaSubscriptionSet
	 */
	function update($id, KalturaSubscriptionSet $subscriptionSet)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "subscriptionSet", $subscriptionSet->toParams());
		$this->client->queueServiceActionCall("subscriptionset", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSet");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSystemService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Clear local server cache
	 * 
	 * @param string $clearCacheAction Clear cache action to perform, possible values: clear_all / keys / getKey
	 * @param string $key Key to get in case you send action getKey
	 * @return bool
	 */
	function clearLocalServerCache($clearCacheAction = null, $key = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "clearCacheAction", $clearCacheAction);
		$this->client->addParam($kparams, "key", $key);
		$this->client->queueServiceActionCall("system", "clearLocalServerCache", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the epoch value of an invalidation key if it was found
	 * 
	 * @param string $invalidationKey The invalidation key to fetch it's value
	 * @param string $layeredCacheConfigName The layered cache config name of the invalidation key
	 * @param int $groupId GroupId
	 * @return KalturaLongValue
	 */
	function getInvalidationKeyValue($invalidationKey, $layeredCacheConfigName = null, $groupId = 0)
	{
		$kparams = array();
		$this->client->addParam($kparams, "invalidationKey", $invalidationKey);
		$this->client->addParam($kparams, "layeredCacheConfigName", $layeredCacheConfigName);
		$this->client->addParam($kparams, "groupId", $groupId);
		$this->client->queueServiceActionCall("system", "getInvalidationKeyValue", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLongValue");
		return $resultObject;
	}

	/**
	 * Returns the current layered cache group config of the sent groupId. You need to send groupId only if you wish to get it for a specific groupId and not the one the KS belongs to.
	 * 
	 * @param int $groupId GroupId
	 * @return KalturaStringValue
	 */
	function getLayeredCacheGroupConfig($groupId = 0)
	{
		$kparams = array();
		$this->client->addParam($kparams, "groupId", $groupId);
		$this->client->queueServiceActionCall("system", "getLayeredCacheGroupConfig", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStringValue");
		return $resultObject;
	}

	/**
	 * Returns current server timestamp
	 * 
	 * @return bigint
	 */
	function getTime()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("system", "getTime", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "double");
		return $resultObject;
	}

	/**
	 * Returns current server version
	 * 
	 * @return string
	 */
	function getVersion()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("system", "getVersion", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Returns true if version has been incremented successfully or false otherwise. You need to send groupId only if you wish to increment for a specific groupId and not the one the KS belongs to.
	 * 
	 * @param int $groupId GroupId
	 * @return bool
	 */
	function incrementLayeredCacheGroupConfigVersion($groupId = 0)
	{
		$kparams = array();
		$this->client->addParam($kparams, "groupId", $groupId);
		$this->client->queueServiceActionCall("system", "incrementLayeredCacheGroupConfigVersion", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns true if the invalidation key was invalidated successfully or false otherwise.
	 * 
	 * @param string $key The invalidation key to invalidate
	 * @return bool
	 */
	function invalidateLayeredCacheInvalidationKey($key)
	{
		$kparams = array();
		$this->client->addParam($kparams, "key", $key);
		$this->client->queueServiceActionCall("system", "invalidateLayeredCacheInvalidationKey", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns true
	 * 
	 * @return bool
	 */
	function ping()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("system", "ping", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTagService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new tag
	 * 
	 * @param KalturaTag $tag Tag Object
	 * @return KalturaTag
	 */
	function add(KalturaTag $tag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "tag", $tag->toParams());
		$this->client->queueServiceActionCall("tag", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTag");
		return $resultObject;
	}

	/**
	 * Delete an existing tag
	 * 
	 * @param bigint $id Tag Identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("tag", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the list of tags for the partner
	 * 
	 * @param KalturaTagFilter $filter Filter
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaTagListResponse
	 */
	function listAction(KalturaTagFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("tag", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTagListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing tag
	 * 
	 * @param bigint $id Tag Identifier
	 * @param KalturaTag $tag Tag Object
	 * @return KalturaTag
	 */
	function update($id, KalturaTag $tag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "tag", $tag->toParams());
		$this->client->queueServiceActionCall("tag", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTag");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTimeShiftedTvPartnerSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the account’s time-shifted TV settings (catch-up and C-DVR, Trick-play, Start-over)
	 * 
	 * @return KalturaTimeShiftedTvPartnerSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("timeshiftedtvpartnersettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTimeShiftedTvPartnerSettings");
		return $resultObject;
	}

	/**
	 * Configure the account’s time-shifted TV settings (catch-up and C-DVR, Trick-play, Start-over)
	 * 
	 * @param KalturaTimeShiftedTvPartnerSettings $settings Time shifted TV settings
	 * @return bool
	 */
	function update(KalturaTimeShiftedTvPartnerSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("timeshiftedtvpartnersettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Deleted a topic
	 * 
	 * @param int $id Topic identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("topic", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets a topic
	 * 
	 * @param int $id Topic identifier
	 * @return KalturaTopic
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("topic", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopic");
		return $resultObject;
	}

	/**
	 * Get list of topics
	 * 
	 * @param KalturaTopicFilter $filter Topics filter
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaTopicListResponse
	 */
	function listAction(KalturaTopicFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("topic", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicListResponse");
		return $resultObject;
	}

	/**
	 * Updates a topic &quot;automatic issue notification&quot; behavior.
	 * 
	 * @param int $id Topic identifier
	 * @param string $automaticIssueNotification Behavior options:
             Inherit = 0: Take value from partner notification settings
             Yes = 1: Issue a notification massage when a new episode is available on the catalog
             No = 2: Do send a notification message when a new episode is available on the catalog
	 * @return bool
	 */
	function updateStatus($id, $automaticIssueNotification)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "automaticIssueNotification", $automaticIssueNotification);
		$this->client->queueServiceActionCall("topic", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicNotificationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new topic notification
	 * 
	 * @param KalturaTopicNotification $topicNotification The topic notification to add
	 * @return KalturaTopicNotification
	 */
	function add(KalturaTopicNotification $topicNotification)
	{
		$kparams = array();
		$this->client->addParam($kparams, "topicNotification", $topicNotification->toParams());
		$this->client->queueServiceActionCall("topicnotification", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicNotification");
		return $resultObject;
	}

	/**
	 * Delete an existing topic notification
	 * 
	 * @param bigint $id ID of topic notification to delete
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("topicnotification", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Lists all topic notifications in the system.
	 * 
	 * @param KalturaTopicNotificationFilter $filter Filter options
	 * @return KalturaTopicNotificationListResponse
	 */
	function listAction(KalturaTopicNotificationFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("topicnotification", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicNotificationListResponse");
		return $resultObject;
	}

	/**
	 * Subscribe a user to a topic notification
	 * 
	 * @param bigint $topicNotificationId ID of topic notification to subscribe to.
	 */
	function subscribe($topicNotificationId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "topicNotificationId", $topicNotificationId);
		$this->client->queueServiceActionCall("topicnotification", "subscribe", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Unubscribe a user from a topic notification
	 * 
	 * @param bigint $topicNotificationId ID of topic notification to unsubscribe from.
	 */
	function unsubscribe($topicNotificationId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "topicNotificationId", $topicNotificationId);
		$this->client->queueServiceActionCall("topicnotification", "unsubscribe", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Update an existing topic notification
	 * 
	 * @param int $id The topic notification ID to update
	 * @param KalturaTopicNotification $topicNotification The topic notification to update
	 * @return KalturaTopicNotification
	 */
	function update($id, KalturaTopicNotification $topicNotification)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "topicNotification", $topicNotification->toParams());
		$this->client->queueServiceActionCall("topicnotification", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicNotification");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicNotificationMessageService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new topic notification message
	 * 
	 * @param KalturaTopicNotificationMessage $topicNotificationMessage The topic notification message to add
	 * @return KalturaTopicNotificationMessage
	 */
	function add(KalturaTopicNotificationMessage $topicNotificationMessage)
	{
		$kparams = array();
		$this->client->addParam($kparams, "topicNotificationMessage", $topicNotificationMessage->toParams());
		$this->client->queueServiceActionCall("topicnotificationmessage", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicNotificationMessage");
		return $resultObject;
	}

	/**
	 * Delete an existing topic notification message
	 * 
	 * @param bigint $id ID of topic notification message to delete
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("topicnotificationmessage", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Lists all topic notifications in the system.
	 * 
	 * @param KalturaTopicNotificationMessageFilter $filter Filter options
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaTopicNotificationMessageListResponse
	 */
	function listAction(KalturaTopicNotificationMessageFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("topicnotificationmessage", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicNotificationMessageListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing topic notification message
	 * 
	 * @param int $id The topic notification message ID to update
	 * @param KalturaTopicNotificationMessage $topicNotificationMessage The topic notification message to update
	 * @return KalturaTopicNotificationMessage
	 */
	function update($id, KalturaTopicNotificationMessage $topicNotificationMessage)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "topicNotificationMessage", $topicNotificationMessage->toParams());
		$this->client->queueServiceActionCall("topicnotificationmessage", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicNotificationMessage");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Downgrade specific subscription for a household. entitlements will be updated on the existing subscription end date.
	 * 
	 * @param KalturaPurchase $purchase Purchase properties
	 */
	function downgrade(KalturaPurchase $purchase)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchase", $purchase->toParams());
		$this->client->queueServiceActionCall("transaction", "downgrade", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Retrieve the purchase session identifier
	 * 
	 * @param KalturaPurchaseSession $purchaseSession Purchase properties
	 * @return bigint
	 */
	function getPurchaseSessionId(KalturaPurchaseSession $purchaseSession)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchaseSession", $purchaseSession->toParams());
		$this->client->queueServiceActionCall("transaction", "getPurchaseSessionId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "double");
		return $resultObject;
	}

	/**
	 * Purchase specific product, subscription or Program asset group offer (PAGO) for a household. Upon successful charge entitlements to use the requested product or subscription are granted.
	 * 
	 * @param KalturaPurchase $purchase Purchase properties
	 * @return KalturaTransaction
	 */
	function purchase(KalturaPurchase $purchase)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchase", $purchase->toParams());
		$this->client->queueServiceActionCall("transaction", "purchase", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTransaction");
		return $resultObject;
	}

	/**
	 * This method shall set the waiver flag on the user entitlement table and the waiver date field to the current date.
	 * 
	 * @param int $assetId Asset identifier
	 * @param string $transactionType The transaction type
	 * @return bool
	 */
	function setWaiver($assetId, $transactionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "transactionType", $transactionType);
		$this->client->queueServiceActionCall("transaction", "setWaiver", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Updates a pending purchase transaction state.
	 * 
	 * @param string $paymentGatewayId Payment gateway identifier
	 * @param string $externalTransactionId External transaction identifier
	 * @param string $signature Security signature to validate the caller is a payment gateway adapter application
	 * @param KalturaTransactionStatus $status Status properties
	 */
	function updateStatus($paymentGatewayId, $externalTransactionId, $signature, KalturaTransactionStatus $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "externalTransactionId", $externalTransactionId);
		$this->client->addParam($kparams, "signature", $signature);
		$this->client->addParam($kparams, "status", $status->toParams());
		$this->client->queueServiceActionCall("transaction", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Upgrade specific subscription for a household. Upon successful charge entitlements to use the requested product or subscription are granted.
	 * 
	 * @param KalturaPurchase $purchase Purchase properties
	 * @return KalturaTransaction
	 */
	function upgrade(KalturaPurchase $purchase)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchase", $purchase->toParams());
		$this->client->queueServiceActionCall("transaction", "upgrade", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTransaction");
		return $resultObject;
	}

	/**
	 * Verifies PPV/Subscription/Collection client purchase (such as InApp) and entitles the user.
	 * 
	 * @param KalturaExternalReceipt $externalReceipt Receipt properties
	 * @return KalturaTransaction
	 */
	function validateReceipt(KalturaExternalReceipt $externalReceipt)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalReceipt", $externalReceipt->toParams());
		$this->client->queueServiceActionCall("transaction", "validateReceipt", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTransaction");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionHistoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Gets user or household transaction history.
	 * 
	 * @param KalturaTransactionHistoryFilter $filter Filter by household or user
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaBillingTransactionListResponse
	 */
	function listAction(KalturaTransactionHistoryFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("transactionhistory", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBillingTransactionListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTvmRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of tvm rules for the partner
	 * 
	 * @param KalturaTvmRuleFilter $filter TvmRuleFilter Filter
	 * @return KalturaTvmRuleListResponse
	 */
	function listAction(KalturaTvmRuleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("tvmrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTvmRuleListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUnifiedPaymentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns the data about the next renewal
	 * 
	 * @param int $id Unified payment ID
	 * @return KalturaUnifiedPaymentRenewal
	 */
	function getNextRenewal($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("unifiedpayment", "getNextRenewal", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUnifiedPaymentRenewal");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUploadTokenService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds new upload token to upload a file
	 * 
	 * @param KalturaUploadToken $uploadToken Upload token details
	 * @return KalturaUploadToken
	 */
	function add(KalturaUploadToken $uploadToken = null)
	{
		$kparams = array();
		if ($uploadToken !== null)
			$this->client->addParam($kparams, "uploadToken", $uploadToken->toParams());
		$this->client->queueServiceActionCall("uploadtoken", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUploadToken");
		return $resultObject;
	}

	/**
	 * Upload a file using the upload token id
	 * 
	 * @param string $uploadTokenId Identifier of existing upload-token
	 * @param file $fileData File to upload
	 * @return KalturaUploadToken
	 */
	function upload($uploadTokenId, $fileData)
	{
		$kparams = array();
		$this->client->addParam($kparams, "uploadTokenId", $uploadTokenId);
		$kfiles = array();
		$this->client->addParam($kfiles, "fileData", $fileData);
		$this->client->queueServiceActionCall("uploadtoken", "upload", $kparams, $kfiles);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUploadToken");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUsageModuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new UsageModule
	 * 
	 * @param KalturaUsageModule $usageModule Usage module Object
	 * @return KalturaUsageModule
	 */
	function add(KalturaUsageModule $usageModule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "usageModule", $usageModule->toParams());
		$this->client->queueServiceActionCall("usagemodule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUsageModule");
		return $resultObject;
	}

	/**
	 * Delete UsageModule
	 * 
	 * @param bigint $id UsageModule id
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("usagemodule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the list of available usage module
	 * 
	 * @param KalturaUsageModuleFilter $filter Filter request
	 * @return KalturaUsageModuleListResponse
	 */
	function listAction(KalturaUsageModuleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("usagemodule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUsageModuleListResponse");
		return $resultObject;
	}

	/**
	 * Update usage module
	 * 
	 * @param int $id Usage module id
	 * @param KalturaUsageModule $usageModule Usage module Object
	 * @return KalturaUsageModule
	 */
	function update($id, KalturaUsageModule $usageModule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "usageModule", $usageModule->toParams());
		$this->client->queueServiceActionCall("usagemodule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUsageModule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve all the rules (parental, geo, device or user-type) that applies for this user and asset.
	 * 
	 * @param KalturaUserAssetRuleFilter $filter Filter
	 * @return KalturaUserAssetRuleListResponse
	 */
	function listAction(KalturaUserAssetRuleFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("userassetrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserAssetRuleListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetsListItemService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new item to user’s private asset list
	 * 
	 * @param KalturaUserAssetsListItem $userAssetsListItem A list item to add
	 * @return KalturaUserAssetsListItem
	 */
	function add(KalturaUserAssetsListItem $userAssetsListItem)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userAssetsListItem", $userAssetsListItem->toParams());
		$this->client->queueServiceActionCall("userassetslistitem", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserAssetsListItem");
		return $resultObject;
	}

	/**
	 * Deletes an item from user’s private asset list
	 * 
	 * @param string $assetId Asset id to delete
	 * @param string $listType Asset list type to delete from
	 * @return bool
	 */
	function delete($assetId, $listType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "listType", $listType);
		$this->client->queueServiceActionCall("userassetslistitem", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get an item from user’s private asset list
	 * 
	 * @param string $assetId Asset id to get
	 * @param string $listType Asset list type to get from
	 * @param string $itemType Item type to get
	 * @return KalturaUserAssetsListItem
	 */
	function get($assetId, $listType, $itemType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "listType", $listType);
		$this->client->addParam($kparams, "itemType", $itemType);
		$this->client->queueServiceActionCall("userassetslistitem", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserAssetsListItem");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserInterestService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new user interest for partner user
	 * 
	 * @param KalturaUserInterest $userInterest User interest Object
	 * @return KalturaUserInterest
	 */
	function add(KalturaUserInterest $userInterest)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userInterest", $userInterest->toParams());
		$this->client->queueServiceActionCall("userinterest", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserInterest");
		return $resultObject;
	}

	/**
	 * Delete new user interest for partner user
	 * 
	 * @param string $id User interest identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("userinterest", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete new user interest for partner user
	 * 
	 * @param string $id User interest identifier
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 */
	function deleteWithToken($id, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("userinterest", "deleteWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns all Engagement for partner
	 * 
	 * @return KalturaUserInterestListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("userinterest", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserInterestListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserLoginPinService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Generate a time and usage expiry login-PIN that can allow a single/multiple login/s per PIN. 
            If an active login-PIN already exists. Calling this API again for same user will add another login-PIN
	 * 
	 * @param string $secret Additional security parameter for optional enhanced security
	 * @param int $pinUsages Optional number of pin usages
	 * @param int $pinDuration Optional duration in minutes of the pin
	 * @return KalturaUserLoginPin
	 */
	function add($secret = null, $pinUsages = null, $pinDuration = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->addParam($kparams, "pinUsages", $pinUsages);
		$this->client->addParam($kparams, "pinDuration", $pinDuration);
		$this->client->queueServiceActionCall("userloginpin", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserLoginPin");
		return $resultObject;
	}

	/**
	 * Immediately deletes a given pre set login pin code for the user.
	 * 
	 * @param string $pinCode Login pin code to expire
	 * @return bool
	 */
	function delete($pinCode)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pinCode", $pinCode);
		$this->client->queueServiceActionCall("userloginpin", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Immediately expire all active login-PINs for a user
	 * 
	 * @return bool
	 */
	function deleteAll()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("userloginpin", "deleteAll", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Set a time and usage expiry login-PIN that can allow a single login per PIN. If an active login-PIN already exists. Calling this API again for same user will add another login-PIN
	 * 
	 * @param string $pinCode Device Identifier
	 * @param string $secret Additional security parameter to validate the login
	 * @param int $pinUsages Optional number of pin usages
	 * @param int $pinDuration Optional duration in seconds of the pin
	 * @return KalturaUserLoginPin
	 */
	function update($pinCode, $secret = null, $pinUsages = null, $pinDuration = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pinCode", $pinCode);
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->addParam($kparams, "pinUsages", $pinUsages);
		$this->client->addParam($kparams, "pinDuration", $pinDuration);
		$this->client->queueServiceActionCall("userloginpin", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserLoginPin");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Creates a new role
	 * 
	 * @param KalturaUserRole $role Role to add
	 * @return KalturaUserRole
	 */
	function add(KalturaUserRole $role)
	{
		$kparams = array();
		$this->client->addParam($kparams, "role", $role->toParams());
		$this->client->queueServiceActionCall("userrole", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}

	/**
	 * Delete role
	 * 
	 * @param bigint $id Role id to delete
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("userrole", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieving user roles by identifiers, if filter is empty, returns all partner roles
	 * 
	 * @param KalturaUserRoleFilter $filter User roles filter
	 * @return KalturaUserRoleListResponse
	 */
	function listAction(KalturaUserRoleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("userrole", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRoleListResponse");
		return $resultObject;
	}

	/**
	 * Update role
	 * 
	 * @param bigint $id Role Id
	 * @param KalturaUserRole $role Role to Update
	 * @return KalturaUserRole
	 */
	function update($id, KalturaUserRole $role)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "role", $role->toParams());
		$this->client->queueServiceActionCall("userrole", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSegmentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a segment to a user
	 * 
	 * @param KalturaUserSegment $userSegment User segment
	 * @return KalturaUserSegment
	 */
	function add(KalturaUserSegment $userSegment)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userSegment", $userSegment->toParams());
		$this->client->queueServiceActionCall("usersegment", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserSegment");
		return $resultObject;
	}

	/**
	 * Deletes a segment from a user
	 * 
	 * @param string $userId User id
	 * @param bigint $segmentId Segment id
	 * @return bool
	 */
	function delete($userId, $segmentId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "segmentId", $segmentId);
		$this->client->queueServiceActionCall("usersegment", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieve all the segments that apply for given user
	 * 
	 * @param KalturaUserSegmentFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaUserSegmentListResponse
	 */
	function listAction(KalturaUserSegmentFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("usersegment", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserSegmentListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserSessionProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new UserSessionProfile
	 * 
	 * @param KalturaUserSessionProfile $userSessionProfile UserSessionProfile Object to add
	 * @return KalturaUserSessionProfile
	 */
	function add(KalturaUserSessionProfile $userSessionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userSessionProfile", $userSessionProfile->toParams());
		$this->client->queueServiceActionCall("usersessionprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserSessionProfile");
		return $resultObject;
	}

	/**
	 * Delete existing UserSessionProfile
	 * 
	 * @param bigint $id UserSessionProfile identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("usersessionprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns the list of available UserSessionProfiles
	 * 
	 * @param KalturaUserSessionProfileFilter $filter Filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaUserSessionProfileListResponse
	 */
	function listAction(KalturaUserSessionProfileFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("usersessionprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserSessionProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update existing UserSessionProfile
	 * 
	 * @param bigint $id Id of userSessionProfile to update
	 * @param KalturaUserSessionProfile $userSessionProfile UserSessionProfile Object to update
	 * @return KalturaUserSessionProfile
	 */
	function update($id, KalturaUserSessionProfile $userSessionProfile)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "userSessionProfile", $userSessionProfile->toParams());
		$this->client->queueServiceActionCall("usersessionprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserSessionProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaClient extends KalturaClientBase
{
	/**
	 * 
	 * @var KalturaAnnouncementService
	 */
	public $announcement = null;

	/**
	 * 
	 * @var KalturaAppTokenService
	 */
	public $appToken = null;

	/**
	 * 
	 * @var KalturaAssetCommentService
	 */
	public $assetComment = null;

	/**
	 * 
	 * @var KalturaAssetService
	 */
	public $asset = null;

	/**
	 * 
	 * @var KalturaAssetFileService
	 */
	public $assetFile = null;

	/**
	 * 
	 * @var KalturaAssetFilePpvService
	 */
	public $assetFilePpv = null;

	/**
	 * 
	 * @var KalturaAssetHistoryService
	 */
	public $assetHistory = null;

	/**
	 * 
	 * @var KalturaAssetPersonalMarkupService
	 */
	public $assetPersonalMarkup = null;

	/**
	 * 
	 * @var KalturaAssetPersonalSelectionService
	 */
	public $assetPersonalSelection = null;

	/**
	 * 
	 * @var KalturaAssetRuleService
	 */
	public $assetRule = null;

	/**
	 * 
	 * @var KalturaAssetStatisticsService
	 */
	public $assetStatistics = null;

	/**
	 * 
	 * @var KalturaAssetStructService
	 */
	public $assetStruct = null;

	/**
	 * 
	 * @var KalturaAssetStructMetaService
	 */
	public $assetStructMeta = null;

	/**
	 * 
	 * @var KalturaAssetUserRuleService
	 */
	public $assetUserRule = null;

	/**
	 * 
	 * @var KalturaBookmarkService
	 */
	public $bookmark = null;

	/**
	 * 
	 * @var KalturaBulkUploadService
	 */
	public $bulkUpload = null;

	/**
	 * 
	 * @var KalturaBulkUploadStatisticsService
	 */
	public $bulkUploadStatistics = null;

	/**
	 * 
	 * @var KalturaBusinessModuleRuleService
	 */
	public $businessModuleRule = null;

	/**
	 * 
	 * @var KalturaCampaignService
	 */
	public $campaign = null;

	/**
	 * 
	 * @var KalturaCategoryItemService
	 */
	public $categoryItem = null;

	/**
	 * 
	 * @var KalturaCategoryTreeService
	 */
	public $categoryTree = null;

	/**
	 * 
	 * @var KalturaCategoryVersionService
	 */
	public $categoryVersion = null;

	/**
	 * 
	 * @var KalturaCdnAdapterProfileService
	 */
	public $cdnAdapterProfile = null;

	/**
	 * 
	 * @var KalturaCdnPartnerSettingsService
	 */
	public $cdnPartnerSettings = null;

	/**
	 * 
	 * @var KalturaCDVRAdapterProfileService
	 */
	public $cDVRAdapterProfile = null;

	/**
	 * 
	 * @var KalturaChannelService
	 */
	public $channel = null;

	/**
	 * 
	 * @var KalturaCollectionService
	 */
	public $collection = null;

	/**
	 * 
	 * @var KalturaCompensationService
	 */
	public $compensation = null;

	/**
	 * 
	 * @var KalturaConfigurationGroupService
	 */
	public $configurationGroup = null;

	/**
	 * 
	 * @var KalturaConfigurationGroupDeviceService
	 */
	public $configurationGroupDevice = null;

	/**
	 * 
	 * @var KalturaConfigurationGroupTagService
	 */
	public $configurationGroupTag = null;

	/**
	 * 
	 * @var KalturaConfigurationsService
	 */
	public $configurations = null;

	/**
	 * 
	 * @var KalturaCountryService
	 */
	public $country = null;

	/**
	 * 
	 * @var KalturaCouponService
	 */
	public $coupon = null;

	/**
	 * 
	 * @var KalturaCouponsGroupService
	 */
	public $couponsGroup = null;

	/**
	 * 
	 * @var KalturaCurrencyService
	 */
	public $currency = null;

	/**
	 * 
	 * @var KalturaDeviceBrandService
	 */
	public $deviceBrand = null;

	/**
	 * 
	 * @var KalturaDeviceFamilyService
	 */
	public $deviceFamily = null;

	/**
	 * 
	 * @var KalturaDeviceReferenceDataService
	 */
	public $deviceReferenceData = null;

	/**
	 * 
	 * @var KalturaDiscountDetailsService
	 */
	public $discountDetails = null;

	/**
	 * 
	 * @var KalturaDrmProfileService
	 */
	public $drmProfile = null;

	/**
	 * 
	 * @var KalturaDurationService
	 */
	public $duration = null;

	/**
	 * 
	 * @var KalturaDynamicListService
	 */
	public $dynamicList = null;

	/**
	 * 
	 * @var KalturaEmailService
	 */
	public $email = null;

	/**
	 * 
	 * @var KalturaEngagementAdapterService
	 */
	public $engagementAdapter = null;

	/**
	 * 
	 * @var KalturaEngagementService
	 */
	public $engagement = null;

	/**
	 * 
	 * @var KalturaEntitlementService
	 */
	public $entitlement = null;

	/**
	 * 
	 * @var KalturaEpgService
	 */
	public $epg = null;

	/**
	 * 
	 * @var KalturaEpgServicePartnerConfigurationService
	 */
	public $epgServicePartnerConfiguration = null;

	/**
	 * 
	 * @var KalturaEventNotificationActionService
	 */
	public $eventNotificationAction = null;

	/**
	 * 
	 * @var KalturaEventNotificationService
	 */
	public $eventNotification = null;

	/**
	 * 
	 * @var KalturaExportTaskService
	 */
	public $exportTask = null;

	/**
	 * 
	 * @var KalturaExternalChannelProfileService
	 */
	public $externalChannelProfile = null;

	/**
	 * 
	 * @var KalturaFavoriteService
	 */
	public $favorite = null;

	/**
	 * 
	 * @var KalturaFollowTvSeriesService
	 */
	public $followTvSeries = null;

	/**
	 * 
	 * @var KalturaHomeNetworkService
	 */
	public $homeNetwork = null;

	/**
	 * 
	 * @var KalturaHouseholdService
	 */
	public $household = null;

	/**
	 * 
	 * @var KalturaHouseholdCouponService
	 */
	public $householdCoupon = null;

	/**
	 * 
	 * @var KalturaHouseholdDeviceService
	 */
	public $householdDevice = null;

	/**
	 * 
	 * @var KalturaHouseholdLimitationsService
	 */
	public $householdLimitations = null;

	/**
	 * 
	 * @var KalturaHouseholdPaymentGatewayService
	 */
	public $householdPaymentGateway = null;

	/**
	 * 
	 * @var KalturaHouseholdPaymentMethodService
	 */
	public $householdPaymentMethod = null;

	/**
	 * 
	 * @var KalturaHouseholdPremiumServiceService
	 */
	public $householdPremiumService = null;

	/**
	 * 
	 * @var KalturaHouseholdQuotaService
	 */
	public $householdQuota = null;

	/**
	 * 
	 * @var KalturaHouseholdSegmentService
	 */
	public $householdSegment = null;

	/**
	 * 
	 * @var KalturaHouseholdUserService
	 */
	public $householdUser = null;

	/**
	 * 
	 * @var KalturaImageService
	 */
	public $image = null;

	/**
	 * 
	 * @var KalturaImageTypeService
	 */
	public $imageType = null;

	/**
	 * 
	 * @var KalturaInboxMessageService
	 */
	public $inboxMessage = null;

	/**
	 * 
	 * @var KalturaIngestProfileService
	 */
	public $IngestProfile = null;

	/**
	 * 
	 * @var KalturaIngestStatusService
	 */
	public $ingestStatus = null;

	/**
	 * 
	 * @var KalturaIotService
	 */
	public $iot = null;

	/**
	 * 
	 * @var KalturaIotProfileService
	 */
	public $iotProfile = null;

	/**
	 * 
	 * @var KalturaLabelService
	 */
	public $label = null;

	/**
	 * 
	 * @var KalturaLanguageService
	 */
	public $language = null;

	/**
	 * 
	 * @var KalturaLicensedUrlService
	 */
	public $licensedUrl = null;

	/**
	 * 
	 * @var KalturaLineupService
	 */
	public $lineup = null;

	/**
	 * 
	 * @var KalturaLiveToVodService
	 */
	public $liveToVod = null;

	/**
	 * 
	 * @var KalturaMediaConcurrencyRuleService
	 */
	public $mediaConcurrencyRule = null;

	/**
	 * 
	 * @var KalturaMediaFileService
	 */
	public $mediaFile = null;

	/**
	 * 
	 * @var KalturaMediaFileTypeService
	 */
	public $mediaFileType = null;

	/**
	 * 
	 * @var KalturaMessageTemplateService
	 */
	public $messageTemplate = null;

	/**
	 * 
	 * @var KalturaMetaService
	 */
	public $meta = null;

	/**
	 * 
	 * @var KalturaNotificationService
	 */
	public $notification = null;

	/**
	 * 
	 * @var KalturaNotificationsPartnerSettingsService
	 */
	public $notificationsPartnerSettings = null;

	/**
	 * 
	 * @var KalturaNotificationsSettingsService
	 */
	public $notificationsSettings = null;

	/**
	 * 
	 * @var KalturaOssAdapterProfileService
	 */
	public $ossAdapterProfile = null;

	/**
	 * 
	 * @var KalturaOttCategoryService
	 */
	public $ottCategory = null;

	/**
	 * 
	 * @var KalturaOttUserService
	 */
	public $ottUser = null;

	/**
	 * 
	 * @var KalturaParentalRuleService
	 */
	public $parentalRule = null;

	/**
	 * 
	 * @var KalturaPartnerConfigurationService
	 */
	public $partnerConfiguration = null;

	/**
	 * 
	 * @var KalturaPartnerService
	 */
	public $partner = null;

	/**
	 * 
	 * @var KalturaPartnerPremiumServicesService
	 */
	public $partnerPremiumServices = null;

	/**
	 * 
	 * @var KalturaPasswordPolicyService
	 */
	public $passwordPolicy = null;

	/**
	 * 
	 * @var KalturaPaymentGatewayProfileService
	 */
	public $paymentGatewayProfile = null;

	/**
	 * 
	 * @var KalturaPaymentMethodProfileService
	 */
	public $paymentMethodProfile = null;

	/**
	 * 
	 * @var KalturaPermissionService
	 */
	public $permission = null;

	/**
	 * 
	 * @var KalturaPermissionItemService
	 */
	public $permissionItem = null;

	/**
	 * 
	 * @var KalturaPersonalFeedService
	 */
	public $personalFeed = null;

	/**
	 * 
	 * @var KalturaPersonalListService
	 */
	public $personalList = null;

	/**
	 * 
	 * @var KalturaPinService
	 */
	public $pin = null;

	/**
	 * 
	 * @var KalturaPlaybackProfileService
	 */
	public $playbackProfile = null;

	/**
	 * 
	 * @var KalturaPpvService
	 */
	public $ppv = null;

	/**
	 * 
	 * @var KalturaPreviewModuleService
	 */
	public $previewModule = null;

	/**
	 * 
	 * @var KalturaPriceDetailsService
	 */
	public $priceDetails = null;

	/**
	 * 
	 * @var KalturaPricePlanService
	 */
	public $pricePlan = null;

	/**
	 * 
	 * @var KalturaProductPriceService
	 */
	public $productPrice = null;

	/**
	 * 
	 * @var KalturaProgramAssetGroupOfferService
	 */
	public $programAssetGroupOffer = null;

	/**
	 * 
	 * @var KalturaPurchaseSettingsService
	 */
	public $purchaseSettings = null;

	/**
	 * 
	 * @var KalturaRatioService
	 */
	public $ratio = null;

	/**
	 * 
	 * @var KalturaRecommendationProfileService
	 */
	public $recommendationProfile = null;

	/**
	 * 
	 * @var KalturaRecordingService
	 */
	public $recording = null;

	/**
	 * 
	 * @var KalturaRegionService
	 */
	public $region = null;

	/**
	 * 
	 * @var KalturaRegistrySettingsService
	 */
	public $registrySettings = null;

	/**
	 * 
	 * @var KalturaReminderService
	 */
	public $reminder = null;

	/**
	 * 
	 * @var KalturaReportService
	 */
	public $report = null;

	/**
	 * 
	 * @var KalturaSearchHistoryService
	 */
	public $searchHistory = null;

	/**
	 * 
	 * @var KalturaSearchPriorityGroupService
	 */
	public $searchPriorityGroup = null;

	/**
	 * 
	 * @var KalturaSearchPriorityGroupOrderedIdsSetService
	 */
	public $searchPriorityGroupOrderedIdsSet = null;

	/**
	 * 
	 * @var KalturaSegmentationTypeService
	 */
	public $segmentationType = null;

	/**
	 * 
	 * @var KalturaSeriesRecordingService
	 */
	public $seriesRecording = null;

	/**
	 * 
	 * @var KalturaSessionService
	 */
	public $session = null;

	/**
	 * 
	 * @var KalturaSmsAdapterProfileService
	 */
	public $smsAdapterProfile = null;

	/**
	 * 
	 * @var KalturaSocialActionService
	 */
	public $socialAction = null;

	/**
	 * 
	 * @var KalturaSocialCommentService
	 */
	public $socialComment = null;

	/**
	 * 
	 * @var KalturaSocialService
	 */
	public $social = null;

	/**
	 * 
	 * @var KalturaSocialFriendActivityService
	 */
	public $socialFriendActivity = null;

	/**
	 * 
	 * @var KalturaSsoAdapterProfileService
	 */
	public $ssoAdapterProfile = null;

	/**
	 * 
	 * @var KalturaStreamingDeviceService
	 */
	public $streamingDevice = null;

	/**
	 * 
	 * @var KalturaSubscriptionService
	 */
	public $subscription = null;

	/**
	 * 
	 * @var KalturaSubscriptionSetService
	 */
	public $subscriptionSet = null;

	/**
	 * 
	 * @var KalturaSystemService
	 */
	public $system = null;

	/**
	 * 
	 * @var KalturaTagService
	 */
	public $tag = null;

	/**
	 * 
	 * @var KalturaTimeShiftedTvPartnerSettingsService
	 */
	public $timeShiftedTvPartnerSettings = null;

	/**
	 * 
	 * @var KalturaTopicService
	 */
	public $topic = null;

	/**
	 * 
	 * @var KalturaTopicNotificationService
	 */
	public $topicNotification = null;

	/**
	 * 
	 * @var KalturaTopicNotificationMessageService
	 */
	public $topicNotificationMessage = null;

	/**
	 * 
	 * @var KalturaTransactionService
	 */
	public $transaction = null;

	/**
	 * 
	 * @var KalturaTransactionHistoryService
	 */
	public $transactionHistory = null;

	/**
	 * 
	 * @var KalturaTvmRuleService
	 */
	public $tvmRule = null;

	/**
	 * 
	 * @var KalturaUnifiedPaymentService
	 */
	public $unifiedPayment = null;

	/**
	 * 
	 * @var KalturaUploadTokenService
	 */
	public $uploadToken = null;

	/**
	 * 
	 * @var KalturaUsageModuleService
	 */
	public $usageModule = null;

	/**
	 * 
	 * @var KalturaUserAssetRuleService
	 */
	public $userAssetRule = null;

	/**
	 * 
	 * @var KalturaUserAssetsListItemService
	 */
	public $userAssetsListItem = null;

	/**
	 * 
	 * @var KalturaUserInterestService
	 */
	public $userInterest = null;

	/**
	 * 
	 * @var KalturaUserLoginPinService
	 */
	public $userLoginPin = null;

	/**
	 * 
	 * @var KalturaUserRoleService
	 */
	public $userRole = null;

	/**
	 * 
	 * @var KalturaUserSegmentService
	 */
	public $userSegment = null;

	/**
	 * 
	 * @var KalturaUserSessionProfileService
	 */
	public $userSessionProfile = null;

	/**
	 * Kaltura client constructor
	 *
	 * @param KalturaConfiguration $config
	 */
	public function __construct(KalturaConfiguration $config)
	{
		parent::__construct($config);
		
		$this->setClientTag('php5:22-12-21');
		$this->setApiVersion('8.3.1.30096');
		
		$this->announcement = new KalturaAnnouncementService($this);
		$this->appToken = new KalturaAppTokenService($this);
		$this->assetComment = new KalturaAssetCommentService($this);
		$this->asset = new KalturaAssetService($this);
		$this->assetFile = new KalturaAssetFileService($this);
		$this->assetFilePpv = new KalturaAssetFilePpvService($this);
		$this->assetHistory = new KalturaAssetHistoryService($this);
		$this->assetPersonalMarkup = new KalturaAssetPersonalMarkupService($this);
		$this->assetPersonalSelection = new KalturaAssetPersonalSelectionService($this);
		$this->assetRule = new KalturaAssetRuleService($this);
		$this->assetStatistics = new KalturaAssetStatisticsService($this);
		$this->assetStruct = new KalturaAssetStructService($this);
		$this->assetStructMeta = new KalturaAssetStructMetaService($this);
		$this->assetUserRule = new KalturaAssetUserRuleService($this);
		$this->bookmark = new KalturaBookmarkService($this);
		$this->bulkUpload = new KalturaBulkUploadService($this);
		$this->bulkUploadStatistics = new KalturaBulkUploadStatisticsService($this);
		$this->businessModuleRule = new KalturaBusinessModuleRuleService($this);
		$this->campaign = new KalturaCampaignService($this);
		$this->categoryItem = new KalturaCategoryItemService($this);
		$this->categoryTree = new KalturaCategoryTreeService($this);
		$this->categoryVersion = new KalturaCategoryVersionService($this);
		$this->cdnAdapterProfile = new KalturaCdnAdapterProfileService($this);
		$this->cdnPartnerSettings = new KalturaCdnPartnerSettingsService($this);
		$this->cDVRAdapterProfile = new KalturaCDVRAdapterProfileService($this);
		$this->channel = new KalturaChannelService($this);
		$this->collection = new KalturaCollectionService($this);
		$this->compensation = new KalturaCompensationService($this);
		$this->configurationGroup = new KalturaConfigurationGroupService($this);
		$this->configurationGroupDevice = new KalturaConfigurationGroupDeviceService($this);
		$this->configurationGroupTag = new KalturaConfigurationGroupTagService($this);
		$this->configurations = new KalturaConfigurationsService($this);
		$this->country = new KalturaCountryService($this);
		$this->coupon = new KalturaCouponService($this);
		$this->couponsGroup = new KalturaCouponsGroupService($this);
		$this->currency = new KalturaCurrencyService($this);
		$this->deviceBrand = new KalturaDeviceBrandService($this);
		$this->deviceFamily = new KalturaDeviceFamilyService($this);
		$this->deviceReferenceData = new KalturaDeviceReferenceDataService($this);
		$this->discountDetails = new KalturaDiscountDetailsService($this);
		$this->drmProfile = new KalturaDrmProfileService($this);
		$this->duration = new KalturaDurationService($this);
		$this->dynamicList = new KalturaDynamicListService($this);
		$this->email = new KalturaEmailService($this);
		$this->engagementAdapter = new KalturaEngagementAdapterService($this);
		$this->engagement = new KalturaEngagementService($this);
		$this->entitlement = new KalturaEntitlementService($this);
		$this->epg = new KalturaEpgService($this);
		$this->epgServicePartnerConfiguration = new KalturaEpgServicePartnerConfigurationService($this);
		$this->eventNotificationAction = new KalturaEventNotificationActionService($this);
		$this->eventNotification = new KalturaEventNotificationService($this);
		$this->exportTask = new KalturaExportTaskService($this);
		$this->externalChannelProfile = new KalturaExternalChannelProfileService($this);
		$this->favorite = new KalturaFavoriteService($this);
		$this->followTvSeries = new KalturaFollowTvSeriesService($this);
		$this->homeNetwork = new KalturaHomeNetworkService($this);
		$this->household = new KalturaHouseholdService($this);
		$this->householdCoupon = new KalturaHouseholdCouponService($this);
		$this->householdDevice = new KalturaHouseholdDeviceService($this);
		$this->householdLimitations = new KalturaHouseholdLimitationsService($this);
		$this->householdPaymentGateway = new KalturaHouseholdPaymentGatewayService($this);
		$this->householdPaymentMethod = new KalturaHouseholdPaymentMethodService($this);
		$this->householdPremiumService = new KalturaHouseholdPremiumServiceService($this);
		$this->householdQuota = new KalturaHouseholdQuotaService($this);
		$this->householdSegment = new KalturaHouseholdSegmentService($this);
		$this->householdUser = new KalturaHouseholdUserService($this);
		$this->image = new KalturaImageService($this);
		$this->imageType = new KalturaImageTypeService($this);
		$this->inboxMessage = new KalturaInboxMessageService($this);
		$this->IngestProfile = new KalturaIngestProfileService($this);
		$this->ingestStatus = new KalturaIngestStatusService($this);
		$this->iot = new KalturaIotService($this);
		$this->iotProfile = new KalturaIotProfileService($this);
		$this->label = new KalturaLabelService($this);
		$this->language = new KalturaLanguageService($this);
		$this->licensedUrl = new KalturaLicensedUrlService($this);
		$this->lineup = new KalturaLineupService($this);
		$this->liveToVod = new KalturaLiveToVodService($this);
		$this->mediaConcurrencyRule = new KalturaMediaConcurrencyRuleService($this);
		$this->mediaFile = new KalturaMediaFileService($this);
		$this->mediaFileType = new KalturaMediaFileTypeService($this);
		$this->messageTemplate = new KalturaMessageTemplateService($this);
		$this->meta = new KalturaMetaService($this);
		$this->notification = new KalturaNotificationService($this);
		$this->notificationsPartnerSettings = new KalturaNotificationsPartnerSettingsService($this);
		$this->notificationsSettings = new KalturaNotificationsSettingsService($this);
		$this->ossAdapterProfile = new KalturaOssAdapterProfileService($this);
		$this->ottCategory = new KalturaOttCategoryService($this);
		$this->ottUser = new KalturaOttUserService($this);
		$this->parentalRule = new KalturaParentalRuleService($this);
		$this->partnerConfiguration = new KalturaPartnerConfigurationService($this);
		$this->partner = new KalturaPartnerService($this);
		$this->partnerPremiumServices = new KalturaPartnerPremiumServicesService($this);
		$this->passwordPolicy = new KalturaPasswordPolicyService($this);
		$this->paymentGatewayProfile = new KalturaPaymentGatewayProfileService($this);
		$this->paymentMethodProfile = new KalturaPaymentMethodProfileService($this);
		$this->permission = new KalturaPermissionService($this);
		$this->permissionItem = new KalturaPermissionItemService($this);
		$this->personalFeed = new KalturaPersonalFeedService($this);
		$this->personalList = new KalturaPersonalListService($this);
		$this->pin = new KalturaPinService($this);
		$this->playbackProfile = new KalturaPlaybackProfileService($this);
		$this->ppv = new KalturaPpvService($this);
		$this->previewModule = new KalturaPreviewModuleService($this);
		$this->priceDetails = new KalturaPriceDetailsService($this);
		$this->pricePlan = new KalturaPricePlanService($this);
		$this->productPrice = new KalturaProductPriceService($this);
		$this->programAssetGroupOffer = new KalturaProgramAssetGroupOfferService($this);
		$this->purchaseSettings = new KalturaPurchaseSettingsService($this);
		$this->ratio = new KalturaRatioService($this);
		$this->recommendationProfile = new KalturaRecommendationProfileService($this);
		$this->recording = new KalturaRecordingService($this);
		$this->region = new KalturaRegionService($this);
		$this->registrySettings = new KalturaRegistrySettingsService($this);
		$this->reminder = new KalturaReminderService($this);
		$this->report = new KalturaReportService($this);
		$this->searchHistory = new KalturaSearchHistoryService($this);
		$this->searchPriorityGroup = new KalturaSearchPriorityGroupService($this);
		$this->searchPriorityGroupOrderedIdsSet = new KalturaSearchPriorityGroupOrderedIdsSetService($this);
		$this->segmentationType = new KalturaSegmentationTypeService($this);
		$this->seriesRecording = new KalturaSeriesRecordingService($this);
		$this->session = new KalturaSessionService($this);
		$this->smsAdapterProfile = new KalturaSmsAdapterProfileService($this);
		$this->socialAction = new KalturaSocialActionService($this);
		$this->socialComment = new KalturaSocialCommentService($this);
		$this->social = new KalturaSocialService($this);
		$this->socialFriendActivity = new KalturaSocialFriendActivityService($this);
		$this->ssoAdapterProfile = new KalturaSsoAdapterProfileService($this);
		$this->streamingDevice = new KalturaStreamingDeviceService($this);
		$this->subscription = new KalturaSubscriptionService($this);
		$this->subscriptionSet = new KalturaSubscriptionSetService($this);
		$this->system = new KalturaSystemService($this);
		$this->tag = new KalturaTagService($this);
		$this->timeShiftedTvPartnerSettings = new KalturaTimeShiftedTvPartnerSettingsService($this);
		$this->topic = new KalturaTopicService($this);
		$this->topicNotification = new KalturaTopicNotificationService($this);
		$this->topicNotificationMessage = new KalturaTopicNotificationMessageService($this);
		$this->transaction = new KalturaTransactionService($this);
		$this->transactionHistory = new KalturaTransactionHistoryService($this);
		$this->tvmRule = new KalturaTvmRuleService($this);
		$this->unifiedPayment = new KalturaUnifiedPaymentService($this);
		$this->uploadToken = new KalturaUploadTokenService($this);
		$this->usageModule = new KalturaUsageModuleService($this);
		$this->userAssetRule = new KalturaUserAssetRuleService($this);
		$this->userAssetsListItem = new KalturaUserAssetsListItemService($this);
		$this->userInterest = new KalturaUserInterestService($this);
		$this->userLoginPin = new KalturaUserLoginPinService($this);
		$this->userRole = new KalturaUserRoleService($this);
		$this->userSegment = new KalturaUserSegmentService($this);
		$this->userSessionProfile = new KalturaUserSessionProfileService($this);
	}
	
	/**
	 * Client tag
	 * 
	 * @param string $clientTag
	 */
	public function setClientTag($clientTag)
	{
		$this->clientConfiguration['clientTag'] = $clientTag;
	}
	
	/**
	 * Client tag
	 * 
	 * @return string
	 */
	public function getClientTag()
	{
		if(isset($this->clientConfiguration['clientTag']))
		{
			return $this->clientConfiguration['clientTag'];
		}
		
		return null;
	}
	
	/**
	 * API Version
	 * 
	 * @param string $apiVersion
	 */
	public function setApiVersion($apiVersion)
	{
		$this->clientConfiguration['apiVersion'] = $apiVersion;
	}
	
	/**
	 * API Version
	 * 
	 * @return string
	 */
	public function getApiVersion()
	{
		if(isset($this->clientConfiguration['apiVersion']))
		{
			return $this->clientConfiguration['apiVersion'];
		}
		
		return null;
	}
	
	/**
	 * Impersonated partner id
	 * 
	 * @param int $partnerId
	 */
	public function setPartnerId($partnerId)
	{
		$this->requestConfiguration['partnerId'] = $partnerId;
	}
	
	/**
	 * Impersonated partner id
	 * 
	 * @return int
	 */
	public function getPartnerId()
	{
		if(isset($this->requestConfiguration['partnerId']))
		{
			return $this->requestConfiguration['partnerId'];
		}
		
		return null;
	}
	
	/**
	 * Impersonated user id
	 * 
	 * @param int $userId
	 */
	public function setUserId($userId)
	{
		$this->requestConfiguration['userId'] = $userId;
	}
	
	/**
	 * Impersonated user id
	 * 
	 * @return int
	 */
	public function getUserId()
	{
		if(isset($this->requestConfiguration['userId']))
		{
			return $this->requestConfiguration['userId'];
		}
		
		return null;
	}
	
	/**
	 * Content language
	 * 
	 * @param string $language
	 */
	public function setLanguage($language)
	{
		$this->requestConfiguration['language'] = $language;
	}
	
	/**
	 * Content language
	 * 
	 * @return string
	 */
	public function getLanguage()
	{
		if(isset($this->requestConfiguration['language']))
		{
			return $this->requestConfiguration['language'];
		}
		
		return null;
	}
	
	/**
	 * Content currency
	 * 
	 * @param string $currency
	 */
	public function setCurrency($currency)
	{
		$this->requestConfiguration['currency'] = $currency;
	}
	
	/**
	 * Content currency
	 * 
	 * @return string
	 */
	public function getCurrency()
	{
		if(isset($this->requestConfiguration['currency']))
		{
			return $this->requestConfiguration['currency'];
		}
		
		return null;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @param string $ks
	 */
	public function setKs($ks)
	{
		$this->requestConfiguration['ks'] = $ks;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @return string
	 */
	public function getKs()
	{
		if(isset($this->requestConfiguration['ks']))
		{
			return $this->requestConfiguration['ks'];
		}
		
		return null;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @param string $sessionId
	 */
	public function setSessionId($sessionId)
	{
		$this->requestConfiguration['ks'] = $sessionId;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @return string
	 */
	public function getSessionId()
	{
		if(isset($this->requestConfiguration['ks']))
		{
			return $this->requestConfiguration['ks'];
		}
		
		return null;
	}
	
	/**
	 * Response profile - this attribute will be automatically unset after every API call
	 * 
	 * @param KalturaBaseResponseProfile $responseProfile
	 */
	public function setResponseProfile(KalturaBaseResponseProfile $responseProfile)
	{
		$this->requestConfiguration['responseProfile'] = $responseProfile;
	}
	
	/**
	 * Response profile - this attribute will be automatically unset after every API call
	 * 
	 * @return KalturaBaseResponseProfile
	 */
	public function getResponseProfile()
	{
		if(isset($this->requestConfiguration['responseProfile']))
		{
			return $this->requestConfiguration['responseProfile'];
		}
		
		return null;
	}
	
	/**
	 * Abort the Multireuqset call if any error occurs in one of the requests
	 * 
	 * @param bool $abortOnError
	 */
	public function setAbortOnError($abortOnError)
	{
		$this->requestConfiguration['abortOnError'] = $abortOnError;
	}
	
	/**
	 * Abort the Multireuqset call if any error occurs in one of the requests
	 * 
	 * @return bool
	 */
	public function getAbortOnError()
	{
		if(isset($this->requestConfiguration['abortOnError']))
		{
			return $this->requestConfiguration['abortOnError'];
		}
		
		return null;
	}
	
	/**
	 * Abort all following requests if current request has an error
	 * 
	 * @param bool $abortAllOnError
	 */
	public function setAbortAllOnError($abortAllOnError)
	{
		$this->requestConfiguration['abortAllOnError'] = $abortAllOnError;
	}
	
	/**
	 * Abort all following requests if current request has an error
	 * 
	 * @return bool
	 */
	public function getAbortAllOnError()
	{
		if(isset($this->requestConfiguration['abortAllOnError']))
		{
			return $this->requestConfiguration['abortAllOnError'];
		}
		
		return null;
	}
	
	/**
	 * Skip current request according to skip condition
	 * 
	 * @param KalturaSkipCondition $skipCondition
	 */
	public function setSkipCondition(KalturaSkipCondition $skipCondition)
	{
		$this->requestConfiguration['skipCondition'] = $skipCondition;
	}
	
	/**
	 * Skip current request according to skip condition
	 * 
	 * @return KalturaSkipCondition
	 */
	public function getSkipCondition()
	{
		if(isset($this->requestConfiguration['skipCondition']))
		{
			return $this->requestConfiguration['skipCondition'];
		}
		
		return null;
	}
	
	/**
	 * Clear all volatile configuration parameters
	 */
	protected function resetRequest()
	{
		parent::resetRequest();
		unset($this->requestConfiguration['responseProfile']);
	}
}


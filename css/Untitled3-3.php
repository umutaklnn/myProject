<?php

// if (ICL_LANGUAGE_CODE == 'en') {
//     $careerSinglePage = '162';
// } else {
//     $careerSinglePage = '164';
// }

$postId = $post->ID;

$main_header_section_title = get_field('main_header_section_title', $postId);
$filterSectionTitle = get_field('filter_section_title', $postId);
$jobListingSectionTitle = get_field('job_listing_section_title', $postId);
$jobListingSectionSubTitle = get_field('job_listing_section_sub_title', $postId);
$jobListingSectionDescription = get_field('job_listing_section_description', $postId);
$career_detail_page_link = get_field('career_detail_page_link', 'option');
?>
<!-- Find Your Job Section -->
<section class="find-job">
    <div class="container">

        <div class="title-content text-center"> 
<?php if (!empty($jobListingSectionTitle)) { ?>
                <h3 class="title-heading text-center"><?php echo $jobListingSectionTitle; ?></h3>
            <?php } ?>
            <?php if (!empty($jobListingSectionSubTitle)) { ?>
                <h4 class="small-title"><?php echo $jobListingSectionSubTitle; ?></h4>
            <?php } ?>
        </div>

<?php if (!empty($jobListingSectionDescription)) { ?>
            <div class="title-sub-heading text-center">
            <?php echo $jobListingSectionDescription; ?>
            </div>
            <?php } ?>

        <?php
        /* Append search fields here if any */
        if ((isset($_POST['searchstr']) && !empty($_POST['searchstr'])) ||
                (isset($_POST['country']) && !empty($_POST['country'])) ||
                (isset($_POST['searchval_Type']) && !empty($_POST['searchval_Type']))) {
            /* POST search values */
            $keyword = $country = "";
            $searchvalType = array();
            $keyword = trim($_POST['searchstr']);
            $country = trim($_POST['country']);
            $searchvalType = $_POST['searchval_Type'];
            $displayLoadMore = false;
            /* API call to get seperator string */
            $api_url_position = STAFFITPRO_API_URL . 'Position/wheremini?fields=JobTitle,JobLocation,Type&separator=|&sortField=Id';
            $access_token = nt_get_token_staffitpro();

            if (isset($result_token->TokenId)) {
                $curl_contact = curl_init();
                curl_setopt($curl_contact, CURLOPT_URL, $api_url_position);
                curl_setopt($curl_contact, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl_contact, CURLOPT_TIMEOUT, 500);
                curl_setopt($curl_contact, CURLOPT_HTTPHEADER, array(
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: SIP sip_token=' . $access_token //Token required
                ));
                curl_setopt($curl_contact, CURLOPT_POSTFIELDS, '');
                curl_setopt($curl_contact, CURLOPT_POST, 1);
                $positions_json = curl_exec($curl_contact);
                curl_close($curl_contact);
                $positions_result_filter = json_decode($positions_json);

                /* Compare filter values with api results */
                if (isset($positions_result_filter) && !empty($positions_result_filter)) {

                    //filter code start
                    foreach ($positions_result_filter as $filterKey => $filterValue) {
                        $mainString = $filterValue->Fields;
                        $mainPositionID = $filterValue->Id;
                        $SeparateMainString = explode('|', $mainString);
                        if (isset($keyword) && ($keyword != "") && $country == "" && $searchvalType == "") {
                            if (!empty($keyword) && stristr($SeparateMainString[0], $keyword) !== FALSE) {
                                $positionIds1[] = $mainPositionID;
                            }
                        }
                        if ($keyword == "" && isset($country) && ($country != "") && $searchvalType == "") {
                            if (!empty($country) && stristr($SeparateMainString[1], $country) !== FALSE) {
                                $positionIds1[] = $mainPositionID;
                            }
                        }
                        if ($keyword == "" && $country == "" && !empty($searchvalType)) {
                            if (!empty($searchvalType) && in_array($SeparateMainString[2], $searchvalType)) {
                                $positionIds1[] = $mainPositionID;
                            }
                        }
                        if (isset($keyword) && ($keyword != "") && ($country != "") && isset($country) && $searchvalType == "") {
                            if ((stristr($SeparateMainString[0], $keyword) !== FALSE) && (stristr($SeparateMainString[1], $country) !== FALSE)) {
                                $positionIds1[] = $mainPositionID;
                            }
                        }
                        if (isset($keyword) && ($keyword != "") && $country == "" && !empty($searchvalType)) {
                            if ((stristr($SeparateMainString[0], $keyword) !== FALSE) && in_array($SeparateMainString[2], $searchvalType)) {
                                $positionIds1[] = $mainPositionID;
                            }
                        }
                        if ($keyword == "" && isset($country) && ($country != "") && !empty($searchvalType)) {
                            if ((stristr($SeparateMainString[1], $country) !== FALSE) && in_array($SeparateMainString[2], $searchvalType)) {
                                $positionIds1[] = $mainPositionID;
                            }
                        }
                        if (isset($keyword) && ($keyword != "") && isset($country) && ($country != "") && !empty($searchvalType)) {
                            if ((stristr($SeparateMainString[0], $keyword) !== FALSE) && (stristr($SeparateMainString[1], $country) !== FALSE) && in_array($SeparateMainString[2], $searchvalType)) {
                                $positionIds1[] = $mainPositionID;
                            }
                        }
                    }
                }

                /* Fetch position details from API */
                if (!empty($positionIds1) && isset($positionIds1)) {
                    $displayPositionRes = nt_get_all_display_position();
                    foreach ($positionIds1 as $finalResultId) {
                        if (in_array($finalResultId, $displayPositionRes)) {
                            $response[] = getCareerDetails($finalResultId); //function to get details from position id	
                        }
                    }
                    $positions_result = $response;
                }
            }
        } else {
            $displayPositionRes = nt_get_all_display_position();
            if (!isset($displayPositionRes->ErrorCode) && !isset($displayPositionRes->Message)) {
                if (isset($displayPositionRes)) {
                    if (count($displayPositionRes) > 10) {
                        $displayLoadMore = true;
                    } else {
                        $displayLoadMore = false;
                    }
                    $displayPositionRes = array_slice($displayPositionRes, 0, 1, true);
                }
                if (!isset($displayPositionRes->ErrorCode)) {
                    if (!empty($displayPositionRes) && isset($displayPositionRes)) {
                        foreach ($displayPositionRes as $finalResultId) {
                            $response[] = getCareerDetails($finalResultId); //function to get details from position id
                        }
                        $positions_result = $response;
                    }
                }
            }
        }

        if (isset($positions_result->ErrorCode) || isset($access_token->ErrorCode) || isset($displayPositionRes->ErrorCode)) {
            $api_error_message = 'Error while fetch position. Please try again later.';
            if (isset($access_token->ErrorCode)) {
                $api_error_message = $access_token->Message;
            }
            if (isset($displayPositionRes->ErrorCode)) {
                $api_error_message = $displayPositionRes->Message;
            }
            ?>
            <div class="job-block-wrapper error-wrapper">
                <p><?php echo $api_error_message; ?></p>
            </div>
        <?php } else if (empty($positions_result)) { ?>
            <div class="job-block-wrapper error-wrapper">
                <p>No result found.</p>
            </div>
            <?php
        } else {
            ?>
            <div class="job-block-wrapper">
            <?php
            $abc = 0;
            foreach ($positions_result as $key => $position_result) {
                if ($position_result->DisplayJobMarket == "1") {
                    ?>
                        <div class="job-block job-search-<?php echo $key; ?>">
                            <div class="job-header">
                                <div class="left-block" style="display:none;"><?php echo __('Request ID', 'expertsnaut'); ?>: <span><?php echo $position_result->Id; ?></span></div>
                                <div class="left-block"></div>
                                <div class="right-block"><span><?php echo $position_result->TypeStr[0]; ?></span></div>
                            </div>
                            <div class="job-content">
                                <div class="title"><?php echo $position_result->JobTitle; ?></div>
                                <div class="option-wrapper">
                                    <span class="option">
                                        <em>
                                            <img src="<?php echo get_template_directory_uri(); ?>/public/images/dateposted-icon.png" alt="date">
                                        </em>
                                        <span><?php echo $position_result->Begin; ?></span>
                                    </span>
                                    <span class="option">
                                        <em>
                                            <img src="<?php echo get_template_directory_uri(); ?>/public/images/location-icon.png" alt="location">
                                        </em>
                                        <span><?php echo $position_result->JobLocation; ?></span>
                                    </span>
                                    <span class="option">
                                        <em>
                                            <img src="<?php echo get_template_directory_uri(); ?>/public/images/clock-icon.png" alt="clock">
                                        </em>
                                        <span><?php echo $position_result->End; ?></span>
                                    </span>
                                    <span class="option">
                                        <em>
                                            <img src="<?php echo get_template_directory_uri(); ?>/public/images/building-icon.png" alt="Industry">
                                        </em>
                                        <span><?php echo $position_result->OtherRemarks; ?></span>
                                    </span>
                                </div>
                            </div>
                            <div class="job-footer">
                                <div class="left-block"></div>
                                <div class="right-block">
                                    <a href="<?php echo $career_detail_page_link['url'] . '?positionID=' . $position_result->Id; ?>" class="btn-primary btn-black" title="<?php echo _('APPLY NOW', 'expertsnaut'); ?>"><?php echo _('MORE', 'expertsnaut'); ?>
                                        <em><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 14">
                                            <path
                                                d="M12.1.2c-.2-.3-.7-.3-.9 0-.2.3-.2.7 0 1l4.6 5.1H.6c-.3 0-.6.3-.6.7s.3.7.6.7h15.2l-4.6 5.1c-.2.3-.2.7 0 1 .3.3.7.3.9 0l5.7-6.3c.3-.3.3-.7 0-1L12.1.2z">
                                            </path>
                                            </svg>
                                        </em>
                                    </a>
                                </div>
                            </div>
                        </div>
            <?php
        }
        $abc +=1;
        if($abc>4){
            break;
        } 
    }
    ?>
            </div>
<?php } ?>
    </div>
</section>
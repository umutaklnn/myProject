<?php
/*
  Template Name: ExpertsNaut For Experts
 */

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
 
 

<!-- Career -->
 
<!-- Find Your Job Section -->
<section class="find-job">
    <div class="container denemmm">

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
                    $displayPositionRes = array_slice($displayPositionRes, 0, 10, true);
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
            $abc = 0;
        } else {
            ?>
                        <div id="carouselExampleControls" data-interval="3000" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                             
                            <?php  foreach ($positions_result as $key => $position_result) {
                                if ($position_result->DisplayJobMarket == "1") { ?>
                                    <div class="carousel-item <?php if($abc==0){echo "active";} ?>">
                                        <div class="slide s<?php echo $abcc; ?>">
                                        <div class="job-block job-search-<?php echo $key; ?>">
                                     <div class="job-header">
                                         <div class="left-block"></div>
                                    </div>
                                    <div class="job-content">
                                        <div class="title" style="font-family: 'Jura'; font-size:19px;text-align:center;"><?php echo $position_result->JobTitle; ?></div>
                                        
                                        <a style="max-width:100%; "  href="<?php echo $career_detail_page_link['url'] . '?positionID=' . $position_result->Id; ?>">
                                            <button  type="button"  class="btn txt-btnn   rounded h3 btn-dark">MEHR INFOS</button>
                                        </a>
                                    </div>
                                    
                                </div>
                                </div>         
                                </div>
                                <?php } $abc +=1; if($abc>4){break;} } ?>
                          </div>
                          <a class="carousel-control-prev"  href="#carouselExampleControls" role="button" data-slide="prev">
                             <i class="fas fa-chevron-left" style="color:black;"></i>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <i class="fas fa-chevron-right" style="color:black;"></i>
                          </a>
                          <style>
                              .carousel-control-prev{

                              }
                              .txt-btnn{
                                  font-size:16px;
                                  display:block;
                                  margin:auto;
                                  margin-top:10px;
                                  background:black;
                              }
                              .carousel-control-prev{
                                  top:revert;
                              }
                               
                              .carousel-control-next{
                                  top:revert;
                              }
                              .denemmm{
                                max-height: 250px;
                              }
                          </style>
                        </div>
             
            <div class="ajax-loader-positions">
                <img src="<?php echo get_template_directory_uri(); ?>/public/images/loader.svg" alt="loader"/>
            </div>
<?php } ?>
    </div>
</section>
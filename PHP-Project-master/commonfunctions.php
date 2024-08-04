<?php

error_reporting(0);

if (!function_exists('pre')) {

    function pre($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit;
    }

}

if (!function_exists('pr')) {

    function pr($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

}

function login($vEmail, $vPassword) {
    global $conn;
    $login_query = "SELECT * FROM admin WHERE (email = '" . mysqli_real_escape_string($conn, $vEmail) . "') and (password = '" . mysqli_real_escape_string($conn, $vPassword) . "')";
    $login_res = mysqli_query($conn, $login_query);
    if (mysqli_num_rows($login_res) == 1) {
        $rows = mysqli_fetch_array($login_res);
        $_SESSION['email'] = $rows['email'];
        $_SESSION['admin_id'] = $rows['admin_id'];
        $_SESSION['name'] = $rows['name'];
        return 1;
    } else {
        return 0;
    }
}

function changePassword($postData) {
    global $conn;
    $login_query = "SELECT * FROM admin WHERE password = '" . md5($postData['password']) . "' AND admin_id = '" . $_SESSION['admin_id'] . "' ";
    $login_res = mysqli_query($conn, $login_query);
    if (mysqli_num_rows($login_res) > 0) {
        $login_query1 = "UPDATE admin SET password = '" . md5($postData['newpassword']) . "' WHERE admin_id = '" . $_SESSION['admin_id'] . "'";
        if (mysqli_query($conn, $login_query1)) {
            return 1;
        } else {
            return 0;
        }
    } else {
        return 2;
    }
}

function getAllUserData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_user ORDER BY dCreateDate DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iUserID'] = $row['iUserID'];
            $temp[$i]['vFirstName'] = $row['vFirstName'];
            $temp[$i]['vLastName'] = $row['vLastName'];
            $temp[$i]['vEmail'] = $row['vEmail'];
            $temp[$i]['vPhone'] = $row['vPhone'];
            $temp[$i]['tAddress'] = $row['tAddress'];
            $temp[$i]['vCity'] = $row['vCity'];
            $temp[$i]['vPostcode'] = $row['vPostcode'];
            $temp[$i]['vReferralCode'] = $row['vReferralCode'];
            $temp[$i]['tImage'] = $row['tImage'];
            $temp[$i]['dCreatedDate'] = $row['dCreatedDate'];
            $i++;
        }
    }
    return $temp;
}

function getAllContactData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_contact";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($select_res)) {
            $temp[$i]['iContactID'] = $row['iContactID'];
            $temp[$i]['vName'] = $row['vName'];
            $temp[$i]['vEmail'] = $row['vEmail'];
            $temp[$i]['vPhone'] = $row['vPhone'];
            $temp[$i]['vCallTime'] = $row['vCallTime'];
            $temp[$i]['eContactWay'] = $row['eContactWay'];
            $temp[$i]['vReasonForContact'] = $row['vReasonForContact'];
            $temp[$i]['eEnquiryType'] = $row['eEnquiryType'];
            $temp[$i]['vServiceType'] = $row['vServiceType'];
            $temp[$i]['vSubServiceType'] = $row['vSubServiceType'];
            $temp[$i]['vPostcode'] = $row['vPostcode'];
            $temp[$i]['vPromocode'] = $row['vPromocode'];
            $temp[$i]['tNote'] = $row['tNote'];
            $i++;
        }
    }
    return $temp;
}

function addFaq($tQuestion, $tAnswer) {
    global $conn;
    $que = addslashes($tQuestion);
    $answ = addslashes($tAnswer);
    $insert_query = "INSERT INTO tbl_faq SET tQuestion='" . $que . "',tAnswer='" . $answ . "'";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}

function getAllFaqData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_faq ORDER BY iFaqID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iFaqID'] = $row['iFaqID'];
            $temp[$i]['tQuestion'] = $row['tQuestion'];
            $temp[$i]['tAnswer'] = $row['tAnswer'];
            $i++;
        }
    }
    return $temp;
}

function getFaqByID($fid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM tbl_faq WHERE iFaqID = $fid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateFaq($iFaqID, $tQuestion, $tAnswer) {
    global $conn;
    $que = addslashes($tQuestion);
    $answ = addslashes($tAnswer);
    $update_query = "UPDATE tbl_faq SET tQuestion = '$que',tAnswer = '$answ' WHERE iFaqID = $iFaqID";
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function addCategory($vCategoryName, $newfilename) {
    global $conn;
    $insert_query = "INSERT INTO banner SET banner_name='" . $vCategoryName . "',banner_image='" . $newfilename . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function addhistory($history) {
    global $conn;
    $insert_query = "INSERT INTO history SET history_story='" . $history . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function addpublic($public_name,$public_bus,$public_bus_type,$public_gender,$public_blood_grp_name,$public_vord_no,$public_mo_no,$public_bdate) {
    global $conn;
    $insert_query = "INSERT INTO public_c SET public_name='" . $public_name . "',public_bus='" . $public_bus . "',public_bus_type='" . $public_bus_type . "',public_gender='" . $public_gender . "',public_blood_grp_name='" . $public_blood_grp_name . "',public_vord_no='" . $public_vord_no . "',public_mo_no='" . $public_mo_no . "',public_bdate='" . $public_bdate . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function adddocument($document) {
    global $conn;
    $insert_query = "INSERT INTO document SET document_name='" . $document. "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function addyojna($yojna_name,$yojna_link) {
    global $conn;
    $insert_query = "INSERT INTO yojna SET yojna_name='" . $yojna_name. "',yojna_link='" . $yojna_link. "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function addvalid($valid_start_date,$valid_end_date) {
    global $conn;
    $insert_query = "INSERT INTO valid_date SET valid_start_date='" . $valid_start_date. "',valid_end_date='" . $valid_end_date. "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function addvikas($vikas_name,$vikas_grant_amount,$vikas_detail,$vikas_com_year) {
    global $conn;	
    $insert_query = "INSERT INTO vikas_kam SET vikas_name='" . $vikas_name. "',vikas_grant_amount='" . $vikas_grant_amount. "',vikas_detail='" . $vikas_detail. "',vikas_com_year='" . $vikas_com_year. "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function addnews($news_name, $newfilename) {
    global $conn;
    $insert_query = "INSERT INTO latest_news SET news_name='" . $news_name . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}
function addsarpanch($sarpanch_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO sarpanch SET sarpanch_name='" . $sarpanch_name . "',sarpanch_image='" . $newfilename . "',sarpanch_email='" . $email_id . "',sarpanch_no='" . $mobile_no . "',sarpanch_fb='" . $fb_id . "',sarpanch_insta='" . $insta_id . "',sarpanch_twitter='" . $twitter_id . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addplace($place_name,$place_detail,$place_date,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO place SET place_name='" . $place_name . "',place_image='" . $newfilename . "',place_detail='" . $place_detail . "',place_date='" . $place_date . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addactivity($activity_name,$activity_detail,$activity_date,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO activity SET activity_name='" . $activity_name . "',activity_image='" . $newfilename . "',activity_detail='" . $activity_detail . "',activity_date='" . $activity_date . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addachievment($achievment_username,$achievment_detail,$achievment_type,$achievment_year,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO achievment SET achievment_username='" . $achievment_username . "',achievment_image='" . $newfilename . "',achievment_detail='" . $achievment_detail . "',achievment_type='" . $achievment_type . "',achievment_year='" . $achievment_year . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
	print("mayur");
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addcommitte($committe_name,$committe_vord_no,$committe_type,$committe_mo_no,$committe_bdate,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO committe SET committe_name='" . $committe_name . "',committe_image='" . $newfilename . "',committe_vord_no='" . $committe_vord_no . "',committe_type='" . $committe_type . "',committe_mo_no='" . $committe_mo_no . "',committe_bdate='" . $committe_bdate . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
	
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addminister($minister_name,$minister_category,$newfilename) {
    global $conn;
	
    $insert_query = "INSERT INTO minister SET minister_name='" . $minister_name . "',minister_no='" . $newfilename . "',minister_category='" . $minister_category . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addd_sarpanch($sarpanch_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO d_sarpanch SET d_sarpanch_name='" . $sarpanch_name . "',d_sarpanch_image='" . $newfilename . "',d_sarpanch_email='" . $email_id . "',d_sarpanch_no='" . $mobile_no . "',d_sarpanch_fb='" . $fb_id . "',d_sarpanch_insta='" . $insta_id . "',d_sarpanch_twitter='" . $twitter_id . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addtalati($talati_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO talati SET talati_name='" . $talati_name . "',talati_image='" . $newfilename . "',talati_email='" . $email_id . "',talati_no='" . $mobile_no . "',talati_fb='" . $fb_id . "',talati_insta='" . $insta_id . "',talati_twitter='" . $twitter_id . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}
function addgram_sevak($gram_sevak_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename) {
    global $conn;
    $insert_query = "INSERT INTO gram_sevak SET gram_sevak_name='" . $gram_sevak_name . "',gram_sevak_image='" . $newfilename . "',gram_sevak_email='" . $email_id . "',gram_sevak_no='" . $mobile_no . "',gram_sevak_fb='" . $fb_id . "',gram_sevak_insta='" . $insta_id . "',gram_sevak_twitter='" . $twitter_id . "' ";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
	}
	return FALSE;
}

function getAllhistoryData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM history";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['history_id'];
            $temp[$i]['history_story'] = $row['history_story'];
            $i++;
        }
    }
    return $temp;
}
function getAllpublicData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM public_c";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['public_id'];
            $temp[$i]['public_name'] = $row['public_name'];
            $temp[$i]['public_bus'] = $row['public_bus'];
            $temp[$i]['public_bus_type'] = $row['public_bus_type'];
            $temp[$i]['public_gender'] = $row['public_gender'];
            $temp[$i]['public_blood_grp_name'] = $row['public_blood_grp_name'];
            $temp[$i]['public_vord_no'] = $row['public_vord_no'];
            $temp[$i]['public_mo_no'] = $row['public_mo_no'];
            $temp[$i]['public_bdate'] = $row['public_bdate'];
            
			$i++;
        }
    }
    return $temp;
}
function getAlldocumentData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM document";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['document_id'];
            $temp[$i]['document_name'] = $row['document_name'];
            $i++;
        }
    }
    return $temp;
}
function getAllyojnaData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM yojna";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['yojna_id'];
            $temp[$i]['yojna_name'] = $row['yojna_name'];
			$temp[$i]['yojna_link'] = $row['yojna_link'];
            $i++;
        }
    }
    return $temp;
}
function getAllvalidData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM valid_date";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['valid_date_id'];
            $temp[$i]['valid_start'] = $row['valid_start_date'];
			$temp[$i]['valid_end'] = $row['valid_end_date'];
            $i++;
        }
    }
    return $temp;
}
function getAllvikasData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM vikas_kam";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['vikas_id'];
            $temp[$i]['vikas_name'] = $row['vikas_name'];
			$temp[$i]['vikas_grant_amount'] = $row['vikas_grant_amount'];
			$temp[$i]['vikas_detail'] = $row['vikas_detail'];
			$temp[$i]['vikas_com_year'] = $row['vikas_com_year'];
            $i++;
        }
    }
    return $temp;
}
function getAllplaceData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM place";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['place_id'];
            $temp[$i]['place_detail'] = $row['place_detail'];
			$temp[$i]['place_name'] = $row['place_name'];
			$temp[$i]['place_date'] = $row['place_date'];
			$temp[$i]['tImage'] = $row['place_image'];
            $i++;
        }
    }
    return $temp;
}
function getAllactivityData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM activity";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['activity_id'];
            $temp[$i]['activity_detail'] = $row['activity_detail'];
			$temp[$i]['activity_name'] = $row['activity_name'];
			$temp[$i]['activity_date'] = $row['activity_date'];
			$temp[$i]['tImage'] = $row['activity_image'];
            $i++;
        }
    }
    return $temp;
}
function getAllcommitteData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM committe";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['committe_id'];
            $temp[$i]['committe_name'] = $row['committe_name'];
			$temp[$i]['committe_vord_no'] = $row['committe_vord_no'];
			$temp[$i]['committe_type'] = $row['committe_type'];
			$temp[$i]['committe_mo_no'] = $row['committe_mo_no'];
			$temp[$i]['committe_bdate'] = $row['committe_bdate'];
			$temp[$i]['tImage'] = $row['committe_image'];
            $i++;
        }
    }
    return $temp;
}
function getAllachievmentData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM achievment";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['achievment_id'];
            $temp[$i]['achievment_detail'] = $row['achievment_detail'];
			$temp[$i]['achievment_username'] = $row['achievment_username'];
			$temp[$i]['achievment_type'] = $row['achievment_type'];
			$temp[$i]['achievment_year'] = $row['achievment_year'];
			$temp[$i]['tImage'] = $row['achievment_image'];
            $i++;
        }
    }
    return $temp;
}

function getAllnewsData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM latest_news";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['news_id'];
            $temp[$i]['news_name'] = $row['news_name'];
            $i++;
        }
    }
    return $temp;
}
function getAllsarpanchData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM sarpanch";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['sarpanch_id'];
            $temp[$i]['sarpanch_name'] = $row['sarpanch_name'];
            $temp[$i]['sarpanch_fb'] = $row['sarpanch_fb'];
            $temp[$i]['sarpanch_insta'] = $row['sarpanch_insta'];
            $temp[$i]['sarpanch_email'] = $row['sarpanch_email'];
            $temp[$i]['sarpanch_no'] = $row['sarpanch_no'];
            $temp[$i]['tImage'] = $row['sarpanch_image'];
            $i++;
        }
    }
    return $temp;
}
function getAllministerData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM minister";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['minister_id'];
            $temp[$i]['minister_name'] = $row['minister_name'];
            $temp[$i]['minister_category'] = $row['minister_category'];
            $temp[$i]['tImage'] = $row['minister_image'];
            $i++;
        }
    }
    return $temp;
}

function getAllgram_sevakData() {
    global $conn;
	
    $temp = array();
    $select_query = "SELECT * FROM gram_sevak";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['gram_sevak_id'];
            $temp[$i]['sarpanch_name'] = $row['gram_sevak_name'];
            $temp[$i]['sarpanch_fb'] = $row['gram_sevak_fb'];
            $temp[$i]['sarpanch_insta'] = $row['gram_sevak_insta'];
            $temp[$i]['sarpanch_email'] = $row['gram_sevak_email'];
            $temp[$i]['sarpanch_no'] = $row['gram_sevak_no'];
            $temp[$i]['tImage'] = $row['gram_sevak_image'];
            $i++;
        }
    }
    return $temp;
}

function getAlltalatiData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM talati";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['talati_id'];
            $temp[$i]['sarpanch_name'] = $row['talati_name'];
            $temp[$i]['sarpanch_fb'] = $row['talati_fb'];
            $temp[$i]['sarpanch_insta'] = $row['talati_insta'];
            $temp[$i]['sarpanch_email'] = $row['talati_email'];
            $temp[$i]['sarpanch_no'] = $row['talati_no'];
            $temp[$i]['tImage'] = $row['talati_image'];
            $i++;
        }
    }
    return $temp;
}

function getAlld_sarpanchData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM d_sarpanch";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
			$temp[$i]['iCategoryID'] = $row['d_sarpanch_id'];
            $temp[$i]['sarpanch_name'] = $row['d_sarpanch_name'];
            $temp[$i]['sarpanch_fb'] = $row['d_sarpanch_fb'];
            $temp[$i]['sarpanch_insta'] = $row['d_sarpanch_insta'];
            $temp[$i]['sarpanch_email'] = $row['d_sarpanch_email'];
            $temp[$i]['sarpanch_no'] = $row['d_sarpanch_no'];
            $temp[$i]['tImage'] = $row['d_sarpanch_image'];
            $i++;
        }
    }
    return $temp;
}

function getAllcategoryData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM banner";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iCategoryID'] = $row['banner_id'];
            $temp[$i]['vCategoryName'] = $row['banner_name'];
            $temp[$i]['tImage'] = $row['banner_image'];
            $i++;
        }
    }
    return $temp;
}

function getCategoryDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM banner WHERE banner_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function gethistoryDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM history WHERE history_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getpublicDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM public_c WHERE public_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getyojnaDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM yojna WHERE yojna_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getvalidDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM valid_date WHERE valid_date_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function getvikasDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM vikas_kam WHERE vikas_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getdocumentDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM document WHERE document_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getnewsDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM latest_news WHERE news_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getgram_sevakDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM gram_sevak WHERE gram_sevak_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function getsarpanchDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM sarpanch WHERE sarpanch_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getactivityDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM activity WHERE activity_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getachievmentDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM achievment WHERE achievment_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getcommitteDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM committe WHERE committe_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function getplaceDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM place WHERE place_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function getministerDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM minister WHERE minister_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}
function gettalatiDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM talati WHERE talati_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function getd_sarpanchDataByID($cid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT * FROM d_sarpanch WHERE d_sarpanch_id = $cid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
		
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateCategory($iCategoryID, $vCategoryName, $newfilename) {
    global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT banner_image FROM banner WHERE banner_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['banner_image']);
        }
        $update_query = "UPDATE banner SET banner_name= '$vCategoryName', banner_image= '$newfilename' WHERE banner_id = $iCategoryID";
    } else {
        $update_query = "UPDATE banner SET banner_name= '$vCategoryName' WHERE banner_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatehistory($iCategoryID, $history_story) {
    global $conn;
    
    $update_query = "UPDATE history SET history_story= '$history_story' WHERE history_id = $iCategoryID";

    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatepublic($iCategoryID,$public_name,$public_bus,$public_bus_type,$public_gender,$public_blood_grp_name,$public_vord_no,$public_mo_no,$public_bdate) {
    global $conn;
    
    $update_query = "UPDATE public_c SET public_name= '$public_name',public_bus= '$public_bus',public_bus_type= '$public_bus_type',public_gender= '$public_gender',public_blood_grp_name= '$public_blood_grp_name',public_vord_no= '$public_vord_no',public_mo_no= '$public_mo_no',public_bdate= '$public_bdate' WHERE public_id = $iCategoryID";

    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatedocument($iCategoryID,$document) {
    global $conn;
    
    $update_query = "UPDATE document SET document_name= '$document' WHERE document_id = $iCategoryID";

    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatevalid($iCategoryID,$valid_start_date,$valid_end_date){
    global $conn;
    
    $update_query = "UPDATE valid_date SET valid_start_date= '$valid_start_date',valid_end_date= '$valid_end_date' WHERE valid_date_id = $iCategoryID";

    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatevikas($iCategoryID,$vikas_name,$vikas_grant_amount,$vikas_detail,$vikas_com_year){
    global $conn;
    
    $update_query = "UPDATE vikas_kam SET vikas_name= '$vikas_name',vikas_grant_amount= '$vikas_grant_amount',vikas_detail= '$vikas_detail',vikas_com_year= '$vikas_com_year' WHERE vikas_id = $iCategoryID";

    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function updateyojna($iCategoryID,$yojna_name,$yojna_link){
    global $conn;
    
    $update_query = "UPDATE yojna SET yojna_name= '$yojna_name',yojna_link= '$yojna_link' WHERE yojna_id = $iCategoryID";

    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatenews($iCategoryID, $news_name) {
    global $conn;
    
    $update_query = "UPDATE latest_news SET news_name= '$news_name' WHERE news_id = $iCategoryID";

    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatesarpanch($iCategoryID,$sarpanch_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT sarpanch_image FROM sarpanch WHERE sarpanch_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['sarpanch_image']);
        }
        $update_query = "UPDATE sarpanch SET sarpanch_name= '$sarpanch_name', sarpanch_image= '$newfilename',sarpanch_fb= '$fb_id',sarpanch_insta= '$insta_id',sarpanch_twitter= '$twitter_id',sarpanch_no= '$mobile_no',sarpanch_email= '$email_id' WHERE sarpanch_id = $iCategoryID";
    } else {
        $update_query = "UPDATE sarpanch SET sarpanch_name= '$sarpanch_name',sarpanch_fb= '$fb_id',sarpanch_insta= '$insta_id',sarpanch_twitter= '$twitter_id',sarpanch_no= '$mobile_no',sarpanch_email= '$email_id' WHERE sarpanch_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updateplace($iCategoryID,$place_name,$place_detail,$place_date,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT place_image FROM place WHERE place_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['place_image']);
        }
        $update_query = "UPDATE place SET place_name= '$place_name', place_image= '$newfilename',place_detail= '$place_detail',place_date= '$place_date' WHERE place_id = $iCategoryID";
    } else {
        $update_query = "UPDATE place SET place_name= '$place_name',place_detail= '$place_detail',place_date= '$place_date' WHERE place_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updateactivity($iCategoryID,$activity_name,$activity_detail,$activity_date,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT activity_image FROM activity WHERE activity_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['activity_image']);
        }
        $update_query = "UPDATE activity SET activity_name= '$activity_name', activity_image= '$newfilename',activity_detail= '$activity_detail',activity_date= '$activity_date' WHERE activity_id = $iCategoryID";
    } else {
        $update_query = "UPDATE activity SET activity_name= '$activity_name',activity_detail= '$activity_detail',activity_date= '$activity_date' WHERE activity_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updateachievment($iCategoryID,$achievment_username,$achievment_detail,$achievment_type,$achievment_year,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT achievment_image FROM achievment WHERE achievment_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['achievment_image']);
        }
        $update_query = "UPDATE achievment SET achievment_username= '$achievment_username', achievment_image= '$newfilename',achievment_detail= '$achievment_detail',achievment_type= '$achievment_type',achievment_year= '$achievment_year' WHERE achievment_id = $iCategoryID";
    } else {
        $update_query = "UPDATE achievment SET achievment_username= '$achievment_username',achievment_detail= '$achievment_detail',achievment_type= '$achievment_type',achievment_year= '$achievment_year' WHERE achievment_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updatecommitte($iCategoryID,$committe_name,$committe_vord_no,$committe_type,$committe_mo_no,$committe_bdate,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT committe_image FROM committe WHERE committe_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['achievment_image']);
        }
        $update_query = "UPDATE committe SET committe_name= '$committe_name', committe_image= '$newfilename',committe_vord_no= '$committe_vord_no',committe_type= '$committe_type',committe_mo_no= '$committe_mo_no',committe_bdate= '$committe_bdate' WHERE committe_id = $iCategoryID";
    } else {
        $update_query = "UPDATE committe SET committe_name= '$committe_name',committe_vord_no= '$committe_vord_no',committe_type= '$committe_type',committe_mo_no= '$committe_mo_no',committe_bdate= '$committe_bdate' WHERE committe_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updateminister($iCategoryID,$minister_name,$minister_category,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT minister_image FROM minister WHERE minister_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['minister_image']);
        }
        $update_query = "UPDATE minister SET minister_name= '$minister_name', minister_image= '$newfilename',minister_category= '$minister_category' WHERE minister_id = $iCategoryID";
    } else {
        $update_query = "UPDATE minister SET minister_name= '$minister_name',minister_category= '$minister_category' WHERE minister_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function updatetalati($iCategoryID,$talati_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT talati_image FROM talati WHERE talati_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['talati_image']);
        }
        $update_query = "UPDATE talati SET talati_name= '$talati_name', talati_image= '$newfilename',talati_fb= '$fb_id',talati_insta= '$insta_id',talati_twitter= '$twitter_id',talati_no= '$mobile_no',talati_email= '$email_id' WHERE talati_id = $iCategoryID";
    } else {
        $update_query = "UPDATE talati SET talati_name= '$talati_name',talati_fb= '$fb_id',talati_insta= '$insta_id',talati_twitter= '$twitter_id',talati_no= '$mobile_no',talati_email= '$email_id' WHERE talati_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updategram_sevak($iCategoryID,$gram_sevak_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT gram_sevak_image FROM gram_sevak WHERE gram_sevak_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['talati_image']);
        }
        $update_query = "UPDATE gram_sevak SET gram_sevak_name= '$gram_sevak_name', gram_sevak_image= '$newfilename',gram_sevak_fb= '$fb_id',gram_sevak_insta= '$insta_id',gram_sevak_twitter= '$twitter_id',gram_sevak_no= '$mobile_no',gram_sevak_email= '$email_id' WHERE gram_sevak_id = $iCategoryID";
    } else {
        $update_query = "UPDATE gram_sevak SET gram_sevak_name= '$gram_sevak_name',gram_sevak_fb= '$fb_id',gram_sevak_insta= '$insta_id',gram_sevak_twitter= '$twitter_id',gram_sevak_no= '$mobile_no',gram_sevak_email= '$email_id' WHERE gram_sevak_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function updated_sarpanch($iCategoryID,$sarpanch_name,$mobile_no,$fb_id,$email_id,$insta_id,$twitter_id,$newfilename){
	global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT d_sarpanch_image FROM d_sarpanch WHERE d_sarpanch_id = $iCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($CATEGORY_IMAGE_PATH . $row['d_sarpanch_image']);
        }
        $update_query = "UPDATE d_sarpanch SET d_sarpanch_name= '$sarpanch_name', d_sarpanch_image= '$newfilename',d_sarpanch_fb= '$fb_id',d_sarpanch_insta= '$insta_id',d_sarpanch_twitter= '$twitter_id',d_sarpanch_no= '$mobile_no',d_sarpanch_email= '$email_id' WHERE d_sarpanch_id = $iCategoryID";
    } else {
        $update_query = "UPDATE d_sarpanch SET d_sarpanch_name= '$sarpanch_name',d_sarpanch_fb= '$fb_id',d_sarpanch_insta= '$insta_id',d_sarpanch_twitter= '$twitter_id',d_sarpanch_no= '$mobile_no',d_sarpanch_email= '$email_id' WHERE d_sarpanch_id = $iCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}
function addSubCategory($iCategoryID, $vSubCategoryName, $newfilename, $tSubCatDetail) {    
    global $conn;
    $tContentdata = addslashes($tSubCatDetail); 
    $insert_query = "INSERT INTO tbl_subcategory SET iCategoryID='" . $iCategoryID . "', vSubCategoryName='" . $vSubCategoryName . "',tImage='" . $newfilename . "',tSubCatDetail = '".$tContentdata."', dCreateDate=NOW()";
    $insert_res = mysqli_query($conn, $insert_query);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;
}

function getAllsubcategoryData() {
    global $conn;
    $temp = array();
    $select_query = "SELECT sc.*, c.vCategoryName FROM tbl_subcategory as sc JOIN tbl_category as c ON c.iCategoryID = sc.iCategoryID WHERE sc.eDelete='0' AND c.eDelete='0'  ORDER BY sc.iSubCategoryID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iCategoryID'] = $row['iCategoryID'];
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vCategoryName'] = $row['vCategoryName'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];
            $temp[$i]['tImage'] = $row['tImage'];
            $temp[$i]['tSubCatDetail'] = $row['tSubCatDetail'];
            $i++;
        }
    }
    return $temp;
}

function getSubcategoryDataByID($scid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT sc.*, c.vCategoryName FROM tbl_subcategory as sc JOIN tbl_category as c ON c.iCategoryID = sc.iCategoryID WHERE sc.eDelete='0' AND c.eDelete='0' AND sc.iSubCategoryID = $scid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateSubCategory($iSubCategoryID, $iCategoryID, $vSubCategoryName, $newfilename, $tSubCatDetail) {
    $tContentdata = addslashes($tSubCatDetail); 
    global $conn;
    if (isset($newfilename) && $newfilename != "") {
        require '../config/constant.php';
        $query = "SELECT tImage FROM tbl_subcategory WHERE iSubCategoryID = $iSubCategoryID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($SUBCATEGORY_IMAGE_PATH . $row['tImage']);
        }
        $update_query = "UPDATE tbl_subcategory SET vSubCategoryName= '$vSubCategoryName',iCategoryID='$iCategoryID',tImage= '$newfilename', tSubCatDetail='$tContentdata' WHERE iSubCategoryID = $iSubCategoryID";
    } else {
        $update_query = "UPDATE tbl_subcategory SET vSubCategoryName= '$vSubCategoryName',iCategoryID='$iCategoryID', tSubCatDetail='$tContentdata' WHERE iSubCategoryID = $iSubCategoryID";
    }
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function addSubCategoryData($tImage, $tContent,$iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tContent);      
    $insert_q = "INSERT INTO tbl_subcategory_detail SET tContent='" . $tContentdata . "',tImage='" . $tImage . "', iSubCategoryID='".$iSubCategoryID."', dCreateDate=NOW()";
    
    $insert_r = mysqli_query($conn, $insert_q);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;    
}

function getAllSubcategoryDataList() {
    global $conn;
    $temp = array();
    $select_query = "SELECT *FROM tbl_subcategory WHERE eDelete='0' ORDER BY iSubCategoryID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];            
            $i++;
        }
    }
    return $temp;
}

function getSubcategoryDataList() {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_subcategory_detail as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sc.eDelete='0'  ORDER BY sd.iSubCategoryDetailID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iSubCategoryDetailID'] = $row['iSubCategoryDetailID'];
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];
            $temp[$i]['tContent'] = $row['tContent'];
            $temp[$i]['tImage'] = $row['tImage'];
            $i++;
        }
    }
    return $temp;
}

function getSubcategoryDetailByID($sdid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_subcategory_detail as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sd.iSubCategoryDetailID = $sdid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateSubCategoryData($iSubCategoryDetailID, $tImage, $tContent,$iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tContent); 
    if (isset($tImage) && $tImage != "") {        
        require '../config/constant.php';
        $query = "SELECT tImage FROM tbl_subcategory_detail WHERE iSubCategoryDetailID = $iSubCategoryDetailID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($SUBCATEGORY_DATA_IMAGE_PATH . $row['tImage']);
        }
        $update_query = "UPDATE tbl_subcategory_detail SET iSubCategoryID= '$iSubCategoryID',tContent='$tContentdata',tImage= '$tImage' WHERE iSubCategoryDetailID = $iSubCategoryDetailID";
    } else {
        $update_query = "UPDATE tbl_subcategory_detail SET iSubCategoryID= '$iSubCategoryID',tContent='$tContentdata' WHERE iSubCategoryDetailID = $iSubCategoryDetailID";
    }
    
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

function addSliderData($tImage, $tDetail, $iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tDetail);      
    $insert_q = "INSERT INTO tbl_slider_data SET tDetail='" . $tContentdata . "',tImage='" . $tImage . "', iSubCategoryID='".$iSubCategoryID."', dCreateDate=NOW()";
    
    $insert_r = mysqli_query($conn, $insert_q);
    if (mysqli_insert_id($conn)) {
        return TRUE;
    }
    return FALSE;    
}

function getSliderDataList() {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_slider_data as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sc.eDelete='0'  ORDER BY sd.iSliderID DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
            $temp[$i]['iSliderID'] = $row['iSliderID'];
            $temp[$i]['iSubCategoryID'] = $row['iSubCategoryID'];
            $temp[$i]['vSubCategoryName'] = $row['vSubCategoryName'];
            $temp[$i]['tDetail'] = $row['tDetail'];
            $temp[$i]['tImage'] = $row['tImage'];
            $i++;
        }
    }
    return $temp;
}

function getSliderDetailByID($sdid) {
    global $conn;
    $temp = array();
    $select_query = "SELECT sd.*, sc.vSubCategoryName FROM  tbl_slider_data as sd JOIN tbl_subcategory as sc ON sc.iSubCategoryID = sd.iSubCategoryID WHERE sd.eDelete='0' AND sc.eDelete='0' AND sd.iSliderID = $sdid";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        return mysqli_fetch_array($select_res);
    } else {
        return $temp;
    }
}

function updateSliderData($iSliderID, $tImage, $tDetail, $iSubCategoryID) {
    global $conn;
    $tContentdata = addslashes($tDetail); 
    if (isset($tImage) && $tImage != "") {        
        require '../config/constant.php';
        $query = "SELECT tImage FROM tbl_slider_data WHERE iSliderID = $iSliderID";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_array($res);
            unlink($SUBCATEGORY_DATA_IMAGE_PATH . $row['tImage']);
        }
        $update_query = "UPDATE tbl_slider_data SET iSubCategoryID= '$iSubCategoryID',tDetail='$tContentdata',tImage= '$tImage' WHERE iSliderID = $iSliderID";
    } else {
        $update_query = "UPDATE tbl_slider_data SET iSubCategoryID= '$iSubCategoryID',tDetail='$tContentdata' WHERE iSliderID = $iSliderID";
    }
    
    $update_res = mysqli_query($conn, $update_query);
    if ($update_res) {
        return 1;
    }
    return 0;
}

// Regular Cleaning Service

//function getAllregularCleaningData() {
//    global $conn;
//    $temp = array();
//    $select_query = "SELECT rc.*, u.vName, FROM tbl_contact";
//    $select_res = mysqli_query($conn, $select_query);
//    if (mysqli_num_rows($select_res) > 0) {
//        $i = 0;
//        while ($row = mysqli_fetch_assoc($select_res)) {
//            $temp[$i]['iContactID'] = $row['iContactID'];
//            $temp[$i]['vName'] = $row['vName'];
//            $temp[$i]['vEmail'] = $row['vEmail'];
//            $temp[$i]['vPhone'] = $row['vPhone'];
//            $temp[$i]['vCallTime'] = $row['vCallTime'];
//            $temp[$i]['eContactWay'] = $row['eContactWay'];
//            $temp[$i]['vReasonForContact'] = $row['vReasonForContact'];
//            $temp[$i]['eEnquiryType'] = $row['eEnquiryType'];
//            $temp[$i]['vServiceType'] = $row['vServiceType'];
//            $temp[$i]['vSubServiceType'] = $row['vSubServiceType'];
//            $temp[$i]['vPostcode'] = $row['vPostcode'];
//            $temp[$i]['vPromocode'] = $row['vPromocode'];
//            $temp[$i]['tNote'] = $row['tNote'];
//            $i++;
//        }
//    }
//    return $temp;
//}
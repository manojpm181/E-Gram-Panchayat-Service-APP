CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);
  
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
 
CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(30) NOT NULL,
  `banner_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `sarpanch` (
  `sarpanch_id` int(11) NOT NULL,
  `sarpanch_name` varchar(100) NOT NULL,
  `sarpanch_email` varchar(50) NOT NULL,
  `sarpanch_no` varchar(100) NOT NULL,
  `sarpanch_image` varchar(100) NOT NULL,
  `sarpanch_fb` varchar(100) NOT NULL,
  `sarpanch_insta` varchar(100) NOT NULL,
  `sarpanch_twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `sarpanch`
  ADD PRIMARY KEY (`sarpanch_id`);

ALTER TABLE `sarpanch`
  MODIFY `sarpanch_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `d_sarpanch` (
  `d_sarpanch_id` int(11) NOT NULL,
  `d_sarpanch_name` varchar(100) NOT NULL,
  `d_sarpanch_email` varchar(50) NOT NULL,
  `d_sarpanch_no` varchar(100) NOT NULL,
  `d_sarpanch_image` varchar(100) NOT NULL,
  `d_sarpanch_fb` varchar(100) NOT NULL,
  `d_sarpanch_insta` varchar(100) NOT NULL,
  `d_sarpanch_twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `d_sarpanch`
  ADD PRIMARY KEY (`d_sarpanch_id`);

ALTER TABLE `d_sarpanch`
  MODIFY `d_sarpanch_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `talati` (
  `talati_id` int(11) NOT NULL,
  `talati_name` varchar(100) NOT NULL,
  `talati_email` varchar(50) NOT NULL,
  `talati_no` varchar(100) NOT NULL,
  `talati_image` varchar(100) NOT NULL,
  `talati_fb` varchar(100) NOT NULL,
  `talati_insta` varchar(100) NOT NULL,
  `talati_twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `talati`
  ADD PRIMARY KEY (`talati_id`);

ALTER TABLE `talati`
  MODIFY `talati_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `gram_sevak` (
  `gram_sevak_id` int(11) NOT NULL,
  `gram_sevak_name` varchar(100) NOT NULL,
  `gram_sevak_email` varchar(50) NOT NULL,
  `gram_sevak_no` varchar(100) NOT NULL,
  `gram_sevak_image` varchar(100) NOT NULL,
  `gram_sevak_fb` varchar(100) NOT NULL,
  `gram_sevak_insta` varchar(100) NOT NULL,
  `gram_sevak_twitter` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `gram_sevak`
  ADD PRIMARY KEY (`gram_sevak_id`);

ALTER TABLE `gram_sevak`
  MODIFY `gram_sevak_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `history_story` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `minister` (
  `minister_id` int(11) NOT NULL,
  `minister_name` varchar(100) NOT NULL,
  `minister_category` varchar(50) NOT NULL,
  `minister_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `minister`
  ADD PRIMARY KEY (`minister_id`);

ALTER TABLE `minister`
  MODIFY `minister_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `latest_news` (
  `news_id` int(11) NOT NULL,
  `news_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`news_id`);

ALTER TABLE `latest_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `place_detail` varchar(1000) NOT NULL,
  `place_image` varchar(100) NOT NULL,
  `place_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

ALTER TABLE `place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(100) NOT NULL,
  `activity_detail` varchar(1000) NOT NULL,
  `activity_image` varchar(100) NOT NULL,
  `activity_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `achievment` (
  `achievment_id` int(11) NOT NULL,
  `achievment_username` varchar(100) NOT NULL,
  `achievment_type` varchar(30) NOT NULL,
  `achievment_detail` varchar(1000) NOT NULL,
  `achievment_image` varchar(100) NOT NULL,
  `achievment_year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `achievment`
  ADD PRIMARY KEY (`achievment_id`);

ALTER TABLE `achievment`
  MODIFY `achievment_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `committe` (
  `committe_id` int(11) NOT NULL,
  `committe_name` varchar(100) NOT NULL,
  `committe_type` varchar(30) NOT NULL,
  `committe_vord_no` varchar(100) NOT NULL,
  `committe_mo_no` varchar(100) NOT NULL,
  `committe_image` varchar(100) NOT NULL,
  `committe_bdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `committe`
  ADD PRIMARY KEY (`committe_id`);

ALTER TABLE `committe`
  MODIFY `committe_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `document_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `yojna` (
  `yojna_id` int(11) NOT NULL,
  `yojna_name` varchar(100) NOT NULL,
  `yojna_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `yojna`
  ADD PRIMARY KEY (`yojna_id`);

ALTER TABLE `yojna`
  MODIFY `yojna_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `valid_date` (
  `valid_date_id` int(11) NOT NULL,
  `valid_start_date` date NOT NULL,
  `valid_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `valid_date`
  ADD PRIMARY KEY (`valid_date_id`);

ALTER TABLE `valid_date`
  MODIFY `valid_date_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `vikas_kam` (
  `vikas_id` int(11) NOT NULL,
  `vikas_name` varchar(100) NOT NULL,
  `vikas_grant_amount` int(11) NOT NULL,
  `vikas_detail` varchar(1000) NOT NULL,
  `vikas_com_year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `vikas_kam`
  ADD PRIMARY KEY (`vikas_id`);

ALTER TABLE `vikas_kam`
  MODIFY `vikas_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `public_c` (
  `public_id` int(11) NOT NULL,
  `public_blood_grp_name` varchar(1001) NOT NULL,
  `public_name` varchar(100) NOT NULL,
  `public_bus` varchar(100) NOT NULL,
  `public_gender` varchar(30) NOT NULL,
  `public_bus_type` varchar(100) NOT NULL,
  `public_vord_no` int(11) NOT NULL,
  `public_mo_no` varchar(100) NOT NULL,
  `public_bdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `public_c`
  ADD PRIMARY KEY (`public_id`);

ALTER TABLE `public_c`
  MODIFY `public_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `vord` (
  `vord_id` int(11) NOT NULL,
  `vord_no` int(11) NOT NULL,
  `vord_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `vord`
  ADD PRIMARY KEY (`vord_id`);

ALTER TABLE `vord`
  MODIFY `vord_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `blood_group` (
  `blood_grp_id` int(11) NOT NULL,
  `blood_grp_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`blood_grp_id`);

ALTER TABLE `blood_group`
  MODIFY `blood_grp_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_name` varchar(100) NOT NULL,
  `feedback_village` varchar(100) NOT NULL,
  `feedback_message` varchar(1000) NOT NULL,
  `feedback_mo_no` varchar(100) NOT NULL,
  `feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_subject` varchar(100) NOT NULL,
  `contact_message` varchar(1000) NOT NULL,
  `contact_mo_no` varchar(100) NOT NULL,
  `contact_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `donation` (
  `donation_id` int(11) NOT NULL,
  `donation_bank_name` varchar(30) NOT NULL,
  `donation_bank_A/C_no` int(15) NOT NULL,
  `donation_bank_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`);

ALTER TABLE `donation`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `gov_web` (
  `gov_web_id` int(11) NOT NULL,
  `gov_web_name` varchar(30) NOT NULL,
  `gov_web_link` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `gov_web`
  ADD PRIMARY KEY (`gov_web_id`);

ALTER TABLE `gov_web`
  MODIFY `gov_web_id` int(11) NOT NULL AUTO_INCREMENT;
  
CREATE TABLE `suvidha_number` (
  `suvidha_id` int(11) NOT NULL,
  `suvidha_name` varchar(30) NOT NULL,
  `suvidha_number` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `suvidha_number`
  ADD PRIMARY KEY (`suvidha_id`);

ALTER TABLE `suvidha_number`
  MODIFY `suvidha_id` int(11) NOT NULL AUTO_INCREMENT;  
<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CfApplicantMember Entity
 *
 * @property string $id
 * @property int $vaccancy_id
 * @property string $vaccancy_group
 * @property string|null $work_skill
 * @property string|null $post_name
 * @property string|null $district_priority_by_post
 * @property string $name
 * @property string|null $name_hn
 * @property string|null $fathername
 * @property string|null $fathername_hn
 * @property string|null $permanent_state
 * @property string|null $permanent_district
 * @property int|null $permanent_pincode
 * @property string|null $permanent_address
 * @property string|null $temporary_state
 * @property string|null $temporary_district
 * @property int|null $temporary_pincode
 * @property string|null $temporary_address
 * @property string $email
 * @property string $mobile
 * @property \Cake\I18n\FrozenDate $dob
 * @property int|null $age
 * @property string $gender
 * @property string|null $catagory
 * @property string|null $university_name
 * @property int|null $passing_year
 * @property int|null $graduation_total_marks
 * @property int|null $graduation_obtain_marks
 * @property float|null $graduation_percentage
 * @property int|null $master_degree
 * @property string|null $master_degree_total_marks
 * @property string|null $master_degree_obtain_marks
 * @property string|null $master_degree_percentage
 * @property int|null $phd_degree
 * @property string|null $phd_degree_total_marks
 * @property string|null $phd_degree_obtain_marks
 * @property string|null $phd_degree_percentage
 * @property int|null $retired_status
 * @property int|null $consumer_forum_experience
 * @property string|null $consumer_forum_address
 * @property float|null $consumer_forum_duration
 * @property int|null $experience
 * @property string|null $experience_duration_month
 * @property int|null $experience_1
 * @property int|null $experience_2
 * @property int|null $experience_3
 * @property int|null $experience_4
 * @property int|null $experience_5
 * @property string|null $experience_1_duration
 * @property string|null $experience_2_duration
 * @property string|null $experience_3_duration
 * @property string|null $experience_4_duration
 * @property string|null $experience_5_duration
 * @property int|null $exp_duration_10yrs
 * @property string|null $experience_in_months
 * @property int|null $pds_st_dist_work
 * @property string|null $pds_st_dist_work_address
 * @property string|null $pds_st_dist_work_duration
 * @property int|null $exp_duration_15yrs
 * @property int|null $exp_duration_15yrs_months
 * @property int|null $exp_duration_20yrs
 * @property int|null $exp_duration_20yrs_months
 * @property string|null $posting_districts
 * @property string|null $district_priority_first
 * @property string|null $district_priority_second
 * @property string|null $district_priority_third
 * @property int|null $declaration_1
 * @property int|null $declaration_2
 * @property int|null $declaration_3
 * @property int|null $declaration_4
 * @property int|null $declaration_5
 * @property int|null $declaration_6
 * @property int|null $other_exp
 * @property string|null $other_exp_details
 * @property string|null $other_exp_off_address
 * @property int|null $high_court_judge
 * @property string|null $high_court_name
 * @property int|null $high_court_exp
 * @property int|null $age_proof_flag
 * @property int|null $graduation_proof_flag
 * @property int|null $graduation_marks_proof_flag
 * @property int|null $master_certificate_flag
 * @property int|null $phd_certificate_flag
 * @property int|null $experience_flag
 * @property int|null $profile_flag
 * @property int|null $signature_flag
 * @property int|null $status
 * @property int|null $form_verification
 * @property int|null $document_verification
 * @property int|null $marks_verification
 * @property string|null $marks_reject_remarks
 * @property string|null $remarks
 * @property \Cake\I18n\FrozenDate|null $date
 * @property string|null $place
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int|null $flag
 * @property int|null $step_no
 * @property string|null $registration_no
 * @property int|null $registration_sl_no
 * @property \Cake\I18n\FrozenTime|null $submited_date
 *
 * @property \App\Model\Entity\Vaccancy $vaccancy
 */
class CfApplicantMember extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'vaccancy_id' => true,
        'vaccancy_group' => true,
        'work_skill' => true,
        'post_name' => true,
        'district_priority_by_post' => true,
        'name' => true,
        'name_hn' => true,
        'fathername' => true,
        'fathername_hn' => true,
        'permanent_state' => true,
        'permanent_district' => true,
        'permanent_pincode' => true,
        'permanent_address' => true,
        'temporary_state' => true,
        'temporary_district' => true,
        'temporary_pincode' => true,
        'temporary_address' => true,
        'email' => true,
        'mobile' => true,
        'dob' => true,
        'age' => true,
        'gender' => true,
        'catagory' => true,
        'university_name' => true,
        'passing_year' => true,
        'graduation_total_marks' => true,
        'graduation_obtain_marks' => true,
        'graduation_percentage' => true,
        'master_degree' => true,
        'master_degree_total_marks' => true,
        'master_degree_obtain_marks' => true,
        'master_degree_percentage' => true,
        'phd_degree' => true,
        'phd_degree_total_marks' => true,
        'phd_degree_obtain_marks' => true,
        'phd_degree_percentage' => true,
        'retired_status' => true,
        'consumer_forum_experience' => true,
        'consumer_forum_address' => true,
        'consumer_forum_duration' => true,
        'experience' => true,
        'experience_duration_month' => true,
        'experience_1' => true,
        'experience_2' => true,
        'experience_3' => true,
        'experience_4' => true,
        'experience_5' => true,
        'experience_1_duration' => true,
        'experience_2_duration' => true,
        'experience_3_duration' => true,
        'experience_4_duration' => true,
        'experience_5_duration' => true,
        'exp_duration_10yrs' => true,
        'experience_in_months' => true,
        'pds_st_dist_work' => true,
        'pds_st_dist_work_address' => true,
        'pds_st_dist_work_duration' => true,
        'exp_duration_15yrs' => true,
        'exp_duration_15yrs_months' => true,
        'exp_duration_20yrs' => true,
        'exp_duration_20yrs_months' => true,
        'posting_districts' => true,
        'district_priority_first' => true,
        'district_priority_second' => true,
        'district_priority_third' => true,
        'declaration_1' => true,
        'declaration_2' => true,
        'declaration_3' => true,
        'declaration_4' => true,
        'declaration_5' => true,
        'declaration_6' => true,
        'other_exp' => true,
        'other_exp_details' => true,
        'other_exp_off_address' => true,
        'high_court_judge' => true,
        'high_court_name' => true,
        'high_court_exp' => true,
        'age_proof_flag' => true,
        'graduation_proof_flag' => true,
        'graduation_marks_proof_flag' => true,
        'master_certificate_flag' => true,
        'phd_certificate_flag' => true,
        'experience_flag' => true,
        'profile_flag' => true,
        'signature_flag' => true,
        'status' => true,
        'form_verification' => true,
        'document_verification' => true,
        'marks_verification' => true,
        'marks_reject_remarks' => true,
        'remarks' => true,
        'date' => true,
        'place' => true,
        'created' => true,
        'flag' => true,
        'step_no' => true,
        'registration_no' => true,
        'registration_sl_no' => true,
        'submited_date' => true,
        'vaccancy' => true,
    ];
}

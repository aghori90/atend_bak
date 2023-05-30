<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $l_name
 * @property string $f_name
 * @property string $address
 * @property string $c_no
 * @property string $email
 * @property string $desig
 * @property string $password
 * @property int|null $role_id
 * @property int|null $dso_master_id
 * @property int|null $sdo_master_id
 * @property int|null $bso_master_id
 * @property int|null $mo_master_id
 * @property int|null $depot_master_id
 * @property int|null $dmsfc_master_id
 * @property int|null $dso_sdo_bso_moID
 * @property int $group_id
 * @property int $district_id
 * @property int|null $block_city_id
 * @property string|null $rgi_district_code
 * @property string|null $rgi_block_code
 * @property int|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $password_old
 * @property int|null $loginFlag
 * @property \Cake\I18n\FrozenTime|null $lastLoginTime
 * @property int|null $loginStatus
 * @property string|null $passwordChangeFlag
 * @property string|null $passwordChangeDate
 * @property string|null $districtName
 * @property string|null $blockName
 * @property string|null $mobile_no
 * @property int|null $created_by
 * @property int|null $modified_by
 * @property int|null $sub_division_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\DsoMaster $dso_master
 * @property \App\Model\Entity\SdoMaster $sdo_master
 * @property \App\Model\Entity\BsoMaster $bso_master
 * @property \App\Model\Entity\MoMaster $mo_master
 * @property \App\Model\Entity\DepotMaster $depot_master
 * @property \App\Model\Entity\DmsfcMaster $dmsfc_master
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\District $district
 * @property \App\Model\Entity\BlockCity $block_city
 * @property \App\Model\Entity\SubDivision $sub_division
 * @property \App\Model\Entity\DealerDoc[] $dealer_docs
 * @property \App\Model\Entity\DsoActivityOtp[] $dso_activity_otps
 * @property \App\Model\Entity\ErcmsLog[] $ercms_logs
 * @property \App\Model\Entity\JsfssErcmsLog[] $jsfss_ercms_logs
 * @property \App\Model\Entity\Log[] $logs
 * @property \App\Model\Entity\PmgkayUserLogBackup[] $pmgkay_user_log_backups
 * @property \App\Model\Entity\PmgkayUserLog[] $pmgkay_user_logs
 * @property \App\Model\Entity\SeccCardholderPfm[] $secc_cardholder_pfms
 * @property \App\Model\Entity\UserChangeLog[] $user_change_logs
 * @property \App\Model\Entity\UserLog[] $user_logs
 * @property \App\Model\Entity\UserLogsOld[] $user_logs_old
 * @property \App\Model\Entity\UserManagementLog[] $user_management_logs
 * @property \App\Model\Entity\WorkflowCheckBackup[] $workflow_check_backups
 * @property \App\Model\Entity\WorkflowCheck[] $workflow_checks
 */
class User extends Entity
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
        'username' => true,
        'l_name' => true,
        'f_name' => true,
        'email' => true,
        'desig' => true,
        'password' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'mobile_no' => true,
        'group' => true,

    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}

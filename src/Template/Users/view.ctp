<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dso Masters'), ['controller' => 'DsoMasters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dso Master'), ['controller' => 'DsoMasters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sdo Masters'), ['controller' => 'SdoMasters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sdo Master'), ['controller' => 'SdoMasters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bso Masters'), ['controller' => 'BsoMasters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bso Master'), ['controller' => 'BsoMasters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Mo Masters'), ['controller' => 'MoMasters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mo Master'), ['controller' => 'MoMasters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Depot Masters'), ['controller' => 'DepotMasters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Depot Master'), ['controller' => 'DepotMasters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dmsfc Masters'), ['controller' => 'DmsfcMasters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dmsfc Master'), ['controller' => 'DmsfcMasters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Districts'), ['controller' => 'Districts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New District'), ['controller' => 'Districts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Block Cities'), ['controller' => 'BlockCities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Block City'), ['controller' => 'BlockCities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Divisions'), ['controller' => 'SubDivisions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Division'), ['controller' => 'SubDivisions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dealer Docs'), ['controller' => 'DealerDocs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dealer Doc'), ['controller' => 'DealerDocs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Dso Activity Otps'), ['controller' => 'DsoActivityOtps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dso Activity Otp'), ['controller' => 'DsoActivityOtps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ercms Logs'), ['controller' => 'ErcmsLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ercms Log'), ['controller' => 'ErcmsLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jsfss Ercms Logs'), ['controller' => 'JsfssErcmsLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jsfss Ercms Log'), ['controller' => 'JsfssErcmsLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Logs'), ['controller' => 'Logs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Log'), ['controller' => 'Logs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pmgkay User Log Backups'), ['controller' => 'PmgkayUserLogBackups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pmgkay User Log Backup'), ['controller' => 'PmgkayUserLogBackups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pmgkay User Logs'), ['controller' => 'PmgkayUserLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pmgkay User Log'), ['controller' => 'PmgkayUserLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Secc Cardholder Pfms'), ['controller' => 'SeccCardholderPfms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Secc Cardholder Pfm'), ['controller' => 'SeccCardholderPfms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Change Logs'), ['controller' => 'UserChangeLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Change Log'), ['controller' => 'UserChangeLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Logs'), ['controller' => 'UserLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Log'), ['controller' => 'UserLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Logs Old'), ['controller' => 'UserLogsOld', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Logs Old'), ['controller' => 'UserLogsOld', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Management Logs'), ['controller' => 'UserManagementLogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Management Log'), ['controller' => 'UserManagementLogs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workflow Check Backups'), ['controller' => 'WorkflowCheckBackups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflow Check Backup'), ['controller' => 'WorkflowCheckBackups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workflow Checks'), ['controller' => 'WorkflowChecks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflow Check'), ['controller' => 'WorkflowChecks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('L Name') ?></th>
            <td><?= h($user->l_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('F Name') ?></th>
            <td><?= h($user->f_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($user->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('C No') ?></th>
            <td><?= h($user->c_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desig') ?></th>
            <td><?= h($user->desig) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dso Master') ?></th>
            <td><?= $user->has('dso_master') ? $this->Html->link($user->dso_master->id, ['controller' => 'DsoMasters', 'action' => 'view', $user->dso_master->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sdo Master') ?></th>
            <td><?= $user->has('sdo_master') ? $this->Html->link($user->sdo_master->id, ['controller' => 'SdoMasters', 'action' => 'view', $user->sdo_master->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bso Master') ?></th>
            <td><?= $user->has('bso_master') ? $this->Html->link($user->bso_master->id, ['controller' => 'BsoMasters', 'action' => 'view', $user->bso_master->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mo Master') ?></th>
            <td><?= $user->has('mo_master') ? $this->Html->link($user->mo_master->id, ['controller' => 'MoMasters', 'action' => 'view', $user->mo_master->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Depot Master') ?></th>
            <td><?= $user->has('depot_master') ? $this->Html->link($user->depot_master->name, ['controller' => 'DepotMasters', 'action' => 'view', $user->depot_master->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dmsfc Master') ?></th>
            <td><?= $user->has('dmsfc_master') ? $this->Html->link($user->dmsfc_master->id, ['controller' => 'DmsfcMasters', 'action' => 'view', $user->dmsfc_master->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('District') ?></th>
            <td><?= $user->has('district') ? $this->Html->link($user->district->name, ['controller' => 'Districts', 'action' => 'view', $user->district->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Block City') ?></th>
            <td><?= $user->has('block_city') ? $this->Html->link($user->block_city->name, ['controller' => 'BlockCities', 'action' => 'view', $user->block_city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rgi District Code') ?></th>
            <td><?= h($user->rgi_district_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rgi Block Code') ?></th>
            <td><?= h($user->rgi_block_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password Old') ?></th>
            <td><?= h($user->password_old) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PasswordChangeFlag') ?></th>
            <td><?= h($user->passwordChangeFlag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PasswordChangeDate') ?></th>
            <td><?= h($user->passwordChangeDate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DistrictName') ?></th>
            <td><?= h($user->districtName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BlockName') ?></th>
            <td><?= h($user->blockName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mobile No') ?></th>
            <td><?= h($user->mobile_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Division') ?></th>
            <td><?= $user->has('sub_division') ? $this->Html->link($user->sub_division->name, ['controller' => 'SubDivisions', 'action' => 'view', $user->sub_division->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dso Sdo Bso MoID') ?></th>
            <td><?= $this->Number->format($user->dso_sdo_bso_moID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($user->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LoginFlag') ?></th>
            <td><?= $this->Number->format($user->loginFlag) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LoginStatus') ?></th>
            <td><?= $this->Number->format($user->loginStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($user->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($user->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LastLoginTime') ?></th>
            <td><?= h($user->lastLoginTime) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Dealer Docs') ?></h4>
        <?php if (!empty($user->dealer_docs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Dealer Id') ?></th>
                <th scope="col"><?= __('Dealer Code') ?></th>
                <th scope="col"><?= __('Rgi District Code') ?></th>
                <th scope="col"><?= __('Rgi Block Code') ?></th>
                <th scope="col"><?= __('Rgi Village Code') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Document Path') ?></th>
                <th scope="col"><?= __('Document Master Id') ?></th>
                <th scope="col"><?= __('Is Member Document') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Modified By') ?></th>
                <th scope="col"><?= __('Document Type Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->dealer_docs as $dealerDocs): ?>
            <tr>
                <td><?= h($dealerDocs->id) ?></td>
                <td><?= h($dealerDocs->dealer_id) ?></td>
                <td><?= h($dealerDocs->dealer_code) ?></td>
                <td><?= h($dealerDocs->rgi_district_code) ?></td>
                <td><?= h($dealerDocs->rgi_block_code) ?></td>
                <td><?= h($dealerDocs->rgi_village_code) ?></td>
                <td><?= h($dealerDocs->name) ?></td>
                <td><?= h($dealerDocs->document_path) ?></td>
                <td><?= h($dealerDocs->document_master_id) ?></td>
                <td><?= h($dealerDocs->is_member_document) ?></td>
                <td><?= h($dealerDocs->user_id) ?></td>
                <td><?= h($dealerDocs->created_by) ?></td>
                <td><?= h($dealerDocs->modified) ?></td>
                <td><?= h($dealerDocs->modified_by) ?></td>
                <td><?= h($dealerDocs->document_type_id) ?></td>
                <td><?= h($dealerDocs->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DealerDocs', 'action' => 'view', $dealerDocs->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DealerDocs', 'action' => 'edit', $dealerDocs->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DealerDocs', 'action' => 'delete', $dealerDocs->], ['confirm' => __('Are you sure you want to delete # {0}?', $dealerDocs->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Dso Activity Otps') ?></h4>
        <?php if (!empty($user->dso_activity_otps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Activity Type Id') ?></th>
                <th scope="col"><?= __('Rgi District Code') ?></th>
                <th scope="col"><?= __('Otp') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->dso_activity_otps as $dsoActivityOtps): ?>
            <tr>
                <td><?= h($dsoActivityOtps->id) ?></td>
                <td><?= h($dsoActivityOtps->user_id) ?></td>
                <td><?= h($dsoActivityOtps->activity_type_id) ?></td>
                <td><?= h($dsoActivityOtps->rgi_district_code) ?></td>
                <td><?= h($dsoActivityOtps->otp) ?></td>
                <td><?= h($dsoActivityOtps->mobile) ?></td>
                <td><?= h($dsoActivityOtps->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'DsoActivityOtps', 'action' => 'view', $dsoActivityOtps->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'DsoActivityOtps', 'action' => 'edit', $dsoActivityOtps->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'DsoActivityOtps', 'action' => 'delete', $dsoActivityOtps->], ['confirm' => __('Are you sure you want to delete # {0}?', $dsoActivityOtps->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ercms Logs') ?></h4>
        <?php if (!empty($user->ercms_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Rgi District Code') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Rationcard No') ?></th>
                <th scope="col"><?= __('Secc Family Id') ?></th>
                <th scope="col"><?= __('Activity Type Id') ?></th>
                <th scope="col"><?= __('Activity Flag') ?></th>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('OldActivity') ?></th>
                <th scope="col"><?= __('NewActivity') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Flag') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->ercms_logs as $ercmsLogs): ?>
            <tr>
                <td><?= h($ercmsLogs->id) ?></td>
                <td><?= h($ercmsLogs->rgi_district_code) ?></td>
                <td><?= h($ercmsLogs->user_id) ?></td>
                <td><?= h($ercmsLogs->user_name) ?></td>
                <td><?= h($ercmsLogs->group_id) ?></td>
                <td><?= h($ercmsLogs->rationcard_no) ?></td>
                <td><?= h($ercmsLogs->secc_family_id) ?></td>
                <td><?= h($ercmsLogs->activity_type_id) ?></td>
                <td><?= h($ercmsLogs->activity_flag) ?></td>
                <td><?= h($ercmsLogs->label) ?></td>
                <td><?= h($ercmsLogs->oldActivity) ?></td>
                <td><?= h($ercmsLogs->newActivity) ?></td>
                <td><?= h($ercmsLogs->message) ?></td>
                <td><?= h($ercmsLogs->created) ?></td>
                <td><?= h($ercmsLogs->flag) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ErcmsLogs', 'action' => 'view', $ercmsLogs->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ErcmsLogs', 'action' => 'edit', $ercmsLogs->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ErcmsLogs', 'action' => 'delete', $ercmsLogs->], ['confirm' => __('Are you sure you want to delete # {0}?', $ercmsLogs->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Jsfss Ercms Logs') ?></h4>
        <?php if (!empty($user->jsfss_ercms_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Rgi District Code') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Rationcard No') ?></th>
                <th scope="col"><?= __('Secc Family Id') ?></th>
                <th scope="col"><?= __('Activity Type Id') ?></th>
                <th scope="col"><?= __('Activity Flag') ?></th>
                <th scope="col"><?= __('Label') ?></th>
                <th scope="col"><?= __('OldActivity') ?></th>
                <th scope="col"><?= __('NewActivity') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Flag') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->jsfss_ercms_logs as $jsfssErcmsLogs): ?>
            <tr>
                <td><?= h($jsfssErcmsLogs->id) ?></td>
                <td><?= h($jsfssErcmsLogs->rgi_district_code) ?></td>
                <td><?= h($jsfssErcmsLogs->user_id) ?></td>
                <td><?= h($jsfssErcmsLogs->user_name) ?></td>
                <td><?= h($jsfssErcmsLogs->group_id) ?></td>
                <td><?= h($jsfssErcmsLogs->rationcard_no) ?></td>
                <td><?= h($jsfssErcmsLogs->secc_family_id) ?></td>
                <td><?= h($jsfssErcmsLogs->activity_type_id) ?></td>
                <td><?= h($jsfssErcmsLogs->activity_flag) ?></td>
                <td><?= h($jsfssErcmsLogs->label) ?></td>
                <td><?= h($jsfssErcmsLogs->oldActivity) ?></td>
                <td><?= h($jsfssErcmsLogs->newActivity) ?></td>
                <td><?= h($jsfssErcmsLogs->message) ?></td>
                <td><?= h($jsfssErcmsLogs->created) ?></td>
                <td><?= h($jsfssErcmsLogs->flag) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JsfssErcmsLogs', 'action' => 'view', $jsfssErcmsLogs->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JsfssErcmsLogs', 'action' => 'edit', $jsfssErcmsLogs->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JsfssErcmsLogs', 'action' => 'delete', $jsfssErcmsLogs->], ['confirm' => __('Are you sure you want to delete # {0}?', $jsfssErcmsLogs->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Logs') ?></h4>
        <?php if (!empty($user->logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('District Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Activity') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->logs as $logs): ?>
            <tr>
                <td><?= h($logs->id) ?></td>
                <td><?= h($logs->district_id) ?></td>
                <td><?= h($logs->user_id) ?></td>
                <td><?= h($logs->group_id) ?></td>
                <td><?= h($logs->activity) ?></td>
                <td><?= h($logs->time) ?></td>
                <td><?= h($logs->message) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Logs', 'action' => 'view', $logs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Logs', 'action' => 'edit', $logs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Logs', 'action' => 'delete', $logs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pmgkay User Log Backups') ?></h4>
        <?php if (!empty($user->pmgkay_user_log_backups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Rgi District Code') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Failed Login Attempt') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('C No') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->pmgkay_user_log_backups as $pmgkayUserLogBackups): ?>
            <tr>
                <td><?= h($pmgkayUserLogBackups->id) ?></td>
                <td><?= h($pmgkayUserLogBackups->user_name) ?></td>
                <td><?= h($pmgkayUserLogBackups->user_id) ?></td>
                <td><?= h($pmgkayUserLogBackups->rgi_district_code) ?></td>
                <td><?= h($pmgkayUserLogBackups->group_id) ?></td>
                <td><?= h($pmgkayUserLogBackups->failed_login_attempt) ?></td>
                <td><?= h($pmgkayUserLogBackups->ip_address) ?></td>
                <td><?= h($pmgkayUserLogBackups->message) ?></td>
                <td><?= h($pmgkayUserLogBackups->c_no) ?></td>
                <td><?= h($pmgkayUserLogBackups->status) ?></td>
                <td><?= h($pmgkayUserLogBackups->time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PmgkayUserLogBackups', 'action' => 'view', $pmgkayUserLogBackups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PmgkayUserLogBackups', 'action' => 'edit', $pmgkayUserLogBackups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PmgkayUserLogBackups', 'action' => 'delete', $pmgkayUserLogBackups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmgkayUserLogBackups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Pmgkay User Logs') ?></h4>
        <?php if (!empty($user->pmgkay_user_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Rgi District Code') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Failed Login Attempt') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('C No') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->pmgkay_user_logs as $pmgkayUserLogs): ?>
            <tr>
                <td><?= h($pmgkayUserLogs->id) ?></td>
                <td><?= h($pmgkayUserLogs->user_name) ?></td>
                <td><?= h($pmgkayUserLogs->user_id) ?></td>
                <td><?= h($pmgkayUserLogs->rgi_district_code) ?></td>
                <td><?= h($pmgkayUserLogs->group_id) ?></td>
                <td><?= h($pmgkayUserLogs->failed_login_attempt) ?></td>
                <td><?= h($pmgkayUserLogs->ip_address) ?></td>
                <td><?= h($pmgkayUserLogs->message) ?></td>
                <td><?= h($pmgkayUserLogs->c_no) ?></td>
                <td><?= h($pmgkayUserLogs->status) ?></td>
                <td><?= h($pmgkayUserLogs->time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PmgkayUserLogs', 'action' => 'view', $pmgkayUserLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PmgkayUserLogs', 'action' => 'edit', $pmgkayUserLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PmgkayUserLogs', 'action' => 'delete', $pmgkayUserLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmgkayUserLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Secc Cardholder Pfms') ?></h4>
        <?php if (!empty($user->secc_cardholder_pfms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Secc Family Id') ?></th>
                <th scope="col"><?= __('Rationcard No') ?></th>
                <th scope="col"><?= __('PfmsKoilFlag') ?></th>
                <th scope="col"><?= __('PfmsKoilId') ?></th>
                <th scope="col"><?= __('Uid') ?></th>
                <th scope="col"><?= __('AccountNo') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->secc_cardholder_pfms as $seccCardholderPfms): ?>
            <tr>
                <td><?= h($seccCardholderPfms->id) ?></td>
                <td><?= h($seccCardholderPfms->secc_family_id) ?></td>
                <td><?= h($seccCardholderPfms->rationcard_no) ?></td>
                <td><?= h($seccCardholderPfms->pfmsKoilFlag) ?></td>
                <td><?= h($seccCardholderPfms->pfmsKoilId) ?></td>
                <td><?= h($seccCardholderPfms->uid) ?></td>
                <td><?= h($seccCardholderPfms->accountNo) ?></td>
                <td><?= h($seccCardholderPfms->user_id) ?></td>
                <td><?= h($seccCardholderPfms->user_name) ?></td>
                <td><?= h($seccCardholderPfms->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SeccCardholderPfms', 'action' => 'view', $seccCardholderPfms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SeccCardholderPfms', 'action' => 'edit', $seccCardholderPfms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SeccCardholderPfms', 'action' => 'delete', $seccCardholderPfms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $seccCardholderPfms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Change Logs') ?></h4>
        <?php if (!empty($user->user_change_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Old C No') ?></th>
                <th scope="col"><?= __('New C No') ?></th>
                <th scope="col"><?= __('Old F Name') ?></th>
                <th scope="col"><?= __('New F Name') ?></th>
                <th scope="col"><?= __('Old L Name') ?></th>
                <th scope="col"><?= __('New L Name') ?></th>
                <th scope="col"><?= __('Old Email') ?></th>
                <th scope="col"><?= __('New Email') ?></th>
                <th scope="col"><?= __('Reason Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Created By') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_change_logs as $userChangeLogs): ?>
            <tr>
                <td><?= h($userChangeLogs->id) ?></td>
                <td><?= h($userChangeLogs->username) ?></td>
                <td><?= h($userChangeLogs->user_id) ?></td>
                <td><?= h($userChangeLogs->old_c_no) ?></td>
                <td><?= h($userChangeLogs->new_c_no) ?></td>
                <td><?= h($userChangeLogs->old_f_name) ?></td>
                <td><?= h($userChangeLogs->new_f_name) ?></td>
                <td><?= h($userChangeLogs->old_l_name) ?></td>
                <td><?= h($userChangeLogs->new_l_name) ?></td>
                <td><?= h($userChangeLogs->old_email) ?></td>
                <td><?= h($userChangeLogs->new_email) ?></td>
                <td><?= h($userChangeLogs->reason_id) ?></td>
                <td><?= h($userChangeLogs->created) ?></td>
                <td><?= h($userChangeLogs->created_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserChangeLogs', 'action' => 'view', $userChangeLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserChangeLogs', 'action' => 'edit', $userChangeLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserChangeLogs', 'action' => 'delete', $userChangeLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userChangeLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Logs') ?></h4>
        <?php if (!empty($user->user_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Name') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Rgi District Code') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Failed Login Attempt') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('C No') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_logs as $userLogs): ?>
            <tr>
                <td><?= h($userLogs->id) ?></td>
                <td><?= h($userLogs->user_name) ?></td>
                <td><?= h($userLogs->user_id) ?></td>
                <td><?= h($userLogs->rgi_district_code) ?></td>
                <td><?= h($userLogs->group_id) ?></td>
                <td><?= h($userLogs->failed_login_attempt) ?></td>
                <td><?= h($userLogs->ip_address) ?></td>
                <td><?= h($userLogs->message) ?></td>
                <td><?= h($userLogs->c_no) ?></td>
                <td><?= h($userLogs->status) ?></td>
                <td><?= h($userLogs->time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLogs', 'action' => 'view', $userLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLogs', 'action' => 'edit', $userLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLogs', 'action' => 'delete', $userLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Logs Old') ?></h4>
        <?php if (!empty($user->user_logs_old)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ip Address') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Designation') ?></th>
                <th scope="col"><?= __('Login Time') ?></th>
                <th scope="col"><?= __('Logout Time') ?></th>
                <th scope="col"><?= __('PageCounter') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_logs_old as $userLogsOld): ?>
            <tr>
                <td><?= h($userLogsOld->id) ?></td>
                <td><?= h($userLogsOld->ip_address) ?></td>
                <td><?= h($userLogsOld->user_id) ?></td>
                <td><?= h($userLogsOld->group_id) ?></td>
                <td><?= h($userLogsOld->username) ?></td>
                <td><?= h($userLogsOld->designation) ?></td>
                <td><?= h($userLogsOld->login_time) ?></td>
                <td><?= h($userLogsOld->logout_time) ?></td>
                <td><?= h($userLogsOld->pageCounter) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserLogsOld', 'action' => 'view', $userLogsOld->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserLogsOld', 'action' => 'edit', $userLogsOld->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserLogsOld', 'action' => 'delete', $userLogsOld->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userLogsOld->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Management Logs') ?></h4>
        <?php if (!empty($user->user_management_logs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('District Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Pre Value') ?></th>
                <th scope="col"><?= __('Changed Value') ?></th>
                <th scope="col"><?= __('Letter No') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_management_logs as $userManagementLogs): ?>
            <tr>
                <td><?= h($userManagementLogs->id) ?></td>
                <td><?= h($userManagementLogs->district_id) ?></td>
                <td><?= h($userManagementLogs->user_id) ?></td>
                <td><?= h($userManagementLogs->group_id) ?></td>
                <td><?= h($userManagementLogs->pre_value) ?></td>
                <td><?= h($userManagementLogs->changed_value) ?></td>
                <td><?= h($userManagementLogs->letter_no) ?></td>
                <td><?= h($userManagementLogs->message) ?></td>
                <td><?= h($userManagementLogs->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserManagementLogs', 'action' => 'view', $userManagementLogs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserManagementLogs', 'action' => 'edit', $userManagementLogs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserManagementLogs', 'action' => 'delete', $userManagementLogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userManagementLogs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Workflow Check Backups') ?></h4>
        <?php if (!empty($user->workflow_check_backups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Otp') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('ActivityId') ?></th>
                <th scope="col"><?= __('Created1') ?></th>
                <th scope="col"><?= __('Created2') ?></th>
                <th scope="col"><?= __('Created3') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->workflow_check_backups as $workflowCheckBackups): ?>
            <tr>
                <td><?= h($workflowCheckBackups->id) ?></td>
                <td><?= h($workflowCheckBackups->user_id) ?></td>
                <td><?= h($workflowCheckBackups->otp) ?></td>
                <td><?= h($workflowCheckBackups->mobile) ?></td>
                <td><?= h($workflowCheckBackups->activityId) ?></td>
                <td><?= h($workflowCheckBackups->created1) ?></td>
                <td><?= h($workflowCheckBackups->created2) ?></td>
                <td><?= h($workflowCheckBackups->created3) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WorkflowCheckBackups', 'action' => 'view', $workflowCheckBackups->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WorkflowCheckBackups', 'action' => 'edit', $workflowCheckBackups->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WorkflowCheckBackups', 'action' => 'delete', $workflowCheckBackups->], ['confirm' => __('Are you sure you want to delete # {0}?', $workflowCheckBackups->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Workflow Checks') ?></h4>
        <?php if (!empty($user->workflow_checks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Otp') ?></th>
                <th scope="col"><?= __('Mobile') ?></th>
                <th scope="col"><?= __('ActivityId') ?></th>
                <th scope="col"><?= __('Created1') ?></th>
                <th scope="col"><?= __('Created2') ?></th>
                <th scope="col"><?= __('Created3') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->workflow_checks as $workflowChecks): ?>
            <tr>
                <td><?= h($workflowChecks->id) ?></td>
                <td><?= h($workflowChecks->user_id) ?></td>
                <td><?= h($workflowChecks->otp) ?></td>
                <td><?= h($workflowChecks->mobile) ?></td>
                <td><?= h($workflowChecks->activityId) ?></td>
                <td><?= h($workflowChecks->created1) ?></td>
                <td><?= h($workflowChecks->created2) ?></td>
                <td><?= h($workflowChecks->created3) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'WorkflowChecks', 'action' => 'view', $workflowChecks->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WorkflowChecks', 'action' => 'edit', $workflowChecks->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'WorkflowChecks', 'action' => 'delete', $workflowChecks->], ['confirm' => __('Are you sure you want to delete # {0}?', $workflowChecks->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

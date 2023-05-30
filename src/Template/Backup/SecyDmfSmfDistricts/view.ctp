<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecyDmfSmfDistrict $secyDmfSmfDistrict
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Secy Dmf Smf District'), ['action' => 'edit', $secyDmfSmfDistrict->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Secy Dmf Smf District'), ['action' => 'delete', $secyDmfSmfDistrict->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secyDmfSmfDistrict->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Secy Dmf Smf Districts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Secy Dmf Smf District'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Years'), ['controller' => 'Years', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Year'), ['controller' => 'Years', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Form Codes'), ['controller' => 'FormCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form Code'), ['controller' => 'FormCodes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="secyDmfSmfDistricts view large-9 medium-8 columns content">
    <h3><?= h($secyDmfSmfDistrict->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rgi District Code') ?></th>
            <td><?= h($secyDmfSmfDistrict->rgi_district_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DistrictName') ?></th>
            <td><?= h($secyDmfSmfDistrict->districtName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rgi Block Code') ?></th>
            <td><?= h($secyDmfSmfDistrict->rgi_block_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BlockName') ?></th>
            <td><?= h($secyDmfSmfDistrict->blockName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $secyDmfSmfDistrict->has('month') ? $this->Html->link($secyDmfSmfDistrict->month->name, ['controller' => 'Months', 'action' => 'view', $secyDmfSmfDistrict->month->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $secyDmfSmfDistrict->has('year') ? $this->Html->link($secyDmfSmfDistrict->year->name, ['controller' => 'Years', 'action' => 'view', $secyDmfSmfDistrict->year->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $secyDmfSmfDistrict->has('item') ? $this->Html->link($secyDmfSmfDistrict->item->name, ['controller' => 'Items', 'action' => 'view', $secyDmfSmfDistrict->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Form Code') ?></th>
            <td><?= $secyDmfSmfDistrict->has('form_code') ? $this->Html->link($secyDmfSmfDistrict->form_code->name, ['controller' => 'FormCodes', 'action' => 'view', $secyDmfSmfDistrict->form_code->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FormCodeName') ?></th>
            <td><?= h($secyDmfSmfDistrict->formCodeName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yojna') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->yojna) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entry Level') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->entry_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mapped Form Id') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->mapped_form_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Allocated Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->total_allocated_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Month Quantity') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->previous_month_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Month Payable Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->previous_month_payable_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Month Paid Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->previous_month_paid_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Quantity') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->current_month_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Payable Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->current_month_payable_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Paid Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->current_month_paid_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Expenses') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->total_expenses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allocated Amount Balance') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->allocated_amount_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Freeze') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->freeze) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($secyDmfSmfDistrict->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($secyDmfSmfDistrict->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($secyDmfSmfDistrict->modified) ?></td>
        </tr>
    </table>
</div>

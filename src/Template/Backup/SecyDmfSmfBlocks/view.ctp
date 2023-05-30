<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecyDmfSmfBlock $secyDmfSmfBlock
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Secy Dmf Smf Block'), ['action' => 'edit', $secyDmfSmfBlock->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Secy Dmf Smf Block'), ['action' => 'delete', $secyDmfSmfBlock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secyDmfSmfBlock->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Secy Dmf Smf Blocks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Secy Dmf Smf Block'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Years'), ['controller' => 'Years', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Year'), ['controller' => 'Years', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Form Codes'), ['controller' => 'FormCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Form Code'), ['controller' => 'FormCodes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="secyDmfSmfBlocks view large-9 medium-8 columns content">
    <h3><?= h($secyDmfSmfBlock->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rgi District Code') ?></th>
            <td><?= h($secyDmfSmfBlock->rgi_district_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DistrictName') ?></th>
            <td><?= h($secyDmfSmfBlock->districtName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rgi Block Code') ?></th>
            <td><?= h($secyDmfSmfBlock->rgi_block_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BlockName') ?></th>
            <td><?= h($secyDmfSmfBlock->blockName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $secyDmfSmfBlock->has('month') ? $this->Html->link($secyDmfSmfBlock->month->name, ['controller' => 'Months', 'action' => 'view', $secyDmfSmfBlock->month->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $secyDmfSmfBlock->has('year') ? $this->Html->link($secyDmfSmfBlock->year->name, ['controller' => 'Years', 'action' => 'view', $secyDmfSmfBlock->year->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Form Code') ?></th>
            <td><?= $secyDmfSmfBlock->has('form_code') ? $this->Html->link($secyDmfSmfBlock->form_code->name, ['controller' => 'FormCodes', 'action' => 'view', $secyDmfSmfBlock->form_code->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $secyDmfSmfBlock->has('item') ? $this->Html->link($secyDmfSmfBlock->item->name, ['controller' => 'Items', 'action' => 'view', $secyDmfSmfBlock->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FormCodeName') ?></th>
            <td><?= h($secyDmfSmfBlock->formCodeName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mapped Form Id') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->mapped_form_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Card Type Id') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->card_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Yojna') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->yojna) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entry Level') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->entry_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Allocated Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->total_allocated_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Month Quantity') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->previous_month_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Month Payable Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->previous_month_payable_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Previous Month Paid Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->previous_month_paid_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Quantity') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->current_month_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Payable Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->current_month_payable_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Paid Amount') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->current_month_paid_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Expenses') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->total_expenses) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Allocated Amount Balance') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->allocated_amount_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Freeze') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->freeze) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified By') ?></th>
            <td><?= $this->Number->format($secyDmfSmfBlock->verified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($secyDmfSmfBlock->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Verified') ?></th>
            <td><?= h($secyDmfSmfBlock->verified) ?></td>
        </tr>
    </table>
</div>

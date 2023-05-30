<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecySmpDmp $secySmpDmp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Secy Smp Dmp'), ['action' => 'edit', $secySmpDmp->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Secy Smp Dmp'), ['action' => 'delete', $secySmpDmp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secySmpDmp->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Secy Smp Dmps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Secy Smp Dmp'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Years'), ['controller' => 'Years', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Year'), ['controller' => 'Years', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="secySmpDmps view large-9 medium-8 columns content">
    <h3><?= h($secySmpDmp->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Rgi District Code') ?></th>
            <td><?= h($secySmpDmp->rgi_district_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DistrictName') ?></th>
            <td><?= h($secySmpDmp->districtName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rgi Block Code') ?></th>
            <td><?= h($secySmpDmp->rgi_block_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('BlockName') ?></th>
            <td><?= h($secySmpDmp->blockName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Month') ?></th>
            <td><?= $secySmpDmp->has('month') ? $this->Html->link($secySmpDmp->month->name, ['controller' => 'Months', 'action' => 'view', $secySmpDmp->month->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $secySmpDmp->has('year') ? $this->Html->link($secySmpDmp->year->name, ['controller' => 'Years', 'action' => 'view', $secySmpDmp->year->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $secySmpDmp->has('item') ? $this->Html->link($secySmpDmp->item->name, ['controller' => 'Items', 'action' => 'view', $secySmpDmp->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FormCodeName') ?></th>
            <td><?= h($secySmpDmp->formCodeName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $secySmpDmp->has('location') ? $this->Html->link($secySmpDmp->location->name, ['controller' => 'Locations', 'action' => 'view', $secySmpDmp->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($secySmpDmp->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Card Type Id') ?></th>
            <td><?= $this->Number->format($secySmpDmp->card_type_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Form Code Id') ?></th>
            <td><?= $this->Number->format($secySmpDmp->form_code_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Month Balance') ?></th>
            <td><?= $this->Number->format($secySmpDmp->last_month_balance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Allocation') ?></th>
            <td><?= $this->Number->format($secySmpDmp->current_month_allocation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Lifting') ?></th>
            <td><?= $this->Number->format($secySmpDmp->current_month_lifting) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Distribution') ?></th>
            <td><?= $this->Number->format($secySmpDmp->current_month_distribution) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Card Counts') ?></th>
            <td><?= $this->Number->format($secySmpDmp->card_counts) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Month Cards Lifted') ?></th>
            <td><?= $this->Number->format($secySmpDmp->current_month_cards_lifted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balance Quantity') ?></th>
            <td><?= $this->Number->format($secySmpDmp->balance_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Unpaid Beneficiaries') ?></th>
            <td><?= $this->Number->format($secySmpDmp->unpaid_beneficiaries) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Available Qty') ?></th>
            <td><?= $this->Number->format($secySmpDmp->total_available_qty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created By') ?></th>
            <td><?= $this->Number->format($secySmpDmp->created_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($secySmpDmp->modified_by) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Freeze') ?></th>
            <td><?= $this->Number->format($secySmpDmp->freeze) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($secySmpDmp->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($secySmpDmp->modified) ?></td>
        </tr>
    </table>
</div>

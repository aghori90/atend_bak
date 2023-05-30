<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecySmpDmp[]|\Cake\Collection\CollectionInterface $secySmpDmps
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Secy Smp Dmp'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Years'), ['controller' => 'Years', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Year'), ['controller' => 'Years', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="secySmpDmps index large-9 medium-8 columns content">
    <h3><?= __('Secy Smp Dmps') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rgi_district_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('districtName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rgi_block_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('blockName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('month_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('card_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('form_code_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formCodeName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_month_balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_month_allocation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_month_lifting') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_month_distribution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('card_counts') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_month_cards_lifted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balance_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('unpaid_beneficiaries') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_available_qty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('freeze') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($secySmpDmps as $secySmpDmp): ?>
            <tr>
                <td><?= $this->Number->format($secySmpDmp->id) ?></td>
                <td><?= h($secySmpDmp->rgi_district_code) ?></td>
                <td><?= h($secySmpDmp->districtName) ?></td>
                <td><?= h($secySmpDmp->rgi_block_code) ?></td>
                <td><?= h($secySmpDmp->blockName) ?></td>
                <td><?= $secySmpDmp->has('month') ? $this->Html->link($secySmpDmp->month->name, ['controller' => 'Months', 'action' => 'view', $secySmpDmp->month->id]) : '' ?></td>
                <td><?= $secySmpDmp->has('year') ? $this->Html->link($secySmpDmp->year->name, ['controller' => 'Years', 'action' => 'view', $secySmpDmp->year->id]) : '' ?></td>
                <td><?= $this->Number->format($secySmpDmp->card_type_id) ?></td>
                <td><?= $secySmpDmp->has('item') ? $this->Html->link($secySmpDmp->item->name, ['controller' => 'Items', 'action' => 'view', $secySmpDmp->item->id]) : '' ?></td>
                <td><?= $this->Number->format($secySmpDmp->form_code_id) ?></td>
                <td><?= h($secySmpDmp->formCodeName) ?></td>
                <td><?= $this->Number->format($secySmpDmp->last_month_balance) ?></td>
                <td><?= $this->Number->format($secySmpDmp->current_month_allocation) ?></td>
                <td><?= $this->Number->format($secySmpDmp->current_month_lifting) ?></td>
                <td><?= $this->Number->format($secySmpDmp->current_month_distribution) ?></td>
                <td><?= $this->Number->format($secySmpDmp->card_counts) ?></td>
                <td><?= $this->Number->format($secySmpDmp->current_month_cards_lifted) ?></td>
                <td><?= $this->Number->format($secySmpDmp->balance_quantity) ?></td>
                <td><?= $this->Number->format($secySmpDmp->unpaid_beneficiaries) ?></td>
                <td><?= $this->Number->format($secySmpDmp->total_available_qty) ?></td>
                <td><?= $secySmpDmp->has('location') ? $this->Html->link($secySmpDmp->location->name, ['controller' => 'Locations', 'action' => 'view', $secySmpDmp->location->id]) : '' ?></td>
                <td><?= h($secySmpDmp->created) ?></td>
                <td><?= $this->Number->format($secySmpDmp->created_by) ?></td>
                <td><?= h($secySmpDmp->modified) ?></td>
                <td><?= $this->Number->format($secySmpDmp->modified_by) ?></td>
                <td><?= $this->Number->format($secySmpDmp->freeze) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $secySmpDmp->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $secySmpDmp->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $secySmpDmp->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secySmpDmp->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

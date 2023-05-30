<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecyDmfSmfDistrict[]|\Cake\Collection\CollectionInterface $secyDmfSmfDistricts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Secy Dmf Smf District'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Years'), ['controller' => 'Years', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Year'), ['controller' => 'Years', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Form Codes'), ['controller' => 'FormCodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Form Code'), ['controller' => 'FormCodes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="secyDmfSmfDistricts index large-9 medium-8 columns content">
    <h3><?= __('Secy Dmf Smf Districts') ?></h3>
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
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yojna') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entry_level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('form_code_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mapped_form_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('formCodeName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_allocated_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('previous_month_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('previous_month_payable_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('previous_month_paid_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_month_quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_month_payable_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_month_paid_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_expenses') ?></th>
                <th scope="col"><?= $this->Paginator->sort('allocated_amount_balance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('freeze') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_by') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($secyDmfSmfDistricts as $secyDmfSmfDistrict): ?>
            <tr>
                <td><?= $this->Number->format($secyDmfSmfDistrict->id) ?></td>
                <td><?= h($secyDmfSmfDistrict->rgi_district_code) ?></td>
                <td><?= h($secyDmfSmfDistrict->districtName) ?></td>
                <td><?= h($secyDmfSmfDistrict->rgi_block_code) ?></td>
                <td><?= h($secyDmfSmfDistrict->blockName) ?></td>
                <td><?= $secyDmfSmfDistrict->has('month') ? $this->Html->link($secyDmfSmfDistrict->month->name, ['controller' => 'Months', 'action' => 'view', $secyDmfSmfDistrict->month->id]) : '' ?></td>
                <td><?= $secyDmfSmfDistrict->has('year') ? $this->Html->link($secyDmfSmfDistrict->year->name, ['controller' => 'Years', 'action' => 'view', $secyDmfSmfDistrict->year->id]) : '' ?></td>
                <td><?= $secyDmfSmfDistrict->has('item') ? $this->Html->link($secyDmfSmfDistrict->item->name, ['controller' => 'Items', 'action' => 'view', $secyDmfSmfDistrict->item->id]) : '' ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->yojna) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->entry_level) ?></td>
                <td><?= $secyDmfSmfDistrict->has('form_code') ? $this->Html->link($secyDmfSmfDistrict->form_code->name, ['controller' => 'FormCodes', 'action' => 'view', $secyDmfSmfDistrict->form_code->id]) : '' ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->mapped_form_id) ?></td>
                <td><?= h($secyDmfSmfDistrict->formCodeName) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->total_allocated_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->previous_month_quantity) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->previous_month_payable_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->previous_month_paid_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->current_month_quantity) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->current_month_payable_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->current_month_paid_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->total_expenses) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->allocated_amount_balance) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->freeze) ?></td>
                <td><?= h($secyDmfSmfDistrict->created) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->created_by) ?></td>
                <td><?= h($secyDmfSmfDistrict->modified) ?></td>
                <td><?= $this->Number->format($secyDmfSmfDistrict->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $secyDmfSmfDistrict->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $secyDmfSmfDistrict->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $secyDmfSmfDistrict->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secyDmfSmfDistrict->id)]) ?>
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

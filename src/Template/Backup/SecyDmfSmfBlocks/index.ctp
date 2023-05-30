<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecyDmfSmfBlock[]|\Cake\Collection\CollectionInterface $secyDmfSmfBlocks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Secy Dmf Smf Block'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Months'), ['controller' => 'Months', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Month'), ['controller' => 'Months', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Years'), ['controller' => 'Years', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Year'), ['controller' => 'Years', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Form Codes'), ['controller' => 'FormCodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Form Code'), ['controller' => 'FormCodes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="secyDmfSmfBlocks index large-9 medium-8 columns content">
    <h3><?= __('Secy Dmf Smf Blocks') ?></h3>
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
                <th scope="col"><?= $this->Paginator->sort('form_code_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mapped_form_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('card_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('yojna') ?></th>
                <th scope="col"><?= $this->Paginator->sort('entry_level') ?></th>
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
                <th scope="col"><?= $this->Paginator->sort('verified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('verified_by') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($secyDmfSmfBlocks as $secyDmfSmfBlock): ?>
            <tr>
                <td><?= $this->Number->format($secyDmfSmfBlock->id) ?></td>
                <td><?= h($secyDmfSmfBlock->rgi_district_code) ?></td>
                <td><?= h($secyDmfSmfBlock->districtName) ?></td>
                <td><?= h($secyDmfSmfBlock->rgi_block_code) ?></td>
                <td><?= h($secyDmfSmfBlock->blockName) ?></td>
                <td><?= $secyDmfSmfBlock->has('month') ? $this->Html->link($secyDmfSmfBlock->month->name, ['controller' => 'Months', 'action' => 'view', $secyDmfSmfBlock->month->id]) : '' ?></td>
                <td><?= $secyDmfSmfBlock->has('year') ? $this->Html->link($secyDmfSmfBlock->year->name, ['controller' => 'Years', 'action' => 'view', $secyDmfSmfBlock->year->id]) : '' ?></td>
                <td><?= $secyDmfSmfBlock->has('form_code') ? $this->Html->link($secyDmfSmfBlock->form_code->name, ['controller' => 'FormCodes', 'action' => 'view', $secyDmfSmfBlock->form_code->id]) : '' ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->mapped_form_id) ?></td>
                <td><?= $secyDmfSmfBlock->has('item') ? $this->Html->link($secyDmfSmfBlock->item->name, ['controller' => 'Items', 'action' => 'view', $secyDmfSmfBlock->item->id]) : '' ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->card_type_id) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->yojna) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->entry_level) ?></td>
                <td><?= h($secyDmfSmfBlock->formCodeName) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->total_allocated_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->previous_month_quantity) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->previous_month_payable_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->previous_month_paid_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->current_month_quantity) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->current_month_payable_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->current_month_paid_amount) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->total_expenses) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->allocated_amount_balance) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->freeze) ?></td>
                <td><?= h($secyDmfSmfBlock->created) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->created_by) ?></td>
                <td><?= h($secyDmfSmfBlock->verified) ?></td>
                <td><?= $this->Number->format($secyDmfSmfBlock->verified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $secyDmfSmfBlock->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $secyDmfSmfBlock->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $secyDmfSmfBlock->id], ['confirm' => __('Are you sure you want to delete # {0}?', $secyDmfSmfBlock->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecySmpDmp $secySmpDmp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $secySmpDmp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $secySmpDmp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Secy Smp Dmps'), ['action' => 'index']) ?></li>
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
<div class="secySmpDmps form large-9 medium-8 columns content">
    <?= $this->Form->create($secySmpDmp) ?>
    <fieldset>
        <legend><?= __('Edit Secy Smp Dmp') ?></legend>
        <?php
            echo $this->Form->control('rgi_district_code');
            echo $this->Form->control('districtName');
            echo $this->Form->control('rgi_block_code');
            echo $this->Form->control('blockName');
            echo $this->Form->control('month_id', ['options' => $months]);
            echo $this->Form->control('year_id', ['options' => $years]);
            echo $this->Form->control('card_type_id');
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('form_code_id');
            echo $this->Form->control('formCodeName');
            echo $this->Form->control('last_month_balance');
            echo $this->Form->control('current_month_allocation');
            echo $this->Form->control('current_month_lifting');
            echo $this->Form->control('current_month_distribution');
            echo $this->Form->control('card_counts');
            echo $this->Form->control('current_month_cards_lifted');
            echo $this->Form->control('balance_quantity');
            echo $this->Form->control('unpaid_beneficiaries');
            echo $this->Form->control('total_available_qty');
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
            echo $this->Form->control('freeze');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SecyDmfSmfDistrict $secyDmfSmfDistrict
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $secyDmfSmfDistrict->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $secyDmfSmfDistrict->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Secy Dmf Smf Districts'), ['action' => 'index']) ?></li>
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
<div class="secyDmfSmfDistricts form large-9 medium-8 columns content">
    <?= $this->Form->create($secyDmfSmfDistrict) ?>
    <fieldset>
        <legend><?= __('Edit Secy Dmf Smf District') ?></legend>
        <?php
            echo $this->Form->control('rgi_district_code');
            echo $this->Form->control('districtName');
            echo $this->Form->control('rgi_block_code');
            echo $this->Form->control('blockName');
            echo $this->Form->control('month_id', ['options' => $months]);
            echo $this->Form->control('year_id', ['options' => $years]);
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('yojna');
            echo $this->Form->control('entry_level');
            echo $this->Form->control('form_code_id', ['options' => $formCodes]);
            echo $this->Form->control('mapped_form_id');
            echo $this->Form->control('formCodeName');
            echo $this->Form->control('total_allocated_amount');
            echo $this->Form->control('previous_month_quantity');
            echo $this->Form->control('previous_month_payable_amount');
            echo $this->Form->control('previous_month_paid_amount');
            echo $this->Form->control('current_month_quantity');
            echo $this->Form->control('current_month_payable_amount');
            echo $this->Form->control('current_month_paid_amount');
            echo $this->Form->control('total_expenses');
            echo $this->Form->control('allocated_amount_balance');
            echo $this->Form->control('freeze');
            echo $this->Form->control('created_by');
            echo $this->Form->control('modified_by');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

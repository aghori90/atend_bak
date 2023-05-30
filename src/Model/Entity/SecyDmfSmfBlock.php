<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SecyDmfSmfBlock Entity
 *
 * @property int $id
 * @property string $rgi_district_code
 * @property string $districtName
 * @property string $rgi_block_code
 * @property string $blockName
 * @property int $month_id
 * @property int $year_id
 * @property int $form_code_id
 * @property int|null $mapped_form_id
 * @property int $item_id
 * @property int|null $card_type_id
 * @property int $yojna
 * @property int|null $entry_level
 * @property string $formCodeName
 * @property float|null $total_allocated_amount
 * @property float|null $previous_month_quantity
 * @property float|null $previous_month_payable_amount
 * @property float|null $previous_month_paid_amount
 * @property float|null $current_month_quantity
 * @property float|null $current_month_payable_amount
 * @property float|null $current_month_paid_amount
 * @property float|null $total_expenses
 * @property float|null $allocated_amount_balance
 * @property int $freeze
 * @property \Cake\I18n\FrozenTime $created
 * @property int $created_by
 * @property \Cake\I18n\FrozenTime|null $verified
 * @property int $verified_by
 *
 * @property \App\Model\Entity\Month $month
 * @property \App\Model\Entity\Year $year
 * @property \App\Model\Entity\FormCode $form_code
 * @property \App\Model\Entity\MappedForm $mapped_form
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\CardType $card_type
 */
class SecyDmfSmfBlock extends Entity
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
        'rgi_district_code' => true,
        'districtName' => true,
        'rgi_block_code' => true,
        'blockName' => true,
        'month_id' => true,
        'year_id' => true,
        'form_code_id' => true,
        'mapped_form_id' => true,
        'item_id' => true,
        'card_type_id' => true,
        'yojna' => true,
        'entry_level' => true,
        'formCodeName' => true,
        'total_allocated_amount' => true,
        'previous_month_quantity' => true,
        'previous_month_payable_amount' => true,
        'previous_month_paid_amount' => true,
        'current_month_quantity' => true,
        'current_month_payable_amount' => true,
        'current_month_paid_amount' => true,
        'total_expenses' => true,
        'allocated_amount_balance' => true,
        'freeze' => true,
        'created' => true,
        'created_by' => true,
        'verified' => true,
        'verified_by' => true,
        'month' => true,
        'year' => true,
        'form_code' => true,
        'mapped_form' => true,
        'item' => true,
        'card_type' => true
    ];
}

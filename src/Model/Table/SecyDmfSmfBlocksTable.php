<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SecyDmfSmfBlocks Model
 *
 * @property \App\Model\Table\MonthsTable|\Cake\ORM\Association\BelongsTo $Months
 * @property \App\Model\Table\YearsTable|\Cake\ORM\Association\BelongsTo $Years
 * @property \App\Model\Table\FormCodesTable|\Cake\ORM\Association\BelongsTo $FormCodes
 * @property \App\Model\Table\MappedFormsTable|\Cake\ORM\Association\BelongsTo $MappedForms
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\CardTypesTable|\Cake\ORM\Association\BelongsTo $CardTypes
 *
 * @method \App\Model\Entity\SecyDmfSmfBlock get($primaryKey, $options = [])
 * @method \App\Model\Entity\SecyDmfSmfBlock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfBlock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfBlock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SecyDmfSmfBlock saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SecyDmfSmfBlock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfBlock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfBlock findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SecyDmfSmfBlocksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('secy_dmf_smf_blocks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

//        $this->belongsTo('Months', [
//            'foreignKey' => 'month_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Years', [
//            'foreignKey' => 'year_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('FormCodes', [
//            'foreignKey' => 'form_code_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('MappedForms', [
//            'foreignKey' => 'mapped_form_id'
//        ]);
//        $this->belongsTo('Items', [
//            'foreignKey' => 'item_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('CardTypes', [
//            'foreignKey' => 'card_type_id'
//        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('rgi_district_code')
            ->maxLength('rgi_district_code', 3)
            ->requirePresence('rgi_district_code', 'create')
            ->allowEmptyString('rgi_district_code', false);

        $validator
            ->scalar('districtName')
            ->maxLength('districtName', 100)
            ->requirePresence('districtName', 'create')
            ->allowEmptyString('districtName', false);

        $validator
            ->scalar('rgi_block_code')
            ->maxLength('rgi_block_code', 6)
            ->requirePresence('rgi_block_code', 'create')
            ->allowEmptyString('rgi_block_code', false);

        $validator
            ->scalar('blockName')
            ->maxLength('blockName', 100)
            ->requirePresence('blockName', 'create')
            ->allowEmptyString('blockName', false);

        $validator
            ->integer('yojna')
            ->requirePresence('yojna', 'create')
            ->allowEmptyString('yojna', false);

        $validator
            ->integer('entry_level')
            ->allowEmptyString('entry_level');

        $validator
            ->scalar('formCodeName')
            ->maxLength('formCodeName', 20)
            ->requirePresence('formCodeName', 'create')
            ->allowEmptyString('formCodeName', false);

        $validator
            ->decimal('total_allocated_amount')
            ->allowEmptyString('total_allocated_amount');

        $validator
            ->decimal('previous_month_quantity')
            ->allowEmptyString('previous_month_quantity');

        $validator
            ->decimal('previous_month_payable_amount')
            ->allowEmptyString('previous_month_payable_amount');

        $validator
            ->decimal('previous_month_paid_amount')
            ->allowEmptyString('previous_month_paid_amount');

        $validator
            ->decimal('current_month_quantity')
            ->allowEmptyString('current_month_quantity');

        $validator
            ->decimal('current_month_payable_amount')
            ->allowEmptyString('current_month_payable_amount');

        $validator
            ->decimal('current_month_paid_amount')
            ->allowEmptyString('current_month_paid_amount');

        $validator
            ->decimal('total_expenses')
            ->allowEmptyString('total_expenses');

        $validator
            ->decimal('allocated_amount_balance')
            ->allowEmptyString('allocated_amount_balance');

        $validator
            ->integer('freeze')
            ->allowEmptyString('freeze', false);

        $validator
            ->integer('created_by')
            ->requirePresence('created_by', 'create')
            ->allowEmptyString('created_by', false);

        $validator
            ->dateTime('verified')
            ->allowEmptyDateTime('verified');

        $validator
            ->integer('verified_by')
            ->requirePresence('verified_by', 'create')
            ->allowEmptyString('verified_by', false);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
//        $rules->add($rules->existsIn(['month_id'], 'Months'));
//        $rules->add($rules->existsIn(['year_id'], 'Years'));
//        $rules->add($rules->existsIn(['form_code_id'], 'FormCodes'));
//        $rules->add($rules->existsIn(['mapped_form_id'], 'MappedForms'));
//        $rules->add($rules->existsIn(['item_id'], 'Items'));
//        $rules->add($rules->existsIn(['card_type_id'], 'CardTypes'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SecyDmfSmfDistricts Model
 *
 * @property \App\Model\Table\MonthsTable|\Cake\ORM\Association\BelongsTo $Months
 * @property \App\Model\Table\YearsTable|\Cake\ORM\Association\BelongsTo $Years
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\FormCodesTable|\Cake\ORM\Association\BelongsTo $FormCodes
 * @property \App\Model\Table\MappedFormsTable|\Cake\ORM\Association\BelongsTo $MappedForms
 *
 * @method \App\Model\Entity\SecyDmfSmfDistrict get($primaryKey, $options = [])
 * @method \App\Model\Entity\SecyDmfSmfDistrict newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfDistrict[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfDistrict|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SecyDmfSmfDistrict saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SecyDmfSmfDistrict patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfDistrict[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SecyDmfSmfDistrict findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SecyDmfSmfDistrictsTable extends Table
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

        $this->setTable('secy_dmf_smf_districts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Months', [
            'foreignKey' => 'month_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Years', [
            'foreignKey' => 'year_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('FormCodes', [
            'foreignKey' => 'form_code_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MappedForms', [
            'foreignKey' => 'mapped_form_id'
        ]);
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
            ->requirePresence('previous_month_quantity', 'create')
            ->allowEmptyString('previous_month_quantity', false);

        $validator
            ->decimal('previous_month_payable_amount')
            ->requirePresence('previous_month_payable_amount', 'create')
            ->allowEmptyString('previous_month_payable_amount', false);

        $validator
            ->decimal('previous_month_paid_amount')
            ->allowEmptyString('previous_month_paid_amount');

        $validator
            ->decimal('current_month_quantity')
            ->requirePresence('current_month_quantity', 'create')
            ->allowEmptyString('current_month_quantity', false);

        $validator
            ->decimal('current_month_payable_amount')
            ->requirePresence('current_month_payable_amount', 'create')
            ->allowEmptyString('current_month_payable_amount', false);

        $validator
            ->decimal('current_month_paid_amount')
            ->allowEmptyString('current_month_paid_amount');

        $validator
            ->decimal('total_expenses')
            ->requirePresence('total_expenses', 'create')
            ->allowEmptyString('total_expenses', false);

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
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

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
        $rules->add($rules->existsIn(['month_id'], 'Months'));
        $rules->add($rules->existsIn(['year_id'], 'Years'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['form_code_id'], 'FormCodes'));
        $rules->add($rules->existsIn(['mapped_form_id'], 'MappedForms'));

        return $rules;
    }
}

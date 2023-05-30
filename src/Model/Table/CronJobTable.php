<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\DsoMastersTable|\Cake\ORM\Association\BelongsTo $DsoMasters
 * @property \App\Model\Table\SdoMastersTable|\Cake\ORM\Association\BelongsTo $SdoMasters
 * @property \App\Model\Table\BsoMastersTable|\Cake\ORM\Association\BelongsTo $BsoMasters
 * @property \App\Model\Table\MoMastersTable|\Cake\ORM\Association\BelongsTo $MoMasters
 * @property \App\Model\Table\DepotMastersTable|\Cake\ORM\Association\BelongsTo $DepotMasters
 * @property \App\Model\Table\DmsfcMastersTable|\Cake\ORM\Association\BelongsTo $DmsfcMasters
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property \App\Model\Table\DistrictsTable|\Cake\ORM\Association\BelongsTo $Districts
 * @property \App\Model\Table\BlockCitiesTable|\Cake\ORM\Association\BelongsTo $BlockCities
 * @property \App\Model\Table\SubDivisionsTable|\Cake\ORM\Association\BelongsTo $SubDivisions
 * @property \App\Model\Table\DealerDocsTable|\Cake\ORM\Association\HasMany $DealerDocs
 * @property \App\Model\Table\DsoActivityOtpsTable|\Cake\ORM\Association\HasMany $DsoActivityOtps
 * @property \App\Model\Table\ErcmsLogsTable|\Cake\ORM\Association\HasMany $ErcmsLogs
 * @property \App\Model\Table\JsfssErcmsLogsTable|\Cake\ORM\Association\HasMany $JsfssErcmsLogs
 * @property \App\Model\Table\LogsTable|\Cake\ORM\Association\HasMany $Logs
 * @property \App\Model\Table\PmgkayUserLogBackupsTable|\Cake\ORM\Association\HasMany $PmgkayUserLogBackups
 * @property \App\Model\Table\PmgkayUserLogsTable|\Cake\ORM\Association\HasMany $PmgkayUserLogs
 * @property \App\Model\Table\SeccCardholderPfmsTable|\Cake\ORM\Association\HasMany $SeccCardholderPfms
 * @property \App\Model\Table\UserChangeLogsTable|\Cake\ORM\Association\HasMany $UserChangeLogs
 * @property \App\Model\Table\UserLogsTable|\Cake\ORM\Association\HasMany $UserLogs
 * @property \App\Model\Table\UserLogsOldTable|\Cake\ORM\Association\HasMany $UserLogsOld
 * @property \App\Model\Table\UserManagementLogsTable|\Cake\ORM\Association\HasMany $UserManagementLogs
 * @property \App\Model\Table\WorkflowCheckBackupsTable|\Cake\ORM\Association\HasMany $WorkflowCheckBackups
 * @property \App\Model\Table\WorkflowChecksTable|\Cake\ORM\Association\HasMany $WorkflowChecks
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
//    public function initialize(array $config)
//    {
//        parent::initialize($config);
//
//        $this->setTable('users');
//        $this->setDisplayField('id');
//        $this->setPrimaryKey('id');
//
//        $this->addBehavior('Timestamp');
//
//        $this->belongsTo('Roles', [
//            'foreignKey' => 'role_id'
//        ]);
//        $this->belongsTo('DsoMasters', [
//            'foreignKey' => 'dso_master_id'
//        ]);
//        $this->belongsTo('SdoMasters', [
//            'foreignKey' => 'sdo_master_id'
//        ]);
//        $this->belongsTo('BsoMasters', [
//            'foreignKey' => 'bso_master_id'
//        ]);
//        $this->belongsTo('MoMasters', [
//            'foreignKey' => 'mo_master_id'
//        ]);
//        $this->belongsTo('DepotMasters', [
//            'foreignKey' => 'depot_master_id'
//        ]);
//        $this->belongsTo('DmsfcMasters', [
//            'foreignKey' => 'dmsfc_master_id'
//        ]);
//        $this->belongsTo('Groups', [
//            'foreignKey' => 'group_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('Districts', [
//            'foreignKey' => 'district_id',
//            'joinType' => 'INNER'
//        ]);
//        $this->belongsTo('BlockCities', [
//            'foreignKey' => 'block_city_id'
//        ]);
//        $this->belongsTo('SubDivisions', [
//            'foreignKey' => 'sub_division_id'
//        ]);
//        $this->hasMany('DealerDocs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('DsoActivityOtps', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('ErcmsLogs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('JsfssErcmsLogs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('Logs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('PmgkayUserLogBackups', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('PmgkayUserLogs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('SeccCardholderPfms', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('UserChangeLogs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('UserLogs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('UserLogsOld', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('UserManagementLogs', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('WorkflowCheckBackups', [
//            'foreignKey' => 'user_id'
//        ]);
//        $this->hasMany('WorkflowChecks', [
//            'foreignKey' => 'user_id'
//        ]);
//    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
//    public function validationDefault(Validator $validator)
//    {
//        $validator
//            ->integer('id')
//            ->allowEmptyString('id', 'create');
//
//        $validator
//            ->scalar('username')
//            ->maxLength('username', 255)
//            ->requirePresence('username', 'create')
//            ->allowEmptyString('username', false)
//            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
//
//        $validator
//            ->scalar('l_name')
//            ->maxLength('l_name', 20)
//            ->requirePresence('l_name', 'create')
//            ->allowEmptyString('l_name', false);
//
//        $validator
//            ->scalar('f_name')
//            ->maxLength('f_name', 20)
//            ->requirePresence('f_name', 'create')
//            ->allowEmptyString('f_name', false);
//
//        $validator
//            ->scalar('address')
//            ->maxLength('address', 200)
//            ->requirePresence('address', 'create')
//            ->allowEmptyString('address', false);
//
//        $validator
//            ->scalar('c_no')
//            ->maxLength('c_no', 10)
//            ->requirePresence('c_no', 'create')
//            ->allowEmptyString('c_no', false);
//
//        $validator
//            ->email('email')
//            ->requirePresence('email', 'create')
//            ->allowEmptyString('email', false);
//
//        $validator
//            ->scalar('desig')
//            ->maxLength('desig', 20)
//            ->requirePresence('desig', 'create')
//            ->allowEmptyString('desig', false);
//
//        $validator
//            ->scalar('password')
//            ->maxLength('password', 40)
//            ->requirePresence('password', 'create')
//            ->allowEmptyString('password', false);
//
//        $validator
//            ->integer('dso_sdo_bso_moID')
//            ->allowEmptyString('dso_sdo_bso_moID');
//
//        $validator
//            ->scalar('rgi_district_code')
//            ->maxLength('rgi_district_code', 3)
//            ->allowEmptyString('rgi_district_code');
//
//        $validator
//            ->scalar('rgi_block_code')
//            ->maxLength('rgi_block_code', 6)
//            ->allowEmptyString('rgi_block_code');
//
//        $validator
//            ->integer('status')
//            ->allowEmptyString('status');
//
//        $validator
//            ->scalar('password_old')
//            ->maxLength('password_old', 40)
//            ->allowEmptyString('password_old');
//
//        $validator
//            ->integer('loginFlag')
//            ->allowEmptyString('loginFlag');
//
//        $validator
//            ->dateTime('lastLoginTime')
//            ->allowEmptyDateTime('lastLoginTime');
//
//        $validator
//            ->integer('loginStatus')
//            ->allowEmptyString('loginStatus');
//
//        $validator
//            ->scalar('passwordChangeFlag')
//            ->maxLength('passwordChangeFlag', 45)
//            ->allowEmptyString('passwordChangeFlag');
//
//        $validator
//            ->scalar('passwordChangeDate')
//            ->maxLength('passwordChangeDate', 45)
//            ->allowEmptyString('passwordChangeDate');
//
//        $validator
//            ->scalar('districtName')
//            ->maxLength('districtName', 100)
//            ->allowEmptyString('districtName');
//
//        $validator
//            ->scalar('blockName')
//            ->maxLength('blockName', 100)
//            ->allowEmptyString('blockName');
//
//        $validator
//            ->scalar('mobile_no')
//            ->maxLength('mobile_no', 10)
//            ->allowEmptyString('mobile_no');
//
//        $validator
//            ->integer('created_by')
//            ->allowEmptyString('created_by');
//
//        $validator
//            ->integer('modified_by')
//            ->allowEmptyString('modified_by');
//
//        return $validator;
//    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
//    public function buildRules(RulesChecker $rules)
//    {
//        $rules->add($rules->isUnique(['username']));
//        $rules->add($rules->isUnique(['email']));
//        $rules->add($rules->existsIn(['role_id'], 'Roles'));
//        $rules->add($rules->existsIn(['dso_master_id'], 'DsoMasters'));
//        $rules->add($rules->existsIn(['sdo_master_id'], 'SdoMasters'));
//        $rules->add($rules->existsIn(['bso_master_id'], 'BsoMasters'));
//        $rules->add($rules->existsIn(['mo_master_id'], 'MoMasters'));
//        $rules->add($rules->existsIn(['depot_master_id'], 'DepotMasters'));
//        $rules->add($rules->existsIn(['dmsfc_master_id'], 'DmsfcMasters'));
//        $rules->add($rules->existsIn(['group_id'], 'Groups'));
//        $rules->add($rules->existsIn(['district_id'], 'Districts'));
//        $rules->add($rules->existsIn(['block_city_id'], 'BlockCities'));
//        $rules->add($rules->existsIn(['sub_division_id'], 'SubDivisions'));
//
//        return $rules;
//    }
}

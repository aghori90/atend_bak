<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CfApplicantMembers_1 Model
 *
 * @property \App\Model\Table\VaccanciesTable&\Cake\ORM\Association\BelongsTo $Vaccancies
 *
 * @method \App\Model\Entity\CfApplicantMember get($primaryKey, $options = [])
 * @method \App\Model\Entity\CfApplicantMember newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CfApplicantMember[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CfApplicantMember|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CfApplicantMember saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CfApplicantMember patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CfApplicantMember[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CfApplicantMember findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CfApplicantMembersTable extends Table
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

        $this->setTable('cf_applicant_members');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Vaccancies', [
            'foreignKey' => 'vaccancy_id',
            'joinType' => 'INNER',
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
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('vaccancy_group')
            ->requirePresence('vaccancy_group', 'create')
            ->notEmptyString('vaccancy_group');

        $validator
            ->scalar('work_skill')
            ->allowEmptyString('work_skill');

        $validator
            ->scalar('post_name')
            ->maxLength('post_name', 255)
            ->allowEmptyString('post_name');

        $validator
            ->scalar('district_priority_by_post')
            ->maxLength('district_priority_by_post', 255)
            ->allowEmptyString('district_priority_by_post');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('name_hn')
            ->maxLength('name_hn', 255)
            ->allowEmptyString('name_hn');

        $validator
            ->scalar('fathername')
            ->maxLength('fathername', 255)
            ->allowEmptyString('fathername');

        $validator
            ->scalar('fathername_hn')
            ->maxLength('fathername_hn', 255)
            ->allowEmptyString('fathername_hn');

        $validator
            ->scalar('permanent_state')
            ->maxLength('permanent_state', 20)
            ->allowEmptyString('permanent_state');

        $validator
            ->scalar('permanent_district')
            ->maxLength('permanent_district', 20)
            ->allowEmptyString('permanent_district');

        $validator
            ->integer('permanent_pincode')
            ->allowEmptyString('permanent_pincode');

        $validator
            ->scalar('permanent_address')
            ->maxLength('permanent_address', 300)
            ->allowEmptyString('permanent_address');

        $validator
            ->scalar('temporary_state')
            ->maxLength('temporary_state', 20)
            ->allowEmptyString('temporary_state');

        $validator
            ->scalar('temporary_district')
            ->maxLength('temporary_district', 20)
            ->allowEmptyString('temporary_district');

        $validator
            ->integer('temporary_pincode')
            ->allowEmptyString('temporary_pincode');

        $validator
            ->scalar('temporary_address')
            ->maxLength('temporary_address', 300)
            ->allowEmptyString('temporary_address');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 10)
            ->requirePresence('mobile', 'create')
            ->notEmptyString('mobile');

        $validator
            ->date('dob')
            ->requirePresence('dob', 'create')
            ->notEmptyDate('dob');

        $validator
            ->integer('age')
            ->allowEmptyString('age');

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');

        $validator
            ->scalar('catagory')
            ->allowEmptyString('catagory');

        $validator
            ->scalar('university_name')
            ->maxLength('university_name', 50)
            ->allowEmptyString('university_name');

        $validator
            ->integer('passing_year')
            ->allowEmptyString('passing_year');

        $validator
            ->integer('graduation_total_marks')
            ->allowEmptyString('graduation_total_marks');

        $validator
            ->integer('graduation_obtain_marks')
            ->allowEmptyString('graduation_obtain_marks');

        $validator
            ->decimal('graduation_percentage')
            ->allowEmptyString('graduation_percentage');

        $validator
            ->integer('master_degree')
            ->allowEmptyString('master_degree');

        $validator
            ->scalar('master_degree_total_marks')
            ->maxLength('master_degree_total_marks', 3)
            ->allowEmptyString('master_degree_total_marks');

        $validator
            ->scalar('master_degree_obtain_marks')
            ->maxLength('master_degree_obtain_marks', 3)
            ->allowEmptyString('master_degree_obtain_marks');

        $validator
            ->scalar('master_degree_percentage')
            ->maxLength('master_degree_percentage', 3)
            ->allowEmptyString('master_degree_percentage');

        $validator
            ->integer('phd_degree')
            ->allowEmptyString('phd_degree');

        $validator
            ->scalar('phd_degree_total_marks')
            ->maxLength('phd_degree_total_marks', 3)
            ->allowEmptyString('phd_degree_total_marks');

        $validator
            ->scalar('phd_degree_obtain_marks')
            ->maxLength('phd_degree_obtain_marks', 3)
            ->allowEmptyString('phd_degree_obtain_marks');

        $validator
            ->scalar('phd_degree_percentage')
            ->maxLength('phd_degree_percentage', 3)
            ->allowEmptyString('phd_degree_percentage');

        $validator
            ->integer('retired_status')
            ->allowEmptyString('retired_status');

        $validator
            ->integer('consumer_forum_experience')
            ->allowEmptyString('consumer_forum_experience');

        $validator
            ->scalar('consumer_forum_address')
            ->maxLength('consumer_forum_address', 300)
            ->allowEmptyString('consumer_forum_address');

        $validator
            ->decimal('consumer_forum_duration')
            ->allowEmptyString('consumer_forum_duration');

        $validator
            ->integer('experience')
            ->allowEmptyString('experience');

        $validator
            ->scalar('experience_duration_month')
            ->maxLength('experience_duration_month', 3)
            ->allowEmptyString('experience_duration_month');

        $validator
            ->integer('experience_1')
            ->allowEmptyString('experience_1');

        $validator
            ->integer('experience_2')
            ->allowEmptyString('experience_2');

        $validator
            ->integer('experience_3')
            ->allowEmptyString('experience_3');

        $validator
            ->integer('experience_4')
            ->allowEmptyString('experience_4');

        $validator
            ->integer('experience_5')
            ->allowEmptyString('experience_5');

        $validator
            ->scalar('experience_1_duration')
            ->maxLength('experience_1_duration', 3)
            ->allowEmptyString('experience_1_duration');

        $validator
            ->scalar('experience_2_duration')
            ->maxLength('experience_2_duration', 3)
            ->allowEmptyString('experience_2_duration');

        $validator
            ->scalar('experience_3_duration')
            ->maxLength('experience_3_duration', 3)
            ->allowEmptyString('experience_3_duration');

        $validator
            ->scalar('experience_4_duration')
            ->maxLength('experience_4_duration', 3)
            ->allowEmptyString('experience_4_duration');

        $validator
            ->scalar('experience_5_duration')
            ->maxLength('experience_5_duration', 3)
            ->allowEmptyString('experience_5_duration');

        $validator
            ->integer('exp_duration_10yrs')
            ->allowEmptyString('exp_duration_10yrs');

        $validator
            ->scalar('experience_in_months')
            ->maxLength('experience_in_months', 3)
            ->allowEmptyString('experience_in_months');

        $validator
            ->integer('pds_st_dist_work')
            ->allowEmptyString('pds_st_dist_work');

        $validator
            ->scalar('pds_st_dist_work_address')
            ->maxLength('pds_st_dist_work_address', 255)
            ->allowEmptyString('pds_st_dist_work_address');

        $validator
            ->scalar('pds_st_dist_work_duration')
            ->maxLength('pds_st_dist_work_duration', 3)
            ->allowEmptyString('pds_st_dist_work_duration');

        $validator
            ->integer('exp_duration_15yrs')
            ->allowEmptyString('exp_duration_15yrs');

        $validator
            ->integer('exp_duration_15yrs_months')
            ->allowEmptyString('exp_duration_15yrs_months');

        $validator
            ->integer('exp_duration_20yrs')
            ->allowEmptyString('exp_duration_20yrs');

        $validator
            ->integer('exp_duration_20yrs_months')
            ->allowEmptyString('exp_duration_20yrs_months');

        $validator
            ->scalar('posting_districts')
            ->maxLength('posting_districts', 100)
            ->allowEmptyString('posting_districts');

        $validator
            ->scalar('district_priority_first')
            ->maxLength('district_priority_first', 20)
            ->allowEmptyString('district_priority_first');

        $validator
            ->scalar('district_priority_second')
            ->maxLength('district_priority_second', 20)
            ->allowEmptyString('district_priority_second');

        $validator
            ->scalar('district_priority_third')
            ->maxLength('district_priority_third', 20)
            ->allowEmptyString('district_priority_third');

        $validator
            ->integer('declaration_1')
            ->allowEmptyString('declaration_1');

        $validator
            ->integer('declaration_2')
            ->allowEmptyString('declaration_2');

        $validator
            ->integer('declaration_3')
            ->allowEmptyString('declaration_3');

        $validator
            ->integer('declaration_4')
            ->allowEmptyString('declaration_4');

        $validator
            ->integer('declaration_5')
            ->allowEmptyString('declaration_5');

        $validator
            ->integer('declaration_6')
            ->allowEmptyString('declaration_6');

        $validator
            ->integer('other_exp')
            ->allowEmptyString('other_exp');

        $validator
            ->scalar('other_exp_details')
            ->maxLength('other_exp_details', 100)
            ->allowEmptyString('other_exp_details');

        $validator
            ->scalar('other_exp_off_address')
            ->maxLength('other_exp_off_address', 100)
            ->allowEmptyString('other_exp_off_address');

        $validator
            ->integer('high_court_judge')
            ->allowEmptyString('high_court_judge');

        $validator
            ->scalar('high_court_name')
            ->maxLength('high_court_name', 50)
            ->allowEmptyString('high_court_name');

        $validator
            ->integer('high_court_exp')
            ->allowEmptyString('high_court_exp');

        $validator
            ->integer('age_proof_flag')
            ->allowEmptyString('age_proof_flag');

        $validator
            ->integer('graduation_proof_flag')
            ->allowEmptyString('graduation_proof_flag');

        $validator
            ->integer('graduation_marks_proof_flag')
            ->allowEmptyString('graduation_marks_proof_flag');

        $validator
            ->integer('master_certificate_flag')
            ->allowEmptyString('master_certificate_flag');

        $validator
            ->integer('phd_certificate_flag')
            ->allowEmptyString('phd_certificate_flag');

        $validator
            ->integer('experience_flag')
            ->allowEmptyString('experience_flag');

        $validator
            ->integer('profile_flag')
            ->allowEmptyFile('profile_flag');

        $validator
            ->integer('signature_flag')
            ->allowEmptyString('signature_flag');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->integer('form_verification')
            ->allowEmptyString('form_verification');

        $validator
            ->integer('document_verification')
            ->allowEmptyString('document_verification');

        $validator
            ->integer('marks_verification')
            ->allowEmptyString('marks_verification');

        $validator
            ->scalar('marks_reject_remarks')
            ->maxLength('marks_reject_remarks', 255)
            ->allowEmptyString('marks_reject_remarks');

        $validator
            ->scalar('remarks')
            ->maxLength('remarks', 100)
            ->allowEmptyString('remarks');

        $validator
            ->date('date')
            ->allowEmptyDate('date');

        $validator
            ->scalar('place')
            ->maxLength('place', 20)
            ->allowEmptyString('place');

        $validator
            ->integer('flag')
            ->allowEmptyString('flag');

        $validator
            ->integer('step_no')
            ->allowEmptyString('step_no');

        $validator
            ->scalar('registration_no')
            ->maxLength('registration_no', 40)
            ->allowEmptyString('registration_no')
            ->add('registration_no', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmptyString('registration_sl_no');

        $validator
            ->dateTime('submited_date')
            ->allowEmptyDateTime('submited_date');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['registration_no']));
        $rules->add($rules->existsIn(['vaccancy_id'], 'Vaccancies'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkshopSubscribers Model
 *
 * @property \App\Model\Table\WorshopsTable|\Cake\ORM\Association\BelongsTo $Worshops
 *
 * @method \App\Model\Entity\WorkshopSubscriber get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkshopSubscriber newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkshopSubscriber[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkshopSubscriber|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkshopSubscriber patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkshopSubscriber[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkshopSubscriber findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkshopSubscribersTable extends Table
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

        $this->setTable('workshop_subscribers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Worshops', [
            'foreignKey' => 'worshop_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('id', 'create');

        $validator
            ->integer('subscriber_email')
            ->requirePresence('subscriber_email', 'create')
            ->notEmpty('subscriber_email');

        $validator
            ->integer('subscriber_fullname')
            ->requirePresence('subscriber_fullname', 'create')
            ->notEmpty('subscriber_fullname');

        $validator
            ->integer('subscriber_company')
            ->requirePresence('subscriber_company', 'create')
            ->notEmpty('subscriber_company');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

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
        $rules->add($rules->existsIn(['worshop_id'], 'Worshops'));

        return $rules;
    }
}

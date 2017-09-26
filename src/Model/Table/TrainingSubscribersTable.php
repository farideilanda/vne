<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainingSubscribers Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $ItEditorSolutionTrainings
 *
 * @method \App\Model\Entity\TrainingSubscriber get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainingSubscriber newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TrainingSubscriber[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainingSubscriber|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainingSubscriber patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingSubscriber[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingSubscriber findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TrainingSubscribersTable extends Table
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

        $this->setTable('training_subscribers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ItEditorSolutionTrainings', [
            'foreignKey' => 'it_editor_solution_training_id',
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
            ->scalar('subscriber_fullname')
            ->requirePresence('subscriber_fullname', 'create')
            ->notEmpty('subscriber_fullname');

        $validator
            ->scalar('subscriber_email')
            ->requirePresence('subscriber_email', 'create')
            ->notEmpty('subscriber_email');

        $validator
            ->boolean('is_subscriber_company')
            ->requirePresence('is_subscriber_company', 'create')
            ->notEmpty('is_subscriber_company');

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
        $rules->add($rules->existsIn(['it_editor_solution_training_id'], 'ItEditorSolutionTrainings'));

        return $rules;
    }
}

<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItEditorSolutionTrainings Model
 *
 * @property \App\Model\Table\ItEditorSolutionsTable|\Cake\ORM\Association\BelongsTo $ItEditorSolutions
 * @property |\Cake\ORM\Association\HasMany $TrainingSubscribers
 *
 * @method \App\Model\Entity\ItEditorSolutionTraining get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItEditorSolutionTraining newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItEditorSolutionTraining[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItEditorSolutionTraining|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItEditorSolutionTraining patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItEditorSolutionTraining[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItEditorSolutionTraining findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItEditorSolutionTrainingsTable extends Table
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

        $this->setTable('it_editor_solution_trainings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ItEditorSolutions', [
            'foreignKey' => 'it_editor_solution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('TrainingSubscribers', [
            'foreignKey' => 'it_editor_solution_training_id'
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
            ->scalar('training_label')
            ->requirePresence('training_label', 'create')
            ->notEmpty('training_label');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->integer('training_duration')
            ->requirePresence('training_duration', 'create')
            ->notEmpty('training_duration');

        $validator
            ->dateTime('training_start')
            ->requirePresence('training_start', 'create')
            ->notEmpty('training_start');

        $validator
            ->scalar('training_description')
            ->allowEmpty('training_description');

        $validator
            ->scalar('training_visual_path')
            ->allowEmpty('training_visual_path');

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
        $rules->add($rules->existsIn(['it_editor_solution_id'], 'ItEditorSolutions'));

        return $rules;
    }
}

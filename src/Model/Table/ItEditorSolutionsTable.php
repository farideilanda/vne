<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItEditorSolutions Model
 *
 * @property \App\Model\Table\ItEditorsTable|\Cake\ORM\Association\BelongsTo $ItEditors
 * @property \App\Model\Table\ItEditorSolutionTrainingsTable|\Cake\ORM\Association\HasMany $ItEditorSolutionTrainings
 *
 * @method \App\Model\Entity\ItEditorSolution get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItEditorSolution newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItEditorSolution[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItEditorSolution|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItEditorSolution patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItEditorSolution[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItEditorSolution findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItEditorSolutionsTable extends Table
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

        $this->setTable('it_editor_solutions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ItEditors', [
            'foreignKey' => 'it_editor_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ItEditorSolutionTrainings', [
            'foreignKey' => 'it_editor_solution_id'
        ]);

        $this->hasMany('Quotes', [
            'foreignKey' => 'it_editor_solution_id'
        ]);

        $this->belongsToMany('ItSolutionTypes', [
            'foreignKey' => 'it_editor_solution_id',
            'targetForeignKey'=>'it_solution_type_id',
            'joinTable' => 'cross_solution_types'
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
            ->scalar('solution_label')
            ->requirePresence('solution_label', 'create')
            ->notEmpty('solution_label');

        $validator
            ->scalar('solution_alias')
            ->requirePresence('solution_alias', 'create')
            ->notEmpty('solution_alias');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->scalar('solution_picto')
            ->requirePresence('solution_picto', 'create')
            ->notEmpty('solution_picto');

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
        $rules->add($rules->existsIn(['it_editor_id'], 'ItEditors'));

        return $rules;
    }
}

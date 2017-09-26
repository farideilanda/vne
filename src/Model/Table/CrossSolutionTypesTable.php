<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CrossSolutionTypes Model
 *
 * @property \App\Model\Table\ItSolutionsTable|\Cake\ORM\Association\BelongsTo $ItSolutions
 * @property \App\Model\Table\ItSolutionTypesTable|\Cake\ORM\Association\BelongsTo $ItSolutionTypes
 *
 * @method \App\Model\Entity\CrossSolutionType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CrossSolutionType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CrossSolutionType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CrossSolutionType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CrossSolutionType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CrossSolutionType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CrossSolutionType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CrossSolutionTypesTable extends Table
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

        $this->setTable('cross_solution_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ItSolutions', [
            'foreignKey' => 'it_solution_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ItSolutionTypes', [
            'foreignKey' => 'it_solution_type_id',
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
        $rules->add($rules->existsIn(['it_solution_id'], 'ItSolutions'));
        $rules->add($rules->existsIn(['it_solution_type_id'], 'ItSolutionTypes'));

        return $rules;
    }
}

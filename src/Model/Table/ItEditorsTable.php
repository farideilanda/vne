<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItEditors Model
 *
 * @property \App\Model\Table\ItEditorSolutionsTable|\Cake\ORM\Association\HasMany $ItEditorSolutions
 *
 * @method \App\Model\Entity\ItEditor get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItEditor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItEditor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItEditor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItEditor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItEditor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItEditor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItEditorsTable extends Table
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

        $this->setTable('it_editors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ItEditorSolutions', [
            'foreignKey' => 'it_editor_id'
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
            ->scalar('editor_label')
            ->requirePresence('editor_label', 'create')
            ->notEmpty('editor_label');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }
}

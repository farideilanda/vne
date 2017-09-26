<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItEditorSolution Entity
 *
 * @property int $id
 * @property string $solution_label
 * @property string $solution_alias
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property int $it_editor_id
 * @property string $solution_picto
 *
 * @property \App\Model\Entity\ItEditor $it_editor
 * @property \App\Model\Entity\ItEditorSolutionTraining[] $it_editor_solution_trainings
 */
class ItEditorSolution extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

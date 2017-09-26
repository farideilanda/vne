<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItEditorSolutionTraining Entity
 *
 * @property int $id
 * @property string $training_label
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property int $training_duration
 * @property \Cake\I18n\FrozenTime $training_start
 * @property int $it_editor_solution_id
 * @property string $training_description
 * @property string $training_visual_path
 *
 * @property \App\Model\Entity\ItEditorSolution $it_editor_solution
 */
class ItEditorSolutionTraining extends Entity
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

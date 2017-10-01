<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

use App\Controller\AppController;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event){
        parent::initialize($event);
    }

    public function index(){

    }

    public function home(){}

    public function solution(){
    	if($this->request->is('ajax')){
    		$query = $this->request->query;

    		$action = $query['action'];
            $this->loadModel('ItEditorSolutions');
    		$this->loadModel('ItSolutionTypes');

    		switch($action){
    			case 'get-solutions-crop':
                  $solutions = $this->ItSolutionTypes->find()->contain(['ItEditorSolutions'=>function($q){
                    return $q->limit(10);
                  }])
                  ->where(['ItSolutionTypes.id'=>1]);
                  
                  $this->RequestHandler->renderAs($this, 'json');
                  $this->set(compact('solutions'));
                  $this->set('_serialize',['solutions']);
    			break;

                case 'get-trainings-crop':
                  $trainings = $this->ItSolutionTypes->find()->contain(['ItEditorSolutions'=>function($q){
                    return $q->limit(10);
                             // ->Where(['ItEditorSolutions.']);
                  }])
                  ->where(['ItSolutionTypes.id'=>2]);
                  
                  $this->RequestHandler->renderAs($this, 'json');
                  $this->set(compact('trainings'));
                  $this->set('_serialize',['trainings']);
                break;

                case 'solution_info':
                    $this->render('/Element/solution-software/'.$query['object']);
                break;

                case 'training_info':
                    $this->render('/Element/training-software/'.$query['object']);
                break;
    		}

    	}
    }

    public function workshop(){
      if($this->request->is('ajax')){
        
      }
    }


}

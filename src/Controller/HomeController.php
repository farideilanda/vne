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
use Pheanstalk\Pheanstalk;
use App\Controller\AppController;
use Cake\Network\Exception;
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
        if(!$this->request->is('ajax'))
        {

            if(!$this->Cookie->check('banner'))
            {
                $this->Cookie->configKey('banner',[
                    'expires' => '+1 day',
                    'httpOnly' => true,
                ]);

                $this->Cookie->write('banner','undone');
            }
            else
                $this->Cookie->write('banner','done');

            $this->request->params['action'] = 'index';
        }


    }

    public function index(){

    }

    public function bannerState(){
        if($this->request->is('ajax')){

            try{
                $banner_state = $this->Cookie->read('banner');
                $this->RequestHandler->renderAs($this, 'json');

                $this->set(compact('banner_state'));
                $this->set('_serialize',['banner_state']);
            } catch(Exception $e){
                 throw new Exception\NotFoundException(__('Not Found'));
            }

        }
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
                    return $q->limit(8);
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
          if($this->request->is('get')){
            $query_data = $this->request->query;
            $this->loadModel('Workshops');
            switch($query_data['action']){
              case 'poster':
                 try{
                       $actual_date  = new \DateTime();
                       $format_actual_date  = $actual_date->format('Y-m-d H:i:s');
                       $poster = $this->Workshops->find()
                                           ->where(['Workshops.workshop_begin >= '=>$format_actual_date])
                                           ->order(['Workshops.created'=>'asc'])
                                           ->first();

                       if($poster)
                       {
                         $begin_date = new \DateTime($poster->workshop_begin); 
                         $poster->ref_month = $begin_date->format('m');
                       }                    

                       $this->RequestHandler->renderAs($this, 'json');
                       $this->set(compact('poster'));
                       $this->set('_serialize',['poster']);
                 }catch(Exception $e){
                  throw new Exception\BadRequestException(__('Bad Request'));
                 }
              break;

              case 'slider':
                  try{
                      $workshops =  $this->Workshops->find()
                                           ->order(['Workshops.created'=>'desc'])
                                           ->limit(4)
                                           ->map(function($row){
                                                $begin_date = new \DateTime($row->workshop_begin); 
                                                $row->ref_month = $begin_date->format('m');
                                                return $row;
                                           });

                       $this->RequestHandler->renderAs($this, 'json');
                       $this->set(compact('workshops'));
                       $this->set('_serialize',['workshops']);
                  }catch(Exception $e){
                    throw new Exception\BadRequestException(__('Bad Request'));
                  }
              break;
            }

          }
      }
    }

    public function quote(){
      if($this->request->is('ajax')){
        if($this->request->is('get')){
          $query_data = $this->request->query;

          switch($query_data['action'])
          {
            case "get_assets":

                  $this->loadModel('ItSolutionTypes');
                  $this->loadModel('ItEditorSolutions');

                  $solution_types  = $this->ItSolutionTypes->find();
                  $cross_solution_types = $this->ItEditorSolutions->find()->contain(['ItSolutionTypes'])->distinct('id');

                  $this->RequestHandler->renderAs($this, 'json');
                  $this->set(compact('solution_types','cross_solution_types'));
                  $this->set('_serialize',['solution_types','cross_solution_types']);
            break;
          }
        }


        if($this->request->is('post')){
          $data = $this->request->data;
          $this->loadModel('Quotes');
          $quote = $this->Quotes->newEntity($data);

          if(empty($quote->errors()))
          {
            try{
                //save the quote
                if($this->Quotes->save($quote))
                {
                  // send the quote into the tube
                  $pheanstalk = new Pheanstalk('127.0.0.1');
                  $payload = ['quote'=>$quote];
                  $pheanstalk
                  ->useTube('quoteTubeVne')
                  ->put(json_encode($payload));

                  $this->RequestHandler->renderAs($this, 'json');
                  $this->set(compact('quote'));
                  $this->set('_serialize',['quote']);
                }else
                {
                   throw new Exception\BadRequestException(__('Bad Request'));
                }


                }catch(Exception $e){
                   throw new Exception\BadRequestException(__('Bad Request'));
                }
          }else
            throw new Exception\UnauthorizedException(__('Unauthorized'));

        }


      }
    }


}

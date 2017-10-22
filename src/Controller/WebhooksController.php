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

use Mpociot\BotMan\BotManFactory;
use Mpociot\BotMan\BotMan;


use Cake\Http\Client;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class WebhooksController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event){
        parent::initialize($event);
    }


    public function bot(){

        if($this->request->is('get')){
            $bot_token = Configure::read('FaceBookMessengerBot.verification');
            $response = $this->request->params['?']['hub_challenge'];

            if($bot_token === $this->request->params['?']['hub.token'])
            {
                echo $response;
                exit();
            }else
            {
                throw new Exception\BadRequestException(__('Bad Request'));
            }

        }

        if($this->request->is('post')){
            // $botman = BotManFactory::create(Configure::read('FaceBookMessengerBot'));
            // $botman->hears('hello', function (BotMan $bot) {
            //     $bot->reply('Hello yourself.');
            // });
            // $botman->listen();

            if($this->request->data['entry'][0]['messaging'][0]['message']['text'])
              {
                    $sender_id = $this->request->data['entry'][0]['messaging'][0]['sender']['id'];
                    $client = new Client();
                    $token = Configure::read('FaceBookMessengerBot.token');
                    $data = [
                        'recipient' => ['id'=>$sender_id],
                       'message' => ['text' => 'Bonjour']
                    ];
                    $client->post("https://graph.facebook.com/v2.6/me/messages?access_token=".$token,json_encode($data),['type'=>'json']);
              }

            exit();
        }

    }   

}

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


    public function facebook(){

        if($this->request->is('get')){
            $request_params = $this->request->params;
            $challenge = $request_params['?']['hub_challenge'];

            $challenge_verification = $request_params['?']['hub_verify_token'];
            $tonio_challenge = Configure::read('FaceBookMessengerBot.verification');

            if($tonio_challenge === $challenge_verification)
            {
              echo $challenge;
              exit(); 
            }
            else
              throw new ForbiddenException(__('forbidden'));
        }

        if($this->request->is('post')){
            $messaging_params = $this->request->data['entry'][0];
            // debug($request_params);
            // die();

            $facebook_messenger_token = Configure::read('FaceBookMessengerBot.token');

            // answer to messages initiate by visitor
            if(isset($messaging_params['messaging'][0]))
            {
                $sender_id = $messaging_params['messaging'][0]['sender']['id'];

                if(isset( $messaging_params['messaging'][0]['message']['is_echo'])){

                }
                else
                {
                    if(isset($messaging_params['messaging'][0]['message']))
                    {
                        $visitor_message = $messaging_params['messaging'][0]['message'];
                        $data = [
                            "messaging_type" => 'RESPONSE',
                            "recipient" => [
                                "id" => $sender_id
                            ],
                            "message" => [
                                "attachment" => [
                                    "type" => "template",
                                    "payload" => [
                                        "template_type" => "generic",
                                        "sharable" => true,
                                        "elements" => [
                                            [
                                                "title" => "Bienvenue à VNE, ici TONIO pour vous servir",
                                                "subtitle" => "Veuillez choisir une réponse afin que je puisse vous aider.",
                                                "image_url" => "https://farm5.staticflickr.com/4519/24614577248_f2af84cc1f_m.jpg",
                                                "buttons" => [
                                                    ["type"=>"web_url","url"=>"https://vne-ci.com","title"=>"Accéder au site web"],
                                                    ["type"=>"postback","title"=>"Discuter avec TONIO","payload"=>"start wizard"]
                                                ]
                                            ],

                                        ]
                                    ]
                                ]
                            ]
                        ];
                    }

                    if(isset($messaging_params['messaging'][0]['postback']))
                    {
                        $postback_payload = $messaging_params['messaging'][0]['postback']['payload'];
                        $postback_title = $messaging_params['messaging'][0]['postback']['title'];

                        switch($postback_payload){
                            case 'start wizard':
                                $data = [
                                    "messaging_type" => 'RESPONSE',
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "attachment" => [
                                            "type" => "template",
                                            "payload" => [
                                                "template_type" => "list",
                                                "top_element_style" => "compact",
                                                "elements" => [
                                                    [
                                                        "title"=>"Choix de sélection",
                                                        "subtitle" => "Veuillez choisir un pôle de compétences",
                                                    ],
                                                    [
                                                        "title"=>"Intégration Informatique",
                                                        "subtitle" => "Bénéficiez du meilleur de l'innovation technologique",
                                                        "image_url" => "https://farm5.staticflickr.com/4527/26712423939_31aec32a07_s.jpg",
                                                        "buttons" => [
                                                            [
                                                                "title" => "Intégration",
                                                                "type" => "postback",
                                                                "payload" => "I"
                                                            ]
                                                        ]
                                                    ],
                                                    [
                                                        "title"=>"Formations & certifications",
                                                        "subtitle" => "Optimisez votre profil",
                                                        "image_url" => "https://farm5.staticflickr.com/4535/37601246445_51ce58079b_s.jpg",
                                                        "buttons" => [
                                                            [
                                                                "title" => "Formations & certifications",
                                                                "type" => "postback",
                                                                "payload" => "FC"
                                                            ]
                                                        ]
                                                    ],
                                                    [
                                                        "title"=>"Services",
                                                        "subtitle" => "Appuyez-vous sur le meilleur!",
                                                        "image_url" => "https://farm5.staticflickr.com/4566/37773095054_762e8b770a_s.jpg",
                                                        "buttons" => [
                                                            [
                                                                "title" => "Services",
                                                                "type" => "postback",
                                                                "payload" => "S"
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ];
                            break;

                            case 'I':
                                    $data = [
                                        "messaging_type" => 'RESPONSE',
                                        "recipient" => [
                                            "id" => $sender_id
                                        ],
                                        "message" => [
                                            "attachment" => [
                                                "type" => "template",
                                                "payload" => [
                                                    "template_type" => "list",
                                                    "top_element_style" => "compact",
                                                    "elements" => [
                                                        [
                                                            "title"=>"Quel est votre domaine d'activité",
                                                            "subtitle" => "Veuillez choisir un élément dans la liste proposé",
                                                        ],
                                                        [
                                                            "title"=>"Technologie & Industrie",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Technologie & Industrie",
                                                                    "type" => "postback",
                                                                    "payload" => "I1"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Banques & Commerces",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Banques/Finances",
                                                                    "type" => "postback",
                                                                    "payload" => "I1"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Autre",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Autres",
                                                                    "type" => "postback",
                                                                    "payload" => "I1"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
                            break;

                            case 'I1':
                                     $data = [
                                                  "messaging_type" => 'RESPONSE',
                                                    "recipient" => [
                                                        "id" => $sender_id
                                                    ],
                                                    "message" => [
                                                        "attachment" => [
                                                            "type" => "template",
                                                            "payload" => [
                                                                "template_type" => "list",
                                                                "top_element_style" => "compact",
                                                                "elements" => [
                                                                    [
                                                                        "title"=>"Quelle est la taille de votre entreprise",
                                                                        "subtitle" => "Veuillez choisir un élément dans la liste proposé",
                                                                    ],
                                                                    [
                                                                        "title"=>"5-50",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "Petite",
                                                                                "type" => "postback",
                                                                                "payload" => "I2"
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    [
                                                                        "title"=>"50-100",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "Moyenne",
                                                                                "type" => "postback",
                                                                                "payload" => "I2"
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    [
                                                                        "title"=>"+100",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "grande",
                                                                                "type" => "postback",
                                                                                "payload" => "I2"
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ];
                            break;


                            case 'I2':
                                     $data = [
                                                  "messaging_type" => 'RESPONSE',
                                                    "recipient" => [
                                                        "id" => $sender_id
                                                    ],
                                                    "message" => [
                                                        "attachment" => [
                                                            "type" => "template",
                                                            "payload" => [
                                                                "template_type" => "list",
                                                                "top_element_style" => "compact",
                                                                "elements" => [
                                                                    [
                                                                        "title"=>"Intégrations",
                                                                        "subtitle" => "Quelle intégration souhaitez-vous optimiser ?",
                                                                    ],
                                                                    [
                                                                        "title"=>"BD & Sauvegarde",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "Valider",
                                                                                "type" => "postback",
                                                                                "payload" => "I3"
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    [
                                                                        "title"=>"Messagerie",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "Valider",
                                                                                "type" => "postback",
                                                                                "payload" => "I3"
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    [
                                                                        "title"=>"Sécurité & Système",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "Valider",
                                                                                "type" => "postback",
                                                                                "payload" => "I3"
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ],
                                                                "buttons" => [
                                                                        [
                                                                            "type" => "postback",
                                                                            "title" => "Autre",
                                                                            "payload" => "I3-1"
                                                                        ]
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ];
                            break;


                            case 'I3':
                                     $data = [
                                                  "messaging_type" => 'RESPONSE',
                                                    "recipient" => [
                                                        "id" => $sender_id
                                                    ],
                                                    "message" => [
                                                        "attachment" => [
                                                            "type" => "template",
                                                            "payload" => [
                                                                "template_type" => "list",
                                                                "top_element_style" => "compact",
                                                                "elements" => [
                                                                    [
                                                                        "title"=>"Intégrations",
                                                                        "subtitle" => "Bénéficiez-vous déjà d'une implémentation de ce type?",
                                                                    ],
                                                                    [
                                                                        "title"=>"Oui je dispose déjà d'une implémentation de ce type",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "Valider",
                                                                                "type" => "postback",
                                                                                "payload" => "I4"
                                                                            ]
                                                                        ]
                                                                    ],
                                                                    [
                                                                        "title"=>"Non, conseillez-moi une solution",
                                                                        "buttons" => [
                                                                            [
                                                                                "title" => "Valider",
                                                                                "type" => "postback",
                                                                                "payload" => "I4-1"
                                                                            ]
                                                                        ]
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ];
                            break;

                            case 'I4':
                                
                            break;

                            case 'FC':

                            break;

                            case 'S':

                            break;
                        }
                    }

                    //response 
                    $client = new Client();
                    $response = $client->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                }
            }

            exit();
        }


    }   

}

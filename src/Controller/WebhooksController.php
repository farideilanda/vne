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
                            case 'about us':
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
                                                "image_aspect_ratio" => "square",
                                                "elements" => [
                                                    //VNE description
                                                    [
                                                        "title"=>"Virtual Network Entreprise",
                                                        "subtitle" => "Intégrateur Ivoirien numéro 1 de solutions/formations/services informatiques.",
                                                        'image_url' => "https://vne-ci.com/img/assets/home/main-background-4.jpg",
                                                        'default_action' => [
                                                            "type" => "web_url",
                                                            "url" => "https://vne-ci.com"
                                                        ]
                                                    ],
                                                    [
                                                        "title"=>"Intégration Informatique",
                                                        "subtitle" => "Bénéficiez du meilleur de l'innovation technologique",
                                                        "image_url" => "https://farm5.staticflickr.com/4554/37782683294_4436d6ed24_c.jpg",
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
                                                        "image_url" => "https://farm5.staticflickr.com/4582/37782683644_b622d69fb6_c.jpg",
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
                                                        "image_url" => "https://farm5.staticflickr.com/4576/26722049849_d6609e9588_c.jpg",
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

                            case 'about contact us':
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "attachment" => [
                                            "type" => "template",
                                            "payload" => [
                                                "template_type" => "list",
                                                "elements" => [
                                                    [
                                                        "title" => "Contact",
                                                        "subtitle" => "Cocody Mermoz-Rue C10",
                                                        "image_url" => "https://farm5.staticflickr.com/4564/24625873528_f48bbcff64_c.jpg",
                                                        "buttons" => [
                                                            [
                                                            "type" => "web_url",
                                                            "url" => "https://www.google.com/maps/place/Virtual+Network+Entreprise/@5.3381146,-3.9966529,15z/data=!4m5!3m4!1s0x0:0xeeadcb66610f4566!8m2!3d5.3381146!4d-3.9966529",
                                                            "title" => "localisation"
                                                          ]
                                                        ]
                                                    ],
                                                    [
                                                        "title" => "Téléphone",
                                                        "subtitle" => "+225 22 48 88 82/48 21 94 94",
                                                        "image_url" => "https://farm5.staticflickr.com/4517/38466391752_70a72db2b2_c.jpg",
                                                    ],
                                                    [
                                                        "title" => "E-Mail",
                                                        "subtitle" => "info@vne-ci.com",
                                                        "image_url" => "https://farm5.staticflickr.com/4585/38470457182_288b8b5c00_c.jpg",
                                                    ],
                                                    [
                                                        "title" => "Web",
                                                        "subtitle" => "besoins de plus d'informations",
                                                        "image_url" => "https://farm5.staticflickr.com/4582/37783305784_a19e29bdb0_c.jpg",
                                                        "buttons" => [
                                                            [
                                                            "type" => "web_url",
                                                            "url" => "https://vne-ci.com",
                                                            "title" => "site web"
                                                            ]
                                                        ]
                                                    ],

                                                ]
                                            ]
                                        ]
                                    ]
                                ];  
                            break;

                            case "workshop":
                             try{
                                   $this->loadModel('Workshops');
                                   $actual_date  = new \DateTime();
                                   $format_actual_date  = $actual_date->format('Y-m-d H:i:s');
                                   $poster = $this->Workshops->find()
                                                       ->where(['Workshops.workshop_begin >= '=>$format_actual_date])
                                                       ->order(['Workshops.created'=>'asc'])
                                                       ->first();

                                       if($poster)
                                       {
                                         // debug($poster);
                                         // die();
                                         // $begin_date = new \DateTime($poster->workshop_begin); 
                                         // $poster->ref_month = $begin_date->format('m');

                                         $data = [
                                            "messaging_type" => "RESPONSE",
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
                                                                "title" => $poster->workshop_theme,
                                                                "subtitle" => $poster->workshop_short_description,
                                                                "image_url" => $poster->workshop_visual_path,
                                                                "buttons" => [
                                                                    [
                                                                        "type" => "web_url",
                                                                        "title" => "S'incrire",
                                                                        "url" => $poster->workshop_form_link
                                                                    ],
                                                                    [
                                                                        "type" => "web_url",
                                                                        "title" => "En savoir plus",
                                                                        "url" => "https://vne-ci.com/#workshops"
                                                                    ]
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                         ];

                                       }else
                                       {
                                        $data = [
                                            "messaging_type" => "RESPONSE",
                                            "recipient" => [
                                                "id" => $sender_id
                                            ],
                                            "message" => [
                                                "attachment" => [
                                                    "type" => "template",
                                                    "payload" => [
                                                        "template_type" => "generic",
                                                        "elements" => [
                                                            "title" => "désolé",
                                                            "subtitle" => "Il n'y a pas d'atelier à venir, mais vous pouvez voir les précédents",
                                                            "image_url" => "https://farm5.staticflickr.com/4530/24630547928_396fcc4662_c.jpg",
                                                            "buttons" => [
                                                                [
                                                                    "type" => "web_url",
                                                                    "title" => "voir les ateliers",
                                                                    "url" => "https://vne-ci.com/#workshops"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ];
                                       }                    

                                       $this->RequestHandler->renderAs($this, 'json');
                                       $this->set(compact('poster'));
                                       $this->set('_serialize',['poster']);
                                 }catch(Exception $e){
                                  throw new Exception\BadRequestException(__('Bad Request'));
                                 }
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
                                                            "title"=>"Intégration",
                                                            "subtitle" => "Veuillez choisir une proposition",
                                                        ],
                                                        [
                                                            "title"=>"Poursuivre avec un questionnaire détaillé",
                                                            "subtitle" => "Prenez juste 5 min pour nous décrire votre business",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Questionnaire",
                                                                    "type" => "web_url",
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUM1k3RUQyTVFYVlFDTDIySjdMTzZTWDI3OC4u"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Consulter le catalogue",
                                                            "subtitle" => "avoir une vue complète de l'ensemble des solutions proposées",
                                                            "image_url" => "https://farm5.staticflickr.com/4520/37622978385_e15ac8ab1e_c.jpg",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Catalogue",
                                                                    "type" => "web_url",
                                                                    "url" => "https://www.dropbox.com/s/u6pt0j7sys9dk7o/booklet_solutions_november_2017.pdf?dl=0"
                                                                 ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "start wizard"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
                            break;

                            case 'FC':
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
                                                            "title"=>"Formations & Certifications",
                                                            "subtitle" => "Veuillez choisir une proposition",
                                                        ],
                                                        [
                                                            "title"=>"Je suis intéressé(e) par les formations",
                                                            "subtitle" => "Je désire prendre part à une session de formation",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Formations",
                                                                    "type" => "postback",
                                                                    "payload" => "F"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Je suis intéressé(e) par les certifications",
                                                            "subtitle" => "Je désire me certifier au sein de VNE",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Certifications",
                                                                    "type" => "postback",
                                                                    "payload" => "C"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Consulter le catalogue",
                                                            "subtitle" => "avoir une vue complète de l'ensemble des cursus proposés",
                                                            "image_url" => "https://farm5.staticflickr.com/4568/37622978865_e2d3308064_c.jpg",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Catalogue",
                                                                    "type" => "web_url",
                                                                    "url" => "https://www.dropbox.com/s/5g9v8jx1n292thy/booklet_trainings_november_2017.pdf?dl=0"
                                                                 ]
                                                            ]
                                                        ]

                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
                            break;

                            case 'F':
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
                                                            "title"=>"Formations",
                                                            "subtitle" => "Veuillez choisir une proposition",
                                                        ],
                                                        [
                                                            "title"=>"Poursuivre avec un questionnaire détaillé",
                                                            "subtitle" => "Afin de vous encadrer de la meilleure des manières",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Questionnaire",
                                                                    "type" => "web_url",
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUQ0pFV1RJWFVZR1o3OTJQT0dTRkIxRTJSUC4u"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "start wizard"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
                            break;

                            case 'C':
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
                                                            "title"=>"Certifications",
                                                            "subtitle" => "Veuillez choisir une proposition",
                                                        ],
                                                        [
                                                            "title"=>"Poursuivre avec un questionnaire détaillé",
                                                            "subtitle" => "Afin de vous encadrer de la meilleure des manières",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Questionnaire",
                                                                    "type" => "web_url",
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "start wizard"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
                            break;

                            case 'S':
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
                                                            "title"=>"Services",
                                                            "subtitle" => "Veuillez choisir une proposition",
                                                        ],
                                                        [
                                                            "title"=>"Poursuivre avec un questionnaire détaillé",
                                                            "subtitle" => "Prenez juste 5 min pour nous décrire votre business",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "Questionnaire",
                                                                    "type" => "web_url",
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRURVRGQk01SkNFRVJYTTFUVlZETThVT1NYMC4u"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "start wizard"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
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

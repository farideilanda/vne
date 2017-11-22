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
use Cake\Cache\Cache;

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

            $facebook_messenger_token = Configure::read('FaceBookMessengerBot.token');

            // answer to messages initiate by visitor
            if(isset($messaging_params['messaging'][0]))
            {
                //checking fileCache
                $sender_id = $messaging_params['messaging'][0]['sender']['id'];
                if(!Cache::read($sender_id,'FacebookPsid')){
                    //get profile informations
                    $client_1 = new Client();
                    $request_profile_informations = $client_1->get('https://graph.facebook.com/v2.6/'.$sender_id.'?fields=first_name,last_name,profile_pic&access_token='.$facebook_messenger_token);
                    $profile_sender = $request_profile_informations->json;
                    Cache::write($sender_id,$profile_sender,'FacebookPsid');
                }
                else
                {
                    $profile_sender = Cache::read($sender_id,'FacebookPsid');
                }

                //recap bot answreing messages
                if(isset( $messaging_params['messaging'][0]['message']['is_echo'])){
                    exit();
                }
                else
                {
                    //visitor message analyzer
                    if( (isset($messaging_params['messaging'][0]['message'])) && (!isset($messaging_params['messaging'][0]['message']['quick_reply'])) )
                    {
                        $visitor_message = $messaging_params['messaging'][0]['message'];
                        $matching_response = false;

                        //salutation
                        if(preg_match("#(bonj[aoiu]|hel[lo]|sal[ui]|hi)+#i", $visitor_message['text']))
                        {
                            if(preg_match("#tonio[a-z]*#i", $visitor_message['text']))
                            {
                                if(preg_match("#vu(.)*(giscard|boss|momo|koués|rose)+#i", $visitor_message['text']))
                                {
                                   $message = "Salut ".$profile_sender['first_name']." Hop tu sais il faudrait demander à Madame AUGENDRE, moi je suis dans le web, au cas où je vois l'un d'eux je passerais le message!"; 
                                }
                                else
                                $message = "Salut ".$profile_sender['last_name']." ".$profile_sender['first_name']." comment allez-vous ? On se connait on dirais, comment pourrais-je vous aider?";
                            }
                            else
                                  $message = "Salut ".$profile_sender['last_name']." ".$profile_sender['first_name']." comment allez-vous ? Je m'appele TONIO , comment puis-je vous aider?";
                            $data = [
                                "messaging_type" => "RESPONSE",
                                "recipient" => [
                                    "id" => $sender_id
                                ],
                                "message" => [
                                    "text" => $message
                                ]
                            ];  

                            $client_2 = new Client();
                            $client_2->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                            $matching_response = true;

                        }
                        //materiel cotation
                          //tag search 1
                          if(preg_match("#(.)*(ven[-a-z]*|ach[a-z]*|pay[a-z]*|acque[a-z]*|avoir|offri[a-z]*|voud[a-z]*|desi[a-z]*|souhai[a-z]+)+(.)*(mat[éèe]*ri[eèé]*[a-z]*|ordi[a-z]*|table[a-z]*|impri[a-z]*|consom[a-z]|sour[ris]*|accessoi[a-z]+|serv[a-z]*)+#i", $visitor_message['text'])){
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "Bien sûre ".$profile_sender['last_name']."! VNE vends du matériel informatique d'origine et à des prix très intéressants. Il suffit juste de remplir les infos pour demander une cotation."
                                    ]
                                ];  

                                $data_2 =[
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
                                                    [
                                                        "title" => "Achats de matériel/consommables",
                                                        "subtitle" => "VNE fournit à sa clientèle du matériel d'origine, à des prix très intéressants",
                                                        "image_url" => "https://vne-ci.com/img/assets/home/main-background-7.jpg",
                                                        "buttons" => [
                                                            [
                                                                "type"=>"web_url",
                                                                "url"=>"https://vne-ci.com",
                                                                "title"=>"Cotation"
                                                            ],
                                                            ["type"=>"postback","title"=>"Non merci, plus tard!","payload"=>"none"]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ];

                                $client_2 = new Client();
                                $client_2->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);

                                $client_3 = new Client();
                                $client_3->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data_2),['type'=>'json']);
                                $matching_response = true;
                            }

                        //formations & certifications
                            //tag search 1
                            if(preg_match("#(.)*(obtenir|d[éeè]*sir[éeè]*|com[mdt]+ent|savoir|avoir|voud[a-z]+|veu[a-z]+|info[a-z]*|dispen[serés]+|form[a-z]+|souhai[a-z]+)+(.)*([^in]form[a-z]*|certif[a-z]*|cursus|pass[a-z]+|fair[e]?|r[éèert]*alis[éèert]*|cisco|cisa|isaca|php|d[ée]+velop[a-z]+|window[a-z]+|sql|oracle|hack[a-z]+|exc[a-z]+|wor[a-z]+|bureaut[a-z]+|ceh|cscu|cnd|lpt|of[f]*ice[0-9]*)+(.)*(cisco|cisa|isaca|php|d[ée]+velop[a-z]+|window[a-z]+|sql|oracle|hack[a-z]+|exc[a-z]+|wor[a-z]+|bureaut[a-z]+|ceh|cscu|cnd|lpt|of[f]*ice[0-9]*)*#i", $visitor_message['text']))
                                {

                                if(preg_match('#(.)*(obtenir|d[éeè]*sir[éeè]*|com[mdt]+ent|savoir|avoir|voud[a-z]+|veu[a-z]+|info[a-z]*|dispen[serés]+|form[a-z]+|souhai[a-z]+)+(.)*([^in]form[a-z]*|certif[a-z]*|pass[a-z]+|fair[e]?|cisco|cisa|isaca|php|d[ée]+velop[a-z]+|window[a-z]+|sql|oracle|hack[a-z]+|exc[a-z]+|wor[a-z]+|bureaut[a-z]+|ceh|cscu|cnd|lpt|of[f]*ice[0-9]*)+#i', $visitor_message['text'])){

                                    if(preg_match("#(cisco|cisa|isaca|php|d[ée]+velop[a-z]+|window[a-z]+|sql|oracle|hack[a-z]+|exc[a-z]+|wor[a-z]+|bureaut[a-z]+|ceh|cscu|cnd|lpt|of[f]*ice[0-9]*)#i",$visitor_message['text'])){

                                           preg_match_all("#(cisco|cisa|isaca|php|d[ée]+velop[a-z]+|window[a-z]+|sql|oracle|hack[a-z]+|exc[a-z]+|wor[a-z]+|bureaut[a-z]+|ceh|cscu|cnd|lpt|of[f]*ice[0-9]*)#i", $visitor_message['text'], $matches);

                                            if(preg_match("#certi[a-z]+#i", $visitor_message['text']))
                                            {
                                                $frag_sentence = "vous certifier";
                                                $visitor_message['postback_reference'] = "certification_reply";
                                                $visitor_message['postback_item'] = $matches[0][0];
                                                Cache::write($sender_id,$visitor_message,'FacebookConversation');
                                            }
                                            else if(preg_match("#form[a-z]+#i", $visitor_message['text']))
                                            {
                                                $frag_sentence = "vous former";
                                                $visitor_message['postback_item'] = $matches[0][0];
                                                $visitor_message['postback_reference'] = "formation_reply";
                                                Cache::write($sender_id,$visitor_message,'FacebookConversation');
                                            }
                                            else
                                            {
                                                $visitor_message['postback_item'] = $matches[0][0];
                                                
                                                $frag_sentence = "poursuivre un cursus de formation/certification";
                                                $visitor_message['postback_reference'] = "general_reply";
                                                Cache::write($sender_id,$visitor_message,'FacebookConversation');
                                            }

                                            $message = "Si jai bien compris vous souhaiteriez ".$frag_sentence." dans le module ".$matches[0][0]."?";

                                            $data = [
                                                    "messaging_type" => "RESPONSE",
                                                    "recipient" => [
                                                        "id" => $sender_id
                                                    ],
                                                    "message" => [
                                                        "text" => $message,
                                                        "quick_replies" => [
                                                            [
                                                                "content_type" => "text",
                                                                "title" => "Oui",
                                                                "payload" => "training_reply"
                                                            ],
                                                            [
                                                                "content_type" => "text",
                                                                "title" => "Non",
                                                                "payload" => "abort_training_reply"
                                                            ]
                                                        ]
                                                    ]
                                                ]; 
                                               $client = new Client(['host'=>'graph.facebook.com/v2.6/me','scheme'=>'https']);
                                               $client->post('/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                                     }
                                     else
                                        {
                                             $data = [
                                                    "messaging_type" => "RESPONSE",
                                                    "recipient" => [
                                                        "id" => $sender_id
                                                    ],
                                                    "message" => [
                                                        "text" => "Vous avez frappé à la bonne porte! Virtual Network Entreprise est un leader dans le domaine de la formation/certification puisqu'elle est centre de test Pearson VUE, Krytérion et Prometric-Avec VNE vous bénéficiez de formateurs certifiés et d'un cadre équipé ajouté au fait que vous pouvez vous former et vous certifier au même endroit! ",
                                                        "quick_replies" => [
                                                            [
                                                                "content_type" => "text",
                                                                "title" => "voir les catalogues",
                                                                "payload" => "FC"
                                                            ],
                                                            [
                                                                "content_type" => "text",
                                                                "title" => "souscrire à un cursus",
                                                                "payload" => "FC"
                                                            ],
                                                            [
                                                                "content_type" => "text",
                                                                "title" => "contacter VNE",
                                                                "payload" => "about contact us"
                                                            ]
                                                        ]
                                                    ]
                                                ]; 
                                               $client = new Client(['host'=>'graph.facebook.com/v2.6/me','scheme'=>'https']);
                                               $client->post('/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                                        }
                                }
                                else
                                {
                                        $data = [
                                            "messaging_type" => "RESPONSE",
                                            "recipient" => [
                                                "id" => $sender_id
                                            ],
                                            "message" => ""
                                        ];  
                                        //convivial text
                                        $data['message'] = [
                                            "text" => "Virtual Network Entreprise dispose d'un catalogue de formations/certifications riche et variés en plus d'un cadre équipé ainsi que d'encadreurs certifiés afin pour vous accompagner dans l'amélioration de votre profil.",
                                            "quick_replies" => [
                                                [
                                                    "content_type" => "text",
                                                    "title" => "voir les catalogues",
                                                    "payload" => "FC"
                                                ],
                                                [
                                                    "content_type" => "text",
                                                    "title" => "souscrire à un cursus",
                                                    "payload" => "FC"
                                                ],
                                                [
                                                    "content_type" => "text",
                                                    "title" => "contacter VNE",
                                                    "payload" => "about contact us"
                                                ]
                                            ]
                                        ];
                                        $client = new Client(['host'=>'graph.facebook.com/v2.6/me','scheme'=>'https']);
                                        $client->post('/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);

                                }
                               $matching_response = true;
                            }

                        //services
                            //tag search 1
                            if(preg_match("#(.)*(obtenir|d[éeè]*sir[éeè]*|comment|savoir|avoir|voud[a-z]+|veu[a-z]+|info[a-z]*|souhai[tesrain]+)+(.)*(site|w[éèe]+b|service[s]+|sav[^a-z]|d[éèe]*velop[ppments]+|cons[eils]+|logicie[ls]*|as[s]*is[slrmp]*tan[caens])+#i", $visitor_message['text']))
                            {
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "VNE ce sont aussi des services adaptés comme le développement web/mobile, un service de dépannage, de maintenance et aussi des conseils. comment puis-je vous aider?",
                                        "quick_replies" => [
                                            [
                                                "content_type" => "text",
                                                "title" => "développement",
                                                "payload" => "development"
                                            ],
                                            [
                                                "content_type" => "text",
                                                "title" => "maintenance",
                                                "payload" => "maintenance"
                                            ],
                                            [
                                                "content_type" => "text",
                                                "title" => "Dépannage",
                                                "payload" => "depannage"
                                            ],

                                            [
                                                "content_type" => "text",
                                                "title" => "conseils",
                                                "payload" => "advices"
                                            ]
                                        ]
                                    ]
                                ];

                                $client = new Client();
                                $client->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                                $matching_response = true;

                            }

                        //ateliers 
                            //tag search 1
                            if(preg_match("#(.)*(obtenir|d[éeè]*sir[éeè]*|comment|savoir|avoir|voud[a-z]+|veu[a-z]+|info[a-z]*|inscri[restsptions]|partici[pér]+|fai[ers]+|souhai[a-z]+|r[éèert]*alis[éèert]*)+(.)*(ateli[éèers]+)+#i", $visitor_message['text'])){

                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "Les ateliers VNE sont le moyen de pouvoir être informé des dernières innnovations et de rencontrer des personnes influentes du secteur",
                                        "quick_replies" => [
                                            [
                                                "content_type" => "text",
                                                "title" => "participer à un atelier",
                                                "payload" => "workshop"
                                            ],
                                            [
                                                "content_type" => "text",
                                                "title" => "combien ça coûte?",
                                                "payload" => "workshop pricing"
                                            ],
                                            [
                                                "content_type" => "text",
                                                "title" => "non, plus tard!",
                                                "payload" => "none"
                                            ]
                                        ]
                                    ]
                                ];

                                $client = new Client();
                                $client->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                                $matching_response = true;

                            }


                        //congratulations
                        if(preg_match("#^(merci[a-z]*|yeah|yo|ok|super)+#i", $visitor_message['text'])){
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "Je vous en prie ".$profile_sender['last_name']
                                    ]
                                ];

                                $client = new Client();
                                $client->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                                $matching_response = true;
                        }

                        //calling bot
                        if(preg_match("#^tonio#i", $visitor_message['text'])) 
                        {
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => ""
                                ];

                            if(preg_match("#(.)*(veu[a-z]+|d[éèe]sir[éèe]|ai|voud[a-z]+)+(.)*(manger|faim|dalle)+#i", $visitor_message['text']))
                            {
                                $data["message"] = [
                                        "text" => $profile_sender['last_name']." il faudrait demander à Ephra, et je t'ai rien dit...si Kouassi n'a pas déjà fait le ménage!"
                                ];
                            }
                            else
                            {
                                $data["message"] = [
                                        "text" => "Oui ".$profile_sender['last_name']."! je vois que tu connais mon nom, je sens qu'on va bien s'entendre"
                                ];
                            }


                                $client = new Client();
                                $client->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                                $matching_response = true; 
                        }


                        //if none found
                        if(!$matching_response)
                        {
                            $data = [
                                "messaging_type" => "RESPONSE",
                                "recipient" => [
                                    "id" => $sender_id
                                ],
                                "message" => [
                                    "text" => "désolé je ne comprends pas votre message, veuillez reformuler votre message ou vous réferrer au menu persistant pour me demander un renseignement."
                                ]
                            ];

                            $client_2 = new Client();
                            $client_2->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);
                            $matching_response = true;

                        }
                        exit(); 
                    }

                    //visitor message postback
                    if(isset($messaging_params['messaging'][0]['postback']) || isset($messaging_params['messaging'][0]['message']['quick_reply']))
                    {
                        if(isset($messaging_params['messaging'][0]['postback']))
                          $postback_payload = $messaging_params['messaging'][0]['postback']['payload'];
                        else
                        {
                          $postback_payload = $messaging_params['messaging'][0]['message']['quick_reply']['payload'];
                        }


                        switch($postback_payload){
                            //general wizrd
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
                                                "template_type" => "generic",
                                                "elements" => [
                                                    [
                                                        "title" => "Comment pourrais-je vous aider?",
                                                        "subtitle" => "Je m'appele TONIO, Robot à VNE et présent pour répondre à toutes vos questions.",
                                                        "image_url" => "https://farm5.staticflickr.com/4519/24614577248_f2af84cc1f.jpg"
                                                    ],
                                                    [
                                                        "title"=>"Intégration Informatique",
                                                        "subtitle" => "Bénéficiez du meilleur de l'innovation technologique",
                                                        "image_url" => "https://farm5.staticflickr.com/4554/37782683294_4436d6ed24_c.jpg",
                                                        "buttons" => [
                                                            [
                                                                "type" => "postback",
                                                                "title" => "Intégration",
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
                                                                "type" => "postback",
                                                                "title" => "Formations & certifications",
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
                                                                "type" => "postback",
                                                                "title" => "Services",
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
                                                            "url" => "https://vne-ci.com",
                                                            "messenger_extensions" => true,
                                                            "webview_height_ratio" => "full",
                                                            "fallback_url" => "https://vne-ci.com"
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
                                                            "title" => "site web",
                                                            "messenger_extensions" => true,
                                                            "webview_height_ratio" => "full",
                                                            "fallback_url" => "https://vne-ci.com"

                                                            ]
                                                        ]
                                                    ],

                                                ]
                                            ]
                                        ]
                                    ]
                                ];  
                            break;
                            //workshop general wizard
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
                                                                        "url" => $poster->workshop_form_link,
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => $poster->workshop_form_link
                                                                    ],
                                                                    [
                                                                        "type" => "web_url",
                                                                        "title" => "En savoir plus",
                                                                        "url" => "https://vne-ci.com/#workshops",
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => "https://vne-ci.com/#workshops"
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
                                                                    "url" => "https://vne-ci.com/#workshops",
                                                                    "messenger_extensions" => true,
                                                                    "webview_height_ratio" => "full",
                                                                    "fallback_url" => "https://vne-ci.com/#workshops"
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
                            //workshop explicit wizard
                            case "workshop about":
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "Les ateliers sont des moments de partages entre personnalités de l'écosystème IT afin de simprégner des nouvelles solutions proposées par VNE. Au menu, présentation de produits/solutions VNE, buffet/cocktails, échanges. Voulez-vous participer à l'atelier à l'affiche? ",
                                        "quick_replies" => [
                                            [
                                                "content_type" => "text",
                                                "title" => "Oui",
                                                "payload" => "workshop"
                                            ],
                                            [
                                                "content_type" => "text",
                                                "title" => "Non, plus tard",
                                                "payload" => "none"
                                            ]
                                        ]
                                    ]
                                ];
                            break;

                            case "workshop pricing":
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "Les ateliers ne sont pas payants, il faut cependant être un acteur professionnel du secteur(responsable, représentant, etc.).",
                                        "quick_replies" => [
                                            [
                                                "content_type" => "text",
                                                "title" => "Info utile",
                                                "payload" => "merci"
                                            ],
                                            [
                                                "content_type" => "text",
                                                "title" => "Info non utile",
                                                "payload" => "none"
                                            ],

                                        ]
                                    ]
                                ];
                            break;
                            //integration general wizard
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
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUM1k3RUQyTVFYVlFDTDIySjdMTzZTWDI3OC4u",
                                                                    "messenger_extensions" => true,
                                                                    "webview_height_ratio" => "tall",
                                                                    "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUM1k3RUQyTVFYVlFDTDIySjdMTzZTWDI3OC4u"
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
                                                                    "url" => "https://vne-ci.com/zine/show/booklet/solutions",
                                                                 ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "about us"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];  
                            break;
                            //training general wizard
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
                                                                    "url" => "https://vne-ci.com/zine/show/booklet/trainings",
                                                                    "messenger_extensions" => true,
                                                                    "webview_height_ratio" => "tall",
                                                                    "fallback_url" => "https://vne-ci.com/zine/show/booklet/trainings"
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
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUQ0pFV1RJWFVZR1o3OTJQT0dTRkIxRTJSUC4u",
                                                                    "messenger_extensions" => true,
                                                                    "webview_height_ratio" => "tall",
                                                                    "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUQ0pFV1RJWFVZR1o3OTJQT0dTRkIxRTJSUC4u"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "about us"
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
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u",
                                                                    "messenger_extensions" => true,
                                                                    "webview_height_ratio" => "tall",
                                                                    "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "about us"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
                            break;
                            //traning explicit wizard
                            case 'training_reply':
                                //get cache Key
                                $last_conversation = Cache::read($sender_id,'FacebookConversation');
                                switch($last_conversation['postback_reference'])
                                {
                                    case 'certification_reply':
                                        $item = $last_conversation['postback_item'];
                                        $data = [
                                                "messaging_type" => 'RESPONSE',
                                                "recipient" => [
                                                    "id" => $sender_id
                                                ],
                                                "message" => ""
                                            ];

                                        if(preg_match("#(ec[-council]+|ceh|cnd|lpt|[h]*ack[a-z]+|c[yi]ber[secuirte]+)#i", $last_conversation['postback_item'])){
                                            $data["message"] =  [
                                                "attachment" => [
                                                    "type" => "template",
                                                    "payload" => [
                                                        "template_type" => "generic",
                                                        "elements" => [
                                                            [
                                                                "title" => "Virtual Network Entreprise est certifié centre ATC!",
                                                                "subtitle" => "Vous pouvez vous former et vous certifier au même endroit en Côte d'Ivoire",
                                                                "image_url" => "https://farm5.staticflickr.com/4531/38559525841_26da9ddcc8.jpg",
                                                                "buttons" => [
                                                                    [
                                                                        "title" => "Voir l'accréditation",
                                                                        "type" => "web_url",
                                                                        "url" => "https://farm5.staticflickr.com/4583/37671954635_44376ce974.jpg"
                                                                    ],
                                                                    [
                                                                        "title" => "Voir le Catalogue",
                                                                        "type" => "web_url",
                                                                        "url" => "https://vne-ci.com/zine/show/booklet_trainings/ec_council",
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => "https://vne-ci.com/zine/show/booklet_trainings/ec_council"
                                                                    ],

                                                                    [
                                                                        "title" => "Me former",
                                                                        "type" => "web_url",
                                                                        "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u",
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u"
                                                                    ]

                                                                ]
                                                          ]
                                                        ]
                                                    ]

                                                ]
                                            ];  
                                        }
                                        else
                                        {
                                            $data["message"]=[
                                                    "text" => "Afin de vous encadrer très prochainement de façon complète sur votre cursus indiqué, remplissez dès maintenant un formulaire de devis",
                                                    "quick_replies" => [
                                                        [
                                                            "content_type" => "text",
                                                            "title" => "Oui",
                                                            "payload" => "C"
                                                        ],
                                                        [
                                                            "content_type" => "text",
                                                            "title" => "Non, plus tard",
                                                            "payload" => "none"
                                                        ],
                                                    ]
                                            ];
                                        }
                                    break;

                                    case 'formation_reply':
                                        $item = $last_conversation['postback_item'];
                                        $data = [
                                                "messaging_type" => 'RESPONSE',
                                                "recipient" => [
                                                    "id" => $sender_id
                                                ],
                                                "message" => ""
                                            ];

                                        if(preg_match("#(ec[-council]+|ceh|cnd|lpt|[h]*ack[a-z]+|c[yi]ber[secuirte]+)#i", $last_conversation['postback_item'])){
                                            $data["message"] =  [
                                                "attachment" => [
                                                    "type" => "template",
                                                    "payload" => [
                                                        "template_type" => "generic",
                                                        "elements" => [
                                                            [
                                                                "title" => "Virtual Network Entreprise est certifié centre ATC!",
                                                                "subtitle" => "Vous pouvez vous former et vous certifier au même endroit en Côte d'Ivoire",
                                                                "image_url" => "https://farm5.staticflickr.com/4531/38559525841_26da9ddcc8.jpg",
                                                                "buttons" => [
                                                                    [
                                                                        "title" => "Voir l'accréditation",
                                                                        "type" => "web_url",
                                                                        "url" => "https://farm5.staticflickr.com/4583/37671954635_44376ce974.jpg"
                                                                    ],
                                                                    [
                                                                        "title" => "Voir le Catalogue",
                                                                        "type" => "web_url",
                                                                        "url" => "https://vne-ci.com/zine/show/booklet_trainings/ec_council",
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => "https://vne-ci.com/zine/show/booklet_trainings/ec_council"
                                                                    ],

                                                                    [
                                                                        "title" => "Me former",
                                                                        "type" => "web_url",
                                                                        "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u",
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u"
                                                                    ]

                                                                ]
                                                          ]
                                                        ]
                                                    ]

                                                ]
                                            ];  
                                        }
                                        else
                                        {
                                            $data["message"]=[
                                                    "text" => "Afin de vous encadrer très prochainement de façon complète sur votre cursus indiqué(".$last_conversation['postback_item']."), remplissez dès maintenant un formulaire de devis",
                                                    "quick_replies" => [
                                                        [
                                                            "content_type" => "text",
                                                            "title" => "Oui",
                                                            "payload" => "F"
                                                        ],
                                                        [
                                                            "content_type" => "text",
                                                            "title" => "Non, plus tard",
                                                            "payload" => "none"
                                                        ],
                                                    ]
                                            ];
                                        }
                                    break;

                                    case 'general_reply':

                                        $item = $last_conversation['postback_item'];
                                        $data = [
                                                "messaging_type" => 'RESPONSE',
                                                "recipient" => [
                                                    "id" => $sender_id
                                                ],
                                                "message" => ""
                                            ];

                                        if(preg_match("#(ec[-council]+|ceh|cnd|lpt|[h]*ack[a-z]+|c[yi]ber[secuirte]+)#i", $last_conversation['postback_item'])){
                                            $data["message"] =  [
                                                "attachment" => [
                                                    "type" => "template",
                                                    "payload" => [
                                                        "template_type" => "generic",
                                                        "elements" => [
                                                            [
                                                                "title" => "Virtual Network Entreprise est certifié centre ATC!",
                                                                "subtitle" => "Vous pouvez vous former et vous certifier au même endroit en Côte d'Ivoire",
                                                                "image_url" => "https://farm5.staticflickr.com/4531/38559525841_26da9ddcc8.jpg",
                                                                "buttons" => [
                                                                    [
                                                                        "title" => "Voir l'accréditation",
                                                                        "type" => "web_url",
                                                                        "url" => "https://farm5.staticflickr.com/4583/37671954635_44376ce974.jpg"
                                                                    ],
                                                                    [
                                                                        "title" => "Voir le Catalogue",
                                                                        "type" => "web_url",
                                                                        "url" => "https://vne-ci.com/zine/show/booklet_trainings/ec_council",
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => "https://vne-ci.com/zine/show/booklet_trainings/ec_council"
                                                                    ],

                                                                    [
                                                                        "title" => "Me former",
                                                                        "type" => "web_url",
                                                                        "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u",
                                                                        "messenger_extensions" => true,
                                                                        "webview_height_ratio" => "tall",
                                                                        "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRUNUZZS0w0TTdWSUpaNEVHRloyMTI3M1BWWC4u"
                                                                    ]

                                                                ]
                                                          ]
                                                        ]
                                                    ]

                                                ]
                                            ];  
                                        }
                                        else
                                        {
                                            $data["message"]=[
                                                    "text" => "Afin de vous encadrer très prochainement de façon complète sur votre cursus indiqué(".$last_conversation['postback_item']."), remplissez dès maintenant un formulaire de devis",
                                                    "quick_replies" => [
                                                        [
                                                            "content_type" => "text",
                                                            "title" => "Oui",
                                                            "payload" => "FC"
                                                        ],
                                                        [
                                                            "content_type" => "text",
                                                            "title" => "Non, plus tard",
                                                            "payload" => "none"
                                                        ],
                                                    ]
                                            ];
                                        }
                                    break;

                                }
                            break;
                            //service general wizard
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
                                                                    "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRURVRGQk01SkNFRVJYTTFUVlZETThVT1NYMC4u",
                                                                    "messenger_extensions" => true,
                                                                    "webview_height_ratio" => "tall",
                                                                    "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRURVRGQk01SkNFRVJYTTFUVlZETThVT1NYMC4u"
                                                                ]
                                                            ]
                                                        ],
                                                        [
                                                            "title"=>"Revenir au précédent",
                                                            "buttons" => [
                                                                [
                                                                    "title" => "retour",
                                                                    "type" => "postback",
                                                                    "payload" => "about us"
                                                                ]
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ];
                            break;
                            //service explicit wizard
                            case 'development':                  
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
                                                    [
                                                        "title" => "Le développement sur mesure by VNE",
                                                        "subtitle" => "De la conception à la réalisation, VNE vous propose sa palette de spécialistes afin devous aider dans vos ambitions web/mobile",
                                                        "image_url" => "https://farm5.staticflickr.com/4553/38529567012_d5dccb6951.jpg",
                                                        "buttons" => [
                                                            [
                                                                "type" => "web_url",
                                                                "title" => "Continuer",
                                                                "url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRURVRGQk01SkNFRVJYTTFUVlZETThVT1NYMC4u",
                                                                "messenger_extensions" => true,
                                                                "webview_height_ratio" => "tall",
                                                                "fallback_url" => "https://forms.office.com/Pages/ResponsePage.aspx?id=r_7pOGcX6UCNqwthS-DQBi6rERHrS5tCpiK5GNCctdRURVRGQk01SkNFRVJYTTFUVlZETThVT1NYMC4u"
                                                            ],

                                                            [  
                                                                "type" => "postback",
                                                                "title" => "Non plus tard",
                                                                "payload" => "none"
                                                            ]
                                                        ]
                                                    ]
                                                ]       
                                            ]
                                        ]
                                    ]
                                ];
                            break;

                            case 'mantenance':
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "Nous sommes disponibles 24/7 pour vous aider à assurer le bon fonctionnement de vos ressources informatiques,",
                                        "quick_replies" => [
                                            [
                                                "content_type" => "text",
                                                "title"=>"en savoir plus",
                                                "payload" => "S"
                                            ],
                                            [
                                                "title" => "non, plus tard!",
                                                "content_type" => "text",
                                                "payload" => "none"
                                            ]
                                        ]
                                    ]
                                ];
                            break;

                            case 'depannage':
                                $data = [
                                    "messaging_type" => "RESPONSE",
                                    "recipient" => [
                                        "id" => $sender_id
                                    ],
                                    "message" => [
                                        "text" => "Nous sommes disponibles 24/7 pour vous aider à assurer le bon fonctionnement de vos ressources informatiques,",
                                        "quick_replies" => [
                                            [
                                                "content_type" => "text",
                                                "title"=>"en savoir plus",
                                                "payload" => "S"
                                            ],
                                            [
                                                "title" => "non, plus tard!",
                                                "content_type" => "text",
                                                "payload" => "none"
                                            ]
                                        ]
                                    ]
                                ];
                            break;

                            case 'advices':
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
                                                    [
                                                        "title" => "Les conseils de VNE vous aide à mieux profiter de votre business",
                                                        "subtitle" => "Nous disposons d'ingénieurs qualifiés dans de multiples domaines afin de vous donnez l'information utile",
                                                        "image_url" => "https://farm5.staticflickr.com/4530/38505070106_439f3d7413.jpg",
                                                        "buttons" => [
                                                            [
                                                                "type" => "postback",
                                                                "title" => "continuer",
                                                                "payload" => "S"
                                                            ],

                                                            [
                                                                "type" => "postback",
                                                                "title" => "non, plus tard",
                                                                "payload" => "none"
                                                            ]
                                                        ]
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                                ];
                            break;

                            //no response
                            case 'none':
                                $data = [
                                    'messaging_type' => 'RESPONSE',
                                    'recipient' => [
                                        'id' => $sender_id
                                    ],
                                    'message' => [
                                        'text' => 'Comment pourrais-je vous aider?'
                                    ]
                                ];
                            break;
                        }



                        //send response
                        $client = new Client();
                        $response = $client->post('https://graph.facebook.com/v2.6/me/messages?access_token='.$facebook_messenger_token,json_encode($data),['type'=>'json']);

                        exit();
                    }


                }
            }

            exit();
        }


    }   

}

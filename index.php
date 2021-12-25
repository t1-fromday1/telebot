<?php

    include 'includes/functions.php';
    include 'includes/config.php';
    include '_datastream/replies.php';

    // TIMEZONE - NAIROBI, KENYA
    date_default_timezone_set('Africa/Nairobi');

    // GETTING UPDATES
    $content = file_get_contents("php://input");
    $update = json_decode($content, true);

    // to prevent offset error
    $message = array();
    $chat_id = array();
    $first_name = array();
    $callback_query = array();

    $chat_id = $update["message"]["chat"]["id"];
    $first_name = $update["message"]["chat"]["first_name"];
    $message = $update["message"]["text"];
    $callback_query = $update['callback_query'];
    $current_message_id = $update['callback_query']['message']['message_id'];
    $reply_chat_id = $update["callback_query"]["from"]["id"];
    $current_del_id = $update['message']['message_id']; 
    $feedback = $update["callback_query"]["data"];
    $phone_number = $update['message']['contact']['phone_number'];

    if(isset($phone_number)){
        $Res = "We have received your phone number  -   $phone_number\nThank you";
        send_message($chat_id, $Res);
    
    } elseif(strtok($message, ' ') === 'box' || strtok($message, ' ') === 'Box'){
            $Res = "Thank you $first_name for your feedback";
        send_message($chat_id, $Res);

    } else {

    // switch for all the commands 
    switch($message) {
        case '/help':  
            $encodedKeyboard = '';
                inline_but($chat_id, $help['1'], $encodedKeyboard);
        break;

        case '/suggestionbox':
            send_message($chat_id, $sugg[1]);
        break;

        case 'suggest':
            send_message($chat_id, $sugg[1]);
        break;

        case 'suggestion':
            send_message($chat_id, $sugg[1]);
        break;

        case 'suggestionbox':
            send_message($chat_id, $sugg[1]);
        break;

        case '/contact':
            $encodedKeyboard = "";
            inline_button($chat_id, $contact_reply['1'], $encodedKeyboard);
        break;

        case '/contact':
            $encodedKeyboard = "";
            inline_button($chat_id, $contact_reply['1'], $encodedKeyboard);
        break;

        case 'contact':
            $encodedKeyboard = "";
            inline_button($chat_id, $contact_reply['1'], $encodedKeyboard);
        break;

        case 'phone':
            $encodedKeyboard = "";
            inline_button($chat_id, $contact_reply['1'], $encodedKeyboard);
        break;

        case 'number':
            $encodedKeyboard = "";
            inline_button($chat_id, $contact_reply['1'], $encodedKeyboard);
        break;

        case '/start':
            $filename = 'users.json';
            writedata($filename, $chat_id, $first_name);
            
            $params = array('chat_id' => $chat_id, 
                                'text' => 'loading...');
            
            $current_dell_id = ($current_del_id + 1);
            
            $deleteparams = array('chat_id' => $chat_id,
                                    'message_id' => $current_dell_id);
            bot('sendMessage', $params);
            
            bot('deleteMessage', $deleteparams);

            sendPhoto($chat_id, new CURLFILE($client_image), $start_reply['1']);
        break;

        case 'start':

            $filename = 'users.json';
            writedata($filename, $chat_id, $first_name);
            
            $params = array('chat_id' => $chat_id, 
                                'text' => 'loading...');
            
            $current_dell_id = ($current_del_id + 1);
            
            $deleteparams = array('chat_id' => $chat_id,
                                    'message_id' => $current_dell_id);
            bot('sendMessage', $params);
            
            bot('deleteMessage', $deleteparams);

            sendPhoto($chat_id, new CURLFILE($client_image), $start_reply['1']);
            break;

        case '/hi':
            $filename = 'users.json';
            writedata($filename, $chat_id, $first_name);
            
            $params = array('chat_id' => $chat_id, 
                                'text' => 'loading...');
            
            $current_dell_id = ($current_del_id + 1);
            
            $deleteparams = array('chat_id' => $chat_id,
                                    'message_id' => $current_dell_id);
            bot('sendMessage', $params);
            
            bot('deleteMessage', $deleteparams);

            sendPhoto($chat_id, new CURLFILE($client_image), $start_reply['1']);
        break;

        case 'hey':
            $filename = 'users.json';
            writedata($filename, $chat_id, $first_name);
            
            $params = array('chat_id' => $chat_id, 
                                'text' => 'loading...');
            
            $current_dell_id = ($current_del_id + 1);
            
            $deleteparams = array('chat_id' => $chat_id,
                                    'message_id' => $current_dell_id);
            bot('sendMessage', $params);

            bot('deleteMessage', $deleteparams);

            sendPhoto($chat_id, new CURLFILE($client_image), $start_reply['1']);
        break;

        case 'holla':
            $filename = 'users.json';
            writedata($filename, $chat_id, $first_name);
            
            $params = array('chat_id' => $chat_id, 
                                'text' => 'loading...');
            
            $current_dell_id = ($current_del_id + 1);
            
            $deleteparams = array('chat_id' => $chat_id,
                                    'message_id' => $current_dell_id);
            bot('sendMessage', $params);
            
            bot('deleteMessage', $deleteparams);

            sendPhoto($chat_id, new CURLFILE($client_image), $start_reply['1']);
        break;

        case 'yow':
            $filename = 'users.json';
            writedata($filename, $chat_id, $first_name);
            
            $params = array('chat_id' => $chat_id, 
                                'text' => 'loading...');
            
            $current_dell_id = ($current_del_id + 1);
            
            $deleteparams = array('chat_id' => $chat_id,
                                    'message_id' => $current_dell_id);
            bot('sendMessage', $params);
            
            bot('deleteMessage', $deleteparams);

            sendPhoto($chat_id, new CURLFILE($client_image), $start_reply['1']);
        break;

        case '/manifesto':
            // New send button Class
            $obj = new NewButton;
            $obj->keyboard = ['inline_keyboard' => [[['text' => '1. Inclusion', 'callback_data' => '1']],
                                                    [['text' => '2. Participation', 'callback_data' => '2']],
                                                    [['text' => '3. Paid County Internship for Youth', 'callback_data' => '3']],
                                                    [['text' => '4. Senator\'s Center for devolution and leadership', 'callback_data' => '4']],
                                                    [['text' => '5. Development fund focusing on Women and enterprises', 'callback_data' => '5']],
                                                    [['text' => '6. Safeguarding contractors and Local SME\'s', 'callback_data' => '6']],
                                                    [['text' => '7. National Transition Act', 'callback_data' => '7']],
                                                    [['text' => '8. County Assembly Wards Revenue Allocation Formulae', 'callback_data' => '7']],
                                                    [['text' => '9. Preserving County Government Autonomy', 'callback_data' => '7']],
                                                    [['text' => '10. 30% contribution to Umbrella', 'callback_data' => '7']]
                                                    ]];
            // JSON encode keyboard 
            $obj->encodedKeyboard = json_encode($obj->keyboard); 

            $obj->Res = $manifesto;

            $obj->parameters = array('chat_id' => $chat_id, 
                                        'text' => $obj->Res, 
                                        'reply_markup' => $obj->encodedKeyboard);
            // send current message

            $obj->bot('sendMessage', $obj->parameters);

        break;

        case 'manifesto':
            // New send button Class
            $obj = new NewButton;
            $obj->keyboard = ['inline_keyboard' => [[['text' => '1. Inclusion', 'callback_data' => '1']],
                                                    [['text' => '2. Participation', 'callback_data' => '2']],
                                                    [['text' => '3. Paid County Internship for Youth', 'callback_data' => '3']],
                                                    [['text' => '4. Senator\'s Center for devolution and leadership', 'callback_data' => '4']],
                                                    [['text' => '5. Development fund focusing on Women and enterprises', 'callback_data' => '5']],
                                                    [['text' => '6. Safeguarding contractors and Local SME\'s', 'callback_data' => '6']],
                                                    [['text' => '7. National Transition Act', 'callback_data' => '7']],
                                                    [['text' => '8. County Assembly Wards Revenue Allocation Formulae', 'callback_data' => '7']],
                                                    [['text' => '9. Preserving County Government Autonomy', 'callback_data' => '7']],
                                                    [['text' => '10. 30% contribution to Umbrella', 'callback_data' => '7']]
                                                    ]];
            // JSON encode keyboard 
            $obj->encodedKeyboard = json_encode($obj->keyboard); 

            $obj->Res = $manifesto;

            $obj->parameters = array('chat_id' => $chat_id, 
                                        'text' => $obj->Res, 
                                        'reply_markup' => $obj->encodedKeyboard);
            // send current message
            $obj->bot('sendMessage', $obj->parameters);

        break;
        
        default:
            send_message($chat_id, $unknown);
}
}

// survey type response - feedback
    switch($feedback){
        case 'yes':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Nyanza', 'callback_data' => 'kisumu']],
                                                        [['text' => 'Coast', 'callback_data' => 'nairobi']],
                                                        [['text' => 'Western', 'callback_data' => 'western']],
                                                        [['text' => 'N. Eastern', 'callback_data' => 'north']],
                                                        [['text' => 'Eastern', 'callback_data' => 'eastern']],
                                                        [['text' => 'Central', 'callback_data' => 'nairobi']],
                                                        [['text' => 'Rift Valley', 'callback_data' => 'rift']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Great! Which county do you live?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);
                

                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
            }
        break;

        case 'yet':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Nyanza', 'callback_data' => 'kisumu']],
                                                        [['text' => 'Coast', 'callback_data' => 'nairobi']],
                                                        [['text' => 'Western', 'callback_data' => 'western']],
                                                        [['text' => 'N. Eastern', 'callback_data' => 'north']],
                                                        [['text' => 'Eastern', 'callback_data' => 'eastern']],
                                                        [['text' => 'Central', 'callback_data' => 'nairobi']],
                                                        [['text' => 'Rift Valley', 'callback_data' => 'rift']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Why not, please let me know if there are any issues sorrounding your voter registration, first let's me know a little about you, which county do you live?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'kisumu':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Below 18', 'callback_data' => 'A']],
                                                        [['text' => '18 - 28', 'callback_data' => 'B']],
                                                        [['text' => '29 - 38', 'callback_data' => 'C']],
                                                        [['text' => '39 - 48', 'callback_data' => 'D']],
                                                        [['text' => '49 - 60', 'callback_data' => 'E']],
                                                        [['text' => 'Above 60', 'callback_data' => 'F']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you for this information. What range best suits your age?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'nairobi':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Below 18', 'callback_data' => 'A']],
                                                        [['text' => '18 - 28', 'callback_data' => 'B']],
                                                        [['text' => '29 - 38', 'callback_data' => 'C']],
                                                        [['text' => '39 - 48', 'callback_data' => 'D']],
                                                        [['text' => '49 - 60', 'callback_data' => 'E']],
                                                        [['text' => 'Above 60', 'callback_data' => 'F']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you for this information. What range best suits your age?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'western':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Below 18', 'callback_data' => 'A']],
                                                        [['text' => '18 - 28', 'callback_data' => 'B']],
                                                        [['text' => '29 - 38', 'callback_data' => 'C']],
                                                        [['text' => '39 - 48', 'callback_data' => 'D']],
                                                        [['text' => '49 - 60', 'callback_data' => 'E']],
                                                        [['text' => 'Above 60', 'callback_data' => 'F']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you for this information. What range best suits your age?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'north':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Below 18', 'callback_data' => 'A']],
                                                        [['text' => '18 - 28', 'callback_data' => 'B']],
                                                        [['text' => '29 - 38', 'callback_data' => 'C']],
                                                        [['text' => '39 - 48', 'callback_data' => 'D']],
                                                        [['text' => '49 - 60', 'callback_data' => 'E']],
                                                        [['text' => 'Above 60', 'callback_data' => 'F']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you for this information. What range best suits your age?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'eastern':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Below 18', 'callback_data' => 'A']],
                                                        [['text' => '18 - 28', 'callback_data' => 'B']],
                                                        [['text' => '29 - 38', 'callback_data' => 'C']],
                                                        [['text' => '39 - 48', 'callback_data' => 'D']],
                                                        [['text' => '49 - 60', 'callback_data' => 'E']],
                                                        [['text' => 'Above 60', 'callback_data' => 'F']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you for this information. What range best suits your age?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'nairobi':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Below 18', 'callback_data' => 'A']],
                                                        [['text' => '18 - 28', 'callback_data' => 'B']],
                                                        [['text' => '29 - 38', 'callback_data' => 'C']],
                                                        [['text' => '39 - 48', 'callback_data' => 'D']],
                                                        [['text' => '49 - 60', 'callback_data' => 'E']],
                                                        [['text' => 'Above 60', 'callback_data' => 'F']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you for this information. What range best suits your age?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'first':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Below 18', 'callback_data' => 'A']],
                                                        [['text' => '18 - 28', 'callback_data' => 'B']],
                                                        [['text' => '29 - 38', 'callback_data' => 'C']],
                                                        [['text' => '39 - 48', 'callback_data' => 'D']],
                                                        [['text' => '49 - 60', 'callback_data' => 'E']],
                                                        [['text' => 'Above 60', 'callback_data' => 'F']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you for this information. What range best suits your age?";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);
                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

        case 'A':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = array(
                    "keyboard" => array(array(
                    array(
                    "text" => "contact",
                    "request_contact" => true // This is OPTIONAL telegram button
                    
                    ),
                    )),
                    "one_time_keyboard" => false, // Can be FALSE (hide keyboard after click)
                    "resize_keyboard" => true // Can be FALSE (vertical resize)
                );
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = "Thank you, please share your phone number.\nWe will ensure you get personal help, calls or texts from us only come from +254743048147.";

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);
                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '1':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['1'];

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);
                // send photo
                $obj->sendPhoto($reply_chat_id, new CURLFILE($inclusion), '1. Inclusion');
                sleep(2);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '2':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['2'];

                $param = array('chat_id' => $reply_chat_id, 
                                'text' => $obj->Res);

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $manifestos['11'], 
                                            'reply_markup' => $obj->encodedKeyboard);

                // send photo
                $obj->sendPhoto($reply_chat_id, new CURLFILE($participation), '2. Participation');
                sleep(2);
                // send two messages
                $obj->bot('sendMessage', $param);
                sleep(3);
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '3':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['3'];

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);
                 // send photo
                 $obj->sendPhoto($reply_chat_id, new CURLFILE($youths), '3. Paid County Internship for the Youth');
                 sleep(2);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '4':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);
                
                $obj->Res = $manifestos['4'];

                $param = array('chat_id' => $reply_chat_id, 
                                'text' => $obj->Res);

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $manifestos['41'], 
                                            'reply_markup' => $obj->encodedKeyboard);
                // send photo
                $obj->sendPhoto($reply_chat_id, new CURLFILE($leadership), "4. Senator’s Office as Centre for Leadership, Mentorship");
                sleep(2);
                // send two messages
                $obj->bot('sendMessage', $param);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '5':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['5'];

                $param = array('chat_id' => $reply_chat_id, 
                                'text' => $obj->Res);

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $manifestos['51'], 
                                            'reply_markup' => $obj->encodedKeyboard);
                // send photo
                $obj->sendPhoto($reply_chat_id, new CURLFILE($women), "5. County Youth Women, PWD and Special Population Development Fund");
                sleep(2);
                $obj->bot('sendMessage', $param);
                sleep(3);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '6':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['6'];

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);

                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '7':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['7'];

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);

                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '8':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['8'];

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);

                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '9':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);

                $obj->Res = $manifestos['9'];

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }
        case '10':
            if ($callback_query == true){
                // New send button Class
                $obj = new NewButton;
                $obj->keyboard = ['inline_keyboard' => [[['text' => 'Back to Main Menu', 'callback_data' => 'main_menu']],
                                                        [['text' => 'Visit site', 'callback_data' => 'site_click_google', 'url' => 'www.google.com']]
                                                        ]];
                // JSON encode keyboard 
                $obj->encodedKeyboard = json_encode($obj->keyboard);                                        
                $obj->deleteparams = array('chat_id' => $reply_chat_id,
                                            'message_id' => $current_message_id);

                $obj->Res = $manifestos['10'];

                $obj->parameters = array('chat_id' => $reply_chat_id, 
                                            'text' => $obj->Res, 
                                            'reply_markup' => $obj->encodedKeyboard);


                // Delete previous message
                $obj->bot('deleteMessage', $obj->deleteparams);
                // send current message
                $obj->bot('sendMessage', $obj->parameters);
        break;
    }

    case 'main_menu':
        if ($callback_query == true){
           // New send button Class
           $obj = new NewButton;
           $obj->keyboard = ['inline_keyboard' => [[['text' => '1. Inclusion', 'callback_data' => '1']],
                                                   [['text' => '2. Participation', 'callback_data' => '2']],
                                                   [['text' => '3. Paid County Internship for Youth', 'callback_data' => '3']],
                                                   [['text' => '4. Senator\'s Center for devolution and leadership', 'callback_data' => '4']],
                                                   [['text' => '5. Development fund focusing on Women and enterprises', 'callback_data' => '5']],
                                                   [['text' => '6. Safeguarding contractors and Local SME\'s', 'callback_data' => '6']],
                                                   [['text' => '7. National Transition Act', 'callback_data' => '7']],
                                                   [['text' => '8. County Assembly Wards Revenue Allocation Formulae', 'callback_data' => '7']],
                                                   [['text' => '9. Preserving County Government Autonomy', 'callback_data' => '7']],
                                                   [['text' => '10. 30% contribution to Umbrella', 'callback_data' => '7']]
                                                   ]];
           // JSON encode keyboard 
           $obj->encodedKeyboard = json_encode($obj->keyboard); 

           $obj->parameters = array('chat_id' => $reply_chat_id, 
                                       'text' => 'Welcome back, here is the main menu again', 
                                       'reply_markup' => $obj->encodedKeyboard);
           // send current message
            $obj->bot('sendMessage', $obj->parameters);
    break;
    }
}

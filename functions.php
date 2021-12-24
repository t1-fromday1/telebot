<?php

    function bot($method, $datas=[]){
        global $API_KEY;
        $url = "https://api.telegram.org/bot$API_KEY/".$method;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
        $res = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }else{
            return json_decode($res);
        }
    }

    function sendPhoto($chat_id, $photo, $caption){
        bot('sendPhoto', [
        'chat_id'=>$chat_id,
        'photo'=>$photo,
        'caption'=>$caption
        ]);
    }

    function send_message($id, $msg){
        global $API_KEY;
        $text = urlencode($msg);
        file_get_contents("https://api.telegram.org/bot$API_KEY/sendMessage?chat_id=$id&text=$text");
    }

    function sendButton($chat_id, $response){
        $keyboard = array(
            'keyboard' => array(
            array(
            "Inclusion"
            ),
            array(
            "Participation"
            ),
            array(
            "Paid County Internship for Youth"
            ),
            array(
            "Senator's Center for devolution and leadership"
            ),
            array(
            "Development fund focusing on Women and enterprises"
            ),
            array(
            "Safeguarding contractors and Local SME's"
            ),
            array(
            "National Transition Act"
            ),
            array(
            "County Assembly Wards Revenue Allocation Formulae"
            ),
            array(
            "Preserving County Government Autonomy"
            ),
            array(
            "30% contribution to Umbrella"
            )
            ),
            'resize_keyboard' => false,
            'one_time_keyboard' => true
            );

            $encodedKeyboard = json_encode($keyboard);
            
            $postfields = array(
            'chat_id' => "$chat_id",
            'text' => "$response",
            'reply_markup' => $encodedKeyboard
            );

        bot('sendMessage', $postfields);
    }

    function inline_button($chat_id, $response, $encodedKeyboard){
            $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'WhatsApp', 'callback_data' => 'Yes', 'url' => 'wa.me/254743048147']
                ],
                [
                    ['text' => 'Twitter', 'callback_data' => 'No', 'url' => 'google.com']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);
        $parameters = 
            array(
                'chat_id' => $chat_id, 
                'text' => $response, 
                'reply_markup' => $encodedKeyboard
            );
        
        bot('sendMessage', $parameters);
    }

    function inline_but($chat_id, $response, $encodedKeyboard){
            $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'Yes', 'callback_data' => 'yes']
                ],
                [
                    ['text' => 'Not Yet', 'callback_data' => 'yet']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);
        $parameters = 
            array(
                'chat_id' => $chat_id, 
                'text' => $response, 
                'reply_markup' => $encodedKeyboard
            );
        
        bot('sendMessage', $parameters);
    }



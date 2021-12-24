<?php

    include 'includes/functions.php';
    include 'includes/config.php';

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
    $callback_query_id = array();
    $feedback = array();

    $chat_id = $update["message"]["chat"]["id"];
    $first_name = $update["message"]["chat"]["first_name"];
    $message = $update["message"]["text"];
    $callback_query = $update['callback_query'];
    $callback_query_id = $update["callback_query"]["message"]["chat"]['id'];
    $feedback = $update["data"];

    if(strtok($message, ' ') === 'box' || strtok($message, ' ') === 'Box'){
            $Res = "Thank you $first_name for your feedback";
        send_message($chat_id, $Res);
    }

    // switch for all the commands - don't worry about the long list
    
    switch($message) {
        case '/help':  
            $encodedKeyboard = '';
            $response = "To get help from me ".$first_name." you'll start by telling me a few things about you.\n\nDid you succesfully register as a voter?";
                
            inline_but($chat_id, $response, $encodedKeyboard);
            
            if($chat_id == $callback_query_id){
                if ($feedback = 'Yes'){
                    $response = "To get help from me ".$first_name." you'll start by telling me a few things about you.\n\nDid you succesfully register as a voter?";
                    inline_but($chat_id, $response, $encodedKeyboard);
                }
            }
        break;

        case '/suggestionbox':
            $Res = "Thank you, if you have any direct suggestions for me feel free to send. Start suggestion with the word 'box' \n\n e.g. box call me back...\n e.g. box you should visit Homabay...\n\nhit /help if you need help navigating around.";
            send_message($chat_id, $Res);
        break;

        case '/contact':
            $response = "\u{260E} Contact me today\nCall: +254797702066\nText: +254743048147";
            $encodedKeyboard = "";
            inline_button($chat_id, $response, $encodedKeyboard);
        break;

        case 'contact':
            $response = "\u{260E} Contact me today\nCall: +254797702066\nText: +254743048147";
            $encodedKeyboard = "";
            inline_button($chat_id, $response, $encodedKeyboard);
        break;

        case 'phone':
            $response = "\u{260E} Contact me today\nCall: +254797702066\nText: +254743048147";
            $encodedKeyboard = "";
            inline_button($chat_id, $response, $encodedKeyboard);
        break;

        case 'number':
            $response = "\u{260E} Contact me today\nCall: +254797702066\nText: +254743048147";
            $encodedKeyboard = "";
            inline_button($chat_id, $response, $encodedKeyboard);
        break;

        case '/start':
            sendPhoto($chat_id, new CURLFILE("https://wearegenerationshapers.co.ke/pandebot/images/pande.jpg"),"\u{1F44B} Hey there $first_name,\nAm Hon. Philip Pande - (Aspiring Senator - Kisumu County)\n\nThis bot is dedicated to take you through our journey together, fighting the right fight come 2022! \u{1F5F3}\n\nThis bot will help you discover my strong desire to bring it home to you, your dreams!\n\nClick /manifesto \u{1F4CB} to browse.\n\n\nHelpful tags\n\u{2665} Help - /help\n\u{1F4E0} Contacts - /contact\n\u{270A} Suggestions - /suggestionbox\n\nThank You.");
                        
            $logFile = "root/users.json";
            $log = fopen($logFile, "a");
            $str = json_encode($chat_id."=>".$first_name);
            fwrite($log, $str);
            fclose($log);
        break;

        case 'start':
            sendPhoto($chat_id, new CURLFILE("https://wearegenerationshapers.co.ke/pandebot/images/pande.jpg"),"\u{1F44B} Hey there $first_name,\nAm Hon. Philip Pande - (Aspiring Senator - Kisumu County)\n\nThis bot is dedicated to take you through our journey together, fighting the right fight come 2022! \u{1F5F3}\n\nThis bot will help you discover my strong desire to bring it home to you, your dreams!\n\nClick /manifesto \u{1F4CB} to browse.\n\n\nHelpful tags\n\u{2665} Help - /help\n\u{1F4E0} Contacts - /contact\n\u{270A} Suggestions - /suggestionbox\n\nThank You.");
                        
            $logFile = "root/users.json";
            $log = fopen($logFile, "a");
            $str = json_encode($chat_id."=>".$first_name);
            fwrite($log, $str);
            fclose($log);
            break;

        case '/hi':
            sendPhoto($chat_id, new CURLFILE("https://wearegenerationshapers.co.ke/pandebot/images/pande.jpg"),"\u{1F44B} Hey there $first_name,\nAm Hon. Philip Pande - (Aspiring Senator - Kisumu County)\n\nThis bot is dedicated to take you through our journey together, fighting the right fight come 2022! \u{1F5F3}\n\nThis bot will help you discover my strong desire to bring it home to you, your dreams!\n\nClick /manifesto \u{1F4CB} to browse.\n\n\nHelpful tags\n\u{2665} Help - /help\n\u{1F4E0} Contacts - /contact\n\u{270A} Suggestions - /suggestionbox\n\nThank You.");
                        
            $logFile = "root/users.json";
            $log = fopen($logFile, "a");
            $str = json_encode($chat_id."=>".$first_name);
            fwrite($log, $str);
            fclose($log);
        break;

        case 'hey':
            sendPhoto($chat_id, new CURLFILE("https://wearegenerationshapers.co.ke/pandebot/images/pande.jpg"),"\u{1F44B} Hey there $first_name,\nAm Hon. Philip Pande - (Aspiring Senator - Kisumu County)\n\nThis bot is dedicated to take you through our journey together, fighting the right fight come 2022! \u{1F5F3}\n\nThis bot will help you discover my strong desire to bring it home to you, your dreams!\n\nClick /manifesto \u{1F4CB} to browse.\n\n\nHelpful tags\n\u{2665} Help - /help\n\u{1F4E0} Contacts - /contact\n\u{270A} Suggestions - /suggestionbox\n\nThank You.");
                        
            $logFile = "root/users.json";
            $log = fopen($logFile, "a");
            $str = json_encode($chat_id."=>".$first_name);
            fwrite($log, $str);
            fclose($log);
            
        break;

        case 'holla':
            sendPhoto($chat_id, new CURLFILE("https://wearegenerationshapers.co.ke/pandebot/images/pande.jpg"),"\u{1F44B} Hey there $first_name,\nAm Hon. Philip Pande - (Aspiring Senator - Kisumu County)\n\nThis bot is dedicated to take you through our journey together, fighting the right fight come 2022! \u{1F5F3}\n\nThis bot will help you discover my strong desire to bring it home to you, your dreams!\n\nClick /manifesto \u{1F4CB} to browse.\n\n\nHelpful tags\n\u{2665} Help - /help\n\u{1F4E0} Contacts - /contact\n\u{270A} Suggestions - /suggestionbox\n\nThank You.");
                        
            $logFile = "root/users.json";
            $log = fopen($logFile, "a");
            $str = json_encode($chat_id."=>".$first_name);
            fwrite($log, $str);
            fclose($log);
        break;

        case 'yow':
            sendPhoto($chat_id, new CURLFILE("https://wearegenerationshapers.co.ke/pandebot/images/pande.jpg"),"\u{1F44B} Hey there $first_name,\nAm Hon. Philip Pande - (Aspiring Senator - Kisumu County)\n\nThis bot is dedicated to take you through our journey together, fighting the right fight come 2022! \u{1F5F3}\n\nThis bot will help you discover my strong desire to bring it home to you, your dreams!\n\nClick /manifesto \u{1F4CB} to browse.\n\n\nHelpful tags\n\u{2665} Help - /help\n\u{1F4E0} Contacts - /contact\n\u{270A} Suggestions - /suggestionbox\n\nThank You.");
                        
            $logFile = "root/users.json";
            $log = fopen($logFile, "a");
            $str = json_encode($chat_id."=>".$first_name);
            fwrite($log, $str);
            fclose($log);
        break;

        case '/manifesto':
            sendButton($chat_id, 'Haa! Okay, here are the major pillars of my manifesto', $encodedKeyboard);
        break;

        case 'manifesto':
            sendButton($chat_id, 'Haa! Okay, here are the major pillars of my manifesto', $encodedKeyboard);
        break;
        
        case 'Inclusion':
            $rep = "1. Inclusion\n50% youth County Ministers\n(Incubate the next new leaders 2 male, 2 female, 1 person living with disability)";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case 'Participation':
            $rep = "2. Participation\ni) Budget champions\nii) Government watch commitee\niii) Civic Partnerships\niv) Accountability report";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case 'Paid County Internship for Youth':
            $rep = "3. Paid County Internship for Youth";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case 'Senator\'s Center for devolution and leadership':
            $rep = "4. Senator's Center for devolution and leadership.\nOdinga-Mboya Centre for Mentorship & Leadership\nCoworking Civil Society and\nGovernance organization\nCommunity Whistle Blower Training & Protection Centre Youth Office";
            sendButton($chat_id, $rep, $encodedKeyboard);    
        break;

        case 'Development fund focusing on Women and enterprises':
            $rep = "5. Development fund focusing on Women and enterprises\nConditional allocation of funds to develop our disadvantaged population\ni) Youth Women & PWD Enterprises and LSO/LPO financing\nii) City of Kisumu Disability Enterprise Mainstreaming\niii) County Social Welfare Fund";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case 'Safeguarding contractors and Local SME\'s':
            $rep = "6. Safeguarding contractors and Local SME's\nOffice of the controller of the budget timely disbursement of funds";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case 'National Transition Act':
            $rep = "7. National Transition Act.\nAfter promulgation of the new constitution\nEnhanced inter-governmental relation and cooperation\nFull implementation of universal Health coverage\nImprove capacity to export goods to the rest of the world";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case 'County Assembly Wards Revenue Allocation Formulae':
            $rep = "8. County Assembly Wards Revenue Allocation Formulae\nGrant assemblies autonomy to legislate and oversight county governments\nWard Development Fund\nWard Equaization Fund - framework to uplift rural and poor wards by connecting them to amenities like water, forests, parks and other endowments.";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case 'Preserving County Government Autonomy':
            $rep = "9. Preserving County Government Autonomy\nInstitutionalization of Regional Blocs to develop regional identity to share common challenges and shared interests\nMake county budget and economic forum a semi-autonomous institution\nCounty Government Public-Private Partnership Bill\nAllow counties to self-guarantee financial instruments not more than three times their annual own source revenue";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;

        case '30% contribution to Umbrella':
            $rep = "10. 30% contribution to Umbrella\nMy office will provide the much-needed support for our little table banking and chama savings to grow them while acting as the Kisumu Cooperative Ambassador";
            sendButton($chat_id, $rep, $encodedKeyboard);
        break;
        default:
            $Res = "Sorry, I don't understand you.\nKindly use the following commands\n\n/start or /hi\n/contact\n/suggestionbox\n/help\n";
            send_message($chat_id, $Res);
}


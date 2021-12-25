<?php

    $content = file_get_contents("php://input");
    $update = json_decode($content, true);
    $first_name = $update["message"]["chat"]["first_name"];

    function randomize($keys, $array){
        $keys = shuffle($array);
        return $array[$keys];
    }
    $manifesto_reply = array('1' => 'Haa! Okay, here are the major pillars of my manifesto', 
                    '2' => 'Thanks, here are my major pillars',
                    '3' => 'Welcome, let me take your through the pillars in my manifesto'
                    );
    $keys = '';
    $manifesto = randomize($keys, $manifesto_reply);


    $unknown_reply = array('1' => "Sorry, I don't understand you.\nKindly use the following commands\n\n/start or /hi\n/contact\n/suggestionbox\n/help\n",
                            '2' => "Hate to say this but I didn't understand that.\nKindly use the following commands\n\n/start or /hi\n/contact\n/suggestionbox\n/help\n",
                                '3' => "Hey, I didn't get that.\nKindly use the following commands\n\n/start or /hi\n/contact\n/suggestionbox\n/help\n");
    $keys = '';
    $unknown = randomize($keys, $unknown_reply);


    $start_reply = array('1', "\u{1F44B} Hey there $first_name,\nAm Hon. Philip Pande - (Aspiring Senator - Kisumu County)\n\nThis bot is dedicated to take you through our journey together, fighting the right fight come 2022!\n\nClick /manifesto \u{1F4CB} to browse.\n\n\nHelpful tags\n\u{2665} Help - /help\n\u{1F4E0} Contacts - /contact\n\u{270A} Suggestions - /suggestionbox\n\nThank You."
    );

    $help = array('1', "To get help from me $first_name you'll start by telling me a few things about you.\n\nDid you succesfully register as a voter?");

    $contact_reply = array('1' => "\u{260E} Thank you $first_name,\nFeel free to contact us anytime.\n\nCall: +254743048147\nText: +254797709066\n\nor find me on social media using these links below");

    $sugg = array('1', "Thank you, if you have any direct suggestions for me feel free to send. Start suggestion with the word 'box' \n\n e.g. box call me back...\n e.g. box you should visit Homabay...\n\nhit /help if you need help navigating around.");

    $manifestos = array(    '1' => "50% youth County Ministers\nAmendment of Section 35 of County Government Act to make it Compulsory for appointment of Five Youth (2 Male & 2 Female 1 and Persons Living with Disability) as County Executive Committee Members (CECM)\nCounties must act as the incubation grounds for Kenyas next top leaders. The young people and marginalized population must make up to 50% of the county executive appointments besides being prioritized as the agents of grassroots change drivers.\nEffectively, more young people, women and persons living with disabilities at decision making spaces in counties mean improved access to government opportunities including the actualization of the AGPO rule alongside other economic benefits.",
                            '2' => "Deepening Devolution with People’s Participation as the fulcrum of County Governance\ni) a.	Devolution and Budget Champions\nUnder our initiative, Kisumu Youth Caucus in Partnership with the County Budget and Economic Forum (CBEF) have thus far trained 100 budget champions from 10 wards in the county of Kisumu.\nOur plan is to have 350 certified and well-equipped Devolution and Budget agents spread across the 35 wards and 70 villages.",
                            '3' => "A dominant majority of counties are yet to emulate the best practice exhibited by counties like Nakuru and Uasin Gishu where quarterly paid-up internship opportunities are provided to fresh graduates. We undertake to sponsor a County Internship Bill which shall seek to make a prominent pronouncement on compulsory provision of internships to skilled, semi-skilled and unskilled youth.\n\nThis shall provide a rare platform for young people to learn on the job while also earning to cope up with the demanding economic hardships. The net effect of this is that counties shall create jobs for the youth, train inhouse human resources with an adequate public sector knowledge for feasible succession and continuity.",      
                            '4' => "The needs of our predominantly young population vary from simple and cost-free support like mentorship role modeling. In the recent years our public leaders have denounced their natural role of handholding and mentoring others. Public offices have taken a turn. A majority of them look like private facilities with unnecessary protocol and security.",
                            '5' => "Conditional allocation of funds to develop our disadvantaged population\ni) Youth Women & PWD Enterprises and LSO/LPO financing\nii) City of Kisumu Disability Enterprise Mainstreaming\niii) County Social Welfare Fund",
                                            
                            '6' => "6. Safeguarding contractors and Local SME's\nOffice of the controller of the budget timely disbursement of funds",
                                                
                            '7' => "7. National Transition Act.\nAfter promulgation of the new constitution\nEnhanced inter-governmental relation and cooperation\nFull implementation of universal Health coverage\nImprove capacity to export goods to the rest of the world",
                                                    
                            '8' => "8. County Assembly Wards Revenue Allocation Formulae\nGrant assemblies autonomy to legislate and oversight county governments\nWard Development Fund\nWard Equaization Fund - framework to uplift rural and poor wards by connecting them to amenities like water, forests, parks and other endowments.",
                                                        
                            '9' => "9. Preserving County Government Autonomy\nInstitutionalization of Regional Blocs to develop regional identity to share common challenges and shared interests\nMake county budget and economic forum a semi-autonomous institution\nCounty Government Public-Private Partnership Bill\nAllow counties to self-guarantee financial instruments not more than three times their annual own source revenue",
                                                            
                            '10' => "10. 30% contribution to Umbrella\nMy office will provide the much-needed support for our little table banking and chama savings to grow them while acting as the Kisumu Cooperative Ambassador",
                                                                
                            '11' => "These teams will deepen people’s understanding of county government processes, separation of responsibilities between the National government agencies, CDF and the county government. Importantly, the champions will act as Trainer of Trainers (TOT) in their communities to enhance local contribution in citizen participation exercises including policy and budget making.",
                            '41' => "The higher the office the more in accessible the spaces have become to Wannanchi. Leaders in those offices have purposefully installed layers of human interfaces to escape one-on-one interactions with citizens.\nThis beats the true meaning of a high-ranking public servants with whom the ultimate responsibility to create a fair society and facilitating an enabling socio-economic climate lies. To reverse this unreasonable trend my office will act as a one stop public-centric leadership centre with the following innovations.",
                            '51' => "Article 202 states that revenue raised nationally shall be shared equitably among the National and County Governments. County governments may be given additional allocations from the national government’s share of the revenue, either conditionally or unconditionally."
                        );
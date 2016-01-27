<?php

return [
    'title'  => 'Contact',
    'form' => [
        'labels' => [
            'name' => 'Naam',
            'email' => 'E-mail',
            'message' => 'Boodschap',
        ],
        'placeholders' => [

        ],
        'submit' => 'Verstuur',
        'confirmation' => 'Bedankt. Uw bericht is verstuurd.',
    ],
    'error' => [
        'messages' => [
            'generic error' => 'Er ging iets fout tijdens het versturen van uw contactaanvraag',
            'name required' => 'Naam is verplicht',
            'email required' => 'E-mail is verplicht',
            'body required' => 'Boodschap is verplicht',
        ]
    ]
];

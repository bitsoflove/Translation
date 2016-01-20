<?php

return [
    'title'  => 'Contact',
    'dropdown' => [
        'change password' => 'wachtwoord veranderen',
        'signout' => 'afmelden',
    ],
    'password_changed' => 'Uw nieuw wachtwoord is ingesteld.',
    'form' => [
        'titles' => [
            'change_password' => 'Wachtwoord veranderen',
        ],

        'body' => [
            'password_rules' => "Uw wachtwoord moet minstens 6 karakters bevatten.",
            'please_change_your_password_for_the_first_time_title' => "welkom :first_name,",
            'please_change_your_password_for_the_first_time_text' => "U accepteerde de uitnodiging om <strong class='label label-info'>:site</strong> te raadplegen.<br>Vooraleer u verder kunt gaan, dient u uw wachtwoord te veranderen.<br><br>",
            'please_change_your_password_for_the_first_time_text_institution' => "U accepteerde de uitnodiging door <strong class='label label-info'>:institution</strong> om <strong class='label label-info'>:site</strong> te raadplegen.<br>Vooraleer u verder kunt gaan, dient u uw wachtwoord te veranderen.<br><br>",
        ],
        'labels' => [
            'wanted_password' => 'Voer uw gewenste wachtwoord in:',
            'wanted_password_confirmation' => 'Voer ter bevestiging uw gewenste wachtwoord nogmaals in:',
            'old_password' => "huidig wachtwoord",
            'new_password' => "nieuw wachtwoord",
            'new_password_confirmation' => "nieuw wachtwoord (bevestiging)",
        ],
        'buttons' => [
            'change_password_save' => 'wachtwoord veranderen',
        ]
    ],
];

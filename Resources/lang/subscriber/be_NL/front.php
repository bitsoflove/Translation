<?php

return [
    'title'  => 'Contact',
    'dropdown' => [
        'change password' => 'paswoord veranderen',
        'signout' => 'afmelden',
    ],
    'form' => [
        'titles' => [
            'change_password' => 'Paswoord veranderen',
        ],

        'body' => [
            'password_rules' => "Uw paswoord moet minstens 6 karakters bevatten.",
            'please_change_your_password_for_the_first_time_title' => "welkom :first_name,",
            'please_change_your_password_for_the_first_time_text' => "U werd uitgenodigd tot <span class='label label-info'>:site</span>. Vooraleer u verder kunt gaan, dient u uw paswoord te veranderen."
        ],
        'labels' => [
            'old_password' => "huidig paswoord",
            'new_password' => "nieuw paswoord",
            'new_password_confirmation' => "nieuw paswoord (bevestiging)",
        ],
        'buttons' => [
            'change_password_save' => 'paswoord veranderen',
        ]
    ],
];

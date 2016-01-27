<?php

return [
    'title'  => 'Contact',
    'dropdown' => [
        'change password' => 'wachtwoord veranderen',
        'signout' => 'afmelden',
    ],
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
        ],
    ],
    'errors' => [
        'account_disabled' => "Je account is niet langer actief.",
        //'invalid_credentials' => "Het spijt ons, deze logingegevens zijn niet geldig",
        'invalid_password' => "Ongeldig paswoord",
        'no_user_found_with_that_email' => "Er is geen gebruiker met dat e-mail adres geregistreerd in het systeem.",
        'authentication_generic_error' => "Er ging iets fout tijdens het inloggen.",
        'invalid_activation_code' => "De code die je gebruikte om je account te activeren, is ongeldig.",
        'reset_password_failed_unknown_email' => "Geen actieve gebruiker gevonden met dit e-mail adres.",
        'invalid_input' => 'Ongeldige invoer',
        'old_password_incorrect' => 'Het oude paswoord dat u hebt ingegeven, klopt niet.',
        'change_password_generic_error' => 'Er ging iets fout tijdens het veranderen van uw paswoord.',
    ],
    'messages' => [
        'user_already_activated' => "Deze gebruiker is reeds geactiveerd.",
        'reset_password_email_sent' => "We stuurden zonet een mail naar je toe waarmee je je paswoord opnieuw kunt instellen.",
        'password_changed' => 'Uw nieuw wachtwoord is ingesteld.',
    ]
];

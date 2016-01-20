<?php

return [
    'title'  => 'Contact',
    'dropdown' => [
        'change password' => 'Change password',
        'signout' => 'Sign out',
    ],
    'password_changed' => 'Your password has changed.',
    'form' => [
        'titles' => [
            'change_password' => 'Change password',
        ],

        'body' => [
            'password_rules' => "Your password has to be at least 6 characters long",
            'please_change_your_password_for_the_first_time_title' => "welcome :first_name,",
            'please_change_your_password_for_the_first_time_text' => "You have accepted the invite to consult <strong class='label label-info'>:site</strong>.<br>Before you can proceed,you have to change your password.<br><br>",
            'please_change_your_password_for_the_first_time_text_institution' => "You have accepted by <strong class='label label-info'>:institution</strong> to consult <strong class='label label-info'>:site</strong>.<br>Before you can proceed,you have to change your password.<br><br>",
        ],
        'labels' => [
            'wanted_password' => 'Enter your desired password:',
            'wanted_password_confirmation' => 'Re-enter your desired password as confirmation:',
            'old_password' => "current password",
            'new_password' => "new password",
            'new_password_confirmation' => "new password (confirmation)",
        ],
        'buttons' => [
            'change_password_save' => 'Change password',
        ]
    ],
];

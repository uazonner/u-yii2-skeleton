<?php

return [
    [
        'pattern' => 'backend/<action:(index|login|logout)>',
        'route'   => 'backend/site/<action>',
        'suffix'  => '.html',
    ],
];

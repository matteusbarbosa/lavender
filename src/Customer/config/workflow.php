<?php

return [

    'new_customer' => [

        10 => 'Lavender\Customer\Workflow\Register',

    ],

    'existing_customer' => [

        10 => 'Lavender\Customer\Workflow\Login'

    ],

    'customer_forgot_password' => [

        10 => 'Lavender\Customer\Workflow\ForgotPassword'

    ],

    'customer_reset_password' => [

        10 => 'Lavender\Customer\Workflow\ResetPassword'

    ],

];

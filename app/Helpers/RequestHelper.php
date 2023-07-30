<?php

namespace App\Helpers;

class RequestHelper
{
    public static function error_field($input_error, $field)
    {
        if (!empty($input_error[$field . '-msg-erro'])) :
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Attention!</strong> ';
            if (!empty($input_error[$field . '-msg-erro'])) :
                echo $input_error[$field . '-msg-erro'];
            endif;
            echo '
            <span type="button" class="close" data-dismiss="alert" aria-label="Close">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span aria-hidden="true">&times;</span>
            </span>
            </div>';
        endif;
    }

    public static function error_class($input_error, $field)
    {
        if (!empty($input_error[$field])) :
            echo 'input-error';
        endif;
    }

    public static function success_alert()
    {
        echo '<div class="alert alert-success" role="alert">
            <buttom type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </buttom>
            <h4 class="alert-heading">Success!</h4>
            <p>The action was a success!</p>
            <hr>
            <p class="mb-0">Try doing another one!</p>
        </div>';
    }

    public static function danger_alert()
    {
        echo '<div class="alert alert-danger" role="alert">
            <buttom type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </buttom>
            <h4 class="alert-heading">Error!</h4>
            <p>The action was <strong>not</strong> a success!</p>
            <hr>
            <p class="mb-0">Try finding out wat went wrong bellow.</p>
        </div>';
    }
}
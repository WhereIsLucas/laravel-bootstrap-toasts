<?php

if (! function_exists('toast')) {

    /**
     * Create a toast message.
     *
     * @param  string|null $message
     * @param  string|null $title
     * @param  string      $level
     * @return \WhereIsLucas\LaravelBootstrapToasts\Toaster
     */
    function toast($message = null, $title = null, $level = 'info')
    {
        $toaster = app('toaster');
        if (! is_null($message)) {
            return $toaster->toast($message, $level,$title);
        }

        return $toaster;
    }

}

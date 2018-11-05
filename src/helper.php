<?php

if (! function_exists('toast')) {
    /**
     * Return the instance of toast.
     *
     * @return Amirardakani\MaterialToast\Toast
     */
    function toast()
    {
        return app('toast');
    }
}
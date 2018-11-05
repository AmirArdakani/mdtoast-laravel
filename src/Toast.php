<?php

namespace Amirardakani\MaterialToast;

use Illuminate\Session\SessionManager as Session;


class Toast
{
    /**
     * The session manager.
     * @var \Illuminate\Session\SessionManager
     */
    protected $session;


    /**
     * The messages in session.
     *
     * @var array
     */
    protected $messages = [];

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function message()
    {
        $messages = $this->session->get('toast::message');

        if (! $messages) {
            $messages = [];
        }

        $script = '<script type="text/javascript">';

        foreach ($messages as $message) {
            $option = $message['option'] ?: null;
            $type = $message['type'];
            $script .= '$.mdtoast'.'(\'' . $message['content'] ."',{ type: '$type', $option }" .');';
        }

        $script .= '</script>';

        return $script;
    }

    /**
     *
     * Add a flash message to session.
     *
     * @param string $content The flash message content.
     * @param string $type Must be one of info, success, warning, error.
     * @param string $option The flash message option.
     * @return void
     */
    public function add($type, $content, $option = null)
    {
        $types = ['default', 'info', 'warning', 'success', 'error'];

        if (! in_array($type, $types)) {
            throw new Exception("The $type remind message is not valid.");
        }

        $this->messages[] = [
            'content' => $content,
            'type'    => $type,
            'option'   => $option,
        ];

        $this->session->flash('toast::message', $this->messages);
    }

    /**
     * Add an default flash message to session.
     *
     * @param string $content The flash message content.
     * @param string $option The flash message option.
     *
     * @return void
     */
    public function default($content, $option = null)
    {
        $this->add('default', $content, $option);
    }

    /**
     * Add an info flash message to session.
     *
     * @param string $content The flash message content.
     * @param string $option The flash message option.
     *
     * @return void
     */
    public function info($content, $option = null)
    {
        $this->add('info', $content, $option);
    }

    /**
     * Add a success flash message to session.
     *
     * @param string $content The flash message content.
     * @param string $option The flash message option.
     *
     * @return void
     */
    public function success($content, $option = null)
    {
        $this->add('success', $content, $option);
    }

    /**
     * Add an warning flash message to session.
     *
     * @param string $content The flash message content.
     * @param string $option The flash message option.
     *
     * @return void
     */
    public function warning($content, $option = null)
    {
        $this->add('warning', $content, $option);
    }

    /**
     * Add an error flash message to session.
     *
     * @param string $content The flash message content.
     * @param string $option The flash message option.
     *
     * @return void
     */
    public function error($content, $option = null)
    {
        $this->add('error', $content, $option);
    }

    /**
     * Clear messages
     *
     * @return void
     */
    public function clear()
    {
        $this->messages = [];
    }
    
}

<?php

namespace WhereIsLucas\LaravelBootstrapToasts;

class Toaster
{
    /**
     * The toast collection.
     *
     * @var \Illuminate\Support\Collection
     */
    public $toasts;

    /**
     * Create a new Toaster instance.
     *
     */
    function __construct()
    {
        $this->toasts = collect();
    }

    /**
     * Creates a info level toast
     * @param null|string $message
     * @return Toaster
     */
    public function info($message = null)
    {
        return $this->toast($message, 'info');
    }

    /**
     * Creates a success level toast
     * @param null|string $message
     * @return Toaster
     */
    public function success($message = null)
    {
        return $this->toast($message, 'success');
    }

    /**
     * Creates a error level toast
     * @param null|string $message
     * @return Toaster
     */
    public function error($message = null)
    {
        return $this->toast($message, 'danger');
    }

    /**
     * Creates a warning level toast
     * @param null|string $message
     * @return Toaster
     */
    public function warning($message = null)
    {
        return $this->toast($message, 'warning');
    }

    /**
     * Set the title of a toast
     * @param null|string $title
     * @return Toaster
     */
    public function title($title)
    {
        $this->updateLastToast(["title" => $title]);

        return $this;
    }

    /**
     * Creates a general toast.
     *
     * @param  string|null $message
     * @param  string|null $title
     * @param  string|null $level
     * @return $this
     */
    public function toast($message = null, $level = null, $title = null)
    {
        // If the message is null, we update the level on the last one
        if (! $message) {
            return $this->updateLastToast(compact('level'));
        }
        if (! $message instanceof Toast) {
            $toast = new Toast(compact('message', 'level','title'));
        }

        $this->toasts->push($toast);

        return $this->flash();
    }

    /**
     * Modify the most recently added toast.
     *
     * @param  array $overrides
     * @return $this
     */
    protected function updateLastToast($overrides = [])
    {
        $this->toasts->last()->update($overrides);

        return $this;
    }


    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->toasts->last()->autohide = false;
        return $this;
    }

    /**
     * Empty the toasts collection.
     *
     * @return $this
     */
    public function clear()
    {
        $this->toasts = collect();

        return $this;
    }

    /**
     * Flash the toasts collection to the session
     */
    protected function flash()
    {
        app()->session->flash('toasts', $this->toasts);

        return $this;
    }
}


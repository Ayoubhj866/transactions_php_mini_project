<?php

namespace App\Core;

class View
{

    /**
     * COnstructor
     *
     * @param string $view
     * @param mixed $data
     */
    public function __construct(
        protected string $view,
        protected mixed $data = []
    ) {
    }

    /**
     * Return self instance
     *
     * @param string $view
     * @param mixed $data
     * @return static
     */
    public static function make(string $view, mixed $data = []): static
    {
        return new static($view, $data);
    }

    /**
     * Get View
     *
     * @return string
     */
    public function render(): string
    {

        $viewPath = VIEWS_PATH  . $this->view . ".php";

        if (!file_exists($viewPath)) {
            Alert::make("La page est introvable", "error");
            header("Location: /");
        }

        /**
         * THIS DATA WILL BE USED IN THE VIEW
         */
        $data = $this->data;

        ob_start();
        require $viewPath;
        return ob_get_clean();
    }

    /**
     * __toString : handler veiw object whin is called with ::make
     *
     * @return void
     */
    public function __toString()
    {
        return $this->render();
    }
}

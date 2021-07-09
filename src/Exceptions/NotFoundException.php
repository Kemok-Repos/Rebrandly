<?php

namespace KemokRepos\Rebrandly\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    /**
     * The array of errors.
     *
     * @var array
     */
    public $errors;

    /**
     * Create a new exception instance.
     *
     * @param  array  $errors
     * @return void
     */
    public function __construct(array $errors)
    {
        parent::__construct('Resource not found.');

        $this->errors = $errors;
    }

    /**
     * The array of errors.
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}

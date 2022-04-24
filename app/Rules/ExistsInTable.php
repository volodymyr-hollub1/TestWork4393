<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistsInTable implements Rule
{
    private string $ruleEntity;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(private string $table, private string $columnName)
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->ruleEntity = $attribute;

        if ($value && is_integer($value)) {
            $result = DB::select("SELECT
            {$this->columnName} FROM {$this->table}
            WHERE {$this->columnName}
            = ({$value})");

            return $result ? true : false;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Item or items in {$this->ruleEntity} doesn't exists";
    }
}

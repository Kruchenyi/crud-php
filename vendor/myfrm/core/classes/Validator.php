<?php

namespace myfrm;

class Validator
{
    public $errors = [];
    protected $rule_list = ['required', 'min', 'max'];
    protected $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimun :rulevalue: characters',
        'max' => 'The :fieldname: field must be a maximum :rulevalue: characters'
    ];

    public function validation($data = [], $rules = [])
    {
        foreach ($data as $fieldname => $value) {
            if (isset($rules[$fieldname])) {
                $this->check([
                    'fieldname' => $fieldname,
                    'value' => $value,
                    'rules' => $rules[$fieldname]
                ]);
            }
        }

        return $this;
    }
    protected function check($field)
    {
        foreach ($field['rules'] as $rule => $rule_value) {
            if (in_array($rule, $this->rule_list)) {
                if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value])) {
                    $this->addErrors(
                        $field['fieldname'],
                        str_replace(
                            [':fieldname:', ':rulevalue:'],
                            [$field['fieldname'], $rule_value],
                            $this->messages[$rule]
                        )
                    );
                }
            }
        }
    }
    protected function addErrors($fieldname, $error)
    {
        return $this->errors[$fieldname][] = $error;
    }
    public function hasError()
    {
        return !empty($this->errors);
    }
    public function getError()
    {
        return $this->errors;
    }
    public function printError($key)
    {
        $out = '';

        if (isset($this->errors[$key])) {
            $out .= "<ul>";
            foreach ($this->errors[$key] as $e) {
                $out .= "<li class='error_list'>$e</li>";
            }
            $out .= "</ul>";
        }

        return $out;
    }

    protected function required($value, $rule_value)
    {
        return !empty($value);
    }
    protected function min($value, $rule_value)
    {
        return mb_strlen($value) >= $rule_value;
    }
    protected function max($value, $rule_value)
    {
        return mb_strlen($value) <= $rule_value;
    }
}

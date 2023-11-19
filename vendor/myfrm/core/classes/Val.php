<?php

class Validator
{
    protected $errors = [];
    protected $rules_list = ['required', 'min', 'max']; //список параметров

    protected $messages = [
        'required' => 'The :fieldname: field is required',
        'min' => 'The :fieldname: field must be a minimun :rulevalue: characters',
        'max' => 'The :fieldname: field must be a maximum :rulevalue: characters',
    ];

    public function validation($data = [], $rules = [])
    {
        // printArr($data);
        // printArr($rules);

        foreach ($data as $fieldname => $value) {     // в массиве приходящем из сервера берем ключ и значение  
            if (in_array($fieldname, array_keys($rules))) {     // в массиве правил проверяем совпадение ключа из $data по ключу из $rules
                $this->check([                              // передаем данные в функцию check()
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

        foreach ($field['rules'] as $rule => $rule_value) { // перебор массива правил, вытаскиваем ключ и его значение min => 5
            if (in_array($rule, $this->rules_list)) {       // если ключ $rule есть в списке параметров $rule_list указанном вверху
                if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value])) {
                    /*
                    ? первый аргументом передается массив в котором $this является самим классом,
                    ? а в $rule находится строка с именем метода который должен совпадать с методаним ниже required(), min(),max()
                    ? $field['value'] - находится значение, то что ввел пользователь в строку
                    ? $rule_vale - находится значение самого правила => 5 => 190 и тд
                    ? $field['value'] и $rule_vale передаются функциям описанным ниже в качестве аргументов и уже они возвращают результат
                    */
                    $this->addError($field['fieldname'], str_replace(
                        [':fieldname:', ':rulevalue:'],
                        [$field['fieldname'], $rule_value],
                        $this->messages[$rule]
                    ));


                    // echo "{$field['fieldname']}: $rule -failed <br>";
                    // ? тут вывод название поля : и проверяющеее поле с результот failed. напр title: required - failed
                } else {
                    // echo "{$field['fieldname']}: $rule -success <br>";
                    // ? тут вывод название поля : и проверяющеее поле с результот failed. напр title: min - success
                }
            }
        }
    }

    protected function addError($fieldname, $error)
    {
        $this->errors[$fieldname][] = $error;
    }
    public function getError()
    {
        return $this->errors;
    }
    public function hasError()
    {
        return !empty($this->errors);
    }
    protected function required($value, $rule_value)
    {
        return !empty(trim($value));                    // если поле requaered не пустое вернет true
    }
    protected function min($value, $rule_value)
    {
        return mb_strlen($value) >= $rule_value;       // если длни строки указанная пользователем больше чем указанное в $rules вернет true
    }
    protected function max($value, $rule_value)
    {
        return mb_strlen($value) <= $rule_value;      // если длни строки указанная пользователем больше чем указанное в $rules вернет true
    }
}

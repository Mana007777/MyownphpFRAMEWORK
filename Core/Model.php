<?php

namespace app\Core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
        
    }

    abstract public function rules();

    public array $errors = [];
    public function validate(){

    foreach ($this->rules() as $attrib => $rule) {
        $value = $this->{$attrib};
        foreach ($rule as $rule) {
            $ruleName = $rule;
            if(!is_string($ruleName)){
                $ruleName = $rule[0];
            }
            if($ruleName === self::RULE_REQUIRED && !$value){
                $this->addError($attrib, SELF::RULE_REQUIRED);
            }
            if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                $this->addError($attrib, self::RULE_EMAIL);
            }
            if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                $this->addError($attrib, self::RULE_MIN, ['min' => $rule['min']]);
            }
            if($ruleName === self::RULE_MAX && strlen($value) > $rule['max']){
                $this->addError($attrib, self::RULE_MAX, ['max' => $rule['max']]);
            }
            if($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}){
                $this->addError($attrib, self::RULE_MATCH, ['match' => $rule['match']]);
            }
        }        

    }
} 

public function addError(string $attrib ,string $rule, $params = []){
    $message = $this->errorMessages()[$rule] ?? '';
    $this->errors[$attrib][] = $message;
}

public function errorMessages(): array{
    return [
        self::RULE_REQUIRED => 'This field is required',
        self::RULE_EMAIL => 'This field must be a valid email address',
        self::RULE_MIN => 'Min length of this field must be {min}',
        self::RULE_MAX => 'Max length of this field must be {max}',
        self::RULE_MATCH => 'This field must be the same as {match}'
    ];
}
}
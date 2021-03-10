<?php

namespace App\Validation;

class Validator {

    private $data;
    private $errors;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray)
        {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required': 
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min': 
                            $this->min($name, $this->data[$name], $rule);
                            break;
                        case substr($rule, 0, 8) === 'contains':
                            $this->contains($name, $this->data[$name], $rule);
                            break;
                        case 'mail': 
                            $this->isValidMail($name, $this->data[$name]);
                            break;
                        default: 
                            break;
                    }
                }
            }
        }

        return $this->getErrors();
    }

    private function required(string $name, string $value)
    {
        $value = trim($value);

        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "{$name} est requis.";
        }
    }

    private function min(string $name, string $value, string $rule) 
    {
        //Récupére tout les nombres digitales dans ma chaîne de caractère
        preg_match_all('/(\d+)/', $rule, $matches);

        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) {
            $this->errors[$name][] = "{$name} doit comprendre un minimum de {$limit} caractères.";
        }
    }

    private function contains(string $name, string $value, string $rule)
    {
        $characters = str_replace('contains:', '', $rule);
        $listChar = str_split($characters);
        $err = false;

        if (isset($value)) {

            foreach ($listChar as $forbiddenChar) {
                if (strpos($value, $forbiddenChar)){
                    $err = true;
                }
            }
    
            if ($err) {
                $this->errors[$name][] = "{$name} ne doit pas contenir les charactéres suivants : {$characters}";
            }

        }
    }

    private function isValidMail(string $name, string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$name][] = "L'adresse email n'est pas valide.";
        }
    }

    private function getErrors(): ?array
    {
        return $this->errors;
    }

}
<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends FormRequest
{
    protected $module = 'general';

    public function authorize()
    {
        return true;
    }

    public function validationData()
    {
        $data = parent::validationData();
        if ($this->isJson()) {
            $json = json_decode($this->getContent(), 1);
            $data = !is_null($json) ? $json : $data;
        }
        return $data;
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = [];
        foreach ($validator->errors()->getMessages() as $key => $error) {
            $key = str_replace(".", "_", $key);
            $errors[$key] = implode(', ', $error);
        }
        $errors = $this->processErrors($errors);

        throw new HttpResponseException(response()->json([
            'status' => 'INVALID_DATA',
            'errors' => $errors
        ], 200));
    }

    protected function processErrors($errors)
    {
        return $errors;
    }

    protected function defaultValues()
    {
        return [];
    }

    protected function prepareForValidation()
    {
        $inputs = [];
        foreach ($this->defaultValues() as $field => $value) {
            if (is_null($value) || is_int($value)) {
                $inputs[$field] = !empty($this->$field) ? $this->$field : $value;
            } else if (is_array($value) && !empty($value)) {
                $subs = [];
                if (!empty($this->$field)) {
                    foreach ($this->$field as $key => $values) {
                        $subs[$key] = [];
                        foreach ($value as $subKey => $subVal) {
                            if (is_null($subVal) || is_int($subVal)) {
                                $subs[$key][$subKey] = !empty($values[$subKey]) ? $values[$subKey] : $subVal;
                            } else {
                                $subs[$key][$subKey] = isset($values[$subKey]) ? $values[$subKey] : $subVal;
                            }
                        }
                    }
                }
                $this->merge([$field => $subs]);
            } else {
                $inputs[$field] = isset($this->$field) ? $this->$field : $value;
            }
        }
        $this->merge($inputs);
    }

    public function messages()
    {
        $messages = [];
        foreach ($this->rules() as $field => $rule) {
            $key = preg_replace('/(.+)\.(.+)\.(.+)/i', '$1.*.$3', $field);
            $field = strrpos($key, '.') !== false ? substr($key, strrpos($key, '.') + 1) : $key;
            $messages[$key . '.required'] = trans('pos.' . $this->module . '.' . $field . '.required');
            $messages[$key . '.*'] = trans('pos.' . $this->module . '.' . $field . '.invalid');
        }
        return $messages;
    }
}

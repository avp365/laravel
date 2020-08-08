<?php


namespace App\Http\Controllers\Api\LangConstructor\Requests;

use App\Http\Controllers\LangConstructor\Requests\SaveLangConstructorRequest as SaveLangConstructorRequestForm;

class SaveLangConstructorRequest extends SaveLangConstructorRequestForm
{

    const ID_API_USER = 1;

    public function authorize()
    {
        return true;
    }


    public function getFormData()
    {
        $data = $this->request->all();
        $data['created_account_id'] = self::ID_API_USER;

        unset($data['api_token']);

        return $data;
    }


}

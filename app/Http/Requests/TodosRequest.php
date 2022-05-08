<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 初期値のfalseをtrueに変更する。falseのままアクションを実行できません。
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required' 
        ];
    }

    /**
     * エラーメッセージ
     */
    public function messages(){
        return [
            'body.required' => 'タスク内容は必須入力です。'
        ];
    }
}

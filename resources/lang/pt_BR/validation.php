<?php

return [

    // Mensagens padrão de validação
    'accepted' => 'O campo :attribute deve ser aceito.',
    'active_url' => 'O campo :attribute não é uma URL válida.',
    'after' => 'O campo :attribute deve ser uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute deve ser uma data posterior ou igual a :date.',
    'alpha' => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deve conter apenas letras, números e traços.',
    'alpha_num' => 'O campo :attribute deve conter apenas letras e números.',
    // (... você pode incluir outras mensagens padrão aqui)

    // Traduções personalizadas
    'custom' => [
        'email' => [
            'unique' => 'Este e-mail já está em uso.',
        ],
        'password' => [
            'confirmed' => 'A confirmação da senha não confere.',
        ],
    ],

    // Atributos legíveis
    'attributes' => [
        'email' => 'e-mail',
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
        'name' => 'nome',
    ],
];

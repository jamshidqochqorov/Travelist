<?php

return [
    'userManagement' => [
        'title'          => 'Foydalanuvchini boshqarish',
        'title_singular' => 'Boshqarish',
    ],
    'permission'     => [
        'title'          => 'Ruxsatlarni boshqarish',
        'title_singular' => 'Ruxsat',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Izoh',
            'name'              => 'Nomi',
            'permissions'       => 'Ruxsatlar',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'           => [
        'title'          => 'Ro`llarni boshqarish',
        'title_singular' => 'Ro`l',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'             => 'Izoh',
            'name'              => 'Nomi',
            'roles'             => 'Rollari',
            'title_helper'       => ' ',
            'permissions'        => 'Ro`lning ruxsatlari',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'           => [
        'title'          => 'Foydalanuvchilar',
        'title_singular' => 'Foydalanuvchi',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Ism',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Parol',
            'password_helper'          => ' ',
            'roles'                    => 'Ro`llari',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'agent'=>[
        'title'=>'Agentlar',
        'title_singular' => 'Agent',
        'fields'=>[
            'id'=>'ID',
            'firstname'=>'Ism',
            'lastname'=>'Familya',
            'phone'=>'Telfon Nomer',
            'promo_cod'=>'Promo Kod'

        ]
    ]
];

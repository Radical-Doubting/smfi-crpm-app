<?php

namespace App\Orchid\Layouts\User\Admin;

use App\Orchid\Layouts\AnikulturaEditLayout;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Password;

class AdminEditAccountLayout extends AnikulturaEditLayout
{
    protected function fields(): iterable
    {
        $admin = $this->query->get('admin');
        $hasAdmin = is_null($admin) ? false : $admin->exists;

        $passwordPlaceholder = $hasAdmin
            ? __('Leave empty to keep current password')
            : __('Enter the password to be set');

        return [
            Group::make([
                Input::make('admin.first_name')
                    ->title(__('First Name'))
                    ->placeholder(__('First Name'))
                    ->required(),

                Input::make('admin.middle_name')
                    ->title(__('Middle Name'))
                    ->placeholder(__('Middle Name')),

                Input::make('admin.last_name')
                    ->title(__('Last Name'))
                    ->placeholder(__('Last name'))
                    ->required(),
            ]),

            Group::make([
                Input::make('admin.name')
                    ->title(__('Username'))
                    ->placeholder(__('Username'))
                    ->required(),

                Password::make('admin.password')
                    ->title(__('Password'))
                    ->placeholder($passwordPlaceholder)
                    ->required(! $hasAdmin),
            ]),

            Group::make([
                Input::make('admin.email')
                    ->type('email')
                    ->title(__('Email'))
                    ->placeholder('email@example.com'),

                Input::make('admin.contact_number')
                    ->title(__('Mobile Number'))
                    ->placeholder('09123456789'),
            ]),
        ];
    }
}

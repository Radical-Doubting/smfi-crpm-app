<?php

namespace App\Orchid\Layouts\Farmer;

use App\Models\Farmer\CivilStatus;
use App\Models\Farmer\Gender;
use App\Orchid\Layouts\AnikulturaEditLayout;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;

class FarmerEditPersonalLayout extends AnikulturaEditLayout
{
    protected function fields(): iterable
    {
        return [
            Group::make([
                Select::make('farmerProfile.gender')
                    ->fromModel(Gender::class, 'name')
                    ->title(__('Gender'))
                    ->required(),

                Select::make('farmerProfile.civil_status')
                    ->fromModel(CivilStatus::class, 'name')
                    ->title(__('Civil Status'))
                    ->required(),
            ]),

            Group::make([
                Input::make('farmerProfile.birthday')
                    ->type('date')
                    ->title(__('Birthdate'))
                    ->placeholder(__('Birthdate'))
                    ->required(),
            ]),

            Group::make([
                Input::make('farmerProfile.quantity_family_members')
                    ->type('number')
                    ->title(__('Number of Family Members'))
                    ->placeholder(__('Number of Family Members'))
                    ->required(),

                Input::make('farmerProfile.quantity_dependents')
                    ->type('number')
                    ->title(__('Number of Dependents'))
                    ->placeholder(__('Number of Dependents'))
                    ->required(),

                Input::make('farmerProfile.quantity_working_dependents')
                    ->type('number')
                    ->title(__('Number of Working Dependents'))
                    ->placeholder(__('Number of Working Dependents'))
                    ->required(),
            ]),

        ];
    }
}

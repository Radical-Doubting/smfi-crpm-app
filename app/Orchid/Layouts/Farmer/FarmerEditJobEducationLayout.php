<?php

namespace App\Orchid\Layouts\Farmer;

use App\Models\Farmer\EducationalStatus;
use App\Orchid\Layouts\AnikulturaEditLayout;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;

class FarmerEditJobEducationLayout extends AnikulturaEditLayout
{
    protected function fields(): iterable
    {
        return [
            Group::make([
                Select::make('farmerProfile.highest_educational_status')
                    ->fromModel(EducationalStatus::class, 'name')
                    ->title(__('Highest Educational Status'))
                    ->required(),

                Input::make('farmerProfile.college_course')
                    ->title(__('College Course'))
                    ->placeholder(__('College Course')),
            ]),

            Group::make([
                Input::make('farmerProfile.current_job')
                    ->title(__('Current Job'))
                    ->placeholder(__('Current Job'))
                    ->required(),

                Input::make('farmerProfile.farming_years')
                    ->type('number')
                    ->min(1)
                    ->max(256)
                    ->title(__('Farming Years'))
                    ->placeholder(__('Farming Years'))
                    ->required(),
            ]),

            Group::make([
                Input::make('farmerProfile.usual_crops_planted')
                    ->title(__('Usual Crops Planted'))
                    ->placeholder(__('Usual Crops Planted'))
                    ->required(),

                Input::make('farmerProfile.affiliated_organization')
                    ->title(__('Affiliated Organization'))
                    ->placeholder(__('Affiliated Organization'))
                    ->required(),
            ]),

            Group::make([
                Input::make('farmerProfile.tesda_training_joined')
                    ->title(__('TESDA Training Joined'))
                    ->placeholder(__('TESDA Training Joined'))
                    ->required(),

                CheckBox::make('farmerProfile.nc_passer_status')
                    ->title(__('Is an NC Passer?')),
            ]),
        ];
    }
}

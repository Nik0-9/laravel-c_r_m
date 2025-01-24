<?php

namespace App\Orchid\Resources;

use App\Models\Agency;
use App\Models\Employee;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class EmployeeResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Employee::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
                ->title('Name')
                ->placeholder('Enter name here')
                ->maxlength(50)
                ->type('text')
                ->required(),

            Input::make('surname')
                ->title('Surname')
                ->placeholder('Enter surname here')
                ->maxlength(50)
                ->type('text')
                ->required(),

            Input::make('phone')
                ->title('Phone')
                ->placeholder('Enter phone here')
                ->maxlength(25)
                ->type('number')
                ->required(),

            Input::make('email')
                ->title('Email')
                ->placeholder('Enter email here')
                ->maxlength(100)
                ->type('email')
                ->required(),

            Select::make('agency_id')
                ->fromModel(Agency::class, 'name')
                ->title('Agency')
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),
            TD::make('name', 'Name'),
            TD::make('surname', 'Surname'),
            TD::make('phone', 'Phone'),
            TD::make('email', 'Email'),
            TD::make('agency_id', 'Agency')
                ->render(function ($employee) {
                    return $employee->agency ? $employee->agency->name : 'No Agency';
                }),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('name', 'Name'),
            Sight::make('surname', 'Surname'),
            Sight::make('phone', 'Phone'),
            Sight::make('email', 'Email'),
            Sight::make('created_at', 'Date of creation'),
            Sight::make('updated_at', 'Date of update'),
            Sight::make('agency_id', 'Agency')
                ->render(function ($employee) {
                    return $employee->agency ? $employee->agency->name : 'No Agency';
                }),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}

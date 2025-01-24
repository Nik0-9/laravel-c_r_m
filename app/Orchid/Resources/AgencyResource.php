<?php

namespace App\Orchid\Resources;

use App\Models\Agency;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class AgencyResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Agency::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Picture::make('logo_path')
            ->title('Logo')
            ->targetRelativeUrl(),
            Input::make('name')
            ->title('Name')
            ->placeholder('Enter name here')
            ->required()
            ->maxlength(50),
            Input::make('partitaIva')->
            title('Parita IVA')->
            placeholder('enter partita IVA here')
            ->required()
            ->minlength(11)
            ->maxlength(11)
            ->rule('unique:agencies,partitaIva|numeric|')
            ->mask('99999999999'),
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
            TD::make('logo_path', 'Logo')
            ->render(function ($model) {
                return "<img src='" . asset( $model->logo_path) . "' width='100'>";
            }),
            TD::make('name', 'Name'),
            TD::make('partitaIva', 'Partita IVA'),

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
            Sight::make('name', 'Agency name'),
            Sight::make('partitaIva', 'Partita Iva'),
            Sight::make('created_at', 'Date of creation'),
            Sight::make('updated_at', 'Date of update'),
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

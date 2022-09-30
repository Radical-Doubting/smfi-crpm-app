<?php

declare(strict_types=1);

namespace App\Orchid\Presenters;

class AdminPresenter extends UserPresenter
{
    public function label(): string
    {
        return __('Administrators');
    }

    public function subTitle(): string
    {
        return __('Administrator');
    }

    public function url(): string
    {
        return route('platform.systems.users.edit', $this->entity);
    }
}

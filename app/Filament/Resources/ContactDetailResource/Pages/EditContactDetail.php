<?php

namespace App\Filament\Resources\ContactDetailResource\Pages;

use App\Filament\Resources\ContactDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactDetail extends EditRecord
{
    protected static string $resource = ContactDetailResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

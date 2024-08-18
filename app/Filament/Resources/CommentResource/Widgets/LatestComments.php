<?php

namespace App\Filament\Resources\CommentResource\Widgets;

use Filament\Tables;
use App\Models\Comment;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestComments extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Comment::whereDate('created_at', '>=', now()->subDays(30))
            )
            ->columns([
                TextColumn::make('post.title'),
                TextColumn::make('user.name'),
                TextColumn::make('comment'),
            ])
            ->actions([
                Action::make('Edit')
                    ->url(fn(Comment $record) => route('filament.admin.resources.comments.edit', $record))
            ]);
    }
}

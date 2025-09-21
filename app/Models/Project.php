<?php

declare(strict_types=1);

namespace App\Models;

use App\Enum\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ['is_published', 'title', 'description', 'technologies', 'repository_url', 'project_url', 'features'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_published' => ProjectStatusEnum::class,
        ];
    }

    /**
     * Get the project status attribute.
     *
     * @return Attribute<string, string>
     */
    protected function publishedStatus(): Attribute
    {
        return Attribute::make(
            // @phpstan-ignore-next-line
            get: fn (): string => $this->is_published === ProjectStatusEnum::PUBLISHED ? ProjectStatusEnum::PUBLISHED->label() : ProjectStatusEnum::DRAFTED->label()
        );
    }

    /**
     *  Get the technologies as an array
     *
     * @return Attribute<string,string>
     */
    protected function getTechStack(): Attribute
    {
        return Attribute::make(
            get: fn (): array => explode(',', $this->technologies)
        );
    }

    /**
     *  Get the features as an array
     *
     * @return Attribute<string,string>
     */
    protected function getFeatures(): Attribute
    {
        return Attribute::make(
            get: fn (): array => explode(',', $this->features)
        );
    }
}

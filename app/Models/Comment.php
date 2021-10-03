<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $entity_id
 * @property string $entity_type
 * @property string $author
 * @property string $body
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Comment extends Model
{
    protected $table = 'comments';

    public function getId(): int
    {
        return $this->id;
    }

    public function getEntityId(): int
    {
        return $this->entity_id;
    }

    public function getEntityType(): string
    {
        return $this->entity_type;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}

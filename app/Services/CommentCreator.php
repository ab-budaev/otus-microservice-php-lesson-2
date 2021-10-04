<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Comment;
use Psr\Log\LoggerInterface;

class CommentCreator
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function createComment(
        string $entityType,
        int    $entityId,
        string $author,
        string $body
    ): void
    {
        $comment = new Comment();
        $comment->entity_type = $entityType;
        $comment->entity_id = $entityId;
        $comment->author = $author;
        $comment->body = $body;
        $comment->save();

        $this->logger->info('New comment added', [
            'comment_id' => $comment->getId(),
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\CommentCreator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentsController extends Controller
{
    public function actionGetComments(Request $request): JsonResponse
    {
        $entityType = $request->query('entityType');
        $entityId = $request->query('entityId');

        if ($entityId === null || $entityType === null) {
            return new JsonResponse([
                'error' => 'Entity should be specified',
            ], Response::HTTP_BAD_REQUEST);
        }

        /** @var array<Comment> $comments */
        $comments = Comment::query()
            ->where('entity_type', '=', $entityType)
            ->where('entity_id', '=', $entityId)
            ->get();

        $response = [];

        foreach ($comments as $comment) {
            $response[] = [
                'id'         => $comment->getId(),
                'author'     => $comment->getAuthor(),
                'body'       => $comment->getBody(),
                'entityType' => $comment->getEntityType(),
                'entityId'   => $comment->getEntityId(),
            ];
        }

        return new JsonResponse($response);
    }

    public function actionCreateNewComment(Request $request, CommentCreator $commentCreator): JsonResponse
    {
        $entityType = $request->get('entityType');
        $entityId = (int)$request->get('entityId');
        $author = $request->get('author');
        $body = $request->get('body');

        // Some validation logic

        $commentCreator->createComment(
            $entityType,
            $entityId,
            $author,
            $body
        );

        return new JsonResponse([], Response::HTTP_CREATED);
    }
}

<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Users",
 *     description="API Endpoints for Users"
 * )
 */

/**
 * @OA\Get(
 *     path="/api/users",
 *     operationId="getUsersList",
 *     tags={"Users"},
 *     summary="Obter lista de usuários",
 *     description="Retorna uma lista de usuários",
 *     @OA\Response(
 *         response=200,
 *         description="Lista de usuários",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/User")
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/api/users/{id}",
 *     operationId="getUserByID",
 *     tags={"Users"},
 *     summary="Obter lista de usuários",
 *     description="Retorna uma lista de usuários",
 *     @OA\Response(
 *         response=200,
 *         description="Lista de usuários",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/User")
 *         )
 *     )
 * )
 */
class Users
{
}

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     required={"id", "name", "email"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID do usuário"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nome do usuário"
 *     ),
 *     @OA\Property(
 *         property="email",
 *         type="string",
 *         description="Email do usuário"
 *     )
 * )
 */
class UserSchema
{
}

<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Championship",
 *     description="API Endpoints for Championship"
 * )
 */

/**
 * @OA\Get(
 *     path="/api/championship",
 *     operationId="getChampionshipList",
 *     tags={"Championship"},
 *     summary="Obter lista de campeonatos",
 *     description="Retorna uma lista dos campeonatos",
 *     @OA\Response(
 *         response=200,
 *         description="Lista de campeonatos",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/ChampionshipArray")
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/api/championship/{id}",
 *     operationId="getChampionshipById",
 *     tags={"Championship"},
 *     summary="Obter campeonato por ID",
 *     description="Retorna um campeonato específico",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Dados do campeonato",
 *         @OA\JsonContent(ref="#/components/schemas/Championship")
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid param: Championship not found."
 *     )
 * )
 */


class Championship
{
}

/**
 * @OA\Schema(
 *     schema="Championship",
 *     type="object",
 *     title="Championship",
 *     required={"id", "name", "created_at", "updated_at"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID do campeonato"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nome do campeonato"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de criação do campeonato"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de atualização do campeonato"
 *     )
 * )
 */


/**
 * @OA\Schema(
 *     schema="ChampionshipArray",
 *     type="object",
 *     title="Championship",
 *     required={"id", "name", "created_at", "updated_at"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID do campeonato"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nome do campeonato"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de criação do campeonato"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de atualização do campeonato"
 *     )
 * )
 */
class ChampionshipSchema
{
}

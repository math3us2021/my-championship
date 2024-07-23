<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Teams",
 *     description="API Endpoints for Championship"
 * )
 */

/**
 * @OA\PathItem(
 *     path="/api/teams",
 *     @OA\Get(
 *         operationId="getTeamsAll",
 *         tags={"Teams"},
 *         summary="Obter time por ID",
 *         description="Retorna um time específico",
 *         @OA\Parameter(
 *             name="id",
 *             in="path",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),
 *         @OA\Response(
 *             response=200,
 *             description="Dados do time",
 *             @OA\JsonContent(ref="#/components/schemas/Teams")
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid param: Championship not found."
 *         )
 *     ),
 *     @OA\Post(
 *          operationId="createTeams",
 *          tags={"Teams"},
 *          summary="Criar um novo time",
 *          description="Cria um novo time com as informações fornecidas",
 *          @OA\RequestBody(
 *              required=true,
 *              @OA\MediaType(
 *                  mediaType="application/json",
 *                  @OA\Schema(
 *                      type="object",
 *                      required={"name"},
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                          description="Nome do time",
 *                          example="Campeone"
 *                      )
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=201,
 *              description="Time criado com sucesso",
 *              @OA\JsonContent(
 *                  type="object",
 *                  @OA\Property(
 *                      property="id",
 *                      type="integer",
 *                      description="ID do time",
 *                      example=9
 *                  ),
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                      description="Nome do time",
 *                      example="Campeone"
 *                  ),
 *                  @OA\Property(
 *                      property="created_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de criação do time",
 *                      example="2024-07-23T01:27:39.000000Z"
 *                  ),
 *                  @OA\Property(
 *                      property="updated_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de atualização do time",
 *                      example="null"
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=400,
 *              description="Dados inválidos para a criação do time"
 *          )
 *      ),
 *     @OA\Put(
 *          operationId="updateTeams",
 *          tags={"Teams"},
 *          summary="Atualizar um time existente",
 *          description="Atualiza as informações de um time existente",
 *          @OA\Parameter(
 *              name="id",
 *              in="path",
 *              required=true,
 *              @OA\Schema(
 *                  type="integer"
 *              )
 *          ),
 *          @OA\RequestBody(
 *              required=true,
 *              @OA\MediaType(
 *                  mediaType="application/json",
 *                  @OA\Schema(
 *                      type="object",
 *                      required={"name"},
 *                      @OA\Property(
 *                          property="name",
 *                          type="string",
 *                          description="Nome do time",
 *                          example="Campeone"
 *                      )
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=200,
 *              description="Time atualizado com sucesso",
 *              @OA\JsonContent(
 *                  type="object",
 *                  @OA\Property(
 *                      property="id",
 *                      type="integer",
 *                      description="ID do time",
 *                      example=9
 *                  ),
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                      description="Nome do time",
 *                      example="Campeone"
 *                  ),
 *                  @OA\Property(
 *                      property="created_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de criação do time",
 *                      example="2024-07-23T01:27:39.000000Z"
 *                  ),
 *                  @OA\Property(
 *                      property="updated_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de atualização do time",
 *                      example="2024-07-23T01:27:39.000000Z"
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=404,
 *              description="Time não encontrado"
 *          ),
 *          @OA\Response(
 *              response=400,
 *              description="Dados inválidos para a atualização do time"
 *          )
 *      ),
 *     @OA\Delete(
 *         operationId="deleteTeams",
 *         summary="Excluir time por ID",
 *         tags={"Teams"},
 *         description="Remove um time específico da lista",
 *         @OA\Parameter(
 *             name="id",
 *             in="path",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),
 *         @OA\Response(
 *             response=200,
 *             description="Time excluído com sucesso",
 *             @OA\JsonContent(
 *                 type="object",
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     example="Time excluído com sucesso"
 *                 )
 *             )
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="Time não encontrado",
 *             @OA\JsonContent(
 *                 type="object",
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     example="Time não encontrado"
 *                 )
 *             )
 *         )
 *     )
 * ),
 * @OA\PathItem(
 *     path="/api/teams/{id}",
 *     @OA\Get(
 *         operationId="getTeamsById",
 *         tags={"Teams"},
 *         summary="Obter time por ID",
 *         description="Retorna um time específico",
 *         @OA\Parameter(
 *             name="id",
 *             in="path",
 *             required=true,
 *             @OA\Schema(
 *                 type="integer"
 *             )
 *         ),
 *         @OA\Response(
 *             response=200,
 *             description="Dados do time",
 *             @OA\JsonContent(ref="#/components/schemas/Championship")
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid param: Championship not found."
 *         )
 *     )
 * )
 */

class Teams
{
}

/**
 * @OA\Schema(
 *     schema="Teams",
 *     type="object",
 *     title="Championship",
 *     required={"id", "name", "created_at", "updated_at"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID do time"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nome do time"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de criação do time"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de atualização do time"
 *     )
 * )
 */


class TeamsSchema
{
}

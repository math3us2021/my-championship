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
 * @OA\PathItem(
 *     path="/api/championship",
 *     @OA\Get(
 *         operationId="getChampionshipAll",
 *         tags={"Championship"},
 *         summary="Obter campeonato por ID",
 *         description="Retorna um campeonato específico",
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
 *             description="Dados do campeonato",
 *             @OA\JsonContent(
 *                  type="array",
 *                  @OA\Items(ref="#/components/schemas/Championship")
 *              )
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid param: Championship not found."
 *         )
 *     ),
 *     @OA\Post(
 *          operationId="createChampionship",
 *          tags={"Championship"},
 *          summary="Criar um novo campeonato",
 *          description="Cria um novo campeonato com as informações fornecidas",
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
 *                          description="Nome do campeonato",
 *                          example="Campeone"
 *                      )
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=201,
 *              description="Campeonato criado com sucesso",
 *              @OA\JsonContent(
 *                  type="object",
 *                  @OA\Property(
 *                      property="id",
 *                      type="integer",
 *                      description="ID do campeonato",
 *                      example=9
 *                  ),
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                      description="Nome do campeonato",
 *                      example="Campeone"
 *                  ),
 *                  @OA\Property(
 *                      property="created_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de criação do campeonato",
 *                      example="2024-07-23T01:27:39.000000Z"
 *                  ),
 *                  @OA\Property(
 *                      property="updated_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de atualização do campeonato",
 *                      example="null"
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=400,
 *              description="Dados inválidos para a criação do campeonato"
 *          )
 *      ),
 *     @OA\Put(
 *          operationId="updateChampionship",
 *          tags={"Championship"},
 *          summary="Atualizar um campeonato existente",
 *          description="Atualiza as informações de um campeonato existente",
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
 *                          description="Nome do campeonato",
 *                          example="Campeone"
 *                      )
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=200,
 *              description="Campeonato atualizado com sucesso",
 *              @OA\JsonContent(
 *                  type="object",
 *                  @OA\Property(
 *                      property="id",
 *                      type="integer",
 *                      description="ID do campeonato",
 *                      example=9
 *                  ),
 *                  @OA\Property(
 *                      property="name",
 *                      type="string",
 *                      description="Nome do campeonato",
 *                      example="Campeone"
 *                  ),
 *                  @OA\Property(
 *                      property="created_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de criação do campeonato",
 *                      example="2024-07-23T01:27:39.000000Z"
 *                  ),
 *                  @OA\Property(
 *                      property="updated_at",
 *                      type="string",
 *                      format="date-time",
 *                      description="Data de atualização do campeonato",
 *                      example="2024-07-23T01:27:39.000000Z"
 *                  )
 *              )
 *          ),
 *          @OA\Response(
 *              response=404,
 *              description="Campeonato não encontrado"
 *          ),
 *          @OA\Response(
 *              response=400,
 *              description="Dados inválidos para a atualização do campeonato"
 *          )
 *      ),
 *     @OA\Delete(
 *         operationId="deleteChampionship",
 *         summary="Excluir campeonato por ID",
 *         tags={"Championship"},
 *         description="Remove um campeonato específico da lista",
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
 *             description="Campeonato excluído com sucesso",
 *             @OA\JsonContent(
 *                 type="object",
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     example="Campeonato excluído com sucesso"
 *                 )
 *             )
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="Campeonato não encontrado",
 *             @OA\JsonContent(
 *                 type="object",
 *                 @OA\Property(
 *                     property="message",
 *                     type="string",
 *                     example="Campeonato não encontrado"
 *                 )
 *             )
 *         )
 *     )
 * ),
 * @OA\PathItem(
 *     path="/api/championship/{id}",
 *     @OA\Get(
 *         operationId="getChampionshipById",
 *         tags={"Championship"},
 *         summary="Obter campeonato por ID",
 *         description="Retorna um campeonato específico",
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
 *             description="Dados do campeonato",
 *             @OA\JsonContent(ref="#/components/schemas/Championship")
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Invalid param: Championship not found."
 *         )
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


class ChampionshipSchema
{
}

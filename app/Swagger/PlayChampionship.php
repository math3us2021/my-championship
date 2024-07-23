<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="PlayChampionship",
 *     description="API Endpoints for Championship"
 * )
 */

/**
 * @OA\PathItem(
 *     path="/api/championship-play",
 *     @OA\Get(
 *         operationId="getPlayChampionshipAll",
 *         tags={"PlayChampionship"},
 *         summary="Obter todas as partidas do campeonato",
 *         description="Retorna uma lista de todas as partidas do campeonato",
 *         @OA\Response(
 *             response=200,
 *             description="Dados das partidas do campeonato",
 *             @OA\JsonContent(
 *                 type="array",
 *                 @OA\Items(ref="#/components/schemas/PlayChampionship")
 *             )
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Parâmetro inválido"
 *         )
 *     ),
 *     @OA\Post(
 *         operationId="createPlayChampionship",
 *         tags={"PlayChampionship"},
 *         summary="Cria um novo campeonato",
 *         description="Cria um novo campeonato",
 *         @OA\RequestBody(
 *             required=true,
 *             @OA\MediaType(
 *                 mediaType="application/json",
 *                 @OA\Schema(
 *                     type="object",
 *                     required={"championship_id", "teams"},
 *                     @OA\Property(
 *                         property="championship_id",
 *                         type="integer",
 *                         description="ID do campeonato"
 *                     ),
 *                     @OA\Property(
 *                         property="teams",
 *                         type="array",
 *                         @OA\Items(
 *                             type="integer",
 *                             description="ID do time",
 *                             example={1,2,3,4,5,6,7,8}
 *                         ),
 *                         description="IDs dos times participantes"
 *                     )
 *                 )
 *             )
 *         ),
 *         @OA\Response(
 *             response=201,
 *             description="Partida criada com sucesso",
 *             @OA\JsonContent(ref="#/components/schemas/PlayChampionship")
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Dados inválidos para a criação da partida"
 *         )
 *     )
 * ),
 * @OA\PathItem(
 *     path="/api/championship-play/{id}",
 *     @OA\Get(
 *         operationId="getPlayChampionshipById",
 *         tags={"PlayChampionship"},
 *         summary="Obter partida por ID do campeonato",
 *         description="Retorna uma partida específica do campeonato",
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
 *             description="Dados da partida",
 *             @OA\JsonContent(ref="#/components/schemas/PlayChampionship")
 *         ),
 *         @OA\Response(
 *             response=400,
 *             description="Parâmetro inválido"
 *         ),
 *         @OA\Response(
 *             response=404,
 *             description="Partida não encontrada"
 *         )
 *     )
 * )
 */

class PlayChampionship
{

}

/**
 * @OA\Schema(
 *     schema="PlayChampionship",
 *     type="object",
 *     title="PlayChampionship",
 *     required={"id", "championship_id", "stage", "team1_id", "team2_id", "team1_score", "team2_score", "match_winner", "team1_points", "team2_points", "match_date"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID da partida"
 *     ),
 *     @OA\Property(
 *         property="championship_id",
 *         type="integer",
 *         description="ID do campeonato"
 *     ),
 *     @OA\Property(
 *         property="stage",
 *         type="string",
 *         description="Fase da partida",
 *         example="quartas de final"
 *     ),
 *     @OA\Property(
 *         property="team1_id",
 *         type="integer",
 *         description="ID do time 1"
 *     ),
 *     @OA\Property(
 *         property="team2_id",
 *         type="integer",
 *         description="ID do time 2"
 *     ),
 *     @OA\Property(
 *         property="team1_score",
 *         type="integer",
 *         description="Pontuação do time 1"
 *     ),
 *     @OA\Property(
 *         property="team2_score",
 *         type="integer",
 *         description="Pontuação do time 2"
 *     ),
 *     @OA\Property(
 *         property="team1_penalties",
 *         type="integer",
 *         description="Penalidades do time 1",
 *         example="null"
 *     ),
 *     @OA\Property(
 *         property="team2_penalties",
 *         type="integer",
 *         description="Penalidades do time 2",
 *         example="null"
 *     ),
 *     @OA\Property(
 *         property="match_winner",
 *         type="integer",
 *         description="ID do time vencedor"
 *     ),
 *     @OA\Property(
 *         property="team1_points",
 *         type="integer",
 *         description="Pontos do time 1"
 *     ),
 *     @OA\Property(
 *         property="team2_points",
 *         type="integer",
 *         description="Pontos do time 2"
 *     ),
 *     @OA\Property(
 *         property="match_date",
 *         type="string",
 *         format="date-time",
 *         description="Data e hora da partida"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de criação",
 *         example="null"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de atualização",
 *         example="null"
 *     )
 * )
 */
class PlayChampionshipSchema
{
}

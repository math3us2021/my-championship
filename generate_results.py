import random
import sys
import json

def generate_results(games, final):
    results = []
    for game in games:
        team1_score = random.randrange(0, 8, 1)
        team2_score = random.randrange(0, 8, 1)
        game_result = {
            'team1': game[0],
            'team2': game[1],
            'team1_score': team1_score,
            'team2_score': team2_score
        }

        # Check for a tie
        if team1_score == team2_score and not final:
            team1_penalties = random.randrange(1, 6)
            team2_penalties = random.randrange(1, 6)
            game_result['penalties'] = {
                'team1_penalties': team1_penalties,
                'team2_penalties': team2_penalties
            }

        results.append(game_result)
    return results

if __name__ == "__main__":
    games = json.loads(sys.argv[1])
    final = json.loads(sys.argv[2])
    results = generate_results(games, final)
    print(json.dumps(results))

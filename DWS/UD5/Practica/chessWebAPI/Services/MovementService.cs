using ChessAPI.Model;

public class MovementService : IMovementService
{
    public Movement GetScore(string board)
    {
        Board b  = new Board(board);
        var score = b.GetScore();

        return score;
    }
}
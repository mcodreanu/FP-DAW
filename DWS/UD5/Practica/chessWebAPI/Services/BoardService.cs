using ChessAPI.Model;

public class BoardService : IBoardService
{
    public BoardScore  GetScore(string board)
    {
        Board b  = new Board(board);
        var score = b.GetScore();

        return score;
    }
}
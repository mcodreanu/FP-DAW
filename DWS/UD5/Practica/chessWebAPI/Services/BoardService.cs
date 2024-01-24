using ChessAPI.Model;

public class BoardService : IBoardService
{
    public BoardScore GetScore(string board)
    {
        Board b  = new Board(board);
        var score = b.GetScore();

        return score;
    }
    
    public bool Validate(string board, int fromRow, int fromColumn, int toRow, int toColumn)
    {
        Board b  = new Board(board);
        var move = b.Move(fromRow, fromColumn, toRow, toColumn);

        return move;
    }
}
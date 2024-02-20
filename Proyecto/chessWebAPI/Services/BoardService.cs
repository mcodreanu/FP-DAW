using ChessAPI.Model;

public class BoardService : IBoardService
{
    public BoardScore GetScore(string board)
    {
        Board b  = new Board(board);
        var score = b.GetScore();

        return score;
    }
    
    public MoveData Validate(string board, int fromColumn, int fromRow, int toColumn, int toRow)
    {
        Board b  = new Board(board);
        var move = b.Move(fromColumn, fromRow, toColumn, toRow);

        return move;
    }

    public List<string> CheckPossibleMovements(string board, int fromColumn, int fromRow)
    {
        Board b  = new Board(board);
        var valid = b.CheckPossibleMovements(board, fromColumn, fromRow);

        return valid;
    }
}
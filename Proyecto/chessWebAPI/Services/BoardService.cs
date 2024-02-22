using ChessAPI.Model;

public class BoardService : IBoardService
{
    public BoardScore GetScore(string board)
    {
        Board b  = new Board(board);
        var score = b.GetScore();

        return score;
    }
    
    public MoveData Validate(string board, int fromRow, int fromColumn, int toRow, int toColumn, int choice)
    {
        Board b  = new Board(board);
        var move = b.Move(fromRow, fromColumn, toRow, toColumn, choice);

        return move;
    }

    public List<string> CheckPossibleMovements(string board, int fromRow, int fromColumn)
    {
        Board b  = new Board(board);
        var valid = b.CheckPossibleMovements(board, fromRow, fromColumn);

        return valid;
    }

    public void ResetGameState()
    {
        GameStateManager.Instance.ResetState();
    }
}
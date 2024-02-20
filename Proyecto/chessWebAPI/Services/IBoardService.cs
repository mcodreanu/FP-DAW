using ChessAPI.Model;

public interface IBoardService
{
    BoardScore GetScore(string board); 
    MoveData Validate(string board, int fromColumn, int fromRow, int toColumn, int toRow);
    List<string> CheckPossibleMovements(string board, int fromColumn, int fromRow);
}
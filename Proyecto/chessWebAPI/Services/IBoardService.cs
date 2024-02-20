using ChessAPI.Model;

public interface IBoardService
{
    BoardScore GetScore(string board); 
    MoveData Validate(string board, int fromRow, int fromColumn, int toRow, int toColumn);
    List<string> CheckPossibleMovements(string board, int fromRow, int fromColumn);
}
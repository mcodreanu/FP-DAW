using ChessAPI.Model;

public interface IBoardService
{
    BoardScore GetScore(string board); 
    MoveData Validate(string board, int fromRow, int fromColumn, int toRow, int toColumn);
}
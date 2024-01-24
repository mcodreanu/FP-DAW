using ChessAPI.Model;

public interface IBoardService
{
    BoardScore GetScore(string board); 
    bool Validate(string board, int fromRow, int fromColumn, int toRow, int toColumn);
}
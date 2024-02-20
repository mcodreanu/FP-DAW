namespace ChessAPI.Model
{
    public class King : Piece
    {
        public King(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board, Movement previousMove)
        {
            int rowDiff = Math.Abs(movement.toRow - movement.fromRow);
            int colDiff = Math.Abs(movement.toColumn - movement.fromColumn);

            if ((rowDiff <= 1 && colDiff <= 1) &&
                (board[movement.toRow, movement.toColumn] == null || 
                board[movement.fromRow, movement.fromColumn]._color != board[movement.toRow, movement.toColumn]._color)) 
            {
                return MovementType.ValidNormalMovement;
            }

            if (board[movement.toRow, movement.toColumn] != null && board[movement.fromRow, movement.fromColumn]._color == board[movement.toRow, movement.toColumn]._color)
            {
                return MovementType.InvalidNormalMovement;
            }

            return MovementType.InvalidNormalMovement;
        }

        public override int GetScore()
        {
            return int.MaxValue;
        }
    }
}

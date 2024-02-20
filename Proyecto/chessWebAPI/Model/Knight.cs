namespace ChessAPI.Model
{
    public class Knight : Piece
    {
        public Knight(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board, Movement previousMove)
        {
            if ((Math.Abs(movement.toRow - movement.fromRow) == 2 && Math.Abs(movement.toColumn - movement.fromColumn) == 1) || (Math.Abs(movement.toRow - movement.fromRow) == 1 && Math.Abs(movement.toColumn - movement.fromColumn) == 2))
            {
                return MovementType.ValidNormalMovement;
            }
            else 
            {
                return MovementType.InvalidNormalMovement;
            }
        }

        public override int GetScore()
        {
            return PieceValues.KnightPieceValue;
        }
    }
}

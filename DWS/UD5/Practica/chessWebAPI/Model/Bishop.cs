namespace ChessAPI.Model
{
    public class Bishop : Piece
    {
        public Bishop(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            return MovementType.InvalidNormalMovement;
        }

        public override int GetScore()
        {
            return PieceValues.BishopPieceValue;
        }
    }
}

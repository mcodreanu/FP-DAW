namespace ChessAPI.Model
{
    public class Knight : Piece
    {
        public Knight(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            return MovementType.InvalidNormalMovement;
        }

        public override int GetScore()
        {
            return PieceValues.KnightPieceValue;
        }
    }
}

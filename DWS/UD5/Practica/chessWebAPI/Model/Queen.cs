namespace ChessAPI.Model
{
    public class Queen : Piece
    {
        public Queen(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            return MovementType.InvalidNormalMovement;
        }

        public override int GetScore()
        {
            return PieceValues.QueenValue;
        }
    }
}

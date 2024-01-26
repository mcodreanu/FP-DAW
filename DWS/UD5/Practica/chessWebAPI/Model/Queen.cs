namespace ChessAPI.Model
{
    public class Queen : Piece
    {
        public Queen(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            return MovementType.ValidNormalMovement;
        }

        public override int GetScore()
        {
            return PieceValues.QueenValue;
        }
    }
}

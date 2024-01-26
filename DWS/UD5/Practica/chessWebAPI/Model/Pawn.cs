namespace ChessAPI.Model
{
    public class Pawn : Piece
    {
        public Pawn(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            return MovementType.InvalidNormalMovement;
        }

        public override int GetScore()
        {
            return PieceValues.PawnPieceValue;
        }
    }
}

namespace ChessAPI.Model
{
    public class Queen : Piece
    {
        public Queen(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board)
        {
            Piece rook = new Rook(Piece.ColorEnum.WHITE);
            Piece bishop = new Bishop(Piece.ColorEnum.WHITE);
            MovementType valid = MovementType.InvalidNormalMovement;

            if (bishop.ValidateSpecificRulesForMovement(movement, board) == MovementType.ValidNormalMovement || rook.ValidateSpecificRulesForMovement(movement, board) == MovementType.ValidNormalMovement)
            {
                valid = MovementType.ValidNormalMovement;
            }

            return valid;
        }

        public override int GetScore()
        {
            return PieceValues.QueenValue;
        }
    }
}

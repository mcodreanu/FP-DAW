namespace ChessAPI.Model
{
    public class King : Piece
    {
        public King(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board, Movement previousMove)
        {
            return MovementType.ValidNormalMovement;
        }

        public override int GetScore()
        {
            return int.MaxValue;
        }
    }
}

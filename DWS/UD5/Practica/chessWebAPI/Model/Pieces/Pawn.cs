using Model;

namespace Pieces
{
    public class Pawn : Piece
    {
        public Pawn(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return Config.PawnPieceValue;
        }
    }
}

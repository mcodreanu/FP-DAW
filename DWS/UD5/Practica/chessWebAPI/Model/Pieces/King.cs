using Model;

namespace Pieces
{
    public class King : Piece
    {
        public King(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return int.MaxValue;
        }
    }
}

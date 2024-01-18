using Model;

namespace Pieces
{
    public class Queen : Piece
    {
        public Queen(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return Config.QueenValue;
        }
    }
}

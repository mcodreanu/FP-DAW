namespace Ejercicios
{
    public class Rook : Piece
    {
        public Rook(ColorEnum color) : base(color)
        {
        }

        public override int GetScore()
        {
            return 5;
        }
    }
}
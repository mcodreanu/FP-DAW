namespace Ejercicios
{
    class Program
    {
        static void Main(string[] args)
        {
            Piece whiteRook = new Rook(Piece.ColorEnum.WHITE);
            Console.WriteLine($"White Rook Code: {whiteRook.GetCode()}");
            Console.WriteLine($"White Rook Score: {whiteRook.GetScore()}");
        }
    }
}
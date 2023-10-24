namespace ChessAPI
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Begin Chess Console Test...");

            ChessGame chess = new ChessGame();

            chess.DrawBoard();
            chess.TryToMove();
            Console.WriteLine();
            chess.DrawBoard();

            Console.WriteLine();
            var code = chess.GetBoardAsStringToChessWeb();
            Console.WriteLine(code);

            Console.WriteLine();
            BoardPosition FromPosition = new BoardPosition(1,4);
            var pos = FromPosition.ValidateBoardPosition();
            Console.WriteLine("Validate Board Position: " + pos);

            Console.WriteLine("End. Chess Console Test...");
        }
    }
}
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

            var code = chess.GetBoardAsStringToChessWeb();
            Console.WriteLine(code);

            BoardPosition FromPosition = new BoardPosition(1,4);
            var pos = FromPosition.ValidateBoardPosition();
            Console.WriteLine("Validate Board Position: " + pos);

            Console.WriteLine("End. Chess Console Test...");
        }
    }
}
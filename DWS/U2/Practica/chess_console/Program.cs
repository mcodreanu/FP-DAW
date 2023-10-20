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
            var code = chess.GetBoardAsStringToChessWeb();
            Console.WriteLine(code);
            BoardPosition position = new BoardPosition(1,4);
            var pos = position.ValidateBoardPosition();
            Console.WriteLine("Validate Board Position: " + pos);
            Console.WriteLine("End. Chess Console Test...");
        }
    }
}
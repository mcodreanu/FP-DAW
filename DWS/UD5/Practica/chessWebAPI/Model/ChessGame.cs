namespace Model
{
    internal class ChessGame
    {
        private Board board;
        private string boardString;

        public ChessGame()
        {
            this.boardString = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR";
            board = new Board(this.boardString);
        }

        public void DrawBoard()
        {
            this.board.Draw();
        }

        public void TryToMove()
        {
            BoardPosition FromPosition = new BoardPosition(0,0);
            BoardPosition ToPosition = new BoardPosition(0,1);
            Movement movement = new Movement(FromPosition, ToPosition);

            this.board.Move(movement);
        }

        public string GetBoardAsStringToChessWeb()
        {
            return this.board.GetBoardState();
        }

        public void SetBoardString(string value)
        {
            this.boardString = value;
            this.board = new Board(this.boardString);
        }

        public Material CalculateMaterial()
        {
            return this.board.CalculateMaterial();
        }
    }
}

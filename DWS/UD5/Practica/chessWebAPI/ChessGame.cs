namespace ChessAPI
{
    internal class ChessGame
    {
        private Board board;


        public ChessGame(string boardString)
        {
            board = new Board(boardString);
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
            return board.GetBoardState();
        }

    }
}

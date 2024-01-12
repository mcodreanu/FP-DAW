using ChessAPI.Model;

namespace ChessAPI
{
    internal class Board
    {
        public Piece[,] board;

        public Board()
        {
            board = new Piece[8, 8];
    
            board[0,0] = new Rook(Piece.ColorEnum.BLACK);
            board[0,1] = new Knight(Piece.ColorEnum.BLACK);
            board[0,2] = new Bishop(Piece.ColorEnum.BLACK); 
            board[0,3] = new King(Piece.ColorEnum.BLACK);
            board[0,4] = new Queen(Piece.ColorEnum.BLACK);
            board[0,5] = new Bishop(Piece.ColorEnum.BLACK);
            board[0,6] = new Knight(Piece.ColorEnum.BLACK);
            board[0,7] = new Rook(Piece.ColorEnum.BLACK);

            for (int i = 0; i < 8; i++)
            {
                board[1,i] = new Pawn(Piece.ColorEnum.BLACK);
                board[6,i] = new Pawn(Piece.ColorEnum.WHITE); 
            }

            board[7,0] = new Rook(Piece.ColorEnum.WHITE);
            board[7,1] = new Knight(Piece.ColorEnum.WHITE);
            board[7,2] = new Bishop(Piece.ColorEnum.WHITE);
            board[7,3] = new King(Piece.ColorEnum.WHITE);
            board[7,4] = new Queen(Piece.ColorEnum.WHITE);
            board[7,5] = new Bishop(Piece.ColorEnum.WHITE);
            board[7,6] = new Knight(Piece.ColorEnum.WHITE);
            board[7,7] = new Rook(Piece.ColorEnum.WHITE);
        }
        public Piece GetPiece(int row, int column)
        {
            return board[row, column];
        }


        
        public void Move(Movement movement)
        {
            if (movement.IsValid())
            {
                _Move(movement);
            }
        }
        
        private void _Move(Movement movement)
        {
            int GetToBoardPositionColumn = movement.GetToBoardPositionColumn();
            int GetToBoardPositionRow = movement.GetToBoardPositionRow();
            int GetFromBoardPositionColumn = movement.GetFromBoardPositionColumn();
            int GetFromBoardPositionRow = movement.GetFromBoardPositionRow();

            board[GetToBoardPositionColumn,GetToBoardPositionRow] = board[GetFromBoardPositionColumn,GetFromBoardPositionRow];

            board[GetFromBoardPositionColumn,GetFromBoardPositionRow] = null;
        }

        public void Draw()
        {
            for (int i = 0; i < board.GetLength(0); i++)
            {
                for (int j = 0; j < board.GetLength(1); j++)
                {
                    if (board[i,j] != null)
                        Console.Write(board[i,j].GetCode());   
                    else if ((i+j) % 2 == 0)
                        Console.Write("|0000|"); 
                    else
                        Console.Write("|####|");
                }
                Console.WriteLine();
            }
        }

        public string GetBoardState()
        {
            string result = string.Empty;

            Dictionary<string, string> fenDictionary = new Dictionary<string, string>()
            {
                {"|KNBL|", "n"},  {"|KIBL|", "k"}, {"|PABL|", "p"},
                {"|BIBL|", "b"},  {"|QUBL|", "q"}, {"|ROBL|", "r"},
                {"|KNWH|", "N"},  {"|KIWH|", "K"}, {"|PAWH|", "P"},
                {"|BIWH|", "B"},  {"|QUWH|", "Q"}, {"|ROWH|", "R"}
            };

            int countEmpty = 0;
            int countRows = 0;

            for (var i = 0; i < board.GetLength(0); i++)
            {               
                for (var j = 0; j < board.GetLength(1); j++)
                {
                    if (board[i,j] != null)
                    {
                        result += $"{fenDictionary[board[i, j].GetCode()]}";
                        countRows++;
                    }                
                    else
                    {
                        countEmpty++;
                    } 

                    if (countRows == 8)
                    {
                        countRows = 0;
                        result += "/";
                    }   

                    if (countEmpty == 8)
                    {
                        countEmpty = 0;
                        result += "8/";
                    }
                }

                result = result.Remove(result.Length - 1, 1);
            }   
            return result;
        }
    }
}

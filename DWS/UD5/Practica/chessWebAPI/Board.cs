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

        public Board(string boardString)
        {
            board = new Piece[8, 8];
            boardString = boardString.Replace("1", "0");
            boardString = boardString.Replace("2", "00");
            boardString = boardString.Replace("3", "000");
            boardString = boardString.Replace("4", "0000");
            boardString = boardString.Replace("5", "00000");
            boardString = boardString.Replace("6", "000000");
            boardString = boardString.Replace("7", "0000000");
            boardString = boardString.Replace("8", "00000000");
            boardString = boardString.Replace("/", "");

            int pos = 0;

            for (int i = 0; i < board.GetLength(0); i++)
            {               
                for (int j = 0; j < board.GetLength(1); j++)
                {
                    if (boardString[pos] == 'r')
                    {
                        board[i,j] = new Rook(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (boardString[pos] == 'n')
                    {
                        board[i,j] = new Knight(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (boardString[pos] == 'b')
                    {
                        board[i,j] = new Bishop(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (boardString[pos] == 'q')
                    {
                        board[i,j] = new Queen(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (boardString[pos] == 'k')
                    {
                        board[i,j] = new King(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (boardString[pos] == 'p')
                    {
                        board[i,j] = new Pawn(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (boardString[pos] == 'R')
                    {
                        board[i,j] = new Rook(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (boardString[pos] == 'N')
                    {
                        board[i,j] = new Knight(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (boardString[pos] == 'B')
                    {
                        board[i,j] = new Bishop(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (boardString[pos] == 'Q')
                    {
                        board[i,j] = new Queen(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (boardString[pos] == 'K')
                    {
                        board[i,j] = new King(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (boardString[pos] == 'P')
                    {
                        board[i,j] = new Pawn(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (boardString[pos] == '0')
                    {
                        pos++;
                    }
                }
            }   
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
                {"|KNBL|", "n"}, {"|KIBL|", "k"}, {"|PABL|", "p"},
                {"|BIBL|", "b"}, {"|QUBL|", "q"}, {"|ROBL|", "r"},
                {"|KNWH|", "N"}, {"|KIWH|", "K"}, {"|PAWH|", "P"},
                {"|BIWH|", "B"}, {"|QUWH|", "Q"}, {"|ROWH|", "R"}
            };

            int countEmpty = 0;

            for (int i = 0; i < board.GetLength(0); i++)
            {
                for (int j = 0; j < board.GetLength(1); j++)
                {
                    if (board[i, j] != null)
                    {
                        if (countEmpty > 0)
                        {
                            result += countEmpty.ToString();
                            countEmpty = 0;
                        }

                        result += fenDictionary[board[i, j].GetCode()];
                    }
                    else
                    {
                        countEmpty++;
                    }
                }

                if (countEmpty > 0)
                {
                    result += countEmpty.ToString();
                    countEmpty = 0;
                }

                if (i < board.GetLength(0) - 1)
                {
                    result += '/';
                }
            }

            return result;
        }
    }
}

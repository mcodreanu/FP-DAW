namespace ChessAPI.Model
{
    public class Board
    {
        private Piece[,] _boardPieces;

        public Board(string board)
        {
            _boardPieces = new Piece[8, 8];
            board = board.Replace("1", "0");
            board = board.Replace("2", "00");
            board = board.Replace("3", "000");
            board = board.Replace("4", "0000");
            board = board.Replace("5", "00000");
            board = board.Replace("6", "000000");
            board = board.Replace("7", "0000000");
            board = board.Replace("8", "00000000");
            board = board.Replace("/", "");

            int pos = 0;

            for (int i = 0; i < _boardPieces.GetLength(0); i++)
            {               
                for (int j = 0; j < _boardPieces.GetLength(1); j++)
                {
                    if (board[pos] == 'r')
                    {
                        _boardPieces[i,j] = new Rook(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (board[pos] == 'n')
                    {
                        _boardPieces[i,j] = new Knight(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (board[pos] == 'b')
                    {
                        _boardPieces[i,j] = new Bishop(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (board[pos] == 'q')
                    {
                        _boardPieces[i,j] = new Queen(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (board[pos] == 'k')
                    {
                        _boardPieces[i,j] = new King(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (board[pos] == 'p')
                    {
                        _boardPieces[i,j] = new Pawn(Piece.ColorEnum.BLACK);
                        pos++;
                    }
                    else if (board[pos] == 'R')
                    {
                        _boardPieces[i,j] = new Rook(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (board[pos] == 'N')
                    {
                        _boardPieces[i,j] = new Knight(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (board[pos] == 'B')
                    {
                        _boardPieces[i,j] = new Bishop(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (board[pos] == 'Q')
                    {
                        _boardPieces[i,j] = new Queen(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (board[pos] == 'K')
                    {
                        _boardPieces[i,j] = new King(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (board[pos] == 'P')
                    {
                        _boardPieces[i,j] = new Pawn(Piece.ColorEnum.WHITE);
                        pos++;
                    }
                    else if (board[pos] == '0')
                    {
                        pos++;
                    }
                }
            }
        } 

        public BoardScore GetScore()
        {
            int materialValueWhite = 0;
            int materialValueBlack = 0;
            string[] whitePieces = {"|PAWH|", "|ROWH|", "|KNWH|", "|BIWH|","|QUWH|","|KIWH|"};

            for (int row = 0; row < 8; row++)
            {
                for (int column = 0; column < 8; column++)
                {
                    Piece piece = _boardPieces[row, column];

                    string pieceCode = "";

                    if(piece != null)
                    {
                        pieceCode = piece.GetCode();
                    }

                    if (piece != null && pieceCode != "|KIBL|" && pieceCode != "|KIWH|")
                    {
                        int pieceValue = piece.GetScore();

                        if (whitePieces.Contains(pieceCode))
                        {
                            materialValueWhite += pieceValue;
                        }
                        else
                        {
                            materialValueBlack += pieceValue;
                        }
                    }
                }
            }

            int distance = Math.Abs(materialValueWhite - materialValueBlack);
            string message = GenerateMessage(materialValueWhite, materialValueBlack, distance);

            return new BoardScore(materialValueWhite, materialValueBlack, message);
        }

        private static string GenerateMessage(int whiteValue, int blackValue, int distance)
        {
            if (distance > 0)
            {
                string plural = distance > 1 ? "points" : "point";

                if (whiteValue > blackValue)
                {
                    return $"White is winning by {distance} {plural}.";
                }
                else if (whiteValue < blackValue)
                {
                    return $"Black is winning by {distance} {plural}.";
                }
            }

            return string.Empty;
        }

        public bool Move(int fromRow, int fromColumn, int toRow, int toColumn)
        {
            Movement move = new Movement(fromRow, fromColumn, toRow, toColumn);
            Piece piece = _boardPieces[move.fromColumn, move.fromRow];

            if (move.IsValid())
            {
                if (piece.Validate(move, _boardPieces) != Piece.MovementType.InvalidNormalMovement)
                {
                    _boardPieces[toColumn, toRow] = _boardPieces[fromColumn, fromRow];
                    _boardPieces[fromColumn, fromRow] = null;

                    return true;
                }
            }

            return false;
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

            for (int i = 0; i < _boardPieces.GetLength(0); i++)
            {
                for (int j = 0; j < _boardPieces.GetLength(1); j++)
                {
                    if (_boardPieces[i, j] != null)
                    {
                        if (countEmpty > 0)
                        {
                            result += countEmpty.ToString();
                            countEmpty = 0;
                        }

                        result += fenDictionary[_boardPieces[i, j].GetCode()];
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

                if (i < _boardPieces.GetLength(0) - 1)
                {
                    result += '/';
                }
            }

            return result;
        }
    }
}
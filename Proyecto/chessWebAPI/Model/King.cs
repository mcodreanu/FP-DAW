namespace ChessAPI.Model
{
    public class King : Piece
    {
        public King(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board, Movement previousMove)
        {
            int rowDiff = Math.Abs(movement.toRow - movement.fromRow);
            int colDiff = Math.Abs(movement.toColumn - movement.fromColumn);

            if (IsCastling(movement, board))
            {
                return ValidateCastling(movement, board);
            }

            if ((rowDiff <= 1 && colDiff <= 1) &&
                (board[movement.toRow, movement.toColumn] == null || 
                board[movement.fromRow, movement.fromColumn]._color != board[movement.toRow, movement.toColumn]._color)) 
            {
                return MovementType.ValidNormalMovement;
            }

            if (board[movement.toRow, movement.toColumn] != null && board[movement.fromRow, movement.fromColumn]._color == board[movement.toRow, movement.toColumn]._color)
            {
                return MovementType.InvalidNormalMovement;
            }

            return MovementType.InvalidNormalMovement;
        }

        private bool IsCastling(Movement movement, Piece[,] board)
        {
            if (Math.Abs(movement.toColumn - movement.fromColumn) == 2 && movement.fromRow == movement.toRow)
            {
                if (movement.toColumn == 6 && board[movement.fromRow, 7] is Rook)
                {
                    for (int col = movement.fromColumn + 1; col < movement.toColumn; col++)
                    {
                        if (board[movement.fromRow, col] != null)
                        {
                            return false;
                        }
                    }
                    return true;
                }
                else if (movement.toColumn == 2 && board[movement.fromRow, 0] is Rook)
                {
                    for (int col = movement.fromColumn - 1; col > movement.toColumn; col--)
                    {
                        if (board[movement.fromRow, col] != null)
                        {
                            return false;
                        }
                    }
                    return true;
                }
            }
            return false;
        }

        public override MovementType ValidateCastling(Movement movement, Piece[,] board)
        {
            if (IsCastling(movement, board))
            {
                if (this._color == ColorEnum.BLACK && GameStateManager.Instance.HasMovedBlack)
                {
                    return MovementType.InvalidNormalMovement;
                }

                if (this._color == ColorEnum.WHITE && GameStateManager.Instance.HasMovedWhite)
                {
                    return MovementType.InvalidNormalMovement;
                }

                if (movement.toColumn == 6)
                {
                    return MovementType.ValidNormalMovement;
                }
                else if (movement.toColumn == 2)
                {
                    return MovementType.ValidNormalMovement;
                }
            }
            return MovementType.InvalidNormalMovement;
        }

        public override int GetScore()
        {
            return int.MaxValue;
        }
    }
}

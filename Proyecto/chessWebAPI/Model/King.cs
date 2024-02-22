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

            // Check if the movement is for castling
            if (IsCastling(movement, board))
            {
                // Validate castling
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
            // Check if the movement is for castling
            // For castling, the king moves two squares horizontally
            if (Math.Abs(movement.toColumn - movement.fromColumn) == 2 && movement.fromRow == movement.toRow)
            {
                // Check if there is a rook on the corresponding side
                if (movement.toColumn == 6 && board[movement.fromRow, 7] is Rook)
                {
                    // Check if there are no pieces between the king and rook
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
                    // Check if there are no pieces between the king and rook
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
            // Check if the movement is for castling
            if (IsCastling(movement, board))
            {
                // Check if the king has moved
                if (this._color == ColorEnum.BLACK && GameStateManager.Instance.HasMovedBlack)
                {
                    return MovementType.InvalidNormalMovement;
                }

                if (this._color == ColorEnum.WHITE && GameStateManager.Instance.HasMovedWhite)
                {
                    return MovementType.InvalidNormalMovement;
                }

                // Check if there are any pieces in between the king and rook
                if (movement.toColumn == 6) // Kingside castling
                {
                    return MovementType.ValidNormalMovement;
                }
                else if (movement.toColumn == 2) // Queenside castling
                {
                    return MovementType.ValidNormalMovement;
                }
            }
            return MovementType.InvalidNormalMovement; // Default return if not castling
        }

        public override int GetScore()
        {
            return int.MaxValue;
        }
    }
}

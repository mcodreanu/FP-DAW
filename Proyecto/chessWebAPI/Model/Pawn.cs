namespace ChessAPI.Model
{
    //TODO: Captura al paso. "KillPassant"
    public class Pawn : Piece
    {

        public Pawn(ColorEnum color) : base(color)
        {
        }

        public override MovementType ValidateSpecificRulesForMovement(Movement movement, Piece[,] board, Movement previousMove)
        {
            bool baseMovement = BaseMovement(movement, board);
            if (baseMovement)
                return MovementType.ValidNormalMovement;

            bool kill = Kill(movement, board);
            if (kill)
                return MovementType.ValidNormalMovement;


            bool initialMovement = InitialMovement(movement, board);
            if (initialMovement)
                return MovementType.ValidNormalMovement;

            if (KillPassant(movement, board, previousMove))
                return MovementType.PawnPassant;

            return MovementType.InvalidNormalMovement;
        }

        public bool BaseMovement(Movement movement, Piece[,] board)
        {
            bool result = false;

            if ((movement.RowDistance()==1) && 
                (movement.IsSameColumn()) && board[movement.toRow,movement.toColumn]==null)
            {
                if (this._color==ColorEnum.WHITE)
                    result = movement.toRow < movement.fromRow;
                else
                    result = movement.toRow > movement.fromRow;
            }

            return result;

        }
        public bool Kill(Movement movement, Piece[,] board)
        {
            bool result = false;
            int columnFactor = movement.fromColumn - movement.toColumn;
            
            if (board[movement.toRow, movement.toColumn] != null)
            {
                if ((movement.RowDistance() == 1) && (Math.Abs(columnFactor) == 1))
                {
                    if (this._color == ColorEnum.WHITE)
                        result = movement.toRow < movement.fromRow;
                    else
                        result = movement.toRow > movement.fromRow;
                }
            }

            return result;
        }

        public bool InitialMovement(Movement movement, Piece[,] board)
        {
            bool result = false;

            if ((board[movement.toRow,movement.toColumn]==null) &&
                (movement.RowDistance() == 2) && 
                (movement.IsSameColumn()) &&
                ((movement.fromRow==1) || (movement.fromRow==6))
                )
            {
                if (this._color == ColorEnum.WHITE)
                    result = board[5, movement.toColumn] == null;
                else
                    result = board[2, movement.toColumn] == null;
  
            }

            return result;
        }

        public bool KillPassant(Movement movement, Piece[,] board, Movement previousMove)
        {
            // Check if the previous move was a double pawn move
            if (previousMove != null && Math.Abs(previousMove.fromRow - previousMove.toRow) == 2)
            {
                // Check if the pawn moved adjacent to the previous pawn move
                if (Math.Abs(movement.toColumn - previousMove.toColumn) == 1)
                {
                    int direction = this._color == ColorEnum.WHITE ? 1 : -1;
                    int passantRow = this._color == ColorEnum.WHITE ? 4 : 3;

                    // Check if the current pawn's movement matches the row and column of the potential passant capture
                    if (movement.toRow == passantRow && board[movement.toRow, movement.toColumn] == null)
                    {
                        // Check if the moving pawn is in the same row as the previous pawn's final position
                        if (movement.fromColumn == passantRow + direction)
                            return true;
                    }
                }
            }
            return false;
        }

        public override int GetScore()
        {
            return PieceValues.PawnPieceValue;
        }
    }
}
